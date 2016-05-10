<?php /* Smarty version 2.6.19, created on 2015-07-28 12:42:51
         compiled from Contrib/pattern/pattern_popup.phtml */ ?>
<?php 

ini_set('default_charset', 'UTF-8');
mb_internal_encoding('UTF-8');
 ?>
<?php $_from = $this->_tpl_vars['mainList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['frame']):
?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['frame']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endforeach; endif; unset($_from); ?>	