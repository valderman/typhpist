<?php
/**
 * Represents an XHTML p tag.
 */
class PElement extends XHtmlContainerElement
               implements IBlockElement {
    /**
     * Construct a new p element, with the specified set of children, if
     * actually specified, or empty if not.
     * @param array $children Children to add to the p initially. (Optional)
     */
    public function __construct($children = array()) {
        $this->tagName = 'p';
        foreach($children as $c) {
            $this->appendChild($c);
        }
    }

    public function appendChild(ITextLevelElement $e) {
        parent::appendChild($e);
    }
}
?>
