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
     * Pretty-prints XHTML for this element's children.
     * @param int $indlevel The indentation level of this element's children.
     * @return string       The XHTML making up this element's child elements.
     */
    protected function prettyChildren($indlevel = 0) {
        $out = '';
        foreach($this->children as $c) {
            $out .= $c->pretty($indlevel);
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

    /**
     * Output the XHTML that makes up this element in a nicely indented,
     * readable way. Please note that this may slightly affect the appearance
     * of the XHTML document in some circumstances, and is thus only
     * recommended for debugging.
     * @param int $indlevel Indentation level of this element.
     */
    public function pretty($indlevel = 0) {
        $space = str_repeat(' ', $indlevel * XHtmlDocument::PRETTY_TAB_WIDTH);
        $out = $space;
        $out .= '<' . $this->tagName . $this->outputAttributes() . ">\n";
        $out .= $this->prettyChildren($indlevel + 1);
        $out .= $space . '</' . $this->tagName . ">\n";
        return $out . "\n";
    }
}
?>
