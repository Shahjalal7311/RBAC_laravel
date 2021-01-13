<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use DB;
use Session;


class FrontendController extends Controller
{
    public function index()
    {
      return view('frontend.home.home');
    }

    public function page404()
    {
      return view('frontend.pages.page404');
    }
}
