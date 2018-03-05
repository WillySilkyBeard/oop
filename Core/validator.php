<?php

namespace core;

class Validator
{
	public $clean = [];
	public $errors = [];
	public $success = false;
	private $rules;
	private $validatorCollection = [];


	public function execute(array $fields)
	{
		foreach ($this->validatorCollection as $validator) {
			$validator->run($fields);
		}
				/*foreach ($this->rules as $name => $rules) {
			if(!isset($fields[$name]) && isset($rules['require'])) {
				$this->errors[$name][] = sprintf('field %s is require!', $name);
			}
			if(!isset($fields[$name]) && (!isset($rules['require']) || !$rules['require'])) {
				continue;
			}

			if(isset($rules['type'])) {
				if ($rules['type'] === 'string') {
					$fields[$name] = trim(htmlspecialchars($fields[$name]));
				} elseif ($rules['type'] === 'integer') {
					if(!is_numeric($fields[$name])) {
						$this->errors[$name][] = sprintf('');
					}
				}
			}

			if(empty($this->errors[$nmae])) {
				$this->clean[$name] = $fields[$name];
			}
		}*/		
	}

	public function addValidator(ValidationInterface $validator)
	{
		$this->validatorCollection[] = $validator; 
	}

	public function setRules(array $rules)
	{
		$this->rules = $rules;
	}
}