<?php
/**
 * Represents an XHTML emphasis element.
 */
class EmElement extends XHtmlContainerElement {
    /**
     * Construct a new emphasis element.
     * @param mixed  $text  If $text is an XHtmlElement, the element is used
     *                      as the text inside the <em> element.
     *                      If $text is a string, a TextElement is created
     *                      using the text and used as the element's content.
     */
    public function __construct($text) {
        $this->tagName = 'em';
        if($text instanceof XHtmlElement) {
            $this->appendChild($text);
        } else {
            $this->appendChild(new TextElement($text));
        }
    }
}
?>
