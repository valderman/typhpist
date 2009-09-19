<?php
/**
 * Represents an XHTML table element.
 */
class TableElement extends XHtmlContainerElement
                   implements IBlockElement {
    /**
     * Construct a new table element with the specified caption, if given.
     * Which it really ought to be, as unlabeled tables are confusing and bad.
     * @param string $caption Caption for the table. (Optional)
     */
    public function __construct($caption = null) {
        $this->tagName = 'table';
        if($caption) {
            $c = new CustomContainerElement('caption');
            $c->appendChild(new TextElement($caption));
            parent::appendChild($c);
        }
    }

    /**
     * Append a child node to this element.
     * Note that a table may only contain table parts.
     * @param $e The element to add.
     */
    public function appendChild(XHtmlTableElement $e) {
        parent::appendChild($e);
    }
}
?>
