<?php
/**
 * Represents an XHTML td element.
 */
class TdElement extends XHtmlTableCellElement implements ITopLevelElement {
    /**
     * Construct a new td element, with the specified set of children, if
     * actually specified, or empty if not.
     * @param array $children Children to add to the element initially.
     */
    public function __construct($children = array()) {
        $this->tagName = 'td';
        foreach($children as $c) {
            $this->appendChild($c);
        }
    }
}
?>
