<?php

namespace frontend\service;

class SexService
{
    public static $sex_woman = 0;
    public static $sex_man = 1;
    public static $sex_secret = 2;

    public static $sex_woman_name = "女";
    public static $sex_man_name = "男";
    public static $sex_secret_name = "保密";

    public static function getSexName($sex_num)
    {
        $getAllSex = self::getAllSex();
        return $getAllSex[$sex_num];
    }

    public static function getAllSex()
    {
        return [
            self::$sex_woman => self::$sex_woman_name,
            self::$sex_man => self::$sex_man_name,
            self::$sex_secret => self::$sex_secret_name,
        ];
    }
}