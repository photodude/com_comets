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

jimport('joomla.application.component.view');

/**
 * View class for a list of Comets.
 *
 * @since  1.6
 */
class CometsViewCometobservations extends JViewLegacy
{
	protected $items;

	protected $pagination;

	protected $state;

	/**
	 * Display the view
	 *
	 * @param   string  $tpl  Template name
	 *
	 * @return void
	 *
	 * @throws Exception
	 */
	public function display($tpl = null)
	{
		$this->state = $this->get('State');
		$this->items = $this->get('Items');
		$this->pagination = $this->get('Pagination');

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			throw new Exception(implode("\n", $errors));
		}

		CometsHelpersComets::addSubmenu('cometobservations');

		$this->addToolbar();

		$this->sidebar = JHtmlSidebar::render();
		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @return void
	 *
	 * @since    1.6
	 */
	protected function addToolbar()
	{
		$state = $this->get('State');
		$canDo = CometsHelpersComets::getActions();

		JToolBarHelper::title(JText::_('COM_COMETS_TITLE_COMETOBSERVATIONS'), 'cometobservations.png');

		// Check if the form exists before showing the add/edit buttons
		$formPath = JPATH_COMPONENT_ADMINISTRATOR . '/views/cometobserved';

		if (file_exists($formPath))
		{
			if ($canDo->get('core.create'))
			{
				JToolBarHelper::addNew('cometobserved.add', 'JTOOLBAR_NEW');
				JToolbarHelper::custom('cometobservations.duplicate', 'copy.png', 'copy_f2.png', 'JTOOLBAR_DUPLICATE', true);
			}

			if ($canDo->get('core.edit') && isset($this->items[0]))
			{
				JToolBarHelper::editList('cometobserved.edit', 'JTOOLBAR_EDIT');
			}
		}

		if ($canDo->get('core.edit.state'))
		{
			if (isset($this->items[0]->state))
			{
				JToolBarHelper::divider();
				JToolBarHelper::custom('cometobservations.publish', 'publish.png', 'publish_f2.png', 'JTOOLBAR_PUBLISH', true);
				JToolBarHelper::custom('cometobservations.unpublish', 'unpublish.png', 'unpublish_f2.png', 'JTOOLBAR_UNPUBLISH', true);
			}
			elseif (isset($this->items[0]))
			{
				// If this component does not use state then show a direct delete button as we can not trash
				JToolBarHelper::deleteList('', 'cometobservations.delete', 'JTOOLBAR_DELETE');
			}

			if (isset($this->items[0]->state))
			{
				JToolBarHelper::divider();
				JToolBarHelper::archiveList('cometobservations.archive', 'JTOOLBAR_ARCHIVE');
			}

			if (isset($this->items[0]->checked_out))
			{
				JToolBarHelper::custom('cometobservations.checkin', 'checkin.png', 'checkin_f2.png', 'JTOOLBAR_CHECKIN', true);
			}
		}

		// Show trash and delete for components that uses the state field
		if (isset($this->items[0]->state))
		{
			if ($state->get('filter.state') == -2 && $canDo->get('core.delete'))
			{
				JToolBarHelper::deleteList('', 'cometobservations.delete', 'JTOOLBAR_EMPTY_TRASH');
				JToolBarHelper::divider();
			}
			elseif ($canDo->get('core.edit.state'))
			{
				JToolBarHelper::trash('cometobservations.trash', 'JTOOLBAR_TRASH');
				JToolBarHelper::divider();
			}
		}

		if ($canDo->get('core.admin'))
		{
			JToolBarHelper::preferences('com_comets');
		}

		// Set sidebar action - New in 3.0
		JHtmlSidebar::setAction('index.php?option=com_comets&view=cometobservations');

		$this->extra_sidebar = '';
		JHtmlSidebar::addFilter(

			JText::_('JOPTION_SELECT_PUBLISHED'),

			'filter_published',

			JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), "value", "text", $this->state->get('filter.state'), true)

		);
		//Filter for the field observer
		$this->extra_sidebar .= '<div class="other-filters">';
		$this->extra_sidebar .= '<small><label for="filter_observer">Observer</label></small>';
		$this->extra_sidebar .= JHtmlList::users('filter_observer', $this->state->get('filter.observer'), 1, 'onchange="this.form.submit();"');
		$this->extra_sidebar .= '</div>';
		$this->extra_sidebar .= '<hr class="hr-condensed">';

		//Filter for the field location
		$select_label = JText::sprintf('COM_COMETS_FILTER_SELECT_LABEL', 'Location');
		$options = array();
		$options[0] = new stdClass();
		$options[0]->value = "ASO-Petit Jean";
		$options[0]->text = "ASO-Petit Jean";
		$options[1] = new stdClass();
		$options[1]->value = "ASO-Petit Jean H45";
		$options[1]->text = "H45";
		$options[2] = new stdClass();
		$options[2]->value = "ASO-Petit Jean H41";
		$options[2]->text = "H41";
		$options[3] = new stdClass();
		$options[3]->value = "ASO - Conway H43";
		$options[3]->text = "H43";
		$options[4] = new stdClass();
		$options[4]->value = "ASO - Conway";
		$options[4]->text = "ASO - Conway";
		JHtmlSidebar::addFilter(
			$select_label,
			'filter_location',
			JHtml::_('select.options', $options , "value", "text", $this->state->get('filter.location'), true)
		);

			//Filter for the field date
		$this->extra_sidebar .= '<div class="other-filters">';
			$this->extra_sidebar .= '<small><label for="filter_from_date">'. JText::sprintf('COM_COMETS_FROM_FILTER', 'Date') .'</label></small>';
			$this->extra_sidebar .= JHtml::_('calendar', $this->state->get('filter.date.from'), 'filter_from_date', 'filter_from_date', '%Y-%m-%d', array('style' => 'width:142px;', 'onchange' => 'this.form.submit();'));
			$this->extra_sidebar .= '<small><label for="filter_to_date">'. JText::sprintf('COM_COMETS_TO_FILTER', 'Date') .'</label></small>';
			$this->extra_sidebar .= JHtml::_('calendar', $this->state->get('filter.date.to'), 'filter_to_date', 'filter_to_date', '%Y-%m-%d', array('style' => 'width:142px;', 'onchange'=> 'this.form.submit();'));
		$this->extra_sidebar .= '</div>';
			$this->extra_sidebar .= '<hr class="hr-condensed">';

	}

	/**
	 * Method to order fields 
	 *
	 * @return void 
	 */
	protected function getSortFields()
	{
		return array(
			'a.`id`' => JText::_('JGRID_HEADING_ID'),
			'a.`ordering`' => JText::_('JGRID_HEADING_ORDERING'),
			'a.`state`' => JText::_('JSTATUS'),
			'a.`timestamp`' => JText::_('COM_COMETS_COMETOBSERVATIONS_TIMESTAMP'),
			'a.`observer`' => JText::_('COM_COMETS_COMETOBSERVATIONS_OBSERVER'),
			'a.`location`' => JText::_('COM_COMETS_COMETOBSERVATIONS_LOCATION'),
			'a.`desg`' => JText::_('COM_COMETS_COMETOBSERVATIONS_DESG'),
			'a.`date`' => JText::_('COM_COMETS_COMETOBSERVATIONS_DATE'),
			'a.`m1`' => JText::_('COM_COMETS_COMETOBSERVATIONS_M1'),
			'a.`diam`' => JText::_('COM_COMETS_COMETOBSERVATIONS_DIAM'),
			'a.`dc`' => JText::_('COM_COMETS_COMETOBSERVATIONS_DC'),
			'a.`pa`' => JText::_('COM_COMETS_COMETOBSERVATIONS_PA'),
			'a.`scope`' => JText::_('COM_COMETS_COMETOBSERVATIONS_SCOPE'),
			'a.`comments`' => JText::_('COM_COMETS_COMETOBSERVATIONS_COMMENTS'),
			'a.`image`' => JText::_('COM_COMETS_COMETOBSERVATIONS_IMAGE'),
		);
	}
}
