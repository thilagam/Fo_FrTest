<?php /* Smarty version 2.6.19, created on 2015-08-10 14:39:21
         compiled from Client/ftvaddcomment.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'Client/ftvaddcomment.phtml', 101, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
    //Comments submission
    $(document).ready(function() {
        $("#comment_submit_ch").click(function(){
            $("#loading").modal(\'show\');
            $.post("/ftvchaine/savecomments", $("#comment_form").serialize(),
                    function(data) {     //alert(data);
                        window.location.reload();
                        refreshChaineCommentsModel();
                        $(\'#addcomment\').bind(\'hidden.bs.modal\', function () {
                            $("html").css("margin-right", "0px");
                        });
                        $(\'#addcomment\').bind(\'show.bs.modal\', function () {
                            $("html").css("margin-right", "-15px");
                        });
                    }
            );
        });
        $("#comment_submit").click(function(){
            $("#loading").modal(\'show\');
            $.post("/ftvedito/savecomments", $("#comment_form").serialize(),
                function(data) {     //alert(data);
                    window.location.reload();
                    refreshCommentsModel();
                    $(\'#addcomment\').bind(\'hidden.bs.modal\', function () {
                        $("html").css("margin-right", "0px");
                    });
                    $(\'#addcomment\').bind(\'show.bs.modal\', function () {
                        $("html").css("margin-right", "-15px");
                    });
                }
            );
        });
    });

    function refreshCommentsModel()
    {
        var requestId = $("#request_id").val();
        var href="/ftvedito/showcomments?request_id="+requestId;
        $("#addcomment").removeData(\'modal\');
        $(\'#addcomment .modal-body\').load(href);
        $("#addcomment").modal();
        $(".modal-backdrop:gt(0)").remove();
    }
    function refreshChaineCommentsModel()
    {
        var requestId = $("#request_id").val();
        var href="/ftvchaine/showcomments?request_id="+requestId;
        $("#addcomment").removeData(\'modal\');
        $(\'#addcomment .modal-body\').load(href);
        $("#addcomment").modal();
        $(".modal-backdrop:gt(0)").remove();
    }


</script>
'; ?>

    <?php if ($this->_tpl_vars['showrequestobject'] == 'yes'): ?>
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
        <h3>Objet de la demande</h3>
    </div>
    <div class="modal-body" id="add_comment">
        <div class="mod">
            <div class="row-fluid"><?php echo $this->_tpl_vars['objectRequest']; ?>

            </div>
        </div>
    </div>
    <?php elseif ($this->_tpl_vars['showrecentcomment'] == 'yes'): ?>
    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
        <h3>Commentaires d'Edit-place </h3>
    </div>
    <div class="modal-body" id="add_comment">
        <div class="mod">
            <div class="row-fluid"><?php echo $this->_tpl_vars['recentcomments']; ?>

            </div>
        </div>
    </div>
    <?php elseif ($this->_tpl_vars['savedcomments'] != 'yes'): ?>
<!--///show loading time for fetching the plagiarism details ///-->

    <div class="modal-header">
        <button class="close" data-dismiss="modal" >&times;</button>
        <h3>Ajouter un Commentaire</h3>
        <div style="display: none" id="loading">
            <h4><b style="color: red">Commentaire en cours d'envoi..</b><img src="/FO/images/imageB3/ajax_loader.gif"></h4>
        </div>
    </div>
    <div class="modal-body" id="add_comment">
        <div class="mod">
            <h4 id="comment"><i class="icon-comment"></i> Commentaires</h4>
            <div id="ajaxdata"></div>
            <ul class="media-list" id="comments_list">
                <?php if ($this->_tpl_vars['commentDetails'] != 'NO'): ?>
                <?php $_from = $this->_tpl_vars['commentDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['comment']):
?>
                <li class="media" id="comment_<?php echo $this->_tpl_vars['comment']['identifier']; ?>
">
                    <div class="media-body">
                        <h4 class="media-heading">
                            <a  role="button" data-toggle="modal" data-target="#viewProfile-ajax"><?php if ($this->_tpl_vars['comment']['user_type'] == 'BO'): ?><?php echo $this->_tpl_vars['comment']['bo_user']; ?>
<?php else: ?><?php echo $this->_tpl_vars['comment']['first_name']; ?>
<?php endif; ?></a> <span class="muted" style="font-size: 12px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['comment']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M")); ?>
</span></h4>

                        <?php echo $this->_tpl_vars['comment']['comments']; ?>


                    </div>
                </li>
                <?php endforeach; endif; unset($_from); ?>
                <?php else: ?>
                    Aucun commentaire post&eacute; pr&eacute;cedemment.
                <?php endif; ?>
            </ul>
            <div class="row-fluid">
                <div class=" well">
                    <form action="" method="POST" id="comment_form">
                        <h4>Commenter / poser une question</h4>
                        <fieldset>
                            <textarea class="form-control" rows="8" placeholder="Ecrire un commentaire" name="comments" id="comments"></textarea>

                            <input type="hidden" name="comment_type" value="<?php echo $this->_tpl_vars['comment_type']; ?>
" id="comment_type">
                            <input type="hidden" name="request_id" value="<?php echo $this->_tpl_vars['request_id']; ?>
" id="request_id">
                        </fieldset>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

<div class="modal-footer">

    <?php if ($this->_tpl_vars['showbutton'] != 'no'): ?>
        <?php if ($this->_tpl_vars['ftvtype'] == 'chaine'): ?>
            <button type="button" id="comment_submit_ch" name="comment_submit" class="btn btn-success" onclick="saveComments();">Envoyer</button>
        <?php else: ?>
            <button type="button" id="comment_submit" name="comment_submit" class="btn btn-success" onclick="saveComments();">Envoyer</button>
        <?php endif; ?>
    <?php endif; ?>
</div>