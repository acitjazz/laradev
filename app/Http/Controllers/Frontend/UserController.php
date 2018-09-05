<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Frontend\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Requests\UserRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\MediaRequest;
use App\Models\Post;
use App\Models\User;
use Auth;
use Request;
use Response;

class UserController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}
	public function update() {
		if (Request::ajax()) {

			$name     = $_POST['name'];
			$email    = $_POST['email'];
			$phone    = $_POST['phone'];
			$locale   = $_POST['locale'];
			
			\App::setLocale($locale);

			$user = Auth::user();
			$user->name = $name;
			$user->email = $email;
			$user->phone = $phone;
			$user->verified = true;
			$user->update();

			$data = array(
				'fail' => false,
				'message' => trans('content.thanksupdate'),
			);

			return Response::json($data);
		}
	}
}
