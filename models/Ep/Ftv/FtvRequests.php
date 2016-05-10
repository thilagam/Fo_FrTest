<?php
/* *
 * Ep_User_User
 * @author admin
 * @package Ticket
 * @version 1.0
 */
/*Status
       0 => sent by sender / received by recipient
       1 => received by sender / sent by recipient
       2 => classified by sender
       3 => classified by recipient
*/
class Ep_Ftv_FtvRequests extends Ep_Db_Identifier
{
    protected $_name = 'FtvRequests';
    private $identifier;
    private $request_by;
    private $other_contacts;
    private $request_object;
    private $duration;
    private $modify_broadcast;
    private $modify_contains;
    private $demand;
    private $status;
    private $created_at;
    private $assigned_at;
    private $closed_at;
    private $ftvtype;
    private $dayrange;
    private $mail_send_at;

    public function loadData($array)
    {
        $this->identifier=$array["identifier"] ;
        $this->request_by=$array["request_by"];
        $this->other_contacts=$array["other_contacts"];
        $this->request_object=$array["request_object"];
        $this->duration=$array["duration"] ;
        $this->modify_broadcast=$array["modify_broadcast"] ;
        $this->modify_contains=$array["modify_contains"] ;
        $this->demand=$array["demand"] ;
        $this->status=$array["status"] ;
        $this->created_at=$array["created_at"] ;
        $this->assigned_at=$array["assigned_at"] ;
        $this->closed_at=$array["closed_at"] ;
        $this->ftvtype=$array["ftvtype"] ;
        $this->dayrange=$array["dayrange"] ;
        $this->mail_send_at=$array["mail_send_at"] ;
        return $this;
    }
    public function loadintoArray()
    {
        $array = array();
        $array["identifier"] = $this->getIdentifier();
        $array["request_by"] = $this->request_by;
        $array["other_contacts"] = $this->other_contacts;
        $array["request_object"] = $this->request_object;
        $array["duration"] = $this->duration;
        $array["modify_broadcast"] = $this->modify_broadcast;
        $array["modify_contains"] = $this->modify_contains;
        $array["demand"] = $this->demand;
        $array["status"] = $this->status;
        $array["created_at"] = $this->created_at;
        $array["assigned_at"] = $this->assigned_at;
        $array["closed_at"] = $this->closed_at;
        $array["ftvtype"] = $this->ftvtype;
        $array["dayrange"] = $this->dayrange;
        $array["mail_send_at"] = $this->mail_send_at;
        return $array;
    }
    public function __set($name, $value) {
        $this->$name = $value;
    }

    public function __get($name){
        return $this->$name;
    }
    //Function to check profile exists
    public function getAllRequests()
    {
        $query = "SELECT * FROM ".$this->_name." where active='yes'";
        if(($result = $this->getQuery($query,true)) != NULL)
        {
            return $result;
        }
        else
            return "NO";

    }
    // get the requests based on the durations///////
    public function getRequestsForMails($duration)
    {
        if($duration == 'h')
            $condition = " AND mail_send_at < UNIX_TIMESTAMP() AND mail_send_at <= (UNIX_TIMESTAMP()-(60*60))";
        if($duration == 'd')
            $condition = " AND mail_send_at < UNIX_TIMESTAMP() AND mail_send_at <= (UNIX_TIMESTAMP()-(60*60*24))";
        if($duration == 'nd')
            $condition = " AND mail_send_at < UNIX_TIMESTAMP() AND mail_send_at >= (UNIX_TIMESTAMP()-(60*60*24))";
        if($duration == 'w')
            $condition = " AND mail_send_at < UNIX_TIMESTAMP() AND mail_send_at <= (UNIX_TIMESTAMP()-(60*60*24*7))";
        if($duration == 'nw')
            $condition = " AND mail_send_at < UNIX_TIMESTAMP() AND mail_send_at >= (UNIX_TIMESTAMP()-(60*60*24*7))";
        $query = "SELECT r.*, up.* FROM ".$this->_name." r LEFT JOIN UserPlus up ON r.assigned_to = up.user_id WHERE r.status = 'pending' ".$condition;
        if(($result = $this->getQuery($query,true)) != NULL)
        {
            return $result;
        }
        else
            return "NO";

    }
    //Function to check profile exists
    public function requestDetailsById($requestId)
    {
        $query = "SELECT * FROM ".$this->_name." WHERE identifier='".$requestId."'";
        if(($result = $this->getQuery($query,true)) != NULL)
        {
            return $result;
        }
        else
            return "NO";

    }
    //Function to check profile exists
    public function getRequestById($requestId)
    {
        $query = "SELECT * FROM ".$this->_name." WHERE identifier=".$requestId;
        if(($result = $this->getQuery($query,true)) != NULL)
        {
            return $result;
        }
        else
            return "NO";

    }
    //Function to check profile exists
    /*public function getAllRequestsDetails()
    {
        $this->ftvcontacts = Zend_Registry::get('EP_ftvcontacts');
        $query = "SELECT r.*,c.first_name FROM  ".$this->_name." r
                  INNER JOIN FtvContacts c ON c.identifier = r.request_by WHERE r.request_by = ".$this->ftvcontacts->ftvId." OR find_in_set(".$this->ftvcontacts->ftvId.", r.other_contacts ) GROUP BY r.identifier ORDER BY r.created_at DESC ";
        if(($result = $this->getQuery($query,true)) != NULL)
        {
            return $result;
        }
        else
            return "NO";

    }*/
    //Function to check profile exists
    public function getAllRequestsDetails($ftvtype)
    {
        $this->ftvcontacts = Zend_Registry::get('EP_ftvcontacts');
        $query = "SELECT r.*,c.first_name FROM  ".$this->_name." r
                  LEFT JOIN FtvContacts c ON c.identifier = r.request_by WHERE r.ftvtype = '".$ftvtype."' AND r.active='yes' ORDER BY r.created_at DESC";
		//echo $query;
        if(($result = $this->getQuery($query,true)) != NULL)
        {
            return $result;
        }
        else
            return "NO";

    }
    public function getRecentInsertedId()
    {
        $query = "SELECT identifier FROM ".$this->_name." ORDER BY created_at DESC LIMIT 1";
        if(($result = $this->getQuery($query,true)) != NULL)
        {
            return $result;
        }
        else
            return "NO";
    }

    public function updateFtvRequests($data,$query)
    {
        //$where=" user_id='".$identifier."'";
        /* print_r($data);exit;    echo  $query;
         echo $this->updateQuery($data,$query);    exit;*/
        $this->updateQuery($data,$query);

    }
    /* added by naseer  */
    //get all the request of edito ftv on ajax pagination///
    public function getAllEditoRequestsDetails($sWhere, $sOrder, $sLimit, $params)
    {  // print_r($params); //exit;
        $where = " WHERE 1=1 ";
        if($params['search'] == 'search')
        {
            $condition = '';
            if($params['startdate'] !='' && $params['enddate']!='')
            {
                $start_date = str_replace('/','-',$params['startdate']);
                $end_date = str_replace('/','-',$params['enddate']);
                $start_date = date('Y-m-d', strtotime($start_date));
                $end_date = date('Y-m-d', strtotime($end_date));
                $condition.= " AND r.created_at BETWEEN '".$start_date."' AND DATE_ADD('".$end_date."', INTERVAL 1 DAY)";
            }
            if($params['contactId']!='0')
            {
                $condition.= " AND c.identifier =".$params['contactId']." ";
            }
            if($params['broadcastId']!='0')
            {
                $condition.= " AND find_in_set('".$params['broadcastId']."', r.modify_broadcast) ";
            }
            if($params['quandId']!='0')
            {
                $condition.= " AND find_in_set('".$params['quandId']."', r.duration) ";
            }
            if($params['containsId']!='0')
            {
                $condition.= " AND find_in_set('".$params['containsId']."', r.modify_contains) ";
            }
            if(isset($params['dayrange']) && $params['dayrange']!='0' )
            {
                // if($params['dayrange'] == 'green')
                //     $condition.= " AND  DAYOFWEEK(r.created_at) IN ('1','6','7') AND (HOUR(r.created_at) > 18 OR HOUR(r.created_at) < 9) ";
                // else
                //    $condition.= " AND  DAYOFWEEK(r.created_at) IN ('2','3','4','5') AND (HOUR(r.created_at) > 18 OR HOUR(r.created_at) < 9) ";
                $condition.= " AND (HOUR(r.created_at) > 18 OR HOUR(r.created_at) < 9) ";
            }
        }
        $query = "SELECT r.*,c.first_name, pt.* FROM  ".$this->_name." r
                  INNER JOIN FtvContacts c ON c.identifier = r.request_by
                  LEFT JOIN FtvPauseTime pt ON pt.ftvrequest_id = r.identifier and pt.resume_at is null
                   ".$where." ".$condition." AND r.ftvtype='edito' AND r.active = 'yes'  ".$sWhere." ".$sOrder." ".$sLimit." ";
        if(($result = $this->getQuery($query,true)) != NULL)
        {
            return $result;
        }
        else
            return "NO";

    }
    //get all the request of chaine///
    public function getAllChaineRequestsDetails($sWhere, $sOrder, $sLimit, $params)
    {  // print_r($params); //exit;
        $where = " WHERE 1=1 ";
        if($params['search'] == 'search')
        {
            $condition = '';
            if($params['startdate'] !='' && $params['enddate']!='')
            {
                $start_date = str_replace('/','-',$params['startdate']);
                $end_date = str_replace('/','-',$params['enddate']);
                $start_date = date('Y-m-d', strtotime($start_date));
                $end_date = date('Y-m-d', strtotime($end_date));
                $condition.= " AND r.created_at BETWEEN '".$start_date."' AND DATE_ADD('".$end_date."', INTERVAL 1 DAY)";
            }
            if($params['contactId']!='0')
            {
                $condition.= " AND c.identifier =".$params['contactId']." ";
            }
            if($params['broadcastId']!='0')
            {
                $condition.= " AND find_in_set('".$params['broadcastId']."', r.modify_broadcast) ";
            }
            if($params['quandId']!='0')
            {
                $condition.= " AND find_in_set('".$params['quandId']."', r.duration) ";
            }
            if($params['containsId']!='0')
            {
                $condition.= " AND find_in_set('".$params['containsId']."', r.modify_contains) ";
            }
            if(isset($params['dayrange']) && $params['dayrange']!='0' )
            {
                // if($params['dayrange'] == 'green')
                //     $condition.= " AND  DAYOFWEEK(r.created_at) IN ('1','6','7') AND (HOUR(r.created_at) > 18 OR HOUR(r.created_at) < 9) ";
                // else
                //    $condition.= " AND  DAYOFWEEK(r.created_at) IN ('2','3','4','5') AND (HOUR(r.created_at) > 18 OR HOUR(r.created_at) < 9) ";
                $condition.= " AND (HOUR(r.created_at) > 18 OR HOUR(r.created_at) < 9) ";
            }
        }
        $query = "SELECT r.*,c.first_name, pt.* FROM  ".$this->_name." r
                  INNER JOIN FtvContacts c ON c.identifier = r.request_by
                  LEFT JOIN FtvPauseTime pt ON pt.ftvrequest_id = r.identifier and pt.resume_at is null
                   ".$where." ".$condition." AND r.ftvtype='chaine' AND r.active = 'yes'  ".$sWhere." ".$sOrder." ".$sLimit." ";

        if(($result = $this->getQuery($query,true)) != NULL)
        {
            return $result;
        }
        else
            return "NO";

    }


    /*end of  added by naseer  */
}

