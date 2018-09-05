<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MediaRequest extends Request
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
     * @return array
     */
    public function rules()
    {
        return [
          'image_upload' => 'max:5000',
          'image' => 'max:5000',
          'avatar' => 'max:5000',
        ];
    }
}
