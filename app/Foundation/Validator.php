<?php 

namespace App\Foundation;

trait Validator
{
	protected function validator(array $data, $params = [])
    {

		$rules = empty($params)? $this->rules()->all(): $this->rules()->only($params)->all();

        return \Validator::make($data, $rules);
    }
}