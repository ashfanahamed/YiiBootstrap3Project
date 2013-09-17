<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Kovács Tamás
 * Date: 2013.09.03.
 * Time: 11:14
 * To change this template use File | Settings | File Templates.
 */
class BootstrapForm extends CActiveForm
{
    public $htmlOptions = array('class' => 'form-horizontal');


    /**
     *
     */
    public function init()
    {
        if (!array_key_exists('class', $this->htmlOptions)) {
            $this->htmlOptions['class'] = '';
        }

        $this->htmlOptions['class'] .= ' form-horizontal';
        $this->htmlOptions['role'] = 'form';

        return parent::init();
    }

    /**
     * @param mixed $models
     * @param null $header
     * @param null $footer
     * @param array $htmlOptions
     * @return string|void
     */
    public function errorSummary($models, $header=null, $footer=null, $htmlOptions=array())
    {
        $defaultHtmlOptions = array(
            'class' => 'bs-callout bs-callout-danger'
        );
        $htmlOptions = array_merge($defaultHtmlOptions, $htmlOptions);

        /*return parent::errorSummary($models, $header, $footer, $htmlOptions);*/

        if (!$this->enableAjaxValidation && !$this->enableClientValidation) {
            return BHtml::errorSummary($models, $header, $footer, $htmlOptions);
        }
    }

    /**
     * @param $model
     * @param $attribute
     * @param array $htmlOptions
     * @return string
     */
    public function textField($model, $attribute, $htmlOptions = array())
    {
        if (!array_key_exists('class', $htmlOptions)) {
            $htmlOptions['class'] = '';
        }

        $htmlOptions['class'] = 'form-control ' . $htmlOptions['class'];
        return parent::textField($model, $attribute, $htmlOptions);
    }

    /**
     * @param $model
     * @param $attribute
     * @param array $htmlOptions
     * @return string
     */
    public function textFieldRow($model, $attribute, $htmlOptions = array())
    {
        $return = BHtml::openTag('div', array('class' => 'form-group'))
            . $this->labelEx($model, $attribute, array('class' => 'col-md-2 control-label'))
            . BHtml::openTag('div', array('class' => 'col-md-10'))
            .   $this->textField($model, $attribute, $htmlOptions)
            . BHtml::closeTag('div')
            . BHtml::closeTag('div');

        return $return;
    }

    /**
     * @param $model
     * @param $attribute
     * @param array $htmlOptions
     * @return string
     */
    public function textArea($model, $attribute, $htmlOptions = array())
    {
        if (!array_key_exists('class', $htmlOptions)) {
            $htmlOptions['class'] = '';
        }

        $htmlOptions['class'] = 'form-control ' . $htmlOptions['class'];
        return parent::textArea($model, $attribute, $htmlOptions);
    }

    /**
     * @param $model
     * @param $attribute
     * @param array $htmlOptions
     * @return string
     */
    public function textAreaRow($model, $attribute, $htmlOptions = array())
    {
        $return = BHtml::openTag('div', array('class' => 'form-group'))
            . $this->labelEx($model, $attribute, array('class' => 'col-md-2 control-label'))
            . BHtml::openTag('div', array('class' => 'col-md-10'))
            .   $this->textArea($model, $attribute, $htmlOptions)
            . BHtml::closeTag('div')
            . BHtml::closeTag('div');

        return $return;
    }

    /**
     * @param $model
     * @param $attribute
     * @param array $htmlOptions
     * @return string
     */
    public function checkboxRow(CModel $model, $attribute, $htmlOptions = array())
    {
        $return = BHtml::openTag('div', array('class' => 'form-group'))
            .   BHtml::openTag('div', array('class' => 'col-lg-offset-2 col-lg-10'))
            .       BHtml::openTag('div', array('class' => 'checkbox'))
            .           BHtml::openTag('label')
            .               $this->checkBox($model, $attribute, $htmlOptions)
            .               $model->getAttributeLabel($attribute)
            .           BHtml::closeTag('label')
            .       BHtml::closeTag('div')
            .   BHtml::closeTag('div')
            . BHtml::closeTag('div');

        return $return;
    }

    /**
     * @param $model
     * @param $attribute
     * @param array $htmlOptions
     * @return string
     */
    public function passwordField($model, $attribute, $htmlOptions = array())
    {
        if (!array_key_exists('class', $htmlOptions)) {
            $htmlOptions['class'] = '';
        }

        $htmlOptions['class'] = 'form-control ' . $htmlOptions['class'];
        return parent::passwordField($model, $attribute, $htmlOptions);
    }

    /**
     * @param $model
     * @param $attribute
     * @param array $htmlOptions
     * @return string
     */
    public function passwordFieldRow($model, $attribute, $htmlOptions = array())
    {
        $return = BHtml::openTag('div', array('class' => 'form-group'))
            . $this->labelEx($model, $attribute, array('class' => 'col-md-2 control-label'))
            . BHtml::openTag('div', array('class' => 'col-md-10'))
            .   $this->passwordField($model, $attribute, $htmlOptions)
            . BHtml::closeTag('div')
            . BHtml::closeTag('div');

        return $return;
    }

    /**
     * @param string $label
     * @param array $htmlOptions
     * @return mixed
     */
    public static function submitButton($label = 'submit', $htmlOptions = array())
    {
        if (!array_key_exists('class', $htmlOptions)) {
            $htmlOptions['class'] = '';
        }

        $htmlOptions['class'] = 'btn btn-primary ' . $htmlOptions['class'];
        return BHtml::submitButton($label, $htmlOptions);
    }

    /**
     * @param $label
     * @param array $htmlOptions
     * @return string
     */
    public function submitButtonRow($label, $htmlOptions = array())
    {
        if (!array_key_exists('class', $htmlOptions)) {
            $htmlOptions['class'] = '';
        }

        $htmlOptions['class'] = $htmlOptions['class'];

        $return = BHtml::openTag('div', array('class' => 'form-group'))
            .   BHtml::openTag('div', array('class' => 'col-lg-offset-2 col-lg-10'))
            .       $this->submitButton($label, $htmlOptions)
            .   BHtml::closeTag('div')
            . BHtml::closeTag('div');

        return $return;
    }

    /**
     * @param CModel $model
     * @param $attribute
     * @param $data
     * @param array $htmlOptions
     * @return string
     */
    public function dropDownListRow($model, $attribute, $data, $htmlOptions = array())
    {
        $return = BHtml::openTag('div', array('class' => 'row form-group'))
            . $this->labelEx($model, $attribute, array('class' => 'col-md-2 control-label'))
            . BHtml::openTag('div', array('class' => 'col-md-10'))
            . BHtml::activeDropDownList($model, $attribute, $data, $htmlOptions)
            . BHtml::closeTag('div')
            . BHtml::closeTag('div');

        return $return;
    }
}
