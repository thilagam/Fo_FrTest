<?php

class FtvchaineController extends Ep_Controller_Action
{
	public function init() 
	{
        parent::init();
		$this->ftvcontacts = Zend_Registry::get('EP_ftvchcontacts');
		//$this->_view->usertype=$this->Super_Client->usertype;
        /*if(isset($_COOKIE['ftvchaine']))
        {
            $obj = new Ep_Ftv_FtvContacts();
            $details = $obj->getContactDetails($_COOKIE['chaineuser']);
            $res= $obj->checkFtvLogin($_COOKIE['chaineuser'],base64_decode($_COOKIE['chainepass']), $via='direct', $details[0]['ftvtype'], 'chaine');
        }*/
    }
    public function wrap($str, $width=75, $break="\n") {
        return preg_replace('#(\S{'.$width.',})#e', "chunk_split('$1', ".$width.", '".$break."')", $str);
    }

    public function indexAction()
	{

        //$this->ftvcontacts = Zend_Registry::get('EP_ftvcontacts');
		$ftvcontacts_obj = new Ep_Ftv_FtvContacts();
        $ftvrequest_obj = new Ep_Ftv_FtvRequests();
        $ftvcomments_obj = new Ep_Ftv_FtvComments();
        $ftvdocuments_obj = new Ep_Ftv_FtvDocuments();
       $this->_view->ftvId  = $this->ftvcontacts->ftvId;
       $this->_view->ftvmailId  = $this->ftvcontacts->ftvmailId;

        if($this->ftvcontacts->ftvId != "")
		{
			$loginclient = $this->ftvcontacts->ftvId;
			$requestsdetail=$ftvrequest_obj->getAllRequestsDetails('chaine');

            //contains to modify
            /*$contains_array = array(1=>"UNE Tournante", 2=>"Diffusion", 3=>"Article", 4=>"Ressource Livres",5=>"Ressource Voir/Ecouter",
                                        6=>"Ressource Liens et Adresses utiles", 7=>"Galerie photo", 8=>"Musique", 9=>"Autres");*/
            $contains_array = array(1=>"Unes tournantes", 2=>"Voir et Revoir", 3=>"Les &eacute;missions", 4=>"A d&eacute;couvrir",5=>"Les jeux",
                6=>"Une", 7=>"Top 3", 8=>"Forums", 9=>"PAGE VIDEOS", 10=>"PAGES DOCUMENTAIRES", 11=>"PAGES FRANCE 5 & VOUS", 12=>"PAGES INFOS");
            $duraiton_array = array("h"=>"Dans l'heure", "d"=>"Dans la journ&eacute;e","nd"=>"Le lendemain", "w"=>"Dans la semaine","nw"=>"La semaine prochaine");
            $this->_view->contains_array = $contains_array;
            $this->_view->quands_array = $duraiton_array;
            $broadcast_array = array("1"=>'France 2', "2"=>'France 3', "3"=>'France 4',"4"=>'France 5',"5"=>'France &Ocirc;',"6"=>'France TV');
            $demand_array = array("1"=>'Int&eacute;gration', "2"=>'Modification demand&eacute;e par FTV', "3"=>'Correction erreur EP', "4"=>'Retours');
            $this->_view->broadcast_array = $broadcast_array;
            $this->_view->demand_array = $demand_array;
            //print_r($broadcast_array);  exit;
            if($requestsdetail != 'NO')
            {
                foreach ($requestsdetail as $key => $value)
                {
                    // $requestsdetail[$key]['request_object']  = $this->wrap($requestsdetail[$key]['request_object'], 30, "<br>");
                    $durationvalue = $duraiton_array[$requestsdetail[$key]['duration']];
                    $requestsdetail[$key]['duration']   = $durationvalue;
                    $requestsdetail[$key]['demand'] = $demand_array[$requestsdetail[$key]['demand']];
                    /////getting modify contains display format///
                    $contains  = explode(",",$requestsdetail[$key]['modify_contains']);
                    $finalcontains = array();
                    foreach($contains as $code1 => $abb1)
                    {
                        $finalcontains[$code1] = $contains_array[$abb1];
                    }
                    $containvalue = implode(" / ",$finalcontains);
                    $requestsdetail[$key]['modify_contains']   = $containvalue;
                    ////getting modify broadcast display format//
                    $braodcast  = explode(",",$requestsdetail[$key]['modify_broadcast']);
                    $finalbroadcast = array();
                    foreach($braodcast as $broadkey => $broadval)
                    {
                        $finalbroadcast[$broadkey] = $broadcast_array[$broadval];
                    }
                    $broadvalue = implode(" / ",$finalbroadcast);
                    $requestsdetail[$key]['modify_broadcast']   = $broadvalue;
                   ////gettting recent comments ny BO user ////
                    $commentDetails=$ftvcomments_obj->getRecentCommentsByBoUser($requestsdetail[$key]['identifier']);
                    if($commentDetails != 'NO')
                        $requestsdetail[$key]['comments'] = $commentDetails[0]['comments'];
                    else
                        $requestsdetail[$key]['comments'] = "-NA-";

                    ////gettting recent document BO user ////
                    $documentDetails=$ftvdocuments_obj->getRecentDocument($requestsdetail[$key]['identifier']);
                    if($documentDetails != 'NO')
                        $requestsdetail[$key]['recent_document'] = $documentDetails[0]['document'];
                    else
                        $requestsdetail[$key]['recent_document'] = "NILL";

                }
            }
			//echo "<pre>";print_r($requestsdetail);exit;
            $this->_view->requestsdetail=$requestsdetail;

            $this->render("ftvch_index");
		}
		else
		{
			$this->render("ftvch_login");
		}
	}
    public function newrequestAction()
    {

        $this->_view->ftvId  = $this->ftvcontacts->ftvId;
        $ftvcontacts_obj = new Ep_Ftv_FtvContacts();
        $ftvrequest_obj = new Ep_Ftv_FtvRequests();
        $ftvcomments_obj = new Ep_Ftv_FtvComments();
        $ftvdocuments_obj = new Ep_Ftv_FtvDocuments();
        $allcontacts =  $ftvcontacts_obj->getFtvContacts('chaine');
        $automail = new Ep_Ticket_AutoEmails();
        $attachment=new Ep_Ticket_Attachment();
        $serverpath = '/home/sites/site5/web/FO/ftv_documents/';
        $contact_list=array();
        foreach($allcontacts as $key=>$value)
        {
            $contact_list[$value['identifier']]=utf8_encode($value['email_id']);
        }
        if($contact_list)
            asort($contact_list);

        //$broadcast_array=$this->_arrayDb->loadArrayv2("EP_BROADCASTS", $this->_lang);
        $broadcast_array = array("1"=>'France 2', "2"=>'France 3', "3"=>'France 4',"4"=>'France 5',"5"=>'France &Ocirc;',"6"=>'France TV');
        $demand_array = array("1"=>'Int&eacute;gration', "2"=>'Modification demand&eacute;e par FTV', "3"=>'Correction erreur EP', "4"=>'Retours');
        $this->_view->broadcast_array = $broadcast_array;
        $this->_view->demand_array = $demand_array;
        $this->_view->ftvcontacts  = $contact_list;
        $request_params = $this->_request->getParams();
        if($request_params['request_id'] != '' && $request_params['edit_demand'] == 'yes')
        {
            $request_id =  $request_params['request_id'];
            $othercontacts =  implode(",",$request_params["othercontacts"]);
            $quand = implode(",",$request_params["quand"]);
            $demand = implode(",",$request_params["demand"]);
            $modifycontains = implode(",",$request_params["modifycontains"]);
            $modifybroadcast = implode(",",$request_params["broadcasts"]);
            $request_object = utf8_decode($request_params["request_object"]);
            $data = array("other_contacts"=>$othercontacts, "request_object"=>$request_object, "duration"=>$quand,
                                "modify_broadcast"=>$modifybroadcast, "modify_contains"=>$modifycontains, "demand"=>$demand );
            $query = "identifier= '".$request_id."'";
            $ftvrequest_obj->updateFtvRequests($data,$query);

            $this->_redirect("/ftvchaine/index");
        }
        elseif($this->_request-> isPost())
        {
            $request_params = $this->_request->getParams();
            $othercontacts =  implode(",",$request_params["othercontacts"]);
            $quand = implode(",",$request_params["quand"]);
            $demand = implode(",",$request_params["demand"]);
            $modifycontains = implode(",",$request_params["modifycontains"]);
            $modifybroadcast = implode(",",$request_params["broadcasts"]);
            ///////differentiate the request on days respectively///////////////////////
            $t=date('d-m-Y H:i');
            $dayandtime = explode("-", date("N-G-i",strtotime($t)));
            $day = $dayandtime[0];
            $hour = $dayandtime[1];
            $minute = $dayandtime[2];
            $reddays = array(1,2,3,4);  ///monday to thursday
            $bluedays = array(5,6,7); //friday to sunday

            if(!$hour > 9 && !$hour < 19)
            {
                if(in_array($day, $reddays))
                    $ftvrequest_obj->daysrange="red";
                else
                    $ftvrequest_obj->daysrange="green";
            }
            //  echo $ftvrequest_obj->daysrange; exit;
            ///////////////////////////////
            ////for goroup Id in users table////
            $ftvrequest_obj->request_by=$this->ftvcontacts->ftvId;
            $ftvrequest_obj->other_contacts=$othercontacts;
            $ftvrequest_obj->request_object=utf8_decode($request_params["request_object"]);
            $ftvrequest_obj->duration=$quand;
            $ftvrequest_obj->modify_broadcast=$modifybroadcast;
            $ftvrequest_obj->modify_contains=$modifycontains;
            $ftvrequest_obj->demand = $demand;
            $ftvrequest_obj->status="pending";
            $ftvrequest_obj->ftvtype="chaine";
            if($quand == 'h')
                $ftvrequest_obj->mail_send_at = strtotime(date("Y-m-d H:i:s ", strtotime("+1 hour")));
            elseif($quand == 'd')
                $ftvrequest_obj->mail_send_at = strtotime(date("Y-m-d H:i:s ", strtotime("Today 6pm")));
            elseif($quand == 'nd')
                $ftvrequest_obj->mail_send_at = strtotime(date("Y-m-d H:i:s ", strtotime("Tomorrow 6pm")));
            elseif($quand == 'w')
                $ftvrequest_obj->mail_send_at = strtotime(date("Y-m-d H:i:s ", strtotime("Friday 6pm")));
            elseif($quand == 'nw')
                $ftvrequest_obj->mail_send_at = strtotime(date("Y-m-d H:i:s ", strtotime("+1 week next Friday 6pm")));
            try
            {
                if($ftvrequest_obj->insert())
                {
                    $request_id = $ftvrequest_obj->getRecentInsertedId();
                    $request_id = $request_id[0]['identifier'];
                    /* $ftvcomments_obj->request_id=$request_id;
                     $ftvcomments_obj->comment_by=$this->ftvcontacts->ftvId;
                     $ftvcomments_obj->comments=$request_params["request_object"];
                     $ftvcomments_obj->insert();*/
                    ////file upload code///////////
                    if($_FILES['attachment']['name'][0]!=NULL)
                    {
                        $file_attachemnts='';
                        $cnt=1;
                        foreach($_FILES['attachment']['name'] as $file)
                        {
                            $file_attachemnt[$cnt-1]=rand(10000, 99999)."_".utf8dec($file);
                            $file_attachemnts.= rand(10000, 99999)."_".utf8dec($file)."|";
                            $cnt++;
                        }
                        $file_attachemnts=substr($file_attachemnts,0,-1);
                        $file_attachemnts = explode("|",$file_attachemnts);
                        $fileCount=0;
                        foreach($_FILES['attachment']['tmp_name'] as $file)
                        {
                            $attachFile['tmp_name']=$file;
                            $attachment->uploadAttachment($serverpath,$attachFile,$file_attachemnts[$fileCount]);
                            $fileCount++;
                        }
                    }
                    $files = $file_attachemnts;
                    foreach ($files as $k=>$file) {
                        $zip_array[]= $serverpath.$file;
                    }
                    $zipname =   "file_".uniqid().".zip";
                    $fullpath =  $serverpath.$request_id."/".$zipname;
                    $ftvDir = $serverpath.$request_id;
                    if (!is_dir($ftvDir))
                    {
                        mkdir($ftvDir, 0777);
                    }
                    $zip_status = create_zip($zip_array, $ftvDir."/".$zipname);
                    foreach ($files as $k=>$file) {
                        unlink($serverpath.$file);
                    }
                    $ftvdocuments_obj->request_id=$request_id;
                    $ftvdocuments_obj->document_by=$this->ftvcontacts->ftvId;
                    if( $zip_status === '1' || $zip_status == true ){
                        $ftvdocuments_obj->document=$request_id."/".$zipname;
                    }
                    else{
                        $ftvdocuments_obj->document='';
                    }
                    $ftvdocuments_obj->insert();
                    ////send mails to all other contacts and actual contact as its commented by BO user//
                    $requestdetails =  $ftvrequest_obj->requestDetailsById($request_id);
                    $othercontacts = explode(",",$requestdetails[0]['other_contacts']);
                    foreach($othercontacts as $values)
                    {
                        $contactdetails = $ftvcontacts_obj->getFtvContactDetails($this->ftvcontacts->ftvId);
                        $parameters['ftvcontactName'] = $contactdetails[0]['first_name']." ".$contactdetails[0]['last_name'];
                        $automail->sendFtvChaineContactsPersonalEmail($values,112,$parameters); // to client contact
                    }
                    //// sending the mail to johny and other bo user to whom request was assigned//
                    $contactdetails = $ftvcontacts_obj->getFtvContactDetails($this->ftvcontacts->ftvId);
                    $parameters['ftvcontactName'] = $contactdetails[0]['first_name']." ".$contactdetails[0]['last_name'];
                    $parameters['ftvType'] = "chaine";
                    $automail->messageToEPMail('110823103540627',111,$parameters); // to johny the head BO user
                }
                $this->_helper->FlashMessenger('Request Created Successfully.');
                $this->_redirect("/ftvchaine/index");
            }
            catch(Zend_Exception $e)
            {
                $this->_helper->FlashMessenger('Request Creation Failed.');
                $this->_redirect("/ftvchaine/index");
            }
        }
        $this->render("ftvch_newrequest");
    }
    //upload documents////
    public function uploadfilesAction()
    {
        $doc_params=$this->_request->getParams();
        $ftvrequest_obj = new Ep_Ftv_FtvRequests();
        $ftvdocuments_obj = new Ep_Ftv_FtvDocuments();
        $attachment=new Ep_Ticket_Attachment();
        $serverpath = '/home/sites/site5/web/FO/ftv_documents/';
        if($doc_params["view"] == 'yes')
        {
            $this->_view->request_id = $doc_params["request_id"];
            $this->_view->ftvtype = $doc_params["ftvtype"];
            $previousfiles = $ftvdocuments_obj->getDocumentsByRequests($doc_params["request_id"]);
            $this->_view->previousfiles = $previousfiles;
            $this->render("ftv_addfile");
        }
        if($this->_request->isPost())
        {       //print_r($doc_params);  exit;
            /*if($this->ftvcontacts->ftvId != '')
                $this->_redirect("/ftvchaine/index");*/
            $request_id=$doc_params['request_id'];
            if($_FILES['attachment']['name'][0]!=NULL)
            {
                $file_attachemnts='';
                $cnt=1;
                foreach($_FILES['attachment']['name'] as $file)
                {
                    $file_attachemnt[$cnt-1]=rand(10000, 99999)."_".utf8dec($file);
                    $file_attachemnts.= rand(10000, 99999)."_".utf8dec($file)."|";
                    $cnt++;
                }
                $file_attachemnts=substr($file_attachemnts,0,-1);
                $file_attachemnts = explode("|",$file_attachemnts);
                $fileCount=0;
                foreach($_FILES['attachment']['tmp_name'] as $file)
                {
                    $attachFile['tmp_name']=$file;
                    $attachment->uploadAttachment($serverpath,$attachFile,$file_attachemnts[$fileCount]);
                    $fileCount++;
                }
            }
            $files = $file_attachemnts;
            foreach ($files as $k=>$file) {
                $zip_array[]= $serverpath.$file;
            }
            $zipname =   "file_".uniqid().".zip";
            $fullpath =  $serverpath.$request_id."/".$zipname;
            $ftvDir = $serverpath.$request_id;
            if (!is_dir($ftvDir))
            {
                mkdir($ftvDir, 0777);
            }
            create_zip($zip_array, $ftvDir."/".$zipname);
            foreach ($files as $k=>$file) {
                unlink($serverpath.$file);
            }
            $ftvdocuments_obj->request_id=$request_id;
            $ftvdocuments_obj->document_by=$this->ftvcontacts->ftvId;
            $ftvdocuments_obj->document=$request_id."/".$zipname;
            $ftvdocuments_obj->insert();
            $this->_redirect("/ftvchaine/index");
        }
    }
    // to download file for ftv///
    public function downloadftvAction()
    {
        $user_params=$this->_request->getParams();
        $serverpath = '/home/sites/site5/web/FO/ftv_documents/';
        $request_id = $user_params['request_id'];
        $zipfilename = $serverpath.$user_params['filename'];
        $zipname = explode("/",$user_params['filename']);

        $filename = $zipname[1];
       // $filepath = "/home/sites/site5/web/FO/ftv_documents/".$request_id."/";
        $filepath = $request_id."-".$filename;

        $this->_redirect("/FO/download_ftv.php?ftvfile=".$filepath."");

        // http headers for zip downloads
        /*header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"".$filename."\"");
        header("Content-Transfer-Encoding: binary");
        header("Content-Length: ".filesize($filepath.$filename));
        ob_end_flush();
        @readfile($filepath.$filename);*/
    }
    public function duplicaterequestAction()
    {
        $ftvcontacts_obj = new Ep_Ftv_FtvContacts();
        $ftvrequest_obj = new Ep_Ftv_FtvRequests();
        $ftvcomments_obj = new Ep_Ftv_FtvComments();
        $ftvdocuments_obj = new Ep_Ftv_FtvDocuments();
        $allcontacts =  $ftvcontacts_obj->getFtvContacts('chaine');
        $contact_list=array();
        foreach($allcontacts as $key=>$value)
        {
            $contact_list[$value['identifier']]=utf8_encode($value['email_id']);
        }
        if($contact_list)
            asort($contact_list);

        $this->_view->ftvcontacts  = $contact_list;

        $broadcast_array=$this->_arrayDb->loadArrayv2("EP_BROADCASTS", $this->_lang);
        $demand_array = array("1"=>'Int&eacute;gration', "2"=>'Modification demand&eacute;e par FTV', "3"=>'Correction erreur EP', "4"=>'Retours');
        $this->_view->broadcast_array = $broadcast_array;
        $this->_view->demand_array = $demand_array;
        $request_params=$this->_request->getParams();
        $this->_view->edit_demand  = $request_params['edit'];
        $this->_view->request_id  = $request_params['request_id'];
        if($request_params['request_id'] != '')
        {
            $request_id =  $request_params['request_id'];
            $details = $ftvrequest_obj->getRequestById($request_id);
            $this->_view->othercontacts_array = explode(",", $details[0]['other_contacts']);
            $this->_view->quand_array = explode(",", $details[0]['duration']);
            $this->_view->contains_array = explode(",", $details[0]['modify_contains']);
            $this->_view->broadcasts_array = explode(",", $details[0]['modify_broadcast']);

           // print_r($details);  exit;
            $this->_view->requestsdetail=$details;
        }

        $this->render("ftvch_newrequest");
    }
    public function showcommentsAction()
    {
        $comment_params=$this->_request->getParams();
        $ftvcontacts_obj = new Ep_Ftv_FtvContacts();
        $ftvrequest_obj = new Ep_Ftv_FtvRequests();
        $ftvcomments_obj = new Ep_Ftv_FtvComments();
        //$this->render("ftv_addcomment"); exit;
        $request_id = $comment_params['request_id'];
        $this->_view->request_id = $request_id;
        $commentDetails=$ftvcomments_obj->getCommentsByRequests($request_id);
        $this->_view->ftvtype = "chaine";
        $this->_view->commentDetails = $commentDetails;
        $this->render("ftv_addcomment");

    }
    public function showrequestobjectAction()
    {
        $index_params=$this->_request->getParams();
        $ftvrequest_obj = new Ep_Ftv_FtvRequests();
        $request_id = $index_params['request_id'];
        $commentDetails=$ftvrequest_obj->getRequestById($request_id);
        $this->_view->showrequestobject = "yes";
        $this->_view->showbutton = "no";
        $this->_view->objectRequest = $commentDetails[0]['request_object'];
        $this->render("ftv_addcomment");

    }
    public function showrecentcommentAction()
    {
        $index_params=$this->_request->getParams();
        $ftvrequest_obj = new Ep_Ftv_FtvRequests();
        $ftvcomments_obj = new Ep_Ftv_FtvComments();
        $request_id = $index_params['request_id'];
        $commentDetails=$ftvcomments_obj->getRecentCommentsByBoUser($request_id);
        $this->_view->showrecentcomment = "yes";
        $this->_view->showbutton = "no";
        $this->_view->recentcomments = $commentDetails[0]['comments'];
        $this->_view->recentcomment = "chaine";
        $this->render("ftv_addcomment");

    }
    //save Comments Action
    public function savecommentsAction()
    {
        $comment_params=$this->_request->getParams();
        $ftvcontacts_obj = new Ep_Ftv_FtvContacts();
        $ftvrequest_obj = new Ep_Ftv_FtvRequests();
        $ftvcomments_obj = new Ep_Ftv_FtvComments();
        $automail = new Ep_Ticket_AutoEmails();
        if($_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest')
        {
            $request_id=$comment_params['request_id'];
            $comments=$this->utf8dec($comment_params['comments']);
            if($request_id != '' && $comments != '')
            {
                $ftvcomments_obj->request_id=$request_id;
                $ftvcomments_obj->comment_by=$this->ftvcontacts->ftvId;
                $ftvcomments_obj->comments=$comments;
                $ftvcomments_obj->user_type="FO";
                  $ftvcomments_obj->insert();
                ////////display comments
                /*$commentDetails=$ftvcomments_obj->getCommentsByRequests($request_id);
                $commentsData='';
                $cmtCount=count($commentDetails);
                if($commentDetails != 'NO')
                {
                    //$commentDetails=$this->formatCommentDetails($commentDetails);
                    $commentsData='';
                    $cnt=0;
                    foreach($commentDetails as $comment)
                    {
                       echo  $commentsData.=
                            '<li class="media" id="comment_'.$comment['identifier'].'">';
                        $commentsData.='<div class="media-body">
                            <h4 class="media-heading">
                              <a href="#" role="button" data-toggle="modal" data-target="#viewProfile-ajax">'.utf8_encode($comment['first_name']).'</a></h4>
                              '.utf8_encode(stripslashes($comment['comments'])).'
                            <p class="muted">'.$comment['created_at'].'</p>
                          </div>
                        </li>';
                    }
                }*/

            }
            ////send mails to all other contacts and actual contact as its commented by BO user//
            $requestdetails =  $ftvrequest_obj->requestDetailsById($request_id);
            $parameters['ftvobject'] = $requestdetails[0]['request_object'];
            $parameters['ftvcomments'] = utf8_encode($comments);
            $othercontacts = explode(",",$requestdetails[0]['other_contacts']);
            foreach($othercontacts as $values)
            {
                $contactdetails = $ftvcontacts_obj->getFtvContactDetails($this->ftvcontacts->ftvId);
                $parameters['ftvcontactcommented'] = $contactdetails[0]['first_name']." ".$contactdetails[0]['last_name'];
                $automail->sendFtvChaineContactsPersonalEmail($values,116,$parameters); // to client contact

            }
            //// sending the mail to johny and other bo user to whom request was assigned//
            $assignbouser = $requestdetails[0]['assigned_to'];
            $contactdetails = $ftvcontacts_obj->getFtvContactDetails($this->ftvcontacts->ftvId);
            $parameters['ftvcontactcommented'] = $contactdetails[0]['first_name']." ".$contactdetails[0]['last_name'];
            $parameters['ftvType'] = "chaine";
            $automail->messageToEPMail('110823103540627',117,$parameters); // to johny the head BO user
            if($assignbouser != '')
                $automail->messageToEPMail($assignbouser,117,$parameters); // to assigned user
        }
    }
    /**UTF8 DECODE function work for msword character also**/
    public function utf8dec($s_String)
    {
        $s_String=str_replace("e&#769;","&eacute;",$s_String);
        $s_String=str_replace("E&#769;","&Eacute;",$s_String);
        $s_String = html_entity_decode(htmlentities($s_String." ", ENT_COMPAT, 'UTF-8'));
        return substr($s_String, 0, strlen($s_String)-1);
    }
	public function downloadarticleAction()
	{
		$ArtP_obj=new EP_Article_ArticleProcess();
		$article=$ArtP_obj->getLatestVersionDetails($_GET['participateid']);
		$dwlfile= '/home/sites/site5/web/FO/articles/'.$article[0]['article_path']; 
		$ext=$this->findexts($article[0]['article_path']);
		header('Content-type: application/force-download; charset=utf-8'); 
		header('Content-disposition: attachment;filename='.$article[0]['article_name']);
		readfile($dwlfile);
	}
	
	public function downloadbriefAction()
	{
		$Delivery_obj=new Ep_Ao_Delivery();
		$delivery=$Delivery_obj->getDeliverybyid($_GET['delivery']);
		$dwlfile= '/home/sites/site5/web/FO/client_spec/'.$delivery[0]['filepath']; 
		$ext=$this->findexts($delivery[0]['file_name']);
		header('Content-type: application/force-download; charset=utf-8'); 
		header('Content-disposition: attachment;filename='.$delivery[0]['file_name']);
		readfile($dwlfile);
	}
	
	public function submitaocommentAction()
	{
		$this->Super_Client = Zend_Registry::get('EP_superclient');
		$comt_obj=new Ep_Ao_AdComments();	
		
		$commentarray=array();
		$commentarray['user_id']=$this->Super_Client->superclientidentifier;
		$commentarray['type']="article";
		$commentarray['type_identifier']=$_REQUEST['article'];
		$commentarray['comments']=utf8_decode($_REQUEST['commentclient']);
		$comt_obj->InsertComment($commentarray);
		
		//mail
		$to=$_REQUEST['pmemail'];
			$mail_text=utf8_decode($_REQUEST['commentclient']);
			$mail = new Zend_Mail();
			$mail->addHeader('Reply-To','support@edit-place.com');
			$mail->setBodyHtml($mail_text)
				 ->setFrom('support@edit-place.com','Support Edit-place')
				 //->addTo('kavithashree.r@gmail.com')
				 ->addTo($to)
				 ->setSubject('Comment from Client');
			$mail->send();
			
		echo "yes";
	}


	/* **************************************************** LOGIN *******************************************************/
	public function uservalidationajaxAction()
	{
		$this->ftvcontact = Zend_Registry::get('EP_ftvchcontacts');
        $this->ftvcontact->setExpirationSeconds(28800);
        ini_set('session.gc_maxlifetime', '28800');
        $expire=time()+60*60*24*30;
		$emailcheck_params_login=$this->_request->getParams();//print_r($emailcheck_params_login);exit;
        setcookie("ftvchaine", "ftvchaine", $expire);
        setcookie("chaineuser", $emailcheck_params_login['login_name'], $expire);
        setcookie("chainepass", base64_encode($emailcheck_params_login['login_password']), $expire);
		$obj = new Ep_Ftv_FtvContacts();
        $details = $obj->getContactDetails($emailcheck_params_login['login_name']);
		$res= $obj->checkFtvLogin($emailcheck_params_login['login_name'],$emailcheck_params_login['login_password'], $via='direct', $details[0]['ftvtype'], 'chaine');
		//update last visit

		if($res!="NO")
		{
            //print_r($res);
			$this->ftvcontact->ftvId =$res[0]['identifier'];
            $this->ftvcontact->ftvmailId =$res[0]['email_id'];
            //print_r($this->ftvcontact);     exit;
		}
		echo $res;
		exit;		
	}
	
	public function logoutAction()
	{
        $this->ftvcontact = Zend_Registry::get('EP_ftvchcontacts');
        setcookie("ftvchaine", "ftvedito", time()-360);
        setcookie("chaineuser", "", time()-360);
        setcookie("chainepass", "", time()-360);
        //echo $timeLeftTillSessionExpires = $_SESSION['__ZF']['EP_ftvchcontacts']['ENT'] - time();
        //var_dump($this->ftvcontact);exit;
		Zend_Session::destroy('EP_ftvchcontacts');
		$this->_redirect("/ftvchaine/index");
	}
    /*added by naseer on 21-08-2015*/

    public function loadftvchrequestsAction()
    {
        // $broadcast_array=$this->_arrayDb->loadArrayv2("EP_BROADCASTS", $this->_lang);
        $ftvcontacts_obj = new Ep_Ftv_FtvContacts();
        $ftvrequest_obj = new Ep_Ftv_FtvRequests();
        $ftvcomments_obj = new Ep_Ftv_FtvComments();
        $ftvdocuments_obj = new Ep_Ftv_FtvDocuments();
        //$ftvpausetime_obj = new Ep_Ftv_FtvPauseTime();
        $loginuser = $this->adminLogin->userId;
        $contacts = $ftvcontacts_obj->getRequestCreatedContacts(); // print_r($contacts); exit;
        $this->_view->contacts_array = $contacts;
        $aColumns = array('first_name', 'created_at', 'request_object', 'download', 'duration', 'modify_contains',
            'modify_broadcast', 'demand', 'status', 'comments', 'add_comments','actions','identifier');
        /* * Paging	 */
        $sLimit = "";
        $broadcast_sort_flag = true;
        $broadcast_sort = "";
        if (isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1') {
            $sLimit = "LIMIT " . intval($_GET['iDisplayStart']) . ", " .
                intval($_GET['iDisplayLength']);
        }
        /* 	 * Ordering   	 */
        $col_array = array('request_object', 'download', 'duration', 'modify_contains', 'modify_broadcast', 'demand', 'status', 'comments', 'add_comments');
        $sOrder = "";
        // echo  $_GET['iSortCol_0']. "----".intval( $_GET['iSortingCols'] );
        if (isset($_GET['iSortCol_0'])) {
            $sOrder = "ORDER BY  ";
            for ($i = 0; $i < intval($_GET['iSortingCols']); $i++) {
                if ($_GET['bSortable_' . intval($_GET['iSortCol_' . $i])] == "true") {
                    //if (in_array($aColumns[intval($_GET['iSortCol_' . $i])], $col_array))
                    //    break;
                    $sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]." ".($_GET['sSortDir_' . $i] === 'asc' ? 'asc' : 'desc') . ", ";
                    if($aColumns[ intval( $_GET['iSortCol_'.$i] ) ] === 'modify_broadcast'){
                        $to_sort = 'modify_broadcast';
                        $broadcast_sort_flag = true;
                        $broadcast_sort = ($_GET['sSortDir_'.$i]==='asc' ? 'asc' : 'desc');
                    }
                    else if($aColumns[ intval( $_GET['iSortCol_'.$i] ) ] === 'duration'){
                        $to_sort = 'duration';
                        $broadcast_sort_flag = true;
                        $broadcast_sort = ($_GET['sSortDir_'.$i]==='asc' ? 'asc' : 'desc');
                    }
                    else if($aColumns[ intval( $_GET['iSortCol_'.$i] ) ] === 'modify_contains'){
                        $to_sort = 'modify_contains';
                        $broadcast_sort_flag = true;
                        $broadcast_sort = ($_GET['sSortDir_'.$i]==='asc' ? 'asc' : 'desc');
                    }
                }
            }
            $sOrder = substr_replace($sOrder, "", -2);
            if ($sOrder == "ORDER BY") {
                $sOrder = "";
            }
        }
        $sWhere = "";
        if (isset($_GET['sSearch']) && $_GET['sSearch'] != "") {
            $sWhere = " HAVING (";
            for ( $i=0 ; $i<3; $i++ )//only first 3 fields will return proper values rest will return xml saved values
            {
                $keyword=addslashes($_GET['sSearch']);
                $keyword = preg_replace('/\s*$/','',$keyword);
                $keyword=preg_replace('/\(|\)/','',$keyword);
                $words=explode(" ",$keyword);
                $sWhere.=$aColumns[$i]." like '%".utf8_decode($keyword)."%' OR ";
            }
            $sWhere = substr_replace( $sWhere, "", -3 );
            $sWhere .= ')';
        }
        /* Individual column filtering */
        for ($i = 0; $i < count($aColumns); $i++) {
            if (isset($_GET['bSearchable_' . $i]) && $_GET['bSearchable_' . $i] == "true" && $_GET['sSearch_' . $i] != '') {
                if ($sWhere == "") {
                    $sWhere = " WHERE  ";
                } else {
                    $sWhere .= " AND  ";
                }
                $sWhere .= "`" . $aColumns[$i] . "` LIKE '%" . $_GET['sSearch_' . $i] . "%' ";
            }
        }
            $ftv_params = $this->_request->getParams();
            if ($ftv_params['search'] == 'search') { //echo "mash"; exit;
                $condition['search'] = $ftv_params['search'];
                $condition['contactId'] = $ftv_params['contactId'];
                $condition['containsId'] = $ftv_params['containsId'];
                $condition['broadcastId'] = $ftv_params['broadcastId'];
                $condition['quandId'] = $ftv_params['quandId'];
                $condition['startdate'] = $ftv_params['startdate'];
                $condition['enddate'] = $ftv_params['enddate'];
                $condition['dayrange'] = $ftv_params['dayrange'];
            }

            $requestsdetail = $ftvrequest_obj->getAllChaineRequestsDetails($sWhere, $sOrder, $sLimit, $condition);
            //contains to modify

            $contains_array = array(1 => "Unes tournantes", 2 => "Voir et Revoir", 3 => "Les &eacute;missions", 4 => "A d&eacute;couvrir", 5 => "Les jeux",
                6 => "Une", 7 => "Top 3", 8 => "Forums", 9 => "PAGE VIDEOS", 10 => "PAGES DOCUMENTAIRES", 11 => "PAGES FRANCE 5 & VOUS", 12 => "PAGES INFOS");
            $duraiton_array = array("h" => "Dans l'heure", "d" => "Dans la journ&eacute;e", "nd" => "Le lendemain", "w" => "Dans la semaine", "nw" => "La semaine prochaine");
            $this->_view->contains_array = $contains_array;
            $this->_view->quands_array = $duraiton_array;
            $broadcast_array = array("1" => 'France 2', "2" => 'France 3', "3" => 'France 4', "4" => 'France 5', "5" => 'France &Ocirc;', "6" => 'France TV');
            $demand_array = array("1" => 'Int&eacute;gration', "2" => 'Modification demand&eacute;e par FTV', "3" => 'Correction erreur EP', "4" => 'Retours');
            $this->_view->broadcast_array = $broadcast_array;
            $this->_view->demand_array = $demand_array;
            // print_r($requestsdetail); exit;
            if ($requestsdetail != 'NO') {
                $gtdays = '';
                $gthours = '';
                $gtminutes = '';
                $gtdiff = '';
                foreach ($requestsdetail as $key => $value) {
                    //$inpause  = $ftvpausetime_obj->inPause($requestsdetail[$key]['identifier']);
                    //$requestsdetail[$key]['inpause'] = $inpause;
                    $durationvalue = $duraiton_array[$requestsdetail[$key]['duration']];
                    $requestsdetail[$key]['duration'] = $durationvalue;
                    $requestsdetail[$key]['demand'] = $demand_array[$requestsdetail[$key]['demand']];
                    /////getting modify contains display format///
                    $contains = explode(",", $requestsdetail[$key]['modify_contains']);
                    $finalcontains = array();
                    foreach ($contains as $code1 => $abb1) {
                        $finalcontains[$code1] = $contains_array[$abb1];
                    }
                    $containvalue = implode(" / ", $finalcontains);
                    $requestsdetail[$key]['modify_contains'] = $containvalue;
                    ////getting modify broadcast display format//
                    $braodcast = explode(",", $requestsdetail[$key]['modify_broadcast']);
                    $finalbroadcast = array();
                    foreach ($braodcast as $broadkey => $broadval) {
                        $finalbroadcast[$broadkey] = $broadcast_array[$broadval];
                    }
                    $broadvalue = implode(" / ", $finalbroadcast);
                    $requestsdetail[$key]['modify_broadcast'] = $broadvalue;

                    ////gettting recent comments ny BO user ////
                    $commentDetails = $ftvcomments_obj->getRecentCommentsByBoUser($requestsdetail[$key]['identifier']);
                    if ($commentDetails != 'NO')
                        $requestsdetail[$key]['comments'] = $commentDetails[0]['comments'];
                    else
                        $requestsdetail[$key]['comments'] = "NILL";
                    ////gettting recent document BO user ////
                    $documentDetails = $ftvdocuments_obj->getRecentDocument($requestsdetail[$key]['identifier']);
                    if ($documentDetails != 'NO')
                        $requestsdetail[$key]['recent_document'] = $documentDetails[0]['document'];
                    else
                        $requestsdetail[$key]['recent_document'] = "NILL";
                    //////color differentiation//////
                    $requestsdetail[$key]['created_at'];
                    $t = date('d-m-Y H:i', strtotime($requestsdetail[$key]['created_at']));
                    $dayandtime = explode("-", date("N-G-i", strtotime($t)));//echo $requestsdetail[$key]['request_object'];print_r($dayandtime);
                    $day = $dayandtime[0];
                    $hour = $dayandtime[1];
                    $minute = $dayandtime[2];
                    $reddays = array(1, 2, 3, 4);  ///monday to thursday
                    $bluedays = array(5, 6, 7); //friday to sunday

                    if ($hour >= 19 || $hour < 9) {
                        if (in_array($day, $reddays))
                            $requestsdetail[$key]['dayrange'] = "red";
                        else
                            $requestsdetail[$key]['dayrange'] = "green";
                    }
                    /*$ptimes  = $ftvpausetime_obj->getPauseDuration($requestsdetail[$key]['identifier']);
                    $assigntime = $requestsdetail[$key]['assigned_at'];

                    if(($requestsdetail[$key]['status'] == 'done' || $inpause == 'yes') && ($requestsdetail[$key]['assigned_at'] != null && $requestsdetail[$key]['assigned_to'] != null))
                    {
                        if($requestsdetail[$key]['assigned_at'] != NULL)
                        {
                            if($requestsdetail[$key]['status'] == "closed")
                                $time1 = ($requestsdetail[$key]['cancelled_at']); /// created time
                            elseif ($requestsdetail[$key]['status'] == "done")
                                $time1 = ($requestsdetail[$key]['closed_at']); /// created time
                            else{
                                if($inpause == 'yes') {
                                    $time1 = ($requestsdetail[$key]['pause_at']);
                                }else {
                                    $time1 = (date('Y-m-d H:i:s'));///curent time
                                }
                            }

                            // $totaltime2 = strtotime($requestsdetail[$key]['assigned_at']);
                            $pausedrequests  = $ftvpausetime_obj->pausedRequest($requestsdetail[$key]['identifier']);
                            if($pausedrequests == 'yes')
                            {
                                $time2 = $this->subDiffFromDate($requestsdetail[$key]['identifier'], $requestsdetail[$key]['assigned_at']);
                            }else{
                                $time2 = $requestsdetail[$key]['assigned_at'];
                            }
                            $totaldiff = strtotime($time1) - strtotime($time2);

                            $timestamp = new DateTime($time1);
                            $diff = $timestamp->diff(new DateTime($time2));
                            $days = $diff->format('%d');
                            $hours = $diff->format('%h');
                            $minutes = $diff->format('%i');
                            $seconds = $diff->format('%s');
                            $gtdiff+=$totaldiff;
                            $difference = '';

                            if($days != '')
                                $difference.= "<span class='label label-info' >".$days."J </span> ";
                            if($hours != '')
                                $difference.= "<span class='label label-info' >".$hours."H </span> ";
                            if($minutes != '')
                                $difference.= "<span class='label label-info' >".$minutes."M </span> ";
                            if($seconds != '')
                                $difference.= "<span class='label label-info' >".$seconds."S </span> ";

                            $requestsdetail[$key]['time_spent'] = $difference;
                        }
                        else
                            $requestsdetail[$key]['time_spent'] = "-NA-";
                    }
                    else
                        $requestsdetail[$key]['time_spent'] = "-NA-";
                    $pausedrequests  = $ftvpausetime_obj->pausedRequest($requestsdetail[$key]['identifier']);
                    if($pausedrequests == 'yes')
                    {
                        $requestsdetail[$key]['assigned_at'] = $this->subDiffFromDate($requestsdetail[$key]['identifier'], $requestsdetail[$key]['assigned_at']);

                    }else{
                        $requestsdetail[$key]['assigned_at'] = $requestsdetail[$key]['assigned_at'];
                    }
                    ////subtracting 30 sec because adding 30 secs added by javascipt ///
                    $minus30sec=new DateTime($requestsdetail[$key]['assigned_at']);
                    $minus30sec->add(new DateInterval("PT35S"));
                    $requestsdetail[$key]['assigned_at'] = $minus30sec->format('Y-m-d H:i:s'); */
                }
                // print_r($ptimes);
                /*$d = floor($gtdiff/86400);
                $gtdays = ($d < 10 ? '0' : '').$d;

                $h = floor(($gtdiff-$d*86400)/3600);
                $gthours = ($h < 10 ? '0' : '').$h;

                $m = floor(($gtdiff-($d*86400+$h*3600))/60);
                $gtminutes = ($m < 10 ? '0' : '').$m;

                $gtdifference = '';
                if($gtdays != '')
                    $gtdifference.= "".$gtdays."J ";
                if($gthours != '')
                    $gtdifference.= "".$gthours."H  ";
                if($gtminutes != '')
                    $gtdifference.= "".$gtminutes."M ";
                $this->_view->globaltime = $gtdifference; */
            }
            $rResultcount = count($requestsdetail);
            /////total count
            $sLimit = "";
            $countaos = $ftvrequest_obj->getAllChaineRequestsDetails($sWhere, $sOrder, $sLimit, $condition);
            // print_r($countaos);exit;
            $iTotal = count($countaos);

            $output = array(
                "sEcho" => intval($_GET['sEcho']),
                "iTotalRecords" => $iTotal,
                "iTotalDisplayRecords" => $iTotal,
                "aaData" => array()
            );
            $assguser_arr = array(141027195819796 => 'Fanny', 141027200051263 => 'Djawed', 130122131303109 => 'Jgimenez', 111017113015710 => 'editor1', 140655136475464 => 'prashanth', 110823103540627 => 'Farid');
            $statrow_arr = array('pending' => 'En attente', 'done' => 'Trait&eacute;e', 'closed' => 'Annul&eacute;e');

            $count = 1;
            if($broadcast_sort_flag && $broadcast_sort === 'asc')//only if falg is set to true call this sorting function (only for broadcast array)
                usort($requestsdetail, $this->build_sorter_asc($to_sort));
            else if($broadcast_sort_flag && $broadcast_sort === 'desc')
                usort($requestsdetail, $this->build_sorter_desc($to_sort));
            if ($requestsdetail != 'NO') {
                for ($i = 0; $i < $rResultcount; $i++) {
                    $row = array();
                    for ($j = 0; $j < count($aColumns); $j++) {
                        //if ($j == 0)
                        //    $row[] = $count;
                        //else
                        {
                            if ($aColumns[$j] == 'first_name')
                                $row[] = $requestsdetail[$i]['first_name'];
                            elseif ($aColumns[$j] == 'created_at')
                                $row[] = date("Y-m-d", strtotime($requestsdetail[$i]['created_at']));
                            elseif ($aColumns[$j] == 'request_object')
                                $row[] = '<a data-target="#chaineeditrequest" data-refresh="true"  data-toggle="modal" href="/ftvchaine/duplicaterequest?request_id=' . $requestsdetail[$i]["identifier"] . '&edit=yes" class="hint--bottom hint--info" data-placement="right" data-original-title="Object" data-html="true"
                                        data-hint="' . utf8_encode($requestsdetail[$i]['request_object']) . '">' . utf8_encode($requestsdetail[$i]['request_object']) . '</a>';
                            elseif ($aColumns[$j] == 'download'){
                                $download  = '<a class="hint--bottom hint--info"  data-target="#fileupload" rel="tooltip" data-original-title="Ajouter un fichier" data-refresh="true"  data-toggle="modal" data-hint="upload file"  role="button"  href="/ftvchaine/uploadfiles?request_id=' . $requestsdetail[$i]["identifier"] . '&ftvtype=ftvchaine&view=yes">
                                            <img src="/FO/images/imageB3/upload_icon.jpg" height="20" width="20"/></a>';
                                $checkRecentDocument = $ftvdocuments_obj->checkRecentDocument($requestsdetail[$i]["identifier"]);
                                $serverpath = '/home/sites/site5/web/FO/ftv_documents/';
                                if($requestsdetail[$i]["recent_document"] != '' && file_exists($serverpath.$checkRecentDocument[0]['document']))
                                    $download  .='<a class="hint--bottom hint--info"  data-hint="download latest file" rel="tooltip" data-original-title="T&eacute;l&eacute;charger le dernier fichier"  role="button"  href="/ftvchaine/downloadftv?request_id=' . $requestsdetail[$i]["identifier"] . '&filename=' . $requestsdetail[$i]["recent_document"] . '">
                                           <img src="/FO/images/imageB3/download_icon.jpg" height="20" width="20"/></a>';
                                $row[] = $download;
                            }
                                elseif ($aColumns[$j] == 'duration')
                                $row[] = $requestsdetail[$i]['duration'];
                            elseif ($aColumns[$j] == 'modify_contains')
                                $row[] = $requestsdetail[$i]['modify_contains'];
                            elseif ($aColumns[$j] == 'modify_broadcast')
                                $row[] = $requestsdetail[$i]['modify_broadcast'];
                            elseif ($aColumns[$j] == 'demand')
                                $row[] = $requestsdetail[$i]['demand'];
                            /*elseif($aColumns[$j] == 'assingnation') {
                                foreach ($assguser_arr as $ky => $vl) {
                                    if ($requestsdetail[$i]["assigned_to"] == $ky)
                                        $assrow = $vl;
                                }
                                $row[] = $assrow;
                            }*/
                            elseif ($aColumns[$j] == 'status') {
                                foreach ($statrow_arr as $sky => $svl) {
                                    if ($requestsdetail[$i]["status"] == $sky)
                                        $statrow = $svl;

                                }
                                $row[] = $statrow;
                            } elseif ($aColumns[$j] == 'comments') {
                                if ($requestsdetail[$i]["comments"] == 'NILL')
                                    $row[] = '-NA-';
                                else
                                    $row[] = ' <a  data-placement="right" rel="tooltip" data-original-title="Cliquez ici pour voir la suite du message" data-target="#showrecentcomment" data-refresh="true"  data-toggle="modal"  role="button"  href="/ftvedito/showrecentcomment?request_id=' . $requestsdetail[$i]['identifier'] . '">
                                                ' . $requestsdetail[$i]["comments"] . '</a>';

                            }
                            elseif ($aColumns[$j] == 'add_comments') {
                                $row[] = '<a  data-placement="right" rel="tooltip" data-original-title="R&eacute;diger un commentaire" data-target="#addcomment" data-refresh="true"  data-toggle="modal"  role="button"  href="/ftvchaine/showcomments?request_id=' . $requestsdetail[$i]['identifier'] . '">
                                              <img class="img-responsive"  src="/FO/images/imageB3/pen.jpg" height="20" width="20" /></a>';
                            }
                            elseif ($aColumns[$j] == 'actions') {
                                $action = '<a  data-target="#newrequest" data-refresh="true"  data-toggle="modal" rel="tooltip" data-original-title="Dupliquer la demande" role="button"   href="/ftvchaine/duplicaterequest?request_id=' . $requestsdetail[$i]['identifier'] . '&edit=no"><img src="/FO/images/imageB3/duplicate_icon.jpg" height="20" width="20" /></a>';
                                if ($requestsdetail[$i]['assigned_to'] == '')
                                    $action .= '<a  data-target="#newrequest" data-refresh="true"  data-toggle="modal" rel="tooltip" data-original-title="Modifier la demande" role="button"   href="/ftvchaine/duplicaterequest?request_id=' . $requestsdetail[$i]['identifier'] . '&edit=yes"><img src="/FO/images/imageB3/edit_icon.png" height="20" width="20" /></a>';
                                $row[] = $action;
                            }
                            /*elseif($aColumns[$j] == 'time_spent')
                            {
                                $rowdetail = '<input type="hidden" id="time' . $requestsdetail[$i]['identifier'] . '" value="' . $requestsdetail[$i]['assigned_to'] . '"/>';
                                if ($requestsdetail[$i]['assigned_to'] != '' && $requestsdetail[$i]['status'] != 'closed') {
                                    if ($requestsdetail[$i]['status'] == 'pending' && $requestsdetail[$i]['inpause'] == 'no') {
                                        $rowdetail.= '<div class="timer" id="time_'.$requestsdetail[$i]["identifier"].'_'.$requestsdetail[$i]["assigned_at"].'" onClick="extendTime('.$requestsdetail[$i]["identifier"].')">
                                          <span class="label label-info" id="days_'.$requestsdetail[$i]['identifier'].'"></span>
                                          <span class="label label-info" id="hours_'.$requestsdetail[$i]['identifier'].'"></span>
                                          <span class="label label-info" id="minutes_'.$requestsdetail[$i]['identifier'].'"></span>
                                          <span class="label label-info" id="seconds_'.$requestsdetail[$i]['identifier'].'"></span>
                                        </div>
                                        <button class="btn btn-warning" type="button" id="pausetime' . $requestsdetail[$i]['identifier'] . '" name="pausetime"  onClick="pauseTime(\'pause\',' . $requestsdetail[$i]['identifier'] . ');" >Pause</button>';
                                    } elseif ($requestsdetail[$i]['status'] == 'pending' && $requestsdetail[$i]['inpause'] == 'yes') {
                                        $rowdetail.= '"' . $requestsdetail[$i]['time_spent'] . '
                                        <button class="btn btn-warning"  type="button" id="resumetime' . $requestsdetail[$i]['identifier'] . '" name="resumetime" onClick="pauseTime(\'resume\',' . $requestsdetail[$i]['identifier'] . ');" >Resume</button>';
                                    } else
                                        $rowdetail.= '"' . $requestsdetail[$i]['time_spent'] . '"';
                                    if ($requestsdetail[$i]['status'] != 'closed') {
                                        $rowdetail.= '<a class="hint--bottom hint--waring"  data-hint="edit time" data-toggle="modal" data-target="#editassigntime" href="/ftvchaine/editassigntime?requestId=' . $requestsdetail[$i]['identifier'] . '"><i class="icon-time"></i> </a>';
                                    }
                                } else
                                    $rowdetail .= '-NA-';
                                $row[] = $rowdetail;
                            } */
                            else
                                $row[] = $requestsdetail[$i][$aColumns[$j]];

                        }
                    }
                    $output['aaData'][] = $row;
                    $count++;
                }
            }
            //echo "<pre>";print_r($output);exit;
            echo json_encode($output);
    }
    function build_sorter_asc($key) {
        return function ($a, $b) use ($key) {
            return strnatcmp($a[$key], $b[$key]);
        };
    }
    function build_sorter_desc($key) {
        return function ($a, $b) use ($key) {
            return strnatcmp( $b[$key],$a[$key]);
        };
    }
}