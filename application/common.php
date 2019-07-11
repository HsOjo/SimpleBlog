<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
use app\admin\service\SettingService as SettingService;

/**
 * 用于获取数组中的成员，在键值不存在时，返回默认值。
 * @param $array
 * @param $key
 * @param $default
 * @return mixed
 */
function array_get_item($array, $key, $default)
{
    if (array_key_exists($key, $array))
        return $array[$key];
    else
        return $default;
}

function quote_escape($str)
{
    $str = str_replace('\\', '\\\\', $str);
    $str = str_replace('"', '\\"', $str);
    return $str;
}

function load_setting($key, $default = null)
{
    $item = (new SettingService())->getItemByCol($key, 'key');
    if (!empty($item)) {
        return json_decode($item['data'], true);
    } else {
        return $default;
    }
}

function save_setting($key, $value)
{
    $data = [
        'key' => $key,
        'data' => json_encode($value, JSON_UNESCAPED_UNICODE),
    ];

    $setting = load_setting($key);
    if (!is_null($setting))
        $result = (new SettingService())->itemEdit($data, 'key');
    else
        $result = (new SettingService())->itemAdd($data);

    return $result;
}

function format_plain_text($str) {
    $str = str_replace("\n", '<br>', $str);
    return $str;
}