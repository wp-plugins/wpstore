<?php
$moedaCorrente  =  get_option('moedaCorrenteWPSHOP');
if($moedaCorrente==""){
  $moedaCorrente = "R$" ; 
}
?>
    
    
<?php

//$emailVendedor= $paymentOpts['bankinfo'];
//$filiacao = $paymentOpts['bank_accountid'];
$emailVendedor = get_option('emailRedecard');
$filiacao =  get_option('filicaoRedecard');
$idPedido = $idPedido;

$plugin_directory = str_replace('functions/','functions/',plugin_dir_url( __FILE__ ));
$imgTopo = "https://cfcarehospitalar.com.br/wp-content/themes/cfcare/images/logo-cf-care.png";
 
$frete="";
if($tipoFrete=="SEDEX"){	
$frete="SD";
}elseif($tipoFrete=="PAC"){
$frete="EN";	
};


$totalCompra = 0;
 
// Incluindo o arquivo da biblioteca 	 Outras Informações
 
$Array[] = array();        
 
    $tabela = $wpdb->prefix."";
    $tabela .=  "wp_store_orders_products";
    
    $fivesdrafts = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM  `$tabela` WHERE `id_usuario`='$idUser' AND `id_pedido`='$idPedido' ORDER BY `id`  ASC  " ,1,'' ) );
 
    // Adicionando PRODUTOS
 
    foreach ( $fivesdrafts as $item=>$fivesdraft ){
        
       
        
        $idPedido = $fivesdraft->id_pedido;
        $idProduto = $fivesdraft->id_produto;
     
        
        $vowels = array(",");
       
        $preco = $fivesdraft->preco;
        $preco = str_replace(".","", $preco);
        $preco = str_replace($vowels,".", $preco);
        $preco = floatval($preco);
        $qtd = $fivesdraft->qtdProd;
        $qtd = floatval($qtd);
        $variacao = $fivesdraft->variacao;
        $precoAlt = $fivesdraft->precoAlt; 	
        $precoAlt = str_replace($vowels,".", $precoAlt);
        $precoAlt = floatval($precoAlt);
        $precoAltSymb= $fivesdraft->precoAltSymb; 
        
        $frete = str_replace($vowels,".", $frete );
        $frete  = floatval($frete );
        
        $precoFinal =  $preco + $precoAlt;
        if($precoAltSymb=="-"){
        $precoFinal =  $preco - $precoAlt;    
        }
        
        $totalCompra +=$precoFinal;
 
   
      $var = str_replace($vowels,".", get_post_meta($idProduto,'weight',true)) ;
      $peso = floatval($var);
 
      
      $str_utf8 = get_the_title($idProduto)." - ".$variacao."";    
      
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
        
 
	   $produtosCheck .= " _gaq.push(['_addItem',
            '$idPedido',           // order ID - required
            '".$idProduto."',           // SKU/code - required
            '".$strNew."',        // product name
            '".$peso."',   // category or variation
            '".$precoFinal."',          // unit price - required
            '".$qtd."'               // quantity - required
          ]); ";
 
	
	
	
	
	
	$freteV = 0;    
	 
}; //End If Pagseguro Add
   

 
?>


<?php



    $tabela = $wpdb->prefix."";
   $tabela .=  "wp_store_orders_address";

   $fivesdrafts = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM  `$tabela` WHERE `id_usuario`='$idUser' AND `id_pedido`='$idPedido' ORDER BY `id`  ASC  "  ,1,'') );

   // Adicionando PRODUTOS

   foreach ( $fivesdrafts as $item=>$fivesdraft ){
    
   
 
    $userEndereco = $fivesdraft->endereco;
    $userEnderecoNumero = $fivesdraft->numero;
    $userComplemento = $fivesdraft->complemento;
    $userCidade = $fivesdraft->cidade;
    $userBairro = $fivesdraft->bairro;
    $userEstado = $fivesdraft->estado;
    $userCep = $fivesdraft->cep;
    
    
    
    global $current_user;
    
    get_currentuserinfo();
    
    $idUser = $current_user->ID;
    $userLogin = $current_user->user_login;
    $userEmail = $current_user->user_email;
  
    $pesoTotal = $peso;

    $displayNameUser = trim("$current_user->user_firstname $current_user->user_lastname"); 
    if($displayNameUser ==""){$displayNameUser=$userLogin;};

    $userPais = trim(get_user_meta($idUser,'userPais',true));if($userPais==""){$userPais="Brasil";};
    $userDDD = trim(get_user_meta($idUser,'userDDD',true));if($userDDD==""){$userDDD="";};
    $userTelefone = trim(get_user_meta($idUser,'userTelefone',true));if($userTelefone==""){$userTelefone="";};
    
    $displayNameUser  = utf8_decode(trim(htmlentities(stripslashes($displayNameUser), ENT_QUOTES,'utf-8')));              
 
    //echo"Usuário:$nome";      
 
   $cidade = $userCidade;
   $estado = $userEstado;

 
 
// Mostrando o botão de pagamento
//$pgs->mostra();
 
?>
 
	  
<?php  }; 
        
         $vt = $valor_total;
         $vt = str_replace('.','',$vt);
         $vt = str_replace(',','.',$vt);
         $vt = floatval($vt);
         $cupom =   get_session_cupom();
     
         $desconto = 0.00;
         $msg = "";
         $numeroCupom  = $cupom[0];
         
         if($cupom[1]=="Valor"){ 
             $msg =  $cupom[1]." $moedaCorrente".$cupom[2];
             //$desconto = floatval(str_replace(',','.',$cupom[2]));
         }elseif($cupom[1]=="Percentual"){
             $msg = $cupom[1]." " .$cupom[2]."%" ;  
             //$desconto = ( $vt*floatval(str_replace(',','.',$cupom[2])) ) / 100 ;
         }; 
 
         $totalCompra =    	$totalPagto;
 	?>
 
    <?php $txtPrint .= "<br/>
       <h3 style='width:92;background:#ddd;margin-left:5px;padding:20px;text-align:center;font-size:1.2em'  >Total a pagar: $moedaCorrente".getPriceFormat($totalCompra)." </h3>";  
    ?>
    

    <?php

    $_SESSION['vt']  =   $totalCompra;

    ?>
   <?php $txtPrint .= "	    <br/>"; ?>


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
    
    $semjuros = true;
    
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
    
        <?php    $filicaoRedecardGateway =  get_option('filicaoRedecardGateway'); ?>
    
    
    <?php $txtPrint .= "	   

    <div id='pagamento'>

    			<h4>Escolha a bandeira de Pagamento</h4>
 
                <form name='redecard' method='POST' action='https://comercio.locaweb.com.br/comercio.comp'>

                    <!-- Parâmetros obrigatórios -->
                    <input type='hidden' name='identificacao' value='$filicaoRedecardGateway'>
                    <input type='hidden' name='ambiente' value='producao'>
                    <input type='hidden' name='modulo' value='REDECARD'>
                    <input type='hidden' name='operacao' value='Pagamento'>
                    <br/>
                    <img class='band' src='".$plugin_directory."images/mastercard.png' alt='mastercard' width='69' height='44' />
                    MASTER<input type='radio' name='bandeira' value='MASTERCARD' checked='yes'>
                     <br/>
                     <img class='band' src='".$plugin_directory."images/visa.png' alt='mastercard' width='69' height='44' />
                    VISA<input type='radio' name='bandeira' value='VISA'>
                     <br/>
                     <img class='band' src='".$plugin_directory."images/diners.png' alt='mastercard' width='69' height='44' />
                    DINERS<input type='radio' name='bandeira' value='DINERS'>
                     <br/>
                    <input type='hidden' name='pedido' value='$idPedido'   />"; ?>
                    
                    
                    
                    
                          <?php 

                            //$totalCompra =  $subTotal ;

                           $valorFS  = str_replace(',','',  getPriceFormat($totalCompra) );

                           $valorF1 = str_replace('.','',$valorFS);

                           // $valorF = str_replace($moedaCorrente,'',$valorF1 );
                          
                           $valorF = $valorF1;
                 
                          // $totalCompra = 100;$valorF =  $totalCompra;

                           //echo "<br/>".$valorF."<br/>";

                           $_SESSION['vt']  = $valorF;
                           $_SESSION['parc'] = "01";

                          ?>
                             
                             
               
                 <?php $txtPrint .= "   <input type='hidden' name='valor' value='$valorF'> 

                    
                    <br/><br/>


                    <!-- Parâmetros adicionais -->
                    <input type='hidden' name='PAX1' value='' class='parcela' >

                     À vista : <input type='radio' name='transacao' value='04'  class='parcela'  CHECKED='CHECKED' /><br/>
                      ";
                      
                      if($valorF>1000){
                            $txtPrint .=   "Parcelado : <input type='radio' name='transacao' value='$transacao' class='parcela' /> ";
                      }else{
                          
                      };
                      
                      $txtPrint .=   "<p style='font-size:10px' >*Parcelamento em até 6X sem juros : Somente nas compras cima de  R$10.00  (Parcela mínima de R$3.00)</p>";
                    
                    $txtPrint .="
                                    <br/>
            	                <div class='forme' id='parcelasDiv'  style='display:none' >

                    	                   <select  id='parcelas' name='parcelas'  >
                                             <option value='01' selected >1 Parcela</option>";
                                             
                    if($valorF/2 > 300){                       
                    $txtPrint .="<option value='2' >2 Parcelas</option>";
                    }
                    if($valorF/3 > 300){   	                     
                    $txtPrint .="<option value='3'>3 Parcelas</option>";
                    } 
                    if($valorF/4 > 300){ 	                     
                    $txtPrint .=" <option value='4'>4 Parcelas</option>";
                    } 
                    if($valorF/5 > 300){ 	                     
                    $txtPrint .="<option value='5'>5 Parcelas</option>";
                    }  
                    if($valorF/6 > 300){	                     
                    $txtPrint .="<option value='6'>6 Parcelas</option>";
                    }    	                     
                       	                     
                    $txtPrint .="</select>
                                     
                    	            </div>

                                <input type='hidden' name='juros' value='1'>
                                
                                 ";   ?>

            	       <?php /*         
                    <input type="hidden" name="AVS" value="n">
                    <input type="hidden"" name="RedecardIdioma" value="pt">

                    */ ?>





  <?php
  
  $imgTarg = $plugin_directory.'topoLOGO.jpg';
  
   $txtPrint .= "  
   
                    <input type='hidden' name='TARGET' value='".$plugin_directory."reciboRedecard.php'>
                    <input type='hidden' name='urlcima' value='$imgTarg'>
                    
               
                        <br/><br/>
                        
                    <input type='submit' value='Realizar Pagamento'>

                </form>
 

    	   	</div><!-- Termina #pagamento -->

             <br/> <br/><br/>
    		 <div class='clearfix container_message'>
             <center><h4 class='head2'>Pedido Finalizado . Para concluir o pedido escolha uma das formas  de pagamento  acima.</h4></center>
             <center>				
             </div>

    
    
    
    
            <script>




                  jQuery('.parcela').change(function() {

                         qtdParc = jQuery(this).val();

                         if(qtdParc=='04'){
                            jQuery('#parcelasDiv').hide();  
                            jQuery('#parcelas').attr('selectedIndex', '0');


                         }else{
                            jQuery('#parcelasDiv').show();
                         }

                         qtdParc = jQuery('#parcelas').val();
                         enviaParcela(qtdParc);


                    });

                    jQuery('#parcelas').change(function() {

                             qtdParc = jQuery(this).val();
                             enviaParcela(qtdParc);


                    });


                  function   enviaParcela(parcela){

                   // alert(parcela);
                     var baseUrl = jQuery('meta[name=urlShop]').attr('content');
                     baseUrl = baseUrl.replace('ajax', 'functions');
                    jQuery.post(baseUrl+'payment/Redecard/confirmaIntencaoPagtoRedecard.php', { parc: parcela },
                        function(data) {
                         //alert('Enviou...');
                     });

                 };



                </script>

                
                    
                    
                    
    
    
    
    
	
    <script type='text/javascript'>
    pageTracker._addTrans(
          '$idPedido', // required
          '".get_bloginfo('name')."',
          '$totalCompra',
          '0.00',
          '$frete',
          'city',
          'state',
          'country'
    ); 

    pageTracker._addItem(
          '$idPedido', // required
          'prod2011',
          '".get_bloginfo('name')."',
          'produto',
          '$totalCompra',  // required
          '1'  //required
    ); 

    pageTracker._trackTrans();
    </script>
    
    
	
		 
 
 
 
         <script type='text/javascript'>

           var _gaq = _gaq || [];
           _gaq.push(['_setAccount', 'UA-6597604-38']);
           _gaq.push(['_trackPageview']);
           _gaq.push(['_addTrans',
             '$idPedido',           // order ID - required
             '".get_bloginfo('name')."',  // affiliation or store name
             '$totalCompra',          // total - required
             '0.00',           // tax
             '$frete',              // shipping
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

         </script>
 


<script>
//setTimeout('document.pagseguro.submit()',3000); 
</script>

";

?>