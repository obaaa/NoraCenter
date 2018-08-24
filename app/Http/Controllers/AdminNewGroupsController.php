<?php namespace App\Http\Controllers;

	use Session;
	use Illuminate\Http\Request;
	use DB;
	use CRUDBooster;
  use NoraCenter;
  use App\Http\Controllers\Notification;

	class AdminNewGroupsController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "name";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = true;
			$this->button_table_action = true;
			$this->button_bulk_action = false;
			$this->button_action_style = "icon";
			$this->button_add = true;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = false;
			$this->button_show = false;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "groups";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Group NO","name"=>"id"];
			$this->col[] = ["label"=>"Name","name"=>"name"];
			$this->col[] = ["label"=>"Fees","name"=>"fees"];
			$this->col[] = ["label"=>"Branches","name"=>"branches_id","join"=>"branches,name"];
			$this->col[] = ["label"=>"Details","name"=>"proposed_time"];
			// $this->col[] = ["label"=>"Seats","name"=>"trainee_max"];
			$this->col[] = ["label"=>"Vacant Seats","name"=>"vacant_seats"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
      if (CRUDBooster::getCurrentMethod() == 'getAdd') {
        // code...
        $this->form[] = ['label'=>'Branche','name'=>'branches_id','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-8','datatable'=>'branches,name'];
        $this->form[] = ['label'=>'Specialtie','name'=>'specialties_id','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-8','datatable'=>'specialties,name'];
        $this->form[] = ['label'=>'Course','name'=>'courses_id','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-8','datatable'=>'courses,name','parent_select'=>'specialties_id'];
      }else {
        $this->form[] = ['label'=>'Branche','name'=>'branches_id','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-8','datatable'=>'branches,name','disabled'=>'1'];
        $this->form[] = ['label'=>'Course','name'=>'courses_id','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-8','datatable'=>'courses,name','disabled'=>'1'];
      }

      $this->form[] = ['label'=>'Seats','name'=>'trainee_max','type'=>'number','validation'=>'required|integer|min:1','width'=>'col-sm-3'];
			$this->form[] = ['label'=>'Fees','name'=>'fees','type'=>'money','validation'=>'required|integer','width'=>'col-sm-3'];
			$this->form[] = ['label'=>'Register Fees','name'=>'register_fees','type'=>'money','validation'=>'required|integer','width'=>'col-sm-3'];
			$this->form[] = ['label'=>'Certificate Fees','name'=>'certificate_fees','type'=>'money','validation'=>'required|integer','width'=>'col-sm-3'];
			$this->form[] = ['label'=>'Details','name'=>'proposed_time','type'=>'textarea','validation'=>'required|string|min:5|max:255','width'=>'col-sm-8'];
			$this->form[] = ['label'=>'Publication','name'=>'publication','type'=>'select','validation'=>'required','width'=>'col-sm-3','dataenum'=>'1|on;0|of'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Branche','name'=>'branches_id','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-8','datatable'=>'branches,name'];
			//$this->form[] = ['label'=>'Specialtie','name'=>'specialties_id','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-8','datatable'=>'specialties,name'];
			//$this->form[] = ['label'=>'Course','name'=>'courses_id','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-8','datatable'=>'courses,name','parent_select'=>'specialties_id'];
			//$this->form[] = ['label'=>'Seats','name'=>'trainee_max','type'=>'number','validation'=>'required|integer|min:1','width'=>'col-sm-3'];
			//$this->form[] = ['label'=>'Fees','name'=>'fees','type'=>'money','validation'=>'required|integer','width'=>'col-sm-3'];
			//$this->form[] = ['label'=>'Register Fees','name'=>'register_fees','type'=>'money','validation'=>'required|integer','width'=>'col-sm-3'];
			//$this->form[] = ['label'=>'Certificate Fees','name'=>'certificate_fees','type'=>'money','validation'=>'required|integer','width'=>'col-sm-3'];
			//$this->form[] = ['label'=>'Details','name'=>'proposed_time','type'=>'textarea','validation'=>'required|string|min:5|max:255','width'=>'col-sm-8'];
			//$this->form[] = ['label'=>'Publication','name'=>'publication','type'=>'select','validation'=>'required','width'=>'col-sm-3'];
			# OLD END FORM

			/*
	        | ----------------------------------------------------------------------
	        | Sub Module
	        | ----------------------------------------------------------------------
			| @label          = Label of action
			| @path           = Path of sub module
			| @foreign_key 	  = foreign key of sub table/module
			| @button_color   = Bootstrap Class (primary,success,warning,danger)
			| @button_icon    = Font Awesome Class
			| @parent_columns = Sparate with comma, e.g : name,created_at
	        |
	        */
	        $this->sub_module = array();


	        /*
	        | ----------------------------------------------------------------------
	        | Add More Action Button / Menu
	        | ----------------------------------------------------------------------
	        | @label       = Label of action
	        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
	        | @icon        = Font awesome class icon. e.g : fa fa-bars
	        | @color 	   = Default is primary. (primary, warning, succecss, info)
	        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
	        |
	        */
	        $this->addaction = array();
          $this->addaction[] = ['label'=>'booking','url'=>CRUDBooster::mainpath('booking/[id]'),'icon'=>'fa fa-send','color'=>'primary'];
          $this->addaction[] = ['label'=>'Trainees','url'=>CRUDBooster::mainpath('trainees/[id]'),'icon'=>'fa fa-users','color'=>'success'];

	        /*
	        | ----------------------------------------------------------------------
	        | Add More Button Selected
	        | ----------------------------------------------------------------------
	        | @label       = Label of action
	        | @icon 	   = Icon from fontawesome
	        | @name 	   = Name of button
	        | Then about the action, you should code at actionButtonSelected method
	        |
	        */
	        $this->button_selected = array();


	        /*
	        | ----------------------------------------------------------------------
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------
	        | @message = Text of message
	        | @type    = warning,success,danger,info
	        |
	        */
	        $this->alert        = array();



	        /*
	        | ----------------------------------------------------------------------
	        | Add more button to header button
	        | ----------------------------------------------------------------------
	        | @label = Name of button
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        |
	        */
	        $this->index_button = array();



	        /*
	        | ----------------------------------------------------------------------
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.
	        |
	        */
	        $this->table_row_color = array();


	        /*
	        | ----------------------------------------------------------------------
	        | You may use this bellow array to add statistic at dashboard
	        | ----------------------------------------------------------------------
	        | @label, @count, @icon, @color
	        |
	        */
	        $this->index_statistic = array();



	        /*
	        | ----------------------------------------------------------------------
	        | Add javascript at body
	        | ----------------------------------------------------------------------
	        | javascript code in the variable
	        | $this->script_js = "function() { ... }";
	        |
	        */
	        $this->script_js = NULL;


            /*
	        | ----------------------------------------------------------------------
	        | Include HTML Code before index table
	        | ----------------------------------------------------------------------
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
	        $this->pre_index_html = null;



	        /*
	        | ----------------------------------------------------------------------
	        | Include HTML Code after index table
	        | ----------------------------------------------------------------------
	        | html code to display it after index table
	        | $this->post_index_html = "<p>test</p>";
	        |
	        */
	        $this->post_index_html = null;



	        /*
	        | ----------------------------------------------------------------------
	        | Include Javascript File
	        | ----------------------------------------------------------------------
	        | URL of your javascript each array
	        | $this->load_js[] = asset("myfile.js");
	        |
	        */
	        $this->load_js = array();



	        /*
	        | ----------------------------------------------------------------------
	        | Add css style at body
	        | ----------------------------------------------------------------------
	        | css code in the variable
	        | $this->style_css = ".style{....}";
	        |
	        */
	        $this->style_css = NULL;



	        /*
	        | ----------------------------------------------------------------------
	        | Include css File
	        | ----------------------------------------------------------------------
	        | URL of your css each array
	        | $this->load_css[] = asset("myfile.css");
	        |
	        */
	        $this->load_css = array();


	    }


	    /*
	    | ----------------------------------------------------------------------
	    | Hook for button selected
	    | ----------------------------------------------------------------------
	    | @id_selected = the id selected
	    | @button_name = the name of button
	    |
	    */
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here

	    }


	    /*
	    | ----------------------------------------------------------------------
	    | Hook for manipulate query of index result
	    | ----------------------------------------------------------------------
	    | @query = current sql query
	    |
	    */
	    public function hook_query_index(&$query) {
	        //Your code here
          $query->where('groups.status','open');
	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for manipulate row of index table html
	    | ----------------------------------------------------------------------
	    |
	    */
	    public function hook_row_index($column_index,&$column_value) {
	    	//Your code here
	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for manipulate data input before add data is execute
	    | ----------------------------------------------------------------------
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {
	        //Your code here
          $postdata['name'] = DB::table('branches')->where('id', $postdata['branches_id'])->value('name')." - ".DB::table('courses')->where('id', $postdata['courses_id'])->value('name');
          $postdata['vacant_seats'] = $postdata['trainee_max'];
          unset($postdata['specialties_id']);
	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for execute command after add public static function called
	    | ----------------------------------------------------------------------
	    | @id = last insert id
	    |
	    */
	    public function hook_after_add($id) {


	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for manipulate data input before update data is execute
	    | ----------------------------------------------------------------------
	    | @postdata = input post data
	    | @id       = current id
	    |
	    */
	    public function hook_before_edit(&$postdata,$id) {

          if ($postdata['trainee_max'] < DB::table('groups')->where('id',$id)->value('vacant_seats')) {
            CRUDBooster::redirectBack('trainee_max < vacant_seats');
          }

	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------
	    | @id       = current id
	    |
	    */
	    public function hook_after_edit($id) {
	        //Your code here

	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------
	    | @id       = current id
	    |
	    */
	    public function hook_before_delete($id) {
	        //Your code here
          if (DB::table('groups_trainees')->where('groups_id',$id)->first()) {
            CRUDBooster::redirect(CRUDBooster::adminPath('new_groups'),'You can not delete a group that contains trainees','danger');
          }

	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------
	    | @id       = current id
	    |
	    */
	    public function hook_after_delete($id) {
	        //Your code here

	    }



	    //By the way, you can still create your own method in here... :)

      public function getDetail($id) {
        // $this->cbLoader();
        // $module = CRUDBooster::getCurrentModule();
        // $row = DB::table($this->table)->where($this->primary_key, $id)->first();
        // if (! CRUDBooster::isView()) {
        //     CRUDBooster::insertLog(trans('crudbooster.log_try_view', ['name' => $row->{$this->title_field},'module' => $module->name]));
        //     CRUDBooster::redirect(CRUDBooster::adminPath(), trans('crudbooster.denied_access'));
        // }


        //   // code...
        //   $data = [];
        //   // return view('crudbooster::group_details.step1', $data);
        //   $this->cbLoader();
        //   // dd(CRUDBooster::myPrivilegeName());
        //   // if (! CRUDBooster::isSuperadmin() || !CRUDBooster::myPrivilegeName() == "Manager") {
        //   //     CRUDBooster::insertLog(trans("crudbooster.log_try_view", ['name' => 'Setting', 'module' => 'Setting']));
        //   //     CRUDBooster::redirect(CRUDBooster::adminPath(), trans('crudbooster.denied_access'));
        //   // }
        //
        //   // $data['page_title'] = 'Application Setting';
        //   return view('crudbooster::group_details.step1', $data);
      }

      public function getBooking($groups_id) {
        $this->cbLoader();
        $module = CRUDBooster::getCurrentModule();
        $row = DB::table($this->table)->where($this->primary_key, $id)->first();
        if (! CRUDBooster::isView()) {
            CRUDBooster::insertLog(trans('crudbooster.log_try_view', ['name' => $row->{$this->title_field},'module' => $module->name]));
            CRUDBooster::redirect(CRUDBooster::adminPath(), trans('crudbooster.denied_access'));
        }

        $data = [];
        $data['group'] = DB::table('groups')->where('id', $groups_id)->first();
        $cms_users_ids = DB::table('trainer_courses')->where('courses_id', $data['group']->courses_id)->pluck('cms_users_id');
        if (! $cms_users_ids) {
          CRUDBooster::redirect(CRUDBooster::adminPath('new_groups'),'No Trainer for this course. Please add trainers for the course first','warning');
        }
        $data['trainers'] = DB::table('cms_users')->whereIn('id',$cms_users_ids)->get();


        $bookingSet = NoraCenter::getBookingSet($groups_id);

        $data['fullBooking'] = collect($bookingSet['fullBooking'])->groupBy('classroom')->toArray();
        $data['smwBooking'] = collect($bookingSet['smwBooking'])->groupBy('classroom')->toArray();
        $data['sttBooking'] = collect($bookingSet['sttBooking'])->groupBy('classroom')->toArray();

        $data['page_title'] = "Booking";
        // dd($data['fullBooking']);
        $this->cbView('group.booking.get_booking',$data);
      }

      // saveBooking //
      public function saveBooking(Request $request) {
        // check
        $this->cbLoader();
        $module = CRUDBooster::getCurrentModule();
        $row = DB::table($this->table)->where($this->primary_key, $request->group_id)->first();
        if (! CRUDBooster::isUpdate()) {
            CRUDBooster::insertLog(trans('crudbooster.log_try_view', ['name' => $row->{$this->title_field},'module' => $module->name]));
            CRUDBooster::redirect(CRUDBooster::adminPath(), trans('crudbooster.denied_access'));
        }

        // "group_id" trainers_id" // "percentage_of_trainer" //  "$booking_type" // "classroom_lecture"

        $groups_id = $request->group_id;
        $fields = explode(',', $request->classroom_lecture);
        $classroom_lecture_id = $fields[0];
        $start_day = $fields[1]; # reservation_from_day
        $booking_type = $fields[2]; # BOOKING
        $trainers_id = $request->trainers_id;
        $percentage_of_trainer = $request->percentage_of_trainer;

        NoraCenter::saveBookingData(
          $groups_id,
          $classroom_lecture_id,
          $start_day,
          $booking_type,
          $trainers_id,
          $percentage_of_trainer
        );



        // sendNotification to trainer
        // sendNotification to traineers
        // sendNotification to admin


        // add degrees

        CRUDBooster::redirect(CRUDBooster::adminPath('groups/details/'.$group->id),'Good work group has been added successfully SMW','success');

      }

      //
      public function getGroupTrainees($groups_id) {
        // check

        $data = [];
        $data['group'] = DB::table('groups')->where('id',$groups_id)->first();
        $trainees = DB::table('cms_users')->whereIn('id',NoraCenter::getTraineesgroupIds($groups_id))->select('id','name','phone_number')->get();
        $key = 0;
        foreach ($trainees as $trainee) {
          $data['trainees'][$key]['id'] = $trainee->id;
          $data['trainees'][$key]['name'] = $trainee->name;
          $data['trainees'][$key]['phone_number'] = $trainee->phone_number;
          $data['trainees'][$key]['groups_trainee'] = DB::table('groups_trainees')->where('groups_id',$groups_id)->where('trainees_id',$trainee->id)->select('register_fees', 'fees_remaining', 'certificate_fees', 'certificate_status','status', 'disscount_value')->first();
          $key++;
        }
        $data['trainees_not_in'] = DB::table('cms_users')->where('id_cms_privileges',7)->whereNotIn('id',NoraCenter::getTraineesgroupIds($groups_id))->select('id','name','phone_number')->get()->toArray();
        $data['page_title'] = "Groups Trainees";
        // var_dump($data['trainees']);

        $this->cbView('group.group_trainees',$data);
      }

      // groups_id trainee
      public function addGroupTrainees(Request $request) {
        // check
        $this->cbLoader();
        $module = CRUDBooster::getCurrentModule();
        $row = DB::table($this->table)->where($this->primary_key, $request->groups_id)->first();
        if (! CRUDBooster::isUpdate()) {
            CRUDBooster::insertLog(trans('crudbooster.log_try_view', ['name' => $row->{$this->title_field},'module' => $module->name]));
            CRUDBooster::redirect(CRUDBooster::adminPath(), trans('crudbooster.denied_access'));
        }

        $groups_id  = $request->groups_id;
        $trainee    = $request->trainee;

        $trainee = explode('-', $trainee);
        $trainee_name = $trainee[0];
        $trainee_phone_number = $trainee[1]; # reservation_from_day
        $trainees_id = DB::table('cms_users')->where('name',$trainee_name)->where('phone_number',$trainee_phone_number)->value('id');
        if (!$trainees_id) {
          // code...
          CRUDBooster::redirect(CRUDBooster::adminPath('new_groups/trainees/'.$groups_id),'Wrong entry. Stop doing this!','warning');
        }
        // addTraineesGroup
        $result = NoraCenter::addTraineesGroup($groups_id, $trainees_id);
        if (!$result) {
          CRUDBooster::redirect(CRUDBooster::adminPath('new_groups/trainees/'.$groups_id),'Wrong Add','warning');
        }

        // Notification
        $postdata = [];
        $postdata['id_cms_users'] = $trainees_id;
        $postdata['groups_name'] = DB::table('groups')->where('id',$groups_id)->value('name');
        Notification::startGroupTrainee($postdata);

        // add log
        CRUDBooster::insertLog(trans("notification.logAddGroupTrainee", ['trainee_name'=>$trainee_name,'groups_name'=>$postdata['groups_name']]));

        CRUDBooster::redirect(CRUDBooster::adminPath('new_groups/trainees/'.$groups_id),'Good work, trainee has been added successfully','success');

      }

      // groups_id trainee
      public function deleteGroupTrainees($groups_id, $trainees_id) {
        // check
        $this->cbLoader();
        $module = CRUDBooster::getCurrentModule();
        $row = DB::table($this->table)->where($this->primary_key, $groups_id)->first();
        if (! CRUDBooster::isUpdate()) {
            CRUDBooster::insertLog(trans('crudbooster.log_try_view', ['name' => $row->{$this->title_field},'module' => $module->name]));
            CRUDBooster::redirect(CRUDBooster::adminPath(), trans('crudbooster.denied_access'));
        }

        $result = NoraCenter::deleteTraineesGroup($groups_id, $trainees_id);
        if (!$result) {
          CRUDBooster::redirect(CRUDBooster::adminPath('new_groups/trainees/'.$groups_id),'Wrong Delete','warning');
        }
          // Notification
          $postdata = [];
          $postdata['id_cms_users'] = $trainees_id;
          $postdata['groups_name'] = DB::table('groups')->where('id',$groups_id)->value('name');
          Notification::deleteGroupTrainee($postdata);

          // add log
          CRUDBooster::insertLog(trans("notification.logDeleteGroupTrainee", ['trainee_name'=>DB::table('cms_users')->where('id',$trainees_id)->value('name'),'groups_name'=>$postdata['groups_name']]));

          CRUDBooster::redirect(CRUDBooster::adminPath('new_groups/trainees/'.$groups_id),'Good work, trainee has been Deleted successfully','success');

      }

      // addRegisterFeesTrainees
      public function payRegisterFeesTrainees($groups_id, $trainees_id) {
        // check
        $this->cbLoader();
        $module = CRUDBooster::getCurrentModule();
        $row = DB::table($this->table)->where($this->primary_key, $groups_id)->first();
        if (! CRUDBooster::isUpdate()) {
            CRUDBooster::insertLog(trans('crudbooster.log_try_view', ['name' => $row->{$this->title_field},'module' => $module->name]));
            CRUDBooster::redirect(CRUDBooster::adminPath(), trans('crudbooster.denied_access'));
        }

        $result = NoraCenter::payFeesTrainee($trainees_id, $groups_id, 'register_fees');
        if (!$result) {
          CRUDBooster::redirect(CRUDBooster::adminPath('new_groups/trainees/'.$groups_id),'Wrong Bay','warning');
        }

        $group = DB::table('groups')->where('id',$groups_id)->first();
        $trainee_name = DB::table('cms_users')->where('id',$trainees_id)->value('name');


          // Notification
          $postdata = [];
          $postdata['id_cms_users'] = $trainees_id;
          $postdata['groups_name'] = $group->name;
          $postdata['amount'] = $group->register_fees;
          Notification::payRegisterFeesTrainees($postdata);

          // add log user amount trainee_name groups_name
          CRUDBooster::insertLog(trans("notification.logPayRegisterFeesTrainees", ['trainee_name'=>$trainee_name,'groups_name'=>$group->name,'amount' => $group->register_fees]));
        //
          CRUDBooster::redirect(CRUDBooster::adminPath('new_groups/trainees/'.$groups_id),'Good work, trainee has been Payment successfully','success');

      }

      // payCertificatesFeesTrainees
      public function payCertificatesFeesTrainees($groups_id, $trainees_id) {
        // check
        $this->cbLoader();
        $module = CRUDBooster::getCurrentModule();
        $row = DB::table($this->table)->where($this->primary_key, $groups_id)->first();
        if (! CRUDBooster::isUpdate()) {
            CRUDBooster::insertLog(trans('crudbooster.log_try_view', ['name' => $row->{$this->title_field},'module' => $module->name]));
            CRUDBooster::redirect(CRUDBooster::adminPath(), trans('crudbooster.denied_access'));
        }

        $result = NoraCenter::payFeesTrainee($trainees_id, $groups_id, 'certificate_fees');
        if (!$result) {
          CRUDBooster::redirect(CRUDBooster::adminPath('new_groups/trainees/'.$groups_id),'Wrong Bay','warning');
        }

        $group = DB::table('groups')->where('id',$groups_id)->first();
        $trainee_name = DB::table('cms_users')->where('id',$trainees_id)->value('name');


          // Notification
          $postdata = [];
          $postdata['id_cms_users'] = $trainees_id;
          $postdata['groups_name'] = $group->name;
          $postdata['amount'] = $group->register_fees;
          Notification::payCertificatesFeesTrainees($postdata);

          // add log user amount trainee_name groups_name
          CRUDBooster::insertLog(trans("notification.logPayCertificatesFeesTrainees", ['trainee_name'=>$trainee_name,'groups_name'=>$group->name,'amount' => $group->register_fees]));
        //
          CRUDBooster::redirect(CRUDBooster::adminPath('new_groups/trainees/'.$groups_id),'Good work, trainee has been Payment successfully','success');

      }

      // getGroupsFeesTrainees
      public function getGroupsFeesTrainees($groups_id, $trainees_id) {
        // check
        $this->cbLoader();
        $module = CRUDBooster::getCurrentModule();
        $row = DB::table($this->table)->where($this->primary_key, $groups_id)->first();
        if (! CRUDBooster::isView()) {
            CRUDBooster::insertLog(trans('crudbooster.log_try_view', ['name' => $row->{$this->title_field},'module' => $module->name]));
            CRUDBooster::redirect(CRUDBooster::adminPath(), trans('crudbooster.denied_access'));
        }
          $data = [];
          $data['page_title'] = "Group Fees Trainee";
          $data['groups_name'] = DB::table('groups')->where('id', $groups_id)->value('name');
          $data['trainees_name'] = DB::table('cms_users')->where('id', $trainees_id)->value('name');
          $data['groups_trainee'] = DB::table('groups_trainees')->where('groups_id',$groups_id)->where('trainees_id',$trainees_id)->first();

          $this->cbView('group.groups_pay',$data);

      }

      // payGroupsFeesTrainees
      public function payGroupsFeesTrainees(Request $request) {
        // check groups_id trainees_id disscount_value money
        $this->cbLoader();
        $module = CRUDBooster::getCurrentModule();
        $row = DB::table($this->table)->where($this->primary_key, $request->groups_id)->first();
        if (! CRUDBooster::isUpdate()) {
            CRUDBooster::insertLog(trans('crudbooster.log_try_view', ['name' => $row->{$this->title_field},'module' => $module->name]));
            CRUDBooster::redirect(CRUDBooster::adminPath(), trans('crudbooster.denied_access'));
        }
        $result = NoraCenter::payFeesTrainee($request->trainees_id, $request->groups_id, 'fees', $request->money, $request->disscount_value);
        if (!$result) {
          CRUDBooster::redirect(CRUDBooster::adminPath('new_groups/trainees/'.$request->groups_id),'Wrong Bay','warning');
        }

        $group = DB::table('groups')->where('id',$request->groups_id)->first();
        $trainee_name = DB::table('cms_users')->where('id',$request->trainees_id)->value('name');


          // Notification
          if ($request->money != 0) {
            $postdata = [];
            $postdata['id_cms_users'] = $trainees_id;
            $postdata['groups_name'] = $group->name;
            $postdata['amount'] = $request->money;
            Notification::payGroupsFeesTrainees($postdata);
          }

          // add log user amount trainee_name groups_name
          CRUDBooster::insertLog(trans("notification.logPayGroupsFeesTrainees", ['trainee_name'=>$trainee_name,'groups_name'=>$group->name,'amount' => $group->register_fees]));
        //
          CRUDBooster::redirect(CRUDBooster::adminPath('new_groups/trainees/'.$request->groups_id),'Good work, trainee has been Payment successfully','success');

      }

      // getConvertGroupsTrainees
      public function getConvertGroupsTrainees($groups_id, $trainees_id) {
        // check
        $this->cbLoader();
        $module = CRUDBooster::getCurrentModule();
        $row = DB::table($this->table)->where($this->primary_key, $groups_id)->first();
        if (! CRUDBooster::isView()) {
            CRUDBooster::insertLog(trans('crudbooster.log_try_view', ['name' => $row->{$this->title_field},'module' => $module->name]));
            CRUDBooster::redirect(CRUDBooster::adminPath(), trans('crudbooster.denied_access'));
        }
          $data = [];
          $data['page_title'] = "Convert Group Trainee";
          $data['group'] = DB::table('groups')->where('id', $groups_id)->first();
          $data['groups'] = DB::table('groups')->where('status','!=','finished')->where('vacant_seats','!=',0)->get();
          $data['trainee'] = DB::table('cms_users')->where('id', $trainees_id)->first();

          $this->cbView('group.convert_groups_trainees',$data);

      }

      // ConvertGroupsTrainees
      public function ConvertGroupsTrainees(Request $request) {
        // check
        $this->cbLoader();
        $module = CRUDBooster::getCurrentModule();
        $row = DB::table($this->table)->where($this->primary_key, $groups_id)->first();
        if (! CRUDBooster::isView()) {
            CRUDBooster::insertLog(trans('crudbooster.log_try_view', ['name' => $row->{$this->title_field},'module' => $module->name]));
            CRUDBooster::redirect(CRUDBooster::adminPath(), trans('crudbooster.denied_access'));
        }

        $fields = explode('_', $request->to_group);
        $to_group_id = $fields[0];

        $current_group = DB::table('groups')->where('id',$request->current_group_id)->first();
        $to_group = DB::table('groups')->where('id',$to_group_id)->first();
        if ($current_group->id == $to_group_id) {
          CRUDBooster::redirect(CRUDBooster::adminPath('new_groups/trainees/'.$current_group->id),'There is nothing to convert','warning');
        }
        $trainee_name = DB::table('cms_users')->where('id',$request->trainees_id)->value('name');

        $groups_trainee = DB::table('groups_trainees')->where('groups_id',$current_group->id)->where('trainees_id',$request->trainees_id)->first();

        $current_paid           = $groups_trainee->fees - $groups_trainee->fees_remaining;
        $current_fees_remaining = $current_group->fees_remaining + $current_paid;
        $current_fees_total     = $current_group->fees_total - $current_group->fees;
        $current_fees_remaining = $current_fees_remaining - $current_group->fees;

        if ($current_paid > $to_group->fees) {
          CRUDBooster::redirect(CRUDBooster::adminPath('new_groups/trainees/'.$current_group->id),'Fees paid are greater than the new group fee','warning');
        }
        $current_register_fees_remaining = ($groups_trainee->register_fees == $current_group->register_fees) ? $current_group->register_fees_remaining : $current_group->register_fees_remaining - $groups_trainee->register_fees;
        $current_register_fees_total     = $current_group->register_fees_total - $groups_trainee->register_fees;

        $current_certificate_fees_remaining = ($groups_trainee->certificate_fees == $current_group->certificate_fees) ? $current_group->certificate_fees_remaining : $current_group->certificate_fees_remaining - $groups_trainee->certificate_fees;
        $current_certificate_fees_total     = $current_group->certificate_fees_total - $groups_trainee->certificate_fees;


        DB::table('groups')
            ->where('id', $request->current_group_id)
            ->update([
                    'vacant_seats'              => $current_group->vacant_seats + 1,
                    'fees_remaining'            => $current_fees_remaining,
                    'fees_total'                => $current_fees_total,
                    'register_fees_remaining'   => $current_register_fees_remaining,
                    'register_fees_total'       => $current_register_fees_total,
                    'certificate_fees_remaining'=> $current_certificate_fees_remaining,
                    'certificate_fees_total'    => $current_certificate_fees_total,
                  ]);


        DB::table('groups')
            ->where('id', $to_group_id)
            ->update([
                    'vacant_seats'              => $to_group->vacant_seats - 1,
                    'fees_remaining'            => ($to_group->fees_remaining + $to_group->fees) - $current_paid,
                    'fees_total'                =>  $to_group->fees_total + $to_group->fees,
                    'register_fees_remaining'   => $to_group->register_fees_remaining + $to_group->register_fees,
                    'register_fees_total'       =>  $to_group->register_fees_total + $to_group->register_fees,
                    'certificate_fees_remaining'=> $to_group->certificate_fees_remaining + $to_group->certificate_fees,
                    'certificate_fees_total'    =>  $to_group->certificate_fees_total + $to_group->certificate_fees,
                  ]);


        DB::table('groups_trainees')->where('id',$groups_trainee->id)->update([
          'groups_id'      => $to_group_id,
          'fees'           => $to_group->fees,
          'fees_remaining' => $to_group->fees - $current_paid,
        ]);

        NoraCenter::addFeesTrainer($request->current_group_id);
        NoraCenter::addFeesTrainer($to_group_id);
        
        // Notification
        $postdata = [];
        $postdata['id_cms_users']       = $trainees_id;
        $postdata['current_group_name'] = $current_group->name;
        $postdata['to_group_name']      = $to_group->name;
        Notification::convertGroupsTrainees($postdata);

        // add log user amount trainee_name groups_name
        CRUDBooster::insertLog(trans("notification.logConvertGroupsTrainees", ['current_group_name'=>$current_group->name,'to_group_name'=>$to_group->name, 'trainee_name'=>$trainee_name]));
        CRUDBooster::redirect(CRUDBooster::adminPath('new_groups/trainees/'.$to_group_id),'Good work, trainee has been converted successfully','success');

      }

	}
