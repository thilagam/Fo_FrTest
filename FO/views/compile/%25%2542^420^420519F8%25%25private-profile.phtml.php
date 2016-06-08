<?php /* Smarty version 2.6.19, created on 2015-11-11 10:13:44
         compiled from Contrib/private-profile.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Contrib/private-profile.phtml', 90, false),array('modifier', 'zero_cut', 'Contrib/private-profile.phtml', 319, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
$("#menu_profile").addClass("active");

/**cv uploading**/
$(function(){
		var btnUpload=$(\'#upload_cv\');
		var status=$(\'#cv_status\');
		new AjaxUpload(btnUpload, {
			action: \'upload-cv\',
			name: \'cv_file\',
			onSubmit: function(file, ext){
				 if (! (ext && /^(doc|docx|pdf)$/.test(ext))){ 
                    // extension is not allowed 
					status.text(\'Only doc,docx,pdf files are allowed\').css(\'color\',\'#FF0000\');
					return false;
					}

				 /*if (! (ext && /^(doc|docx|rtf)$/.test(ext))){ 
                    // extension is not allowed 
					status.html(\'Only doc,docx,rtf files are allowed\').css(\'color\',\'#FF0000\');
					return false;
					}*/
				status.html(\'<img src="/FO/images/icon-generic.gif" /> uploading..\');
			},
			onComplete: function(file, response){
				//On completion clear the status
				status.html(\'\');
				
				var obj = $.parseJSON(response);
				if(obj.status=="success"){
					
					status.html(\'CV publi&eacute; le : <time datetime="\'+obj.published+\'">\'+obj.published+\'</time>.\');		
					$("#download_cv").show();		
					
				}				
				else{
					status.html(\'Error in upload\').css(\'color\',\'#FF0000\');
				}
			}
		});			
	});
</script>
'; ?>

<div class="container">
 
	<section id="status">
		<div class="row-fluid">
			<div class="profilehead-mod">
				<div class="span2">
					<div class="editor-container">
						<?php if ($this->_tpl_vars['profileType'] == 'senior'): ?>
							<span data-original-title="Niveau Senior" data-content="J'ai au moins 5 articles valid&eacute;s sur Edit-place. Je suis un contributeur confirm&eacute; chez Edit-place" rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>S&eacute;nior</span>
						<?php elseif ($this->_tpl_vars['profileType'] == 'junior'): ?>
							<span data-original-title="Accessible au Junior" data-content="Au moins 1 article valid&eacute; sur Edit-place" rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>Junior</span>
						<?php elseif ($this->_tpl_vars['profileType'] == 'sub-junior'): ?>
							<span data-original-title="Accessible au D&eacute;butant" data-content="Aucun article encore valid&eacute; sur Edit-place" rel="popover" data-trigger="hover" data-placement="right" class="label label-level"><i class="icon-bookmark"></i>D&eacute;butant</span>	
						<?php endif; ?>	
							
						<a class="imgframe-large" href="/contrib/modify-profile"><img src="<?php echo $this->_tpl_vars['profile_image']; ?>
" title="<?php echo $this->_tpl_vars['client_email']; ?>
"></a>
					</div>
				</div>
				<div class="span7 profile-name">
					<h3><?php echo $this->_tpl_vars['client_email']; ?>
</h3>
					<p class="" style=""><?php echo $this->_tpl_vars['ep_contrib_age']; ?>
 ans  <span class="muted">&bull;</span>  <?php echo $this->_tpl_vars['allCategories']; ?>
  <span class="muted">&bull;</span> <?php echo $this->_tpl_vars['ep_language']; ?>
 <?php if ($this->_tpl_vars['allLanguages']): ?> , <?php echo $this->_tpl_vars['allLanguages']; ?>
<?php endif; ?></p>
					<blockquote>
						<i class="icon-leaf"></i> <?php echo $this->_tpl_vars['ep_contrib_profile_self_details']; ?>

					</blockquote>
				</div>

				<div class="span3 stat">
					<div class="progress progress-success">
						<div class="bar" style="width: <?php echo $this->_tpl_vars['profile_percentage']; ?>
%"></div>
					</div>
					Votre profil est rempli &agrave; <strong><?php echo $this->_tpl_vars['profile_percentage']; ?>
%</strong>
					<hr>
					<p class=""><a class="btn btn-small btn-block btn-primary" href="/contrib/modify-profile"><i class="icon-refresh icon-white"></i> Actualiser mon profil</a></p>
					<p><a href="/contrib/public-profile" role="button" data-toggle="modal" data-target="#viewProfile-ajax" class="btn btn-small btn-block"> Voir mon profil public</a></p>
				</div>
			</div>
		</div>
	</section>
	 <!-- end, contributor status --> 
	<div class="row-fluid"> 
		<div class="span8">
			<section id="skills">
				<div class="mod">
					<h4>Langues</h4>
					<strong><?php echo $this->_tpl_vars['ep_language']; ?>
</strong> (langue maternelle)
					<?php if (count($this->_tpl_vars['language_more']) > 0): ?>
						<?php $_from = $this->_tpl_vars['language_more']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lang']):
?>
							<div class="skillstat row-fluid">
								<div class="span6">
									<p><strong><?php echo $this->_tpl_vars['lang']['name']; ?>
</strong>  <?php echo $this->_tpl_vars['lang']['percent']; ?>
%</p>
									<div class="progress">
										<div class="bar" style="width: <?php echo $this->_tpl_vars['lang']['percent']; ?>
%"></div>
									</div>
									<span class="pull-left legend muted">D&eacute;butant</span> <span class="pull-right legend muted">Bilingue</span>
								</div>
							</div>
						<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>	
				</div>

				<div class="mod">
					<h4>Domaines de comp&eacute;tences</h4>

					<?php if (count($this->_tpl_vars['category_more']) > 0): ?>
						<?php $_from = $this->_tpl_vars['category_more']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['category']):
?>
							<div class="skillstat row-fluid">
								<div class="span6">
									<p><strong data-original-title="<?php echo $this->_tpl_vars['category']['name']; ?>
" rel="tooltip"><?php echo $this->_tpl_vars['category']['name']; ?>
</strong>  <?php echo $this->_tpl_vars['category']['percent']; ?>
%</p>
									<div class="progress">
										<div class="bar" style="width: <?php echo $this->_tpl_vars['category']['percent']; ?>
%"></div>
									</div>
									<span class="pull-left legend muted">D&eacute;butant</span> <span class="pull-right legend muted">Expert</span>
								</div>
							</div>		
						<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>			
				</div>
				<div class="mod">
					<h4>Exp&eacute;riences professionnelles</h4>
					<?php if (count($this->_tpl_vars['jobDetails']) > 0): ?>
					<dl>
						<?php $_from = $this->_tpl_vars['jobDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['job_details'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['job_details']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['job']):
        $this->_foreach['job_details']['iteration']++;
?>
							<dt><?php echo $this->_tpl_vars['job']['title']; ?>
</dt>
							<dd class="company"><?php echo $this->_tpl_vars['job']['institute']; ?>
</dd>
							<dd class="muted">
								Type de contrat : <?php if ($this->_tpl_vars['job']['contract'] == 'cdi'): ?>CDI<?php elseif ($this->_tpl_vars['job']['contract'] == 'cdd'): ?>CDD<?php elseif ($this->_tpl_vars['job']['contract'] == 'freelance'): ?>Freelance<?php elseif ($this->_tpl_vars['job']['contract'] == 'intern'): ?>Interim<?php endif; ?>
							</dd>
							<dd class="muted">
								<time datetime="<?php echo $this->_tpl_vars['job']['start_date']; ?>
"><?php echo $this->_tpl_vars['job']['start_date']; ?>
</time> - <time datetime="<?php echo $this->_tpl_vars['job']['end_date']; ?>
"><?php echo $this->_tpl_vars['job']['end_date']; ?>
</time>
							</dd>
						<?php endforeach; endif; unset($_from); ?>							
					</dl>
					<?php endif; ?>
				</div>
				<div class="mod">
					<h4>Formations</h4>
					<?php if (count($this->_tpl_vars['educationDetails']) > 0): ?>
					<dl>	
						<?php $_from = $this->_tpl_vars['educationDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['edu_details'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['edu_details']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['education']):
        $this->_foreach['edu_details']['iteration']++;
?>
							<dt><?php echo $this->_tpl_vars['education']['title']; ?>
</dt>
							<dd class="company"><?php echo $this->_tpl_vars['education']['institute']; ?>
</dd>
							<dd class="muted">
								<time datetime="<?php echo $this->_tpl_vars['education']['start_date']; ?>
"><?php echo $this->_tpl_vars['education']['start_date']; ?>
</time> - <time datetime="<?php echo $this->_tpl_vars['education']['end_date']; ?>
"><?php echo $this->_tpl_vars['education']['end_date']; ?>
</time>
							</dd>
							<?php endforeach; endif; unset($_from); ?>
					</dl>
					<?php endif; ?>

				</div>
                <div class="mod">
                    <h4>Informations personnelles</h4>
                    <address>
                        <strong><?php echo $this->_tpl_vars['ep_contrib_profile_fname']; ?>
 <?php echo $this->_tpl_vars['ep_contrib_profile_lname']; ?>
</strong><br>
                        <?php echo $this->_tpl_vars['ep_contrib_profile_address']; ?>
<br>
                        <?php echo $this->_tpl_vars['ep_contrib_profile_city']; ?>
, <?php echo $this->_tpl_vars['ep_contrib_profile_postalcode']; ?>
<br>
                        <abbr title="T&eacute;l&eacute;phone">Tel:</abbr> <?php echo $this->_tpl_vars['ep_contrib_profile_telephone']; ?>

                    </address>
                    Nationalit&eacute; : <?php echo $this->_tpl_vars['nationality']; ?>

                </div>
                                <?php if ($this->_tpl_vars['options_flag'] == 'reg_check'): ?>
                <div class="mod">
                    <h4>En cours d'immatriculation</h4>
                        <strong>Num&eacute;ro de passeport :</strong> <?php echo $this->_tpl_vars['passport_no']; ?>

                        <br />
                        <strong>Carte d'identit&eacute; :</strong> <?php echo $this->_tpl_vars['id_card']; ?>

                </div>
                <?php elseif ($this->_tpl_vars['options_flag'] == 'com_check'): ?>
                <div class="mod">
                    <h4>Soci&eacute;t&eacute;</h4>
                    <address>
                        <strong>Nom de la soci&eacute;t&eacute; : <?php echo $this->_tpl_vars['com_name']; ?>
</strong><br>
                        Address : <?php echo $this->_tpl_vars['com_address']; ?>
<br>
                        Ville : <?php echo $this->_tpl_vars['com_city']; ?>
,<br/>
                        Code postal : <?php echo $this->_tpl_vars['com_zipcode']; ?>
<br>
                        <abbr title="T&eacute;l&eacute;phone">Tel:</abbr> <?php echo $this->_tpl_vars['com_phone']; ?>
<br />
                        TVA Number : <?php echo $this->_tpl_vars['com_tva_number']; ?>
<br />
                        <?php echo $this->_tpl_vars['com_country']; ?>

                    </address>
                    <?php if ($this->_tpl_vars['com_country'] == 'FRANCE'): ?>
                    SIREN : <?php echo $this->_tpl_vars['com_siren']; ?>

                    <?php endif; ?>
                </div>
                <?php elseif ($this->_tpl_vars['options_flag'] == 'tva_check'): ?>
                <div class="mod">
                    <h4> Assujetti  &agrave; la TVA (entreprise - auto-entrepreneur) </h4>
                    Num&eacute;ro de TVA Intracommunautaire: <?php echo $this->_tpl_vars['tva_number']; ?>

                </div>
                <?php endif; ?>
                <div class="mod">
                    <h4>Software Ownership and Experience Level</h4>
                    <table class="table table-bordered">
                        <tr>
                            <td></td>
                            <td>Beginner</td>
                            <td>Intermediate</td>
                            <td>Advanced</td>
                            <td>I own it</td>
                        </tr>
                                                <?php $_from = $this->_tpl_vars['ep_software_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['SoftwareList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['SoftwareList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['softwarekey'] => $this->_tpl_vars['software']):
        $this->_foreach['SoftwareList']['iteration']++;
?>
                        <?php $this->assign('s_index', ($this->_foreach['SoftwareList']['iteration']-1)+1); ?>

                        <!--code to check if the value is saved in DB-->
                        <?php $this->assign('check', 0); ?>
                        <?php $this->assign('condition', 'false'); ?>
                        <?php $this->assign('level', 'false'); ?>
                        <?php $this->assign('own', 'false'); ?>
                        <?php while ($this->_tpl_vars['check'] < $this->_tpl_vars['software_list_count']) { ?>
                        <?php if ($this->_tpl_vars['software_list'][$this->_tpl_vars['check']][0] == $this->_tpl_vars['softwarekey']): ?>
                        <?php $this->assign('condition', 'true'); ?>
                        <?php $this->assign('level', $this->_tpl_vars['software_list'][$this->_tpl_vars['check']][1]); ?>
                        <?php $this->assign('own', $this->_tpl_vars['software_list'][$this->_tpl_vars['check']][2]); ?>
                        <?php endif; ?>
                        <?php $this->assign('check', $this->_tpl_vars['check']+1); ?>
                        <?php } ?>
                        <!-- end of code to check if the value is saved in DB -->
                        <?php if ($this->_tpl_vars['condition'] == 'true'): ?>
                            <?php if ($this->_tpl_vars['previous_software'] != $this->_tpl_vars['software'][0]): ?>
                            <tr style="background-color: #DDDDDD;">
                                <td><b><?php echo $this->_tpl_vars['software'][0]; ?>
</b></td>
                                <td colspan="4"></td>
                            </tr>
                            <?php endif; ?>
                        <tr>
                            <td>

                                    <?php echo $this->_tpl_vars['software'][1]; ?>


                            </td>
                            <td> <?php if ($this->_tpl_vars['level'] == 'beginner'): ?><i class="icon-ok "></i><?php else: ?>-<?php endif; ?></td>
                            <td> <?php if ($this->_tpl_vars['level'] == 'intermediate'): ?><i class="icon-ok "></i><?php else: ?>-<?php endif; ?> </td>
                            <td><?php if ($this->_tpl_vars['level'] == 'advanced'): ?><i class="icon-ok "></i><?php else: ?>-<?php endif; ?> </td>
                            <td> <?php if ($this->_tpl_vars['own'] == 'on'): ?><i class="icon-ok "></i><?php else: ?>-<?php endif; ?></td>
                        </tr>
                        <!---->
                        <?php endif; ?>
                                                <?php $this->assign('previous_software', $this->_tpl_vars['software'][0]); ?>
                        <?php endforeach; endif; unset($_from); ?>

                    </table>

                </div>
				<div class="mod"><a href="/contrib/modify-profile" class="btn btn-primary pull-right"><i class="icon-refresh icon-white"></i> Actualiser mon profil</a>
				</div>
			</section>
		</div>
		<div class="span4">
			<!--  right column  -->
			<aside>
				<div class="aside-bg">
					<div class="aside-block" id="we-trust">
						<h4>Vos publications</h4>
						<?php if ($this->_tpl_vars['publishedClients'] | @ count > 0): ?>
						<ul class="unstyled">
							<?php $_from = $this->_tpl_vars['publishedClients']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pclient']):
?>
								<li><img title="<?php echo $this->_tpl_vars['pclient']['company_name']; ?>
" src="<?php echo $this->_tpl_vars['pclient']['client_pic']; ?>
"></li>
							<?php endforeach; endif; unset($_from); ?>
							
						</ul>
						<?php endif; ?>
						
					</div>
					<div class="aside-block" id="shipping">
						<h4>Info de facturation</h4>

						<dl>
									
							
							<dt>Choix de r&eacute;mun&eacute;ration</dt>
							<dd class="muted">
								<p class="btn btn-small disabled">
									<?php if ($this->_tpl_vars['ep_contrib_profile_payment_type'] == 'paypal'): ?>
										Paypal
									<?php elseif ($this->_tpl_vars['ep_contrib_profile_payment_type'] == 'cheque'): ?>
										Ch&egrave;que
									<?php elseif ($this->_tpl_vars['ep_contrib_profile_payment_type'] == 'virement'): ?>
										VIREMENT BANCAIRE	
									<?php endif; ?>	
								</p>
							</dd>
							<dt>Vos royalties</dt>
							<dd class="muted">
								Gains depuis la derniere facture : <strong><a href="/contrib/royalties"><?php echo ((is_array($_tmp=$this->_tpl_vars['userRoyalty'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &euro;</a></strong>
							</dd>
						</dl>
					</div>
					<div class="aside-block" id="cv">
						<h4>Mon CV</h4>
						Votre CV est consult&eacute; par Edit-place ou le  client lorsque vous avez &eacute;t&eacute; s&eacute;lectionn&eacute; pour une mission. Pensez &agrave; le mettre &agrave;  jour r&eacute;guli&egrave;rement.
						
						<p class="muted" id="cv_status">
							<?php if ($this->_tpl_vars['cv_exists'] == 'yes'): ?>
								CV publi&eacute; le : <time datetime="<?php echo $this->_tpl_vars['cv_uploaded_at']; ?>
"><?php echo $this->_tpl_vars['cv_uploaded_at']; ?>
</time>.
							<?php endif; ?>	
						</p>	
						<div class="btn-group">
							
								<a class="btn btn-small" id="download_cv" href="/contrib/download-file?type=cv" <?php if ($this->_tpl_vars['cv_exists'] != 'yes'): ?> style="display:none" <?php endif; ?>><i class="icon-download"></i> T&eacute;l&eacute;charger</a>
								<a class="btn btn-small" id="upload_cv" title="Aucun fichier s&eacute;lectionn&eacute;"><i class="icon-upload"></i> Nouvelle version</a>
						</div>
					</div>
				</div>
			</aside>  
		</div>
	</div>
</div>