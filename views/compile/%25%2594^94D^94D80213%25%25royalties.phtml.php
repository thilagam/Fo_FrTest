<?php /* Smarty version 2.6.19, created on 2016-04-26 13:20:44
         compiled from Contrib/royalties.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'zero_cut', 'Contrib/royalties.phtml', 68, false),array('modifier', 'date_format', 'Contrib/royalties.phtml', 79, false),array('modifier', 'count', 'Contrib/royalties.phtml', 88, false),array('modifier', 'capitalize', 'Contrib/royalties.phtml', 93, false),array('modifier', 'replace', 'Contrib/royalties.phtml', 135, false),)), $this); ?>
<?php echo '
<style type="text/css">
.profilehead-mod .stat .num-large
{
color:#333;
}
</style>
<script type="text/javascript">
	$("#menu_royalties").addClass("active");
	var unpaidCount='; ?>
<?php echo $this->_tpl_vars['unpaidCount']; ?>
<?php echo ';

	/*function to check whether payment info added or not in profile
	if not then redirect to profile page to validate payment info
	if yes will show pop up with article details */
	
$(function(){	



	$("#invoicedetails").click(function(){
		
		$.get(\'/contrib/check-payment-info\', function(data) {			
			if(data==\'YES\')
			{
				if(unpaidCount>0)
				{
					$("#confirmDiv").confirmModal({	
						heading: \'Confirm\',
						body: "Les missions pour lesquelles vous demandez le paiement s\'ajouteront au bon de commande d&eacute;j&agrave; g&eacute;n&eacute;r&eacute; lors de votre premi&egrave;re demande ce mois-ci. La date de paiement que vous choisissez pour ce second paiement sera prise en compte pour toutes les missions. Souhaitez-vous valider cette demande&nbsp;?",
						callback: function () {				
							$("#billing-ajax").modal({
								remote: "/contrib/invoicedetails?oldinvoice=yes"
							});								
							//window.location="/contrib/generatepdf/";
						}	
					});
				}
				else{
					$("#billing-ajax").modal({
						remote: "/contrib/invoicedetails"
					});	
				}
				
			}
			else
			{
				window.location.href=\'/contrib/modify-profile?profile=invoice#pay_info_type\';
			}
			
		});			
	});
});	
	
</script>
'; ?>
	

<div class="container">
	<!-- start, get contributor status -->
	<section id="status">
		<div class="row-fluid">
			<div class="profilehead-mod">
				<div class="span6">
					<h1>Mes royalties</h1>
				</div>

				<div class="span3 stat">
					<p>En attente de paiement</p>
					<p class="num-large"><?php echo ((is_array($_tmp=$this->_tpl_vars['pending_royalties'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &euro;</p>
				</div>
				<div class="span3 stat"><p>Total royalties</p><p class="num-large"><a href="#"><?php echo ((is_array($_tmp=$this->_tpl_vars['total_royalties'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &euro;</a></p></div>
			</div>
		</div>
	</section>
	 <!-- end, contributor status --> 
    
	<section id="royalties-not-paid">
		<div class="row-fluid">
			<div class="mod">
				<div class="muted pull-right">Mise &agrave; jour au <?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</div>
				<h4>mes missions effectu&eacute;es non pay&eacute;es <i class="icon icon-question-sign" rel="tooltip" data-original-title="Une seule facture est g&eacute;n&eacute;r&eacute;e pour toutes les  missions effectu&eacute;es entre deux demandes de paiement. Le d&eacute;lai de paiement (avec  ou sans avances) court &agrave; partir du moment o&ugrave; vous avez effectu&eacute; votre premi&egrave;re  demande (min. <?php echo $this->_tpl_vars['ep_contrib_min_amount']; ?>
 euros)."></i> </h4>
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Date</th><th>Mission effectu&eacute;e</th><th>Tarif</th>
						</tr>
					</thead>
					<?php $this->assign('total', 0.0); ?>
					<?php if (count($this->_tpl_vars['unpaidRoyalties']) > 0): ?>		
						<?php $_from = $this->_tpl_vars['unpaidRoyalties']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['invoice'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['invoice']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['article']):
        $this->_foreach['invoice']['iteration']++;
?>
							<tr>
								<td><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['royalty_added_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</td>
								<td><a href="/contrib/mission-published?article_id=<?php echo $this->_tpl_vars['article']['articleId']; ?>
" target="_invoice">
								<?php echo $this->_tpl_vars['article']['AOTitle']; ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['article']['client_name'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
 - <?php echo $this->_tpl_vars['article']['article_created_date']; ?>

								</a></td>
								<td><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &euro;</td>
							</tr>
						<?php $this->assign('total', $this->_tpl_vars['total']+$this->_tpl_vars['article']['price']); ?>
						<?php endforeach; endif; unset($_from); ?>
						
					<?php else: ?>
						
					<?php endif; ?>					
				</table>
				<?php if (count($this->_tpl_vars['unpaidRoyalties']) > 0): ?>
					<p class="alert" style="text-align: right"><strong>Montant total &agrave; r&eacute;gler : <?php echo $this->_tpl_vars['unpaidTotal']; ?>
 &euro;</strong></p>
				<?php endif; ?>					
				<?php if ($this->_tpl_vars['unpaidTotal'] >= $this->_tpl_vars['ep_contrib_min_amount']): ?>
					<p style="margin:-18px 0px 30px 0px;padding:8px 35px 8px 14px;">
						<!--<a href="/contrib/invoicedetails" role="button" data-toggle="modal" data-target="#billing-ajax" class="btn btn-primary pull-right">Demander le paiement</a>-->
						<button class="btn btn-primary pull-right" id="invoicedetails" name="invoicedetails" type="button">Demander le paiement</button>						
					</p>
				<?php else: ?>
					<p class="alert" style="text-align: right"><strong>Vous pouvez demander le paiement &agrave; partir de <?php echo $this->_tpl_vars['ep_contrib_min_amount']; ?>
 euros de reversements.</strong></p>
				<?php endif; ?>	
				
				<p class="alert" style="text-align: right"><strong>Le paiement s'effectue minimum le 15 du mois  suivant votre demande (frais d'avance allant de 0 &agrave; 8% du montant)</strong></p>
			</div>
		</div>
	</section>
	<section id="billing-list">
		<div class="row-fluid">
			<div class="mod">
				<h4>MES BONS DE COMMANDE</h4>
				<table class="table table-hover">
					<thead>
						<tr><th>Date de la demande de paiement</th><th>Nom du bon de commande</th><th>Tarif total</th><th>Statut</th><th></th></tr>
					</thead>
					<tbody>
					<?php if ($this->_tpl_vars['royalties'] | @ count > 0): ?>	
						<?php $_from = $this->_tpl_vars['royalties']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['royalty']):
?>
						<?php if ($this->_tpl_vars['royalty']['invoiceId'] != "ep_invoice_2014-05-1-120224141203205"): ?> 						<!-- start, row -->
						<tr>
							<td><?php echo ((is_array($_tmp=$this->_tpl_vars['royalty']['invoicedate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</td>
							<td>Bon de commande edit-place # <?php echo ((is_array($_tmp=$this->_tpl_vars['royalty']['invoiceId'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'ep_invoice_', '') : smarty_modifier_replace($_tmp, 'ep_invoice_', '')); ?>
 - <a href="/contrib/invoicedetails?invoiceid=<?php echo ((is_array($_tmp=$this->_tpl_vars['royalty']['invoiceId'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'ep_invoice_', '') : smarty_modifier_replace($_tmp, 'ep_invoice_', '')); ?>
" role="button" data-toggle="modal" data-target="#billing-ajax" class="muted">D&eacute;tails</a></td>
							<td><?php echo ((is_array($_tmp=$this->_tpl_vars['royalty']['total_invoice_paid'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &euro;</td>
							<td>
								<?php if ($this->_tpl_vars['royalty']['status'] == 'refuse'): ?>
									Refus&eacute;
								<?php elseif ($this->_tpl_vars['royalty']['status'] == 'Paid'): ?>
									Pay&eacute;e
								<?php elseif ($this->_tpl_vars['royalty']['status'] == 'inprocess'): ?>
									En cours de paiement	
								<?php else: ?>
									<?php if ($this->_tpl_vars['royalty']['pay_later_month_name']): ?>
										<span rel="tooltip" data-html="true" data-original-title="Paiement pr&eacute;vu le 15 <?php echo $this->_tpl_vars['royalty']['pay_later_month_name']; ?>
">
											Non pay&eacute;e
										</span>	
									<?php else: ?>
										Non pay&eacute;e									
									<?php endif; ?>
								<?php endif; ?>
								
							</td>
							<td>
								<?php if ($this->_tpl_vars['royalty']['status'] == 'Paid'): ?>
									<a class="btn btn-small" href="/contrib/downloadinvoice?invoiceid=<?php echo ((is_array($_tmp=$this->_tpl_vars['royalty']['invoiceId'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'ep_invoice_', '') : smarty_modifier_replace($_tmp, 'ep_invoice_', '')); ?>
"><i class="icon-file"></i> T&eacute;l&eacute;charger</a>
								<?php endif; ?>		
							</td>
						</tr>
						<?php endif; ?>
						<!-- end, row -->
						<?php endforeach; endif; unset($_from); ?>

					<?php endif; ?>	
					</tbody>
				</table>
				<!---Pagination start-->
					<div class="pagination pull-right">
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Contrib/pagination.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					</div>	
					<!---Pagination END-->
			</div>
		</div>			
	</section>   
</div>
<div id = "confirmDiv"></div>
<!-- ajax use start -->
<div id="billing-ajax" class="modal container hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3 id="myModalLabel">D&eacute;tails facture</h3>
	</div>
	<div class="modal-body">

	</div>
</div>
<!-- ajax use end -->