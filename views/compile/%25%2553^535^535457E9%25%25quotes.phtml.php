<?php /* Smarty version 2.6.19, created on 2015-07-29 13:17:48
         compiled from Client/quotes.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Client/quotes.phtml', 184, false),array('modifier', 'ucfirst', 'Client/quotes.phtml', 206, false),array('modifier', 'ceil', 'Client/quotes.phtml', 209, false),array('modifier', 'utf8_decode', 'Client/quotes.phtml', 249, false),)), $this); ?>
<?php echo '

<script type="text/javascript" charset="utf-8" src="/FO/script/client/countdown.js"></script>
<script type="text/javascript" charset="utf-8" src="/FO/script/client/jcookie.js"></script>

<script>
	$(document).ready(function(){
		var working = false;
		
		$(\'#addCommentForm\').submit(function(e){
			e.preventDefault();
			if(working) return false;
		
			if($(\'#commentuser\').val()=="")
			{
				$(\'#commentuser\').css("border-color","#FF0000");
			}
			else
			{
				$.post(\'/client/submitaocomment?quotes=1\',$(this).serialize(),function(msg){//alert(msg);  
					$(\'#submit\').val(\'Submit\');
					if(msg.status){
						$(msg.html).hide().insertBefore(\'#addCommentContainer\').slideDown();
						$(\'#commentuser\').val(\'\');
						$(\'#commentcountdisp\').html(msg.count);
						$(\'#commentcount\').val(\'\');
						$(\'#commentcount\').val(msg.count);
						$(\'#commentuser\').css("border-color","#CCCCCC");
					}
				},\'json\'); 
			}
		});

		//////////show timer article_submit_expires//////////
			$("#participation_time").countdown({
				timestamp	: $("#participationtime").val(), 
				callback	: function(days, hours, minutes, seconds){
					var message = "";
					//alert(days);
					//add days to hours
					if(days!="0")
						message += days + "j" +"&nbsp;";
						//hours=hours+(days*24);
						
					if(hours!="0")
						message += hours + "h" +"&nbsp;";
					
					if(minutes!="0")
						message += minutes + "mn"; 
					
					$("#participation_time").html(message);
					if(days==0 && hours==0 && minutes==0 && seconds==0)
					{
						$("#participation_time").html("D&eacute;lai termin&eacute;");
					}
				}
			});
	});

		var cur_date=$("#now").val();
		var js_date=(new Date().getTime())/ 1000;
		var diff_date=Math.floor(js_date-cur_date);
		
	
	$(window).load(function(){		
		var articleid=$("#article").val();
		var clcount=$("#clientcount").val();
		var sortby=$("#sort").val();
		var showpop=$("#showpop").val();
		var cookieValue = $.cookie("poponce_"+articleid);
		
		if(clcount>0 && sortby=="" && showpop!="no" && cookieValue!=1)
		{
			$.cookie("poponce_"+articleid, 1, { expires : 1 });
			$(\'#preBidding\').modal({
				show: true,
				remote: \'/client/prebidding?id=\'+articleid
			});
		}
    });	
	
	function CloseArticlequotes(art)
	{
		if(confirm("Voulez-vous réellement annuler cette mission ?")) 
		{	
		 $.ajax({
			type : \'post\', 
			url : \'/client/closearticle\', 
			data :  \'article=\'+art, 
			   
			success : function(r)
		   {
				alert("Mission annulée !"); 
				window.location.href="/client/quotes?id="+art+"&showpop=no";
		   }
		});
		}
		else
			return false;
	}

</script>
'; ?>



<div class="container">
	<!-- start, status -->
	<div class="row-fluid">
		<div id="state2" class="span12">
			<ul class="unstyled">
				<li class="hightlight span3" rel="tooltip" data-original-title="S&eacute;lectionnez celui qui travaillera sur votre projet"><span class="writer_select"> Choix du journaliste</span></li>
				<li class="span3" rel="tooltip" data-original-title="Le journaliste s&eacute;lectionn&eacute; travaille sur votre projet"><span class="ongoing">Production en cours</span></li>
				<li class="span3" rel="tooltip" data-original-title="Vous versez en d&eacute;pôt de garantie le montant de la commande"><span class="cb">D&eacute;pôt de garantie</span></li>
				<li class="span3" rel="tooltip" data-original-title="T&eacute;l&eacute;charger vos projets livr&eacute;s"><span class="dld">T&eacute;l&eacute;chargement</span></li>
			</ul>
		</div>
	</div>
	<!-- end, status -->

	<!-- start, Summary -->
	<section id="summary">
		<div class="row-fluid">
			<div class="span7">
				<h1><p>Vos devis</p> <?php echo $this->_tpl_vars['aodetails'][0]['title']; ?>
</h1>
			</div>
			<div class="span2 stat">
				<p>Devis reçus</p>
				<p class="num-large"><?php echo $this->_tpl_vars['aodetails'][0]['partcount']; ?>
</p>
			</div>
			<div class="span3 stat">
				<?php if ($this->_tpl_vars['aodetails'][0]['articlestatus'] == 'closed_client'): ?>
					Annul&eacute;e
				<?php else: ?>	
					<p>Fin de r&eacute;ception dans</p>
					<?php if ($this->_tpl_vars['aodetails'][0]['delivery_timediff'] == 0): ?>
						<p class="num-large less24" style="font-size:24px">Attente mise en ligne</p>
					<?php else: ?>	
						<?php if ($this->_tpl_vars['aodetails'][0]['delivery_timediff'] < 24): ?>
							<p class="num-large less24" id="participation_time"></p>
						<?php else: ?>	
							<p class="num-large" id="participation_time"></p> 
						<?php endif; ?>
					<?php endif; ?>
				<?php endif; ?>	
			</div>
			<input type="hidden" name="participationtime" id="participationtime" value="<?php echo $this->_tpl_vars['aodetails'][0]['participation_expires']; ?>
" />
			<input type="hidden" name="now" id="now" value="<?php echo $this->_tpl_vars['now']; ?>
" />
		 </div>
	</section>
	<!-- end, summary -->
	
	<?php if ($this->_tpl_vars['aodetails'][0]['premium_option'] == '0'): ?>
		<div class="row-fluid">
			<div class="statusbar clearfix">  
				<div class="span8">
					<div class="btn-toolbar">
						<div class="btn-group">
							<?php if ($this->_tpl_vars['aodetails'][0]['articlestatus'] != 'closed_client'): ?>
								<a class="btn btn-small" data-target="#extendparticipationtime" data-toggle="modal" role="button"><i class="icon-time"></i> Prolonger ce devis</a>
							<?php endif; ?>
							<?php if ($this->_tpl_vars['aodetails'][0]['created_by'] == 'FO'): ?>
								<a class="btn btn-small" href="/client/quotes-1?article=<?php echo $_GET['id']; ?>
"><i class="icon-pencil"></i> Dupliquer ce devis</a>
							<?php endif; ?>
							<?php if ($this->_tpl_vars['aodetails'][0]['articlestatus'] != 'closed_client'): ?>
								<a class="btn btn-small" href="/client/compose-mail?serviceid=111201092609847&object=<?php echo $this->_tpl_vars['aodetails'][0]['title']; ?>
" target="_blank"><i class="icon-envelope"></i> Contacter Edit-place</a>
								<a class="btn btn-small" href="javascript:void(0);" onClick="CloseArticlequotes('<?php echo $_GET['id']; ?>
');" ><i class="icon-remove"></i> Fermer ce devis</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
				
				<div class="pull-right" style="margin-top: 10px"> 
					Sort by : 
						<a href="/client/quotes?id=<?php echo $_GET['id']; ?>
&sort=date" class="btn btn-small <?php if ($_GET['sort'] == 'date'): ?>disabled<?php endif; ?>">Date</a> 
						<a href="/client/quotes?id=<?php echo $_GET['id']; ?>
&sort=price" class="btn btn-small <?php if ($_GET['sort'] == 'price'): ?>disabled<?php endif; ?>">Prix</a>
				</div>
			</div> 
		</div>
		<div class="alert alert-warning">
			<strong>Sélectionnez un contributeur pour cette mission ou relancez une mission en privé en cliquant sur la fiche profil</strong>
		</div> 
	<?php endif; ?> 
	
	<?php if (count($this->_tpl_vars['quoteslist']) > 0): ?>
		
	
		<section id="quote-listing">
			 <div class="row-fluid">
				<ul class="unstyled">
					<?php $_from = $this->_tpl_vars['quoteslist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['quotesloop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['quotesloop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['quote']):
        $this->_foreach['quotesloop']['iteration']++;
?>
					<?php if (( ($this->_foreach['quotesloop']['iteration']-1) ) % 3 == 0): ?>
						<li class="span3 marginleft0">
					<?php else: ?>
						<li class="span3">
					<?php endif; ?>	

						<?php if ($this->_tpl_vars['quote']['cycle'] != '0'): ?>
							<div class="editor-container disable" data-original-title="Devis envoyé lors de la phase précédente de réception des devis" rel="tooltip">
						<?php elseif ($this->_tpl_vars['quote']['valid_expired'] == 'yes'): ?>
							<div class="editor-container disable" data-original-title="Date projetée a expiré!" rel="tooltip">
						<?php else: ?>
							<div class="editor-container">
						<?php endif; ?>

								<a class="imgframe-large" onclick="loadprofile('<?php echo $this->_tpl_vars['quote']['user_id']; ?>
','<?php echo $this->_tpl_vars['quote']['artid']; ?>
','<?php echo ($this->_foreach['quotesloop']['iteration']-1); ?>
');" style="cursor:pointer;" role="button" data-toggle="modal" data-target="#viewQuoteProfile-ajax">
									<img src="<?php echo $this->_tpl_vars['quote']['profilepic']; ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['quote']['name'])) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : smarty_modifier_ucfirst($_tmp)); ?>
">
								</a>

								<div class="price"><?php echo ((is_array($_tmp=$this->_tpl_vars['quote']['price_user'])) ? $this->_run_mod_handler('ceil', true, $_tmp) : ceil($_tmp)); ?>
 &euro;</div>

								<?php if ($this->_tpl_vars['quote']['valid_until'] != 'no'): ?>
									Prix valable jusqu'au <?php echo $this->_tpl_vars['quote']['valid_until']; ?>
.
								<?php endif; ?>	

								<p class="editor-name"><a onclick="loadprofile('<?php echo $this->_tpl_vars['quote']['user_id']; ?>
','<?php echo $this->_tpl_vars['quote']['artid']; ?>
','<?php echo ($this->_foreach['quotesloop']['iteration']-1); ?>
');" role="button" style="cursor:pointer;" data-toggle="modal" data-target="#viewQuoteProfile-ajax"><?php echo $this->_tpl_vars['quote']['name']; ?>
</a></p>
							</div>
						</li>
					<?php endforeach; endif; unset($_from); ?>
					
					<?php $_from = $this->_tpl_vars['quotesidlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['quoteid']):
?>
						<input type="hidden" name="previous_<?php echo $this->_tpl_vars['quoteid']['user_id']; ?>
" id="previous_<?php echo $this->_tpl_vars['quoteid']['user_id']; ?>
" value="<?php echo $this->_tpl_vars['quoteid']['previous']; ?>
" />
						<input type="hidden" name="next_<?php echo $this->_tpl_vars['quoteid']['user_id']; ?>
" id="next_<?php echo $this->_tpl_vars['quoteid']['user_id']; ?>
" value="<?php echo $this->_tpl_vars['quoteid']['next']; ?>
" /> 
					<?php endforeach; endif; unset($_from); ?>

				</ul>

				<div class="span12">
					<!---Pagination start-->
						<div class="pagination pull-right">
							<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Client/pagination.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
						</div>	
				</div>
			</div>
		</section>
	<?php else: ?>
			<?php if ($this->_tpl_vars['aodetails'][0]['delivery_timediff'] <= 0): ?>
				<h4 style="padding-bottom:120px">VOUS N'AVEZ RECU AUCUN DEVIS POUR VOTRE PROJET</h4>
			<?php else: ?>
				<h4 style="padding-bottom:120px">Il n'y a pas encore de devis pour ce projet</h4>
			<?php endif; ?>
	<?php endif; ?>

	<?php if (count($this->_tpl_vars['quoteslist']) > 0): ?> 
	<section id="prebidding" class="clearfix">
		<div class="span9 offset1">
			<h3 class="sectiondivider pull-center"><span>Ils ont rédigé pour...</span></h3>
			<br />
			<?php $_from = $this->_tpl_vars['customerstrust']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ckey'] => $this->_tpl_vars['clogo']):
?>
				<img src="<?php echo $this->_tpl_vars['clogo']; ?>
" rel="tooltip" data-original-title="<?php echo ((is_array($_tmp=$this->_tpl_vars['ckey'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
" data-placement="top"/>
			<?php endforeach; endif; unset($_from); ?>
		</div>
	</section>
	<?php endif; ?> 
	<input type="hidden" name="clientcount" id="clientcount" value="<?php echo count($this->_tpl_vars['customerstrust']); ?>
" /> 
	<input type="hidden" name="article" id="article" value="<?php echo $_GET['id']; ?>
" /> 
	<input type="hidden" name="sort" id="sort" value="<?php echo $_GET['sort']; ?>
" /> 
	<input type="hidden" name="showpop" id="showpop" value="<?php echo $_GET['showpop']; ?>
" /> 
	
	<section id="next">		
		<div class="well span7" >
			<h3>Que se passe t-il ensuite ?</h3>
			<ol>
				<?php if ($this->_tpl_vars['aodetails'][0]['premium_option'] == '0'): ?>
					<li> J'obtiens le contact du journaliste slectionn&eacute;. Celui-ci s'engage &agrave; me livrer dans les d&eacute;lais impartis</li>
				<?php else: ?>
					<li> Edit-place s&eacute;lectionne le meilleur journaliste et s'engage &agrave; livrer la commande dans les d&eacute;lais impartis</li>
				<?php endif; ?>
				<li> Je verse à edit-place, 100% de la commande en d&eacute;pôt de garantie pour t&eacute;l&eacute;charger les articles livr&eacute;s</li>
				<li> Si je suis satisfait, edit-place reverse le montant de mon r&egrave;glement au journaliste</li>
				<li> Si je ne suis pas satisfait, je peux demander gratuitement une reprise ou un remboursement en cas de refus d&eacute;finitif des articles</li>
			</ol>
		</div>
		<div id="garantee" class="span4">
		   <h4>Vos garanties</h4>
			<dl>
			<dt><span class="umbrella"></span>edit-place est votre médiateur</dt>
			<dd>En cas de contestation (délai de livraison, reprise d’articles, remboursement...)</dd>
			<dt><span class="locked"></span>Paiement sécurisé</dt>
			<dd>Notre solution de paiement en ligne vous garantit une transaction en toute tranquillité</dd>
			</dl>
		</div>
	</section>
</div>



<!-- ajax use start --> 

<div id="viewQuoteProfile-ajax" class="modal container hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<?php if ($this->_tpl_vars['quoteslistcnt'] > 1): ?>
		<a class="lft" onclick="loadprofile('<?php echo $this->_tpl_vars['quote']['user_id']; ?>
','<?php echo $_GET['id']; ?>
','previous');" role="button" style="cursor:pointer;">&lsaquo;</a>
		<a class="rgt" onclick="loadprofile('<?php echo $this->_tpl_vars['quote']['user_id']; ?>
','<?php echo $_GET['id']; ?>
','next');" role="button" style="cursor:pointer;">&rsaquo;</a>  
	<?php endif; ?>
	
	<div class="modal-header"> 
		<button type="button" class="close" data-dismiss="modal" onclick="$('.modal-backdrop').hide();" aria-hidden="true">&times;</button>
		<h3 id="myModalLabel">Devis et profil du rédacteur</h3> 
	</div>
	<div class="modal-body">
		<div id="profilecontent">
		</div>
	</div>
</div>

<!-- ajax use end -->

<div id="preBidding" class="modal container hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3 id="myModalLabel"><?php echo $this->_tpl_vars['aodetails'][0]['title']; ?>
</h3>
	</div>
	<div class="modal-body">
	</div>
</div>

<!-- Extend participation time -->
<div id="extendparticipationtime" class="modal container hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3 id="myModalLabel">Accorder un délai supplémentaire</h3>
	</div>
	<div class="modal-body">
		<form method="POST" name="extendform" id="extendform" action="/client/quotes?id=<?php echo $_GET['id']; ?>
">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Client/extendparticipationtime.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		</form>
	</div>
</div>