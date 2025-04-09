<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryAlbumRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'type' => 'required|in:image,video,pdf,doc,none',
            'client_id' => 'nullable|exists:clients,id',
            'status' => 'required|in:Active,Inactive',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The album title is required.',
            'title.string' => 'The album title must be a valid string.',
            'title.max' => 'The album title cannot exceed 255 characters.',

            'type.required' => 'Please select a valid album type.',
            'type.in' => 'The selected type must be one of: image, video, pdf, doc, or none.',

            'client_id.exists' => 'The selected client does not exist.',

            'status.required' => 'The album status is required.',
            'status.in' => 'The status must be either Active or Inactive.',
        ];
    }
}
