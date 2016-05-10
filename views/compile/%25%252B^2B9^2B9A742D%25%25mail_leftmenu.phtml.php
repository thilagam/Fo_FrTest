<?php /* Smarty version 2.6.19, created on 2015-07-29 16:09:13
         compiled from Contrib/pattern/mail_leftmenu.phtml */ ?>
<div class="span3">
	<aside>
		<p><a id="menu_compose" class="btn btn-small btn-primary btn-block" href="/contrib/compose-mail">Nouveau message</a></p>
		<ul class="nav nav-tabs nav-stacked">
			<li id="menu_inbox"><a href="/contrib/inbox"><?php if ($this->_tpl_vars['unreadCount'] > 0): ?><span class="badge pull-right"><?php echo $this->_tpl_vars['unreadCount']; ?>
</span><?php endif; ?>Boite de r&eacute;ception</a></li>
			<li id="menu_sentbox"><a href="/contrib/sentbox"><i id="sent_icon" style="display:none" class="icon-chevron-right pull-right"></i>Messages envoy&eacute;s</a></li>
			<li id="menu_classifybox"><a href="/contrib/classifybox"><?php if ($this->_tpl_vars['class_ticket_count'] > 0): ?><span class="badge pull-right"><?php echo $this->_tpl_vars['class_ticket_count']; ?>
</span><?php endif; ?>Messages class&eacute;s</a></li>
		</ul>	
	</aside>
</div>