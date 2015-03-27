<?php
/**
* MongoDB数据库实例
* @author leoHuang
* 2015/03
**/
    class MDBHelper extends CI_Model
    {
        /**
        * 生成数据库操作对象
        */
        public static function GenerateClient()
        {

            $mdbClient = new MDBUtils();

            if (!$mdbClient->connect())
            {
                return null;
            }
            
            return $mdbClient;
        }

    }

?>