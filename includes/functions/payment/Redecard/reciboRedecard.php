<?php
 session_start();
?>
<!--
'-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#
' Kit de Integração Redecard
' Versão: 3.0
' Arquivo: reciboRedecard.php
' Função: Página de retorno da transação
'-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#
-->
<?php
 
$valorTotal = $_SESSION['vt'];
$parc = $_SESSION['parc'];

//$valorTotal = "100";
//$parc = "01";

//echo "<br/>$valorTotal  ||| ||| ||| ||| ||| ||| |||  $parc <br/>";

ini_set("allow_url_fopen", 1); // Ativa a diretiva 'allow_url_fopen' para uso do 'fsockopen'

// ******************************** Dados obtidos de sua loja ***************
// valor total da compra (sem formatação).
$total = $valorTotal;
// número de parcelas da compra
$numparcelas = $parc;
// número de afiliação junto à Redecard
$numafiliacao = "37642863";

// habilita cobrança de juros em parcelamento de compras. 0 = desativa , 1 = ativa

$RedeCardJurosParcelado = 0;

if( intval($numparcelas) >6){
    
$RedeCardJurosParcelado = 1;    

}



// ********************* Dados obtidos do retorno da Redecard ***************
// codigo da autorizacao, se tiver
$arp = $_REQUEST['NUMAUTOR'];
// comprovante de venda
$cv = $_REQUEST['NUMCV'];
// número sequencial unico da transação
$sqn = $_REQUEST['NUMSQN'];
// data da transação
$data = $_REQUEST['DATA'];
// Codigo de retorno AVS
$cravs = $_REQUEST['RESPAVS'];
// Mensagem de retorno do AVS
$mensavs = $_REQUEST['MSGAVS'];
// Número do pedido
$numpedido = $_REQUEST['NUMPEDIDO'];

// status transacao
if ($_REQUEST['CODRET'] != "" && $_REQUEST['CODRET'] != "0"){
   $status = $_REQUEST['CODRET'];
   $autent = $_REQUEST['MSGRET'];
} else {
   $status = 0;
   // numero da autenticacao
   $autent = $_REQUEST['NUMAUTENT'];
}

// ************************ Confirma transação com a Redecard ***************
if ($status == 0) {
    
    $valores = "DATA=" . $data;
    $valores = $valores . "&TRANSACAO=203";
    
        if (strlen($numparcelas) == 1){
	       $parcelas = "0" . $numparcelas;
        } else {
	       $parcelas = $numparcelas;
		}

        if ($parcelas == "01" || $parcelas == "00" || $numparcelas == ""){
	          $parcelas = "00";
	          $trans_orig = "04";
        } else {
	        if ($RedeCardJurosParcelado == 1){
		       $trans_orig = "06";
	        } else {
		       $trans_orig = "08";
	        }
        }
    $valores = $valores . "&TRANSORIG=" . $trans_orig;
    $valores = $valores . "&PARCELAS=" . $parcelas;
    $valores = $valores . "&FILIACAO=" . $numafiliacao;
	$valores = $valores . "&DISTRIBUIDOR="; // este campo deve ser nulo
    $total = substr($total, 0, (strlen($total)-2)) . "." . substr($total,-2);
    $valores = $valores . "&TOTAL=" . $total;
    $valores = $valores . "&NUMPEDIDO=" . $numpedido;
    $valores = $valores . "&NUMAUTOR=" . $arp;
    $valores = $valores . "&NUMCV=" . $cv;
    $valores = $valores . "&NUMSQN=" . $sqn;

	// contacta RedeCard e confirma transação
	$filename="http://ecommerce.redecard.com.br/pos_virtual/confirma.asp?" . $valores;
	
    $file = file($filename); 
    
    //print_r($file);
    
	$retorna = $file[0]; 
	
	$arrLinhas = explode("&", $retorna);
	$i = 0; 
	foreach ($arrLinhas AS $line) { 
	   list($variavel, $valor) = explode('=', ($line)); 
	   $variavel = trim($variavel); 
	   $$variavel = $valor ; 
	   $i ++; 
	}

	$status = $_REQUEST['CODRET'];
	if ($status > 1) {
	   $autent = $_REQUEST['MSGRET'];
	}
}	

// **************************** Em caso de falha na transação ***************
if ($status > 1){
 	echo $status . "<br>";
	echo htmlspecialchars(urldecode($autent));
    Exit();
}


if ($status == 1){
//	echo "Compra já confirmada.";
}

// ************** Em caso de transação aprovada ***************
//echo "Sua compra foi aprovada." . "<br>";
//echo $numpedido . "<br>";
//echo $data . "<br>";
//echo $cv;

// ************************** Monta o cupom *********************************
$URLCupom = "https://ecommerce.redecard.com.br/pos_virtual/cupom.asp?DATA=" . $data . "&TRANSACAO=201&NUMAUTOR=" . $arp . "&NUMCV=" . $cv;

?>
 
<?php
$CODRET = $_GET['CODRET']; //2 Código de erro
$MSGRET = $_GET['MSGRET']; //200 Mensagem de erro
$numpedido = $_REQUEST['NUMPEDIDO'];
 
    if ($CODRET==50 or $CODRET==52 or $CODRET==54 or $CODRET==55 or $CODRET==57 or $CODRET==59 or $CODRET==61 or 
    $CODRET==62 or $CODRET==64 or $CODRET==66 or $CODRET==67 or $CODRET==68 or $CODRET==70 or $CODRET==71 or 
    $CODRET==73 or $CODRET==75 or $CODRET==78 or $CODRET==79 or $CODRET==80 or $CODRET==82 or $CODRET==83 or 
    $CODRET==84 or $CODRET==85 or $CODRET==87 or $CODRET==89 or $CODRET==90 or $CODRET==91 or $CODRET==93 or 
    $CODRET==94 or $CODRET==95 or $CODRET==97 or $CODRET==99){ 
        $_SESSION['msgRedecard'] =  $CODRET."-".$MSGRET;  
      
     }else if  ( $CODRET==51 or $CODRET==92 or $CODRET==98)  { 
        $_SESSION['msgRedecard'] = $CODRET."-".$MSGRET;  
     
    }else if  ( $CODRET==53)  { 
        $_SESSION['msgRedecard'] = $CODRET."-".$MSGRET;  
     
    }else if  ( $CODRET==76 or $CODRET==86)  { 
        $_SESSION['msgRedecard'] =  $CODRET."-".$MSGRET;  
       
    }else if  ( $CODRET==58 or $CODRET==63 or  $CODRET==65 or  $CODRET==69 or  $CODRET==72 or  $CODRET==77 or $CODRET==96  ) { 
        $_SESSION['msgRedecard'] =  $CODRET."-".$MSGRET;  
       
    }else if  ( $CODRET==56 or $CODRET==60)  { 
        $_SESSION['msgRedecard'] =  $CODRET."-".$MSGRET;  
       
    }else if( $CODRET==74)  { 
        $_SESSION['msgRedecard'] =  $CODRET."-".$MSGRET;  
        
    }else if  ( $CODRET==81) { 
        $_SESSION['msgRedecard'] =  $CODRET."-".$MSGRET; 
        
    }
    
    
    if($_SESSION['msgRedecard'] !="" ){
      
    }else{
        
         if($valorTotal !="" && $parc !="" ){
         $_SESSION['msgRedecardOK'] = "true";
         }
         
    };
    

?>


<SCRIPT LANGUAGE=javascript>

<!--
vpos=window.open('<? echo $URLCupom; ?>','vpos','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=auto,resizable=no,copyhistory=no,width=600,height=460');
//-->
 
</SCRIPT>




<?php
$numpedido = $_REQUEST['NUMPEDIDO'];
if($numpedido !=""){$_SESSION['numpedido'] = $numpedido; };
$erroREDECARD = $_SESSION['msgRedecard'];


if($_REQUEST['CODRET']!=""){
      $_SESSION['msgRedecard'] = "";
      $urlPagtoPedido = get_bloginfo('url')."/pedido/?order=$numpedido#pagamento";
      
      $error .= "<br/><strong>RETORNO PEDIDO:$numpedido</strong><br/><br/><span style='color:red'>".str_replace('%E3','ã',$_REQUEST['MSGRET'])."<br/>"; 
      $error .=  "ERRO ".utf8_encode($_REQUEST['CODRET'])."</span><br/>".utf8_encode($erroREDECARD)."";
      $error .=  "<br/><br/><a href='$urlPagtoPedido'>CLIQUE AQUI PARA TENTAR PAGAR NOVAMENTE </a><br/><br/>";
      
      alteraPedidoStatus($numpedido,'PENDENTE',"TENTATIVA DE PAGAMENTO (".gmdate('d')."/".gmdate('m')."/".gmdate('Y').") : ERRO ".utf8_encode($_REQUEST['CODRET']).' - '.str_replace('%E3','ã',$_REQUEST['MSGRET']));
      
  	  $error .=  "<br/><h4 style=>Seu comprovante de pagamento não foi exibido ou apareceu uma mensagem de erro :</h4>
  	  <p>1 - Antes de tentar novamente certifique-se de não ter habilitado em seu navegador o bloqueio a popup pois seu comprovante será emitido em uma nova janela.</p>
  	
  	  <p><a href='".verifyURL($urlPagtoPedido)."'>CLIQUE AQUI TENTAR PAGAR NOVAMENTE</a></p>  ";

  	  $error .= "<p>2- Se   uma mensagem  em vermelho foi  exibida , siga as instruções fornecidas  ou entre em <a href='".verifyURL(get_bloginfo('url'))."/contato'>contato conosco</a></p>."; 
  	  
  	  $error .=  "<br/><p>3 - Seu pedido também está salvo e ficará disponível para pagamentos em sua conta pelos próximos dias . Acesse  <a href='".verifyURL(get_bloginfo('url'))."/pedidos/'>Meus Pedidos</a> para verificar sua lista de pedidos.</p><br/>";
     
     
      $_SESSION['msgRedecard'] = $error;
      
      $redirect = verifyURL(get_bloginfo('url'))."/pedidos/";
      
      echo "<script>window.location='$redirect'</script>";
  
}else{
   
    $msg = "PEDIDO REGISTRADO - VERIFICANDO PAGAMENTO.";
    alteraPedidoStatus($numpedido,'VERIFICANDO',$msg);
       
};

       $idPage = get_idPaginaPedidos();
          $page  = get_permalink($idPage);

?>

<SCRIPT LANGUAGE=javascript>
 
window.location = "<?php echo $page; ?>";

</SCRIPT>

