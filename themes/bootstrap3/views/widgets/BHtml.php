<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Kovács Tamás
 * Date: 2013.09.03.
 * Time: 13:47
 * To change this template use File | Settings | File Templates.
 */
class BHtml extends CHtml
{
    public static $errorSummaryCss = 'bs-callout bs-callout-danger';


    /**
     * @param string $label
     * @param array $htmlOptions
     * @return string
     */
    public static function button($label = 'button', $htmlOptions=array())
    {
        $defaultHtmlOptions = array(
            'class' => 'btn btn-primary'
        );
        $htmlOptions = array_merge($defaultHtmlOptions, $htmlOptions);

        return CHtml::button($label, $htmlOptions);
    }

    /**
     * @param CModel $model
     * @param string $attribute
     * @param array $data
     * @param array $htmlOptions
     * @return string
     */
    public static function activeDropDownList($model, $attribute, $data, $htmlOptions = array())
    {
        if (!array_key_exists('class', $htmlOptions)) {
            $htmlOptions['class'] = '';
        }

        $htmlOptions['class'] = 'form-control ' . $htmlOptions['class'];
        return CHtml::activeDropDownList($model, $attribute, $data, $htmlOptions);
    }

    /**
     * @param mixed $model
     * @param null $header
     * @param null $footer
     * @param array $htmlOptions
     * @return string
     */
    public static function errorSummary($model, $header=null, $footer=null, $htmlOptions=array())
    {
        $content='';

        if(!is_array($model)) {
            $model = array($model);
        }

        if(isset($htmlOptions['firstError'])) {
            $firstError=$htmlOptions['firstError'];
            unset($htmlOptions['firstError']);
        } else {
            $firstError = false;
        }

        foreach($model as $m) {
            foreach($m->getErrors() as $errors) {
                foreach($errors as $error) {
                    if($error!='') {
                        $content.="<li>$error</li>\n";
                    }
                    if($firstError) {
                        break;
                    }
                }
            }
        }

        if($content!=='') {
            if ($header === null) {
                $header = Yii::t('yii','Please fix the following input errors:');
            }

            return self::callout($header, "\n<ul>\n{$content}</ul>" . $footer, 'danger', $htmlOptions);
        } else {
            return '';
        }
    }

    /**
     * @param null $header
     * @param null $message
     * @param string $type
     * @param array $htmlOptions
     * @return string
     */
    public static function callout($header = null, $message = null, $type = 'info', $htmlOptions = array())
    {
        if (!array_key_exists('class', $htmlOptions)) {
            $htmlOptions['class'] = '';
        }

        $htmlOptions['class'] = 'bs-callout bs-callout-' . $type . ' ' . $htmlOptions['class'];

        if ($header !== null) {
            $header = '<h4>' . $header . '</h4>';
        }
        if (strpos($message, '<p>') === false) {
            $message = '<p>' . $message . '</p>';
        }

        return self::tag('div', $htmlOptions, $header . "\n{$message}");
    }

    public static function stripText($text, $length = 0)
    {
        if (strlen($text) >= $length) {
            return $text;
        }

        return substr($text, 0, $length) . '...';
    }
}
