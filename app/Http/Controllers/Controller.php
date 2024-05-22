<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function jsonMessage($message,$response="success",$redirect="homepage")
    {
        session()->flash("jsonMessage","true");
        session()->flash("message",$message);
        session()->flash("response","$response");
        return   redirect()->to($redirect);
    }

    function jsonMessage2($message,$response="success",$redirect="homepage")
    {
        session()->flash("jsonMessage2","true");
        session()->flash("message",$message);
        session()->flash("response","$response");
        return   redirect()->to($redirect);
    }
  
    function Code300($message)
    {
       
        $ssdata = array('status'=>'error','code'=>'300','message' => $message);
        $ssdata=json_encode($ssdata);
        return response()->json($ssdata);
    }
    function Code302($message)
    {
        $ssdata = array('status'=>'error','code'=>'302','message' => $message);
        $ssdata=json_encode($ssdata);
        return response()->json($ssdata);
    }

    function Code200($message,$messageTitle="",$data="")
    {
        $ssdata = array('status'=>'success','code'=>'200','message' =>$message,'messageTitle'=>$messageTitle);
        if(!empty($data))
            $ssdata['data']=$data;
        $ssdata=json_encode($ssdata);
        return response()->json($ssdata);
    }

    function flashMessage($responseType="",$message="",$redirect="")
    {
            session()->flash($responseType,$message);
            if(!empty($redirect))
                return redirect($redirect);
            return ;
    }
}
