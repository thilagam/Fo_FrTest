<?php /* Smarty version 2.6.19, created on 2014-01-09 13:19:16
         compiled from common/footer.phtml */ ?>
	<section id="stats">
	 <div class="container">
		 <header>
			<h3 class="sectiondivider"><span>edit-place en direct</span></h3>
		 </header>
		 <div class="row-fluid">
			<span class="span3"><p><?php echo $this->_tpl_vars['stats']['totalUploadedArticles']; ?>
</p>Articles r&eacute;dig&eacute;s</span>
			<span class="span3"><p><?php echo $this->_tpl_vars['stats']['totalCreatedArtilces']; ?>
</p>Devis soumis</span>
			<span class="span3"><p><?php echo $this->_tpl_vars['stats']['totalValidatedArticles']; ?>
</p>Articles valid&eacute;s</span>
			<span class="span3"><p><?php echo $this->_tpl_vars['stats']['newWrites']; ?>
</p>Nouveaux r&eacute;dacteurs</span>
		 </div>
	 </div>  
	</section>   

	<footer class="footer">
		<div class="container">
			<p class="pull-right">
				<a class="pull-right btn btn-small disabled anchor-top scroll" href="#brand">
					<i class="icon-arrow-up"></i>
				</a>
			</p>
			<div style="float:left;padding-right:90px;">
				<ul class="footer-links">
				  <li><a href="/index/cgu">CGU</a></li>
				  <li><a href="/index/jobs">Jobs</a></li>
				  <li><a href="/index/nos-partenaires">Nos partenaires</a></li>
				  <li><a href="/index/qui-sommes-nous">L'&eacute;quipe</a></li>
				  <li><a href="/index/contact">Contactez-nous</a></li>
				  <li><a href="/index/nos-references">Nos r&eacute;f&eacute;rences</a></li>
				</ul> 
			</div>
			<div>
				<a href="http://mmm-new.edit-place.com" rel="tooltip" data-original-title="Fran�ais" onClick="accessfrench();"><img class="flag flag-fr" src="/FO/images/shim.gif"></a>
				<a href="http://uk.edit-place.com" rel="tooltip" data-original-title="Anglais US"><img class="flag flag-us" src="/FO/images/shim.gif"></a>
			</div>
        </div> 
    </footer>

<?php echo ' 
<script src="/FO/script/client/jcookie.js"></script>
<script>
   
	$(".scroll").click(function(event){		
		event.preventDefault();
		$(\'html,body\').animate({scrollTop:$(this.hash).offset().top-80}, 500);  
	});
	

	
 /* $(\'#skillsTab a\').click(function (e) {
		e.preventDefault();
		$(this).tab(\'show\');
    })
	
	$(\'#skillsTab a:first\').tab(\'show\');
	*/
	
	// initialise ajax modal to kill cache
	$(\'body\').on(\'hidden\', \'.modal\', function () {
		$(this).removeData(\'modal\');
	});

	$(".killcurrentmodal").click(function(event){	
		$(\'#login\').modal(\'hide\');
		$(\'#create-user\').modal(\'hide\');
	});
	
	function accessfrench()
	{
			var date = new Date();
		 var minutes = 30;
		 date.setTime(date.getTime() + (minutes * 60 * 1000));
		 $.cookie("FrenchCookie", "set", { expires: date });
	}
</script> 
'; ?>

 
       
  