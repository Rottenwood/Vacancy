<!DOCTYPE html>
<html>
<head>
    <title><?php $view['slots']->output('title', 'Vacancy App') ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- jQuery -->
    <script type="text/javascript" src="<?php echo $view['assets']->getUrl('assets/js/jquery.min.js') ?>"></script>
    <!-- Styles -->
    <link type="text/css" href="<?php echo $view['assets']->getUrl('assets/css/css-reset.css') ?>" rel="stylesheet"/>
    <link type="text/css" href="<?php echo $view['assets']->getUrl('assets/css/style.css') ?>" rel="stylesheet"/>
    <link type="text/css" href="<?php echo $view['assets']->getUrl('assets/css/bootstrap.min.css') ?>" rel="stylesheet"/>
    <link type="text/css" href="<?php echo $view['assets']->getUrl('assets/css/bootstrap-theme.min.css') ?>" rel="stylesheet"/>
    <!-- Scripts -->
    <script type="text/javascript" src="<?php echo $view['assets']->getUrl('assets/js/script.js') ?>"></script>
    <script type="text/javascript" src="<?php echo $view['assets']->getUrl('assets/js/bootstrap.js') ?>"></script>
</head>
<body>
<?php $view['slots']->output('_content') ?>

</body>
</html>
