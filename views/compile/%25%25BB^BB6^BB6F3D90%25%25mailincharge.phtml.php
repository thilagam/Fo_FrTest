<?php /* Smarty version 2.6.19, created on 2014-08-07 11:50:43
         compiled from Client/mailincharge.phtml */ ?>
  <div class="modal-header" align="center">
        <button class="close" data-dismiss="modal" >&times;</button>
        <h3>Ecrire &agrave; <?php echo $this->_tpl_vars['epincharge']; ?>
</h3>
    </div>
    <div class="modal-body" id="aocomment">
		<form  action="" method="POST" id="mailForm" name="mailForm" enctype="multipart/form-data" action="/suivi-de-commande/index">
			<input type="text" name="subject" id="subject" placeholder="Subject..." value="<?php echo $this->_tpl_vars['subject']; ?>
" style="width:501px"/>
			<textarea name="scobject" id="scobject" placeholder="Texte..." style="width: 500px; height: 117px;"></textarea>
			<br>
			<input type="file" name="mailfile" id="mailfile" value="Parcourir..." />
			<input type="hidden" id="email" name="email" value="<?php echo $this->_tpl_vars['email']; ?>
" />
			<br>
			<input type="submit" name="submitmail" id="submitmail" value="Envoyer" class="btn btn-small btn-success pull-right" />
		</form>
    </div>
    <div class="modal-footer">
    </div>