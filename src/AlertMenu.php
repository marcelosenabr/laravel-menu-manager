<?php

namespace Harimayco\Menu;

class AlertMenu
{
    public function success($message) {
        return $this->message('success', $message);
    }

    public function info($message) {
        return $this->message('info', $message);
    }

    public function warning($message) {
        return $this->message('warning', $message);
    }

    public function error($message) {
        return $this->message('danger', $message);
    }

    public function message($type,$text) {
        $returnData = [];
        $returnData['type'] = $type;
        $returnData['text'] = $text;
        return $returnData;
    }

}
