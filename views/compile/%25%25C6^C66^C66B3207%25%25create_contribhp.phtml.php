<?php /* Smarty version 2.6.19, created on 2015-07-28 10:21:46
         compiled from common/create_contribhp.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'common/create_contribhp.phtml', 201, false),)), $this); ?>
<?php echo '
<script language="javascript" type="text/javascript">
function userlogin()
{
	var login_name = $("#email_login").val();
	var login_password = $("#password_login").val();
	var err_count=0;
	err_msg="";
	if(login_name=="")
		$("#passerr").html();
	$.ajax({
		url: "/index/uservalidationajax",
		global: false,
		type: "POST",
		data: ({login_name : login_name,login_password:login_password}),
		dataType: "html",
		async:false,
		success: function(msg){
			if (msg == "NO") {
				$(\'#passerr\').html("Email ou mot de passe incorrect!")
				return false;
			}
			else if(msg==\'client\')
			{
			window.location = "/client/profile";
				}
			else if(msg==\'contributor\')
			{
				window.location = "/contrib/modify-profile";
			}
			else
			{
				$(\'#passerr\').html("Email ou mot de passe incorrect");
				return false;
			}
		}
	});
	return false;
} 
(function($,W,D)
	{
		var JQUERY4U = {};

		JQUERY4U.UTIL =
		{
			setupFormValidation: function()
			{
				//form validation rules1
				$("#login_form").validate({
					onkeyup: false,
					onfocusout: false,
					rules: {
						email_login:  {
							required: true,
							email: true
						},
						password_login: "required"
					},
					messages: {
						email_login: {
								required:"Merci d\'indiquer une adresse email",
								email:"Merci d\'ins&eacute;rer une adresse email correcte"								
							},
						password_login: "Merci d\'ins&eacute;rer votre mot de passe",
					},
					submitHandler: function(form) { 
						userlogin();
					}
					
				});
			}
		}

		//when the dom has loaded setup form validation rules
		$(D).ready(function($) {
			JQUERY4U.UTIL.setupFormValidation();
		});

	})(jQuery, window, document);
function switchloginform(opt)
{
	if(opt=="option1")
	{
	$("#option1fields").show();
	$("#option2fields").hide();
	}
	else if(opt=="option2")
	{
	$("#option1fields").hide();
	$("#option2fields").show();
	}
} 

	function validate_registercontrib()
	{
				var option=$("input[name=\'optionsRadios\']:checked").val();
				if(option=="option1")
				{
					//form validation rules
					$("#registerform").validate({
						onkeyup:false,
						rules: {
							email:  {
								required: true,
								email: true,
								remote: "/client/checknewuseremail"
											
							},
							password: {
								required: true,
								minlength: 6
							},
							confirmpassword: {
								required: true,
								minlength: 6,
								equalTo:"#password"
							},
							termscheck: "required"
						},
						messages: {
							email: {
								required:"Merci d\'indiquer une adresse email",
								email:"Merci d\'ins&eacute;rer une adresse email correcte",
								remote:"Cette adresse email existe d&eacute;j&agrave;"
							},
							password: {
								required:"Merci d\'ins&eacute;rer votre mot de passe",
								minlength:"Le mot de passe doit comporter plus de 6 caract&egrave;res"
							},
							confirmpassword: {
								required:"Merci de confirmer votre mot de passe",
								minlength:"Le mot de passe doit comporter plus de 6 caract&egrave;res",
								equalTo: "Le mot de passe doit &ecirc;tre le m&ecirc;me"
							},
							termscheck: "Merci de valider les CGU"						
						}
						
					});
					
				}
	}			
			
	
	
	
</script>

'; ?>


	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3 id="myModalLabel"><i class="icon-user"></i> Connexion</h3>
	</div>
	
		<p style="padding:10px;">Devenez r&eacute;dacteur pour Edit-place et acc&eacute;dez &agrave; des centaines de missions et demandes de devis tous les mois!</p>
		
		<div class="row">
			<div class="col-xs-8" style="padding-left:120px">	
				<div class="radio">
					<label for="optionsRadios2">
						<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" checked>
						J'ai d&eacute;j&agrave; un compte chez edit-place
					</label>
				</div>
				<div class="radio">
					<label for="optionsRadios1">
						<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
						<strong>Nouveau ? Je cr&eacute;e un compte</strong> 
					</label>
				</div>
			</div>
		</div>
		
		<hr>  
		
		<div id="option1fields" style="display:none;">
		<form method="POST" class="form-horizontal" name="registerform" id="registerform" action="/contrib/addcontrib">			
			<div class="modal-body">
			<div class="form-group">
				<label for="login_email" class="col-sm-4 control-label">Adresse email</label>
				<div class="col-xs-12 col-md-6">
					<input type="text" class="form-control" id="login_email" name="email">						
				</div>
			</div>			
			<div class="form-group">
				<label class="col-sm-4  control-label" for="password" >Cr&eacute;er un mot de passe</label>
				<div class="col-xs-12 col-md-6">
					<input type="password" class="form-control" id="password" name="password">						
				</div>
			</div>				
			<div class="form-group">
				<label for="inputEmail" class="col-sm-4 control-label">Confirmez votre mot de passe</label>
				<div class="col-xs-12 col-md-6">
					<input type="password" class="form-control" id="confirmpassword" name="confirmpassword">						
				</div>
			</div>					 
			<div class="form-group">
				<label for="inputEmail" class="col-sm-4 control-label">Langue maternelle</label>
				<div class="col-xs-12 col-md-6">
					<select name="language" id="language" class="form-control">
						<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ep_language_list'],'selected' => 'fr'), $this);?>

					</select>	
				</div>
			</div>	
			<input type="hidden" name="newuser" id="newuser" value="1" />	
			<div class="form-group">		
					<label class="col-sm-4  control-label" ></label>
					<div class="col-xs-12 col-md-10">
						<input type="checkbox" name="termscheck" id="termscheck">J'accepte les 
						<a target="_blank" href="/contrib/terms">conditions g&eacute;n&eacute;rales d'utilisation Edit-Place </a>							
						<label class="error" for="termscheck" generated="true"></label>
					</div>
			</div>	
			</div>
			<div class="modal-footer">
				<button type="submit" name="register_contrib" class="btn btn-primary" value="submit" onClick="return validate_registercontrib();">Cr&eacute;er mon compte</button>
			</div>
		</form>
		</div>
		
		<div id="option2fields" >
			<form method="POST" class="form-horizontal" name="login_form" id="login_form" action="" >
				<div class="modal-body">
				<div class="form-group">
					<label class="col-sm-4 control-label" for="email_login">Votre Email</label>
					<div class="col-xs-12 col-md-6">
						<input type="text" name="email_login" id="email_login" placeholder="Email" class="form-control" />
						<div class="error" id="emailerr"></div>
					</div>
				</div>
				<div class="form-group" style="margin-bottom:10px">
					<label class="col-sm-4 control-label" for="password_login">Votre mot de passe</label>
					<div class="col-xs-12 col-md-6">
						<input type="password" name="password_login" id="password_login" placeholder="Mot de passe" class="form-control" />
						<div class="error" id="passerr"></div>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-4 control-label"></label>	
					<div class="col-xs-12 col-md-6">
						<a data-target="#lost-password" data-toggle="modal" class="killcurrentmodal">Mot de passe oubli� ?</a>
					</div>
				</div>
				</div>
				<div class="modal-footer">
					<button type="submit"  class="btn btn-primary">Se connecter</button>
					<button class="btn" data-dismiss="modal" aria-hidden="true" type="button">Annuler</button>
				</div>
			</form>
		</div>				
	
	<!--<div id="terms" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" onclick="$('#terms').modal('hide');" aria-hidden="true">&times;</button>
					<h3 id="myModalLabel">Votre contrat</h3>
				</div>
				<div class="modal-body" style="text-align:justify">
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" aria-hidden="true" onclick="$('#terms').modal('hide');">Fermer</button>
				</div>
			</div>
		</div>	
	</div>-->