<?php
/**
 * Base class for all XHTML elements that may contain other elements.
 */
abstract class XHtmlContainerElement extends XHtmlElement {
    /**
     * All child elements of this element.
     */
    protected $children = array();

    /**
     * Add a new child element to this element. Child elements are output to
     * the client browser in the same order they were added to their parent
     * element.
     * @param object $child The child element to add.
     */
    public function appendChild(XHtmlElement $child) {
        $this->children[] = $child;
    }

    /**
     * Get this element's children.
     * @return array All of this element's child elements.
     */
    public function getChildren() {
        return $this->children;
    }

    /**
     * Outputs the XHTML for this element's children.
     * @return string The XHTML making up this element's child elements.
     */
    protected function outputChildren() {
        $out = '';
        foreach($this->children as $c) {
            $out .= $c->output();
        }
        return $out;
    }

    /**
     * Generic output method that should fit most container elements well
     * enough.
     * @return string The XHTML that makes up this element and its children.
     */
    public function output() {
        $out = '<' . $this->tagName . $this->outputAttributes() . '>';
        $out .= $this->outputChildren();
        $out .= '</' . $this->tagName . '>';
        return $out;
    }
}
?>
