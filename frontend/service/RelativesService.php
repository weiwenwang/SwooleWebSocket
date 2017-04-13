<?php

namespace frontend\service;

use yii\base\Exception;

class RelativesService
{
    public static $Mother = 11;
    public static $Father = 12;

    public static $Grandma = 13;
    public static $Grandpa = 14;

    public static $Grandmather = 15;
    public static $Grandpather = 16;
    public static $Other = 17;

    public static $MotherName = "妈妈";
    public static $FatherName = "爸爸";

    public static $GrandmaName = "奶奶";
    public static $GrandpaName = "爷爷";

    public static $GrandmatherName = "外婆";
    public static $GrandpatherName = "外公";
    public static $OtherName = "其他";

    public static function getById(array $id = [])
    {
        $all_subject = self::getAll();
        if (!count($id)) {
            return $all_subject;
        } else {
            $subect_array = [];
            foreach ($id as $key => $value) {
                if (array_key_exists($value, $all_subject)) {
                    $arr = [$value => $all_subject[$value]];
                    array_push($subect_array, $arr);
                    unset($arr);
                } else {
                    throw new Exception("subject id error (" . $value . ")");
                }
            }
            return $subect_array;
        }
    }

    public static function getAll()
    {
        $all_subject = [
            self::$Mother => self::$MotherName,
            self::$Father => self::$FatherName,
            self::$Grandma => self::$GrandmaName,
            self::$Grandpa => self::$GrandpaName,
            self::$Grandmather => self::$GrandmatherName,
            self::$Grandpather => self::$GrandpatherName,
            self::$Other => self::$OtherName,
        ];
        return $all_subject;
    }

    public static function getNameById(array $id = [], $delimiter = ', ')
    {
        if (!count($id)) {
            return '';
        }
        $all_subject = self::getAll();
        $str = "";
        foreach ($id as $key => $value) {
            $str .= $all_subject[$value] . $delimiter;
        }
        return rtrim($str, $delimiter);
    }

}