<?php /* Smarty version 2.6.19, created on 2015-08-24 10:26:37
         compiled from common/whitebook.phtml */ ?>
<?php echo '
<style>
label.error {
    color: #B94A48;
    display: inline;
    margin: 2px;
    padding-left: 10px;
}
</style>
<script type="text/javascript">		
 $(document).ready(function() {			 
		$("#whitebook").validate({
				rules:{
					firstname:"required",
					surname:"required",
					email:{required:true,email:true},
					captcha:"required"
				},
				onkeyup: function(){},
				messages:{
					firstname:"Nom obligatoire",
					surname:"Surname obligatoire",
					email:{	required:"Email obligatoire",
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
				submitHandler: function(form) {
				//alert(form.serialize());
					$.ajax({
						type: \'POST\',
						url: \'/index/submitwhitebook\',
						data:({firstname : $("#firstname").val(),surname:$("#surname").val(),email:$("#email").val(),captcha:$("#captcha").val(),contactbo:$(\'input:checkbox:checked\').val()}), 
						  
						success: function(result)
						{
							if($.trim(result)=="done")
							{
								$("#whitebookcontent").html(\'<h3>Merci !</h3><p>Nous vous avons envoy&eacute; le lien de t&eacute;l&eacute;chargement sur votre bo&icirc;te email.</p><p>A bient&ocirc;t sur <a href="http://www.edit-place.fr">Edit-place.com</a></p>\');
							}
							else if($.trim(result)=="notdone")
							{
								$("#captchaerror").show();
								$("#captcha").val("");
							}
						}
					});
				}					
				
			}); 
			
	});
</script>
'; ?>
	

<section class="gray">
	<div class="container padding pull-top">
		<div class="center-block">
			<h1>le nouveau visage du contenu web</h1>
		</div>
		<div class="page-inner">
			<div class="row" id="downloadform">
			<h3>T�l�chargez le livre blanc sur les 10 choses � changer pour booster son trafic en 2015</h3><br>
				<div class="col-lg-8 col-md-8 col-xs-12">
					<img width="800" height="534" src="/FO/images/livre-blanc-editplace.jpg" class="img-responsive"/>
					<br><p style="">Depuis 2 ans, le contenu web est soumis � une petite r�volution. Occupant d�sormais plus de 35% des budgets marketing, son r�le est de plus en plus vaste : on s�en sert � la fois pour informer, pour transformer, pour optimiser, pour distraire... <blockquote>Le contenu web occupe 35% des budgets marketing</blockquote> Ses formes aussi changent : les blogs d�entreprises mutent et deviennent magazine en ligne, les marques lancent leurs propres sites d�information, en concurrence directe avec les m�dias traditionnels.</p><p> Ce nouveau visage tend � rendre ringard le contenu standard vite �crit et avec lui les sites � l�ergonomie b�cl�e ; malheur � la communication � la papa.</p><p> Voici donc les 10 principales tendances � prendre en compte cette ann�e dans votre strat�gie de contenu. Parlons-en&nbsp;!</p>
				</div>
				<div class="col-lg-4 col-md-4 col-xs-12">
					<form style="padding: 30px 40px" role="form" class="form-horizontal ctype-block" id="whitebook" method="post" name="whitebook" novalidate="novalidate">
						<div id="whitebookcontent">	
							<legend class="form-group">Formulaire<small>Compl�ter pour t�l�charger le livre blanc</small></legend>
							<div class="form-group">
								<div>
									<input type="text" value="" placeholder="Nom" id="firstname" name="firstname" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<div>
									<input type="text" value="" placeholder="Pr�nom" id="surname" name="surname" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<div>
									<input type="text" value="" placeholder="Email" id="email" name="email" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<div>
									<img alt="captcha" src="/index/captcha" style="width: auto; height: 40px">
								</div>
							</div>
							<div class="form-group">						
								<div>
									<input type="text" class="form-control" name="captcha" id="captcha" placeholder="Ins�rer le code ci-dessus"> 
								</div>
								<label class="error inline" id="captchaerror" for="captcha" style="display:none">Captcha Invalide!!</label>
							</div>
							<div class="form-group">
								<div>
									<input type="checkbox" id="contactbo" name="contactbo" value="yes"> je souhaite recevoir les informations relatives &agrave; Edit-place
								</div>
							</div>
							<div class="form-group">
								<div>
									<button value="submit" class="btn btn-primary btn-block" name="whitebooksubmit" type="submit"><i></i>  T&eacute;l&eacute;charger</button>
								</div>
							</div>
						</div>	
					</form>
				</div>
			
			</div>
		</div>
	</div>     
</section>