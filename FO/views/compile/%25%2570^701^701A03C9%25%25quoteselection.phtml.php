<?php /* Smarty version 2.6.19, created on 2015-07-29 13:17:52
         compiled from Client/quoteselection.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'ucfirst', 'Client/quoteselection.phtml', 69, false),array('modifier', 'count', 'Client/quoteselection.phtml', 132, false),array('modifier', 'ceil', 'Client/quoteselection.phtml', 170, false),array('modifier', 'zero_cut', 'Client/quoteselection.phtml', 173, false),array('modifier', 'utf8_decode', 'Client/quoteselection.phtml', 217, false),)), $this); ?>
<?php echo '
<script language="javascript"> 
(function($,W,D)
	{
		var JQUERY4U = {};

		JQUERY4U.UTIL =
		{
			setupFormValidation: function()
			{
					//form validation rules
					$("#conactForm").validate({
						onkeyup:false,
						errorClass: \'error\',
						validClass: \'valid\',
						message:false,
						highlight: function(element) {
							$(element).closest(\'span\').addClass("f_error");
						},
						unhighlight: function(element) {
							$(element).closest(\'span\').removeClass("f_error");
						},
						rules: {
							contact_firstname:  {
								required: true
							},
							contact_lastname:  {
								required: true
							},
							contact_email:  {
								required: true,
								email: true
							},
							contact_phone: {
								required: true,
								number: true
							}
						}
					});
			    
			}
		}

		//when the dom has loaded setup form validation rules
		$(D).ready(function($) {
			JQUERY4U.UTIL.setupFormValidation();
		});

	})(jQuery, window, document);
</script>

<style>
		.error { display: none !important;}
		.f_error input, .f_error select, .f_error textarea {
			border-color: rgb(185, 74, 72);
			color: rgb(185, 74, 72);
		}
</style>
'; ?>
	 
	
<section id="quote-selection">
	<div class="row-fluid">
		<!-- col 1 -->
		<div class="span8">
			<div class="profilehead-mod">
				<div class="span3">
					<div class="editor-container">
						<a class="imgframe-large" href="#">
							<img src="<?php echo $this->_tpl_vars['contribprofile'][0]['profilepic']; ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['contribprofile'][0]['first_name'])) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : smarty_modifier_ucfirst($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['contribprofile'][0]['last_name'])) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : smarty_modifier_ucfirst($_tmp)); ?>
">
						</a>
					</div>
				</div>
				<div class="span9 profile-name">
					<h3><?php echo $this->_tpl_vars['contribprofile'][0]['name']; ?>
</h3>
					<p class="" style=""><?php echo $this->_tpl_vars['contribprofile'][0]['age']; ?>
 ans  <span class="muted">&bull;</span>  <?php echo $this->_tpl_vars['contribprofile'][0]['catstr']; ?>
  <span class="muted">&bull;</span>  <?php echo $this->_tpl_vars['contribprofile'][0]['langstr']; ?>
</p>
					<table class="table table-condensed table-hover">
						<tr>
							<td class="muted"><?php echo $this->_tpl_vars['contribprofile'][0]['participations']; ?>
 participations</td>
							<td class="muted"><?php echo $this->_tpl_vars['contribprofile'][0]['selectedcount']; ?>
 fois s&eacute;lectionn&eacute;</td>
						</tr>
						<tr>
							<td class="muted">Clients : <?php echo $this->_tpl_vars['contribprofile'][0]['clientlist']; ?>
</td>
							<td><a href="#skills">D&eacute;tails du profil</a></td>
						</tr>
					</table>
				</div>
			</div>
			
			<div class="comment well well-large">
				<p><strong><i class="icon-comment"></i> A propos de votre annonce : "<?php echo $this->_tpl_vars['contribprofile'][0]['title']; ?>
"</strong></p>
				<p class="">
				</p>
			</div>

			<h3>Son profil</h3>
			
			<section id="skills">
				<div class="mod">
					<h4>Langues</h4>
					<?php $this->assign('language', $this->_tpl_vars['contribprofile'][0]['language']); ?>
					<strong><?php echo $this->_tpl_vars['language_array'][$this->_tpl_vars['language']]; ?>
</strong> (langue maternelle)
					<?php $_from = $this->_tpl_vars['langpercent']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lang'] => $this->_tpl_vars['more']):
?>
						<div class="skillstat row-fluid">	
							<div class="span6">
								<p><strong><?php echo $this->_tpl_vars['language_array'][$this->_tpl_vars['lang']]; ?>
</strong>  <?php echo $this->_tpl_vars['more']; ?>
%</p>
								<div class="progress">
									<div class="bar" style="width: <?php echo $this->_tpl_vars['more']; ?>
%"></div>
								</div>
								<span class="pull-left legend muted">Débutant</span> <span class="pull-right legend muted">Bilingue</span>
							</div>
						</div>
					<?php endforeach; endif; unset($_from); ?>	
				</div>

				<div class="mod">
					<h4>Domaines de comp&eacute;tences</h4>
					<?php $_from = $this->_tpl_vars['contribprofile'][0]['cats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cat']):
?>
						<?php if ($this->_tpl_vars['catpercent'][$this->_tpl_vars['cat']] != ""): ?>
						<div class="skillstat row-fluid">
							<div class="span6">
								<p><strong data-original-title="Seo / marketing internet" rel="tooltip"><?php echo $this->_tpl_vars['category_array'][$this->_tpl_vars['cat']]; ?>
</strong>  <?php echo $this->_tpl_vars['catpercent'][$this->_tpl_vars['cat']]; ?>
%</p>
								<div class="progress">
								<div class="bar" style="width: <?php echo $this->_tpl_vars['catpercent'][$this->_tpl_vars['cat']]; ?>
%"></div>
								</div>
								<span class="pull-left legend muted">Débutant</span> <span class="pull-right legend muted">Expert</span>
							</div>
						</div>
						<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>	
				</div>

				<?php if (count($this->_tpl_vars['exp_details']) > 0): ?>
				<div class="mod">
					<h4>Exp&egrave;riences professionnelles</h4>
					<dl>
						<?php $_from = $this->_tpl_vars['exp_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['exp']):
?>
							<dt><?php echo $this->_tpl_vars['exp']['title']; ?>
</dt>
							<dd class="company"><?php echo $this->_tpl_vars['exp']['institute']; ?>
</dd>
							<dd class="muted">
								Type de contrat : <?php echo $this->_tpl_vars['exp']['contract']; ?>

							</dd>
							<dd class="muted">
								<time> <?php echo ((is_array($_tmp=$this->_tpl_vars['exp']['from_month'])) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : smarty_modifier_ucfirst($_tmp)); ?>
 <?php echo $this->_tpl_vars['exp']['from_year']; ?>
</time> - <time><?php if ($this->_tpl_vars['exp']['to_year'] != '0'): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['exp']['to_month'])) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : smarty_modifier_ucfirst($_tmp)); ?>
 <?php echo $this->_tpl_vars['exp']['to_year']; ?>
<?php else: ?>Actuel<?php endif; ?></time>
							</dd>
						<?php endforeach; endif; unset($_from); ?>
					</dl>
				</div>
				<?php endif; ?>

				<?php if (count($this->_tpl_vars['education_details']) > 0): ?>
				<div class="mod">
					<h4>Formations</h4>
					<dl>
						<?php $_from = $this->_tpl_vars['education_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['edu']):
?>
							<dt><?php echo $this->_tpl_vars['edu']['title']; ?>
</dt>
							<dd class="company"><?php echo $this->_tpl_vars['edu']['institute']; ?>
</dd>
							<dd class="muted">
								<time> <?php echo ((is_array($_tmp=$this->_tpl_vars['edu']['from_month'])) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : smarty_modifier_ucfirst($_tmp)); ?>
 <?php echo $this->_tpl_vars['edu']['from_year']; ?>
</time> - <time><?php if ($this->_tpl_vars['edu']['to_year'] != '0'): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['edu']['to_month'])) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : smarty_modifier_ucfirst($_tmp)); ?>
 <?php echo $this->_tpl_vars['edu']['to_year']; ?>
<?php else: ?>Actuel<?php endif; ?></time>
							</dd>
						<?php endforeach; endif; unset($_from); ?>
					</dl>
				</div>
				<?php endif; ?>
			</section>
		</div>

		<!-- col 2 -->
		<div class="span4">
			<div class="quote-cta">
				<p class="quote-price">Prix total :<strong> <?php echo ((is_array($_tmp=$this->_tpl_vars['contribprofile'][0]['price_user_total'])) ? $this->_run_mod_handler('ceil', true, $_tmp) : ceil($_tmp)); ?>
 &euro;</strong><sup>*</sup></p>
				<ul class="unstyled stripe">
					<?php if ($this->_tpl_vars['contribprofile'][0]['premium_option'] == '0'): ?>
						<li>Tarif contributeur : <?php echo ((is_array($_tmp=$this->_tpl_vars['contribprofile'][0]['price_user'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &euro;</li>
						<li>Commission Edit-place inclus : <?php echo ((is_array($_tmp=$this->_tpl_vars['contribprofile'][0]['ep_percent'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
%</li>
					<?php endif; ?>
					<?php if (( $this->_tpl_vars['contribprofile'][0]['valid_until'] != 'no' && $this->_tpl_vars['contribprofile'][0]['premium_option'] != '0' ) || ( $this->_tpl_vars['contribprofile'][0]['datevalid'] == 'yes' && $this->_tpl_vars['contribprofile'][0]['premium_option'] == '0' )): ?>
					<li>*Devis garanti jusqu'au <?php echo $this->_tpl_vars['contribprofile'][0]['valid_until']; ?>
</li>
					<?php endif; ?>
				</ul>
				
				<?php if ($this->_tpl_vars['contribprofile'][0]['premium_option'] == '0' && $this->_tpl_vars['contribprofile'][0]['datevalid'] == 'yes' && $this->_tpl_vars['contribprofile'][0]['cycle'] == '0' && $this->_tpl_vars['contribprofile'][0]['articlestatus'] != 'closed_client'): ?>
					<p><a  data-toggle="modal" href="#confirm-selection" class="btn btn-primary btn-block">S&eacute;lectionner ce r&eacute;dacteur</a></p>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['contribprofile'][0]['datevalid'] == 'no' && $this->_tpl_vars['contribprofile'][0]['premium_option'] == '0'): ?>
					<strong> *La date de validit&eacute; de ce devis a expir&eacute;</strong>
				<?php endif; ?>
				
				<?php if ($this->_tpl_vars['contribprofile'][0]['created_by'] == 'FO'): ?>
					<div class="private-info">
						<h4>Devis privé</h4>
						<ul>
							<li>Confier seulement une partie de la mission à ce rédacteur</li>
							<li>Confier une mission plus importante à ce rédacteur </li>
						</ul>
						<p><a  data-toggle="modal" href="/client/quotes-1?article=<?php echo $this->_tpl_vars['contribprofile'][0]['artid']; ?>
&private=<?php echo $this->_tpl_vars['contribprofile'][0]['user_id']; ?>
" class="btn btn-primary btn-block"><span class="icon-lock icon-white"></span> Demander un devis en privé</a></p>
					</div>
				<?php endif; ?>				
				
		
				<aside>
					<div class="aside-bg">
						<div id="garantee" class="aside-block">
							<h4>Vos garanties</h4>
							<dl>
								<dt><span class="umbrella"></span>Edit-place est votre médiateur</dt>
								<dd>En cas de contestation (délai de livraison, reprise d’articles, remboursement...)</dd>
								<dt><span class="locked"></span>Paiement sécurisé</dt>
								<dd>Notre solution de paiement en ligne vous garantit une transaction en toute tranquillité</dd>
							</dl>
						</div>
						
						<?php if (count($this->_tpl_vars['contribprofile'][0]['clientlogo']) > 0): ?>
						<div class="aside-block" id="we-trust">
							<h4>Ses Publications</h4>
							<ul class="unstyled">
								<?php $_from = $this->_tpl_vars['contribprofile'][0]['clientlogo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ckey'] => $this->_tpl_vars['clogo']):
?>
									<li><img src="<?php echo $this->_tpl_vars['clogo']; ?>
" rel="tooltip" data-original-title="<?php echo ((is_array($_tmp=$this->_tpl_vars['ckey'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
" data-placement="left"></li>
								<?php endforeach; endif; unset($_from); ?>
							</ul>
						</div>
						<?php endif; ?>
					</div>
				</aside>	
			</div>
		</div>
	</div>
</section>

<!-- end, contributor status --> 

<a class="pull-right btn btn-small disabled anchor-top scroll" href="#brand"><i class="icon-arrow-up"></i></a>



<div id="confirm-selection" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

	<form method="POST" name="conactForm" id="conactForm" action="/client/order1?id=<?php echo $this->_tpl_vars['contribprofile'][0]['id']; ?>
">

		<div class="modal-header">

			<button type="button" class="close" onclick="$('#confirm-selection').hide();return false;" aria-hidden="true">&times;</button>

			<h3 id="myModalLabel">Confirmer la s&eacute;lection</h3>

		</div>

		<div class="modal-body">

			<p><strong>Je confirme vouloir s&eacute;lectionner <?php echo $this->_tpl_vars['contribprofile'][0]['name']; ?>
. pour mon projet "<?php echo $this->_tpl_vars['contribprofile'][0]['title']; ?>
 " au prix total de <?php echo ((is_array($_tmp=$this->_tpl_vars['contribprofile'][0]['price_user_total'])) ? $this->_run_mod_handler('ceil', true, $_tmp) : ceil($_tmp)); ?>
 &euro;</strong></p>

			<p>Veuillez compléter vos coordonnées pour être mis en relation avec le rédacteur.</p>
			
			<div class="mod form-horizontal">
				<div class="control-group">
					<label class="control-label" for="client-name"> Nom</label>
					<div class="controls">
						<span><input type="text" id="contact_firstname" name="contact_firstname" value="<?php echo $this->_tpl_vars['clientcontact'][0]['contact_firstname']; ?>
" class="span3"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="client-surname"> Prénom</label>
					<div class="controls">
						<span><input type="text" id="contact_lastname" name="contact_lastname" value="<?php echo $this->_tpl_vars['clientcontact'][0]['contact_lastname']; ?>
" class="span3"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="client-email"> Votre email</label>
					<div class="controls">
						<span><input type="text" id="contact_email" name="contact_email" value="<?php echo $this->_tpl_vars['clientcontact'][0]['contact_email']; ?>
" class="span3"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="client-phone"> Téléphone</label>
					<div class="controls">
						<span><input type="text" id="contact_phone" name="contact_phone" value="<?php echo $this->_tpl_vars['clientcontact'][0]['contact_phone']; ?>
" class="span3"></span>
					</div>
				</div>
			</div>
		</div>

		<div class="modal-footer">

			<button class="btn" type="button" onclick="$('#confirm-selection').hide();return false;" aria-hidden="true">Annuler</button>

			<button class="btn btn-primary" type="submit">Confirmer</button>

		</div>

		<input type="hidden" name="quote" id="quote" value="<?php echo $this->_tpl_vars['contribprofile'][0]['user_id']; ?>
" />

		<input type="hidden" name="article" id="article" value="<?php echo $this->_tpl_vars['contribprofile'][0]['artid']; ?>
" />

		<input type="hidden" name="contribprice" id="contribprice" value="<?php echo $this->_tpl_vars['contribprofile'][0]['price_user']; ?>
" />

	</form>

</div>        



<?php echo '



<script>
 


	$("[rel=tooltip]").tooltip();

	$("[rel=popover]").popover();



</script>



'; ?>