<?php
/**
 * Represents a string of text somewhere in a document.
 */
class TextElement extends XHtmlElement
                  implements ICDataElement {
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

    public function pretty($indlevel = 0) {
        $str = str_repeat(' ', $indlevel*XHtmlDocument::PRETTY_TAB_WIDTH);
        return $str . $this->output() . "\n";
    }
}
?>
