<?php

namespace Core;

class Form {

	public static function open($name, $action='', $attributes = []){	
		$field = "<form action='$action' ";

		if (count($attributes)>0) {
			foreach ($attributes as $key => $v) {
				$field .= $key . "='" . $v . "' ";
			}
		}

		$field .= ">";

		echo $field;		
	}

	public static function close(){	
		$field = "</form>";

		echo $field;		
	}

	public static function label($for, $value, $attributes = []) {
		$field = "<label for='$for' ";

		if (count($attributes)>0) {
			foreach ($attributes as $key => $v) {
				$field .= $key . "='" . $v . "' ";
			}
		}

		$field .= ">";
		$field .= $value . "</label>";
		return $field;
	}

	public static function text($name, $value='', $attributes = []){

		$field = "<input type='text' name='$name' value='$value' ";

		if (count($attributes)>0) {
			foreach ($attributes as $key => $v) {
				if ($key == 'required'){
					$field .= $key . " ";
				}
					$field .= $key . "='" . $v . "' ";
			}
		}

		$field .= "/>";
		return $field;

	}
	public static function hidden($name, $value='', $attributes = []){

		$field = "<input type='hidden' name='$name' value='$value' ";

		if (count($attributes)>0) {
			foreach ($attributes as $key => $v) {
				if ($key == 'required'){
					$field .= $key . " ";
				}
					$field .= $key . "='" . $v . "' ";
			}
		}

		$field .= "/>";
		return $field;

	}
	public static function password($name, $value='', $attributes = []){

		$field = "<input type='password' name='$name' value='$value' ";

		if (count($attributes)>0) {
			foreach ($attributes as $key => $v) {
				if ($key == 'required'){
					$field .= $key . " ";
				}
					$field .= $key . "='" . $v . "' ";
			}
		}

		$field .= "/>";

		echo $field;

	}

	public static function email($name, $value='', $attributes = []){

		$field = "<input type='email' name='$name' value='$value' ";

		if (count($attributes)>0) {
			foreach ($attributes as $key => $v) {
				if ($key == 'required'){
					$field .= $key . " ";
				}
					$field .= $key . "='" . $v . "' ";
			}
		}

		$field .= "/>";

		echo $field;

	}  

	public static function radio($name, $value='', $attributes = []){

		$field = "<input type='radio' name='$name' value='$value' ";

		if (count($attributes)>0) {
			foreach ($attributes as $key => $v) {
				if ($key == 'required'){
					$field .= $key . " ";
				}
					$field .= $key . "='" . $v . "' ";
			}
		}

		$field .= "/>";

		echo $field;

	} 

	public static function checkbox($name, $value='', $attributes = []){

		$field = "<input type='checkbox' name='$name' value='$value' ";

		if (count($attributes)>0) {
			foreach ($attributes as $key => $v) {
				if ($key == 'required'){
					$field .= $key . " ";
				}
					$field .= $key . "='" . $v . "' ";
			}
		}

		$field .= "/>";

		echo $field;

	}

	public static function submit($name, $value='', $attributes = []){
		$field = "<input type='submit' name='$name' value='$value' ";

		if (count($attributes)>0) {
			foreach ($attributes as $key => $v) {
				$field .= $key . "='" . $v . "' ";
			}
		}

		$field .= "/>";

		echo $field;		
	}

	public static function textarea($name, $value='', $attributes = []){

		$field = "<textarea name='$name' ";

		if (count($attributes)>0) {
			foreach ($attributes as $key => $v) {
				if ($key == 'required'){
					$field .= $key . " ";
				}
					$field .= $key . "='" . $v . "' ";
			}
		}

		$field .= ">";
		$field .= $value . "</textarea>";

		echo $field;

	}
	public static function select($name, $options = [], $attributes = []){
		$field = "<select name='$name' ";

		if (count($attributes)>0) {
			foreach ($attributes as $key => $v) {
				$field .= $key . "='" . $v . "' ";
			}
		}

		$field .= ">";
		foreach ($options as $k => $v) {
			$field .= "<option value='$k'>" . $v . "</option>";
		}
		$field .= "</select>";

		echo $field;		
	}
	public static function button($name, $value='', $attributes = []){
		$field = "<button name='$name' ";

		if (count($attributes)>0) {
			foreach ($attributes as $key => $v) {
				$field .= $key . "='" . $v . "' ";
			}
		}

		$field .= ">";
		$field .= $value . "</button>";

		echo $field;		
	}

	// checkbox

	// radiobutton

	// select

	// file
}