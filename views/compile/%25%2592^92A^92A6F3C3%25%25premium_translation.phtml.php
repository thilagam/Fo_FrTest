<?php /* Smarty version 2.6.19, created on 2014-11-27 15:36:47
         compiled from Client/premium_translation.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'Client/premium_translation.phtml', 226, false),array('modifier', 'truncate', 'Client/premium_translation.phtml', 324, false),)), $this); ?>
<div class="public solution">
<section id="intro">
    <div class="container">

        <ul class="breadcrumb">
            <li>
                <a href="#">Accueil</a><span class="divider">/</span>
            </li>
            <li>
                <a href="premium.html">Solutions PREMIUM</a><span class="divider">/</span>
            </li>
            <li class="active">
                <?php if ($this->_tpl_vars['selLang'] == ''): ?>
                        <?php echo $this->_tpl_vars['selCat']; ?>

                <?php else: ?>
                    Traduction en <?php echo $this->_tpl_vars['selLang']; ?>

                <?php endif; ?>
            </li>
        </ul>

        <h1>Service de traduction de contenu <?php if ($this->_tpl_vars['selLang'] == ''): ?><?php echo $this->_tpl_vars['selCat']; ?>
<?php else: ?>en <?php echo $this->_tpl_vars['selLang']; ?>
<?php endif; ?></h1>
        <hr>
        <div class="span8 fo-text">
            <p><?php echo $this->_tpl_vars['fo_text1']; ?>
<?php if ($this->_tpl_vars['fo_text2'] != '<p></p>'): ?><span data-target="#suite" data-toggle="collapse">...</span><?php endif; ?></p>
            <div class="collapse" id="suite"><?php echo $this->_tpl_vars['fo_text2']; ?>
</div> 
        </div>
        <hr>
		
		<!------------------------------ Filters ---------------------------------------->
		<div class="dropdown" id="typedropdown" style="float:left;width:200px">
			<a href="#" class="btn dropdown-toggle" data-toggle="dropdown">
				<?php if ($_GET['type'] == 'translation'): ?>
					Translation
				<?php else: ?>
					Redaction
				<?php endif; ?>
				<span class="caret"></span>
			</a>
			<ul class="lang-list dropdown-menu" role="menu" aria-labelledby="dLabel" style="width:170px;overflow:hidden">
				<li>
					<a href="javascript:void(0);" onclick="pre_trans_page('redaction','<?php echo $_GET['product']; ?>
','<?php echo $_GET['lang']; ?>
');">Redaction</a>
				</li>
				<li>
					<a href="javascript:void(0);" onclick="pre_trans_page('translation','<?php echo $_GET['product']; ?>
','<?php echo $_GET['lang']; ?>
');">Translation</a>
				</li>
			</ul>
		</div>
		
		<div class="dropdown" id="typedropdown" style="float:left;width:150px">
			<a href="#" class="btn dropdown-toggle" data-toggle="dropdown">
				<?php if ($_GET['product'] == 'article_seo'): ?>
					d'articles seo
				<?php elseif ($_GET['product'] == 'guide'): ?>
					de guides
				<?php elseif ($_GET['product'] == 'descriptif_produit'): ?>
					de descriptifs produit
				<?php elseif ($_GET['product'] == 'article_de_blog'): ?>
					d'articles de blog
				<?php else: ?>
					de news
				<?php endif; ?>
				<span class="caret"></span>
			</a>
			<ul class="lang-list dropdown-menu" role="menu" aria-labelledby="dLabel" style="width:170px;overflow:hidden">
				<li>
					<a href="javascript:void(0);" onclick="pre_trans_page('<?php echo $_GET['type']; ?>
','news','<?php echo $_GET['lang']; ?>
');">de news</a>
				</li>
				<li>
					<a href="javascript:void(0);" onclick="pre_trans_page('<?php echo $_GET['type']; ?>
','article_seo','<?php echo $_GET['lang']; ?>
');">d'articles seo</a>
				</li>
				<li>
					<a href="javascript:void(0);" onclick="pre_trans_page('<?php echo $_GET['type']; ?>
','guide','<?php echo $_GET['lang']; ?>
');">de guides</a>
				</li>
				<li>
					<a href="javascript:void(0);" onclick="pre_trans_page('<?php echo $_GET['type']; ?>
','descriptif_produit','<?php echo $_GET['lang']; ?>
');">de descriptifs produit</a>
				</li>
				<li>
					<a href="javascript:void(0);" onclick="pre_trans_page('<?php echo $_GET['type']; ?>
','article_de_blog','<?php echo $_GET['lang']; ?>
');">d'articles de blog</a>
				</li>
			</ul>
		</div>
		<div style="float:left;width:50px;"><label>en</label></div>
		<div class="dropdown" id="langdropdown" style="float:left">
			<a href="#" class="btn dropdown-toggle" data-toggle="dropdown">
				<?php if ($_GET['lang'] != ""): ?>
					<?php $_from = $this->_tpl_vars['langArr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['langkey'] => $this->_tpl_vars['lang']):
?>
						<?php if ($_GET['lang'] == $this->_tpl_vars['langkey']): ?>
							<img class="flag flag-<?php if ($_GET['lang'] == ''): ?>gb<?php else: ?><?php echo $_GET['lang']; ?>
<?php endif; ?>" src="/FO/images/shim.gif"><?php echo $this->_tpl_vars['lang']; ?>

						<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>  
				<?php else: ?>
					<li>
						<img class="flag flag-fr" src="/FO/images/shim.gif">Français 
					</li>
				<?php endif; ?>
				<span class="caret"></span>  
			</a>
			<ul class="lang-list dropdown-menu" role="menu" aria-labelledby="dLabel" style="width:170px;overflow:hidden;overflow-y:scroll">
				<?php $_from = $this->_tpl_vars['langArr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['langkey'] => $this->_tpl_vars['lang']):
?>
					<?php if ($this->_tpl_vars['selLangKey'] != $this->_tpl_vars['langkey']): ?>
					<li>
						<a href="javascript:void(0);" onclick="pre_trans_page('<?php echo $_GET['type']; ?>
','<?php echo $_GET['product']; ?>
','<?php echo $this->_tpl_vars['langkey']; ?>
');"> <img class="flag flag-<?php echo $this->_tpl_vars['langkey']; ?>
" src="/FO/images/shim.gif"><?php echo $this->_tpl_vars['lang']; ?>
 </a>
					</li>
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>       
			</ul>
		</div>
	</div>
</section>

<section id="activity">
    <div class="container">
        <div class="row-fluid">
            <div class="span8">
                <!-- bloc left -->
                <div class="simulator-container">
                    <time class="pull-right">
                        <span class="icon-time"></span> 14:54:39
                    </time>
                    <h2>Tarifs <span>premium</span> relev&#233;s sur Edit-place</h2>
                    <div id="simulator">
                        <div class="h">
                            <img alt="En direct" class="pull-right" src="/FO/images/direct.png">
                            <h4>Simulateur de tarifs</h4>
                            <span>Obtenez une 1&#232;re estimation aupr&#232;s des r&#233;dacteurs</span>
                        </div>

                        <div class="c clearfix">

                            <div class="row-fluid">
                                <div id="filters" class="span6">
                                    <div class="f-c">
                                        <span class="tooltip1"></span>
                                        <div id="word_counter">
                                            <div class="name">
                                                nb. mots
                                            </div>
                                        </div>
                                        <input type="text" id="word_counter_value" style="width:50px;display: <?php echo $this->_tpl_vars['dbg']; ?>
"/>
                                        <input type="text" id="shipping_date_value" style="margin-left: 62px;width:50px;display: <?php echo $this->_tpl_vars['dbg']; ?>
"/>
                                        <input type="text" id="oput" style="width:150px;display: <?php echo $this->_tpl_vars['dbg']; ?>
"/>
                                        <!--<label for="word_counter_value" id="word_counter_val"></label>-->
                                        <span class="pull-left legend muted"> <span>&bull;</span> < 100</span><span class="pull-right legend muted">> 10 000 <span>&bull;</span></span>
                                        <div class="clearfix"></div>
                                        <span class="tooltip2"></span>
                                        <div id="shipping_date">
                                            <div class="name">
                                                Date de livraison
                                            </div>
                                        </div>
                                        <!--<label for="shipping_date_value" id="shipping_date_val"></label>-->
                                        <br>
                                        <span class="pull-left legend muted"> <span>&bull;</span> Normal</span><span class="pull-right legend muted">Urgent <span>&bull;</span></span>

                                    </div>
                                </div>

                                <div id="results" class="span6">
                                    <div class="btn-group">
										
                                    </div>	

                                    <div class="price clearfix" style="width:100%;">
                                        <div class="big" style="width:100%;text-align:center;">
                                            <span id="priceMotDiv"></span>
                                            <span class="small" style="left:inherit; width:20px;line-height:0;top:2px;margin-left: 2px;">
                                                &#8364;
                                                <span class="word" style="margin-top: 28px;float: left;">
                                                    /mots
                                                </span>
                                            </span>                                            
                                        </div>
                                        <div class="feuillet" style="width:100%;text-align:center;">
                                            Soit <span id="priceDiv"></span> &#8364; le feuillet
                                        </div>

                                    </div>
                                    
                                    <h5>*Tarif moyen de traduction en anglais sur Edit-place</h5>
                                </div>
                            </div>

                            <section id="premium">

                                <h4>Avec Edit-place <span>Premium</span>, gagnez du temps en nous confiant  la gestion de vos traductions <?php echo $this->_tpl_vars['selProduct']; ?>
en <?php echo $this->_tpl_vars['selLang']; ?>
</h4>
                                <ul class="unstyled">
                                    <li>
                                        <span class="more">+</span>Nous s&#233;lectionnons les meilleurs journalistes natifs <?php if ($this->_tpl_vars['selLang'] == ''): ?><?php echo $this->_tpl_vars['selCat']; ?>
<?php else: ?><?php echo $this->_tpl_vars['selLang']; ?>
<?php endif; ?>.
                                    </li>
                                    <li>
                                        <span class="more">+</span>Nous s&#233;lectionnons l'&#233;quipe de r&#233;daction la mieux adapt&#233;e &#224; la r&#233;daction de votre besoin en contenu
                                    </li>
                                    <li>
                                        <span class="more">+</span>Exclusivit&#233; et originalit&#233; du contenu garantis
                                    </li>
                                    <li>
                                        <span class="more">+</span>Optimisation SEO
                                    </li>
                                </ul>
                                <div id="presentation">
                                    <div class="call_us">
                                        <h4>Besoin d'un devis rapidement ? contactez-nous</h4>
                                        <a href="contact.html"><i class="img-circle"><span class="icon-email-us"></span></i></a><i class="img-circle"><span class="icon-call"></span></i>
                                        <div class="call" itemtype="http://schema.org/LocalBusiness" itemscope="">
                                            <span itemprop="telephone"><a href="tel:+33177686461">01 85 08 40 13</a></span>
                                            <div class="notabene">
                                                Service client, prix d'un tarif local
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <h4><span class="icon-arrow-right"></span> Demandez un devis personnalis&eacute; en direct sur notre platforme</h4> Notre &eacute;quipe commerciale vous recontacte une fois vos besoins d&eacute;finis ou les r&eacute;dacteurs vous envoient leur devis directement. <a href="/client/liberte1">Demandez un devis gratuitement</a>

                                </div>

                            </section>

                        </div>

                    </div>
                </div>
                <!-- end block left -->

            </div>
            <div class="span4">
			<?php if (count($this->_tpl_vars['latest_translations']) > 0): ?>
                <div class="aside-block" id="story">
                    <h4>Derni&#232;res traductions</h4>
                    
                    <?php $_from = $this->_tpl_vars['latest_translations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['latest_translation_key'] => $this->_tpl_vars['latest_translation']):
?>
                    <div class="story clearfix 1">
                        <img src="<?php echo $this->_tpl_vars['latest_translation']['pic']; ?>
" class="client pull-left">
                        <div class="price" style="top:0px">
                            <div class="big">
                                <?php echo $this->_tpl_vars['latest_translation']['avg_price']; ?>

                            </div>
                            <div class="small">
                                &#8364;
                                <div class="word">
                                    /mots
                                </div>
                                <div class="details">
                                    <?php echo $this->_tpl_vars['latest_translation']['total_article']; ?>
 articles  &bull;  <?php echo $this->_tpl_vars['CatArr'][$this->_tpl_vars['latest_translation']['category']]; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; endif; unset($_from); ?>
                </div>
			<?php endif; ?>
			<?php if (count($this->_tpl_vars['contribs']) > 0): ?>
                <div id="people" class="aside-block clearfix">
                    <h4>Nos r&#233;dacteurs bilingues
                    <br>
                    fran&#231;ais / anglais</h4>
                    <ul class="media-list">
                        <?php $_from = $this->_tpl_vars['contribs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['contribkey'] => $this->_tpl_vars['contrib']):
?>
                        <li class="media pull-left">
                            <a data-target="#viewProfile-ajax" data-toggle="modal" role="button" href="#" class="pull-left imgframe"><img src="<?php echo $this->_tpl_vars['contrib']['contribpic']; ?>
" class="media-object"> </a>
                        </li>
                        <?php endforeach; endif; unset($_from); ?>
                        <?php if ($this->_tpl_vars['contribs_autres'] != ''): ?>
                        <li class="media pull-left all">
                            <div>
                                <em>+<?php echo $this->_tpl_vars['contribs_autres']; ?>
</em> autres
                            </div>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
			<?php endif; ?>
            </div>
		</div>
	</div>
</section>

<section id="brands">
    <div class="container">
        <h3 class="sectiondivider pull-center"><span>Ils nous font confiance</span></h3>
        <ul class="unstyled row-fluid">
            <li class="offset1 span2"><img width="120" height="30" src="/FO/images/partner/accor-gray.png" alt="accor">
            </li>
            <li class="span2"><img src="/FO/images/partner/skiset-gray.png" width="120" height="30" alt="Skiset">
            </li>
            <li class="span2"><img src="/FO/images/partner/netbooster-gray.png" width="120" height="30" alt="Netbooster">
            </li>
            <li class="span2"><img src="/FO/images/partner/menlook-gray.png" width="120" height="30" alt="Menlook">
            </li>
            <li class="span2"><img src="/FO/images/partner/kelkoo-gray.png" width="120" height="30" alt="Kelkoo">
            </li>
        </ul>
    </div>
</section>

<section id="about">
    <div class="container">
        <h3 class="sectiondivider pull-center"><span>Des journalistes multilingues</span></h3>
        <p class="lead pull-center">
            Des journalistes natifs en 17 langues pour vos devis multilingues
        </p>
        <div class="row-fluid">
            <span class="span8">
                <h4>Des journalistes / r&#233;dacteurs au hasard </h4>
                <div class="row-fluid">
                    <div class="span6">
                                    <ul class="media-list">

                                        <?php $_from = $this->_tpl_vars['Carousel1List']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['carousel_loop1'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['carousel_loop1']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['list1']):
        $this->_foreach['carousel_loop1']['iteration']++;
?>

                                        <?php if ($this->_tpl_vars['list1']['profilepic'] != ""): ?>
                                        <?php if (($this->_foreach['carousel_loop1']['iteration']-1) == 3): ?>
                                    </ul>
                                </div>
                                <div class="span6">
                                    <ul class="media-list">
                                        <?php endif; ?>

                                        <li class="media">
                                            <a style="cursor:auto;" class="pull-left imgframe"> <img src="<?php echo $this->_tpl_vars['list1']['profilepic']; ?>
" class="media-object"> </a>
                                            <div class="media-body">
                                                <h4 class="media-heading"><?php echo $this->_tpl_vars['list1']['first_name']; ?>
</h4>
                                                <div class="muted">
                                                    <?php echo ((is_array($_tmp=$this->_tpl_vars['list1']['category'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 100, "...", true) : smarty_modifier_truncate($_tmp, 100, "...", true)); ?>

                                                </div>
                                                <div class="speaking">
                                                    <a rel="tooltip" data-original-title="<?php echo $this->_tpl_vars['list1']['languagetitle']; ?>
" ><img src="/FO/images/shim.gif" class="flag flag-<?php echo $this->_tpl_vars['list1']['language']; ?>
"></a>
                                                </div>
                                            </div>
                                        </li>
                                        <?php endif; ?>
                                        <?php endforeach; endif; unset($_from); ?>

                                    </ul>
                    </div>

                </div>
                <hr>
                <a href="/client/liberte1" class="btn btn-small btn-primary pull-right"><i class="icon-edit icon-white"></i> Demander un devis</a> 
                <h4><i class="icon-arrow-right"></i> Choisissez et recrutez un journaliste pour votre projet</h4>
            </span>

            <span class="span4 well"> <h4>Liste des langues</h4>
                <table class="table">
                    <tr>
                        <td class="span6">Fran&#231;ais</td><td class="span6">Anglais US</td>
                    </tr>
                    <tr>
                        <td class="span6">Anglais</td><td class="span6">Allemand</td>
                    </tr>
                    <tr>
                        <td class="span6">Portugais</td><td class="span6">Portugais (br&#233;silien)</td>
                    </tr>
                    <tr>
                        <td class="span6">Russe</td><td class="span6">Polonais</td>
                    </tr>
                    <tr>
                        <td class="span6">Danois</td><td class="span6">Finlandais</td>
                    </tr>
                    <tr>
                        <td class="span6">Su&#233;dois</td><td class="span6">Italien</td>
                    </tr>
                    <tr>
                        <td class="span6">Espagnol</td><td class="span6">Japonais</td>
                    </tr>
                    <tr>
                        <td class="span6">Chinois</td><td class="span6">Norv&#233;gien</td>
                    </tr>
                </table>
            </span>
        </div>
    </div>
</section>
</div>

<?php echo '
<script>
	function get(n) {
		var half = location.search.split(\'&\' + n + \'=\')[1];
		if (!half) half = location.search.split(\'?\' + n + \'=\')[1];
		return half !== undefined ? decodeURIComponent(half.split(\'&\')[0]) : null;
	}
	var lang=get(\'lang\'); 
	var prod=get(\'product\'); 
	var type=get(\'type\'); 
	
	// tooltip activation
    $("[rel=tooltip]").tooltip();
    $("[rel=popover]").popover();
    
    var ttip = 30, step1 = 1, min1 = 1, max1 = 100, val1 = 1, 
        priceval,  step2 = 1, min2 = 1, max2 = 100, val2 = 1 ;
    var margl1 = (ttip / (max1/val1)), margl2 = (ttip / (max2/val2)), mCond ;

    jQuery(function() {
        jQuery( "#word_counter" ).slider({
            range: "min",
            value: val1,
            min: min1,
            step: step1,
            max: max1,
            change: function( event, ui ) {
                margl1 = (ttip / (max1/ui.value)) ;
                mCond = $(\'#mnth_value\').val();
                jQuery(\'.tooltip1\').css(\'margin-left\', "-" + margl1 +"px");
                //jQuery(\'.tooltip1\').css(\'left\', ui.value +"%").text(((ui.value == 101) ? ">" : "<")+(((ui.value == 101) ? (ui.value - 1) : ui.value)*100));
                jQuery(\'.tooltip1\').css(\'left\', ui.value +"%").text((ui.value)*100);
                $.post(
                    "/client/prem-cal?words=" + (ui.value)+"&urgency="+($(\'#shipping_date_value\').val())+"&lang="+lang+"&type="+type+"&product="+prod,
                    function(data,status){//
                        $(\'#word_counter_value\').val(ui.value);
                        var data1 = data.split("#");
                        //alert(data1);alert(data1[0]);alert(data1[1]);
                        $(\'#priceDiv\').text(data1[1]);
                        $(\'#priceMotDiv\').text(data1[0]);
                    }
                );
            }
        });//alert($(\'#mnthdpdn\').text());
        var counter1 = jQuery( "#word_counter" ).slider( "value" ) ;
        $(\'#word_counter_value\').val(counter1);
        jQuery(\'.tooltip1\').css(\'left\', counter1 +"%");
        jQuery(\'.tooltip1\').css(\'margin-left\', "-" + margl1 +"px");
        //jQuery(\'.tooltip1\').text("<"+counter1);
        jQuery(\'.tooltip1\').css(\'left\', counter1 +"%").text(counter1*100);
        
        jQuery( "#shipping_date" ).slider({
            range: "min",
            value: val2,
            min: min2,
            step: step2,
            max: max2,
            change: function( event, ui ) {
                margl2 = (ttip / (max2/ui.value)) ;
                mCond = $(\'#mnth_value\').val();
                jQuery(\'.tooltip2\').css(\'margin-left\', "-" + margl2 +"px");
                jQuery(\'.tooltip2\').css(\'left\', ui.value +"%").text(""+ui.value);
                
                $.post(
                    "/client/prem-cal?words=" + ($(\'#word_counter_value\').val())+"&urgency="+(ui.value)+"&lang="+lang+"&type="+type+"&product="+prod,
                    function(data,status){
                        $(\'#shipping_date_value\').val(ui.value);
                        var data1 = data.split("#");
                        //alert(data1);alert(data1[0]);alert(data1[1]);
                        $(\'#priceDiv\').text(data1[1]);
                        $(\'#priceMotDiv\').text(data1[0]);
                    }
                );
            }
        });
        var counter2 = jQuery( "#shipping_date" ).slider("value") ;
        $(\'#shipping_date_value\').val(counter2);
        jQuery(\'.tooltip2\').css(\'left\', counter2 +"%");
        jQuery(\'.tooltip2\').css(\'margin-left\', "-" + margl2 +"px");
        jQuery(\'.tooltip2\').text(""+counter2);
       
		$.post(
            "/client/prem-cal?words=" + counter1+"&urgency="+counter2+"&lang="+lang+"&type="+type+"&product="+prod,
            function(data,status){
                var data1 = data.split("#");
                
                $(\'#priceDiv\').text(data1[1]);
                $(\'#priceMotDiv\').text(data1[0]);
            }
        );
    });
 
 function pre_trans_page(typ, product, lang)
 {
     var url = \'/client/premium-translation?\' ;
     url = url + \'type=\' + typ + \'&product=\' + product + \'&lang=\' +lang;
     window.location = url ;
 }
    </script>
<style>
    .ui-widget-content {background: none repeat scroll 0 0 #eee;border: none;box-shadow: 0 1px 2px rgba(0, 0, 0, 0.086) inset;olor: #404040;}.ui-slider-horizontal {height: 12px;}
    #langdropdown .dropdown-menu {
         max-height: 200px;
         overflow: auto;
         top: 33px;
         box-shadow: none;
     }
     #word_counter_val, #shipping_date_val{color: #fff;font-size: 11px;}
    .tooltip1, .tooltip2 {
        background-color: #FFFFFF;
        border: 1px solid #FFFFFF;
        border-radius: 3px;
        box-shadow: 1px 1px 2px 0 rgba(0, 0, 0, 0.3);
        color: #000000;
        display: block;
        font-size: 9px;
        font-weight:bold;
        height: 18px;
        position: absolute;
        text-align: center;
        width: 30px;
    }
    .fo-text{margin-left:0 !important;margin-right:400px;width:auto;float:none;}
    #story.aside-block{height:auto;}
    .tooltip1 {top: 18px; z-index: 1;}
    .tooltip2 {top: 100px; z-index: 1;}
    .solution .f-c #shipping_date .name, .solution .f-c #word_counter .name {z-index: 0;}
</style>
'; ?>