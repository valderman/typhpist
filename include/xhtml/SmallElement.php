<?php
/**
 * Represents an XHTML small tag.
 */
class SmallElement extends XHtmlContainerElement {
    /**
     * Construct a new small element, with the specified set of children, if
     * actually specified, or empty if not.
     * @param array $children Nodes to add to the small initially. (Optional)
     */
    public function __construct($children = array()) {
        $this->tagName = 'small';
        foreach($children as $c) {
            $this->appendChild($c);
        }
    }
}
?>
