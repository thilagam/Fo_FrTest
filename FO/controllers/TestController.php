<?php
/*comment by arun*/
	class TestController extends Ep_Controller_Action
	{
		function init()
		{
			parent::init();
			Zend_Loader::loadClass('Ep_TestPrashanth_Users');
		}
		
		function indexAction()
		{
			$this->_view->test = "Abcd";
			$this->_view->vals = array(1234,12,123);
			$this->_view->vals1 = array("abc"=>1234,"def"=>12,"ghi"=>123);
			$this->_view->val_array = array('abc','def','ghi');
			$this->_view->name_array = array('Abc','Def','Ghi','Mno');
			$this->_view->selected_id = 123;
			$this->_view->abc = "ghi";
			$this->_view->twoarray = array(
				 array('phone' => '1',
					   'fax' => '2',
					   'cell' => '3'),
				 array('phone' => '555-4444',
					   'fax' => '555-3333',
					   'cell' => '760-1234')
				 );
			$this->render("testcontrol");
		}
		
		function getUsersAction()
		{
			// $registry = Zend_Registry::getInstance();
			// echo "<PRE>";
			// print_r($registry);
			// echo "</PRE>";
			// exit;
			//echo phpversion();
			$users = new Ep_TestPrashanth_Users();
			$users_op =  $users->getUsers();
			$users_req = array();
			foreach($users_op as $row):
				$row->favourite_category = $this->getCategoryName($row->favourite_category,$row->language);
				$row->language_more = $this->getLanguageName($row->language_more);
				$row->language = $this->getLanguageName($row->language,true);
				$row->category_more = $this->getCategoryMore($row->category_more);
				$users_req[$row->type][] = $row;
			endforeach;
	
			$this->_view->req_users = $users_req;	
			$this->render("testcontrol");
		}
				
		/**function to get the category name**/
		public function getCategoryName($category_value,$lang)
		{
			//echo $this->_lang;
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
		
		function getLanguageName($language_more,$name=false)
		{
			if(!$name):
			$language = unserialize($language_more);
			if(is_array($language))
			{
				$languages=$this->_arrayDb->loadArrayv2("EP_LANGUAGES", $this->_lang);
				$language_keys = array_keys($language);
				$language_values = array_values($language);
				for($i=0;$i<count($language_keys);$i++):
					$language_keys[$i] = $languages[$language_keys[$i]];
				endfor;
				if(count($language_keys) && count($language_values))
				return array_combine($language_keys,$language_values);
			}
			else
				return array();
			else:
				$languages=$this->_arrayDb->loadArrayv2("EP_LANGUAGES", $this->_lang);
				$language_name = $language_more;
				return $languages[$language_name];
			endif;
		}
		
		function getCategoryMore($category_more)
		{
			$category = unserialize($category_more);
			if(is_array($category))
			{
				$categories = $this->_arrayDb->loadArrayv2("EP_ARTICLE_CATEGORY", $this->_lang);
				$category_keys = array_keys($category);
				$category_values = array_values($category);
				for($i=0;$i<count($category_keys);$i++):
					$category_keys[$i] = $categories[$category_keys[$i]];
				endfor;
				if(count($category_keys) && count($category_values))
				return array_combine($category_keys,$category_values);
			}
			else
				return array();
		}
		
		function getUsersPaginateAction()
		{
			$users = new Ep_TestPrashanth_Users();
			$users_op =  $users->getUsers();
			
			$paginator = Zend_Paginator::factory($users_op);
			
			$this->_view->req_users = $paginator;	
			$this->_view->page_info = $paginator->getPages();
			//print_r($paginator->getPages());
			$this->render("testcontrolpaginate");
		}				
		
		function countryFlagsAction()		
		{			
			$this->_view->country_list = $this->_arrayDb->loadArrayv2("countryList",'en');			
			$this->render('testcontrolpaginate');		
		}		
	}
?>