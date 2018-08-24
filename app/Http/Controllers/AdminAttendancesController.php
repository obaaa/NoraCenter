<?php namespace App\Http\Controllers;

	use Illuminate\Http\Request;
	use Session;
	// use Request;
	use DB;
	use CRUDBooster;

	class AdminAttendancesController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "id";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = true;
			$this->button_table_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = false;
			$this->button_edit = false;
			$this->button_delete = false;
			$this->button_detail = false;
			$this->button_show = false;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "attendances";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Group NO","name"=>"groups_id","join"=>"groups,id"];
			$this->col[] = ["label"=>"Group Name","name"=>"groups_id","join"=>"groups,name"];
			$this->col[] = ["label"=>"Trainer","name"=>"trainers_id","join"=>"cms_users,name"];
			$this->col[] = ["label"=>"Lectures","name"=>"lectures_number"];
			$this->col[] = ["label"=>"Finished Lectures","name"=>"finished_lectures"];
			$this->col[] = ["label"=>"Status","name"=>"status"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Groups','name'=>'groups_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'groups,name'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Groups','name'=>'groups_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'groups,name'];
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
					$this->addaction[] = ['label'=>'Details','icon'=>'fa fa-arrows-alt','color'=>'primary','url'=>CRUDBooster::mainpath('lectures').'/[id]'];
					$this->addaction[] = ['label'=>'Report','icon'=>'fa fa-table','color'=>'info','url'=>CRUDBooster::mainpath('lecturesReport').'/[id]'];

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
            if (CRUDBooster::myPrivilegeName() == 'Trainer') {
             $query->where('attendances.trainers_id', CRUDBooster::myId());
            }

	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for manipulate row of index table html
	    | ----------------------------------------------------------------------
	    |
	    */
	    public function hook_row_index($column_index,&$column_value) {
	    	//Your code here

      // dd($column_value);
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

	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for execute command after add public static function called
	    | ----------------------------------------------------------------------
	    | @id = last insert id
	    |
	    */
	    public function hook_after_add($id) {
	        //Your code here

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
	        //Your code here

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

			/*
			| ----------------------------------------------------------------------
			| Show details group
			| ----------------------------------------------------------------------
			| @id = the id groups
			|
			*/
			public function getDetails($id) {

				$result = DB::table('attendances')
				->where('id',$id)
				->orderby('id','desc')
				->paginate(5);

					$attendance = DB::table('attendances')
					->where('id',$id)
					->first();

				$group = DB::table('groups')
				->where('id',$attendance->groups_id)
				->first();

				$trainer = DB::table('cms_users')
				->where('id',$group->trainers_id)
				->value('name');

				$data['id'] = $id;
				$data['result'] = $result;
				$data['group'] = $group->name;
				$data['trainer'] = $trainer;
				$this->cbView('attendance.attendance_details',$data);
			}

			public function getLectures($id) {
        $trainers_id = DB::table('attendances')->where('id', $id)->where('trainers_id', CRUDBooster::myId())->value('trainers_id');
        // if not Trainer or Super_Administrator redirect denied_access
        if (CRUDBooster::myPrivilegeId() != 1 && CRUDBooster::myPrivilegeId() != 2 && CRUDBooster::myPrivilegeId() != 3 && $trainers_id != CRUDBooster::myId()) {
          CRUDBooster::redirect(CRUDBooster::adminPath(),trans("crudbooster.denied_access"));
        }
					$data['result'] = DB::table('attendances')
					->where('id',$id)
					->first();
					$data['page_title'] = 'attendance lectures';
				$this->cbView('attendance.attendance_details_lectures',$data);
			}

			public function taking_attendance($attendances_id, $lectures_id) {

        $trainers_id = DB::table('attendances')->where('id', $attendances_id)->where('trainers_id', CRUDBooster::myId())->value('trainers_id');
        // if not Trainer or Super_Administrator redirect denied_access
        if (CRUDBooster::myPrivilegeId() != 1 && CRUDBooster::myPrivilegeId() != 2 && CRUDBooster::myPrivilegeId() != 3 && $trainers_id != CRUDBooster::myId()) {
          CRUDBooster::redirect(CRUDBooster::adminPath(),trans("crudbooster.denied_access"));
        }

				$attendance = DB::table('attendances')
				->where('id',$attendances_id)
				->first();

				$group = DB::table('groups')
				->where('id',$attendance->groups_id)
				->first();

				$data['result'] = DB::table('groups_trainees')
				->where('groups_id',$group->id)
				->get();

				$data['lectures_id'] = $lectures_id;
				$data['attendance'] = $attendance;

				$this->cbView('attendance.taking_attendance',$data);
			}
			public function add_attendance(Request $request) {
        // dd($request);
				foreach ($request->status as $trainees_id => $trainees_status) {
					DB::table('attendance_trainees')->insert([
						[
							'attendances_id' => $request->attendances_id,
							'trainees_id' => $trainees_id,
							'status' => $trainees_status,
							'lecture number' => $request->lectures_id,
							'created_at' => now(),
						],
					]);

					$finished_lectures = $request->finished_lectures + 1;
					$status = 'open';
					if ($finished_lectures == DB::table('attendances')->where('id',$request->attendances_id)->value('lectures_number')) {
						$status = 'finished';

            $groups_id = DB::table('attendances')->where('id',$request->attendances_id)->value('groups_id');
            $group = DB::table('groups')->where('id',$groups_id)->first();
            $trainer = DB::table('cms_users')->where('trainers_id',$group->trainers_id)->value('name');



            // sendNotification to trainer
            $config[] = [];
            $config['content'] = '[ شكرا لك لقد قمت بواجبك تبقى لك إنزال درجات المجموعة ] '.$group->name;
            $config['to'] = CRUDBooster::adminPath('degrees');
            $config['id_cms_users'] = [$group->trainers_id];
            CRUDBooster::sendNotification($config);

            // sendNotification to 1,2,3
            $cms_users_ids = DB::table('cms_users')
            ->where('id_cms_privileges',1)
            ->orWhere('id_cms_privileges',2)
            ->orWhere('id_cms_privileges',3)
            ->pluck('id');
            $config[] = [];
            $config['content'] = '[ الرجاء متابعة درجات المجموعة ] '.$group->name.'['.$group->id.']'.' مع الاستاذ'.$trainer;
            $config['to'] = CRUDBooster::adminPath('degrees');
            $config['id_cms_users'] = [$cms_users_ids];
            CRUDBooster::sendNotification($config);

            // sendNotification to trainees
            $trainees_ids = DB::table('groups_trainees')
            ->where('groups_id',$group->id)
            ->pluck('trainees_id');
            $config[] = [];
            $config['content'] = 'نتمنى ان تكون قد استفدت من الفترة الماضية ('.$group->name.') على اكمل وجه يمكن ارسال تعليقك على الدراسة والاداء وغيره في تعليق';
            $config['to'] = CRUDBooster::adminPath();
            $config['id_cms_users'] = [$trainees_ids];
            CRUDBooster::sendNotification($config);
            $config[] = [];
            $config['content'] = 'اطلبوا العلم من المهد الى اللحد نراك قريبا في مجموعة اخرى';
            $config['to'] = CRUDBooster::adminPath();
            $config['id_cms_users'] = [$trainees_ids];
            CRUDBooster::sendNotification($config);


					}
					DB::table('attendances')->where('id', $request->attendances_id)->update([
						'finished_lectures' => $finished_lectures,
						'status' => $status,
						'updated_at' => now(),
					]);

				}

				CRUDBooster::redirect(CRUDBooster::adminPath('attendances/lectures/'.$request->attendances_id),'Good work attendance has been added successfully','success');
			}


	    //By the way, you can still create your own method in here... :)

      public function lecturesReport($id) {
        $groups_id = DB::table('attendances')->where('id',$id)->value('groups_id');
        $data['number_of_days'] = DB::table('courses')->where('id',DB::table('groups')->where('id',$groups_id)->value('courses_id'))->value('number_of_days');
        $attendance_trainees = DB::table('attendance_trainees')->where('attendances_id',$id)->get();
        $data['attendance_trainees'] = $attendance_trainees->groupBy('trainees_id');
        $data['attendances_id'] = $id;
        $data['group_name'] = DB::table('groups')->where('id',$groups_id)->value('name');
        // for ($i=1; $i <= $number_of_days ; $i++) {
        //   $att[$i][] = DB::table('attendance_trainees')->where('lecture number',$i)->get();
        //   echo $i;
        // }
        // dd($data['number_of_days']);
        $this->cbView('attendance.lecturesReport',$data);
      }

	}
