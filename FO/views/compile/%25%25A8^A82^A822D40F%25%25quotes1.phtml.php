<?php /* Smarty version 2.6.19, created on 2015-07-29 13:15:44
         compiled from Client/quotes1.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Client/quotes1.phtml', 343, false),)), $this); ?>
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
				$("#quotes1form").validate({
					//onkeyup: true,
					//onfocusout: false,
					highlight: function(element) {
						$(element).closest(\'span\').addClass("f_error");
					},
					unhighlight: function(element) {
						$(element).closest(\'span\').removeClass("f_error");
					},
				
					rules: {
						con_type:  "required",
						\'quotetype[]\': "required", 
						textforother:{
							required: function(element){
									return $("input[id=\'quotetype-other\']:checked").val()=="other";
								}
							},
						objectives: "required", 	
						
					},
					messages: {
						con_type: "Merci d\'effectuer un choix",
						\'quotetype[]\': "Choisissez le type de devis",
						textforother:"Merci de pr&eacute;ciser",
						objectives:"Merci de pr&eacute;ciser"
					},
					debug:true,
					submitHandler: function(form) { 
					var errornum=0;
					var langerr=0;
					
						if($("input[name=\'dontknowcheck\']:checked").val()!="1")
						{
							$("[id^=articlenum_]" ).each(function(z) {
							var idname="#"+this.id;
							var idtype=this.id.split("_");
								if($(idname).val()=="" || $(idname).val()<0)
									errornum++;
							});
						}
						//Translation language
						if($("input[name=\'con_type\']:checked").val()=="translation")	
						{
							if($("#translation_from").val()==$("#translation_to").val())
								langerr++;
						}
						
						if(errornum>0 || langerr>0)
						{
							if(errornum>0)
								$("#quotenum").html("Ins&eacute;rer le nombre d\'articles");  
							else
								$("#quotenum").html("");  
								
							if(langerr>0)
								$("#translang").html("Les langues source et de destination doivent &ecirc;tre diff&eacute;rentes");  
							else
								$("#translang").html("");  
						}
						else
						{
							$("#quotenum").html("");
							$("#translang").html("");
							//if($("#profilecomplete").val()=="yes")
							//{
								var formData = $(\'#quotes1form\').serialize();
								$.ajax({
									type : \'POST\', 
									url : \'/client/confirmpremium\', 
									data : formData,
									   
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
							//}
							//else
								//form.submit();
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
			
		function addarticleblock(typ)
		{ 
			var values = $(\'input:checkbox:checked.group1\').map(function () {
				  return this.value;
				}).get(); 
			var num=values.length;	
				var placehtext="";
				if(typ=="seo")
					placehtext="Nombre d\'articles SEO souhaités";
				else if(typ=="desc")
					placehtext="Nombre de descriptifs produit souhaités";
				else if(typ=="blog")
					placehtext="Nombre d\'articles de blog souhaités";
				else if(typ=="news")
					placehtext="Nombre de news souhaitées";
				else if(typ=="guide")
					placehtext="Nombre de guides souhaités";
				else if(typ=="other")
					placehtext="Nombre d\'articles souhaités";
					
				var clonedqu=$("#checkblock");
				$("#articleblock_0").clone().attr(\'id\', \'articleblock_\'+(typ) ).insertBefore(clonedqu);	
				$(\'#articleblock_\'+typ).show();	
				
					$(\'#articleblock_\'+typ+\' input[id="articlenum"]\').attr(\'name\',\'articlenum[\'+(typ)+\']\');	
					$(\'#articleblock_\'+typ+\' input[id="articlenum"]\').attr(\'placeholder\',placehtext);	
				$(\'#articleblock_\'+typ+\' input[id="articlenum"]\').attr(\'id\',\'articlenum_\'+typ);	
					$(\'#articleblock_\'+typ+\' select[id="frequency"]\').attr(\'name\',\'frequency[\'+(typ)+\']\');	
				$(\'#articleblock_\'+typ+\' select[id="frequency"]\').attr(\'id\',\'frequency_\'+typ);	
				if($("input[name=\'dontknowcheck\']:checked").val()=="1")
				{
					$(\'#articleblock_\'+typ+\' input[id=articlenum_\'+typ+\']\').attr(\'disabled\',true);	
					$(\'#articleblock_\'+typ+\' select[id=frequency_\'+typ+\']\').attr(\'disabled\',true);	  
				}
		}
		
		function removearticleblock(typ)
		{
			var values = $(\'input:checkbox:checked.group1\').map(function () {
				  return this.value;
				}).get(); 
			var num=values.length;	  
			$(\'#articleblock_\'+typ).remove();	
		}
				
		function switchcontenttype(wlang)
		{
			if($("input[name=\'con_type\']:checked").val()=="writing")
			{
			if(wlang=="fr")
				$(\'form#quotes1form\').get(0).setAttribute(\'action\',\'/client/quotes2liberte\'); 
			else
				$(\'form#quotes1form\').get(0).setAttribute(\'action\',\'/client/quotes-2\'); 
			}
		}
		
		function dismissmodal()
		{
			$("#confirm-premium").removeClass("in");
			$("#confirm-premium").hide();
			$("#fadeblock").removeClass("modal-backdrop fade in");
			$("#fadeblock").hide();
			$(\'body\').removeClass("modal-open");
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
		.error { color: red !important; font-size:16px !important;font-weight:bold !important;}
		.f_error {  border-color: rgb(185, 74, 72); color: rgb(185, 74, 72);}
	</style>
'; ?>



<section class="quoteform" id="step1">

	<form action="/client/quotes-2" method="POST" id="quotes1form" name="quotes1form" novalidate>
		<input type="hidden" name="article" id="article" value="<?php echo $_GET['article']; ?>
" />
		<div class="container padding">  
			<?php if ($this->_tpl_vars['usertype'] != 'contributor'): ?>
			<div class="center-block">
				<h2>Définissez vos besoins  pour obtenir le meilleur tarif</h2>
			</div>

			<div class="row wanted-product">
				<div class="col-xs-6 col-md-6 dashit">   
					<div class="center-block">
						<input type="radio" name="con_type" id="writing" value="writing" <?php if ($this->_tpl_vars['con_type'] == 'writing'): ?>checked<?php endif; ?>/> 
						<label for="writing">Je veux du <strong>contenu</strong></label>
						<select class="selectpicker" name="writing_lang" id="writing_lang">
							<?php $_from = $this->_tpl_vars['lang_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lang_key'] => $this->_tpl_vars['lang_item']):
?>
								<option value="<?php echo $this->_tpl_vars['lang_key']; ?>
" <?php if ($this->_tpl_vars['writing_lang'] == $this->_tpl_vars['lang_key']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['lang_item']; ?>
</option>
							<?php endforeach; endif; unset($_from); ?>
						</select>
					</div>
				</div>
				<div class="col-xs-6 col-md-6">
					<div class="center-block">
						<input type="radio" name="con_type" id="translation" value="translation" <?php if ($this->_tpl_vars['con_type'] == 'translation'): ?>checked<?php endif; ?>/> 
						<label for="translation"> Je veux qu'on <strong>traduise</strong> mon contenu</label>
						<select class="selectpicker" name="translation_from" id="translation_from">
							<?php $_from = $this->_tpl_vars['lang_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lang_key'] => $this->_tpl_vars['lang_item']):
?>
								<option value="<?php echo $this->_tpl_vars['lang_key']; ?>
" <?php if ($this->_tpl_vars['translation_from'] == $this->_tpl_vars['lang_key']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['lang_item']; ?>
</option>
							<?php endforeach; endif; unset($_from); ?>
						</select>
						<span class="glyphicon glyphicon-arrow-right"></span>
						<select class="selectpicker" name="translation_to" id="translation_to">
							<?php $_from = $this->_tpl_vars['lang_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['lang_key'] => $this->_tpl_vars['lang_item']):
?>
								<option value="<?php echo $this->_tpl_vars['lang_key']; ?>
" <?php if ($this->_tpl_vars['translation_to'] == $this->_tpl_vars['lang_key']): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['lang_item']; ?>
</option>
							<?php endforeach; endif; unset($_from); ?>
						</select>
					</div>
					<div class="error" id="translang"></div> 
				</div>
				<label class="error" for="con_type" style="padding-left:182px" generated="true"></label>
			</div>     

			<div id="ctype" class="formfocus">   
				<fieldset class="dashit">  
					<legend class="form-group">Mon type de contenu <small>Cochez parmi ces types, ceux à créer ou traduire</small></legend>
						<div class="ctype"> 
							<div class="col-xs-6 col-md-4">
								<div class="center-block">
									<label for="ctype-seo">
										<div class="ctype-block">
											<img src="/FO/images/imageB3/ctype-seo.png" width="50" height="50"><br>Article seo
											<span class="wcount">130 mots</span>
											<input type="checkbox" name="quotetype[]" id="quotetype-seo" value="seo" class="group1" <?php if (in_array ( 'seo' , $this->_tpl_vars['quotetype'] )): ?>checked<?php endif; ?>/>
										</div>
									</label>
								</div>
							</div>  

							<div class="col-xs-6 col-md-4">
								<div class="center-block">
									<label for="ctype-desc">
										<div class="ctype-block">
											<img src="/FO/images/imageB3/ctype-desc.png" width="50" height="50"><br>
											Descriptifs produit
											<span class="wcount">80 mots</span>
											<input type="checkbox" name="quotetype[]" id="quotetype-desc" value="desc" class="group1" <?php if (in_array ( 'desc' , $this->_tpl_vars['quotetype'] )): ?>checked<?php endif; ?>/>
										</div>
									</label>
								</div>
							</div>

							<div class="col-xs-6 col-md-4">
								<div class="center-block">
									<label for="ctype-blog">
										<div class="ctype-block">
											<img src="/FO/images/imageB3/ctype-blog.png" width="50" height="50"><br>
											Article de blog
											<span class="wcount">500 mots</span>
											<input type="checkbox" name="quotetype[]" id="quotetype-blog" value="blog" class="group1" <?php if (in_array ( 'blog' , $this->_tpl_vars['quotetype'] )): ?>checked<?php endif; ?>/>
										</div>
									</label>
								</div>
							</div>

							<div class="col-xs-6 col-md-4">
								<div class="center-block">
									<label for="ctype-news">
										<div class="ctype-block">
											<img src="/FO/images/imageB3/ctype-news.png" width="50" height="50"><br>
											News
											<span class="wcount">200 mots</span>
											<input type="checkbox" name="quotetype[]" id="quotetype-news" value="news" class="group1" <?php if (in_array ( 'news' , $this->_tpl_vars['quotetype'] )): ?>checked<?php endif; ?> />
										</div>
									</label>
								</div>
							</div>

							<div class="col-xs-6 col-md-4">
								<div class="center-block">
									<label for="ctype-guide">
										<div class="ctype-block">
											<img src="/FO/images/imageB3/ctype-guide.png" width="50" height="50"><br>
											Guide
											<span class="wcount">1000 mots</span>
											<input type="checkbox" name="quotetype[]" id="quotetype-guide" value="guide" class="group1" <?php if (in_array ( 'guide' , $this->_tpl_vars['quotetype'] )): ?>checked<?php endif; ?>/>
										</div>
									</label>
								</div>
							</div>

							<div class="col-xs-6 col-md-4">
								<div class="center-block">
									<label for="ctype-other">
										<div class="ctype-block">
											<img src="/FO/images/imageB3/ctype-other.png" width="50" height="50"><br>
											Autre
											<span class="wcount">-</span>
											<input type="checkbox" name="quotetype[]" id="quotetype-other" value="other" class="group1" <?php if (in_array ( 'other' , $this->_tpl_vars['quotetype'] )): ?>checked<?php endif; ?>/>
										</div>
									</label>
									<div id="textforother-block" <?php if (in_array ( 'other' , $this->_tpl_vars['quotetype'] )): ?>class="in showcollapse"<?php else: ?>class="collapse"<?php endif; ?>>
										<input type="text" class="form-control" id="textforother" name="textforother" placeholder="Veuillez préciser..." value="<?php echo $this->_tpl_vars['textforother']; ?>
">
									</div>
								</div>
							</div>
							<label class="error" for="quotetype[]" generated="true"></label>
						</div>   
				</fieldset>

				<fieldset class="dashit">
					<legend class="form-group">Nombre d'articles souhaités</legend>
					<div class="form-group" id="articleblock_0" style="display:none;"> 
						<div class="row"> 
							<div class="col-md-5">  
								<input name="articlenum" id="articlenum" placeholder="Entrer un nombre d'articles" min="1" class="form-control input-md" type="number">
							</div>
							<div class="col-md-4">
								<select id="frequency" name="frequency" class="form-control">
									<option value="once">En 1 seule fois</option>
									<option value="day">Par jour</option>
									<option value="week">Par semaine</option>
									<option value="month">Par mois</option>
								</select>
							</div>
						</div>
					</div>
					<?php if (count($this->_tpl_vars['quotetype']) > 0): ?>
						<?php unset($this->_sections['art_loop']);
$this->_sections['art_loop']['name'] = 'art_loop';
$this->_sections['art_loop']['loop'] = is_array($_loop=count($this->_tpl_vars['quotetype'])) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['art_loop']['show'] = true;
$this->_sections['art_loop']['max'] = $this->_sections['art_loop']['loop'];
$this->_sections['art_loop']['step'] = 1;
$this->_sections['art_loop']['start'] = $this->_sections['art_loop']['step'] > 0 ? 0 : $this->_sections['art_loop']['loop']-1;
if ($this->_sections['art_loop']['show']) {
    $this->_sections['art_loop']['total'] = $this->_sections['art_loop']['loop'];
    if ($this->_sections['art_loop']['total'] == 0)
        $this->_sections['art_loop']['show'] = false;
} else
    $this->_sections['art_loop']['total'] = 0;
if ($this->_sections['art_loop']['show']):

            for ($this->_sections['art_loop']['index'] = $this->_sections['art_loop']['start'], $this->_sections['art_loop']['iteration'] = 1;
                 $this->_sections['art_loop']['iteration'] <= $this->_sections['art_loop']['total'];
                 $this->_sections['art_loop']['index'] += $this->_sections['art_loop']['step'], $this->_sections['art_loop']['iteration']++):
$this->_sections['art_loop']['rownum'] = $this->_sections['art_loop']['iteration'];
$this->_sections['art_loop']['index_prev'] = $this->_sections['art_loop']['index'] - $this->_sections['art_loop']['step'];
$this->_sections['art_loop']['index_next'] = $this->_sections['art_loop']['index'] + $this->_sections['art_loop']['step'];
$this->_sections['art_loop']['first']      = ($this->_sections['art_loop']['iteration'] == 1);
$this->_sections['art_loop']['last']       = ($this->_sections['art_loop']['iteration'] == $this->_sections['art_loop']['total']);
?> 
							<?php $this->assign('sc_index', $this->_tpl_vars['quotetype'][$this->_sections['art_loop']['index']]); ?>
							<div class="form-group" id="articleblock_<?php echo $this->_tpl_vars['quotetype'][$this->_sections['art_loop']['index']]; ?>
">   
								<div class="row">  
									<div class="col-md-5">  
										<input name="articlenum[<?php echo $this->_tpl_vars['quotetype'][$this->_sections['art_loop']['index']]; ?>
]" min="1" id="articlenum_<?php echo $this->_tpl_vars['quotetype'][$this->_sections['art_loop']['index']]; ?>
" placeholder="Entrer un nombre d'articles" class="form-control input-md" type="number" value="<?php echo $this->_tpl_vars['articlenum'][$this->_tpl_vars['sc_index']]; ?>
" <?php if ($this->_tpl_vars['dontknowcheck'] == 1): ?>disabled<?php endif; ?>>
									</div>
									<div class="col-md-4">
										<select id="frequency_<?php echo $this->_tpl_vars['quotetype'][$this->_sections['art_loop']['index']]; ?>
" name="frequency[<?php echo $this->_tpl_vars['quotetype'][$this->_sections['art_loop']['index']]; ?>
]" class="form-control" <?php if ($this->_tpl_vars['dontknowcheck'] == 1): ?>disabled<?php endif; ?>>
											<option value="once" <?php if ($this->_tpl_vars['frequency'][$this->_tpl_vars['sc_index']] == 'once'): ?>selected<?php endif; ?>>En une seule fois</option>
											<option value="day" <?php if ($this->_tpl_vars['frequency'][$this->_tpl_vars['sc_index']] == 'day'): ?>selected<?php endif; ?>>Par jour</option>
											<option value="week" <?php if ($this->_tpl_vars['frequency'][$this->_tpl_vars['sc_index']] == 'week'): ?>selected<?php endif; ?>>Par semaine</option>
											<option value="month" <?php if ($this->_tpl_vars['frequency'][$this->_tpl_vars['sc_index']] == 'month'): ?>selected<?php endif; ?>>Par mois</option>
										</select>
									</div>
								</div>
							</div>
							
						<?php endfor; endif; ?>
					<?php endif; ?>
					<div class="form-group" id="checkblock">
						<div class="checkbox">
							<label for="checkboxes-0">
								<input name="dontknowcheck" id="dontknowcheck" value="1" type="checkbox" <?php if ($this->_tpl_vars['dontknowcheck'] == 1): ?>checked<?php endif; ?>>
								Je ne sais pas, je cherche juste un bon rédacteur pour mon site
							</label>
						</div>
					</div>
					<div class="error" id="quotenum"></div>
				</fieldset>

				<fieldset class="dashit">
					<legend class="form-group">Mes attentes</legend>

					<div class="form-group">
						<div class="radio">
							<label for="objectives_1">
								<input name="objectives" id="objectives_1" value="premium" type="radio" <?php if ($this->_tpl_vars['objectives'] == 'premium'): ?>checked<?php endif; ?>/>
								Je veux &ecirc;tre recontact&eacute; par Edit-place pour parler de mon projet avant publication
							</label>
						</div>
						<div class="radio">
							<label for="objectives_2">
								<input name="objectives" id="objectives_2" value="liberte" type="radio" <?php if ($this->_tpl_vars['objectives'] == 'liberte'): ?>checked<?php endif; ?>/>
								Je veux directement entrer en contact avec les r&eacute;dacteurs/traducteurs d'Edit-place
							</label>
						</div>
						<?php if ($this->_tpl_vars['clientidentifier'] != ""): ?>
						<div class="radio">
							<label for="objectives_3">
								<input name="objectives" id="objectives_3" value="liberteprivate" type="radio" <?php if ($this->_tpl_vars['objectives'] == 'liberteprivate'): ?>checked<?php endif; ?>/>
								Je veux proposer un projet &agrave; un de mes r&eacute;dacteurs/traducteurs favoris
							</label>
						</div>
						<?php endif; ?>
						<div class="radio">
							<label for="objectives_4">
								<input name="objectives" id="objectives_4" value="dontknow" type="radio" <?php if ($this->_tpl_vars['objectives'] == 'dontknow'): ?>checked<?php endif; ?>/>
								Je ne sais pas
							</label> 
						</div>
						<label class="error" for="objectives" generated="true"></label>
					</div>
				</fieldset>  
			</div>
			
			<hr>    

			<div class="center-block">
				<button class="btn btn-lg" type="button" onClick="window.location.href='/client/quotes-1?new=1';" aria-hidden="true"><strong>Annuler</strong></button>
				<button name="submitform" class="btn btn-primary btn-lg">Valider <span class="glyphicon glyphicon-chevron-right"></span></button>
			</div>
			<input type="hidden" name="clientid" id="clientid" value="<?php echo $this->_tpl_vars['clientidentifier']; ?>
"/>
			<!--<input type="hidden" name="profilecomplete" id="profilecomplete" value="<?php echo $this->_tpl_vars['profilecomplete']; ?>
"/>-->
			<input type="hidden" name="clientcategory" id="clientcategory" value="<?php echo $this->_tpl_vars['clientcategory']; ?>
"/>
			<?php else: ?>
				<div align="center"><strong>This page is available only for Clients.</strong></div>
			<?php endif; ?>
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

<!--- Relancer une mission--->
<div id="duplicatemission" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 id="myModalLabel">Relancer une mission</h3>
			</div>
			<form method="POST" class="form-horizontal" name="duplicatemissionform" id="duplicatemissionform" action="/client/quotes-1" style="margin:0px 0px;" >
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
	</div>
</div>

