<?php
/**
 * Custom XHTML element with children.
 * Use when there is no corresponding class for the XHTML container element
 * you want to use.
 */
class CustomContainerElement extends XHtmlContainerElement {
    /**
     * Construct a new custom XHTML element.
     * @param string $name Name of this custom element.
     */
    public function __construct($name) {
        $this->tagName = $name;
    }

    /**
     * Get the name of this custom tag.
     * @return string The name of this tag.
     */
    public function getName() {
        return $this->tagName;
    }
}
?>
