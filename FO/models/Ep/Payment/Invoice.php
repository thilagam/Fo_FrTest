<?php
/**
 * Created by PhpStorm.
 * User: Naseer
 * Date: 7/28/2015
 * Time: 3:34 PM
 *
 */
class Ep_Payment_Invoice extends Ep_Db_Identifier
{
    protected $_name = 'Invoice';
    private $invoiceId;
    private $user_id;
    private $total_invoice;
    private $total_invoice_paid;
    private $tax;
    private $payment_info_type;
    private $vat_check;
    private $invoice_path;
    private $status;
    private $created_at;
    private $updated_at;
    public function loadData($array)
    {
        $this->user_id=$array["user_id"];
        $this->total_invoice=$array["total_invoice"];
        $this->total_invoice_paid=$array["total_invoice_paid"];
        $this->tax=$array["tax"];
        $this->payment_info_type=$array["payment_info_type"];
        $this->vat_check=$array["vat_check"];
        $this->invoice_path=$array["invoice_path"];
        $this->status=$array["status"];
        $this->created_at=$array["created_at"];
        $this->updated_at=$array["updated_at"];
        return $this;
    }
    public function loadintoArray()
    {
        $array = array();
        $array["invoiceId"] = $this->invoiceId;
        $array["user_id"] = $this->user_id;
        $array["total_invoice"] = $this->total_invoice;
        $array["total_invoice_paid"] = $this->total_invoice_paid;
        $array["tax"] = $this->tax;
        $array["payment_info_type"] = $this->payment_info_type;
        $array["vat_check"] = $this->vat_check;
        $array["invoice_path"] = $this->invoice_path;
        $array["status"] = $this->status;
        $array["created_at"] = $this->created_at;
        return $array;
    }
    public function __set($name, $value) {
        $this->$name = $value;
    }
    public function __get($name){
        return $this->$name;
    }
    /* by naseer on 16-07-2015 */
    /////////get invoivces of contributors which already got paid for their write ups ///////////////////////////
    public function clientInvoices($conditions)
    {

        $query = "SELECT PA.`id` , PA.`user_id` , PA.`amount_paid` , PA.`type` , DATE_FORMAT( PA.`created_at` , '%d-%m-%Y' ) AS created_at,
                    PA.`pay_type` , PA.`mc_currency` , PA.`tax` ,
                    U.email, CONCAT( UP.`first_name` , ' ', UP.`last_name` ) AS client_name, C.`company_name` ,
                    ART.`title` AS article_title,ART.`id` AS article_id, ART.`price_payed` as amount
                    FROM `Payment_article` AS PA
                    LEFT JOIN `User` AS U ON PA.`user_id` = U.`identifier`
                    LEFT JOIN `UserPlus` AS UP ON UP.`user_id` = U.`identifier`
                    LEFT JOIN `Client` AS C ON C.`user_id` = U.`identifier`
                    LEFT JOIN `Article` AS ART ON ART.`invoice_id` = PA.`id`
                    WHERE
                    YEAR( PA.created_at ) = YEAR( CURRENT_DATE - INTERVAL 1
                    MONTH )
                    AND MONTH( PA.created_at ) = MONTH( CURRENT_DATE - INTERVAL 1
                    MONTH )
                    AND
                    `pay_type`
                    IN (
                    'CC', 'PP','Paypal'
                    )
                    ORDER BY `PA`.`user_id` DESC";

        //echo $query; exit;

        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
}