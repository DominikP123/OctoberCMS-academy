<?php namespace AppLogger\Logger\Models;

use Model;
use AppUser\User\Models\User;

/**
 * Log Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Log extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table name
     */
    public $table = 'applogger_logger_logs';

    protected $fillable = ['user_id', 'arrival_time', 'name', 'delay'];

    public $timestamps = true;
    
    /**
     * @var array rules for validation
     */
    public $rules = []; // REVIEW - rules by som si určite zadefinoval

    public $belongsTo = [
        /* REVIEW - pre relation nemusíš písať celý názov pluginu a tablu, stačí 'user' => [...]
        a keďže je to one to many relation, čiže Log má jednoho usera, relation meno by malo byť v singulári, t. j. napr. 'user'
        */
        'appuser_user_users' => [[User::class], 'key' => 'user_id']
    ];
}
