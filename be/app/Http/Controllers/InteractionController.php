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
}