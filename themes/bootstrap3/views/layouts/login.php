<?php

/**
 * @var $this Controller
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="ico/favicon.ico">

    <title><?php echo CHtml::encode($this->pageTitle);?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- Styles for Boostrap3 template -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap3_ext.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/login.css" rel="stylesheet">

    <!-- Custom styles for your site
    <link href="<?php echo Yii::app()->baseUrl; ?>/css/style.css" rel="stylesheet"> -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="../../assets/js/html5shiv.js"></script>
    <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="container">
        <?php echo $content; ?>
    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
</body>
</html>

