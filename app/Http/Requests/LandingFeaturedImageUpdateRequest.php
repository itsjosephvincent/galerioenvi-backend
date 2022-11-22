<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LandingFeaturedImageUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if (isset($this->image_url)) {
            return [
                'name' => 'required',
                'image_url' => 'required|image|mimes:jpg,png,gif,jpeg,webp'
            ];
        } else {
            return [
                'name' => 'required'
            ];
        }
    }
}
