<?php
/**
 * Represents an <input type="button">
 */
class FileElement extends XHtmlFormElement {
    /**
     * Construct a new file upload element.
     * @param string $id      ID and name of this file upload.
     */
    public function __construct($id) {
        $this->tagName = 'input';
        $this->addAttributes(array('type'  => 'file',
                                   'name'  => $id,
                                   'id'    => $id));
    }
}
?>
