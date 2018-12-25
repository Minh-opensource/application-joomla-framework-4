<?php
/**
 * @package     Joomla.Alpha
 * @subpackage  View
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\CMS\Alpha\View\Demo;

defined('_JEXEC') or die;

use Joomla\CMS\Alpha\View\DefaultView;
use Joomla\CMS\Version;

/**
 * The HTML Joomla Demo View
 *
 * @since  3.1
 */
class HtmlView extends DefaultView
{

	/**
	 * Execute and display a template script.
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  mixed  A string if successful, otherwise an Error object.
	 *
	 * @since   4.0.0
	 */
	public function display($tpl = null)
	{
		// TODO: add some code to archive infor from model
		return parent::display($tpl);
	}
}
