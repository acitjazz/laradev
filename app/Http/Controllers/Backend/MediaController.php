<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\Controller;
use App\Http\Requests\MediaRequest;

use DB;
use Redirect;
use Request;
use Response;

use App\Models\Media;

class MediaController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}
	/**
	 * Delete Data.
	 **/

	public function delete() {
		if (Request::ajax()) {
			$data_id = $_POST['data_id'];
			$media = Media::find($data_id);
			$media->delete();
			return Response::json($data_id);
		}
	}


}
