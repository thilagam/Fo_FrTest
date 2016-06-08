<?php /* Smarty version 2.6.19, created on 2016-04-26 14:01:00
         compiled from Contrib/popup_invoice_details.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'Contrib/popup_invoice_details.phtml', 25, false),array('modifier', 'date_format', 'Contrib/popup_invoice_details.phtml', 28, false),array('modifier', 'count', 'Contrib/popup_invoice_details.phtml', 52, false),array('modifier', 'capitalize', 'Contrib/popup_invoice_details.phtml', 55, false),array('modifier', 'zero_cut', 'Contrib/popup_invoice_details.phtml', 56, false),array('function', 'math', 'Contrib/popup_invoice_details.phtml', 71, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
function fnperiodFees(months,fees,totalInovoice)
{
	fees_period=parseFloat(fees);
	totalInovoice=parseFloat(totalInovoice);
	
	$("#period_fees").text(fees.replace(".",","));
	
	//total invoice calculation based on period time
	var FinalInvoice=(totalInovoice-fees_period).toFixed(2);	
	FinalInvoice=FinalInvoice.toString();
	$("#total_invoice").text(FinalInvoice.replace(".",","));
	
	var period_month=\'period_month\';
	cookieManager.deleteCookie(period_month);
	var period_fees_cookie=cookieManager.writeSessionCookie(period_month,months);		
	
}
</script>
'; ?>


<div class="row-fluid">
	<div class="span7">
	<h3>Facture edit-place #<?php echo ((is_array($_tmp=$this->_tpl_vars['invoiceId'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'ep_invoice_', '') : smarty_modifier_replace($_tmp, 'ep_invoice_', '')); ?>
</h3>
	Cr&eacute;e le 
	<?php if ($this->_tpl_vars['created_at']): ?>
		<?php echo ((is_array($_tmp=$this->_tpl_vars['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>

	<?php else: ?>
		<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>

	<?php endif; ?>	
	</div>
	<div class="span5">
		<div class="btn-group pull-right">
		<?php if ($this->_tpl_vars['status'] == 'refuse'): ?>
			<a class="btn btn-small" href="/contrib/regeneratepdf?invoiceid=<?php echo ((is_array($_tmp=$this->_tpl_vars['invoiceId'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'ep_invoice_', '') : smarty_modifier_replace($_tmp, 'ep_invoice_', '')); ?>
"><i class="icon icon-file"></i> Demander le paiement</a>
		<?php elseif ($this->_tpl_vars['invoiceId'] && $this->_tpl_vars['status'] == 'Paid'): ?>
			<a class="btn btn-small" href="/contrib/downloadinvoice?invoiceid=<?php echo ((is_array($_tmp=$this->_tpl_vars['invoiceId'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'ep_invoice_', '') : smarty_modifier_replace($_tmp, 'ep_invoice_', '')); ?>
"><i class="icon icon-file"></i> T&eacute;l&eacute;charger la facture</a>
		<?php elseif (! $this->_tpl_vars['status'] || $_GET['oldinvoice'] == 'yes'): ?>	
			<a class="btn btn-small" href="/contrib/generatepdf"><i class="icon icon-file"></i> Demander le paiement</a>		
		<?php endif; ?>	
		<a class="btn btn-small" href="/contrib/compose-mail?invoice_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['invoiceId'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'ep_invoice_', '') : smarty_modifier_replace($_tmp, 'ep_invoice_', '')); ?>
&senduser=111201092609847&obj=complaint"><i class="icon icon-exclamation-sign"></i> Faire une r&eacute;clamation</a>
		</div>
	</div>
</div>
<hr>
<div class="row-fluid">
	<div class="span8 offset2">
		<table class="table table-hover">
		<tbody>
		<?php $this->assign('total', 0.0); ?>
		<?php if (count($this->_tpl_vars['invoiceDetails']) > 0): ?>		
			<?php $_from = $this->_tpl_vars['invoiceDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['invoice'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['invoice']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['article']):
        $this->_foreach['invoice']['iteration']++;
?>
				<tr <?php if ($this->_tpl_vars['article']['invoice_path'] && $_GET['oldinvoice'] == 'yes'): ?> style="font-weight:bold" <?php endif; ?>>
					<td colspan="2"><?php echo $this->_tpl_vars['article']['AOTitle']; ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['article']['client_name'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
 - <?php echo $this->_tpl_vars['article']['article_created_date']; ?>
</td>
					<td><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &euro;</td>
				</tr>
			<?php $this->assign('total', $this->_tpl_vars['total']+$this->_tpl_vars['article']['price']); ?>
			<?php endforeach; endif; unset($_from); ?>
		<?php endif; ?>	
			
		<tr class="alert alert-info"><td colspan="2"><strong>Total prestations</strong></td><td><strong><?php echo ((is_array($_tmp=$this->_tpl_vars['totalInvoice'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &euro;</strong></td></tr>
		
		<?php if ($this->_tpl_vars['ep_contrib_profile_pay_info_type'] == 'ssn' || ( $this->_tpl_vars['ep_contrib_profile_pay_info_type'] == 'comp_num' && $this->_tpl_vars['ep_contrib_profile_vat_check'] == 'YES' )): ?>
			<tr><td colspan="3"><strong>Pr&eacute;compte : Montant vers&eacute; pour vous par Edit-place</strong></td></tr>
		<?php endif; ?>	
		<?php if ($this->_tpl_vars['ep_contrib_profile_pay_info_type'] == 'ssn'): ?>
			<tr>
				<td>Cotisation maladie veuvage</td>
				<td>Taux : 0,85%</td>
				<td><?php echo smarty_function_math(array('equation' => "(x* y)/100",'x' => $this->_tpl_vars['total'],'y' => 0.85,'assign' => 'tax1'), $this);?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['tax1'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &euro;</td>
			</tr>
			<tr>
				<td>CSG</td>
				<td>Taux : 7,36875%</td>
				<td><?php echo smarty_function_math(array('equation' => "(x* y)/100",'x' => $this->_tpl_vars['total'],'y' => 7.36875,'assign' => 'tax2'), $this);?>
	<?php echo ((is_array($_tmp=$this->_tpl_vars['tax2'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &euro;</td>
			</tr>
			<tr>
				<td>CRDS</td>
				<td>Taux : 0,49125%</td>
				<td><?php echo smarty_function_math(array('equation' => "(x* y)/100",'x' => $this->_tpl_vars['total'],'y' => 0.49125,'assign' => 'tax3'), $this);?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['tax3'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &euro;</td>
			</tr>
			<?php if ($this->_tpl_vars['formation_display'] == 'yes'): ?>
				<tr>
					<td>Formation professionnelle</td>
					<td>Taux : 0,35%</td>
					<td><?php echo smarty_function_math(array('equation' => "(x* y)/100",'x' => $this->_tpl_vars['total'],'y' => 0.35,'assign' => 'tax4'), $this);?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['tax4'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &euro;</td>
				</tr>
			<?php endif; ?>	
			<tr class="alert alert-danger">
				<td>&nbsp;</td>
				<td>A verser &agrave; l'AGESSA</td>
				<td><?php echo ((is_array($_tmp=$this->_tpl_vars['totalTax'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &euro;</td>
			</tr>
		<?php endif; ?>	
		<?php if ($this->_tpl_vars['ep_contrib_profile_pay_info_type'] == 'comp_num' && $this->_tpl_vars['ep_contrib_profile_vat_check'] == 'YES'): ?>
			<tr>
				<td>TVA</td>
				<?php if ($this->_tpl_vars['tva_new'] == 'no'): ?>
					<td>Taux : 19,6%</td>
					<td><?php echo smarty_function_math(array('equation' => "(x* y)/100",'x' => $this->_tpl_vars['total'],'y' => 19.6,'assign' => 'tax1'), $this);?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['tax1'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &euro;</td>
				<?php else: ?>	
					<td>Taux : 20%</td>
					<td><?php echo smarty_function_math(array('equation' => "(x* y)/100",'x' => $this->_tpl_vars['total'],'y' => 20,'assign' => 'tax1'), $this);?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['tax1'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &euro;</td>
				<?php endif; ?>	
			</tr>
			<tr class="alert alert-info">
				<td>&nbsp;</td>
				<td>A verser &agrave; l'AGESSA</td>
				<td><?php echo ((is_array($_tmp=$this->_tpl_vars['totalTax'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &euro;</td>
			</tr>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['ep_contrib_profile_pay_info_type'] == 'ep_admin'): ?>
			<tr>
				<td colspan="2">Frais de virement et de traitement Edit-place : <?php echo $this->_tpl_vars['ep_admin_fee_percentage']; ?>
%</td>
				<td><?php echo smarty_function_math(array('equation' => "(x* y)/100",'x' => $this->_tpl_vars['total'],'y' => $this->_tpl_vars['ep_admin_fee_percentage'],'assign' => 'tax1'), $this);?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['tax1'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &euro;</td>
				
			</tr>	
			<?php if (! $this->_tpl_vars['invoiceId']): ?>
			<tr><td colspan="3"><strong>Frais d'avance sur royalties*</strong></td></tr>			
			<?php endif; ?>
			<tr>
				<td>
					<?php if ($this->_tpl_vars['invoiceId']): ?>
						Frais d'avance : <?php echo $this->_tpl_vars['pay_later_percentage']; ?>
% (paiement le 15 <?php echo $this->_tpl_vars['pay_later_month_name']; ?>
).
					<?php else: ?>					
					<input type="radio" value="2" name="pay_later_month" <?php if ($this->_tpl_vars['pay_later_month'] == 2): ?> checked<?php endif; ?> onchange="fnperiodFees(this.value,'<?php echo smarty_function_math(array('equation' => '((x-z)* y)/100','x' => $this->_tpl_vars['total'],'z' => $this->_tpl_vars['totalTax'],'y' => 0,'format' => '%.2f'), $this);?>
','<?php echo smarty_function_math(array('equation' => '(x-y)','x' => $this->_tpl_vars['total'],'y' => $this->_tpl_vars['totalTax'],'format' => '%.2f'), $this);?>
');"> 0% pour un paiement le 15 <?php echo ((is_array($_tmp="last day of +2 month")) ? $this->_run_mod_handler('date_format', true, $_tmp, '%B') : smarty_modifier_date_format($_tmp, '%B')); ?>
<br>					
					<input type="radio" value="1" name="pay_later_month" <?php if ($this->_tpl_vars['pay_later_month'] == 1): ?> checked<?php endif; ?> onchange="fnperiodFees(this.value,'<?php echo smarty_function_math(array('equation' => '((x-z)* y)/100','x' => $this->_tpl_vars['total'],'z' => $this->_tpl_vars['totalTax'],'y' => 8,'format' => '%.2f'), $this);?>
','<?php echo smarty_function_math(array('equation' => '(x-y)','x' => $this->_tpl_vars['total'],'y' => $this->_tpl_vars['totalTax'],'format' => '%.2f'), $this);?>
');"> 8% pour un paiement le 15 <?php echo ((is_array($_tmp="last day of +1 month")) ? $this->_run_mod_handler('date_format', true, $_tmp, '%B') : smarty_modifier_date_format($_tmp, '%B')); ?>

					<?php endif; ?>
				<td>
				<td><span id="period_fees"><?php echo ((is_array($_tmp=$this->_tpl_vars['period_fees'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</span> &euro;</td>
				
				
			</tr>
			<?php endif; ?>			
			<tr>
				<td style="text-align:right" colspan="2"><h4>Montant vers&eacute; au r&eacute;dacteur</h4></td>
				<td><h4><span id="total_invoice"><?php echo ((is_array($_tmp=$this->_tpl_vars['FinaltotalInvoice'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</span> &euro;</h4></td>
			</tr>
			<?php if ($this->_tpl_vars['ep_contrib_profile_pay_info_type'] == 'ep_admin' && ! $this->_tpl_vars['invoiceId']): ?>
			<tr>
				<td colspan="3">* Nos clients nous paient en moyenne 3 mois apr&egrave;s la fin d&rsquo;une prestation (articles livr&eacute;s et valid&eacute;s)</td>				
			</tr>
			<?php endif; ?>
		</tbody>
		</table>
		
		<?php if ($this->_tpl_vars['status'] == 'refuse'): ?>
		<p>
			<a href="/contrib/regeneratepdf?invoiceid=<?php echo ((is_array($_tmp=$this->_tpl_vars['invoiceId'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'ep_invoice_', '') : smarty_modifier_replace($_tmp, 'ep_invoice_', '')); ?>
" class="btn btn-primary pull-right">Demander le paiement</a>
		</p>
		<?php elseif (! $this->_tpl_vars['invoiceId'] || $_GET['oldinvoice'] == 'yes'): ?>
		<p>
			<a href="/contrib/generatepdf" class="btn btn-primary pull-right">Demander le paiement</a>
		</p>
		<?php endif; ?>
	</div>
</div>
<a class="pull-right btn btn-small disabled anchor-top scroll" href="#brand"><i class="icon-arrow-up"></i></a>
<?php echo '
<script>
 	$(".scroll").click(function(event){		
		event.preventDefault();
		$(\'html,body\').animate({scrollTop:$(this.hash).offset().top}, 500);
	});
</script>	
'; ?>