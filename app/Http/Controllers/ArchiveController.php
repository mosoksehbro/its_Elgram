<?php

namespace App\Http\Controllers;

use App\Models\MediaUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

use App\Exports\MediaExport; 
use PDF;

class ArchiveController extends Controller
{
    public function index()
    {
        $mediaUploads = MediaUpload::where('user_id', Auth::id())->get();
        return view('archive.index', compact('mediaUploads'));
    }

    public function download(Request $request)
    {
        // Validasi input
        $request->validate([
            'date_from' => 'required|date',
            'date_to' => 'required|date|after_or_equal:date_from',
            'format' => 'required|in:xlsx,pdf',
        ]);
        // dd($request);
        $mediaUploads = MediaUpload::where('user_id', Auth::id())
        ->whereDate('created_at', '>=', $request->get('date_from'))
        ->whereDate('created_at', '<=', $request->get('date_to'))
        ->get();
        // dd($mediaUploads);

        if ($request->format == 'xlsx') {
            return Excel::download(new MediaExport($mediaUploads), 'archive.xlsx');
        } elseif ($request->format == 'pdf') {
            $pdf = PDF::loadView('archive.pdf', compact('mediaUploads'));
            return $pdf->download('archive.pdf');
        }

    }
}
