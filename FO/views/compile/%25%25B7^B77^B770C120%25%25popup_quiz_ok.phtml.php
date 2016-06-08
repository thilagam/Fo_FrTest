<?php /* Smarty version 2.6.19, created on 2015-07-28 12:46:39
         compiled from Contrib/popup_quiz_ok.phtml */ ?>
<section id="quizz-ok">
	<div class="row-fluid">
		<div class="pull-center span10 offset1">
			<i class="check"></i>
			<h1>F&eacute;licitations !</h1>
			<p class="text-success lead">Vous avez r&eacute;pondu correctement &agrave; <?php echo $this->_tpl_vars['num_correct']; ?>
 r&eacute;ponse(s) sur <?php echo $this->_tpl_vars['num_total']; ?>
.</p>
			<hr>
			La mission premium<br><strong><?php echo $this->_tpl_vars['article_title']; ?>
</strong> <br>a &eacute;t&eacute; rajout&eacute;e &agrave; votre s&eacute;lection
			<hr>
			<div class="clearfix">
				<a href="/contrib/aosearch" class="btn">Voir plus d'annonces</a>
				<a class="btn btn-primary" href="/cart/cart-selection">Voir ma s&eacute;lection <span class="badge badge-warning"><?php echo $this->_tpl_vars['selected_ao_count']; ?>
</span></a>
			</div>

		</div>
	</div>
</section>

<a href="#brand" class="pull-right btn btn-small disabled anchor-top scroll"><i class="icon-arrow-up"></i></a>

<?php echo '
<script>
$(".scroll").click(function(event){		
		event.preventDefault();
		$(\'html,body\').animate({scrollTop:$(this.hash).offset().top}, 500);
	});

// tooltip activation
    $("[rel=tooltip]").tooltip();
	 $("[rel=popover]").popover();
</script>
'; ?>
