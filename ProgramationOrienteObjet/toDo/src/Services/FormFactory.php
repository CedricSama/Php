<?php
namespace TODO\Services;

class FormFactory
{
    public static $bootstrap = false;
    private $datas;

//    private $is_bootstrap;

//    public function __construct($is_bootstrap)
//    {
//        $this->is_bootstrap = $is_bootstrap;
//    }

    /**
     * FormFactory constructor. Passer la superglobale $_POST
     * @param array $datas
     */
    public function __construct($datas = [])
    {
        $this->datas = $datas;
        //print_r($this->datas);
    }

    private function boostrap($html) {
        if(static::$bootstrap) {
            return "<div class='form-group'>$html</div>";
        } else {
            return $html;
        }
    }
    private function getValue($name) {
        return isset($this->datas[$name]) ? $this->datas[$name] : null;
    }

    private function isRequired($is_required){
        $is_required = $is_required ? ' <span style="color:red">*</span>'  : false;
        return $is_required;
    }

    public function input($name,$label,$options = ['type'=>'text','css'=>null,'required'=>false]) {
$label = '<label for="'.$name.'">'.$label.'</label>';
        //$label = "<label for='$name'>$label</label>";
$input = '<input value="'.$this->getValue($name).'" class="'.$options['css'].'" type="'.$options['type'].'" id="'.$name.'" name="'.$name.'">';

if($options['type'] == "textarea") {
$input =
    "<textarea rows='10' class='{$options['css']}' id='$name' name='$name'>{$this->getValue($name)}</textarea>";
}
        return $this->boostrap($label.$this->isRequired($options['required']).$input);
    }
    public function select(){

    }

    public function submit($options=['css'=>null,'value'=>'valider']){
$html = "<input type='submit' class='{$options['css']}' value='{$options['value']}'>";
        return $this->boostrap($html);
    }
}