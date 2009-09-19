<?php
/**
 * Represents an XHTML strong tag.
 */
class AnchorElement extends XHtmlElement {
    /**
     * Construct a new anchor with the specified name.
     * @param string $name Name of this anchor.
     */
    public function __construct($name) {
        $this->tagName = 'a';
        $this->setAttribute('name', $name);
    }

    public function appendChild(ITextLevelElement $e) {
        parent::appendChild($e);
    }
}
?>
