<?php

/**
 * Created by JetBrains PhpStorm.
 * User: Kovács Tamás
 * Date: 2013.09.03.
 * Time: 11:06
 * To change this template use File | Settings | File Templates.
 */
class BootstrapLoginForm extends BootstrapForm
{
    public $htmlOptions = array('class' => 'form-signin');


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

        $htmlOptions['class'] = 'btn btn-lg btn-primary btn-block ' . $htmlOptions['class'];
        return BHtml::submitButton($label, $htmlOptions);
    }
}
