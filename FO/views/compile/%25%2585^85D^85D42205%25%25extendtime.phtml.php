<?php /* Smarty version 2.6.19, created on 2015-07-29 13:18:49
         compiled from Client/extendtime.phtml */ ?>
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
	<div class="span9">
		
			<div class="well">
				<h4>Accorder un d&eacute;lai suppl&eacute;mentaire &agrave; <?php echo $this->_tpl_vars['contact'][0]['name']; ?>
</h4>
				<ul class="unstyled">
					<li><i class="icon-briefcase"></i> Nom du projet : <?php echo $this->_tpl_vars['aoparticipation'][0]['title']; ?>
</li>
					<li><i class="icon-time"></i> Livraison initialement pr&eacute;vue dans : 
						<span class="badge badge-warning">
							<?php if ($this->_tpl_vars['aoparticipation'][0]['delivery_timediff'] <= 0): ?>
								D&eacute;lai termin&eacute;
							<?php else: ?>
								<?php if ($this->_tpl_vars['aoparticipation'][0]['hourdiff'] < 24): ?>
									<?php echo $this->_tpl_vars['aoparticipation'][0]['delivery_timediff']; ?>

								<?php else: ?>
									<?php echo $this->_tpl_vars['aoparticipation'][0]['delivery_timediff']; ?>

								<?php endif; ?>
							<?php endif; ?>
						</span>
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
				<button class="btn btn-primary" type="sumbit" name="extend_submit" value="extend_submit">Envoyer</button>
			</div>
			<input type="hidden" name="contribid" id="contribid" value="<?php echo $this->_tpl_vars['contact'][0]['identifier']; ?>
" />
			<input type="hidden" name="submit_time" id="submit_time" value="<?php echo $this->_tpl_vars['aoparticipation'][0]['article_submit_expires']; ?>
" />
		
	</div>

	<div class="span3">
		<div class="alert alert-info"><i class="icon-info-sign"></i> Vous souhaitez accordez un d&eacute;lai suppl&eacute;mentaire &agrave; <?php echo $this->_tpl_vars['contact'][0]['name']; ?>
. Merci d'en indiquer les raisons le plus pr&eacute;cisement possible.</div>
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