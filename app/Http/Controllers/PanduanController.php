<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EditPanduan;

class PanduanController extends Controller
{
    public function index()
    {
        // Ambil data panduan terbaru
        $panduan = EditPanduan::latest()->first();

        // Kirim data ke view 'resources/views/panduan.blade.php'
        return view('panduan', compact('panduan'));
    }
}