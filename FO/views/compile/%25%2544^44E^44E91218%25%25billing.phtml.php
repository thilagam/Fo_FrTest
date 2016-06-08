<?php /* Smarty version 2.6.19, created on 2015-07-29 07:43:19
         compiled from Client/billing.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Client/billing.phtml', 41, false),array('modifier', 'date_format', 'Client/billing.phtml', 54, false),array('modifier', 'ucfirst', 'Client/billing.phtml', 57, false),array('modifier', 'zero_cut', 'Client/billing.phtml', 59, false),array('modifier', 'strlen', 'Client/billing.phtml', 98, false),array('modifier', 'truncate', 'Client/billing.phtml', 105, false),)), $this); ?>
<?php echo '
	<script type="text/javascript">
	$("#menu_billing").addClass("active");
	
	$(function(){
		var billcount=$("#billcount").val();
		
		$(\'a[id^="popover_"]\').live(\'click\', function(){ 
			var id=$(this).attr(\'id\'); 
			$(\'#\'+id).popover(\'show\');
			for(var i=0; i<billcount; i++)
			{ 
				var popid=\'popover_\'+i;
				if(popid!=id)
				{
					$(\'#\'+popid).popover(\'hide\');
				}
			}
		});
	});
	
	function closepopover(ind)
	{
		$(\'#popover_\'+ind).popover(\'hide\');
	}	

	</script>

'; ?>


<div class="container">
	<div class="row">
		<div class="span12">
			<h1>Mes factures</h1>
		</div>
	</div>

	<div class="row">   
		<div class="span9">
			<section id="billing-list">
				<?php if (count($this->_tpl_vars['billings']) > 0): ?>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Date de facture</th>
							<th>Mission effectu&eacute;e</th>
							<th>Montant</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php $_from = $this->_tpl_vars['billings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loopbill'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loopbill']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['bill']):
        $this->_foreach['loopbill']['iteration']++;
?>
						<tr>
							<td><?php echo ((is_array($_tmp=$this->_tpl_vars['bill']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</td>
							<td>
								<a href="#" data-placement="bottom" id="popover_<?php echo ($this->_foreach['loopbill']['iteration']-1); ?>
"  rel="popover" data-html="true" data-original-title="Info mission <button type=button class=close onClick=closepopover('<?php echo ($this->_foreach['loopbill']['iteration']-1); ?>
') aria-hidden=true>&times;</button>"
								data-content="- Annonce parue le : <?php echo ((is_array($_tmp=$this->_tpl_vars['bill']['ddate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
<br>- Projet livr&eacute; le : <?php echo ((is_array($_tmp=$this->_tpl_vars['bill']['article_sent_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
<br>- Par : <?php echo ((is_array($_tmp=$this->_tpl_vars['bill']['first_name'])) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : smarty_modifier_ucfirst($_tmp)); ?>
&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['bill']['last_name'])) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : smarty_modifier_ucfirst($_tmp)); ?>
 <br><br> <a href='/client/quotes?id=<?php echo $this->_tpl_vars['bill']['aid']; ?>
' class='btn btn-block btn-small'>Historique commande</a>" ><?php echo $this->_tpl_vars['bill']['title']; ?>
</a>
							</td>
							<td><?php echo ((is_array($_tmp=$this->_tpl_vars['bill']['amount_paid'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &euro;</td> 
							<td>
								<?php if ($this->_tpl_vars['bill']['client_firstname'] == ""): ?>
									<a data-target="#profile-update" data-toggle="modal" class="btn btn-small" ><i class="icon-file"></i> T&eacute;l&eacute;charger</a>
								<?php else: ?>
									<a href="/client/downloadinvoice?id=<?php echo $this->_tpl_vars['bill']['aid']; ?>
" class="btn btn-small"><i class="icon-file"></i> T&eacute;l&eacute;charger</a>
								<?php endif; ?>
							</td>
						</tr>
						<?php endforeach; endif; unset($_from); ?>
						<input type="hidden" name="billcount" id="billcount" value="<?php echo count($this->_tpl_vars['billings']); ?>
" />
					</tbody>
				</table>
				<div class="span9">
				<!---Pagination start-->
					<div class="pagination pull-right">
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Client/pagination.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					</div>	
				</div>
				<?php else: ?>
				<div class="well">
					<div class="pull-center">
						<h4>Aucune facture disponible pour le moment</h4>
						<i class="icon-info-sign"></i> Si vous êtes en attente d'une facture depuis plus de 24h, <a href="/client/compose-mail?serviceid=111201092609847">contactez nous</a>
					</div>
				</div>
				<?php endif; ?>
			</section>
		</div>

		<div class="span3">
			<aside>
				<div class="aside-bg">
					<div id="quote-ongoing" class="aside-block">
						<h4>Vos devis en cours</h4>
						<ul class="nav nav-tabs nav-stacked <?php if (count($this->_tpl_vars['quotes']) > 9): ?>pre-scrollable<?php endif; ?>">
							<?php if (count($this->_tpl_vars['quotes']) > 0): ?>
								<?php $_from = $this->_tpl_vars['quotes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['quote']):
?>
									<li>
										<?php if (smarty_modifier_strlen($this->_tpl_vars['quote']['title']) > 28): ?>
											<a href="/client/quotes?id=<?php echo $this->_tpl_vars['quote']['id']; ?>
" rel="tooltip" data-original-title="<?php echo $this->_tpl_vars['quote']['title']; ?>
" data-placement="left">
												<?php if ($this->_tpl_vars['quote']['valid'] == 'yes'): ?>
													<span class="badge pull-right badge-warning">1</span>
												<?php else: ?>	
													<span class="badge pull-right"><?php echo $this->_tpl_vars['quote']['participations']; ?>
</span>
												<?php endif; ?>
											<?php echo ((is_array($_tmp=$this->_tpl_vars['quote']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 28, "...", true) : smarty_modifier_truncate($_tmp, 28, "...", true)); ?>

											</a>
										<?php else: ?>
											<a href="/client/quotes?id=<?php echo $this->_tpl_vars['quote']['id']; ?>
">	
												<?php if ($this->_tpl_vars['quote']['valid'] == 'yes'): ?>
													<span class="badge pull-right badge-warning">1</span>
												<?php else: ?>	
													<span class="badge pull-right"><?php echo $this->_tpl_vars['quote']['participations']; ?>
</span>
												<?php endif; ?>

											<?php echo $this->_tpl_vars['quote']['title']; ?>
</a>
										<?php endif; ?>	
									</li>
								<?php endforeach; endif; unset($_from); ?>
							<?php else: ?>
								<li><b>Pas de devis en cours</b></li>
							<?php endif; ?>
						</ul>	
						<ul class="nav nav-tabs nav-stacked">
							<li><a href="/client/liberte1"><i class="icon-edit"></i> <strong>Demander un nouveau devis</strong></a></li>
						</ul>	
					</div>
					<div class="aside-block" id="garantee">
						<h4>Vos garanties</h4>
						<dl>
							<dt><span class="umbrella"></span>edit-place est votre m&eacute;diateur</dt>
							<dd>En cas de contestation (d&eacute;lai de livraison, reprise d’articles, remboursement...)</dd>
							<dt><span class="locked"></span>Paiement s&eacute;curis&eacute;</dt>
							<dd>Notre solution de paiement en ligne vous garantit une transaction en toute tranquillit&eacute;</dd>
						</dl>
					</div>
				</div>
			</aside>  
		</div>
	</div>
</div>

<?php if ($this->_tpl_vars['writerscount'] > 0): ?>
	<section id="known-users">
		<div class="container">
			<div class="row">
				<h3 class="sectiondivider pull-center"><span>Ils ont d&eacute;j&agrave; collabor&eacute; avec vous !</span></h3>
				
				<?php $_from = $this->_tpl_vars['writers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['writer']):
?>
					<div class="span3">
						<div class="editor-container">
							<a  class="imgframe-large" onclick="loadcontribprofile('<?php echo $this->_tpl_vars['writer']['user_id']; ?>
');" role="button" data-toggle="modal" data-target="#viewContribProfile" style="cursor:pointer;">
								<img src="<?php echo $this->_tpl_vars['writer']['profileimage']; ?>
">
							</a>
							<p class="editor-name"><a onclick="loadcontribprofile('<?php echo $this->_tpl_vars['writer']['user_id']; ?>
');" role="button" data-toggle="modal" data-target="#viewContribProfile" style="cursor:pointer;"><?php echo ((is_array($_tmp=$this->_tpl_vars['writer']['name'])) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : smarty_modifier_ucfirst($_tmp)); ?>
</a></p>
						</div>
					</div>
				<?php endforeach; endif; unset($_from); ?>
			</div>
		</div>
	</section>
<?php endif; ?>	

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
			<h3 id="myModalLabel">Mise &agrave; jour du profil requise</h3>
		</div>
		<div class="modal-body">
			<p>Merci de mettre &agrave; jour votre profil pour t&eacute;l&eacute;charger votre facture.</p>
			<p><a href="/client/profile">Mon compte</a></p>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Annuler</button>
		</div>
	</div>