<?php /* Smarty version 2.6.19, created on 2015-10-16 12:46:15
         compiled from Client/ftvindex.phtml */ ?>
<?php echo '
<script language="javascript" src="/FO/script/common/jquery.dataTables.js"></script>
<link href="/FO/css/common/jquery.dataTables.css" type="text/css" rel="stylesheet" />
<script language="JavaScript" type="text/javascript" src="/FO/script/common/jquery.MultiFile.js"></script>
<!--<script language="JavaScript" type="text/javascript" src="/FO/script/common/jquery-ui-1.8.16.custom.min.js"></script>
<script language="JavaScript" type="text/javascript" src="/FO/script/common/jquery.multiselect.js"></script>
<script language="JavaScript" type="text/javascript" src="/FO/script/common/jquery.multiselect.filter.js"></script>-->
<!--<script language="JavaScript" type="text/javascript" src="/FO/script/common/multi-select/js/jquery.multi-select.js"></script>
<script language="JavaScript" type="text/javascript" src="/FO/script/common/multi-select/js/jquery.quicksearch.js"></script>
-->
<!--<link href="/FO/css/common/jquery.multiselect.css" type="text/css" rel="stylesheet" />
<link href="/FO/css/common/jquery.multiselect.filter.css" type="text/css" rel="stylesheet" />
<link href="/FO/css/common/jquery-ui-1.8.16.custom.css" type="text/css" rel="stylesheet" />-->

<style type="text/css">
    .modal.fade.in
    {
        top:30%;
    }
    body {
        color: #555555;
        font-family: "open sans",Helvetica,Arial,sans-serif;
        font-size: 14px;
        font-weight: 300;
        line-height: 1.5em;!important;

    }
    .modal-body {
        height: 350px;
        overflow: auto;!important;
    }

</style>


<script language="javascript">
    $(document).ready(function() {

        // added by naseer on 12.08.2015 //
        /*$(\'#scltable\').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "/ftvedito/loadftvrequests",
            "aoColumns": [
                //{ mData: \'client\' },
                //{ mData: \'created_at\' } ,
                { mData: \'recent_document\' },
                //{ mData: \'download\' },
                { mData: \'duration\' },
                { mData: \'modify_contains\' },
                { mData: \'modify_broadcast\' },
                //{ mData: \'demand\' },
                { mData: \'comments\' }
                    //,
               //{ mData: \'add_comments\' },
                //{ mData: \'action\' }
            ]

        });*/
        $(\'#scltable\').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "/ftvedito/loadftvrequests",
            "aaSorting": [[ 1, "desc" ]],
            "oTableTools": {
                "aButtons": [
                    "copy",
                    "print",
                    {
                        "sExtends": "collection",
                        "sButtonText": \'Sauvegarder <span class="caret" />\',
                        "aButtons": ["csv", "xls", "pdf"]
                    }
                ],
                "sSwfPath": "/BO/theme/gebo/lib/datatables/extras/TableTools/media/swf/copy_csv_xls_pdf.swf"
            },
            "aoColumns": [
                null,
                null,
                null,
                { "bSortable": false },
                null,
                null,
                null,
                null,
                null,
                { "bSortable": false },
                { "bSortable": false },
                { "bSortable": false }
            ]

        });
        // end of added by naseer on 12.08.2015 //

        //destroy the Modal object before subsequent toggles
        $(\'body\').on(\'hidden\', \'.modal\', function () {
            $(this).removeData(\'modal\');
        });
        $(\'body\').on(\'hidden\', \'.modal\', function () {
            $(this).removeData(\'modal\');
        });
        //destroy the Modal object before subsequent toggles
        $(\'body\').on(\'hidden\', \'#newrequest\', function () {
            $(this).removeData(\'newrequest\');
        });
        $(\'body\').on(\'hidden.bs.modal\', \'.modal\', function () {
            $(this).removeData(\'bs.modal\');
        });
        $(\'#newrequest\').bind(\'hidden.bs.modal\', function () {
            $("html").css("margin-right", "0px");
        });
        $(\'#newrequest\').bind(\'show.bs.modal\', function () {
            $("html").css("margin-right", "-15px");
        });

    });

    function closepopover(ind)
    {
        $(\'#popover_\'+ind).popover(\'hide\');
    }
</script>
'; ?>


<section id="quote-listing-table">
    <div class="mod">  <a  data-target="#newrequest" data-refresh="true"  data-toggle="modal"  role="button" class="btn btn-success pull-left"  href="/ftvedito/newrequest">Ajouter Une Demande</a>
        <table id="scltable">
            <thead>
            <tr>
                <!--<th>Contact Client</th>
                <th>Date et heure de la demande</th>
                <th>Objet de la demande</th>
                <th>Ajouter un fichier</th>
                <th>Quand</th>
                <th>Emissions &agrave; modifier</th>
                <th>Contenus &agrave; modifier</th>
                <th>Etat de la demande</th>
                <th>Commentaire(s)</th>
                <th>Ajouter un commentaire</th>
                <th>Action</th>-->
                <th>Contact Client</th>
                <th>Date et heure de la demande</th>
                <th>Object de la demande</th>
                <th>Ajouter un fichier</th>
                <th>Quand</th>
                <th>Contenus &agrave; modifier</th>
                <th>Emissions &agrave; modifier</th>
                <th>Etat de la demande</th>
                <th>Demand</th>
                <th>Commentaire(s)</th>
                <th>Ajouter un commentaire</th>
                <th>Action</th>
            </tr>
            </thead>


        </table>
    </div>
</section>
<div class="span12">
    <!---Pagination start-->
    <div class="pagination pull-right">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Client/pagination.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
</div>
<br>
<br>


<div class="modal fade bs-example-modal-lg" id="newrequest" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="top:35px;position: fixed;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">


        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-md" id="addcomment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="top:35px;position: fixed;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">


        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-md" id="showobjectdemand" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="top:35px;position: fixed;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">


        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-md" id="showrecentcomment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="top:35px;position: fixed;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">


        </div>
    </div>
    <!-- <div class="modal-header">
         <button class="close" data-dismiss="modal" >&times;</button>
         <h3>Edit-place Commentaire(s)</h3>
     </div>
     <div class="modal-body" id="add_comment">
     </div>
     <div class="modal-footer">
     </div>-->
</div>
<div class="modal fade bs-example-modal-md" id="fileupload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="top:35px;position: fixed;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">


        </div>
    </div>
    <!-- <div class="modal-header">
         <button class="close" data-dismiss="modal" >&times;</button>
         <h3>Upload file</h3>
     </div>
     <div class="modal-body" id="file_upload">
     </div>
     <div class="modal-footer">
     </div>-->
</div>