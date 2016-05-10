<?php /* Smarty version 2.6.19, created on 2014-02-24 10:09:35
         compiled from common/unsubscribe.phtml */ ?>
<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#3a3a3a" height="60">
	<tr>
		<td bgcolor="#3a3a3a" width="100%">    
		   <table width="1000" cellpadding="0" cellspacing="0" border="0" align="center" style="table-layout:fixed">
				<tr>
					<td width="50%"><a href="http://www.edit-place.com"><img src="http://mmm-new.edit-place.com/FO/images/newsletter/logo.png" alt="edit-place logo" width="163" height="25" border="0"></a></td>
					<td width="114" style="padding-right:2px"></td>
					<td width="50%" align="right" nowrap style="color: #999999; font-size: 12px;"> <span id="wrname" ></span>  
					</td>
				</tr>
			</table>   
		</td>
	</tr>  
	</table>
	<div align="center" style="padding-top:20px;">
	<h3>
	<?php if ($_GET['unsid'] != ""): ?>
		Suite &agrave; votre demande, vous venez d'&ecirc;tre d&eacute;sinscrit(e) de la newsletter.<br> 
		Vous avez cliqu&eacute; sur ce lien par erreur ? <a href="/user/unsubscribe?sid=<?php echo $_GET['unsid']; ?>
">Cliquez-ici</a> pour vous inscrire de nouveau.
	<?php endif; ?>

	<?php if ($_GET['sid'] != ""): ?>
		Vous êtes de nouveau inscrit(e) et recevrez les prochaines newsletters d'Edit-place
	<?php endif; ?>
	</h3>
</div>