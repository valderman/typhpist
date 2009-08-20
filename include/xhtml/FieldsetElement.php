<?php
/**
 * Represents an XHTML fieldset tag.
 */
class FieldsetElement extends XHtmlContainerElement
                      implements ITopLevelElement {
    /**
     * Construct a new fieldset element, with the specified set of children if
     * actually specified, or empty if not.
     * @param string $legend  Descriptive text for this fieldset. (Optional)
     * @param array $children Children to add to the fieldset initially.
     *                        (Optional)
     */
    public function __construct($legend = null, $children = array()) {
        $this->tagName = 'fieldset';
        if($legend && is_string($legend)) {
            $l = new CustomContainerElement('legend');
            $l->appendChild(new TextElement($legend));
            $this->appendChild($l);
        }

        foreach($children as $c) {
            $this->appendChild($c);
        }
    }

}
?>
