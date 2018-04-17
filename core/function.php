<?php
/**
 * 读取ENV配置
 * @param $key_name key名称
 * @param null $default  默认值
 * @return array|false|null|string
 */
if (!function_exists('env')){
    function env($key_name,$default = null)
    {
        $value = getenv($key_name);

        if ($value === false) {
            $value = $default;
        }
        return $value;
    }
}
