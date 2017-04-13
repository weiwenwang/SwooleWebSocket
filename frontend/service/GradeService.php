<?php

namespace frontend\service;

use yii\base\Exception;

class GradeService
{
    public static $PrimaryOne = 101;
    public static $PrimaryTwo = 102;
    public static $PrimaryThree = 103;
    public static $PrimaryFour = 104;
    public static $PrimaryFive = 105;
    public static $PrimarySix = 106;

    public static $JuniorOne = 107;
    public static $JuniorTwo = 108;
    public static $JuniorThree = 109;

    public static $SeniorOne = 110;
    public static $SeniorTwo = 111;
    public static $SeniorThree = 112;

    public static $PrimaryOneSingleName = "小一";
    public static $PrimaryTwoSingleName = "小二";
    public static $PrimaryThreeSingleName = "小三";
    public static $PrimaryFourSingleName = "小四";
    public static $PrimaryFiveSingleName = "小五";
    public static $PrimarySixSingleName = "小六";

    public static $JuniorOneSingleName = "初一";
    public static $JuniorTwoSingleName = "初二";
    public static $JuniorThreeSingleName = "初三";

    public static $SeniorOneSingleName = "高一";
    public static $SeniorTwoSingleName = "高二";
    public static $SeniorThreeSingleName = "高三";


    public static $PrimaryOneName = "小学一年级";
    public static $PrimaryTwoName = "小学二年级";
    public static $PrimaryThreeName = "小学三年级";
    public static $PrimaryFourName = "小学四年级";
    public static $PrimaryFiveName = "小学五年级";
    public static $PrimarySixName = "小学六年级";

    public static $JuniorOneName = "初中一年级";
    public static $JuniorTwoName = "初中二年级";
    public static $JuniorThreeName = "初中三年级";

    public static $SeniorOneName = "高中一年级";
    public static $SeniorTwoName = "高中二年级";
    public static $SeniorThreeName = "高中三年级";


    public static function getSubjectById(array $id = [], $sigleName = true)
    {
        $all_subject = self::getAll($sigleName);
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

    public static function getAll($sigleName = true)
    {
        if ($sigleName) {
            $all_subject = [
                self::$PrimaryOne => self::$PrimaryOneSingleName,
                self::$PrimaryTwo => self::$PrimaryTwoSingleName,
                self::$PrimaryThree => self::$PrimaryThreeSingleName,
                self::$PrimaryFour => self::$PrimaryFourSingleName,
                self::$PrimaryFive => self::$PrimaryFiveSingleName,
                self::$PrimarySix => self::$PrimarySixSingleName,
                self::$JuniorOne => self::$JuniorOneSingleName,
                self::$JuniorTwo => self::$JuniorTwoSingleName,
                self::$JuniorThree => self::$JuniorThreeSingleName,
                self::$SeniorOne => self::$SeniorOneSingleName,
                self::$SeniorTwo => self::$SeniorTwoSingleName,
                self::$SeniorThree => self::$SeniorThreeSingleName,
            ];
        } else {
            $all_subject = [
                [self::$PrimaryOne => self::$PrimaryOneName,
                    self::$PrimaryTwo => self::$PrimaryTwoName,
                    self::$PrimaryThree => self::$PrimaryThreeName,
                    self::$PrimaryFour => self::$PrimaryFourName,
                    self::$PrimaryFive => self::$PrimaryFiveName,
                    self::$PrimarySix => self::$PrimarySixName,
                ],
                [
                    self::$JuniorOne => self::$JuniorOneName,
                    self::$JuniorTwo => self::$JuniorTwoName,
                    self::$JuniorThree => self::$JuniorThreeName,
                ],
                [self::$SeniorOne => self::$SeniorOneName,
                    self::$SeniorTwo => self::$SeniorTwoName,
                    self::$SeniorThree => self::$SeniorThreeName,
                ]
            ];
        }
        return $all_subject;
    }

    public static function getSubjectNameById(array $id = [], $delimiter = ', ')
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