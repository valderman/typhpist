<?php
/**
 * Represents an XHTML sup tag.
 */
class SupElement extends XHtmlContainerElement {
    /**
     * Construct a new sup element, with the specified set of children, if
     * actually specified, or empty if not.
     * @param array $children Children to add to the sup initially. (Optional)
     */
    public function __construct($children = array()) {
        $this->tagName = 'sup';
        foreach($children as $c) {
            $this->appendChild($c);
        }
    }
}
?>
