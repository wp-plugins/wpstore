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

$cartInfo = $Cart->getcartInfo();

$itemArr = array();


//Informações Vendedor
$emailVendedor= $paymentOpts['bankinfo'];
$filiacao = $paymentOpts['bank_accountid'];

$filiacao = "119843230001-83";

$numPedido = $orderNumber;

echo "Email Vendedor: $emailVendedor - FILIACAO : $filiacao <br/> ";


$tipoEntrega= $_REQUEST['entregaEspecial'];

if($tipoEntrega==""){$tipoEntrega="Normal";};
$tipoFrete = $_REQUEST['freteOpt'];
$dataEntrega = $_REQUEST['dataEntrega'];

$freteV = str_replace(",", "", $_REQUEST['freteV']);
if(intval($_REQUEST['freteV'])<=0){
$freteV = floatval($_REQUEST['freteV']);
}
 
$vfreteRedecard  =  str_replace(",", ".", $_REQUEST['freteV']); 

$subTotal = $_REQUEST['subTotal'];

$totalCompra = number_format(floatval(str_replace("R$","",$subTotal))+floatval($vfreteRedecard),2);


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

echo "Tipo de Entrega Escolhida : $tipoEntrega <br/>

      Frete Escolhido : $tipoFrete <br/>

      Valor do Frete : $freteV <br/> 

      data de entrega: $dataEntrega <br/>  

";

$userInfo = $General->getLoginUserInfo();

$user_address_info = unserialize(get_user_option('user_address_info', $userInfo['ID']));




// Criando um novo carrinho


$Array[]  =  array();        





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

  $var3 = str_replace($vowels,".", $cartInfo[$i]['product_qty']);
  $qtdy = intval($var3);

  if($pesoy==""){$pesoy=0.1;}  


/*
  	// Adicionando um produto
	$pgs->adicionar(array(
	  array(
	    "descricao"=>"".$strNew."",
	    "valor"=>"".$cartInfo[$i]['product_gross_price']."",
	    "peso"=>"$pesoy",
	    "quantidade"=>$qtdy,
	    "id"=>"".$cartInfo[$i]['product_id']."",
	    "frete"=>"".$freteV."",
	
	  ),
	));
	
	*/
	
   
	echo "<br/>INFORMAÇÕES DO CARRINHO : <br/>";
    echo "Nome do Produto : $strNew <br/>";  
    echo "Valor Produto : ".$cartInfo[$i]['product_gross_price']." <br/>"; 
    echo "Peso : $pesoy <br/>";
	echo "Qtd : $qtdy <br/>";   
	echo "id : ".$cartInfo[$i]['product_id']." <br/>";   
	echo "frete : $freteV<br/>";  
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

/*
if($userInfo) //simple checkout
{    
	
	
$name =  $userInfo['display_name'];         

$nome  = utf8_decode(trim(htmlentities(stripslashes($name), ENT_QUOTES,'utf-8')));              
 

  
echo"Usuário:$nome";      


$pgs->cliente(
  array (
   'nome'   => ''.$nome.'', 
   'cep'    => ''.$user_address_info['user_postalcode'].'',   
   'end'    => ''.$user_address_info['user_add1'].'',
   'num'    => ''. $user_address_info['user_add2'].'',
   'compl'  => ''.$user_address_info['user_complemento'].'',
   'bairro' => ''.$user_address_info['user_bairro'].'',
   'cidade' => ''.$user_address_info['user_city'].'',
   'uf'     => ''.$user_address_info['user_state'].'',
   'pais'   => ''.$user_address_info['user_country'].'',
   'ddd'    => ''.$user_address_info['user_ddd'].'',
   'tel'    => ''.$user_address_info['user_tel'].'',
   'email'  => ''.$userInfo['user_email'].''
  )
);  

}else{
	$pgs->cliente(
	array (
   'nome'   => ''.$_REQUEST['user_fname'].'',
   'cep'    => ''.$_REQUEST['user_postalcode'].'',
   'end'    => ''.$_REQUEST['user_add1'].'',
   'num'    => $_REQUEST['user_add2'],
   'compl'  => ''.$_REQUEST['user_complemento'].'',
   'bairro' => ''.$_REQUEST['user_bairro'].'',
   'cidade' => ''.$_REQUEST['user_city'].'',
   'uf'     => ''.$_REQUEST['user_state'].'',
   'pais'   => ''.$_REQUEST['user_country'].'',
   'ddd'    => ''.$_REQUEST['user_ddd'].'',
   'tel'    => ''.$_REQUEST['user_tel'].'',
   'email'  => ''.$_REQUEST['user_email'].''
  )
);
	
};

*/


// Mostrando o botão de pagamento

?>
<br/>
<br/>
<p>Subtotal: <?php echo $subTotal ; ?>  </p>
<p>Despesa de Frete: <?php echo $vfreteRedecard ; ?> </p>

<p>Total a pagar: <?php echo $totalCompra ; ?> </p>
<br/>


<?php






/*
Tipo de Transação Código
À vista
04
Parcelado Emissor
06
Parcelado Estabelecimento
08
*/
if($semjuros==true){
$transacao  = "08";
}else{
$transacao  = "06";	
}


$n_filiacao = "$filiacao";
$total = "$totalCompra";
$ip = $REMOTE_ADDR;

//$codver = RedeCard_CodVer($n_filiacao,$total,$ip);


?>

<div id="pagamento">

			<h4>Forma de Pagamento</h4>






            <form name="redecard" method="POST" action="https://comercio.locaweb.com.br/comercio.comp">

                <!-- Parâmetros obrigatórios -->
                
                <?php    $filicaoRedecardGateway =  get_option('filicaoRedecardGateway'); ?>
                
                <input type="hidden" name="identificacao" value="<?php echo $filicaoRedecardGateway; ?>">
                <input type="hidden" name="ambiente" value="producao">
                <input type="hidden" name="modulo" value="REDECARD">
                <input type="hidden" name="operacao" value="Pagamento">
                <br/>
                <img class="band" src="https://cfcarehospitalar.com.br/wp-content/themes/cfcare/images/mastercard.png" alt="mastercard" width="69" height="44" />
                <input type="radio" name="bandeira" value="MASTERCARD">
                 <br/>
                VISA<input type="radio" name="bandeira" value="VISA">
                 <br/>
                DINERS<input type="radio" name="bandeira" value="DINERS">
                 <br/>
                <input type="hidden" name="pedido" value="<?php echo $numPedido; ?>">
                <?php 
               
                $totalCompra =  $subTotal ;
                
               $valorFS  = str_replace(',','',$totalCompra);
               
               $valorF1 = str_replace('.','',$valorFS);
               
               $valorF = str_replace('R$','',$valorF1 );
               
               
               $totalCompra = 100;
                
               $valorF =  $totalCompra;
               
               echo "<br/>".$valorF."<br/>";
                
                 ?>
                <input type="hidden" name="valor" value="<?php echo $valorF; ?>">
                
                
                
      
                <!-- Parâmetros adicionais -->
                <input type="hidden" name="PAX1" value="">
À vista : <input type="radio" name="transacao" value="04"  /><br/>
Parcelado : <input type="radio" name="transacao" value="<?php echo $transacao ; ?>" />
        	    
        	    
        	                <div class="forme">

                	                   <select  name="parcelas">
                	                   <option value="01">Qtde.</option>
                	                   <option value="2">2</option>
                	                   <option value="3">3</option>
                	                   <option value="4">4</option>
                	                   <option value="5">5</option>
                	                   <option value="6">6</option>
                	                   <option value="7">7</option>
                	                   </select>
                	            </div>

                            <input type="hidden" name="juros" value="1">

        	       <?php /*         
                <input type="hidden" name="AVS" value="n">
                <input type="hidden"" name="RedecardIdioma" value="pt">
                
                */ ?>
                
                <input type="hidden" name="TARGET" value="https://cfcarehospitalar.com.br/wp-content/themes/cfcare/library/payment/Redecard/reciboRedecard.php">
                <input type="hidden" name="urlcima" value="https://cfcarehospitalar.com.br/wp-content/themes/cfcare/images/logo-cf-care.png">
                <input type="submit" value="Enviar">

            </form>







		</div><!-- Termina #pagamento -->


		<div class="clearfix container_message">
         <center><h1 class="head2"><?php _e('Pedido Finalizado . Para concluir o pedido escolha uma das formas  de pagamento  acima.');?></h1></center>
         <center>				
        </div>
 
 
 
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

 
 
 
<script>
//setTimeout("document.pagseguro.submit()",3000); 
</script>