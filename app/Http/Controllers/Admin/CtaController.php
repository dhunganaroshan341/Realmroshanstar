<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CtaRequest;
use App\Models\Cta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CtaController extends Controller
{
    public function index(Request $request)
    {
        // Get the first CTA record
        $cta = Cta::first();

        // Additional JavaScript and CSS for DataTables and other functionalities
        $extraJs = array_merge(
            config('js-map.admin.select2.script'),
            config('js-map.admin.datatable.script'),
            config('js-map.admin.summernote.script')
        );

        $extraCs = array_merge(
            config('js-map.admin.select2.style'),
            config('js-map.admin.datatable.style'),
            config('js-map.admin.summernote.style')
        );

        return view('Admin.pages.Cta.cta', compact('cta', 'extraJs', 'extraCs'));
    }

    public function store(CtaRequest $request)
    {
        try {
            // Get validated data from request
            $cta = Cta::first();
            $data = $request->validated();

            // Define file upload fields and corresponding directories
            $uploadFields = [
                'image' => 'images/cta/image/',
                'video_thumbnail' => 'images/cta/video_thumbnail/',
                'video' => 'videos/cta/',
            ];

            // Process file uploads
            foreach ($uploadFields as $field => $folder) {
                if ($request->hasFile($field)) {
                    // Delete old file if it exists
                    if ($cta && $cta->$field) {
                        Storage::disk('public')->delete($cta->$field);
                    }

                    // Store new file and assign path to data
                    $filename = time() . '_' . $request->file($field)->getClientOriginalName();
                    $path = $request->file($field)->storeAs($folder, $filename, 'public');
                    $data[$field] = $path;
                }
            }

            // Add any new fields from the request (for example, video title, description, etc.)
            $data['video_title'] = $request->input('video_title');
            $data['video_description'] = $request->input('video_description');
            $data['video_button_text'] = $request->input('video_button_text');
            $data['video_button_link'] = $request->input('video_button_link');
            $data['video_button_link_text'] = $request->input('video_button_link_text');

            // Update the existing CTA or create a new one
            if ($cta) {
                $cta->update($data);
            } else {
                Cta::create($data);
            }

            return back()->with(['success' => 'CTA updated successfully']);
        } catch (\Exception $e) {
            // Log detailed error information for troubleshooting
            Log::error('CTA Update Error: ' . $e->getMessage());
            return back()->with(['error' => 'Error: ' . $e->getMessage()]);
        }
    }
    public function update(CtaRequest $request)
    {
        try {
            // Get validated data from request
            $cta = Cta::first();
            $data = $request->validated();

            // Define file upload fields and corresponding directories
            $uploadFields = [
                'image' => 'images/cta/image/',
                'video_thumbnail' => 'images/cta/video_thumbnail/',
                'video' => 'videos/cta/',
            ];

            // Process file uploads
            foreach ($uploadFields as $field => $folder) {
                if ($request->hasFile($field)) {
                    // Delete old file if it exists
                    if ($cta && $cta->$field) {
                        Storage::disk('public')->delete($cta->$field);
                    }

                    // Store new file and assign path to data
                    $filename = time() . '_' . $request->file($field)->getClientOriginalName();
                    $path = $request->file($field)->storeAs($folder, $filename, 'public');
                    $data[$field] = $path;
                }
            }

            // Add any new fields from the request (for example, video title, description, etc.)
            $data['video_title'] = $request->input('video_title');
            $data['video_description'] = $request->input('video_description');
            $data['video_button_text'] = $request->input('video_button_text');
            $data['video_button_link'] = $request->input('video_button_link');
            $data['video_button_link_text'] = $request->input('video_button_link_text');

            // Update the existing CTA or create a new one
            if ($cta) {
                $cta->update($data);
            } else {
                Cta::create($data);
            }

            return back()->with(['success' => 'CTA updated successfully']);
        } catch (\Exception $e) {
            // Log detailed error information for troubleshooting
            Log::error('CTA Update Error: ' . $e->getMessage());
            return back()->with(['error' => 'Error: ' . $e->getMessage()]);
        }
    }
}

