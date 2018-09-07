<?php namespace App\Http\Controllers;

	use Session;
	use Illuminate\Http\Request;
	use DB;
	use CRUDBooster;

	class AdminMessagesController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "name";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = true;
			$this->button_table_action = true;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = true;
			$this->button_edit = false;
			$this->button_delete = false;
			$this->button_detail = false;
			$this->button_show = false;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "messages";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];

      $this->col[] = ["label"=>"image","name"=>"sent_from_id","image"=>true,"join"=>"cms_users,photo"];
        $this->col[] = ["label"=>"Name","name"=>"sent_from_id","join"=>"cms_users,name"];

      // $this->col[] = ["label"=>"Name","name"=>"sent_from_id","callback"=>function($row) {
      //   if ($row->to == 'Manager') {
      //     $result = DB::table('cms_users')->where('id',$row->sent_from_id)->value('name');
      //   }else {
      //     $result = DB::table('cms_users')->where('id',$row->sent_to_id)->value('name');
      //   }
			// 	return $result;
			// }];
      // if ($row->sent_from_id){
      // }elseif($row->sent_to_id) {
      //   $this->col[] = ["label"=>"Name","name"=>"sent_to_id","join"=>"cms_users,name"];
      // }
			// $this->col[] = ["label"=>"Name","name"=>"name"];
			// $this->col[] = ["label"=>"Email","name"=>"email"];
			// $this->col[] = ["label"=>"Subject","name"=>"subject"];
			// $this->col[] = ["label"=>"Movement","name"=>"movement"];
			// $this->col[] = ["label"=>"Send at","name"=>"created_at"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
      if (CRUDBooster::getCurrentMethod() != 'getDetail') {
        $this->form[] = ['label'=>'Privileges','name'=>'id_cms_privileges','type'=>'select','validation'=>'required','width'=>'col-sm-9','datatable'=>'cms_privileges,name'];
      }
			$this->form[] = ['label'=>'To','name'=>'sent_to_id','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'cms_users,name','datatable_format'=>"name,' - ',phone_number",'parent_select'=>'id_cms_privileges'];

			// $this->form[] = ['label'=>'To','name'=>'contact_message','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Contact Message','name'=>'content','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ["label"=>"Name","name"=>"name","type"=>"text","required"=>TRUE,"validation"=>"required|string|min:3|max:70","placeholder"=>"فضلا ادخل احرف فقط"];
			//$this->form[] = ["label"=>"Email","name"=>"email","type"=>"email","required"=>TRUE,"validation"=>"required|min:1|max:255|email|unique:contact_forms","placeholder"=>"صيغة البريد الإلكتروني غير صحيحة"];
			//$this->form[] = ["label"=>"Subject","name"=>"subject","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Contact Message","name"=>"contact_message","type"=>"textarea","required"=>TRUE,"validation"=>"required|string|min:5|max:5000"];
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
          $this->addaction[] = ['url'=>CRUDBooster::mainpath('details/[id]'),'icon'=>'fa fa-arrow-right','color'=>'primary']; # get details


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
          // $this->table_row_color[] = ['condition'=>"[is_read] == null","color"=>"danger"];


	        /*
	        | ----------------------------------------------------------------------
	        | You may use this bellow array to add statistic at dashboard
	        | ----------------------------------------------------------------------
	        | @label, @count, @icon, @color
	        |
	        */
	        $this->index_statistic = array();
          if (in_array(CRUDBooster::myPrivilegeId(), [1,2], TRUE)){
          // $this->index_statistic[] = ['label'=>'Unread','count'=>DB::table('contact_forms')->where('is_read',null)->count(),'icon'=>'fa fa-square-o','color'=>'danger'];
          // $this->index_statistic[] = ['label'=>'Read','count'=>DB::table('contact_forms')->where('is_read',1)->count(),'icon'=>'fa fa-check-square-o','color'=>'success'];
          }
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
        $this->cbLoader();
            $module = CRUDBooster::getCurrentModule();
            // $row = DB::table($this->table)->where($this->primary_key, $request->groups_id)->first();
            if (! CRUDBooster::isUpdate()) {
                CRUDBooster::insertLog(trans('crudbooster.log_try_view', ['name' => $row->{$this->title_field},'module' => $module->name]));
                CRUDBooster::redirect(CRUDBooster::adminPath(), trans('crudbooster.denied_access'));
    		}

        // $contact =DB::table('contact_forms')->get();
        // $contact = collect($contact);
        // $contact = $contact->groupBy('email');
        // foreach ($contact as $value) {
        //   $last_created_at = $value->max('created_at');
        //   $last_contact[] = $value->where('created_at',$last_created_at)->first();
        //
        // }
        // foreach ($last_contact as $value) {
        //   DB::table('contact_forms')->where('id',$value->id)->update([
        //     'is_last' => 1
        //   ]);
        // }

        // DB::table('contact_forms')->update([
        //     'is_read' => 1
        //   ]);

	        //Your code here
          // if (!in_array(CRUDBooster::myPrivilegeId(), [1,2], TRUE)){
           // $query->where('contact_forms.email', DB::table('cms_users')->where('id',CRUDBooster::myId())->value('email'));
           // $query->where('messages.sent_from_id', CRUDBooster::myId())->orWhere('messages.sent_to_id', CRUDBooster::myId());
           // ->value('name'));
         // }

         // $query->where('messages.is_last',1)->where('messages.to','Manager')->orderBy('messages.is_read');
         $query->where('messages.is_last',1)->where('messages.to','Manager')->orderBy('messages.created_at','DESC');
	    }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for manipulate row of index table html
	    | ----------------------------------------------------------------------
	    |
	    */
	    public function hook_row_index($column_index,&$column_value) {
	    	//Your code here
        // if ($column_index == 3) {
        //   if (in_array(CRUDBooster::myPrivilegeId(), [1,2], TRUE)){
        //     if ($column_value == 'out') {
        //       $column_value = '<i class="fa fa-arrow-down" aria-hidden="true"></i>';
        //     }else {
        //       $column_value = '<i class="fa fa-arrow-up" aria-hidden="true"></i>';
        //     }
        //   }else {
        //     if ($column_value == 'in') {
        //       $column_value = '<i class="fa fa-arrow-down" aria-hidden="true"></i>';
        //     }else {
        //       $column_value = '<i class="fa fa-arrow-up" aria-hidden="true"></i>';
        //     }
        //   }
        // }
	    	//Your code here
        // if ($column_index == 3)
        //   if ($column_value == 1)
        //     $column_value = '<i class="fa fa-check-square-o" aria-hidden="true"></i>';
      }

	    /*
	    | ----------------------------------------------------------------------
	    | Hook for manipulate data input before add data is execute
	    | ----------------------------------------------------------------------
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {

        $id_cms_privileges = $postdata['id_cms_privileges'];

        // $sent_to_id = $postdata['sent_to_id'];
        // $postdata['content'] = $postdata['contact_message'];
        // $created_at = $postdata['created_at'];
        $postdata['is_last'] = 1;

        switch ($id_cms_privileges) {
          case 1:
            $postdata['to'] = 'Super Administrator';
            break;
          case 2:
            $postdata['to'] = 'Manager';
            break;
          case 3:
            $postdata['to'] = 'Receptionist';
            break;
          case 4:
            $postdata['to'] = 'Accountant';
            break;
          case 5:
            $postdata['to'] = 'Marketer';
            break;
          case 6:
            $postdata['to'] = 'Trainer';
            break;
          case 7:
            $postdata['to'] = 'Trainee';
            break;

          default:
            // code...
            break;
        }

        $config[] = [];
        $config['content'] = $postdata['content'];
        $config['to'] = CRUDBooster::adminPath('get_messages');
        $config['id_cms_users'] = [$postdata['sent_to_id']];
        CRUDBooster::sendNotification($config);

        unset($postdata['id_cms_privileges']);

        // dd($postdata);
	        //Your code here
          // if (in_array(CRUDBooster::myPrivilegeId(), [1,2], TRUE))
          //   $postdata['movement'] = 'in';
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

      public function getDetails($id)
      {
        $message = DB::table('messages')->where('id', $id)->first();
        $value_id = 0;
        if ($message->sent_from_id) {
          $value_id = $message->sent_from_id;
        }else {
          $value_id = $message->sent_to_id;
        }
        $data['results'] = DB::table('messages')->where('messages.sent_from_id', $value_id)->orWhere('messages.sent_to_id', $value_id)->orderBy('created_at', 'DESC')->paginate(10);
        $data['trainee_id'] = $value_id;
        $data['trainee_name'] = DB::table('cms_users')->where('id',$value_id)->value('name');
        $this->cbView('contact.index',$data);
      }
      public function getMessages()
      {
        $data['results'] = DB::table('messages')->where('messages.sent_from_id', CRUDBooster::myId())->orWhere('messages.sent_to_id', CRUDBooster::myId())->orderBy('created_at', 'DESC')->paginate(10);
        $this->cbView('contact.index',$data);
      }

      public function saveMessages(Request $request)
      {
        if (!in_array(CRUDBooster::myPrivilegeId(), [1,2], TRUE)){

          DB::table('messages')->where('messages.sent_from_id', CRUDBooster::myId())->orWhere('messages.sent_to_id', CRUDBooster::myId())->update(['is_last'=>NULL]);
          $messages_id = DB::table('messages')->insertGetId([
            'to'           => 'Manager',
            'sent_from_id' => CRUDBooster::myId(),
            // 'sent_to_id'   => $request->trainee_id,
            'content'      => $request->content,
            'is_last'      => 1,
            'created_at'   => now()
          ]);

            $config[] = [];
            $config['content'] = "message from: ".DB::table('cms_users')->where('id',CRUDBooster::myId())->value('name');
            $config['to'] = CRUDBooster::adminPath('messages/details/'.$messages_id);
            $config['id_cms_users'] = [1,2];
            CRUDBooster::sendNotification($config);

          return back();

        }else {

          // DB::table('messages')->where('messages.sent_from_id', $request->trainee_id)->orWhere('messages.sent_to_id', $request->trainee_id)->notWhere('messages.to','<>','Manager')->update(['is_last'=>NULL]);
          DB::table('messages')->insert([
            'to'           => 'trainee',
            // 'sent_from_id' => CRUDBooster::myId(),
            'sent_to_id'   => $request->trainee_id,
            'content'      => $request->content,
            'is_last'      => 1,
            'created_at'   => now()
          ]);

            $config[] = [];
            $config['content'] = $request->content;
            $config['to'] = CRUDBooster::adminPath('get_messages');
            $config['id_cms_users'] = [$request->trainee_id];
            CRUDBooster::sendNotification($config);

          return back();
        }

      }

	    //By the way, you can still create your own method in here... :)


	}
