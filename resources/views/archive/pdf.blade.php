<!DOCTYPE html>
<html>
<head>
    <title>Archive PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Media Archive</h1>
    <table>
        <thead>
            <tr>
                <th>Media</th>
                <th>Created At</th>
                <th>Caption</th>
            </tr>
        </thead>
        <tbody>
            @forelse($mediaUploads as $media)
                <tr>
                    <td>
                        @if(in_array($media->file_type, ['jpg', 'jpeg', 'png']))
                            <!-- {{ asset('storage/' . $media->file_path) }} -->
                            <img src="{{ asset('storage/' . $media->file_path) }}" alt="media" width="100">
                            <!-- <img src="{{ public_path('storage/' . $media->file_path) }}" alt="media" width="100"> -->
                            <!-- <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(asset('storage/' . $media->file_path))) }}" alt="media" width="100"> -->
                        @elseif(in_array($media->file_type, ['mp4', 'mov']))
                            Video
                        @endif
                    </td>
                    <td>{{ $media->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>{{ $media->caption }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No media found for the selected date range.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
