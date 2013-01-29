<?php
global $General, $Cart;    
//$orderNumber; // order number ~


//$orderNumber; // order number
$paymentOpts = $General->get_payment_optins($_REQUEST['paymentmethod']);
$merchantid = $paymentOpts['merchantid'];
$returnUrl = $paymentOpts['returnUrl'];
$cancel_return = $paymentOpts['cancel_return'];
$notify_url = $paymentOpts['notify_url'];
$currency_code = $General->get_currency_code();


$cidade = "";
$estado = "";
$freteCheck = number_format($_REQUEST['freteV'],2);


$produtosCheck = "";




$cartInfo = $Cart->getcartInfo();

$itemArr = array();

//Informações Vendedor
$emailVendedor= $paymentOpts['bankinfo'];
$tokenPagSeguro = $paymentOpts['bank_accountid'];

//echo "Email Vendedor: $emailVendedor - TOKEN : $tokenPagSeguro  <br/> ";



$tipoEntrega= $_REQUEST['entregaEspecial'];

if($tipoEntrega==""){$tipoEntrega="Normal";};
$tipoFrete = $_REQUEST['freteOpt'];
$dataEntrega = $_REQUEST['dataEntrega'];

$freteV = str_replace(",", ".", $_REQUEST['freteV']); 

$frete="SD";
if($tipoFrete=="valorFreteSEDEX"){	
}elseif($tipoFrete=="valorFretePAC"){
$frete="EN";	
};



if($tipoEntrega=="especial"){
	
$extras = $_REQUEST['extras'];
	
}else{
	
$extras = 0;
	
};


if($dataEntrega==""){
$dataEntrega ="Seguir o Cronograma normal do frete escolhido.";
};

/*
echo "Tipo de Entrega Escolhida : $tipoEntrega <br/>

      Frete Escolhido : $tipoFrete <br/>

      Valor do Frete : $freteV <br/> 

      data de entrega: $dataEntrega <br/>  

";

*/



	
	
	

$userInfo = $General->getLoginUserInfo();

$user_address_info = unserialize(get_user_option('user_address_info', $userInfo['ID']));



$Array[] = array();        





for($i=0;$i<=count($cartInfo);$i++){	
	
	// Adicionando um produto
	
  $vowels = array(",");

  $var = str_replace($vowels,".", $cartInfo[$i]['product_weight']) ;
  $peso = floatval($var);

  $var = str_replace($vowels,".", $cartInfo[$i]['product_gross_price']);
  $valor = floatval($var);

  $var = str_replace($vowels,".", $cartInfo[$i]['product_weight']);
  $qtd = floatval($var);
  
  
	if($i<count($cartInfo)){  //IF Pagseguro Add

		
		
  $vowels = array(",");

  $str_utf8 = $cartInfo[$i]['product_name']." - ".$cartInfo[$i]['product_att'];

//tirar os acentos de uma string! pode ser adaptadas para outras coisas

$a = array(
 '[ÂÀÁÄÃ]'=>'A',
'/[âãàáä]/'=>'a',
'/[ÊÈÉË]/'=>'E',
'/[êèéë]/'=>'e',
'/[ÎÍÌÏ]/'=>'I',
'/[îíìï]/'=>'i',
'/[ÔÕÒÓÖ]/'=>'O',
'/[ôõòóö]/'=>'o',
'/[ÛÙÚÜ]/'=>'U',
'/[ûúùü]/'=>'u',
'/ç/'=>'c',
'/Ç/'=> 'C');

//$strNew = preg_replace(array_keys($a), array_values($a), $str_utf8 );
$strNew =  str_replace($vowels,"-", $str_utf8 ) ;



  $var = str_replace($vowels,".", $cartInfo[$i]['product_weight']) ;
  $pesoy = $var;

  $var2 = str_replace($vowels,".", $cartInfo[$i]['product_gross_price']);
  $valory = $var2;

  $valor =  number_format($var2,2);

$freteV = number_format($freteV,2);

  $var3 = str_replace($vowels,".", $cartInfo[$i]['product_qty']);
  $qtdy = intval($var3);

  if($pesoy==""){$pesoy=0.1;}  


	
	   $produtosCheck .= " _gaq.push(['_addItem',
               '$orderNumber',           // order ID - required
               '".$cartInfo[$i]['product_id']."',           // SKU/code - required
               '".$strNew."',        // product name
               '".$pesoy."',   // category or variation
               '".$cartInfo[$i]['product_price']."',          // unit price - required
               '".$qtdy."'               // quantity - required
             ]); ";
    
	
   
//	echo "<br/>INFORMAÇÕES DO CARRINHO : <br/>";
   // echo "Nome do Produto : $strNew <br/>";  
   // echo "Valor Produto : ".$cartInfo[$i]['product_gross_price']." <br/>"; 
   // echo "Peso : $pesoy <br/>";
//	echo "Qtd : $qtdy <br/>";   
	//echo "id : ".$cartInfo[$i]['product_id']." <br/>";   
	//echo "frete : $freteV<br/>";  
	
	
	
	
		$beta = intval($i)+1;
	

	
	
	$freteV = 0;    
	 
}; //End If Pagseguro Add
   
	$product_att = preg_replace('/([(])([+-])([0-9]*)([)])/','',$cartInfo[$i]['product_att']);
	$itemstr = '';
	$itemstr .= $cartInfo[$i]['product_qty'].' X '.$cartInfo[$i]['product_name'];
	if($product_att)
	{
	$itemstr .="($product_att)";
	}
	$itemArr[] = $itemstr;
	
}

$item_name = implode(', ',$itemArr);

$amount = $Cart->getCartAmt();

$payable_amt = $General->get_payable_amount($_REQUEST['shippingmethod']);


$order_info['dataEntrega'] = $dataEntrega;

$_SESSION['dataEntrega'] =  $dataEntrega;

$order_info['order_admmin_comment']= $dataEntrega;
$orderInformationArray[0]['order_info'] = $order_info;
$meta_value[$order_number-1] = $orderInformationArray;
global $current_user;
get_currentuserinfo();
update_usermeta($userInfo['ID'], 'user_order_info', serialize($meta_value)); // Save Order Information Here


?>


<?php
if($userInfo) //simple checkout
{    
	
	
$name =  $userInfo['display_name'];         

$nome  = utf8_decode(trim(htmlentities(stripslashes($name), ENT_QUOTES,'utf-8')));              
 

  
//echo"Usuário:$nome";      


$cidade = $user_address_info['user_city'];
$estado = $user_address_info['user_state'];

}else{
	
$cidade = $_REQUEST['user_city'];
$estado = $_REQUEST['user_state'];
	
};


// Mostrando o botão de pagamento
//$pgs->mostra();



?>




	
	
	
	
    <script type="text/javascript">
    pageTracker._addTrans(
          "<?php echo $numPedido; ?>", // required
          "Cf Care Hospitalar",
          "<?php echo $totalCompra; ?>",
          "0.00",
          "<?php echo $freteV;  ?>",
          "city",
          "state",
          "country"
    ); 

    pageTracker._addItem(
          "<?php echo $numPedido; ?>", // required
          "prod2011",
          "produto cf care",
          "produto",
          "<?php echo $totalCompra; ?>",  // required
          "1"  //required
    ); 

    pageTracker._trackTrans();
    </script>
    
    

       	<?php

        $_SESSION['conversaoGoogle'] = "";


         $_SESSION['conversaoGoogle'] = " <script type='text/javascript'>

           var _gaq = _gaq || [];
           _gaq.push(['_setAccount', 'UA-6597604-38']);
           _gaq.push(['_trackPageview']);
           _gaq.push(['_addTrans',
             '$orderNumber',           // order ID - required
             'CF CARE MATERIAL HOSPITALAR',  // affiliation or store name
             '$payable_amt',          // total - required
             '0.00',           // tax
             '$freteCheck',              // shipping
             '$cidade',       // city
             '$estado',     // state or province
             'BRA'             // country
           ]);

            // add item might be called for every item in the shopping cart
            // where your ecommerce engine loops through each item in the cart and
            // prints out _addItem for each

           $produtosCheck


           _gaq.push(['_trackTrans']); //submits transaction to the Analytics servers

           (function() {
             var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
             ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
             var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
           })();

         </script>";



        ?>


        
 
 
 
         <script type="text/javascript">

           var _gaq = _gaq || [];
           _gaq.push(['_setAccount', 'UA-6597604-38']);
           _gaq.push(['_trackPageview']);
           _gaq.push(['_addTrans',
             '<?php echo $orderNumber; ?>',           // order ID - required
             '<?php bloginfo('name'); ?>',  // affiliation or store name
             '<?php echo $payable_amt; ?>',          // total - required
             '0.00',           // tax
             '<?php echo $freteCheck; ?>',              // shipping
             '<?php echo $cidade ?>',       // city
             '<?php echo $estado; ?>',     // state or province
             'BRA'             // country
           ]);

            // add item might be called for every item in the shopping cart
            // where your ecommerce engine loops through each item in the cart and
            // prints out _addItem for each
            
           <?php echo $produtosCheck; ?>
    
           
           _gaq.push(['_trackTrans']); //submits transaction to the Analytics servers

           (function() {
             var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
             ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
             var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
           })();

         </script>
         
      
 


