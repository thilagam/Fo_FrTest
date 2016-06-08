<?php

	class Ep_TestPrashanth_Users extends Ep_Db_Identifier
	{
		protected $_name = 'User';
		
		public function getUsers($true=false)
		{
			$query = "SELECT User.email,User.status,User.type,User.created_at,User.profile_type,User.profile_type2,User.type2,CASE WHEN User.type2='corrector' THEN 'Yes' ELSE 'No' END AS corrector,UserPlus.*,Contributor.language,Contributor.favourite_category,Contributor.language_more,Contributor.category_more FROM User LEFT JOIN UserPlus ON UserPlus.user_id = User.identifier LEFT JOIN Contributor ON Contributor.user_id = User.identifier";
			if(($count=$this->getNbRows($query))>0)
			{
			$query = $this->getQuery($query,$true);
			return $query;
			}
			else
			return array();
		}
		
		public function getUsers2()
		{
			$query = "SELECT User.email,User.status,User.type,User.created_at,User.profile_type,User.profile_type2,User.type2,CASE WHEN User.type2='corrector' THEN 'Yes' ELSE 'No' END AS corrector,UserPlus.* FROM User LEFT JOIN UserPlus ON UserPlus.user_id = User.identifier";
			if(($count=$this->getNbRows($query))>0)
			{
			$query = $this->getQuery($query);
			return $query;
			}
			else
			return array();
		}
	}
?>