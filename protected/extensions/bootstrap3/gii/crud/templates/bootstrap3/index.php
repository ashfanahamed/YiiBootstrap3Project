<?php
/**
 * The following variables are available in this template:
 * @var $this CrudCode
 */

$label = $this->pluralize($this->class2name($this->modelClass));

?>
<?php echo "<?php\n"; ?>
/**
 * @var $this <?php echo $this->getControllerClass() . "\n"; ?>
 * @var $model <?php echo $this->getModelClass() . "\n"; ?>
 */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
        return false;
    });
");

$searchFormDisplay = array_key_exists('<?php echo $this->class2name($this->modelClass); ?>', $_GET) ? 'block' : 'none';
$this->pageTitle = '<?php echo $label; ?>';
?>
<?php
echo "
<a href=\"<?php echo \$this->createUrl('{$this->controller}/new'); ?>\" >
    <?php echo BHtml::button('Új {$label} felvétele', array()); ?>
</a>
<br /><br />

<?php echo CHtml::link('Kereső','#',array('class' => 'search-button')); ?>
<div class=\"search-form\" style=\"display: <?php echo \$searchFormDisplay; ?>\" >
    <?php \$this->renderPartial('_search',array('model' => \$model)); ?>
</div>
<br /><br />

<?php \$this->widget('BootstrapGridView', array(
    'id' => '{$this->controller}-grid',
    'dataProvider' => \$model->search(),
    'filter' => \$model,
    'filterPosition' => 'none',
    'template' => \"{items}\\n{pager}\",
    'columns' => array(";

foreach($this->tableSchema->columns as $column) {
    switch ($column->name) {
        case 'active':
            echo "
        array(
            'name' => 'active',
            'value' => '\$data->active ? \"Aktív\" : \"Nem aktív\"'
        ),";
            break;

        case 'deleted':
            echo "
        array(
            'name' => 'deleted',
            'value' => '\$data->deleted ? \"Törölt\" : \"Nem törölt\"'
        ),";
            break;

        case 'id':
        case 'password':
        case 'created_at':
        case 'updated_at':
            break;

        default:
            echo "
        '{$column->name}',";
    }
}

echo "
        array(
            'class' => 'BootstrapButtonColumn',
            'htmlOptions' => array('style' => 'width: 40px; text-align: center;'),
            'template' => '{update}' /*. ' {delete}'*/,
            'buttons' => array
            (
                'update' => array
                (
                    'label' => 'Szerkesztés',
                    'url' => 'Yii::app()->createUrl(\"{$this->controller}/edit\", array(\"id\" => \$data->id))',
                ),
                /*
                'delete' => array
                (
                    'label' => 'Törlés',
                    'url' => 'Yii::app()->createUrl(\"{$this->controller}/delete\", array(\"id\" => \$data->id))',
                ),
                */
            ),
        ),
    ),
));
";
