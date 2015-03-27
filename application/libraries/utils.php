<?php
    class Utils 
    {
        /**
         * 页面参数获取
         */
        public static function GetValue($var, $reg = null)
        {
            header('Content-Type: text/html; charset=utf-8');
            $value = array_key_exists($var, $_GET) ? $_GET[$var] : (array_key_exists($var, $_POST) ? $_POST[$var] : "");
            $value= (isset($value) && count($value) > 0) ? $value : "";
            $value = is_array($value) ? $value : trim($value);

            if (!self::CheckValue($value, $reg))
            {
                return false;
            }

            return is_array($value) ? $value : htmlspecialchars($value);
        }
        
        /**
         * 页面参数获取（仅获取POST值）
         */
        public static function GetPost($var, $reg = null)
        {
            header('Content-Type: text/html; charset=utf-8');
            $value = array_key_exists($var, $_POST) ? $_POST[$var] : "";
            $value= (isset($value) && count($value) > 0) ? $value : "";
            $value = is_array($value) ? $value : trim($value);

            if (!self::CheckValue($value, $reg))
            {
                return false;
            }

            return is_array($value) ? $value : htmlspecialchars($value);
        }

        /**
         * 数据库输入过滤
         */
        public static function EscapeDBInput($input)
        {
            $input = mysql_real_escape_string($input);

            //$input = str_replace("_", "\_", $input);
            $input = str_replace("%", "\%", $input);
            $input = preg_replace('/sleep\(.*\)/i', '', $input);

            return $input;
        }

        /**
         * 参数检查
         */
        public static function CheckValue($var, $reg)
        {
            if (empty($reg))
            {
                return true;
            }

            return ereg($reg, $var);
        }


    }

?>