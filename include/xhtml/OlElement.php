<?php
/**
 * Represents an XHTML ol tag.
 */
class OlElement extends XHtmlContainerElement
                implements IListElement {
    /**
     * Construct a new ol element, with the specified set of children, if
     * actually specified, or empty if not.
     * @param array $children Children to add to the ol initially. (Optional)
     */
    public function __construct($children = array()) {
        $this->tagName = 'ol';
        foreach($children as $c) {
            if(!$c instanceof LiElement) {
                throw new Exception('Lists may only have list items as children!');
            }
            $this->appendChild($c);
        }
    }

    /**
     * Append a new child node to this element. Note that only LI elements
     * are allowed inside OL.
     * @param LiElement $e The child node to add.
     */
    public function appendChild(LiElement $e) {
        parent::appendChild($e);
    }
}
?>
