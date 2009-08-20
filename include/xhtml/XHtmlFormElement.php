<?php
/**
 * Base class for all form elements.
 * Form elements are sort of meta elements, in that one form element may in
 * fact output XHTML for two or more actual XHTML elements.
 */
abstract class XHtmlFormElement extends XHtmlContainerElement {
    /**
     * Construct a new form element.
     * @param string $basename Base name and ID of the form element. When this
     *                         meta element outputs more than one element that
     *                         may have its own ID, their IDs will be the base
     *                         name concated with an underscore and then
     *                         their respective option IDs.
     *                         When there is only one element that needs an
     *                         ID, that ID will be the base name.
     *                         The elements' name attribute will always be
     *                         equivalent to the base name.
     */
    abstract public function __construct($basename, $label=null, $value=null);
}
?>
