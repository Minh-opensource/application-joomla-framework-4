<?php
/**
 * @package    Joomla.Alpha
 *
 * @copyright  Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

/** @var \Joomla\CMS\Alpha\View\Remove\HtmlView $this */
?>
<div data-page-name="demo">

	<fieldset id="installCongrat" class="j-install-step active">
		<legend class="j-install-step-header">
			<span class="fa fa-trophy" aria-hidden="true"></span> <?php echo Text::_('TXT_COMPLETE_CONGRAT'); ?>
		</legend>
		<div class="j-install-step-form">
			<h2><?php echo Text::_('TXT_COMPLETE_TITLE'); ?></h2>
			<p><?php echo Text::_('TXT_COMPLETE_DESC'); ?></p>
			<div class="form-group">
				<button class="btn btn-primary btn-block" id="" onclick="document.location.href='index.php'"><?php echo Text::_('TXT_BACK_HOME'); ?> <span class="fa fa-chevron-right" aria-hidden="true"></span></button>
			</div>
		</div>
	</fieldset> 

</div>
