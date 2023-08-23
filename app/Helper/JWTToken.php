<?php

namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use PhpParser\Node\Stmt\TryCatch;

class JWTToken
{

    public static function CreateToken($userEmail, $userID):string{
        $key=env('JWT_KEY');
        $payLoad=[
            'iss' => 'laravel-token',
            'iat' => time(),
            'exp' => time()+60*60,
            'userEmail' => $userEmail,
            'userID' => $userID
        ];

        return JWT::encode($payLoad, $key, 'HS256');
    }


    public static function CreateTokenForSetPassword($userEmail):string{
        $key=env('JWT_KEY');
        $payLoad=[
            'iss' => 'laravel-token',
            'iat' => time(),
            'exp' => time()+60*20,
            'userEmail' => $userEmail,
            'userID' => '0'
        ];

        return JWT::encode($payLoad, $key, 'HS256');
    }

    
    public static function VerifyToken($Token):string|object{
        try {
            if($Token==null){
                return 'unauthorized';
            }
            else{
                $key=env('JWT_KEY');
                $decode= JWT::decode($Token, new Key($key,'HS256'));
                return $decode;
            }            
        } 
        catch (Exception $e) {           
            return 'unauthorized';
        }
    }
}