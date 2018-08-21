<?php

namespace Selfreliance\Representatives;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libraries\UserRepresentatives\UserRepresentativesManager;
class RepresentativesAdminController extends Controller
{
	public function index(UserRepresentativesManager $ur){
		$representives = $ur->get_list(20, [0]);
		return view('representatives::table')->with(compact('representives'));
	}

	public function confirm($id, UserRepresentativesManager $ur){
		$ur->set_status($id, 1);
		\Session::flash('success', 'Пользователь добавлен в публичный список');
        return redirect()->back();
	}
}