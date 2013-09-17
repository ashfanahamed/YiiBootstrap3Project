<?php

class DemoController extends Controller
{
    public $defaultAction = 'panel';


    public function beforeAction()
    {
        Yii::app()->clientScript->registerCssFile('http://getbootstrap.com/assets/css/pygments-manni.css');
        Yii::app()->clientScript->registerScriptFile('https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js');
        return true;
    }

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
		$this->render('loginForm', array(
            'model' => new LoginForm()
        ));
	}

	public function actionPanel()
	{
		$this->render('panel');
	}
}