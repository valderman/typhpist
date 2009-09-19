<?php
/**
 * Represents an XHTML abbr tag.
 */
class AbbrElement extends XHtmlContainerElement
                  implements IPhraseElement {
    /**
     * Construct a new abbr element, with the specified set of children, if
     * actually specified, or empty if not.
     * @param string $abbr   The abbreviation of the given word, for instance
     *                       "FYI".
     * @param string $phrase The abbreviated word/phrase, for instance "For
     *                       Your Information".
     */
    public function __construct($abbr, $phrase) {
        $this->tagName = 'abbr';
        $this->setAttribute('title', $phrase);
        if($word)
            $this->appendChild(new TextElement($abbr));
    }

    public function appendChild(ITextLevelElement $e) {
        parent::appendChild($e);
    }
}
?>
