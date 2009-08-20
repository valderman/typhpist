<?php
/**
 * Represents an XHTML del tag.
 */
class DelElement extends XHtmlContainerElement implements ITopLevelElement {
    /**
     * Construct a new del element, with the specified set of children, if
     * actually specified, or empty if not.
     * @param array $children Children to add to the del initially. (Optional)
     */
    public function __construct($children = array()) {
        $this->tagName = 'del';
        foreach($children as $c) {
            $this->appendChild($c);
        }
    }
}
?>
