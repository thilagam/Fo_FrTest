<?php

/*
 * TestVinController
 * Class Controller
 * Used for Testing By Vinayak
 * @auther Vinayak
 * @version 1.0
 *
 * */

class TestVinController extends Ep_Controller_Action
{
	public function init()
	{
		parent::init();
	    $this->_view->livesite = $this->_config->www->baseurl;
		$this->_view->livesite_ssl = $this->_config->www->baseurlssl;
		$this->_view->lang = $this->_lang;
        $this->attachment_path=APP_PATH_ROOT.$this->_config->path->attachments;
		//print_r($_SERVER);
        $this->EP_Contrib_reg = Zend_Registry::get('EP_Contrib_reg');
		if($this->EP_Contrib_reg->clientemail!='')
		$this->_view->client_email=strtolower($this->EP_Contrib_reg->clientemail);
         $contrib_identifier= $this->EP_Contrib_reg->clientidentifier;
         if($contrib_identifier!='')
         {
            $app_path=APP_PATH_ROOT;
            $profiledir=$this->_config->path->contrib_profile_pic_path.$contrib_identifier.'/';
             $pic=$contrib_identifier."_h.jpg";
             
             if(file_exists($app_path.$profiledir.$pic))
             {
                 $this->_view->contrib_home_picture="http://mmm.edit-place.com/FO/".$profiledir.$pic;
             }
             else
             {
                $this->_view->contrib_home_picture="http://mmm.edit-place.com/FO/images/Contrib/profile-img-def.png";
             }
             
         }
	}

	/*
	 * userListAction 
	 * function to Get List of users
	 *
	 */

	public function userslistAction(){

		$user_obj = new Ep_TestVin_TestVin();
		$user_list=$user_obj ->getUsersList();
		
		//
		foreach($user_list as $key => $value){
			//print_r($value);
			//
				if($value['type']=='contributor'){
					//echo $value['type'];
					$contributer_cat=$user_obj->getContributorCategory($value['identifier']);
					$contributer_part=$user_obj->getContributorParticipations($value['identifier']);
					$contributer_royalty=$user_obj->getContributorRoyalties($value['identifier']);
					$contributer_royalty_month=$user_obj->getContributorRoyaltiesThisMonth($value['identifier']);
					//print_r($contributer_royalty_month);
					if(!empty($contributer_cat)){
						//print_r($contributer_cat);
						//echo $contributer_cat['category_more'];
						if($contributer_cat[0]['category_more']!='N;' && $contributer_cat[0]['category_more']!=NULL){
						$cat=unserialize($contributer_cat[0]['category_more']);
						$temp='';
						foreach($cat as $key2 => $value2){
							if($value2>=80){
								$temp.=$this->getCategoryName($key2).",";
							}
						}
						
						$user_list[$key]['categories']=rtrim($temp, ",");
						}
					}
					$user_list[$key]['mission_participation']=(count($contributer_part)>0) ? count($contributer_part) : '0' ;
					$user_list[$key]['royalties']=($contributer_royalty[0]['total'] >0) ? $contributer_royalty[0]['total'] : '' ;
					$user_list[$key]['royalties_month']=($contributer_royalty_month[0]['total'] >0) ? $contributer_royalty_month[0]['total'] : '' ;
					$refusals=0;
					$bids=0;
					$closures=0;
					$published=0;
					$ongoing=0;
					//print_r($contributer_part);
					if(!empty($contributer_part) && $contributer_part!='NO'){
						foreach($contributer_part as $key3 => $value3){
								switch($value3['status']){
									case 'bid' :$bids++;
									break;
									case 'bid_refused' :$refusals++;		 	
									break;
									case 'under_study' : $ongoing++;
									break;
									case 'published' : $published++;
									break;
									case 'bid_nonpremium' : $bids++;
									break;
									case 'closed' : $closures++;
									break;
									case 'disapproved' : $ongoing++;
									break;
									case 'bid_premium' : $bids++;
									break;
									case 'on_hold' : $ongoing++;
									break;
									case 'disapprove_client' : $ongoing++;
									break;
									case 'closed_client' : $closures++;
									break;
									case 'time_out' : $ongoing++;
									break;
									case 'bid_nonpremium_timeout' : $ongoing++;
									break;
									case 'closed_client_temp': $closures++;
									break;
									case 'bid_premium_timeout' : $ongoing++;
									break;
									default:
									break;
								}
						}
						$user_list[$key]['mission_participation_ongoing']=$ongoing;
						$user_list[$key]['mission_participation_closed']=$closures;
						$user_list[$key]['mission_participation_published']=$published;
						$user_list[$key]['mission_participation_refused']=$refusals;

					}

					
				}
				$user_list[$key]['country']=$this->getCountryName($user_list[$key]['country']);
		}
		

		//print_r($user_list);
		$this->_view->user_details = $user_list ;
		$this->render("user_accounts");
	}

	 /**function to get the Article type name**/
    public function getCountryName($country_value)
    {
        $country_array=$this->_arrayDb->loadArrayv2("countryList", $this->_lang);
        return $country_array[$country_value];
    }

     /**function to get the category name**/
    public function getCategoryName($category_value)
    {
        $category_name='';
        $categories=explode(",",$category_value);
        $categories_array=$this->_arrayDb->loadArrayv2("EP_ARTICLE_CATEGORY", $this->_lang);
        $cnt=0;
        foreach($categories as $category)
        {
            if($cnt==4)
                break;
            $category_name.=$categories_array[$category].", ";
            $cnt++;
        }
        $category_name=substr($category_name,0,-2);
        return $category_name;
    }
}
