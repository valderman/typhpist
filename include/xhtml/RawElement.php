<?php
/**
 * Represents raw, unescaped text which can be inserted just about anywhere.
 */
class RawElement extends XHtmlElement {
    /**
     * The text that makes up this element.
     */
    private $text;

    /**
     * Construct a new raw text element.
     * @param string $text The text that makes up this 'element'.
     */
    public function __construct($text) {
        $this->text = $text;
    }

    public function output() {
        return $this->text;
    }
}
?>
