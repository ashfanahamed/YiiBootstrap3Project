<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle = 'Error ' . $code;

?>

<div class="error">
    <?php echo BHtml::callout(null, $message, 'danger'); ?>
</div>