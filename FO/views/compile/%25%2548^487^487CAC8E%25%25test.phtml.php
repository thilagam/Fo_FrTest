<?php /* Smarty version 2.6.19, created on 2014-08-20 09:14:16
         compiled from test/test.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', 'test/test.phtml', 10, false),array('modifier', 'date_format', 'test/test.phtml', 64, false),)), $this); ?>
<?php echo '
<style>
td{text-align:center;}
</style>
'; ?>
	<form action="" method="post" enctype="mulitpart/form-data">				<input type="file" multiple="" name="files[]">		<div class="controls">			<div data-provides="fileupload" class="span12 fileupload fileupload-new">				<input type="hidden" value="" name="">				<span class="btn btn-file span4" style="margin-left:0px">					<span class="fileupload-new"><img src="/BO/theme/gebo/img/gCons/pin.png" alt="" /> Upload files</span>					<span class="fileupload-exists">Change</span>					<input type="file" name="quote_documents" id="quote_documents" class="validate[required]" />				 </span>				<span class="fileupload-preview"></span>				<a style="float: none" data-dismiss="fileupload" class="close fileupload-exists" href="#">&times;</a>				<div id="file_name"></div>										</div>		</div>	</form>			
<div class="container">
<?php $_from = $this->_tpl_vars['req_users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['typeusers'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['typeusers']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key1'] => $this->_tpl_vars['item1']):
        $this->_foreach['typeusers']['iteration']++;
?>
	<?php if (($this->_foreach['typeusers']['iteration'] <= 1)): ?>
	<ul class="nav nav-tabs">
	<li class="active"><a href="#<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
" data-toggle="tab"><?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</a></li>
	<?php else: ?>
	<li><a href="#<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
" data-toggle="tab"><?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</a></li>
	<?php endif; ?>		
	<?php if (($this->_foreach['typeusers']['iteration'] == $this->_foreach['typeusers']['total'])): ?>
	</ul>
	<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php $_from = $this->_tpl_vars['req_users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['typeusers'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['typeusers']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key1'] => $this->_tpl_vars['item1']):
        $this->_foreach['typeusers']['iteration']++;
?>
			<?php if (($this->_foreach['typeusers']['iteration'] <= 1)): ?>
		<div class="tab-content">
			<div class="tab-pane active" id="<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
">
			<?php else: ?>
			<div class="tab-pane" id="<?php echo ((is_array($_tmp=$this->_tpl_vars['key1'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
">
			<?php endif; ?>
			<table class="table table-hover">
			<thead>
				<tr>
					<!-- <th  width="3%">Initial</th> -->
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Type</th>
					<!-- <th  width="10%">Address</th>
					<th  width="5%">City</th>
					<th  width="5%">State</th>
					<th  width="3%">Zipcode</th>
					<th  width="10%">Phone Number</th> 
					<th  width="9%">Created At</th> 
					<th  width="5%">Type</th> -->
					<?php if ($this->_tpl_vars['key1'] == 'contributor'): ?>
					<th>Profile Type</th> 
					<th>Corrector</th> 
					<th>Corrector Type</th> 
					<th>Mother Language</th> 
					<th>Other Language</th> 
					<th>Category</th> 
					<th>Other Category</th> 
					<?php endif; ?>
					<th>Status</th>
				</tr>
			</thead>
			<?php $_from = $this->_tpl_vars['item1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['users'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['users']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key2'] => $this->_tpl_vars['item']):
        $this->_foreach['users']['iteration']++;
?>
			<tr>
				<!-- <td><?php echo ((is_array($_tmp=$this->_tpl_vars['item']->initial)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</td> -->
				<td><?php echo $this->_tpl_vars['item']->first_name; ?>
</td>
				<td><?php echo $this->_tpl_vars['item']->last_name; ?>
</td>
				<td><?php echo $this->_tpl_vars['item']->email; ?>
</td>
				<td><?php echo $this->_tpl_vars['item']->type; ?>
</td>
				<!-- <td><?php echo $this->_tpl_vars['item']->address; ?>
</td>
				<td><?php echo $this->_tpl_vars['item']->city; ?>
</td>
				<td><?php echo $this->_tpl_vars['item']->state; ?>
</td>
				<td><?php echo $this->_tpl_vars['item']->zipcode; ?>
</td>
				<td><?php echo $this->_tpl_vars['item']->phone_number; ?>
</td>
				<td><?php echo ((is_array($_tmp=$this->_tpl_vars['item']->created_at)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%D") : smarty_modifier_date_format($_tmp, "%D")); ?>
</td> 
				<td><?php echo $this->_tpl_vars['item']->type; ?>
</td> -->
				<?php if ($this->_tpl_vars['key1'] == 'contributor'): ?>
				<td><?php echo $this->_tpl_vars['item']->profile_type; ?>
</td> 
				<td><?php echo $this->_tpl_vars['item']->corrector; ?>
</td> 
				<td><?php echo $this->_tpl_vars['item']->profile_type2; ?>
</td> 
				<td><?php echo $this->_tpl_vars['item']->language; ?>
</td> 
				<td><?php $_from = $this->_tpl_vars['item']->language_more; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['languagemore'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['languagemore']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key3'] => $this->_tpl_vars['item2']):
        $this->_foreach['languagemore']['iteration']++;
?><?php echo $this->_tpl_vars['key3']; ?>
(<?php echo $this->_tpl_vars['item2']; ?>
%)&nbsp;<?php endforeach; endif; unset($_from); ?></td> 
				<td><?php echo $this->_tpl_vars['item']->favourite_category; ?>
</td> 
				<td><?php $_from = $this->_tpl_vars['item']->category_more; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['catmore'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['catmore']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key4'] => $this->_tpl_vars['item3']):
        $this->_foreach['catmore']['iteration']++;
?><?php echo $this->_tpl_vars['key4']; ?>
(<?php echo $this->_tpl_vars['item3']; ?>
%)&nbsp;<?php endforeach; endif; unset($_from); ?></td> 
				<?php endif; ?>
				<td><?php echo $this->_tpl_vars['item']->status; ?>
</td>
			</tr>
			<tr height=5></tr>
			<?php if (($this->_foreach['users']['iteration'] == $this->_foreach['users']['total'])): ?>
			<tr height=10></tr>
			</table>
			</div>
			<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
			<?php if (($this->_foreach['typeusers']['iteration'] == $this->_foreach['typeusers']['total'])): ?>
		</div>
	</div>
<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	</div>
	
<?php echo '
<script>
	    $(\'#myTab a\').click(function (e) {
    e.preventDefault();
    $(this).tab(\'show\');
    })
</script>
'; ?>
