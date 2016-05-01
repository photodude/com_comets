<?php
/**
 * @version    CVS: 1.0.3
 * @package    Com_Comets
 * @author     Troy Hall <troy@hallhome.us>
 * @copyright  2016 Troy Hall & Arkansas Sky Observatory
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access
defined('_JEXEC') or die;


?>
<?php if ($this->item) : ?>

	<div class="item_fields">
		<table class="table">
			<tr>
			<th><?php echo JText::_('COM_COMETS_FORM_LBL_COMETOBSERVED_STATE'); ?></th>
			<td>
			<i class="icon-<?php echo ($this->item->state == 1) ? 'publish' : 'unpublish'; ?>"></i></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMETS_FORM_LBL_COMETOBSERVED_CREATED_BY'); ?></th>
			<td><?php echo $this->item->created_by_name; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMETS_FORM_LBL_COMETOBSERVED_MODIFIED_BY'); ?></th>
			<td><?php echo $this->item->modified_by_name; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMETS_FORM_LBL_COMETOBSERVED_TIMESTAMP'); ?></th>
			<td><?php echo $this->item->timestamp; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMETS_FORM_LBL_COMETOBSERVED_OBSERVER'); ?></th>
			<td><?php echo $this->item->observer_name; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMETS_FORM_LBL_COMETOBSERVED_LOCATION'); ?></th>
			<td><?php echo $this->item->location; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMETS_FORM_LBL_COMETOBSERVED_DESG'); ?></th>
			<td><?php echo $this->item->desg; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMETS_FORM_LBL_COMETOBSERVED_DATE'); ?></th>
			<td><?php echo $this->item->date; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMETS_FORM_LBL_COMETOBSERVED_M1'); ?></th>
			<td><?php echo $this->item->m1; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMETS_FORM_LBL_COMETOBSERVED_DIAM'); ?></th>
			<td><?php echo $this->item->diam; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMETS_FORM_LBL_COMETOBSERVED_DC'); ?></th>
			<td><?php echo $this->item->dc; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMETS_FORM_LBL_COMETOBSERVED_PA'); ?></th>
			<td><?php echo $this->item->pa; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMETS_FORM_LBL_COMETOBSERVED_SCOPE'); ?></th>
			<td><?php echo $this->item->scope; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMETS_FORM_LBL_COMETOBSERVED_COMMENTS'); ?></th>
			<td><?php echo $this->item->comments; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMETS_FORM_LBL_COMETOBSERVED_IMAGE'); ?></th>
			<td><?php echo $this->item->image; ?></td>
</tr>

		</table>
	</div>
	
	<?php
else:
	echo JText::_('COM_COMETS_ITEM_NOT_LOADED');
endif;
