<?php

class Functions {

	static function getDebt($id){
		$debtUser = Yii::app()->db->createCommand()
			->select('u.id, lastname, account')
			->from('users u')
			->join('contracts c', 'u.id=c.userid')
			->where('account<0 and u.id=:id',array(':id'=>$id))
			->group('lastname')
			->queryAll();
		return $debtUser;
	}

	static function getAllDebtors(){
		$debtUsers = Yii::app()->db->createCommand()
			->select('u.id, lastname, account')
			->from('users u')
			->join('contracts c', 'u.id=c.userid')
			->where('account<0')
			->group('lastname')
			->queryAll();
		return $debtUsers;
	}
	static function getServiceProfit(){
		$serviceProfit = Yii::app()->db->createCommand()
			->select('id, name, coalesce(sum(amount)*cost,0) as profit')
			->from('services s, traffic t')
			->where(array('date=:date'),array(':date'=>date("Y-m-d")))
			->group('name')
			->queryAll();
		return $serviceProfit;
	}
}
?>