<?php /* Smarty version 2.6.19, created on 2015-08-03 10:53:40
         compiled from Client/premium.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'Client/premium.phtml', 553, false),array('modifier', 'ucfirst', 'Client/premium.phtml', 638, false),array('modifier', 'count', 'Client/premium.phtml', 892, false),array('modifier', 'strlen', 'Client/premium.phtml', 898, false),)), $this); ?>
<section id="presentation">

    <div class="container">

        <h1><span class="company">Edit-place</span> premium</h1>

        <div class="baseline">

            <h2>Du contenu exclusif r&#233;dig&#233; par des experts avec d&#233;lai de livraison garanti<em>Solution pour e-marchands, agences m&#233;dias et digitales, sites editos et m&#233;dias, blogs & agences SEO (r&#233;f&#233;rencement)</em>
        </div>

        <div class="call_us">

            <a href="/index/contact"><i class="img-circle"><span class="icon-email-us"></span></i></a>

            <i class="img-circle"><span class="icon-call"></span></i>

            <div itemscope itemtype="http://schema.org/LocalBusiness" class="call">

                <span itemprop="telephone"><a href="callto:+33177686461">01 77 68 64 61</a></span>

                <div class="notabene">
                    Service client, prix d'un tarif local
                </div>

            </div>

        </div>

        <div id="brandContainer" class="row-fluid">
            <div class="span2">
                <h4>Nos clients</h4>
            </div>
            <div id="carouselBrand" class="carousel slide span10">
                <div class="carousel-inner">
                    <div class="active item">
                        <ul class="clearfix quatro">
                            <li><img src="/FO/images/partner/premium/logo-laredoute.png" data-original-title="La Redoute" rel="tooltip">
                            </li>
                            <li><img src="/FO/images/partner/premium/logo-menlook.png" data-original-title="Menlook" rel="tooltip">
                            </li>
                            <li><img src="/FO/images/partner/premium/logo-kompass.png" data-original-title="Kompass" rel="tooltip">
                            </li>
                            <li><img src="/FO/images/partner/premium/logo-vivarte.png" data-original-title="Vivarte" rel="tooltip">
                            </li>
                        </ul>
                    </div>
                    <div class="item">
                        <ul class="clearfix quatro">
                            <li><img src="/FO/images/partner/premium/logo-orange.png" data-original-title="orange" rel="tooltip">
                            </li>
                            <li><img src="/FO/images/partner/premium/logo-interrent.png" data-original-title="Interrent" rel="tooltip">
                            </li>
                            <li><img src="/FO/images/partner/premium/logo-rdc.png" data-original-title="Rue du commerce" rel="tooltip">
                            </li>
                            <li><img src="/FO/images/partner/premium/logo-opodo.png" data-original-title="opodo" rel="tooltip">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!--888-->
    </div>

</section>

<div id="premium_nav"  data-spy="affix" data-offset-top="380">

    <div class="container">

        <h4>Notre objectif : augmenter votre traffic et vos revenus</h4>

        <ul class="unstyled">

            <li>
                <a href="#redac" class="scroll">r&#233;daction de contenu</a>
            </li>

            <li>
                <a href="#trad" class="scroll">Traduction</a>
            </li>

            <li>
                <a href="#desc" class="scroll">Descriptif produit</a>
            </li>

            <li>
                <a href="#content" class="scroll">contenu exclusif</a>
            </li>

            <li>
                <a href="#tarifs" class="scroll">Tarifs</a>
            </li>

            <li>
                <a href="#garanties" class="scroll">Nos garanties</a>
            </li>

        </ul>

    </div>
</div>

<section id="redac" class="wedo">

    <div class="container">

        <div class="row-fluid">

            <div class="span8 offset1">

                <h3>R&#233;daction de contenu</h3>

                <p class="desc">
                    Nous vous proposons les sujets et la charte &#233;ditoriale.

                    <br>

                    Notre objectif&#160;: augmenter votre trafic naturel Google en publiant des articles sur les mots cl&#233;s de vos campagnes adwords.
                </p>
                <br>

                <h4><img src="/FO/images/direct.png" width="54" height="19" alt="en direct"> tarifs des meilleurs r&#233;dacteurs par univers</h4>

                <ul class="double clearfix">
                    <?php $_from = $this->_tpl_vars['catArr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['catkey'] => $this->_tpl_vars['cat']):
?>
                    <li>
                        <a href="/client/premium-translation?cat=<?php echo $this->_tpl_vars['catkey']; ?>
"><?php echo $this->_tpl_vars['cat']; ?>
</a>
                    </li>
                    <?php endforeach; endif; unset($_from); ?>
                </ul>
                Besoin d'autres comp&#233;tences ou sp&#233;cificit&#233;s ? Contactez Marie Ad&#233;la&#239;de

                <!-- contact profile -->
                <div id="hcard-Marie-Adelaide" class="vcard ep_contact">
                    <a href="#" class="imgframe pull-left"><img src="/FO/images/profile/marie-adelaide-gervis.jpg" alt="Marie Ad&#233;la&#239;de Gervis" class="photo"/></a>
                    <div class="btn-group">
                        <a class="btn btn-link url fn" href="http://www.edit-place.com">Marie Ad&#233;la&#239;de Gervis</a><a class="email btn btn-mini" href="mailto:magervis@edit-place.com"><i class="icon-envelope"></i></a>
                    </div>
                    <div class="org muted">
                        Business Developer Edit-place
                    </div>
                    <div class="adr">
                        <span class="locality">Paris</span>
                        <span class="country-name">France</span>

                    </div>
                    <div class="tel">
                        +33177686463
                    </div>
                    <!-- end, contact profile -->

                </div>

            </div>

            <div class="span3">

                <i class="icon-redac"></i>

            </div>

        </div>

    </div>

</section>

<hr>

<section id="trad" class="wedo">

    <div class="container">

        <div class="row-fluid">

            <div class="span3 offset1">

                <i class="icon-trad"></i>

            </div>

            <div class="span8">

                <h3>Traduction de contenu existant</h3>

                <p class="desc">
                    Nous vous proposons la r&#233;daction/adaptation ou la traduction de votre contenu en 26 langues.
                    <br>
                    Notre objectif : Lancer plus vite vos sites &#224; l&#8217;international et gagner plus rapidement des parts de march&#233;.
                </p>

                <br>
                <h4><img src="/FO/images/direct.png" width="54" height="19" alt="en direct"> tarifs des meilleurs traducteurs</h4>
                <div id="AllLangs"><ul class="double clearfix">
                    <?php $_from = $this->_tpl_vars['langArr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['langkey'] => $this->_tpl_vars['lang']):
?>
                    <li>
                        <a href="/client/premium-translation?lang=<?php echo $this->_tpl_vars['langkey']; ?>
"> <img class="flag flag-<?php echo $this->_tpl_vars['langkey']; ?>
" src="/FO/images/shim.gif"> Traduction en <?php echo $this->_tpl_vars['lang']; ?>
 </a>
                    </li>
                    <?php endforeach; endif; unset($_from); ?>
                </ul></div>
                
                <span id="lang-bot">Besoin d'autres comp&#233;tences ou sp&#233;cificit&#233;s ? Contactez Coralie</span>

                <!-- contact profile -->
                <div id="hcard-Coralie-Leguille" class="vcard ep_contact">
                    <a href="#" class="imgframe pull-left"><img src="/FO/images/profile/coralie-leguille.jpg" alt="Coralie Leguille" class="photo"/></a>
                    <div class="btn-group">
                        <a class="btn btn-link url fn" href="http://www.edit-place.com">Coralie Leguille</a><a class="email btn btn-mini" href="mailto:cleguille@edit-place.com"><i class="icon-envelope"></i></a>
                    </div>
                    <div class="org muted">
                        Responsable commerciale Edit-place
                    </div>
                    <div class="adr">
                        <span class="locality">Paris</span>
                        <span class="country-name">France</span>

                    </div>
                    <div class="tel">
                        +33177686460
                    </div>
                </div>
                <!-- end, contact profile -->
            </div>
        </div>
    </div>

</section>

<hr>

<section id="desc" class="wedo">

    <div class="container">

        <div class="row-fluid">

            <div class="span8 offset1">

                <h3>Descriptif produit <span class="label label-inverse">Contenu froid</span></h3>

                <p class="desc">
                    Des descriptifs exclusifs sous 3 jours.
                    <br>
                    Vendez mieux, vendez plus vite !
                </p>
                <p class="desc">
                    Plus d'info, contactez Coralie ou <a href="javascript:void(0);">consultez nos tarifs en direct</a>
                </p>
                <!-- contact profile -->
                <div id="hcard-Coralie-Leguille" class="vcard ep_contact">
                    <a href="#" class="imgframe pull-left"><img src="/FO/images/profile/coralie-leguille.jpg" alt="Coralie Leguille" class="photo"/></a>
                    <div class="btn-group">
                        <a class="btn btn-link url fn" href="http://www.edit-place.com">Coralie Leguille</a><a class="email btn btn-mini" href="mailto:cleguille@edit-place.com"><i class="icon-envelope"></i></a>
                    </div>
                    <div class="org muted">
                        Responsable commerciale Edit-place
                    </div>
                    <div class="adr">
                        <span class="locality">Paris</span>
                        <span class="country-name">France</span>

                    </div>
                    <div class="tel">
                        +33177686460
                    </div>
                </div>
                <!-- end, contact profile -->

            </div>

            <div class="span3">

                <i class="icon-desc"></i>

            </div>

        </div>

    </div>

</section>

<section id="content" class="wedo inverse">

    <div class="container">

        <div id="boost">
            <h4 class="pull-center">Un contenu exclusif et de qualit&#233; </h4>
            <div class="row-fluid pull-center">
                <div class="span4">
                    <i class="icon-link-rounded"></i><span class="more">+</span> de backlinks
                </div>
                <div class="span4">
                    <i class="icon-tw-rounded"></i><span class="more">+</span> de tweets
                </div>
                <div class="span4">
                    <i class="icon-fb-rounded"></i><span class="more">+</span> de partages Facebook
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span7 offset1">
                <h3>Augmentez le temps pass&#233; sur votre site <span class="label label-inverse">Contenu chaud</span></h3>
                <p class="desc">
                    C'est la cl&#233; depuis Google Panda et un levier d&#233;cisif pour am&#233;liorer votre taux de transformation.
                </p>
                <!-- contact profile -->
                <div id="hcard-Marie-Adelaide" class="vcard ep_contact">
                    <a href="#" class="imgframe pull-left"><img src="/FO/images/profile/marie-adelaide-gervis.jpg" alt="Marie Adélaïde Gervis" class="photo"/></a>
                    <div class="btn-group">
                        <a class="btn btn-link url fn" href="http://www.edit-place.com">Marie Ad&#233;la&#239;de Gervis</a><a class="email btn btn-mini" href="mailto:magervis@edit-place.com"><i class="icon-envelope"></i></a>
                    </div>
                    <div class="org muted">
                        Business Developer Edit-place
                    </div>
                    <div class="adr">
                        <span class="locality">Paris</span>
                        <span class="country-name">France</span>
                    </div>
                    <div class="tel">
                        +33177686463
                    </div>
                    <!-- end, contact profile -->
                </div>

            </div>
            <div class="span4 well">
                <span class="label label-warning">Une news vient de tomber ?</span>
                <h3>Nous sommes r&#233;actifs, 24h/24, 7 j/7.</h3>
                <p class="desc">
                    Notre objectif : optimiser votre trafic Google news, quelle que soit votre langue.
                </p>
            </div>

        </div>

    </div>

</section>

<section id="tarifs" class="wedo">

    <div class="container">

        <h3 class="sectiondivider pull-center"><span>Nos tarifs</span></h3>

        <div class="row-fluid">

            <div class="span4 offset1 pull-center">

                <p class="lead">
                    Nous fixons le tarif ensemble en direct sur la plateforme d'Edit-place.
                </p>

                <hr class="hr">

                <div class="vcard ep_contact" id="hcard-marie-fouris">

                    <a class="btn btn-link url fn">Marie Fouris</a>

                    <div class="org muted">
                        Co-fondatrice et COO
                    </div>

                </div>

            </div>

            <div class="span4 offset2 pull-center">

                <p class="lead">
                    Les meilleurs journalistes s&#233;lectionn&#233;s par nos soins vous proposent leurs devis.
                </p>

                <hr class="hr">

                <div class="vcard ep_contact" id="hcard-julien-wolff">

                    <a class="btn btn-link url fn">Julien Wolff</a>

                    <div class="org muted">
                        Co-fondateur et CEO
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<section id="garanties" class="wedo">

    <div class="container">

        <h3 class="sectiondivider pull-center"><span>Nos garanties</span></h3>

        <div class="row-fluid">

            <div class="span7 offset1">

                <h4>Un contenu exclusif pour un meilleur r&#233;f&#233;rencement</h4>

                <ul class="unstyled garanties-list">

                    <li>
                        <span class="more">+</span> Contenu exclusif&#160;: d&#233;tection de plagiat &#224; l&#8217;aide d&#8217;outils sp&#233;cifiques.
                    </li>

                    <li>
                        <span class="more">+</span> Reprise gratuite en cas de non-respect de votre brief
                    </li>

                    <li>
                        <span class="more">+</span> Proposition de charte &#233;ditoriale compl&#232;te
                    </li>

                    <li>
                        <span class="more">+</span><span class="more">+</span> Proposition de sujets &#224; fort potentiel de trafic
                    </li>

                    <li>
                        <span class="more">+</span> Proposition de sujets o&#249; votre ranking peut &#234;tre am&#233;lior&#233;
                        <br>

                        (audit SEO de votre site)
                    </li>

                    <li>
                        <span class="more">+</span> Propositions de m&#233;ta-descriptions
                    </li>

                    <li>
                        <span class="more">+</span> Travail sur la densit&#233; des mots cl&#233;s
                    </li>

                    <li>
                        <span class="more">+</span> Insertion de mots cl&#233;s de longue traine
                    </li>

                </ul>

            </div>

            <div class="span4">

                <h4>Et aussi</h4>

                <ul class="media-list">

                    <li class="media">

                        <img src="/FO/images/icon-cms.png" class="media-object pull-left" alt="CMS">

                        <div class="media-body">

                            Int&#233;gration des articles directement sur votre backoffice par nos &#233;quipes

                        </div>

                    </li>

                    <li class="media"><img src="/FO/images/icon-ortho.png" class="media-object pull-left" alt="Correction orthographique">

                        <div class="media-body">

                            Correction orthographique et grammaticale &#224; l&#8217;aide d&#8217;outils sp&#233;cifiques

                        </div>

                    </li>

                    <li class="media">

                        <img src="/FO/images/icon-delai.png" class="media-object pull-left" alt="D�lai">

                        <div class="media-body">

                            D&#233;lai de livraison garanti

                        </div>

                    </li>

                </ul>

            </div>

        </div>

    </div>

</section>

<section id="about">

    <div id="myCarousel" class="carousel slide">

        <ol class="carousel-indicators">

            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>

            <li data-target="#myCarousel" data-slide-to="1"></li>

            <li data-target="#myCarousel" data-slide-to="2"></li>

        </ol>

        <!-- Carousel items -->

        <div class="carousel-inner">

            <div class="active item">

                <div class="container">

                    <h3 class="sectiondivider pull-center"><span>Des journalistes multilingues</span></h3>

                    <p class="lead pull-center">
                        Des journalistes natifs en 26 langues pour vos devis multilingues
                    </p>

                    <div class="row-fluid">

                        <span class="span8"> <!-- content left slider 1 --> <h4>Des journalistes / r&#233;dacteurs au hasard </h4>
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
                            <a href="/client/liberte1" class="btn btn-small btn-primary pull-right"><i class="icon-edit icon-white"></i> Demander un devis</a> <h4><i class="icon-arrow-right"></i> Choisissez et recrutez un journaliste pour votre projet</h4> </span>

                        <!--******** team right column **** -->

                        <span class="span4 well"> <h4>Liste des langues</h4> <!-- language start -->
                            <table class="table">
                                <tr>
                                    <td class="span6">Fran�ais</td><td class="span6">Anglais US</td>
                                </tr>

                                <tr>
                                    <td class="span6">Anglais</td><td class="span6">Allemand</td>
                                </tr>

                                <tr>
                                    <td class="span6">Portugais</td><td class="span6">Portugais (br�silien)</td>
                                </tr>

                                <tr>
                                    <td class="span6">Russe</td><td class="span6">Polonais</td>
                                </tr>

                                <tr>
                                    <td class="span6">Danois</td><td class="span6">Finlandais</td>
                                </tr>

                                <tr>
                                    <td class="span6">Su�dois</td><td class="span6">Italien</td>
                                </tr>

                                <tr>
                                    <td class="span6">Espagnol</td><td class="span6">Japonais</td>
                                </tr>

                                <tr>
                                    <td class="span6">Chinois</td><td class="span6">Norv�gien</td>
                                </tr>

                            </table> </span>

                    </div>

                </div>

            </div>

            <div class="item">

                <div class="container">

                    <h3 class="sectiondivider pull-center"><span>Des journalistes sp�cialis�s</span></h3>

                    <p class="lead pull-center">
                        Des journalistes finances, poker, sport, beaut�, voyage... pour r�pondre � tous vos besoins
                    </p>

                    <div class="row-fluid">

                        <span class="span8"> <!-- content left slider 1 -->
                            <div class="row-fluid">
                                <div class="span6">
                                    <h4>R�dacteurs en <?php echo $this->_tpl_vars['category1']; ?>
</h4>
                                    <ul class="media-list">
                                        <?php $_from = $this->_tpl_vars['Carousel21List']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['carousel_loop21'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['carousel_loop21']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['list21']):
        $this->_foreach['carousel_loop21']['iteration']++;
?>
                                        <?php if ($this->_tpl_vars['list21']['profilepic'] != ""): ?>
                                        <li class="media">
                                            <a style="cursor:auto;" class="pull-left imgframe"> <img src="<?php echo $this->_tpl_vars['list21']['profilepic']; ?>
" class="media-object"> </a>
                                            <div class="media-body">
                                                <h4 class="media-heading"><?php echo $this->_tpl_vars['list21']['first_name']; ?>
</h4>
                                                <?php if ($this->_tpl_vars['list21']['client'] != ""): ?>
                                                <div class="muted">
                                                    a �crit pour <em><?php echo ((is_array($_tmp=$this->_tpl_vars['list21']['client'])) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : smarty_modifier_ucfirst($_tmp)); ?>
</em>
                                                </div>
                                                <?php endif; ?>
                                                <div class="speaking">
                                                    <a  rel="tooltip" data-original-title="<?php echo $this->_tpl_vars['list21']['languagetitle']; ?>
" ><img src="/FO/images/shim.gif" class="flag flag-<?php echo $this->_tpl_vars['list21']['language']; ?>
"></a>
                                                </div>
                                            </div>
                                        </li>
                                        <?php endif; ?>
                                        <?php endforeach; endif; unset($_from); ?>
                                    </ul>
                                </div>

                                <div class="span6">
                                    <h4>R�dacteurs <?php echo $this->_tpl_vars['category2']; ?>
</h4>
                                    <ul class="media-list">
                                        <?php $_from = $this->_tpl_vars['Carousel22List']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['carousel_loop22'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['carousel_loop22']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['list22']):
        $this->_foreach['carousel_loop22']['iteration']++;
?>
                                        <?php if ($this->_tpl_vars['list22']['profilepic'] != ""): ?>
                                        <li class="media">
                                            <a style="cursor:auto;" class="pull-left imgframe"> <img src="<?php echo $this->_tpl_vars['list22']['profilepic']; ?>
" class="media-object"> </a>
                                            <div class="media-body">
                                                <h4 class="media-heading"><?php echo $this->_tpl_vars['list22']['first_name']; ?>
</h4>
                                                <?php if ($this->_tpl_vars['list22']['client'] != ""): ?>
                                                <div class="muted">
                                                    a �crit pour <em><?php echo ((is_array($_tmp=$this->_tpl_vars['list22']['client'])) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : smarty_modifier_ucfirst($_tmp)); ?>
</em>
                                                </div>
                                                <?php endif; ?>
                                                <div class="speaking">
                                                    <a  rel="tooltip"  data-original-title="<?php echo $this->_tpl_vars['list22']['languagetitle']; ?>
"><img  src="/FO/images/shim.gif" class="flag flag-<?php echo $this->_tpl_vars['list22']['language']; ?>
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
                            <a href="/client/liberte1" class="btn btn-small btn-primary pull-right"><i class="icon-edit icon-white"></i> Demander un devis</a> <h4><i class="icon-arrow-right"></i> Choisissez et recrutez un journaliste pour votre projet</h4> </span>

                        <!--******** team right column **** -->

                        <span class="span4 well"> <!-- skills start --> <h4>Nos comp&#233;tences</a></h4>
                            <ul>
                                <!--<?php $_from = $this->_tpl_vars['catArr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['catkey'] => $this->_tpl_vars['cat']):
?>
                                <li>
                                   <?php echo $this->_tpl_vars['cat']; ?>

                                </li>
                                <?php endforeach; endif; unset($_from); ?>-->
                                
                                <li>
                                    E-commerce / shopping
                                </li>

                                <li>
                                    Education
                                </li>

                                <li>
                                    High Tech
                                </li>

                                <li>
                                    Immobilier / Finance / Bourse
                                </li>

                                <li>
                                    Informatique
                                </li>

                                <li>
                                    Mode / Femme / Beaut�
                                </li>

                                <li>
                                    Rencontre
                                </li>

                                <li>
                                    People
                                </li>

                                <li>
                                    Site institutionnel
                                </li>

                                <li>
                                    Sport / Paris sportifs
                                </li>

                                <li>
                                    T�l�phonie
                                </li>

                                <li>
                                    Vie pratique
                                </li>

                                <li>
                                    Voyages
                                </li>

                            </ul> Besoin d'autres comp�tences ? <a href="/index/contact">Contactez-nous</a> <!-- skills end --> </span>

                    </div>

                </div>

            </div>

            <div class="item">

                <div class="container">

                    <h3 class="sectiondivider pull-center"><span>Une �quipe � votre service</span></h3>

                    <p class="lead pull-center">
                        Collaborateurs et journalistes experts de la r�daction pour les entreprises, vous aident � r�aliser vos projets
                    </p>

                    <div class="row-fluid">

                        <span class="span8"> <!-- content left slider 1 --> <h4>Une �quipe exp�riment�e pour la gestion de vos projets</h4>
                            <div class="row-fluid">

                                <div class="span6">

                                    <ul class="media-list">

                                        <li class="media">

                                            <a style="cursor:auto;" class="pull-left imgframe"> <img src="/FO/images/profile/romain-dostes.jpg" class="media-object"> </a>

                                            <div class="media-body">

                                                <h4 class="media-heading">Romain Dostes</h4>

                                                <div class="muted">
                                                    Chef de Projet �ditorial Edit-place
                                                </div>

                                            </div>

                                        </li>

                                        <li class="media">

                                            <div class="vcard ep_contact" id="hcard-Coralie-Leguille">

                                                <a class="imgframe pull-left" style="cursor:auto;"><img class="photo" alt="Coralie Leguille" src="/FO/images/profile/coralie-leguille.jpg"></a>

                                                <div class="btn-group">

                                                    <a class="btn btn-link url fn">Coralie Leguille</a><a href="mailto:cleguille@edit-place.com" class="email btn btn-mini"><i class="icon-envelope"></i></a>

                                                </div>

                                                <div class="org muted">
                                                    Business Developer Edit-place
                                                </div>

                                                <div class="adr">

                                                    <span class="locality">Paris</span>

                                                    <span class="country-name">France</span>

                                                </div>

                                                <div class="tel">
                                                    +33177686460
                                                </div>

                                                <!-- end, contact profile -->

                                            </div>

                                        </li>

                                    </ul>

                                </div>

                                <div class="span6">

                                    <ul class="media-list">

                                        <li class="media">

                                            <a style="cursor:auto;" class="pull-left imgframe"> <img src="/FO/images/profile/alix-keslassy.jpg" class="media-object"> </a>

                                            <div class="media-body">

                                                <h4 class="media-heading">Alix Keslassy</h4>

                                                <div class="muted">
                                                    Assistante Chef de Projet �ditorial Edit-place
                                                </div>

                                            </div>

                                        </li>

                                        <li class="media">

                                            <div id="hcard-Marie-Adelaide" class="vcard ep_contact">

                                                <a style="cursor:auto;" class="imgframe pull-left"><img src="/FO/images/profile/marie-adelaide-gervis.jpg" alt="Marie Ad�la�de Gervis" class="photo"></a>

                                                <div class="btn-group">

                                                    <a class="btn btn-link url fn">Marie Ad�la�de Gervis</a><a class="email btn btn-mini" href="mailto:magervis@edit-place.com"><i class="icon-envelope"></i></a>

                                                </div>

                                                <div class="org muted">
                                                    Head of Sales France & Benelux
                                                </div>

                                                <div class="adr">

                                                    <span class="locality">Paris</span>

                                                    <span class="country-name">France</span>

                                                </div>

                                                <div class="tel">
                                                    +33177686463
                                                </div>

                                                <!-- end, contact profile -->

                                            </div>

                                        </li>

                                    </ul>

                                </div>

                            </div>
                            <hr>
                            <a href="/client/liberte1" class="btn btn-small btn-primary pull-right"><i class="icon-edit icon-white"></i> Demander un devis</a> <h4><i class="icon-arrow-right"></i> Choisissez et recrutez un journaliste pour votre projet</h4> </span>

                        <!--******** team right column **** -->

                        <span class="span4 well"> <!-- ongoing quote -->
                            <div id="quote-ongoing">

                                <h4>Projets en attente de devis</h4>

                                <ul class="nav nav-tabs nav-stacked">

                                    <?php if (count($this->_tpl_vars['quotes']) > 0): ?>

                                    <?php $_from = $this->_tpl_vars['quotes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['quote']):
?>

                                    <li>

                                        <?php if (smarty_modifier_strlen($this->_tpl_vars['quote']['title']) > 45): ?>

                                        <a rel="tooltip" data-original-title="<?php echo $this->_tpl_vars['quote']['title']; ?>
" data-placement="left"> <span class="badge pull-right"><?php echo $this->_tpl_vars['quote']['participations']; ?>
</span> <?php echo ((is_array($_tmp=$this->_tpl_vars['quote']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 45, "...", true) : smarty_modifier_truncate($_tmp, 45, "...", true)); ?>
 </a>

                                        <?php else: ?>

                                        <a> <span class="badge pull-right"><?php echo $this->_tpl_vars['quote']['participations']; ?>
</span> <?php echo $this->_tpl_vars['quote']['title']; ?>
 </a>

                                        <?php endif; ?>

                                    </li>

                                    <?php endforeach; endif; unset($_from); ?>

                                    <?php else: ?>

                                    <li>
                                        <b>Il n'y a pas de devis en cours</b>
                                    </li>

                                    <?php endif; ?>

                                </ul>

                            </div> </span>

                    </div>

                </div>

            </div>

        </div>

        <!-- Carousel nav -->

        <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>

        <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>

    </div>

</section>

<?php echo '
<script>
	$(".scroll").click(function(event) {
		event.preventDefault();
		$(\'html,body\').animate({
			scrollTop : $(this.hash).offset().top
		}, 500);
	});
	
    $(function(){
      $(\'#AllLangs\').slimscroll({
        height: \'235px\'
      });
    });
    
	$(\'#skillsTab a\').click(function(e) {
		e.preventDefault();
		$(this).tab(\'show\');
	})

	$(\'#skillsTab a:first\').tab(\'show\');

	// tooltip activation
	$("[rel=tooltip]").tooltip();
	$("[rel=popover]").popover();

	// initialise ajax modal to kill cache
	$(\'body\').on(\'hidden\', \'.modal\', function() {
		$(this).removeData(\'modal\');
	});

	$(".killcurrentmodal").click(function(event) {
		$(\'#login\').modal(\'hide\');
	});

	$(\'#carouselBrand\').carousel();

</script>
'; ?>