<?php
/**
 * Represents an XHTML div tag.
 */
class DivElement extends XHtmlContainerElement implements ITopLevelElement {
    /**
     * Construct a new div element, with the specified set of children, if
     * actually specified, or empty if not.
     * @param array $children Children to add to the div initially. (Optional)
     */
    public function __construct($children = array()) {
        $this->tagName = 'div';
        foreach($children as $c) {
            $this->appendChild($c);
        }
    }
}
?>
