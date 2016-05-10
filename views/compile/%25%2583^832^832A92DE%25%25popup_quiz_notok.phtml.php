<?php /* Smarty version 2.6.19, created on 2015-07-28 12:42:58
         compiled from Contrib/popup_quiz_notok.phtml */ ?>
<section id="quizz-not-ok">
	<div class="row-fluid">
		<div class="pull-center span10 offset1">
			<div class="smiley">:(</div>
			<h1>Perdu...</h1>
			<p class="text-error lead">Vous avez r&eacute;pondu correctement &agrave; <?php echo $this->_tpl_vars['num_correct']; ?>
 questions sur <?php echo $this->_tpl_vars['num_total']; ?>
.</p>
			<p>Nous regrettons de ne pas pouvoir vous pr&eacute;s&eacute;lectionner pour cette mission.</p>
			<hr>
			<div class="clearfix">
				<a href="/contrib/aosearch" class="btn">Voir d'autres d'annonces</a>
			</div>
		</div>
	</div>
</section>