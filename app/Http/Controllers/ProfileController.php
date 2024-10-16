<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MediaUpload;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;


class ProfileController extends Controller
{
    public function index()
    {
        // Ambil data user yang sedang login dan media uploads mereka
        $user = Auth::user();
        $mediaUploads = MediaUpload::where('user_id', $user->id)->get();

        return view('profile.index', compact('user', 'mediaUploads'));
    }

    public function updateBio(Request $request)
    {
        // Validasi dan update bio user
        $request->validate([
            'bio' => 'nullable|string|max:1000',
        ]);

        $user = Auth::user();
        $user->bio = $request->input('bio');
        $user->save();

        return back()->with('success', 'Bio updated successfully.');
    }
   
    public function uploadMedia(Request $request)
    {
        // Validasi file upload
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,mp4,mov|max:153600',
            'caption' => 'nullable|string|max:1000',
        ]);

        $file = $request->file('file');
        $path = $file->store('uploads', 'public');

        $mediaUpload = new MediaUpload();
        $mediaUpload->user_id = Auth::id();
        $mediaUpload->file_path = $path;
        $mediaUpload->file_type = $file->getClientOriginalExtension();
        $mediaUpload->caption = $request->input('caption');
        $mediaUpload->save();

        return back()->with('success', 'File uploaded successfully.');
    
        
    }

    public function showProfile(User $user)
    {
    $mediaUploads = Media::where('user_id', $user->id)->get();
    $feedPerRow = $user->feed_per_row ?? 3; // Atau nilai default
    return view('profile', compact('user', 'mediaUploads', 'feedPerRow'));
    }

    public function settings()
    {
        // Ambil data user yang sedang login
        $user = Auth::user();
        
        // Kembalikan view dengan data user
        return view('profile.settings', compact('user'));
    }
    //---------------------------------------------
    public function updateSettings(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'bio' => 'nullable|string|max:1000',
            'feed_per_row' => 'required|integer|min:1|max:16000',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:5120', // Maksimum 5MB
            
        ]);
    
        // Update data user
        $user->username = $request->input('username');
        $user->bio = $request->input('bio');
        $user->feed_per_row = $request->input('feed_per_row');
    
        // Handle upload foto profil
        if ($request->hasFile('profile_photo')) {
            // Hapus foto profil lama jika ada
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }
    
            $profilePhoto = $request->file('profile_photo');
            $path = $profilePhoto->store('profile_photos', 'public');
            $user->profile_photo = $path;
        }
    
        $user->save();
    
        return back()->with('success', 'Settings updated successfully.');
    }

        public function deleteMedia($id)
    {
        $mediaUpload = MediaUpload::where('id', $id)->where('user_id', Auth::id())->first();

        if ($mediaUpload) {
            // Hapus file dari storage
            Storage::delete($mediaUpload->file_path);

            // Hapus entry dari database
            $mediaUpload->delete();

            // Tambahkan pesan sukses untuk delete
            return redirect()->back()->with('success', 'Media deleted successfully.');
        }

        return redirect()->back()->with('error', 'Media not found or you do not have permission to delete it.');
    }


        public function updateMedia(Request $request, $id)
    {
        $request->validate([
            'caption' => 'required|string|max:1000',
        ]);

        $mediaUpload = MediaUpload::where('id', $id)->where('user_id', Auth::id())->first();

        if ($mediaUpload) {
            // Perbarui caption
            $mediaUpload->caption = $request->input('caption');
            $mediaUpload->save();

            // Tambahkan pesan sukses untuk update caption
            return redirect()->back()->with('success', 'Caption updated successfully.');
        }

        return redirect()->back()->with('error', 'Media not found or you do not have permission to edit it.');
    }

}
