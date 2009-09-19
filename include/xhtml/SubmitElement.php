<?php
/**
 * Represents an <input type="submit">
 */
class SubmitElement extends XHtmlFormElement
                    implements IInlineFormElement {
    /**
     * Construct a new submit button.
     * @param string $value Text for the submit button.
     */
    public function __construct($value) {
        $this->tagName = 'input';
        $this->addAttributes(array('type' => 'submit', 'value' => $value));
    }
}
?>
