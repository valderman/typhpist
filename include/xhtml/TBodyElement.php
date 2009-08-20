<?php
/**
 * Represents an XHTML tbody element.
 */
class TBodyElement extends XHtmlTableElement implements ITopLevelElement {
    /**
     * Construct a new tbody element, with the specified set of children, if
     * actually specified, or empty if not.
     * @param array $children Children to add to the element initially.
     */
    public function __construct($children = array()) {
        $this->tagName = 'tbody';
        foreach($children as $c) {
            $this->appendChild($c);
        }
    }

    /**
     * Append a child node to this element.
     * Note that a tbody may only contain tr elements.
     * @param $e The element to add.
     */
    public function appendChild(TrElement $e) {
        parent::appendChild($e);
    }
}
?>
