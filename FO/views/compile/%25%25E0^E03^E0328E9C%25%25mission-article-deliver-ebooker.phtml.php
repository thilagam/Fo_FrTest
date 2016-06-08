<?php /* Smarty version 2.6.19, created on 2016-02-23 11:18:33
         compiled from Contrib/mission-article-deliver-ebooker.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Contrib/mission-article-deliver-ebooker.phtml', 95, false),array('modifier', 'urldecode', 'Contrib/mission-article-deliver-ebooker.phtml', 131, false),array('modifier', 'utf8_decode', 'Contrib/mission-article-deliver-ebooker.phtml', 131, false),array('modifier', 'zero_cut', 'Contrib/mission-article-deliver-ebooker.phtml', 204, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
$(\'body\').removeClass(\'homepage\');
$(\'body\').addClass(\'mission\');
</script>
<style type="text/css">
.btn-success_custom
{
	background-color: #5BB75B;    
    border-width: 0;
    color: #FFFFFF;
	font-weight:600
	background-image: linear-gradient(to bottom, #62C462, #51A351);
    background-repeat: repeat-x;
    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
}
.btn-success_custom:hover, .btn-success_custom:active, .btn-success_custom.active, .btn-success_custom.disabled, .btn-success_custom[disabled] {
    background-color: #51A351;
    color: #FFFFFF;
}
.btn-success
{
margin-top: 0;
padding:5px 13px;
}
.sample-management-cont{
    background-color: #f8f8f8;
    border-radius: 4px 4px 0 0;
    box-shadow: 0 20px 8px -18px rgba(0, 0, 0, 0.3), 0 1px 0 #fff inset;    
}
.topset1{
	margin-top:20px
}
textarea {
  resize: vertical; 
}
</style>
'; ?>

<div class="container">
<br>
<?php if ($this->_tpl_vars['missionDetails'] | @ count > 0): ?>
	<?php $_from = $this->_tpl_vars['missionDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['details'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['details']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['article']):
        $this->_foreach['details']['iteration']++;
?>
	<ul class="breadcrumb">
		<li><a href="/contrib/home">Accueil</a> <span class="divider">/</span></li>
		<li><a href="/contrib/ongoing">Mes participations</a> <span class="divider">/</span></li>
		<li class="active"><?php echo $this->_tpl_vars['article']['title']; ?>
</li>
	</ul> 
	<?php if ($this->_tpl_vars['article']['status'] == 'disapproved'): ?>
	<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<a class="btn-link disabled btn-mini pull-right" href="#">Je ne pourrai pas tenir ces d&eacute;lais.</a>
		<i class="icon-exclamation-sign"></i> Vos articles devant &ecirc;tre repris, vous obtenez un nouveau d&eacute;lai de livraison de <?php echo $this->_tpl_vars['article']['article_resubmit_time_text']; ?>
 pour les mettre &agrave; jour. 
	</div>
	<?php endif; ?>
	
	<!-- start, Summary -->
	<section id="summary">
		<div class="row-fluid">
			<div class="span8">
				<?php if ($this->_tpl_vars['article']['ao_type'] == 'premium'): ?>
					<?php if ($this->_tpl_vars['article']['missiontest'] == 'yes'): ?>
						<span data-placement="right" rel="tooltip" data-original-title="Garanteed long-term Mission" class="label label-test-mission"><i class="icon-star icon-white"></i>  Staffing</span>
					<?php else: ?>
						<span class="label label-premium">Mission Premium</span>&nbsp;&nbsp;g&eacute;r&eacute;e par <b><?php echo $this->_tpl_vars['article']['bo_user']; ?>
</b>. <a style="color:#fff;font-weight:bold;text-decoration:underline;" href="/contrib/compose-mail?senduser=<?php echo $this->_tpl_vars['article']['article_id']; ?>
">Contactez-le !</a>
					<?php endif; ?>
					<h1><?php echo $this->_tpl_vars['article']['title']; ?>
</h1>
				<?php else: ?>	
					<?php if ($this->_tpl_vars['article']['missiontest'] == 'yes'): ?>
						<span data-placement="right" rel="tooltip" data-original-title="Garanteed long-term Mission" class="label label-test-mission"><i class="icon-star icon-white"></i>  Staffing</span>
					<?php else: ?>
						<span class="label label-quote">Mission Libert&eacute;</span>
					<?php endif; ?>	
					<h1><?php echo $this->_tpl_vars['article']['title']; ?>
</h1>	
				<?php endif; ?>	
			</div>
			<div class="span3 stat">
				<p>Date de livraison</p>
				<!-- add classname "less24" if time is < 24h  -->
				<!-- p class="num-large less24">Livrée</p-->
				<?php if ($this->_tpl_vars['article']['status'] == 'bid' || $this->_tpl_vars['article']['status'] == 'disapproved' || $this->_tpl_vars['article']['status'] == 'disapprove_client'): ?>
					<p class="num-large less24">
						<span id="dtime_<?php echo $this->_tpl_vars['article']['article_id']; ?>
_<?php echo $this->_tpl_vars['article']['article_submit_expires']; ?>
">
							<span id="dtext_<?php echo $this->_tpl_vars['article']['article_id']; ?>
_<?php echo $this->_tpl_vars['article']['article_submit_expires']; ?>
"><?php echo $this->_tpl_vars['article']['article_submit_expires']; ?>
</span>
						</span>
					</p>
				<?php else: ?>
					<p class="num-large less24" style="font-size:18px"><?php echo $this->_tpl_vars['article']['status_trans']; ?>
</p>
				<?php endif; ?>	
			</div>
						<div class="span1 stat">
				<div class="icon-comment-large new"><a href="#comment" class="scroll" id="comment_count"><?php echo count($this->_tpl_vars['commentDetails']); ?>
</a></div>
			<!--  to active if new comment, add classname "new" -->
			<!--div class="icon-comment-large new"><a href="#comment">3</a></div-->
			</div>
		</div>
	</section>
	<!-- end, summary --> 
 
	<div class="row-fluid"> 
		<div class="span9">
			<section id="stencilWrapper">
				<div class="mod">
					<div class="summary clearfix">
						<h4>D&eacute;tails du projet												
							<?php if ($this->_tpl_vars['article']['spec_exists'] == 'yes'): ?>
								<span class="pull-right"><a href="/contrib/download-file?type=clientbrief&article_id=<?php echo $this->_tpl_vars['article']['article_id']; ?>
" class="btn btn-small btn-success"><i class="icon-white icon-circle-arrow-down"></i> T&eacute;l&eacute;charger le brief client</a></span>
							<?php endif; ?>
						</h4>							
					</div>
				</div>
				<div class="row-fluid">
					<h3>Please create <?php echo $this->_tpl_vars['article']['files_pack']; ?>
 versions of sentences and insert <span>all the required words.</span><br>Our sample will inspire you hopefully. Good luck!</h3>
				</div>
				<div class="row-fluid">
					<div class="textSampleWrapper">
						<div class="span12">
							<h5>Text sample</h5>
							<p>
								<?php echo $this->_tpl_vars['sample_text']; ?>

							</p>
						</div>	
						<div class="requiredWordsList">
							<dl>
								<dt>Mandatory Words:</dt>
								<?php if ($this->_tpl_vars['mandatory_tokens'] | @ count > 0): ?>
									<?php $_from = $this->_tpl_vars['mandatory_tokens']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['token'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['token']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['token']):
        $this->_foreach['token']['iteration']++;
?>
										<dd><span class="label"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['token'])) ? $this->_run_mod_handler('urldecode', true, $_tmp) : urldecode($_tmp)))) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
</span></dd>
									<?php endforeach; endif; unset($_from); ?>
								<?php endif; ?>								
							</dl>
							<dl>
								<dt>Optional Words:</dt>
								<?php if ($this->_tpl_vars['optional_tokens'] | @ count > 0): ?>
									<?php $_from = $this->_tpl_vars['optional_tokens']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['token'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['token']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['token']):
        $this->_foreach['token']['iteration']++;
?>
										<dd><span class="label"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['token'])) ? $this->_run_mod_handler('urldecode', true, $_tmp) : urldecode($_tmp)))) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
</span></dd>
									<?php endforeach; endif; unset($_from); ?>
								<?php endif; ?>
							</dl>
						</div>					
					</div>
				</div>
				<div class="row-fluid">				
					<form name="stencil-form" id="stencil-form-upload" action="" method="POST">
						<div class="stencilTableWrapper">						
							<table class="table">							
								<tbody>
									<?php if ($this->_tpl_vars['stencilsDetails'] | @ count > 0): ?>
										<?php $_from = $this->_tpl_vars['stencilsDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['stencil'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['stencil']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['stencil']):
        $this->_foreach['stencil']['iteration']++;
?>
											<?php $this->assign('text_index', ($this->_foreach['stencil']['iteration']-1)+1); ?>
											<tr>
												<td class="stencilNum"><span><?php echo $this->_tpl_vars['text_index']; ?>
</span></td>
												<td class="stencilTextArea ">
													<textarea  name="stencil_text[]" id="stencil_text_<?php echo $this->_tpl_vars['text_index']; ?>
" rows="3" onkeyup="auto_grow(this)"><?php echo $this->_tpl_vars['stencil']; ?>
</textarea>
													<span class="wordCount"></span>
													<p class="missingToken"></p>
													<p class="duplicateContentAlert"></p>
													<a href="" class="duplicateShowCTA" target="_blank" style="display:none">See version with plagirism	</a>
													<div class="duplicateShowContent"></div>
												</td>
											</tr>	
										<?php endforeach; endif; unset($_from); ?>
									
									<?php else: ?>
										<tr><td colspan="4"></td></tr>
									<?php endif; ?>	
									<tr>
										<td colspan="4">
											<span class="span12 error" id="plag_error"></span>
										</td>
									</tr>
								</tbody>
							</table>					
						</div>
						<!-- call to action set -->
						<div class="pull-center">
							<div class="btn-group">
								<?php if ($this->_tpl_vars['article']['status'] == 'bid' || $this->_tpl_vars['article']['status'] == 'disapproved' || $this->_tpl_vars['article']['status'] == 'disapprove_client' || $this->_tpl_vars['article']['status'] == 'time_out'): ?>
									<button href="/contrib/ask-more-time?ao_type=<?php echo $this->_tpl_vars['article']['ao_type']; ?>
&article_id=<?php echo $this->_tpl_vars['article']['article_id']; ?>
" role="button" data-toggle="modal" data-target="#moretime-ajax" class="btn" rel="tooltip" data-original-title="Demander un d&eacute;lai suppl&eacute;mentaire"><i class="icon-time"></i><sup>+</sup> Demander un d&eacute;lai suppl&eacute;mentaire</button>
								<?php endif; ?>	
								<a data-original-title="Aide" rel="tooltip" class="btn" href="/contrib/compose-mail?senduser=111201092609847"><i class="icon-question-sign"></i> Aide</a>
							</div>	
							
							<?php if ($this->_tpl_vars['article']['status'] == 'bid' || $this->_tpl_vars['article']['status'] == 'disapproved' || $this->_tpl_vars['article']['status'] == 'disapprove_client'): ?>
								<button type="button" class="btn btn-success" name="submit_article" id="submit_article" data-loading-text="Checking plagiarism..." >Envoyer</button>
								<input type="hidden" name="participation_id" value="<?php echo $this->_tpl_vars['participation_id']; ?>
" id="send_participate_id">
								<input type="hidden" name="clientId" value="<?php echo $this->_tpl_vars['clientId']; ?>
" id="clientId">
								<input type="hidden" name="article_id" value="<?php echo $_GET['article_id']; ?>
">
							<?php endif; ?>
						</div>						
					</form>
				</div>	
			</section>	
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Contrib/article-comments.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		</div>
		<div class="span3">
		<!--  right column  -->
			<aside>
				<div class="aside-bg">
					<div class="editor-price">
						<p class="quote-price">Royalties :<strong><?php if ($this->_tpl_vars['article']['free_article'] == 'yes'): ?>&nbsp;GRATUIT<?php else: ?>&nbsp; <?php echo ((is_array($_tmp=$this->_tpl_vars['article']['price_user'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &euro;<?php endif; ?></strong></p>
						<?php if ($this->_tpl_vars['article']['ao_type'] != 'premium'): ?>
							<ul class="unstyled stripe">
								<li>Commission Edit-place inclus : <?php echo $this->_tpl_vars['article']['ep_commission']; ?>
%</li>
								<li>  Prix total r&eacute;gl&eacute; par le client : <?php echo ((is_array($_tmp=$this->_tpl_vars['article']['final_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &euro;</li>
							</ul>
						<?php endif; ?>	
					</div> 
					<div id="selected-editor" class="aside-block">
						<div class="editor-container">
							<h4>Votre client</h4>
							<img src="<?php echo $this->_tpl_vars['article']['client_pic']; ?>
" title="<?php echo $this->_tpl_vars['article']['company_name']; ?>
">
							<p class="editor-name"><?php echo $this->_tpl_vars['article']['company_name']; ?>
</p>
							<?php if ($this->_tpl_vars['article']['ao_type'] == 'premium'): ?>
								<a href="/contrib/compose-mail?senduser=110923143523902" class="btn btn-small">Contactez-nous</a>
							<?php else: ?>
								<p>Tel : <?php echo $this->_tpl_vars['article']['phone_number']; ?>
</p> 
								<!--<a href="/contrib/compose-mail?senduser=<?php echo $this->_tpl_vars['article']['article_id']; ?>
" class="btn btn-small">Envoyer un message</a>-->
								<p>Email : <?php echo $this->_tpl_vars['article']['email']; ?>
</p> 
							<?php endif; ?>	
						</div>
					</div>
					<?php if ($this->_tpl_vars['article']['ao_type'] != 'premium'): ?>
					<div class="aside-block" id="liberte-guide" style="margin-top: 40px">
						<h4>Guide du r&eacute;dacteur</h4>
						<div class="pull-center inc"><span class="label label-quote">mission liberte</span></div>
						<p><strong>Avant de d&eacute;marrer... </strong></p>
						<ul>
							<li>Contactez le client par email ou t&eacute;l&eacute;phone d&egrave;s que vous &ecirc;tes s&eacute;lectionn&eacute;(e).     </li>
							<li>Demandez une confirmation du brief, du timing de rendu et du nombre d&rsquo;articles.</li>
						</ul>
						<p><strong>Une fois les articles r&eacute;dig&eacute;s...</strong></p>
						<ul>
							<li>T&eacute;l&eacute;chargez les &eacute;l&eacute;ments sur la plateforme.</li>
							<li>N'envoyez jamais votre travail complet par email au client.</li>
						</ul>
						<hr>
						<p class="pull-center"><a href="/contrib/download-file?type=guide_mission_liberte" class="btn btn-small"><i class="icon-download"></i> T&eacute;l&eacute;charger le guide complet</a></p>
					</div>
					<?php endif; ?>
					<div class="aside-block" id="garantee">
						<h4>Vos garanties</h4>
						<dl>
							<dt><span class="umbrella"></span>edit-place est votre m&eacute;diateur</dt>
							<dd>En cas de contestation (d&eacute;lai de livraison, reprise d&rsquo;articles, remboursement...)</dd>
							<dt><span class="locked"></span>Paiement s&eacute;curis&eacute;</dt>
							<dd>Notre solution de paiement en ligne vous garantit une transaction en toute tranquillit&eacute;</dd>
						</dl>
					</div>
				</div>
			</aside>  
		</div>
	</div>
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>	
</div>
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['livesite']; ?>
/FO/css/common/bootstrap-wysihtml5.css"></link>

<script src="<?php echo $this->_tpl_vars['livesite']; ?>
/FO/script/common/wysihtml5-0.3.0.min.js"></script>
<script src="<?php echo $this->_tpl_vars['livesite']; ?>
/FO/script/common/bootstrap-wysihtml5.js"></script> 
<script src="<?php echo $this->_tpl_vars['livesite']; ?>
/FO/script/common/locales/bootstrap-wysihtml5.fr-FR.js"></script>
<?php echo '
<script type="text/javascript">
	var cur_date='; ?>
<?php echo time(); ?>
<?php echo ';
	var js_date=(new Date().getTime())/ 1000;
	var diff_date=Math.floor(js_date-cur_date);
	$("#menu_ongoing").addClass("active");
	startMissionTimer(\'dtime\',\'dtext\');
	
	/*Ebookers stencils validations*/
	
	function auto_grow(element) {
		//alert(element.scrollHeight)
		if(element.scrollHeight > 85)
		{
			element.style.height = "100px";
			element.style.height = (element.scrollHeight)+"px";
			
		}	
	}
	
	function wordCount( val ){
		return {
			charactersNoSpaces : val.replace(/\\\\s+/g, \'\').length,
			characters         : val.length,
			words              : val.match(/\\\\S+/g).length,
			lines              : val.split(/\\\\r*\\n/).length
		}
	}
	
	$(function(){	
		
		/*auto resize of textarea onload*/
		$("[id^=stencil_text_]" ).each(function(u) {
			auto_grow(this);
			if($(this).val())
			{
				var c = wordCount($(this).val());				
				$(this).next(\'.wordCount\').html(c.words +\' Words\');
			}	
		});
		
		var load_img=\'<img src="/FO/images/loading-b.gif">\';
		
		
		var error=0;
		var scrollTop=0;
		
		var tokensArray = '; ?>
<?php echo $this->_tpl_vars['js_tokens_array']; ?>
<?php echo ';
		
		/*add validation only in bid,disaaproved status*/		
		'; ?>

			<?php if ($this->_tpl_vars['article']['status'] == 'bid' || $this->_tpl_vars['article']['status'] == 'disapproved' || $this->_tpl_vars['article']['status'] == 'disapprove_client'): ?>
		<?php echo '
			/*bind focus*/
			$("[id^=stencil_text_]" ).bind(\'focus\',function(u) {
				//$(this).parent().parent().removeAttr("class");
				$(this).parent().parent().addClass(\'isEdited\');				
			});	
			
			/*calculate word count on keyup*/
			$("[id^=stencil_text_]").on(\'input\', function(){				
				var c = wordCount($(this).val());				
				$(this).next(\'.wordCount\').html(c.words +\' Words\');
			});	
			
			/*text validation on blur*/
			$("[id^=stencil_text_]" ).bind(\'blur\',function(u) {
				var stencil_text=$(this).val();			
				stencil_text=stencil_text.replace(/\\\\t/gi,\' \');			
				stencil_text = stencil_text.replace(/ +(?= )/g,\' \');
				stencil_text=stencil_text.replace(/(\\\\r\\\\n|\\\\n|\\\\r)/gm," ");
				stencil_text=encodeURI(stencil_text);
				stencil_text=stencil_text.replace(\'%E2%80%99\',"\'");
				stencil_text=decodeURI(stencil_text);
				stencil_text=$.trim(stencil_text);
				$(this).val(stencil_text);
				if(stencil_text==\'\')
				{
					$(this).parent().parent().removeAttr("class");
					$(this).parent().parent().addClass(\'stencilError\');
					error=error+1;
					if(scrollTop==0)
						scrollTop=$(this).offset().top;
				}
				else{
					var missing_words=[];
					var check_text=stencil_text.replace(/[\\.\\,]/g,\' \');
					var encodeText=encodeURI(check_text);					
					//alert(encodeText);
					var stringArray=encodeText.split(\'%20\');//converting string to Array			
					//checking Token exists in the text or not
					if(tokensArray.length>0)
					{
						$.each( tokensArray, function( key, token ) {
							//alert(decodeURI(token))
							if ($.inArray(token,stringArray)== -1)
							{
								missing_words.push(\'<span>\'+decodeURI(token)+\'</span>\');
								//alert(missing_words.length);
							}
						});
						
					}
					
					if(missing_words.length>0){
						$(this).parent().parent().removeAttr("class");
						$(this).parent().parent().addClass(\'stencilError\');						
						var missing_text=\'Missing term: \'+missing_words;
						$(this).nextAll(\'.missingToken\').html(missing_text);
						
						$(this).nextAll(\'.duplicateContentAlert\').html(\'\');
						$(this).nextAll(\'.duplicateShowContent\').html(\'\');
						$(this).nextAll(\'.duplicateShowCTA\').hide();
						
						if(scrollTop==0)
							scrollTop=$(this).offset().top;					

						error=error+1;	
					}
					else{
						$(this).parent().parent().removeAttr("class");
						$(this).parent().parent().addClass(\'isValidated\');						
						$(this).nextAll(\'.missingToken\').html(\'\');
						$(this).nextAll(\'.duplicateContentAlert\').html(\'\');
						$(this).nextAll(\'.duplicateShowContent\').html(\'\');
						$(this).nextAll(\'.duplicateShowCTA\').hide();
					}
					
				}
			});	
			
			$("#submit_article").click(function(e){			
				
				var btn = $(this);
				
				error=0;
				scrollTop=0;
				$("[id^=stencil_text_]" ).each(function(u) {
					var stencil_text=$(this).val();	
					$(this).blur();				
				});
				//alert(scrollTop);
				if(scrollTop)
				{
					$(\'html, body\').animate({
						scrollTop: scrollTop
					}, 500);
				}
				//alert(error);
				if(error==0)
				{						
					btn.button(\'loading\');
					btn.html(\'Checking plagiarism \'+load_img);
					
					$("#stencilModal").modal(\'show\');
					
					
					var targerURL=\'/ebooker/check-stencil-plagarism\';
					var stencilData=$(\'#stencil-form-upload\').serialize();
					
					//alert(stencilData);
					
					$.post(targerURL,stencilData,function(result){
						
						var output=$.parseJSON(result);
						var plag_error_count=0;
						var positionTop=0;
						//console.log(output);
						if(output.status==\'plag_error\')
						{
							plag_error_count=plag_error_count+1;
														
							$("#plag_error").html(output.error_msg);
							$("#plag_error").show();
						}
						else
						{
							$("#plag_error").html(\'\');
							$("#plag_error").hide();
							
							$.each(output,function(i,stencil){							
								
								var stencild_id=$("#stencil_text_"+i);
								var plagarised_text=\'<p>\'+stencil.text+\'</p>\';
								var matched_version=stencil.version;
								var plagarised=stencil.plagarised;
								
								stencild_id.nextAll(\'.duplicateShowCTA\').hide(); //hide plag URL by default
								
								if(plagarised==\'yes\')
								{
									var missing_text=\'\';
									stencild_id.parent().parent().removeAttr("class");
									stencild_id.parent().parent().addClass(\'duplicateContent\');	
									
									
									
									if(matched_version==\'db\')								
										missing_text=\'<label>We found plaginarism with Internal DB :</label> \'+plagarised_text;
									else if(matched_version==\'web\')	
									{
										plagarised_url=stencil.url;	
										
										stencild_id.nextAll(\'.duplicateShowCTA\').show();
										stencild_id.nextAll(\'.duplicateShowCTA\').attr(\'href\',plagarised_url);
										
										missing_text=\'<label>We found plaginarism with this version :</label> \'+plagarised_text;
										
									}	
									else
										missing_text=\'<label>We found plaginarism with version\'+matched_version+\' :</label> \'+plagarised_text;
									
									
									stencild_id.nextAll(\'.duplicateContentAlert\').html(\'We cannot validate this version as it is considered as a duplicate one. Please modify it\');
									stencild_id.nextAll(\'.duplicateShowContent\').html(missing_text);
									
									
									plag_error_count=plag_error_count+1;
									
									if(positionTop==0)
										positionTop=stencild_id.offset().top;	
								}
								else{
									stencild_id.parent().parent().removeAttr("class");
									stencild_id.parent().parent().addClass(\'isValidated\');						
									stencild_id.nextAll(\'.missingToken\').html(\'\');
									stencild_id.nextAll(\'.duplicateContentAlert\').html(\'\');
									stencild_id.nextAll(\'.duplicateShowContent\').html(\'\');
								}
								
							});
						}	
						
						if(positionTop)
						{
							$(\'html, body\').animate({
								scrollTop: positionTop
							}, 500);
						}
						error=plag_error_count;
						//console.log(error);
						$("#submit_article").button(\'reset\');
						$("#stencilModal").modal(\'hide\');
						
						if(error==0)
							$(\'#stencil-form-upload\').attr(\'action\',\'/ebooker/send-stencils\').trigger(\'submit\');
					});
				}
				
				
			});	
		'; ?>
			
			<?php endif; ?>			
		<?php echo '			
	}); 
	
</script>
'; ?>

<div id = "confirmDiv"></div>
<div id="moretime-ajax" class="modal container hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h3 id="myModalLabel">Demande de d&eacute;lai suppl&eacute;mentaire</h3>
</div>
<div class="modal-body">
</div>
</div>
<!--///show loading time for file uploading ///-->
<div id="stencilModal" class="modal hide fade" tabindex="-1" >
    <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h3 id="myModalLabel">&nbsp;</h3>
       </div>
       <div class="modal-body">
			
				<h3>Thank you for submiting your stencils</h3>
				<p>
					We are currently checking your texts,  please don't leave the page this might take several minutes.
				</p>
				<span class="epSpiner">
					<img src="/FO/images/ep-spinner.gif" alt="">
					<p class="spinerState">
						Checking files
					</p>
				</span>
				<span class="stencilCheckSuccess" style="display:none">
					<img src="/FO/images/success-icon.png" alt="">
					<p class="modalMessage">
						All your stencils have been aproved. Thank you !
					</p>
				</span>
				<span class="stencilCheckError" style="display:none">
					<img src="/FO/images/error-icon.png" alt="">
					<p class="modalMessage">
						Some stencils can't be validated, please check again and update the results
					</p>
				</span>			
       </div>
       <div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
       </div>
</div>
<?php echo '
<script>
    $(\'#reload\').click(function() {
        location.reload();
    });
    $(\'#blackclose\').click(function() {
        location.reload();
    });
</script>
'; ?>