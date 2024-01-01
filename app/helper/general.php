<?php

namespace App\Helper;

class General
{
    public static function SendMail($to ,$subject ,$view,$data=[]){
        try{
            $body=view($view,$data)->render();
            \Mail::send('email.layout',['body'=>$body],function ($m)use($to,$subject){
                $m->from(config('setting.mail_from_address'), config('setting.mail_from_name'));
                $m->to($to)->subject($subject);

            });
        }catch(\Exception $e){

        }
    }
   


}