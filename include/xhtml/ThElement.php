<?php
/**
 * Represents an XHTML th element.
 */
class ThElement extends XHtmlTableCellElement {
    /**
     * Construct a new th element, with the specified set of children, if
     * actually specified, or empty if not.
     * @param array $children Children to add to the element initially.
     */
    public function __construct($children = array()) {
        $this->tagName = 'th';
        foreach($children as $c) {
            $this->appendChild($c);
        }
    }

    public function appendChild(IFlowElement $e) {
        parent::appendChild($e);
    }
}
?>
