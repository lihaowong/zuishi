<?php
/**
 * CI封装的MongoDB类库
 *
 */
class CI_Mongo extends Mongo
{
	var $db;
	
	function CI_Mongo()
	{
		// 取CI实例
		$ci = get_instance();
		// 载入Mongo配置
		$ci->load->config('mongo');
		
		// 从配置中取Mongo服务器和库名
		$server = $ci->config->item('mongo_server');
		$dbname = $ci->config->item('mongo_dbname');
		
		// 初始化
		if ($server)
		{
			parent::__construct($server);
		}
		else
		{
			parent::__construct();
		}
		$this->db = $this->$dbname;
	}
}