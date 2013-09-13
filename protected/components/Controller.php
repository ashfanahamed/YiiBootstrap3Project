<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
     * Use the admin template as default.
     *
	 * @var string
	 */
	public $layout='admin';

	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();

	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

    /**
     * Errorsummary for the admin template.
     *
     * @var string|null
     */
    public $errorSummary = null;


    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /** required login all page */
    public function accessRules()
    {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('*'),
                'users'=>array('@'),
            ),
            array('allow',
                'actions' => array('login', 'error'),
                'users'=>array('?'),
            ),
            array('deny',
                'users'=>array('?'),
            )
        );
    }
}
