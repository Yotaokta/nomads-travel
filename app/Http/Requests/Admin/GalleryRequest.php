<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
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

    public function rules(): Array
    {
        return [
            'travel_package_id' => 'required|integer|exists:travel_package,id',
            'image' => 'required|image'
        ];
    }

}
