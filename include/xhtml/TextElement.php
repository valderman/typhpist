<?php
/**
 * Represents a string of text somewhere in a document.
 */
class TextElement extends XHtmlElement {
    /**
     * The text that makes up this element.
     */
    private $text;

    /**
     * Construct a new text element.
     * @param string $text The text that makes up this 'element'.
     */
    public function __construct($text) {
        $this->text = $text;
    }

    public function output() {
        return XHtmlDocument::escape($this->text);
    }
}
?>
