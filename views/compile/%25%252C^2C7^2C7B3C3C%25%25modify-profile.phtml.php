<?php /* Smarty version 2.6.19, created on 2016-04-18 15:53:30
         compiled from Contrib/modify-profile.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_select_date', 'Contrib/modify-profile.phtml', 253, false),array('function', 'html_options', 'Contrib/modify-profile.phtml', 340, false),array('modifier', 'count', 'Contrib/modify-profile.phtml', 345, false),)), $this); ?>
<?php if ($_GET['profile'] == 'invoice'): ?>
<script type="text/javascript" src="/FO/script/contrib/profile-validate-invoice.js"></script>
<?php else: ?>
<script type="text/javascript" src="/FO/script/contrib/profile-validate.js"></script>
<?php endif; ?>
<?php echo '
<style>
    #training_more_1 .popover-title, #job_more_1 .popover-title{ display: none; }
    .checkbox:hover{cursor: pointer;cursor: hand;}
</style>
<script type="text/javascript">
    $("#menu_profile").addClass("active");

    /**profile pic uploading**/
    $(function(){
        var btnUpload=$(\'.customfile\');
        var status=$(\'#file_name\');
        new AjaxUpload(btnUpload, {
            action: \'uploadprofilepic\',
            name: \'uploadpic\',
            onSubmit: function(file, ext){
                if (! (ext && /^(jpg|jpeg|gif|png)$/.test(ext))){
                    // extension is not allowed 
                    status.text("Merci d\'uploaded uniquement des fichiers JPG.").css(\'color\',\'#FF0000\');
                    return false;
                }

                /*if (! (ext && /^(doc|docx|rtf)$/.test(ext))){
                 // extension is not allowed
                 status.html(\'Only doc,docx,rtf files are allowed\').css(\'color\',\'#FF0000\');
                 return false;
                 }*/
                status.html(\'<img src="/FO/images/icon-image.gif" /> Chargement..\');
            },
            onComplete: function(file, response){
                //On completion clear the status
                status.text(\'\');
                $(\'#file_name\').html(\'\');

                //Add uploaded file to list
                var obj = $.parseJSON(response);
                var approot="/FO/";

                if(obj.status=="success"){
                    $(\'#spec_file_name\').val(file);

                    var approot="/FO/";
                    var profilepic=approot+obj.path+obj.identifier+"_p."+obj.ext+ \'?\' + (new Date()).getTime();
                    $("#profilepic").attr("src",profilepic);

//                    $(\'#Cropimage\').modal();
//                    var top=$(window).scrollTop();
//                    var box_top=$(\'#Cropimage\').css(\'top\', (parseInt(60) + ((top*2)/$(window).height())) + \'%\');
//                    //alert(approot+obj.path+obj.identifier+"_crop."+obj.ext+ \'?\' + (new Date()).getTime());
//                    $("#cropbox").attr(\'src\',\'#\');
//                    $(".jcrop-holder").remove();
//                    $("#cropbox").removeData(\'Jcrop\');
//                    $("#cropbox").attr("src",approot+obj.path+obj.identifier+"_crop."+obj.ext+ \'?\' + (new Date()).getTime());
//                    $("#cropbox").show();
//                    $(\'#cropbox\').Jcrop({
//                        aspectRatio: 1,
//                        addClass: \'jcrop-dark\',
//                        setSelect: [ 60, 110, 150, 200 ],
//                        onSelect: updateCoords
//                    });

                    if(file.length>25)
                        $(\'#file_name\').html(file.substr(0,25)+".. Uploaded").css(\'color\',\'#006600\');
                    else
                        $(\'#file_name\').html(file+" Uploaded").css(\'color\',\'#006600\');

                    //window.setTimeout(\'location.reload()\', 10);



                }
                else if(obj.status=="smallfile"){

                    $(\'#file_name\').html("L\'image est trop petite, merci d\'en uploader une autre").css(\'color\',\'#FF0000\');
                }
                else{
                    $(\'#file_name\').html(\'Error in upload\').css(\'color\',\'#FF0000\');
                }
            }
        });

        jQuery(\'img\').each(function(){
            jQuery(this).attr(\'src\',jQuery(this).attr(\'src\')+ \'?\' + (new Date()).getTime());
        });

        //show update profile message
        var profile=\''; ?>
<?php echo $_GET['profile']; ?>
<?php echo '\';
        if(profile==\'invoice\')
        {
            $("#profile-update").modal(\'show\');
            $("#profile-update").removeClass( "hide" ).addClass("in");
            //var scrollTop = $(window).scrollTop();
            //$("#profile-update").css("top",scrollTop);
        }

    });

    /**toggle for payment infos**/

    $(\'input[type=radio]\').live(\'click\', function () {

        var payment_type = $("input:radio[name =\'payment_type\']:checked").val();
        var payinfo=$(\'input:radio[name=payinfo]:checked\').val();

        if (this.checked && $(this).val() == \'virement\')
        {
            $("#c_out_france").show();

        }
        else if (this.checked && $(this).val() == \'paypal\')
        {
            $("#c_out_france").hide();
        }

    });

    function switchzipcode(country)
    {
        if(country==101)
        {
            $("#ukzipcode").show();
            $("#otherzipcode").hide();
        }
        else
        {
            $("#ukzipcode").hide();
            $("#otherzipcode").show();
        }
    }
    /* added by naseer on 31-07-2015 */
    function toggle_com_siren(){
        if($("#com_country").val() == 38){
            $("#com_siren_label").show();
        }
        else{
            $("#com_siren_label").hide();
        }
    }

    function toggle_details(val){
        $(".details").hide();
        $("#"+val).show();
        $("#options_group").val(\'selected\');
    }
    /*added by naseer on 04-11-2015*/
    //this function will enable/disable respective inputs//
    function toggle_software_details(self_id){
        if($(\'#\'+self_id).is(\':checked\'))
        {
            $(\'.\'+self_id).prop("disabled",false);//enables textbox
        }
        else
        {
            $(\'.\'+self_id).prop("disabled",true);//on unset checkbox disable textbox
        }
    }
    /*end of added by naseer */
</script>
'; ?>

<div class="container">
    <!-- ajax use start -->
    <div id="Cropimage" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="cropimageLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 id="cropimageLabel">Redimensionner l'image</h3>
        </div>
        <div class="modal-body">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Contrib/profile_image_crop.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>
    </div>
    <!-- ajax use end -->
    <div class="row-fluid">
        <?php if ($this->_tpl_vars['actionmessages'][0]): ?>
        <div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button>
            <i class="icon-ok icon-white"></i> <?php echo $this->_tpl_vars['actionmessages'][0]; ?>
.
        </div>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['selected_ao_count']): ?>
        <div class="span12" style="color:#F47D31;"><h2>Modification du profil : Compl&eacute;tez votre profil pour acc&eacute;der &agrave; votre s&eacute;lection</h2></div>
        <?php else: ?>
        <div class="span12"><h1>Modification du profil
                <div class="pull-right">
                    <a href="/contrib/private-profile" class="btn btn-small"><i class="icon-arrow-left"></i> Retour &agrave; mon profil priv&eacute;</a>
                    <?php if ($this->_tpl_vars['cv_exists'] == 'yes'): ?>
                    <a class="btn btn-small" href="/contrib/download-file?type=cv"><i class="icon-briefcase"></i> Mon CV</a>
                    <?php endif; ?>
                </div>
            </h1>
        </div>
        <?php endif; ?>
    </div>

    <section id="skills-form">
        <form class="form-horizontal" method="POST" action="/contrib/save-profile/" id="contribProfile">
            <div class="mod">
                <div class="row-fluid">
                    <div class="control-group">
                        <label class="control-label span2 offset1" for=""><strong>Mon adresse email <span class="error">*</span></strong></label>
                        <div class="controls span8">
                            <div class="form">
                                <label><input type="text" disabled placeholder="email" class="inline input-large" value="<?php echo $this->_tpl_vars['email']; ?>
" name="email" id="email"></label>

                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label span2 offset1" for=""><strong>Mon mot de passe <span class="error">*</span></strong></label>
                        <div class="controls span8">
                            <div class="form">
                                <label><input type="password" placeholder="password" class="inline input-large" value="<?php echo $this->_tpl_vars['password']; ?>
" name="password" id="password"></label>

                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label span2 offset1" for=""><strong>Confirmation du mot de passe <span class="error">*</span></strong></label>
                        <div class="controls span8">
                            <div class="form">
                                <label><input type="password" placeholder="password" class="inline input-large" value="<?php echo $this->_tpl_vars['password']; ?>
" name="password2" id="password2"></label>

                            </div>
                        </div>
                    </div>
                    <!-- identity -->
                    <div class="control-group">
                        <label class="control-label span2 offset1" for=""><strong>Mon identit&eacute; <span class="error">*</span></strong></label>
                        <div class="controls span8">
                            <div class="form">
                                <label>
                                    <select class="select-large" name="initial" id="initial">
                                        <option value="">Je suis</option>
                                        <option value="mr" <?php if ($this->_tpl_vars['civ'] == 'mr'): ?> selected<?php endif; ?>>un homme</option>
                                        <option value="ms" <?php if ($this->_tpl_vars['civ'] == 'mrs' || $this->_tpl_vars['civ'] == 'ms'): ?> selected<?php endif; ?>>une femme</option>
                                    </select>
                                </label>
                                <label><input type="text" placeholder="Mon pr&eacute;nom" class="inline input-large" value="<?php echo $this->_tpl_vars['fname']; ?>
" name="first_name" id="first_name"></label>
                                <label><input type="text" placeholder="Mon nom" class=" input-large" value="<?php echo $this->_tpl_vars['lname']; ?>
" name="last_name" id="last_name"></label>
                            </div>
                        </div>
                    </div>
                    <!-- birthday -->

                    <div class="control-group">
                        <label class="control-label span2 offset1" for=""><strong>Ma date de naissance <span class="error">*</span></strong></label>
                        <div class="controls span8">
                            <div class="form-inline">
                                <label>
                                    <?php echo smarty_function_html_select_date(array('end_year' => '1910','start_year' => '+0','field_order' => 'DMY','time' => $this->_tpl_vars['dob'],'class' => "input-small",'field_separator' => "</label>&nbsp;<label>"), $this);?>

                                </label>
                            </div>
                        </div>
                    </div>
                    <!--Picture -->
                    <div class="control-group">
                        <label class="control-label span2 offset1" for=""><strong>Photo du profil</strong></label>
                        <div class="controls span8 container-field">
                            <div id="changePicture">
                                <div class="span2">
                                    <div class="editor-container pull-left">
                                        <a href="javascript:void(0);" class="imgframe-large"><img id="profilepic" title="<?php echo $this->_tpl_vars['client_email']; ?>
" src="<?php echo $this->_tpl_vars['profile_image']; ?>
"></a>
                                    </div>
                                </div>
                                <div class="span9 offset1">
                                    <p>Mettre &agrave; jour votre photo :</p>
                                    <input type="file" class="span9" name="file" id="filePJ">
                                    <span id="file_name" class="help-block"></span>
									<span class="help-block">Votre photo doit avoir une taille minimale de 300x300 pixels </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- about me -->
                    <div class="control-group">
                        <label class="control-label span2 offset1" for=""><strong>Texte de pr&eacute;sentation</strong></label>
                        <div class="controls span8" id="mytongue-mod">
                            <textarea class="span12" placeholder="100 caract&egrave;res min" name="self_details" id="self_details" ><?php echo $this->_tpl_vars['self_details']; ?>
</textarea>
                        </div>
                    </div>
                    <!-- added by naseer on 26.11.2015-->

                    <div class="control-group">
                        <label class="control-label span2 offset1" for=""><strong>Twitter ID <!--<span class="error">*</span>--></strong></label>
                        <div class="controls span8">
                            <div class="form">
                                <label><input type="text" placeholder="Twitter ID" class="inline input-large" value="<?php echo $this->_tpl_vars['twitter_id']; ?>
" name="twitter_id" ></label>

                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label span2 offset1" for=""><strong>Facebook ID <!--<span class="error">*</span>--></strong></label>
                        <div class="controls span8">
                            <div class="form">
                                <label><input type="text" placeholder="Facebook ID" class="inline input-large" value="<?php echo $this->_tpl_vars['facebook_id']; ?>
" name="facebook_id" ></label>

                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label span2 offset1" for=""><strong>Website/Blog <!--<span class="error">*</span>--></strong></label>
                        <div class="controls span8">
                            <div class="form">
                                <label><input type="text" placeholder="Website/Blog" class="inline input-large" value="<?php echo $this->_tpl_vars['website']; ?>
" name="website"></label>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label span2 offset1" for=""><strong>Bloc Statut</strong></label>
                        <div class="controls span8" id="mytongue-mod">
                            <label class="checkbox">
                                <input type="checkbox" <?php if ($this->_tpl_vars['writer_preference'] == 'yes'): ?>checked <?php endif; ?> name="writer_preference">R&eacute;dacteur
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" <?php if ($this->_tpl_vars['translator'] == 'yes'): ?>checked <?php endif; ?> name="translator">Traducteur
                            </label>
                        </div>
                    </div>

                </div>
            </div>


            <!-- Start, Languages module -->
            <div class="mod">
                <div class="row-fluid">
                    <div class="control-group">
                        <label class="control-label span2 offset1" for=""><strong>Langue maternelle<span class="error">*</span>
                                <br><br> Autre(s) langue(s) parl&eacute;e(s)
                            </strong></label>
                        <div class="controls span8">
                            <div class="addmore">
                                <select class="span5" name="language" id="language">
                                    <option value=''>Langue maternelle</option>
                                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ep_language_list'],'selected' => $this->_tpl_vars['profile_mother_language']), $this);?>

                                </select>
                            </div>
                        </div>
                        <div class="controls span8">
                            <?php if (count($this->_tpl_vars['language_more']) > 0): ?>
                            <?php $_from = $this->_tpl_vars['language_more']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['moreLanguage'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['moreLanguage']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['lang'] => $this->_tpl_vars['percent']):
        $this->_foreach['moreLanguage']['iteration']++;
?>
                            <?php $this->assign('lang_index', ($this->_foreach['moreLanguage']['iteration']-1)); ?>
                            <!-- Start, new language row -->
                            <div class="addmore" id="language_more_<?php echo $this->_tpl_vars['lang_index']; ?>
">
                                <button  class="close" type="button" id="language_close_<?php echo $this->_tpl_vars['lang_index']; ?>
" <?php if (count($this->_tpl_vars['language_more']) < 2): ?> style="display:none"<?php endif; ?>>&times;</button>
                                <div class="span5">
                                    <select class="span12 margintop" name="language_more[]">
                                        <option value="">S&eacute;lectionnez une langue</option>
                                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ep_language_list'],'selected' => $this->_tpl_vars['lang']), $this);?>

                                    </select>
                                </div>
                                <div class="skillstat span5 offset1">
                                    <div>
                                        <label for="slider-language_number_<?php echo ($this->_foreach['moreLanguage']['iteration']-1); ?>
" class="muted">Votre niveau :</label>
                                        <input type="text" id="slider-language_number_<?php echo ($this->_foreach['moreLanguage']['iteration']-1); ?>
" value="<?php echo $this->_tpl_vars['percent']; ?>
" name="lang_slider_more[]"/>
                                    </div>
                                    <div id="slider-language_<?php echo ($this->_foreach['moreLanguage']['iteration']-1); ?>
" class="lang_slider"><?php echo $this->_tpl_vars['percent']; ?>
</div>
                                    <span class="pull-left legend muted">D&eacute;butant</span> <span class="pull-right legend muted">Bilingue</span>
                                </div>
                            </div>
                            <!-- end, new language row -->
                            <?php endforeach; endif; unset($_from); ?>

                            <?php else: ?>
                            <!-- Start, new language row -->
                            <div class="addmore" id="language_more_0">
                                <div class="span5">
                                    <select class="span12 margintop" name="language_more[]">
                                        <option value="">S&eacute;lectionnez une langue</option>
                                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ep_language_list']), $this);?>

                                    </select>
                                </div>
                                <div class="skillstat span5 offset1">
                                    <div>
                                        <label for="slider-language_number_0" class="muted">Votre niveau :</label>
                                        <input type="text" id="slider-language_number_0" name="lang_slider_more[]" value="50"/>
                                    </div>
                                    <div id="slider-language_0" class="lang_slider">50</div>
                                    <span class="pull-left legend muted">D&eacute;butant</span> <span class="pull-right legend muted">Bilingue</span>
                                </div>
                            </div>
                            <!-- end, new language row -->
                            <?php endif; ?>

                            <!-- start, add language row button -->
                            <p class="addmore-button" id="addmore_lang_link"><a  class="btn btn-link btn-small"><i class="icon-plus"></i> Ajouter une langue</a></p>
                            <!-- end, add language row button -->
                            <!-- end, add language row -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- End, Languages module -->


            <!-- Start, Skills module -->
            <div class="mod">
                <div class="row-fluid">
                    <div class="control-group">
                        <label class="control-label span2 offset1" for=""><strong>Comp&eacute;tences &amp; niveau de maitrise <span class="error">*</span></strong></label>

                        <div class="controls span8" >
                            <?php if (count($this->_tpl_vars['category_more']) > 0): ?>
                            <?php $_from = $this->_tpl_vars['category_more']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['moreSkills'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['moreSkills']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['kcategory'] => $this->_tpl_vars['percent']):
        $this->_foreach['moreSkills']['iteration']++;
?>
                            <?php $this->assign('skill_index', ($this->_foreach['moreSkills']['iteration']-1)); ?>
                            <!-- Start, new skill row -->
                            <div class="addmore" id="skill_more_<?php echo $this->_tpl_vars['skill_index']; ?>
">
                                <button  class="close" type="button" id="skill_close_<?php echo $this->_tpl_vars['skill_index']; ?>
" <?php if (count($this->_tpl_vars['category_more']) < 2): ?> style="display:none"<?php endif; ?>>&times;</button>
                                <div class="span5">
                                    <select class="required span12 margintop" name="ep_category[]" id="ep_category_<?php echo ($this->_foreach['moreSkills']['iteration']-1); ?>
">
                                        <option value="">S&eacute;lectionnez une comp&eacute;tence</option>
                                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ep_categories_list'],'selected' => $this->_tpl_vars['kcategory']), $this);?>

                                    </select>
                                </div>
                                <div class="skillstat span5 offset1">
                                    <div>
                                        <label for="slider-skill_number_<?php echo ($this->_foreach['moreSkills']['iteration']-1); ?>
" class="muted">Votre niveau :</label>
                                        <input type="text" id="slider-skill_number_<?php echo ($this->_foreach['moreSkills']['iteration']-1); ?>
" value="<?php echo $this->_tpl_vars['percent']; ?>
" name="category_slider_more[]"/>
                                    </div>
                                    <div id="slider-skill_<?php echo ($this->_foreach['moreSkills']['iteration']-1); ?>
" class="skill_slider"><?php echo $this->_tpl_vars['percent']; ?>
</div>
                                    <span class="pull-left legend muted">D�butant</span> <span class="pull-right legend muted">Expert</span>
                                </div>
                            </div>
                            <!-- end, new skill row -->
                            <?php endforeach; endif; unset($_from); ?>
                            <?php else: ?>
                            <!-- Start, new skill row -->
                            <div class="addmore" id="skill_more_0">
                                <div class="span5">
                                    <select class="span12 margintop" name="ep_category[]" id="ep_category_0">
                                        <option value="">S&eacute;lectionnez une comp&eacute;tence</option>
                                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ep_categories_list'],'selected' => $this->_tpl_vars['category']), $this);?>

                                    </select>
                                </div>
                                <div class="skillstat span5 offset1">
                                    <div>
                                        <label for="slider-skill_number_0" class="muted">Votre niveau :</label>
                                        <input type="text" id="slider-skill_number_0" name="category_slider_more[]" value="50"/>
                                    </div>
                                    <div id="slider-skill_0" class="skill_slider">50</div>
                                    <span class="pull-left legend muted">D�butant</span> <span class="pull-right legend muted">Expert</span>
                                </div>
                            </div>
                            <!-- end, new skill row -->
                            <?php endif; ?>
                            <!-- start, add language row button -->
                            <p class="addmore-button" id="addmore_skill_link"><a  class="btn btn-link btn-small"><i class="icon-plus"></i> Ajouter une comp�tence</a></p>
                            <!-- end, add language row button -->
                            <!-- end, new skill row -->
                        </div>
                    </div>
                </div>
                <!-- End, Skills module -->
                <div class="row-fluid">
                    <div class="control-group">
                        <label class="control-label span2 offset1" for=""><strong>Software Ownership and Experience Level</strong></label>
                        <div class="controls span8">
                            <table class="table table-bordered">
                                <tr>
                                    <td></td>
                                    <td>Beginner</td>
                                    <td>Intermediate</td>
                                    <td>Advanced</td>
                                    <td>I own it</td>
                                </tr>
                                                                <?php $_from = $this->_tpl_vars['ep_software_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['SoftwareList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['SoftwareList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['softwarekey'] => $this->_tpl_vars['software']):
        $this->_foreach['SoftwareList']['iteration']++;
?>
                                <?php $this->assign('s_index', ($this->_foreach['SoftwareList']['iteration']-1)+1); ?>
                                    <?php if ($this->_tpl_vars['previous_software'] != $this->_tpl_vars['software'][0]): ?>
                                        <tr style="background-color: #DDDDDD;">
                                            <td><b><?php echo $this->_tpl_vars['software'][0]; ?>
</b></td>
                                            <td colspan="4"></td>
                                        </tr>
                                    <?php endif; ?>
                                    <!--code to check if the value is saved in DB-->
                                    <?php $this->assign('check', 0); ?>
                                    <?php $this->assign('condition', 'false'); ?>
                                    <?php $this->assign('level', 'false'); ?>
                                    <?php $this->assign('own', 'false'); ?>
                                    <?php while ($this->_tpl_vars['check'] < $this->_tpl_vars['software_list_count']) { ?>
                                        <?php if ($this->_tpl_vars['software_list'][$this->_tpl_vars['check']][0] == $this->_tpl_vars['softwarekey']): ?>
                                            <?php $this->assign('condition', 'true'); ?>
                                            <?php $this->assign('level', $this->_tpl_vars['software_list'][$this->_tpl_vars['check']][1]); ?>
                                            <?php $this->assign('own', $this->_tpl_vars['software_list'][$this->_tpl_vars['check']][2]); ?>
                                        <?php endif; ?>
                                        <?php $this->assign('check', $this->_tpl_vars['check']+1); ?>
                                    <?php } ?>
                                    <!-- end of code to check if the value is saved in DB -->
                                    <?php if ($this->_tpl_vars['condition'] == 'true'): ?>
                                        <tr>
                                            <td>
                                                <label class="checkbox">
                                                    <input type="checkbox" name="software_name[<?php echo $this->_tpl_vars['s_index']; ?>
]" id="software_<?php echo $this->_tpl_vars['s_index']; ?>
" value="<?php echo $this->_tpl_vars['softwarekey']; ?>
" checked onclick="toggle_software_details(this.id);" /><?php echo $this->_tpl_vars['software'][1]; ?>

                                                </label>
                                            </td>
                                            <td><label class="radio "><input type="radio" name="software_level[<?php echo $this->_tpl_vars['s_index']; ?>
]" class="software_<?php echo $this->_tpl_vars['s_index']; ?>
" value="beginner" <?php if ($this->_tpl_vars['level'] == 'beginner'): ?>checked<?php endif; ?>/></label></td>
                                            <td><label class="radio "><input type="radio" name="software_level[<?php echo $this->_tpl_vars['s_index']; ?>
]" class="software_<?php echo $this->_tpl_vars['s_index']; ?>
" value="intermediate" <?php if ($this->_tpl_vars['level'] == 'intermediate'): ?>checked<?php endif; ?>/></label></td>
                                            <td><label class="radio "><input type="radio" name="software_level[<?php echo $this->_tpl_vars['s_index']; ?>
]" class="software_<?php echo $this->_tpl_vars['s_index']; ?>
" value="advanced" <?php if ($this->_tpl_vars['level'] == 'advanced'): ?>checked<?php endif; ?>/></label></td>
                                            <td><label class="checkbox"><input type="checkbox" name="software_own[<?php echo $this->_tpl_vars['s_index']; ?>
]" class="software_<?php echo $this->_tpl_vars['s_index']; ?>
" <?php if ($this->_tpl_vars['own'] == 'on'): ?>checked<?php endif; ?>/></label></td>
                                        </tr>
                                    <?php else: ?>
                                            <tr>

                                                <td>
                                                    <label class="checkbox">
                                                        <input type="checkbox" name="software_name[<?php echo $this->_tpl_vars['s_index']; ?>
]" id="software_<?php echo $this->_tpl_vars['s_index']; ?>
" value="<?php echo $this->_tpl_vars['softwarekey']; ?>
" onclick="toggle_software_details(this.id);"  /><?php echo $this->_tpl_vars['software'][1]; ?>

                                                    </label>
                                                </td>

                                                <td><label class="radio "><input type="radio" name="software_level[<?php echo $this->_tpl_vars['s_index']; ?>
]" class="software_<?php echo $this->_tpl_vars['s_index']; ?>
" value="beginner" disabled/></label></td>
                                                <td><label class="radio "><input type="radio" name="software_level[<?php echo $this->_tpl_vars['s_index']; ?>
]" class="software_<?php echo $this->_tpl_vars['s_index']; ?>
" value="intermediate" disabled/></label></td>
                                                <td><label class="radio "><input type="radio" name="software_level[<?php echo $this->_tpl_vars['s_index']; ?>
]" class="software_<?php echo $this->_tpl_vars['s_index']; ?>
" value="advanced" disabled/></label></td>
                                                <td><label class="checkbox"><input type="checkbox" name="software_own[<?php echo $this->_tpl_vars['s_index']; ?>
]" class="software_<?php echo $this->_tpl_vars['s_index']; ?>
" disabled/></label></td>
                                            </tr>
                                    <?php endif; ?>
                                                                        <?php $this->assign('previous_software', $this->_tpl_vars['software'][0]); ?>
                                <?php endforeach; endif; unset($_from); ?>

                            </table>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Start, Job module -->
            <div class="mod">
                <div class="row-fluid">
                    <div class="control-group">
                        <label class="control-label span2 offset1" for=""><strong>Exp&eacute;riences professionnelles</strong>
                            <br><span id="job_error"></span>
                        </label>

                        <div class="controls span8">
                            <?php if (count($this->_tpl_vars['jobDetails']) > 0): ?>
                            <?php $_from = $this->_tpl_vars['jobDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['job_details'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['job_details']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['job']):
        $this->_foreach['job_details']['iteration']++;
?>
                            <?php $this->assign('job_index', ($this->_foreach['job_details']['iteration']-1)+1); ?>

                            <!-- Start, job row -->
                            <div class="addmore" id="job_more_<?php echo $this->_tpl_vars['job_index']; ?>
">

                                <button  class="close" type="button" id="job_close_<?php echo $this->_tpl_vars['job_index']; ?>
" rel="<?php echo $this->_tpl_vars['job']['identifier']; ?>
"  <?php if (count($this->_tpl_vars['jobDetails']) < 2): ?> style="display:none"<?php endif; ?>>&times;</button>

                                <label><input class="span5" id="JobName_<?php echo $this->_tpl_vars['job_index']; ?>
" value="<?php echo $this->_tpl_vars['job']['title']; ?>
" name="job_title[]" placeholder="Intitul&eacute; du poste"><?php if (($this->_foreach['job_details']['iteration'] <= 1)): ?><span data-original-title="" data-content="ces informations sont optionnelles mais contribuent &agrave; valoriser votre profil de r&eacute;dacteur" rel="popover" data-trigger="hover" data-placement="right" data-html="true" class=""><i class="icon-info-sign"></i></span><?php endif; ?></label>
                                <label><input class="span5" id="CompanyName_<?php echo $this->_tpl_vars['job_index']; ?>
" value="<?php echo $this->_tpl_vars['job']['institute']; ?>
" name="job_institute[]" placeholder="Nom de l'entreprise"></label>
                                <select class="span5" name="ep_job[]" id="ep_job_<?php echo $this->_tpl_vars['job_index']; ?>
">
                                    <option value="">S&eacute;lectionner le type de contrat</option>
                                    <!--<option value="cdi" <?php if ($this->_tpl_vars['job']['contract'] == 'cdi'): ?>selected<?php endif; ?>>CDI</option>
                                    <option value="cdd" <?php if ($this->_tpl_vars['job']['contract'] == 'cdd'): ?>selected<?php endif; ?>>CDD</option>-->
                                    <option value="freelance" <?php if ($this->_tpl_vars['job']['contract'] == 'freelance'): ?>selected<?php endif; ?>>Freelance</option>
                                    <!--	<option value="intern" <?php if ($this->_tpl_vars['job']['contract'] == 'intern'): ?>selected<?php endif; ?>>Interim</option>-->
                                    <option value="stage" <?php if ($this->_tpl_vars['job']['contract'] == 'stage'): ?>selected<?php endif; ?>>Stage</option>
                                    <option value="missionsalary" <?php if ($this->_tpl_vars['job']['contract'] == 'missionsalary'): ?>selected<?php endif; ?>>Missions salari&eacute;es </option>
                                </select>
                                <div class="clearfix">
                                    <div class="container-field span5">
                                        <label>
                                            <span class="span3">D&eacute;but</span>
                                        </label>
                                        <select class="input-small inline" name="start_month[]">
                                            <option value="1" <?php if ($this->_tpl_vars['job']['from_month'] == '1'): ?>selected<?php endif; ?>>Janvier</option>
                                            <option value="2" <?php if ($this->_tpl_vars['job']['from_month'] == '2'): ?>selected<?php endif; ?>>F&eacute;vrier</option>
                                            <option value="3" <?php if ($this->_tpl_vars['job']['from_month'] == '3'): ?>selected<?php endif; ?>>Mars</option>
                                            <option value="4" <?php if ($this->_tpl_vars['job']['from_month'] == '4'): ?>selected<?php endif; ?>>Avril</option>
                                            <option value="5" <?php if ($this->_tpl_vars['job']['from_month'] == '5'): ?>selected<?php endif; ?>>Mai</option>
                                            <option value="6" <?php if ($this->_tpl_vars['job']['from_month'] == '6'): ?>selected<?php endif; ?>>Juin</option>
                                            <option value="7" <?php if ($this->_tpl_vars['job']['from_month'] == '7'): ?>selected<?php endif; ?>>Juillet</option>
                                            <option value="8" <?php if ($this->_tpl_vars['job']['from_month'] == '8'): ?>selected<?php endif; ?>>Ao&ucirc;t</option>
                                            <option value="9" <?php if ($this->_tpl_vars['job']['from_month'] == '9'): ?>selected<?php endif; ?>>Septembre</option>
                                            <option value="10" <?php if ($this->_tpl_vars['job']['from_month'] == '10'): ?>selected<?php endif; ?>>Octobre</option>
                                            <option value="11" <?php if ($this->_tpl_vars['job']['from_month'] == '11'): ?>selected<?php endif; ?>>Novembre</option>
                                            <option value="12" <?php if ($this->_tpl_vars['job']['from_month'] == '12'): ?>selected<?php endif; ?>>D&eacute;cembre</option>
                                        </select>
                                        &nbsp;&nbsp;<input class="input-small inline" id="start_year_<?php echo $this->_tpl_vars['job_index']; ?>
" placeholder="Ann&eacute;e" value="<?php echo $this->_tpl_vars['job']['from_year']; ?>
" name="start_year[]">

                                        <div class="collapse <?php if ($this->_tpl_vars['job']['still_working'] != 'yes'): ?> in <?php endif; ?>" id="stillWorkingThere_<?php echo $this->_tpl_vars['job_index']; ?>
">
                                            <label>
                                                <span class="span3">Fin</span>
                                            </label>
                                            <select class="input-small inline" name="end_month[]">
                                                <option value="1" <?php if ($this->_tpl_vars['job']['to_month'] == '1'): ?>selected<?php endif; ?>>Janvier</option>
                                                <option value="2" <?php if ($this->_tpl_vars['job']['to_month'] == '2'): ?>selected<?php endif; ?>>F&eacute;vrier</option>
                                                <option value="3" <?php if ($this->_tpl_vars['job']['to_month'] == '3'): ?>selected<?php endif; ?>>Mars</option>
                                                <option value="4" <?php if ($this->_tpl_vars['job']['to_month'] == '4'): ?>selected<?php endif; ?>>Avril</option>
                                                <option value="5" <?php if ($this->_tpl_vars['job']['to_month'] == '5'): ?>selected<?php endif; ?>>Mai</option>
                                                <option value="6" <?php if ($this->_tpl_vars['job']['to_month'] == '6'): ?>selected<?php endif; ?>>Juin</option>
                                                <option value="7" <?php if ($this->_tpl_vars['job']['to_month'] == '7'): ?>selected<?php endif; ?>>Juillet</option>
                                                <option value="8" <?php if ($this->_tpl_vars['job']['to_month'] == '8'): ?>selected<?php endif; ?>>Ao&ucirc;t</option>
                                                <option value="9" <?php if ($this->_tpl_vars['job']['to_month'] == '9'): ?>selected<?php endif; ?>>Septembre</option>
                                                <option value="10" <?php if ($this->_tpl_vars['job']['to_month'] == '10'): ?>selected<?php endif; ?>>Octobre</option>
                                                <option value="11" <?php if ($this->_tpl_vars['job']['to_month'] == '11'): ?>selected<?php endif; ?>>Novembre</option>
                                                <option value="12" <?php if ($this->_tpl_vars['job']['to_month'] == '12'): ?>selected<?php endif; ?>>D&eacute;cembre</option>
                                            </select>
                                            &nbsp;&nbsp;<input class="input-small inline" id="end_year_<?php echo $this->_tpl_vars['job_index']; ?>
" placeholder="Ann&eacute;e" value="<?php echo $this->_tpl_vars['job']['to_year']; ?>
" name="end_year[]">

                                        </div>
                                        <label class="checkbox">
                                            <input type="checkbox" id="still_working_<?php echo $this->_tpl_vars['job_index']; ?>
" data-target="#stillWorkingThere_1" data-toggle="collapse" <?php if ($this->_tpl_vars['job']['still_working'] == 'yes'): ?> checked <?php endif; ?>  name="still_working[]">J'occupe toujours ce poste
                                        </label>
                                        <input type="hidden" name="job_identifier[]" value="<?php echo $this->_tpl_vars['job']['identifier']; ?>
">
                                    </div>
                                </div>
                            </div>
                            <!-- end, job row -->
                            <?php endforeach; endif; unset($_from); ?>
                            <?php else: ?>
                            <!-- Start, job row -->
                            <div class="addmore" id="job_more_1">
                                <label><input class="span5" id="JobName_1" name="job_title[]" placeholder="Intitul&eacute; du poste"><span data-original-title="" data-content="ces informations sont optionnelles mais contribuent &agrave; valoriser votre profil de r&eacute;dacteur" rel="popover" data-trigger="hover" data-placement="right" data-html="true" class=""><i class="icon-info-sign"></i></span></label>
                                <label><input class="span5" id="CompanyName_1" name="job_institute[]" placeholder="Nom de l'entreprise"></label>
                                <select class="span5" name="ep_job[]" id="ep_job_1">
                                    <option value="">S&eacute;lectionner le type de contrat</option>
                                    <option value="cdi">CDI</option>
                                    <option value="cdd">CDD</option>
                                    <option value="freelance">Freelance</option>
                                    <option value="intern">Interim</option>
                                    <option value="stage">Stage</option>
                                </select>
                                <div class="clearfix">
                                    <div class="container-field span5">
                                        <label>
                                            <span class="span3">D&eacute;but</span>
                                        </label>
                                        <select class="input-small inline" name="start_month[]">
                                            <option value="1" selected>Janvier</option>
                                            <option value="2">F&eacute;vrier</option>
                                            <option value="3">Mars</option>
                                            <option value="4">Avril</option>
                                            <option value="5">Mai</option>
                                            <option value="6">Juin</option>
                                            <option value="7">Juillet</option>
                                            <option value="8">Ao&ucirc;t</option>
                                            <option value="9">Septembre</option>
                                            <option value="10">Octobre</option>
                                            <option value="11">Novembre</option>
                                            <option value="12">D&eacute;cembre</option>
                                        </select>
                                        &nbsp;&nbsp;<input class="input-small inline" id="start_year_1" placeholder="Ann&eacute;e" name="start_year[]">

                                        <div class="collapse in" id="stillWorkingThere_1">
                                            <label>
                                                <span class="span3">Fin</span>
                                            </label>
                                            <select class="input-small inline" name="end_month[]">
                                                <option value="1" selected>Janvier</option>
                                                <option value="2">F&eacute;vrier</option>
                                                <option value="3">Mars</option>
                                                <option value="4">Avril</option>
                                                <option value="5">Mai</option>
                                                <option value="6">Juin</option>
                                                <option value="7">Juillet</option>
                                                <option value="8">Ao&ucirc;t</option>
                                                <option value="9">Septembre</option>
                                                <option value="10">Octobre</option>
                                                <option value="11">Novembre</option>
                                                <option value="12">D&eacute;cembre</option>
                                            </select>
                                            &nbsp;&nbsp;<input class="input-small inline" id="end_year_1" placeholder="Ann&eacute;e" name="end_year[]">

                                        </div>
                                        <label class="checkbox">
                                            <input type="checkbox" id="still_working_1" data-target="#stillWorkingThere_1" data-toggle="collapse" name="still_working[]">J'occupe toujours ce poste
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- end, job row -->
                            <?php endif; ?>
                            <p class="addmore-button" id="addmore_job_link"><a class="btn btn-link btn-small"><i class="icon-plus"></i> Ajouter une exp�rience</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End, Job -->
            <!-- Start, Training module -->
            <div class="mod">
                <div class="row-fluid">
                    <div class="control-group">
                        <label class="control-label span2 offset1" for=""><strong>Formation</strong>
                            <br><span id="edu_error"></span>
                        </label>
                        <div class="controls span8">
                            <?php if (count($this->_tpl_vars['educationDetails']) > 0): ?>
                            <?php $_from = $this->_tpl_vars['educationDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['edu_details'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['edu_details']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['education']):
        $this->_foreach['edu_details']['iteration']++;
?>
                            <?php $this->assign('edu_index', ($this->_foreach['edu_details']['iteration']-1)+1); ?>
                            <!-- Start, School row -->
                            <div class="addmore" id="training_more_<?php echo $this->_tpl_vars['edu_index']; ?>
">

                                <button  class="close" type="button" id="training_close_<?php echo $this->_tpl_vars['edu_index']; ?>
" rel="<?php echo $this->_tpl_vars['education']['identifier']; ?>
" <?php if (count($this->_tpl_vars['educationDetails']) < 2): ?> style="display:none"<?php endif; ?>>&times;</button>

                                <label><input class="span5" id="trainingName_<?php echo $this->_tpl_vars['edu_index']; ?>
" value="<?php echo $this->_tpl_vars['education']['title']; ?>
" name="training_title[]" placeholder="Intitul&eacute; de la formation"><span data-original-title="" data-content="ces informations sont optionnelles mais contribuent &agrave; valoriser votre profil de r&eacute;dacteur" rel="popover" data-trigger="hover" data-placement="right" data-html="true" class=""><i class="icon-info-sign"></i></span></label>
                                <label><input class="span5" id="trainingSchoolName_<?php echo $this->_tpl_vars['edu_index']; ?>
" value="<?php echo $this->_tpl_vars['education']['institute']; ?>
" name="training_institute[]" placeholder="Ecole, universit&eacute;, etc..."></label>
                                <div class="clearfix">
                                    <div class="container-field span5">
                                        <label>
                                            <span class="span3">D&eacute;but</span>
                                        </label>
                                        <select class="input-small inline" name="start_train_month[]">
                                            <option value="1" <?php if ($this->_tpl_vars['education']['from_month'] == '1'): ?>selected<?php endif; ?>>Janvier</option>
                                            <option value="2" <?php if ($this->_tpl_vars['education']['from_month'] == '2'): ?>selected<?php endif; ?>>F&eacute;vrier</option>
                                            <option value="3" <?php if ($this->_tpl_vars['education']['from_month'] == '3'): ?>selected<?php endif; ?>>Mars</option>
                                            <option value="4" <?php if ($this->_tpl_vars['education']['from_month'] == '4'): ?>selected<?php endif; ?>>Avril</option>
                                            <option value="5" <?php if ($this->_tpl_vars['education']['from_month'] == '5'): ?>selected<?php endif; ?>>Mai</option>
                                            <option value="6" <?php if ($this->_tpl_vars['education']['from_month'] == '6'): ?>selected<?php endif; ?>>Juin</option>
                                            <option value="7" <?php if ($this->_tpl_vars['education']['from_month'] == '7'): ?>selected<?php endif; ?>>Juillet</option>
                                            <option value="8" <?php if ($this->_tpl_vars['education']['from_month'] == '8'): ?>selected<?php endif; ?>>Ao&ucirc;t</option>
                                            <option value="9" <?php if ($this->_tpl_vars['education']['from_month'] == '9'): ?>selected<?php endif; ?>>Septembre</option>
                                            <option value="10" <?php if ($this->_tpl_vars['education']['from_month'] == '10'): ?>selected<?php endif; ?>>Octobre</option>
                                            <option value="11" <?php if ($this->_tpl_vars['education']['from_month'] == '11'): ?>selected<?php endif; ?>>Novembre</option>
                                            <option value="12" <?php if ($this->_tpl_vars['education']['from_month'] == '12'): ?>selected<?php endif; ?>>D&eacute;cembre</option>
                                        </select>
                                        &nbsp;&nbsp;<input class="input-small inline" placeholder="Ann&eacute;e" id="start_train_year_<?php echo $this->_tpl_vars['edu_index']; ?>
" value="<?php echo $this->_tpl_vars['education']['from_year']; ?>
" name="start_train_year[]">

                                        <div class="collapse  <?php if ($this->_tpl_vars['education']['still_working'] != 'yes'): ?> in <?php endif; ?>" id="stillTrainingThere_<?php echo $this->_tpl_vars['edu_index']; ?>
">
                                            <label>
                                                <span class="span3">Fin</span>
                                            </label>
                                            <select class="input-small inline" name="end_train_month[]">
                                                <option value="1" <?php if ($this->_tpl_vars['education']['to_month'] == '1'): ?>selected<?php endif; ?>>Janvier</option>
                                                <option value="2" <?php if ($this->_tpl_vars['education']['to_month'] == '2'): ?>selected<?php endif; ?>>F&eacute;vrier</option>
                                                <option value="3" <?php if ($this->_tpl_vars['education']['to_month'] == '3'): ?>selected<?php endif; ?>>Mars</option>
                                                <option value="4" <?php if ($this->_tpl_vars['education']['to_month'] == '4'): ?>selected<?php endif; ?>>Avril</option>
                                                <option value="5" <?php if ($this->_tpl_vars['education']['to_month'] == '5'): ?>selected<?php endif; ?>>Mai</option>
                                                <option value="6" <?php if ($this->_tpl_vars['education']['to_month'] == '6'): ?>selected<?php endif; ?>>Juin</option>
                                                <option value="7" <?php if ($this->_tpl_vars['education']['to_month'] == '7'): ?>selected<?php endif; ?>>Juillet</option>
                                                <option value="8" <?php if ($this->_tpl_vars['education']['to_month'] == '8'): ?>selected<?php endif; ?>>Ao&ucirc;t</option>
                                                <option value="9" <?php if ($this->_tpl_vars['education']['to_month'] == '9'): ?>selected<?php endif; ?>>Septembre</option>
                                                <option value="10" <?php if ($this->_tpl_vars['education']['to_month'] == '10'): ?>selected<?php endif; ?>>Octobre</option>
                                                <option value="11" <?php if ($this->_tpl_vars['education']['to_month'] == '11'): ?>selected<?php endif; ?>>Novembre</option>
                                                <option value="12" <?php if ($this->_tpl_vars['education']['to_month'] == '12'): ?>selected<?php endif; ?>>D&eacute;cembre</option>
                                            </select>
                                            &nbsp;&nbsp;<input class="input-small inline" id="end_train_year_<?php echo $this->_tpl_vars['edu_index']; ?>
" placeholder="Ann&eacute;e" value="<?php echo $this->_tpl_vars['education']['to_year']; ?>
" name="end_train_year[]" >

                                        </div>
                                        <label class="checkbox">
                                            <input type="checkbox" id="still_training_<?php echo $this->_tpl_vars['edu_index']; ?>
" data-target="#stillTrainingThere_<?php echo $this->_tpl_vars['edu_index']; ?>
" name="still_training[]" data-toggle="collapse" <?php if ($this->_tpl_vars['education']['still_working'] == 'yes'): ?> checked <?php endif; ?>>Je suis toujours en formation
                                        </label>
                                        <input type="hidden" name="training_identifier[]" value="<?php echo $this->_tpl_vars['education']['identifier']; ?>
">
                                    </div>
                                </div>
                            </div>
                            <!-- end, school row -->

                            <?php endforeach; endif; unset($_from); ?>
                            <?php else: ?>
                            <!-- Start, School row -->
                            <div class="addmore" id="training_more_1">
                                <label><input class="span5" id="trainingName_1" name="training_title[]" placeholder="Intitul&eacute; de la formation"><span data-original-title="" data-content="ces informations sont optionnelles mais contribuent &agrave; valoriser votre profil de r&eacute;dacteur" rel="popover" data-trigger="hover" data-placement="right" data-html="true" class=""><i class="icon-info-sign"></i></span></label>
                                <label><input class="span5" id="trainingSchoolName_1" name="training_institute[]" placeholder="Ecole, universit&eacute;, etc..."></label>
                                <div class="clearfix">
                                    <div class="container-field span5">
                                        <label>
                                            <span class="span3">D&eacute;but</span>
                                        </label>
                                        <select class="input-small inline" name="start_train_month[]">
                                            <option value="1" selected>Janvier</option>
                                            <option value="2">F&eacute;vrier</option>
                                            <option value="3">Mars</option>
                                            <option value="4">Avril</option>
                                            <option value="5">Mai</option>
                                            <option value="6">Juin</option>
                                            <option value="7">Juillet</option>
                                            <option value="8">Ao&ucirc;t</option>
                                            <option value="9">Septembre</option>
                                            <option value="10">Octobre</option>
                                            <option value="11">Novembre</option>
                                            <option value="12">D&eacute;cembre</option>
                                        </select>
                                        &nbsp;&nbsp;<input class="input-small inline" id="start_train_year_1" placeholder="Ann&eacute;e" name="start_train_year[]">

                                        <div class="collapse in" id="stillTrainingThere_1">
                                            <label>
                                                <span class="span3">Fin</span>
                                            </label>
                                            <select class="input-small inline" name="end_train_month[]">
                                                <option value="1" selected>Janvier</option>
                                                <option value="2">F&eacute;vrier</option>
                                                <option value="3">Mars</option>
                                                <option value="4">Avril</option>
                                                <option value="5">Mai</option>
                                                <option value="6">Juin</option>
                                                <option value="7">Juillet</option>
                                                <option value="8">Ao&ucirc;t</option>
                                                <option value="9">Septembre</option>
                                                <option value="10">Octobre</option>
                                                <option value="11">Novembre</option>
                                                <option value="12">D&eacute;cembre</option>
                                            </select>
                                            &nbsp;&nbsp;<input class="input-small inline" id="end_train_year_1" placeholder="Ann&eacute;e" name="end_train_year[]">
                                            </label>
                                        </div>
                                        <label class="checkbox">
                                            <input type="checkbox" id="still_training_1" data-target="#stillTrainingThere_1" name="still_training[]" data-toggle="collapse">Je suis toujours en formation
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- end, school row -->
                            <?php endif; ?>
                            <p class="addmore-button" id="addmore_training_link"><a  class="btn btn-link btn-small"><i class="icon-plus"></i> Ajouter une formation</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End, Training module -->
            <!-- Start, personal info module -->
            <div class="mod">
                <div class="row-fluid">
                    <div class="control-group">
                        <label class="control-label span2 offset1" for=""><strong>Informations personnelles <span class="error">*</span></strong></label>
                        <div class="controls span8">
                            <label>
                                <select class="span5" name="nationality" id="nationality">
                                    <option value="">Nationalit&eacute;</option>
                                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ep_nationality_list'],'selected' => $this->_tpl_vars['nationality']), $this);?>

                                </select>
                            </label>
                            <label><input class="span5" id="address" name="address" placeholder="Adresse" value="<?php echo $this->_tpl_vars['address']; ?>
"></label>
                            <label><input class="span5" id="phone_number" name="phone_number" placeholder="T&eacute;l&eacute;phone" value="<?php echo $this->_tpl_vars['phonenumber']; ?>
"></label>
                            <label><input class="span5" id="city" name="city" placeholder="Ville" value="<?php echo $this->_tpl_vars['city']; ?>
"></label>
                            <div id="ukzipcode" <?php if ($this->_tpl_vars['country'] != 101): ?>style="display:none"<?php endif; ?>>
                                <label>
                                    <input class="span2" id="zipcode1" name="zipcode1" placeholder="Code postal" value="<?php echo $this->_tpl_vars['zipcode1']; ?>
" maxlength="4"/>
                                    <input class="span2" id="zipcode2" name="zipcode2" placeholder="Code postal" value="<?php echo $this->_tpl_vars['zipcode2']; ?>
" maxlength="3"/>
                                    <label for="zipcode1" generated="true" class="error"></label>
                                    <label for="zipcode2" generated="true" class="error"></label>
                                </label>
                            </div>
                            <div id="otherzipcode" <?php if ($this->_tpl_vars['country'] == 101): ?>style="display:none"<?php endif; ?>>
                                <label>
                                    <input class="span5" id="zipcode" name="zipcode" placeholder="Code postal" value="<?php echo $this->_tpl_vars['zipcode']; ?>
" />
                                </label>
                            </div>

                            <label>
                                <select class="span5" name="country" id="country" Onchange="switchzipcode(this.value)">
                                    <option value="">Pays</option>
                                    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ep_pays_list'],'selected' => $this->_tpl_vars['country']), $this);?>

                                </select>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- End, personal info module -->
            <!-- added by naseer on 31-07-2015 -->

            <!-- -->
            <!-- company details -->
            <div class="mod">
                <div class="row-fluid"  >
                    <!-- passport and id card details-->
                    <div class="control-group">
                        <label class="radio controls span1 offset1">
                            <input type="radio" type="radio" name="options_flag" id="reg_check" value="reg_check" onclick="toggle_details('reg_check_details');" <?php if ($this->_tpl_vars['options_flag'] == 'reg_check'): ?>checked<?php endif; ?>>
                        </label>
                        <label class="span2" for="reg_check">
                            <strong>Autre cas</strong>
                        </label>
                        <div class=" span3 ">
                            <div id="reg_check_details" class="details <?php if ($this->_tpl_vars['options_flag'] != 'reg_check'): ?>hide<?php endif; ?>">
                            <label ><input class="span9" id="passport_no" name="passport_no" placeholder="Num&eacute;ro de passeport" value="<?php echo $this->_tpl_vars['passport_no']; ?>
"></label>
                            <label><input class="span9" id="id_card" name="id_card" placeholder="Carte d'identit&eacute;" value="<?php echo $this->_tpl_vars['id_card']; ?>
"></label>
                            </div>
                        </div>
                        <div class=" span4">
                            <div class="alert alert-info ">
                                <i class="icon-arrow-right"></i>
                                Attention ce statut &laquo; Autre cas &raquo; est un statut temporaire si vous n'&ecirc;tes ni une Soci&eacute;t&eacute;, ni un auto-entrepreneur. Il vous appartient de choisir un statut en vous mettant en conformit&eacute; avec la l&eacute;gislation de votre pays.
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="radio controls span1 offset1">
                            <input type="radio" type="radio" name="options_flag"  id="com_check" value="com_check" onchange="toggle_details('company_details');" <?php if ($this->_tpl_vars['options_flag'] == 'com_check'): ?>checked<?php endif; ?>>
                        </label>
                        <label class="span2 " for="com_check">
                            <strong>Soci&eacute;t&eacute; </strong>
                        </label>

                        <div class=" span5">
                            <div id="company_details" class="details <?php if ($this->_tpl_vars['options_flag'] != 'com_check'): ?>hide<?php endif; ?>">
                                <label><input class="span9" id="com_name" name="com_name" placeholder="D&eacute;nomination sociale" value="<?php echo $this->_tpl_vars['com_name']; ?>
"><span class="error">*</span></label>
                                <label><input class="span9" id="com_address" name="com_address" placeholder="Adresse" value="<?php echo $this->_tpl_vars['com_address']; ?>
"><span class="error">*</span></label>
                                <label><input class="span9" id="com_city" name="com_city" placeholder="Ville" value="<?php echo $this->_tpl_vars['com_city']; ?>
"><span class="error">*</span></label>
                                <label><input class="span9" id="com_zipcode" name="com_zipcode" placeholder="Code postal" value="<?php echo $this->_tpl_vars['com_zipcode']; ?>
"><span class="error">*</span></label>
                                <label>
                                    <select class="span9" name="com_country" id="com_country" onchange="toggle_com_siren();">
                                        <option value="">Pays</option>
                                        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['ep_nationality_list'],'selected' => $this->_tpl_vars['com_country']), $this);?>

                                    </select><span class="error">*</span>
                                </label>
                                <label id="com_siren_label"  <?php if ($this->_tpl_vars['com_country'] != '38'): ?>style="display: none;"<?php endif; ?>>
                                    <input class="span9" name="com_siren" id="com_siren" placeholder="Siren" value="<?php echo $this->_tpl_vars['com_siren']; ?>
" /><span class="error">*</span>
                                </label>

                                <label><input class="span9" id="com_tva_number" name="com_tva_number" placeholder="Num&eacute;ro de TVA Intracommunautaire" value="<?php echo $this->_tpl_vars['com_tva_number']; ?>
"><span class="error">*</span></label>
                                <label><input class="span9" id="com_phone" name="com_phone" placeholder="T&eacute;l&eacute;phone" value="<?php echo $this->_tpl_vars['com_phone']; ?>
"><span class="error">*</span></label>
                            </div>
                        </div>
                    </div>

                                <div class="control-group">

                    <label class="radio controls span1 offset1">
                        <input  type="radio" type="radio" name="options_flag" id="tva_check" value="tva_check" onchange="toggle_details('tva_details');"  <?php if ($this->_tpl_vars['options_flag'] == 'tva_check'): ?>checked<?php endif; ?> >
                    </label>
                    <label class=" span2 " for="tva_check">
                       <strong>Auto-entrepreneur</strong>
                    </label>
                    </label>
                    <div class=" span5">
                        <div id="tva_details" class="details <?php if ($this->_tpl_vars['options_flag'] != 'tva_check'): ?>hide<?php endif; ?>">
                            <div id="tvanumber" >
                                <label>
                                    <input type="text" class="span9" placeholder="Num&eacute;ro de TVA Intracommunautaire" name="tav_number" id="tav_number" value="<?php echo $this->_tpl_vars['tva_number']; ?>
">
                                </label>
                            </div>
                            <span id="payinfo_error"></span>
                        </div>
                    </div>
                </div>
            
                    <div class="control-group" align="center">
                        <input style="width:0px; height: 0px; border-color:#FFF; box-shadow: none;" type="text"  id="option_group" name="option_group"  value="">
                    </div>
            </div>
        </div>
<!-- company details ends here -->

<!-- Start, payment info module -->
<div class="mod">
    <div class="row-fluid">
        <div class="control-group">
            <label class="control-label span2 offset1" for=""><strong>Choix de r&eacute;mun&eacute;ration <?php if ($_GET['profile'] == 'invoice'): ?><span class="error">*</span><?php endif; ?> </strong></label>
            <div class="controls span8">
                <label class="radio">
                    <input type="radio" type="radio" value="paypal" <?php if ($this->_tpl_vars['payment_type'] == 'paypal'): ?>checked class="collapsed"<?php endif; ?> name="payment_type" data-target="#paypalEmail" data-toggle="collapse">Paypal
                </label>
                <!-- if Payapl is true, display the input "paypal email" -->
                <div id="paypalEmail" <?php if ($this->_tpl_vars['payment_type'] == 'paypal'): ?> class="collapse in out" <?php else: ?> class="collapse out" <?php endif; ?> >
                <i class="icon-arrow-right"></i> <input type="text" class="span4" placeholder="paypal email" name="paypal_id" id="paypal_id" value="<?php echo $this->_tpl_vars['paypal_id']; ?>
">
            </div>
                        <label class="radio">
                <input type="radio" value="virement" <?php if ($this->_tpl_vars['payment_type'] == 'virement'): ?>checked<?php endif; ?> name="payment_type">Virement bancaire
            </label>
            <!-- if virement is true, display the input "paypal email" -->
            <div id="virementId" <?php if ($this->_tpl_vars['payment_type'] == 'virement'): ?> class="collapse in out" <?php else: ?> class="collapse in" <?php endif; ?> >
            <div id="c_out_france" <?php if ($this->_tpl_vars['payment_type'] == 'virement'): ?>style="display:block"<?php else: ?>style="display:none"<?php endif; ?>>
            <i class="icon-arrow-right"></i>
            <input type="text" value="<?php echo $this->_tpl_vars['rib_id_6']; ?>
" class="span3" placeholder="BIC" name="rib_id_6" id="rib_id_6"/>
            <input type="text" value="<?php echo $this->_tpl_vars['rib_id_7']; ?>
" class="span3" placeholder="IBAN" name="rib_id_7" id="rib_id_7"/>
            <input type="text" value="<?php echo $this->_tpl_vars['bank_account_name']; ?>
" class="span4" placeholder="Nom du b&eacute;n&eacute;ficiaire" name="bank_account_name" id="bank_account_name"/>
        </div>
    </div>
    <br>
    <span id="payment_error"></span>
</div>
</div>
</div>
</div>

<!-- End, payment info module -->
<!-- News letter/Auto email subscribe-->
<div class="mod">
    <div class="row-fluid">
        <div class="control-group">
            <label class="control-label span2 offset1" for=""><strong>Abonnements</strong></label>
            <div class="controls span8">
                <label class="checkbox">
                    <input type="checkbox" <?php if ($this->_tpl_vars['subscribe'] == 'yes'): ?>checked <?php endif; ?> name="subscribe">Newsletter
                </label>
                <label class="checkbox">
                    <input type="checkbox" <?php if ($this->_tpl_vars['alert_subscribe'] == 'yes'): ?>checked <?php endif; ?> name="alert_subscribe">Alertes par email
                </label>
            </div>
        </div>
    </div>
</div>
<!--End  News letter/Auto email subscribe-->

<input type="hidden" name="languageupdate" id="languageupdate" value="<?php echo $this->_tpl_vars['languageupdate']; ?>
" />
<div class="mod">
    <div class="pull-right">
        <button class="btn inline" id="cancel">Annuler</button>
        <button class="btn btn-primary inline"><i class="icon-refresh icon-white"></i> Enregistrer</button>
    </div>
</div>
</form>
</section>
</div>


<!-- ajax use start -->
<div id="profile-update" class="modal container hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 id="myModalLabel">Modification du profil</h3>
    </div>
    <div class="modal-body">
        <p>Le syst&egrave;me de facturation a chang&eacute;&nbsp;! </p>
        <p>  Merci de renseigner sur votre fiche profil,  votre choix de r&eacute;mun&eacute;ration et si vous &ecirc;tes assujetti(e) &agrave; la TVA.</p>
        <p>  Cordialement,</p>
        <p>Toute l&rsquo;&eacute;quipe d&rsquo;Edit-place&nbsp;</p>
    </div>
</div>
<!-- ajax use end -->