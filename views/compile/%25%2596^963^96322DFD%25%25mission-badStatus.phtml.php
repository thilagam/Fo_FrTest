<?php /* Smarty version 2.6.19, created on 2015-08-11 13:45:57
         compiled from Contrib/mission-badStatus.phtml */ ?>
<section id="contributorBadge">
	<div class="metroline">
		<?php if ($this->_tpl_vars['profile_type'] == 'sub-junior'): ?>
			<div class="leveltext  active">
				<div class="contrib-profile">
					<img src="<?php echo $this->_tpl_vars['profile_pic']; ?>
" />
					Vous ! 
				</div>
		<?php else: ?><div class="leveltext"><?php endif; ?>			
			<span class="label label-level"><i class="icon-bookmark"></i>D&eacute;butant</span>
			<p class="muted">Vous n'avez aucun article<br /> valid&eacute; par Edit-place</p>
		</div>

		<?php if ($this->_tpl_vars['profile_type'] == 'junior'): ?>
			<div class="leveltext  active">
				<div class="contrib-profile">
					<img src="<?php echo $this->_tpl_vars['profile_pic']; ?>
" />
					Vous ! 
				</div>
		<?php else: ?><div class="leveltext"><?php endif; ?>
			<span class="label label-level"><i class="icon-bookmark"></i>Junior</span>
			<p class="muted">Vous avez au moins eu 1 article<br />valid&eacute; sur Edit-place</p>
		</div>
		<?php if ($this->_tpl_vars['profile_type'] == 'senior'): ?>
		<div class="leveltext  active">
				<div class="contrib-profile">
					<img src="<?php echo $this->_tpl_vars['profile_pic']; ?>
" />
					Vous ! 
				</div>
		<?php else: ?><div class="leveltext"><?php endif; ?>
			<span class="label label-level"><i class="icon-bookmark"></i>S&eacute;nior</span>
			<p class="muted">*Vous &ecirc;tes un r&eacute;dacteur <br />confirm&eacute;</p>
		</div>
		<p class="muted"><small>*Statut obtenu sur d&eacute;cision discr&eacute;tionnaire d'Edit-place.</small></p>
	</div>
</section>