<?php /* Smarty version 2.6.19, created on 2014-01-23 11:30:51
         compiled from common/superclient_header.phtml */ ?>
	<header>
		<div class="container navbar navbar-inverse">
		  <div class="navbar-inner">
			<div class="container">
			  <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </a>
			  <a id="brand" class="brand" title="Accueil edit-place" href="/"><img id="logo" src="/FO/images/shim.gif"></a>
			  <div class="nav-collapse collapse">
				<ul class="nav pull-right">
					<li><h2>Suivi de commande</h2> 
					
					<?php if ($this->_tpl_vars['superclientidentifier'] != ""): ?><span style="color:#FFF;font-weight:bold;margin-top:10px;clear:both;float:left"><?php echo $this->_tpl_vars['superclient_email']; ?>
</span> <a tabindex="-1" href="/suivi-de-commande/logout" style="float:right;">Se déconnecter</a><?php endif; ?>
					</li> 
					<li><img class="flag flag-fr" src="/FO/images/shim.gif"></li>
				</ul>   
			  </div><!--/.nav-collapse -->
			</div>
		  </div>
		</div>
    </header>
