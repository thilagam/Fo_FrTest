<?php

class SuiviDeCommandeController extends Ep_Controller_Action
{
	public function init() 
	{
        parent::init();
		$this->Super_Client = Zend_Registry::get('EP_superclient');
		$this->_view->superclient_email=$this->Super_Client->superclient_email;
		$this->_view->superclientidentifier=$this->Super_Client->superclientidentifier;
		$this->_view->usertype=$this->Super_Client->usertype;
    }
	
	public function indexAction()
	{ 
		$this->Super_Client = Zend_Registry::get('EP_superclient');
		
		if($this->Super_Client->superclientidentifier!="")
		{
			$article_obj=new Ep_Ao_Article();
			$client_obj=new Ep_User_Client();
			$participation_obj=new Ep_Ao_Participation();
			
			$client=$this->Super_Client->superclientidentifier;
			
			//Mail ep incharge
			if($_POST['submitmail'])
			{
				$mail_text=utf8_decode($_REQUEST['scobject']);
				if($_FILES['mailfile']['name'])
				{
					$realfilename=$_FILES['mailfile']['name'];
					$ext=$this->findexts($realfilename);
					$uploaddir = '/home/sites/site5/web/FO/sc_mail/';
					//$uploaddir=$uploaddir."/";
					$bname=basename($realfilename,".".$ext)."_".uniqid().".".$ext;
					$file = $uploaddir . $bname;
					move_uploaded_file($_FILES['mailfile']['tmp_name'], $file);
					
					$this->mail_attachment($bname, $uploaddir, $_REQUEST['email'], 'support@edit-place.com', $_REQUEST['subject'], $mail_text);
				}
				else
				{
					
					$mail = new Zend_Mail();
					$mail->addHeader('Reply-To','support@edit-place.com');
					$mail->setBodyHtml($mail_text)
						 ->setFrom('support@edit-place.com','Support Edit-place')
						 //->addTo('kavithashree.r@gmail.com')
						 ->addTo($_REQUEST['email'])
						 ->setSubject($_REQUEST['subject']);
					$mail->send();
				}
				
				$this->_redirect("/suivi-de-commande/index");
			}
			
			//Mail ep incharge
			if($_POST['submitrefusemail'])
			{
				//Update Article
				$where_art=" id='".$_REQUEST['article_id']."'";
				$arr_art=array();
				$arr_art['client_validated']='refuse';
				$arr_art['validated_on']=date("Y-m-d H:i:s");
				$arr_art['validated_by']=$this->_view->superclientidentifier;
				$article_obj->updateArticle($arr_art,$where_art);
				
				$mail_text=utf8_decode($_REQUEST['scobject']);
				if($_FILES['mailfile']['name'])
				{
					$realfilename=$_FILES['mailfile']['name'];
					$ext=$this->findexts($realfilename);
					$uploaddir = '/home/sites/site5/web/FO/sc_mail/';
					//$uploaddir=$uploaddir."/";
					$bname=basename($realfilename,".".$ext)."_".uniqid().".".$ext;
					$file = $uploaddir . $bname;
					move_uploaded_file($_FILES['mailfile']['tmp_name'], $file);
					
					//$this->mail_attachment($bname, $uploaddir, $_REQUEST['email'], 'support@edit-place.com', $_REQUEST['subject'], $mail_text);
					$this->mail_attachment($bname, $uploaddir, $_REQUEST['email'], 'support@edit-place.com', $_REQUEST['refusesubject'], $mail_text);
				}
				else
				{
					
					$mail = new Zend_Mail();
					$mail->addHeader('Reply-To','support@edit-place.com');
					$mail->setBodyHtml($mail_text)
						 ->setFrom('support@edit-place.com','Support Edit-place')
						 //->addTo('kavithashree.r@gmail.com')
						 ->addTo($_REQUEST['email'])
						 ->setSubject($_REQUEST['refusesubject']);
					$mail->send();
				}
				
				//update Participation
				$where_part=" id='".$_REQUEST['participate_id']."'";
				$arr_part=array();
				$arr_part['status']='closed_client_temp';
				$arr_part['refusecomment']=$_REQUEST['scobject'];
				if($bname!="")	
					$arr_part['clientcommentfile']=$bname;
				$participation_obj->updateparticipation($arr_part,$where_part);
				
				//ArticleHistory Insertion
				$hist_obj = new Ep_Article_ArticleHistory();
				$action_obj = new Ep_Article_ArticleActions();
				$part_obj=new Ep_Ao_Participation();	
				$userp_obj=new Ep_User_UserPlus();	
				$history=array();
				$history['user_id']=$this->_view->superclientidentifier;
				$history['article_id']=$_REQUEST['article_id'];
				$history['stage']='chiefodigeo';
				$history['action']='client_refuse';
					$sentence=$action_obj->getActionSentence(61);
					$cname=$userp_obj->getUserPlus($this->_view->superclientidentifier);
					$client_name='<b>'.$cname[0]['first_name'].' '.$cname[0]['last_name'].'</b>';
						$contact=$userp_obj->getUserPlus($_REQUEST['writer_id']);
						$contact[0]['name']=ucfirst($contact[0]['first_name']).'&nbsp;'.ucfirst($contact[0]['last_name']);	
					$contributor_name='<a class="writer" href="/user/contributor-edit?submenuId=ML2-SL7&tab=viewcontrib&userId='.$_REQUEST['writer_id'].'" target=_blank""><b>'.$contact[0]['name'].'</b></a>';
					$actionmessage=strip_tags($sentence);
					eval("\$actionmessage= \"$actionmessage\";");
				$history['action_sentence']=$actionmessage;
				//print_r($history);
				$hist_obj->insertHistory($history);
				
				$this->_redirect("/suivi-de-commande/index");
			}
	
			$lang_array=$this->_arrayDb->loadArrayv2("EP_LANGUAGES", $this->_lang);
			$this->_view->lang_array=$lang_array;
			
			$this->_view->selectedsite=array();
			$this->_view->selectedlanguage=array();
			$this->_view->selectedstatus=array();
			$this->_view->selectedep_incharge=array();
			$this->_view->selectedodigeo_incharge=array();
			
			if($_POST['searchsc']!="")
			{
				//search params
				$filterparameters=array();
				if($_REQUEST['site']!="")$filterparameters['site']=$_REQUEST['site'];
				if($_REQUEST['status']!="")$filterparameters['status']=$_REQUEST['status'];
				if($_REQUEST['language']!="")$filterparameters['language']=$_REQUEST['language'];
				if($_REQUEST['ep_incharge']!="")$filterparameters['ep_incharge']=$_REQUEST['ep_incharge'];
				
				if(count($_REQUEST['site'])>0)
					$this->_view->selectedsite=$_REQUEST['site']; 
				if(count($_REQUEST['language'])>0)
					$this->_view->selectedlanguage=$_REQUEST['language'];
				if(count($_REQUEST['status'])>0)
					$this->_view->selectedstatus=$_REQUEST['status'];
				if(count($_REQUEST['ep_incharge'])>0)
					$this->_view->selectedep_incharge=$_REQUEST['ep_incharge'];
			}
		
				$scBouseretail=$client_obj->getBOUserPermissions($client);
				
				if($scBouseretail[0]['access_client_list']!="")
				{
					//Site
					$this->_view->sites=$client_obj->getSuperClientsites($scBouseretail[0]['access_client_list']);
					
					//Language
					$language=explode(",",$scBouseretail[0]['access_language_list']);
					$languagearray=array();
							for($l=0;$l<count($language);$l++)
								$languagearray[$language[$l]]=$lang_array[$language[$l]];
					$this->_view->language=$languagearray;	
				
					//Permissions
					$permission=array("participation_ongoing"=>"Participations en cours",  
										"pending_selection"=>"En attente de s&eacute;lection",
										"writing_progress"=>"R&eacute;daction en cours",
										"time_out"=>"Article non envoy&eacute;",
										"plag_exec"=>"V&eacute;rification du non plagiat",
										"disapproved"=>"Article en reprise",
										"correction_ongoing"=>"Correction en cours",
										"stage2"=>"En attente de validation (EP)",
										"published_client"=>"En attente de validation (Client)",
										"published"=>"Valid&eacute;",
										"refused_client"=>"Refus&eacute; (client)",
										"closed"=>"Ferm&eacute;");
					$status=explode(",",$scBouseretail[0]['access_permissions']); 
					$statusarray=array();
							for($s=0;$s<count($status);$s++)
								$statusarray[$status[$s]]=$permission[$status[$s]];
					$this->_view->status=$statusarray;	
				
					//EP incharge
					$this->_view->epincharge=$client_obj->getBoEPincharge($this->Super_Client->superclientidentifier);	
					
					$con = mysql_connect("localhost","epweb","293PA3Y4577KjVUM");
					if (!$con)
					  die('Could not connect: ' . mysql_error());
					mysql_select_db("dev_editplace1", $con);
					mysql_query("SET GLOBAL group_concat_max_len=150000");
					
					$articlelist=$article_obj->getBOUserArticles($client,$filterparameters);
					$articlelist=$this->array_unique_by_key($articlelist, "id"); 
					
					$client_obj=new Ep_User_Client();
					$namepermission=$client_obj->getBOUserRecentwinfo($this->Super_Client->superclientidentifier);
			
					//exit;
					for($a=0;$a<count($articlelist);$a++)
					{
						$articlelist[$a]['participationcount']=$participation_obj->getParticipationCount($articlelist[$a]['id']);
						$articlelist[$a]['attendcount']=$participation_obj->getAttendCount($articlelist[$a]['id']);
						if($articlelist[$a]['lot']=='yes' && $articlelist[$a]['sub_title']!="")
						{
							$arts=explode("|@|",$articlelist[$a]['sub_title']);
							$lotlist="";
							foreach($arts as $article)
								$lotlist.=$article.'<br>';
							
							$articlelist[$a]['lotlist']=$lotlist;
						}
						
						if($articlelist[$a]['writer']!="")
						{
							$writernames=explode("#",$articlelist[$a]['writer']);
							if($namepermission=='full_name')
								$articlelist[$a]['writer']=$writernames[0].'&nbsp;'.$writernames[1];
							elseif($namepermission=='anonymous')
								$articlelist[$a]['writer']="Anonyme";
						}
						
						if($articlelist[$a]['corrector']!="")  
						{
							$correctornames=explode("#",$articlelist[$a]['corrector']);
							if($namepermission=='full_name')
								$articlelist[$a]['corrector']=$correctornames[0].'&nbsp;'.$correctornames[1];
							elseif($namepermission=='anonymous')
								$articlelist[$a]['corrector']="Anonyme";
						}
						
					}
			
					$this->_view->articlelist=$articlelist;
				}
			$this->_view->now=strtotime('now');
			$this->_view->usertype=$this->Super_Client->usertype;
			$this->_view->scname=$this->Super_Client->superclientname;
			$this->render("suivi_index"); 
		}
		else
		{
			$this->render("suivi_login");
		}
	}
	
	function array_unique_by_key (&$array, $key) 
	{
		$tmp = array();
		$result = array();
			foreach ($array as $value) {
				if (!in_array($value[$key], $tmp)) {
					array_push($tmp, $value[$key]);
					array_push($result, $value);
				}
			}
		return $array = $result;
	}
	
	public function mail_attachment($files, $path, $mailto, $from_mail, $subject, $message) 
	{
        $uid = md5(uniqid(time()));
        $header = "From: ".$from_mail." <".$from_mail.">\r\n";
        $header .= "Reply-To: ".$from_mail."\r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-Type: multipart/mixed;\r\n\tboundary=\"$uid\"\r\n\r\n";
        $header .= "This is a multi-part message in MIME format.\r\n";
        $header .= "--".$uid."\r\n";
        $header .= "Content-type:text/html; charset=iso-8859-1\r\n";
        $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        $header .= $message."\r\n\r\n";
			
			
				$file = $path.$files;
				$name = basename($file);
				$file_size = filesize($file);
				$handle = fopen($file, "r");
				$content = fread($handle, $file_size);
				fclose($handle);
				$content = chunk_split(base64_encode($content));
				//$file_name =  explode("_",$files);
				$header .= "--".$uid."\r\n";
				$header .= "Content-Type: application/octet-stream; name=\"".$files."\"\r\n"; // use different content types here
				$header .= "Content-Transfer-Encoding: base64\r\n";
				$header .= "Content-Disposition: attachment; filename=\"".$files."\"\r\n\r\n";
				$header .= $content."\r\n\r\n";
			
        $header .= "--".$uid."--";
        return mail($mailto, $subject, "", $header);
    }
	
	public function historyAction()
	{
		$this->Super_Client = Zend_Registry::get('EP_superclient');
		
		$aoParms=$this->_request->getParams();
    	$article_id=$aoParms['article_id'];
    	$ao_id=$aoParms['id'];
    	$history_obj=new Ep_Article_ArticleHistory();
    	$articleObject=new EP_Ao_Article(); 
		$client_obj=new Ep_User_Client();		
    	
    	if($this->Super_Client->usertype=="chiefodigeo")
			$this->_view->namepermission=$client_obj->getBOUserRecentwinfo($this->Super_Client->superclientidentifier);
		else
		{
			$sclientdetail=$client_obj->getSuperClientDetails($this->Super_Client->superclientidentifier);
			$this->_view->namepermission=$sclientdetail[0]['user_visibility'];
		}
		
			$historyDetails=$history_obj->getAOHistorySuivi($aoParms);
			
			//Client permissions
			$scBouseretail=$client_obj->getBOUserPermissions($this->Super_Client->superclientidentifier);
			$status=explode(",",$scBouseretail[0]['access_permissions']);  
			
    		if($historyDetails)
    		{
    			$h=0;
    			foreach($historyDetails as $details)
    			{  
					//show or hide
					if($details['action']=='article_sent' && !in_array('plag_exec',$status))
						$historyDetails[$h]['show']='no';
					else
						$historyDetails[$h]['show']='yes';
					$historyDetails[$h]['action_at']=date("d/m/Y H:i",strtotime($details['action_at']));
						$replacearray=array("Private","private","Public","public");
					$historyDetails[$h]['action_sentence']=str_replace($replacearray,"",$historyDetails[$h]['action_sentence']);
					$historyDetails[$h]['action_sentence']=preg_replace('/avec.*un prix.* Euros/', '', $historyDetails[$h]['action_sentence']);
					
					if($this->_view->namepermission=="anonymous")
					{
						//replace de to du if anonymous
						$historyDetails[$h]['action_sentence']=str_replace("de <a","du <a",$historyDetails[$h]['action_sentence']);
						
						//replace car with car le
						$historyDetails[$h]['action_sentence']=str_replace("car <a","car le <a",$historyDetails[$h]['action_sentence']);
						$historyDetails[$h]['action_sentence']=str_replace("temps à","temps au",$historyDetails[$h]['action_sentence']);
						$historyDetails[$h]['action_sentence']=str_replace("par ","par le",$historyDetails[$h]['action_sentence']);
						$historyDetails[$h]['action_sentence']=str_replace("mission à","mission au",$historyDetails[$h]['action_sentence']); 
						$historyDetails[$h]['action_sentence']=str_replace("article à <a","article au <a",$historyDetails[$h]['action_sentence']);
						$historyDetails[$h]['action_sentence']=str_replace("refus prise <a","refus prise le <a",$historyDetails[$h]['action_sentence']);
					}
					$h++;
				}
    		}
    		//echo "<pre>";print_r($historyDetails);
    	
    	$this->_view->aoHistory=$historyDetails;
    	$this->_view->render("suivi_history");
	}
	
	public function aopublishedAction()
	{
		$lang_array=$this->_arrayDb->loadArrayv2("EP_LANGUAGES", $this->_lang);
		$categories_array=$this->_arrayDb->loadArrayv2("EP_ARTICLE_CATEGORY", $this->_lang);
		
		$client_obj=new Ep_User_Client();
		$sclientdetail=$client_obj->getSuperClientDetails($this->Super_Client->superclientidentifier);
		$this->_view->commentsreq=$sclientdetail[0]['comments_mandatory'];
		
		$articleObject=new EP_Ao_Article();   
		$publishedarticle=$articleObject->publishedArticleDetail($_REQUEST['article_id']);	
			if($publishedarticle[0]['writer']!="")
			{
				$writernames=explode("#",$publishedarticle[0]['writer']);
				if($sclientdetail[0]['user_visibility']=='full_name')
					$publishedarticle[0]['writer']=$writernames[0].'&nbsp;'.$writernames[1];
				elseif($sclientdetail[0]['user_visibility']=='first_name')
					$publishedarticle[0]['writer']=$writernames[0];
				elseif($sclientdetail[0]['user_visibility']=='anonymous')
					$publishedarticle[0]['writer']="-";
				else
					$publishedarticle[0]['writer']=$writernames[0];
			}
			
			if($publishedarticle[0]['corrector']!="")
			{
				$correctornames=explode("#",$publishedarticle[0]['corrector']);
				if($sclientdetail[0]['user_visibility']=='full_name')
					$publishedarticle[0]['corrector']=$correctornames[0].'&nbsp;'.$correctornames[1];
				elseif($sclientdetail[0]['user_visibility']=='first_name')
					$publishedarticle[0]['corrector']=$correctornames[0];
				elseif($sclientdetail[0]['user_visibility']=='anonymous')
					$publishedarticle[0]['corrector']="-";
				else
					$publishedarticle[0]['corrector']=$correctornames[0];
			}
		$this->_view->lang=$lang_array[$publishedarticle[0]['language']];
		$this->_view->category=$categories_array[$publishedarticle[0]['category']];
		$this->_view->publishedarticle=$publishedarticle;	
    	
		$ArtP_obj=new EP_Article_ArticleProcess();
		$this->_view->articleprocess=$ArtP_obj->getLatestVersionDetails($publishedarticle[0]['participateid']);
		
		$this->_view->render("suivi_aopublished");
	}
	
	public function aovalidateAction()
	{
		$lang_array=$this->_arrayDb->loadArrayv2("EP_LANGUAGES", $this->_lang);
		$categories_array=$this->_arrayDb->loadArrayv2("EP_ARTICLE_CATEGORY", $this->_lang);
		
		$user_obj=new Ep_User_User();
		$client_obj=new Ep_User_Client();
		$sclientdetail=$client_obj->getSuperClientDetails($this->Super_Client->superclientidentifier);
		$this->_view->commentsreq=$sclientdetail[0]['comments_mandatory'];
		
		$articleObject=new EP_Ao_Article();   
		$publishedarticle=$articleObject->publishedArticleDetail($_REQUEST['article_id']);
			if($publishedarticle[0]['writer']!="")
			{
				$writernames=explode("#",$publishedarticle[0]['writer']);
				if($sclientdetail[0]['user_visibility']=='full_name')
					$publishedarticle[0]['writer']=$writernames[0].'&nbsp;'.$writernames[1];
				elseif($sclientdetail[0]['user_visibility']=='first_name')
					$publishedarticle[0]['writer']=$writernames[0];
				elseif($sclientdetail[0]['user_visibility']=='anonymous')
					$publishedarticle[0]['writer']="-";
				else
					$publishedarticle[0]['writer']=$writernames[0];
			}
			
			if($publishedarticle[0]['corrector']!="")
			{
				$correctornames=explode("#",$publishedarticle[0]['corrector']);
				if($sclientdetail[0]['user_visibility']=='full_name')
					$publishedarticle[0]['corrector']=$correctornames[0].'&nbsp;'.$correctornames[1];
				elseif($sclientdetail[0]['user_visibility']=='first_name')
					$publishedarticle[0]['corrector']=$correctornames[0];
				elseif($sclientdetail[0]['user_visibility']=='anonymous')
					$publishedarticle[0]['corrector']="-";
				else
					$publishedarticle[0]['corrector']=$correctornames[0];
			}
		$this->_view->lang=$lang_array[$publishedarticle[0]['language']];
		$this->_view->category=$categories_array[$publishedarticle[0]['category']];
		if($publishedarticle[0]['email']=="")
		{
			$clientdetail=$user_obj->getClientdetails($publishedarticle[0]['user_id']);
			$publishedarticle[0]['email']=$clientdetail[0]['email'];
		}
		
		$this->_view->publishedarticle=$publishedarticle;	
    	
		$ArtP_obj=new EP_Article_ArticleProcess();
		$this->_view->articleprocess=$ArtP_obj->getLatestVersionDetails($publishedarticle[0]['participateid']);
		$this->_view->render("suivi_aovalidate");
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
		$commentarray['filepath']='/'.$commentarray['user_id'].'/'.$_REQUEST['commentfilename'];
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
			//$mail->send();
			
		echo "yes";
	}
	
	public function uploadsccommentAction()
	{
		$this->Super_Client = Zend_Registry::get('EP_superclient');
		$realfilename=$_FILES['commentfile']['name'];//echo $realfilename;exit;
		$ext=$this->findexts($realfilename);
		
		$uploaddir = '/home/sites/site5/web/FO/superclient_comment/';
		
		$client_id=$this->Super_Client->superclientidentifier;
		$newfilename=$client_id.".".$ext;
		if(!is_dir($uploaddir.$client_id))
		{
			mkdir($uploaddir.$client_id,0777);
			chmod($uploaddir.$client_id,0777);
		}
		$uploaddir=$uploaddir.$client_id."/";
		$realfilename=trim($realfilename);
		$realfilename=str_replace(" ","_",$realfilename);
		
		$bname=basename($realfilename,".".$ext)."_".uniqid().".".$ext;
		$file = $uploaddir . $bname;
		
		if (move_uploaded_file($_FILES['commentfile']['tmp_name'], $file))
		{
			chmod($file,0777);
			echo "success#".$bname;
		}
		else
		{
			echo "error";
		}
	} 
	
	public function publishaoclientAction()
	{
		if($_REQUEST['article_id']!="")
		{
			$art_obj=new Ep_Ao_Article();
			
			//Update Article
			$where_art=" id='".$_REQUEST['article_id']."'";
			$arr_art=array();
			$arr_art['client_validated']=$_REQUEST['action'];
			$arr_art['validated_on']=date("Y-m-d H:i:s");
			$arr_art['validated_by']=$this->_view->superclientidentifier;
	
			$art_obj->updateArticle($arr_art,$where_art);
			
			//Update Participation
			$part_obj=new Ep_Ao_Participation();
			$where_part=" id='".$_REQUEST['part_id']."'";
			$parr_art=array();
			$parr_art['status']='published';
			$part_obj->updateparticipation($parr_art,$where_part);
			
			echo 'yes';
		}
	}
	
	public function sendmailinchargeAction()
	{
		$art_obj=new Ep_Ao_Article();
		$articledetail=$art_obj->getArticleCreator($_REQUEST['articleid']);
		
		$this->_view->email=$_REQUEST['email'];
		$this->_view->subject='Demande - '.$articledetail[0]['title'];
		$this->_view->epincharge=$articledetail[0]['first_name'].' '.$articledetail[0]['last_name'];
		$this->_view->render("suivi_mailincharge");
	}
	
	public function sendrefusemailAction()
	{
		$this->_view->email=$_REQUEST['email'];
		$this->_view->subject=$_REQUEST['subject'];
		$this->_view->epincharge=$_REQUEST['epincharge'];
		$this->_view->render("suivi_refusemail");
	}
	
	public function findexts ($filename="")
	{
		$filename = strtolower($filename) ;
		$exts = split("[/\\.]", $filename) ;
		$n = count($exts)-1;
		$exts = $exts[$n];
		return $exts;
	}  
	
	/* **************************************************** LOGIN *******************************************************/
	public function uservalidationajaxAction()
	{
		$this->Super_Client = Zend_Registry::get('EP_superclient');
		$emailcheck_params_login=$this->_request->getParams();//print_r($emailcheck_params_login);exit;
		$obj = new Ep_User_User();	
		$res= $obj->checkSuperClientLogin($emailcheck_params_login['login_name'],$emailcheck_params_login['login_password']);
		
		//update last visit
		if($res!="NO")
		{
			$obj->updatevisit($res[0]['identifier']);
			$username=$emailcheck_params_login['login_name'];
			$this->Super_Client->superclient_email =$username;	
			$this->Super_Client->usertype =$res[0]['type'];	
			if($res[0]['type']=='chiefodigeo')
				$this->Super_Client->superclientidentifier=$res[0]['identifier'];
			else
			{
				$this->Super_Client->superclientidentifier=$res[0]['identifier'];
				$this->Super_Client->superclientname=$res[0]['company_name'];
			}
		}	
		
		echo $res;
		exit;		
	}
	
	public function logoutAction()
	{
		$this->EP_superclient = Zend_Registry::get('EP_superclient');
		Zend_Session::destroy('EP_superclient');
		$this->_redirect("/suivi-de-commande/index");
	}
}