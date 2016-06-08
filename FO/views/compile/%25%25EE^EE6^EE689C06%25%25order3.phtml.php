<?php /* Smarty version 2.6.19, created on 2015-07-29 13:19:15
         compiled from Client/order3.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'ceil', 'Client/order3.phtml', 44, false),array('modifier', 'zero_cut', 'Client/order3.phtml', 92, false),array('modifier', 'ucfirst', 'Client/order3.phtml', 146, false),array('modifier', 'count', 'Client/order3.phtml', 154, false),array('modifier', 'utf8_decode', 'Client/order3.phtml', 159, false),array('function', 'math', 'Client/order3.phtml', 95, false),)), $this); ?>
<?php echo '
<script>
	function payformsubmit(ptype)
	{  
		document.payform.action ="/client/paypalpayment?paytype="+ptype;
		document.payform.submit();
		return false;
	}
</script>
'; ?>


<div class="container">
	<!-- start, status -->
	<div class="row-fluid">
		<div id="state2" class="span12">
			<ul class="unstyled">
				<li class="span3" rel="tooltip" data-original-title="S&eacute;lectionnez celui qui travaillera sur votre projet"><span class="writer_select">Choix du r&eacute;dacteur</span></li>
				<li class="span3" rel="tooltip" data-original-title="Le r&eacute;dacteur s&eacute;lectionn&eacute; travaille sur votre projet"><span class="ongoing">Production en cours</span></li>
				<li class="span3 hightlight" rel="tooltip" data-original-title="Vous versez en d&eacute;p�t de garantie le montant de la commande"><span class="cb">D&eacute;p�t de garantie</span></li>
				<li class="span3" rel="tooltip" data-original-title="T&eacute;l&eacute;charger vos projets livr&eacute;s"><span class="dld">T&eacute;l&eacute;chargement</span></li>
			</ul>
		</div>
	</div>
	<!-- end, status -->
	
	<!-- start, Summary -->
	<section id="summary">
		<div class="row-fluid">
			<div class="span6">
				<h1><p>Mission</p> <?php echo $this->_tpl_vars['aoparticipation'][0]['title']; ?>
</span></h1>
			</div>
			<div class="span3 stat">
				<p>Date de livraison</p>
				<p class="num-large less24">
					<?php if ($this->_tpl_vars['aoparticipation'][0]['articlestatus'] == 'closed_client'): ?>
						Annul&eacute;e
					<?php else: ?>
						Livr&eacute;e
					<?php endif; ?>
				</p>
			</div>
			<div class="span2 stat">
				<p>Tarif</p>
				<p class="num-large"><?php echo ((is_array($_tmp=$this->_tpl_vars['aoparticipation'][0]['price_user_total'])) ? $this->_run_mod_handler('ceil', true, $_tmp) : ceil($_tmp)); ?>
 &euro;</p> 
			</div>
			<div class="span1 stat">
				<div class="icon-comment-large" rel="tooltip" data-original-title="Nombre de commentaires sur cette mission"><a href="#comment" ><?php echo $this->_tpl_vars['commentcount']; ?>
</a></div>
			</div>
		</div>
	</section>
	<!-- end, summary --> 

	<div class="row-fluid"> 
		<?php if ($this->_tpl_vars['aoparticipation'][0]['premium_option'] == '0'): ?>
		<div class="statusbar clearfix">
			<div class="btn-toolbar">
				<div class="btn-group">
					<?php if ($this->_tpl_vars['aoparticipation'][0]['created_by'] == 'FO'): ?>
						<a class="btn btn-small" href="/client/quotes-1?article=<?php echo $_GET['id']; ?>
"><i class="icon-pencil"></i> Relancer un devis</a>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['aoparticipation'][0]['articlestatus'] != 'closed_client'): ?>
						<a class="btn btn-small" href="/client/compose-mail?serviceid=111201092609847&object=<?php echo $this->_tpl_vars['aoparticipation'][0]['title']; ?>
><i class="icon-envelope"></i> Contacter Edit-place</a>
						<a class="btn btn-small" href="javascript:void(0);" onClick="CloseArticle('<?php echo $_GET['id']; ?>
');" target="_blank"><i class="icon-remove"></i> Annuler cette mission</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<div class="row-fluid"> 
			<div class="span9">
			<section id="purchase">
				<div class="row-fluid">
					<div class="span12">
						<h3>R&egrave;glement du d&eacute;p�t de garantie</h3>
						<p>Edit-place garde en d�p�t de garantie le montant demand� par le journaliste jusqu�� validation des articles par le client. edit-place vous rembourse la somme en cas de refus d�finitif de la commande.*</p>
					</div>
				</div>
				<div class="row-fluid">
					<br>
					<table class="table table-bordered table-hover span8 offset2">
						<thead>
							<tr>
								<th colspan=3><h4>Commande</h4></th>
							</tr>
						</thead>
						<tr><td colspan=3 class="span6"><?php echo $this->_tpl_vars['aoparticipation'][0]['title']; ?>
</td></tr>
						<tr><td class="span6"></td><td class="span3 price">Prix HT</td><td class="span3 price"><?php echo ((is_array($_tmp=$this->_tpl_vars['aoparticipation'][0]['price_user_total'])) ? $this->_run_mod_handler('ceil', true, $_tmp) : ceil($_tmp)); ?>
 &euro;</td></tr>
						<?php if ($this->_tpl_vars['aoparticipation'][0]['client_type'] != 'personal'): ?>
						<tr>
							<td class="span6"></td>
							<td class="span3 price">TVA inclus</td>
							<td class="span3 price"><?php echo ((is_array($_tmp=$this->_tpl_vars['tax'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &euro;</td>
						</tr>
						<?php endif; ?>
						<?php echo smarty_function_math(array('assign' => 'total','equation' => 'x+y','x' => ((is_array($_tmp=$this->_tpl_vars['aoparticipation'][0]['price_user_total'])) ? $this->_run_mod_handler('ceil', true, $_tmp) : ceil($_tmp)),'y' => $this->_tpl_vars['tax']), $this);?>
 
						<tr class="info">
							<td class="span6"></td>
							<td class="span3 price totalprice">Total &agrave; r&eacute;gler</td>
							<td class="span3 price totalprice"><?php echo ((is_array($_tmp=$this->_tpl_vars['total'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &euro; ttc</td> 
						</tr>
					</table>

					<form method="POST" name="payform">
						<div class="span8 offset2">
							<div class="pull-center">
								<?php if ($this->_tpl_vars['aoparticipation'][0]['articlestatus'] != 'closed_client'): ?>
								<hr>
								<h4>S&eacute;lectionnez un mode de paiement</h4>
									<?php if ($this->_tpl_vars['first_name'] == ""): ?>
										<div class="btn btn-large" data-target="#profile-update" data-toggle="modal">Paypal</div>
										<div class="btn btn-large" data-target="#profile-update" data-toggle="modal">CB</div>
									<?php else: ?> 
										<div class="btn btn-large" onClick="payformsubmit('PP');">Paypal</div>
										<div class="btn btn-large" onClick="payformsubmit('CC');">CB</div>
									<?php endif; ?>
								<?php endif; ?>
							</div>
						</div>
						<input type="hidden" name="delivery" id="delivery" value="<?php echo $_GET['id']; ?>
" />
						<input type="hidden" name="article" id="article" value="<?php echo $this->_tpl_vars['aoparticipation'][0]['article_id']; ?>
" />
						<input type="hidden" name="amount_topay" id="amount_topay" value="<?php echo $this->_tpl_vars['total']; ?>
" />
						<input type="hidden" name="amount" id="amount" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['aoparticipation'][0]['price_user_total'])) ? $this->_run_mod_handler('ceil', true, $_tmp) : ceil($_tmp)); ?>
" />
					</form>
				</div>
			</section>
		</div>
		<div class="span3">
			<!--  right column  -->
			<aside>
				<div class="aside-bg">
					<?php if ($this->_tpl_vars['aoparticipation'][0]['premium_option'] == '0'): ?>
						<div class="editor-price">
							<p class="quote-price">Prix total :<strong> <?php echo ((is_array($_tmp=$this->_tpl_vars['aoparticipation'][0]['price_user_total'])) ? $this->_run_mod_handler('ceil', true, $_tmp) : ceil($_tmp)); ?>
 &euro;</strong></p>
							<ul class="unstyled stripe">
								<li>Tarif contributeur : <?php echo ((is_array($_tmp=$this->_tpl_vars['aoparticipation'][0]['price_user'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &euro;</li>
								<li>Commission Edit-place incluse : <?php echo ((is_array($_tmp=$this->_tpl_vars['aoparticipation'][0]['ep_percent'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
%</li>
							</ul>
						</div> 
					<?php endif; ?>
					<div id="selected-editor" class="aside-block">
						<div class="editor-container">
							<h4>Votre contact</h4>
							<a class="imgframe-large" onclick="loadcontribprofile('<?php echo $this->_tpl_vars['contact'][0]['identifier']; ?>
');" role="button" data-toggle="modal" data-target="#viewContribProfile" style="cursor:pointer;">
							<img src="<?php echo $this->_tpl_vars['contact'][0]['profilepic']; ?>
" alt="<?php echo $this->_tpl_vars['contact'][0]['name']; ?>
"></a>
							<p class="editor-name"><a onclick="loadcontribprofile('<?php echo $this->_tpl_vars['contact'][0]['identifier']; ?>
');" role="button" data-toggle="modal" data-target="#viewContribProfile" style="cursor:pointer;"><?php echo $this->_tpl_vars['contact'][0]['name']; ?>
</a></p>
							<a href="/client/compose-mail?clientid=<?php echo $this->_tpl_vars['contact'][0]['identifier']; ?>
&ord=y1s" class="btn btn-small">contacter <?php echo ((is_array($_tmp=$this->_tpl_vars['contact'][0]['first_name'])) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : smarty_modifier_ucfirst($_tmp)); ?>
</a>
							<address>
								<i class="icon-phone"></i> +<?php echo $this->_tpl_vars['contact'][0]['phone_number']; ?>
<br>
								<a href="mailto:<?php echo $this->_tpl_vars['contact'][0]['email']; ?>
"><i class="icon-email"></i> <?php echo $this->_tpl_vars['contact'][0]['email']; ?>
</a>
							</address>
						</div>
					</div>
					
					<?php if (count($this->_tpl_vars['customerstrust']) > 0): ?>
					<div id="we-trust" class="aside-block">
						<h4>IL A DEJA TRAVAILLE POUR</h4>
						<ul class="unstyled">
							<?php $_from = $this->_tpl_vars['customerstrust']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ckey'] => $this->_tpl_vars['clogo']):
?>
								<li><img src="<?php echo $this->_tpl_vars['clogo']; ?>
" rel="tooltip" data-original-title="<?php echo ((is_array($_tmp=$this->_tpl_vars['ckey'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
" data-placement="left"></li>
							<?php endforeach; endif; unset($_from); ?>
						</ul>
					</div>
					<?php endif; ?>
					
					<div class="aside-block" id="garantee">
						<h4>Vos garanties</h4>
						<dl>
							<dt><span class="umbrella"></span>Edit-place est votre m&eacute;diateur</dt>
							<dd>En cas de contestation (d&eacute;lai de livraison, reprise d�articles, remboursement...)</dd>
							<dt><span class="locked"></span>Paiement s&eacute;curis&eacute;</dt>
							<dd>Notre solution de paiement en ligne vous garantit une transaction en toute tranquillit&eacute;</dd>
						</dl>
					</div>
				</div>
			</aside>  
		</div>
		</div>
	</div>
</div>

<!-- contrib profile -->
<div id="viewContribProfile" class="modal container hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h3 id="myModalLabel">Profil du r&eacute;dacteur</h3>
	</div>
	<div class="modal-body">
		<div id="userprofile">
	
		</div>
	</div>
</div>

<!-- Client profile update -->
<div id="profile-update" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3 id="myModalLabel">COMPLETER VOTRE PROFIL</h3>
	</div>
	<div class="modal-body">
		<p>Merci de compl&eacute;ter votre profil afin de g&eacute;n&eacute;rer la facture.</p>
		<p><a href="/client/profile?from=payment&article=<?php echo $_GET['id']; ?>
">Compl&eacute;ter mon profil</a></p>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Annuler</button>
	</div>
</div>