<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
class InvitationController extends Controller
{
    public function sendInvitation(){
        $res=array();
        $checkeds=Input::only('checked')['checked'];

        Mail::send('emails.invite',[],function($message) use ($checkeds){
                $info=User::find(\Auth::user()->id);
                $fromU=$info->name.': '.$info->email;
                $subject='Invitation to JobExir';

 ///               $message->from($fromU);
                $message->to($checkeds)->subject($subject);

            });
  //      var_dump(\Mail::failures());
    //    exit('error');
    	if(!Mail::failures()) {
    	    return redirect('info')->withMessage('Email sent!');
    	} 
    	return redirect('info')->withError('Failed!');

    }
}
