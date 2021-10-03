<?php

// Configuration
if (is_file('config.php')) {
	require_once('config.php');
}

// Startup
require_once(DIR_SYSTEM . 'page404.php');
require_once(DIR_SYSTEM . 'model.php');
require_once(DIR_SYSTEM . 'controller.php');
require_once(DIR_SYSTEM . 'routing.php');