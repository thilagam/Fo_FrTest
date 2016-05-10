<?php /* Smarty version 2.6.19, created on 2015-07-30 11:25:13
         compiled from common/pattern/ftv_pattern.phtml */ ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->_tpl_vars['page_title']; ?>
</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $this->_tpl_vars['meta_desc']; ?>
">
    <meta name="author" content="">
	<link rel="shortcut icon" type="image/x-icon" href="/FO/favicon.ico" />
    <?php $_from = $this->_tpl_vars['javascriptList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['javascript']):
?>
    <script language="JavaScript" type="text/javascript" src="/FO/script/<?php echo $this->_tpl_vars['javascript']; ?>
"></script>
    <?php endforeach; endif; unset($_from); ?>

    <?php $_from = $this->_tpl_vars['cssList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['css']):
?>
    <link href="/FO/css/<?php echo $this->_tpl_vars['css']; ?>
" type="text/css" rel="stylesheet" />
    <?php endforeach; endif; unset($_from); ?>
    <!-- Le styles -->

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

   <link href="/FO/css/bootstrap3/bootstrap.min.css" rel="stylesheet">
    <link href='/FO/css/common/googleapi_fonts.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/FO/css/bootstrap3/animate.min.css">
    <link href="/FO/css/bootstrap3/ep-theme.css" rel="stylesheet" type="text/css" />
    <link href="/FO/css/common/custom.css" rel="stylesheet" type="text/css" />

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="/FO/script/common/jquery.min.js"></script>
    <script src="/FO/script/bootstrap3/bootstrap.min.js"></script>
    <script src="/FO/script/bootstrap3/wow.min.js"></script>
    <script src="/FO/script/common/ep.js"></script>
    <script src="/FO/script/common/jquery.slimscroll.js"></script>
    <script src="/FO/script/common/login_validation.js"></script>
    <script src="/FO/script/common/jquery.validate.min.js"></script>
    <script src="/FO/script/bootstrap3/icheck.min.js"></script>



    <!--<link href="/FO/css/common/ep.css" rel="stylesheet" type="text/css" />
    <link href='/FO/css/common/googleapi_fonts.css' rel='stylesheet' type='text/css'>
    <link href="/FO/css/common/custom.css" rel="stylesheet" type="text/css" />
    <script src="/FO/script/common/jquery.js"></script>
    <link href="/FO/css/common/jquery-ui-1.9.2.custom.css" rel="stylesheet" type="text/css" />
    <script src="/FO/script/common/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="/FO/script/common/bootstrap.min.js"></script>
    <script src="/FO/script/common/jquery.slimscroll.js"></script>
    <script src="/FO/script/common/login_validation.js"></script>
    <script src="/FO/script/common/jquery.validate.min.js"></script>
-->
</head>

<body >
<?php $_from = $this->_tpl_vars['headerList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['frame']):
?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['frame']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endforeach; endif; unset($_from); ?>

<?php $_from = $this->_tpl_vars['mainList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['frame']):
?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['frame']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endforeach; endif; unset($_from); ?>

<?php $_from = $this->_tpl_vars['footerList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['frame']):
?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['frame']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endforeach; endif; unset($_from); ?>

	<script>
		// tooltip activation
		$("[rel=tooltip]").tooltip();
		$("[rel=popover]").popover();
	</script>
</body>
</html>
