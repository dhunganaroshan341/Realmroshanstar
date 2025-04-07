<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CtaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Customize this based on your needs
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:500',
            'button_text' => 'nullable|string|max:100',
            'button_link' => 'nullable|url|max:255',

            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',

            'video' => 'nullable|file|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:51200', // 50MB
            'video_link' => 'nullable|url|max:255',

            'video_thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',

            'video_title' => 'nullable|string|max:255',
            'video_description' => 'nullable|string|max:500',
            'video_button_text' => 'nullable|string|max:100',
            'video_button_link' => 'nullable|url|max:255',
            'video_button_link_text' => 'nullable|string|max:100',
        ];
    }

    /**
     * Custom error messages for validation.
     */
    public function messages(): array
    {
        return [
            // Image
            'image.image' => 'Please upload a valid image.',
            'image.mimes' => 'Allowed image types: jpeg, png, jpg, gif, svg, webp.',
            'image.max' => 'Image must be under 2MB.',

            // Video
            'video.file' => 'Please upload a valid video file.',
            'video.mimetypes' => 'Allowed video formats: mp4, avi, mpeg, quicktime.',
            'video.max' => 'Video must be under 50MB.',

            // Thumbnail
            'video_thumbnail.image' => 'Thumbnail must be an image.',
            'video_thumbnail.mimes' => 'Allowed types: jpeg, png, jpg, gif, svg, webp.',
            'video_thumbnail.max' => 'Thumbnail must be under 2MB.',

            // URLs
            'button_link.url' => 'Button link must be a valid URL.',
            'video_link.url' => 'Video link must be a valid URL.',
            'video_button_link.url' => 'Video button link must be a valid URL.',

            // Text limits
            'title.max' => 'Title should not exceed 255 characters.',
            'description.max' => 'Description should not exceed 500 characters.',
            'button_text.max' => 'Button text should not exceed 100 characters.',
            'video_title.max' => 'Video title should not exceed 255 characters.',
            'video_description.max' => 'Video description should not exceed 500 characters.',
            'video_button_text.max' => 'Video button text should not exceed 100 characters.',
            'video_button_link_text.max' => 'Video button link text should not exceed 100 characters.',
        ];
    }
}
