<?php

 $moedaCorrente  =  get_option('moedaCorrenteWPSHOP');
 if($moedaCorrente==""){
   $moedaCorrente = "R$" ; 
 }

 function calculaFrete($cod_servico, $cep_origem, $cep_destino, $peso, $altura='5', $largura='20', $comprimento='30', $valor_declarado='0.50')
 {
     #OFICINADANET###############################
     # Código dos Serviços dos Correios
     # 41106 PAC sem contrato
     # 40010 SEDEX sem contrato
     # 40045 SEDEX a Cobrar, sem contrato
     # 40215 SEDEX 10, sem contrato
     ############################################


     /**/
      $alturaS =  get_option('alturaEmbalagemCorreios');
      $larguraS= get_option('larguraEmbalagemCorreios');
      $comprimentoS = get_option('comprimentoEmbalagemCorreios');


     if(intval($alturaS)>0){
       $altura =  $alturaS;  
     }

     if(intval($larguraS)>0){
       $largura= $larguraS;  
     }

     if(intval($comprimentoS)>0){
      $comprimento =  $comprimentoS;  
     }




     $correios = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=&sDsSenha=&sCepOrigem=".$cep_origem."&sCepDestino=".$cep_destino."&nVlPeso=".$peso."&nCdFormato=1&nVlComprimento=".$comprimento."&nVlAltura=".$altura."&nVlLargura=".$largura."&sCdMaoPropria=n&nVlValorDeclarado=".$valor_declarado."&sCdAvisoRecebimento=s&nCdServico=".$cod_servico."&nVlDiametro=10&StrRetorno=xml";
     $xml = simplexml_load_file($correios);
     if($xml->cServico->Erro == '0')
         return $xml->cServico->Valor;
     else
         return false;
 };
/*
echo "<br><Br>Cálculo de FRETE PAC: ". 
calculaFrete('41106','24340000','24340160','4')."<br>";

echo "<br><Br>Cálculo de FRETE SEDEX: ". 
calculaFrete('40010','24340000','24340160','4')."<br>";

echo "<br><Br>Cálculo de FRETE SEDEX a cobrar: ". 
calculaFrete('40045','24340000','24340160','4')."<br>";

echo "<br><Br>Cálculo de FRETE SEDEX 10: ". 
calculaFrete('40215','24340000','24340160','4')."<br>";
*/


$origemCep =  get_option('cepOrigemCorreios');


global $current_user;
get_currentuserinfo();
$idUser = $current_user->ID;
 
$userCidade2 = $_POST['cidadeV'];
$tipoPagto = $_POST['varSelectV'];

 
$destinoCep = trim($_REQUEST['CepDestinoR']);
if($destinoCep==""){
$destinoCep = trim(get_user_meta($idUser,'userCep2',true));
}
$destinoCep = str_replace(' ','',$destinoCep);

$valorFreteEnviado = $_POST['radioFrete'];
$comentario = $_POST['commentOrderV'];



if($userCidade2 ==""){
$userCidade2 = trim(get_user_meta($idUser,'userCidade2',true)); 
};



 $peso = floatval($_REQUEST['PesoR']);
if($peso<=0){
$peso = floatval($_SESSION['pesoCheckout']);
}

 
if($peso>30){
$peso  = 30;	
}
 

   $freteGratis = false;
 
   $cidadesFreteGratis = get_option('cidadesFreteGratis');
   //$arrayCidades = array('Niterói','Niteroi','São Gonçalo','Sao Gonçalo','Rio Bonito','Maricá','Marica','Itaborai','Itaboraí');

   $arrayCidades = array();
   $arrayEstados = array();

   $arrayEstadosCidades = explode(',',$cidadesFreteGratis);
   foreach($arrayEstadosCidades as $item=>$value){
       $arrayValue = explode('**',$value);
       $arrayEstados = trim($arrayValue[0]);
       $arrayCidades = trim($arrayValue[1]); 


       if(strtolower($arrayValue[1]) == strtolower($userCidade2)){   
       $freteGratis = true; 
       };

   }

 

if(trim($userCidade2) ==""){
	$freteGratis = false;
}

$salvar = false;

if($freteGratis == false){ 
  
       //echo "$origemCep  ****  $destinoCep **** $peso";
       
       //$valorSedex = "".calculaFrete('40010',''.$origemCep.'',''.$destinoCep.'',''.$peso.'')."";     
       //$valorPac =  "".calculaFrete('41106',''.$origemCep.'',''.$destinoCep.'',''.$peso.'')."";   
       $valorSedex = 0.00;     
       $valorPac =  0.00;
          
       if(floatval($valorSedex)<1 || floatval($valorPac)<1){
            require_once('freteCorreios2011-pgs.php');
       }

    
    
    

    $PAC = "<input type='radio' name='radioFrete'  class='radioFrete'    rel='Pac'  id='Pac' value='".$valorPac."' /> PAC :  $moedaCorrente <span  class='red' id='valorFretePAC' >".$valorPac."</span>";   

    $SEDEX = " <input type='radio'  name='radioFrete' class='radioFrete'  checked='checked'  rel='Sedex' id='Sedex' value='".$valorSedex."' />  SEDEX : $moedaCorrente <span  class='red'  id='valorFreteSEDEX' >".$valorSedex."</span>";     
 
	echo'<div id="retorno" style="font-size:16px">'.$SEDEX.'<div style="padding-top:5px">'.$PAC.'</div><br/></div>';

	
}else{ 
	
 
    echo'<div id="retorno"><span style="color:green">FRETE GRÁTIS PARA SUA REGIÃO. APROVEITE !  </div>';          
	
};



?>