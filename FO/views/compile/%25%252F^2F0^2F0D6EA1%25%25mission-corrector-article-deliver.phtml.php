<?php /* Smarty version 2.6.19, created on 2015-08-12 11:58:04
         compiled from Contrib/mission-corrector-article-deliver.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Contrib/mission-corrector-article-deliver.phtml', 43, false),array('modifier', 'date_format', 'Contrib/mission-corrector-article-deliver.phtml', 79, false),)), $this); ?>
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
	<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button>
		<i class="icon-ok icon-white"></i> Bravo <?php echo $this->_tpl_vars['client_email']; ?>
 ! Vous avez &eacute;t&eacute; s&eacute;lectionn&eacute; comme correcteur pour cette mission. Merci de tenir compte des d&eacute;lais impartis<?php if ($this->_tpl_vars['article']['status'] == 'writing_ongoing'): ?> une fois le fichier du r&eacute;dacteur re&ccedil;u<?php endif; ?>.
	</div>
	<!-- start, Summary -->
	<section id="summary">
		<div class="row-fluid">
			<div class="span7">
				<?php if ($this->_tpl_vars['article']['missiontest'] == 'yes'): ?>
					<span class="label label-test-mission">Mission de correction test</span>
				<?php else: ?>
					<span class="label label-correction">Mission Correction</span>
				<?php endif; ?>
				<h1><?php echo $this->_tpl_vars['article']['title']; ?>
</h1>
			</div>
			<div class="span2 stat">
				<p>Date de livraison</p>
				<!-- add classname "less24" if time is < 24h  -->
				<!-- p class="num-large less24">Livrée</p-->
				<?php if ($this->_tpl_vars['article']['status'] == 'bid' || $this->_tpl_vars['article']['status'] == 'disapproved'): ?>
					<p class="num-large less24">
						<span id="dtime_<?php echo $this->_tpl_vars['article']['article_id']; ?>
_<?php echo $this->_tpl_vars['article']['corrector_submit_expires']; ?>
">
							<span id="dtext_<?php echo $this->_tpl_vars['article']['article_id']; ?>
_<?php echo $this->_tpl_vars['article']['corrector_submit_expires']; ?>
"><?php echo $this->_tpl_vars['article']['corrector_submit_expires']; ?>
</span>
						</span>
					</p>
				<?php else: ?>
					<p class="num-large less24" style="font-size:18px"><?php echo $this->_tpl_vars['article']['status_trans']; ?>
</p>
				<?php endif; ?>	
			</div>
			<div class="span2 stat">
				<p>Tarif</p>
				<p class="num-large"><?php echo $this->_tpl_vars['article']['price_corrector']; ?>
 &euro;</p>
			</div>
			<div class="span1 stat">
				<div class="icon-comment-large new"><a href="#comment" class="scroll" id="comment_count"><?php echo count($this->_tpl_vars['commentDetails']); ?>
</a></div>
				<!--  to active if new comment, add classname "new" -->
				<!--div class="icon-comment-large new"><a href="#comment">3</a></div-->
			</div>
		</div>
	</section>
	<!-- end, summary --> 
	<div class="row-fluid"> 
		<div class="span9">
			<section id="corrector">
				<div class="mod pull-center">
					<div class="icon_corrector"></div>
					<h4>Bienvenue dans votre espace de correction </h4>
					<?php if ($this->_tpl_vars['article']['status'] == 'writing_ongoing'): ?>
						<p>Le  r&eacute;dacteur n'a pas encore soumis son fichier. Vous serez alert&eacute; une fois le fichier disponible pour correction.</p>
					<?php else: ?>	
						<p>Pensez &agrave; bien lire les diff&eacute;rents briefs avant de d&eacute;marrer</p>
					<?php endif; ?>	
					<div class="row-fluid file-management-cont"> 
						<div class="row-fluid">  
							<table class="table well span11 offset1" style="margin-left: 4%">
								<thead>
									<tr>
										<th class="span6">Article &agrave; corriger</th>
										<th class="span1">R&eacute;dacteur</th>
										<th class="span3" style="text-align:center">Modification</th>
										<th class="span1">Poids</th>
										<th class="span1"></th>

									</tr>
								</thead>
								<tbody>
								<?php $_from = $this->_tpl_vars['AllVersionArticles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['articledetails'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['articledetails']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['varticle']):
        $this->_foreach['articledetails']['iteration']++;
?>
									<tr>
										<td class="span6"><i class="icon-file"></i> <a href="/contrib/download-version-article?processid=<?php echo $this->_tpl_vars['varticle']['id']; ?>
"><?php echo $this->_tpl_vars['varticle']['article_name']; ?>
</a></td>										
										<td class="span1"><?php echo $this->_tpl_vars['varticle']['first_name']; ?>
</td>
										<td class="span3" style="text-align:center"><?php echo ((is_array($_tmp=$this->_tpl_vars['varticle']['article_sent_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M")); ?>
</td>
										<td class="span1 muted"><?php echo $this->_tpl_vars['varticle']['file_size']; ?>
</td>
										<td class="span1"><a href="/contrib/download-version-article?processid=<?php echo $this->_tpl_vars['varticle']['id']; ?>
" data-original-title="T&eacute;l&eacute;charger" rel="tooltip" class="btn btn-small"><i class="icon-download"></i></a></td>

                                    </tr>
								<?php endforeach; endif; unset($_from); ?>									
								</tbody>
							</table> 
						</div>
						<?php if ($this->_tpl_vars['article']['status'] == 'bid' || $this->_tpl_vars['article']['status'] == 'disapproved'): ?>
						<a class="btn btn-primary" data-target="#fix-article" data-toggle="modal" role="button" href="/contrib/corrector-article-popup?cparticipation_id=<?php echo $this->_tpl_vars['CorrectorParticipationId']; ?>
&article_id=<?php echo $this->_tpl_vars['article']['article_id']; ?>
"><i class="icon-pencil icon-white"></i> Corriger l'article</a>
						<?php endif; ?>
					</div>					
				</div>
			</section>
			<section id="a_o">
				<div class="mod">
					<div class="summary clearfix">
						<h4>D&eacute;tails du projet</h4>
						<ul class="unstyled">
							<li><strong>Correction</strong> <span class="bullet">&#9679;</span></li>
							<li> Langue : <img src="/FO/images/shim.gif" class="flag flag-<?php echo $this->_tpl_vars['article']['language']; ?>
"> <span class="bullet">&#9679;</span></li>
							<li>Cat&eacute;gorie : <?php echo $this->_tpl_vars['article']['category']; ?>
 <span class="bullet">&#9679;</span></li>
							<li>Nb. mots : <?php echo $this->_tpl_vars['article']['num_min']; ?>
 - <?php echo $this->_tpl_vars['article']['num_max']; ?>
 / article
							<!--<span class="bullet">&#9679;</span></li>
							<li><a class="scroll" href="#comment"><i class="icon-comment"></i> <?php echo count($this->_tpl_vars['commentDetails']); ?>
</a></li>-->
							<?php if ($this->_tpl_vars['article']['spec_exists'] == 'yes'): ?>
								<li class="pull-right"><a href="/contrib/download-file?type=correctionbrief&article_id=<?php echo $this->_tpl_vars['article']['article_id']; ?>
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
					<div id="selected-editor" class="aside-block">
						<div class="editor-container">
							<h4>Le r&eacute;dacteur</h4>
							<a href="/contrib/public-profile?user_id=<?php echo $this->_tpl_vars['article']['writer']; ?>
" data-target="#viewProfile-ajax" data-toggle="modal" role="button"><img src="<?php echo $this->_tpl_vars['article']['writer_pic_profile']; ?>
" alt="<?php echo $this->_tpl_vars['article']['writer_name']; ?>
"></a>							
							<p class="editor-name"><?php echo $this->_tpl_vars['article']['writer_name']; ?>
</p>
						</div>
					</div>


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
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['livesite']; ?>
/FO/css/common/bootstrap-wysihtml5.css"></link>
<script src="<?php echo $this->_tpl_vars['livesite']; ?>
/FO/script/common/wysihtml5-0.3.0.min.js"></script>
<script src="<?php echo $this->_tpl_vars['livesite']; ?>
/FO/script/common/bootstrap-wysihtml5.js"></script> 
<script src="<?php echo $this->_tpl_vars['livesite']; ?>
/FO/script/common/locales/bootstrap-wysihtml5.fr-FR.js"></script>
<!--  ratings -->
<script type="text/javascript" charset="utf-8" src="<?php echo $this->_tpl_vars['livesite']; ?>
/FO/script/common/jquery.raty.min.js"></script>
<?php echo '
<script type="text/javascript">
var cur_date=0,js_date=0,diff_date=0;
cur_date='; ?>
<?php echo time(); ?>
<?php echo ';
js_date=(new Date().getTime())/ 1000;
diff_date=Math.floor(js_date-cur_date);
	$("#menu_ongoing").addClass("active");
	startMissionTimer(\'dtime\',\'dtext\');
function refreshModel(cpartid, artid)
{   //alert(\'hey\');
    var href="/contrib/corrector-article-popup?cparticipation_id="+cpartid+"&article_id="+artid+" ";
    $("#fix-article").removeData(\'modal\');
    $(\'#fix-article .modal-body\').load(href);
    $("#fix-article").modal();
    $(".modal-backdrop:gt(0)").remove();
}
</script>
'; ?>

<!-- ***** Modal collections -->
<!-- ajax use start -->
<div id="fix-article" class="modal container hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3 id="myModalLabel">Correction d'article</h3>
	</div>
	<div class="modal-body">
	</div>
</div>
	<!-- ajax use start -->
	<div id="viewProfile-ajax" class="modal container hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h3 id="myModalLabel">Profil public</h3>
			</div>
		<div class="modal-body">
		</div>
	</div>
	<!-- ajax use end -->