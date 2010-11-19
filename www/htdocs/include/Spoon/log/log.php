<?php

/**
 * Spoon Library
 *
 * This source file is part of the Spoon Library. More information,
 * documentation and tutorials can be found @ http://www.spoon-library.be
 *
 * @package		log
 *
 *
 * @author		Davy Hellemans <davy@spoon-library.be>
 * @author 		Tijs Verkoyen <tijs@spoon-library.be>
 * @author		Dave Lens <dave@spoon-library.be>
 * @since		1.0.0
 */


/** SpoonFile class */
require_once 'spoon/filesystem/filesystem.php';


/**
 * This exception is used to handle log related exceptions.
 *
 * @package		log
 *
 * @author		Tijs Verkoyen <tijs@spoon-library.be>
 * @since		1.0.0
 */
class SpoonLogException extends SpoonException {}


/**
 * This base class provides methods used to log data.
 *
 * @package		log
 *
 * @author		Tijs Verkoyen <tijs@spoon-library.be>
 * @author		Davy Hellemans <davy@spoon-library.be>
 * @since		1.0.0
 */
class SpoonLog
{
	// the maximum filesize for a log file, expressed in KB
	const MAX_FILE_SIZE = 500;


	/**
	 * Log path
	 *
	 * @var	string
	 */
	private static $path;


	/**
	 * Get the log path.
	 *
	 * @return	string	The path where the logfiles will be stored.
	 */
	public static function getPath()
	{
		if(self::$path === null) return (string) str_replace('/spoon/log/log.php', '', __FILE__);
		return self::$path;
	}


	/**
	 * Set the logpath.
	 *
	 * @return	void
	 * @param	string $path	The path where the logfiles should be stored.
	 */
	public static function setPath($path)
	{
		self::$path = (string) $path;
	}


	/**
	 * Write an error/custom message to the log.
	 *
	 * @return	void
	 * @param	string $message			The messages that should be logged.
	 * @param	string[optional] $type	The type of message you want to log, possible values are: error, custom.
	 */
	public static function write($message, $type = 'error')
	{
		// milliseconds
		list($milliseconds) = explode(' ', microtime());
		$milliseconds = round($milliseconds * 1000, 0);

		// redefine var
		$message = date('Y-m-d H:i:s') .' '. $milliseconds .'ms | '. $message . "\n";
		$type = SpoonFilter::getValue($type, array('error', 'custom'), 'error');

		// file
		$file = self::getPath() .'/'. $type .'.log';

		// rename if needed
		if((int) @filesize($file) >= (self::MAX_FILE_SIZE * 1024))
		{
			// start new log file
			SpoonDirectory::move($file, $file .'.'. date('Ymdhis'));
		}

		// write content
		SpoonFile::setContent($file, $message, true, true);
	}
}

?>