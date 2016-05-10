<?php /* Smarty version 2.6.19, created on 2015-07-29 13:22:43
         compiled from Client/refusedefinite.phtml */ ?>
<?php echo '
<script language="javascript">
	(function($,W,D)
	{
		var JQUERY4U = {};

		JQUERY4U.UTIL =
		{
			setupFormValidation: function()
			{
					//form validation rules
					$("#refuseform").validate({
						onKeyup:false,
						rules: {
							refusecomment: "required"
						},
						messages: {
							refusecomment: "Merci d\'ins&eacute;rer un commentaire"						
						}
					});
			}
		}

		//when the dom has loaded setup form validation rules
		$(D).ready(function($) {
			JQUERY4U.UTIL.setupFormValidation();
		});

	})(jQuery, window, document);
	
</script>

'; ?>


<div class="row-fluid">
	<div class="span12">
		<div class="alert alert-warning"><i class="icon-info-sign"></i> Vous souhaitez annuler la commande. Merci d'en indiquer les raisons le plus pr&eacute;cis&eacute;ment possible.</div>
		<form method="POST" name="refuseform" id="refuseform" action="/client/order4?id=<?php echo $_GET['id']; ?>
">
			<div class="well">
				<label><i class="icon-hand-right"></i> Commentaire</label>
				<textarea name="refusecomment" id="refusecomment" class="textarea-ask4update span12" rows="12" placeholder="Indiquez au <?php echo $this->_tpl_vars['contact'][0]['name']; ?>
 pourquoi vous refusez définitivement le ou les articles qui ont &eacute;t&eacute; livr&eacute;s"></textarea>
			</div>
			<div class="clearfix">
				<button aria-hidden="true" data-dismiss="modal" class="btn" type="button">Annuler</button>
				<button class="btn btn-primary" type="sumbit" name="refuse_submit" value="refuse_submit">Envoyer</button>
			</div>
			<input type="hidden" name="contribid" id="contribid" value="<?php echo $this->_tpl_vars['contact'][0]['identifier']; ?>
" />
		</form>
	</div>
</div>
       
<a class="pull-right btn btn-small disabled anchor-top scroll" href="#brand"><i class="icon-arrow-up"></i></a>

 