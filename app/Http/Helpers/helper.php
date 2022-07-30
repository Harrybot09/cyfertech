<?php
/**
 * Write code on Method
 *
 * @return response()
 */

if (! function_exists('result')) {
    function result($data='',$info='',$status='',$type='')
    {
        return [
          $data1=$data,
          $info1=$info,
          $type1=$type,
          $status1=$status
        ];
    }
}
