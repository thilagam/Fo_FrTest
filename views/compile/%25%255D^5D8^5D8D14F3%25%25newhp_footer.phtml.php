<?php /* Smarty version 2.6.19, created on 2016-02-05 08:39:09
         compiled from common/pattern/newhp_footer.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_decode', 'common/pattern/newhp_footer.phtml', 11, false),)), $this); ?>
<section id="strategy" class="dashit">
	<div class="">
		<div class="center-block">
			<h2>Latest from Blog</h2>
		</div>
		<div class="row" id="blogpost">
		<?php $_from = $this->_tpl_vars['bloglist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['blog']):
?>	
			<div class="col-md-4 col-md-offset-1" style="padding-left:20px !important;margin-left:0px">
				<div class="center-block">
					<div class="news-block" style="height:522px !important">
						<a href="<?php echo $this->_tpl_vars['blog']['link']; ?>
" target="_blank"><h5><?php echo ((is_array($_tmp=$this->_tpl_vars['blog']['title'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
</h5></a>
						<!--<?php echo $this->_tpl_vars['blog']['pubDate']; ?>
-->
						<p style="text-align:justify"><?php echo ((is_array($_tmp=$this->_tpl_vars['blog']['content'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
</p>
					</div>
				</div>
			</div>
		<?php endforeach; endif; unset($_from); ?>	
		</div>
	</div>    
</section>

<section class="dashit" id="callus">
	<div class="container padding">
		<div class="center-block">
			<h4>Parlons de votre projet</h4>
			<h2>01 85 08 40 13</h2>
			<p>Prix d'un appel local. Lundi au vendredi de 10h à 18h</p>
			<a href="/index/contact" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-envelope"></span> Contactez-nous</a>
		</div>
	</div>
</section>
<footer>
	<div id="map">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-md-4">
					<div class="center-block">
						<h3>Paris</h3>
					</div>
				</div>
				<div class="col-xs-12 col-md-4">
					<div class="center-block">
						<h3>London</h3>
					</div>
				</div>
				<div class="col-xs-12 col-md-4">
					<div class="center-block">
						<h3>Bangalore</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<ul class="links">
			<!--<li><a href="#">Nos tarifs</a></li>-->
			<li><a href="/index/cgu">CGU</a> </li>
			<li><a href="/index/jobs">Jobs</a></li>
			<li><a href="/index/nos-partenaires">Nos partenaires</a></li>
			<li><a href="/index/qui-sommes-nous">L'&eacute;quipe</a></li>
			<li><a href="/index/contact">Contactez-nous</a></li>
			<li><a href="/index/nos-references">Nos r&eacute;f&eacute;rences</a></li>
			
		</ul>
		<div style="float:right; margin-top: 20px"><a href="http://www.webedia.fr" target="blank"><img src="/FO/images/imageB3/webedia-company.png"></a></div>

		<!--<div id="stickyReplica" >
			<div class="container" style="height:100px;">
				
			</div>
		</div>-->
		<div id='sticky' class="sticky" style="border-top:1px solid #aaaaaa;">
			<div class="container">
				<div class="alert alert-dismissible row" role="alert"  style="font-size:12px;margin-bottom:0px;padding:2px;">					
					  <button style='opacity:1 !important;' type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>En</strong> poursuivant votre navigation sur le site d’Edit-place, vous acceptez l'utilisation de cookies. Ces derniers assurent le bon fonctionnement de nos services. <a href="http://ep-test.edit-place.com/index/cgu" target="_Blank">Plus d'infos	</a>			
				</div>
			</div>
			
		</div>
	</div>
	
</footer>  
<?php echo '
	
	<style>
	#blogpost img {width:390px !important;height:230px !important;}
	</style>
'; ?>

