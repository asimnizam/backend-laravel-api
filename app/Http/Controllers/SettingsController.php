<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SettingsController extends Controller
{
    /**
     * Get the user's settings.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $userId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserSettings(Request $request, $userId)
    {
        $user = User::findOrFail($userId);

        return response()->json([
            'selectedSources' => $user->selectedSources,
            'selectedCategories' => $user->selectedCategories,
            'selectedAuthors' => $user->selectedAuthors,
        ]);
    }

    /**
     * Update the user's settings.
     *
     * @param  int  $userId
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateUserSettings(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
    
        // Validate the request data if needed
    
        // Update the user's settings
        $user->selectedSources = $request->input('selectedSources');
        $user->selectedCategories = $request->input('selectedCategories');
        $user->selectedAuthors = $request->input('selectedAuthors');
        $user->save();
    
        return response()->json(['message' => 'User settings updated successfully']);
    }
}
