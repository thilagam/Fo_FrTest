<?php /* Smarty version 2.6.19, created on 2015-07-30 11:25:13
         compiled from common/ftv_header.phtml */ ?>
<!--<header>
<div id="header">
    <div id="topnav">
        <div class="container">
            <div class="pull-right">
					<span class="dropdown" id="switch-lang">
						<a href="index.html" data-target="#" data-toggle="dropdown" role="button" id="dLabel"><span class="flag flag-fr"></span> FR <span class="caret"></span></a>
						<ul aria-labelledby="dLabel" role="menu" class="dropdown-menu">
                            <li><a href="http://mmm-en.edit-place.com"><span class="flag flag-gb"></span> UK</a></li>
                        </ul>
					</span>
                | <a href="/contrib/"><span class="glyphicon glyphicon-pencil"></span> Contributeur</a> |

                <a data-toggle="modal" data-target="#login" href=""><span class="glyphicon glyphicon-user"></span> Connexion</a>
            </div>
        </div>
    </div>
    <nav role="navigation" class="navbar navbar_ep">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display
            <div class="navbar-header">
                <button data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" class="navbar-toggle" type="button">
                    <span class="sr-only">Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand"><img width="201" height="34" class="img-responsive" src="/FO/images/svg/logo-ep.svg"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling
            <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="ep-effect"><a href="#">Accueil</a></li>
                    <li class="ep-effect"><a href="#">Qui sommes-nous ?</a></li>
                    <li class="ep-effect"><a href="/index/nos-references">Nos références</a></li>
                    <li class="ep-effect"><a href="http://www.edit-place.com/blog/">Blog</a></li>
                    <li><a href="quote-1.html" class="navbar-btn btn btn-primary btn-sm">Nos tarifs</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>

</header>-->
<?php echo '
<style>
    .quetn a:hover {
        text-decoration:underline;
        font-weight:bold;
    }
</style>
'; ?>

    <div id="header" style="background: #000000">

        <div role="navigation" class="navbar navbar_ep" >
               <a href="#" class="navbar-brand"><img width="201" height="34" class="img-responsive" src="/FO/images/imageB3/svg/logo-ep.svg"></a>
                <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
                    <ul class="nav pull-right">
                        <?php if ($_SERVER['REQUEST_URI'] == '/ftvchaine/index'): ?>
                        <li><div style="font-weight: bold;font-size:30px">FTV CHAINE <img class="pull-right" src="/FO/images/imageB3/flag/france.png" width="20" height="20" class="img-responsive pull-left"></div>
                            <?php if ($this->_tpl_vars['ftvmailId'] != ""): ?><span style="color:#FFF;font-weight:bold;margin-top:10px;clear:both;float:left"><?php echo $this->_tpl_vars['ftvmailId']; ?>
&nbsp; &nbsp;  <a tabindex="-1" href="/ftvchaine/logout" style="font: italic">Se d&eacute;connecter</a></span><?php endif; ?>
                        </li>
                        <?php else: ?>
                        <li><div style="font-weight: bold;font-size:30px">FTV EDITO <img class="pull-right" src="/FO/images/imageB3/flag/france.png" width="20" height="20" class="img-responsive pull-left"></div>
                            <?php if ($this->_tpl_vars['ftvmailId'] != ""): ?><span style="color:#FFF;font-weight:bold;margin-top:10px;clear:both;float:left"><?php echo $this->_tpl_vars['ftvmailId']; ?>
 &nbsp; &nbsp; <a  tabindex="-1" href="/ftvedito/logout" style="font: italic">Se d&eacute;connecter</a></span>
                           <?php endif; ?>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

   <!-- <div class="navbar" style="height: 90px;">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a id="brand" class="brand" title="Accueil edit-place" href="/"><img src="/FO/images/svg/logo-ep.svg" width="201" height="50" class="img-responsive pull-left"></a>
            <ul class="nav pull-right">
                <?php if ($_SERVER['REQUEST_URI'] == '/ftvchaine/index'): ?>
                <li><h2>FTV CHAINE</h2>
                   <?php if ($this->_tpl_vars['ftvmailId'] != ""): ?><span style="color:#FFF;font-weight:bold;margin-top:10px;clear:both;float:left"><?php echo $this->_tpl_vars['ftvmailId']; ?>
</span> <a tabindex="-1" href="/ftvchaine/logout" style="float:right;">Se d?connecter</a><?php endif; ?>
                </li>
                <?php else: ?>
                <li><h2>FTV EDITO</h2>
                    <?php if ($this->_tpl_vars['ftvmailId'] != ""): ?><span style="color:#FFF;font-weight:bold;margin-top:10px;clear:both;float:left"><?php echo $this->_tpl_vars['ftvmailId']; ?>
</span> <a tabindex="-1" href="/ftvedito/logout" style="float:right;">Se d?connecter</a><?php endif; ?>
                </li>
                <?php endif; ?>
                <li><img src="/FO/images/flag/france.png" width="20" height="20" class="img-responsive pull-left"></li>
            </ul>
        </div>
    </div>-->