<?php
/**
 * Custom XHTML element.
 * Use when there is no equivalent class for the element you want to use.
 */
class CustomElement extends XHtmlElement
                    implements IAnyElement {
    /**
     * Name of this custom tag.
     */
    protected $name;

    /**
     * Construct a new custom XHTML element.
     * @param string $name Name of this custom element.
     */
    public function __construct($name) {
        $this->name = $name;
    }

    /**
     * Get the name of this custom tag.
     * @return string The name of this tag.
     */
    public function getName() {
        return $this->name;
    }

    public function output() {
        return '<' . $this->name . $this->outputAttributes() . '/>';
    }
}
?>
