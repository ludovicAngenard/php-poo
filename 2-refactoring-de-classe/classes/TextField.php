<?php
use Exception\StringException;

class TextField extends HtmlField {

    protected function isValid($value) {
        if ((!is_string($value))) {
            throw new StringException('Please enter a string');
        }
        if ((strlen($value) < 2) || (strlen($value) > 150)) {
            throw new StringException('The text value should have between 2 and 150 characters');
        }
        return true;
    }
    public function __toString() {
        return "<input type='text' name='$this->name' value='$this->value' >";
    }
}