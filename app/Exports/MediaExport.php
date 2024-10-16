<?php

namespace App\Exports;

use App\Models\MediaUpload;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MediaExport implements FromCollection, WithHeadings
{
    protected $mediaUploads;

    public function __construct($mediaUploads)
    {
        $this->mediaUploads = $mediaUploads;
    }

    public function collection()
    {
        // Mengembalikan koleksi data yang telah disaring
        // dd($this->mediaUploads);
        return $this->mediaUploads->map(function ($media) {
            return [
                'file_path' => $media->file_path,
                'file_type' => $media->file_type,
                'caption' => $media->caption,
                'created_at' => $media->created_at->format('Y-m-d H:i:s'),
            ];
        });
    }

    public function headings(): array
    {
        return [
            'file_path',
            'file_type',
            'caption',
            'created_at',
        ];
    }
}
