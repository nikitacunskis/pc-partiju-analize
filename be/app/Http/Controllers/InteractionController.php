<?php
// app/Http/Controllers/InteractionController.php

namespace App\Http\Controllers;

use App\Models\Interaction;
use Illuminate\Http\Request;

class InteractionController extends Controller
{
    public function store(Request $request)
    {
        if(env('APP_DEBUG') === true) return response()->json(['success' => false], 203);
        $validated = $request->validate([
            'sessionId' => 'required|string',
            'event' => 'required|string',
            'details' => 'nullable|array',
            'time' => 'nullable|date'
        ]);

        $interaction = Interaction::create([
            'session_id' => $validated['sessionId'],
            'event' => $validated['event'],
            'details' => $validated['details'] ?? null,
            'event_time' => $validated['time'] ?? now(),
        ]);

        return response()->json(['success' => true], 201);
    }
    
    public function dump(Request $request)
    {
        $providedKey = $request->query('api');
        $expectedKey = config('app.api_access_key');

        if($expectedKey === "your_secret_key_here") {
            return response()->json(['error' => 'Change default key'], 403);
        }

        if ($providedKey !== $expectedKey) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $interactions = Interaction::all();

        $filename = 'interactions_dump_' . now()->format('Ymd_His') . '.json';

        $content = $interactions->toJson(JSON_PRETTY_PRINT);

        return response($content)
            ->header('Content-Type', 'application/json')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }
}