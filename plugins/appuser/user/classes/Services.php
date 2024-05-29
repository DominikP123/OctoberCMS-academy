<?php namespace AppUser\User\Classes;

use AppUser\User\Models\User;
use Backend\Classes\Controller;
use Illuminate\Support\Str;
use Hash;
use Exception;
use AppLogger\Logger\Models\Log;

class Services extends Controller
{
    

    public function register($username, $password)
    {
        $user = new User;

        $user->username = $username;
        $user->password = Hash::make($password);
        $user->token = Services::makeToken();
        $user->delay = false;
        $user->login_time = date('Y-m-d H:i:s');

        $user->save();

        return $user->token;
    }

    public function logOut($token)
    {
        $user = User::where('token', $token)->first();

        if (!$user) {
            throw new Exception('user not found');
        }     

        $user->token = null;
        $user->save();

        return $token;
    }

    public function login($username, $password)
    {   
        try{
            $user = User::where('username', $username)->first();
            
            if ($user && Hash::check($password, $user->password)) {

                if ($user->token == null){ 
                    $user->token = Services::makeToken();
                }

                $user->login_time = date('Y-m-d H:i:s');
                $user->save();

                $logData = [
                            'user_id' => $user->id, 
                            'arrival_time' => $user->login_time,
                            'name' => $user->username,
                            'delay' => false
                            ];
                /* REVIEW Zvláštne odsadenie :DD keď máš začiatok array/objektu/funkcie, tak tá uzavieracia zátvorka by mala byť na rovnakom odsadení ako začiatku array/objektu/funkcie
                A hodnoty alebo kód ktorý dávaš dovnútra je o jeden tab dopredu, čiže napr:

                $arr = [
                    'key' => 'value',
                    ...
                ]

                čiže

           ---> $arr = [
               ---> 'key' => 'value',
               ---> ...
           ---> ]
                
                */

                $log = new Log();
                $log->fill($logData);
                $log->save();
                
                return $user->token;
            }

            throw new Exception('user not found', 401);
            /* REVIEW Tu len vidím takú logickú nezrovnalosť... V tejto logike čo tu máš môže byť failnuť username (že sa nenájde) alebo password (že nesedí)
            V prípade že sa user nájde a heslo zlyhá, posielaš taký istý error ako keď sa nenájde user, čo je trochu zavádzajúce. Skús to možno rozdeliť na 2 rôzne errory
            A zároveň dobre že si použil kód 401, lenže ten sedí k prípadu kedy zlyhá heslo... Keď zlyhá username sa hodí viac 404 not found */

        } catch ( Exception $e){
            throw new Exception('Internal server error: ' . $e->getMessage(), 500);
        }
    }

    public function makeToken(){ return Str::random(20); }
}