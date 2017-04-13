<?php

namespace frontend\service;

class CetService
{
    public static $Cet_2 = 11;
    public static $Cet_4 = 12;
    public static $Cet_6 = 13;

    public static $Tem_6 = 14;
    public static $Tem_8 = 15;

    public static $Cet_2_name = "CET-2";
    public static $Cet_4_name = "CET-4";
    public static $Cet_6_name = "CET-6";

    public static $Tem_6_name = "MET-4";
    public static $Tem_8_name = "MET-8";


    public static function getAll()
    {
        $all_cet = [
            self::$Cet_2 => self::$Cet_2_name,
            self::$Cet_4 => self::$Cet_4_name,
            self::$Cet_6 => self::$Cet_6_name,
            self::$Tem_6 => self::$Tem_6_name,
            self::$Tem_8 => self::$Tem_8_name,

        ];
        return $all_cet;
    }

    public static function getCetNameById(array $id = [], $delimiter = ', ')
    {
        $all_cet = self::getAll();
        $str = "";
        foreach ($id as $key => $value) {
            $str .= $all_cet[$value] . $delimiter;
        }
        return rtrim($str, $delimiter);
    }

}