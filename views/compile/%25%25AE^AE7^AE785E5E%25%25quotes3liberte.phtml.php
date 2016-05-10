<?php /* Smarty version 2.6.19, created on 2015-07-29 13:16:39
         compiled from Client/quotes3liberte.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Client/quotes3liberte.phtml', 37, false),)), $this); ?>
<section class="quoteform" id="step3">
	<div class="container padding">
		<div class="center-block">
			<div class="alert alert-success">Merci ! Nous avons bien pris en compte votre demande de devis.</div>
			<p>Date de diffusion maximum : <span class="label label-warning" style="font-size:14px"><?php echo $this->_tpl_vars['time48']; ?>
</span></p>
			<p>Votre annonce sera  diffusée auprès de nos rédacteurs experts <?php echo $this->_tpl_vars['category_array'][$this->_tpl_vars['category']]; ?>
.</p>  
			<p>Vous recevrez un email de confirmation sur l'adresse : <em><?php echo $this->_tpl_vars['client_email']; ?>
</em>.</p>
		</div>
		<div class="content-block quotelist">     
			<h4><strong>Nom du projet</strong> <br>
			<?php echo $this->_tpl_vars['missiontitle']; ?>
</h4>      
			<div class="table-responsive">     
				<table class="table table-striped">
					<tr> 
						<th>Produit</th>
						<th></th>
						<th>Volume</th>
						<th>Secteur</th>
						<th>Langues</th>
						<th>Objectif</th>
					</tr>
					<?php $_from = $this->_tpl_vars['statarray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['quote']):
?>
					<tr>
						<td><img src="/FO/images/imageB3/ctype-<?php echo $this->_tpl_vars['quote']['type']; ?>
.png" width="50" height="50"></td>
						<td><?php echo $this->_tpl_vars['quote']['typetext']; ?>
</td>
						<td><?php if ($this->_tpl_vars['quote']['num'] == ""): ?>N/A<?php else: ?><?php echo $this->_tpl_vars['quote']['num']; ?>
<?php endif; ?></td>
						<td><?php echo $this->_tpl_vars['category_array'][$this->_tpl_vars['category']]; ?>
</td>
						<td><?php echo $this->_tpl_vars['lang_array'][$this->_tpl_vars['quote']['writing_lang']]; ?>
</td>
						<td><?php echo $this->_tpl_vars['quote']['objectives']; ?>
</td>
					</tr>
					<?php endforeach; endif; unset($_from); ?>
				</table>
			</div>
			<p><a href="/client/home?type=new" class="btn btn-default">Plus de détails</a></p> 
		</div>

		<?php if (count($this->_tpl_vars['categorywriters']) > 0): ?>
		<div class="row">
			<div class="col-xs-12 col-md-8">
				<div class="content-block recap-profile">
					<h4>Des rédacteurs du secteur <?php echo $this->_tpl_vars['category_array'][$this->_tpl_vars['category']]; ?>
</h4>
					<ul style="padding-right:10px">
						<?php $_from = $this->_tpl_vars['categorywriters']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['contrib']):
?>
						<li>
							<span class="contrib-frame"><img src="/FO/profiles/contrib/pictures/<?php echo $this->_tpl_vars['contrib']['user_id']; ?>
/<?php echo $this->_tpl_vars['contrib']['user_id']; ?>
_h.jpg" class="media-object"></span>
							<div class="contrib-name clearfix"><?php echo $this->_tpl_vars['contrib']['last_name']; ?>
</div>
						</li>
						<?php endforeach; endif; unset($_from); ?>
					</ul>        
				</div>
			</div>
			<div class="col-xs-12 col-md-4">
				<div class="content-block">
					<h4><span class="glyphicon glyphicon-info-sign"></span> A propos des tarifs</h4>
					Edit-place prend une <strong>commission de 35%</strong> sur chaque mission réalisée par un rédacteur.
					Pensez à bien intégrer cette composante lorsque vous négociez votre tarif avec le rédacteur.
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div>  
</section>

<section class="dashit"  id="garantee">
	<div class="container padding">
		<div class="center-block">
			<h2>La garantie Edit-place</h2>
		</div>
		<div class="row">
			<div class="col-xs-12 col-md-4 col-md-offset-1 wow fadeInLeft">
				<div class="center-block"><img src="/FO/images/mediateur.png" width="67" height="75" alt="Moderateur">
					<h4>Edit-place est votre médiateur</h4>
					<p>En cas de contestation (délai de livraison, reprise d'articles, remboursement...)</p>
				</div>
			</div> 
			<div class="col-xs-12 col-md-4 col-md-offset-2 wow fadeInRight">
				<div class="center-block">
					<img src="/FO/images/secured.png" width="75" height="75" alt="Paiement sécurisé">
					<h4>Paiement sécurisé</h4>
					<p>Notre solution de paiement en ligne vous garantit une transaction en toute tranquillité</p>
				</div> 
			</div>
		</div>   
	</div>
</section>

<section class="dashit"  id="strategy-teasing">
	<div class="container padding">
		<div class="center-block">
			<h2>L'expertise Edit-place, c'est aussi...</h2>
		</div>
		<div class="row">
			<div class="col-xs-12 col-md-6 wow fadeInLeft">
				<h4>Stratégie éditoriale</h4>
				<ul>
					<li>Sélection de sujets originaux</li>
					<li>Détection des meilleurs mots-clés à travailler</li>
					<li>Proposition de formats élaborés pour les réseaux sociaux</li>
					<li>Analyse et suivi des résultats (partages, rankings) </li>
				</ul>
			</div> 
			<div class="col-xs-12 col-md-6 wow fadeInRight">
				<h4>Solutions éditoriales complémentaires</h4>
				<ul>
					<li>Intégration / curation de contenu</li>
					<li>Community management</li>
					<li>Reprise / correction de textes existants</li>
					<li>Veille de presse </li>
				</ul>
			</div> 
		</div>   
	</div>
</section>