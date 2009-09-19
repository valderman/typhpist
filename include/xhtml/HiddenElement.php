<?php
/**
 * Represents an <input type="hidden">.
 */
class HiddenElement extends TextInputElement
                    implements IInlineFormElement {
    public function __construct($basename, $label = null, $value = null) {
        parent::__construct($basename, $label, $value);
        $this->setAttribute('type', 'hidden');
    }
}
?>
