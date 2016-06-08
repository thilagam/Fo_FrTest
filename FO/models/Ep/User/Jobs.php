<?php

class Ep_User_Jobs extends Ep_Db_Identifier
{
	protected $_name = 'Jobs';
	
	public function getJobs($id=NULL)
	{
		if($id)
			$where=" WHERE id='".$id."'";
			
		$jobQuery = "SELECT * FROM Jobs".$where;
        $jobDetails = $this->getQuery($jobQuery, true);
        return $jobDetails;
    }
	
}