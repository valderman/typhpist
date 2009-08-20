<?php
/**
 * Represents a set of <input type="radio">
 */
class RadioElement extends XHtmlFormElement {
    protected $options;
    protected $basename;

    /**
     * Construct a new radio button element.
     * @param string $basename Base name of this meta element; see
     *                         XHtmlFormElement for more information.
     * @param array $options   Associative array of options to use for this
     *                         set of radio buttons in the form [id => value].
     *                         In the resulting XHTML, the ID of every
     *                         individual radio button will be $basename_$id.
     *                         To make a radio button initially selected,
     *                         prepend its ID with an asterisk (*).
     */
    public function __construct($basename, $options) {
        $this->options = $options;
        $this->basename = $basename;
        $this->addAttributes(array('name' => $basename,
                                   'type' => 'radio'));
    }

    public function output() {
        $str = '';
        foreach($this->options as $k => $v) {
            $checked = '';
            if($k[0] == '*') {
                $checked = ' checked="checked" ';
                $k = substr($k, 1);
            }

            $myid = $this->basename . '_' . $k;
            $this->setAttribute('id', $myid);

            $str .= '<input' . $this->outputAttributes() . $checked . '/>';
            $str .= '<label for="' . $myid . '">' . $v . '</label>';
        }
        return $str;
    }
}
?>
