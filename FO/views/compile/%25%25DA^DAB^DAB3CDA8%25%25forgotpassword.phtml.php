<?php /* Smarty version 2.6.19, created on 2016-03-17 15:18:42
         compiled from Client/forgotpassword.phtml */ ?>
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
					$("#forgotpwdform").validate({
						onkeyup:false,
						rules: {
							reset_pwd: {
								required: true,
								minlength: 6
							},
							reset_cpwd: {
								required: true,
								minlength: 6,
								equalTo:"#reset_pwd"
							}
						},
						messages: {
							reset_pwd: {
								required:"Merci d\'ins&eacute;rer votre mot de passe",
								minlength:"Le mot de passe doit comporter plus de 6 caract&egrave;res"
							},
							reset_cpwd: {
								required:"Merci de confirmer votre mot de passe",
								minlength:"Le mot de passe doit comporter plus de 6 caract&egrave;res",
								equalTo: "Le mot de passe doit &ecirc;tre le m&ecirc;me"
							}
						},
						submitHandler: function(form) {
							var user_id=$("#user_id").val();
							var hash_key=$("#hash_key").val();
							var reset_pwd=$("#reset_pwd").val();
						  $.ajax({
								url: "/client/updatepassword",
								global: false,
								type: "POST",
								data: {user_id : user_id,hash_key:hash_key,pw:reset_pwd},
								dataType: "html",
								async:false,
								success: function(msg){ //alert(msg);
									var alerttext=\'<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-ok icon-white"></i> Votre mot de passe a &eacute;t&eacute; r&eacute;initialis&eacute; avec succ&egrave;s. Vous venez de recevoir une confirmation par email.</div>\';
									if(msg=="reset")
										$("#alertmsg").html(alerttext);
									
								}
							});
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
	
	
<div class="container">
	<div class="row">
		<div class="span12">
			<legend>R&eacute;initialiser votre mot de passe :</legend>
		</div>
	</div>

	<div class="row">   
		<form name="forgotpwdform" id="forgotpwdform" method="POST"   enctype="multipart/form-data" />
		<div class="span9">
			<div id="alertmsg" style="height:320px;">
				<?php if ($this->_tpl_vars['error_msg'] == ''): ?>
				<div class="controls controls-row">
					<div class="span6">
						<label>Nouveau mot de passe:</label>
						<input type="password" class="span12" placeholder="" name="reset_pwd" id="reset_pwd" style="width:320px">
						<div class="error" id="passerr"></div>
					</div>
					<div class="span6">
						<label>Confirmer le mot de passe:</label>
						<input type="password" class="span12" placeholder="" name="reset_cpwd" id="reset_cpwd" style="width:320px">
						<div class="error" id="conpasserr"></div>
					</div>
					<div class="span6" style="padding-top:12px">
						<button type="submit" name="change_password" class="btn btn-large btn-primary" value="submit" >R&eacute;initialiser le mot de passe</button>
					</div>
					<input type="hidden" name="user_id" id="user_id" value="<?php echo $this->_tpl_vars['login_id']; ?>
" />
					<input type="hidden" name="hash_key" id="hash_key" value="<?php echo $this->_tpl_vars['hashkey']; ?>
" />
				</div>
				<?php else: ?>
					<font color="#FF0000"><?php echo $this->_tpl_vars['error_msg']; ?>
</font>
				<?php endif; ?>
			</div>
		</div>	
		</form>	
	</div>
</div>