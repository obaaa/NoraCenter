<?php
namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\Controller;
use CRUDBooster;
use NoraCenter;
use Illuminate\Http\Request;

class Website extends Controller {

  //
  public function index()
  {
    return view('index');
  }
  //
  public function about()
  {
    return view('website.about');
  }
  //
  public function to_connect()
  {
    return view('website.to_connect');
  }
  //
  public function trainers()
  {
    $data['trainers'] = DB::table('cms_users')->where('cms_users.id_cms_privileges',6)->get();
    return view('website.trainers',$data);
  }
  //
  public function events()
  {
    return view('website.events');
  }
  //
	public static function getSpecialtie($specialtie) {
    $data = [];
    $data['specialtie'] = DB::table('specialties')->where('name',$specialtie)->first();
    $data['courses'] = DB::table('courses')->where('specialties_id',$data['specialtie']->id)->get();
    dd($data);
	}

}
