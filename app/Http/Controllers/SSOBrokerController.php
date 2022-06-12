<?php

//------------------------------------------//
// SSOBrokerController Class                //
// Copyright (C) 2018 Nyoman Piarsa         //
// All right reserved                       //
//------------------------------------------//

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\JWT\JWT;
use Illuminate\Support\Facades\Crypt;
use GuzzleHttp\Client;

class SSOBrokerController extends Controller
{
	private $protocol, $ssoServerLink, $logoutLink;

	public function __construct(){
		// ----------------------------------------------------------------------------------
		// PENTING UNTUK DIPERHATIKAN !!!
		//
		// Ini adalah link autentikasi untuk menuju SSO server
		// Silahkan diganti bagian domainnya
		// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
		$this->protocol = ((new Request)->secure()) ? 'https' : 'http';

        $this->ssoDomain = config('sso.sso_domain');

		$this->ssoServerLink 	= config('sso.sso_domain') . 'authBroker/';
		// ----------------------------------------------------------------------------------
		$this->logoutLink 		= config('sso.sso_domain') . 'logout';

        $this->logoutLinkSelf 		= $this->protocol . '://' . $_SERVER['HTTP_HOST'] . '/logout';
	}

    public function authenticateToSSO(Request $request){
    	//jika terdapat kiriman data dari server SSO
    	if(!empty($request->authData)){
            $client = new Client;
    		$response = $client->request('POST', $this->ssoDomain . 'api/v1/auth/jwt/verify', [
                'form_params' => [
                    'token' => $request->authData
                ]
            ]);

            $res = json_decode($response->getBody());

            if($res->status){
                $JWT = new JWT();
                $JWT->setJWTString($res->data);

                if($JWT->decodeJWT()){
                    // if session is valid then set session and redirect page
                    if(session()->getId()==$JWT->getPayloadJWT()->sessionRequest){
                        session(['UserIsAuthenticated'=>1]);
                        session(['authUserData'=>$JWT->getPayloadJWT()]);
                        if(count($JWT->getPayloadJWT()->roles) > 1){
                            if($JWT->getPayloadJWT()->roles[0]->role_code != 'pegawai'){
                                session(['defaultRole'=>$JWT->getPayloadJWT()->roles[0]]);
                            }
                            else{
                                session(['defaultRole'=>$JWT->getPayloadJWT()->roles[1]]);
                            }
                        }else{
                            session(['defaultRole'=>$JWT->getPayloadJWT()->roles[0]]);
                        }
                        // echo "Test";exit;
                        return redirect(session('authUserData')->urlToRedirect);
                    }else{
                        //if session is invalid
                        echo("Invalid browser session !");exit;
                    }
                }else{
                    echo("Invalid JWT data !");exit;
                }
            }else{
                echo("Invalid JWT String data !");exit;
            }
    	}

		// user already authenticated
		if(!empty(session('authUserData'))){
			return redirect('/');
		}else{
			// if a user not yet authenticated, then redirect to SSO server
			// return 2;
			$payloadJWT = [
				'redirect' 			=> $this->protocol . '://' . $_SERVER['HTTP_HOST'] . '/authData',
				'urlToRedirect'		=> session('urlToRedirect'),
				'logoutLink' 		=> $this->logoutLinkSelf,
				'kode_broker'		=> config('sso.broker_code'),
				'sessionRequest' 	=> session()->getId()
			];
			$JWT = new JWT();
			$JWT->setPayloadJWT($payloadJWT);
			$JWT->encodeJWT();
			session()->flush();
			header('Location:'.$this->ssoServerLink.$JWT->getJWTString());exit;
		}

    }

    function myfunction($arrays, $field, $value)
    {
        foreach($arrays as $key => $array)
        {
            if ( $array->$field === $value )
                return $array;
        }
        return false;
    }

	public function changeRole($role)
	{
        $data = array_search($role, array_column(session('authUserData')->roles, 'id'));
		session(['defaultRole' => session('authUserData')->roles[$data]]);

        // return redirect(session('authUserData')->urlToRedirect);
        return back();
	}

    public function logout(Request $request){
    	if($request->sessionId){
    		\Session::getHandler()->destroy($request->sessionId);
        }
        \Session::flush();
    	return redirect($this->logoutLink);
    }

    public function login_sso_by_token($token){
        $user = decrypt($token);

        session(['UserIsAuthenticated'=>1]);
        session(['authUserData' => $user]);
        session(['defaultRole'=> $user->roles[0]]);

        return redirect(session('authUserData')->urlToRedirect);
    }
}
