<?php /* Smarty version 2.6.19, created on 2015-07-28 15:20:38
         compiled from Contrib/popup_confirm_selection.phtml */ ?>
<?php echo ' 	
<script type="text/javascript">
	$(".killcurrentmodal").click(function(e){	
		e.preventDefault();	
		$(\'#gotoSelection\').modal(\'hide\');
	});

	
    </script>
'; ?>

<div id="gotoSelection" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close killcurrentmodal" aria-hidden="true">&times;</button>
		<h3 id="ModalLabel">Annonce ajout&eacute;e</h3>
	</div>
	<div class="modal-body">
		<p>Vous pouvez maintenant fixer un tarif pour chaque annonce pour lesquelles vous avez particip&eacute; ou continuer &agrave;  parcourir les annonces clients.</p>
	</div>
	<div class="modal-footer">
		<button class="btn killcurrentmodal" aria-hidden="true">Retour aux annonces</button>
		<a class="btn btn-primary" href="/cart/cart-selection"><i class="icon-list-alt icon-white"></i> Voir mes participations <span class="badge badge-warning cart-selection" id="cart-selection">0</span></a>
	</div>
</div>