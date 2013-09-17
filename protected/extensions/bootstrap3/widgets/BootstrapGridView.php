<?php

Yii::import('zii.widgets.grid.CGridView');

/**
 * Created by JetBrains PhpStorm.
 * User: Kovács Tamás
 * Date: 2013.09.03.
 * Time: 16:31
 * To change this template use File | Settings | File Templates.
 */
class BootstrapGridView extends CGridView
{
    public $itemsCssClass = 'table table-striped table-hover table-borderedd table-condensed ';
    public $rowCssClass = null;


    /**
     * @throws CException
     */
    public function init()
    {
        $this->htmlOptions['class'] = '';
        //$this->itemsCssClass = 'table table-stripedd table-bordered table-condensed ';

        parent::init();
    }

    public function registerClientScript()
    {}
}
