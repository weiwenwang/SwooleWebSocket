<?php

namespace frontend\service;

use yii\base\Exception;

class SubjectService
{
    public static $Chainse = 101;
    public static $Math = 102;
    public static $English = 103;

    public static $Physics = 104;
    public static $Chemistry = 105;
    public static $Biological = 106;

    public static $Political = 107;
    public static $History = 108;
    public static $Geography = 109;
    public static $Art = 110;

    public static $ChainseName = "语文";
    public static $MathName = "数学";
    public static $EnglishName = "英语";

    public static $PhysicsName = "物理";
    public static $ChemistryName = "化学";
    public static $BiologicalName = "生物";

    public static $PoliticalName = "政治";
    public static $HistoryName = "历史";
    public static $GeographyName = "地理";
    public static $ArtName = "美术";

    public static function getSubjectById(array $id = [])
    {
        $all_subject = self::getAll();
        if (!count($id)) {
            return $all_subject;
        } else {
            $subect_array = [];
            foreach ($id as $key => $value) {
                if (array_key_exists($value, $all_subject)) {
                    $arr = ['id' => $value, 'name' => $all_subject[$value]];
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
            self::$Chainse => self::$ChainseName,
            self::$Math => self::$MathName,
            self::$English => self::$EnglishName,
            self::$Physics => self::$PhysicsName,
            self::$Chemistry => self::$ChemistryName,
            self::$Biological => self::$BiologicalName,
            self::$Political => self::$PoliticalName,
            self::$History => self::$HistoryName,
            self::$Geography => self::$GeographyName,
            self::$Art => self::$ArtName,
        ];
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