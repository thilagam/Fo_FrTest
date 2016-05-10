<?php

class Ep_Tariff_tariff extends Ep_Db_Identifier
{
	protected $_name = 'tariff';
    public function insertTariff($tariff)
    { 
        $this->_name = 'tariff' ;
        $this->createIdentifier() ;
        $tariff['id']    =    $this->getIdentifier() ;
        $this->insertQuery($tariff) ;
    }
    public function updateTariff($id, $tariff)
    {
        //echo '<pre>';print_r($tariff);exit($id); 
        $this->_name = 'tariff' ;
        $tariffwhere  =   " id='".$id."'" ;
        $this->updateQuery($tariff, $tariffwhere) ;
    }
    //Delete a quizz
    public function deleteTariff($id)
    {
        $this->_name = 'tariff' ;
        $this->deleteQuery(" id = '".$id."'") ;
    }
    public function listTariffs($type)
    {
        return $this->getQuery("SELECT * FROM ".$this->_name." WHERE type='$type'",true) ;
    }
    public function getTariff($id)
    {
        $result =   $this->getQuery("SELECT * FROM ".$this->_name." WHERE id='$id'",true) ;
        return $result[0] ;
    }
    public function getTariffByColVal($col, $val)
    {
        $result =   $this->getQuery("SELECT * FROM ".$this->_name." WHERE $col='$val'",true) ;
        return $result[0] ;
    }
    public function getTariffColumn($column)
    {
        return $this->getQuery("SELECT $column FROM ".$this->_name,true) ;
    }
    public function getTariffPrice($tariff)
    {
        //print_r($tariff);exit($tariff['language']);
        /*if($tariff['category']) $tariff['category']   =   $params['category'];
        elseif($tariff['language']) $tariff['language']   =   $params['language'];*/
        $result =   $this->getQuery("SELECT price_word_" . $tariff['m'] . "_month FROM ".$this->_name." WHERE " . ($tariff['category'] ? ("category='" . $tariff['category'] . "'") : ("language='" . $tariff['language'] . "'")),true) ;
        //print_r($result[0]["price_word_" . $tariff['m'] . "_month"]);exit;
        return $result[0]["price_word_" . $tariff['m'] . "_month"] ;
    }
    public function getLatestTranslations($tariff)
    {
        $result =   $this->getQuery("SELECT tfd.articles_count AS articles_count, avg_price_per_word AS avg_price, tfd.delivery_time, tfd.delivery_time_option, tfd.client_id,tf.category FROM tariff tf RIGHT JOIN tariffdetails tfd ON tf.id=tfd.tariff_id  WHERE " . ($tariff['category'] ? ("tf.category='" . $tariff['category'] . "'") : ("tf.language='" . $tariff['language'] . "'")),true) ;
        
		foreach ($result as $key => $value) {
            if(!file_exists('profiles/clients/logos/'.$result[$key]['client_id'].'/'.$result[$key]['client_id'].'_p.jpg'))
                $result[$key]['pic'] = '/FO/images/customer-no-logo90.png';
            else
                $result[$key]['pic'] = '/FO/profiles/clients/logos/'.$result[$key]['client_id'].'/'.$result[$key]['client_id'].'_p.jpg';
            $result[$key]['avg_price'] = number_format($result[$key]['avg_price'], 2, ',', '');
        }
        return $result ;
    }
}	