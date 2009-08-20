<?php
/**
 * Represents an <input type="button">
 */
class ButtonElement extends XHtmlFormElement {
    /**
     * Construct a new reset button.
     * @param string $id      ID and name of this button.
     * @param string $value   Text for the button.
     * @param string $onclick JS to execute for the onclick event. (Optional)
     */
    public function __construct($id, $value, $onclick = null) {
        $this->tagName = 'input';
        $this->addAttributes(array('type'    => 'button',
                                   'value'   => $value,
                                   'name'    => $id,
                                   'id'      => $id,
                                   'onclick' => $onclick));
    }
}
?>
