<?php /* Smarty version 2.6.19, created on 2015-07-28 15:11:51
         compiled from Contrib/ask4moretime.phtml */ ?>
<!-- ask 4 more time -->   
<div class="row-fluid">
	<div class="span9">
		<form method="POST" action="/contrib/ask-more-time" id="extend_time_form">
		<div class="well">
			<div class="icon_corrector pull-right"></div>
			<p><strong>Demande de d&eacute;lai suppl&eacute;mentaire pour le projet <?php echo $this->_tpl_vars['aoTitle']; ?>
 </strong></p>

			<textarea name="extend_time_comments" id="extend_time_comments" class="textarea-ask4update span12" rows="12" placeholder="Exemple : Ch&egrave;re client, pourriez-vous m'accorder un d&eacute;lai suppl&eacute;mentaires de 8h pour la livraison des articles  pour les raisons suivantes : ... "></textarea>
		</div>
		<div id = "alert_error_placeholder"></div>
		<input type="hidden" name="article_id" value="<?php echo $this->_tpl_vars['article_id']; ?>
">
		<input type="hidden" name="sendto_user" value="<?php echo $this->_tpl_vars['sendto_user']; ?>
">
		
		<div class="clearfix">
			<button aria-hidden="true" data-dismiss="modal" class="btn" type="button">Annuler</button>
			<button class="btn btn-primary" type="button" id="ask_more">Envoyer</button>
		</div>
		
		</form>
	</div>

	<div class="span3">
		<div class="alert alert-info"><i class="icon-info-sign"></i> Vous souhaitez demander un d&eacute;lai suppl&eacute;mentaire au client ou &agrave; Edit-place. Merci d'en indiquer les raisons le plus pr&eacute;cisement possible.</div>
	</div>
</div>

        
<a class="pull-right btn btn-small disabled anchor-top scroll" href="#brand"><i class="icon-arrow-up"></i></a>
<?php echo '
<script>
 // call write email function
	$(\'.textarea-ask4update\').wysihtml5({locale: "fr-FR"});
	
	$(".scroll").click(function(event){		
		event.preventDefault();
		$(\'html,body\').animate({scrollTop:$(this.hash).offset().top}, 500);
	});

 // placeholder mgt for old browsers
    $(\'input, textarea\').placeholder();	
	
	bootstrap_alert = function() {}
	bootstrap_alert.error = function(div,message) {
		$(\'#\'+div).html(\'<div class="alert  alert-error"><button data-dismiss="alert" class="close" type="button">&times;</button><span><ul>\'+message+\'</ul></span></div>\')
	}
	$("#ask_more").click(function(){
		var error=0;
		var msg=\'\';
		var id_name=$(this).attr("id");    
		
			var	extend_time_comments=$("#extend_time_comments");
			var comments=extend_time_comments.val();
				comments = comments.replace(/(<([^>]+)>)/ig,"");
				comments = comments.replace(/&nbsp;/gi,"");
					
			if($.trim(comments).length <1 || comments=="")
			{
				msg+=\'Votre comments obligatoire<br>\';
				error++;
			}							
			if(error==0)	
				$("#extend_time_form").submit();
			else
				bootstrap_alert.error(\'alert_error_placeholder\',msg);
	});			
		
	
</script>    
'; ?>