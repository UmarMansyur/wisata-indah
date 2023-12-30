<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function destroy($id)
    {
        confirmDelete('Apakah anda yakin ingin menghapus data ini?');
        $gallery = Gallery::firstWhere('id', $id);
        if (file_exists(storage_path('app/public/' . $gallery->url))) {
            unlink(storage_path('app/public/' . $gallery->url));
        }
        $gallery->delete();
        return redirect()->back();
    }
}
