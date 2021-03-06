<?php /* Smarty version 2.6.19, created on 2015-07-29 13:22:43
         compiled from Client/dissapproveclient.phtml */ ?>
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
					$("#disapform").validate({
						onKeyup:false,
						rules: {
							dissapprovevalue:  {
								required: true,
								number: true
							},
							dissapprovecomment: "required"
						},
						messages: {
							dissapprovevalue: {
								required:"Merci d\'indiquer un d&eacute;lai suppl&eacute;mentaire",
								number:"Merci d\'ins&eacute;rer un chiffre",
							},
							dissapprovecomment: "Merci d\'ins&eacute;rer un commentaire"						
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
	<div class="span9">
		<form method="POST" name="disapform" id="disapform" action="/client/order4?id=<?php echo $_GET['id']; ?>
">
			<div class="well">
				<label><i class="icon-hand-right"></i> Listez les modifications demand&eacute;es</label>
				<textarea name="dissapprovecomment" id="dissapprovecomment" class="textarea-ask4update span12" rows="3" placeholder="Indiquez &agrave; <?php echo $this->_tpl_vars['contact'][0]['name']; ?>
 les mises &agrave; jours &agrave; effectuer"></textarea>
				<hr>
				<h4>Accorder un d&eacute;lai &agrave; <?php echo $this->_tpl_vars['contact'][0]['name']; ?>
 pour effectuer les modifications</h4>
				<div class="input-prepend">
					<label>D&eacute;lai suppl&eacute;mentaire accord&eacute; :</label>
					<span class="add-on"><i class="icon-plus"></i></span>
					<input class="span1" id="dissapprovevalue" name="dissapprovevalue" type="text" />
					<select class="span2" id="dissapprovetype" name="dissapprovetype">
						<option value="min">Min(s)</option>
						<option value="hour" selected>Heure(s)</option>
						<option value="day">Jour(s)</option>
					</select>
					<label class="error" for="dissapprovevalue" generated="true"></label>
				</div>
			</div>
			<div class="clearfix">
				<button aria-hidden="true" data-dismiss="modal" class="btn" type="button">Annuler</button>
				<button class="btn btn-primary" type="sumbit" name="disspprove_submit" value="disspprove_submit">Envoyer</button>
			</div>
			<input type="hidden" name="contribid" id="contribid" value="<?php echo $this->_tpl_vars['contact'][0]['identifier']; ?>
" />
			<input type="hidden" name="participateid" id="participateid" value="<?php echo $this->_tpl_vars['aoparticipation'][0]['participateid']; ?>
" />
			<input type="hidden" name="artproId" id="artproId" value="<?php echo $this->_tpl_vars['aoparticipation'][0]['artproId']; ?>
" />
		</form>
	</div>
	<div class="span3">
		<div class="alert alert-info"><i class="icon-info-sign"></i> Vous souhaitez demandez une reprise &agrave; <?php echo $this->_tpl_vars['contact'][0]['name']; ?>
. Merci d'en indiquer les raisons le plus pr&eacute;cisement possible et de fixer un d&eacute;lai suppl&eacute;mentaire.</div>
		<div class="mod">
			<div class="editor-container">
				<h4>Votre r&eacute;dacteur</h4>
				<a class="imgframe-large" onclick="loadcontribprofile('<?php echo $this->_tpl_vars['contact'][0]['identifier']; ?>
');" role="button" data-toggle="modal" data-target="#viewContribProfile" style="cursor:pointer;">
					<img src="<?php echo $this->_tpl_vars['contact'][0]['profilepic']; ?>
" alt="<?php echo $this->_tpl_vars['contact'][0]['name']; ?>
">
				</a>
				<p class="editor-name"><?php echo $this->_tpl_vars['contact'][0]['name']; ?>
</p>
			</div>
		</div>
	</div>
</div>
        
<a class="pull-right btn btn-small disabled anchor-top scroll" href="#brand"><i class="icon-arrow-up"></i></a>