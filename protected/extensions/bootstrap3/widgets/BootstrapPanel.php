<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Kovács Tamás
 * Date: 2013.09.03.
 * Time: 13:23
 * To change this template use File | Settings | File Templates.
 */
class BootstrapPanel extends CWidget
{
    const TYPE_DEFAULT = 'panel-default';
    const TYPE_PRIMARY = 'panel-primary';
    const TYPE_SUCCESS = 'panel-success';
    const TYPE_INFO = 'panel-info';
    const TYPE_WARNING = 'panel-warning';
    const TYPE_DANGER = 'panel-danger';

    /**
     * @var array
     */
    public $htmlOptions = array();

    /**
     * @var string
     */
    public $panelType = self::TYPE_DEFAULT;

    /**
     * @var string
     */
    public $title = null;

    /**
     * @var string
     */
    private $_openTag;

    /**
     * Initializes the widget.
     */
    public function init()
    {
        ob_start();
        ob_implicit_flush(false);

        if (!array_key_exists('class', $this->htmlOptions)) {
            $this->htmlOptions['class'] = '';
        }

        $this->htmlOptions['class'] .= ' panel ' . $this->panelType;

        echo CHtml::openTag('div', $this->htmlOptions)
            .   CHtml::openTag('div', array('class' => 'panel-heading'))
            .       CHtml::openTag('h3', array('class' => 'panel-title'))
            .       $this->title
            .       CHtml::closeTag('h3')
            .   CHtml::closeTag('div')
            .   CHtml::openTag('div', array('class' => 'panel-body'));

        $this->_openTag=ob_get_contents();
        ob_clean();
    }

    /**
     * Renders the content of the portlet.
     */
    public function run()
    {
        echo $this->_openTag
            . ob_get_clean()
            . CHtml::closeTag('div')
            . CHtml::closeTag('div');
    }
}
