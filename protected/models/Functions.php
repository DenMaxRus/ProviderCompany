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
	// $
	static function getServiceProfit($period){
		$services = Service::model()->findAll();
		$servicesProfit = array();
		$command = Yii::app()->db->createCommand();
		foreach($period as $dt){
			$servicesProfitRaw = $command
				->select('id, name, coalesce(sum(amount)*cost,0) as profit, date')
				->from('services s')
				->join('traffic t', 's.id=t.serviceid')
				->where('date_format(date, "%Y%m")=:currentDate',array(':currentDate'=>$dt->format('Ym')))
				->group('name, date')
				->order('date')
				->queryAll();
			$command->reset();
			//print $dt->format('Ym').'</br>';
			/*print '<pre>';
			print_r($serviceProfitRaw);
			print '</pre></br>';*/
			//sprintf('#%06X', mt_rand(0, 0xFFFFFF));
			foreach($services as $service){
				$int_serviceProfit = 0;
				foreach($servicesProfitRaw as $item){
					if($item['name'] == $service->name)
						$int_serviceProfit += $item['profit'];
				}
				$servicesProfit['profit'][$service->name][] = $int_serviceProfit;
			}
			$servicesProfit['dates'][] = $dt->format('m/Y');
		}
		/*
		foreach($services as $service){
			$profits = Yii::app()->db->createCommand()
				->select('profit')
				->from('traffic')
				->where
			$serviceProfit[$service] =
		}
		$serviceProfitRaw = Yii::app()->db->createCommand()
			->select('id, name, coalesce(sum(amount)*cost,0) as profit, date')
			->from('services s')
			->join('traffic t', 's.id=t.serviceid')
			->where(array('dateformat(date, "%Y%m")=:currentDate'),array(':currentDate'=>date('Ym')))
			->group('name, date')
			->order('date')
			->queryAll();
		foreach($serviceProfitRaw as $item){
			$serviceProfit[$item['date']][$item['name']] = $item['profit'];
		}*/
		return $servicesProfit;
	}
}
?>