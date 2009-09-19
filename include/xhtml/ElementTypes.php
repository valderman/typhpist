<?php
// Interfaces for allowing the XHTML builder to type safely construct XHTML.
// This is pretty much a tedious reiteration of the DTD except with PHP
// syntax.


///////////////////////
// Text level elements


/**
 * Text level elements; big, small, br, span, img, em, strong, code, abbr,
 * acronym, sub, sup.
 */
interface ITextLevelElement {}

/**
 * Inline elements
 */
interface IInlineElement extends ITextLevelElement,
                                 IFlowElement,
                                 IFieldsetContent {}

/**
 * Inline elements except <a>
 */
interface IInlineElementNoLink extends IInlineElement {}

/**
 * Character data element.
 */
interface ICDataElement extends ITextLevelElement,
                                IFlowElement,
                                IFieldsetContent,
                                IInlineElementNoLink,
                                IPreContent {}

/**
 * Font style elements; big, small
 */
interface IFontStyleElement extends IInlineElement,
                                    IPreContent {}

/**
 * Special elements; br, span and img
 */
interface ISpecialElement extends IInlineElement {}

/**
 * Special elements allowed inside pre tags; br, span
 */
interface ISpecialPreElement extends ISpecialElement,
                                     IPreContent {}

/**
 * Phrase elements without sub and sup; em, strong, code, abbr, acronym
 */
interface IPhraseElementNoSubSup extends IInlineElement,
                                         IPreContent {}

/**
 * Phrase elements; em, strong, code, abbr, acronym, sub, sup
 */
interface IPhraseElement extends IPhraseElementNoSubSup {}

/**
 * Inline form elements; input, select, textarea, label and button.
 */
interface IInlineFormElement extends IInlineElement,
                                     IPreContent {}

/**
 * Misc. elements; del.
 */
interface IMiscElement extends ITextLevelElement,
                               IBlockNoForm,
                               IFieldsetContent,
                               IPreContent {}


///////////////////////
// Block level elements


/**
 * All block level elements; all elements from IBlockElement and IMiscElement,
 * plus <form>.
 */
interface IBlockLevelElement {}

/**
 * Misc. block elements; ul, ol, dl, pre, hr, blockquote, headings, p,
 * fieldset, table.
 */
interface IBlockElement extends IBlockLevelElement,
                                IFlowElement,
                                IBlockNoForm,
                                IFieldsetContent {}

/**
 * Block text elements; pre, hr, blockquote
 */
interface IBlockTextElement extends IBlockElement {}

/**
 * Lists; ul, ol, dl
 */
interface IListElement extends IBlockElement {}

/**
 * All block level elements except form.
 */
interface IBlockNoForm {}

/**
 * Flow elements; mixes block and text level elements.
 */
interface IFlowElement {}

/**
 * Allowed fieldset element content
 */
interface IFieldsetContent {}

/**
 * Allowed pre element content
 */
interface IPreContent {}


/**
 * Any element; the custom and raw elements implement this
 */
interface IAnyElement extends IInlineElement, ICDataElement,
    IFontStyleElement, ISpecialPreElement, IPhraseElement, IInlineFormELement,
    IMiscElement, IBlockTextElement, IListElement {}

?>
