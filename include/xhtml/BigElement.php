<?php
/**
 * Represents an XHTML big tag.
 */
class BigElement extends XHtmlContainerElement
                 implements IFontStyleElement {
    /**
     * Construct a new big element, with the specified set of children, if
     * actually specified, or empty if not.
     * @param array $children Children to add to the big initially. (Optional)
     */
    public function __construct($children = array()) {
        $this->tagName = 'big';
        foreach($children as $c) {
            $this->appendChild($c);
        }
    }

    public function appendChild(ITextLevelElement $e) {
        parent::appendChild($e);
    }
}
?>
