<?php /* Smarty version 2.6.19, created on 2015-08-03 12:57:49
         compiled from common/pattern/newhp_header.phtml */ ?>
<?php if ($this->_tpl_vars['showswitch'] == 'yes'): ?>
<div id="switch-country" class="animated fadeInDown">
	<div class="container">
		<div class="alert fade in">
			<button aria-hidden="true" data-dismiss="alert" class="close" type="button" onClick="switchalert('fr');">&times;</button>
			<h4>We've detected you are coming from a location outside of France.<br>
			Nous avons d�tect� que vous vous connectez depuis un lieu situ� en dehors de France.
			</h4>
			<p>Please choose one of the following:<br>
			Veuillez choisir l'une des options suivantes:
			</p>
			<a class="btn btn-primary" onClick="switchalert('en');" href="javascript:void(0);"><span class="flag flag-gb"></span> English</a>
			<a class="btn btn-default" onClick="switchalert('fr');" href="javascript:void(0);"><span class="flag flag-fr"></span> Fran�ais</a>
		</div>
	</div>
</div>
<?php endif; ?>
<header <?php if ($this->_tpl_vars['showswitch'] == 'yes'): ?>class="dashit"<?php endif; ?>>

	<div id="header">

		<div id="topnav">

			<div class="container">

				<div class="pull-right">    

					<span id="switch-lang" class="dropdown">

						<a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="index.html"><span class="flag flag-fr"></span> FR <span class="caret"></span></a>

						<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">

							<li><a href="http://ep-test.edit-place.com"><span class="flag flag-gb"></span> UK</a></li>

						</ul>

					</span>

					| 

					

					<?php if ($this->_tpl_vars['usertype'] == 'client' || $this->_tpl_vars['usertype'] == 'clientcontact'): ?>		 

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

						<a href="" data-target="#create-user" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span> Contributeur</a> | 

						<a href="" data-target="#login" data-toggle="modal"><span class="glyphicon glyphicon-user"></span> Connexion</a>

					<?php endif; ?>

				</div>

			</div> 

		</div>

		<nav class="navbar navbar_ep" role="navigation">

			<div class="container">

				<!-- Brand and toggle get grouped for better mobile display -->

				<div class="navbar-header">

					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">

						<span class="sr-only">Navigation</span>

						<span class="icon-bar"></span>

						<span class="icon-bar"></span>

						<span class="icon-bar"></span>

					</button>

					<a class="navbar-brand" href="/index"><img src="/FO/images/imageB3/svg/logo-ep.svg" width="201" height="34" class="img-responsive"></a>

				</div>



				<!-- Collect the nav links, forms, and other content for toggling -->

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

					<ul class="nav navbar-nav navbar-right">

						<li class="ep-effect"><a href="/index">Accueil</a></li>

						<li class="ep-effect"><a href="/index/qui-sommes-nous">Qui sommes-nous ?</a></li>

						<li class="ep-effect"><a href="/index/nos-references">Nos r�f�rences</a></li>

						<li class="ep-effect"><a href="http://www.edit-place.com/blog/">Blog</a></li>

						<?php if ($this->_tpl_vars['usertype'] != 'contributor'): ?>	 <li><a class="navbar-btn btn btn-primary btn-sm" href="/client/quotes-1">Nos tarifs</a></li><?php endif; ?>

					</ul>

				</div>

			</div>

		</nav>

	</div>

	<div id="playground">

		<div class="container">

			<div class="center-block">

				<h1>R�daction et traduction sur mesure <small>Disponibles dans plus de 30 langues</small></h1>

				<div class="cta-collections">

					<a href="/client/quotes-1" class="btn btn-primary btn-lg" role="button">D�couvrez nos tarifs</a>

					<a href="http://youtu.be/qjeLGW7EQ44" data-toggle="lightbox" data-type="youtube" data-width="940" class="btn btn-info btn-lg" role="button"><span class="glyphicon glyphicon-play"></span> Voir la video</a>

				</div>

			</div>

		</div>

	</div>

</header>



<div id="login" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

	<div class="modal-dialog">

		<div class="modal-content">

			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/login.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

		</div>

	</div>	

</div>



<div id="create-user" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

	<div class="modal-dialog">

		<div class="modal-content">

		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/create_contribhp.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

		</div>

	</div>	

</div>



<div id="lost-password" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

	<div class="modal-dialog">

		<div class="modal-content">

			<form>

				<div class="modal-header">

					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

					<h3 id="myModalLabel"><i class="icon-user"></i> Mot de passe oubli&eacute; ?</h3>

				</div>

				<div class="modal-body">

					<div class="alert alert-info" id="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>Pour recevoir &agrave; nouveau votre mot de passe, veuillez saisir votre e-mail.</div>

					<div class="row">  

						<div class="col-xs-12 col-md-6">

							<input type="text" name="forgotpwdemail" id="forgotpwdemail" placeholder="Votre Email" class="form-control" />

						</div>

					</div>

					<div class="error" id="forgotpwdemailerr"></div>

				</div>

				<div class="modal-footer">

					<button type="button" class="btn btn-primary" onClick="return forgotpasswordmailindex();">Valider</button>

					<button class="btn btn-default" data-dismiss="modal" aria-hidden="true" type="button">Annuler</button>

				</div>

			</form>

		</div>

	</div>

</div>

<?php echo '
	<script type="text/javascript">
		function switchalert(switchlang)
		{
			$.ajax({
				url: "/index/setswitchcookie",
				global: false,
				type: "POST",
				data: ({switchlang : switchlang}),
				dataType: "html",
				async:false,
				success: function(msg){//alert(msg);
					if(switchlang=="en")
						window.location = "http://ep-test.edit-place.co.uk";
					else
						window.location = "http://ep-test.edit-place.com";
				}
			});
		}		
	</script>
'; ?>