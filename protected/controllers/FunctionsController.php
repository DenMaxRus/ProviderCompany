<?php

class FunctionsController extends Controller {

	public $layout='//layouts/column2';

	public function actionDebt($id){
		if(Yii::app()->user->checkAccess('debtAll'))
			$this->getAllDebtors();
		else
			$this->getUserDebt($id);
	}

	private function getAllDebtors(){
		$gridDataProvider = new CArrayDataProvider(Functions::getAllDebtors(), array(
			'id'=>'debtors',
			'sort'=>array(
				'attributes'=>array(
					'id',
					'lastname',
					'account',
				),
			),
		));
		$this->render('debt', array(
			'gridDataProvider'=>$gridDataProvider,
			'title'=>'Общая задолженность',
		));
	}

	private function getUserDebt($id){
		$gridDataProvider = new CArrayDataProvider(Functions::getDebt($id), array(
			'id'=>'debtor',
			'sort'=>array(
				'attributes'=>array(
					'id',
					'lastname',
					'account',
				),
			),
		));
		$this->render('debt', array(
			'gridDataProvider'=>$gridDataProvider,
			'title'=>'Задолженность клиента '.$id,
		));
	}

	public function actionServiceProfit(){
		$this->render('servicesProfit');
	}

	public function actionShowServiceProfitChart(){
		// TODO move to function or change
		$dateStart = new DateTime();
		$dateEnd = new DateTime();
		if(!empty($_POST["dateStart"]))
			$dateStart->modify($_POST["dateStart"]);
		if(!empty($_POST["dateEnd"]))
			$dateEnd->modify($_POST["dateEnd"]);
		if($dateStart->format('Ym') == $dateEnd->format('Ym'))
			$dateEnd->modify('+1 month');
		$dateInterval = new DateInterval('P1M');
		$period = new DatePeriod($dateStart, $dateInterval, $dateEnd);
		$dataProvider = Functions::getServiceProfit($period);
		/*print $dateStart->format('Y-m-d').' '.$dateEnd->format('Y-m-d');
		print '<pre>';
		print_r($dataProvider);
		print '</pre>';*/
		$this->render('servicesProfitChart', array(
			'labels'=>$dataProvider['dates'],
			'data'=>$dataProvider['profit'],
			'colors'=>$dataProvider['colors'],
		));
	}
}
?>