<?php
/**
 * Represents an <input type="text">.
 */
class TextInputElement extends XHtmlFormElement {
    protected $label;

    public function __construct($basename, $label = null, $value = null) {
        $this->label = $label;
        $this->addAttributes(array('value' => $value,
                                   'id'    => $basename,
                                   'name'  => $basename,
                                   'type'  => 'text'));
    }

    public function output() {
        $str = '';
        if($this->label) {
            $id = XHtmlDocument::escape($this->getAttribute('id'));
            $str .= '<label for="'.$id.'">'.$this->label.'</label>';
        }
        $str .= '<input' . $this->outputAttributes() . '/>';
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
        $str .= '<input' . $this->outputAttributes() . "/>\n";
        return $str;
    }
}
?>
