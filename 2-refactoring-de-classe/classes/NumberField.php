<?php
use Exception\IntegerException;
class NumberField extends HtmlField {

    protected function isValid($value) {
        if ( (!is_numeric($value)) ) {
            throw new IntegerException('Please enter a integer');
        }
        if ($this->value < 0) {
            throw new IntegerException('Value must be positive');
        }
        return true;
    }
    public function __toString() {
        return "<input type='text' name='$this->name' value='$this->value'>";
    }
}