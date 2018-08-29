<?php namespace App\Http\Controllers;

use Session;
use Request;
use DB;
use CRUDbooster;

class AdminCmsUsersController extends \crocodicstudio\crudbooster\controllers\CBController {


	public function cbInit() {
		# START CONFIGURATION DO NOT REMOVE THIS LINE
		$this->table               = 'cms_users';
		$this->primary_key         = 'id';
		$this->title_field         = "name";
		$this->button_action_style = 'button_icon';
		$this->button_import 	   = FALSE;
		$this->button_export 	   = FALSE;
		# END CONFIGURATION DO NOT REMOVE THIS LINE

		# START COLUMNS DO NOT REMOVE THIS LINE
		$this->col = array();
		$this->col[] = array("label"=>"Name","name"=>"name");
		$this->col[] = array("label"=>"Email","name"=>"email");
		$this->col[] = array("label"=>"Privilege","name"=>"id_cms_privileges","join"=>"cms_privileges,name");
		$this->col[] = array("label"=>"Photo","name"=>"photo","image"=>1);
		# END COLUMNS DO NOT REMOVE THIS LINE

		# START FORM DO NOT REMOVE THIS LINE
		$this->form = array();
		// $this->form[] = array("label"=>"Name","name"=>"name",'required'=>true,'validation'=>'required|alpha_spaces|min:3');
		// $this->form[] = array("label"=>"Email","name"=>"email",'required'=>true,'type'=>'email','validation'=>'required|email|unique:cms_users,email,'.CRUDBooster::getCurrentId());
		// $this->form[] = array("label"=>"Photo","name"=>"photo","type"=>"upload","help"=>"Recommended resolution is 200x200px",'required'=>true,'validation'=>'required|image|max:1000','resize_width'=>90,'resize_height'=>90);
		// $this->form[] = array("label"=>"Privilege","name"=>"id_cms_privileges","type"=>"select","datatable"=>"cms_privileges,name",'required'=>true);
		// $this->form[] = array("label"=>"Password","name"=>"password","type"=>"password","help"=>"Please leave empty if not change");
		// # END FORM DO NOT REMOVE THIS LINE

    $this->form[] = ['label'=>'Name','name'=>'name','type'=>'text','validation'=>'required|string|min:3|max:70','width'=>'col-sm-10','placeholder'=>'You can only enter the letter only'];
    $this->form[] = ['label'=>'Name English','name'=>'name_english','type'=>'text','validation'=>'required|string|min:3|max:70','width'=>'col-sm-10','placeholder'=>'You can only enter the letter only'];
    $this->form[] = ['label'=>'Photo','name'=>'photo','type'=>'upload','validation'=>'image|max:6000','width'=>'col-sm-10','help'=>'File types support : JPG, JPEG, PNG, GIF, BMP'];
    $this->form[] = ['label'=>'Email','name'=>'email','type'=>'email','validation'=>'required|email|unique:cms_users','width'=>'col-sm-10','placeholder'=>'Please enter a valid email address'];
    $this->form[] = ['label'=>'Phone Number','name'=>'phone_number','type'=>'number','validation'=>'required|unique:cms_users|numeric|min:10','width'=>'col-sm-8','help'=>'09×××××××× / 01×××××××× | رقم الهاتف'];
    $this->form[] = ['label'=>'Gender','name'=>'gender','type'=>'select','validation'=>'required','width'=>'col-sm-9','dataenum'=>'ذكر;أنثى'];
    $this->form[] = ['label'=>'Specialization','name'=>'specialization','type'=>'text','validation'=>'required','width'=>'col-sm-9','help'=>'التخصص'];
    $this->form[] = ['label'=>'Educational Level','name'=>'educational_level','type'=>'select','validation'=>'required','width'=>'col-sm-9','dataenum'=>'أمي;أساسي;ثانوي;جامعي;فوق الجامعي','help'=>'المستوى التعليمي'];
    $this->form[] = ['label'=>'Address','name'=>'address','type'=>'text','validation'=>'required|string','width'=>'col-sm-9','help'=>'العنوان'];
    $this->form[] = ['label'=>'Password','name'=>'password','type'=>'password','validation'=>'min:3|max:32','width'=>'col-sm-9'];

	}

	public function getProfile() {

		$this->button_addmore = FALSE;
		$this->button_cancel  = FALSE;
		$this->button_show    = FALSE;
		$this->button_add     = FALSE;
		$this->button_delete  = FALSE;
		$this->hide_form 	  = ['id_cms_privileges'];

		$data['page_title'] = trans("crudbooster.label_button_profile");
		$data['row']        = CRUDBooster::first('cms_users',CRUDBooster::myId());
		$this->cbView('crudbooster::default.form',$data);
	}
}
