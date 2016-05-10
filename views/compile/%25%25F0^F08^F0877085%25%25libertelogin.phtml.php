<?php /* Smarty version 2.6.19, created on 2015-07-29 07:37:37
         compiled from common/libertelogin.phtml */ ?>
<?php echo '
<script language="javascript">
	(function($,W,D)
	{ 
		var JQUERY4U = {};

		JQUERY4U.UTIL =
		{
			setupFormValidation: function()
			{
				//form validation rules1
				$("#liberteloginform").validate({
					onkeyup: false,
					onfocusout: false,
					rules: {
						libertelogin_name:  {
							required: true,
							email: true
						},
						libertelogin_password: "required"
					},
					messages: {
						libertelogin_name: "Merci d\'ins&eacute;rer une adresse email correcte",
						libertelogin_password: "Merci d\'ins&eacute;rer votre mot de passe",
					},
					submitHandler: function(form) { 
						libertesubmitlogin();
					}
					
				});
			}
		}

		//when the dom has loaded setup form validation rules
		$(D).ready(function($) {
			JQUERY4U.UTIL.setupFormValidation();
		});

	})(jQuery, window, document);
		
	function libertesubmitlogin()
	{
		var login_name = $("#libertelogin_name").val();
		var login_password = $("#libertelogin_password").val();
		var err_count=0;
		err_msg="";
		
		if(login_name=="")
			$("#nameerr").html();
				
				$.ajax({
					url: "/index/uservalidationajax",
					global: false,
					type: "POST",
					data: ({login_name : login_name,login_password:login_password}),
					dataType: "html",
					async:false,
					success: function(msg){//alert(msg);
						if (msg == "NO") {
							$(\'#libertenameerr\').html("Email ou mot de passe incorrect");
							return false;
						}
						else
						{
							$.ajax({
								url : "/client/saveliberte1",
								type: "POST",								
								data : $(\'#fileupload\').serialize(),
								success: function(msg1){
									document.liberteloginform.action="/index/loginvalidationliberte";
									document.liberteloginform.submit();
								}
							});
							
						}
					}
				});
			
			return false;
	}
	
</script>
<style>
	.error { font-size:15px;color:#FF0000; margin:0; }
	.modal.fade.in { top: 350px;}
</style>
'; ?>
	

	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3 id="myModalLabel"><i class="icon-user"></i> Connexion</h3>
	</div>
	<div class="modal-body">
		<form method="POST" class="form-horizontal" name="liberteloginform" id="liberteloginform" action="" >
			<div class="control-group" style="margin-bottom:10px">
				<label class="control-label" for="inputEmail" style="margin:0px">Votre Email</label>
				<div class="controls">
					<input type="text" name="libertelogin_name" id="libertelogin_name" placeholder="Email" class="input-xlarge" />
					<label class="error" for="libertelogin_name" generated="true" style="padding-bottom:0px;"></label>
				</div>
			</div>
			<div class="control-group" style="margin-bottom:10px">
				<label class="control-label" for="inputPassword" style="margin:0px">Votre mot de passe</label>
				<div class="controls">
					<input type="password" name="libertelogin_password" id="libertelogin_password" placeholder="Mot de passe" class="input-xlarge" />
					<label class="error" for="libertelogin_password" generated="true"></label>
					<div id="nameerr" class="error"></div>
				</div>
			</div>
			
			<div class="control-group">
				<div class="controls">
					<label class="checkbox remember">
						<!--<input type="checkbox"> Se souvenir de moi <span class="muted"> | --></span> <a data-target="#lost-password" data-toggle="modal" class="killcurrentmodal">Mot de passe oublié ?</a>
					</label>
					<button type="submit" class="btn btn-primary">Se connecter</button>
					<button class="btn" data-dismiss="modal" aria-hidden="true" type="button">Annuler</button>
				</div>
			</div>
		</form>
	</div>