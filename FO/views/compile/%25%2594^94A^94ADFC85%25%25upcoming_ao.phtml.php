<?php /* Smarty version 2.6.19, created on 2015-07-28 12:42:39
         compiled from Contrib/upcoming_ao.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_decode', 'Contrib/upcoming_ao.phtml', 10, false),array('modifier', 'strlen', 'Contrib/upcoming_ao.phtml', 58, false),array('modifier', 'stripslashes', 'Contrib/upcoming_ao.phtml', 58, false),array('modifier', 'truncate', 'Contrib/upcoming_ao.phtml', 58, false),)), $this); ?>
<div class="mod">
	<h3 id="soon">Prochainement...</h3>

	<table class="table table-hover">
		<thead>
			<tr>
				<th><a href="#orderByType">Type</a></th>
				<th>
					<?php if ($_GET['uorderByTitle'] == 'desc'): ?>
						<a href="/contrib/aosearch?search_article=<?php echo ((is_array($_tmp=$_GET['search_article'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
&search_type=<?php echo $_GET['search_type']; ?>
&search_language=<?php echo $_GET['search_language']; ?>
&search_ao_type=<?php echo $_GET['search_ao_type']; ?>
&uorderByTitle=asc#soon">Titre</a>
						<i class="icon-circle-arrow-down"></i>
					<?php elseif ($_GET['uorderByTitle'] == 'asc'): ?>
						<a href="/contrib/aosearch?search_article=<?php echo ((is_array($_tmp=$_GET['search_article'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
&search_type=<?php echo $_GET['search_type']; ?>
&search_language=<?php echo $_GET['search_language']; ?>
&search_ao_type=<?php echo $_GET['search_ao_type']; ?>
&uorderByTitle=desc#soon">Titre</a>
						<i class="icon-circle-arrow-up"></i>
					<?php else: ?>
						<a href="/contrib/aosearch?search_article=<?php echo ((is_array($_tmp=$_GET['search_article'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
&search_type=<?php echo $_GET['search_type']; ?>
&search_language=<?php echo $_GET['search_language']; ?>
&search_ao_type=<?php echo $_GET['search_ao_type']; ?>
&uorderByTitle=asc#soon">Titre</a>	
					<?php endif; ?>	
				</th>
				<th class="pc">
					<?php if ($_GET['uorderByLang'] == 'desc'): ?>
						<a href="/contrib/aosearch?search_article=<?php echo ((is_array($_tmp=$_GET['search_article'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
&search_type=<?php echo $_GET['search_type']; ?>
&search_language=<?php echo $_GET['search_language']; ?>
&search_ao_type=<?php echo $_GET['search_ao_type']; ?>
&uorderByLang=asc#soon">Langues</a>
						<i class="icon-circle-arrow-down"></i>
					<?php elseif ($_GET['uorderByLang'] == 'asc'): ?>
						<a href="/contrib/aosearch?search_article=<?php echo ((is_array($_tmp=$_GET['search_article'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
&search_type=<?php echo $_GET['search_type']; ?>
&search_language=<?php echo $_GET['search_language']; ?>
&search_ao_type=<?php echo $_GET['search_ao_type']; ?>
&uorderByLang=desc#soon">Langues</a>
						<i class="icon-circle-arrow-up"></i>
					<?php else: ?>
						<a href="/contrib/aosearch?search_article=<?php echo ((is_array($_tmp=$_GET['search_article'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
&search_type=<?php echo $_GET['search_type']; ?>
&search_language=<?php echo $_GET['search_language']; ?>
&search_ao_type=<?php echo $_GET['search_ao_type']; ?>
&uorderByLang=asc#soon">Langues</a>	
					<?php endif; ?>								
				</th>
				<th class="pc">
					<?php if ($_GET['uorderBytime'] == 'desc'): ?>
						<a href="/contrib/aosearch?search_article=<?php echo ((is_array($_tmp=$_GET['search_article'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
&search_type=<?php echo $_GET['search_type']; ?>
&search_language=<?php echo $_GET['search_language']; ?>
&search_ao_type=<?php echo $_GET['search_ao_type']; ?>
&uorderBytime=asc#soon">Date de publication</a>
						<i class="icon-circle-arrow-down"></i>
					<?php elseif ($_GET['uorderBytime'] == 'asc'): ?>
						<a href="/contrib/aosearch?search_article=<?php echo ((is_array($_tmp=$_GET['search_article'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
&search_type=<?php echo $_GET['search_type']; ?>
&search_language=<?php echo $_GET['search_language']; ?>
&search_ao_type=<?php echo $_GET['search_ao_type']; ?>
&uorderBytime=desc#soon">Date de publication</a>
						<i class="icon-circle-arrow-up"></i>
					<?php else: ?>
						<a href="/contrib/aosearch?search_article=<?php echo ((is_array($_tmp=$_GET['search_article'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
&search_type=<?php echo $_GET['search_type']; ?>
&search_language=<?php echo $_GET['search_language']; ?>
&search_ao_type=<?php echo $_GET['search_ao_type']; ?>
&uorderBytime=asc#soon">Date de publication</a>	
					<?php endif; ?>
					
				</th>								
				<th class="pc"></th>
			</tr>
		</thead>
		<?php if ($this->_tpl_vars['upcomingArticles'] | @ count > 0): ?>
			<?php $_from = $this->_tpl_vars['upcomingArticles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['articledetails'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['articledetails']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['article']):
        $this->_foreach['articledetails']['iteration']++;
?> 								
				<tr>
					<?php if ($this->_tpl_vars['article']['ao_type'] == 'correction'): ?>
								<td><span class="label label-correction" data-original-title="Mission garantie par Edit-place" rel="tooltip" data-placement="right">Mission Correction</span>
								<?php if ($this->_tpl_vars['article']['view_to'] == 'sc'): ?>
									<span data-original-title="Niveau Senior" data-content="Je suis un contributeur confirm&eacute; chez Edit-place." rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>S</span>
								<?php elseif ($this->_tpl_vars['article']['view_to'] == 'jc'): ?>
										<span data-original-title="Accessible au Junior" data-content="Au moins 1 article valid&eacute; sur Edit-place" rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>J</span>
								<?php elseif ($this->_tpl_vars['article']['view_to'] == 'jc0'): ?>
										<span data-original-title="Accessible au D&eacute;butant" data-content="Aucun article encore valid&eacute; sur Edit-place" rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>D</span>	
								<?php endif; ?>
								</td>
								<td class="title"><a href="/contrib/article-details?upcoming=yes&misson_type=correction&mission_identifier=<?php echo $this->_tpl_vars['article']['articleid']; ?>
" role="button" data-toggle="modal" data-target="#viewOffer-ajax"><span <?php if (((is_array($_tmp=$this->_tpl_vars['article']['title'])) ? $this->_run_mod_handler('strlen', true, $_tmp) : smarty_modifier_strlen($_tmp)) > 55): ?> rel="tooltip" align="top" data-original-title="<?php echo ((is_array($_tmp=$this->_tpl_vars['article']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
"<?php endif; ?>><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['article']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 55, "...", true) : smarty_modifier_truncate($_tmp, 55, "...", true)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
  <?php echo $this->_tpl_vars['article']['picon']; ?>
 </span>
					<?php elseif ($this->_tpl_vars['article']['ao_type'] == 'poll_premium'): ?>
								<td><span class="label label-quote-premium" data-original-title="Cette annonce est susceptible de devenir une mission Premium" rel="tooltip" data-placement="right">Devis premium</span>
								<?php if ($this->_tpl_vars['article']['contributors'] == '0'): ?>
									<span data-original-title="Niveau Senior" data-content="Je suis un contributeur confirm&eacute; chez Edit-place." rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>S</span>
								<?php elseif ($this->_tpl_vars['article']['contributors'] == '1'): ?>
										<span data-original-title="Accessible au Junior" data-content="Au moins 1 article valid&eacute; sur Edit-place" rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>J</span>
								<?php elseif ($this->_tpl_vars['article']['contributors'] == '3'): ?>
										<span data-original-title="Accessible au D&eacute;butant" data-content="Aucun article encore valid&eacute; sur Edit-place" rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>D</span>	
								<?php endif; ?>
								</td>
								<td class="title"><a href="/contrib/article-details?upcoming=yes&misson_type=poll_premium&mission_identifier=<?php echo $this->_tpl_vars['article']['pollId']; ?>
" role="button" data-toggle="modal" data-target="#viewOffer-ajax"><span <?php if (((is_array($_tmp=$this->_tpl_vars['article']['title'])) ? $this->_run_mod_handler('strlen', true, $_tmp) : smarty_modifier_strlen($_tmp)) > 55): ?> rel="tooltip" align="top" data-original-title="<?php echo ((is_array($_tmp=$this->_tpl_vars['article']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
"<?php endif; ?>><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['article']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 55, "...", true) : smarty_modifier_truncate($_tmp, 55, "...", true)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</span>
					<?php elseif ($this->_tpl_vars['article']['ao_type'] == 'poll_nopremium'): ?>
								<td><span class="label label-quote" data-original-title="Vous travaillerez en direct avec le client" rel="tooltip" data-placement="right">Devis Libert&eacute;</span>
								<?php if ($this->_tpl_vars['article']['contributors'] == '0'): ?>
									<span data-original-title="Niveau Senior" data-content="Je suis un contributeur confirm&eacute; chez Edit-place." rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>S</span>
								<?php elseif ($this->_tpl_vars['article']['contributors'] == '1'): ?>
										<span data-original-title="Accessible au Junior" data-content="Au moins 1 article valid&eacute; sur Edit-place" rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>J</span>
								<?php elseif ($this->_tpl_vars['article']['contributors'] == '3'): ?>
										<span data-original-title="Accessible au D&eacute;butant" data-content="Aucun article encore valid&eacute; sur Edit-place" rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>D</span>	
								<?php endif; ?>
								</td>
								<td class="title"><a href="/contrib/article-details?upcoming=yes&misson_type=poll_nopremium&mission_identifier=<?php echo $this->_tpl_vars['article']['pollId']; ?>
" role="button" data-toggle="modal" data-target="#viewOffer-ajax"><span <?php if (((is_array($_tmp=$this->_tpl_vars['article']['title'])) ? $this->_run_mod_handler('strlen', true, $_tmp) : smarty_modifier_strlen($_tmp)) > 55): ?> rel="tooltip" align="top" data-original-title="<?php echo ((is_array($_tmp=$this->_tpl_vars['article']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
"<?php endif; ?>><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['article']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 55, "...", true) : smarty_modifier_truncate($_tmp, 55, "...", true)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
</span>		
					<?php elseif ($this->_tpl_vars['article']['premium_option']): ?>
						<td><span class="label label-premium" data-original-title="Mission garantie par Edit-place" rel="tooltip" data-placement="right">Mission Premium</span>
						<?php if ($this->_tpl_vars['article']['view_to'] == 'sc'): ?>
									<span data-original-title="Niveau Senior" data-content="Je suis un contributeur confirm&eacute; chez Edit-place." rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>S</span>
								<?php elseif ($this->_tpl_vars['article']['view_to'] == 'jc'): ?>
										<span data-original-title="Accessible au Junior" data-content="Au moins 1 article valid&eacute; sur Edit-place" rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>J</span>
								<?php elseif ($this->_tpl_vars['article']['view_to'] == 'jc0'): ?>
										<span data-original-title="Accessible au D&eacute;butant" data-content="Aucun article encore valid&eacute; sur Edit-place" rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>D</span>	
								<?php endif; ?>
						</td>
						<td class="title"><a href="/contrib/article-details?upcoming=yes&misson_type=premium&mission_identifier=<?php echo $this->_tpl_vars['article']['articleid']; ?>
" role="button" data-toggle="modal" data-target="#viewOffer-ajax"><span <?php if (((is_array($_tmp=$this->_tpl_vars['article']['title'])) ? $this->_run_mod_handler('strlen', true, $_tmp) : smarty_modifier_strlen($_tmp)) > 55): ?> rel="tooltip" align="top" data-original-title="<?php echo ((is_array($_tmp=$this->_tpl_vars['article']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
"<?php endif; ?>><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['article']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 55, "...", true) : smarty_modifier_truncate($_tmp, 55, "...", true)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
 <?php echo $this->_tpl_vars['article']['picon']; ?>
 <?php echo $this->_tpl_vars['article']['qicon']; ?>
</span>
					<?php elseif (! $this->_tpl_vars['article']['premium_option']): ?>
						<td><span class="label label-quote" data-original-title="Vous travaillerez en direct avec le client" rel="tooltip" data-placement="right">Mission Libert&eacute;</span>
						<?php if ($this->_tpl_vars['article']['view_to'] == 'sc'): ?>
							<span data-original-title="Niveau Senior" data-content="Je suis un contributeur confirm&eacute; chez Edit-place." rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>S</span>
						<?php elseif ($this->_tpl_vars['article']['view_to'] == 'jc'): ?>
							<span data-original-title="Accessible au Junior" data-content="Au moins 1 article valid&eacute; sur Edit-place" rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>J</span>
						<?php elseif ($this->_tpl_vars['article']['view_to'] == 'jc0'): ?>
							<span data-original-title="Accessible au D&eacute;butant" data-content="Aucun article encore valid&eacute; sur Edit-place" rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>D</span>	
						<?php endif; ?>
						</td>
						<td class="title"><a href="/contrib/article-details?upcoming=yes&misson_type=nopremium&mission_identifier=<?php echo $this->_tpl_vars['article']['articleid']; ?>
" role="button" data-toggle="modal" data-target="#viewOffer-ajax"><span <?php if (((is_array($_tmp=$this->_tpl_vars['article']['title'])) ? $this->_run_mod_handler('strlen', true, $_tmp) : smarty_modifier_strlen($_tmp)) > 55): ?> rel="tooltip" align="top" data-original-title="<?php echo ((is_array($_tmp=$this->_tpl_vars['article']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
"<?php endif; ?>><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['article']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 55, "...", true) : smarty_modifier_truncate($_tmp, 55, "...", true)))) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : smarty_modifier_stripslashes($_tmp)); ?>
 <?php echo $this->_tpl_vars['article']['picon']; ?>
 <?php echo $this->_tpl_vars['article']['qicon']; ?>
</span>
					<?php endif; ?>									
					<p class="muted"><?php echo $this->_tpl_vars['article']['category']; ?>
  &bull;  Appel &agrave; r&eacute;daction  &bull;  <?php echo $this->_tpl_vars['article']['num_min']; ?>
 - <?php echo $this->_tpl_vars['article']['num_max']; ?>
 mots /article</p></a></td>
					<td class="pc"><img src="/FO/images/shim.gif" data-placement="left" rel="tooltip" data-original-title="<?php echo $this->_tpl_vars['article']['language_name']; ?>
" class="flag flag-<?php echo $this->_tpl_vars['article']['language']; ?>
"></td>
					<td class="countdown pc">
						<?php echo $this->_tpl_vars['article']['publishtime_format']; ?>
											
					</td>
					<td class="">
						<?php if ($this->_tpl_vars['article']['deliveryid']): ?>
							<span class="alert_<?php if ($this->_tpl_vars['article']['ao_type'] == 'correction'): ?>correction_<?php endif; ?><?php echo $this->_tpl_vars['article']['deliveryid']; ?>
">
								<?php if ($this->_tpl_vars['article']['ao_type'] == 'correction'): ?>
									<?php if ($this->_tpl_vars['article']['alert_subscribe'] == 'no'): ?>
										<button class="btn" onclick="subscribeAOAlert('<?php echo $this->_tpl_vars['article']['deliveryid']; ?>
','yes','article-correction');"><i class="icon-bell"></i> Etre alert&eacute;</button>
									<?php elseif ($this->_tpl_vars['article']['alert_subscribe'] == 'yes'): ?>
										<a class="btn btn-small btn-primary" onclick="subscribeAOAlert('<?php echo $this->_tpl_vars['article']['deliveryid']; ?>
','no','article-correction');"><i class="icon-remove icon-white"></i> Alerte programm&eacute;e</a>
									<?php endif; ?>
								<?php else: ?>
									<?php if ($this->_tpl_vars['article']['alert_subscribe'] == 'no'): ?>
										<button class="btn" onclick="subscribeAOAlert('<?php echo $this->_tpl_vars['article']['deliveryid']; ?>
','yes','article');"><i class="icon-bell"></i> Etre alert&eacute;</button>
									<?php elseif ($this->_tpl_vars['article']['alert_subscribe'] == 'yes'): ?>
										<a class="btn btn-small btn-primary" onclick="subscribeAOAlert('<?php echo $this->_tpl_vars['article']['deliveryid']; ?>
','no','article');"><i class="icon-remove icon-white"></i> Alerte programm&eacute;e</a>
									<?php endif; ?>
								<?php endif; ?>	
							</span>	
						<?php elseif ($this->_tpl_vars['article']['pollId']): ?>
							<span class="alert_<?php echo $this->_tpl_vars['article']['pollId']; ?>
">
								<?php if ($this->_tpl_vars['article']['alert_subscribe'] == 'no'): ?>
									<button class="btn" onclick="subscribeAOAlert('<?php echo $this->_tpl_vars['article']['pollId']; ?>
','yes','poll');"><i class="icon-bell"></i> Etre alert&eacute;</button>
								<?php elseif ($this->_tpl_vars['article']['alert_subscribe'] == 'yes'): ?>
									<a class="btn btn-small btn-primary" onclick="subscribeAOAlert('<?php echo $this->_tpl_vars['article']['pollId']; ?>
','no','poll');"><i class="icon-remove icon-white"></i> Alerte programm&eacute;e</a>
								<?php endif; ?>	
							</span>		
						<?php endif; ?>	
					</td>
				</tr>								
			<?php endforeach; endif; unset($_from); ?>
		<?php else: ?>
			<tr>
				<td colspan="6">
					<span class="no-data">Aucun r&eacute;sultat</span>
				</td>
			</tr>
		<?php endif; ?>
	</table>
</div>