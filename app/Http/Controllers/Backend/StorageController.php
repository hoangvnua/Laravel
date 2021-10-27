<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StorageController extends Controller
{
    public function index()
    {
        $files = Storage::files('public');
        $paths[] = '';
        foreach ($files as $key => $file) {
            $file = str_replace('public/', '', $file);
            $paths[$key] = asset('storage/' . $file);
        }
        // dd($file);
        // dd($paths);
        return view('backend.storages.index')->with(['paths' => $paths]);
    }

    public function show($id)
    {
        $files = Storage::files('public');
        foreach ($files as $key => $file) {
            if ($key == $id) {
                return Storage::download($file);
            }
        }
    }

    public function destroy($id)
    {
        $files = Storage::files('public');
        foreach ($files as $key => $file) {
            if ($key == $id) {
                Storage::delete($file);
            }
        }
        return redirect()->route('backend.storages.index');
    }
}
