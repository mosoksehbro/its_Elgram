@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Profile Settings</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ route('profile.update-settings') }}" enctype="multipart/form-data">
        @csrf
        <!-- Edit Username -->
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username', $user->username) }}" required>
            @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Edit Bio -->
        <div class="form-group">
            <label for="bio">Bio</label>
            <textarea name="bio" id="bio" class="form-control @error('bio') is-invalid @enderror" rows="3">{{ old('bio', $user->bio) }}</textarea>
            @error('bio')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Edit Foto Profil -->
        <div class="form-group">
            <label for="profile_photo">Profile Photo</label><br>
            @if($user->profile_photo)
                <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profile Photo" width="100" class="mb-2">
            @else
                <img src="https://via.placeholder.com/100" alt="Profile Photo" class="mb-2">
            @endif
            <input type="file" name="profile_photo" id="profile_photo" class="form-control-file @error('profile_photo') is-invalid @enderror">
            @error('profile_photo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Mengatur Jumlah Feed per Row -->
        <div class="form-group">
            <label for="feed_per_row">Number of Feeds per Row</label>
            <input type="number" name="feed_per_row" id="feed_per_row" class="form-control @error('feed_per_row') is-invalid @enderror" value="{{ old('feed_per_row', $user->feed_per_row) }}" min="1" max="10" required>
            @error('feed_per_row')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        
        <button type="submit" class="btn btn-primary mt-2">Update Settings</button>
    </form>
</div>
@endsection
