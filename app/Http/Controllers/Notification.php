<?php
namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\Controller;
use CRUDBooster;
use NoraCenter;
use Request;

class Notification extends Controller {

  // 1
	public static function welcome($postdata) {
    // $config[] = [];
    // $config['content'] = '[ نأمل الاهتمام بحضور المتدربين ووضع درجاتهم في نهاية ] '.$group->name.'[ تم إختيارك لتدريس  المجموعة ]';
    // $config['to'] = CRUDBooster::adminPath('attendances');
    // $config['id_cms_users'] = [$group->trainers_id];
    // CRUDBooster::sendNotification($config);
	}

  // 2
	public static function welcomeBack($postdata) {

	}

  // 3
	public static function addTrainee($postdata) {

	}

  // 4
	public static function addTraineesGroup($postdata) {

	}

  // 5
	public static function addTrainerGroup($postdata) {

	}

  // 6
	public static function startGroupTrainee($postdata) {
    $config[] = [];
    $config['content'] = trans("notification.startGroupTrainee", ['groups_name' => $postdata['groups_name']]);
    $config['to'] = CRUDBooster::adminPath();
    $config['id_cms_users'] = [$postdata['id_cms_users']];
    CRUDBooster::sendNotification($config);
	}

  // 6
	public static function deleteGroupTrainee($postdata) {
    $config[] = [];
    $config['content'] = trans("notification.deleteGroupTrainee", ['groups_name' => $postdata['groups_name']]);
    $config['to'] = CRUDBooster::adminPath();
    $config['id_cms_users'] = [$postdata['id_cms_users']];
    CRUDBooster::sendNotification($config);
	}

  // 6
	public static function payRegisterFeesTrainees($postdata) {
    $config[] = [];
    $config['content'] = trans("notification.payRegisterFeesTrainees", ['groups_name' => $postdata['groups_name'], 'amount' => $postdata['amount']]);
    $config['to'] = CRUDBooster::adminPath();
    $config['id_cms_users'] = [$postdata['id_cms_users']];
    CRUDBooster::sendNotification($config);
	}

  // 6
	public static function payCertificatesFeesTrainees($postdata) {
    $config[] = [];
    $config['content'] = trans("notification.payCertificatesFeesTrainees", ['groups_name' => $postdata['groups_name'], 'amount' => $postdata['amount']]);
    $config['to'] = CRUDBooster::adminPath();
    $config['id_cms_users'] = [$postdata['id_cms_users']];
    CRUDBooster::sendNotification($config);
	}

  // 6
	public static function payGroupsFeesTrainees($postdata) {
    $config[] = [];
    $config['content'] = trans("notification.payGroupsFeesTrainees", ['groups_name' => $postdata['groups_name'], 'amount' => $postdata['amount']]);
    $config['to'] = CRUDBooster::adminPath();
    $config['id_cms_users'] = [$postdata['id_cms_users']];
    CRUDBooster::sendNotification($config);
	}

  // 6
	public static function payGroupsFeesTrainers($postdata) {
    $config[] = [];
    $config['content'] = trans("notification.payGroupsFeesTrainers", ['groups_name' => $postdata['groups_name'], 'amount' => $postdata['amount']]);
    $config['to'] = CRUDBooster::adminPath();
    $config['id_cms_users'] = [$postdata['id_cms_users']];
    CRUDBooster::sendNotification($config);
	}

  // 7
	public static function convertGroupsTrainees($postdata) {
    $config[] = [];
    $config['content'] = trans("notification.convertGroupsTrainees", ['current_group_name' => $postdata['current_group_name'], 'to_group_name' => $postdata['to_group_name']]);
    $config['to'] = CRUDBooster::adminPath();
    $config['id_cms_users'] = [$postdata['id_cms_users']];
    CRUDBooster::sendNotification($config);
	}

  // 7
	public static function startGroupTrainer($postdata) {

	}

  // 8
	public static function payRegisterFees($postdata) {

	}

  // 9
	public static function payGroupFees($postdata) {

	}

  // 10
	public static function payCertificateFees($postdata) {

	}

  // 11
	public static function newTrainerEntitlements($postdata) {

	}

  // 12
	public static function newMarketingEntitlements($postdata) {

	}

  // 13
	public static function tumblePayment($postdata) {

	}

  // 14
	public static function absenceWarningFirst($postdata) {

	}

  // 15
	public static function absenceWarningSecond($postdata) {

	}

  // 16
	public static function absenceWarningThird($postdata) {

	}

  // 17
	public static function finishedGroupTrainer($postdata) {

	}

  // 18
	public static function finishedGroupReception($postdata) {

	}

  // 19
	public static function finishedGroupTraineeOne($postdata) {

	}

  // 20
	public static function finishedGroupTraineeTwo($postdata) {

	}

}
