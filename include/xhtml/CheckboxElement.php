<?php
/**
 * Represents a set of <input type="checkbox">
 */
class CheckboxElement extends XHtmlFormElement {
    protected $options;
    protected $basename;

    /**
     * Construct a new checkbox element.
     * @param string $basename Base name of this meta element; see
     *                         XHtmlFormElement for more information.
     * @param array $options   Associative array of options to use for this
     *                         set of checkboxes in the form [id => value].
     *                         In the resulting XHTML the ID and name of every
     *                         individual checkbox will be $basename_$id.
     *                         To make a checkbox initially selected,
     *                         prepend its ID with an asterisk (*).
     */
    public function __construct($basename, $options) {
        $this->options = $options;
        $this->basename = $basename;
        $this->addAttributes(array('name' => $basename,
                                   'type' => 'checkbox'));
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
            $this->setAttribute('name', $myid);

            $str .= '<input' . $this->outputAttributes() . $checked . '/>';
            $str .= '<label for="' . $myid . '">' . $v . '</label>';
        }
        return $str;
    }
}
?>
