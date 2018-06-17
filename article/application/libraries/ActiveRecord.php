<?php
if (!defined('BASEPATH')) die('No direct script access allowed');
class ActiveRecord {
	public function __construct() {
		require_once APPPATH.'third_party/php-activerecord/ActiveRecord.php';
		ActiveRecord\Config::initialize(function($cfg)
		{
			$cfg->set_model_directory(APPPATH .'models/');
			$cfg->set_connections(array('development' =>'mysql://root:@localhost/article'));
		});
	}
}?>
