<?php /* Smarty version 2.6.19, created on 2014-09-29 14:01:47
         compiled from Client/history.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Client/history.phtml', 20, false),array('modifier', 'stripslashes', 'Client/history.phtml', 28, false),array('modifier', 'utf8_decode', 'Client/history.phtml', 28, false),)), $this); ?>
<?php echo '
<script>
	$(document).ready(function(){
		$("#aohistory a").removeAttr("href");
		if($("#namepermission").val()=="first_name" || $("#namepermission").val()=="last_name" || $("#namepermission").val()=="anonymous")
		{	
			$(".writer").html("<b>rédacteur</b>");
			$(".corrector").html("<b>correcteur</b>");
			//$(".span12").find("a[href^=\'/user/contributor-edit\']").html("<b>Le rédacteur</b>");
		}
	});
</script>

<style>
	a:hover{text-decoration:none ! important;}
</style>
'; ?>

<div class="row-fluid">
	<div class="span12">
		<?php if (count($this->_tpl_vars['aoHistory']) > 0): ?>
			<table class="table table-hover">
				<tbody>
					<?php $_from = $this->_tpl_vars['aoHistory']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['historyDetails'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['historyDetails']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['details']):
        $this->_foreach['historyDetails']['iteration']++;
?> 	
						<?php if ($this->_tpl_vars['details']['show'] == 'yes'): ?> 
						<tr>
							<td><?php echo $this->_tpl_vars['details']['action_at']; ?>
</td>
							<?php if ($this->_tpl_vars['details']['action'] == 'Corrector Validation'): ?>
								<td style="text-align:left"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['details']['action_sentence'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)))) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
</td>
							<?php else: ?>
								<td><?php echo ((is_array($_tmp=$this->_tpl_vars['details']['action_sentence'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</td>
							<?php endif; ?>	
						</tr>
						<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
				</tbody>	
			</table>
			<input type="hidden" name="namepermission" id="namepermission" value="<?php echo $this->_tpl_vars['namepermission']; ?>
" />
		<?php endif; ?>
	</div>
</div>