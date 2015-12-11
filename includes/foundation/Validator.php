<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 5/30/2015
 * Time: 8:14 AM
 */

class Validator {

    private $validatorStatus = true;

    public function checkForKey($name,$rules){
        foreach($rules as $rule){
            if(!$this->validate($name,$rule)){
                return false;
            }
        }
        return true;
    }

    public function run($rules){
        foreach($rules as $key => $value){
            if(!$this->checkForKey($key,$this->parse($value))){
                $this->validatorStatus = false;
            }
        }
    }

    public function fails(){
        return !$this->validatorStatus;
    }

    protected function parse($rule_list){
        return explode("|",$rule_list);
    }

    protected function validate($name,$rule){
        $input = get_input($name);
        switch($rule){
            case "required":
                if($input == "" || is_null($input)){
                    $this->setMessage($name,"{$name} field is required");
                    return false;
                }
                return true;
                break;
            case "email":
                if(!filter_var($input,FILTER_VALIDATE_EMAIL)){
                    $this->setMessage($name,"{$name} field is not a valid email");
                    return false;
                }
                return true;
                break;
            case "numeric":
                if(!filter_var($input,FILTER_VALIDATE_INT|FILTER_VALIDATE_FLOAT)){
                    $this->setMessage($name,"{$name} field is not numeric");
                    return false;
                }
                return true;
                break;
        }
    }

    protected function setMessage($key,$message){
        if(!isset($_SESSION['validator']['message'])){
            $_SESSION['validator']['message'] = array();
        }
        $_SESSION['validator']['message'][$key] = $message;
    }

    public function getMessages(){
        return $_SESSION['validator']['message'];
    }

    public function getMessage($key){
        return $_SESSION['validator']['message'][$key];
    }

    public static function reset(){
        unset($_SESSION['validator']['message']);
    }
}