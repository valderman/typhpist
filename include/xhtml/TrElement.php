<?php
/**
 * Represents an XHTML tr element.
 */
class TrElement extends XHtmlTableElement implements ITopLevelElement {
    /**
     * Construct a new tr element, with the specified set of children, if
     * actually specified, or empty if not.
     * @param array $children Children to add to the element initially.
     */
    public function __construct($children = array()) {
        $this->tagName = 'tr';
        foreach($children as $c) {
            $this->appendChild($c);
        }
    }

    /**
     * Append a child node to this element.
     * Note that a tr may only contain td and th elements.
     * @param $e The element to add.
     */
    public function appendChild(XHtmlTableCellElement $e) {
        parent::appendChild($e);
    }
}
?>
