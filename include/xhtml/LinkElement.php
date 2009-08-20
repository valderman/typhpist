<?php
/**
 * Represents an XHTML hyperlink.
 */
class LinkElement extends XHtmlContainerElement {
    /**
     * Construct a new hyperlink.
     * @param string $url   The URL pointed to by this link.
     * @param mixed  $text  If $text is an XHtmlElement, the element is used
     *                      as the clickable part of the link.
     *                      If $text is a string, a TextElement is created
     *                      using the text and used for the link's clickable
     *                      part.
     * @param string $title Title text for the link. The empty string is used
     *                      if none is given.
     */
    public function __construct($url, $text, $title = '') {
        $this->tagName = 'a';
        if($text instanceof XHtmlElement) {
            $this->appendChild($text);
        } else {
            $this->appendChild(new TextElement($text));
        }
        $this->addAttributes(array('href' => $url, 'title' => $title));
    }
}
?>
