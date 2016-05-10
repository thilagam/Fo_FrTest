<?php /* Smarty version 2.6.19, created on 2015-08-07 14:56:44
         compiled from Contrib/mission-article-deliver.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Contrib/mission-article-deliver.phtml', 92, false),array('modifier', 'date_format', 'Contrib/mission-article-deliver.phtml', 168, false),array('modifier', 'zero_cut', 'Contrib/mission-article-deliver.phtml', 198, false),)), $this); ?>
<?php 

ini_set('default_charset', 'UTF-8');
mb_internal_encoding('UTF-8');
 ?>

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
			<section id="a_o">
				<div class="mod">
					<div class="summary clearfix">
						<h4>D&eacute;tails du projet</h4>
						<ul class="unstyled">
							<li><strong>Appel &agrave; r&eacute;daction</strong> <span class="bullet">&#9679;</span></li>
							<li> Langue : <img class="flag flag-<?php echo $this->_tpl_vars['article']['language']; ?>
" src="/images/shim.gif"> <span class="bullet">&#9679;</span></li>
							<li>Cat&eacute;gorie : <?php echo $this->_tpl_vars['article']['category']; ?>
 <span class="bullet">&#9679;</span></li>
							<li>Nb. mots : <?php echo $this->_tpl_vars['article']['num_min']; ?>
 - <?php echo $this->_tpl_vars['article']['num_max']; ?>
 / article
							<?php if ($this->_tpl_vars['article']['spec_exists'] == 'yes'): ?>
								<li class="pull-right"><a href="/contrib/download-file?type=clientbrief&article_id=<?php echo $this->_tpl_vars['article']['article_id']; ?>
" class="btn btn-small btn-success"><i class="icon-white icon-circle-arrow-down"></i> T&eacute;l&eacute;charger le brief client</a></li>
							<?php endif; ?>	
						</ul>
					</div>
				</div>
			</section>
			<section id="file-management">				
				<div class="row-fluid file-management-cont">    
					<i class="outbox"></i><h4 class="clearfix">Votre Edit-Box</h4>	 
					<p>Ajoutez vos fichiers contenant les articles que vous avez r&eacute;alis&eacute;s pour cette mission</p>				
					<?php if ($this->_tpl_vars['article']['status'] == 'bid' || $this->_tpl_vars['article']['status'] == 'disapproved' || $this->_tpl_vars['article']['status'] == 'disapprove_client'): ?>
					<?php if ($this->_tpl_vars['clientId'] == '120218054512919v'): ?>
                    <form action="/contrib/sendarticle" method="post" enctype="multipart/form-data">
                    <div class="pull-center">
							<p>
                                <!--<span class="btn btn-primary fileinput-button">
                                    <i class="icon-plus icon-white"></i>
                                    <span id="send-status">Ajouter un fichier...</span>-->
									<input type="file" id="send-article" name="article" class="span3">
								<!--</span>-->
								<button type="submit" class="btn btn-success" name="submit_article" id="submit_article" style="display:''">Envoyer</button>
								<input type="hidden" name="participation_id" value="<?php echo $this->_tpl_vars['participation_id']; ?>
" id="send_participate_id">
                                <input type="hidden" name="clientId" value="<?php echo $this->_tpl_vars['clientId']; ?>
" id="clientId">
							</p>	
						</div>
                    </form>
                    <?php else: ?>
                        <div class="pull-center">
                            <p>
                                <span class="btn btn-primary fileinput-button">
                                    <i class="icon-plus icon-white"></i>
                                    <span id="send-status">Ajouter un fichier...</span>
                                <!--<input type="file" id="send-article" name="article">-->
                                </span>
                                <button type="button" class="btn btn-success" name="submit_article" id="submit_article" style="display:''">Envoyer</button>
                                <input type="hidden" name="participation_id" value="<?php echo $this->_tpl_vars['participation_id']; ?>
" id="send_participate_id">
                                <input type="hidden" name="clientId" value="<?php echo $this->_tpl_vars['clientId']; ?>
" id="clientId">
                            </p>
                        </div>
                    <?php endif; ?>
                    <?php endif; ?>
					
					<table style="margin-left: 4%" class="table mod span11 offset1">
						<thead>
						<tr>
							<th class="span6">Fichier</th>
							<th class="span4" style="text-align:center">Date</th>
							<th class="span2">Poids</th>
						</tr>
						</thead>
						<tbody>
							<?php if ($this->_tpl_vars['AllVersionArticles'] | @ count > 0): ?>
								<?php $_from = $this->_tpl_vars['AllVersionArticles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['articledetails'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['articledetails']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['versionarticle']):
        $this->_foreach['articledetails']['iteration']++;
?>
									<tr><td class="span8"><i class="icon-download"></i> <a href="/contrib/download-version-article?processid=<?php echo $this->_tpl_vars['versionarticle']['id']; ?>
"><?php echo $this->_tpl_vars['versionarticle']['article_name']; ?>
</a></td>
									<td class="span4 muted" style="text-align:center"><?php echo ((is_array($_tmp=$this->_tpl_vars['versionarticle']['article_sent_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M")); ?>
</td>
									<td class="span2 muted"><?php echo $this->_tpl_vars['versionarticle']['file_size']; ?>
</td></tr>
								<?php endforeach; endif; unset($_from); ?>
							
							<?php else: ?>
								<tr><td colspan="4"></td></tr>
							<?php endif; ?>	
						</tbody>
					</table>

					
					<!-- call to action set -->
					<div class="pull-center btn-group">
						<?php if ($this->_tpl_vars['article']['status'] == 'bid' || $this->_tpl_vars['article']['status'] == 'disapproved' || $this->_tpl_vars['article']['status'] == 'disapprove_client' || $this->_tpl_vars['article']['status'] == 'time_out'): ?>
							<button href="/contrib/ask-more-time?ao_type=<?php echo $this->_tpl_vars['article']['ao_type']; ?>
&article_id=<?php echo $this->_tpl_vars['article']['article_id']; ?>
" role="button" data-toggle="modal" data-target="#moretime-ajax" class="btn" rel="tooltip" data-original-title="Demander un d&eacute;lai suppl&eacute;mentaire"><i class="icon-time"></i><sup>+</sup> Demander un d&eacute;lai suppl&eacute;mentaire</button>
						<?php endif; ?>	
						<a data-original-title="Aide" rel="tooltip" class="btn" href="/contrib/compose-mail?senduser=111201092609847"><i class="icon-question-sign"></i> Aide</a>
					</div>
					
							
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
/**article uploading**/
$(function(){
		var btnUpload=$(\'.fileinput-button\');
		var status=$(\'#send-status\');
		var participation_id=$(\'#send_participate_id\').val();
        var client_id=$(\'#clientId\').val();
        var blwlcheck=$(\'#blwlcheck\').val();
	var uploader=new AjaxUpload(btnUpload, {
			action: \'sendarticle\',
			name: \'send_article\',
			data:{participation_id:participation_id, clientId:client_id},
			autoSubmit: false,
            contentType: "application/x-www-form-urlencoded;charset=UTF8",

        onChange: function(file, ext){ //alert(ext);
                if($(\'#clientId\').val() == \'120218054512919\')  //150128182032170- venere test id
                {
                if(ext == \'docx\' || ext == \'zip\' || ext == \'rar\'){ //alert(\'hey\');

                    $("#submit_article").show();
                }
                    else {
                        status.html(\'seuls les fichiers docx,zip,rar sont accept&eacute;s\').css({
                            \'color\': \'#fff\',
                            "background": "none repeat scroll 0 0 #f47d31",
                            "border-radius": "10px",
                            "padding": "4px"
                        });
                    return false;
                }
                }else{
                    if (! (ext && /^(doc|docx|pdf|xls|xlsx|zip|rar)$/.test(ext))){
                    // extension is not allowed 
                        status.html(\'seuls les fichiers doc,docx,xls,xlsx,pdf,zip,rar sont accept&eacute;s\').css({\'color\':\'#fff\',"background": "none repeat scroll 0 0 #f47d31","border-radius":"10px","padding": "4px"});
					return false;
				}
                    else
                    {
                        $("#submit_article").show();

                    }
                }
                status.html(\'<img src="/FO/images/icon-generic.gif" /> \'+file);
			},
			onComplete: function(file, response){   //alert(response);
				//On completion clear the status
                status.html(\'<img src="/FO/images/icon-generic.gif" /> Chargement..\');
				//alert(response);
				var patt=/not readable/g;
				var result=patt.test(response);

                if(result)
				{
                    status.text(\'Lecture de votre fichier impossible\').css({\'color\':\'#fff\',"background": "none repeat scroll 0 0 #f47d31","border-radius":"10px","padding": "4px"});
				}
				else
				{
                    $("#loading").modal(\'hide\');
                    //alert(response);
                    //console.log(response);
                   // window.my_json_res = response;
                    /*var obj = $.parseJSON(response);
                   // var obj = decodeURIComponent($.parseJSON(response));
                    if(obj.status=="blwlerror"){ alert(\'hey\');
                        //bootbox.alert("Your file is not meeting the client\'s requirement "+res[0],function() {
                          //  location.reload();
                        //});
                        alert("hello");
                        $(\'#wlblresult .modal-body\').html(decodeURIComponent(obj.result));
                        $("#wlblresult").modal(\'show\');
                    }
                    else {
                        //status.text(\'File already sent for this article\').css({\'color\':\'#fff\',"background": "none repeat scroll 0 0 #f47d31","border-radius":"10px","padding": "4px"});
                      //  location.reload();
                    }*/

					var obj = $.parseJSON(response); //alert(response);
					if(obj.status=="success"){
						location.reload();					
					}
					else if(obj.status=="file_sent"){
						//status.text(\'File already sent for this article\').css({\'color\':\'#fff\',"background": "none repeat scroll 0 0 #f47d31","border-radius":"10px","padding": "4px"});	
						location.reload();						
					}
                    else if(obj.status=="blwlerror"){
                         $(\'#wlblresult\').html(decodeURIComponent(obj.result));
                         $("#wlblresult").modal(\'show\');
                    }
                    else if(obj.status=="blwlerrormessage"){
                        //status.html(\'your zip or rar file should only contain .doc files (not .docx)\').css({\'color\':\'#fff\',"background": "none repeat scroll 0 0 #f47d31","border-radius":"10px","padding": "4px"});
                        $("#wlblalert").modal(\'show\');
                        $("#wlblalert .modal-body").html("Votre archive zip/rar ne doit contenir que des fichiers .docx");
                        return false;
                    }
                    else if(obj.status=="docerrormessage"){
                        $("#wlblalert").modal(\'show\');
                        if(obj.result == \'multi\')
                            $("#wlblalert .modal-body").html("Votre archive zip/rar ne doit contenir que des fichiers .docx. Sauvegardez vos fichiers dans le format requis et les transf&eacute;rer de nouveau.");
                        else
                            $("#wlblalert .modal-body").html("Votre fichier n\'a pas &eacute;t&eacute; sauvegard&eacute; au format .docx. Merci de sauvegarder votre fichier dans le format requis.");
                        //bootbox.alert("Your file(s) have not been saved in .doc. Please saved your file(s) with the good extension and reupload.");
                        //status.html(\'<img src="/images/icon-generic.gif" /> \'+file);
                        return false;
                    }
                    else{
                       // location.reload();
						windows.location="/contrib/ongoing";
					}
				}	
			}
		});	

	$("#submit_article").click(function(e){
        if($(\'#clientId\').val() == \'120218054512919\')  //150128182032170- venere test id
        {
            $("#loading").modal(\'show\');
            $(\'html,body\').animate({ scrollTop: 10 }, \'slow\');
        }
		uploader.submit();

	});
		
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
<div id="loading" class="modal hide fade" tabindex="-1" >
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 >Analyse du fichier en cours</h3>
    </div>
    <div class="modal-body">
        <h3>Transfert en cours...
            <img src="/FO/images/progressbar.gif"></h3>
    </div>

</div>

<!--///show loading time for file uploading ///-->
<div id="wlblresult" class="modal container hide fade" tabindex="-1" >


</div>

<div id="wlblalert" class="modal hide fade" tabindex="-1" >
    <div class="modal-header">
        <button type="button" id="close" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3>Alerte</h3>
    </div>
    <div class="modal-body">

    </div>
    <div class="form-group pull-center">

    </div>
    <div class="span1" style="height:5px;"></div>
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

