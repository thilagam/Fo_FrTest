<?php /* Smarty version 2.6.19, created on 2015-07-29 07:37:37
         compiled from Client/home.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Client/home.phtml', 366, false),array('modifier', 'strlen', 'Client/home.phtml', 511, false),array('modifier', 'truncate', 'Client/home.phtml', 514, false),array('modifier', 'ucfirst', 'Client/home.phtml', 546, false),)), $this); ?>
 <?php echo '
	<script type="text/javascript" charset="utf-8" src="/FO/script/client/countdown.js"></script>
	<script type="text/javascript" charset="UTF-8">
		
	$("#menu_home").addClass("active");
		
		$(function(){
			//Load more activities Homepage
			var loading = $("#loading");
			var target_page, query, now_showing, total_activities;

			//show loading bar
			function showLoading(){
				loading.slideDown("slow");
			}
			//hide loading bar
			function hideLoading(){
				loading.slideUp("slow");
			};

			/*************************** Recent Activities ********************************/
			//update now showing after every click of show more
			function update_now()
			{
				now_showing = parseInt($("#now_showing").attr("value")) + parseInt($("#show_more").attr("value"));
				$("#now_showing").attr("value", now_showing );
				var total_activities=$("#total_activities").val();
				if(now_showing>=total_activities)
					$("#more").hide();
			}
			
			$("#more").click(function(){
				showLoading();
					
				//define target page and query string
				target_page = "/client/loadmoreactivities";
				query = $("#myForm").serialize();

				//send request and append the response data 
				$.get(target_page, query, function(data){
					if(data=="expired")
						window.location="/index/index";
					else
					{	
						now_showing = parseInt($("#now_showing").attr("value")) + parseInt($("#show_more").attr("value"));
						$("#activities").append(data);
						hideLoading();
						update_now();
					}
					});
			});
			
			/*************************** My quotes ********************************/
			function update_myquotes()
			{
				myquotes_showing = parseInt($("#myquotes_showing").attr("value")) + parseInt($("#myquotes_showing").attr("value"));
				$("#myquotes_showing").attr("value", myquotes_showing );
				var total_myquotes=$("#total_myquotes").val();
				if(myquotes_showing>=total_myquotes)
					$("#moremyquotes").hide();
					
				loadparticipationcount();
			}
			
			$("#moremyquotes").click(function(){
				showLoading();
					
				target_page = "/client/loadmoremyquotes";
				query = $("#myQuotesForm").serialize();

				$.get(target_page, query, function(data){
					if(data=="expired")
						window.location="/index/index";
					else
					{	
						myquotes_showing = parseInt($("#myquotes_showing").attr("value")) + parseInt($("#myquotes_showing").attr("value"));
						$("#myquotes").append(data);
						hideLoading();
						update_myquotes();
					}
					});
			});
			
			/*************************** Ongoing quotes ********************************/
			function update_ongoingquotes()
			{
				ongoingquotes_showing = parseInt($("#ongoingquotes_showing").attr("value")) + parseInt($("#ongoingquotes_showing").attr("value"));
				$("#ongoingquotes_showing").attr("value", ongoingquotes_showing );
				var total_ongoingquotes=$("#total_ongoingquotes").val();
				if(ongoingquotes_showing>=total_ongoingquotes)
					$("#moreongoingquotes").hide();
				loadsubmitcount();	
			}
			
			$("#moreongoingquotes").click(function(){
				showLoading();
					
				target_page = "/client/loadmoremyquotes";
				query = $("#ongoingQuotesForm").serialize();

				$.get(target_page, query, function(data){
					if(data=="expired")
						window.location="/index/index";
					else
					{	
						ongoingquotes_showing = parseInt($("#ongoingquotes_showing").attr("value")) + parseInt($("#ongoingquotes_showing").attr("value"));
						$("#ongoingquotes").append(data);
						hideLoading();
						update_ongoingquotes();
					}
					});
			});
			
			/*************************** Published quotes ********************************/
			function update_publishedquotes()
			{
				publishedquotes_showing = parseInt($("#publishedquotes_showing").attr("value")) + parseInt($("#publishedquotes_showing").attr("value"));
				$("#publishedquotes_showing").attr("value", publishedquotes_showing );
				var total_publishedquotes=$("#total_publishedquotes").val();
				if(publishedquotes_showing>=total_publishedquotes)
					$("#morepublishedquotes").hide();
			}
			
			$("#morepublishedquotes").click(function(){
				showLoading();
					
				target_page = "/client/loadmoremyquotes";
				query = $("#publishedQuotesForm").serialize();

				$.get(target_page, query, function(data){
					if(data=="expired")
						window.location="/index/index";
					else
					{	
						publishedquotes_showing = parseInt($("#publishedquotes_showing").attr("value")) + parseInt($("#publishedquotes_showing").attr("value"));
						$("#publishedquotes").append(data);
						hideLoading();
						update_publishedquotes();
					}
					});
			});
			
			/*************************** Closed quotes ********************************/
			function update_closedquotes()
			{
				closedquotes_showing = parseInt($("#closedquotes_showing").attr("value")) + parseInt($("#closedquotes_showing").attr("value"));
				$("#closedquotes_showing").attr("value", closedquotes_showing );
				var total_closedquotes=$("#total_closedquotes").val();
				if(closedquotes_showing>=total_closedquotes)
					$("#moreclosedquotes").hide();
			}
			
			$("#moreclosedquotes").click(function(){
				showLoading();
					
				target_page = "/client/loadmoremyquotes";
				query = $("#closedQuotesForm").serialize();

				$.get(target_page, query, function(data){
					if(data=="expired")
						window.location="/index/index";
					else
					{	
						closedquotes_showing = parseInt($("#closedquotes_showing").attr("value")) + parseInt($("#closedquotes_showing").attr("value"));
						$("#closedquotes").append(data);
							
						hideLoading();
						update_closedquotes();
					}
					});
			});
			
			//////////show timer participation_expires//////////
			loadparticipationcount();
			loadsubmitcount();		
	});
		
		var cur_date=$("#now").val();
		var js_date=(new Date().getTime())/ 1000;
		var diff_date=Math.floor(js_date-cur_date);
		
	function loadparticipationcount()
	{
		$("[id^=\'participationtimer_\']").each(function(){
				var id=this.id;
				var qid=id.split("_");

				$("#participationtimer_"+qid[1]).countdown({
					timestamp	: $("#participationtime_"+qid[1]).val()-(118), 
					callback	: function(days, hours, minutes, seconds){
						var message = "";

						//add days to hours
						if(days!="0")
							message += days + "j" +"&nbsp;";
							//hours=hours+(days*24);
							
						if(hours!="0")
							message += hours + "h" +"&nbsp;";
						
						if(minutes!="0")
							message += minutes + "mn"; 

						$("#participationtimer_"+qid[1]).html(message);
						if(days==0 && hours==0 && minutes==0 && seconds==0)
							$("#participationtimer_"+qid[1]).html("Termin&eacute;");
						
					}
				});
		});
	}	

	function loadsubmitcount()
	{
		$("[id^=\'submittimer_\']").each(function(){
				var id=this.id;
				var qid=id.split("_");

				$("#submittimer_"+qid[1]).countdown({
					timestamp	: $("#submittime_"+qid[1]).val()-(118), 
					callback	: function(days, hours, minutes, seconds){
						var message = "";

						//add days to hours
						if(days!="0")
							message += days + "j" +"&nbsp;";
							//hours=hours+(days*24);
							
						if(hours!="0")
							message += hours + "h" +"&nbsp;";
						
						if(minutes!="0")
							message += minutes + "mn"; 

						$("#submittimer_"+qid[1]).html(message);
						if(days==0 && hours==0 && minutes==0 && seconds==0)
							$("#submittimer_"+qid[1]).html("Termin&eacute;");
						
					}
				});
		});
	}	
	</script>
	
	<style>
	.pre-scrollable {
		max-height: 200px;
	}
	</style>	
 '; ?>

 
	 <div class="container">
    <h3>Bienvenue dans votre espace client !</h3>
    <p>Votre espace client est votre tableau de bord pour recevoir vos devis, sélectionner votre journaliste et télécharger vos contenus.</p>
    <hr>

    <div class="row">   
		<div class="span9">
			<div class="tabbable tabs-left">
				<ul class="nav nav-tabs" id="homeTab">
					<li <?php if ($_GET['type'] != 'new'): ?>class="active"<?php endif; ?>><a href="#hometab1" data-toggle="tab">Activités récentes</a></li>
					<li <?php if ($_GET['type'] == 'new'): ?>class="active"<?php endif; ?>><a href="#hometab2" data-toggle="tab">Mes devis <span class="badge badge-warning pull-right"><?php echo $this->_tpl_vars['myquotescount']; ?>
</span></a></li>
					<li><a href="#hometab3" data-toggle="tab">Mission en cours</a></li>
					<li><a href="#hometab4" data-toggle="tab">Missions validées</a></li>
					<li><a href="#hometab5" data-toggle="tab">Missions fermées</a></li>
				</ul>
				
				<div class="tab-content">
					<!---------------------------------------------- Recent Activities --------------------------------------->
					<div class="tab-pane fade <?php if ($_GET['type'] != 'new'): ?>in active<?php endif; ?>" id="hometab1">
						<section id="timeline">
							<h4 class="shadowline">Activités récentes</h4>
    						<ul class="media-list" id="activities">
								<?php $_from = $this->_tpl_vars['activities']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['activity']):
?>	
									<?php if ($this->_tpl_vars['activity']['type'] != 'comment' || ( $this->_tpl_vars['activity']['type'] == 'comment' && $this->_tpl_vars['activity']['active'] == 'yes' )): ?> 
									<li class="media <?php if ($this->_tpl_vars['activity']['usertype'] == 'client'): ?>client<?php endif; ?> <?php if ($this->_tpl_vars['activity']['type'] == 'bopublish'): ?>editplace-write<?php endif; ?>">
										<?php if ($this->_tpl_vars['activity']['type'] == 'bopublish'): ?>
											<a class="pull-left">
												<img class="media-object" src="/FO/images/ep-feed-logo_90x90.png">
											</a>
										<?php else: ?>
											<a class="pull-left imgframe" <?php if ($this->_tpl_vars['activity']['usertype'] == 'contributor'): ?> onclick="loadcontribprofile('<?php echo $this->_tpl_vars['activity']['activity_by']; ?>
');" data-target="#viewContribProfile" style="cursor:pointer;"<?php endif; ?> role="button" data-toggle="modal" >
												<?php if ($this->_tpl_vars['activity']['usertype'] == 'contributor'): ?>
													<img class="media-object" src="<?php echo $this->_tpl_vars['activity']['profilepic']; ?>
">
												<?php else: ?>
													<div class="media-object container-logo">
														<img class="max" src="<?php echo $this->_tpl_vars['activity']['profilepic']; ?>
">
													</div>
												<?php endif; ?>
											</a>
										<?php endif; ?>
										<div class="media-body">
											<h4 class="media-heading">
											<a  role="button" data-toggle="modal" <?php if ($this->_tpl_vars['activity']['usertype'] == 'contributor'): ?> onclick="loadcontribprofile('<?php echo $this->_tpl_vars['activity']['activity_by']; ?>
');" data-target="#viewContribProfile" style="cursor:pointer;"<?php endif; ?>>
												<?php if ($this->_tpl_vars['activity']['type'] == 'bopublish'): ?>
													Edit-place
												<?php else: ?>
													<?php if ($this->_tpl_vars['activity']['first_name'] != ""): ?>
														<?php echo $this->_tpl_vars['activity']['first_name']; ?>

													<?php else: ?>
														<?php echo $this->_tpl_vars['activity']['email']; ?>

													<?php endif; ?>
												<?php endif; ?>
											</a>
											</h4>
												<?php if ($this->_tpl_vars['activity']['type'] == 'download'): ?>
													a t&eacute;l&eacute;charg&eacute; les articles de la mission <?php if ($this->_tpl_vars['activity']['premium_option'] == '0'): ?>libert&eacute;<?php else: ?>premium<?php endif; ?> "<a class="btn-link" href="/client/quotes?id=<?php echo $this->_tpl_vars['activity']['article_id']; ?>
"><?php echo $this->_tpl_vars['activity']['atitle']; ?>
</a>"
												<?php elseif ($this->_tpl_vars['activity']['type'] == 'invoice'): ?>
													a g&eacute;n&eacute;r&eacute; une facture sur la mission <?php if ($this->_tpl_vars['activity']['premium_option'] == '0'): ?>libert&eacute;<?php else: ?>premium<?php endif; ?> "<a class="btn-link" href="/client/quotes?id=<?php echo $this->_tpl_vars['activity']['article_id']; ?>
"><?php echo $this->_tpl_vars['activity']['atitle']; ?>
</a>"
												<?php elseif ($this->_tpl_vars['activity']['type'] == 'validate'): ?>
													a valid&eacute; la livraison de "<?php echo $this->_tpl_vars['activity']['contribname']; ?>
" sur la mission <?php if ($this->_tpl_vars['activity']['premium_option'] == '0'): ?>libert&eacute;<?php else: ?>premium<?php endif; ?> "<a class="btn-link" href="/client/quotes?id=<?php echo $this->_tpl_vars['activity']['article_id']; ?>
"><?php echo $this->_tpl_vars['activity']['atitle']; ?>
</a>"
												<?php elseif ($this->_tpl_vars['activity']['type'] == 'comment'): ?>
													a comment&eacute; la mission <?php if ($this->_tpl_vars['activity']['premium_option'] == '0'): ?>libert&eacute;<?php else: ?>premium<?php endif; ?> "<a class="btn-link" href="/client/quotes?id=<?php echo $this->_tpl_vars['activity']['article_id']; ?>
"><?php echo $this->_tpl_vars['activity']['atitle']; ?>
</a>"
												<?php elseif ($this->_tpl_vars['activity']['type'] == 'extend'): ?>
													a accord&eacute; plus de temps a "<?php echo $this->_tpl_vars['activity']['contribname']; ?>
" sur la mission <?php if ($this->_tpl_vars['activity']['premium_option'] == '0'): ?>libert&eacute;<?php else: ?>premium<?php endif; ?> "<a class="btn-link" href="/client/quotes?id=<?php echo $this->_tpl_vars['activity']['article_id']; ?>
"><?php echo $this->_tpl_vars['activity']['atitle']; ?>
</a>"
												<?php elseif ($this->_tpl_vars['activity']['type'] == 'resubmit'): ?>
													a demand&eacute; une reprise a "<?php echo $this->_tpl_vars['activity']['contribname']; ?>
" sur la mission <?php if ($this->_tpl_vars['activity']['premium_option'] == '0'): ?>libert&eacute;<?php else: ?>premium<?php endif; ?> "<a class="btn-link" href="/client/quotes?id=<?php echo $this->_tpl_vars['activity']['article_id']; ?>
"><?php echo $this->_tpl_vars['activity']['atitle']; ?>
</a>"
												<?php elseif ($this->_tpl_vars['activity']['type'] == 'refuse'): ?>
													a refus&eacute; la livraison de "<?php echo $this->_tpl_vars['activity']['contribname']; ?>
" sur la mission <?php if ($this->_tpl_vars['activity']['premium_option'] == '0'): ?>libert&eacute;<?php else: ?>premium<?php endif; ?> "<a class="btn-link" href="/client/quotes?id=<?php echo $this->_tpl_vars['activity']['article_id']; ?>
"><?php echo $this->_tpl_vars['activity']['atitle']; ?>
</a>"
												<?php elseif ($this->_tpl_vars['activity']['type'] == 'sentarticle'): ?>
													a envoy&eacute; le ou les articles de la mission <?php if ($this->_tpl_vars['activity']['premium_option'] == '0'): ?>libert&eacute;<?php else: ?>premium<?php endif; ?> "<a class="btn-link" href="/client/quotes?id=<?php echo $this->_tpl_vars['activity']['article_id']; ?>
"><?php echo $this->_tpl_vars['activity']['atitle']; ?>
</a>"
												<?php elseif ($this->_tpl_vars['activity']['type'] == 'quote'): ?>
													a propos&eacute; un tarif pour la mission <?php if ($this->_tpl_vars['activity']['premium_option'] == '0'): ?>libert&eacute;<?php else: ?>premium<?php endif; ?> "<a class="btn-link" href="/client/quotes?id=<?php echo $this->_tpl_vars['activity']['article_id']; ?>
"><?php echo $this->_tpl_vars['activity']['atitle']; ?>
</a>"
												<?php elseif ($this->_tpl_vars['activity']['type'] == 'pollquote'): ?>
													a propos&eacute; un tarif pour le devis premium "<a class="btn-link" href="/client/devispremium?id=<?php echo $this->_tpl_vars['activity']['pollid']; ?>
"><?php echo $this->_tpl_vars['activity']['polltitle']; ?>
</a>"
												<?php elseif ($this->_tpl_vars['activity']['type'] == 'bopublish'): ?> 
													a envoy&eacute; le ou les articles de la mission premium "<a class="btn-link" href="/client/quotes?id=<?php echo $this->_tpl_vars['activity']['article_id']; ?>
"><?php echo $this->_tpl_vars['activity']['atitle']; ?>
</a>"
												<?php endif; ?>
											<p class="muted"><?php echo $this->_tpl_vars['activity']['time']; ?>
</p>
											<?php if ($this->_tpl_vars['activity']['type'] == 'comment'): ?>
											<div class="media comment">
												<i class="icon-comment"></i>
													<?php echo $this->_tpl_vars['activity']['comments']; ?>

												<p><a class="btn-link" href="/client/quotes?id=<?php echo $this->_tpl_vars['activity']['article_id']; ?>
">Tout lire</a></p>
											</div>
											<?php endif; ?> 
										</div>
									</li>
									<?php endif; ?>
								<?php endforeach; endif; unset($_from); ?>
							</ul>
							<?php if ($this->_tpl_vars['activitiescount'] > 10): ?>	
								<p class="btn btn-block btn-mini" id="more">Charger plus d'historiques</p>
							<?php endif; ?>
							<form id="myForm"> 
								<input type="hidden" name="now_showing" id="now_showing" value="<?php echo $this->_tpl_vars['now_showing']; ?>
" />
								<input type="hidden" name="show_more" id="show_more" value="<?php echo $this->_tpl_vars['show_more']; ?>
" />
								<input type="hidden" name="total_activities" id="total_activities" value="<?php echo $this->_tpl_vars['total_activities']; ?>
" />
								<input type="hidden" name="quotetype" id="quotetype" value="all" />
							</form>
						</section>
					</div>
					
					<!---------------------------------------------- My devis --------------------------------------->
					<div class="tab-pane fade <?php if ($_GET['type'] == 'new'): ?>in active<?php endif; ?>" id="hometab2">
						<section>
							<h4>Mes devis</h4>
								<table class="table table-hover">
									<thead>
										<tr>
											<td class="span2">Décompte</td>
											<td>Projet</td>
										</tr>
									</thead>
									<tbody id="myquotes">
										<?php if (count($this->_tpl_vars['myquotes']) > 0): ?>
											<?php $_from = $this->_tpl_vars['myquotes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['quote']):
?>
												<tr>
													<?php if ($this->_tpl_vars['quote']['participation_expires'] == 0): ?>
														<td>En attente</td>
													<?php else: ?>
														<td class="countdown" id="participationtimer_<?php echo $this->_tpl_vars['quote']['id']; ?>
"></td>
													<?php endif; ?>
													<td><a href="/client/quotes?id=<?php echo $this->_tpl_vars['quote']['id']; ?>
"><?php echo $this->_tpl_vars['quote']['title']; ?>
</a></td> 
												</tr>
												<input type="hidden" name="participationtime_<?php echo $this->_tpl_vars['quote']['id']; ?>
" id="participationtime_<?php echo $this->_tpl_vars['quote']['id']; ?>
" value="<?php echo $this->_tpl_vars['quote']['participation_expires']; ?>
" />
											<?php endforeach; endif; unset($_from); ?>
										<?php endif; ?>	
									</tbody>
								</table>
								<?php if ($this->_tpl_vars['myquotescount'] > 10): ?>	
									<p class="btn btn-block btn-mini" id="moremyquotes">Charger plus devis</p>
								<?php endif; ?>
								<form id="myQuotesForm"> 
									<input type="hidden" name="myquotes_showing" id="myquotes_showing" value="<?php echo $this->_tpl_vars['myquotes_showing']; ?>
" />
									<input type="hidden" name="myquotes_more" id="myquotes_more" value="<?php echo $this->_tpl_vars['myquotes_more']; ?>
" />
									<input type="hidden" name="total_myquotes" id="total_myquotes" value="<?php echo $this->_tpl_vars['total_myquotes']; ?>
" />
									<input type="hidden" name="quotetype" id="quotetype" value="new" />
									<input type="hidden" name="now" id="now" value="<?php echo time(); ?>
" />
								</form>
						</section>
					</div>
					
					<!---------------------------------------------- Ongoing devis --------------------------------------->
				   <div class="tab-pane fade" id="hometab3">
						<section id="ongoing-mission">
							<h4>Missions en cours</h4>
							<table class="table table-hover">
								<thead>
									<tr>
										<td class="span2">Livraison</td>
										<td>Mission</td>
									</tr>
								</thead>
								<tbody id="ongoingquotes">
									<?php if (count($this->_tpl_vars['ongoingquotes']) > 0): ?>
										<?php $_from = $this->_tpl_vars['ongoingquotes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['quote']):
?>
											<tr>
												<td class="countdown" id="submittimer_<?php echo $this->_tpl_vars['quote']['id']; ?>
"></td>
												<td><a href="/client/quotes?id=<?php echo $this->_tpl_vars['quote']['id']; ?>
"><?php echo $this->_tpl_vars['quote']['title']; ?>
</a></td> 
											</tr>
											<input type="hidden" name="submittime_<?php echo $this->_tpl_vars['quote']['id']; ?>
" id="submittime_<?php echo $this->_tpl_vars['quote']['id']; ?>
" value="<?php echo $this->_tpl_vars['quote']['article_submit_expires']; ?>
" />
										<?php endforeach; endif; unset($_from); ?>
									<?php endif; ?>	
								</tbody>
							</table>
							<?php if ($this->_tpl_vars['ongoingquotescount'] > 10): ?>	
								<p class="btn btn-block btn-mini" id="moreongoingquotes">Charger plus devis</p>
							<?php endif; ?>
							<form id="ongoingQuotesForm"> 
								<input type="hidden" name="ongoingquotes_showing" id="ongoingquotes_showing" value="<?php echo $this->_tpl_vars['ongoingquotes_showing']; ?>
" />
								<input type="hidden" name="ongoingquotes_more" id="ongoingquotes_more" value="<?php echo $this->_tpl_vars['ongoingquotes_more']; ?>
" />
								<input type="hidden" name="total_ongoingquotes" id="total_ongoingquotes" value="<?php echo $this->_tpl_vars['total_ongoingquotes']; ?>
" />
								<input type="hidden" name="quotetype" id="quotetype" value="ongoing" />
							</form>
					 </section>
					</div>    

					<!---------------------------------------------- Published devis --------------------------------------->
					<div class="tab-pane fade" id="hometab4">
						<section id="ok-mission">
							<h4>Missions validées</h4>
							<table class="table table-hover">
								<tbody id="publishedquotes">
									<?php if (count($this->_tpl_vars['publishedquotes']) > 0): ?>
										<?php $_from = $this->_tpl_vars['publishedquotes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pquote']):
?>
											<tr>
												<td><a href="/client/quotes?id=<?php echo $this->_tpl_vars['pquote']['id']; ?>
"><?php echo $this->_tpl_vars['pquote']['title']; ?>
</a></td>
												<td><a class="btn btn-small" href="/client/downloadarticlezip?id=<?php echo $this->_tpl_vars['pquote']['id']; ?>
">Télécharger</a></td>
											</tr>
										<?php endforeach; endif; unset($_from); ?>
									<?php endif; ?>
								</tbody>
							</table>
							<?php if ($this->_tpl_vars['publishedquotescount'] > 10): ?>	
								<p class="btn btn-block btn-mini" id="morepublishedquotes">Charger plus devis</p>
							<?php endif; ?>
							<form id="publishedQuotesForm"> 
								<input type="hidden" name="publishedquotes_showing" id="publishedquotes_showing" value="<?php echo $this->_tpl_vars['publishedquotes_showing']; ?>
" />
								<input type="hidden" name="publishedquotes_more" id="publishedquotes_more" value="<?php echo $this->_tpl_vars['publishedquotes_more']; ?>
" />
								<input type="hidden" name="total_publishedquotes" id="total_publishedquotes" value="<?php echo $this->_tpl_vars['total_publishedquotes']; ?>
" />
								<input type="hidden" name="quotetype" id="quotetype" value="published" />
							</form>
						 </section>
					</div>   
					
					<!---------------------------------------------- Closed devis --------------------------------------->
					<div class="tab-pane fade" id="hometab5">
						<section id="closed-mission">
							<h4>Missions fermées</h4>
							<table class="table table-hover">
								<tbody id="closedquotes">
									<?php if (count($this->_tpl_vars['closedquotes']) > 0): ?>
										<?php $_from = $this->_tpl_vars['closedquotes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cquote']):
?>
											<tr>
												<td><a href="/client/quotes?id=<?php echo $this->_tpl_vars['cquote']['id']; ?>
"><?php echo $this->_tpl_vars['cquote']['title']; ?>
</a></td>
											</tr>
										<?php endforeach; endif; unset($_from); ?>
									<?php endif; ?>	
								</tbody>
							</table>
							<?php if ($this->_tpl_vars['closeddquotescount'] > 10): ?>	
								<p class="btn btn-block btn-mini" id="moreclosedquotes">Charger plus devis</p>
							<?php endif; ?>
							<form id="closedQuotesForm"> 
								<input type="hidden" name="closedquotes_showing" id="closedquotes_showing" value="<?php echo $this->_tpl_vars['closedquotes_showing']; ?>
" />
								<input type="hidden" name="closedquotes_more" id="closedquotes_more" value="<?php echo $this->_tpl_vars['closedquotes_more']; ?>
" />
								<input type="hidden" name="total_closedquotes" id="total_closedquotes" value="<?php echo $this->_tpl_vars['total_closedquotes']; ?>
" />
								<input type="hidden" name="quotetype" id="quotetype" value="closed" />
							</form>
						</section>
					</div>       
    
    </div>
    </div>
</div>
    
    <div class="span3">
		<!--  right column  -->
		<aside>
			<div class="aside-bg">
				<div id="garantee" class="mod">
					<h4>Vos garanties</h4>
					<dl>
						<dt><span class="umbrella"></span>edit-place est votre médiateur</dt>
						<dd>En cas de contestation (délai de livraison, reprise d’articles, remboursement...)</dd>
						<dt><span class="locked"></span>Paiement sécurisé</dt>
						<dd>Notre solution de paiement en ligne vous garantit une transaction en toute tranquillité</dd>
					</dl>
				</div>
			</div>
			
			<?php if (count($this->_tpl_vars['polllist']) > 0): ?>
				<div class="aside-bg">
				<div id="quote-ongoing" class="aside-block"> 
					<h4>Devis premium en cours</h4>
					<ul class="nav nav-tabs nav-stacked <?php if (count($this->_tpl_vars['polllist']) > 6): ?>pre-scrollable<?php endif; ?>">
						
							<?php $_from = $this->_tpl_vars['polllist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['poll']):
?>
								<li>
									<?php if (smarty_modifier_strlen($this->_tpl_vars['poll']['title']) > 30): ?>
										<a href="/client/devispremium?id=<?php echo $this->_tpl_vars['poll']['id']; ?>
" rel="tooltip" data-original-title="<?php echo $this->_tpl_vars['poll']['title']; ?>
" data-placement="left">
											<span class="badge pull-right"><?php echo $this->_tpl_vars['poll']['participation']; ?>
</span>
										<?php echo ((is_array($_tmp=$this->_tpl_vars['poll']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 30, "...", true) : smarty_modifier_truncate($_tmp, 30, "...", true)); ?>

										</a>
									<?php else: ?>
										<a href="/client/devispremium?id=<?php echo $this->_tpl_vars['poll']['id']; ?>
" >
											<span class="badge pull-right"><?php echo $this->_tpl_vars['poll']['participation']; ?>
</span>
										<?php echo $this->_tpl_vars['poll']['title']; ?>
</a>
									<?php endif; ?>	
									
								</li>
							<?php endforeach; endif; unset($_from); ?>
						<!--<li><b>Pas de devis en cours</b></li>-->
					</ul>	
					</div>
				</div>
			<?php endif; ?>
		</aside>  
    </div>
    </div>
    </div>

	<?php if ($this->_tpl_vars['writerscount'] > 0): ?>
	<section id="known-users">
		<div class="container">
			<div class="row">
				<h3 class="sectiondivider pull-center"><span>Ils ont d&eacute;j&agrave; collabor&eacute; avec vous !</span></h3>
				
				<?php $_from = $this->_tpl_vars['writers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['writer']):
?>
					<div class="span3">
						<div class="editor-container">
							<a  class="imgframe-large" onclick="loadcontribprofile('<?php echo $this->_tpl_vars['writer']['user_id']; ?>
');" role="button" data-toggle="modal" data-target="#viewContribProfile" style="cursor:pointer;">
								<img src="<?php echo $this->_tpl_vars['writer']['profileimage']; ?>
">
							</a>
							<p class="editor-name"><a onclick="loadcontribprofile('<?php echo $this->_tpl_vars['writer']['user_id']; ?>
');" role="button" data-toggle="modal" data-target="#viewContribProfile" style="cursor:pointer;"><?php echo ((is_array($_tmp=$this->_tpl_vars['writer']['name'])) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : smarty_modifier_ucfirst($_tmp)); ?>
</a></p>
						</div>
					</div>
				<?php endforeach; endif; unset($_from); ?>
			</div>
		</div>
	</section>
	<?php endif; ?>	
	
<!-- ***** Modal collections -->

<!-- contrib profile -->
<div id="viewContribProfile" class="modal container hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3 id="myModalLabel">Profil du r&eacute;dacteur</h3>
	</div>
	<div class="modal-body">
		<div id="userprofile">
	
		</div>
	</div>
</div>
   


