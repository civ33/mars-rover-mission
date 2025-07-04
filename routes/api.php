<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerRoverDashboard;
use App\Models\Mission; // Make sure this matches your model namespace

Route::post('/startMission', [ControllerRoverDashboard::class, 'startMission']);
Route::post('/travel', [ControllerRoverDashboard::class, 'travel']);
Route::get('/missions/{id}', function ($id) {
    $mission = Mission::find($id);
    if (!$mission) {
        return response()->json(['message' => 'Mission not found'], 404);
    }
    return response()->json($mission);
});
?>