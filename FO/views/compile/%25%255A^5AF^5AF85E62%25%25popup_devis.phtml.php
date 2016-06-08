<?php /* Smarty version 2.6.19, created on 2015-08-25 12:15:06
         compiled from Contrib/popup_devis.phtml */ ?>
<?php echo '
<script type="text/javascript">
// tooltip activation
    $("[rel=tooltip]").tooltip();
	$("[rel=popover]").popover();	
	startTimer(\'time1\',\'text1\'); //timer ids starting with
	startTimer(\'time2\',\'text2\');//timer ids starting with
</script>
'; ?>

<?php if ($this->_tpl_vars['pollDetails'] | @ count > 0): ?>
	<?php $_from = $this->_tpl_vars['pollDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['details'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['details']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['poll']):
        $this->_foreach['details']['iteration']++;
?>
	<section id="a_o">
		
			<?php if ($this->_tpl_vars['mission_type'] == 'poll_premium'): ?>
				<div class="dp">
				<span data-placement="right" rel="tooltip" data-original-title="Cette annonce est susceptible de devenir une mission Premium" class="label label-quote-premium">Devis premium</span>
			<?php elseif ($this->_tpl_vars['mission_type'] == 'poll_nopremium'): ?>
				<div class="dl">
				<span data-placement="right" rel="tooltip" data-original-title="Vous travaillerez en direct avec le client" class="label label-quote">Devis  Libert&eacute;</span>	
			<?php endif; ?>			
			<h2><?php echo $this->_tpl_vars['poll']['title']; ?>
</h2>

			<div class="summary clearfix">
					<ul class="unstyled">
						<li><strong>Appel &agrave; r&eacute;daction</strong> <span class="bullet">&#9679;</span></li>
						<li> Langue : <img class="flag flag-<?php echo $this->_tpl_vars['poll']['language']; ?>
" src="/FO/images/shim.gif" data-placement="left" rel="tooltip" data-original-title="<?php echo $this->_tpl_vars['poll']['language_name']; ?>
"> <span class="bullet">&#9679;</span></li>
						<li>Cat&eacute;gorie : <?php echo $this->_tpl_vars['poll']['category']; ?>
 <span class="bullet">&#9679;</span></li>
						<li>Nb. de mots : <?php echo $this->_tpl_vars['poll']['min_sign']; ?>
 - <?php echo $this->_tpl_vars['poll']['max_sign']; ?>
 / article <span class="bullet">&#9679;</span></li>
						<li><a href="#comment" class="scroll" id="comment_count_1"><i class="icon-comment"></i> <?php echo $this->_tpl_vars['commentCount']; ?>
</a></li>
						<?php if ($this->_tpl_vars['poll']['spec_exists'] == 'yes'): ?>
							<li class="pull-right"><a href="/contrib/download-file?type=pollbrief&article_id=<?php echo $this->_tpl_vars['poll']['pollId']; ?>
" class="btn btn-small btn-success"><i class="icon-white icon-circle-arrow-down"></i> T&eacute;l&eacute;charger le brief client</a></li>
						<?php endif; ?>	
					</ul>
				</div>

			<div class="a_o-details">
				<!-- start, colonne generale -->
				<div class="row-fluid">
					<div class="span7">
					<!-- start, colonne stat -->
						<div class="row-fluid stat-block">
							<div class="span4 section">Temps restant
								<p>
									<?php if ($this->_tpl_vars['upcoming'] == 'yes'): ?>
										&#9679;&#9679;&#9679;
									<?php else: ?>
										<span id="time1_<?php echo $this->_tpl_vars['poll']['pollId']; ?>
_<?php echo $this->_tpl_vars['poll']['timestamp']; ?>
">
											<span id="text1_<?php echo $this->_tpl_vars['poll']['pollId']; ?>
_<?php echo $this->_tpl_vars['poll']['timestamp']; ?>
"><?php echo $this->_tpl_vars['poll']['timestamp']; ?>
</span>
										</span>
									<?php endif; ?>	
								</p>
						  </div>
								<div class="span4 section"><span rel="popover" data-placement="top" data-html="true" data-content="* Temps indicatif si le devis devient mission  premium" data-trigger="hover">Temps estim&eacute; de production
							    <p>
										<?php if ($this->_tpl_vars['upcoming'] == 'yes'): ?>
											&#9679;&#9679;&#9679;
										<?php else: ?>
											<em><?php echo $this->_tpl_vars['poll']['production_time']; ?>
</em> h
										<?php endif; ?>									</p>
								</span>								</div>
							<div class="span4 section">Client<p><img src="<?php echo $this->_tpl_vars['poll']['client_pic']; ?>
"  class="logo"/></p></div>
						</div>
						<div class="row-fluid note">
							<div class="span12">
								<?php if ($this->_tpl_vars['mission_type'] == 'poll_premium'): ?>
									<p><i class="icon-info-sign icon-white"></i> R&eacute;pondez à ce devis et <strong>soyez prioritaire pendant 24h</strong> si l'annonce se transforme en <span class="label label-premium">mission premium</span></p>
								<?php elseif ($this->_tpl_vars['mission_type'] == 'poll_nopremium'): ?>
									<p><i class="icon-info-sign icon-white"></i> <strong>Tentez votre chance !</strong> Attention, Il peut s'agir d'une simple demande d'information ou d'une vraie mission de r&eacute;daction.</p>
								<?php endif; ?>
							</div>

						</div>
					<!-- end, colonne stat -->
					</div>

					<div class="span5">
						<table class="table">
							<?php if ($this->_tpl_vars['upcoming'] == 'yes'): ?>
								<tr><td class="title">Ouverture de l'annonce</td><td class="countdown"><?php echo $this->_tpl_vars['poll']['publishtime_format']; ?>
</td></tr>
								<tr>
									<td colspan="2" class="cta" >
										<span id="alert_<?php echo $this->_tpl_vars['poll']['pollId']; ?>
">											
											<?php if ($this->_tpl_vars['poll']['alert_subscribe'] == 'no'): ?>
												<button class="btn" onclick="subscribeAOAlert('<?php echo $this->_tpl_vars['poll']['pollId']; ?>
','yes','poll');"><i class="icon-bell"></i> Etre alert&eacute;</button>
											<?php elseif ($this->_tpl_vars['poll']['alert_subscribe'] == 'yes'): ?>
												<a class="btn btn-small btn-primary" onclick="subscribeAOAlert('<?php echo $this->_tpl_vars['poll']['pollId']; ?>
','no','poll');"><i class="icon-remove icon-white"></i> Alerte programm&eacute;e</a>
											<?php endif; ?>
										</span>
										
									</td>
								</tr>
							<?php else: ?>
								<tr><td class="title">Participants</td><td class="countdown"><em><a href="#" rel="popover" data-original-title="Info participants" data-placement="left" data-html="true" <?php if ($this->_tpl_vars['poll']['participants_pic']): ?> data-content="<?php echo $this->_tpl_vars['poll']['participants_pic']; ?>
" data-trigger="hover"<?php endif; ?>><?php echo $this->_tpl_vars['poll']['totalParticipation']; ?>
</a></em></td></tr>
								<tr><td class="title">Dernier prix propos&eacute;</td><td class="countdown"><em><a href="#" rel="popover" data-original-title="Tous les prix proposés" data-placement="left" data-html="true" <?php if ($this->_tpl_vars['poll']['participants_price']): ?> data-content="<?php echo $this->_tpl_vars['poll']['participants_price']; ?>
" data-trigger="hover"<?php endif; ?>>
								<?php if ($this->_tpl_vars['poll']['latestPrice']): ?> 
									<?php echo $this->_tpl_vars['poll']['latestPrice']; ?>
 &euro;
								<?php else: ?>
									NA
								<?php endif; ?>
								
								</a></em></td></tr>
								<?php if (! $this->_tpl_vars['request_from'] && $this->_tpl_vars['ResponseExist'] == 'yes'): ?>
								<tr><td colspan="2" class="cta" id="tender_select_<?php echo $this->_tpl_vars['poll']['pollId']; ?>
">								
									<?php if ($this->_tpl_vars['poll']['display'] == 'no' || $this->_tpl_vars['disabled'] == 'yes'): ?>
										<button class="btn btn-large btn-primary disabled">Annonce ajout&eacute;e</button>	
									<?php elseif ($this->_tpl_vars['poll']['attended'] == 'YES'): ?>								
										<button  onClick="fnCartDevisModifiers('p_remove','<?php echo $this->_tpl_vars['poll']['pollId']; ?>
','');" class="btn btn-large btn-danger">Annonce ajout&eacute;e</button>
									<?php elseif ($this->_tpl_vars['poll']['attended'] == 'NO'): ?>
										<button onClick="fnCartDevisModifiers('p_add','<?php echo $this->_tpl_vars['poll']['pollId']; ?>
','');" class="btn btn-large btn-primary">Je participe ! </button>
									<?php endif; ?>	
									</td></tr>
								<?php endif; ?>
							<?php endif; ?>	
						</table>
					</div>
				</div>
				<!-- end, colonne generale -->
				<?php if ($this->_tpl_vars['upcoming'] != 'yes'): ?>
					<!-- Start, question form -->
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Contrib/popup_devis-q.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	
					<!-- Stop, question form -->				
				<?php endif; ?>	
				
			</div>
			<!-- Start, comment form -->
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Contrib/article-comments.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<!-- Stop, comment form -->
			
		</div>
	</section>

	<a href="#brand" class="pull-right btn btn-small disabled anchor-top scroll"><i class="icon-arrow-up"></i></a>
	<div id = "confirmDiv"></div>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Contrib/popup_confirm_selection.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endforeach; endif; unset($_from); ?>
<?php else: ?>
<section>
	<div class="row-fluid">
		<div class="pull-center span10 offset1">
			<p class="text-error lead"> Vous ne pouvez pas participer &agrave; cette mission.</p>
		</div>
	</div>
</section>
<?php endif; ?>	
<?php echo '
<script>
 	$(".scroll").click(function(event){		
		event.preventDefault();
		$(\'html,body\').animate({scrollTop:$(this.hash).offset().top}, 500);
	});
</script>	
'; ?>