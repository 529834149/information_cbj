<?php
/**
 * @msg 获取当前摘要
 * @param $value
 * @param int $length
 * @return string
 *
 */
    function make_excerpt($value, $length = 200)
    {
        $excerpt = trim(preg_replace('/\r\n|\r|\n+/', ' ', strip_tags($value)));
        return str_limit($excerpt, $length);
    }