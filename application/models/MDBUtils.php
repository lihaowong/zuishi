<?php
/**
* MongoDB数据库操作类
* @author leoHuang
* 2015/03
**/
    class MDBUtils extends CI_Model
    {
        private static $mdb = null;
        private $connected = false;
        private $errMeg = null;

        function __construct()
        {
            parent::__construct();
        }

        //返回数据库对象
        public function getMDB()
        {
            if (!$this->mdb)
            {
                $this->errMsg = "连接数据库错误:";

                return null;
            }
            else 
            {
                return $this->mdb;
            }
        }

        //连接数据库
        public function connect()
        {
            //连接zuishi数据库
            $this->mdb = $this->mongo->db;

            if (!$this->mdb)
            {
                $this->errMsg = "连接数据库错误:";

                return false;
            }

            $this->connected = true;
            return true;
        }

        //获取连接状态
        public function isConnected()
        {
            return $this->connected;
        }

        /*
        **插入数据 
        **参数：$collName:集合名 
        **      $para:Array('column_name'=>'value')
        */
        public function insert($collName, $para)
        {
            if (!$this->connected)
            {
                return false;
            }

            $collection = $this->mdb->selectCollection($collName);

            $res = $collection->insert($para);
            
            if ($res == false)
            {
                return false;
            }
            
            return true;
        }

        /*
        **更新数据 
        **参数：$collName:集合名 
        **      $where:更新条件 Array('column_name'=>'value')
        **      $newData:更新内容 Array('column_name1'=>'value1','column_name2'=>'value2')
        */
        public function update($collName, $where, $newData)
        {
            if (!$this->connected)
            {
                return false;
            }

            $collection = $this->mdb->selectCollection($collName);

            $collection->update($where, array('$set' => $newData));

        }

        /*
        **删除
        **参数：$collName:集合名 
        **      $where:Array('column_name'=>'value')
        */
        public function delete($collName, $where)
        {
            if (!$this->connected)
            {
                return false;
            }

            $collection = $this->mdb->selectCollection($collName);

            $collection->remove($where);

        }

        /*
        **查询
        **参数：$collName:集合名 
        **      $where:Array('column_name'=>'value')
        */
        public function query($collName, $where)
        {
            $res = array();
            $cursor = null;

            if (!$this->connected)
            {
                return false;
            }

            $collection = $this->mdb->selectCollection($collName);

            //有无附加条件
            if (!$where)
            {
                $cursor = $collection->find();
            }
            else
            {
                $cursor = $collection->find($where);
            }

            foreach ($cursor as $id => $value) 
            {
                $res[] = $value;
            }

            return $res;

        }

        public function getRecNum($collName, $where)
        {
            $num = 0;

            if (!$this->connected)
            {
                return false;
            }

            $collection = $this->mdb->selectCollection($collName);

            //有无附加条件
            if (!$where)
            {
                $num = $collection->find()->count();
            }
            else
            {
                $num = $collection->find($where)->count();
            }
            
            return $num;

        }

        public function getError()
        {
            return $this->errMsg;
        }

    }


?>