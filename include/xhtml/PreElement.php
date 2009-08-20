<?php
/**
 * Represents an XHTML pre element.
 */
class PreElement extends XHtmlContainerElement implements ITopLevelElement {
    /**
     * Construct a new pre element.
     * @param mixed  $text  If $text is an XHtmlElement, the element is used
     *                      as the text inside the <pre> element.
     *                      If $text is a string, a TextElement is created
     *                      using the text and used as the element's content.
     */
    public function __construct($text) {
        $this->tagName = 'pre';
        if($text instanceof XHtmlElement) {
            $this->appendChild($text);
        } else {
            $this->appendChild(new TextElement($text));
        }
    }
}
?>
