<?php
/**
 * Represents an XHTML sub tag.
 */
class SubElement extends XHtmlContainerElement
                 implements IPhraseElement {
    /**
     * Construct a new sub element, with the specified set of children, if
     * actually specified, or empty if not.
     * @param array $children Children to add to the sub initially. (Optional)
     */
    public function __construct($children = array()) {
        $this->tagName = 'sub';
        foreach($children as $c) {
            $this->appendChild($c);
        }
    }

    public function appendChild(ITextLevelElement $e) {
        parent::appendChild($e);
    }
}
?>
