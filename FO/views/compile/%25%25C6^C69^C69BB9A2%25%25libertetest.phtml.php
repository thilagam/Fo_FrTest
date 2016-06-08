<?php /* Smarty version 2.6.19, created on 2013-05-02 11:40:35
         compiled from Client/libertetest.phtml */ ?>
<html lang="en">
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link rel="stylesheet" href="http://blueimp.github.com/cdn/css/bootstrap.min.css">
<!-- Generic page styles -->
<link rel="stylesheet" href="/FO/script/fileupload/css/style.css">
<link rel="stylesheet" href="/FO/css/common/ep.css">
<link rel="stylesheet" href="/FO/css/common/custom.css">
<!-- Bootstrap styles for responsive website layout, supporting different screen sizes -->
<link rel="stylesheet" href="http://blueimp.github.com/cdn/css/bootstrap-responsive.min.css">
<!-- Bootstrap CSS fixes for IE6 -->
<!--[if lt IE 7]><link rel="stylesheet" href="http://blueimp.github.com/cdn/css/bootstrap-ie6.min.css"><![endif]-->
<!-- Bootstrap Image Gallery styles -->
<link rel="stylesheet" href="http://blueimp.github.com/Bootstrap-Image-Gallery/css/bootstrap-image-gallery.min.css">
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="/FO/script/fileupload/css/jquery.fileupload-ui.css">
<!-- CSS adjustments for browsers with JavaScript disabled -->
<noscript><link rel="stylesheet" href="/FO/script/fileupload/css/jquery.fileupload-ui-noscript.css"></noscript>
<!-- Shim to make HTML5 elements usable in older Internet Explorer versions -->
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

</head>
<body>
<section id="free_form" style="float:right">
	<div class="container">
		<div class="row-fluid">
			<div class="span12" style="position: relative">
				<h1>edit-place <span>Libert&eacute;</span></h1>
				<small>Vous recherchez un r&eacute;dacteur pour travailler sur votre projet de contenu ? <br>D&eacute;posez votre annonce <strong>gratuitement</strong> et recevez des devis imm&eacute;diatement !</small>
				<!--<div class="freequote">blabla</div>--> 
				<div id="state">
					<ul class="unstyled">
						<li class="hightlight" rel="tooltip" title="D&eacute;p�t de votre projet"><span>Cr&eacute;ation de l'annonce</span></li>
						<li rel="tooltip" title="Nos r&eacute;dacteurs visualisent votre annonce et vous recevez des devis"><span class="online">Diffusion de l'annonce sur edit-place</span></li> 
						<li rel="tooltip" title="S&eacute;lectionnez celui qui travaillera sur votre projet"><span class="writer_select">Choix du r&eacute;dacteur</span></li> 
					</ul>
				</div>
				<div class="row-fluid">   
					<div class="span8">
						<div class="border">
						<!-- form, start --> 
							<form id="fileupload" method="POST" enctype="multipart/form-data" action="/client/liberte2">
							<input type="hidden" name="curdate" id="curdate" value="<?php echo $this->_tpl_vars['currdate']; ?>
" />
							<noscript><input type="hidden" name="redirect" value="http://blueimp.github.com/jQuery-File-Upload/"></noscript>
								<fieldset>
									<legend>Mon projet</legend>
									<label><strong>Titre du projet</strong></label>
									<input type="text" placeholder="" class="span12" name="title" id="title" value="<?php echo $this->_tpl_vars['title']; ?>
">
									<label><strong>Ajouter le brief</strong></label>
									<span class="help-block">D&eacute;finition de la charte editoriale, titre des articles, photos � d&eacute;crire, sujets � proposer, etc...</span>
									   <!-- file upload plugin by blueimp : check out the doc here : 
									   https://github.com/blueimp/jQuery-File-Upload 
									   -->
<!------------------------------------------------jQuery File upload----------------------------------------------------------------------->

									<div class="row-fluid fileupload-buttonbar">
										<div class="span12" style="border: dashed 2px #bbb; padding: 15px; margin-bottom: 10px; background-color: #fff">
											<!-- The fileinput-button span is used to style the file input field as button -->
											<span class="btn btn-small btn-warning fileinput-button btn-inline">
												<i class="icon-plus icon-white"></i>
												<span>Ajouter un brief</span>
												<input type="file" name="files[]" multiple>
											</span> 
							
											<div class="help-inline">Fichiers au format zip, xls, .doc, .pdf</div>
										</div>
									</div>        
									
									
								
<!------------------------------------------------jQuery File upload----------------------------------------------------------------------->

									<br>
									<!-- start, about detail -->

								</fieldset>
								<input type="hidden" name="logoidentifier" id="logoidentifier" /> 
							</form>    
						<!-- form, end -->   
						</div>
					</div>

					
				</div>
			</div>
		</div>
	</div>
</section>

<?php echo '
<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td class="preview"><span class="fade"></span></td>
        <td class="name"><span>{%=file.name%}</span></td>
        <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
        {% if (file.error) { %}
            <td class="error" colspan="2"><span class="label label-important">Error</span> {%=file.error%}</td>
        {% } else if (o.files.valid && !i) { %}
            <td>
                <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="bar" style="width:0%;"></div></div>
            </td>
            <td class="start">{% if (!o.options.autoUpload) { %}
                <button class="btn btn-small btn-primary">
                    <i class="icon-upload icon-white"></i>
                    <span>D&eacute;marrer</span>
                </button>
            {% } %}</td>
        {% } else { %}
            <td colspan="2"></td>
        {% } %}
        <td class="cancel">{% if (!i) { %}
            <button class="btn btn-small btn-warning">
                <i class="icon-ban-circle icon-white"></i>
                <span>Annuler</span>
            </button>
        {% } %}</td>
    </tr>
{% } %}
</script>

<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}       
    <tr class="template-download fade">
   	{% if (file.error) { %}
            <td></td>
            <td class="name"><span>{%=file.name%}</span></td>
            <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
            <td class="error" colspan="2"><span class="label label-important">Error</span> {%=file.error%}</td>
        {% } else { %}
            <td class="preview">{% if (file.thumbnail_url) { %}
                <a href="{%=file.url%}" title="{%=file.name%}" rel="gallery" download="{%=file.name%}"><img src="{%=file.thumbnail_url%}"></a>
            {% } %}</td>
            <td class="name">
                <a href="{%=file.url%}" title="{%=file.name%}" rel="{%=file.thumbnail_url&&\'gallery\'%}" download="{%=file.name%}">{%=file.name%}</a>
            </td>
            <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
            <td colspan="2"></td>
        {% } %}
        <td class="delete">
            <button class="btn btn-small btn-danger" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}"{% if (file.delete_with_credentials) { %} data-xhr-fields=\'{"withCredentials":true}\'{% } %}>
                <i class="icon-trash icon-white"></i>
                <span>Supprimer</span>
            </button>
           <!-- <input type="checkbox" name="delete" value="1">-->
        </td>
		<input type="hidden" name="filename[]" id="filename" value="{%=file.name%}" />
	
    </tr>
{% } %}
</script>

<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="http://mmm-new.edit-place.com/FO/script/fileupload/js/vendor/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="http://blueimp.github.com/JavaScript-Templates/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="http://blueimp.github.com/JavaScript-Load-Image/load-image.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="http://blueimp.github.com/JavaScript-Canvas-to-Blob/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS and Bootstrap Image Gallery are not required, but included for the demo -->
<script src="http://blueimp.github.com/cdn/js/bootstrap.min.js"></script>
<script src="http://blueimp.github.com/Bootstrap-Image-Gallery/js/bootstrap-image-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="http://mmm-new.edit-place.com/FO/script/fileupload/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="http://mmm-new.edit-place.com/FO/script/fileupload/js/jquery.fileupload.js"></script>
<!-- The File Upload file processing plugin -->
<script src="http://mmm-new.edit-place.com/FO/script/fileupload/js/jquery.fileupload-fp.js"></script>
<!-- The File Upload user interface plugin -->
<script src="http://mmm-new.edit-place.com/FO/script/fileupload/js/jquery.fileupload-ui.js"></script>
<!-- The main application script -->
<script src="http://mmm-new.edit-place.com/FO/script/fileupload/js/main.js"></script>
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE8+ -->
<!--[if gte IE 8]><script src="http://mmm-new.edit-place.com/FO/script/fileupload/js/cors/jquery.xdr-transport.js"></script><![endif]-->

'; ?>

</body>
</html>