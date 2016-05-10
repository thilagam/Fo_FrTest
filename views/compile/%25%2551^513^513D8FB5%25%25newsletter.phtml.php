<?php /* Smarty version 2.6.19, created on 2014-02-24 10:15:27
         compiled from common/newsletter.phtml */ ?>
<!DOCTYPE html>
<html>
	<body>
		<input type="hidden" id="name" value="<?php echo $this->_tpl_vars['wrname']; ?>
" />
		<input type="hidden" id="ptype" value="<?php echo $this->_tpl_vars['wrprofile']; ?>
" />
		
		<input type="hidden" id="nlid" value="<?php echo $this->_tpl_vars['nl_id']; ?>
" />
		<input type="hidden" id="user" value="<?php echo $this->_tpl_vars['user']; ?>
" />
		<input type="hidden" id="writer" value="<?php echo $_GET['wrid']; ?>
" />
		<input type="hidden" id="password" value="<?php echo $this->_tpl_vars['password']; ?>
" />
		<input type="hidden" id="type" value="<?php echo $this->_tpl_vars['type']; ?>
" />
		<input type="hidden" id="todaydate" value="<?php echo $this->_tpl_vars['todaydate']; ?>
" />
		<input type="hidden" id="showlink" value="<?php echo $this->_tpl_vars['showlink']; ?>
" />
	</body>
</html>

<?php echo '
	<script>
		document.getElementById("htmllink").innerHTML="";
		
		var name=document.getElementById("name").value;
		document.getElementById("wrname").innerHTML=name;

		var profiletype=document.getElementById("ptype").value;
		document.getElementById("wrprofile").src=profiletype;
		
		var user=document.getElementById("user").value;
		var writer=document.getElementById("writer").value;
		document.getElementById("unsublink").href=\'http://mmm-new.edit-place.com/user/unsubscribe?unsid=\'+writer;
		
		var newslid=document.getElementById("nlid").value;
		var user=document.getElementById("user").value;
		var password=document.getElementById("password").value;
		var type=document.getElementById("type").value;
		var todaydate=document.getElementById("todaydate").value;
		//$(".loginlink").attr(\'href\',\'http://mmm-new.edit-place.com/user/email-login?user=\'+user+\'&hash=\'+password+\'&type=\'+type+\'&nl=1&utm_source=Newsletter&utm_medium=e-mail&utm_campaign=Newsletter&newsletter_id=\'+newslid);
		var href1=\'http://mmm-new.edit-place.com/user/email-login?user=\'+user+\'&hash=\'+password+\'&type=\'+type+\'&nl=1&utm_source=Newsletter&utm_medium=e-mail&utm_campaign=Newsletter&newsletter_id=\'+newslid+\'&sent_at=\'+todaydate;
		document.getElementById("premiumlink").href=href1;
		document.getElementById("libertelink").href=href1;
		document.getElementById("devislink").href=href1;
		
		var showlink=document.getElementById("showlink").value;
		if(showlink==\'\')
			document.getElementsByTagName(\'a\').href="#";
	</script>
'; ?>