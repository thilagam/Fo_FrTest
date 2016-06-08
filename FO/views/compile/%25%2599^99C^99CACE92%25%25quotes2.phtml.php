<?php /* Smarty version 2.6.19, created on 2015-10-14 12:33:56
         compiled from Client/quotes2.phtml */ ?>
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
				$("#quotes2form").validate({
					//onkeyup: false,
					//onfocusout: false,
					rules: {
						company_name: "required",
						company_url: {
							remote: "/client/checkvalidurl",
						},
						last_name:"required",
						first_name:	"required",
						email:	{
							required: true,
							email:true,
							remote: "/client/checknewuseremail"
							},	
							quotes_password:	{
							required: function(element){
									return $("input[name=\'clientid\']").val()=="";
								}
							},	
						quotesconfirm_password:	{
							required: function(element){
									return $("input[name=\'clientid\']").val()=="";
								},
							equalTo:"#quotes_password"	
							},							
					},
					messages: {
						company_name:"Veuillez renseigner le nom de votre entreprise",
						company_url:{
						remote:"Merci d\'ins&eacute;rer une URL valide",
						},
						last_name: "Merci de renseigner votre nom",	
						first_name: "Merci de renseigner votre pr&eacute;nom",
						email: {
							required:"Merci de renselgner votre adresse email",
							email:"Merci d\'entrer une adresse email valide",
							remote:"Cet email correspond d&eacute;j&agrave; &agrave; un compte. Merci de vous logger pour continuer"
						},
						quotes_password: "Merci de renseigner un mot de passe",
						quotesconfirm_password:{
							required:"Merci de confirmer votre mot de passe",
							equalTo:"Merci d\'indiquer le même mot de passe"
						},
					},
					/*debug:true,
					submitHandler: function(form) { 
						var catg=$("input[name=\'category\']:checked").val();
						var langu=$("#langu").val();
						var numb=$("#numb").val();
						$.ajax({
							type : \'POST\', 
							url : \'/client/confirmpremium\', 
							data : ({cat:catg,lang:langu,num:numb}),
							   
							success : function(r)
						   {
								$("#confirm-premium").addClass("in");
								$("#confirm-premium").show();
								$("#fadeblock").addClass("modal-backdrop fade in");
								$("#fadeblock").show();
								$(\'#confirmcontent\').html(r);
								$(\'body\').addClass("modal-open");
								$(\'html,body\').animate({scrollTop:100}, 500);
						   }
						});
					}*/
				});
			} 
		}

		//when the dom has loaded setup form validation rules
		$(D).ready(function($) {
			JQUERY4U.UTIL.setupFormValidation(); 
		});

	})(jQuery, window, document);
	
	function dismissmodal()
	{
		$("#confirm-premium").removeClass("in");
		$("#confirm-premium").hide();
		$("#fadeblock").removeClass("modal-backdrop fade in");
		$("#fadeblock").hide();
		$(\'body\').removeClass("modal-open");
	}
</script>

<style>
	.error { color: red !important; font-size:16px !important;}
</style>
'; ?>


<section class="quoteform" id="step2">
	<form action="/client/quotes-3"  method="POST" enctype="multipart/form-data" name="quotes2form" id="quotes2form" novalidate>
		<div class="container padding">
			<div class="center-block">
				<h2>Mieux vous connaître pour sélectionner l’expert adapté</h2>
			</div>

			<div class="formfocus">
				<fieldset class="dashit">
					<legend class="form-group">Votre société</legend>
					<div class="row">
						<div class="col-xs-12 col-md-8">
							<div class="form-group"> 
								<input id="company_name" name="company_name" placeholder="Nom de l'entreprise" class="form-control input-md" type="text" value="<?php echo $this->_tpl_vars['clientvals'][0]['company_name']; ?>
">
							</div>
							<div class="form-group" style="clear:both"> 
								<input id="company_url" name="company_url" placeholder="URL du site internet   (ex : www.monsite.com)" class="form-control input-md" type="text" value="<?php echo $this->_tpl_vars['clientvals'][0]['website']; ?>
">
							</div>
						</div>
						<div class="col-xs-12 col-md-4"></div>
					</div>
				</fieldset>

				<fieldset class="dashit">
					<legend class="form-group">Secteur d'activité</legend>
						<div class="row">
							<?php $_from = $this->_tpl_vars['category_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['catloop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['catloop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['cat_key'] => $this->_tpl_vars['cat']):
        $this->_foreach['catloop']['iteration']++;
?>
								<?php if (($this->_foreach['catloop']['iteration']-1) < 14): ?>
									<?php if (($this->_foreach['catloop']['iteration']-1)%5 == 0): ?>
										<div class="col-xs-12 col-md-4">
									<?php endif; ?>
											<div class="radio">
												<label for="<?php echo $this->_tpl_vars['cat_key']; ?>
"> 
													<input name="category" id="category" value="<?php echo $this->_tpl_vars['cat_key']; ?>
" type="radio" <?php if ($this->_tpl_vars['clientvals'][0]['category'] == $this->_tpl_vars['cat_key']): ?>checked<?php endif; ?>>
													<?php echo $this->_tpl_vars['cat']; ?>

												</label>
											</div>
									<?php if (( ($this->_foreach['catloop']['iteration']-1)+1 ) % 5 == 0): ?>
											</div>
									<?php endif; ?>
								<?php endif; ?>
							<?php endforeach; endif; unset($_from); ?>
						</div>
				</fieldset>
				<fieldset class="dashit">
					<legend class="form-group">Vos coordonnées</legend>
					<div class="row">
						<div class="col-xs-12 col-md-8">
							<div class="form-group"> 
								<div class="row">
									<div class="col-xs-12 col-md-6">
										<input id="last_name" name="last_name" placeholder="Votre nom" class="form-control" type="text" value="<?php echo $this->_tpl_vars['clientvals'][0]['last_name']; ?>
">
									</div>
									<div class="col-xs-12 col-md-6">
										<input id="first_name" name="first_name" placeholder="Votre prénom" class="form-control" type="text" value="<?php echo $this->_tpl_vars['clientvals'][0]['first_name']; ?>
">
									</div>
								</div>
							</div>
							<div id="ep_job" class="form-group">
								<select class="form-control" name="ep_job" id="ep_job">
									<option value="">Ma fonction dans l'entreprise</option>
									<option value="1" <?php if ($this->_tpl_vars['clientvals'][0]['job'] == 1): ?>selected<?php endif; ?>>PDG ou gérant</option>
									<option value="2" <?php if ($this->_tpl_vars['clientvals'][0]['job'] == 2): ?>selected<?php endif; ?>>Commercial</option>
									<option value="3" <?php if ($this->_tpl_vars['clientvals'][0]['job'] == 3): ?>selected<?php endif; ?>>Marketing</option>
									<option value="4" <?php if ($this->_tpl_vars['clientvals'][0]['job'] == 4): ?>selected<?php endif; ?>>Directeur technique</option>
									<option value="5" <?php if ($this->_tpl_vars['clientvals'][0]['job'] == 5): ?>selected<?php endif; ?>>Web designer</option>
									<option value="6" <?php if ($this->_tpl_vars['clientvals'][0]['job'] == 6): ?>selected<?php endif; ?>>Chef de projet</option>
									<option value="7" <?php if ($this->_tpl_vars['clientvals'][0]['job'] == 7): ?>selected<?php endif; ?>>SEO manager</option>
									<option value="8" <?php if ($this->_tpl_vars['clientvals'][0]['job'] == 8): ?>selected<?php endif; ?>>Autre</option>
								</select>					
							</div> 
							<div class="form-group"> 
								<input id="email" name="email" placeholder="Votre email" class="form-control" type="email" value="<?php echo $this->_tpl_vars['clientvals'][0]['email']; ?>
" <?php if ($this->_tpl_vars['clientidentifier'] != ""): ?>readonly<?php endif; ?>>
							</div>
							
							<?php if ($this->_tpl_vars['clientidentifier'] == ""): ?>
							<div class="form-group" style="clear:both"> 
								<div class="row">
									<div class="col-xs-12 col-md-6">
										<input id="quotes_password" name="quotes_password" placeholder="Créez un mot de passe" class="form-control" type="password">
									</div>
									<div class="col-xs-12 col-md-6">
										<input id="quotesconfirm_password" name="quotesconfirm_password" placeholder="Confirmez le mot de passe" class="form-control" type="password">
									</div>
								</div>
							</div>
							<?php endif; ?>
							
							<div class="form-group" style="clear:both">   
								<input id="telephone" name="telephone" placeholder="Téléphone" class="form-control" type="tel" value="<?php echo $this->_tpl_vars['clientvals'][0]['phone_number']; ?>
">
							</div>
							<div class="checkbox">
								<label for="ep-callmeBack">
									<input name="remindcheck" id="remindcheck" value="1" type="checkbox">
									Je souhaite être rappelé
								</label>
							</div>
							<div id="ep_callbackrequest_time" class="form-group collapse">
								<select class="form-control" name="remindtime" id="remindtime">
									<option value="">Plage horaire souhaitée</option>
									<option value="1">entre 8 h et 9 h</option>
									<option value="2">entre 9 h et 12 h</option>
									<option value="3">entre 12 h et 14 h</option>
									<option value="4">entre 14 h et 17 h</option>
									<option value="5">après 17 h</option>
								</select>					
							</div>   
						</div>
						<div class="col-xs-12 col-md-4"></div>
					</div>
				</fieldset>  
			</div>
			<hr>    
			<div class="center-block">
				<a href="/client/quotes-1" class="btn btn-default btn-lg">Précédent </a>
				<button id="submit1" name="submit1" class="btn btn-primary btn-lg">Valider</button>
				<input type="hidden" name="clientid" id="clientid" value="<?php echo $this->_tpl_vars['clientidentifier']; ?>
"/>	
				<input type="hidden" name="langu" id="langu" value="<?php echo $this->_tpl_vars['language']; ?>
"/>	
				<input type="hidden" name="numb" id="numb" value="<?php echo $this->_tpl_vars['numcount']; ?>
"/>	
			</div>
		</div>
	</form>    
</section>

<div id="confirm-premium" class="modal fade ep-quote-price" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content" id="confirmcontent">
		</div>
	</div>	
</div>
<div id="fadeblock"></div>