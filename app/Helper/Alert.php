<?php
namespace App\Helper;

class Alert {
    public static function simple($color, $body): void
    {
        $array = [
            'color' => $color,
            'body' => $body,
        ];
        $json = json_encode($array);
        request()->session()->flash('alert-simple', $json);
    }
    public static function inputAlert($name, $body, $color = ''):void {
        $array = [
            'color' => $color,
            'body' => $body,
        ];
        $json = json_encode($array);
        session()->flash('input-alert-'.$name, $json);
    }
    public static function inputValue($name, $value):void {
        session()->flash('input-value-'.$name, $value);
    }
}
