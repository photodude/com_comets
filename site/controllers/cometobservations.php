<?php
/**
 * @version    CVS: 1.0.3
 * @package    Com_Comets
 * @author     Troy Hall <troy@hallhome.us>
 * @copyright  2016 Troy Hall & Arkansas Sky Observatory
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

/**
 * Cometobservations list controller class.
 *
 * @since  1.6
 */
class CometsControllerCometobservations extends CometsController
{
	/**
	 * Proxy for getModel.
	 *
	 * @param   string  $name    The model name. Optional.
	 * @param   string  $prefix  The class prefix. Optional
	 * @param   array   $config  Configuration array for model. Optional
	 *
	 * @return object	The model
	 *
	 * @since	1.6
	 */
	public function &getModel($name = 'Cometobservations', $prefix = 'CometsModel', $config = array())
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));

		return $model;
	}
}
