<?php
/**
 * Represents an XHTML strong element.
 */
class StrongElement extends XHtmlContainerElement {
    /**
     * Construct a new strong element.
     * @param mixed  $text  If $text is an XHtmlElement, the element is used
     *                      as the text inside the <strong> element.
     *                      If $text is a string, a TextElement is created
     *                      using the text and used as the element's content.
     */
    public function __construct($text) {
        $this->tagName = 'strong';
        if($text instanceof XHtmlElement) {
            $this->appendChild($text);
        } else {
            $this->appendChild(new TextElement($text));
        }
    }
}
?>
