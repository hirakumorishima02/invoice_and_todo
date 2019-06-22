<?php
Form::macro('mySelectBox', function ($name, $list = [], $selected = null, array $selectAttributes = [], array $optionsAttributes = []) {
    $html = '<select name="' . $name . '"';
    foreach ($selectAttributes as $k => $v) {
        $html .= ' ' . $k . '="' . $v . '"';
    }
    $html .= ">\n";

    foreach ($list as $value => $text) {
        $html .= '<option value="' . $value . '"';
        if (strcmp($value, $selected) == 0) {
            $html .= ' selected="selected"';
        }
        if (isset($optionsAttributes[$value])) {
            $html .= ' ' . $optionsAttributes[$value];
        }
        $html .= '>' . $text . "</option>\n";
    }
    $html .= '</select>';
    return $html;
});