<?php
/**
 * Represents a set of <input type="checkbox">
 */
class CheckboxElement extends XHtmlFormElement
                      implements IInlineFormElement {
    protected $options;
    protected $basename;
    protected $label_first;

    /**
     * Construct a new checkbox element.
     * @param string $basename     Base name of this meta element; see
     *                             XHtmlFormElement for more information.
     *
     * @param array $options       Associative array of options to use for
     *                             this set of checkboxes in the form
     *                             [id => value].
     *                             In the resulting XHTML the ID and name of
     *                             every individual checkbox will be
     *                             $basename_$id.
     *                             To make a checkbox initially selected,
     *                             prepend its ID with an asterisk (*).
     *
     * @param boolean $label_first If this parameter is set to true, the label
     *                             of each checkbox will appear before the
     *                             checkbox in the resulting XHTML. If it's
     *                             set to false or not given, the checkbox
     *                             will appear before the label.
     */
    public function __construct($basename, $options, $label_first = false) {
        $this->label_first = $label_first;
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

            if($this->label_first) {
                $str .= '<label for="' . $myid . '">' . $v . '</label>';
                $str .= '<input' . $this->outputAttributes() . $checked .'/>';
            } else {
                $str .= '<input' . $this->outputAttributes() . $checked .'/>';
                $str .= '<label for="' . $myid . '">' . $v . '</label>';
            }
        }
        return $str;
    }

    public function pretty($indlevel) {
        $str = '';
        $spaces = str_repeat(' ', $indlevel*XHtmlDocument::PRETTY_TAB_WIDTH);
        foreach($this->options as $k => $v) {
            $str .= $spaces;
            $checked = '';
            if($k[0] == '*') {
                $checked = ' checked="checked" ';
                $k = substr($k, 1);
            }

            $myid = $this->basename . '_' . $k;
            $this->setAttribute('id', $myid);
            $this->setAttribute('name', $myid);

            if($this->label_first) {
                $str .= '<label for="' . $myid . '">' . $v . "</label>\n";
                $str .= $spaces;
                $str .= '<input'. $this->outputAttributes() . $checked."/>\n";
            } else {
                $str .= '<input'. $this->outputAttributes() . $checked."/>\n";
                $str .= $spaces;
                $str .= '<label for="' . $myid . '">' . $v . "</label>\n";
            }
        }
        return $str;
    }
}
?>
