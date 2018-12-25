<?php
/**
 * @package     Joomla.Alpha
 * @subpackage  View
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

/** @var \Joomla\CMS\Alpha\View\Setup\HtmlView $this */
?>


<div id="installer-view" data-page-name="setup">
	<form action="index.php" method="post" id="xForm" class="lang-select">
		<fieldset class="j-install-step active">
			<legend class="j-install-step-header">
				<span class="fa fa-language" aria-hidden="true"></span> <?php echo Text::_('TXT_SELECT_INSTALL_LANG'); ?>
			</legend>
			<div class="j-install-step-form">
				<div class="form-group">
					<?php echo $this->form->getLabel('name'); ?>
					<?php echo $this->form->getInput('name'); ?>
				</div>
				<div class="form-group">
					<?php echo $this->form->getLabel('msg'); ?>
					<?php echo $this->form->getInput('msg'); ?>
				</div>
				<input type="hidden" name="task" value="demo.showresult">
				<!--input type="hidden" name="format" value="json">-->
				<?php echo HTMLHelper::_('form.token'); ?>
				<input type="submit" value="<?php echo JText::_('TXT_SEND') ?>" />
			</div>
		</fieldset>
	</form>
</div>
