<?php /* Smarty version 2.6.19, created on 2015-09-22 12:01:17
         compiled from common/contactus.phtml */ ?>
<?php echo '
<style>
#presentation .call_us .call {
    display: inline-block;
    left: 15px;
    position: relative;
    top: 12px;
}
#presentation .call .notabene {
    color: #B2B2B2;
    font-size: 12px;
    font-weight: normal;
    margin: 10px;
    text-align: center;
}
label.error {
    color: #B94A48;
    display: inline;
    margin: 2px;
    padding-left: 10px;
}
</style>
<script type="text/javascript">	
	
 $(document).ready(function() {			 
			
		 
		 $("#contactus").validate({
				rules:{
					name:"required",
					email:{required:true,email:true},
					msg_object:"required",
					mail_message:"required",										
					captcha:"required"
					
				},
				onkeyup: function(){},
				messages:{
					name:"Nom obligatoire",
					msg_object:"Objet obligatoire",
					mail_message:"Message obligatoire",
					email:{	required:"Adresse e-mail obligatoire",
									email:"L\'adresse email est incorrecte"
						},		
					captcha:"Captcha obligatoire"									
				},				
				errorClass: "error inline",
				errorElement: "label",				
				highlight: function(label) {
					$(label).addClass(\'error\');
					$(label).removeClass(\'success\');
				},
				success: function(label) {
					label.addClass(\'success\');
					label.removeClass(\'error\');
				}					
				
			}); 
			
	});
</script>
'; ?>
	

<section class="gray">
    <div class="container padding pull-top">
		<div class="center-block">
			<h1>Contactez l'�quipe Edit-place</h1>
		</div>
		<div class="page-inner">
			<?php if ($this->_tpl_vars['actionmessages'][0]): ?>
				<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button>
					<i class="icon-ok icon-white"></i> <?php echo $this->_tpl_vars['actionmessages'][0]; ?>

				</div>  
			<?php endif; ?>			
				<hr>
				<p><?php echo $this->_tpl_vars['contacttext']; ?>
</p>								
				<form name="contact" method="post" action="/index/savecontact" id="contactus" class="form-horizontal" role="form">
					<div class="form-group">
						<label for="name" class="col-sm-3 control-label">Saisissez votre nom :</label>
						<div class="col-sm-6">
						  <input type="text" class="form-control" name="name" id="name" value="<?php echo $_GET['name']; ?>
">
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-3 control-label">Adresse e-mail :</label>
						<div class="col-sm-6">
							<input class="form-control" type="text" value="<?php echo $_GET['email']; ?>
" name="email" id="email"/>
						</div>
					</div>
					<div class="form-group">
						<label for="msg_object" class="col-sm-3 control-label">Objet du message :</label>
						<div class="col-sm-6">
							<input class="form-control" type="text" value="<?php echo $_GET['msg_object']; ?>
" name="msg_object" id="msg_object"/>
						</div>
					</div>
					<div class="form-group">
						<label for="mail_message" class="col-sm-3 control-label">Saisissez votre message :</label>
						<div class="col-sm-6">
							<textarea class="form-control" rows="3" name="mail_message" id="mail_message"><?php echo $_GET['mail_message']; ?>
</textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-6">
							<img src="/index/captcha"  alt="captcha" />
						</div>
					</div>
					<div class="form-group">						
						<div class="col-sm-offset-3 col-sm-6">
							<input class="form-control" type="text" name="captcha" id="captcha" /> 
						</div>
						<?php if ($_GET['captcha'] == 'no'): ?>
							<label class="error inline" for="captcha">Captcha Invalide!!</label>
						 <?php endif; ?>		
						 
						 <span id="captcha_error"></span>	
					</div>	
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-6">
						<button type="submit" class="btn btn-default">Envoyer</button>
						</div>
					</div>
				</form>
		
		</div>
		<p>&nbsp;</p>
		
	</div>   
</section>