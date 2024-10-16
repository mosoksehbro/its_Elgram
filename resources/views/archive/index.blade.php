@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Archive</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Form Filter dan Download -->
    <form method="POST" action="{{ route('archive.download') }}">
        @csrf
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="date_from">Date From</label>
                <input type="date" name="date_from" id="date_from" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="date_to">Date To</label>
                <input type="date" name="date_to" id="date_to" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="format">Format</label>
                <select name="format" id="format" class="form-control" required>
                    <option value="">Select Format</option>
                    <option value="xlsx">XLSX</option>
                    <option value="pdf">PDF</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Download Archive</button>
    </form>

    <h3 class="mt-4">Media List</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Media</th>
                <th>Created At</th>
                <th>Caption</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mediaUploads as $media)
                <tr>
                    <td>
                        @if(in_array($media->file_type, ['jpg', 'jpeg', 'png']))
                            <img src="{{ asset('storage/' . $media->file_path) }}" alt="media" width="100">
                        @elseif(in_array($media->file_type, ['mp4', 'mov']))
                            <video width="100" controls>
                                <source src="{{ asset('storage/' . $media->file_path) }}" type="video/{{ $media->file_type }}">
                                Your browser does not support the video tag.
                            </video>
                        @endif
                    </td>
                    <td>{{ $media->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>{{ $media->caption }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
