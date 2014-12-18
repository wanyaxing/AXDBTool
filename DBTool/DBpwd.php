<?php
/**
 * 数据库账号密码声明，内置了一个默认的可用的数据库连接
 * @package DBTool
 * @author axing
 * @since 1.0
 * @version 1.0
 */
	if (!defined('DB_HOST'))
	{
		define('DB_HOST', '127.0.0.1');
		define('DB_USER', 'wanyaxing');
		define('DB_PASSWORD', 'pwd1234');
        define('DB_DATABASE', 'tbtest');
		define('DB_PORT', '3306');
	}

