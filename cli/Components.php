<?php
/**
 * Guassian Distribution Generator
 *
 * @copyright  Copyright (C) 2014 George Wilson. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-3.0.txt GNU General Public License Version 3 or Later
 */

namespace Wilsonge\Cli;

use Joomla\Application\AbstractCliApplication;
use Joomla\Application\Cli\Output\Xml;
use Joomla\Filesystem\File;
use Wilsonge\Statistics\Guassian;

/**
 * CLI application creating the Spice sample files with a 10% of the absolute value of the components
 * and a 3.3 ohm resistor
 *
 * @since  1.0
 */
class Components extends AbstractSpice
{
	/**
	 * The pecentage of the value to call the std dev.
	 *
	 * @var    integer
	 * @since  1.0
	 */
	protected $error;

	/**
	 * Class constructor
	 *
	 * @since   1.0
	 */
	public function __construct()
	{
		parent::__construct();

		$this->error = 0.1;

		$this->inductorDev = $this->error * $this->inductor;
		$this->capDev = $this->error * $this->capacitor;
		$this->fileName = 'spice-error.cir';
		$this->rTerm = 3.3;		
	}
}