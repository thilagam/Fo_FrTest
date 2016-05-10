<?php /* Smarty version 2.6.19, created on 2015-07-29 13:16:25
         compiled from Client/quotes2liberte.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_decode', 'Client/quotes2liberte.phtml', 500, false),array('modifier', 'filesizebrief', 'Client/quotes2liberte.phtml', 508, false),array('modifier', 'count', 'Client/quotes2liberte.phtml', 630, false),)), $this); ?>
<?php echo '

<link type="text/css" rel="stylesheet" href="/FO/css/client/fileupload/jquery.fileupload-ui.css"/>  



<script type="text/javascript" src="/FO/script/common/fileinput.jquery.js"></script>

<script type="text/javascript" src="/FO/script/common/ajaxupload.js"></script>

<script src="/FO/script/client/fileupload/vendor/jquery.ui.widget.js"></script>

<script src="/FO/script/client/fileupload/blueimp.tmpl.min.js"></script>

<script src="/FO/script/client/fileupload/jquery.iframe-transport.js"></script>

<script src="/FO/script/client/fileupload/jquery.fileupload.js"></script>

<script src="/FO/script/client/fileupload/jquery.fileupload-fp.js"></script>

<script src="/FO/script/client/fileupload/jquery.fileupload-ui.js"></script>

<script src="/FO/script/client/fileupload/main.js"></script> 



<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE8+ -->

<!--[if gte IE 8]><script src="http://ep-test.edit-place.com/FO/script/client/fileupload/cors/jquery.xdr-transport.js"></script><![endif]-->

<script language="javascript">

	

	(function($,W,D)

	{ 

		var JQUERY4U = {};



		JQUERY4U.UTIL =

		{

			setupFormValidation: function()

			{

				//form validation rules1

				$("#fileupload").validate({

					//onkeyup: true,
					//onblur: true, 
					//onfocusout: true,

					highlight: function(element) {

						$(element).closest(\'span\').addClass("f_error");

					},

					unhighlight: function(element) {

						$(element).closest(\'span\').removeClass("f_error");

					},

				

					rules: {

						title:  "required",

						deliverytime:{

							required: function(element){

									return $("input[name=\'ep-fixquotetime\']:checked").val()=="1";

								},

							min:1	

							},	

						company_name:"required",

						company_url: {

							remote: "/client/checkvalidurl",

						},

						last_name:"required",

						first_name:	"required",

						email:	{

							required: function(element){

									return $("input[name=\'clientid\']").val()=="";

								},

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

						category:"required",

						ep_job:"required",

						termscheck:{

							required: function(element){

									return $("input[name=\'clientid\']").val()=="";

								}

							},		

						\'contribselect[]\':{

							required: function(element){

									return ($("input[name=\'clientid\']").val()!="" && $("input[name=\'privatecontrib\']:checked").val()=="1");

								},

							},

							price_min_total:{

								required: function(element){

										return ($("input[name=\'clientid\']").val()!="" && $("input[name=\'pricecheck\']:checked").val()=="1");

									},

								//number:true,

								//min: 1						

							},

							price_max_total:{

								required: function(element){

										return ($("input[name=\'clientid\']").val()!="" && $("input[name=\'pricecheck\']:checked").val()=="1");

									},

								//number:true,
								
								//min: 1		

							}

					},

					messages: {

						title: "Merci d\'entrer le titre souhait&eacute; pour votre mission",

						deliverytime:{

							required:"Merci d\'indiqer le délai de livraison",

							min: "Merci d\'indiquer un chiffre supérieur à 0"

						},

						company_name:"Veuillez renseigner le nom de votre entreprise",

						company_url:{

							remote:"Merci d\'ins&eacute;rer une URL valide",

						},

						last_name: "Merci de renseigner votre nom",	

						first_name: "Merci de renseigner votre pr&eacute;nom",

						email: {

							required:"Merci de renseigner votre adresse email",

							email:"Merci d\'entrer une adresse email valide",

							remote:"Cet email correspond d&eacute;j&agrave; &agrave; un compte. Merci de vous logger pour continuer"

						},

						quotes_password: "Merci de renseigner un mot de passe",

						quotesconfirm_password:{

							required:"Merci de confirmer votre mot de passe",

							equalTo:"Merci d\'indiquer le même mot de passe"

						},

						category:"Merci de sélectionner une catégorie",



						ep_job:"Merci de sélectionner votre fonction",



						termscheck:"Il vous faut accepter les conditions générales d\'utilisation pour continuer",



						\'contribselect[]\':"Merci de sélectionner des rédacteurs",

						price_min_total:{

							required:"Merci d\'indiquer le montant",

							//digits: "Merci d\'ins&eacute;rer un chiffre",

							//min: "Merci d\'indiquer un chiffre supérieur à 0"

						},

						price_max_total:{

							required:"Merci d\'indiquer le montant",

							//digits: "Merci d\'ins&eacute;rer un chiffre",

							//min: "Merci d\'indiquer un chiffre supérieur à 0"

						}

					},

					groups: {

						pricename: "price_min_total price_max_total"

					  },

					debug:true,

					submitHandler: function(form) { 

						var fileinput=$("#filename").val();

						if(fileinput===undefined)

						{

							$("#choosefile").html("Merci d\'uploader un brief");

						}

						else

						{

							$("#choosefile").html("");

							form.submit();

						}

					}

				});

			} 

		}



		//when the dom has loaded setup form validation rules

		$(D).ready(function($) {

			JQUERY4U.UTIL.setupFormValidation(); 

		});



	})(jQuery, window, document);

	

	function addprice(type)
	{

		var ep_percent=$("#eppercent").val();

		if(type==\'min\')

		{

			var price=$("#price_min_total").val();
			
			price=price.replace(",",".");

			var totalprice=(price*(100-ep_percent))/100;

			$("#price_min").val(totalprice);

		}

		else if(type==\'max\')

		{

			var price=$("#price_max_total").val();
			
			price=price.replace(",",".");
			
			var totalprice=(price*(100-ep_percent))/100;

			$("#price_max").val(totalprice);

		}

	}

	

	function getfilename()

	{

		 $("#filelist").html("");

		 var files = $(\'#choosefile\')[0].files;

			for (var i = 0; i < files.length; i++) {  

				//$("#filelist").append("<div align=center>"+files[i].name+" <button class=\'btn btn-danger\' type=button onclick=\'deletefile("+i+")\'>Delete</a></div><br>");

				$("#filelist").append("<div align=center>"+files[i].name+" </div><br>");

			}

	}

	

	function loadcontribprofile(part)

	{    

		  $(\'#viewContribProfile\').html(\'<iframe src="/client/userprofileb3?partid=\'+part+\'" width=1170 height=1516></iframe>\');

			$("#viewContribProfile").removeClass("in");

			$("#viewContribProfile").addClass("in");

			$("#viewContribProfile").show();

			$("#fadeblock").addClass("modal-backdrop fade in");

			$("#fadeblock").show();

			$(\'body\').addClass("modal-open");			  	

	}

	

</script>

	<style>

		.error { color: red !important; font-size:16px !important;}

		.f_error {  border-color: rgb(185, 74, 72); color: rgb(185, 74, 72);}  

	</style>

'; ?>




	

<section class="quoteform" id="step2-liberte">

	<form action="/client/quotes3liberte"  method="POST" enctype="multipart/form-data" name="quotes2Libform" id="fileupload" novalidate>

		<div class="container padding">

			<div class="center-block">

				<h2>Envoyez-nous votre projet et recevez des devis !

				<small>Vous travaillerez en direct avec un rédacteur et bénéficierez de la garantie d'edit-place</small></h2>

			</div>

 

			<div class="formfocus">

				<fieldset class="dashit">

					<legend class="form-group">Mon projet</legend>

					<div class="form-group"> 

						<div class="row"> 

							<div class="col-xs-12 col-md-8">

								<span><input id="title" name="title" placeholder="Ex. Demande de tarif pour 10 articles voyage" class="form-control input-md" type="text" value="<?php echo $this->_tpl_vars['title']; ?>
"/></span> 

								

								<!--<div class="inputfile btn btn-block btn-default btn-lg" style="float:left;">

									<input type="file" name="files[]" multiple id="choosefile" onChange="getfilename();"> 

									<div class="addfile-label"><span class="glyphicon glyphicon-paperclip"></span> Ajouter un brief</div>

								</div>

								<label class="error" for="choosefile" generated="true"></label>

								<div id="filelist" style="font-weight:bold;clear:both"></div>-->

								<div class="row-fluid fileupload-buttonbar" style="clear:both;padding-top:20px">

									<div class="span12" style="border: dashed 2px #bbb; padding: 15px; margin-bottom: 10px; background-color: #fff;height:80px" align="center">

										<!-- The fileinput-button span is used to style the file input field as button -->

										<span class="btn btn-small btn-success fileinput-button btn-inline" style="float:none;">

											<i class="icon-plus icon-white"></i>

											<span>Ajouter un brief</span>

											<input type="file" name="files[]" multiple>

										</span>

										<div class="help-inline">Fichiers au format zip, xls, .doc, .pdf</div>

									</div>

								</div>  

								<div class="error" id="choosefile"></div>

								<table role="presentation" class="table table-striped">

									<tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery">

									<?php $_from = $this->_tpl_vars['brief_uploaded_files']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?> 

										<tr class="template-download fade in">   	

											<td class="preview"></td>

											<td class="name" style="max-width:150px;word-break: break-all;"> 

												<a download="Analytics.docx" rel="" title="Analytics.docx" href="/client/downloadtempspec?file=<?php echo ((is_array($_tmp=$this->_tpl_vars['v'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['v'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
</a>

											</td>

												<?php $this->assign('filepath', "/home/sites/site5/web/FO/client_spec/".($this->_tpl_vars['clientidentifier'])."/".($this->_tpl_vars['v'])); ?>

											

											<td class="size"><span><?php echo ((is_array($_tmp=$this->_tpl_vars['filepath'])) ? $this->_run_mod_handler('filesizebrief', true, $_tmp) : smarty_modifier_filesizebrief($_tmp)); ?>
</span></td>

											<td colspan="2"></td>

											<td class="delete">

												<button type="button" data-url="http://ep-test.edit-place.com/FO/script/client/fileupload/server/php/index.php?file=<?php echo $this->_tpl_vars['v']; ?>
" data-type="DELETE" class="btn btn-small btn-danger">

													<i class="icon-trash icon-white"></i>

													<span>Supprimer</span>

												</button>

												<!--<input type="checkbox" value="1" name="delete">-->

											</td>

										<input type="hidden" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['v'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
" id="filename" name="filename[]" />

										</tr>

									<?php endforeach; endif; unset($_from); ?>

									</tbody>

									</table>

								

								<div class="checkbox" style="clear:both">

									<label for="ep-fixquotetime">

									<input name="ep-fixquotetime" id="ep-fixquotetime" type="checkbox" value="1" <?php if ($this->_tpl_vars['deliverytime'] != ""): ?>checked<?php endif; ?>/>

									Je souhaite fixer un délai maximum de livraison pour mon projet 

									</label>

								</div>

								<div class="collapse <?php if ($this->_tpl_vars['deliverytime'] != ""): ?>in showcollapse<?php endif; ?>" id="ep-fixquotetimeText">

									<div class="row">

										<div class="col-xs-6 col-md-2">

											<input type="text" class="form-control" name="deliverytime" id="deliverytime" value="<?php echo $this->_tpl_vars['deliverytime']; ?>
">

										</div>

										<div class="col-xs-6 col-md-4">

											<select name="delivery_option" id="delivery_option" class="form-control">

												<option value="min" <?php if ($this->_tpl_vars['delivery_option'] == 'min'): ?>selected<?php endif; ?>>Min(s)</option>

												<option value="hour" <?php if ($this->_tpl_vars['delivery_option'] == 'hour' || $this->_tpl_vars['delivery_option'] == ""): ?>selected<?php endif; ?>>Heure(s)</option>

												<option value="day" <?php if ($this->_tpl_vars['delivery_option'] == 'day'): ?>selected<?php endif; ?>>Jour(s)</option>

											</select>

										</div>	

									</div>

									<p class="help-block">Une fois mon annonce diffusée sur le site.</p>

								</div>

								<label class="error" for="deliverytime" generated="true"></label>

							</div>

							<div class="col-xs-12  col-md-3 col-md-offset-1">

								<div id="brief-help">

									<h5 class="visible-xs">Pourquoi un brief ?</h5>

									<h5 class="brief-title hidden-xs">Télécharger des templates de briefs</h5>

									<p>Vous y définissez vos sujets de contenu, le ton, la structure de vos articles.<br>

									<h5>Exemples de brief</h5> 

									

									<ul>

										<li><a href="/client/briefsample?briefid=1">R&eacute;daction articles site high tech</a></li>

										<li><a href="/client/briefsample?briefid=0">R&eacute;daction articles boutique en ligne</a></li>

										<li><a href="/client/briefsample?briefid=2">R&eacute;&eacute;criture de titres sous excel</a></li> 

									</ul>

								</div>

							</div>

						</div>

					</div>	

				</fieldset>



				<!--<ul class="nav nav-tabs">

					<li class="active"><a href="#sign-up" data-toggle="tab">Nouveau client ?</a></li>

					<?php if ($this->_tpl_vars['clientidentifier'] != ""): ?><li><a href="#sign-in" data-toggle="tab">Déjà client ?</a></li><?php endif; ?>

				</ul>-->

				<?php if ($this->_tpl_vars['clientidentifier'] != ""): ?>

				<?php if (count($this->_tpl_vars['contriblist']) > 0): ?>

				<div class="checkbox">

					<label for="ep-tuned-contrib">

						<input name="privatecontrib" id="ep-tuned-contrib" type="checkbox" value="1" <?php echo $this->_tpl_vars['privatecontrib']; ?>
 <?php if ($this->_tpl_vars['clientobjective'] == 'liberteprivate'): ?>checked<?php endif; ?>>

						Limiter mon annonce uniquement aux rédacteurs de ma sélection

					</label>

					<span class="help-block">Décochez la case ci-dessus, si vous désirez proposer cette annonce aux 1655 rédacteurs présents sur Edit-place</span>

				</div>   



				<!-- list all known contrib --> 
<?php echo $this->_tpl_vars['objectives']; ?>

				<div id="ep-contrib-table" class="collapse table-responsive <?php if ($this->_tpl_vars['privatecontrib'] != '' || $this->_tpl_vars['clientobjective'] == 'liberteprivate'): ?>in showcollapse<?php endif; ?>">

					<label class="checkbox checkall"><input type="checkbox" name="checkall" id="checkall" value="checkall"> Tout sélectionner <span class="badge"><?php echo count($this->_tpl_vars['contriblist']); ?>
</span></label>

					<div class="overflow">

					  <div class="overflow" id="timeline" style="height:auto !important">

						<table class="table">

							<tbody>

							<?php $_from = $this->_tpl_vars['contriblist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contribloop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contribloop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['contrib']):
        $this->_foreach['contribloop']['iteration']++;
?>

								<?php if (( ($this->_foreach['contribloop']['iteration']-1) ) % 2 == 0): ?> 

									<tr>

								<?php endif; ?>

								<td class="col-md-4 tocheck">

									<input type="checkbox" name="contribselect[]" id="contribselect" value="<?php echo $this->_tpl_vars['contrib']['identifier']; ?>
"  <?php if (in_array ( $this->_tpl_vars['contrib']['identifier'] , $this->_tpl_vars['contribselected'] )): ?>checked<?php endif; ?>/>

									<a onclick="loadcontribprofile('<?php echo $this->_tpl_vars['contrib']['identifier']; ?>
');" role="button" style="cursor:pointer;"><img class="img-responsive" src="<?php echo $this->_tpl_vars['contrib']['profilepic']; ?>
"></a>

									<div class="name"><a onclick="loadcontribprofile('<?php echo $this->_tpl_vars['contrib']['identifier']; ?>
');" role="button" style="cursor:pointer;"><?php echo $this->_tpl_vars['contrib']['name']; ?>
.</a></div><div class="experience"><?php echo $this->_tpl_vars['contrib']['totalparticipation']; ?>
 participations<br>Sélectionné : <?php echo $this->_tpl_vars['contrib']['selectedparticipation']; ?>
 fois</span></div>

								</td>

								<?php if (( ($this->_foreach['contribloop']['iteration']-1) ) % 2 != 0): ?>

									</tr>

								<?php endif; ?>

							 

							<?php endforeach; endif; unset($_from); ?>

							</tbody>

						</table>

						</div>

					</div>

				</div>

				<label class="error" for="contribselect[]" generated="true"></label>

				

				

				<div class="checkbox" style="clear:both">

					<label for="ep-tuned-price">

						<input name="pricecheck" id="ep-tuned-price" type="checkbox" value="1" <?php if ($this->_tpl_vars['price_min_total'] != ""): ?>checked<?php endif; ?>>

						Je souhaite fixer un prix pour la rémunération du rédacteur

					</label>

				</div>   



				<!-- pricing calculation -->

				<div id="ep-tuned-price-check" class="collapse <?php if ($this->_tpl_vars['price_min_total'] != ""): ?>in showcollapse<?php endif; ?>">

					<div class="row">

						<div class="col-xs-12 col-md-3">

							<div class="alert alert-warning">*Le prix total inclut une commission Edit-place de <?php echo $this->_tpl_vars['eppercent']; ?>
%</div>

						</div>

						<div class="col-xs-6 col-md-3 col-md-offset-1">

							<div class="form-group">

								<label for="contrib-price" class="control-label"> <strong>Prix min total*</strong></label>

								<div class="input-group">

									<input type="text" class="form-control" name="price_min_total" id="price_min_total" onKeyup="addprice('min');" value="<?php echo $this->_tpl_vars['price_min_total']; ?>
"/>

									<span class="input-group-addon">€</span>

								</div>

							</div>

							<div class="form-group">

								<label class="control-label">  Prix contributeur</label>

								<div class="input-group">

									<input type="text" value="<?php echo $this->_tpl_vars['price_min']; ?>
" readonly class="form-control" name="price_min" id="price_min" value="<?php echo $this->_tpl_vars['price_min']; ?>
">

									<span class="input-group-addon">€</span>

								</div>

							</div>

						</div>

						<div class="col-xs-6 col-md-3">  

							<div class="form-group">

								<label for="contrib-price" class="control-label"> <strong>Prix max total*</strong> </label>

								<div class="input-group">

									<input type="text" class="form-control" name="price_max_total" id="price_max_total" onKeyup="addprice('max');" value="<?php echo $this->_tpl_vars['price_max_total']; ?>
">

									<span class="input-group-addon">€</span>

								</div>

							</div>

							<div class="form-group">

								<label class="control-label"> Prix contributeur </label>

								<div class="input-group">

									<input type="text" value="<?php echo $this->_tpl_vars['price_max']; ?>
" readonly class="form-control" name="price_max" id="price_max" value="<?php echo $this->_tpl_vars['price_max']; ?>
">

									<span class="input-group-addon">€</span>

								</div>

							</div>

						</div> 

						<input type="hidden" name="eppercent" id="eppercent" value="<?php echo $this->_tpl_vars['eppercent']; ?>
"/>								

					</div>

				</div>

				<label class="error" for="pricename" generated="true"></label>

				<?php endif; ?>

				<?php endif; ?>
						
				<?php if ($this->_tpl_vars['user_details'][0]['job'] == "" && $this->_tpl_vars['user_details'][0]['category'] == ""): ?>

				<div class="tab-content">

					<div class="tab-pane fade in active" >

						<fieldset class="dashit">

							<legend class="form-group">Votre société</legend>

							<div class="row">

								<div class="col-xs-12 col-md-8">

									<div class="form-group"> 

										<input id="company_name" name="company_name" placeholder="Nom de l'entreprise" class="form-control input-md" type="text" value="<?php echo $this->_tpl_vars['user_details'][0]['company_name']; ?>
"/>

									</div>

									<div class="form-group" style="clear:both"> 

										<input id="company_url" name="company_url" placeholder="URL du site internet   (ex : www.monsite.com)" class="form-control input-md" type="text" value="<?php echo $this->_tpl_vars['user_details'][0]['website']; ?>
"/>

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
" type="radio" <?php if ($this->_tpl_vars['user_details'][0]['category'] == $this->_tpl_vars['cat_key']): ?>checked<?php endif; ?>>

														<?php echo $this->_tpl_vars['cat']; ?>


													</label>

												</div>

										<?php if (( ($this->_foreach['catloop']['iteration']-1)+1 ) % 5 == 0): ?>

												</div>

										<?php endif; ?>

									<?php endif; ?>

								<?php endforeach; endif; unset($_from); ?>

							</div>

							<label class="error" for="category" generated="true" style="float:left;clear:both"></label>

						</fieldset>

						

					

						<fieldset class="dashit">

							<legend class="form-group">Informations pour votre compte client</legend>

							<div class="row">

								<div class="col-xs-12 col-md-8">

									<div class="form-group"> 

										<div class="row">

											<div class="col-xs-12 col-md-6">

												<input id="last_name" name="last_name" placeholder="Votre nom" class="form-control" type="text" value="<?php echo $this->_tpl_vars['user_details'][0]['last_name']; ?>
">

											</div>

											<div class="col-xs-12 col-md-6">

												<input id="first_name" name="first_name" placeholder="Votre prénom" class="form-control" type="text" value="<?php echo $this->_tpl_vars['user_details'][0]['first_name']; ?>
">

											</div>

										</div>

									</div>



									<div class="form-group"> 

										<input id="email" name="email" placeholder="Votre email" class="form-control" type="email" value="<?php echo $this->_tpl_vars['user_details'][0]['email']; ?>
" <?php if ($this->_tpl_vars['clientidentifier'] != ""): ?>readonly<?php endif; ?>/>

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

									

									<div id="ep_jobblock" class="form-group">

										<select class="form-control" name="ep_job" id="ep_job">

											<option value="">Ma fonction dans l'entreprise</option>

											<option value="1" <?php if ($this->_tpl_vars['user_details'][0]['job'] == 1): ?>selected<?php endif; ?>>PDG ou gérant</option>

											<option value="2" <?php if ($this->_tpl_vars['user_details'][0]['job'] == 2): ?>selected<?php endif; ?>>Commercial</option>

											<option value="3" <?php if ($this->_tpl_vars['user_details'][0]['job'] == 3): ?>selected<?php endif; ?>>Marketing</option>

											<option value="4" <?php if ($this->_tpl_vars['user_details'][0]['job'] == 4): ?>selected<?php endif; ?>>Directeur technique</option>

											<option value="5" <?php if ($this->_tpl_vars['user_details'][0]['job'] == 5): ?>selected<?php endif; ?>>Web designer</option>

											<option value="6" <?php if ($this->_tpl_vars['user_details'][0]['job'] == 6): ?>selected<?php endif; ?>>Chef de projet</option>

											<option value="7" <?php if ($this->_tpl_vars['user_details'][0]['job'] == 7): ?>selected<?php endif; ?>>SEO manager</option>

											<option value="8" <?php if ($this->_tpl_vars['user_details'][0]['job'] == 8): ?>selected<?php endif; ?>>Autre</option>

										</select>	

										<label class="error" for="ep_job" generated="true"></label>	

									</div> 

									

									<div class="form-group" style="clear:both"> 

										<input id="telephone" name="telephone" placeholder="Téléphone" class="form-control" type="tel" value="<?php echo $this->_tpl_vars['user_details'][0]['phone_number']; ?>
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

									<?php if ($this->_tpl_vars['clientidentifier'] == ""): ?>

									<div class="checkbox">

										<label for="ep-tc">

											<input name="termscheck" id="termscheck" value="1" type="checkbox">

											J'ai lu et j'accepte <a href="/cgu" target="_blank">les conditions générales d'utilisation</a> 

										</label>

									</div>  

									<label class="error" for="termscheck" generated="true"></label>

									<?php endif; ?>

								</div>

								<div class="col-xs-12 col-md-4"></div>

							</div>

						</fieldset> 

						<?php endif; ?>


					</div>  

				</div>

			</div>

			<hr>    

			<div class="center-block">

				<a href="/client/quotes-1" class="btn btn-default btn-lg">Précédent </a>  

				<button name="submit1"  class="btn btn-primary btn-lg" >Valider</button> 

				<input type="hidden" name="clientid" id="clientid" value="<?php echo $this->_tpl_vars['clientidentifier']; ?>
"/>							

			</div>

		</div>

	</form>    

</section>

    

<section class="dashit"  id="garantee">

	<div class="container padding">

		<div class="center-block">

			<h2>La garantie Edit-place</h2>

		</div>

		<div class="row">

			<div class="col-xs-12 col-md-4 col-md-offset-1 wow fadeInLeft">

				<div class="center-block"><img src="/FO/images/imageB3/mediateur.png" width="67" height="75" alt="Moderateur">

					<h4>Edit-place est votre médiateur</h4>

					<p>En cas de contestation (délai de livraison, reprise d'articles, remboursement...)</p>

				</div>

			</div> 

			<div class="col-xs-12 col-md-4 col-md-offset-2 wow fadeInRight">

				<div class="center-block">

					<img src="/FO/images/imageB3/secured.png" width="75" height="75" alt="Paiement sécurisé">

					<h4>Paiement sécurisé</h4>

					<p>Notre solution de paiement en ligne vous garantit une transaction en toute tranquillité</p>

				</div> 

			</div>

		</div>   

	</div>

</section>



<!-- contrib profile -->

<div id="viewContribProfile" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="left:100px">

	

</div>



<div id="fadeblock"></div>



<?php echo '

<!-- The template to display files available for upload -->

<script id="template-upload" type="text/x-tmpl">

{% for (var i=0, file; file=o.files[i]; i++) { %}

    <tr class="template-upload fade">

        <td class="preview"><span class="fade"></span></td>

        <td class="name" style="max-width:150px;word-break: break-all;"><span>{%=file.name%}</span></td>

        <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>

        {% if (file.error) { %}

            <td class="error" colspan="2"><span class="label label-important">Error</span> {%=file.error%}</td>

        {% } else if (o.files.valid && !i) { %}

            <td>

                <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="bar" style="width:0%;"></div></div>

            </td>

            <td class="start">{% if (!o.options.autoUpload) { %}

                <button type="button" class="btn btn-small btn-primary">

                    <i class="icon-upload icon-white"></i>

                    <span>D&eacute;marrer</span>

                </button>

            {% } %}</td>

        {% } else { %}

            <td colspan="2"></td>

        {% } %}

        <td class="cancel">{% if (!i) { %}

            <button type="button" class="btn btn-small btn-warning">

                <i class="icon-ban-circle icon-white"></i>

                <span>Annuler</span>

            </button>

        {% } %}</td>

    </tr>

{% } %}

</script>



<!-- The template to display files available for download -->

<script id="template-download" type="text/x-tmpl">

{% for (var i=0, file; file=o.files[i]; i++) { %}

    <tr class="template-download fade">

   	{% if (file.error) { %}

            <td></td>

            <td class="name" style="max-width:150px;word-break: break-all;"><span>{%=file.name%}</span></td>

            <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>

            <td class="error" colspan="2">

				<!--[if IE]><div style="display:none;"><![endif]-->

				<span class="label label-important">Error</span> {%=file.error%}

				<!--[if IE]></div><![endif]-->

			</td>

        {% } else { %}

            <td class="preview">{% if (file.thumbnail_url) { %}

                <a href="{%=file.url%}" title="{%=file.name%}" rel="gallery" download="{%=file.name%}"><img src="{%=file.thumbnail_url%}"></a>

            {% } %}</td>

            <td class="name" style="max-width:150px;word-break: break-all;">

                <a href="/client/downloadtempspec?file={%=file.name%}" title="{%=file.name%}" rel="{%=file.thumbnail_url&&\'gallery\'%}" download="{%=file.name%}">{%=file.name%}</a>

            </td>

            <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>

            <td colspan="2"></td> 

        {% } %}

        <td class="delete">

            <button type="button" class="btn btn-small btn-danger" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}"{% if (file.delete_with_credentials) { %} data-xhr-fields=\'{"withCredentials":true}\'{% } %}>

                <i class="icon-trash icon-white"></i>

                <span>Supprimer</span>

            </button>

           <!-- <input type="checkbox" name="delete" value="1">-->

        </td>

		<input type="hidden" name="filename[]" id="filename" value="{%=file.name%}" />

	

    </tr>

{% } %}

</script>

'; ?>