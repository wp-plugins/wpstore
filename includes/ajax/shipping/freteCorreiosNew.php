<?php 
 
if($freteGratis == false){ 
	
    $moedaCorrente  =  get_option('moedaCorrenteWPSHOP');
    if($moedaCorrente==""){
      $moedaCorrente = "R$" ; 
    }
	
	 require_once('rsCorreios.php');

	 $freteRs = new RsCorreios();
 
	  $CEP_ORIGEM = "".$origemCep;
	  $CEP_DESTINO = "".$destinoCep;
	  $PESO = "".$peso;
	   
        $alturaS =  get_option('alturaEmbalagemCorreios');
        $larguraS= get_option('larguraEmbalagemCorreios');
        $comprimentoS = get_option('comprimentoEmbalagemCorreios');
 
	 // echo "BBBBBBBBB  $alturaS   ****   $larguraS **** $comprimentoS |||| $CEP_ORIGEM  ****  $CEP_DESTINO **** $PESO <br/> ";

	   
	   $arrSedex = $freteRs
	     ->setCepOrigem("".$CEP_ORIGEM)
	     ->setCepDestino("".$CEP_DESTINO)
	     ->setLargura("".$larguraS)
	     ->setComprimento("".$comprimentoS)
	     ->setAltura( "".$alturaS )
	     ->setPeso("".$PESO)
	     ->setFormatoDaEncomenda(RsCorreios::FORMATO_CAIXA)
	     ->setServico(empty($tipo) ? RsCorreios::TIPO_SEDEX : $data['tipo'])
	     ->dados();
	   
 
	   
       $valorSedex =  "".$arrSedex['valor'];    
	   
	   

       //print_r( $valorSedex);
      // echo "<<---teste2<br/>";
	
	  
	   $arrPac = $freteRs
	     ->setCepOrigem($CEP_ORIGEM)
	     ->setCepDestino($CEP_DESTINO)
	     ->setLargura($larguraS)
	     ->setComprimento($comprimentoS)
	     ->setAltura( $alturaS)
	     ->setPeso($PESO)
	     ->setFormatoDaEncomenda(RsCorreios::FORMATO_CAIXA)
	     ->setServico(empty($tipo) ? RsCorreios::TIPO_PAC : $data['tipo'])
	     ->dados();
	   
	  $valorPac = "".$arrPac['valor'];   
      
	   //print_r( $valorPac);
	  // echo "<<---teste3<br/>";
	   
	   
	
      //Prazo: $prazoSedex
      //Prazo:'.$prazoPac.' 
      $PAC = "";
	  $prazoSedexT =  "";
 
 if($peso<30){ 
   
 
   
      $PAC = "<input type='radio' name='radioFrete'  class='radioFrete'    rel='Pac'  id='Pac' value='".$valorPac."'  checked='checked' /> PAC :  $moedaCorrente <span  class='red' id='valorFretePAC' >".$valorPac."</span><br/> <small>Prazo Correios PAC : Capital 3 a 7 dias úteis. Interior 7 a 10 dias úteis. </small><hr/> ";  

  	   $prazoSedexT =  "<small> Prazo  Correios SEDEX :Capital 1 a 3 dias úteis. Interior 2 a 5 dias úteis.</small>";
   
   
 }else{
 	$prazoSedexT =  "<small> Prazo  Transportadora : Até 30 dias.</small>";
	
	$pesoReal = intval($pesoReal/$peso);
	
	$valorSedex = floatval($valorSedex)*$pesoReal;
    $valorSedex= number_format( $valorSedex, 2 ,  '.', '');
	
	
	
    //IMPOSTO ADICIONAL: -------------------------------
	$impostoAddTexto = get_option('impostoAddTexto');
	$impostoAddPct = floatval(get_option('impostoAddPct'));
	$impostoAddRegiao = get_option('impostoAddRegiao');
	
	 
    $cidadesFreteAdicional= $impostoAddRegiao ;
	
	$regiao = "";
	$valorAdd = "";
    $addCobranca = false;
    $arrayEstadosCidades = explode(',',$cidadesFreteAdicional);       

    foreach($arrayEstadosCidades as $item=>$value){    
   
        $arrayValue = explode('**',$value);   
   
           $estadoAdd = trim($arrayValue[0]);  
   
           $cidadeAdd  = trim($arrayValue[1]); 
		   
		   if($estadoAdd == $cidadeAdd && $estadoAdd !=""){
		   	
 	           if(  modificaAcento(strtolower($estado)) == modificaAcento(strtolower($estadoAdd)) ){   
 	              $addCobranca = true; 
				  $regiao .="$estado, ";
 	           };
			  
		   }else{
			   
 	          if(  modificaAcento(strtolower($cidadeUserF)) == modificaAcento(strtolower($value)) ){   
 	                $addCobranca = true; 
					$cidadeUs = str_replace('**','()',$cidadeUserF);
				    $regiao .="$cidadeUserF), ";
 	          };
		   	
		   };
           
    }
     
    $valorAdd = custom_get_total_price_session_order();
	if(strlen($valorAdd)>6){
     $valorAdd= str_replace('.','',$valorAdd);
    };  
    $valorAdd= floatval(str_replace(',','.',$valorAdd));//CENTAVOS CIELO
	$valorAdd +=$valorSedex;	
	$valorAdd = $valorAdd*$impostoAddPct/100;
	$valorAdd = number_format($valorAdd, 2 ,  '.', '');
	
	//if(current_user_can( 'manage_options' ) ){
		if ( $addCobranca ==true) {
		$cobrancaAdicional = "<span class='red'>Outras Taxas</span> :   $moedaCorrente<span id='taxaAdicional'>$valorAdd</span> <br/><small>  $impostoAddTexto , alicota de $impostoAddPct% sobre valor da nota fiscal  nas seguintes  regiões :  $regiao </small>";
	    };
	//};
	//IMPOSTO ADICIONAL -----------------------------------
	
	
	
	
 }
 
 
 
 $sedexNome = "SEDEX / TRANSPORTADORA";
 $sedexPrazos = "Capital 1 a 3 dias úteis. Interior 2 a 5 dias úteis.";
 if( $peso>=30){
 	$sedexNome = "TRANSPORTADORA";
	$sedexPrazos = "Até 15 dias úteis para entrega. Prazo a contar  da confirmação de pagamento";
 }
 
 

    $SEDEX = "  <input type='radio'  name='radioFrete' class='radioFrete'    rel='Sedex' id='Sedex' value='".$valorSedex."'  checked='checked' />   $sedexNome : $moedaCorrente <span  class='red'  id='valorFreteSEDEX' >".$valorSedex."</span>  <br/>  $sedexPrazos. <hr/> ";   
 
 
 
 
 $retirarLoja =get_option('retirarLoja');
$linkLojas = get_permalink(get_option('idPaginaRetiradaLojaWPSHOP')); 

echo'<div id="retorno" style="font-size:16px">';
 
 if($retirarLoja=='retirarLoja'){
	 echo "<div style='padding-top:5px'><input type='radio'  name='radioFrete' class='radioFrete'  rel='retirarLoja' id='retirarLoja' value='0.00' />Retirar na Loja
	 <span class='green' style='font-size:0.7em'>** Vou retirar a mercadoria na loja (Sem frete):  <a href='".$linkLojas."' target='_blank'>Consulte lojas </a></span><br/> <hr/></div>";
 };
 
 
 
echo' '.$PAC.'<div style="padding-top:5px">'.$SEDEX.'</div>  '.$cobrancaAdicional.'   </div>';  
	

	
}else{ 
	
 
    echo'<div id="retorno"><span style="color:green">FRETE GRÁTIS PARA SUA REGIÃO. APROVEITE !  </div>';          
	
};



?>