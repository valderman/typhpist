<?php
/**
 * Base class for all XHTML elements.
 */
abstract class XHtmlElement {
    /**
     * Name of this tag. If a child class sets this, along with its proper
     * attributes, this class' generic output() method may be used to generate
     * the proper XHTML for the tag in most cases.
     */
    protected $tagName = null;

    /**
     * All attributes for this XHTML element.
     */
    protected $attributes = array();

    /**
     * Output a string representing all of this element's attributes.
     * @return string XHTML representation of this elemtn's attributes.
     */
    protected function outputAttributes() {
        $out = '';
        foreach($this->attributes as $attr => $value) {
            $a = XHtmlDocument::escape($attr);
            $v = XHtmlDocument::escape($value);
            $out .= ' ' . $a . '="' . $v . '"';
        }
        return $out;
    }

    /**
     * Get an associative array containing all of this element's attributes.
     * @return array Associative array containing a [name => value] pair for
     *               every attribute of this element.
     */
    public function getAttributes() {
        return $this->attributes;
    }

    /**
     * Add a set of attributes to this element. The attributes are
     * represented as a set of key => value pairs in an associative array.
     * @param array $attrs The [name => attr] associative array to add.
     */
    public function addAttributes(array $attrs) {
        $this->attributes = array_merge($this->attributes, $attrs);
    }

    /**
     * Change an attribute for this element.
     * @param string $attr  The attribute to change.
     * @param string $value The new value for the attribute.
     */
    public function setAttribute($attr, $value) {
        $this->attributes[$attr] = $value;
    }

    /**
     * Get an attribute for this element.
     * @param string $attr  The attribute to get.
     * @return string       The value of the requested attribute, or null if
     *                      it doesn't exist.
     */
    public function getAttribute($attr) {
        if(isset($this->attributes[$attr]))
            return $this->attributes[$attr];
        return null;
    }

    /**
     * Output the XHTML that makes up this element.
     * This generic output should be good enough for most elements, though
     * some will undoubtably want to define their own output().
     * @output string XHTML representation of this element.
     */
    public function output() {
        $out = '<' . $this->tagName;
        $out .= $this->outputAttributes();
        $out .= '/>';
        return $out;
    }

    /**
     * Output the XHTML that makes up this element in a nicely indented,
     * readable way. Please note that this may slightly affect the appearance
     * of the XHTML document in some circumstances, and is thus only
     * recommended for debugging.
     * @param int $indlevel Indentation level of this element.
     */
    public function pretty($indlevel = 0) {
        $out = str_repeat(' ', $indlevel * XHtmlDocument::PRETTY_TAB_WIDTH);
        return $out . $this->output() . "\n";
    }
}
?>
