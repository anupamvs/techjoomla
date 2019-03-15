<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file

defined('_JEXEC') or die('Restricted Access');

JHtml::_('formbehavior.chosen', 'select');

$listOrder     = $this->escape($this->filter_order);
$listDirn      = $this->escape($this->filter_order_Dir);
?>
<form action="index.php?option=com_product&view=product" method="post" id="adminForm" name="adminForm">
	<div class="row-fluid">
		<div class="span6">
			<?php
				echo JLayoutHelper::render(
					'joomla.searchtools.default',
					array('view' => $this)
				);
			?>
		</div>
	</div>
	<?php

	?>
	<table class="table table-striped table-hover">
		<thead>
		<tr>
			<th width="1%"><?php echo JText::_('ID');?></th>
			<th width="2%">
				<?php echo JHtml::_('grid.checkall'); ?>
			</th>
			<th width="25%">
				<?php echo JHtml::_('grid.sort', 'Name', 'name', $listDirn, $listOrder); ?>
			</th>
			<th width="10%">
				<?php echo JHtml::_('grid.sort', 'Published', 'status', $listDirn, $listOrder); ?>
			</th>
			<th width="10%">
				<?php echo JHtml::_('grid.sort', 'Category', 'Category', $listDirn, $listOrder); ?>
			</th>
			<th width="50%">
				<?php echo JHtml::_('grid.sort', 'Description', 'description', $listDirn, $listOrder); ?>
			</th>
		</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="5">
					<?php echo $this->pagination->getListFooter(); ?>
				</td>
			</tr>
		</tfoot>
		<tbody>
			<?php if (!empty($this->items)) : ?>
				<?php foreach ($this->items as $i => $row) :
					$link = JRoute::_('index.php?option=com_helloworld&task=helloworld.edit&id=' . $row->id);
				?>
					<!-- <tr>
						
						<td><?php //echo $this->pagination->getRowOffset($i); ?></td>
						<td>
							<?php //echo JHtml::_('grid.id', $i, $row->id); ?>
						</td>
						<td>
							<?php //echo $row->name; ?>
						</td>
						<td>
							<?php //echo $row->category; ?>
						</td>
						<td align="center">
							<?php //echo $row->description; ?>
						</td>
					</tr> -->
					<tr>
						<td>
							<?php echo $this->pagination->getRowOffset($i); ?>
						</td>
						<td>
							<?php echo JHtml::_('grid.id', $i, $row->id); ?>
						</td>
						<td>
							<?php echo $row->name; ?>
						</td>
						<td align="center">
							<?php echo JHtml::_('jgrid.published', $row->id, $i, 'helloworlds.', true, 'cb'); ?>
						</td>
						<td>
							<?php echo $row->category; ?>
						</td>
						<td align="center">
							<?php echo $row->description; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
	<input type="hidden" name="task" value=""/>
	<input type="hidden" name="boxchecked" value="0"/>
	<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>
	<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>"/>
	<?php echo JHtml::_('form.token'); ?>
</form>