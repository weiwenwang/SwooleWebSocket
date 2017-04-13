<?php
/**
 * Created by PhpStorm.
 * User: wang
 * Date: 2017/2/4
 * Time: 21:09
 */

namespace frontend\service\Common;

use frontend\service\AddService;

class DevTool
{
    public static function getName()
    {
        $first_name = ['倪', '马', '孟', '高', '蔡', '罗', '尹', '师', '卢', '纪', '束', '朱', '寿', '杭', '纪', '焦', '宋'];
        $last_name = ['依琳', '学端', '庆一', '洪志', '天龙', '文', '国驹', '胜杰', '玥行', '传猛', '鹏鹏', '秀华', '施滉', '震华',
            '冉庸', '冉耕', '翟春皓', '阳红光', '爱星', '咏存', '鸿志', '溪坪', '影明', '市明', '硕鹏', '谭升', '浩',];
        $first = array_rand($first_name, 1);
        $last = array_rand($last_name, 1);
        return $first_name[$first] . $last_name[$last];
    }

    public static function getAddress()
    {
        $pro_key = array_rand(AddService::$province, 1);
        $city_array = AddService::$city[$pro_key];
        $city_key = array_rand($city_array, 1);
        return $pro_key . '-' . $city_key;
    }

    public static function getTeaYear()
    {
        $tea_year = [0.5, 1, 1.5, 2.0, 2, 5, 3.0, 4, 5, 6, 7, 8, 9, 10];
        return $tea_year[array_rand($tea_year, 1)];
    }

    public static function getSchool()
    {
        $school = ['华东师范大学', '北京师范大学', '华东师范大学 ', ' 华中师范大学 ', '东北师范大学 ',
            ' 华南师范大学 ', '南京师范大学 ', ' 陕西师范大学 ', ' 湖南师范大学'];

        return $school[array_rand($school, 1)];
    }

    public static function getStuNumber($i)
    {
        return 'ABC_ST_1703' . sprintf("%03d", $i + 1);
    }

    public static function getTeaNumber($i)
    {
        return 'ABC_TE_1703' . sprintf("%02d", $i + 1);
    }


    public static function getSubject()
    {
        $subject = [101, 102, 103, 104, 105, 106, 107, 108, 109, 110];
        $sub_a = $subject[array_rand($subject, 1)];
        $sub_b = $subject[array_rand($subject, 1)];
        $arr = [$sub_a, $sub_b];
        return json_encode($arr);
    }

    public static function getCet()
    {
        $cet = [11, 12, 13, 14, 15];
        return json_encode([$cet[array_rand($cet, 1)]]);
    }

}