<?php
declare (strict_types=1);

namespace luoyan;

class sensitive
{
    /**
     * 过滤黑名单词汇
     *
     * @param string $string 需要过滤的内容
     * @param array $list 黑名单词汇
     * @return string 过滤后的内容
     */
    public static function sensitiveWord(string $string, array $list): string
    {
        $list_tmp = array_combine($list, array_fill(0, count($list), '***'));
        return strtr($string, $list_tmp);
    }

    /**
     * 过滤QQ号码
     *
     * @param string $string 需要过滤的内容
     * @return string 过滤后的内容
     */
    public static function sensitiveQQ(string $string): string
    {
        $pattern = '/[1-9][0-9]{4,10}/';
        preg_match_all($pattern, $string, $matches);
        $list_tmp = array_combine($matches[0], array_fill(0, count($matches[0]), '***'));
        return strtr($string, $list_tmp);
    }

    /**
     * 过滤手机号码
     *
     * @param string $string 需要过滤的内容
     * @return string 过滤后的内容
     */
    public static function sensitiveMobile(string $string): string
    {
        $pattern = '/^1[3456789]\d{9}$/';
        preg_match_all($pattern, $string, $matches);
        $fill = [];
        foreach ($matches[0] as $k => $v) {
            $fill[$k] = substr($v, 0, 3) . '****' . substr($v, 7);
        }
        $list_tmp = array_combine($matches[0], $fill);
        return strtr($string, $list_tmp);
    }

    /**
     * 过滤微信号码
     *
     * @param string $string 需要过滤的内容
     * @return string 过滤后的内容
     */
    public static function sensitiveWechat(string $string): string
    {
        $pattern = '/[a-zA-Z][a-zA-Z0-9_-]{5,19}/';
        preg_match_all($pattern, $string, $matches);
        $list_tmp = array_combine($matches[0], array_fill(0, count($matches[0]), '***'));
        return strtr($string, $list_tmp);
    }
}