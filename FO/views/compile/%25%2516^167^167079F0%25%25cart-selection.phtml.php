<?php /* Smarty version 2.6.19, created on 2015-07-28 15:23:42
         compiled from Contrib/cart-selection.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'zero_cut', 'Contrib/cart-selection.phtml', 114, false),array('modifier', 'date_format', 'Contrib/cart-selection.phtml', 181, false),array('function', 'math', 'Contrib/cart-selection.phtml', 375, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
var cur_date=0,js_date=0,diff_date=0;
cur_date='; ?>
<?php echo time(); ?>
<?php echo ';
js_date=(new Date().getTime())/ 1000;
diff_date=Math.floor(js_date-cur_date);

 $(document).ready(function() {	
 
	/**timer js**/
	$("[id^=timearticle_]").each(function(i) {
			var article=$(this).attr(\'id\').split("_");
			 
			var ts=article[2];
			 
			$("#timearticle_"+article[1]+"_"+article[2]).countdown({
				timestamp	: ts,
				callback	: function(days, hours, minutes, seconds){

					var message = "";

					if(days>0)
						message += "<em>"+days + "</em> j" +" ";
					if(hours>0)	
						message += "<em>"+hours + "</em> h" +" ";
					if(minutes > 0)
					message += "<em>"+minutes + "</em> mn"+ " ";
					if(minutes < 1)
					message += "<em>"+seconds + "</em> s" + " ";
					//$("#textarticle_"+article[1]+"_"+article[2]).html(message);
					//$(\'input[name=contrib_price_\'+article[1]+\']\').attr(\'disabled\',true);
					if(days==0 && hours==0 && minutes==0 && seconds==0)
					{
						//$(\'input[name=contrib_price_\'+article[1]+\']\').attr(\'disabled\',true);
						
					}	
					
				}
				
			});
			
		});
});


function shownetprice(article,percent)
{
	var price=$("#"+article).val();
	price=price.replace(",", "."); 
	var net=(price*100)/percent;
	net=net.toFixed(2);
	net=net.replace(".", ","); 
	//net=format_float(net,1);
	$("span#netprice").html(net);
	
}


</script>
'; ?>

<div class="container">
	
	<?php if ($this->_tpl_vars['actionmessages'][0]): ?>
		<div class="alert alert-error"><button data-dismiss="alert" class="close" type="button">&times;</button>
			<?php echo $this->_tpl_vars['actionmessages'][0]; ?>

		</div>  
	<?php endif; ?>
	
	<div class="row-fluid">
		<!-- start, status -->   
		<div id="state2" class="span12">
			<ul class="unstyled">
				<li class="span4 hightlight" rel="tooltip" data-original-title="Je propose un tarif pour chaque annonce  s&eacute;lectionn&eacute;e"><span class="bid-selection">Mes participations</span></li>
				<li class="span4" rel="tooltip" data-original-title="Signature du contrat d'engagement Edit-place"><span class="contract">Contrat Edit-place</span></li>
				<li class="span4" rel="tooltip" data-original-title="Mes devis sont maintenant visibles par Edit-place et ses clients"><span class="participant-ok">Validation</span></li>
			</ul>
		</div>
		<!-- end, status -->
		<h1>Mes participations</h1>
		<div class="alert alert-info"><i class="icon-info-sign"></i> Pour participer, proposez un tarif pour chaque annonce. N'oubliez pas de valider les conditions de participation associées aux annonces.</div>
		<div id = "alert_placeholder"></div>
	</div>
 		
	<section id="bidding-form">
		<form  method="POST" action="/cart/save-cart" id="cartSelectionForm">
		<?php if ($this->_tpl_vars['cartItems'] | @ count > 0): ?>
			<?php $_from = $this->_tpl_vars['cartItems']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['article']):
?>
			<?php if ($this->_tpl_vars['article']['ao_type'] == 'poll_premium'): ?>
			<!-- Start, bidding -->    
			<div class="mod  bid_item dp" id="cart_item_<?php echo $this->_tpl_vars['article']['articleid']; ?>
">
				<div class="row-fluid head">
					<div class="span12">
						<ul class="unstyled">
							<li class="pull-right muted"><div data-original-title="Client" rel="tooltip" class="btn btn-small disabled"><i class="icon-hand-right"></i> <?php echo $this->_tpl_vars['article']['company_name']; ?>
</div>
							<div class="btn btn-small disabled" rel="tooltip" data-original-title="Fin de r&eacute;ception des devis">
								<i class="icon-time"></i>
									<span id="time_<?php echo $this->_tpl_vars['article']['articleid']; ?>
_<?php echo $this->_tpl_vars['article']['timestamp']; ?>
">
										<span id="text_<?php echo $this->_tpl_vars['article']['articleid']; ?>
_<?php echo $this->_tpl_vars['article']['timestamp']; ?>
"><?php echo $this->_tpl_vars['article']['timestamp']; ?>
</span>
									</span>
							</div>
							</li>
							<li class="pull-left"><span class="label label-quote-premium" data-original-title="Cette annonce est susceptible de devenir une mission Premium" rel="tooltip">Devis premium</span></li>
							<li class="pull-left title"><a href="/contrib/article-details?item=cart&misson_type=poll_premium&mission_identifier=<?php echo $this->_tpl_vars['article']['articleid']; ?>
"  role="button" data-toggle="modal" data-target="#viewOffer-ajax"><?php echo $this->_tpl_vars['article']['title']; ?>
</a></li>
						</ul>
					</div>
				</div>
				<div class="row-fluid" id="cart_load_<?php echo $this->_tpl_vars['article']['articleid']; ?>
">
					<div class="span4">
						<div class="priceblock clearfix">
							<div  class="col1">
								<div class="pricetitle">Proposer un tarif
									<?php if ($this->_tpl_vars['article']['price_max']): ?>
										<br>entre
										<span class="min">0</span> -  <span class="max"><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['price_max'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &euro;</span>
									<?php endif; ?>	
								</div> 
							</div>
							<div class="col2">
								<div class="input-append">
									<input id="poll_price_<?php echo $this->_tpl_vars['article']['articleid']; ?>
_premium" type="text" value="<?php echo $this->_tpl_vars['article']['poll_price_user']; ?>
" name="poll_price_<?php echo $this->_tpl_vars['article']['articleid']; ?>
"  style="width: 80px;">
									<span class="add-on">&euro;</span>
								</div>
							</div>
						</div>
					</div>

					<div class="span8">
						<p>Aucun profil ne sera s&eacute;lectionn&eacute; par Edit-place. Si le devis se transforme en mission,  vous serez prioritaire pour la selection par rapport aux autres participants</p>
						<div class="agreebox">
							<div class="inline-label"><i class="icon-arrow-right"></i> <strong>Je suis d'accord :</strong></div>
								<label class="radio inline">
									<input type="radio" value="yes" name="pollaccept_<?php echo $this->_tpl_vars['article']['articleid']; ?>
" id="pollaccept_<?php echo $this->_tpl_vars['article']['articleid']; ?>
" <?php echo $this->_tpl_vars['article']['accept_yes']; ?>
>Oui
								</label>	
								<label class="radio inline">
									<input type="radio" value="no" name="pollaccept_<?php echo $this->_tpl_vars['article']['articleid']; ?>
" id="pollaccept_<?php echo $this->_tpl_vars['article']['articleid']; ?>
" <?php echo $this->_tpl_vars['article']['accept_no']; ?>
>Non
								</label>	
							<div class="pull-right trash"><a onClick="fnCartDevisModifiers('p_remove','<?php echo $this->_tpl_vars['article']['articleid']; ?>
','main');" href="#delete-bid" data-toggle="modal" class="btn btn-link btn-mini disabled"><i class="icon-trash"></i> Supprimer</a></div>
						</div>
					</div>
				</div>
			</div>
			<!-- End, bidding --> 
			<?php elseif ($this->_tpl_vars['article']['ao_type'] == 'poll_nopremium'): ?>
			<!-- Start, bidding LIBERTE Quote -->    
			<div class="mod  bid_item dl" id="cart_item_<?php echo $this->_tpl_vars['article']['articleid']; ?>
">
				<div class="row-fluid head">
					<div class="span12">
						<ul class="unstyled">
							<li class="pull-right muted"><div data-original-title="Client" rel="tooltip" class="btn btn-small disabled"><i class="icon-hand-right"></i> <?php echo $this->_tpl_vars['article']['company_name']; ?>
</div>
								<div class="btn btn-small disabled" rel="tooltip" data-original-title="Fin de r&eacute;ception des devis">
									<i class="icon-time"></i>
									<span id="time_<?php echo $this->_tpl_vars['article']['articleid']; ?>
_<?php echo $this->_tpl_vars['article']['timestamp']; ?>
">
										<span id="text_<?php echo $this->_tpl_vars['article']['articleid']; ?>
_<?php echo $this->_tpl_vars['article']['timestamp']; ?>
"><?php echo $this->_tpl_vars['article']['timestamp']; ?>
</span>
									</span>
								</div></li>
							<li class="pull-left"><span class="label label-quote" data-original-title="Vous travaillerez en direct avec le client" rel="tooltip" data-placement="right">Devis Libert&eacute;</span></li>
							<li class="pull-left title"><a href="/contrib/article-details?item=cart&misson_type=poll_nopremium&mission_identifier=<?php echo $this->_tpl_vars['article']['articleid']; ?>
"  role="button" data-toggle="modal" data-target="#viewOffer-ajax"><?php echo $this->_tpl_vars['article']['title']; ?>
</a></li>
						</ul>
					</div>
				</div>

				<div class="row-fluid" id="cart_load_<?php echo $this->_tpl_vars['article']['articleid']; ?>
">
					<div class="span4">
						<div class="priceblock clearfix">
							<div class="col1">
								<div class="pricetitle">Proposer un tarif</div> 
							</div>

							<div class="col2">
								<div class="input-append">
									<input id="poll_price_<?php echo $this->_tpl_vars['article']['articleid']; ?>
_nopremium" type="text" value="<?php echo $this->_tpl_vars['article']['poll_price_user']; ?>
" name="poll_price_<?php echo $this->_tpl_vars['article']['articleid']; ?>
"  style="width: 80px;">
									<span class="add-on">&euro;</span>
								</div>
							</div>

							<div class="clearfix setdate">
								<div class="col1">
									<div class="pricetitle">Tarif valable jusqu'au</div> 
								</div>
								<div class="col2">
									<div class="input-append date" id="poll_date_limit_<?php echo $this->_tpl_vars['article']['articleid']; ?>
" data-date="<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
" data-date-format="dd/mm/yyyy" date-startdate="<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
">
										<input type="text" id="ipoll_date_limit_<?php echo $this->_tpl_vars['article']['articleid']; ?>
" name="poll_date_limit_<?php echo $this->_tpl_vars['article']['articleid']; ?>
" readonly placeholder="JJ/MM/AA" style="width: 80px;" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['article']['date_limit'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
"><span class="add-on"><i class="icon-calendar"></i></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="span8">
						<p>Aucun profil ne sera sélectionné par Edit-place. Si le devis premium devient une mission premium, il sera réservé aux participants du devis premium pendant <strong><?php echo $this->_tpl_vars['article']['priority_hours']; ?>
</strong> heures
						</p>
						<div class="agreebox">
							<div class="inline-label"><i class="icon-arrow-right"></i> <strong>Je suis d'accord :</strong></div>
								<label class="radio inline">
									<input type="radio" value="yes" name="pollaccept_<?php echo $this->_tpl_vars['article']['articleid']; ?>
" id="pollaccept_<?php echo $this->_tpl_vars['article']['articleid']; ?>
" <?php echo $this->_tpl_vars['article']['accept_yes']; ?>
>Oui
								</label>	
								<label class="radio inline">
									<input type="radio" value="no" name="pollaccept_<?php echo $this->_tpl_vars['article']['articleid']; ?>
" id="pollaccept_<?php echo $this->_tpl_vars['article']['articleid']; ?>
" <?php echo $this->_tpl_vars['article']['accept_no']; ?>
>Non
								</label>	
							<div class="pull-right trash"><a onClick="fnCartDevisModifiers('p_remove','<?php echo $this->_tpl_vars['article']['articleid']; ?>
','main');" href="#delete-bid" data-toggle="modal" class="btn btn-link btn-mini disabled"><i class="icon-trash"></i> Supprimer</a></div>
						</div>
					</div>
				</div>
			</div>
			<!-- End, bidding --> 
			<?php elseif ($this->_tpl_vars['article']['ao_type'] == 'correction'): ?>
			<!-- Start, bidding Correction Mission -->    
			<div class="mod  bid_item mc" id="cart_item_<?php echo $this->_tpl_vars['article']['articleid']; ?>
">
				<div class="row-fluid head">
					<div class="span12">
						<ul class="unstyled">
							<li class="pull-right muted">
								<div rel="tooltip" data-original-title="Client" class="btn btn-small disabled"><i class="icon-hand-right"></i> <?php echo $this->_tpl_vars['article']['company_name']; ?>
</div>
								<div class="btn btn-small disabled" rel="tooltip" data-original-title="Fin de réception des devis">
								<i class="icon-time"></i>
									<span id="time_<?php echo $this->_tpl_vars['article']['articleid']; ?>
-correction_<?php echo $this->_tpl_vars['article']['timestamp']; ?>
">
										<span id="text_<?php echo $this->_tpl_vars['article']['articleid']; ?>
-correction_<?php echo $this->_tpl_vars['article']['timestamp']; ?>
"><?php echo $this->_tpl_vars['article']['timestamp']; ?>
</span>
									</span>
								</div>
							</li>
							<li class="pull-left">
								<?php if ($this->_tpl_vars['article']['missiontest'] == 'yes'): ?>
									<span class="label label-test-mission" data-original-title="Mission garantie par Edit-place" rel="tooltip" data-placement="right">Mission de correction test</span>
								<?php else: ?>
									<span class="label label-correction" data-original-title="Mission garantie par Edit-place" rel="tooltip" data-placement="right">Mission Correction</span>
								<?php endif; ?>
							</li>
							<li class="pull-left title"><a href="/contrib/article-details?item=cart&misson_type=correction&mission_identifier=<?php echo $this->_tpl_vars['article']['articleid']; ?>
"  role="button" data-toggle="modal" data-target="#viewOffer-ajax"><?php echo $this->_tpl_vars['article']['title']; ?>
</a></li>								
						</ul>
					</div>
				</div>
				<div class="row-fluid" id="cart_load_<?php echo $this->_tpl_vars['article']['articleid']; ?>
">
					<div class="span4">
						<div class="priceblock clearfix">
							<div  class="col1">
								<div class="pricetitle">Proposer un tarif<br>entre <span class="min"><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['correction_pricemin'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</span> -  <span class="max"><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['correction_pricemax'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &euro;</span></div> 
							</div>
							<div class="col2">
								<div class="input-append">
									<input id="corrector_price_<?php echo $this->_tpl_vars['article']['articleid']; ?>
_premium" type="text" value="<?php echo $this->_tpl_vars['article']['price_corrector']; ?>
" name="corrector_price_<?php echo $this->_tpl_vars['article']['articleid']; ?>
"  style="width: 80px;">
									<span class="add-on">&euro;</span>
								</div>
							</div>
						</div>
					</div>

					<div class="span8">
						Si je suis s&eacute;lectionn&eacute;, je suis s&ucirc;r de corriger l'article que le r&eacute;dacteur enverra.<br>
						je devrai patienter avant la r&eacute;ception de son article, et ensuite, j'aurai <strong><?php echo $this->_tpl_vars['article']['correction_submission_text']; ?>
</strong> pour le corriger, et <strong><?php echo $this->_tpl_vars['article']['correction_resubmission_text']; ?>
</strong> pour le renvoyer s'il ne correspond pas aux sp&eacute;cifications.<br>
						<span class="muted small">Je serai averti 2 heures (maximum) apr&egrave;s la fin de la p&eacute;riode de participation uniquement si je suis s&eacute;lectionn&eacute;</span>
						<p></p>

						<div class="agreebox">
							<div class="inline-label"><i class="icon-arrow-right"></i> <strong>Je suis d'accord :</strong></div>
								<label class="radio inline">
									<input type="radio" value="yes" name="correctionaccept_<?php echo $this->_tpl_vars['article']['articleid']; ?>
" id="correctionaccept_<?php echo $this->_tpl_vars['article']['articleid']; ?>
" <?php echo $this->_tpl_vars['article']['accept_yes']; ?>
>Oui
								</label>	
								<label class="radio inline">
									<input type="radio" value="no" name="correctionaccept_<?php echo $this->_tpl_vars['article']['articleid']; ?>
" id="correctionaccept_<?php echo $this->_tpl_vars['article']['articleid']; ?>
" <?php echo $this->_tpl_vars['article']['accept_no']; ?>
>Non
								</label>	
							<div class="pull-right trash"><a onClick="fnCartCorrectionModifiers('c_remove','<?php echo $this->_tpl_vars['article']['articleid']; ?>
','main');" href="#delete-bid" data-toggle="modal" class="btn btn-link btn-mini disabled"><i class="icon-trash"></i> Supprimer</a></div>
						</div>
					</div>
				</div>
			</div>
			<!-- End, bidding -->
			<?php elseif ($this->_tpl_vars['article']['premium_option']): ?>
			<!-- Start, bidding PREMIUM Mission -->    
			<div class="mod  bid_item mp" id="cart_item_<?php echo $this->_tpl_vars['article']['articleid']; ?>
">
				<div class="row-fluid head">
					<div class="span12">
						<ul class="unstyled">
							<li class="pull-right muted">
								<div rel="tooltip" data-original-title="Client" class="btn btn-small disabled"><i class="icon-hand-right"></i> <?php echo $this->_tpl_vars['article']['company_name']; ?>
</div>
								<div class="btn btn-small disabled" rel="tooltip" data-original-title="Fin de réception des devis">
								<i class="icon-time"></i>
									<span id="time_<?php echo $this->_tpl_vars['article']['articleid']; ?>
_<?php echo $this->_tpl_vars['article']['timestamp']; ?>
">
										<span id="text_<?php echo $this->_tpl_vars['article']['articleid']; ?>
_<?php echo $this->_tpl_vars['article']['timestamp']; ?>
"><?php echo $this->_tpl_vars['article']['timestamp']; ?>
</span>
									</span>
								</div>
							</li>
							<li class="pull-left">
								<?php if ($this->_tpl_vars['article']['missiontest'] == 'yes'): ?>
									<span class="label label-test-mission" data-original-title="Mission garantie par Edit-place" rel="tooltip" data-placement="right">Mission Test</span>
								<?php else: ?>
									<span class="label label-premium" data-original-title="Mission garantie par Edit-place" rel="tooltip" data-placement="right">Mission Premium</span>
								<?php endif; ?>
							</li>
							<li class="pull-left title"><a href="/contrib/article-details?item=cart&misson_type=premium&mission_identifier=<?php echo $this->_tpl_vars['article']['articleid']; ?>
"  role="button" data-toggle="modal" data-target="#viewOffer-ajax"><?php echo $this->_tpl_vars['article']['title']; ?>
 <?php echo $this->_tpl_vars['article']['picon']; ?>
 <?php echo $this->_tpl_vars['article']['qicon']; ?>
</a></li>								
						</ul>
					</div>
				</div>
				<div class="row-fluid" id="cart_load_<?php echo $this->_tpl_vars['article']['articleid']; ?>
">
					<div class="span4">
						<div class="priceblock clearfix">
							<div  class="col1">
								<div class="pricetitle">Proposer un tarif <?php if ($this->_tpl_vars['article']['pricedisplay'] == 'yes'): ?><br>entre <span class="min"><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['price_min'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</span> -  <span class="max"><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['price_max'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &euro;</span><?php endif; ?></div> 
							</div>
							<div class="col2">
								<div class="input-append">
									<input id="contrib_price_<?php echo $this->_tpl_vars['article']['articleid']; ?>
_premium" type="text" value="<?php echo $this->_tpl_vars['article']['price_user']; ?>
" name="contrib_price_<?php echo $this->_tpl_vars['article']['articleid']; ?>
"  style="width: 80px;">
									<span class="add-on">&euro;</span>
								</div>
							</div>
						</div>
					</div>

					<div class="span8">
						Si je suis s&eacute;lectionn&eacute;, j'ai <strong><?php echo $this->_tpl_vars['article']['article_submit_time_text']; ?>
</strong> pour envoyer mon article et <strong><?php echo $this->_tpl_vars['article']['article_resubmit_time_text']; ?>
</strong> pour le renvoyer s'il ne correspond pas aux sp&eacute;cifications.<br>
						<span class="muted small">Je serai averti 2 heures (maximum) apr&egrave;s la fin de la p&eacute;riode de participation uniquement si je suis s&eacute;lectionn&eacute;</span>
						<p></p>

						<div class="agreebox">
							<div class="inline-label"><i class="icon-arrow-right"></i> <strong>Je suis d'accord :</strong></div>
								<label class="radio inline">
									<input type="radio" value="yes" name="accept_<?php echo $this->_tpl_vars['article']['articleid']; ?>
" id="accept_<?php echo $this->_tpl_vars['article']['articleid']; ?>
" <?php echo $this->_tpl_vars['article']['accept_yes']; ?>
>Oui
								</label>	
								<label class="radio inline">
									<input type="radio" value="no" name="accept_<?php echo $this->_tpl_vars['article']['articleid']; ?>
" id="accept_<?php echo $this->_tpl_vars['article']['articleid']; ?>
" <?php echo $this->_tpl_vars['article']['accept_no']; ?>
>Non
								</label>	
							<div class="pull-right trash"><a onClick="fnCartModifiers('remove','<?php echo $this->_tpl_vars['article']['articleid']; ?>
','main');" href="#delete-bid" data-toggle="modal" class="btn btn-link btn-mini disabled"><i class="icon-trash"></i> Supprimer</a></div>
						</div>
					</div>
				</div>
			</div>
			<!-- End, bidding -->
			<?php elseif (! $this->_tpl_vars['article']['premium_option']): ?>			
			<!-- Start, bidding Mission LIBERTE Quote -->    
			<div class="mod  bid_item dl" id="cart_item_<?php echo $this->_tpl_vars['article']['articleid']; ?>
">
				<div class="row-fluid head">
					<div class="span12">
						<ul class="unstyled">
							<li class="pull-right muted"><div data-original-title="Client" rel="tooltip" class="btn btn-small disabled"><i class="icon-hand-right"></i> <?php echo $this->_tpl_vars['article']['company_name']; ?>
</div>
								<div class="btn btn-small disabled" rel="tooltip" data-original-title="Fin de r&eacute;ception des devis">
									<i class="icon-time"></i>
									<span id="time_<?php echo $this->_tpl_vars['article']['articleid']; ?>
_<?php echo $this->_tpl_vars['article']['timestamp']; ?>
">
										<span id="text_<?php echo $this->_tpl_vars['article']['articleid']; ?>
_<?php echo $this->_tpl_vars['article']['timestamp']; ?>
"><?php echo $this->_tpl_vars['article']['timestamp']; ?>
</span>
									</span>
								</div></li>
							<li class="pull-left">
								<?php if ($this->_tpl_vars['article']['missiontest'] == 'yes'): ?>
									<span class="label label-test-mission" data-original-title="Vous travaillerez en direct avec le client" rel="tooltip" data-placement="right">Mission Test</span>
								<?php else: ?>
									<span class="label label-quote" data-original-title="Vous travaillerez en direct avec le client" rel="tooltip" data-placement="right">Mission Libert&eacute;</span>	
								<?php endif; ?>
							</li>
							<li class="pull-left title"><a href="/contrib/article-details?item=cart&misson_type=nopremium&mission_identifier=<?php echo $this->_tpl_vars['article']['articleid']; ?>
"  role="button" data-toggle="modal" data-target="#viewOffer-ajax"><?php echo $this->_tpl_vars['article']['title']; ?>
 <?php echo $this->_tpl_vars['article']['picon']; ?>
 <?php echo $this->_tpl_vars['article']['qicon']; ?>
</a></li>
						</ul>
					</div>
				</div>

				<div class="row-fluid" id="cart_load_<?php echo $this->_tpl_vars['article']['articleid']; ?>
">
					<div class="span4">							
						<div class="priceblock clearfix">
							<?php if ($this->_tpl_vars['article']['AOtype'] == 'private' && $this->_tpl_vars['article']['price_max']): ?>
								<div  class="col1">
									<div class="pricetitle">Proposer un tarif <?php if ($this->_tpl_vars['article']['pricedisplay'] == 'yes'): ?><br>entre <span class="min"><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['price_min'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
</span> -  <span class="max"><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['price_max'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &euro;</span><?php endif; ?></div> 
								</div>
								<div class="col2 brutvalue">
									<div class="input-append">
										<input id="contrib_price_<?php echo $this->_tpl_vars['article']['articleid']; ?>
_privatenopremium" onKeyup="shownetprice('contrib_price_<?php echo $this->_tpl_vars['article']['articleid']; ?>
_privatenopremium','<?php echo $this->_tpl_vars['article']['contrib_percentage']; ?>
');" value ="<?php echo $this->_tpl_vars['article']['price_user']; ?>
" type="text" name="contrib_price_<?php echo $this->_tpl_vars['article']['articleid']; ?>
"  style="width: 80px;">
										<span class="add-on">&euro;</span>
									</div>
								</div>
							<?php else: ?>
								<div class="col1">
									<div class="pricetitle">Proposer un tarif</div> 
								</div>
								<div class="col2 brutvalue"> 
									<div class="input-append">
										<input id="contrib_price_<?php echo $this->_tpl_vars['article']['articleid']; ?>
_nopremium" onKeyup="shownetprice('contrib_price_<?php echo $this->_tpl_vars['article']['articleid']; ?>
_nopremium','<?php echo $this->_tpl_vars['article']['contrib_percentage']; ?>
');" value ="<?php echo $this->_tpl_vars['article']['price_user']; ?>
" type="text" name="contrib_price_<?php echo $this->_tpl_vars['article']['articleid']; ?>
"  style="width: 80px;">
										<span class="add-on">&euro;</span>
									</div>
								</div>	 
							<?php endif; ?>	
							<?php echo smarty_function_math(array('equation' => "x - y",'x' => 100,'y' => $this->_tpl_vars['article']['contrib_percentage'],'assign' => 'eppercent'), $this);?>

							<div class="tax">
								<div class="netvalue">Tarif propos&eacute; au client : <b><span id="netprice"><?php echo $this->_tpl_vars['article']['netprice']; ?>
</span> &euro;</b></div>
								<small>Commission Edit-place incluse : <?php echo $this->_tpl_vars['eppercent']; ?>
%</small>
							</div>
														

							<div class="clearfix setdate">
								<div class="col1">
									<div class="pricetitle">Tarif valable jusqu'au</div> 
								</div>
								<div class="col2">
									<div class="input-append date" id="date_limit_<?php echo $this->_tpl_vars['article']['articleid']; ?>
" data-date="<?php echo ((is_array($_tmp=$this->_tpl_vars['article']['date_limit'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
" data-date-format="dd/mm/yyyy">
										<input type="text" id="idate_limit_<?php echo $this->_tpl_vars['article']['articleid']; ?>
" name="date_limit_<?php echo $this->_tpl_vars['article']['articleid']; ?>
" readonly placeholder="JJ/MM/AA" style="width: 80px;" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['article']['date_limit'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
"><span class="add-on"><i class="icon-calendar"></i></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="span8">
						<p>Si je suis s&eacute;lectionn&eacute;, j'ai <strong><?php echo $this->_tpl_vars['article']['article_submit_time_text']; ?>
</strong> pour envoyer mon article.
						<!--et <strong><?php echo $this->_tpl_vars['article']['article_resubmit_time_text']; ?>
</strong> pour le renvoyer s'il ne correspond pas aux sp&eacute;cifications.-->
						</p>
						<div class="agreebox">
							<div class="inline-label"><i class="icon-arrow-right"></i> <strong>Je suis d'accord :</strong></div>
								<label class="radio inline">
									<input type="radio" value="yes" name="accept_<?php echo $this->_tpl_vars['article']['articleid']; ?>
" id="accept_<?php echo $this->_tpl_vars['article']['articleid']; ?>
" <?php echo $this->_tpl_vars['article']['accept_yes']; ?>
>Oui
								</label>	
								<label class="radio inline">
									<input type="radio" value="no" name="accept_<?php echo $this->_tpl_vars['article']['articleid']; ?>
" id="accept_<?php echo $this->_tpl_vars['article']['articleid']; ?>
" <?php echo $this->_tpl_vars['article']['accept_no']; ?>
>Non
								</label>	
							<div class="pull-right trash"><a onClick="fnCartModifiers('remove','<?php echo $this->_tpl_vars['article']['articleid']; ?>
','main');" href="#delete-bid" data-toggle="modal" class="btn btn-link btn-mini disabled"><i class="icon-trash"></i> Supprimer</a></div>
						</div>
					</div>
				</div>
			</div>
			<!-- End, bidding -->   			  
			<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
				<div class="mod">
					<div class="pull-right">
						<a class="btn inline" type="button" href="/contrib/aosearch">Annuler</a>
						<button class="btn btn-primary inline" id="cart-submit">Valider</button>
					</div>
				</div>
			<?php endif; ?>
			
		</form>
	</section>
</div>