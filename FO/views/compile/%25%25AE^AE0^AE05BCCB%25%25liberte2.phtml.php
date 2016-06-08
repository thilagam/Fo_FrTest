<?php /* Smarty version 2.6.19, created on 2014-01-24 07:51:51
         compiled from Client/liberte2.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_decode', 'Client/liberte2.phtml', 206, false),)), $this); ?>
<?php echo '
<script language="javascript"> 
	(function($,W,D)
	{
		var JQUERY4U = {};

		JQUERY4U.UTIL =
		{
			setupFormValidation: function()
			{
				var option=$("input[name=\'optionsRadios\']:checked").val();
				if(option=="option1")
				{
					//form validation rules
					$("#registerformliberte2").validate({
						onkeyup:false,
						rules: {
							email:  {
								required: true,
								email: true,
								remote: "/client/checknewuseremail"
											
							},
							libertepassword: {
								required: true,
								minlength: 6
							},
							liberteconfirmpassword: {
								required: true,
								minlength: 6,
								equalTo:"#libertepassword"
							},
							termscheck: "required"
						},
						messages: {
							email: {
								required:"Merci d\'indiquer une adresse email",
								email:"Merci d\'ins&eacute;rer une adresse email correcte",
								remote:"Cette adresse email existe d&eacute;j&agrave;"
							},
							libertepassword: {
								required:"Merci d\'ins&eacute;rer votre mot de passe",
								minlength:"Le mot de passe doit comporter plus de 6 caract&egrave;res"
							},
							liberteconfirmpassword: {
								required:"Merci de confirmer votre mot de passe",
								minlength:"Le mot de passe doit comporter plus de 6 caract&egrave;res",
								equalTo: "Le mot de passe doit &ecirc;tre le m&ecirc;me"
							},
							termscheck: "Merci de valider les CGU"						
						}
						
					});
			    }
			}
		}

		//when the dom has loaded setup form validation rules
		$(D).ready(function($) {
			JQUERY4U.UTIL.setupFormValidation();
		});

	})(jQuery, window, document);
	
		//Liberte2 form switching
	function switchloginform(opt)
	{
		if(opt=="option1")
		{
			$("#form1fields").show();
			$("#form2fields").hide();
		}
		else if(opt=="option2")
		{
			$("#form1fields").hide();
			$("#form2fields").show();
		}
	}
</script>

'; ?>
	 

<section id="free_form">
 <div class="container">
		<div class="row-fluid">
			<div class="span12" style="position: relative">
				<h1>edit-place <span>Libert&eacute;</span></h1>
				<small>Vous recherchez un journaliste pour travailler sur votre projet de contenu ? <br>D&eacute;posez votre annonce et recevez des devis en moins de 24h</small>
				<div class="freequote"></div>
				<div id="state">
					<ul class="unstyled">
						<li rel="tooltip" title="D&eacute;pôt de votre projet">
							<span>
									Cr&eacute;ation de l'annonce
							</span>
						</li>
						<li class="hightlight" rel="tooltip" title="Nos journalistes visualisent votre annonce et vous recevez des devis"><span class="online">Diffusion de l'annonce sur edit-place</span></li> 
						<li rel="tooltip" title="S&eacute;lectionnez celui qui travaillera sur votre projet"><span class="writer_select">Choix du journaliste</span></li>
					</ul>
				</div>
				<div class="row-fluid">   
					<div class="span8">
							<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button>
								<h4>Derni&egrave;re &eacute;tape !</h4> La cr&eacute;ation d'un compte edit-place est indispensable pour soumettre votre annonce et recevoir vos devis !
							</div>
							<div class="border">
							   <!-- form, start --> 
								
									<fieldset>
										<legend>Mon compte</legend>  
										<label class="radio inline">
											<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked onclick="switchloginform('option1');">
											<strong>Nouveau ? Je cr&eacute;e un compte</strong> 
										</label>
										<label class="radio inline">
											<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" onclick="switchloginform('option2');">
											J'ai d&eacute;j&agrave; un compte chez edit-place
										</label>
										<hr>  
										<div id="form1fields">
											<form method="POST" name="registerformliberte2" id="registerformliberte2" action="/client/liberte3">
											<label>Adresse email</label>
											<input type="text" placeholder="" class="span12" name="email" id="email" >
											
											<div class="controls controls-row">
												<div class="span6">
													<label>Cr&eacute;er un mot de passe</label>
													<input type="password" class="span12" placeholder="" name="libertepassword" id="libertepassword">
												</div>
												<div class="span6">
													<label>Confirmez votre mot de passe</label>
													<input type="password" class="span12" placeholder="" name="liberteconfirmpassword" id="liberteconfirmpassword">
												</div>
											</div>
								 
											<label class="checkbox">
											<input type="checkbox" name="termscheck" id="termscheck">J'accepte les <a href="#termsliberte" data-toggle="modal">conditions g&eacute;n&eacute;rales d'utilisation Edit-Place </a></input>
											<label class="error" for="termscheck" generated="true"></label>
											</label>
											<input type="hidden" name="newuser" id="newuser" value="1" />
											<br>
											<legend>Que se passe t-il ensuite ?</legend><br> 
											<ol>
												<li>Mon annonce sera v&eacute;rifi&eacute;e, valid&eacute;e puis mise en ligne par Edit-place au plus tard le &agrave; <span class="label label-inverse"><?php echo $this->_tpl_vars['onlinelimit']; ?>
</span></li>
												<li>Je recevrai des devis jusqu'au <span class="label label-inverse" id="participationlimit"><?php echo $this->_tpl_vars['participationlimit']; ?>
</span></li>
												<li>Je pourrai s&eacute;lectionner le meilleur r&eacute;dacteur pour r&eacute;aliser mon projet</li>
											</ol> 
											<br>
											<button type="submit" name="register_client" class="btn btn-large btn-primary" value="submit">Valider et diffuser mon annonce</button>
											</form>
										</div>
										
										<div id="form2fields" style="display:none;"> 
											<form method="POST" name="registerform" id="registerform" action="/client/liberte3">
											<label>Email</label>
											<input type="text" placeholder="" class="span12" name="loginemail" id="loginemail" style="width:350px;">
												<div class="error" id="emailerrlib2"></div>
											<div class="controls controls-row">
												<div class="span6">
													<label>Mot de passe</label>
													<input type="password" class="span12" placeholder="" name="loginpassword" id="loginpassword">
													<div class="error" id="passerrlib2"></div>
												</div>
											</div>
											<!-- forgot password-->
											<label class="checkbox">
												<input type="checkbox" data-toggle="collapse" data-target="#forgotpwdmail" name="forgotpwd" id="forgotpwd">Mot de passe oubli&eacute;?
											</label>
											<div id="forgotpwdmail" class="collapse out">
												<div class="controls controls-row container-field">
													<input type="text" name="forgotemail" id="forgotemail" value="<?php echo $this->_tpl_vars['forgotemail']; ?>
"> 
													<div style="display:inline-block;vertical-align:top">
														<button type="button" name="forgot_sendmail" class="btn btn-small btn-primary" value="Send Mail" onClick="return forgotpasswordmail();">R&eacute;initialiser le mot de passe</button>
													</div>
													<br>
													<span id="forgot_text"></span>
													
												</div>
											</div>
											
											<input type="hidden" name="newuser" id="newuser" value="0" />
											<br>
											<legend>Que se passe t-il ensuite ?</legend><br>
											<ol>
												<li>Mon annonce sera v&eacute;rifi&eacute;e, valid&eacute;e puis mise en ligne par Edit-place au plus tard le <span class="label label-inverse"><?php echo $this->_tpl_vars['onlinelimit']; ?>
</span></li>
												<li>Je recevrai des devis jusqu'au <span class="label label-inverse"><?php echo $this->_tpl_vars['participationlimit']; ?>
</span></li>
												<li>Je pourrai s&eacute;lectionner le meilleur r&eacute;dacteur pour r&eacute;aliser mon projet</li>
											</ol> 
											<br>
											<button type="submit" name="register_client" class="btn btn-large btn-primary" value="submit" onClick="return validate_liberte2();">Valider et diffuser mon annonce</button>
											</form>
										</div>
											
									</fieldset>
								</form>    
							 <!-- form, end -->   
							</div>
					</div>
				
					<div class="span3">
					<!--  right column  -->
						<aside>
							<div class="alert alert-success clearfix">
								<?php if ($this->_tpl_vars['navigate'] == 1): ?>
									<h4>Projet enregistr&eacute;</h4><br>
									<i class="icon-ok"></i> <?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
<br>
									<a href="/client/liberte1" class="btn btn-link pull-right" style="color:#000000;">Retourner en &eacute;tape 1 </a>
								<?php endif; ?>
							</div>
							<div id="garantee">
								<h3>Vos garanties</h3>
								<dl>
								<dt><span class="umbrella"></span>edit-place est votre m&eacute;diateur</dt>
								<dd>En cas de contestation (d&eacute;lai de livraison, reprise d'articles, remboursement...)</dd>
								<dt><span class="locked"></span>Paiement s&eacute;curis&eacute;</dt>
								<dd>Notre solution de paiement en ligne vous garantit une transaction en toute tranquillit&eacute;</dd>
								</dl>
							</div>
						</aside>  
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<div id="termsliberte" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h3 id="myModalLabel">Votre contrat</h3>
	</div>
	<div class="modal-body " style="text-align:justify">
			<h4 style="text-align:center;">Conditions g&eacute;n&eacute;rales de mandat</h4> 
			<h4 style="text-align:center;">Edit-place.com</h4>
		<div class="pre-scrollable" style="padding-right:5px">	
			<h4><u>Article 1 - Pr&eacute;sentation du site et du service</u></h4>
			<p>Le site <a href="www.edit-place.com">www.edit-place.com</a> (le «  Site »)   est &eacute;dit&eacute; par la soci&eacute;t&eacute; Edit-place.com (la « Edit-Place»), SARL au capital de 20140 euros immatricul&eacute; au registre du commerce et des soci&eacute;t&eacute;s de Bobigny sous le num&eacute;ro B 521 287 193, et dont le si&egrave;ge social se situe 16 Rue Jesse Owens, 93210 La Plaine-Saint-Denis.  Son num&eacute;ro de TVA intracommunautaire est le FR43-521287193.</br>
			Le service client est accessible de 10h &agrave; 17h au 01 77 68 64 62 (sauf week-end et jours f&eacute;ri&eacute;s) et par mail &agrave; l'adresse : <a href="mailto:contact@edit-place.com">contact@edit-place.com</a></br>
			Le directeur de la publication est : Julien Wolff</p>
			<p>Le Site a pour objet de mettre &agrave; disposition des internautes un service de mise en relation (le « Service ») entre des &eacute;diteurs (le « Client ») recherchant du contenu &eacute;crit et des r&eacute;dacteurs g&eacute;n&eacute;ralistes ou sp&eacute;cialis&eacute;s ayant r&eacute;dig&eacute; des contenus, en vue de leur publication sur les sites des &eacute;diteurs.</p> 
			<p>Le Client a souscrit aux Conditions G&eacute;n&eacute;rales d'Utilisation du Service aux fins de la cr&eacute;ation d'un compte et d&eacute;clare connaître parfaitement le Service et ses modalit&eacute;s de fonctionnement.</p>
			<p>Le Client accepte les pr&eacute;sentes Conditions G&eacute;n&eacute;rales de Mandat (CGM), applicables en sus des conditions d'utilisation du service, au moment où il &eacute;met une offre de r&eacute;daction de contenu et forment ensemble le Contrat. Les CGM sont disponibles &agrave; l'adresse suivante : <a href="www.edit-place.com/cgm">www.edit-place.com/cgm</a></p>
			<p>Les CGM pourront être modifi&eacute;es, et s'appliqueront &agrave; toute nouvelle offre. Dans ce cas, la Soci&eacute;t&eacute; s'engage &agrave; publier un avertissement sur le Site mentionnant l'existence de modifications durant une p&eacute;riode de un mois &agrave; compter de la mise en ligne des nouvelles CGM.</p> 

			<h4><u>Article 2 : Mandat et Prestations de service connexes :</u></h4>
			<p>Le Client confie par les pr&eacute;sentes, mandat &agrave; la Soci&eacute;t&eacute;, qui l'accepte, de :</p> 
			<ul style="list-style:none;padding-left:10px;">
			<li><div style="width:100%;float:left;"><div style="width:1%;float:left;">- </div><div style="width:98%;float:right;">diffuser son offre  visant &agrave; acqu&eacute;rir un contenu sur le Service, &agrave; titre exclusif, selon les modalit&eacute;s pr&eacute;vues sur le site en vertu des conditions g&eacute;n&eacute;rales d'utilisation ;</div></div></li>
			<li><div style="width:100%;float:left;"><div style="width:1%;float:left;">- </div><div style="width:98%;float:right;">pr&eacute;s&eacute;lectionner les R&eacute;dacteurs ayant manifest&eacute; leur int&eacute;rêt pour l'offre ;</div></div></li>
			<li><div style="width:100%;float:left;"><div style="width:1%;float:left;">- </div><div style="width:98%;float:right;">S&eacute;lectionner le contenu ad&eacute;quat en fonction des crit&egrave;res pr&eacute;d&eacute;termin&eacute;s, &agrave; titre exclusif ;</div></div></li>
			<li><div style="width:100%;float:left;"><div style="width:1%;float:left;">- </div><div style="width:98%;float:right;">Obtenir la cession de certains droits d'exploitation &agrave; titre exclusif en vue de la diffusion du contenu sur le site du Client, dans les conditions et limites fix&eacute;es par le contrat de cession joint en annexe aux pr&eacute;sentes ;</div></div></li>
			<li><div style="width:100%;float:left;"><div style="width:1%;float:left;">- </div><div style="width:98%;float:right;">Verser au r&eacute;dacteur du contenu s&eacute;lectionn&eacute; le prix convenu;</div></div></li>
			<li><div style="width:100%;float:left;"><div style="width:1%;float:left;">- </div><div style="width:98%;float:right;">Le cas &eacute;ch&eacute;ant et sur devis, optimiser le r&eacute;f&eacute;rencement du contenu sur les moteurs de recherche et sur Internet en g&eacute;n&eacute;ral</div></div></li>
			<li><div style="width:100%;float:left;"><div style="width:1%;float:left;">- </div><div style="width:98%;float:right;">Le cas &eacute;ch&eacute;ant et sur devis, conseiller le Client sur la d&eacute;finition de son offre</div></div></li>
			</ul>
			<p>Pour les besoins de l'ex&eacute;cution du Mandat, le Client s'engage &agrave; fournir &agrave; la Soci&eacute;t&eacute; les informations relatives &agrave; l'offre dans les conditions suivantes : le sujet du contenu, sa taille (en mots ou en caract&egrave;res), la date &agrave; laquelle il souhaite le recevoir (&eacute;tant pr&eacute;cis&eacute; que qu'une date ant&eacute;rieure sera communiqu&eacute;e aux r&eacute;dacteurs, de façon &agrave; permettre &agrave; la Soci&eacute;t&eacute; d'effectuer la s&eacute;lection et la notification dans le d&eacute;lai r&eacute;ellement imparti par le Client), les sp&eacute;cifications de r&eacute;daction ainsi qu'une fourchette de prix propos&eacute;e aux r&eacute;dacteurs. Le Client s'engage &agrave; fournir toutes ces informations avec pr&eacute;cision, et &agrave; d&eacute;finir une fourchette de prix en accord avec les tarifs d'usage. Le Client  reconnaît que la fixation d'un prix trop bas peut entraîner la s&eacute;lection d'un contenu de moindre qualit&eacute; ou la non-participation des r&eacute;dacteurs.</p>

			<h4><u>Article 3 – Obligations du Client :</u></h4> 
			<p>Les offres mises en ligne par le Client sur le Service constituent juridiquement une invitation &agrave; entrer en pourparlers avec les diff&eacute;rents r&eacute;dacteurs. Le client s'engage n&eacute;anmoins &agrave; ce que les pourparlers aboutissent avec un des r&eacute;dacteurs int&eacute;ress&eacute;s.</br> 
			Les offres mises en ligne par le Client et diffus&eacute;es sur le Service ne pourront être annul&eacute;es, sauf dans le cas manifeste d'un dysfonctionnement technique imputable &agrave; la Soci&eacute;t&eacute; ou d'une erreur manifeste de manipulation commise par l'Utilisateur et reconnue comme telle par la Soci&eacute;t&eacute;. Le Client mettant en ligne une offre de contenu s'engage &agrave; la maintenir pendant une dur&eacute;e raisonnable afin qu'un R&eacute;dacteur puisse se manifester. L'offre mise en ligne est retir&eacute;e par la Soci&eacute;t&eacute; d&egrave;s que le contenu est s&eacute;lectionn&eacute;, et en tout cas 2 jours avant la date de livraison souhait&eacute;e par le Client.</br>
			En cas d'annulation, et d&egrave;s lors qu'un R&eacute;dacteur s'est d&eacute;clar&eacute; int&eacute;ress&eacute; et/ou a fait l'objet d'une pr&eacute;s&eacute;lection par la Soci&eacute;t&eacute;, le paiement reste acquis &agrave; la Soci&eacute;t&eacute;. Dans ce cas, et en fonction de l'&eacute;tat d'avancement de la r&eacute;daction du contenu, la Soci&eacute;t&eacute; pourra proc&eacute;der au paiement du prix sollicit&eacute; par le r&eacute;dacteur, qui conserve n&eacute;anmoins l'enti&egrave;re propri&eacute;t&eacute; intellectuelle sur son contenu.</p>
			<p>Le Client s'engage &agrave; ce que son offre soit en tout point conforme &agrave; la r&eacute;glementation et ne porte en aucun cas atteinte aux droits des tiers. A d&eacute;faut, l'offre pourrait être retir&eacute;e sans d&eacute;lai du Service, sans droit &agrave; remboursement.</p> 
			<p>Le Client s'engage &agrave; exploiter le contenu conform&eacute;ment &agrave; la cession de droit dont le mod&egrave;le figure <b>en annexe 1 des pr&eacute;sentes CGM</b> et garantit la Soci&eacute;t&eacute; contre toute condamnation de ce fait, y compris les frais de l'article 700 du code de proc&eacute;dure civile.</p>
			<p>Le Client s'abstiendra de contacter les R&eacute;dacteurs en dehors du Service, ce que la Soci&eacute;t&eacute; se r&eacute;serve le droit de contrôler sur le Service. A d&eacute;faut, l'offre pourrait être retir&eacute;e sans d&eacute;lai du Service, sans droit &agrave; remboursement.</p>
			<p>Le Client garantit quant &agrave; lui ne pas d&eacute;tourner l'application de l'article L 7111-3 du Code du travail en utilisant le Service et garantit la Soci&eacute;t&eacute; de ce fait.</p>

			<h4><u>Article 4 – Obligation de la Soci&eacute;t&eacute; :</u></h4>
			<p>Le Service fonctionne 24 heures sur 24 et 7 jours sur 7. La Soci&eacute;t&eacute; se r&eacute;serve le droit, &agrave; tout moment, de modifier, de suspendre ou d'interrompre temporairement le fonctionnement du Site, pour des raisons de maintenance et d'&eacute;volution technique, outre les cas de panne r&eacute;seau et autre hypoth&egrave;se d'indisponibilit&eacute; du site hors du contrôle de la Soci&eacute;t&eacute;.</p>  
			<p>L'offre du Client est mise en ligne sur le Service par la Soci&eacute;t&eacute; &agrave; r&eacute;ception du paiement.</p> 
			<p>Le client reconnaît express&eacute;ment que (i) la pr&eacute;-s&eacute;lection des r&eacute;dacteurs est effectu&eacute;e discr&eacute;tionnairement par Edit-Place, grâce &agrave; l'expertise de cette derni&egrave;re en la mati&egrave;re,  (ii) que  les contenus r&eacute;dig&eacute;s sont &eacute;valu&eacute;s au fur et &agrave; mesure de leur envoi par le comit&eacute; de lecture du Site (iii) qu'en cons&eacute;quence le premier contenu pr&eacute;sentant les caract&eacute;ristiques requises sera s&eacute;lectionn&eacute;. Cette m&eacute;canique de s&eacute;lection a pour objectif d'&eacute;viter aux r&eacute;dacteurs de r&eacute;pondre &agrave; des offres sur lesquelles des contenus de qualit&eacute; satisfaisantes ont d&eacute;j&agrave; &eacute;t&eacute; transmis, et de permettre aux clients de recevoir le contenu souhait&eacute; dans les plus brefs d&eacute;lais.</p>
			<p>Le Client reconnait et accepte que la s&eacute;lection du contenu s'op&egrave;re, apr&egrave;s v&eacute;rification du contenu avec un outil automatis&eacute; anti-plagiat, sur les crit&egrave;res de (i) correction orthographique et grammaticale (ii) respect du cahier des charges de l'appel d'offre (iii) pertinence et profondeur du contenu (iv) prix propos&eacute; par le r&eacute;dacteur.</p>
			<p>La Soci&eacute;t&eacute; obtient du r&eacute;dacteur la validation en ligne du contrat de cession de droits d'exploitation, lors de la soumission de son contenu, ce contrat de cession entrant en vigueur au jour de la s&eacute;lection du Contenu. Le Client accepte express&eacute;ment ce formalisme de cession. </p>

			<h4><u>Article 5 – Paiement</u></h4>
			<p>En contrepartie des services rendus dans le cadre du pr&eacute;sent mandat, le Client accepte de r&eacute;mun&eacute;rer la Soci&eacute;t&eacute; &agrave; hauteur de 50 % de la somme globale par lui vers&eacute;e sur le Service, commissions bancaires incluses, le montant restant &eacute;tant vers&eacute;s au R&eacute;dacteur. Le montant des commissions bancaires incluses sont d&eacute;taill&eacute;es sur le Service. A la mise en ligne de l'offre, le Client verse 10% du montant maximum de la fourchette de prix indiqu&eacute;e sur l'offre.</br>
			Le paiement intervient par carte bancaire via le Service, dans la limite de 500 Euros. D&egrave;s que le contenu est s&eacute;lectionn&eacute;, le Client notifi&eacute; verse le solde du prix par carte bleue. Alternativement, le paiement peut intervenir, sur accord de la Soci&eacute;t&eacute;, par ch&egrave;que ou virement, &agrave; r&eacute;ception de la facture &eacute;mise par la Soci&eacute;t&eacute; r&eacute;capitulant les contenus s&eacute;lectionn&eacute;s et prix accept&eacute;s par les R&eacute;dacteurs sur le Service.</br>
			En cas de remise en cause du paiement pour quelque raison que ce soit, et de convention expresse avec le client, ce dernier autorise la Soci&eacute;t&eacute; &agrave; transmettre au r&eacute;dacteur s&eacute;lectionn&eacute; les coordonn&eacute;es du Client d&eacute;faillant, de nature &agrave; permettre au r&eacute;dacteur d'exercer ses voies de recours.</p>

			<h4><u>Article 6 – R&eacute;siliation</u></h4>
			<p>Le Contrat peut être r&eacute;sili&eacute; par la Soci&eacute;t&eacute; quinze jours apr&egrave;s une mise en demeure rest&eacute;e infructueuse en cas de manquement grave dans l'ex&eacute;cution des obligations par le Client, sans pr&eacute;judice des dommages et int&eacute;rêts auxquels la Soci&eacute;t&eacute; pourrait pr&eacute;tendre. Dans ce cas, son offre pourra être imm&eacute;diatement retir&eacute;e du Service, les sommes perçues restant acquises &agrave; la Soci&eacute;t&eacute; &agrave; l'&eacute;ch&eacute;ance de quinze jours.</p>

			<h4><u>Article 7 – Responsabilit&eacute;</u></h4>
			<p>La Soci&eacute;t&eacute; apporte le plus grand soin &agrave; la qualit&eacute; de son service. Elle ne saurait toutefois voir sa responsabilit&eacute; engag&eacute;e dans les cas suivants, et ceci de façon non limitative: </p>
			<ul style="list-style:none;padding-left:10px;">
			<li><div style="width:100%;float:left;"><div style="width:1%;float:left;">- </div><div style="width:98%;float:right;">Absence de r&eacute;ponse &agrave; l'offre &eacute;mise</div></div></li> 
			<li><div style="width:100%;float:left;"><div style="width:1%;float:left;">- </div><div style="width:98%;float:right;">qualit&eacute; de contenu insuffisante selon l'appr&eacute;ciation du Client</div></div></li> 
			<li><div style="width:100%;float:left;"><div style="width:1%;float:left;">- </div><div style="width:98%;float:right;">S&eacute;lection par le Comit&eacute; de Lecture d'un contenu envoy&eacute; par un r&eacute;dacteur en violation des droits de propri&eacute;t&eacute; intellectuelle d'un Tiers, ou encore obsol&egrave;te, incomplet ou erron&eacute;</div></div></li> 
			<li><div style="width:100%;float:left;"><div style="width:1%;float:left;">- </div><div style="width:98%;float:right;">Interruption partielle ou totale, ou temporaire du fonctionnement du Site;</div></div></li> 
			</ul>
			<p>Dans l'ex&eacute;cution de son mandat et des prestations qu'elle propose, la Soci&eacute;t&eacute; est soumise &agrave; une obligation de moyens.</p> 
			<p>De façon g&eacute;n&eacute;rale, sauf disposition contraire imp&eacute;rative, la Soci&eacute;t&eacute; ne fournit aucune garantie expresse ou implicite autre que celles pr&eacute;vues dans le pr&eacute;sent contrat. La Soci&eacute;t&eacute; exclut en particulier toute garantie quant &agrave; l'exhaustivit&eacute; du contenu s&eacute;lectionn&eacute;, sa qualit&eacute; et/ou son adaptation &agrave; un besoin particulier.</p> 
			<p>La mise en cause de la responsabilit&eacute; de la Soci&eacute;t&eacute; au titre du Service exclut les dommages indirects, notamment un &eacute;ventuel pr&eacute;judice commercial, perte de donn&eacute;es, perte de chance de gain ou perte de temps. Plus g&eacute;n&eacute;ralement, la responsabilit&eacute; de la Soci&eacute;t&eacute; ne saurait être engag&eacute;e que sur faute prouv&eacute;e, dans un d&eacute;lai maximum de 6 mois &agrave; compter de la mise en ligne de l'offre du Client.
			<p>Si la responsabilit&eacute; de la soci&eacute;t&eacute; &eacute;tait reconnue &agrave; l'&eacute;gard du Client, celle-ci ne pourrait respectivement exc&eacute;der la somme vers&eacute;e par le Client au titre de l'offre ayant donn&eacute; lieu au fait g&eacute;n&eacute;rateur de responsabilit&eacute;.
			<p>Le client quant &agrave; lui garantit la Soci&eacute;t&eacute; s'engage &agrave; l'indemniser pour tous dommages, r&eacute;clamations, et condamnations (y compris les frais de l'article 700 du code de proc&eacute;dure civile) intervenus en raison de leur utilisation du Service.</p> 

			<h4><u>Article 8. Dispositions diverses</u></h4>
			<p>Le Client autorise express&eacute;ment la Soci&eacute;t&eacute; &agrave; reproduire sa marque sur le site de la Soci&eacute;t&eacute; dans la liste de ses partenaires, toute autre communication devant être pr&eacute;alablement valid&eacute;e par le Client.
			<p>De convention expresse entre les Parties, le Client reconnait que les donn&eacute;es figurant sur les syst&egrave;mes informatiques de la Soci&eacute;t&eacute;, ainsi que les contrats et courriers &eacute;lectroniques conserv&eacute;s sur les syst&egrave;mes informatiques de la Soci&eacute;t&eacute; font foi entre les parties et &agrave; l'&eacute;gard des r&eacute;dacteurs, sauf preuve contraire constat&eacute;e par huissier.
			<p>L'annulation d'une des dispositions des pr&eacute;sentes CGU n'emporte pas la nullit&eacute; de l'ensemble. Toutes les dispositions non annul&eacute;es ont vocation &agrave; rester en vigueur, les parties se concertant pour remplacer les dispositions annul&eacute;es. Les titres des articles figurant dans les CGM sont uniquement stipul&eacute;s &agrave; titre indicatif et n'ont aucune incidence sur l'interpr&eacute;tation du Contrat.
			<p>Force majeure : la Soci&eacute;t&eacute; sera lib&eacute;r&eacute;e de ses obligations en cas de force majeure. La force majeure se d&eacute;finit comme tout &eacute;v&egrave;nement ext&eacute;rieur aux parties, impr&eacute;visible et insurmontable.
			<p>Les pr&eacute;sentes CGU sont r&eacute;gies par le droit français. 
			<p>Toute r&eacute;clamation li&eacute;e &agrave; l'utilisation du Site pourra être envoy&eacute;e &agrave; l'adresse suivante contact@edit-place.com</br> 
			Dans l'hypoth&egrave;se où les parties ne trouveraient pas de solution amiable &agrave; leur litige, elles d&eacute;cident d'ores et d&eacute;j&agrave; de soumettre leur diff&eacute;rend aux tribunaux comp&eacute;tents du ressort de la cour d'appel de Paris.</p>

			<strong>Version n&deg;1 en date du 13/12/11</strong> 
			</br>
			</br>
			<strong>ANNEXE 1 MODELE TYPE DE CONTRAT DE CESSION DE DROITS</strong> 
			</br>
			</br>
			<strong style="text-align:center;">CONTRAT DE CESSION</strong>
			<p>Entre les soussign&eacute;s :</p>
			<p>Nom:     <?php echo $this->_tpl_vars['name']; ?>
</br>
			Pr&eacute;nom: <?php echo $this->_tpl_vars['fname']; ?>
</br>
			Adresse: <?php echo $this->_tpl_vars['street']; ?>
</br>
			Ci-dessous d&eacute;nomm&eacute; «le R&eacute;dacteur»,</p>
			<p>D'une part,</p>
			<p>et</p> 
			<p>La soci&eacute;t&eacute; Edit-place.com, Soci&eacute;t&eacute; au capital de 20140 Euros</br>
			Immatricul&eacute;e au RCS de Bobigny sous le num&eacute;ro B 521 287 193, </br>
			Dont le si&egrave;ge social est situ&eacute; 16 Rue Jesse Owens 93200 ST DENIS,</br>
			Prise en la personne de son repr&eacute;sentant l&eacute;gal domicili&eacute; audit si&egrave;ge en cette qualit&eacute;,</p>
			<p>Ci-dessous  d&eacute;nomm&eacute;e « la Soci&eacute;t&eacute;»,</p> 
			<p>D'autre part,</p>
			<p>ÉTANT PRÉALABLEMENT RAPPELÉ QUE :</p> 
			<p>La Soci&eacute;t&eacute; a pour principale activit&eacute; de mettre en relation des &eacute;diteurs recherchant du Contenu &eacute;crit (ci-apr&egrave;s le « Client »), le cas &eacute;ch&eacute;ant optimis&eacute; pour le r&eacute;f&eacute;rencement naturel, et des R&eacute;dacteurs susceptibles de leur fournir ce Contenu (ci-apr&egrave;s le « Service »).</br>
			Ce Service est propos&eacute; sur le site : <a href="www.edit-place.com">www.edit-place.com</a></br>
			La Soci&eacute;t&eacute; contracte aux termes des pr&eacute;sentes, dans le cadre du Service, au nom et pour le compte du Client souhaitant acqu&eacute;rir les droits d'exploitation sur le Contenu transmis par le R&eacute;dacteur, sous condition de s&eacute;lection de ce dernier par le comit&eacute; de lecture conform&eacute;ment aux conditions g&eacute;n&eacute;rales d'utilisation, et dans les conditions ci-apr&egrave;s d&eacute;finies.</p>
			<p>IL A ETE CONVENU CE QUI SUIT :</p>
			<p>Article 1 – Objet</p>
			<p>Le R&eacute;dacteur, qui d&eacute;clare b&eacute;n&eacute;ficier de sa pleine capacit&eacute; juridique et / ou des pouvoirs n&eacute;cessaires &agrave; signer le pr&eacute;sent contrat de cession de droit, et pour autant que le(s) Contenu(s) pr&eacute;sente(nt) l'originalit&eacute; requise, c&egrave;de &agrave; titre exclusif &agrave; la Soci&eacute;t&eacute;, qui accepte pour lui-même et ses ayants droit, les droits d'exploitation ci-apr&egrave;s d&eacute;finis, aff&eacute;rents au(x) Contenu(s) (ci-apr&egrave;s d&eacute;nomm&eacute; «Contenu») qui ont pour nom de fichier et/ou pour titre :</p>
			<p>- XXXX</p> 
			<p>La pr&eacute;sente cession comporte, ainsi, pour la Soci&eacute;t&eacute;, le droit d'exploiter directement ou indirectement le Contenu  ci-dessus d&eacute;crit, ou de c&eacute;der les droits suivants:</p>
			<p>Pour les droits d'adaptation et de reproduction :</p>
			<p>- Le droit de num&eacute;riser, enregistrer et reproduire le Contenu sur tout r&eacute;seau num&eacute;rique, c'est-&agrave;-dire tout r&eacute;seau informatique, internet, WAP, mobile, intranet ;</p>
			<p>- Le droit de reproduire le Contenu et de l'adapter sous forme d'&eacute;dition &eacute;lectronique, en particulier en c&eacute;d&eacute;rom, CD-photo, CD-I, ou tout autre proc&eacute;d&eacute; analogue ou &agrave; venir ;</p>
			<p>- Le droit de reproduire tout ou partie du Contenu et de l'adapter et sur les terminaux de lecture et les r&eacute;seaux num&eacute;riques, &eacute;lectroniques ou optom&eacute;triques, en particulier sur les r&eacute;seaux internet et les serveurs d'information Web, WAP, disques dur d'ordinateurs, serveurs,  tablettes, les assistants &eacute;lectroniques , t&eacute;l&eacute;phones portables et smartphone ou tout autre appareil permettant de stocker des donn&eacute;es num&eacute;ris&eacute;es existant et &agrave; venir ;</p> 
			<p>-	Le droit d'adapter le Contenu aux r&egrave;gles d'optimisation du r&eacute;f&eacute;rencement naturel sur Internet, de mani&egrave;re &agrave; permettre une apparition du Contenu dans les principaux moteurs de recherche en fonction des requêtes des internautes.</p>
			<p>Pour le droit de repr&eacute;sentation :</p>
			<p>- le droit de communiquer et de mettre &agrave; la disposition du public le Contenu ou ses adaptations, de traduire en toutes langues et en tous pays, par tous proc&eacute;d&eacute;s de diffusion des paroles, des sons et des images, notamment par les r&eacute;seaux num&eacute;riques, &eacute;lectroniques ou optom&eacute;triques, en particulier sur les r&eacute;seaux internet et les serveurs d'information Web, WAP, r&eacute;seaux mobiles, applications iPhone ou iPad ou par tout autre proc&eacute;d&eacute; analogue ou &agrave; venir.</p>
			<p>- Toute diffusion par tout moyen de t&eacute;l&eacute;communication, notamment par voie hertzienne, par satellite, par t&eacute;l&eacute;diffusion et par tout moyen de cablo-distribution.</p>
			<p>- La repr&eacute;sentation du Contenu en tout ou partie, dans toute manifestation publique, festival, salon, manifestation &agrave; vocation culturelle, d'information, professionnelle ou commerciale.</p>
			<p>La pr&eacute;sente cession est consentie dans le dessein principal de permettre l'acc&egrave;s du public au Contenu sur Internet, et ce, notamment sur les sites et/ou applications du Client et de ses partenaires actuels ou futurs.</p>

			<p>Article 2 - Dur&eacute;e de la cession et renouvellement</p>
			<p>La pr&eacute;sente cession est consentie pour avoir effet en tous lieux, pour tous les pays et toutes les langues, et pour une dur&eacute;e de quinze (15) ann&eacute;es cons&eacute;cutives &agrave; compter de l'acceptation de la contribution de l'auteur. </p>
			<p>Sauf manifestation expresse des parties en sens contraire, le pr&eacute;sent contrat fera l'objet d'une tacite reconduction &agrave; l'expiration de la p&eacute;riode de quinze (15) ann&eacute;es mentionn&eacute;e &agrave;  l'alin&eacute;a pr&eacute;c&eacute;dent. </br>
			Ce renouvellement tacite se fera par p&eacute;riodes de quinze (15) ann&eacute;es, dans la limite de la dur&eacute;e l&eacute;gale des droits d'auteur.</p>
			<p>Il est express&eacute;ment convenu que le Client aura rempli ses obligations lorsque le Contenu s&eacute;lectionn&eacute; aura &eacute;t&eacute; accessible pendant une dur&eacute;e de 3 mois cons&eacute;cutifs sur les r&eacute;seaux num&eacute;riques, sauf en cas d'information obsol&egrave;te permettant au Client de proc&eacute;der &agrave; son retrait pr&eacute;alablement.</p>

			<p>Article 3 – Exclusivit&eacute; et notification de cessions ult&eacute;rieures</p>
			<p>Le R&eacute;dacteur s'engage &agrave; ne pas c&eacute;der  &agrave;  nouveau les droits d'exploitation aff&eacute;rents &agrave; ce Contenu.
			Le R&eacute;dacteur s'engage par ailleurs &agrave; informer pr&eacute;alablement le Client cessionnaire et la Soci&eacute;t&eacute; de tout projet de cession d'autres droits d'exploitation sur ledit Contenu &agrave; quelque tiers que ce soit.</br>
			Cette notification pr&eacute;alable du r&eacute;dacteur &agrave; la Soci&eacute;t&eacute; d'un projet de cession de droits s'effectuera par l'envoi d'un message via l'espace de discussion mis &agrave; disposition des r&eacute;dacteurs et &eacute;diteurs sur le Service, doubl&eacute; d'un message adress&eacute; directement &agrave; Edit-Place.</br>
			Le Client, &agrave; compter de la r&eacute;ception de cette notification, disposera d'un d&eacute;lai de 10 jours ouvr&eacute;s pour formuler ses observations, et le cas &eacute;ch&eacute;ant s'opposer au projet s'il estime que les droits lui ont d&eacute;j&agrave; &eacute;t&eacute; c&eacute;d&eacute; en exclusivit&eacute;, ou solliciter la cession des droits d'exploitation envisag&eacute;e moyennant paiement.</p>
			<p>A d&eacute;faut de r&eacute;ponse dans le d&eacute;lai imparti, le Client sera r&eacute;put&eacute;e avoir valid&eacute; le projet de cession soumis par le R&eacute;dacteur.</p>

			<p>Article 4 - R&eacute;mun&eacute;ration du R&eacute;dacteur</p>
			<p>Conform&eacute;ment aux dispositions de l'article L.131-4 alin&eacute;a 1°,2°,3° et 4°, des articles  L. 132-5, L132-6 et suivants du Code de la Propri&eacute;t&eacute; Intellectuelle, les parties conviennent que l'Auteur, en contrepartie de l'acceptation de sa(ses) contribution(s), percevra pour les documents intitul&eacute;s :</p>
			<p>-	XXXX</br>
			-	YYYY</br>
			-	ZZZZZ</p>
			<p>la r&eacute;mun&eacute;ration suivante :</p>
			<p>Versement d'un forfait fixe de XXX Euros comme convenu entre le R&eacute;dacteur et le Client au titre du Contenu XXX</br>
			Versement d'un forfait fixe de YYY Euros comme convenu entre le R&eacute;dacteur et le Client au titre du Contenu YYY</br>
			Versement d'un forfait fixe de ZZZ Euros comme convenu entre le R&eacute;dacteur et le Client au titre du Contenu ZZZ ;</p>
			<p>Cette somme sera cr&eacute;dit&eacute;e sur le compte du R&eacute;dacteur dans les 30 jours suivants la s&eacute;lection du Contenu.</p>
			<p>Le r&eacute;dacteur pourra ensuite la retirer &agrave; sa convenance d&egrave;s lors que son encours de compte aura atteint le seuil minimal de retrait fix&eacute; ci-avant, soit la somme de vingt (20) euros. Si le R&eacute;dacteur ne r&eacute;digeait plus de Contenu s&eacute;lectionn&eacute; pendant un an sur le Service, le prix sera vers&eacute; quel que soit son montant, dans un d&eacute;lai maximum de 30 jours, sur demande adress&eacute;e par mail &agrave; Edit-Place.</p>
			<p>Ces reversements ne s'appliqueront qu'&agrave; compter de la s&eacute;lection dudit document, dont le produit aura d&eacute;finitivement &eacute;t&eacute; encaiss&eacute; par la Soci&eacute;t&eacute;. Toute remise en cause ou d&eacute;faut de paiement du Client relatives aux cessions de Contenu sur le Service entraîneront le non versement du prix au R&eacute;dacteur par la Soci&eacute;t&eacute;. De convention expresse avec le Client, la Soci&eacute;t&eacute; s'engage  &agrave; transmettre au r&eacute;dacteur les coordonn&eacute;es du Client d&eacute;faillant, de nature &agrave; permettre au r&eacute;dacteur d'exercer ses voies de recours.</p>

			<p>Article 5 - Garanties donn&eacute;es par le R&eacute;dacteur</p>
			<p>L'Auteur garantit &agrave; la Soci&eacute;t&eacute; et au Client l'exercice paisible des droits c&eacute;d&eacute;s au titre du pr&eacute;sent contrat.</p>
			<p>Il garantit &eacute;galement &agrave; la Soci&eacute;t&eacute; et au Client sa qualit&eacute; d'auteur de l'œuvre c&eacute;d&eacute;e et il garantit que celle-ci ne fait &agrave; ce jour l'objet d'aucune contestation.</p>
			<p>Au cas où une contestation concernant les droits sur l'œuvre serait &eacute;mise par un tiers, le R&eacute;dacteur s'engage &agrave; apporter &agrave; la Soci&eacute;t&eacute; et au Client, &agrave; sa premi&egrave;re demande, tout son appui judiciaire.</p>
			<p>Le R&eacute;dacteur garantit &agrave; ce titre &agrave; la Soci&eacute;t&eacute; et au Client, la jouissance enti&egrave;re et libre des droits c&eacute;d&eacute;s, contre tous troubles, revendications et &eacute;victions quelconques.</p>
			<p>Il d&eacute;clare express&eacute;ment disposer des droits c&eacute;d&eacute;s par le pr&eacute;sent contrat, et que l'œuvre n'a fait l'objet d'aucun contrat de cession exclusif ou non encore valable.</p>
			<p>Il d&eacute;clare express&eacute;ment que l'œuvre n'entre pas dans le cadre d'un droit de pr&eacute;f&eacute;rence, tel qu'il est d&eacute;sign&eacute; &agrave; l'article L. 132-4 du Code de la propri&eacute;t&eacute; intellectuelle que l'auteur d&eacute;clare parfaitement connaître, accord&eacute; ant&eacute;rieurement par lui &agrave; un &eacute;diteur.</p>
			<p>Le R&eacute;dacteur est &eacute;galement inform&eacute; que la d&eacute;couverte par la Soci&eacute;t&eacute; d'une publication identique du pr&eacute;sent document par contrat de cession aupr&egrave;s d'une autre soci&eacute;t&eacute; pourra donner lieu &agrave; r&eacute;siliation de plein droit du pr&eacute;sent contrat, sur simple notification par tout moyen &agrave; la discr&eacute;tion d'Edit-Place et ou du Client, et sans pr&eacute;judice des dommages et int&eacute;rêts que Edit-Place se r&eacute;serve le droit de solliciter devant les juridictions comp&eacute;tentes.</p>
			<p>L'auteur garantit la Soci&eacute;t&eacute; et le Client contre toute action en contrefaçon qui r&eacute;sulterait de l'existence de contrats de cession de droits sur le pr&eacute;sent document, non r&eacute;v&eacute;l&eacute;s &agrave; la Soci&eacute;t&eacute; &agrave; la signature des pr&eacute;sentes.</p>
			<p>L'auteur garantit que son œuvre est conforme &agrave; la l&eacute;gislation française et toute autre l&eacute;gislation applicable, et notamment les dispositions relatives &agrave; la diffamation et l'injure, &agrave; la vie priv&eacute;e et au droit &agrave; l'image, &agrave; l'autorit&eacute; de la justice, &agrave; la protection morale de la jeunesse, au respect de la pr&eacute;somption d'innocence, &agrave; l'atteinte aux bonnes mœurs ou &agrave; la contrefaçon.</p>
			<p>Il garantit en particulier que son œuvre ne comporte aucun emprunt - même partiel - &agrave; une autre œuvre, emprunt qui serait de nature &agrave; engager la responsabilit&eacute; de la Soci&eacute;t&eacute; et/ou du Client.</p>
			<p>En cas de cession d'une œuvre dite de collaboration, le R&eacute;dacteur garantit &agrave; la Soci&eacute;t&eacute; et au Client qu'il lui c&egrave;de d'un commun accord avec les autres coauteurs les droits d'exploitation de l'œuvre commune. Il garantit &agrave; ce titre &agrave; la Soci&eacute;t&eacute; et au Client l'accord express des coauteurs sur la cession de droits conc&eacute;d&eacute;e.</p>
			<p>Les garanties susmentionn&eacute;es sont - de la commune intention des parties - une condition essentielle et d&eacute;terminante du contrat sans laquelle la pr&eacute;sente convention n'aurait pas &eacute;t&eacute; conclue.</p>
			<p>En cons&eacute;quence de cette garantie, l'auteur s'engage express&eacute;ment, en cas de condamnations prononc&eacute;es &agrave; l'encontre de la Soci&eacute;t&eacute; et du Client par toutes juridictions - notamment civiles ou p&eacute;nales - de r&eacute;gler ou rembourser l'int&eacute;gralit&eacute; des sommes qui pourraient être r&eacute;clam&eacute;es &agrave; la Soci&eacute;t&eacute; et/ou au Client, quelles que soient leur nature (dommages et int&eacute;rêts, frais de publication, d&eacute;pens, indemnit&eacute; due sur le fondement de l'article 700 du Nouveau Code de Proc&eacute;dure Civile, etc.).</p>
			<p>Les obligations, abstentions, garanties ou tout autre fait cr&eacute;ateur de droits au b&eacute;n&eacute;fice de la Soci&eacute;t&eacute; par le pr&eacute;sent contrat, tant implicites qu'explicites, sont express&eacute;ment conf&eacute;r&eacute;es par le R&eacute;dacteur tant &agrave; la Soci&eacute;t&eacute; qu'au Client, &agrave; l'exclusion de la cession des droits d'exploitation, c&eacute;d&eacute;e &agrave; titre exclusif au Client.</br>
			La Soci&eacute;t&eacute; quant &agrave; elle ne souscrit aucune obligation de quelque nature que ce soit &agrave; l'&eacute;gard de l'Auteur, le Client &eacute;tant seul responsable de l'exploitation des droits c&eacute;d&eacute;s conform&eacute;ment au pr&eacute;sent Contrat, et selon les modalit&eacute;s financi&egrave;res d&eacute;finies. </p>

			<p>Article 6 - Clause r&eacute;solutoire</p>
			<p>Faute d'ex&eacute;cution de l'une quelconque des stipulations des pr&eacute;sentes, et quinze jours apr&egrave;s l'envoi d'une lettre recommand&eacute;e avec accus&eacute; de r&eacute;ception rest&eacute;e sans effet, la pr&eacute;sente convention sera r&eacute;solue de plein droit sans qu'il soit besoin d'une formalit&eacute; judiciaire quelconque, aux torts et griefs de la partie d&eacute;faillante, si bon semble &agrave; l'autre partie, sous r&eacute;serve de tous dommages et int&eacute;rêts &eacute;ventuels.</p>

			<p>Article 7 - Ayants droit</p>
			<p>Le pr&eacute;sent contrat, dans son int&eacute;gralit&eacute;, engage les h&eacute;ritiers et tous ayants droit du R&eacute;dacteur, qui devront, dans la mesure du possible, se faire repr&eacute;senter aupr&egrave;s de la Soci&eacute;t&eacute; et/ou du Client par un mandataire commun.</p>

			<p>Article 8 - Responsabilit&eacute;</p>
			<p>De convention expresse entre les parties, l'&eacute;ventuelle responsabilit&eacute; de la Soci&eacute;t&eacute; au titre du contrat ne pourra être engag&eacute;e que sur faute prouv&eacute;e, et dans un d&eacute;lai de 12 (douze) mois suivant l'entr&eacute;e en vigueur du pr&eacute;sent contrat. Les &eacute;ventuels dommages et int&eacute;rêts dus par la Soci&eacute;t&eacute; ne sauraient exc&eacute;der la somme reçue par le R&eacute;dacteur au titre du contrat.</p>
			 
			<p>Article 9 - Entr&eacute;e en vigueur du contrat</p>
			<p>Ce contrat de cession est valid&eacute; par le R&eacute;dacteur &agrave; la date de soumission du Contenu sur le Service, mais son entr&eacute;e en vigueur est conditionn&eacute;e par la s&eacute;lection du document par le Comit&eacute; de lecture, conform&eacute;ment aux Conditions G&eacute;n&eacute;rales d'Utilisation, que le R&eacute;dacteur a express&eacute;ment accept&eacute;es lors de la cr&eacute;ation de son compte pour acc&eacute;der au Service.</p>
			<p>La notification de la s&eacute;lection du Contenu du R&eacute;dacteur est promptement effectu&eacute;e par la Soci&eacute;t&eacute; par courrier &eacute;lectronique et constitue la date d'entr&eacute;e en vigueur du pr&eacute;sent contrat.</p>
			<p>De convention expresse entre les Parties, le R&eacute;dacteur reconnait que les donn&eacute;es figurant sur les syst&egrave;mes informatiques de la Soci&eacute;t&eacute;, ainsi que les contrats et courriers &eacute;lectroniques conserv&eacute;s sur les syst&egrave;mes informatiques de la Soci&eacute;t&eacute; font foi entre les parties, sauf preuve contraire constat&eacute;e par huissier.</p>

			<p>Article 10 - Droit applicable - Attribution de comp&eacute;tence</p>
			<p>Le pr&eacute;sent contrat est soumis au droit français.</p>
			<p>Pour tout litige n&eacute; de l'interpr&eacute;tation ou de l'ex&eacute;cution du pr&eacute;sent contrat, il est fait attribution expresse de juridiction aux tribunaux comp&eacute;tents de Paris.</p>
			</br>
			</br>
			<p>Fait &agrave; Paris,  le XXXXXX</p>
			</br>
			</br>
			<p>Signature du R&eacute;dacteur</p>
		</div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Fermer</button>
		</div>
</div>