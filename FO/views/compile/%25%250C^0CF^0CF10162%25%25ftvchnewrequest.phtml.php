<?php /* Smarty version 2.6.19, created on 2015-07-30 12:30:11
         compiled from Client/ftvchnewrequest.phtml */ ?>
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
	   // $("#broadcasts").chosen({ allow_single_deselect: false,search_contains: true});
		//$("#broadcastsedit").chosen({ allow_single_deselect: false,search_contains: true});
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

	});

    $("#demandform").validate({
		ignore: ":hidden:not(select)",
        rules:{
          //  "othercontacts[]":"required",
          //  "modifycontains[]":"required",
            "broadcasts[]":"required",
            quand :"required",
            demand :"required",
            request_object:"required",
            attachments: {
                required: true,
                extension: "xls|csv|doc|docx|xlsx"
            }
        },
        messages:{
           // "othercontacts[]":"S&eacute;lectionner le contact &agrave; mettre en copie de votre demande",
            request_object:"Merci d\'indiquer l\'objet de votre demande",
          //  "modifycontains[]":"S&eacute;lectionner le type de contenu &agrave; modifier",
            quand:"Select Quand",
            demand:"Select Demand",
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
           /* if(!$("#othercontacts").val())
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

           // othercontacts:"required",
          //  "modifycontains[]":"required",
            "broadcasts[]":"required",
            quand :"required",
            demand :"required",
            request_object:"required",
            attachments: {
                required: true,
                extension: "xls|csv|doc|docx|xlsx"
            }
        },
        messages:{
           // othercontacts:"Select En copie de votre demande",
            request_object:"Write objet de la demande",
         //   "modifycontains[]":"Select Contenus a modifier",
            quand:"Select Quand",
            demand:"Select Demand",
            "broadcasts[]":"Select Emissions à modifier"
        },
        errorClass: "error",
        errorElement: "label",
        errorPlacement: function (error, element) {
            element.after(error);
            if(element.attr("id") == \'modifycontainsedit\') {
                $("#contains_err").html(error);
            }
            if(element.attr("id") == \'broadcasts\') {
                $("#broadcasts_err").html(error);
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
            /*if(!$("#othercontactsedit").val())
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
    function publishao(part)
	{
		var target_page = "/suivi-de-commande/publishaoclient?participate_id="+part;

			$.post(target_page, function(data){  // alert(data);
				if(data==\'yes\')
					alert(\'Article validated successfully !\');
			});
	}

</script>
'; ?>


<?php if ($this->_tpl_vars['requestsdetail'][0]['identifier'] == ''): ?>
<form name="demandform" id="demandform" class="form-horizontal" method="POST" action="/ftvchaine/newrequest"  enctype="multipart/form-data" >
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
                    <select name="othercontacts[]" id="othercontacts" multiple="multiple" data-placeholder="s&eacute;lectionnez" class="form-control">
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
                    <textarea type="text" rows="5" cols="25" placeholder="Objet de la demande" name="request_object" id="request_object" class="form-control"></textarea>
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
                <label for="" class="col-xs-4 "><strong>Quand</strong><span class="error">*</span></label>
                <div class="col-xs-6">
                    <div class="col-xs-12">
                        <label class="radio">
                            <input type="radio"  value="h" id="quand" name="quand[]" checked class="uni_style"  />
                            Dans l'heure
                        </label>
                        <label class="radio">
                            <input type="radio"  value="d" id="quand" name="quand[]" class="uni_style"  />
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
                <label for="" class="col-xs-4"><strong>chaine(s) &agrave; modifier</strong><span class="error">*</span></label>
                <div class="col-xs-6">
                    <div class="col-xs-12">
                        <label class="checkbox">
                            <input type="checkbox"  value="1" id="broadcasts" name="broadcasts[]" class="uni_style"  />
                            France 2
                        </label>
                        <label class="checkbox">
                            <input type="checkbox"  value="2" id="broadcasts" name="broadcasts[]" class="uni_style"  />
                            France 3
                        </label>
                        <label class="checkbox">
                            <input type="checkbox"  value="3" id="broadcasts" name="broadcasts[]" class="uni_style"  />
                            France 4
                        </label>
                        <label class="checkbox">
                            <input type="checkbox"  value="4" id="broadcasts" name="broadcasts[]" class="uni_style"  />
                            France 5
                        </label>
                        <label class="checkbox">
                            <input type="checkbox"  value="5" id="broadcasts" name="broadcasts[]" class="uni_style"  />
                            France &Ocirc;
                        </label>
                        <label class="checkbox">
                            <input type="checkbox"  value="6" id="broadcasts" name="broadcasts[]" class="uni_style"  />
                            France TV
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-xs-4"><strong>bloc</strong></label>
                <div class="col-xs-6">
                    <div class="col-xs-12">
                        <b>PAGE D'ACCUEIL </b>
                        <label class="checkbox">
                            <input type="checkbox"  value="1" id="modifycontains" name="modifycontains[]" class="uni_style"  />
                            Unes tournantes
                        </label>
                        <label class="checkbox">
                            <input type="checkbox"  value="2" id="modifycontains" name="modifycontains[]" class="uni_style"  />
                            Voir et Revoir
                        </label>
                        <label class="checkbox">
                            <input type="checkbox"  value="3" id="modifycontains" name="modifycontains[]" class="uni_style"  />
                            Les &eacute;missions
                        </label>
                        <label class="checkbox">
                            <input type="checkbox"  value="4" id="modifycontains" name="modifycontains[]" class="uni_style"  />
                            A d&eacute;couvrir
                        </label>
                        <label class="checkbox">
                            <input type="checkbox"  value="5" id="modifycontains" name="modifycontains[]" class="uni_style"  />
                            Les jeux
                        </label>

                        <b>PAGE EMISSIONS</b>
                        <label class="checkbox">
                            <input type="checkbox"  value="6" id="modifycontains" name="modifycontains[]" class="uni_style"  />
                            Une
                        </label>
                        <label class="checkbox">
                            <input type="checkbox"  value="7" id="modifycontains" name="modifycontains[]" class="uni_style"  />
                            Top 3
                        </label>
                        <label class="checkbox">
                            <input type="checkbox"  value="8" id="modifycontains" name="modifycontains[]" class="uni_style"  />
                            Forums
                        </label>
                        <label class="checkbox">
                            <input type="checkbox"  value="9" id="modifycontains" name="modifycontains[]" class="uni_style"  />
                            <b>PAGE VIDEOS</b>
                        </label>
                        <label class="checkbox">
                            <input type="checkbox"  value="10" id="modifycontains" name="modifycontains[]" class="uni_style"  />
                            <b> PAGES DOCUMENTAIRES</b>
                        </label>
                        <label class="checkbox">
                            <input type="checkbox"  value="11" id="modifycontains" name="modifycontains[]" class="uni_style"  />
                            <b>PAGES FRANCE 5 & VOUS</b>
                        </label>
                        <label class="checkbox">
                            <input type="checkbox"  value="12" id="modifycontains" name="modifycontains[]" class="uni_style"  />
                            <b>PAGES INFOS</b>
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
            <button class="btn inline"  data-dismiss="modal" aria-hidden="true">Annuler</button>
            <button type="submit" name="update_profile" value="update" class="btn btn-primary inline"><i class="icon-refresh icon-white"></i> Envoyer la demande</button>
        </div>
    </div>
</div>
</form>
<?php else: ?>
<form name="demandform" class="form-horizontal"  id="demandformedit" method="POST" action="/ftvchaine/newrequest"  enctype="multipart/form-data" >
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 class="modal-title" >Duplication de la demande</h3>
</div>
<div class="modal-body">
<div class="row-fluid">
	<div class="span12">
		   <div class="form-group">
			   <label for="" class="col-xs-4"><strong>En copie de votre demande</strong></label>
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
				   <textarea type="text" rows="5" cols="25" placeholder="Objet de la demande" name="request_object" id="request_object" class="span6"><?php echo $this->_tpl_vars['requestsdetail'][0]['request_object']; ?>
</textarea>
				   <div id="object_err" style="color:red;"></div>
			   </div>
		   </div>
	   
		   <div class="form-group">
			   <label  class="col-xs-4"><strong>Ajouter un ficiher</strong></label>
			   <div class="col-xs-4">
				   <!-- <input type="file" class="span9" name="ftv_doc" id="ftv_doc">-->
				   <div class="mail_uploader">
					   <input type="file" name="attachment[]" id="attachments" class="multi">
				   </div>
			   </div>
		   </div>
	  
		   <div class="form-group">
			   <label  class="col-xs-4"><strong>Quand<span class="error">*</span></strong></label>
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
			   <label for="" class="col-xs-4"><strong>chaine(s) &agrave; modifier<span class="error">*</span></strong></label>
			   <div class="col-xs-6">
				  <!-- <select multiple="multiple" name="broadcasts[]" id="broadcastsedit">
					   <?php $_from = $this->_tpl_vars['broadcast_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['emissionkey'] => $this->_tpl_vars['emissionitem']):
?>
					   <?php if (in_array ( $this->_tpl_vars['emissionkey'] , $this->_tpl_vars['broadcasts_array'] )): ?>
					   <option value="<?php echo $this->_tpl_vars['emissionkey']; ?>
" selected><?php echo $this->_tpl_vars['emissionitem']; ?>
</option>
					   <?php else: ?>
					   <option value="<?php echo $this->_tpl_vars['emissionkey']; ?>
"><?php echo $this->_tpl_vars['emissionitem']; ?>
</option>
					   <?php endif; ?>
					   <?php endforeach; endif; unset($_from); ?>
				   </select>
				   <div id="broadcasts_err" style="color:red;"></div>-->
                   <div class="col-xs-4">
                       <label class="checkbox">
                           <input type="checkbox"  value="1" id="broadcasts" name="broadcasts[]" <?php if (in_array ( '1' , $this->_tpl_vars['broadcasts_array'] )): ?>checked="checked"  <?php endif; ?> class="uni_style"  />
                           France 2
                       </label>
                       <label class="checkbox">
                           <input type="checkbox"  value="2" id="broadcasts" name="broadcasts[]" <?php if (in_array ( '2' , $this->_tpl_vars['broadcasts_array'] )): ?> checked="checked"  <?php endif; ?>class="uni_style"  />
                           France 3
                       </label>
                       <label class="checkbox">
                           <input type="checkbox"  value="3" id="broadcasts" name="broadcasts[]" <?php if (in_array ( '3' , $this->_tpl_vars['broadcasts_array'] )): ?> checked="checked"  <?php endif; ?>class="uni_style"  />
                           France 4
                       </label>
                       <label class="checkbox">
                           <input type="checkbox"  value="4" id="broadcasts" name="broadcasts[]" <?php if (in_array ( '4' , $this->_tpl_vars['broadcasts_array'] )): ?> checked="checked"  <?php endif; ?>class="uni_style"  />
                           France 5
                       </label>
                       <label class="checkbox">
                           <input type="checkbox"  value="5" id="broadcasts" name="broadcasts[]" <?php if (in_array ( '5' , $this->_tpl_vars['broadcasts_array'] )): ?> checked="checked"  <?php endif; ?>class="uni_style"  />
                           France &Ocirc;
                       </label>
                       <label class="checkbox">
                           <input type="checkbox"  value="6" id="broadcasts" name="broadcasts[]" <?php if (in_array ( '6' , $this->_tpl_vars['broadcasts_array'] )): ?> checked="checked"  <?php endif; ?>class="uni_style" />
                           France TV
                       </label>
                   </div>
                   <div id="broadcasts_err" style="color:red;"></div>
			   </div>
		   </div>
	   
		   <div class="form-group">
			   <label for="" class="col-xs-4"><strong>Contenus &agrave;  modifier</strong></label>
			   <div class="col-xs-6">
				   <div class="col-xs-12">
                       <b>PAGE D'ACCUEIL</b>
					   <label class="checkbox">
						   <input type="checkbox"  value="1" id="modifycontainsedit" name="modifycontains[]" <?php if (in_array ( '1' , $this->_tpl_vars['contains_array'] )): ?> checked="checked"  <?php endif; ?> class="uni_style"  />
                           Unes tournantes
					   </label>
					   <label class="checkbox">
						   <input type="checkbox"  value="2" id="modifycontainsedit" name="modifycontains[]" <?php if (in_array ( '2' , $this->_tpl_vars['contains_array'] )): ?> checked="checked"  <?php endif; ?> class="uni_style"  />
                           Voir et Revoir
					   </label>
					   <label class="checkbox">
						   <input type="checkbox"  value="3" id="modifycontainsedit" name="modifycontains[]" <?php if (in_array ( '3' , $this->_tpl_vars['contains_array'] )): ?> checked="checked"  <?php endif; ?> class="uni_style"  />
                           Les &eacute;missions
					   </label>
					   <label class="checkbox">
						   <input type="checkbox"  value="4" id="modifycontainsedit" name="modifycontains[]" <?php if (in_array ( '4' , $this->_tpl_vars['contains_array'] )): ?> checked="checked"  <?php endif; ?> class="uni_style"  />
                           A d&eacute;couvrir
					   </label>
					   <label class="checkbox">
						   <input type="checkbox"  value="5" id="modifycontainsedit" name="modifycontains[]" <?php if (in_array ( '5' , $this->_tpl_vars['contains_array'] )): ?> checked="checked"  <?php endif; ?> class="uni_style"  />
                           Les jeux
					   </label>
                       <b>PAGE EMISSIONS</b>
					   <label class="checkbox">
						   <input type="checkbox"  value="6" id="modifycontainsedit" name="modifycontains[]" <?php if (in_array ( '6' , $this->_tpl_vars['contains_array'] )): ?> checked="checked"  <?php endif; ?> class="uni_style"  />
                           Une
					   </label>
					   <label class="checkbox">
						   <input type="checkbox"  value="7" id="modifycontainsedit" name="modifycontains[]" <?php if (in_array ( '7' , $this->_tpl_vars['contains_array'] )): ?> checked="checked"  <?php endif; ?> class="uni_style"  />
                           Top 3
					   </label>
					   <label class="checkbox">
						   <input type="checkbox"  value="8" id="modifycontainsedit" name="modifycontains[]" <?php if (in_array ( '8' , $this->_tpl_vars['contains_array'] )): ?> checked="checked"  <?php endif; ?> class="uni_style"  />
                           Forums
					   </label>
					   <label class="checkbox">
						   <input type="checkbox"  value="9" id="modifycontainsedit" name="modifycontains[]" <?php if (in_array ( '9' , $this->_tpl_vars['contains_array'] )): ?> checked="checked"  <?php endif; ?> class="uni_style"  />
                         <b> PAGE VIDEOS</b>
					   </label>
                       <label class="checkbox">
                           <input type="checkbox"  value="9" id="modifycontainsedit" name="modifycontains[]" <?php if (in_array ( '9' , $this->_tpl_vars['contains_array'] )): ?> checked="checked"  <?php endif; ?> class="uni_style"  />
                           <b>  PAGES DOCUMENTAIRES</b>
                       </label>
                       <label class="checkbox">
                           <input type="checkbox"  value="9" id="modifycontainsedit" name="modifycontains[]" <?php if (in_array ( '9' , $this->_tpl_vars['contains_array'] )): ?> checked="checked"  <?php endif; ?> class="uni_style"  />
                           <b>  PAGES FRANCE 5 & VOUS</b>
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