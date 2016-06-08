<?php
class Ep_Article_Ebooker extends Ep_Db_Identifier
{
	function getSampleText($text_id)
	{
		$sampleQuery="SELECT description 
					  FROM EB_sampletext
					  WHERE sample_id='".$text_id."'";
					  
		
		//echo $sample_text_id;exit;
		
		if(($result = $this->getQuery($sampleQuery,true)) != NULL)
			return $result[0]['description'];
		else
			return NULL;
	}
	
	function getTokens($tokenids)
	{
		$mandatory_tokens=array();
		$optional_tokens=array();
		
		$tokensQuery="SELECT token_name ,token_type
					  FROM  EB_token
					  WHERE FIND_IN_SET (token_id,'$tokenids') AND token_type in ('mandatory','optional')";
					  
		
		//echo $tokensQuery;exit;
		
		if(($token_result = $this->getQuery($tokensQuery,true)) != NULL)
		{
			foreach($token_result as $token)
			{
				$token_text=rawurlencode(utf8_encode($token['token_name']));//($token['token_name']);
				$token_text=str_replace('%3F',"?",$token_text);
				if($token['token_type']=='mandatory')
					$mandatory_tokens[]=$token_text;
				else if($token['token_type']=='optional')
					$optional_tokens[]=$token_text;
			}
			$tokens=array($mandatory_tokens,$optional_tokens);
			
			//echo "<Pre>";print_r($tokens);exit;
			return $tokens;
		}			
		else
			return NULL;
	}
	
	//get tokens based on Article id
	function getArticleTokens($article_id)
	{
		$tokensQuery="SELECT token_name 
					  FROM  EB_token
					  WHERE FIND_IN_SET
						(token_id,(SELECT ebooker_tokenids FROM Article WHERE id='".$article_id."'))
					AND token_type in ('mandatory','optional')";
					  
		
		//echo $tokensQuery;exit;
		
		if(($token_result = $this->getQuery($tokensQuery,true)) != NULL)
		{
			foreach($token_result as $token)
			{
				//$tokens[]=rawurlencode(utf8_encode($token['token_name']));
				$tokens[]=$token['token_name'];
			}
			return $tokens;
		}			
		else
			return NULL;
	}
	
	//get ALL DB stencils other than given article
	function getAllDBStencils($article_id)
	{		
		$dbStencilsQuery="SELECT ap.article_doc_content as db_text
							FROM ArticleProcess ap
							JOIN Participation p ON ap.participate_id=p.id
							JOIN Article a ON a.id=p.article_id
							JOIN Delivery d on a.delivery_id=d.id
							WHERE d.stencils_ebooker='yes' AND a.id!='".$article_id."'
						";
					  
		
		//echo $dbStencilsQuery;exit;
		
		if(($result = $this->getQuery($dbStencilsQuery,true)) != NULL)
		{			
			$stencilsArray=array();
			foreach($result as $stencils)
			{
				$stencilsArray[]=$stencils['db_text'];
			}
			$stencilsDBText=implode("###$$$###",$stencilsArray);
			$stencilsDBText=utf8_encode(preg_replace('/\s+/', ' ', $stencilsDBText));
			$stencilsDBArray=array_unique(explode('###$$$###',$stencilsDBText));			
			//echo "<pre>";print_r($stencilsDBArray);exit;
			return array_values($stencilsDBArray);
		}			
		else
			return NULL;
	}
	
	
}