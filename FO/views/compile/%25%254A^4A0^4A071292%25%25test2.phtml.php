<?php /* Smarty version 2.6.19, created on 2014-07-28 12:20:51
         compiled from test/test2.phtml */ ?>
<!-- <?php echo '
<style>
td{text-align:center;}
</style>
'; ?>

<div class="container">
<table class="table table-hover">		
<?php $_from = $this->_tpl_vars['req_users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['typeusers'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['typeusers']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key1'] => $this->_tpl_vars['item']):
        $this->_foreach['typeusers']['iteration']++;
?>
			<?php if (($this->_foreach['typeusers']['iteration'] <= 1)): ?>
			<thead>
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Type</th>
					<th>Status</th>
				</tr>
			</thead>
			<?php endif; ?>
			<tr>
				<td><?php echo $this->_tpl_vars['item']->first_name; ?>
</td>
				<td><?php echo $this->_tpl_vars['item']->last_name; ?>
</td>
				<td><?php echo $this->_tpl_vars['item']->email; ?>
</td>
				<td><?php echo $this->_tpl_vars['item']->type; ?>
</td>
				<td><?php echo $this->_tpl_vars['item']->status; ?>
</td>
			</tr>
			<tr height=5></tr>
<?php endforeach; endif; unset($_from); ?>
</table>	
</div>
	
<?php echo '
<script>
	    $(\'#myTab a\').click(function (e) {
    e.preventDefault();
    $(this).tab(\'show\');
    })
</script>
'; ?>
 --><div class="container">	<img class="flag flag-fr" src="/FO/images/shim.gif"/>	<img class="flag flag-us" src="/FO/images/shim.gif"/>	<img class="flag flag-uk" src="/FO/images/shim.gif"/>	<img class="flag flag-sp" src="/FO/images/shim.gif"/>	<img class="flag flag-de" src="/FO/images/shim.gif"/>	<img class="flag flag-it" src="/FO/images/shim.gif"/>	<img class="flag flag-dn" src="/FO/images/shim.gif"/>	<img class="flag flag-fl"  src="/FO/images/shim.gif"/>	<img class="flag flag-po"  src="/FO/images/shim.gif"/>	<img class="flag flag-nl"  src="/FO/images/shim.gif"/>	<img class="flag flag-nr"  src="/FO/images/shim.gif"/>	<img class="flag flag-su"  src="/FO/images/shim.gif"/>	<img class="flag flag-ru"  src="/FO/images/shim.gif"/>	<img class="flag flag-pol" src="/FO/images/shim.gif"/>	<img class="flag flag-ch"  src="/FO/images/shim.gif"/>	<img class="flag flag-jap" src="/FO/images/shim.gif"/>	<img class="flag flag-cor" src="/FO/images/shim.gif"/>	<img class="flag flag-ar" src="/FO/images/shim.gif"/>	<img class="flag flag-afr" src="/FO/images/shim.gif"/>	<img class="flag flag-alb" src="/FO/images/shim.gif"/>	<img class="flag flag-alms" src="/FO/images/shim.gif"/>	<img class="flag flag-alma" src="/FO/images/shim.gif"/>	<img class="flag flag-angaus" src="/FO/images/shim.gif"/>	<img class="flag flag-arb" src="/FO/images/shim.gif"/>	<img class="flag flag-blg" src="/FO/images/shim.gif"/>	<img class="flag flag-cat" src="/FO/images/shim.gif"/>	<img class="flag flag-chn" src="/FO/images/shim.gif"/>	<img class="flag flag-crt" src="/FO/images/shim.gif"/>	<img class="flag flag-espa" src="/FO/images/shim.gif"/>	<img class="flag flag-espm" src="/FO/images/shim.gif" />	<img class="flag flag-est" src="/FO/images/shim.gif"/>	<img class="flag flag-flp" src="/FO/images/shim.gif" />	<img class="flag flag-frs" src="/FO/images/shim.gif" />	<img class="flag flag-frb" src="/FO/images/shim.gif" />	<img class="flag flag-grec" src="/FO/images/shim.gif" />	<img class="flag flag-hbr" src="/FO/images/shim.gif" />	<img class="flag flag-hngr" src="/FO/images/shim.gif"/>	<img class="flag flag-hindi" src="/FO/images/shim.gif"/>	<img class="flag flag-ind" src="/FO/images/shim.gif"/>	<img class="flag flag-isl" src="/FO/images/shim.gif"/>	<img class="flag flag-kmr" src="/FO/images/shim.gif"/>	<img class="flag flag-krd" src="/FO/images/shim.gif"/>	<img class="flag flag-ltn" src="/FO/images/shim.gif"/>	<img class="flag flag-ltin" src="/FO/images/shim.gif"/>	<img class="flag flag-mal" src="/FO/images/shim.gif"/>	<img class="flag flag-nrld" src="/FO/images/shim.gif"/>	<img class="flag flag-prsn" src="/FO/images/shim.gif"/>	<img class="flag flag-ptsb" src="/FO/images/shim.gif"/>	<img class="flag flag-qtr" src="/FO/images/shim.gif"/>	<img class="flag flag-rmn" src="/FO/images/shim.gif"/>	<img class="flag flag-srb" src="/FO/images/shim.gif"/>	<img class="flag flag-svq" src="/FO/images/shim.gif"/>	<img class="flag flag-sml" src="/FO/images/shim.gif"/>	<img class="flag flag-swhl" src="/FO/images/shim.gif"/>	<img class="flag flag-tch" src="/FO/images/shim.gif"/>	<img class="flag flag-turc" src="/FO/images/shim.gif"/>	<img class="flag flag-ukrn" src="/FO/images/shim.gif"/>	<img class="flag flag-vtnm" src="/FO/images/shim.gif"/>	<img class="flag flag-espco"  src="/FO/images/shim.gif"/>	<img class="flag flag-espp"  src="/FO/images/shim.gif"/>	<img class="flag flag-espc"  src="/FO/images/shim.gif"/>	<img class="flag flag-espv"  src="/FO/images/shim.gif"/>	<img class="flag flag-sl" src="/FO/images/shim.gif"/>	<img class="flag flag-bsn" src="/FO/images/shim.gif"/>	<img class="flag flag-arm" src="/FO/images/shim.gif"/>	<img class="flag flag-grg" src="/FO/images/shim.gif"/>	<img class="flag flag-azr" src="/FO/images/shim.gif"/>	<img class="flag flag-mng" src="/FO/images/shim.gif"/>	<img class="flag flag-ozk" src="/FO/images/shim.gif"/>	<img class="flag flag-ml" src="/FO/images/shim.gif"/></div>