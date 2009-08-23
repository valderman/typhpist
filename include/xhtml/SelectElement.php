<?php
/**
 * Represents a <select> element with <option>s included
 */
class SelectElement extends XHtmlFormElement {
    protected $options;
    protected $basename;

    /**
     * Construct a new select element.
     * @param string $basename Base name of this meta element; see
     *                         XHtmlFormElement for more information.
     * @param array $options   Associative array of options to use for this
     *                         select element in the form [id => value].
     *                         the resulting <option> tag till look like this:
     *                         <option value="id">value</option>
     *
     *                         Prepend an ID with an asterisk (*) to have it
     *                         initially selected.
     *
     *                         If $options is an array of arrays, it is
     *                         interpreted as a set of option groups,
     *                         corresponding to the optgroup tag, in the
     *                         following format: [optgroup_label =>
     *                                              [id => value]
     *                                           ]
     *                         So if you pass the following array:
     *                         array('Animals'  => array('cat' => 'Cat',
     *                                                   'dog' => 'Dog'),
     *                               'Vehicles' => array('boat' => 'Boat',
     *                                                   'car'  => 'Car')
     *                              );
     *                         The resulting list would look like:
     *                         <select>
     *                             <optgroup label="Animals">
     *                                 <option value="cat">Cat</option>
     *                                 <option value="dog">Dog</option>
     *                             </optgroup>
     *                             <optgroup label="Vehicles">
     *                                 <option value="boat">Boat</option>
     *                                 <option value="car">Car</option>
     *                             </optgroup>
     *                         </select>
     */
    public function __construct($basename, $options) {
        $this->options = $options;
        $this->addAttributes(array('name' => $basename, 'id' => $basename));
    }

    /**
     * Generate a list of <option> tags.
     * @param array $opts Array of [id => value] options.
     * @return string     XHTML for the resulting set of <option> tags.
     */
    private function genOpts($opts) {
        $str = '';
        foreach($opts as $k => $v) {
            $sel = '';
            if($k[0] == '*') {
                $sel = ' selected="selected" ';
                $k = substr($k, 1);
            }

            $str .= '<option value="'.$k.'" '.$sel.'>';
            $str .= $v . '</option>';
        }
        return $str;
    }

    /**
     * Generate an indented list of <option> tags.
     * @param array $opts   Array of [id => value] options.
     * @param int $indlevel Indentation level for option tags.
     * @return string       XHTML for the resulting set of <option> tags.
     */
    private function prettyOpts($opts, $indlevel = 1) {
        $str = '';
        $space = str_repeat(' ', $indlevel*XHtmlDocument::PRETTY_TAB_WIDTH);
        foreach($opts as $k => $v) {
            $sel = '';
            if($k[0] == '*') {
                $sel = ' selected="selected" ';
                $k = substr($k, 1);
            }

            $str .= $space;
            $str .= '<option value="'.$k.'" '.$sel.'>';
            $str .= $v . "</option>\n";
        }
        return $str;
    }

    public function output() {
        $str = '<select' . $this->outputAttributes() . '>';
        if(is_array(reset($this->options))) {
            foreach($this->options as $k => $v) {
                $str .= '<optgroup label="' . $k . '">';
                $str .= $this->genOpts($v);
                $str .= '</optgroup>';
            }
        } else {
            $str .= $this->genOpts($this->options);
        }
        $str .= '</select>';
        return $str;
    }

    public function pretty($indlevel = 0) {
        // spaces for <option>s
        $ospace=str_repeat(' ',($indlevel+1)*XHtmlDocument::PRETTY_TAB_WIDTH);

        $str = str_repeat(' ', $indlevel*XHtmlDocument::PRETTY_TAB_WIDTH);
        $str .= '<select' . $this->outputAttributes() . ">\n";
        if(is_array(reset($this->options))) {
            foreach($this->options as $k => $v) {
                $str .= $ospace;
                $str .= '<optgroup label="' . $k . "\">\n";
                $str .= $this->prettyOpts($v, $indlevel + 2);
                $str .= $ospace;
                $str .= "</optgroup>\n";
            }
        } else {
            $str .= $this->prettyOpts($this->options, $indlevel + 1);
        }
        $str .= str_repeat(' ', $indlevel*XHtmlDocument::PRETTY_TAB_WIDTH);
        $str .= "</select>\n";
        return $str;
    }
}
?>
