<?php
/**
 * Represents an <input type="reset">
 */
class ResetElement extends XHtmlFormElement {
    /**
     * Construct a new reset button.
     * @param string $value Text for the reset button.
     */
    public function __construct($value) {
        $this->tagName = 'input';
        $this->addAttributes(array('type' => 'reset', 'value' => $value));
    }
}
?>
