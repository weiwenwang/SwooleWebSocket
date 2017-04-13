<?php

namespace frontend\service;

use frontend\models\ToolStudent;

class ToolStudentService
{
    public function getList($page, $page_size, $where)
    {
        $list = ToolStudent::getList($page, $page_size, $where);
        foreach ($list['list'] as $key => $value) {
            $list['list'][$key]['sub'] = SubjectService::getSubjectNameById((array)json_decode($value['subject'], true));
            $list['list'][$key]['sex'] = SexService::getSexName($value['sex']);
            $list['list'][$key]['rel_type'] = RelativesService::getNameById([$value['rel_type']]);
            $list['list'][$key]['create_time'] = date('Y-m-d', strtotime($list['list'][$key]['create_time']));
        }
        return $list;
    }
}