<?php
/**
 * @package     Joomla.Alpha
 * @subpackage  Controller
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\CMS\Alpha\Controller;

defined('_JEXEC') or die;

use Joomla\CMS\MVC\Controller\BaseController;
use Joomla\CMS\MVC\View\AbstractView;
use Joomla\CMS\Factory;

/**
 * Display controller class for the Joomla Alpha Application.
 *
 * @since  3.1
 */
class DemoController extends BaseController
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
		// TODO: more code here
		$this->input->set('view', 'demo');
		return parent::display($cachable, $urlparams);
	}

	public function showresult(){

		// TODO: more code here
		return $this->display();
	}
}
