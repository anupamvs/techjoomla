<?php
	require_once dirname(__FILE__) . '/helper.php';
	$hello = modHelloWorldHelper::getRecords($params);
	require JModuleHelper::getLayoutPath('mod_test');
?>
