<?php
/**
 * Represents an XHTML form tag.
 */
class FormElement extends XHtmlContainerElement implements ITopLevelElement {
    /**
     * Construct a new form element, with the specified method and action.
     * @param string $method   Method to use for sending data (POST or GET)
     * @param string $action   URL to send data to on submit.
     * @param string $onsubmit Optional javascript to execute on submit.
     */
    public function __construct($method, $action, $onsubmit = null) {
        $this->tagName = 'form';
        $this->addAttributes(array('method'   => $method,
                                   'action'   => $action,
                                   'onsubmit' => $onsubmit));
    }

    /**
     * Enable this form for file uploads.
     * Essentially sets the element's enctype attribute to multipart/form-data
     * and its method attribute to post.
     * 
     * This may of course be done as well through addAttributes/setAttribute,
     * but this method provides a clearer, more convenient way to do it.
     */
    public function enableFiles() {
        $this->setAttribute('enctype', 'multipart/form-data');
        $this->setAttribute('method', 'post');
    }
}
?>
