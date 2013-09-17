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
\$form = \$this->beginWidget('BootstrapForm', array(
    'id' => '".$this->class2id($this->modelClass)."-form',
    'enableAjaxValidation'=>false,
    'htmlOptions' => array('class' => 'well'),
    'action' => \$this->createUrl(\$model->isNewRecord ? '".lcfirst($this->modelClass)."/new' : '".lcfirst($this->modelClass)."/edit', \$_GET)
));

?>
    <?php \$this->errorSummary = \$form->errorSummary(\$model); ?>
    <p class=\"note\">A csillaggal <span class=\"required\">*</span> megjelölt mezők kitöltése kötelező.</p>
\n";

foreach($this->tableSchema->columns as $column)
{
    if (in_array($column->name, array('id', 'password', 'created_at', 'updated_at'))) {
        continue;
    }

    if (in_array($column->name, array('active', 'deleted'))) {
        echo "    <?php echo \$form->checkBoxRow(\$model,'{$column->name}'); ?>\n";
    } else {
        echo "    <?php echo \$form->textFieldRow(\$model,'{$column->name}'); ?>\n";
    }
}

echo "    <?php echo \$form->submitButtonRow(\$model->isNewRecord ? 'Felvétel' : 'Módosítás'); ?>\n\n";
echo "<?php \$this->endWidget(); ?>\n";
