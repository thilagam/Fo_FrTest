<?php /* Smarty version 2.6.19, created on 2014-07-14 12:03:27
         compiled from Client/superclientlogin.phtml */ ?>
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
				$("#superclientlogin").validate({
					onkeyup: false,
					onfocusout: false,
					rules: {
						login_name:  {
							required: true,
							email: true
						},
						login_password: "required"
					},
					messages: {
						login_name: "Merci d\'ins&eacute;rer une adresse email correcte",
						login_password: "Merci d\'ins&eacute;rer votre mot de passe",
					},
					submitHandler: function(form) { 
						submitlogin();
					}
					
				});
			}
		}

		//when the dom has loaded setup form validation rules
		$(D).ready(function($) {
			JQUERY4U.UTIL.setupFormValidation();
		});

	})(jQuery, window, document);
	
	function submitlogin()
	{
		var login_name = $("#login_name").val();
		var login_password = $("#login_password").val();
		var returl=$("#returl").val();
		var err_count=0;
		err_msg="";
		
		if(login_name=="")
			$("#nameerr").html();
				
				$.ajax({
					url: "/suivi-de-commande/uservalidationajax",
					global: false,
					type: "POST",
					data: ({login_name : login_name,login_password:login_password}),
					dataType: "html",
					async:false,
					success: function(msg){
						if (msg == "NO") {
							$("#nameerr").html("Email ou mot de passe incorrect!");
							return false;
						}
						else
						{
							window.location = "/suivi-de-commande/index";
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
	

	 
	<div style="height:400px">   
		<form method="POST" class="form-horizontal" name="superclientlogin" id="superclientlogin" action="" >
			<table cellpadding="8" cellspacing="8" align="center" width="35%">
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="50%" valign="top"><label class="control-label" for="inputEmail" style="margin:0px">Votre Email</label></td>
					<td>
						<input type="text" name="login_name" id="login_name" placeholder="Email" class="input-xlarge" />
						<label class="error" for="login_name" generated="true" style="padding-bottom:0px;"></label>
					</td>
				</tr>
				<tr>
					<td valign="top"><label class="control-label" for="inputPassword" style="margin:0px">Votre mot de passe</label></td>
					<td>
						<input type="password" name="login_password" id="login_password" placeholder="Mot de passe" class="input-xlarge" />
						<label class="error" for="login_password" generated="true"></label>
						<div id="nameerr" class="error"></div>
					</td>
				</tr>
				<tr align="center">
					<td></td>
					<td style="float:left"><button type="submit" class="btn btn-primary">Se connecter</button></td>
				</tr>
			</table>			
		</form>
	</div>