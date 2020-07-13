<?php

if (! function_exists('alert_menu')) {
    function alert_menu($message = null)
    {
        $notifier = app('alert-menu');
        return $notifier;
    }
}

if (! function_exists('msg')) {
    function msg($message, $type = null)
    {
        if(is_null($type)){
            $returnData = alert_menu()->success(__($message));
        }else {
            $returnData = alert_menu()->$type(__($message));
        }
        Session::flash('message', $returnData);
        return $returnData;
    }
}

if (! function_exists('msg_toastr')) {
    function msg_toastr($message, $type = null)
    {
        if(is_null($type)){
            $returnData = alert_menu()->success(__($message));
        }else {
            $returnData = alert_menu()->$type(__($message));
        }
        $returnData['toastr'] = true;
        Session::flash('message', $returnData);
        return $returnData;
    }
}
