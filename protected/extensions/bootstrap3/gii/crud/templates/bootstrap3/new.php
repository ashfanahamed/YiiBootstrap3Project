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
 */
<?php
$label = $this->pluralize($this->class2name($this->modelClass));
echo "
\$this->pageTitle = '{$label} - Új {$this->modelClass} létrehozása';
echo \$this->renderPartial('_form', array('model' => \$model));
";
