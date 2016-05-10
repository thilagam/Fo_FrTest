<?php /* Smarty version 2.6.19, created on 2015-07-30 12:29:48
         compiled from Client/ftvchlogin.phtml */ ?>
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
				$("#ftvlogin").validate({
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
						submitlogin1();
					}
					
				});
			}
		}

		//when the dom has loaded setup form validation rules
		$(D).ready(function($) {
			JQUERY4U.UTIL.setupFormValidation();
		});

	})(jQuery, window, document);
	
	function submitlogin1()
	{
		var login_name = $("#login_name").val();
		var login_password = $("#login_password").val();
		var returl=$("#returl").val();
		var err_count=0;
		err_msg="";
		
		if(login_name=="")
			$("#nameerr").html();
				
				$.ajax({
					url: "/ftvchaine/uservalidationajax",
					global: false,
					type: "POST",
					data: ({login_name : login_name,login_password:login_password}),
					dataType: "html",
					async:false,
					success: function(msg){  // alert(msg);
						if (msg == "NO") {
							$("#nameerr").html("Email ou mot de passe incorrect!");
							return false;
						}
						else
						{
							window.location = "/ftvchaine/index";
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

<div style="height:400px;overflow:hidden">
    <form  method="POST" class="form-horizontal" role="form" name="ftvlogin" id="ftvlogin" action="" >

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-5 control-label">Votre Email</label>
            <div class="col-lg-3">
                <input type="email" class="form-control" id="login_name" name="login_name" placeholder="Email">
            </div>
            <label class="error" for="login_name" generated="true" ></label>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-5 control-label">Votre mot de passe</label>
            <div class="col-lg-3">
                <input type="password" class="form-control" name="login_password" id="login_password" placeholder="Mot de passe"  />
                <div id="nameerr" class="error"></div>
            </div>
            <label class="error" for="login_password" generated="true"></label>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-5 col-sm-5">
                <button type="submit" class="btn btn-primary">Se connecter</button>
            </div>
        </div>
        <!--<table cellpadding="8" cellspacing="8" align="center" width="35%">
            <tr><td>&nbsp;</td></tr>
            <tr>
                <td width="50%" valign="top"><label class="control-label" for="inputEmail" style="margin:0px">Votre Email</label></td>
                <td>
                    <input type="text" name="login_name" id="login_name" placeholder="Email" class="form-control" />
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
                <td colspan="2" ><button type="submit" class="btn btn-primary">Se connecter</button></td>
            </tr>
        </table>			-->
    </form>
</div>