@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                <div class="container">
                    <!-- Menampilkan pesan sukses atau error -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="error-alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>

                            <!-- Profile Section -->
                    <div class="card shadow-sm border-0">
                        <div class="card-body text-center">
                                @if($user->profile_photo)
                                    <img src="{{ asset('storage/' . $user->profile_photo) }}" class="rounded-circle mb-4 border border-primary" alt="Profile Photo" width="120" height="120">
                                @else
                                    <img src="https://via.placeholder.com/150" class="rounded-circle border border-secondary" alt="Profile Photo" width="120" height="120">
                                @endif
                                <h3 class="font-weight-bold text-primary">{{ $user->username }}</h3>
                                <p class="text-muted">{{ $user->bio ?? 'No bio available' }}</p>
                            <!-- Edit Profile -->
                            <div>
                                <!-- <a href="{{ route('profile.settings') }}" class="btn btn-outline-primary btn-lg">Edit Profile</a> -->
                                <a href="{{ route('profile.settings') }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-user-edit"></i> Edit Profile
                                </a> 
                            </div>
                        </div>
                    </div>
                            
                    

            <!-- Update Bio Form -->
            <div class="card shadow-sm border-0 mt-3 ">
                <div class="card-header shadow-sm border-0">Update Bio</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update-bio') }}">
                        @csrf
                        <div class="form-group">
                            <textarea name="bio" class="form-control" rows="3" placeholder="Write your bio...">{{ old('bio', $user->bio) }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Update Bio</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <!-- Media Upload Form -->
            <div class="card mb-3">
                <div class="card-header">Upload Photo/Video</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.upload') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="file" name="file" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <textarea name="caption" class="form-control" rows="2" placeholder="Add a caption..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Upload</button>
                    </form>
                </div>
            </div>

                <!-- Media Feed -->
                @php
                // Dapatkan jumlah feed per row dari user, default 3 jika tidak ada
                $feedPerRow = $user->feed_per_row ?? 3;
                // Hitung lebar kolom Bootstrap berdasarkan feed per row
                $colWidth = 12 / $feedPerRow;
                @endphp
                <div class="card">
                    <div class="card-header">Your Uploads</div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($mediaUploads as $media)
                                    <div class="col-md-{{ 12 / $feedPerRow }} mb-3"> <!-- Dinamis per row -->
                                        <div class="card shadow-sm" style="height: 100%;"> <!-- Card height tetap -->
                                            @if(in_array($media->file_type, ['jpg', 'jpeg', 'png']))
                                                <img src="{{ asset('storage/' . $media->file_path) }}" class="card-img-top" alt="media">
                                            @elseif(in_array($media->file_type, ['mp4', 'mov']))
                                                <video controls width="100%">
                                                    <source src="{{ asset('storage/' . $media->file_path) }}" type="video/{{ $media->file_type }}">
                                                    Your browser does not support the video tag.
                                                </video>
                                            @endif
                                            <div class="card-body d-flex flex-column"> 
                                                <p class="card-text">{{ $media->caption }}</p>
                                            <form action="{{ route('profile.media.delete', $media->id) }}" method="POST" style="display:inline;" id="delete-form-{{ $media->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <div class="input-group mb-3">
                                                    <select class="form-select w-100" name="action" onchange="handleActionChange(this, '{{ $media->id }}');">
                                                        <option value="">Actions</option>
                                                        <option value="edit">Edit Caption</option>
                                                        <option value="delete">Delete</option>
                                                    </select>
                                                </div>
                                            </form>
                                        
                                         <!-- Input untuk mengedit caption -->
                                         <form action="{{ route('profile.media.update', $media->id) }}" method="POST" id="edit-caption-form-{{ $media->id }}" style="display:none;" class="mt-2">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-md-13">
                                            <input type="text" name="caption" value="{{ $media->caption }}" class="form-control" required>
                                        </div>
                                        <div class="col-md-13 mt-2">
                                            <button type="button" class="btn btn-primary" onclick="confirmEdit('{{ $media->id }}')">Submit</button>
                                        </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Modal untuk konfirmasi Delete atau Edit Caption -->
<div class="modal fade" id="confirmActionModal" tabindex="-1" aria-labelledby="confirmActionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmActionModalLabel">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="modalMessage">Are you sure you want to proceed?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary" id="confirmActionBtn">Yes</button>
            </div>
        </div>
    </div>
</div>

<script>
function handleActionChange(selectElement, mediaId) {
    selectedAction = selectElement.value;
    selectedMediaId = mediaId;

    if (selectedAction === 'delete') {
        // Tampilkan modal konfirmasi untuk delete
        document.getElementById('modalMessage').innerText = 'Are you sure you want to delete this media?';
        const confirmModal = new bootstrap.Modal(document.getElementById('confirmActionModal'));
        confirmModal.show();
    } else if (selectedAction === 'edit') {
        // Tampilkan form edit caption tanpa modal
        document.getElementById(`edit-caption-form-${mediaId}`).style.display = 'block';
    }
}
function confirmEdit(mediaId) {
    // Tampilkan modal konfirmasi setelah pengguna menekan submit di edit caption
    document.getElementById('modalMessage').innerText = 'Are you sure you want to save this caption?';
    const confirmModal = new bootstrap.Modal(document.getElementById('confirmActionModal'));
    confirmModal.show();

    // Ketika pengguna mengkonfirmasi, submit form edit caption
    document.getElementById('confirmActionBtn').onclick = function () {
        document.getElementById(`edit-caption-form-${mediaId}`).submit();
    };
}
</script>

<!--  -->
@endsection