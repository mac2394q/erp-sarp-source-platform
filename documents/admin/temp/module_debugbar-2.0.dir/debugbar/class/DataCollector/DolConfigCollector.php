<?php

use \DebugBar\DataCollector\ConfigCollector;

/**
 * DolConfigCollector class
 */

class DolConfigCollector extends ConfigCollector
{
	/**
	 *	Return widget settings
	 *
	 */
	public function getWidgets()
	{
		global $langs;

		return array(
			$langs->transnoentities('Config') => array(
				"icon" => "gear",
				"widget" => "PhpDebugBar.Widgets.VariableListWidget",
				"map" => $this->getName(),
				"default" => "{}"
			)
		);
	}

	/**
	 *	Return collected data
	 *
	 */
	public function collect()
	{
		$this->data = $this->getConfig();

		return parent::collect();
	}

	/**
	 * Returns an array with config data
	 *
	 */
	protected function getConfig()
	{
		global $dolibase_config, $conf, $user;

		// Get constants
		$const = get_defined_constants(true);

		$config = array(
			'Dolibarr' => array(
				'const' => $const['user'],
				'$conf' => $this->object_to_array($conf),
				'$user' => $this->object_to_array($user)
			),
			'PHP' => array(
				'version'   => PHP_VERSION,
				'interface' => PHP_SAPI,
				'os'        => PHP_OS
			)
		);

		if (isset($dolibase_config))
		{
			// Add dolibase config
			$config['Dolibase'] = array(
				'$dolibase_config' => $dolibase_config
			);
		}

		return $config;
	}

	/**
	 * Convert an object to array
	 *
	 */
	protected function object_to_array($obj)
	{
		$_arr = is_object($obj) ? get_object_vars($obj) : $obj;
		foreach ($_arr as $key => $val) {
			$val = (is_array($val) || is_object($val)) ? $this->object_to_array($val) : $val;
			$arr[$key] = $val;
		}

		return $arr;
	}
}