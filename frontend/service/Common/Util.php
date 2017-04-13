<?php

namespace frontend\service\Common;

class Util
{
    public static function columnCombine($teacher_info, $column)
    {
        $key = array_column($teacher_info, $column);

        $new = array_combine($key, $teacher_info);
        return $new;
    }

}
