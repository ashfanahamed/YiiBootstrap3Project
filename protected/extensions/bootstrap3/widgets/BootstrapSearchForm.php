<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Kovács Tamás
 * Date: 2013.09.03.
 * Time: 15:48
 * To change this template use File | Settings | File Templates.
 */
class BootstrapSearchForm extends BootstrapForm
{
    /**
     * @param $model
     * @param $attribute
     * @param array $htmlOptions
     * @return string
     */
    public function textFieldRow($model, $attribute, $htmlOptions = array())
    {
        $return = Bhtml::openTag('div', array('class' => 'row form-group'))
            . $this->labelEx($model, $attribute, array('class' => 'col-md-3 control-label', 'style' => 'font-weight: normal; '))
            . Bhtml::openTag('div', array('class' => 'col-md-9'))
            .   $this->textField($model, $attribute, array('class' => 'input-sm'))
            . Bhtml::closeTag('div')
            . Bhtml::closeTag('div');

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
        $return = Bhtml::openTag('div', array('class' => 'row form-group'))
            .   BHtml::openTag('div', array('class' => 'col-md-offset-3 col-md-9'))
            .       BHtml::openTag('div', array('class' => 'checkbox'))
            .           BHtml::openTag('label')
            .               $this->checkBox($model, $attribute)
            .               $model->getAttributeLabel($attribute)
            .           Bhtml::closeTag('label')
            .       Bhtml::closeTag('div')
            .   Bhtml::closeTag('div')
            . Bhtml::closeTag('div');

        return $return;
    }

    /**
     * @param $label
     * @param array $htmlOptions
     * @return string
     */
    public function submitButtonRow($label, $htmlOptions = array())
    {
        $return = Bhtml::openTag('div', array('class' => 'row form-group'))
            .   BHtml::openTag('div', array('class' => 'col-lg-offset-3 col-lg-9'))
            .       $this->submitButton($label, $htmlOptions)
            .   Bhtml::closeTag('div')
            . Bhtml::closeTag('div');

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
            . $this->labelEx($model, $attribute, array('class' => 'col-md-3 control-label', 'style' => 'font-weight: normal; '))
            . BHtml::openTag('div', array('class' => 'col-md-9'))
            . BHtml::activeDropDownList($model, $attribute, $data, $htmlOptions)
            . BHtml::closeTag('div')
            . BHtml::closeTag('div');

        return $return;
    }
}
