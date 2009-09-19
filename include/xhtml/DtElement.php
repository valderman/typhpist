<?php
/**
 * Represents an XHTML dt tag.
 */
class DtElement extends XHtmlDefinitionListElement {
    /**
     * Construct a new dt element, with the specified set of children, if
     * actually specified, or empty if not.
     * @param array $children Children to add to the dt initially. (Optional)
     *                        If $children is a string, it will be used as
     *                        the sole initial child of the element.
     */
    public function __construct($children = array()) {
        $this->tagName = 'dt';
        if(is_string($children)) {
            $this->appendChild(new TextElement($children));
        } elseif($children instanceof TextElement) {
            $this->appendChild($children);
        } else {
            foreach($children as $c) {
                $this->appendChild($c);
            }
        }
    }

    public function appendChild(ITextLevelElement $e) {
        parent::appendChild($e);
    }
}
?>
