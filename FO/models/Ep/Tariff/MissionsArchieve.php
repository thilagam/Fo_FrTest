<?php

class Ep_Tariff_MissionsArchieve extends Ep_Db_Identifier
{
	protected $_name = 'Missions_archieve';
	
	public function getTariffPrice($type,$prod,$lang)
	{
		$query="SELECT (SUM(selling_price)/SUM(article_length)) as tariff  FROM Missions_archieve WHERE type_of_article = '".$prod."' AND type = '".$type."' AND language1 = '".$lang."'";	
		
		$tariffDetails=$this->getQuery($query,true);
        return $tariffDetails[0]['tariff'];
    }
}	