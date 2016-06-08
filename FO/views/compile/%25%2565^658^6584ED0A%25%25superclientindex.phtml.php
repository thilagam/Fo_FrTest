<?php /* Smarty version 2.6.19, created on 2014-09-19 14:49:24
         compiled from Client/superclientindex.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'Client/superclientindex.phtml', 195, false),array('modifier', 'count', 'Client/superclientindex.phtml', 248, false),)), $this); ?>
<?php echo '
<script language="javascript" src="/FO/script/common/jquery.dataTables.js"></script>
<script language="JavaScript" type="text/javascript" src="/FO/script/common/chosen/chosen.jquery.min.js"></script>
<link href="/FO/css/common/jquery.dataTables.css" type="text/css" rel="stylesheet" />
<link href="/FO/script/common/chosen/chosen.css" type="text/css" rel="stylesheet" />

<script language="javascript">
	$(function(){ 
		
		$(\'#scltable\').dataTable({
			"iDisplayLength": 25,
			"sPaginationType": "full_numbers",
			"bLengthChange": false,
			"bSortClasses": false,
			"oLanguage": {
				"oPaginate": {
					"sFirst": "Premier", 
					"sPrevious": "Pr&eacute;c&eacute;dent",
					"sNext": "Suivant", 
					"sLast": "Dernier" 
				},
				"sSearch": "Recherche:",
			}
		});
		
		$("#site").chosen({ allow_single_deselect: true,search_contains: true });  
		$("#status").chosen({ allow_single_deselect: true,search_contains: true });  
		$("#language").chosen({ allow_single_deselect: true,search_contains: true });  
		$("#ep_incharge").chosen({ allow_single_deselect: true,search_contains: true });  
			
		var articlecount=$("#articlecount").val();
		
		$(\'a[id^="popover_"]\').live(\'click\', function(){ 
			var id=$(this).attr(\'id\'); 
			$(\'#\'+id).popover(\'show\');
			for(var i=0; i<articlecount; i++)
			{ 
				var popid=\'popover_\'+i;
				if(popid!=id)
				{
					$(\'#\'+popid).popover(\'hide\');
				}
			}
		});
	});
	
	function closepopover(ind)
	{
		$(\'#popover_\'+ind).popover(\'hide\');
	}	
	
	function submitForm()
	{
		$("#filterform").submit();
	}
	
	function loadaohistory(ao,article)
	{
		var target_page = "/suivi-de-commande/history?id="+ao+"&article_id="+article;
			
			$.post(target_page, function(data){  //alert(data);
				$("#aohistory").html(data);
			});
	}
	
	function publishedao(article)
	{
		var target_page = "/suivi-de-commande/aopublished?article_id="+article;

			$.post(target_page, function(data){  // alert(data);
				$("#ao_published").html(data);
			});
	}
	
	function validateao(article)
	{
		var target_page = "/suivi-de-commande/aovalidate?article_id="+article;

			$.post(target_page, function(data){  // alert(data);
				$("#ao_validate").html(data);
			});
	}
	
	function mailincharge(email,article)
	{
		$.ajax({
			type: "POST",
			url: "/suivi-de-commande/sendmailincharge",
			data: {email:email,articleid:article},
			
			success: function(data) {
				   $("#ao_sendmail").html(data);
				}
			
			
		});   
	
	}
	
</script>
'; ?>


<div id="marketing" style="padding-bottom:0px;" align="center">
	<div class="container" >
		<form name="filterform" id="filterform" method="POST" action="/suivi-de-commande/index">
		<table cellpadding="5" cellspacing="5" width="">
			<tr>
				<td colspan="5">&nbsp;</td>
			</tr>
			<tr <?php if ($this->_tpl_vars['usertype'] == 'client'): ?>style="display:none;"<?php endif; ?>>
				<td style="color:#ffffff">Site</td>
				<td>
					<select name="site[]" id="site" multiple class="chzn_a" data-placeholder="Site">  
						<option value="">Site</option>
						<?php $_from = $this->_tpl_vars['sites']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['site']):
?>
							<option value="<?php echo $this->_tpl_vars['site']['user_id']; ?>
" <?php if (in_array ( $this->_tpl_vars['site']['user_id'] , $this->_tpl_vars['selectedsite'] )): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['site']['company_name']; ?>
</option>
						<?php endforeach; endif; unset($_from); ?>   
					</select>
				</td>
				<td width="10%">&nbsp;</td>
				<td style="color:#ffffff">Statut</td>
				<td>
					<select name="status[]" id="status" multiple class="chzn_a" data-placeholder="Statut">
						<option value="">Statut</option>
						<?php $_from = $this->_tpl_vars['status']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['statkey'] => $this->_tpl_vars['stat']):
?>
							<option value="<?php echo $this->_tpl_vars['statkey']; ?>
" <?php if (in_array ( $this->_tpl_vars['statkey'] , $this->_tpl_vars['selectedstatus'] )): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['stat']; ?>
</option>
						<?php endforeach; endif; unset($_from); ?>
					</select>
				</td>
			</tr>
			<tr>
				<td style="color:#ffffff">Langue</td>
				<td>
					<select name="language[]" id="language" multiple class="chzn_a" data-placeholder="Langue">
						<option value="">Langue</option>
						<?php $_from = $this->_tpl_vars['language']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['langkey'] => $this->_tpl_vars['lang']):
?>
							<option value="<?php echo $this->_tpl_vars['langkey']; ?>
" <?php if (in_array ( $this->_tpl_vars['langkey'] , $this->_tpl_vars['selectedlanguage'] )): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['lang']; ?>
</option>
						<?php endforeach; endif; unset($_from); ?>
					</select>
				</td>
				<td width="10%">&nbsp;</td>
				<td style="color:#ffffff">Personne en charge (Edit-Place)</td>
				<td>
					<select name="ep_incharge[]" id="ep_incharge" data-placeholder="Personne en charge" multiple class="chzn_a">
						<option value="">Personne en charge</option>
						<?php $_from = $this->_tpl_vars['epincharge']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ep']):
?>
							<option value="<?php echo $this->_tpl_vars['ep']['user_id']; ?>
"  <?php if (in_array ( $this->_tpl_vars['ep']['user_id'] , $this->_tpl_vars['selectedep_incharge'] )): ?>selected<?php endif; ?>><?php echo $this->_tpl_vars['ep']['epname']; ?>
</option>
						<?php endforeach; endif; unset($_from); ?>
					</select>
				</td>
			</tr>
			<tr> 
				<td></td>  
				<td></td>
				<td width="10%">&nbsp;</td>
				<td></td>
				<td align="right"><input type="submit" class="btn btn-primary" name="searchsc" id="searchsc" value="Rechercher" onClick="submitForm();" /></td>
			</tr>
		</table>
		</form>
	</div>
</div>

<section id="quote-listing-table">
	<div class="mod"> 
		<table id="scltable">
			<thead>
				<tr>
					<th>Site</th>
					<th>Langue</th>
					<th>Titre de l'article</th> 
					<th>Date de lancement</th> 
					<th>Rédacteur</th>
					<th>Correcteur</th>
					<th>Historique</th>
					<th>Statut</th>
					<th>Personne en charge	</th>
				</tr>
			</thead>

			<?php $_from = $this->_tpl_vars['articlelist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['articleloop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['articleloop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['article']):
        $this->_foreach['articleloop']['iteration']++;
?>
				<tr>
					<td><?php echo $this->_tpl_vars['article']['company_name']; ?>
</td>
					<td><?php echo $this->_tpl_vars['lang_array'][$this->_tpl_vars['article']['language']]; ?>
</td>
					<td>
						<?php if ($this->_tpl_vars['article']['lot'] == 'yes'): ?>
							<a href="javascript:void();" data-placement="bottom" id="popover_<?php echo ($this->_foreach['articleloop']['iteration']-1); ?>
"  rel="popover" data-html="true" data-original-title="<?php echo $this->_tpl_vars['article']['title']; ?>
 <button type=button class=close onClick=closepopover('<?php echo ($this->_foreach['articleloop']['iteration']-1); ?>
') aria-hidden=true>&times;</button>"
								data-content="<?php echo $this->_tpl_vars['article']['lotlist']; ?>
" >
								<?php echo $this->_tpl_vars['article']['title']; ?>

							</a>
						<?php else: ?>
							<?php echo $this->_tpl_vars['article']['title']; ?>

						<?php endif; ?>
					</td>
					<td><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y - %H:%M") : smarty_modifier_date_format($_tmp, "%d/%m/%Y - %H:%M")); ?>
</td>
					<td><?php echo $this->_tpl_vars['article']['writer']; ?>
</td>
					<td><?php echo $this->_tpl_vars['article']['corrector']; ?>
</td>
					<td><a href="javascript:void();" onClick="loadaohistory('<?php echo $this->_tpl_vars['article']['delivery_id']; ?>
','<?php echo $this->_tpl_vars['article']['id']; ?>
')" role="button" data-target="#ao_history" data-toggle="modal"><img src="/FO/images/history.png"></a></td>
					<td><!-- $article.participation_expires>$now || ($article.participation_expires>$now && $article.participationcount=='0') -->
						<?php if ($this->_tpl_vars['article']['status'] == 'bid' && $this->_tpl_vars['article']['article_submit_expires'] > $this->_tpl_vars['now']): ?>  
							Rédaction en cours
						<?php elseif ($this->_tpl_vars['article']['status'] == 'time_out' || ( $this->_tpl_vars['article']['status'] == 'bid' && $this->_tpl_vars['now'] > $this->_tpl_vars['article']['article_submit_expires'] )): ?>
							<?php if (array_key_exists ( 'time_out' , $this->_tpl_vars['status'] )): ?>
								Article non envoyé
							<?php else: ?>
								Rédaction en cours
							<?php endif; ?>	
						<?php elseif ($this->_tpl_vars['article']['attendcount'] > 0): ?>
							En attente de sélection
						<?php elseif ($this->_tpl_vars['article']['status'] == 'time_out' || ( $this->_tpl_vars['article']['status'] == 'bid' && $this->_tpl_vars['now'] > $this->_tpl_vars['article']['article_submit_expires'] )): ?>
							Article non envoyé
						<?php elseif ($this->_tpl_vars['article']['status'] == 'plag_exec'): ?> 
							<?php if (array_key_exists ( 'plag_exec' , $this->_tpl_vars['status'] )): ?>
								Vérification du non plagiat
							<?php else: ?>
								Rédaction en cours
							<?php endif; ?>
						<?php elseif ($this->_tpl_vars['article']['status'] == 'disapproved'): ?>	
							Article en reprise
						<?php elseif ($this->_tpl_vars['article']['current_stage'] == 'corrector' || $this->_tpl_vars['article']['current_stage'] == 'stage1' || $this->_tpl_vars['article']['status'] == 'disapproved_temp'): ?>		
							Correction en cours
						<?php elseif ($this->_tpl_vars['article']['current_stage'] == 'stage2'): ?>	
							En attente de validation (EP)
						<?php elseif ($this->_tpl_vars['article']['current_stage'] == 'client' && ( $this->_tpl_vars['article']['status'] == 'published' || $this->_tpl_vars['article']['status'] == 'under_study' ) && $this->_tpl_vars['article']['client_validated'] == ""): ?>		
							<a onClick="validateao('<?php echo $this->_tpl_vars['article']['id']; ?>
')" href="" role="button" data-target="#ao_validate" data-toggle="modal">En attente de validation (Client)</a>
						<?php elseif ($this->_tpl_vars['article']['current_stage'] == 'client' && $this->_tpl_vars['article']['status'] == 'published' && $this->_tpl_vars['article']['client_validated'] == 'approve'): ?>	  
							<a onClick="publishedao('<?php echo $this->_tpl_vars['article']['id']; ?>
')" href="" role="button" data-target="#ao_published" data-toggle="modal">Validé</a>
						<?php elseif ($this->_tpl_vars['article']['current_stage'] == 'client' && $this->_tpl_vars['article']['status'] == 'closed_client_temp' && $this->_tpl_vars['article']['client_validated'] == 'refuse'): ?>	
							Refused by Client
						<?php elseif ($this->_tpl_vars['article']['status'] == 'closed'): ?>	
							Close
						<?php elseif ($this->_tpl_vars['article']['participation_expires'] > $this->_tpl_vars['now']): ?> 
							Participations en cours
						<?php elseif ($this->_tpl_vars['article']['participationcount'] == '0'): ?>
							No Participation	
						<?php endif; ?>
					</td>
					<td>
						<?php if ($this->_tpl_vars['article']['first_name'] != ""): ?>
							<img src="/FO/images/inbox_icon.png"/> <a href="javascript:void(0);" role="button" data-target="#ao_sendmail" data-toggle="modal" onClick="mailincharge('<?php echo $this->_tpl_vars['article']['email']; ?>
','<?php echo $this->_tpl_vars['article']['id']; ?>
')"><?php echo $this->_tpl_vars['article']['first_name']; ?>
&nbsp;<?php echo $this->_tpl_vars['article']['last_name']; ?>
</a> 
						<?php else: ?>
							-
						<?php endif; ?>
					</td> 	
				</tr>
				
			<?php endforeach; endif; unset($_from); ?>
			<input type="hidden" name="articlecount" id="articlecount" value="<?php echo count($this->_tpl_vars['articlelist']); ?>
" />
		</table>
	</div>
</section>	
<!--<div class="span12">
	<div class="pagination pull-right">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Client/pagination.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</div>	
</div>-->

<div class="modal container hide fade" id="ao_history" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top:55px;"> 
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
        <h3>Historique</h3>
    </div>
    <div class="modal-body" id="aohistory"> 
    </div>
    <div class="modal-footer">
    </div>
</div>

<div class="modal hide fade" id="ao_published" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top:55px;width:600px;"> 
</div>

<div class="modal hide fade" id="ao_validate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top:55px;width:600px;"> 
</div>

<div class="modal hide fade" id="ao_sendmail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top:55px;width:600px;"> 
</div>