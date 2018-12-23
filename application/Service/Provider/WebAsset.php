<?php
/**
 * Joomla! Content Management System
 *
 * @copyright  Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\CMS\Alpha\Service\Provider;

defined('JPATH_PLATFORM') or die;

use Joomla\CMS\WebAsset\WebAssetRegistry;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;

/**
 * Service provider for the application's WebAsset dependency
 *
 * @since  4.0.0
 */
class WebAsset implements ServiceProviderInterface
{
	/**
	 * Registers the service provider with a DI container.
	 *
	 * @param   Container  $container  The DI container.
	 *
	 * @return  void
	 *
	 * @since   4.0.0
	 */
	public function register(Container $container)
	{
		/*$container->alias('webasset.alpha', WebAssetRegistry::class)
			->share(
				WebAssetRegistry::class,
				function (Container $container)
				{
					$registry = new WebAssetRegistry;

					// Set up Dispatcher
					$registry->setDispatcher($container->get('Joomla\Event\DispatcherInterface'));

					//$registry->addRegistryFile('media/vendor/joomla.asset.json')
					//	->addRegistryFile('media/system/joomla.asset.json')
					//	->addRegistryFile('media/legacy/joomla.asset.json');
					// smpLeader need to remove those if we do not want to edit core Joomla WebAsset Provider
die('called');
					// Add Core registry files
					$registry->addRegistryFile('template/vendor.asset.json')
						->addRegistryFile('template/system.asset.json');
				//		->addRegistryFile('media/legacy/joomla.asset.json');

					return $registry;
				},
				true
			);*/
	}
}
