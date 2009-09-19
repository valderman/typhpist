<?php
/**
 * Represents an XHTML acronym tag.
 */
class AcronymElement extends XHtmlContainerElement
                     implements IPhraseElement {
    /**
     * Construct a new abbr element, with the specified set of children, if
     * actually specified, or empty if not.
     * @param string $acro   An acronym. An acronym is pretty much like an
     *                       abbreviation, except it can be spoken like a word.
     *                       For instance, "NASA".
     * @param string $phrase The abbreviated word/phrase, for instance
     *                       "National Aeronautics and Space Administration".
     */
    public function __construct($acro, $phrase) {
        $this->tagName = 'acronym';
        $this->setAttribute('title', $phrase);
        if($word)
            $this->appendChild(new TextElement($acro));
    }

    public function appendChild(ITextLevelElement $e) {
        parent::appendChild($e);
    }
}
?>
