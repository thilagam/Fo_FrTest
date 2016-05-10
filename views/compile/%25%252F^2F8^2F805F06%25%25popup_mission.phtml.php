<?php /* Smarty version 2.6.19, created on 2016-04-29 16:33:51
         compiled from Contrib/popup_mission.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'zero_cut', 'Contrib/popup_mission.phtml', 110, false),array('function', 'math', 'Contrib/popup_mission.phtml', 132, false),)), $this); ?>
<!--$finished to display finshed Ao style
$upcmoing to check upcoming ao block styles--> 
<?php echo '
<script type="text/javascript">
	var cur_date='; ?>
<?php echo time(); ?>
<?php echo ';
	var js_date=(new Date().getTime())/ 1000;
	var diff_date=Math.floor(js_date-cur_date);
// tooltip activation
    $("[rel=tooltip]").tooltip();
	$("[rel=popover]").popover();	
	startTimer(\'time1\',\'text1\'); //timer ids starting with
	startTimer(\'time2\',\'text2\');//timer ids starting with
</script>
'; ?>

<?php if ($this->_tpl_vars['articleDetails'] | @ count > 0): ?>
	<?php $_from = $this->_tpl_vars['articleDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['details'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['details']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['article']):
        $this->_foreach['details']['iteration']++;
?>
		<section id="a_o">
			<?php if ($this->_tpl_vars['mission_type'] == 'premium'): ?>
				<div class="mp">
					<?php if ($this->_tpl_vars['article']['missiontest'] == 'yes'): ?>
						<span class="label label-test-mission" data-original-title="Mission garantie par Edit-place" rel="tooltip" data-placement="right">Staffing</span>
					<?php else: ?>
						<span class="label label-premium" data-original-title="Mission garantie par Edit-place" rel="tooltip" data-placement="right">Mission Premium</span>
					<?php endif; ?>
			<?php elseif ($this->_tpl_vars['mission_type'] == 'nopremium'): ?>	
				<div class="dl">
					<?php if ($this->_tpl_vars['article']['missiontest'] == 'yes'): ?>
						<span class="label label-test-mission" data-original-title="Vous travaillerez en direct avec le client" rel="tooltip" data-placement="right">Staffing</span>
					<?php else: ?>
						<span class="label label-quote" data-original-title="Vous travaillerez en direct avec le client" rel="tooltip" data-placement="right">Mission Libert&eacute;</span>
					<?php endif; ?>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['article']['view_to'] == 'sc'): ?>
				<span data-original-title="Niveau Senior" data-content="Je suis un contributeur confirm&eacute; chez Edit-place." rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>S&eacute;nior</span>
			<?php elseif ($this->_tpl_vars['article']['view_to'] == 'jc'): ?>
				<span data-original-title="Accessible au Junior" data-content="Au moins 1 article valid&eacute; sur Edit-place" rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>Junior</span>
			<?php elseif ($this->_tpl_vars['article']['view_to'] == 'jc0'): ?>
				<span data-original-title="Accessible au D&eacute;butant" data-content="Aucun article encore valid&eacute; sur Edit-place" rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>D&eacute;butant</span>	
			<?php endif; ?>			
			<?php if ($this->_tpl_vars['article']['link_quiz'] == 'yes' && $this->_tpl_vars['article']['quiz']): ?>
				<span class="label label-inverse" data-original-title="Participation soumis &agrave; un Quizz" rel="tooltip" data-placement="right">Quizz</span>
			<?php endif; ?>
				<h2><?php echo $this->_tpl_vars['article']['title']; ?>
 <?php echo $this->_tpl_vars['article']['picon']; ?>
</h2>				

				<div class="summary clearfix">
					<ul class="unstyled">
						<li><strong>Appel &agrave; r&eacute;daction</strong> <span class="bullet">&#9679;</span></li>
						<li> Langue : <img class="flag flag-<?php echo $this->_tpl_vars['article']['language']; ?>
" src="/FO/images/shim.gif" data-placement="left" rel="tooltip" data-original-title="<?php echo $this->_tpl_vars['article']['language_name']; ?>
"> <span class="bullet">&#9679;</span></li>
						<li>Cat&eacute;gorie : <?php echo $this->_tpl_vars['article']['category']; ?>
 <span class="bullet">&#9679;</span></li>
						<li>Nb. de mots : <?php echo $this->_tpl_vars['article']['num_min']; ?>
 - <?php echo $this->_tpl_vars['article']['num_max']; ?>
 / article<span class="bullet">&#9679;</span></li>
						<li><a href="#comment" class="scroll" id="comment_count_1"><i class="icon-comment"></i> <?php echo $this->_tpl_vars['commentCount']; ?>
</a></li>
						<?php if ($this->_tpl_vars['article']['spec_exists'] == 'yes'): ?>
							<li class="pull-right"><a href="/contrib/download-file?type=clientbrief&article_id=<?php echo $this->_tpl_vars['article']['articleid']; ?>
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
										
									<?php elseif ($this->_tpl_vars['finished'] == 'yes'): ?>
										Termin&eacute;
									<?php else: ?>	
										<span id="time1_<?php echo $this->_tpl_vars['article']['articleid']; ?>
_<?php echo $this->_tpl_vars['article']['timestamp']; ?>
">
											<span id="text1_<?php echo $this->_tpl_vars['article']['articleid']; ?>
_<?php echo $this->_tpl_vars['article']['timestamp']; ?>
"><?php echo $this->_tpl_vars['article']['timestamp']; ?>
</span>
										</span>
									<?php endif; ?>	
								</p>
								</div>
								<div class="span4 section">Temps estim&eacute; de production
								  <p>
								    <?php if ($this->_tpl_vars['upcoming'] == 'yes'): ?>
								    &#9679;&#9679;&#9679;
								    <?php else: ?>
								    <?php echo $this->_tpl_vars['article']['article_submit_time_text']; ?>

								    <?php endif; ?>	
							      </p>
							  </div><div class="span4 section">Client<p><img src="<?php echo $this->_tpl_vars['article']['client_pic']; ?>
"  class="logo"/></p></div>
							</div>
							<div class="row-fluid note">
								<div class="span12">
									<?php if ($this->_tpl_vars['mission_type'] == 'premium'): ?>
										<?php if ($this->_tpl_vars['article']['estimated_worktime'] > 0): ?>
											<div class="section">
												<span data-placement="right" data-trigger="hover" rel="popover" data-content="Estimation r&eacute;alis&eacute;e par votre chef de projet." data-original-title="Temps de travail estim&eacute;">Temps de travail estim&eacute; <i class="icon-info-sign icon-white"></i></span>
												<p><?php echo $this->_tpl_vars['article']['estimated_worktime_text']; ?>
</p>
											</div>
										<?php else: ?>
											<p><i class="icon-info-sign icon-white"></i>Cette commande est garantie par edit-place. Si vous &ecirc;tes s&eacute;lectionn&eacute;, vous &ecirc;tes s&ucirc;r de r&eacute;diger imm&eacute;diatement</p>
										<?php endif; ?>	
									<?php elseif ($this->_tpl_vars['mission_type'] == 'nopremium'): ?>																			
										<p><i class="icon-info-sign icon-white"></i> <strong>Tentez votre chance !</strong> Attention, Il peut s'agir d'une simple demande d'information ou d'une vraie mission de r&eacute;daction.</p>
									<?php endif; ?>		
								</div>
							</div>
							<!-- end, colonne stat -->
						</div>
						<div class="span5">
							<table class="table table-hover">
							<?php if ($this->_tpl_vars['upcoming'] == 'yes'): ?>
								<?php if ($this->_tpl_vars['mission_type'] == 'premium' || ( $this->_tpl_vars['article']['AOtype'] == 'private' && $this->_tpl_vars['article']['price_max'] )): ?>
									<tr><td class="title">Fourchette de prix</td><td class="countdown"><em><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['price_min'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['article']['price_max'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &euro;</em></td></tr>
								<?php endif; ?>
								<tr><td class="title">Ouverture de l'annonce</td><td class="countdown"><?php echo $this->_tpl_vars['article']['publishtime_format']; ?>
</td></tr>
								<tr>
									<td colspan="2" class="cta" >
										<span id="alert_<?php echo $this->_tpl_vars['article']['deliveryid']; ?>
">											
											<?php if ($this->_tpl_vars['article']['alert_subscribe'] == 'no'): ?>
												<button class="btn" onclick="subscribeAOAlert('<?php echo $this->_tpl_vars['article']['deliveryid']; ?>
','yes','article');"><i class="icon-bell"></i> Etre alert&eacute;</button>
											<?php elseif ($this->_tpl_vars['article']['alert_subscribe'] == 'yes'): ?>
												<a class="btn btn-small btn-primary" onclick="subscribeAOAlert('<?php echo $this->_tpl_vars['article']['deliveryid']; ?>
','no','article');"><i class="icon-remove icon-white"></i> Alerte programm&eacute;e</a>
											<?php endif; ?>
										</span>
										
									</td>
								</tr>
							<?php else: ?>
							
								<?php if ($this->_tpl_vars['article']['pricedisplay'] == 'yes'): ?>
									<tr>
										<td class="title">Participants <?php echo $this->_tpl_vars['article']['picon']; ?>
</td>
										<td class="countdown"><?php echo $this->_tpl_vars['article']['participants_pic']; ?>

										<?php if ($this->_tpl_vars['article']['participants'] > 2): ?>
											<span class="more-contrib">+<?php echo smarty_function_math(array('equation' => "(x-2)",'x' => $this->_tpl_vars['article']['participants']), $this);?>
</span>
										<?php elseif ($this->_tpl_vars['article']['participants'] == 0): ?>	
											<span class="more-contrib">0</span>
										<?php endif; ?>	
										</td>
									</tr>							
								<?php else: ?>
									<tr>
										<td class="countdown contrib-list">
											<div class="title">Participants <?php echo $this->_tpl_vars['article']['picon']; ?>
</div>
											<?php echo $this->_tpl_vars['article']['participants_pic']; ?>

											<?php if ($this->_tpl_vars['article']['participants'] > 5): ?>
												<span class="more-contrib">+<?php echo smarty_function_math(array('equation' => "(x-5)",'x' => $this->_tpl_vars['article']['participants']), $this);?>
</span>
											<?php elseif ($this->_tpl_vars['article']['participants'] == 0): ?>	
												<span class="more-contrib">0</span>
											<?php endif; ?>
										</td>
									</tr>									
								<?php endif; ?>	
							
								<?php if (( $this->_tpl_vars['mission_type'] == 'premium' || ( $this->_tpl_vars['article']['AOtype'] == 'private' && $this->_tpl_vars['article']['price_max'] ) ) && $this->_tpl_vars['article']['pricedisplay'] == 'yes'): ?>
									<?php if ($this->_tpl_vars['article']['price_max'] == 0 && $this->_tpl_vars['article']['price_min'] == 0): ?>
										<tr><td class="title">Mission test</td><td class="countdown" style="text-transform:none"><em>0 &euro;</em></td></tr>
									<?php else: ?>
										<tr><td class="title">Fourchette de prix</td><td class="countdown" style="text-transform:none"><em><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['price_min'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['article']['price_max'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &euro;</em></td></tr>
									<?php endif; ?>	
								<?php endif; ?>
								
																<?php if ($this->_tpl_vars['finished'] == 'yes'): ?>
									<tr class="warning">
										<td colspan="2" class="cta"><strong><i class="icon-warning-sign"></i> D&eacute;lai de participation d&eacute;pass&eacute;</strong></td>
									</tr>
								<?php elseif ($this->_tpl_vars['no_permission'] == 'yes'): ?>
									<tr class="warning">
											<td colspan="2" class="cta"><strong><i class="icon-warning-sign"></i> D&eacute;sol&eacute; ! L'annonce est r&eacute;serv&eacute;e exclusivement au 
											<?php if ($this->_tpl_vars['article']['view_to'] == 'sc'): ?>
												<span class="label label-level"><i class="icon-bookmark"></i>S&eacute;nior</span>
											<?php elseif ($this->_tpl_vars['article']['view_to'] == 'jc'): ?>
												<span class="label label-level"><i class="icon-bookmark"></i>Junior</span>
											<?php elseif ($this->_tpl_vars['article']['view_to'] == 'jc0'): ?>
												<span class="label label-level"><i class="icon-bookmark"></i>D&eacute;butant</span>												
											<?php elseif ($this->_tpl_vars['article']['view_to'] == 'sc,jc' || $this->_tpl_vars['article']['view_to'] == 'jc,sc'): ?>
												<span class="label label-level"><i class="icon-bookmark"></i>S&eacute;nior</span><span class="label label-level"><i class="icon-bookmark"></i>Junior</span>
											<?php endif; ?>
											</strong></td>
									</tr>
								<?php elseif (! $this->_tpl_vars['request_from']): ?>
									<tr><td colspan="2" class="cta" id="tender_select_<?php echo $this->_tpl_vars['article']['articleid']; ?>
">
									
									<?php if ($this->_tpl_vars['article']['display'] == 'no' || $this->_tpl_vars['disabled'] == 'yes'): ?>
										<button class="btn btn-large btn-primary disabled">Annonce ajout&eacute;e</button>
                                    <?php elseif ($this->_tpl_vars['article']['attended'] == 'YES'): ?>
                                            <button  onClick="fnCartModifiers('remove','<?php echo $this->_tpl_vars['article']['articleid']; ?>
','','<?php echo $this->_tpl_vars['article']['deliveryid']; ?>
');" class="btn btn-large btn-danger">Annonce ajout&eacute;e</button>
									<?php elseif ($this->_tpl_vars['article']['attended'] == 'NO'): ?>
										<button  onClick="fnCartModifiers('add','<?php echo $this->_tpl_vars['article']['articleid']; ?>
','','<?php echo $this->_tpl_vars['article']['deliveryid']; ?>
');" class="btn btn-large btn-primary">Je participe ! </button>
									<?php endif; ?>	
									</td></tr>
								<?php endif; ?>	
							<?php endif; ?>	
							</table>
						</div>
					</div>
					<!-- end, colonne generale -->
				</div>
				<?php if ($this->_tpl_vars['no_permission'] == 'yes'): ?>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Contrib/mission-badStatus.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				<?php endif; ?>
				<?php if (! $this->_tpl_vars['finished'] && ! $this->_tpl_vars['no_permission']): ?>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Contrib/article-comments.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				<?php endif; ?>	
			</div>
		</section>
		<a href="#brand" class="pull-right btn btn-small disabled anchor-top scroll"><i class="icon-arrow-up"></i></a>
		<div id = "confirmDiv"></div>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Contrib/popup_confirm_selection.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		
		<!--Quiz Confirmation modal-->
		<div id="gotoQuizz" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 id="myModalLabel">Quizz de pr&eacute;s&eacute;lection</h3>
			</div>
			<div class="modal-body">
				<p> Pour ajouter cette annonce &agrave; votre s&eacute;lection, vous devez r&eacute;pondre &agrave; un quizz sur la th&eacute;matique.</p>
				<p><i class="icon-time"></i>  Vous disposerez de <strong><?php echo $this->_tpl_vars['article']['quiz_duration']; ?>
 minutes</strong> pour r&eacute;pondre aux questions. Ready ?</p> 
			</div>
			<div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Annuler</button>
				<a class="btn btn-primary" data-target="#playQuizz-ajax" data-toggle="modal" role="button" href="/quiz/participate-quiz?article_id=<?php echo $this->_tpl_vars['article']['articleid']; ?>
&quiz_identifier=<?php echo $this->_tpl_vars['article']['quiz']; ?>
" id="btnPlayQuizz">D&eacute;marrer le quizz</a>
				
			</div>
		</div>
		
	<?php endforeach; endif; unset($_from); ?>
<?php else: ?>
<section>
	<div class="row-fluid">
		<div class="pull-center span10 offset1">
			<p class="text-error lead">Vous ne pouvez pas participer &agrave; cette mission.</p>
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
	$(\'#btnPlayQuizz\').click(function () {
		
		/* $(\'#playQuizz-ajax\').modal(
		{
				remote: \'quizz.html\'
		}
    	);	
		$(\'#playQuizz-ajax\').modal(\'show\'); */
		$(\'#gotoQuizz\').modal(\'hide\');
		$(\'#viewOffer-ajax\').modal(\'hide\');
		
		
		});	
</script>	
'; ?>