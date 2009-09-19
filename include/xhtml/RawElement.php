<?php
/**
 * Represents raw, unescaped text which can be inserted just about anywhere.
 */
class RawElement extends XHtmlElement
                 implements IAnyElement {
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

    public function pretty($indlevel = 0) {
        $str = str_repeat(' ', $indlevel*XHtmlDocument::PRETTY_TAB_WIDTH);
        return $str . $this->output() . "\n";
    }
}
?>
