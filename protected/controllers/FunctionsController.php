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
		$this->render('profit');
	}

	public function actionChart(){
		// TODO move to funtion on change
		$dataProvider = new CArrayDataProvider(Functions::getServiceProfit(), array(
			'id'=>'serviceProfit',
			'sort'=>array(
				'attributes'=>array(
					'id',
					'name',
					'profit'
				),
			),
		));
		$this->render('chart', array(
			'dataProvider'=>$dataProvider->getData(),
		));
	}
}
?>