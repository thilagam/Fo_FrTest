<?php

class DataController extends Ep_Controller_Action 
{
	public function writernolanguageAction()
	{
		$data_obj=new Ep_Ao_Data();
		$writerlist=$data_obj->getWriternoLanguage();
		
		for($w=0;$w<count($writerlist);$w++)
		{
			$data_obj->CheckInsertContributor($writerlist[$w]['identifier']);
		}
		
	}
	
}