<?php
/**
 * Class for creating and manipulating XHTML pages.
 */
class XHtmlDocument {
    ////////////////////////////
    // Library constants

    /**
     * Use this charset if none is explicitly specified.
     */
    const DEFAULT_CHARSET = 'utf-8';

    /**
     * Specify this MIME-type in the Content-Type header if none was
     * explicitly specified by the user.
     */
    const DEFAULT_MIME = 'application/xhtml+xml';

    /**
     * Use this doctype for all generated documents.
     */
    const DEFAULT_DOCTYPE = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';

    /**
     * Width of each indentation level when pretty printing.
     */
    const PRETTY_TAB_WIDTH = 4;

    /**
     * Default # of rows for <textarea> elements.
     */
    const TEXTAREA_DEFAULT_ROWS = 2;

    /**
     * Default # of cols for <textarea> elements.
     */
    const TEXTAREA_DEFAULT_COLS = 20;




    ////////////////////////////
    // Private members

    /**
     * Charset to use for page generation.
     */
    private static $charset = self::DEFAULT_CHARSET;

    /**
     * MIME type to report for this document.
     */
    private static $mimeType = self::DEFAULT_MIME;

    /**
     * Title to use for this document.
     */
    private $title = '';

    /**
     * Set of stylesheets to include for this page.
     */
    private $stylesheets = array();

    /**
     * Set of scripts to include for this page.
     */
    private $scripts = array();

    /**
     * Child elements to this document's body tag.
     */
    private $children = array();




    ////////////////////////////
    // Static member functions

    /**
     * Set a new charset for all documents.
     * @param string $charset Charset to use for all documents.
     */
    public static function setCharset($charset) {
        self::$charset = $charset;
    }
    /**
     * Get the charset used for this document.
     * @return string This document's charset.
     */
    public static function getCharset() {
        return self::$charset;
    }

    /**
     * Set the MIME type for this document.
     * @param string $mime New MIME type for this document.
     */
    public static function setMimeType($mime) {
        self::$mimeType = $mime;
    }

    /**
     * Get this document's MIME type.
     * @return string The MIME type of this document.
     */
    public static function getMimeType() {
        return self::$mimeType;
    }

    /**
     * Escape the input string according to the current charset.
     * @param string $str The string to escape.
     * @return string     The escaped string.
     */
    public static function escape($str) {
        return htmlentities($str, ENT_QUOTES, self::$charset);
    }

    /**
     * Unescape the input string according to the current charset, reversing
     * the effects of XHtmlDocument::escape.
     * @param string $str The string to unescape.
     * @return string     The escaped string.
     */
    public static function unescape($str) {
        return html_entity_decode($str, ENT_QUOTES, self::$charset);
    }




    ////////////////////////////
    // Methods

    /**
     * Output HTML to the client's browser.
     * @return string XHTML output for the entire page.
     */
    public function output() {
        // Output doctype and content type
        $out = self::DEFAULT_DOCTYPE;
        $out .= '<html xmlns="http://www.w3.org/1999/xhtml">';
        $out .= '<head>';
        $out .= '<meta http-equiv="Content-Type" content="'
             .  self::$mimeType . ';charset='
             .  self::$charset . '" />';

        // Include requested stylesheets
        foreach($this->stylesheets as $s) {
            $out .= '<link rel="stylesheet" type="text/css" href="'.$s.'"/>';
        }

        // Include requested scripts
        foreach($this->scripts as $s) {
            $out .= '<script type="text/javascript" src="'.$s.'"></script>';
        }
        $out .= '<title>' . self::escape($this->title) . '</title>';

        $out .= '</head><body>';
        foreach($this->children as $c) {
            $out .= $c->output();
        }
        $out .= '</body></html>';
        return $out;
    }

    /**
     * Output indented, easily readable XHTML to the client's browser.
     * Note that pretty printing (X)HTML may in some cases affect the
     * appearance of the document slightly.
     * @return string Pretty, indented XHTML representation of the document.
     */
    public function pretty() {
        // Doctype and content type
        $out = self::DEFAULT_DOCTYPE . "\n";
        $out .= '<html xmlns="http://www.w3.org/1999/xhtml">' . "\n";
        $out .= '    <head>' . "\n";
        $out .= '        <meta http-equiv="Content-Type" content="'
             .  self::$mimeType . ';charset='
             .  self::$charset . '" />' . "\n";

        // Include requested stylesheets
        foreach($this->stylesheets as $s) {
            $out .= '        ';
            $out .= '<link rel="stylesheet" type="text/css" href="'.$s.'"/>';
            $out .= "\n";
        }

        // Include requested scripts
        foreach($this->scripts as $s) {
            $out .= '        ';
            $out .= '<script type="text/javascript" src="'.$s.'"></script>';
            $out .= "\n";
        }
        $out .= '        ';
        $out .= '<title>' . self::escape($this->title) . '</title>' . "\n";

        $out .= "    </head>\n    <body>\n";
        foreach($this->children as $c) {
            $out .= $c->pretty(2);
        }
        $out .= "    </body>\n</html>";
        return $out;
    }

    /**
     * Set the title for this document.
     * @param string $title The title to use for this document.
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
     * Get this document's title.
     * @return string This document's title.
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Add a stylesheet to the page. Stylesheets are output to the client in
     * the same order they were added to the document.
     * @param string $style The stylesheet to add.
     */
    public function addStylesheet($style) {
        $this->stylesheets[] = $style;
    }

    /**
     * Add a script file to the page. Scripts are output to the client in
     * the same order they were added to the document.
     * @param string $script The script file to add.
     */
    public function addScript($script) {
        $this->scripts[] = $script;
    }

    /**
     * Add a new child element to this document's body element.
     * XHTML for child elements is output in the same order they were added
     * to the document.
     * @param object $child The child element to add.
     */
    public function appendChild(ITopLevelElement $child) {
        $this->children[] = $child;
    }
}
?>
