<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminCertificateWaitingsController extends \crocodicstudio\crudbooster\controllers\CBController {

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
			$this->button_export = true;
			$this->table = "certificates_details";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Group ID","name"=>"certificates_id","callback"=>function($row) {
				return DB::table('certificates')->where('id',$row->certificates_id)->value('groups_id');
			}];
			$this->col[] = ["label"=>"Group Name","name"=>"certificates_id","callback"=>function($row) {
				$groups_id = DB::table('certificates')->where('id',$row->certificates_id)->value('groups_id');
				return DB::table('groups')->where('id',$groups_id)->value('name');
			}];
			$this->col[] = ["label"=>"Trainee","name"=>"trainees_id","join"=>"cms_users,name"];
			$this->col[] = ["label"=>"Phone","name"=>"trainees_id","join"=>"cms_users,phone_number"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];

			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ["label"=>"Groups Id","name"=>"groups_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"groups,name"];
			//$this->form[] = ["label"=>"Trainees Id","name"=>"trainees_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"trainees,id"];
			//$this->form[] = ["label"=>"Fees","name"=>"fees","type"=>"money","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Fees Paid","name"=>"fees_paid","type"=>"money","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Fees Remaining","name"=>"fees_remaining","type"=>"money","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Disscount Value","name"=>"disscount_value","type"=>"money","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Status","name"=>"status","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Certificate Status","name"=>"certificate_status","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
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
			$this->addaction[] = ['label'=>'Print','icon'=>'fa fa-print','color'=>'info', 'confirmation' => true ,'url'=>CRUDBooster::adminPath("certificates/certificates_details/print").'/[id]'];
			$this->addaction[] = ['label'=>'Ready','icon'=>'fa fa-check','color'=>'primary', 'confirmation' => true ,'url'=>CRUDBooster::adminPath("certificates/ready").'/[id]'];


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
	        $query->where('certificates_details.certificate_status','waiting');
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


      public function certificatesReady($certificates_details_id) {

        DB::table('certificates_details')->where('id',$certificates_details_id)->update(['certificate_status' => 'ready',]);

        CRUDBooster::redirect(CRUDBooster::adminPath('all_certificates'),'success','success');

	  }

	  public function groupsTraineesPrint($groups_id, $trainees_id){

	  }

	  public function certificatesDetailsPrint($certificates_details_id) {

	  }

      public function print($groups_trainees_id) {
        //Your code here
        // $trainee_photo
        // $trainee_id
        // $trainee_name
        // $course_name
        // $group_start
        // $group_end
        // $grade certificates
        $groups_trainee = DB::table('groups_trainees')
                          ->where('id',$groups_trainees_id)
                          ->first();

        $trainee        = DB::table('cms_users')
                          ->where('id',$groups_trainee->trainees_id)
                          ->first();

        $group          = DB::table('groups')
                          ->where('id',$groups_trainee->groups_id)
                          ->first(); #classroom_lectures_id

        $course         = DB::table('courses')
                          ->where('id',$group->courses_id)
                          ->first();

        $group_start    = DB::table('classroom_lectures_reserveds')
                          ->where('groups_id',$group->id)
                          ->min(date);

        $group_end      = DB::table('classroom_lectures_reserveds')
                          ->where('groups_id',$group->id)
                          ->max(date);

        $certificate_id = DB::table('certificates')
                          ->where('groups_id',$group->id)
                          ->value('id');

        $certificates_details = DB::table('certificates_details')
                          ->where('certificates_id',$certificate_id)
                          ->first();
        //degree
        $data['trainee_photo'] = $trainee->photo;
        $data['trainee_id']    = $trainee->id;
        $data['trainee_name']  = $trainee->name;
        $data['course_name']   = $course->name;
        $data['group_start']   = $group_start;
        $data['group_end']     = $group_end;
        $data['degree']         = $certificates_details->degree;
        // dd($date);
        return view('certificate',$data);
      }

	  public function groupsTraineesRequest($groups_id, $trainees_id)
	  {
		DB::table('certificates_details')->where('trainees_id',$trainees_id)->where('certificates_id',DB::table('certificates')->where('groups_id',$groups_id)->value('id'))->update(['certificate_status' => 'waiting']);

		CRUDBooster::redirectBack('success');
	  }

	}
