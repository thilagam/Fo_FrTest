<?php /* Smarty version 2.6.19, created on 2015-07-29 13:17:42
         compiled from Client/profile.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Client/profile.phtml', 187, false),array('modifier', 'strlen', 'Client/profile.phtml', 250, false),array('modifier', 'truncate', 'Client/profile.phtml', 257, false),array('modifier', 'ucfirst', 'Client/profile.phtml', 308, false),array('function', 'html_options', 'Client/profile.phtml', 219, false),)), $this); ?>
<?php echo '
<script language="javascript">
	$("#menu_profile").addClass("active");
	
	(function($,W,D)
	{
		var JQUERY4U = {};

		JQUERY4U.UTIL =
		{
			setupFormValidation: function()
			{
				//form validation rules
				$("#profileform").validate({
					onkeyup:false,
					rules: {
						first_name: "required",
						last_name: "required",
						phone_number: "required",
						company_name: "required",
						address: "required",
						city: "required",
						zipcode: "required",
						country: "required",
						rcs: "required",
						vat: "required",
					},
					messages: {
						first_name: "Nom obligatoire",
						last_name: "Pr&eacute;nom obligatoire",
						phone_number: "Num&eacute;ro de t&eacute;l&eacute;phone obligatoire",
						company_name: "Merci d\'indiquer le nom de votre entreprise",
						address: "Adresse obligatoire",
						city: "Ville obligatoire",
						zipcode: "Code postal obligatoire",
						country: "Choix du pays obligatoire",
						rcs: "RCS obligatoire",
						vat: "Merci d\'indiquer votre num&eacute;ro de TVA",
					},
					debug:true,
					submitHandler: function(form) { 
						var errornum=0;
											
						$("[id^=firstname_]" ).each(function(z) {
							var idtype=this.id.split("_");
								
							if($("#firstname_"+idtype[1]).val()=="")
							{
								$("#firstname_"+idtype[1]).addClass("boxerror");  
								errornum++;
							}
							else
								$("#firstname_"+idtype[1]).removeClass("boxerror");  
								
							if($("#lastname_"+idtype[1]).val()=="")
							{
								$("#lastname_"+idtype[1]).addClass("boxerror");  
								errornum++;
							}
							else
								$("#lastname_"+idtype[1]).removeClass("boxerror");  
								
							if($("#email_"+idtype[1]).val()=="")
							{
								$("#email_"+idtype[1]).addClass("boxerror");  
								errornum++;
							}
							else
							{
								var filter = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,4}$/i);
								var emmail=$("#email_"+idtype[1]).val();
								if (!filter.test(emmail)) {
									$("#email_"+idtype[1]).addClass("boxerror"); 
									$("#emailexists_"+idtype[1]).html("");  	
									errornum++;
								}
								else
								{
									$.ajax({
										url: "/client/checkuseremailexists",
										global: false,
										type: "POST",
										data: ({email : $("#email_"+idtype[1]).val()}),
										dataType: "html",
										async:false,
										success: function(msg){
											if(msg=="false" && $("#identifier_"+idtype[1]).val()==""){
												$("#email_"+idtype[1]).addClass("boxerror");  
												$("#emailexists_"+idtype[1]).html("Cet email correspond d&eacute;j&agrave; &agrave; un compte");  
												errornum++;
											}
											else
											{
												$("#email_"+idtype[1]).removeClass("boxerror");  
												$("#emailexists_"+idtype[1]).html("");  
											}
											
										}
									});
								}
							}
							if($("#password_"+idtype[1]).val()=="")
							{
								$("#password_"+idtype[1]).addClass("boxerror");  
								errornum++;
							}
							else
								$("#password_"+idtype[1]).removeClass("boxerror");  
						});
						
						if(errornum>0)
						{
							return false;
						}
						else
						{
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
	
		
</script>

<style>
	.boxerror {border:1px solid red !important;}  
</style>

'; ?>
	 

<div class="container">
	<div class="row">
		<div class="span12">
			<h1>Mes param&egrave;tres</h1>
		</div>
	</div>

	<div class="row">   
		<form name="profileform" id="profileform" method="POST" action="/client/profile"  enctype="multipart/form-data" >
		<div class="span9">
			<section id="profile-form">
				<div class="mod">
					<div class="row-fluid">
						<div class="control-group">
							<label for="" class="control-label span3 offset1"><strong>Informations de contact</strong></label>    
							<div class="controls span8">
								<label><input type="text" placeholder="Nom" name="first_name" id="first_name"  value="<?php echo $this->_tpl_vars['user_details'][0]['first_name']; ?>
" class="span6"></label>
								<label><input type="text" placeholder="Pr&eacute;nom" name="last_name" id="last_name" value="<?php echo $this->_tpl_vars['user_details'][0]['last_name']; ?>
" class="span6"></label>
								<label><input type="text" placeholder="T&eacute;l&eacute;phone" name="phone_number" id="phone_number" value="<?php echo $this->_tpl_vars['user_details'][0]['phone_number']; ?>
" class="span6"></label>
								<label><input type="text" name="email" id="email" class="span6" disabled value="<?php echo $this->_tpl_vars['user_details'][0]['email']; ?>
"></label>
								<a onclick="modifyusersetting('<?php echo $this->_tpl_vars['user_details'][0]['user_id']; ?>
}');" role="button" data-toggle="modal" data-target="#useSettingModal" style="cursor:pointer;" >Modifier mon mot de passe</a>
							</div>
						</div> 
						<div class="control-group">
							<label for="" class="control-label span3 offset1"><strong>Abonnement emails automatiques</strong></label> 
							<div class="controls span8">
								<label class="radio inline"><input type="radio" name="alert_subscribe"  value="yes" <?php if ($this->_tpl_vars['user_details'][0]['alert_subscribe'] == 'yes'): ?>checked<?php endif; ?>> Oui&nbsp;</label>
								<label class="radio inline"><input type="radio" name="alert_subscribe"  value="no" <?php if ($this->_tpl_vars['user_details'][0]['alert_subscribe'] == 'no'): ?>checked<?php endif; ?>> Non</label>
							</div>
						</div>
						
						<div id='add_more' style='clear:both;'>
						<?php if ($this->_tpl_vars['clientSubAcc_details'] | @ count > 0): ?>
							<?php $_from = $this->_tpl_vars['clientSubAcc_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['clientSubAcc_details'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['clientSubAcc_details']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['user']):
        $this->_foreach['clientSubAcc_details']['iteration']++;
?>
								<div class="control-group">
									<label for="" class="control-label span3 offset1"><strong>Informations de contact <?php echo ($this->_foreach['clientSubAcc_details']['iteration']-1)+1; ?>
</strong></label>    
									<div class="controls span8">
										<label><input type="text" placeholder="Nom" name="first_name_contact[<?php echo $this->_tpl_vars['k']; ?>
]" id="firstname_<?php echo $this->_tpl_vars['k']+1; ?>
"  value="<?php echo $this->_tpl_vars['user']['first_name']; ?>
" class="span6"></label>
										<label><input type="text" placeholder="Pr&eacute;nom" name="last_name_contact[<?php echo $this->_tpl_vars['k']; ?>
]" id="lastname_<?php echo $this->_tpl_vars['k']+1; ?>
" value="<?php echo $this->_tpl_vars['user']['last_name']; ?>
" class="span6"></label>
										<label><input type="text" name="email_contact[<?php echo $this->_tpl_vars['k']; ?>
]" id="email_<?php echo $this->_tpl_vars['k']+1; ?>
" class="span6" readonly value="<?php echo $this->_tpl_vars['user']['email']; ?>
"></label>
										<label><input type="password" name="password_contact[<?php echo $this->_tpl_vars['k']; ?>
]" id="password_<?php echo $this->_tpl_vars['k']+1; ?>
" class="span6" value="<?php echo $this->_tpl_vars['user']['password']; ?>
" placeholder="Mot de passe"></label>
										<input type="hidden" id="identifier_<?php echo $this->_tpl_vars['k']+1; ?>
" name="identifier_contact[<?php echo $this->_tpl_vars['k']; ?>
]" value="<?php echo $this->_tpl_vars['user']['identifier']; ?>
" />
									</div>
								</div> 
							<?php endforeach; endif; unset($_from); ?>
						<?php endif; ?>	
						<input type="hidden" id="fieldcount" name="fieldcount" value="<?php echo count($this->_tpl_vars['clientSubAcc_details']); ?>
" />
						</div>
						<div class="control-group" style='clear:both;'>
							<label for="" class="control-label span3 offset1"><a id="add_more_btn" href='#'><strong>Ajouter un contact</strong></a></label>
							<input type='hidden' name='ext_contact' id='ext_contact' value='0'> 
						</div>
					</div>
				</div>
				<div class="mod">
					<div class="row-fluid">
						<div class="control-group">
							<label for="" class="control-label span3 offset1"><strong>D&eacute;tails de la soci&eacute;t&eacute;</strong></label>    
							<div class="controls span8">
								<label><input type="text" name="company_name" id="company_name" value="<?php echo $this->_tpl_vars['user_details'][0]['company_name']; ?>
" class="span6" placeholder="" value="Topito"></label>
								<div class="row-fluid" id="company-logo">
									<div class="span6">
										<label>
											<div id="fileupload">  
												<input type="file" class="span9" name="file" id="file">
												<span class="help-block" id="file_name"></span>  
											</div>
										</label>
									</div>
									<div class="span3 offset3">
										<img src="<?php echo $this->_tpl_vars['user_details'][0]['logopath']; ?>
" id="clientlogo" style="padding:5px;">
									</div> 
								</div>
								<label><textarea type="text" placeholder="Adresse" name="address" id="address" class="span6"><?php echo $this->_tpl_vars['user_details'][0]['address']; ?>
</textarea></label>
								<label><input type="text" placeholder="Ville" name="city" id="city" value="<?php echo $this->_tpl_vars['user_details'][0]['city']; ?>
" class="span6"></label>
								<label><input type="text" placeholder="Code postal" name="zipcode" id="zipcode" value="<?php echo $this->_tpl_vars['user_details'][0]['zipcode']; ?>
" class="span6"></label>
								<label>
									<select name="country" id="country" class="span6">
										 <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['country_array'],'selected' => $this->_tpl_vars['user_details'][0]['country']), $this);?>

									</select>
								</label>
								<label><input type="text" placeholder="RCS" name="rcs" id="rcs" value="<?php echo $this->_tpl_vars['user_details'][0]['rcs']; ?>
" class="span6"></label>
								<label><input type="text" placeholder="TVA Intracommunautaire" name="vat" id="vat" value="<?php echo $this->_tpl_vars['user_details'][0]['vat']; ?>
" class="span6"></label>
								<label><input type="text" placeholder="Fax" name="fax_number" id="fax_number" value="<?php echo $this->_tpl_vars['user_details'][0]['fax_number']; ?>
" class="span6"></label>
							</div>
						</div> 
					</div>
				</div>
				<input type="hidden" name="frompage" id="frompage" value="<?php echo $_GET['from']; ?>
" />
				<input type="hidden" name="article" id="article" value="<?php echo $_GET['article']; ?>
" />
			<div class="mod">
				<div class="pull-right">
					<button class="btn inline">Annuler</button> 
					<button type="submit" name="update_profile" value="update" class="btn btn-primary inline"><i class="icon-refresh icon-white"></i> Enregistrer</button>
				</div>
			</div>
			</section>
		</div>
		
		<div class="span3">
			<!--  right column  -->
			<aside>
				<div class="aside-bg">
					<div id="quote-ongoing" class="aside-block">
						<h4>Vos devis en cours</h4>
						<ul class="nav nav-tabs nav-stacked <?php if (count($this->_tpl_vars['quotes']) > 9): ?>pre-scrollable<?php endif; ?>"> 
							<?php if (count($this->_tpl_vars['quotes']) > 0): ?>
								<?php $_from = $this->_tpl_vars['quotes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['quote']):
?>
									<li>
										<?php if (smarty_modifier_strlen($this->_tpl_vars['quote']['title']) > 28): ?>
											<a href="/client/quotes?id=<?php echo $this->_tpl_vars['quote']['id']; ?>
" rel="tooltip" data-original-title="<?php echo $this->_tpl_vars['quote']['title']; ?>
" data-placement="left">
												<?php if ($this->_tpl_vars['quote']['valid'] == 'yes'): ?>
													<span class="badge pull-right badge-warning">1</span>
												<?php else: ?>	
													<span class="badge pull-right"><?php echo $this->_tpl_vars['quote']['participations']; ?>
</span>
												<?php endif; ?>
											<?php echo ((is_array($_tmp=$this->_tpl_vars['quote']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 28, "...", true) : smarty_modifier_truncate($_tmp, 28, "...", true)); ?>

											</a>
										<?php else: ?>
											<a href="/client/quotes?id=<?php echo $this->_tpl_vars['quote']['id']; ?>
">	
												<?php if ($this->_tpl_vars['quote']['valid'] == 'yes'): ?>
													<span class="badge pull-right badge-warning">1</span>
												<?php else: ?>	
													<span class="badge pull-right"><?php echo $this->_tpl_vars['quote']['participations']; ?>
</span>
												<?php endif; ?>

											<?php echo $this->_tpl_vars['quote']['title']; ?>
</a>
										<?php endif; ?>	
									</li>
								<?php endforeach; endif; unset($_from); ?>
							<?php else: ?> 
								<li><b>Pas de devis en cours</b></li>
							<?php endif; ?>
						</ul>
						<ul class="nav nav-tabs nav-stacked">
							<li><a href="/client/liberte1"><i class="icon-edit"></i> <strong>Demander un nouveau devis</strong></a></li>
						</ul>
					</div>
					<div class="aside-block" id="garantee">
						<h4>Vos garanties</h4>
						<dl>
							<dt><span class="umbrella"></span>edit-place est votre m&eacute;diateur</dt>
							<dd>En cas de contestation (d&eacute;lai de livraison, reprise d�articles, remboursement...)</dd>
							<dt><span class="locked"></span>Paiement s&eacute;curis&eacute;</dt>
							<dd>Notre solution de paiement en ligne vous garantit une transaction en toute tranquillit&eacute;</dd>
						</dl>
					</div>
				</div>
			</aside>  
		</div>
		</form>
	</div>
</div>


	<?php if ($this->_tpl_vars['writerscount'] > 0): ?>
	<section id="known-users">
		<div class="container">
			<div class="row">
				<h3 class="sectiondivider pull-center"><span>Ils ont d&eacute;j&agrave; collabor&eacute; avec vous !</span></h3>
				
				<?php $_from = $this->_tpl_vars['writers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['writer']):
?>
					<div class="span3">
						<div class="editor-container">
							<a  class="imgframe-large" onclick="loadcontribprofile('<?php echo $this->_tpl_vars['writer']['user_id']; ?>
');" role="button" data-toggle="modal" data-target="#viewContribProfile" style="cursor:pointer;">
								<img src="<?php echo $this->_tpl_vars['writer']['profileimage']; ?>
">
							</a>
							<p class="editor-name"><a onclick="loadcontribprofile('<?php echo $this->_tpl_vars['writer']['user_id']; ?>
');" role="button" data-toggle="modal" data-target="#viewContribProfile" style="cursor:pointer;"><?php echo ((is_array($_tmp=$this->_tpl_vars['writer']['name'])) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : smarty_modifier_ucfirst($_tmp)); ?>
</a></p>
						</div>
					</div>
				<?php endforeach; endif; unset($_from); ?> 
			</div>
		</div>
	</section>
	<?php endif; ?>

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
	
	<!-- profile settings modify--> 
	<div id="useSettingModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	</div>
	
	
<?php echo '
<script language="javascript">
 $(function(){

 		var MaxInputs       = 8; //maximum input boxes allowed
		var InputsWrapper   = $("#add_more"); //Input boxes wrapper ID
		var AddButton       = $("#add_more_btn"); //Add button ID

		//var x = InputsWrapper.length; //initlal text box count
		var x = $(\'#fieldcount\').val(); //initlal text box count
		var FieldCount=$(\'#fieldcount\').val(); //to keep track of text box added
		

		$(AddButton).click(function (e)  //on add input button click
		{
		        if(x <= MaxInputs) //max input box allowed
		        {
		            FieldCount++; //text box added increment
		            //add input box
		            $(InputsWrapper).append(\'<div class="control-group"><label for="" class="control-label span3 offset1"><strong>Informations de contact \'+ FieldCount +\'</strong></label><div class="controls span8"><label><input type="text" placeholder="Nom" name="first_name_contact[\'+(FieldCount-1)+\']" id="firstname_\'+FieldCount +\'"  value="" class="span6"></label><label><input type="text" placeholder="Pr&eacute;nom" name="last_name_contact[\'+(FieldCount-1)+\']" id="lastname_\'+ FieldCount +\'" value="" class="span6"></label><label><input type="text" placeholder="Email"  name="email_contact[\'+(FieldCount-1)+\']" id="email_\'+ FieldCount +\'" class="span6" value=""><br/><span id="emailexists_\'+ FieldCount +\'" class="error"></span></label><label><input type="password" placeholder="Mot de passe"  name="password_contact[\'+(FieldCount-1)+\']" id="password_\'+ FieldCount +\'" class="span6" value=""></label></div><div class="span5"></div><a href="#" class="removeclass">Supprimer</a></div><input type="hidden" id="identifier_\'+FieldCount+\'" name="identifier_contact[\'+(FieldCount-1)+\']" value="" /> </div>\');
		            x++; //text box increment
		            $(\'#ext_contact\').val(x);

		        }
		return false;
		});

		$("body").on("click",".removeclass", function(e){ //user click on remove text
		        if( x > 1 ) {
		                $(this).parent(\'div\').remove(); //remove text box
		                x--; //decrement textbox
						FieldCount--;
		                $(\'#ext_contact\').val(x);
		        }
		return false;
		}) 

		var btnUpload=$(\'#fileupload\'); 
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
