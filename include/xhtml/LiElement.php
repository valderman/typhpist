<?php
/**
 * Represents an XHTML li tag.
 */
class LiElement extends XHtmlContainerElement {
    /**
     * Construct a new li element, with the specified set of children, if
     * actually specified, or empty if not.
     * @param array $children Children to add to the li initially. (Optional)
     *                        If $children is a string, it will be used as
     *                        the sole initial child of the element.
     */
    public function __construct($children = array()) {
        $this->tagName = 'li';
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
}
?>
