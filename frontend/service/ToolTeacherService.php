<?php
/**
 * Created by PhpStorm.
 * User: wang
 * Date: 2017/2/4
 * Time: 18:48
 */

namespace frontend\service;

use frontend\models\ToolTeacher;

class ToolTeacherService extends FaService
{
    public function getList($page, $page_size, $where)
    {
        $list = ToolTeacher::getList($page, $page_size, $where);
        foreach ($list['list'] as $key => $value) {
            $list['list'][$key]['subject'] = SubjectService::getSubjectNameById(json_decode($value['subject']));
            $list['list'][$key]['sex'] = SexService::getSexName($value['sex']);
            $list['list'][$key]['cet'] = CetService::getCetNameById(json_decode($value['cet']));
            $list['list'][$key]['native_id'] = AddService::getAddress($value['native_id'], 0, 1, 1);
            $list['list'][$key]['address_id'] = AddService::getAddress($value['address_id'], 0, 1, 1);
        }
        return $list;
    }

//    public function getList($org_id, $page, $page_size, $count = false)
//    {
//        $list_all = ToolTeacher::getList($org_id, $page, $page_size, true);
//        $list = $list_all['all'];
//        foreach ($list as $key => $value) {
//            $list[$key]['subject'] = SubjectService::getSubjectNameById(json_decode($value['subject']));
//            $list[$key]['sex'] = SexService::getSexName($value['sex']);
//            $list[$key]['cet'] = CetService::getCetNameById(json_decode($value['cet']));
//            $list[$key]['native_place'] = AddService::getAddress($value['native_place'], AddService::$type_pro_city, "省", "市");
//            $list[$key]['address_id'] = AddService::getAddress($value['address_id'], AddService::$type_city, "省", "市");
//        }
//        if ($count) {
//            return ['list' => $list, 'count' => $list_all['count']];
//        }
//        return $list;
//    }
}