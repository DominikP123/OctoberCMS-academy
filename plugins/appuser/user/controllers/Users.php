<?php namespace AppUser\User\Controllers;

use Log;
use AppUser\User\Classes\Services;
use BackendMenu;
use Backend\Classes\Controller;
use Hash;

/**
 * Users Backend Controller
 *
 * @link https://docs.octobercms.com/3.x/extend/system/controllers.html
 */
class Users extends Controller
{
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
    ];

    /**
     * @var string formConfig file
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string listConfig file
     */
    public $listConfig = 'config_list.yaml';

    /**
     * @var array required permissions
     */
    public $requiredPermissions = ['appuser.user.users'];

    /**
     * __construct the controller
     */
    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('AppUser.User', 'user', 'users');
    }
    
    public function formBeforeSave($model)
    {
        $model->fill(post('User'));

        if ($model->isDirty('password') && !empty($model->password)) {
            Log::info('Password before hashing: ' . $model->password);
            $model->password = Hash::make($model->password);
            Log::info('Password after hashing: ' . $model->password);
        } else {
            Log::info('Password field is not set or not changed.');
        }
  
        $model->token = Services::makeToken();

        Log::info('Model attributes after save: ' . json_encode($model->attributes));
    }

    public function formAfterSave($model)
    {
        Log::info('Model saved: ' . json_encode($model->attributes));

    }
}
