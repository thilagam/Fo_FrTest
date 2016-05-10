<?php /* Smarty version 2.6.19, created on 2015-09-10 09:56:14
         compiled from Client/ftvnewrequest.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_decode', 'Client/ftvnewrequest.phtml', 313, false),array('modifier', 'sizeof', 'Client/ftvnewrequest.phtml', 337, false),)), $this); ?>
<?php echo '
<link href="/FO/script/common/chosen/chosen.css" type="text/css" rel="stylesheet" />
<script language="JavaScript" type="text/javascript" src="/FO/script/common/chosen/chosen.jquery.min.js"></script>

<style type="text/css">
    .ui-multiselect-checkboxes label{font-size:13px; color:red; }
    .error{ color: red; !important;}

    .form-horizontal .control-label {
        cursor: default;
        float: left;
        font-weight: bold;
        padding-top: 5px;
        text-align: right;
        margin:0px 5px;
        width: 42%;
    }
    .form-horizontal .controls {    margin-left: 47%;}
    .form-horizontal input{vertical-align:top;}
    .default{ height:30px; !important;}
</style>

<script>
	$(document).ready(function(){
        $(\'#attachments\').MultiFile();
       $("#othercontacts").chosen({ allow_single_deselect: false,search_contains: true});
	    //$(\'#othercontacts\').multiSelect(\'select_all\');
	   $("#othercontactsedit").chosen({ allow_single_deselect: false,search_contains: true});
	    $("#broadcasts").chosen({ allow_single_deselect: false,search_contains: true});
		$("#broadcastsedit").chosen({ allow_single_deselect: false,search_contains: true});
        /*$("#othercontacts").multiselect();
        $("#othercontacts").multiselectfilter();
        $("#othercontactsedit").multiselect();
        $("#othercontactsedit").multiselectfilter();
        $("#broadcasts").multiselect();
        $("#broadcasts").multiselectfilter();
        $("#broadcastsedit").multiselect();
        $("#broadcastsedit").multiselectfilter();*/
        $(\'.ui-multiselect\').css(\'width\', \'300px\');
        $(\'.default\').css(\'height\', \'25px\');
        var working = false;
		$(\'#addCommentForm\').submit(function(e){
			e.preventDefault();
			if(working) return false;
		
			if($(\'#commentclient\').val()=="")
			{
				$(\'#commentclient\').css("border-color","#FF0000");
			}
			else
			{
				$(\'#commentclient\').css("border-color","");
				$.post(\'/suivi-de-commande/submitaocomment\',$(this).serialize(),function(msg){ //alert(msg);
					if(msg==\'yes\')
					{
						alert(\'Commentaire soumis avec succ�s !\');
						$(\'#commentclient\').val("");	
						$("#ao_comment").removeClass("in");	
						$("#comment_button").html("Comment has been sent successfully, Edit-place will come back to you ASAP regarding this comment");	
					}
				});
			}
		});

        //$("#othercontacts").chosen({ allow_single_deselect: false,search_contains: true});
        $("#othercontacts").chosen({ allow_single_deselect: false,search_contains: true});
        $("#new_broadcast_err").hide();

	});

    $("#demandform").validate({
		ignore: ":hidden:not(select)",
        rules:{
           // "othercontacts[]":"required",
            "modifycontains[]":"required",
            "broadcasts[]":"required",
            quand :"required",
            request_object:"required"
        },
        messages:{
          //  "othercontacts[]":"S&eacute;lectionner le contact &agrave; mettre en copie de votre demande",
            request_object:"Merci d\'indiquer l\'objet de votre demande",
            "modifycontains[]":"S&eacute;lectionner le type de contenu &agrave; modifier",
            quand:"Select Quand",
            "broadcasts[]":"S&eacute;lectionner les &eacute;missions &agrave; modifier"
        },
        errorClass: "error",
        errorElement: "label",
        errorPlacement: function (error, element) {
            //element.after(error);
            if(element.attr("id") == \'modifycontains\') {
                $("#contains_err").html(error);
            }
			else{
			        $(element).closest(\'div\').append(error);
                }
        },
        highlight: function(label) {
            $(label).addClass(\'error\');
            $(label).removeClass(\'success\');
        },
        success: function(label) {
            //label.addClass(\'success\');
            //label.removeClass(\'error\');
        },
        submitHandler: function(form) {
            var errcount=0;
            /*if(!$("#othercontacts").val())
            {
                errcount++;
                $("#othercontacts_err").html(\'s&eacute;lectionner Contact\');
            }*/
            if(!$("#broadcasts").val())
            {
                errcount++;
                $("#broadcasts_err").html(\'s&eacute;lectionner Emissions\');
            }

            if(errcount==0)
                form.submit();
            else
            {
                return false;
            }
        }

    });
    $("#demandformedit").validate({
        rules:{

         //   othercontacts:"required",
            "modifycontains[]":"required",
            broadcasts:"required",
            quand :"required",
            request_object:"required"
        },
        messages:{
          //  othercontacts:"S&eacute;lectionner le contact &agrave; mettre en copie de votre demande",
            request_object:"Merci d\'indiquer l\'objet de votre demande",
            "modifycontains[]":"S&eacute;lectionner le type de contenu &agrave; modifier",
            quand:"Select Quand",
            broadcasts:"S&eacute;lectionner les &eacute;missions &agrave; modifier"
        },
        errorClass: "error",
        errorElement: "label",
        errorPlacement: function (error, element) {
            element.after(error);
            if(element.attr("id") == \'modifycontainsedit\') {
                $("#contains_err").html(error);
            }
        },
        highlight: function(label) {
            $(label).addClass(\'error\');
            $(label).removeClass(\'success\');
        },
        success: function(label) {
            //label.addClass(\'success\');
            //label.removeClass(\'error\');
        },
        submitHandler: function(form) {
            var errcount=0;
           /* if(!$("#othercontactsedit").val())
            {
                errcount++;
                $("#othercontacts_err").html(\'s&eacute;lectionner Contact\');
            }*/
            if(!$("#broadcastsedit").val())
            {
                errcount++;
                $("#broadcasts_err").html(\'s&eacute;lectionner Emissions\');
            }
            if(errcount==0)
                form.submit();
            else
            {
                return false;
            }
        }

    });
    function publishao(part)
	{
		var target_page = "/suivi-de-commande/publishaoclient?participate_id="+part;

			$.post(target_page, function(data){  // alert(data);
				if(data==\'yes\')
					alert(\'Article validated successfully !\');
			});
	}

    /*added by naseer on 02-09-2015*/
    function add_new_broadcast(){
        var flag = true;
        if($("#new_broadcast").val() == \'\'){
            alert("please enter value before submit");
            flag = false;
        }
        if(flag) {
            console.log("ajax started=>id = " + Math.random());
            var ajax_url = "/ftvedito/add-new-broadcast?new_broadcast=" + $("#new_broadcast").val() + "&count=" + (parseInt($("#count").val()) + 1);
            console.log(ajax_url);
            $.ajax({
                type: \'POST\',
                url: ajax_url,
                success: function (data) {
                    console.log(data);
                    console.log("ajax terminated");
                    $("#newrequest .modal-body").html(\'<h1>Successfully Added New Broadcast</h1><centre><button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true">Ok</button></centre>\');
                    $("#newrequest .modal-footer").html(\'\');
                }
            });
        }
    }
    function checkexistance(val){
        console.log("ajax initiated");
        var ajax_url = "/ftvedito/check-existance?new_broadcast="+val;
        $.ajax({
            type: \'POST\',
            url: ajax_url,
            success: function (data) {
                console.log(data);
                console.log("ajax terminated");
                if(data === \'1\') {
                    $("#add_new_broadcast_btn").prop(\'disabled\', true);
                    $("#new_broadcast_err").show();
                }
                else {
                    $("#add_new_broadcast_btn").prop(\'disabled\', false);
                    $("#new_broadcast_err").hide();
                }
            }
        });
    }
    /* edd of added by naseer */
</script>
'; ?>


<?php if ($this->_tpl_vars['requestsdetail'][0]['identifier'] == ''): ?>
<form name="demandform" id="demandform" class="form-horizontal" method="POST" action="/ftvedito/newrequest"  enctype="multipart/form-data" >
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 class="modal-title" >Cr&eacute;er une nouvelle demande</h3>
</div>
<div class="modal-body">
    <div class="row-fluid">
        <div class="span12">
            <div class="form-group">
                <label for="" class="col-xs-4"><strong>En copie de votre demande</strong></label>
                <div class="col-xs-4">
                    <select name="othercontacts[]" id="othercontacts" multiple="multiple" data-placeholder="s&eacute;lectionnez" class="form-control" >
                        <?php $_from = $this->_tpl_vars['ftvcontacts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['contactkey'] => $this->_tpl_vars['contactitem']):
?>
                        <?php if ($this->_tpl_vars['contactkey'] != $this->_tpl_vars['ftvId']): ?>
                        <option value="<?php echo $this->_tpl_vars['contactkey']; ?>
"><?php echo $this->_tpl_vars['contactitem']; ?>
</option>
                        <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                    <div id="othercontacts_err" style="color:red;"></div>
                </div>
            </div>

            <div class="form-group">
                <label for="" class="col-xs-4"><strong>objet de la demande</strong><span class="error">*</span></label>
                <div class="col-xs-4">
                    <textarea  class="form-control" type="text" rows="5" cols="25" placeholder="Objet de la demande" name="request_object" id="request_object"></textarea>
                    <div id="object_err" style="color:red;"></div>
                </div>
            </div>

            <div class="form-group">
                <label for="" class="col-xs-4"><strong>Ajouter un ficiher</strong></label>
                <div class="col-xs-4">
                   <!-- <input type="file" class="span9" name="ftv_doc" id="ftv_doc">-->
                    <div class="mail_uploader">
                        <input type="file" name="attachment[]" id="attachments"  class="multi"  >
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label  class="col-xs-4"><strong>Quand</strong><span class="error">*</span></label>
                <div class="col-xs-6">
                    <div class="col-xs-12">
                        <label class="radio">
                            <input type="radio"  value="h" id="quand" name="quand[]" checked class="uni_style"  />
                            Dans l'heure
                        </label>
                        <label class="radio">
                            <input type="radio"  value="d" id="uni_r2a" name="quand[]" class="uni_style"  />
                            Dans la journ&eacute;e
                        </label>
                        <label class="radio">
                            <input type="radio"  value="nd" id="quand" name="quand[]" class="uni_style"  />
                            Le lendemain
                        </label>
                        <label class="radio">
                            <input type="radio"  value="w" id="quand" name="quand[]" class="uni_style"  />
                            Dans le semaine
                        </label>
                        <label class="radio">
                            <input type="radio"  value="nw" id="quand" name="quand[]" class="uni_style"  />
                            La semaine prochaine
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="" class="col-xs-4"><strong>Emissions &agrave; modifier</strong><span class="error">*</span></label>
                <div class="col-xs-8">
                    <select multiple="multiple" name="broadcasts[]" id="broadcasts" class="form-control" data-placeholder="s&eacute;lectionnez">
                        <?php $_from = $this->_tpl_vars['broadcast_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['emissionkey'] => $this->_tpl_vars['emissionitem']):
?>
                            <option value="<?php echo $this->_tpl_vars['emissionkey']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['emissionitem'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
</option>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                                        <div id="broadcasts_err" style="color:red;"></div>
                    <button class="btn btn-info" id="add_bc_btn" type="button" onclick="$('#new_broadcast_div , #add_bc_btn').toggle();">nouvelle &eacute;mission</button>
                </div>
            </div>

            <div class="form-group" id="new_broadcast_div" style="display: none;">
                <label for="" class="col-xs-4 "><strong>nouvelle &eacute;mission</strong><span class="error">*</span></label>
                <div class="col-xs-4">
                    <input type="text" class="form-control" id="new_broadcast" onkeyup="checkexistance(this.value);" />
                    <span class="error" id="new_broadcast_err">Already exist</span>
                    <input type="hidden" class="form-control" id="count" value="<?php echo sizeof($this->_tpl_vars['broadcast_array']); ?>
"/>
                </div>
                <div class="col-xs-4">
                    <button type="button" class="btn btn-info" id="add_new_broadcast_btn" onclick="add_new_broadcast();">GO</button>
                    <button type="button" class="btn btn-default" onclick="$('#new_broadcast_div, #add_bc_btn').toggle();">cancel</button>
                </div>
            </div>

            <div class="form-group">
                <label for="" class="col-xs-4 "><strong>Demand</strong><span class="error">*</span></label>
                <div class="col-xs-6">
                    <div class="col-xs-12">
                        <label class="radio">
                            <input type="radio"  value="1" id="demand" name="demand[]" checked class="uni_style"  />
                            Int&eacute;gration
                        </label>
                        <label class="radio">
                            <input type="radio"  value="2" id="demand" name="demand[]" class="uni_style"  />
                            Modification demand&eacute;e par FTV
                        </label>
                        <label class="radio">
                            <input type="radio"  value="3" id="demand" name="demand[]" class="uni_style"  />
                            Correction erreur EP
                        </label>
                        <label class="radio">
                            <input type="radio"  value="4" id="demand" name="demand[]" class="uni_style"  />
                            Retours
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-xs-4"><strong>Contenus &agrave;  modifier</strong><span class="error">*</span></label>
                <div class="col-xs-6">
                    <div class="col-xs-12">
                        <label class="checkbox">
                            <input type="checkbox"  value="1" id="modifycontains" name="modifycontains[]" class="uni_style"  />
                            UNE Tournante
                        </label>
                        <label class="checkbox">
                            <input type="checkbox"  value="2" id="modifycontains" name="modifycontains[]" class="uni_style"  />
                            Diffusion
                        </label>
                        <label class="checkbox">
                            <input type="checkbox"  value="3" id="modifycontains" name="modifycontains[]" class="uni_style"  />
                            Article
                        </label>
                        <label class="checkbox">
                            <input type="checkbox"  value="4" id="modifycontains" name="modifycontains[]" class="uni_style"  />
                            Ressource Livres
                        </label>
                        <label class="checkbox">
                            <input type="checkbox"  value="5" id="modifycontains" name="modifycontains[]" class="uni_style"  />
                            Ressource Voir/Ecouter
                        </label>
                        <label class="checkbox">
                            <input type="checkbox"  value="6" id="modifycontains" name="modifycontains[]" class="uni_style"  />
                            Ressource Liens et Adresses utiles
                        </label>
                        <label class="checkbox">
                            <input type="checkbox"  value="7" id="modifycontains" name="modifycontains[]" class="uni_style"  />
                            Visuels
                        </label>
                        <label class="checkbox">
                            <input type="checkbox"  value="8" id="modifycontains" name="modifycontains[]" class="uni_style"  />
                            Musique
                        </label>
                        <label class="checkbox">
                            <input type="checkbox"  value="9" id="modifycontains" name="modifycontains[]" class="uni_style"  />
                            Autres
                        </label>
                        <div id="contains_err" style="color:red;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <div class="form-group">
        <label for="" class="col-xs-4">&nbsp;</label>
        <div class="col-xs-4">
            <button class="btn btn-inverse"  data-dismiss="modal" aria-hidden="true">Annuler</button>
            <button type="submit" name="update_profile" value="update" class="btn btn-primary inline"><i class="icon-refresh icon-white"></i> Envoyer la demande</button>
        </div>
    </div>
</div>
</form>
<?php else: ?>
<form name="demandform" class="form-horizontal"  id="demandformedit" method="POST" action="/ftvedito/newrequest"  enctype="multipart/form-data" >

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 class="modal-title" >Duplication de la demande</h3>
</div>
<div class="modal-body">
    <div class="row-fluid">
		   <div class="form-group">
			   <label for="" class="col-xs-4 pull-left"><strong>En copie de votre demande</strong></label>
			   <div class="col-xs-4">
				   <select multiple="multiple" name="othercontacts[]" id="othercontactsedit" data-placeholder="s&eacute;lectionnez" class="form-control">
					   <?php $_from = $this->_tpl_vars['ftvcontacts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['contactkey'] => $this->_tpl_vars['contactitem']):
?>
					   <?php if ($this->_tpl_vars['contactkey'] != $this->_tpl_vars['ftvId']): ?>
						   <?php if (in_array ( $this->_tpl_vars['contactkey'] , $this->_tpl_vars['othercontacts_array'] )): ?>
						   <option value="<?php echo $this->_tpl_vars['contactkey']; ?>
" selected><?php echo $this->_tpl_vars['contactitem']; ?>
</option>
						   <?php else: ?>
						   <option value="<?php echo $this->_tpl_vars['contactkey']; ?>
"><?php echo $this->_tpl_vars['contactitem']; ?>
</option>
						   <?php endif; ?>
					   <?php endif; ?>
					   <?php endforeach; endif; unset($_from); ?>
				   </select>
				   <div id="othercontacts_err" style="color:red;"></div>
			   </div>
		   </div>
	   
		   <div class="form-group">
			   <label for="" class="col-xs-4"><strong>objet de la demande<span class="error">*</span></strong></label>
			   <div class="col-xs-4">
				   <textarea type="text" rows="5" cols="25" placeholder="Objet de la demande" name="request_object" id="request_object" class="form-control"><?php echo $this->_tpl_vars['requestsdetail'][0]['request_object']; ?>
</textarea>
				   <div id="object_err" style="color:red;"></div>
			   </div>
		   </div>
	   
		   <div class="form-group">
			   <label for="" class="col-xs-4"><strong>Ajouter un ficiher</strong></label>
			   <div class="col-xs-4">
				   <!-- <input type="file" class="span9" name="ftv_doc" id="ftv_doc">-->
				   <div class="mail_uploader">
					   <input type="file" name="attachment[]" id="attachments" class="multi">
				   </div>
			   </div>
		   </div>
	  
		   <div class="form-group">
			   <label for="" class="col-xs-4"><strong>Quand<span class="error">*</span></strong></label>
			   <div class="col-xs-6">
				   <div class="col-xs-12">
					   <label class="radio">
						   <input type="radio"  value="h" id="quandedit" name="quand[]"  <?php if (in_array ( h , $this->_tpl_vars['quand_array'] )): ?> checked="checked"  <?php endif; ?> class="uni_style"  />
						   Dans l'heure
					   </label>
					   <label class="radio">
						   <input type="radio"  value="d" id="quandedit" name="quand[]" <?php if (in_array ( d , $this->_tpl_vars['quand_array'] )): ?> checked="checked"  <?php endif; ?> class="uni_style"  />
						   Dans la journ&eacute;e
					   </label>
					   <label class="radio">
						   <input type="radio"  value="nd" id="quandedit" name="quand[]" <?php if (in_array ( nd , $this->_tpl_vars['quand_array'] )): ?> checked="checked"  <?php endif; ?> class="uni_style"  />
						   Le lendemain
					   </label>
					   <label class="radio">
						   <input type="radio"  value="w" id="quandedit" name="quand[]" <?php if (in_array ( w , $this->_tpl_vars['quand_array'] )): ?> checked="checked"  <?php endif; ?> class="uni_style"  />
						   Dnas le semaine
					   </label>
					   <label class="radio">
						   <input type="radio"  value="nw" id="quandedit" name="quand[]" <?php if (in_array ( nw , $this->_tpl_vars['quand_array'] )): ?> checked="checked"  <?php endif; ?> class="uni_style"  />
						   La semaine prochaine
					   </label>
				   </div>
			   </div>
		   </div>
	   
		   <div class="form-group">
			   <label for="" class="col-xs-4"><strong>Emissions &agrave; modifier<span class="error">*</span></strong></label>
			   <div class="col-xs-8">
				   <select multiple="multiple" name="broadcasts[]" id="broadcastsedit" data-placeholder="s&eacute;lectionnez">
					   <?php $_from = $this->_tpl_vars['broadcast_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['emissionkey'] => $this->_tpl_vars['emissionitem']):
?>
					   <?php if (in_array ( $this->_tpl_vars['emissionkey'] , $this->_tpl_vars['broadcasts_array'] )): ?>
					   <option value="<?php echo $this->_tpl_vars['emissionkey']; ?>
" selected><?php echo ((is_array($_tmp=$this->_tpl_vars['emissionitem'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
</option>
					   <?php else: ?>
					   <option value="<?php echo $this->_tpl_vars['emissionkey']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['emissionitem'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
</option>
					   <?php endif; ?>
					   <?php endforeach; endif; unset($_from); ?>
				   </select>
                   <!--<?php $_from = $this->_tpl_vars['broadcast_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['emissionkey'] => $this->_tpl_vars['emissionitem']):
?>
                   <input type="checkbox"  value="<?php echo $this->_tpl_vars['emissionkey']; ?>
" id="broadcastsedit" name="broadcasts[]" class="uni_style" <?php if (in_array ( $this->_tpl_vars['emissionkey'] , $this->_tpl_vars['broadcasts_array'] )): ?> checked="checked"  <?php endif; ?> />
                   <?php echo $this->_tpl_vars['emissionitem']; ?>

                   <?php endforeach; endif; unset($_from); ?>*}
                   <table>
                       <?php $_from = $this->_tpl_vars['broadcast_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['emissionitems'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['emissionitems']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['emissionkey'] => $this->_tpl_vars['emissionitem']):
        $this->_foreach['emissionitems']['iteration']++;
?>

                       <?php if ($this->_foreach['emissionitems']['iteration'] % 3 == 0): ?>  <tr> <?php endif; ?>
                           <td valign="top" width="32%">
                               <input type="checkbox"  value="<?php echo $this->_tpl_vars['emissionkey']; ?>
" id="broadcastsedit" name="broadcasts[]" class="uni_style" <?php if (in_array ( $this->_tpl_vars['emissionkey'] , $this->_tpl_vars['broadcasts_array'] )): ?> checked="checked"  <?php endif; ?> />
                               <?php echo ((is_array($_tmp=$this->_tpl_vars['emissionitem'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>

                           </td>

                           <?php if (( $this->_foreach['emissionitems']['iteration']+1 ) % 3 == 0): ?>  </tr> <?php endif; ?>
                       <?php endforeach; endif; unset($_from); ?>
                   </table>-->
				   <div id="broadcasts_err" style="color:red;"></div>
			   </div>
		   </div>
        <div class="form-group">
            <label for="" class="col-xs-4 "><strong>Demand</strong><span class="error">*</span></label>
            <div class="col-xs-6">
                <div class="col-xs-12">
                    <label class="radio">
                        <input type="radio"  value="1" id="demandedit" name="demand[]" checked class="uni_style" <?php if (in_array ( 1 , $this->_tpl_vars['demand_array'] )): ?> checked="checked"  <?php endif; ?> />
                        Int&eacute;gration
                    </label>
                    <label class="radio">
                        <input type="radio"  value="2" id="demandedit" name="demand[]" class="uni_style"  <?php if (in_array ( 2 , $this->_tpl_vars['demand_array'] )): ?> checked="checked"  <?php endif; ?>/>
                        Modification demand&eacute;e par FTV
                    </label>
                    <label class="radio">
                        <input type="radio"  value="3" id="demandedit" name="demand[]" class="uni_style" <?php if (in_array ( 3 , $this->_tpl_vars['demand_array'] )): ?> checked="checked"  <?php endif; ?> />
                        Correction erreur EP
                    </label>
                    <label class="radio">
                        <input type="radio"  value="4" id="demandedit" name="demand[]" class="uni_style" <?php if (in_array ( 4 , $this->_tpl_vars['demand_array'] )): ?> checked="checked"  <?php endif; ?> />
                        Retours
                    </label>
                </div>
            </div>
        </div>
		   <div class="form-group">
			   <label for="" class="col-xs-4"><strong>Contenus &agrave;  modifier</strong><span class="error">*</span></label>
			   <div class="col-xs-6">
				   <div class="col-xs-12">
					   <label class="checkbox">
						   <input type="checkbox"  value="1" id="modifycontainsedit" name="modifycontains[]" <?php if (in_array ( '1' , $this->_tpl_vars['contains_array'] )): ?> checked="checked"  <?php endif; ?> class="uni_style"  />
						   UNE Tournante
					   </label>
					   <label class="checkbox">
						   <input type="checkbox"  value="2" id="modifycontainsedit" name="modifycontains[]" <?php if (in_array ( '2' , $this->_tpl_vars['contains_array'] )): ?> checked="checked"  <?php endif; ?> class="uni_style"  />
						   Diffusion
					   </label>
					   <label class="checkbox">
						   <input type="checkbox"  value="3" id="modifycontainsedit" name="modifycontains[]" <?php if (in_array ( '3' , $this->_tpl_vars['contains_array'] )): ?> checked="checked"  <?php endif; ?> class="uni_style"  />
						   Article
					   </label>
					   <label class="checkbox">
						   <input type="checkbox"  value="4" id="modifycontainsedit" name="modifycontains[]" <?php if (in_array ( '4' , $this->_tpl_vars['contains_array'] )): ?> checked="checked"  <?php endif; ?> class="uni_style"  />
						   Ressource Livres
					   </label>
					   <label class="checkbox">
						   <input type="checkbox"  value="5" id="modifycontainsedit" name="modifycontains[]" <?php if (in_array ( '5' , $this->_tpl_vars['contains_array'] )): ?> checked="checked"  <?php endif; ?> class="uni_style"  />
						   Ressource Voir/Ecouter
					   </label>
					   <label class="checkbox">
						   <input type="checkbox"  value="6" id="modifycontainsedit" name="modifycontains[]" <?php if (in_array ( '6' , $this->_tpl_vars['contains_array'] )): ?> checked="checked"  <?php endif; ?> class="uni_style"  />
						   Ressource Liens et Adresses utiles
					   </label>
					   <label class="checkbox">
						   <input type="checkbox"  value="7" id="modifycontainsedit" name="modifycontains[]" <?php if (in_array ( '7' , $this->_tpl_vars['contains_array'] )): ?> checked="checked"  <?php endif; ?> class="uni_style"  />
                           Visuel
                       </label>
					   <label class="checkbox">
						   <input type="checkbox"  value="8" id="modifycontainsedit" name="modifycontains[]" <?php if (in_array ( '8' , $this->_tpl_vars['contains_array'] )): ?> checked="checked"  <?php endif; ?> class="uni_style"  />
						   Musique
					   </label>
					   <label class="checkbox">
						   <input type="checkbox"  value="9" id="modifycontainsedit" name="modifycontains[]" <?php if (in_array ( '9' , $this->_tpl_vars['contains_array'] )): ?> checked="checked"  <?php endif; ?> class="uni_style"  />
						   Autres
					   </label>
					   <div id="contains_err" style="color:red;"></div>
				   </div>
			   </div>
		   </div>
    </div>
</div>
<div class="modal-footer">
    <div class="form-group">
        <label for="" class="col-xs-4">&nbsp;</label>
        <div class="col-xs-4">
            <input type="hidden" id="request_id" name="request_id" value="<?php echo $this->_tpl_vars['request_id']; ?>
">
            <input type="hidden" id="edit_demand" name="edit_demand" value="<?php echo $this->_tpl_vars['edit_demand']; ?>
">
            <button class="btn inline"  data-dismiss="modal" aria-hidden="true">Annuler</button>
            <button type="submit" name="update_profile" value="update" class="btn btn-primary inline"><i class="icon-refresh icon-white"></i><?php if ($this->_tpl_vars['edit_demand'] != 'yes'): ?> Envoyer la demande<?php else: ?> valider<?php endif; ?></button>
        </div>
    </div>
</div>
</form>

<?php endif; ?>