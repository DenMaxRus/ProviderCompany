<?php

class WebUser extends CWebUser {
	private $model = null;

	public function getModel()
	{
		if(!isset($this->id)) $this->model = new User();
		if($this->model === null)
			$this->model = User::model()->findByAttributes(array('login'=>$this->name));
		return $this->model;
	}
}
?>