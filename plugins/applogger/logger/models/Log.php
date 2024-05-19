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
        'user_id' => 'required|integer|exists:id', // REVIEW Táto 'exists' podmienka asi nebude dobre, mal by si tam zadefinovať table. Pozri october docs
        'arrival_time' => 'required|date_format:Y-m-d H:i:s', // REVIEW Ak v fields.yaml nastavíš toto na type dátumu, tak túto 'date_format' podmienku za teba urobí october
        'name' => 'required|string|max:255',
        'delay' => 'boolean'
    ]; 

    public $belongsTo = [
        'user' => [[User::class], 'key' => 'user_id']
        // REVIEW Prečo dávaš ten User::class do ďalšieho array? (Odpoveď mi kľudne napíš do channelu)
        // REVIEW Potrebuješ v tomto prípade zadávať 'key'? (Odpoveď mi kľudne napíš do channelu)
    ];
}
