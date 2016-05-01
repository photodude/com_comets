<?php

/**
 * @version    CVS: 1.0.3
 * @package    Com_Comets
 * @author     Troy Hall <troy@hallhome.us>
 * @copyright  2016 Troy Hall & Arkansas Sky Observatory
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

/**
 * Class CometsFrontendHelper
 *
 * @since  1.6
 */
class CometsHelpersComets
{
	/**
	 * Get an instance of the named model
	 *
	 * @param   string  $name  Model name
	 *
	 * @return null|object
	 */
	public static function getModel($name)
	{
		$model = null;

		// If the file exists, let's
		if (file_exists(JPATH_SITE . '/components/com_comets/models/' . strtolower($name) . '.php'))
		{
			require_once JPATH_SITE . '/components/com_comets/models/' . strtolower($name) . '.php';
			$model = JModelLegacy::getInstance($name, 'CometsModel');
		}

		return $model;
	}
}
