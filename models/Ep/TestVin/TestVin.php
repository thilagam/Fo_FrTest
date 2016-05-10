<?php

class Ep_TestVin_TestVin extends Ep_Db_Identifier
{
	protected $_name = 'TestVin';

	
	public function InsertUser($userarray)
	{
		$userarray['identifier']=$this->getIdentifier();
		$this->insertQuery($userarray);
		return $userarray['identifier'];
	}

	public function getUsersList(){
		$query="SELECT u.identifier,u.email,u.type,u.created_at,u.profile_type ,up.first_name,up.last_name,up.country
				FROM User u
				INNER JOIN UserPlus up ON u.identifier = up.user_id
				WHERE u.status ='ACtive' ";
		if(($result = $this->getQuery($query,true)) != NULL)
			return $result;
		else
			return "NO";		
	}

	public function getContributorCategory($user_id){

		$contribCat="SELECT favourite_category, category_more
					 FROM Contributor
					 WHERE user_id = '".$user_id."'";
		if(($result = $this->getQuery($contribCat,true)) != NULL)
			return $result;
		else
			return "NO";	
						
	}

	public function getContributorParticipations($user_id){

		$contribCat="SELECT user_id,status
					 FROM Participation
					 WHERE user_id = '".$user_id."'";
		if(($result = $this->getQuery($contribCat,true)) != NULL)
			return $result;
		else
			return "NO";	
						
	}

	public function getContributorRoyalties($user_id){

		$contribCat="SELECT sum(price) as total
					 FROM Royalties
					 WHERE user_id = '".$user_id."'";

		if(($result = $this->getQuery($contribCat,true)) != NULL)
			return $result;
		else
			return "NO";	
						
	}

		public function getContributorRoyaltiesThisMonth($user_id){

		$first_day_this_month = date('Y-06-11'); // hard-coded '01' for first day
		$last_day_this_month  = date('Y-m-t');
		$contribCat="SELECT sum(price) as total
					 FROM Royalties
					 WHERE created_at >'".$first_day_this_month."' AND created_at< '".$last_day_this_month."'
					 AND user_id = '".$user_id."'";
		//echo $contribCat;  
				//	 select * from bookings where booking_date>'2013-06-30' AND booking_date<'2013-08-01';

		if(($result = $this->getQuery($contribCat,true)) != NULL)
			return $result;
		else
			return "NO";	
						
	}

	public function getPrivateDelivaryList(){
		$sql="SELECT  a.contribs_list as contributer,a.id as article,p.id as participation, p.status as status ,
				u.identifier as user_id , d.created_user as createdBy , d.title as title , d.user_id as clientId ,
				d.id as delivaryId ,u.identifier as user_id , d.created_by as created_by_type ,     
			   a.title as articleTitle,a.junior_time as jt,a.senior_time as st,a.subjunior_time as sjt ,
			   u.profile_type as profileType
			   FROM Participation p 
               INNER JOIN Article a ON a.id=p.article_id
               INNER JOIN Delivery d ON a.delivery_id=d.id
               INNER JOIN  User u ON p.user_id=u.identifier             
               WHERE d.AOtype= 'private'
               AND   p.status = 'bid_premium' 
               AND p.cycle = '0'
               AND  a.contribs_list NOT LIKE '%,%' 
		      ";//  AND ( p.status = 'bid_nonpremium' || p.status='bid_premium')
		if(($result = $this->getQuery($sql,true)) != NULL)
			return $result;
		else
			return "NO";	
		
		}
	public function getParticipationTimoutList(){
		
	$sql="SELECT * FROM
					 (SELECT  p.id , p.user_id,p.article_id,p.status,p.valid_date,d.user_id as client_id ,a.title
					  FROM Participation p 
					  INNER JOIN Article a ON a.id=p.article_id
					  INNER JOIN Delivery d ON a.delivery_id=d.id
					  WHERE p.status = 'bid_nonpremium'
					  AND p.valid_date IS NOT NULL
			          ORDER BY p.valid_date ASC
					 ) AS records 
          GROUP BY records.article_id

          
          
		  
		      ";//  AND ( p.status = 'bid_nonpremium' || p.status='bid_premium')
		if(($result = $this->getQuery($sql,true)) != NULL)
			return $result;
		else
			return "NO";	
		
		}

}
