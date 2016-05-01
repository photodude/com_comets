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

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_comets'))
{
	throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

// Include dependancies
jimport('joomla.application.component.controller');

JLoader::registerPrefix('Comets', JPATH_COMPONENT_ADMINISTRATOR);

$controller = JControllerLegacy::getInstance('Comets');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
