<?php /* Smarty version 2.6.19, created on 2014-09-19 10:02:17
         compiled from Client/aovalidate.phtml */ ?>
<?php echo '
<script language="javascript" src="/FO/script/common/fileinput.jquery.js"></script>
<script language="javascript" src="/FO/script/common/ajaxupload.js"></script>
<script>
	$(document).ready(function(){
		var working = false;
		$(\'#addCommentForm\').submit(function(e){
			e.preventDefault();
			if(working) return false;
		
			if($(\'#commentclient\').val()=="")
			{
				$(\'#commentclient\').css("border-color","#FF0000");
			}
			else
			{
				$(\'#commentclient\').css("border-color","");
				$.post(\'/suivi-de-commande/submitaocomment\',$(this).serialize(),function(msg){ //alert(msg);
					if(msg==\'yes\')
					{
						alert(\'Commentaire soumis avec succès !\');
						$(\'#commentclient\').val("");
						$("#ao_comment").removeClass("in");	
						$("#comment_valid").html("Merci pour votre commentaire, celui-ci a &eacute;t&eacute; soumis avec succ&egrave;s. Edit-place reviendra vers vous au plus vite.");							
					}
				});
			}
		});
	});
	
	function publishao(art,part,act)
	{
		if(act=="approve")
		{
			$("#refusemailblock").hide();
			var target_page = "/suivi-de-commande/publishaoclient?article_id="+art+"&part_id="+part+"&action="+act;

				$.post(target_page, function(data){  // alert(data);
					if(data==\'yes\')
					{
						if(act=="approve")
							alert(\'Article validated successfully !\');
						else
							alert(\'Article refused successfully !\');
							
						window.location.reload();	
					}
				});
		}
		else
		{
			$("#refusemailblock").show();
		}
	}
	
	$(function(){
			var btnUpload=$(\'#uploadcomment\');
			var status=$(\'#fname\');
			
			new AjaxUpload(btnUpload, {

				action: \'uploadsccomment\',
				name: \'commentfile\',

				onSubmit: function(file, ext){
					if (! (ext && /^(doc|docx|xls|xlsx|pdf|csv|xml|rtf|zip)$/.test(ext))){
						$(\'#fileerr\').html(\'Uniquement doc, docx, xls, xlsx, pdf, csv, xml, zip et rtf\').css(\'color\',\'#FF0000\');
						return false;
					}
				},
				onComplete: function(file, response){//alert(response);
					if(response!="error"){
						status.html(\'\').css(\'color\',\'#000000\');
						var fname=response.split("#");
						$(\'#commentfilename\').val(fname[1]);
						$(\'#fname\').html(fname[1]);
					}
				}
			 });
	});
	


</script>
'; ?>


<div class="modal-header" align="center">
	<button class="close" data-dismiss="modal" >&times;</button>
	<h3><?php echo $this->_tpl_vars['publishedarticle'][0]['title']; ?>
</h3>
</div>
    
<div class="modal-body" id="aovalidate">
	<table cellpadding="4" cellspacing="4">
		<tr>
			<td><strong>Catégorie:</strong></td>
			<td><?php echo $this->_tpl_vars['category']; ?>
</td>
			<td>&nbsp;</td>
			<td><strong>Personne en charge:</strong></td>
			<td><a href="mailto:<?php echo $this->_tpl_vars['publishedarticle'][0]['email']; ?>
"><?php echo $this->_tpl_vars['publishedarticle'][0]['first_name']; ?>
&nbsp;<?php echo $this->_tpl_vars['publishedarticle'][0]['last_name']; ?>
</a></td>
		</tr>
		<tr>
			<td><strong>Langue:</strong></td>
			<td><?php echo $this->_tpl_vars['lang']; ?>
</td>
			<td>&nbsp;</td>
			<td><strong>Rédacteur:</strong></td>
			<td><?php echo $this->_tpl_vars['publishedarticle'][0]['writer']; ?>
</td>
		</tr>
		<tr>
			<td><strong>Nombre de mots:</strong></td>
			<td><?php echo $this->_tpl_vars['articleprocess'][0]['article_words_count']; ?>
</td>
			<td>&nbsp;</td>
			<td><strong>Correcteur:</strong></td>
			<td>
				<?php if ($this->_tpl_vars['publishedarticle'][0]['corrector'] == ""): ?>
					-
				<?php else: ?>
					<?php echo $this->_tpl_vars['publishedarticle'][0]['corrector']; ?>

				<?php endif; ?>
			</td>
		</tr>
		<tr>
			<td><strong>Brief:</strong></td>
			<td><a href="/suivi-de-commande/downloadbrief?delivery=<?php echo $this->_tpl_vars['publishedarticle'][0]['delivery_id']; ?>
"><?php echo $this->_tpl_vars['publishedarticle'][0]['file_name']; ?>
</a></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td colspan="5" align="center"><a href="/suivi-de-commande/downloadarticle?participateid=<?php echo $this->_tpl_vars['publishedarticle'][0]['participateid']; ?>
" class="btn btn-small btn-warning"><?php echo $this->_tpl_vars['articleprocess'][0]['article_name']; ?>
</a></td>
		</tr>
		<tr>
			<td colspan="5" align="center">
				<span style="font-family:Arial;font-size:13px;font-weight:bold;font-style:normal;text-decoration:underline;color:#999999;">Statut:</span>
				<span style="font-family:Arial;font-size:13px;font-weight:bold;font-style:normal;text-decoration:none;color:#999999;">En attente de validation (Client)</span>
			</td>
		</tr>
		<tr>
			<td colspan="5" align="center">
				<div id="comment_valid">
				<?php if ($this->_tpl_vars['commentsreq'] == 'yes'): ?>
					<a href="javascript:void(0);" role="button" data-target="#ao_comment" data-toggle="modal" class="btn btn-small btn-primary">Commenter</a>
				<?php endif; ?>
				</div>
				<a href="javascript:void(0);" onClick="publishao('<?php echo $this->_tpl_vars['publishedarticle'][0]['id']; ?>
','<?php echo $this->_tpl_vars['publishedarticle'][0]['participateid']; ?>
','approve');" class="btn btn-small btn-success">Valider</a>
				<a href="javascript:void(0);" onClick="publishao('<?php echo $this->_tpl_vars['publishedarticle'][0]['id']; ?>
','<?php echo $this->_tpl_vars['publishedarticle'][0]['participateid']; ?>
','refuse');" class="btn btn-small btn-danger">Refuse</a>
			</td>
		</tr>
		<tr id="refusemailblock" style="display:none;">
			<td colspan="5" align="center">
				<form  action="" method="POST" id="mailForm" name="mailForm" enctype="multipart/form-data" action="/suivi-de-commande/index">
				<textarea name="scobject" id="scobject" placeholder="Texte..." style="width: 500px; height: 117px;"></textarea>
				<br>
				<input type="file" name="mailfile" id="mailfile" value="Parcourir..." />
				<input type="hidden" id="refusesubject" name="refusesubject" value="Refused by client -<?php echo $this->_tpl_vars['publishedarticle'][0]['title']; ?>
 " />
				<input type="hidden" id="email" name="email" value="<?php echo $this->_tpl_vars['publishedarticle'][0]['email']; ?>
" />
				<input type="hidden" id="article_id" name="article_id" value="<?php echo $this->_tpl_vars['publishedarticle'][0]['id']; ?>
" />
				<input type="hidden" id="participate_id" name="participate_id" value="<?php echo $this->_tpl_vars['publishedarticle'][0]['participateid']; ?>
" />
				<input type="hidden" id="writer_id" name="writer_id" value="<?php echo $this->_tpl_vars['publishedarticle'][0]['writerid']; ?>
" />
				<br>
				<input type="submit" name="submitrefusemail" id="submitrefusemail" value="Envoyer" class="btn btn-small btn-success pull-right" />
				</form>
			</td>
		</tr>
	</table>
 </div>
 
<div class="modal-footer">
</div>
	
<div class="modal hide fade" id="ao_comment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top:-145px;"> 
    <div class="modal-header" align="center">
        <button class="close" data-dismiss="modal" >&times;</button>
        <h3>Commenter l'article</h3>
    </div>
    <div class="modal-body" id="aocomment">
		Pour toute question / remarque concernant cet article, entrez un 
		commentaire. Celui-ci sera remis à la personne en charge de votre projet, 
		et elle vous répondra dans les plus brefs délais.
		<form  action="" method="POST" id="addCommentForm" name="addCommentForm" enctype="multipart/form-data">
			<textarea name="commentclient" id="commentclient" style="width: 500px; height: 117px;"></textarea>
			<br>
			<div id="uploadcomment">
				<span class="btn btn-file" style="border:none !important">
					<input type="file" name="commentfile" id="commentfile"  class="" />
				</span>
				<span id="fileerr" style="color:red;"></span>
				<br><div id="fname"></div>
			</div>
			<input type="hidden" id="commentfilename" name="commentfilename" value="" />
			<br>
			<input type="submit" name="submitcomment" id="submitcomment" value="Envoyer" class="btn btn-small btn-success pull-right" />
			<input type="hidden" name="article" id="article" value="<?php echo $this->_tpl_vars['publishedarticle'][0]['id']; ?>
" />
			<input type="hidden" name="pmemail" id="pmemail" value="<?php echo $this->_tpl_vars['publishedarticle'][0]['email']; ?>
" />
		</form>
    </div>
    <div class="modal-footer">
    </div>
</div>
