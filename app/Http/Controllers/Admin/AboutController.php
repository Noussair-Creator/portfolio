<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AboutUpdateRequest;
use App\Models\About;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AboutController extends Controller
{
    /**
     * Show the form for editing the "About Me" section.
     */
    public function edit(): View
    {
        // Use firstOrNew here as well
        $about = About::firstOrNew([]);
        return view('admin.about.edit', compact('about'));
    }

    /**
     * Update the "About Me" section in storage.
     */
    public function update(AboutUpdateRequest $request): RedirectResponse
    {
        // Get the existing model or create a new one in memory
        $about = About::firstOrNew([]);

        // Get validated data
        $validated = $request->validated();

        // Convert skills string to array before saving
        if (!empty($validated['skills'])) {
            $validated['skills'] = array_map('trim', explode(',', $validated['skills']));
        } else {
            $validated['skills'] = [];
        }

        // Fill the model with the data
        $about->fill($validated);

        // Save the model (performs INSERT or UPDATE)
        $about->save();

        return redirect()->route('admin.about.edit')->with('success', 'About section updated successfully!');
    }
}
