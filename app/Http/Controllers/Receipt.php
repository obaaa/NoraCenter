<?php
namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\Controller;
use CRUDBooster;
use NoraCenter;
use Request;

class Receipt extends Controller {

  // 1
	public static function registerFees($groups_id, $trainees_id) {
    $movement_money_trainee = DB::table('movement_money_trainees')
        ->where('groups_id',$groups_id)
        ->where('trainees_id',$trainees_id)
        ->where('type','register_fees')
        ->first();

    $data = [];
    $data['receipt_id']   = $movement_money_trainee->id;
    $data['created_at']   = $movement_money_trainee->created_at;
    $data['trainee_name'] = DB::table('cms_users')->where('id',$trainees_id)->value('name');
    $data['money']        = $movement_money_trainee->money;
    $data['type']         = trans('crudbooster.register_fees');
    $data['group_name']   = DB::table('groups')->where('id',$groups_id)->value('name');
    $data['created_by']   =  DB::table('cms_users')->where('id',$movement_money_trainee->created_by)->value('name');
    return view('receipt.receipt_ac',$data);
	}

  // 2
	public static function groupFees($groups_id, $trainees_id) {
    $movement_money_trainee = DB::table('movement_money_trainees')
        ->where('groups_id',$groups_id)
        ->where('trainees_id',$trainees_id)
        ->where('type','fees')
        ->get()->last();

    $data = [];
    $data['receipt_id']   = $movement_money_trainee->id;
    $data['created_at']   = $movement_money_trainee->created_at;
    $data['trainee_name'] = DB::table('cms_users')->where('id',$trainees_id)->value('name');
    $data['money']        = $movement_money_trainee->money;
    $data['type']         = trans('crudbooster.group_fees');
    $data['group_name']   = DB::table('groups')->where('id',$groups_id)->value('name');
    $data['created_by']   =  DB::table('cms_users')->where('id',$movement_money_trainee->created_by)->value('name');
    return view('receipt.receipt_ac',$data);
	}

  // 3
	public static function certificateFees($groups_id, $trainees_id) {
    $movement_money_trainee = DB::table('movement_money_trainees')
        ->where('groups_id',$groups_id)
        ->where('trainees_id',$trainees_id)
        ->where('type','certificate_fees')
        ->first();

    $data = [];
    $data['receipt_id']   = $movement_money_trainee->id;
    $data['created_at']   = $movement_money_trainee->created_at;
    $data['trainee_name'] = DB::table('cms_users')->where('id',$trainees_id)->value('name');
    $data['money']        = $movement_money_trainee->money;
    $data['type']         = trans('crudbooster.certificate_fees');
    $data['group_name']   = DB::table('groups')->where('id',$groups_id)->value('name');
    $data['created_by']   =  DB::table('cms_users')->where('id',$movement_money_trainee->created_by)->value('name');
    return view('receipt.receipt_ac',$data);
	}

  // 3
  public static function traineersGroupFees($groups_id) {
    $movement_money_trainers = DB::table('movement_money_trainers')
        ->where('groups_id',$groups_id)
        ->where('type','groups_fees')
        ->get()->last();

    $data = [];
    $data['receipt_id']   = $movement_money_trainers->id;
    $data['created_at']   = $movement_money_trainers->created_at;
    $trainers_id = DB::table('groups')->where('id',$groups_id)->value('trainers_id');
    $data['trainer_name'] = DB::table('cms_users')->where('id',$trainers_id)->value('name');
    $data['money']        = $movement_money_trainers->money;
    $data['type']         = trans('crudbooster.group_fees');
    $data['group_name']   = DB::table('groups')->where('id',$groups_id)->value('name');
    $data['created_by']   =  DB::table('cms_users')->where('id',$movement_money_trainers->created_by)->value('name');
    return view('receipt.receipt_trainer',$data);
  }

}
