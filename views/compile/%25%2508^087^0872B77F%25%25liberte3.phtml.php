<?php /* Smarty version 2.6.19, created on 2014-02-13 07:53:40
         compiled from Client/liberte3.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Client/liberte3.phtml', 25, false),)), $this); ?>
<section id="free_form">
	<div class="container">
		<div class="row">
			<div class="span12" style="position: relative">
				<h1>edit-place <span>Libert&eacute;</span></h1>
				<small>Vous recherchez un journaliste pour travailler sur votre projet de contenu ? <br>D&eacute;posez votre annonce et recevez des devis en moins de 24h</small>
				<div class="freequote">blabla</div>
				<div id="state">
					<ul class="unstyled">
						<li rel="tooltip" title="D&eacute;pôt de votre projet"><span>Cr&eacute;ation de l'annonce</span></li>
						<li rel="tooltip" title="Nos journalistes visualisent votre annonce et vous recevez des devis"><span class="online">Diffusion de l'annonce sur edit-place</span></li> 
						<li class="hightlight" rel="tooltip" title="S&eacute;lectionnez celui qui travaillera sur votre projet"><span class="writer_select">Choix du journaliste</span></li>
					</ul>
				</div>
				<div class="row">   
					<div class="span11 well">
						<p class="checked">Annonce envoy&eacute; pour diffusion</p>
						<h3 class="pull-center"><span>F&eacute;licitation ! Votre annonce est en cours de diffusion</span></h3>
						<p class="lead pull-center">Elle sera diffus&eacute;e aupr&egrave;s de nos <?php echo $this->_tpl_vars['countributorcount']; ?>
 journalistes à  <span class="label label-inverse"><?php echo $this->_tpl_vars['onlinelimit']; ?>
</span></p>
						<p class="lead pull-center">Vous recevrez un email au d&eacute;marrage de l'annonce puis pour chaque devis reçu.</p>
					</div>
				</div>
				<div class="row">
					<div class="span6">
						<?php if (count($this->_tpl_vars['newquotes']) > 0): ?>
							<h4>Mes derniers devis</h4>
							<ul>
								<?php $_from = $this->_tpl_vars['newquotes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['quote']):
?>
									<li><a href="/client/quotes?id=<?php echo $this->_tpl_vars['quote']['id']; ?>
"><?php echo $this->_tpl_vars['quote']['title']; ?>
</a></li>
								<?php endforeach; endif; unset($_from); ?>
							</ul>
							<a href="/client/home?type=new" class="btn btn-small">Voir tout</a>
						<?php endif; ?>
					</div> 
					<div class="span6">
						<?php if ($this->_tpl_vars['firstao'] == 'YES'): ?>
							<h4>D&eacute;couvrir mon espace client</h4>
							<p>Tout d'abord, merci d'avoir choisi edit-place pour vos besoins en contenu de qualit&eacute; !<br>Votre espace client est votre tableau de bord pour recevoir vos devis, s&eacute;lectionner votre journaliste et t&eacute;l&eacute;charger vos contenus.</p>
							<a href="/client/profile" class="btn btn-small">Je d&eacute;couvre mon espace client</a>
						<?php else: ?>
							<a href="/client/profile" class="btn btn-small">espace client</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>