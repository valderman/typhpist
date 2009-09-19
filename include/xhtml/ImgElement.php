<?php
/**
 * Represents an XHTML img tag.
 */
class ImgElement extends XHtmlElement
                 implements ISpecialElement {
    /**
     * Construct a new image element.
     * @param string $src Source URL of image.
     * @param string $alt Alt text of image. If none is given, the empty
     *                    string is used.
     */
    public function __construct($src, $alt = '') {
        $this->tagName = 'img';
        $this->addAttributes(array('src' => $src, 'alt' => $alt));
    }
}

?>
