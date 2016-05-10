<?php /* Smarty version 2.6.19, created on 2015-07-29 13:15:53
         compiled from Client/confirmpremium.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'upper', 'Client/confirmpremium.phtml', 5, false),)), $this); ?>
<div class="modal-header">
	<button type="button" class="close" Onclick="dismissmodal();" aria-hidden="true">&times;</button>
	<div class="center-block">
		<h4>Nous avons trouvé des devis similaires</h4>
		<!--<p>Les tarifs sont indiqu&eacute;s &agrave; titre indicatif et sont des tarifs par <b><u><?php echo ((is_array($_tmp=$this->_tpl_vars['type_array'][$this->_tpl_vars['type']])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</u></b>. <?php if ($this->_tpl_vars['aotype'] == 'premium'): ?>Vous recevrez bientôt votre devis personnalisé<?php endif; ?></p>-->
		<p><p>Ces devis sont communiqu&eacute;s &agrave; titre indicatif. Vous recevrez bient&ocirc;t votre devis personnalis&eacute; <?php if ($this->_tpl_vars['aotype'] != 'premium'): ?>en diffusant votre annonce sur notre site<?php endif; ?></p>
	</div>
</div>

	<div class="center-block quote-pricing"> 
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
				</tbody>
			</table>  
		</div>
	</div>

<div class="modal-footer">
	<p class="center-block alert-info"><span class="glyphicon glyphicon-plus"></span> 
		<?php if ($this->_tpl_vars['aotype'] == 'premium'): ?>
			Un expert éditorial va vous contacter et vous proposez un devis personnalisé en moins de 24h
		<?php else: ?>
			Vous allez bient&ocirc;t pouvoir compl&eacute;ter votre demande et diffuser votre annonce sur notre site
		<?php endif; ?>
	</p>    
	<button type="button" class="btn btn-default btn-lg" Onclick="dismissmodal();">Annuler</button>
	<button class="btn btn-primary btn-lg" onClick="document.quotes1form.submit();">J'ai compris</button>
</div>
