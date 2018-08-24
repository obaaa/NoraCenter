<?php namespace App\Http\Controllers;

		use Session;
		use Request;
		use DB;
		use CRUDBooster;
    use Hamedmehryar\SessionTracker\Traits\SessionTrackerUserTrait;

		class ApiLoginController extends \crocodicstudio\crudbooster\controllers\ApiController {
        // use SessionTrackerUserTrait;
		    function __construct() {
				$this->table       = "cms_users";
				$this->permalink   = "login";
				$this->method_type = "post";
		    }


		    public function hook_before(&$postdata) {
		        //This method will be execute before run the main process

		    }

		    public function hook_query(&$query) {
		        //This method is to customize the sql query

		    }

		    public function hook_after($postdata,&$result) {
		        //This method will be execute after run the main process
            $email = $postdata['email'];
            $password = $postdata['password'];
            $user = DB::table(config('crudbooster.USER_TABLE'))->where("email", $email)->first();


            $token = Request::header('X-Authorization-Token');
            $result['api_message'] = "ok";
            $result['password'] = '';
            // $result['sessions'] = $user->sessions();
            // $result['user_id'] = $users->id;
            // $result['token'] = $token;
            $result['userData']['user_id'] = $user->id;
            $result['userData']['token'] = $token;
            $res = response()->json($result, 200);
            $res->send();
            exit;
        }

		}
