<?php
/**
 * Set up autoloading of all XHTML classes.
 * @param string $class The class to load.
 */
function __autoload($class) {
    require_once ($class . '.php');
}
?>
