<?php
interface IException
{
    /* Protected methods inherited from Exception class */
    public function getMessage();                 // Exception message 
    public function getCode();                    // User-defined Exception code
    public function getFile();                    // Source filename
    public function getLine();                    // Source line
    public function getTrace();                   // An array of the backtrace()
    public function getTraceAsString();           // Formated string of trace
    
    /* Overrideable methods inherited from Exception class */
    public function __toString();                 // formated string for display
    public function __construct($message = null, $code = 0);
}

class ECommerceException extends Exception implements IException
{
    protected $message = 'Unknown exception';     // Exception message
    private   $string;                            // Unknown
    protected $code    = 0;                       // User-defined exception code
    protected $file;                              // Source filename of exception
    protected $line;                              // Source line of exception
    private   $trace;                             // Unknown

    public function __construct($message = null, $code = 0) {
        if (!$message) {
            throw new $this('Unknown '. get_class($this));
        }
        parent::__construct($message, $code);
    }
    
    public function __toString()
    {
        return get_class($this)."'{$this->message}' in {$this->file}({$this->line})\n"
                                ."{$this->getTraceAsString()}";
    }
}

// Configure the fatal error -> Exception things
function exception_error_handler($errno, $errstr, $errfile, $errline) {
    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
}
if (DEBUG) {
	set_error_handler("exception_error_handler", -1); // We're debugging, might as well catch them all
} else {
	set_error_handler("exception_error_handler", E_USER_ERROR | E_ERROR); // Only catch the fatal errors like this (remember, if we catch an error, we can't recover)
}

function HandleExceptions($e) {
	global $smarty;
	// Record the exception to a file
	// Email a user (if they've configured this)
	// Redirect user to the "Sorry, error :<" but only if they're not in development mode
	if ($h = fopen(PATH."write/log/error.txt", "at")) { // Kind of annoying, but of course, we want ALL errors to be nice, which means that we still want to carry on/ignore if it couldn't be written
		fwrite($h, date("m/d/y H:i:s ").'An exception occurred in '.$e->getFile().' on line '.$e->getLine()."\n");
		fwrite($h, "  Message: ".$e->getMessage()."\n");
		$trace = str_replace("\n", "\n           ", $e->getTraceAsString());
		fwrite($h, "    Trace: ".$trace);
		fwrite($h, "\n");
		fclose($h);
	} else {
		$error[] = "Could not write to log file - ".PATH."write/log/error.txt";
	}
	if (DEBUG) {
		if (isset($error)) {
			print_r($error);
		}
		echo $e;
		// ob_clean(); // ob_clean() is an option, but I know I like to spam thousands of "echo "RAWR" when debugging, or print_r's etc.
	} else {
		// TODO: I really think this is the wrong way of doing this, but you can't rely on a template, becaues it could be smarty that's causing the error in the first place... I need to do more research on error handling for front end stuff...
		ob_clean(); // So we can send the proper "OHSHIT ERROR" stuff
		echo "Sorry, an error happened, try again later";
		
	}
}

//set_exception_handler('HandleExceptions');


?>
