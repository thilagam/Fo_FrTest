<?php

class Ep_Ao_Data extends Ep_Db_Identifier
{
	public function getClientAo()
	{
		$query1="SELECT u.identifier, u.email
					FROM User u
					INNER JOIN Delivery d ON u.identifier = d.user_id
					INNER JOIN Article a ON d.id = a.delivery_id
					INNER JOIN Participation p ON a.id = p.article_id
					WHERE u.type = 'client' AND d.premium_total = '0' AND p.status = 'published'
					GROUP BY u.identifier";
		$result1 = $this->getQuery($query1,true);
        return $result1;
    }
	
	public function getWriternoLanguage()
	{
		$query2="SELECT u.identifier,u.email,up.first_name,up.last_name,u.created_at, (SELECT created_at FROM Participation WHERE user_id=u.identifier ORDER BY created_at DESC LIMIT 1) as last_participation FROM User u LEFT JOIN UserPlus up ON u.identifier=up.user_id LEFT JOIN Contributor c ON u.identifier=c.user_id WHERE u.type='contributor' AND c.language IS NULL";
		$result2 = $this->getQuery($query2,true);
        return $result2;
	}
	
	public function CheckInsertContributor($user_id)
	{
		//Check userPlus
		$query3="SELECT count(*) as upcount FROM UserPlus WHERE user_id='".$user_id."'";
		$result3 = $this->getQuery($query3,true);
        if($result3[0]['upcount']==0)
		{
			$this->_name='UserPlus';
			$uparray=array();
			$uparray['user_id']=$user_id;
			$this->insertQuery($uparray);
		}
		
		//Check Contributor
		$query4="SELECT count(*) as contribcount FROM Contributor WHERE user_id='".$user_id."'";
		$result4 = $this->getQuery($query4,true);
        if($result4[0]['contribcount']==0)
		{
			$this->_name='Contributor';
			$conarray=array();
			$conarray['user_id']=$user_id;
			$conarray['language']='fr';
			$conarray['language_update']='manual';
			$this->insertQuery($conarray);
		}
	}
	
	public function CheckExistingClients($clients,$month,$year)
	{
		$clientlist=explode(",",$clients);
		$clientstring=implode("','",$clientlist);
		
		//$month_padded = sprintf("%02d", $month);
		
		$query19="SELECT GROUP_CONCAT(DISTINCT(d.user_id) SEPARATOR '\',\'')  as oldclients  FROM Delivery d WHERE 
					d.user_id IN ('".$clientstring."') AND d.created_at<'".$year."-".$month."-01%'";
		echo $query19;
		/*$result19 = $this->getQuery($query19,true);
    	return $result19;
		/*if($result19!='')
		{
			$query20="SELECT count(*)  as oldmissions  FROM ContractMissions cm LEFT JOIN Delivery d ON cm.contractmissionid=d.contract_mission_id WHERE 
					d.user_id IN ('".$result19[0]['oldclients']."') AND MONTH(cm.assigned_at)=".$month." AND YEAR(cm.assigned_at)=".$year;
			$result20 = $this->getQuery($query20,true);
			return $result20;
		}*/
	}
}	