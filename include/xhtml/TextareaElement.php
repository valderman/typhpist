<?php
/**
 * Represents a <textarea> element.
 */
class TextareaElement extends XHtmlFormElement {
    protected $label;
    protected $text;

    public function __construct($basename,
                                $label = null,
                                $value = null,
                                $rows = XHtmlDocument::TEXTAREA_DEFAULT_ROWS,
                                $cols = XHtmlDocument::TEXTAREA_DEFAULT_COLS){
        $this->label = $label;
        $this->text = $value;
        $this->addAttributes(array('id'    => $basename,
                                   'name'  => $basename,
                                   'rows'  => $rows,
                                   'cols'  => $cols));
    }

    public function output() {
        $str = '';
        if($this->label) {
            $id = XHtmlDocument::escape($this->getAttribute('id'));
            $str .= '<label for="'.$id.'">'.$this->label.'</label>';
        }
        $str .= '<textarea' . $this->outputAttributes() . '>';
        $str .= XHtmlDocument::escape($this->text);
        $str .= '</textarea>';
        return $str;
    }

    public function pretty($indlevel = 0) {
        $str = '';
        if($this->label) {
            $str .= str_repeat(' ',$indlevel*XHtmlDocument::PRETTY_TAB_WIDTH);
            $id = XHtmlDocument::escape($this->getAttribute('id'));
            $str .= '<label for="'.$id.'">'.$this->label."</label>\n";
        }
        $str .= str_repeat(' ', $indlevel*XHtmlDocument::PRETTY_TAB_WIDTH);
        $str .= '<textarea' . $this->outputAttributes() . '>';
        $str .= XHtmlDocument::escape($this->text);
        $str .= "</textarea>\n";
        return $str;
    }
}
?>
