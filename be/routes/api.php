<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InteractionController;

Route::post('/track', [InteractionController::class, 'store']);
Route::get('/interactions/dump', [InteractionController::class, 'dump']);