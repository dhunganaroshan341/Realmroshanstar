<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryMediaRequest;
use App\Models\GalleryMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryMediaController extends Controller
{
    public function index()
    {
        return view('admin.pages.Gallery.galleryMedia');
    }

    public function getGalleryData()
    {
        $data = GalleryMedia::with('galleryAlbum')->latest()->get();

        return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('album', fn($row) => $row->galleryAlbum->name ?? 'N/A')
            ->addColumn('status', function ($row) {
                return view('components.status-toggle', [
                    'status' => $row->status,
                    'id' => $row->id,
                    'route' => route('gallery-media.toggleStatus', $row->id)
                ]);
            })
            ->addColumn('action', function ($row) {
                return view('components.action-buttons', [
                    'id' => $row->id,
                    'editRoute' => route('gallery-media.detail', $row->id),
                    'deleteRoute' => route('gallery-media.delete', $row->id),
                ]);
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    public function store(GalleryMediaRequest $request)
    {
        $imageName = null;

        // Handle media_path file upload if file was sent
        if ($request->hasFile('media_path')) {
            $image = $request->file('media_path');
            $imageName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/gallery-media'), $imageName);
        }

        GalleryMedia::create([
            'gallery_album_id' => $request->gallery_album_id,
            'media_path' => $imageName ?? $request->media_path, // fallback in case of existing string path
            'status' => $request->status === 'Active' ? 1 : 0,
        ]);

        return response()->json(['success' => true, 'message' => 'Media created successfully.']);
    }

    public function getDetail($id)
    {
        $media = GalleryMedia::findOrFail($id);
        return response()->json($media);
    }

    public function update(GalleryMediaRequest $request, $id)
    {
        $media = GalleryMedia::findOrFail($id);
        $imageName = $media->media_path;

        if ($request->hasFile('media_path')) {
            $image = $request->file('media_path');
            $newImageName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/gallery-media'), $newImageName);

            // Delete old file
            if ($imageName && file_exists(public_path('images/gallery-media/' . $imageName))) {
                unlink(public_path('images/gallery-media/' . $imageName));
            }

            $imageName = $newImageName;
        }

        $media->update([
            'gallery_album_id' => $request->gallery_album_id,
            'media_path' => $imageName ?? $request->media_path,
            'status' => $request->status === 'Active' ? 1 : 0,
        ]);

        return response()->json(['success' => true, 'message' => 'Media updated successfully.']);
    }

    public function statusToggle($id)
    {
        $media = GalleryMedia::findOrFail($id);
        $media->status = !$media->status;
        $media->save();

        return response()->json(['success' => true, 'message' => 'Status updated.']);
    }

    public function destroy($id)
    {
        $media = GalleryMedia::findOrFail($id);

        if ($media->media_path && file_exists(public_path('images/gallery-media/' . $media->media_path))) {
            unlink(public_path('images/gallery-media/' . $media->media_path));
        }

        $media->delete();

        return response()->json(['success' => true, 'message' => 'Media deleted.']);
    }
}
