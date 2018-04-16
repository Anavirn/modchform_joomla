<?php

defined('_JEXEC') or die;
require_once dirname(__FILE__) . '/helper.php';
	$document = JFactory::getDocument();
	$layout = $params->get('layout', 'default');
	require JModuleHelper::getLayoutPath('mod_chform', '$layout');

?>