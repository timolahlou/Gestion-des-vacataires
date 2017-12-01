<?php
class Form{
	
	public $controller; 
	public $errors; 

	public function __construct($controller){
		$this->controller = $controller; 
	}

	public function input($name,$label,$options = array()){
		$error = false; 
		$classError = ''; 
		if(isset($this->errors[$name])){
			$error = $this->errors[$name];
			$classError = ' error'; 
		}
		if(!isset($this->controller->request->data->$name)){
			$value = ''; 
		}else{
			$value = $this->controller->request->data->$name; 
		}
		if($label == 'hidden'){
			return '<input type="hidden" name="'.$name.'" value="'.$value.'">'; 
		}
		$html = '<div class="clearfix'.$classError.'">
					<label for="input'.$name.'">'.$label.'</label>
					<div class="input">';
		$attr = ' '; 
		 foreach($options as $k=>$v){ 
                    if($k!='type'){
                        if(is_array($v)){
                           $k = $v;
                        }else{
                            $attr .= "$k=\"$v\"";    
                        }


            }
        }
		if(!isset($options['type']) && !isset($options['options'])){
			$html .= '<input type="text" id="input'.$name.'" name="'.$name.'" value="'.$value.'"'.$attr.'>';
		}elseif(isset($options['options'])){
			$html .= '<select id="input'.$name.'" name="'.$name.'">';
			foreach($options['options'] as $k=>$v){
				$html .= '<option value="'.$k.'" '.($k==$value?'selected':'').'>'.$v.'</option>'; 
			}
			$html .= '</select>'; 
		}elseif($options['type'] == 'textarea'){
			$html .= '<textarea id="input'.$name.'" name="'.$name.'"'.$attr.'>'.$value.'</textarea>';
		}elseif($options['type'] == 'checkbox'){
			$html .= '<input type="hidden" name="'.$name.'" value="0"><input type="checkbox" name="'.$name.'" value="1" '.(empty($value)?'':'checked').'>'; 
		}elseif($options['type'] == 'file'){
			$html .= '<input type="file" class="input-file" id="input'.$name.'" name="'.$name.'"'.$attr.'>';
		}elseif($options['type'] == 'password'){
			$html .= '<input type="password" id="input'.$name.'" name="'.$name.'" value="'.$value.'"'.$attr.'>';
		}
		if($error){
			$html .= '<span class="help-inline">'.$error.'</span>';
		}
		$html .= '</div></div>';
		return $html; 
	}

}