<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'На главную', 'url'=>array('/site/index')),
                array('label'=>'О сайте', 'url'=>array('/site/page', 'view'=>'about')),
                array('label'=>'Контакты', 'url'=>array('/site/contact')),
                array('label'=>'Логин', 'url'=>array('/site/login'), /*'visible'=>Yii::app()->user->isGuest, */),
            	array('label'=>'Функции', 'items'=>array(
					array('label'=>'Общая плата за месяц', 'url'=>array('/functions/payment', 'id'=>Yii::app()->user->id)),
					array('label'=>'Задолженность', 'url'=>array('/site/workinprogress', 'id'=>Yii::app()->user->id)),
					array('label'=>'Выручка по услугам', 'url'=>array('/functions/profit'), /*'visible'=>Yii::app()->user->checkAccess('profit'),*/),
            		), /*'visible'=>!Yii::app()->user->isGuest,*/
				),
            	array('label'=>'Работа с таблицами','items'=>array(
					array('label'=>'Клиенты', 'url'=>array('/client/admin')),
                    array('label'=>'Услуги', 'url'=>array('/service/admin')),
                    array('label'=>'Контракты', 'url'=>array('/contract/admin')),
                    array('label'=>'Трафик', 'url'=>array('/traffic/admin')),
					), /*'visible'=>Yii::app()->user->checkAccess('editTables'),*/
				),
                array('label'=>'Выход ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), /*'visible'=>!Yii::app()->user->isGuest,*/)
            ),
        ),
    ),
)); ?>

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
			'separator'=>'|',
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
