<?php
/**
 * Represents an XHTML div tag.
 */
class SpanElement extends XHtmlContainerElement
                  implements ISpecialPreElement {
    /**
     * Construct a new span element, with the specified set of children, if
     * actually specified, or empty if not.
     * @param array $children Children to add to the div initially. (Optional)
     */
    public function __construct($children = array()) {
        $this->tagName = 'span';
        foreach($children as $c) {
            $this->appendChild($c);
        }
    }

    public function appendChild(ITextLevelElement $e) {
        parent::appendChild($e);
    }
}
?>
