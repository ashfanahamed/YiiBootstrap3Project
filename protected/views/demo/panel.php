<?php
/* @var $this DemoController */

$this->pageTitle = 'Panel demos';
?>
<link href="http://getbootstrap.com/assets/css/pygments-manni.css" rel="stylesheet">

<div class="row">
    <div class="col-md-4">
        <?php $this->beginWidget('BootstrapPanel', array('title' => 'Default panel')); ?>
            <p>This is a default panel</p>
        <?php $this->endWidget(); ?>
    </div>
    <div class="col-md-8">
        <pre class="prettyprint"><?php
            $html = <<<HTML
<div class="col-md-4">
    <?php \$this->beginWidget('BootstrapPanel', array('title' => 'Default panel')); ?>
        <p>This is a default panel</p>
    <?php \$this->endWidget(); ?>
</div>
HTML;
            echo BHtml::encode($html);
            ?></pre>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <?php $this->beginWidget('BootstrapPanel', array('title' => 'Info panel', 'htmlOptions' => array('class' => 'panel-info'))); ?>
        <p>This is an info panel</p>
        <?php $this->endWidget(); ?>
    </div>
    <div class="col-md-8">
        <pre class="prettyprint"><?php
            $html = <<<HTML
<div class="col-md-4">
    <?php \$this->beginWidget('BootstrapPanel', array('title' => 'Info panel', 'htmlOptions' => array('class' => 'panel-info'))); ?>
        <p>This is an info panel</p>
    <?php \$this->endWidget(); ?>
</div>
HTML;
            echo BHtml::encode($html);
            ?></pre>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <?php echo BHtml::callout('Danger callout', 'This is some information about something that went wrong.', 'danger'); ?>
    </div>
    <div class="col-md-8">
        <pre class="prettyprint"><?php
            $html = <<<HTML
<div class="col-md-4">
    <?php echo BHtml::callout('Danger callout', 'This is some information about something that went wrong.', 'danger'); ?>
</div>
HTML;
            echo BHtml::encode($html);
            ?></pre>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <?php echo BHtml::callout('Success callout', 'This is some information about something that went wrong.', 'success'); ?>
    </div>
    <div class="col-md-8">
        <pre class="prettyprint"><?php
            $html = <<<HTML
<div class="col-md-4">
    <?php echo BHtml::callout('Success callout', 'This is some information about something that went well.', 'success'); ?>
</div>
HTML;
            echo BHtml::encode($html);
            ?></pre>
    </div>
</div><script src="http://platform.twitter.com/widgets.js"></script>
<script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>