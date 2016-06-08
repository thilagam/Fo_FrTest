<?php /* Smarty version 2.6.19, created on 2015-08-11 14:09:31
         compiled from Contrib/mission-article-published.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Contrib/mission-article-published.phtml', 58, false),array('modifier', 'date_format', 'Contrib/mission-article-published.phtml', 83, false),array('modifier', 'zero_cut', 'Contrib/mission-article-published.phtml', 127, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
$("#menu_ongoing").addClass("active");
$(\'body\').removeClass(\'homepage\');
$(\'body\').addClass(\'mission\');
</script>
'; ?>

<div class="container">
<br>
<?php if ($this->_tpl_vars['missionDetails'] | @ count > 0): ?>
	<?php $_from = $this->_tpl_vars['missionDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['details'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['details']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['article']):
        $this->_foreach['details']['iteration']++;
?>
	<ul class="breadcrumb">
		<li><a href="/contrib/home">Accueil</a> <span class="divider">/</span></li>
		<li><a href="/contrib/ongoing">Mes participations</a> <span class="divider">/</span></li>
		<li class="active"><?php echo $this->_tpl_vars['article']['title']; ?>
</li>
	</ul> 
	
	<!-- start, Summary -->
	<section id="summary">
		<div class="row-fluid">
			<div class="span8">
				<?php if ($this->_tpl_vars['article']['price_corrector'] || $this->_tpl_vars['article']['crt_participate_id']): ?>
					<?php if ($this->_tpl_vars['article']['missiontest'] == 'yes'): ?>
						<span class="label label-test-mission">Mission de correction test</span>
					<?php else: ?>
						<span class="label label-correction">Mission Correction</span>
					<?php endif; ?>
				<?php elseif ($this->_tpl_vars['article']['ao_type'] == 'premium'): ?>
					<?php if ($this->_tpl_vars['article']['missiontest'] == 'yes'): ?>
						<span class="label label-test-mission"><i class="icon-star icon-white"></i>  Staffing</span>
					<?php else: ?>
						<span class="label label-premium">Mission Premium</span>
					<?php endif; ?>
				<?php else: ?>	
					<?php if ($this->_tpl_vars['article']['missiontest'] == 'yes'): ?>
						<span class="label label-mission-test">Mission Test</span>
					<?php else: ?>
						<span class="label label-quote">Mission Libert&eacute;</span>
					<?php endif; ?>
				<?php endif; ?>	
				<h1><?php echo $this->_tpl_vars['article']['title']; ?>
</h1>
			</div>
			<div class="span3 stat">
				<p>Date de livraison</p>				
				<p class="num-large less24">
					Valid&eacute;e
				</p>
			</div>
						<div class="span1 stat">
				<div class="icon-comment-large new" id="comment_count"><a href="#comment" class="scroll"><?php echo count($this->_tpl_vars['commentDetails']); ?>
</a></div>
			<!--  to active if new comment, add classname "new" -->
			<!--div class="icon-comment-large new"><a href="#comment">3</a></div-->
			</div>
		</div>
	</section>
	<!-- end, summary --> 
 
	<div class="row-fluid"> 
		<div class="span9">
			<section id="file-management">				
				<div class="row-fluid file-management-cont">                           
					<table style="margin-left: 4%" class="table mod span11 offset1">
						<thead>
						<tr>
							<th class="span6">Fichier</th>
							<th class="span4" style="text-align:center">Date</th>
							<th class="span2">Poids</th>
						</tr>
						</thead>
						<tbody>
							<?php if ($this->_tpl_vars['AllVersionArticles'] | @ count > 0): ?>
								<?php $_from = $this->_tpl_vars['AllVersionArticles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['articledetails'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['articledetails']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['versionarticle']):
        $this->_foreach['articledetails']['iteration']++;
?>
									<tr><td class="span6"><i class="icon-file"></i>
									<a href="<?php if ($this->_tpl_vars['versionarticle']['file_exists'] == 'yes'): ?>/contrib/download-version-article?processid=<?php echo $this->_tpl_vars['versionarticle']['id']; ?>
<?php else: ?>#<?php endif; ?>"><?php echo $this->_tpl_vars['versionarticle']['article_name']; ?>
</a></td>
									<td class="span4 muted" style="text-align:center"><?php echo ((is_array($_tmp=$this->_tpl_vars['versionarticle']['article_sent_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M")); ?>
</td>
									<td class="span2 muted"><?php echo $this->_tpl_vars['versionarticle']['file_size']; ?>
</td></tr>
								<?php endforeach; endif; unset($_from); ?>
							
							<?php else: ?>
								<tr><td colspan="4"></td></tr>
							<?php endif; ?>	
						</tbody>
					</table>	
					<!-- call to action set -->
					<div class="pull-center btn-group">						
						<a data-original-title="Aide" rel="tooltip" class="btn" href="/contrib/compose-mail?senduser=111201092609847"><i class="icon-question-sign"></i> Aide</a>
					</div>
				</div>
			</section>
			<section id="a_o">
				<div class="mod">
					<div class="summary clearfix">
						<h4>D&eacute;tails du projet</h4>
						<ul class="unstyled">
							<li><strong>Appel &agrave; r&eacute;daction</strong> <span class="bullet">&#9679;</span></li>
							<li> Langue : <img class="flag flag-<?php echo $this->_tpl_vars['article']['language']; ?>
" src="/FO/images/shim.gif"> <span class="bullet">&#9679;</span></li>
							<li>Cat&eacute;gorie : <?php echo $this->_tpl_vars['article']['category']; ?>
 <span class="bullet">&#9679;</span></li>
							<li>Nb. mots : <?php echo $this->_tpl_vars['article']['num_min']; ?>
 - <?php echo $this->_tpl_vars['article']['num_max']; ?>
 / article
							<!--<span class="bullet">&#9679;</span></li>
							<li><a href="#comment" class="scroll" id="comment_count_1"><i class="icon-comment"></i> <?php echo count($this->_tpl_vars['commentDetails']); ?>
</a></li>-->
							<?php if ($this->_tpl_vars['article']['spec_exists'] == 'yes'): ?>
								<li class="pull-right"><a href="/contrib/download-file?type=clientbrief&article_id=<?php echo $this->_tpl_vars['article']['article_id']; ?>
" class="btn btn-small btn-success"><i class="icon-white icon-circle-arrow-down"></i> T&eacute;l&eacute;charger le brief client</a></li>
							<?php endif; ?>	
						</ul>
					</div>
				</div>
			</section>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Contrib/article-comments.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		</div>
		<div class="span3">
		<!--  right column  -->
			<aside>
				<div class="aside-bg">
					<div class="editor-price">
						<p class="quote-price">Royalties :<strong> 
							<?php if ($this->_tpl_vars['article']['free_article'] == 'yes'): ?>
								Free
							<?php elseif ($this->_tpl_vars['article']['price_user'] != ''): ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['article']['price_user'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &euro;
							<?php elseif ($this->_tpl_vars['article']['price_corrector'] != ''): ?>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['article']['price_corrector'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &euro;
							<?php endif; ?></strong>
						</p>
						<?php if ($this->_tpl_vars['article']['ao_type'] != 'premium'): ?>
							<ul class="unstyled stripe">
								<li>Commission Edit-place inclus : <?php echo $this->_tpl_vars['article']['ep_commission']; ?>
%</li>
								<li>  Prix total r&eacute;gl&eacute; par le client : <?php echo ((is_array($_tmp=$this->_tpl_vars['article']['final_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &euro;</li>
							</ul>
						<?php endif; ?>	
					</div>
					<div id="selected-editor" class="aside-block">
						<div class="editor-container">
							<h4>Votre client</h4>
							<img src="<?php echo $this->_tpl_vars['article']['client_pic']; ?>
" title="<?php echo $this->_tpl_vars['article']['company_name']; ?>
">
							<p class="editor-name"><?php echo $this->_tpl_vars['article']['company_name']; ?>
</p>
							<?php if ($this->_tpl_vars['article']['ao_type'] == 'premium'): ?>
								<a href="/contrib/compose-mail?senduser=110923143523902" class="btn btn-small">Contactez-nous</a>
							<?php else: ?>
								<p>Tel : <?php echo $this->_tpl_vars['article']['phone_number']; ?>
</p> 
								<!--<a href="/contrib/compose-mail?senduser=<?php echo $this->_tpl_vars['article']['article_id']; ?>
" class="btn btn-small">Envoyer un message</a>-->
								<p>Email : <?php echo $this->_tpl_vars['article']['email']; ?>
</p> 								
							<?php endif; ?>
							
						</div>
					</div>
					<?php if ($this->_tpl_vars['article']['ao_type'] != 'premium'): ?>
					<div class="aside-block" id="liberte-guide" style="margin-top: 40px">
						<h4>Guide du r&eacute;dacteur</h4>
						<div class="pull-center inc"><span class="label label-quote">mission liberte</span></div>
						<p><strong>Avant de d&eacute;marrer... </strong></p>
						<ul>
							<li>Contactez le client par email ou t&eacute;l&eacute;phone d&egrave;s que vous &ecirc;tes s&eacute;lectionn&eacute;(e).     </li>
							<li>Demandez une confirmation du brief, du timing de rendu et du nombre d&rsquo;articles.</li>
						</ul>
						<p><strong>Une fois les articles r&eacute;dig&eacute;s...</strong></p>
						<ul>
							<li>T&eacute;l&eacute;chargez les &eacute;l&eacute;ments sur la plateforme.</li>
							<li>N'envoyez jamais votre travail complet par email au client.</li>
						</ul>
						<hr>
						<p class="pull-center"><a href="/contrib/download-file?type=guide_mission_liberte" class="btn btn-small"><i class="icon-download"></i> T&eacute;l&eacute;charger le guide complet</a></p>
					</div>
					<?php endif; ?>
					<div class="aside-block" id="garantee">
						<h4>Vos garanties</h4>
						<dl>
							<dt><span class="umbrella"></span>edit-place est votre m&eacute;diateur</dt>
							<dd>En cas de contestation (d&eacute;lai de livraison, reprise d&rsquo;articles, remboursement...)</dd>
							<dt><span class="locked"></span>Paiement s&eacute;curis&eacute;</dt>
							<dd>Notre solution de paiement en ligne vous garantit une transaction en toute tranquillit&eacute;</dd>
						</dl>
					</div>
				</div>
			</aside>  
		</div>
	</div>
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>	
</div>