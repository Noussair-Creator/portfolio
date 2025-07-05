<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Models\Profile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{

    /**
     * Show the form for editing the profile.
     */
    // app/Http/Controllers/Admin/ProfileController.php

    public function edit(): View
    {
        // Use firstOrNew to avoid the database error on initial creation
        $profile = Profile::firstOrNew([]);
        return view('admin.profile.edit', compact('profile'));
    }

    /**
     * Update the profile in storage.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $profile = Profile::firstOrNew([]);

        // Get all validated data from the request
        $validatedData = $request->validated();

        // Handle the photo upload
        if ($request->hasFile('photo')) {
            if ($profile->photo_path) {
                Storage::disk('public')->delete($profile->photo_path);
            }
            $validatedData['photo_path'] = $request->file('photo')->store('profile-photos', 'public');
        }

        // Handle the resume upload
        if ($request->hasFile('resume')) {
            if ($profile->resume_path) {
                Storage::disk('public')->delete($profile->resume_path);
            }
            $validatedData['resume_path'] = $request->file('resume')->store('resumes', 'public');
        }

        // Use fill() and save() for mass assignment
        $profile->fill($validatedData);
        $profile->save();

        return redirect()->route('admin.profile.edit')->with('success', 'Profile updated successfully!');
    }
}
