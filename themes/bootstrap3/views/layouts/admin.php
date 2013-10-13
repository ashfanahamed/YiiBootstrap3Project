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

    <title><?php echo CHtml::encode(Yii::app()->name . ' - ' . $this->pageTitle); ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- Styles for Boostrap3 template -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap3_ext.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/admin.css" rel="stylesheet">

    <!-- Custom styles for your site -->
    <link href="<?php echo Yii::app()->baseUrl; ?>/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="../../assets/js/html5shiv.js"></script>
    <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand white" href="<?php echo $this->createUrl('/'); ?>">
                    <?php echo CHtml::encode(Yii::app()->name); ?>
                </a>
            </div>

            <div class="collapse navbar-collapse">
                <?php $action = Yii::app()->controller->action->id; ?>
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Forms <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $this->createUrl('adminDemo/horizontalForm'); ?>">Horizontal Form</a></li>
                            <li><a href="<?php echo $this->createUrl('adminDemo/loginForm'); ?>">Login Form</a></li>
                        </ul>
                    </li>
                    <li<?php if ('gridView' == $action) echo ' class="active"'; ?>><a href="<?php echo $this->createUrl('adminDemo/gridView'); ?>">Grid View</a></li>
                    <li<?php if ('panel' == $action)    echo ' class="active"'; ?>><a href="<?php echo $this->createUrl('adminDemo/panel'); ?>">Panels and Callouts</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle white" data-toggle="dropdown" >Signed in: <strong><?php echo Yii::app()->user->name; ?></strong> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $this->createUrl('site/logout'); ?>">Sign out</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>

    <div class="container">

        <div class="admin-template">
            <h1 style="margin-bottom: 20px; " ><?php echo $this->pageTitle; ?></h1>

            <?php echo $this->errorSummary; ?>
            <?php if (Yii::app()->user->hasFlash('success')): ?>
                <?php echo BHtml::callout(null, Yii::app()->user->getFlash('success'), 'success'); ?>
            <?php endif; ?>
            <?php echo $content; ?>
        </div>

    </div>

    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery/jquery-2.0.0.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap/bootstrap.min.js"></script>
</body>
</html>

