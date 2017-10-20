<?php
    namespace TODO\Services;
    class Validator{
        public function testDataForm($datasForm, $keys){
            $datas = [];
            foreach($keys as $value){
                if(!(array_key_exists($value, $datasForm))){
                    return false;
                }
            }
            foreach($datasForm as $key => $value){
                if(empty($value)){
                    $datas[$key] = null;
                }elseif($key == 'password'){
                    $datas[$key] = sha1(trim($value));
                }else{
                    $datas[$key] = trim(htmlentities($value));
                }
            }
            return $datas;
        }
    }