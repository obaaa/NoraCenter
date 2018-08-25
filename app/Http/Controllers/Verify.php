<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use App\Http\Controllers\Controller;

class Verify extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function __invoke($verify)
    {
        $certificates_details = DB::table('certificates_details')
						  ->where('verify',$verify)
                          ->first();
                          
        $trainee = DB::table('cms_users')
                 ->where('id',$certificates_details->trainees_id)
				 ->first();
		
		$group = DB::table('groups')
			->where('id',DB::table('certificates')->where('id',$certificates_details->certificates_id)->value('groups_id'))
			->first(); #classroom_lectures_id
						  
		$course = DB::table('courses')
                          ->where('id',$group->course->id)
						  ->first();
		
		$group_start    = DB::table('classroom_lectures_reserveds')
                          ->where('groups_id',$group->id)
                          ->min('date');

        $group_end      = DB::table('classroom_lectures_reserveds')
                          ->where('groups_id',$group->id)
						  ->max('date');
						  
		
						  
		$data['trainee_photo'] = $trainee->photo;
        $data['trainee_id']    = $trainee->id;
		$data['trainee_name']  = $trainee->name_english;

		$data['groups_id']  = $group->id;
		
		$data['course_name']   = $course->name;

		$data['verify']   = $verify;
		
        $data['group_start']   = $group_start;
		$data['group_end']     = $group_end;
		
		$data['degree']         = $certificates_details->degree;
		
		return view('result.print',$data);
    }
}