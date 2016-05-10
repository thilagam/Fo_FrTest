<?php /* Smarty version 2.6.19, created on 2015-08-21 10:33:28
         compiled from Client/ftvaddfile.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'Client/ftvaddfile.phtml', 125, false),array('modifier', 'upper', 'Client/ftvaddfile.phtml', 125, false),)), $this); ?>
<?php echo '
<script language="JavaScript" type="text/javascript" src="/FO/script/common/jquery.MultiFile.js"></script>
<style type="text/css">
    .media {
        background: none repeat scroll 0 0 #FFFFFF;
        border-color: #E4E4E4 #E4E4E4 #BBBBBB;
        border-image: none;
        border-radius: 4px;
        border-style: solid;
        border-width: 1px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.086);
        margin-bottom: 15px;
        overflow: hidden;
        padding: 12px;
    }
    .close
    {
        padding: 3px;
    }
</style>
<script type="text/javascript">
    //Comments submission
    $(document).ready(function() {
        $(\'#attachments\').MultiFile();
        //destroy the Modal object before subsequent toggles
        $(\'body\').on(\'hidden\', \'.modal\', function () {
            $(this).removeData(\'modal\');
        });

    });
    /*$("#attachdoc").click(function(){
       alert($("#attachments").val());
        $.post("/ftv/uploadfiles2", $("#document_form").serialize(),
                function(data) {
                    var obj = $.parseJSON(data);
                    //$("#ajaxdata").html(obj.comments);
                    $("#ajaxdata").html(data);
                    $("#comments_list").hide();

                }
        );

    });*/
     $("#attachdoc").click(function(){
		//alert(\'HI\');
		var data= $("#document_form").serialize();
		$.ajax({
			type: "POST",
			url: "/ftvedito/uploadfiles",
			data: data,
			//contentType: "application/json",
            dataType: "json",
			success: function(data, textStatus, jqXHR)
			{
				//alert(data);
				if(typeof data.error === \'undefined\'  || data.error==\'\')
				{	$("#comments_list").html(\'\');
					var counter=1;
					
					/*$.each(data, function(i, item) {
						//alert(item.document);
						
						//$("#comments_list").append(\'<li class="media" id="comment_\'+counter+\'"><div class="media-body"><div class="label">version : \'+counter+\' </div><a href="/ftv/downloadftv?request_id=\'+data[i].request_id+\'&filename=\'+data[i].document+\'" id="ftvdownload"><i class="splashy-document_small_download"></i></a><p class="muted">\'+data[i].created_at+\'</p></div></li>\');
						counter++;
					});​*/
					$.each(data.result, function(idx, obj) {
						var dateFr=obj.created_at.replace(/^(\\d{4})-(\\d{2})-(\\d{2})/, \'$2/$3/$1\');
						dateFr=dateFr.slice(0,-3);
							//$("#comments_list").append(\'<li class="media" id="comment_\'+counter+\'"><div class="media-body"><div class="label">version : \'+counter+\' </div><a href="/ftv/downloadftv?request_id=\'+obj.request_id+\'&filename=\'+obj.document+\'" id="ftvdownload"><i class="splashy-document_small_download"></i></a><p class="muted">\'+dateFr+\'</p></div></li>\');
							$("#comments_list").append(\'<li class="media" id="comment_\'+counter+\'"><div class="media-body"><div class="">version : \'+counter+\' <a href="/ftvedito/downloadftv?request_id=\'+obj.request_id+\'&filename=\'+obj.document+\'" id="ftvdownload">T&eacute;l&eacute;charger</a></div><p class="muted">\'+dateFr+\'</p></div></li>\')
							counter++;
					});
					//(\'#attachdoc\').val(\'\');
					$(\'#attachments\').MultiFile(\'reset\')
				}else{
					
				}
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert(\'ERROR\');
			}
		});
	});
    $(function() {
        $("input:file").click(function (){
            var fileName = $(this).val();
            $("#errormsg").hide();
        });

    });
    function validateFile()
    {
        if($("#attachments").val() == \'\'){
          //  alert("Merci de selectionner un fichier");
            //$("#errormsg").text("Merci de selectionner un fichier");
            $("#errormsg").show();
            return false;
        }else {
            return true;
        }


    }


</script>
'; ?>

<div class="modal-header">
    <button class="close" data-dismiss="modal" >&times;</button>
    <h3>Ajouter un fichier</h3>
</div>
<div class="modal-body" id="file_upload">
<div class="mod">
    <h4 id="comment"><i class="icon-comment"></i>Versions pr&eacute;c&eacute;dentes</h4>
    <ul class="media-list" id="comments_list">
        <?php if ($this->_tpl_vars['previousfiles'] != 'NO'): ?>
        <?php $_from = $this->_tpl_vars['previousfiles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['profiles_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['profiles_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['document']):
        $this->_foreach['profiles_loop']['iteration']++;
?>
        <li class="media" id="comment_<?php echo $this->_tpl_vars['comment']['identifier']; ?>
">

            <div class="media-body">
                <div class="">version : <?php echo ($this->_foreach['profiles_loop']['iteration']-1)+1; ?>

                <a href="/ftvedito/downloadftv?request_id=<?php echo $this->_tpl_vars['document']['request_id']; ?>
&filename=<?php echo $this->_tpl_vars['document']['document']; ?>
" id="ftvdownload">
                    T&eacute;l&eacute;charger</a></div>
                <p class="muted"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['document']['created_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M")))) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</p>
            </div>
        </li>
        <?php endforeach; endif; unset($_from); ?>
        <?php else: ?>
           No previous versions are available
        <?php endif; ?>
    </ul>
    <div class="row-fluid">
        <div class=" well">
            <form action="/<?php echo $this->_tpl_vars['ftvtype']; ?>
/uploadfiles" method="POST" id="document_form" enctype="multipart/form-data" onsubmit="return validateFile();">
                <h4>Soumettre un nouveau fichier<?php echo $this->_tpl_vars['type']; ?>
</h4>
                <fieldset>
                    <div class="controls span8">
                        <!-- <input type="file" class="span9" name="ftv_doc" id="ftv_doc">-->
                        <div class="mail_uploader">
                            <input type="file" name="attachment[]" id="attachments" class="multi">
                        </div>
                        <div id="errormsg" style="color: red;display:none">Merci de s&eacute;lectionner un fichier</div>
                        <input type="button" id="attachdoc" name="attachdoc" value="Soumettre" class="btn btn-success"/>
                        <input type="hidden" id="request_id"  name="request_id" value="<?php echo $this->_tpl_vars['request_id']; ?>
" />
                        <input type="hidden" id="ftv_type"  name="ftv_type" value="<?php echo $this->_tpl_vars['ftvtype']; ?>
" />
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
</div>
<div class="modal-footer">
</div>
<!--<?php echo '
<script type="text/javascript">
    //Comments submission
    window.onload = function(){
        var requestId = $("#request_id").val();     alert(requestId);
        var href="/ftvedito/uploadfiles?request_id="+requestId;
        $("#fileupload").removeData(\'modal\');
        $(\'#fileupload .modal-body\').load(href);
        $("#fileupload").modal();
        $(".modal-backdrop:gt(0)").remove();
    }


</script>
'; ?>
-->