<?php
/**
 * Represents an XHTML br tag.
 */
class BrElement extends XHtmlElement
                implements ISpecialPreElement {
    /**
     * Construct a new br element.
     */
    public function __construct() {
        $this->tagName = 'br';
    }
}

?>
