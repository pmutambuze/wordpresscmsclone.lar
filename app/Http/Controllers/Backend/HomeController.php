<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends BackendController
{
  /**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
    $this->middleware('auth');
	}

  public function index()
  {
    return view('backend.home.index');
  }
}
