<?php /* Smarty version 2.6.19, created on 2015-07-29 13:17:48
         compiled from Client/extendparticipationtime.phtml */ ?>
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
					$("#extendform").validate({
						onKeyup:false,
						rules: {
							extendvalue:  {
								required: true,
								number: true
							},
							clientcomment: "required"
						},
						messages: {
							extendvalue: {
								required:"Enter Extend time",
								number:"Merci d\'ins&eacute;rer un chiffre",
							},
							clientcomment: "Merci d\'ins&eacute;rer un commentaire"						
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
	<div class="">
		
			<div class="well">
				<h4>Accorder un d&eacute;lai suppl&eacute;mentaire</h4>
				<ul class="unstyled">
					<li><i class="icon-briefcase"></i> Nom du projet : <?php echo $this->_tpl_vars['aodetails'][0]['title']; ?>
</li>
				</ul>
				<hr>

				<div class="input-prepend">
					<label>D&eacute;lai suppl&eacute;mentaire accord&eacute; :</label>
					<span class="add-on"><i class="icon-plus"></i></span>
					<input class="span1" id="extendvalue" name="extendvalue" type="text"/>
					<select class="span2" id="extendtype" name="extendtype">
						<option value="min">Min(s)</option>
						<option value="hour" selected>Heure(s)</option>
						<option value="day">Jour(s)</option>
					</select>
					<label class="error" for="extendvalue" generated="true"></label>
				</div>

				<label>Commentaire</label>
				<textarea name="clientcomment" id="clientcomment" class="textarea-ask4update span12" rows="3"></textarea>
			</div>
			<div class="clearfix">
				<button aria-hidden="true" data-dismiss="modal" class="btn" type="button">Annuler</button>
				<button class="btn btn-primary" type="sumbit" name="extendparticipation_submit" value="extendparticipation_submit">Envoyer</button>
			</div>
			<input type="hidden" name="submit_time" id="submit_time" value="<?php echo $this->_tpl_vars['aodetails'][0]['participation_expires']; ?>
" />
		
	</div>
</div>

        
<a class="pull-right btn btn-small disabled anchor-top scroll" href="#brand"><i class="icon-arrow-up"></i></a>