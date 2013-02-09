<?php  

$emailPaypal = get_option('emailPaypal');        
$currentCodePaypal  = get_option('currentCodePaypal');


/**
 *  PHP-PayPal-IPN Example
 *
 *  This shows a basic example of how to use the IpnListener() PHP class to 
 *  implement a PayPal Instant Payment Notification (IPN) listener script.
 *
 *  For a more in depth tutorial, see my blog post:
 *  http://www.micahcarrick.com/paypal-ipn-with-php.html
 *
 *  This code is available at github:
 *  https://github.com/Quixotix/PHP-PayPal-IPN
 *
 *  @package    PHP-PayPal-IPN
 *  @author     Micah Carrick
 *  @copyright  (c) 2011 - Micah Carrick
 *  @license    http://opensource.org/licenses/gpl-3.0.html
 */
 
 
/*
Since this script is executed on the back end between the PayPal server and this
script, you will want to log errors to a file or email. Do not try to use echo
or print--it will not work! 

Here I am turning on PHP error logging to a file called "ipn_errors.log". Make
sure your web server has permissions to write to that file. In a production 
environment it is better to have that log file outside of the web root.
*/
ini_set('log_errors', true);
ini_set('error_log', dirname(__FILE__).'/ipn_errors.log');


// instantiate the IpnListener class
include('ipnlistener.php');
$listener = new IpnListener();


/*
When you are testing your IPN script you should be using a PayPal "Sandbox"
account: https://developer.paypal.com
When you are ready to go live change use_sandbox to false.
*/
$listener->use_sandbox = false;

/*
By default the IpnListener object is going  going to post the data back to PayPal
using cURL over a secure SSL connection. This is the recommended way to post
the data back, however, some people may have connections problems using this
method. 

To post over standard HTTP connection, use:
$listener->use_ssl = false;

To post using the fsockopen() function rather than cURL, use:
$listener->use_curl = false;
*/

/*
The processIpn() method will encode the POST variables sent by PayPal and then
POST them back to the PayPal server. An exception will be thrown if there is 
a fatal error (cannot connect, your server is not configured properly, etc.).
Use a try/catch block to catch these fatal errors and log to the ipn_errors.log
file we setup at the top of this file.

The processIpn() method will send the raw data on 'php://input' to PayPal. You
can optionally pass the data to processIpn() yourself:
$verified = $listener->processIpn($my_post_data);
*/
try {
    $listener->requirePostMethod();
    $verified = $listener->processIpn();
} catch (Exception $e) {
    error_log($e->getMessage());
    exit(0);
}


/*
The processIpn() method returned true if the IPN was "VERIFIED" and false if it
was "INVALID".
*/
if ($verified) {
    /*
    Once you have a verified IPN you need to do a few more checks on the POST
    fields--typically against data you stored in your database during when the
    end user made a purchase (such as in the "success" page on a web payments
    standard button). The fields PayPal recommends checking are:
    
        1. Check the $_POST['payment_status'] is "Completed"
	    2. Check that $_POST['txn_id'] has not been previously processed 
	    3. Check that $_POST['receiver_email'] is your Primary PayPal email 
	    4. Check that $_POST['payment_amount'] and $_POST['payment_currency'] 
	       are correct
    
    Since implementations on this varies, I will leave these checks out of this
    example and just send an email using the getTextReport() method to get all
    of the details about the IPN.  
    */
 
 
 
 
 
 $errmsg = '';   // stores errors from fraud checks

     // 1. Make sure the payment status is "Completed" 
     /*
     if ($_POST['payment_status'] != 'Completed') { 
         // simply ignore any IPN that is not completed
         exit(0); 
     }   
     */
    
     // 2. Make sure seller email matches your primary account email.      YOUR PRIMARY PAYPAL EMAIL
     if ($_POST['receiver_email'] != $emailPaypal) {
         $errmsg .= "'receiver_email' does not match: ";
         $errmsg .= $_POST['receiver_email']."\n";
     }
      
     
      /*
     // 3. Make sure the amount(s) paid match
     if ($_POST['mc_gross'] != '9.99') {
         $errmsg .= "'mc_gross' does not match: ";
         $errmsg .= $_POST['mc_gross']."\n";
     } 
     */
     
           

     // 4. Make sure the currency code matches     USD,BRL
     if ($_POST['mc_currency'] != $currentCodePaypal ) {
         $errmsg .= "'mc_currency' does not match: ";
         $errmsg .= $_POST['mc_currency']."\n";
     }
           

     // TODO: Check for duplicate txn_id

     if (!empty($errmsg)) { 
         
          $idPedido = $_REQUEST['cdp'];//custom wpshop 
         // manually investigate errors from the fraud checking
         $body = "IPN failed fraud checks: \n$errmsg\n\n";
         $body .= $listener->getTextReport();
         alteraPedidoStatus($idPedido,'PENDENTE',$body,$body,$body);  
         
     } else {

         // TODO: process order here
         
             $idPedido = $_REQUEST['cdp']; //custom wpshop
             $status =  $_POST['payment_status'];  //custom wpshop 
             $data = $_POST['payment_date'];//custom wpshop 
             $paytype = $_POST['payment_type'];//custom wpshop 
             $test_ipn = intval($_POST['test_ipn']);//custom wpshop
             
         
         if($test_ipn==1){}else{    // SE NAO FOR TESTE ----------------
            
         //SALVANDO NO BANCO DE DADOS A ALTERACAO DO PEDIDO  
            
            $msg = "PEDIDO REGISTRADO : FINALIZOU:$data | TRANSAÇÃO: $paytype | STATUS:$status |"; 
            $comentario1 = "".$listener->getTextReport(); 
            $comentario2 = "".$listener->getTextReport();

            if($status=="Completed"){ //2
             alteraPedidoStatus($idPedido,'APROVADO',$msg,$comentario1,$comentario2);
            }elseif($status=="Expired"){   //4
             alteraPedidoStatus($idPedido,'PENDENTE',$msg,$comentario1,$comentario2);    
            }elseif($status=="Denied"){  //3
             alteraPedidoStatus($idPedido,'PENDENTE',$msg,$comentario1,$comentario2);    
            }elseif($status=="Failed"){   //5
             alteraPedidoStatus($idPedido,'PENDENTE',$msg,$comentario1,$comentario2);    
            }elseif($status=="In-Progress"){    //6
             alteraPedidoStatus($idPedido,'VERIFICANDO',$msg,$comentario1,$comentario2);    
            }else{ 	
             alteraPedidoStatus($idPedido,'PENDENTE',$msg,$comentario1,$comentario2);    
            };   
        
         };  // SE NAO FOR TESTE ---------------- 
    
    
    }   // Process order here
    
    
 

} else {
    /*
    An Invalid IPN *may* be caused by a fraudulent transaction attempt. It's
    a good idea to have a developer or sys admin manually investigate any 
    invalid IPN.
    */ 
    $idPedido = $_REQUEST['cdp']; //custom wpshop 
    $msg = "PEDIDO NÃO CONCLUÍDO. Tente novamente!";  
    alteraPedidoStatus($idPedido,'PENDENTE',$msg,$listener->getTextReport(),$listener->getTextReport()); 
}

?>
