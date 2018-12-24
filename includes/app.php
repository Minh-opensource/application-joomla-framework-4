<?php
/**
 * @package     Joomla.Alpha
 * @subpackage  Application
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Define the base path and require the other defines
define('JPATH_BASE', dirname(__DIR__));

require_once __DIR__ . '/defines.php';

// Check for presence of vendor dependencies not included in the git repository
if (!file_exists(JPATH_LIBRARIES . '/vendor/autoload.php') || !is_dir(JPATH_ROOT . '/media/vendor') )
{
	echo file_get_contents(JPATH_ROOT . '/templates/system/build_incomplete.html');

	exit;
}

// Launch the application
require_once __DIR__ . '/framework.php';

// Check if the default log directory can be written to, add a logger for errors to use it
if (is_writable(JPATH_ADMINISTRATOR . '/logs'))
{
	\Joomla\CMS\Log\Log::addLogger(
		[
			'format'    => '{DATE}\t{TIME}\t{LEVEL}\t{CODE}\t{MESSAGE}',
			'text_file' => 'error.php'
		],
		\Joomla\CMS\Log\Log::ALL,
		['error']
	);
}

// Register the Alpha application
JLoader::registerNamespace('Joomla\\CMS\\Alpha', JPATH_ALPHA . '/application', false, false, 'psr4');

JLoader::registerAlias('JRouterAlpha', \Joomla\CMS\Alpha\Router\AlphaRouter::class);

// Get the dependency injection container
$container = \Joomla\CMS\Factory::getContainer();
$container->registerServiceProvider(new \Joomla\CMS\Alpha\Service\Provider\Application);
$container->registerServiceProvider(new \Joomla\CMS\Alpha\Service\Provider\Session);
//$container->registerServiceProvider(new \Joomla\CMS\Alpha\Service\Provider\WebAsset);

/*
 * Alias the session service keys to the web session service as that is the primary session backend for this application
 *
 * In addition to aliasing "common" service keys, we also create aliases for the PHP classes to ensure autowiring objects
 * is supported.  This includes aliases for aliased class names, and the keys for alised class names should be considered
 * deprecated to be removed when the class name alias is removed as well.
 */
$container->alias('session.web', 'session.web.alpha')
	->alias('session', 'session.web.alpha')
	->alias('JSession', 'session.web.alpha')
	->alias(\Joomla\CMS\Session\Session::class, 'session.web.alpha')
	->alias(\Joomla\Session\Session::class, 'session.web.alpha')
	->alias(\Joomla\Session\SessionInterface::class, 'session.web.alpha');
	//->alias('webasset', 'webasset.alpha');

// Instantiate and execute the application
$container->get(\Joomla\CMS\Alpha\Application\AlphaApplication::class)->execute();
