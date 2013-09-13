<?php

class DemoController extends Controller
{
    public $defaultAction = 'panel';


	public function actionGridView()
	{
		$this->render('gridView');
	}

	public function actionHorizontalForm()
	{
		$this->render('horizontalForm');
	}

	public function actionLoginForm()
	{
		$this->render('loginForm');
	}

	public function actionPanel()
	{
		$this->render('panel');
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}