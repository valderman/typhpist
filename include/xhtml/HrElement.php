<?php
/**
 * Represents an XHTML hr tag.
 */
class HrElement extends XHtmlElement
                implements IBlockTextElement {
    /**
     * Construct a new hr element.
     */
    public function __construct() {
        $this->tagName = 'hr';
    }
}

?>
