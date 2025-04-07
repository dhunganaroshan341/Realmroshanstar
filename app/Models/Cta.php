<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cta extends Model
{
    use HasFactory;
    // Add fields to the fillable array

    protected $table = "ctas";
    protected $primaryKey = "id";
    protected $fillable = [
        'title',
        'description',
        'button_text',
        'button_link',
        'image',
        'video',
        'video_link',
        'video_thumbnail',
        'video_title',
        'video_description',
        'video_button_text',
        'video_button_link',
        'video_button_link_text',
    ];
}
