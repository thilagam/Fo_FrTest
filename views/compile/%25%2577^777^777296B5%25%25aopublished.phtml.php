<?php /* Smarty version 2.6.19, created on 2014-09-19 08:43:37
         compiled from Client/aopublished.phtml */ ?>
<?php echo '
<script language="javascript" src="/FO/script/common/fileinput.jquery.js"></script>
<script language="javascript" src="/FO/script/common/ajaxupload.js"></script>
<script language="javascript">
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
				
				$.post(\'/suivi-de-commande/submitaocomment\',$(this).serialize(),function(msg){ 
					if(msg==\'yes\')
					{
						alert(\'Commentaire soumis avec succès !\');
						$(\'#commentclient\').val("");	
						$("#ao_comment").removeClass("in");	
						$("#comment_button").html("Merci pour votre commentaire, celui-ci a &eacute;t&eacute; soumis avec succ&egrave;s. Edit-place reviendra vers vous au plus vite.");	
					}
				});
			}
		});
	});
	
	function publishao(part)
	{
		var target_page = "/suivi-de-commande/publishaoclient?participate_id="+part;

			$.post(target_page, function(data){  // alert(data);
				if(data==\'yes\')
					alert(\'Article validated successfully !\');
			});
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

<div class="modal-body" id="aopublished">
	<table cellpadding="4" cellspacing="4">
		<tr>
			<td><strong>Catégorie:</strong></td>
			<td><?php echo $this->_tpl_vars['category']; ?>
</td>
			<td>&nbsp;</td>
			<td><strong>Personne en charge:</strong></td>
			<td><?php echo $this->_tpl_vars['publishedarticle'][0]['first_name']; ?>
&nbsp;<?php echo $this->_tpl_vars['publishedarticle'][0]['last_name']; ?>
</td>
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
				<span style="font-family:Arial;font-size:13px;font-weight:bold;font-style:normal;text-decoration:none;color:#999999;">Valid&eacute;</span>
			</td>
		</tr>
		<tr <?php if ($this->_tpl_vars['commentsreq'] != 'yes'): ?>style="display:none;"<?php endif; ?>>
			<td colspan="5" align="center" id="comment_button">
				<a href="javascript:void();" role="button" data-target="#ao_comment"  data-toggle="modal" class="btn btn-small btn-primary">Commenter</a>
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