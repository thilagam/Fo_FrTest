<?php /* Smarty version 2.6.19, created on 2014-01-24 13:36:03
         compiled from common/header.phtml */ ?>
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
				<ul class="nav">
				<?php if ($this->_tpl_vars['usertype'] != 'contributor'): ?>	
					<li><a href="/client/premium">Solution PREMIUM</a></li>
				<?php endif; ?>	
					<li><a href="/index/nos-references">Nos références</a></li>
					<li><a href="http://www.edit-place.com/blog/">Blog <span class="badge badge-warning">New</span></a></li>
				<?php if ($this->_tpl_vars['usertype'] != 'contributor'): ?>		
					<li><a href="/client/liberte1" role="button" class="btn btn-mini btn-primary"><i class="icon-edit icon-white"></i>Demander un devis</a></li>
				<?php endif; ?>	
				</ul>
				<ul class="nav pull-right">
					<?php if ($this->_tpl_vars['usertype'] != 'contributor' && $this->_tpl_vars['clientidentifier'] == ""): ?>	
						<li><a  href="" data-target="#create-user" data-toggle="modal"><i class="icon-user icon-white"></i> Espace contributeur</a></li>    
					<?php endif; ?>
					 <li>
					<?php if ($this->_tpl_vars['usertype'] == 'client'): ?>		 
					 <a data-toggle="dropdown" class="btn btn-mini btn-login dropdown-toggle">
						<i class="icon-user icon-white"></i> <?php echo $this->_tpl_vars['clientname']; ?>
 <span class="caret"></span>
					  </a>
					  
						<!-- Link or button to toggle dropdown -->
					  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
						<li><a tabindex="-1" href="/client/home">Mon espace client</a></li>
						<li><a tabindex="-1" href="/client/profile">G&eacute;rer mon compte</a></li>
						<li><a tabindex="-1" href="/client/billing">Mes factures</a></li>
						<li class="divider"></li>
						<li><a tabindex="-1" href="/client/inbox">Ma messagerie</a></li>
						<li><a tabindex="-1" href="/client/logout">D&eacute;connexion</a></li>
					  </ul>
					   
					<?php elseif ($this->_tpl_vars['usertype'] == 'contributor'): ?>	 
						<a data-toggle="dropdown" class="btn btn-mini btn-login dropdown-toggle">
							<i class="icon-user icon-white"></i> <?php echo $this->_tpl_vars['client_email']; ?>
 <span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
							<li><a tabindex="-1" href="/contrib/home">Mon espace</a></li>
							<li><a tabindex="-1" href="/contrib/modify-profile">Modifier mon profil</a></li>
							<li class="divider"></li>
							<li><a tabindex="-1" href="/contrib/logout"><i class="icon-remove-sign"></i> D&eacute;connexion</a></li>
						</ul>
						
					<?php else: ?>
						<a href="" data-target="#login" data-toggle="modal"><i class="icon-briefcase icon-white"></i> Connexion</a>
					<?php endif; ?>	
					</li>  	
				</ul> 	
			  </div><!--/.nav-collapse -->
			</div>
		  </div>
		</div>
    </header>
	
	<!-- ***** Modal collections -->

	<div id="login" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/login.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</div>
	<div id="create-user" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/create_contrib.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</div>
	
	<div id="lost-password" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel"><i class="icon-user"></i> Mot de passe oubli&eacute; ?</h3>
		</div>
		<div class="modal-body">
			<div class="alert alert-info" id="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>Pour recevoir &agrave; nouveau votre mot de passe, veuillez saisir votre e-mail.</div>
			<form class="form-horizontal">
				<div class="control-group">
				<label class="control-label" for="inputEmail" style="margin:0px">Votre Email</label>
					<div class="controls">
						<input type="text" name="forgotpwdemail" id="forgotpwdemail" placeholder="Email" class="input-xlarge" />
						<div class="error" id="forgotpwdemailerr"></div>
						<br><br>
						<button type="button" class="btn btn-primary" onClick="return forgotpasswordmailindex();">Valider</button>
						<button class="btn" data-dismiss="modal" aria-hidden="true" type="button">Annuler</button>
					</div>
				</div>
			</form>
		</div>
	</div>