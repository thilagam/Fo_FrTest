<?php /* Smarty version 2.6.19, created on 2015-07-29 13:15:55
         compiled from Client/quotes3.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Client/quotes3.phtml', 33, false),array('modifier', 'upper', 'Client/quotes3.phtml', 50, false),)), $this); ?>
<section class="quoteform" id="step3">
	<div class="container padding">
		<div class="center-block">
			<div class="alert alert-success">Merci ! Nous avons bien enregistré votre demande de devis.</div>
			<h2>Un responsable client va prendre contact avec vous</h2>
		</div>
		<div class="content-block quotelist">
			<h4>Votre devis</h4>
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
						<td><?php echo $this->_tpl_vars['lang_array'][$this->_tpl_vars['quote']['translation_from']]; ?>
,<?php echo $this->_tpl_vars['lang_array'][$this->_tpl_vars['quote']['translation_to']]; ?>
</td>
						<td><?php echo $this->_tpl_vars['quote']['objectives']; ?>
</td>
					</tr>
					<?php endforeach; endif; unset($_from); ?>
				</table>
			</div>
		</div>

		<?php if (count($this->_tpl_vars['categorywriters']) > 0): ?>
		<div class="content-block recap-profile">
			<h4>Des rédacteurs du secteur voyage</h4>
			<ul style="margin-right:40px">
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
		<?php endif; ?>
		
		<div class="content-block quote-pricing">
			<div class="center-block">
				<h4>Nous avons trouvé des devis similaires</h4>
				<!--<p>Les tarifs sont indiqu&eacute;s &agrave; titre indicatif et sont des tarifs par <b><u><?php echo ((is_array($_tmp=$this->_tpl_vars['type_array'][$this->_tpl_vars['type']])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</u></b>. Vous recevrez bientôt votre devis personnalisé</p>-->
				<p>Ces devis sont communiqués à titre indicatif. Vous recevrez bientôt votre devis personnalisé <?php if ($this->_tpl_vars['aotype'] != 'premium'): ?>en diffusant votre annonce sur notre site<?php endif; ?></p>
				<div class="table-responsive">  
					<table class="table table-bordered table-striped">
						<tbody>
						<tr><th></th><th>Tarif 1</th><th>Tarif 2</th><th>Tarif 3</th></tr>
					<?php $_from = $this->_tpl_vars['pricestats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['price']):
?>
					<tr>
						<td><img width="50" height="50" src="/FO/images/imageB3/ctype-<?php echo $this->_tpl_vars['price']['type']; ?>
.png" alt="Guides"><div class="title"><?php if ($this->_tpl_vars['contype'] == 'writing'): ?>R&eacute;daction<?php else: ?>Traduction<?php endif; ?> <?php echo $this->_tpl_vars['type_array'][$this->_tpl_vars['price']['type']]; ?>
<br> en <?php echo $this->_tpl_vars['lang_array'][$this->_tpl_vars['language']]; ?>
</div></td>
							<td><div class="price"><?php echo $this->_tpl_vars['price']['price1']; ?>
 €</div>Volume : <?php echo $this->_tpl_vars['price']['num1']; ?>
<br>Un acteur <?php echo $this->_tpl_vars['category_array'][$this->_tpl_vars['category']]; ?>
</td>
						   <td><div class="price"><?php echo $this->_tpl_vars['price']['price2']; ?>
 €</div>Volume : <?php echo $this->_tpl_vars['price']['num2']; ?>
<br>Un acteur <?php echo $this->_tpl_vars['category_array'][$this->_tpl_vars['category']]; ?>
</td>
							<td><div class="price"><?php echo $this->_tpl_vars['price']['price3']; ?>
 €</div>Volume : <?php echo $this->_tpl_vars['price']['num3']; ?>
<br>Un acteur <?php echo $this->_tpl_vars['category_array'][$this->_tpl_vars['category']]; ?>
</td>
					</tr>
					<?php endforeach; endif; unset($_from); ?>
						
					</tbody></table>  
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

