<?php

namespace frontend\service;

use yii\base\Exception;

class TimeService
{
    public static $time081 = '100';
    public static $time082 = '101';

    public static $time091 = '102';
    public static $time092 = '103';

    public static $time101 = '104';
    public static $time102 = '105';

    public static $time111 = '106';
    public static $time112 = '107';

    public static $time121 = '108';
    public static $time122 = '109';

    public static $time131 = '110';
    public static $time132 = '111';

    public static $time141 = '112';
    public static $time142 = '113';

    public static $time151 = '114';
    public static $time152 = '115';

    public static $time161 = '116';
    public static $time162 = '117';

    public static $time171 = '118';
    public static $time172 = '119';

    public static $time181 = '120';
    public static $time182 = '121';

    public static $time191 = '122';
    public static $time192 = '123';

    public static $time201 = '124';
    public static $time202 = '125';

    public static $time211 = '126';
    public static $time212 = '127';

    public static $time221 = '128';
    public static $time222 = '129';

    public static function getName($sex_num)
    {
        $getAllSex = self::getAll();
        return $getAllSex[$sex_num];
    }

    public static function getAll()
    {
        return [
            self::$time081 => ['08:00', '08:30'],
            self::$time082 => ['08:30', '09:00'],

            self::$time091 => ['09:00', '09:30'],
            self::$time092 => ['09:30', '10:00'],

            self::$time101 => ['10:00', '10:30'],
            self::$time102 => ['10:30', '11:00'],

            self::$time111 => ['11:00', '11:30'],
            self::$time112 => ['11:30', '12:00'],

            self::$time121 => ['12:00', '12:30'],
            self::$time122 => ['12:30', '13:00'],

            self::$time131 => ['13:00', '13:30'],
            self::$time132 => ['13:30', '14:00'],

            self::$time141 => ['14:00', '14:30'],
            self::$time142 => ['14:30', '15:00'],

            self::$time151 => ['15:00', '15:30'],
            self::$time152 => ['15:30', '16:00'],

            self::$time161 => ['16:00', '16:30'],
            self::$time162 => ['16:30', '17:00'],

            self::$time171 => ['17:00', '17:30'],
            self::$time172 => ['17:30', '18:00'],

            self::$time181 => ['18:00', '18:30'],
            self::$time182 => ['18:30', '19:00'],

            self::$time191 => ['19:00', '19:30'],
            self::$time192 => ['19:30', '20:00'],

            self::$time201 => ['20:00', '20:30'],
            self::$time202 => ['20:30', '21:00'],

            self::$time211 => ['21:00', '21:30'],
            self::$time212 => ['21:30', '22:00'],

            self::$time221 => ['22:00', '22:30'],
            self::$time222 => ['22:30', '23:00'],
        ];
    }


    public static function getById(array $id = [])
    {
        if (!count($id)) {
            return '';
        }
        $all = self::getAll();
        $arr = [];
        foreach ($id as $key => $value) {
            array_push($arr, $all[$value]);
        }
        return $arr;
    }

    public static function getBeginEnd(array $id = [], $delimiter = null)
    {
        $prv = 0;
        $begin = null;
        $end = null;
        $all = self::getAll();
        foreach ($id as $key => $value) {
            $time = $all[$value];

            if ($key === 0) {
                $begin = $time[0];
                $prv = $value;
            } else {
                if (1 != $value - $prv) {
                    throw new Exception('can not get begin and end');
                }
                $end = $time[1];
                $prv = $value;
            }
        }
        if ($delimiter) {
            return $begin . $delimiter . $end;
        }
        return [$begin, $end];
    }

    public static function getNamesById(array $id = [], $delimiter = ', ')
    {
        if (!count($id)) {
            return '';
        }
        $all = self::getAll();
        $str = "";
        foreach ($id as $key => $value) {
            $str .= $all[$value] . $delimiter;
        }
        return rtrim($str, $delimiter);
    }
}

