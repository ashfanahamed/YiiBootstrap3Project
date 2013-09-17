<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/**
 * @var $this <?php echo $this->getControllerClass() . "\n"; ?>
 * @var $model <?php echo $this->getModelClass() . "\n"; ?>
 * @var $form CActiveForm
 */
<?php echo "
\$form = \$this->beginWidget('BootstrapSearchForm', array(
    'id' => 'searchForm',
    'htmlOptions' => array('class' => 'well', 'style' => 'padding-left: 5px; padding-bottom: 5px; '),
    'action' => Yii::app()->createUrl(\$this->route),
    'method' => 'get',
));

?>
    <div class=\"row\">";

$counter = 0;
foreach($this->tableSchema->columns as $column) {
    if (in_array($column->name, array('id', 'password', 'created_at', 'updated_at'))) {
        continue;
    }

    $counter++;
    if (in_array($column->name, array('active', 'deleted'))) {
        echo "
        <div class=\"col-xs-12 col-md-6\">
            <?php echo \$form->checkBoxRow(\$model, '{$column->name}'); ?>
        </div>";
    } else {
        echo "
        <div class=\"col-xs-12 col-md-6\">
            <?php echo \$form->textFieldRow(\$model, '{$column->name}'); ?>
        </div>";
    }

    if (0 == $counter % 2) {
        echo '
    </div>

    <div class="row">';
    }
}

echo "
    </div>

    <div class=\"row\">
        <div class=\"col-xs-12 col-md-6\">
            <?php echo \$form->submitButtonRow('Keresés'); ?>
        </div>
    </div>

<?php \$this->endWidget(); ?>
";
