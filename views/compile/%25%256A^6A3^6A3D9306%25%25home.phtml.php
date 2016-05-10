<?php /* Smarty version 2.6.19, created on 2015-12-03 12:53:00
         compiled from Contrib/home.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'zero_cut', 'Contrib/home.phtml', 54, false),array('modifier', 'count', 'Contrib/home.phtml', 69, false),array('modifier', 'strlen', 'Contrib/home.phtml', 87, false),array('modifier', 'stripslashes', 'Contrib/home.phtml', 87, false),array('modifier', 'truncate', 'Contrib/home.phtml', 87, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
var cur_date=0,js_date=0,diff_date=0;
cur_date='; ?>
<?php echo time(); ?>
<?php echo ';
js_date=(new Date().getTime())/ 1000;
diff_date=Math.floor(js_date-cur_date); 
$("#menu_home").addClass("active");
</script>
'; ?>

<div class="container">
	<!-- start, status -->
		<div class="row-fluid">		
			<div id="getstarted" class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<h4>Pour bien d&eacute;marrer !</h4>
				<p class="pull-right"><a href="#help" class="btn scroll">Comment &ccedil;a marche ?</a></p> 
				<ul class="unstyled">
					<li><i class="icon icon-ok"></i> 1 seul r&eacute;dacteur est s&eacute;lectionn&eacute; par mission</li>
					<li><i class="icon icon-ok"></i> Ne commencez &agrave; r&eacute;diger qu'une fois s&eacute;lectionn&eacute;  par Edit-place ou le client</li>
					<li><i class="icon icon-ok"></i> Respectez les dates de rendu et le brief</li>
			   </ul>
			</div>		 
			<!-- start, get contributor status -->
			<section id="status">
				<div class="row-fluid">
					<div class="profilehead-mod">
						<div class="span5 profile-name">
							<a href="/contrib/private-profile" class="pull-left imgframe">
								<img src="<?php echo $this->_tpl_vars['contrib_home_picture']; ?>
" title="<?php echo $this->_tpl_vars['client_email']; ?>
" class="media-object">
							</a>
							<?php if ($this->_tpl_vars['profileType'] == 'senior'): ?>
								<span data-original-title="S&eacute;nior" data-content="Je suis un contributeur confirm&eacute; chez Edit-place." rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>S&eacute;nior</span>
							<?php elseif ($this->_tpl_vars['profileType'] == 'junior'): ?>
								<span data-original-title="Junior" data-content="Au moins 1 article valid&eacute; sur Edit-place" rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>Junior</span>
							<?php elseif ($this->_tpl_vars['profileType'] == 'sub-junior'): ?>
								<span data-original-title="D&eacute;butant" data-content="Aucun article encore valid&eacute; sur Edit-place" rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>D&eacute;butant</span>	
							<?php endif; ?>
							<h3><?php echo $this->_tpl_vars['client_email']; ?>
</h3>
						</div>
						
						<div class="span3 stat">
							<div class="progress progress-success">
							<div class="bar" style="width: <?php echo $this->_tpl_vars['profile_percentage']; ?>
%"></div>
							</div>
							Votre profil est rempli &agrave; <strong><?php echo $this->_tpl_vars['profile_percentage']; ?>
%</strong>
							<div class="btn-link"><a href="/contrib/modify-profile">Mettre &agrave; jour</a></div>
						</div>

						<div class="span2 stat">
							<p>Participation en cours</p>
							<p class="num-large"><a href="/contrib/ongoing"><?php echo $this->_tpl_vars['participation_Count']; ?>
</a></p>
						</div>
						
						<div class="span2 stat"><p>Total royalties</p><p class="num-large"><a href="/contrib/royalties"><?php echo ((is_array($_tmp=$this->_tpl_vars['userRoyalty'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &euro;</a></p></div>
					</div>
				</div>

			</section>
			<!-- end, contributor status -->
		 
			<div class="row-fluid"> 
				<div class="span8">

					<section id="quick-classified">
						<div class="mod">
							<span class="pull-right icon-waiting-quote" data-original-title="Plus de temps � perdre ! Faites une offre, vite" rel="tooltip"></span>
							<h4>R&eacute;pondez &agrave; ces nouvelles annonces</h4>
							<table class="table table-hover">
								<?php if (count($this->_tpl_vars['recent_AO_Offers']) > 0): ?>
									<?php $_from = $this->_tpl_vars['recent_AO_Offers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['offer']):
?>										
										<tr>
											<?php if ($this->_tpl_vars['offer']['ao_type'] == 'correction'): ?>
												<td>
													<?php if ($this->_tpl_vars['offer']['missiontest'] == 'yes'): ?>
														<span class="label label-test-mission" data-original-title="Garanteed long-term Mission" rel="tooltip" data-placement="right"><i class="icon-star icon-white"></i> Mission de correction test</span>
													<?php else: ?>
														<span class="label label-correction" data-original-title="Mission garantie par Edit-place" rel="tooltip" data-placement="right">Mission Correction</span>
													<?php endif; ?>	
												<?php if ($this->_tpl_vars['offer']['view_to'] == 'sc'): ?>
													<span data-original-title="Niveau Senior" data-content="Je suis un contributeur confirm&eacute; chez Edit-place." rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>S</span>
												<?php elseif ($this->_tpl_vars['offer']['view_to'] == 'jc'): ?>
													<span data-original-title="Accessible au Junior" data-content="Au moins 1 article valid&eacute; sur Edit-place" rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>J</span>
												<?php elseif ($this->_tpl_vars['offer']['view_to'] == 'jc0'): ?>
													<span data-original-title="Accessible au D&eacute;butant" data-content="Aucun article encore valid&eacute; sur Edit-place" rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>D</span>	
												<?php endif; ?>
												</td>
												<td class="title"><a href="/contrib/article-details?misson_type=correction&mission_identifier=<?php echo $this->_tpl_vars['offer']['articleid']; ?>
" role="button" data-toggle="modal" data-target="#viewOffer-ajax"><span <?php if (((is_array($_tmp=$this->_tpl_vars['offer']['title'])) ? $this->_run_mod_handler('strlen', true, $_tmp) : smarty_modifier_strlen($_tmp)) > 70): ?> rel="tooltip" align="top" data-original-title="<?php echo ((is_array($_tmp=$this->_tpl_vars['offer']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
"<?php endif; ?>><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['offer']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 70, "...", true) : smarty_modifier_truncate($_tmp, 70, "...", true)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</span> <?php echo $this->_tpl_vars['offer']['picon']; ?>
 </a></td>
											
											<?php elseif ($this->_tpl_vars['offer']['ao_type'] == 'poll_premium'): ?>
												<td><span class="label label-quote-premium" data-original-title="Cette annonce est susceptible de devenir une mission Premium" rel="tooltip" data-placement="right">Devis premium</span>
												<?php if ($this->_tpl_vars['offer']['contributors'] == '0'): ?>
													<span data-original-title="Niveau Senior" data-content="Je suis un contributeur confirm&eacute; chez Edit-place." rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>S</span>
												<?php elseif ($this->_tpl_vars['offer']['contributors'] == '1'): ?>
													<span data-original-title="Accessible au Junior" data-content="Au moins 1 article valid&eacute; sur Edit-place" rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>J</span>
												<?php elseif ($this->_tpl_vars['offer']['contributors'] == '3'): ?>
													<span data-original-title="Accessible au D&eacute;butant" data-content="Aucun article encore valid&eacute; sur Edit-place" rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>D</span>	
												<?php endif; ?>
												</td>
												<td class="title"><a href="/contrib/article-details?misson_type=poll_premium&mission_identifier=<?php echo $this->_tpl_vars['offer']['pollId']; ?>
" role="button" data-toggle="modal" data-target="#viewOffer-ajax"><span <?php if (((is_array($_tmp=$this->_tpl_vars['offer']['title'])) ? $this->_run_mod_handler('strlen', true, $_tmp) : smarty_modifier_strlen($_tmp)) > 70): ?> rel="tooltip" align="top" data-original-title="<?php echo ((is_array($_tmp=$this->_tpl_vars['offer']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
"<?php endif; ?>><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['offer']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 70, "...", true) : smarty_modifier_truncate($_tmp, 70, "...", true)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</span></a></td>
											<?php elseif ($this->_tpl_vars['offer']['ao_type'] == 'poll_nopremium'): ?>
												<td><span class="label label-quote" data-original-title="Vous travaillerez en direct avec le client" rel="tooltip" data-placement="right">Devis Libert&eacute;</span>
												<?php if ($this->_tpl_vars['offer']['contributors'] == '0'): ?>
													<span data-original-title="Niveau Senior" data-content="Je suis un contributeur confirm&eacute; chez Edit-place." rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>S</span>
												<?php elseif ($this->_tpl_vars['offer']['contributors'] == '1'): ?>
													<span data-original-title="Accessible au Junior" data-content="Au moins 1 article valid&eacute; sur Edit-place" rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>J</span>
												<?php elseif ($this->_tpl_vars['offer']['contributors'] == '3'): ?>
													<span data-original-title="Accessible au D&eacute;butant" data-content="Aucun article encore valid&eacute; sur Edit-place" rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>D</span>	
												<?php endif; ?>
												</td>
												<td class="title"><a href="/contrib/article-details?misson_type=poll_nopremium&mission_identifier=<?php echo $this->_tpl_vars['offer']['pollId']; ?>
" role="button" data-toggle="modal" data-target="#viewOffer-ajax"><span <?php if (((is_array($_tmp=$this->_tpl_vars['offer']['title'])) ? $this->_run_mod_handler('strlen', true, $_tmp) : smarty_modifier_strlen($_tmp)) > 70): ?> rel="tooltip" align="top" data-original-title="<?php echo ((is_array($_tmp=$this->_tpl_vars['offer']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
"<?php endif; ?>><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['offer']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 70, "...", true) : smarty_modifier_truncate($_tmp, 70, "...", true)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</span></a></td>	
											<?php elseif ($this->_tpl_vars['offer']['premium_option']): ?>	
												<td>
													<?php if ($this->_tpl_vars['offer']['missiontest'] == 'yes'): ?>
														<span class="label label-test-mission" data-original-title="Garanteed long-term Mission" rel="tooltip" data-placement="right"><i class="icon-star icon-white"></i>  Staffing</span>
													<?php else: ?>
														<span class="label label-premium" data-original-title="Mission garantie par Edit-place" rel="tooltip" data-placement="right">Mission Premium</span>
													<?php endif; ?>

													
												<?php if ($this->_tpl_vars['offer']['view_to'] == 'sc'): ?>
													<span data-original-title="Niveau Senior" data-content="Je suis un contributeur confirm&eacute; chez Edit-place." rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>S</span>
												<?php elseif ($this->_tpl_vars['offer']['view_to'] == 'jc'): ?>
													<span data-original-title="Accessible au Junior" data-content="Au moins 1 article valid&eacute; sur Edit-place" rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>J</span>
												<?php elseif ($this->_tpl_vars['offer']['view_to'] == 'jc0'): ?>
													<span data-original-title="Accessible au D&eacute;butant" data-content="Aucun article encore valid&eacute; sur Edit-place" rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>D</span>	
												<?php endif; ?>
												</td>
												<td class="title">
													<?php if ($this->_tpl_vars['offer']['missiontest'] == 'yes'): ?>
														<a href="/recruitment/participation-challenge?recruitment_id=<?php echo $this->_tpl_vars['offer']['deliveryid']; ?>
"><span <?php if (((is_array($_tmp=$this->_tpl_vars['offer']['title'])) ? $this->_run_mod_handler('strlen', true, $_tmp) : smarty_modifier_strlen($_tmp)) > 55): ?> rel="tooltip" align="top" data-original-title="<?php echo ((is_array($_tmp=$this->_tpl_vars['offer']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
"<?php endif; ?>>
															<b><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['offer']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 70, "...", true) : smarty_modifier_truncate($_tmp, 70, "...", true)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</b>
																													</a>
													<?php else: ?>
														<a href="/contrib/article-details?misson_type=premium&mission_identifier=<?php echo $this->_tpl_vars['offer']['articleid']; ?>
" role="button" data-toggle="modal" data-target="#viewOffer-ajax"><span <?php if (((is_array($_tmp=$this->_tpl_vars['offer']['title'])) ? $this->_run_mod_handler('strlen', true, $_tmp) : smarty_modifier_strlen($_tmp)) > 70): ?> rel="tooltip" align="top" data-original-title="<?php echo ((is_array($_tmp=$this->_tpl_vars['offer']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
"<?php endif; ?>><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['offer']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 70, "...", true) : smarty_modifier_truncate($_tmp, 70, "...", true)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</span> <?php echo $this->_tpl_vars['offer']['picon']; ?>
 <?php echo $this->_tpl_vars['offer']['qicon']; ?>
</a>
													<?php endif; ?>	
												</td>
											<?php elseif (! $this->_tpl_vars['offer']['premium_option']): ?>			
												<td>
													<?php if ($this->_tpl_vars['offer']['missiontest'] == 'yes'): ?>
														<span class="label label-test-mission" data-original-title="Garanteed long-term Mission" rel="tooltip" data-placement="right"><i class="icon-star icon-white"></i>  Staffing</span>
													<?php else: ?>
														<span class="label label-quote" data-original-title="Vous travaillerez en direct avec le client" rel="tooltip" data-placement="right">Mission Libert&eacute;</span>	
													<?php endif; ?>	
													<?php if ($this->_tpl_vars['offer']['view_to'] == 'sc'): ?>
														<span data-original-title="Niveau Senior" data-content="Je suis un contributeur confirm&eacute; chez Edit-place." rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>S</span>
													<?php elseif ($this->_tpl_vars['offer']['view_to'] == 'jc'): ?>
														<span data-original-title="Accessible au Junior" data-content="Au moins 1 article valid&eacute; sur Edit-place" rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>J</span>
													<?php elseif ($this->_tpl_vars['offer']['view_to'] == 'jc0'): ?>
														<span data-original-title="Accessible au D&eacute;butant" data-content="Aucun article encore valid&eacute; sur Edit-place" rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>D</span>	
													<?php endif; ?>
												</td>
												<td class="title"><a href="/contrib/article-details?misson_type=nopremium&mission_identifier=<?php echo $this->_tpl_vars['offer']['articleid']; ?>
" role="button" data-toggle="modal" data-target="#viewOffer-ajax"><span <?php if (((is_array($_tmp=$this->_tpl_vars['offer']['title'])) ? $this->_run_mod_handler('strlen', true, $_tmp) : smarty_modifier_strlen($_tmp)) > 70): ?> rel="tooltip" align="top" data-original-title="<?php echo ((is_array($_tmp=$this->_tpl_vars['offer']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
"<?php endif; ?>><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['offer']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 70, "...", true) : smarty_modifier_truncate($_tmp, 70, "...", true)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</span> <?php echo $this->_tpl_vars['offer']['picon']; ?>
 <?php echo $this->_tpl_vars['offer']['qicon']; ?>
</a></td>
											<?php endif; ?>
											<td class="countdown">
												<?php if ($this->_tpl_vars['offer']['ao_type'] == 'correction'): ?>
													<span id="time_<?php echo $this->_tpl_vars['offer']['articleid']; ?>
-correction_<?php echo $this->_tpl_vars['offer']['timestamp']; ?>
">
														<span id="text_<?php echo $this->_tpl_vars['offer']['articleid']; ?>
-correction_<?php echo $this->_tpl_vars['offer']['timestamp']; ?>
"><?php echo $this->_tpl_vars['offer']['timestamp']; ?>
</span>
													</span>
												<?php else: ?>
													<span id="time_<?php echo $this->_tpl_vars['offer']['articleid']; ?>
_<?php echo $this->_tpl_vars['offer']['timestamp']; ?>
">
														<span id="text_<?php echo $this->_tpl_vars['offer']['articleid']; ?>
_<?php echo $this->_tpl_vars['offer']['timestamp']; ?>
"><?php echo $this->_tpl_vars['offer']['timestamp']; ?>
</span>
													</span>
												<?php endif; ?>	
												
											</td>
										</tr>
										
									<?php endforeach; endif; unset($_from); ?>
								<?php else: ?>	
									<tr>
										<td colspan="3">
											<span class="no-data">Il n'y a pas d'appels d'offres pour l'instant</span>
										</td>	
									</tr>	
								<?php endif; ?>					

							</table>
							
							<?php if (count($this->_tpl_vars['recent_AO_Offers']) > 0): ?>
								<a href="/contrib/aosearch"><div class="btn btn-block btn-small">Voir toutes les annonces</div></a>
							<?php endif; ?>	
							
						</div>

					 </section>
			 
			 
				</div>
			
				<div class="span4">
				<!--  right column  -->		  
					<aside>				  
						<div class="aside-bg" style="padding:0px">
							<!--<div class="aside-block" id="browse-by-cat">
								<h4>Recherche par cat&eacute;gorie</h4>
								<ul class="nav nav-tabs nav-stacked">
									<?php $_from = $this->_tpl_vars['ep_categories_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['category']):
?>
										<li><a href="/contrib/aosearch?search_category=<?php echo $this->_tpl_vars['key']; ?>
">
										<?php if ($this->_tpl_vars['ep_category_articles_count'][$this->_tpl_vars['key']] > 0): ?>
											<span class="badge badge-warning pull-right"><?php echo $this->_tpl_vars['ep_category_articles_count'][$this->_tpl_vars['key']]; ?>
</span>
										<?php else: ?>		
											<span class="badge pull-right"><?php echo $this->_tpl_vars['ep_category_articles_count'][$this->_tpl_vars['key']]; ?>
</span>
										<?php endif; ?>	
										<?php echo $this->_tpl_vars['category']; ?>
</a></li>									
									<?php endforeach; endif; unset($_from); ?>	
								</ul>	
							</div>-->
							<div id="ao-next" class="aside-block">
								<div class="pull-center">
									<h4 class="date"><span>Demain,</span> <?php echo $this->_tpl_vars['publish_date']; ?>
 <i class="icon-calendar icon-white"></i></h4>
									<div class="main">
										<span class="nb"><a href="/contrib/aosearch#soon"><?php echo $this->_tpl_vars['upcoming_count']; ?>
</a></span><a href="/contrib/aosearch#soon"> nouvelles annonces ouvertes � participation</a>
									</div>
								</div>
								Vous pouvez d&egrave;s maintenant : 
								<ul>
								  <li>Consulter ces annonces</li>
								  <li>Etre alert&eacute; d&egrave;s l'ouverture des participations</li>
								</ul>
								<div class="pull-center"><a href="/contrib/aosearch#soon" class="btn btn-small">Voir les prochaines annonces</a></div>
							</div>
						</div>				  
					</aside>
				</div>
			</div>
	 </div>
</div>		