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
      $metaInfo = Settings::first();
      return view('frontend.home.home',['sliders'=>$sliders])->with(compact('title','metaTag'));
    }

    public function page404()
    {
      return view('frontend.pages.page404');
    }
}
