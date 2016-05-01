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

jimport('joomla.application.component.controllerform');

/**
 * Cometobserved controller class.
 *
 * @since  1.6
 */
class CometsControllerCometobserved extends JControllerForm
{
	/**
	 * Constructor
	 *
	 * @throws Exception
	 */
	public function __construct()
	{
		$this->view_list = 'cometobservations';
		parent::__construct();
	}
}
