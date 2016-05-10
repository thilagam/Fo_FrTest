<?php /* Smarty version 2.6.19, created on 2015-09-18 15:10:36
         compiled from common/aboutus.phtml */ ?>
<section class="gray">
    <div class="container padding pull-top">
		<div class="center-block">
			<h1>Qui sommes-nous</h1>
		</div>
		<div class="page-inner">
		<h2>Qui sommes-nous</h2>
		
		<?php $_from = $this->_tpl_vars['teamlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['team_item']):
?>		
			<hr>
			<blockquote><?php echo $this->_tpl_vars['team_item']['name']; ?>
</blockquote>
			<p class="org muted"><?php echo $this->_tpl_vars['team_item']['designation']; ?>
</p>
			<?php echo $this->_tpl_vars['team_item']['description']; ?>

			
		<?php endforeach; endif; unset($_from); ?>	
			<hr>
			
		</div>
		<p>&nbsp;</p>		
	</div>   
</section>