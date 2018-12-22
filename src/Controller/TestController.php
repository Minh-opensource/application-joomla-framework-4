<?php
/**
 * @package     Joomla.Installation
 * @subpackage  Controller
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\CMS\Installation\Controller;

defined('_JEXEC') or die;

use Joomla\CMS\MVC\Controller\BaseController;
use Joomla\CMS\MVC\View\AbstractView;
use Joomla\CMS\Factory;

/**
 * Display controller class for the Joomla Installer.
 *
 * @since  3.1
 */
class TestController extends BaseController
{
	/**
	 * Method to display a view.
	 *
	 * @param   boolean  $cachable   If true, the view output will be cached.
	 * @param   boolean  $urlparams  An array of safe URL parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
	 *
	 * @return  \Joomla\CMS\MVC\Controller\BaseController  This object to support chaining.
	 *
	 * @since   1.5
	 */
	public function display($cachable = false, $urlparams = false)
	{

		$sess = \JFactory::getSession();
		$in = $this->input->get->get('test','');
		if($in){
			var_dump($in);
			$sess->set('aaa',$in);
		}

		echo '<h2>Result: ';
		echo $sess->get('aaa');
		echo '</h2>';
		
		jexit();

		$app = $this->app;

		$defaultView = 'setup';

		// If the app has already been installed, default to the remove view
		if (file_exists(JPATH_CONFIGURATION . '/configuration.php')
			&& filesize(JPATH_CONFIGURATION . '/configuration.php') > 10
			&& file_exists(JPATH_INSTALLATION . '/index.php'))
		{
			$defaultView = 'remove';
		}

		// Are we allowed to proceed?
		$model = $this->getModel('Checks');

		$vName = $this->input->getWord('view', $defaultView);

		if (!$model->getPhpOptionsSufficient() && $defaultView !== 'remove')
		{
			if ($vName !== 'preinstall')
			{
				$app->redirect('index.php?view=preinstall');
			}

			$vName = 'preinstall';
		}
		else
		{
			if ($vName === 'preinstall')
			{
				$app->redirect('index.php?view=setup');
			}

			if ($vName === 'remove' && !file_exists(JPATH_CONFIGURATION . '/configuration.php'))
			{
				$app->redirect('index.php?view=setup');
			}

			if ($vName !== $defaultView && !$model->getOptions() && $defaultView !== 'remove')
			{
				$app->redirect('index.php');
			}
		}

		$this->input->set('view', $vName);

		return parent::display($cachable, $urlparams);
	}

	/**
	 * Method to get a reference to the current view and load it if necessary.
	 *
	 * @param   string  $name    The view name. Optional, defaults to the controller name.
	 * @param   string  $type    The view type. Optional.
	 * @param   string  $prefix  The class prefix. Optional.
	 * @param   array   $config  Configuration array for view. Optional.
	 *
	 * @return  AbstractView  Reference to the view or an error.
	 *
	 * @since   3.0
	 * @throws  \Exception
	 */
	public function getView($name = '', $type = '', $prefix = '', $config = array())
	{
		$view = parent::getView($name, $type, $prefix, $config);

		if ($view instanceof AbstractView)
		{
			// Set some models, used by various views
			$view->setModel($this->getModel('Checks'));
			$view->setModel($this->getModel('Languages'));
		}

		return $view;
	}

	public function api(){
		echo '<h2>POST</h2>';
		var_dump($_POST);
		echo '<h2>GET</h2>';
		var_dump($_GET);
		
		die();
	}
}
