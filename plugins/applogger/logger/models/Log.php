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
    public $rules = [
        'user_id' => 'required|integer|exists:id',
        'arrival_time' => 'required|date_format:Y-m-d H:i:s',
        'name' => 'required|string|max:255',
        'delay' => 'boolean'
    ]; 

    public $belongsTo = [
        'user' => [[User::class], 'key' => 'user_id']
    ];
}
