<?php

class Ep_Article_ArticleActions extends Ep_Db_Identifier
{
	protected $_name = 'ArticleActions';
	
	public function getActionSentence($id)
	{
		$Actionquery = "SELECT Message FROM ".$this->_name." WHERE Identifier='".$id."'";
       
        if(($Actionresult = $this->getQuery($Actionquery,true)) != NULL)
            return $Actionresult[0]['Message'];
        else
            return "NO";
	}
}