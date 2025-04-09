<?php

namespace App\Http\Controllers\Admin;

use App\Models\GalleryAlbum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryAlbumRequest;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class GalleryAlbumController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $search = $request->input('search.value');
            $columns = $request->input('columns');
            $pageSize = $request->input('length');
            $order = $request->input('order')[0];
            $orderByColumn = $columns[$order['column']]['data'];
            $orderDirection = $order['dir'];
            $start = $request->input('start');

            $query = GalleryAlbum::with('galleryMedia');

            $totalRecords = $query->count();

            if (!empty($search)) {
                $query->where('title', 'LIKE', "%{$search}%");
            }

            $filteredRecords = $query->count();

            $albums = $query
                ->orderBy($orderByColumn, $orderDirection)
                ->offset($start)
                ->limit($pageSize);

            return DataTables::of($albums)
                ->addIndexColumn()
                ->addColumn('action', fn ($data) => view('Admin.Button.button', compact('data')))
                ->addColumn('status', function ($album) {
                    $checked = $album->status === 'Active' ? 'checked' : '';
                    return '<div class="form-check form-switch">
                        <input class="form-check-input statusIdData mx-auto" type="checkbox" data-id="'.$album->id.'" role="switch" id="flexSwitchCheckChecked" '.$checked.'>
                    </div>';
                })
                ->with('recordsTotal', $totalRecords)
                ->with('recordsFiltered', $filteredRecords)
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        $extraJs = config('js-map.admin.datatable.script');
        $extraCs = config('js-map.admin.datatable.style');

        return view('Admin.pages.Gallery.galleryAlbum', [
            'extraJs' => $extraJs,
            'extraCs' => $extraCs,
        ]);
    }

    public function store(GalleryAlbumRequest $request)
    {
        DB::beginTransaction();
        try {
            GalleryAlbum::create($request->validated());
            DB::commit();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
            $album = GalleryAlbum::findOrFail($id);
            return response()->json(['success' => true, 'message' => $album]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function update(GalleryAlbumRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $album = GalleryAlbum::findOrFail($id);
            $album->update($request->validated());
            DB::commit();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function statusToggle($id)
    {
        try {
            $album = GalleryAlbum::findOrFail($id);
            $album->status = $album->status === 'Active' ? 'Inactive' : 'Active';
            $album->save();
            return response()->json(['success' => true, 'message' => 'Status changed']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $album = GalleryAlbum::findOrFail($id);
            $album->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
