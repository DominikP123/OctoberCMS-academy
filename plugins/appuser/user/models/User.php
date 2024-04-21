<?php namespace AppUser\User\Models;

use Model;
use October\Rain\Database\Traits\Hashable;

/**
 * User Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class User extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use Hashable;

    /**
     * @var string table name
     */
    protected $table = 'appuser_user_users';

    protected $fillable = ['username', 'password', 'token'];

    protected $hidden = ['password', 'token'];

    protected $hashable = ['password'];

    /**
     * @var array rules for validation
     */
    public $rules = [];
}
