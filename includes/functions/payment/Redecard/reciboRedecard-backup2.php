<?php
if(!isset($_SESSION)){
    session_start();
};
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

//echo "<br/>$valorTotal  |||  $parc <br/>";

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



$DATA = $_GET['DATA'];//8 Data da transação
$NUMPEDIDO = $_GET['NUMPEDIDO']; //16 Número do Pedido
$NR_CARTAO = $_GET['NR_CARTAO']; //16 Número do Cartão mascarado
$ORIGEM_BIN = $_GET['ORIGEM_BIN']; //3 Código de Nacionalidade do Emissor
$NUMAUTOR = $_GET['NUMAUTOR']; //6 Número de Autorização
$NUMCV = $_GET['NUMCV']; //9 Número do Comprovante de Venda (NSU)
$NUMAUTENT = $_GET['NUMAUTENT']; //27 Número de Autenticação
$NUMSQN = $_GET['NUMSQN']; //12 Número seqüencial único
$NUMPRG = $_GET['NUMPRG']; //1 Número correspondente ao programa de captura utilizado

///CASO DE ERROS
$CODRET = $_GET['CODRET']; //2 Código de erro
$MSGRET = $_GET['MSGRET']; //200 Mensagem de erro
if( !isset($CODRET))  {
    
    
       $parcelas = "";
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
    
    
  $total = substr($total, 0, (strlen($total)-2)) . "." . substr($total,-2);
  
    $url= "http://ecommerce.redecard.com.br/pos_virtual/confirma.asp?"
              ."DATA=$DATA&"    
                  ."TRANSACAO=203&"
                  ."TRANSORIG=$trans_orig&"
                  ."PARCELAS=$parcelas&"
                  ."FILIACAO=$numafiliacao&"
                  ."DISTRIBUIDOR=&"
                  ."TOTAL=$total&"
                  //."TOTAL=0.01&"
                  ."NUMPEDIDO=$NUMPEDIDO&"
                  ."NUMAUTOR=$NUMAUTOR&"                  
                  ."NUMCV=$NUMCV&"                
                  ."NUMSQN=$NUMSQN&"      
                  ."ORIGEM_BIN=$ORIGEM_BIN&"
                  ."NUMPRG=$NUMPRG";    

         //AQUI JA FOI ENVIADA A SEGUNDA FASE3 E AGORA ESTA RECEBENDO O CÓDIGO DE CONFIRMAÇÃO.
                 //A função file irá enviar a url para a Redecard sem redirecionar(sair da NatureLavie) e, ao mesdo tempo, receber o rerorno da Redecdard
                  $file = file($url); 
                          $retorna = $file[0]; 
                          $arrLinhas = explode("&", $retorna);
                          $i = 0; 
                          foreach ($arrLinhas AS $line) { 
                                 list($variavel, $valor) = explode('=', ($line)); 
                                 $variavel = trim($variavel); 
                                 $$variavel = $valor ; 
                                 $i ++; 
                                 print $variavel;
                                 print "<br>";
                                 print $valor;                           
                                                        }
                                $status = $_REQUEST['CODRET'];
                    if ($status > 1) {
                       $autent = $_REQUEST['MSGRET'];
                    }else {
                       $URLCupom = "https://ecommerce.redecard.com.br/pos_virtual/cupom.asp?DATA=" . $data . "&TRANSACAO=201&NUMAUTOR=" . $arp . "&NUMCV=" . $cv;                                                                                       
?>

<script LANGUAGE=javascript>
<!--
        vpos=window.open('<? echo $URLCupom; ?>','vpos','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=auto,resizable=no,copyhistory=no,width=280,height=440');
//-->
</SCRIPT>
<?
                    }           
                 } else if (
                  $CODRET==50 or $CODRET==52 or $CODRET==54 or $CODRET==55 or $CODRET==57 or $CODRET==59 or $CODRET==61 or 
                  $CODRET==62 or $CODRET==64 or $CODRET==66 or $CODRET==67 or $CODRET==68 or $CODRET==70 or $CODRET==71 or 
                  $CODRET==73 or $CODRET==75 or $CODRET==78 or $CODRET==79 or $CODRET==80 or $CODRET==82 or $CODRET==83 or 
                  $CODRET==84 or $CODRET==85 or $CODRET==87 or $CODRET==89 or $CODRET==90 or $CODRET==91 or $CODRET==93 or 
                  $CODRET==94 or $CODRET==95 or $CODRET==97 or $CODRET==99
                 )
                                                         { print $CODRET."-".$MSGRET;  exit; }
else if  ( $CODRET==51 or $CODRET==92 or $CODRET==98  )  { print $CODRET."-".$MSGRET;  exit; }
else if  ( $CODRET==53                                )  { print $CODRET."-".$MSGRET;  exit; }
else if  ( $CODRET==76 or $CODRET==86                 )  { print $CODRET."-".$MSGRET;  exit; }
else if  ( $CODRET==58 or $CODRET==63 or  $CODRET==65 or  $CODRET==69 or  $CODRET==72 or  $CODRET==77 or $CODRET==96  )  
                                                         { print $CODRET."-".$MSGRET;  exit; }
else if  ( $CODRET==56 or $CODRET==60                 )  { print $CODRET."-".$MSGRET;  exit; }
else if  ( $CODRET==74                                )  { print $CODRET."-".$MSGRET;  exit; }
else if  ( $CODRET==81                                )  { print $CODRET."-".$MSGRET;  exit; }
?>