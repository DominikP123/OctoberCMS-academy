<?php namespace AppUser\User\Models;

use Model;
use AppLogger\Logger\Models\Log;


/**
 * User Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class User extends Model
{

    /**
     * @var string table name
     */
    protected $table = 'appuser_user_users';

    protected $fillable = ['username', 'password', 'token', 'delay'];

    protected $hidden = ['password', 'token'];

    protected $hashable = ['password'];

    /**
     * @var array rules for validation
     */
    public $rules = [
        'username' => 'required|unique:appuser_user_users,username|max:255',
        'password' => 'requireed|string|max:255',
        'token' => 'nullable|string|max:255',
        'delay' => 'boolean'
    ];
  
    public $hasMany = [
        'logs' => [Log::class, 'key' => 'user_id']
    ];
}
