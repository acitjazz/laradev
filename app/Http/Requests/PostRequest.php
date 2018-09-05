<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostRequest extends Request {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'title_id'        => 'required|min:3|max:255',
			'title_en'        => 'required|min:3|max:255',
			'image' => 'max:10000',
			'photo_source' => 'max:10000',
			'video_source' => 'max:10000',
		];
	}
}
