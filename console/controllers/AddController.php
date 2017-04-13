<?php

namespace console\controllers;

use frontend\models\ToolAppointment;
use frontend\models\ToolStudent;
use frontend\models\ToolTeacher;
use frontend\models\ToolTrial;
use frontend\service\Common\DevTool;
use yii\console\Controller;

/**
 * Created by PhpStorm.
 * User: Wang
 * Date: 17/3/18
 * Time: 上午9:14
 */
class AddController extends Controller
{

    public function actionAdd(){
        echo 12;
    }
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionStudent($message = 'hello world')
    {
        $arr = [];
        $sub_array = [101, 102, 103, 104, 105, 106, 107, 108, 109, 110];
        for ($i = 0; $i < 100; $i++) {
            $a['name'] = DevTool::getName();
            $a['age'] = rand(8, 17);
            $a['org'] = 1;
            $a['rel_name'] = DevTool::getName();
            $a['rel_tel'] = '18862486209';
            $a['rel_type'] = rand(11, 17);
            shuffle($sub_array);
            $a['subject'] = json_encode(array_slice($sub_array, 0, 2));
            $a['sex'] = rand(0, 2);
            $a['address'] = DevTool::getAddress();
            $a['mark'] = 'this is mark';
            $a['number'] = DevTool::getStuNumber($i);
            array_push($arr, $a);
        }
        ToolStudent::toolAdd($arr);
    }

    public function actionTeacher($message = 'hello world')
    {
        $arr = [];
        $sub_array = [101, 102, 103, 104, 105, 106, 107, 108, 109, 110];
        for ($i = 0; $i < 100; $i++) {
            $a['org'] = 1;
            $a['name'] = DevTool::getName();
            $a['sex'] = rand(0, 2);
            $a['age'] = rand(20, 40);
            $a['subject'] = json_encode(array_slice($sub_array, 0, 2));
            $a['tel'] = '18862486209';
            $a['cet'] = DevTool::getCet();
            $a['native_id'] = DevTool::getAddress();
            $a['address_id'] = DevTool::getAddress();
            $a['address'] = DevTool::getAddress();
            $a['tea_year'] = rand(1, 20) * 0.5;
            $a['graduate_school'] = DevTool::getSchool();
            $a['mark'] = '能歌善舞,有耐心';
            $a['number'] = DevTool::getTeaNumber($i);
            array_push($arr, $a);
        }
        ToolTeacher::toolAdd($arr);
    }

    public function actionTrial($message = 'hello world')
    {
        $arr = [];
        for ($i = 0; $i < 100; $i++) {
            $a['org'] = 1;
            $a['tea_number'] = DevTool::getTeaNumber($i);
            $a['stu_sum'] = rand(0, 8);
            $a['subject_id'] = rand(101, 110);
            $a['time_long'] = 0.5 * rand(1, 10);
            $a['time'] = '2017-03-04';
            $a['time_id'] = json_encode([100, 101, 102]);
            $a['mark'] = '音乐发音讲解';
            $a['address'] = '东南大道100号';
            array_push($arr, $a);
        }
        ToolTrial::toolAdd($arr);
    }

    public function actionAppointment($message = 'hello world')
    {
        $arr = [];
        for ($i = 0; $i < 100; $i++) {
            $a['time'] = "jsdf";
            $a['org'] = 1;
            $a['tea_number'] = DevTool::getTeaNumber($i);
            $a['stu_number'] = DevTool::getStuNumber($i);
            $a['subject_id'] = 1;
            $a['time_long'] = 0.5 * rand(1, 10);
            $a['mark'] = 'this is mark';
            array_push($arr, $a);
        }
        ToolAppointment::toolAdd($arr);
    }
}