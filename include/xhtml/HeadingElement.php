<?php
/**
 * Represents an XHTML h1-h6 element.
 */
class HeadingElement extends XHtmlContainerElement {
    /**
     * Construct a new hyperlink.
     * @param int $level    Level of heading (1-6).
     * @param mixed  $text  If $text is an XHtmlElement, the element is used
     *                      as the text inside the heading.
     *                      If $text is a string, a TextElement is created
     *                      using the text and used as the element's content.
     */
    public function __construct($level, $text) {
        $this->tagName = 'h' . $level;
        if($text instanceof XHtmlElement) {
            $this->appendChild($text);
        } else {
            $this->appendChild(new TextElement($text));
        }
    }
}
?>
