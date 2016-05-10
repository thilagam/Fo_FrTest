<?php /* Smarty version 2.6.19, created on 2014-03-11 06:15:28
         compiled from Client/liberte1.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_decode', 'Client/liberte1.phtml', 299, false),array('modifier', 'filesizebrief', 'Client/liberte1.phtml', 306, false),array('modifier', 'count', 'Client/liberte1.phtml', 392, false),array('modifier', 'utf8_encode', 'Client/liberte1.phtml', 502, false),)), $this); ?>
<?php echo '
<link rel="stylesheet" href="/FO/css/client/fileupload/jquery.fileupload-ui.css">
<noscript><link rel="stylesheet" href="/FO/css/client/fileupload/jquery.fileupload-ui-noscript.css"></noscript>


<script src="/FO/script/client/fileupload/vendor/jquery.ui.widget.js"></script>
<script src="/FO/script/client/fileupload/blueimp.tmpl.min.js"></script>
<script src="/FO/script/client/fileupload/jquery.iframe-transport.js"></script>
<script src="/FO/script/client/fileupload/jquery.fileupload.js"></script>
<script src="/FO/script/client/fileupload/jquery.fileupload-fp.js"></script>
<script src="/FO/script/client/fileupload/jquery.fileupload-ui.js"></script>
<script src="/FO/script/client/fileupload/main.js"></script> 
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE8+ -->
<!--[if gte IE 8]><script src="http://mmm-new.edit-place.com/FO/script/client/fileupload/cors/jquery.xdr-transport.js"></script><![endif]-->

<script>


	function togglebusiness(vall)
	{
		if(vall==\'business\')
			$(\'#business-info\').show();
		else if(vall==\'customer\')	
			$(\'#business-info\').hide();
	}

	//upload twitter
	/*function uploadtwitterlogo()
	{
		var twt=$("#twitterid").val(); 
		var date=$("#curdate").val();
		
		if(twt!="")
		{
			$("#fileloading").html(\'<img src="/FO/images/loading-b.gif" />\');
		$.ajax({
				url: "/client/twitterlogo",
				global: false,
				type: "POST",
				data: ({twitter : twt}),
				dataType: "html",
				async:false,
				success: function(msg){ //alert(msg);
					if(msg=="nofile")
					{
						$("#fileloading").html("Compte Twitter inexistant");
					}
					else
					{
						msg1=msg.split("#");
						if(msg1[1]=="temp")
							var profilepic="/FO/clientprofile_temp/"+date+"/"+twt+"_global.jpg"+\'?\'+ (new Date()).getTime();
						else
							var profilepic="/FO/profiles/clients/logos/"+msg1[0]+"/"+msg1[0]+"_global.jpg"+\'?\'+ (new Date()).getTime();
						
						$("#clientlogo").attr("src",profilepic);
						$("#fileloading").html(\'\');
					}
					return false;
				}
			});
		}
		else
		{
			$("#fileloading").html("Merci d\'ins&eacute;rer un compte twitter valide");
			return false;
		}	
		
	}*/
	
	//Profile
	/*function switchbrowseliberte(vall)
	{
		if(vall==\'file\')
		{
			$("#logoupload").show();
			$("#twitterupload").hide();
		}
		else
		{
			$("#logoupload").hide();
			$("#twitterupload").show();
		}		
	}*/
	
	function validatefileuploadform()
	{
		$("#fileupload").validate({
				onkeyup: false,
				rules: {
					title:  {
						required: true,
						minlength: 6
					},
					participationtime: {
							required: true,
							number: true
						},
					deliverytime: {
						required: true,
						number: true
					},
					whoIs:"required",
					companyname: {
						required: function(element){
								return $("input[name=\'whoIs\']:checked").val()=="professional";
							}
					},
					twitterid:{
							required: function(element){
								return $("input[name=\'twitterlogo\']:checked").val()=="on";
							}							
					},
					\'contribselect[]\':{
						required: function(element){
								return $("input[name=\'privatecontrib\']:checked").val()=="on";
							}							
					},
					price_min_total:{
						required: function(element){
								return $("input[name=\'pricecheck\']:checked").val()=="on";
							},
						digits:true,
						min: 1						
					},
					price_max_total:{
						required: function(element){
								return $("input[name=\'pricecheck\']:checked").val()=="on";
							},
						digits:true,
						min: 1		
					}
				},
				messages: {
					title: {
						required:"Merci d\'ins&eacute;rer un titre de projet",
						minlength:"Le titre doit comporter plus de 6 caract&egrave;res"
					},
					participationtime: {
						required:"Merci d\'indiquer le d&eacute;lai de r&eacute;ception des devis",
						number: "Merci d\'ins&eacute;rer un chiffre"
					},
					deliverytime: {
						required:"Merci d\'indiquer le d&eacute;lai de livraison du projet",
						number: "Merci d\'ins&eacute;rer un chiffre"
					},
					whoIs:"Select Qui suis-je",
					companyname:{
						required:"Merci d\'indiquer le nom de votre entreprise"
					},
					twitterid:{
						required:"Merci d\'ins&eacute;rer un compte twitter valide" 
					},
					\'contribselect[]\':{
						required:"Please select contributors"
					},
					price_min_total:{
						required:"Please enter Prix",
						digits: "Merci d\'ins&eacute;rer un chiffre",
						min: "Please enter integer more than 0"
					},
					price_max_total:{
						required:"Please enter Prix",
						digits: "Merci d\'ins&eacute;rer un chiffre",
						min: "Please enter integer more than 0"
					}
				},
				groups: {
					pricename: "price_min_total price_max_total"
				  },
				  errorPlacement: function(error, element) {
					 if (element.attr("name") == "price_min_total" 
								 || element.attr("name") == "price_max_total" )
					   error.insertAfter("#price_max_total");
					 else
					   error.insertAfter(element);
				   },
				   debug:true,
				   
				submitHandler: function(form) { 
					var fileinput=$("#filename").val();
					if(fileinput===undefined)
					{
						$("#brieferr").html("Merci d\'uploader un brief");
						var bheight = $(window).height();
						var percent = 0.4;
						var hpercent = bheight * percent;
						$(\'html,body\').animate({scrollTop: hpercent}, 1000);
					}
					else
					{
						$("#brieferr").html("");
						form.submit();
					}
				}

			});
	}
	function checkbrief()
	{
		var fileinput=$("#filename").val();
		if(fileinput===undefined)
		{
			$("#brieferr").html("Merci d\'uploader un brief");
			validatefileuploadform();	
		}
		else
		{
			$("#brieferr").html("");
			validatefileuploadform();
		}
	}
	
	function checkallcontribs()
	{
	   if($("#checkall").attr(\'checked\'))
	   {
		  var $b = $(\'.overflow input[type=checkbox]\');
		  $b.attr(\'checked\', true);
	   }
	   else
	   {
		   var $b = $(\'.overflow input[type=checkbox]\');
		   $b.attr(\'checked\', false);
	   }
	}
	
	$(window).load(function(){		
		var articleid=$("#article").val();
		
		if(articleid!="")
		{
			$(\'#duplicatemission\').modal({
				show: true
			});
		}
    });	
	
</script>

<style>
	.customfile { width: 320px;}
</style>
'; ?>


<section id="free_form">
	<div class="container">
		<div class="row-fluid">
			<div class="span12" style="position: relative">
				<h1>edit-place <span>Libert&eacute;</span></h1>
				<small>Vous recherchez un r&eacute;dacteur pour travailler sur votre projet de contenu ? <br>D&eacute;posez votre annonce <strong>gratuitement</strong> et recevez des devis imm&eacute;diatement !</small>
				<!--<div class="freequote">blabla</div>--> 
				<div id="state">
					<ul class="unstyled">
						<li class="hightlight" rel="tooltip" title="D&eacute;p�t de votre projet"><span>Cr&eacute;ation de l'annonce</span></li>
						<li rel="tooltip" title="Nos r&eacute;dacteurs visualisent votre annonce et vous recevez des devis"><span class="online">Diffusion de l'annonce sur edit-place</span></li> 
						<li rel="tooltip" title="S&eacute;lectionnez celui qui travaillera sur votre projet"><span class="writer_select">Choix du r&eacute;dacteur</span></li> 
					</ul>
				</div>
				<div class="row-fluid">   
					<div class="span8">
						<div class="border">
						<!-- form, start --> 
							<form id="fileupload" name="fileform" method="POST" enctype="multipart/form-data" action="/client/liberte2">
							<input type="hidden" name="curdate" id="curdate" value="<?php echo $this->_tpl_vars['currdate']; ?>
" />
							<input type="hidden" name="client" id="client" value="<?php echo $this->_tpl_vars['clientidentifier']; ?>
" />
							<input type="hidden" name="article" id="article" value="<?php echo $_GET['article']; ?>
" />
							<noscript><input type="hidden" name="redirect" value="http://blueimp.github.com/jQuery-File-Upload/"></noscript>
								<fieldset>
									<legend>1. Mon projet</legend>
									<label><strong>Titre du projet</strong></label>
									<input type="text" placeholder="Ex : Demande de tarif pour 10 articles sur l'assurance vie" class="span12" name="title" id="title" value="<?php echo $this->_tpl_vars['title']; ?>
">
									<label><strong>Ajouter le brief</strong></label>
									<span class="help-block">Merci d'indiquer les sujets propos�s, le ton demand�, la structure des articles (nombre de parties, sous parties), etc...</span>
									   <!-- file upload plugin by blueimp : check out the doc here : 
									   https://github.com/blueimp/jQuery-File-Upload 
									   -->
<!------------------------------------------------jQuery File upload----------------------------------------------------------------------->

									<div class="row-fluid fileupload-buttonbar">
										<div class="span12" style="border: dashed 2px #bbb; padding: 15px; margin-bottom: 10px; background-color: #fff">
											<!-- The fileinput-button span is used to style the file input field as button -->
											<span class="btn btn-small btn-success fileinput-button btn-inline">
												<i class="icon-plus icon-white"></i>
												<span>Ajouter un brief</span>
												<input type="file" name="files[]" multiple>
											</span>
											<div class="help-inline">Fichiers au format zip, xls, .doc, .pdf</div>
										</div>
									</div>        
									<div class="error" id="brieferr"></div>
									<!-- The table listing the files available for upload/download -->
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
											<?php if ($this->_tpl_vars['editliberte'] != ""): ?>
												<?php $this->assign('filepath', "/home/sites/site9/web/FO/client_spec/".($this->_tpl_vars['clientidentifier'])."/".($this->_tpl_vars['v'])); ?>
											<?php else: ?>
												<?php $this->assign('filepath', "/home/sites/site9/web/FO/spec_temp/".($this->_tpl_vars['today'])."/".($this->_tpl_vars['v'])); ?> 
											<?php endif; ?>
											<td class="size"><span><?php echo ((is_array($_tmp=$this->_tpl_vars['filepath'])) ? $this->_run_mod_handler('filesizebrief', true, $_tmp) : smarty_modifier_filesizebrief($_tmp)); ?>
</span></td>
											<td colspan="2"></td>
											<td class="delete">
												<button type="button" data-url="http://mmm-new.edit-place.com/FO/script/client/fileupload/server/php/index.php?file=<?php echo $this->_tpl_vars['v']; ?>
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
									<input type="hidden" value="<?php echo $this->_tpl_vars['editliberte']; ?>
" id="editliberte" name="editliberte" />
<!------------------------------------------------jQuery File upload----------------------------------------------------------------------->

									<label>
										Je souhaite fixer un d&eacute;lai maximum pour la r&eacute;ception des devis
									</label>
									<!-- show/hide feature : fix quote time -->
									<div id="fixquotetime" class="collapse in out" >
										<div class="controls controls-row container-field">
											<input class="span1" type="text" name="participationtime" id="participationtime" value="<?php echo $this->_tpl_vars['participation']; ?>
" onKeyup="showparticipationtime();">
											<select class="span3" name="participationtime_option" id="participationtime_option"  onchange="showparticipationtime();">
												<?php if ($this->_tpl_vars['participation_option'] == 'min'): ?>
													<option value="min" selected>Min(s)</option>
												<?php else: ?>
													<option value="min">Min(s)</option>												
												<?php endif; ?>
												
												<?php if ($this->_tpl_vars['participation_option'] == 'hour' || $this->_tpl_vars['participation_option'] == ""): ?>
													<option value="hour" selected>Heure(s)</option>
												<?php else: ?>
													<option value="hour">Heure(s)</option>												
												<?php endif; ?>
												
												<?php if ($this->_tpl_vars['participation_option'] == 'day'): ?>
													<option value="day" selected>Jour(s)</option>
												<?php else: ?>
													<option value="day">Jour(s)</option>
												<?php endif; ?>
											</select>
											<span class="span8">une fois mon annonce diffus&eacute;e sur le site</span>
										</div>
									</div>
									<label class="error" for="participationtime" generated="true"></label>
									
									<label>
										Je souhaite fixer un d&eacute;lai maximum de livraison pour mon projet
									</label>
									<!-- show/hide feature : fix delivery timing -->
									<div id="fixdelivery" class="collapse in out">
										<div class="controls controls-row container-field">
											<input class="span1" type="text" name="deliverytime" id="deliverytime" value="<?php echo $this->_tpl_vars['delivery']; ?>
" >
											<select class="span3" name="deliverytime_option" id="deliverytime_option">
												<?php if ($this->_tpl_vars['delivery_option'] == 'min'): ?>
													<option value="min" selected>Min(s)</option>
												<?php else: ?>
													<option value="min">Min(s)</option>												
												<?php endif; ?>
												
												<?php if ($this->_tpl_vars['delivery_option'] == 'hour' || $this->_tpl_vars['delivery_option'] == ""): ?>
													<option value="hour" selected>Heure(s)</option>
												<?php else: ?>
													<option value="hour">Heure(s)</option>
												<?php endif; ?>	
												
												<?php if ($this->_tpl_vars['delivery_option'] == 'day'): ?>
													<option value="day" selected>Jour(s)</option>
												<?php else: ?>
													<option value="day" >Jour(s)</option>
												<?php endif; ?>		
											</select>
											<span class="span8">apr�s avoir s&eacute;lectionn&eacute; un journaliste</span>
										</div>
									</div>
									<label class="error" for="deliverytime" generated="true"></label>
									
									
									<!-- start, contrib selection -->
									<?php if ($this->_tpl_vars['clientidentifier'] == ""): ?>
										<div class="alert alert-info"><h4><i class="icon-info-sign"></i> D�j� client Edit-Place ?</h4> Vous pouvez envoyer votre annonce <u>uniquement</u> aux r�dacteurs avec qui vous avez d�j� travaill�.<br>
											<a data-target="#libertelogin" data-toggle="modal" style="cursor:pointer;">Identifiez-vous</a>, sinon passez directement � l'�tape 2 ci-dessous.
										</div>   
									<?php else: ?>  
									<?php if (count($this->_tpl_vars['contriblist']) > 0): ?> 
									<label class="checkbox">
										<input type="checkbox" name="privatecontrib" id="privatecontrib"  data-toggle="collapse" data-target="#contrib-table" <?php if ($this->_tpl_vars['privatecontrib'] == 'on'): ?>checked<?php endif; ?> onclick="togglepriceinfo();"/>
										Limiter mon annonce <u>uniquement</u> aux r�dacteurs de ma s�lection
										<span class="help-block">D�cochez la case ci-dessus, si vous d�sirez proposer cette annonce aux 1655 r�dacteurs pr�sents sur Edit-place</span> 
									</label>
									<div class="collapse <?php if ($this->_tpl_vars['privatecontrib'] == 'on'): ?>in<?php endif; ?>" id="contrib-table">
										<div class="mod">
											<label class="error" for="contribselect[]" generated="true"></label>
											<label class="checkbox checkall"><input type="checkbox" name="checkall" id="checkall" value="checkall" onclick="checkallcontribs();" <?php if ($this->_tpl_vars['checkedall'] == 'yes'): ?>checked<?php endif; ?> /> Tout s�lectionner <span class="badge"><?php echo count($this->_tpl_vars['contriblist']); ?>
</span></label>
											<div class="overflow" id="timeline" style="height:auto !important">
												<table class="table table-striped">
													<?php $_from = $this->_tpl_vars['contriblist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['contribloop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['contribloop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['contrib']):
        $this->_foreach['contribloop']['iteration']++;
?>
														<?php if (( ($this->_foreach['contribloop']['iteration']-1) ) % 2 == 0): ?> 
															<tr>
														<?php endif; ?>
														<td><input type="checkbox" name="contribselect[]" id="contribselect" value="<?php echo $this->_tpl_vars['contrib']['identifier']; ?>
" <?php if (in_array ( $this->_tpl_vars['contrib']['identifier'] , $this->_tpl_vars['selectedcontribs'] ) || $this->_tpl_vars['checkedall'] == 'yes'): ?>checked<?php endif; ?> /></td>
														<td class="media">
															<a class="pull-left imgframe" onclick="loadcontribprofile('<?php echo $this->_tpl_vars['contrib']['identifier']; ?>
');" role="button" data-toggle="modal" data-target="#viewContribProfile" style="cursor:pointer;">
																<img class="media-object" src="<?php echo $this->_tpl_vars['contrib']['profilepic']; ?>
">
															</a>
														</td>
														<td class="title">
															<a  onclick="loadcontribprofile('<?php echo $this->_tpl_vars['contrib']['identifier']; ?>
');" role="button" data-toggle="modal" data-target="#viewContribProfile" style="cursor:pointer;"><?php echo $this->_tpl_vars['contrib']['name']; ?>
.</a>
															<div class="muted"><?php echo $this->_tpl_vars['contrib']['totalparticipation']; ?>
 participations<br><?php echo $this->_tpl_vars['contrib']['selectedparticipation']; ?>
 fois s�lectionn�</div>
														</td>
														<?php if (( ($this->_foreach['contribloop']['iteration']-1) ) % 2 != 0): ?>
															</tr>
														<?php endif; ?>
													
													<?php endforeach; endif; unset($_from); ?>
												</table>
											</div>
											<br>
											<!-- Price -->
											<label class="checkbox">
												<input type="checkbox" data-toggle="collapse" data-target="#tuned-price-check" name="pricecheck" id="pricecheck" <?php if ($this->_tpl_vars['pricecheck'] == 'on'): ?>checked<?php endif; ?>>Je souhaite fixer un prix pour la r�mun�ration du r�dacteur 
											</label>
											<div class="collapse <?php if ($this->_tpl_vars['pricecheck'] == 'on'): ?>in<?php else: ?>out<?php endif; ?>" id="tuned-price-check">
												<div class="mod form-horizontal">
													<div class="row-fluid">
														<div class="span5 offset1">
															<div class="control-group">
																<label class="control-label" for="contrib-price" style="margin:0px"> <strong>Prix min total*</strong></label>
																<div class="controls">
																	<div class="input-append">
																		<input type="text" id="price_min_total" name="price_min_total" class="span6" onKeyup="addprice('min');" value="<?php echo $this->_tpl_vars['price_min_total']; ?>
">
																		<span class="add-on">&euro;</span>
																	</div>
																</div>
															</div>
															<div class="control-group">
																<label class="control-label">  Prix min contributeur</label>
																<div class="controls">
																	<div class="input-append">
																		<input type="text" id="price_min" name="price_min" class="span6" readonly value="<?php echo $this->_tpl_vars['price_min']; ?>
">
																		<span class="add-on">&euro;</span>
																	</div>
																</div>
															</div>
														</div>
														<div class="span5">
															<div class="control-group">
																<label class="control-label" for="contrib-price" style="margin:0px"> <strong>Prix max total*</strong></label>
																<div class="controls">
																	<div class="input-append">
																		<input type="text" id="price_max_total" name="price_max_total" class="span6" onKeyup="addprice('max');" value="<?php echo $this->_tpl_vars['price_max_total']; ?>
">
																		<span class="add-on">&euro;</span> 
																	</div>
																</div>
															</div>
															<div class="control-group">
																<label class="control-label">  Prix max contributeur</label>
																<div class="controls">
																	<div class="input-append">
																		<input type="text" id="price_max" name="price_max" class="span6" readonly value="<?php echo $this->_tpl_vars['price_max']; ?>
">
																		<span class="add-on">&euro;</span>
																	</div>
																</div>
															</div>
														</div>
														<label class="error" for="pricename" generated="true" style="padding-left:10px;;float:left"></label>
													</div>
													<div class="row-fluid">
														<div class="alert alert-warning">*Le prix total inclut une commission Edit-place de <?php echo $this->_tpl_vars['eppercent']; ?>
%</div>
													</div>
													<input type="hidden" name="eppercent" id="eppercent" value="<?php echo $this->_tpl_vars['eppercent']; ?>
"/>
												</div>
											</div>
										</div>
									</div>  
									<?php endif; ?>	
									<?php endif; ?>	
									<!-- end contrib selection -->
									
									<!-- start, about detail -->

									<legend>2. Qui suis-je ?</legend>  
									<label class="radio inline" style="width:130px;">
										<input type="radio" name="whoIs" id="business" value="professional" onClick="togglebusiness('business');" <?php if ($this->_tpl_vars['whois'] == 'professional' || ( $this->_tpl_vars['clientidentifier'] != "" && $this->_tpl_vars['whois'] == "" )): ?>checked<?php endif; ?>>
										Un professionnel 
									</label>
									<label class="radio inline" style="width:130px;">
										<input type="radio" name="whoIs" id="customer" value="personal" onClick="togglebusiness('customer');" <?php if ($this->_tpl_vars['whois'] == 'personal'): ?>checked<?php endif; ?>>
										Un particulier
									</label>
									<label class="error" for="whoIs" generated="true"></label>

									<!-- show/hide feature : business case info -->
									<div id="business-info" <?php if ($this->_tpl_vars['whois'] == 'personal' || ( $this->_tpl_vars['clientidentifier'] == "" && ( $this->_tpl_vars['whois'] == "" || $this->_tpl_vars['whois'] == 'personal' ) )): ?>style="display:none;"<?php endif; ?>>
										<label><input type="text" placeholder="Nom de l'Entreprise" class="span12" name="companyname" id="companyname" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['company'])) ? $this->_run_mod_handler('utf8_encode', true, $_tmp) : smarty_modifier_utf8_encode($_tmp)); ?>
"></label>
										<label class="checkbox">
											<input type="checkbox" name="twitterlogo" id="twitterlogo" data-toggle="collapse" data-target="#company-logo" checked>Afficher mon logo pour renforcer la visibilit&eacute; de mon annonce sur le site
										</label>
										<div id="company-logo" class="collapse in">
											<div class="controls controls-row container-field">
												<div class="span9">
													<!--<select name="logotype" id="logotype" class="span12" onChange="switchbrowseliberte(this.value)" class="span10">
														<option value="twt">logo du compte twitter</option>
														<option value="file" <?php if ($this->_tpl_vars['logotype'] == 'file'): ?>selected<?php endif; ?>>Fichier sur mon poste</option>
													</select>-->
													<!--<div id="twitterupload" <?php if ($this->_tpl_vars['logotype'] == 'file'): ?>style="display:none;"<?php endif; ?>>
														<input type="text" style="margin-left: 0" class="span7" placeholder="@twitter_name" name="twitterid" id="twitterid" value="<?php echo $this->_tpl_vars['twitterid']; ?>
" />
														<button type="button" class="btn btn-small btn-inline span3" onClick="uploadtwitterlogo();">Update</button>
														<div style="float:left;clear:both"><label class="error" for="twitterid" generated="true"></label></div>
														<div style="float:left;clear:both;;padding-left:100px" class="error" id="fileloading"></div>
													</div>-->
													<div id="logoupload" >  
														<input type="file" class="span9" name="file" id="file">
														<span class="help-block" id="file_name"></span> 
													</div>
												</div>
												<div class="span3 offset3"><img src="<?php echo $this->_tpl_vars['logo']; ?>
" id="clientlogo"/></div>
											</div>
											
										</div>
									</div>
									<!-- end, about detail -->  
									<br> 
									<legend>3. Que se passe-t-il ensuite ?</legend>
									<br>
									<ol>
										<li>Mon annonce sera v&eacute;rifi&eacute;e, valid&eacute;e puis mise en ligne par Edit-place au plus tard le  <span class="label label-inverse"><?php echo $this->_tpl_vars['onlinelimit']; ?>
</span></li>
										<li>Je recevrai des devis jusqu'au <span class="label label-inverse" id="participationlimit"><?php echo $this->_tpl_vars['participationlimit']; ?>
</span></li>
										<li>Je pourrai s&eacute;lectionner le meilleur r&eacute;dacteur pour r&eacute;aliser mon projet</li>
									</ol>
									<br>
									<button type="submit" class="btn btn-large btn-primary" name="submit_liberte1" onClick="return checkbrief();">Cr&eacute;er l'annonce</button>
								</fieldset>
								<input type="hidden" name="logoidentifier" id="logoidentifier" value="<?php echo $this->_tpl_vars['logoidentifier']; ?>
"/> 
							</form>    
						<!-- form, end -->   
						</div>
					</div>

					<div class="span3">
						<!--  right column  -->
						<aside>
							<div id="brief-help">
								<h4>Qu'est-ce qu'un brief ?</h4>
								<p class="lead">Facile ! T&eacute;l&eacute;chargez et inspirez-vous de ces exemples</p>
								<ul>
									<li><a href="/client/briefsample?briefid=1">R&eacute;daction articles site high tech</a></li>
									<li><a href="/client/briefsample?briefid=0">R&eacute;daction articles boutique en ligne</a></li>
									<li><a href="/client/briefsample?briefid=2">R&eacute;&eacute;criture de titres sous excel</a></li> 
									
								</ul>
								<i class=" icon-info-sign"></i> Vous pouvez r&eacute;-utiliser ces documents en les adaptant � votre projet. Puis, ajoutez les ci-contre 
							</div>
							<div id="premium-ad" class="clearfix">
							  <h4>edit-place <span>PREMIUM</span></h4>
							  <strong>Qualit� garantie ? D�lais tenus ? Des centaines d'articles � r�diger et int�grer pour dans 10 jours ?</strong><p>Choisissez notre offre premium ! Un responsable de compte d�di� vous accompagne tout au long de votre projet. </p><a href="/client/premium" class="btn btn-small pull-right">Plus d'info</a>
							</div>
							<br>
							<div id="garantee" class="mod"> 
								<h3>Vos garanties</h3>
								<dl>
									<dt><span class="umbrella"></span>Edit-place est votre m&eacute;diateur</dt>
									<dd>En cas de contestation (d&eacute;lai de livraison, reprise d�articles, remboursement...)</dd>
									<dt><span class="locked"></span>Paiement s&eacute;curis&eacute;</dt>
									<dd>Notre solution de paiement en ligne vous garantit une transaction en toute tranquillit&eacute;</dd>
								</dl>
							</div> 
							<div class="mod" id="priceinfo" <?php if ($this->_tpl_vars['privatecontrib'] != 'on'): ?>style="display:none;"<?php endif; ?>>
								<h4><i class="icon-info-sign"></i> A propos des tarifs</h4>
								<p>Edit-place prend une commission de <?php echo $this->_tpl_vars['eppercent']; ?>
% sur chaque article / mission r�alis�e par un r�dacteur. Pensez � bien int�grer cette composante lorsque vous n�gociez votre tarif avec le r�dacteur.</p>
							</div>
						</aside>  
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Image profile -->
<!--
	<div id="cropprofile" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<form method="POST" name="cropform" id="cropform" action="" >
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h3 id="myModalLabel">IMAGE PROFIL</h3>
		</div>
		<div class="modal-body">
			<?php if ($this->_tpl_vars['clientidentifier'] == ""): ?>
				"Client/Client_Popup_libertePic.phtml"
			<?php else: ?>
				"Client/Client_Popup_ProfilePic.phtml"
			<?php endif; ?>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Annuler</button>
		</div>
		<input type="hidden" name="logoid" id="logoid" /> 
		</form>	
	</div>
-->	

<!-- contrib profile -->
<div id="viewContribProfile" class="modal container hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3 id="myModalLabel">Profil du r&eacute;dacteur</h3>
	</div>
	<div class="modal-body">
		<div id="userprofile">
	
		</div>
	</div>
</div>

	<div id="libertelogin" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/libertelogin.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</div>
	
	<!--- Relancer une mission--->
	<div id="duplicatemission" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:342px;margin-left:-160px;">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3 id="myModalLabel">Relancer une mission</h3>
	</div>
	<form method="POST" class="form-horizontal" name="duplicatemissionform" id="duplicatemissionform" action="/client/liberte1" style="margin:0px 0px;" >
		<div class="modal-body">
			<div>
				Nous avons pr&eacute;-rempli votre formulaire de demande de devis avec les informations de votre pr&eacute;c&eacute;dente mission.<br><br>
				Vous pouvez modifier chaque champs
				<br><br>
			</div>
			<input type="hidden" name="editliberte" id="editliberte" value="<?php echo $_GET['article']; ?>
"/>
			<input type="hidden" name="createprivate" id="createprivate" value="<?php echo $_GET['private']; ?>
"/>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true"><strong>Annuler</strong></button>
			<button class="btn btn-primary" type="submit" name="duplicate_mission" id="duplicate_mission" value="duplicate_mission">Valider</button>  
		</div>
		</form>
	</div>
	
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

<script language="javascript">
 //upload pic
 $(function(){
		var btnUpload=$(\'#logoupload\'); 
		var status=$(\'#file_name\');
		new AjaxUpload(btnUpload, {
			action: \'uploadclientgloballogo\',
			name: \'uploadfile\',
			onSubmit: function(file, ext){
				 if (! (ext && /^(jpg|jpeg|png|gif)$/.test(ext))){ 
                    // extension is not allowed 
					status.text(\'Uploadez uniquement des fichiers JPEG, GIF ou PNG\').css(\'color\',\'#FF0000\');
					return false;
				}
				
				status.html(\'<div align="center"><img src="/FO/images/loading-b.gif" /></div>\'); 
			},
			onComplete: function(file, response){//alert(response); 
			//On completion clear the status
				status.text(\'\');
				$(\'#file_name\').html(\'\');
				
				//Add uploaded file to list
				var obj = $.parseJSON(response);
				var approot="/FO/";
				
				if(obj.status=="success"){
					/*$(\'#spec_file_name\').val(file);
					
					$("#cropprofile").modal();
					$("#cropbox").attr("src",approot+obj.path+obj.identifier+"_crop."+obj.ext+ \'?\' + (new Date()).getTime());
					$("#cropbox").hide();
					$(\'#cropbox\').Jcrop({
						aspectRatio: 0,
                        setSelect: [ 60, 110, 210, 170 ],
						onSelect: updateCoords
					});*/
					//$("#logoid").val(obj.identifier);
					$("#logoidentifier").val(obj.identifier);
					var profilepic=approot+obj.path+obj.identifier+"_global."+obj.ext+ \'?\' + (new Date()).getTime();
					$("#clientlogo").attr("src",profilepic);
					
					$(\'.customfile-feedback\').val(file.substr(0,25)+" Uploaded");
				}
				else if(obj.status=="smallfile"){
				
					$(\'#file_name\').html("Error in upload, image too small. L\\\'image est trop petite, merci d\\\'en uploader une autre.").css(\'color\',\'#FF0000\');
				}
				else{
					$(\'#file_name\').html(\'Error in upload\').css(\'color\',\'#FF0000\');
				}
			}
		});
		jQuery(\'img\').each(function(){
			jQuery(this).attr(\'src\',jQuery(this).attr(\'src\')+ \'?\' + (new Date()).getTime());
		});	
		});
	 
			//image file upload
	$(\'#file\').customFileInput({ 
        button_position : \'left\'
    });
</script>

'; ?>