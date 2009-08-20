<?php
/**
 * Represents an XHTML dl tag.
 */
class DlElement extends XHtmlContainerElement implements ITopLevelElement {
    /**
     * Construct a new dl element, with the specified set of children, if
     * actually specified, or empty if not.
     * @param array $children Children to add to the dl initially. (Optional)
     */
    public function __construct($children = array()) {
        $this->tagName = 'dl';
        foreach($children as $c) {
            if(!($c instanceof DdElement) and !($c instanceof DtElement)) {
                throw new Exception('Lists may only have list items as children!');
            }
            $this->appendChild($c);
        }
    }

    /**
     * Append a new child node to this element.
     * Note that only DD and DT tags may be found inside a DL.
     * @param XHtmlDefinitionListElement $e The element to add.
     */
    public function appendChild(XHtmlDefinitionListElement $e) {
        parent::appendChild($e);
    }
}
?>
