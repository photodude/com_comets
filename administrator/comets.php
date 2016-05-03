<?php
/**
 * @version    CVS: 1.0.3
 * @package    Com_Comets
 * @author     Troy Hall <troy@hallhome.us>
 * @copyright  2016 Troy Hall & Arkansas Sky Observatory
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die();
// Load FOF
if (!defined('FOF30_INCLUDED') && !@include_once(JPATH_LIBRARIES . '/fof30/include.php'))
{
	throw new RuntimeException('FOF 3.0 is not installed', 500);
}
$container = FOF30\Container\Container::getInstance('com_comets')->dispatcher->dispatch();