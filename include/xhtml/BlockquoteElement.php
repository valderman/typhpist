<?php
/**
 * Represents an XHTML block quote.
 */
class BlockquoteElement extends XHtmlContainerElement
                        implements ITopLevelElement {
    /**
     * Construct a new block quote.
     * @param mixed  $text  If $text is an XHtmlElement, the element is used
     *                      as the quote.
     *                      If $text is a string, a TextElement is created
     *                      using the text and used for the quote.
     */
    public function __construct($text) {
        $this->tagName = 'blockquote';
        if($text instanceof XHtmlElement) {
            $this->appendChild($text);
        } else {
            $this->appendChild(new TextElement($text));
        }
    }
}
?>
