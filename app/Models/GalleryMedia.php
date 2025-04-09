<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'gallery_album_id',
        'media_path',
        'status',
    ];

    /**
     * Relationship: Media item belongs to a Gallery Album.
     */
    public function galleryAlbum()
    {
        return $this->belongsTo(GalleryAlbum::class, 'gallery_album_id', 'id');
    }

    /**
     * Optional: Enum casting (if using enums for status)
     */
    // protected $casts = [
    //     'status' => MediaStatusEnum::class,
    // ];
}
