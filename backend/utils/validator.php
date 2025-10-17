<?php

class Validator {
    private $errors = [];
    
    public function required($fields, $data) {
        foreach ($fields as $field) {
            if (!isset($data[$field]) || empty(trim($data[$field]))) {
                $this->errors[$field] = ucfirst($field) . ' is required';
            }
        }
    }
    
    public function email($field, $value) {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field] = 'Invalid email format';
        }
    }
    
    public function minLength($field, $value, $min) {
        if (strlen($value) < $min) {
            $this->errors[$field] = ucfirst($field) . " must be at least {$min} characters";
        }
    }
    
    public function maxLength($field, $value, $max) {
        if (strlen($value) > $max) {
            $this->errors[$field] = ucfirst($field) . " must not exceed {$max} characters";
        }
    }
    
    public function isValid() {
        return empty($this->errors);
    }
    
    public function getErrors() {
        return $this->errors;
    }
}