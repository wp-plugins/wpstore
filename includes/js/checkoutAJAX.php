<?php

require("../../../../../../wp-load.php");

 
 
 global $current_user;
 get_currentuserinfo();
 $idUser = $current_user->ID;
       
$msgF = "";

$moedaCorrente  =  get_option('moedaCorrenteWPSHOP');
if($moedaCorrente==""){
  $moedaCorrente = "R$" ; 
}

 
$tipoFrete =get_option('tipoFrete');
$freteGratis = false;

  $correios = $_POST['correios'];
  $tipoPagto = $_POST['varSelectV'];
  $peso = $_SESSION['pesoCheckout'];
  $valorFreteEnviado = $_POST['radioFrete'];
  $comentario = $_POST['commentOrderV'];



 $destinoCep = trim(get_user_meta($idUser,'userCep2',true)); 
 $destinoCep = str_replace(' ','',$destinoCep);     

 if($destinoCep==""){
     $destinoCep = trim(get_user_meta($idUser,'userCep',true)); 
     $destinoCep = str_replace(' ','',$destinoCep);
 }


 $cep = $destinoCep;   


   $cidade= "";

 //Pegando cidade com base no CEP --------------------------------------------- 
      $caputurar = true;
      //include('buscaEndereco.php');
 //Pegando cidade com base no CEP --------------------------------------------- 
        


  
 if($cidade==""){   
 $cidade=  trim(get_user_meta($idUser,'userCidade2',true)); 
 }; 
 if($cidade==""){
    $cidade =   trim(get_user_meta($idUser,'userCidade',true));
 };










 //CURL FOLLOW -------------------

 function curl_exec_follow($ch, &$maxredirect = null) {
  
   // we emulate a browser here since some websites detect
   // us as a bot and don't let us do our job
   $user_agent = "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.7.5)".
                 " Gecko/20041107 Firefox/1.0";
   curl_setopt($ch, CURLOPT_USERAGENT, $user_agent );

   $mr = $maxredirect === null ? 5 : intval($maxredirect);

   if (ini_get('open_basedir') == '' && ini_get('safe_mode') == 'Off') {

     curl_setopt($ch, CURLOPT_FOLLOWLOCATION, $mr > 0);
     curl_setopt($ch, CURLOPT_MAXREDIRS, $mr);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

   } else {
    
     curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);

     if ($mr > 0)
     {
       $original_url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
       $newurl = $original_url;
      
       $rch = curl_copy_handle($ch);
      
       curl_setopt($rch, CURLOPT_HEADER, true);
       curl_setopt($rch, CURLOPT_NOBODY, true);
       curl_setopt($rch, CURLOPT_FORBID_REUSE, false);
       do
       {
         curl_setopt($rch, CURLOPT_URL, $newurl);
         $header = curl_exec($rch);
         if (curl_errno($rch)) {
           $code = 0;
         } else {
           $code = curl_getinfo($rch, CURLINFO_HTTP_CODE);
           if ($code == 301 || $code == 302) {
             preg_match('/Location:(.*?)\n/', $header, $matches);
             $newurl = trim(array_pop($matches));
            
             // if no scheme is present then the new url is a
             // relative path and thus needs some extra care
             if(!preg_match("/^https?:/i", $newurl)){
               $newurl = $original_url . $newurl;
             }   
           } else {
             $code = 0;
           }
         }
       } while ($code && --$mr);
      
       curl_close($rch);
      
       if (!$mr)
       {
         if ($maxredirect === null)
         trigger_error('Too many redirects.', E_USER_WARNING);
         else
         $maxredirect = 0;
        
         return false;
       }
       curl_setopt($ch, CURLOPT_URL, $newurl);
     }
   }
   return curl_exec($ch);
 }

 //CURL FOLLOW -------------------
 
 


//CONSULTA CEP  BAIRRO------------------------------------------------------------  
 
 
include('phpQuery-onefile.php');
 
////////////////////////////////////////////////////////

function simple_curl($url,$post=array(),$get=array()){
	$url = explode('?',$url,2);
	if(count($url)===2){
		$temp_get = array();
		parse_str($url[1],$temp_get);
		$get = array_merge($get,$temp_get);
	}
	
	//FOLLOW ---------
	
	$ch = curl_init( $url[0]."?".http_build_query($get) );
	//add
	curl_setopt ($ch, CURLOPT_POST, 1);
	curl_setopt ($ch, CURLOPT_POSTFIELDS, http_build_query($post));
	//add
    
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
	$data = curl_exec_follow($ch);
	//print_r($data);
	curl_close($ch);
	return $data;
	
	//FOLLOW-----------
	/*
	$ch = curl_init($url[0]."?".http_build_query($get));
	curl_setopt ($ch, CURLOPT_POST, 1);
	curl_setopt ($ch, CURLOPT_POSTFIELDS, http_build_query($post));
	curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	*/
	//return curl_exec ($ch);
}
 



if($cep !="Digite seu Cep"){
     $_SESSION['cepUser'] = $cep;
};

$html = simple_curl('http://m.correios.com.br/movel/buscaCepConfirma.do',array(
	'cepEntrada'=>$cep,
	'tipoCep'=>'',
	'cepTemp'=>'',
	'metodo'=>'buscarCep'));

phpQuery::newDocumentHTML($html, $charset = 'utf-8');

$dados = array(
	'logradouro'=> trim(pq('.caixacampobranco .resposta:contains("Logradouro: ") + .respostadestaque:eq(0)')->html()),
	'bairro'=> trim(pq('.caixacampobranco .resposta:contains("Bairro: ") + .respostadestaque:eq(0)')->html()),
	'cidade/uf'=> trim(pq('.caixacampobranco .resposta:contains("Localidade / UF: ") + .respostadestaque:eq(0)')->html()),
	'cep'=> trim(pq('.caixacampobranco .resposta:contains("CEP: ") + .respostadestaque:eq(0)')->html())
	);

$dados['cidade/uf'] = explode('/',$dados['cidade/uf']);
$dados['cidade'] = trim($dados['cidade/uf'][0]);
$dados['uf'] = trim($dados['cidade/uf'][1]);
unset($dados['cidade/uf']);
          
     
 
  
$cidade = utf8_encode($dados['cidade']);
$estado = utf8_encode($dados['estado']);  
//CONSULTA CEP BAIRRO ----------------------------------------------------------------
    
 
 

$cidadesFreteGratis = get_option('cidadesFreteGratis'); 


//$arrayCidades = array('Niterói','Niteroi','São Gonçalo','Sao Gonçalo','Rio Bonito','Maricá','Marica','Itaborai','Itaboraí');

$arrayCidades = array();
$arrayEstados = array();
   
$arrayEstadosCidades = explode(',',$cidadesFreteGratis);      


foreach($arrayEstadosCidades as $item=>$value){
    $arrayValue = explode('**',$value);
    $arrayEstados[] = trim($arrayValue[0]);
    $arrayCidades[] = trim($arrayValue[1]); 
    
    
    if(strtolower($arrayValue[1]) == strtolower($cidade)){   
    $freteGratis = true; 
    };
    
}


if(trim($cidade) ==""){
	$freteGratis = false;
}

      




    

$valorPedido = custom_get_total_price_session_order();

  


     if(strlen($valorPedido)>=6){
     $valorPedido =  str_replace('.','',$valorPedido);
     $valorPedido =  str_replace(',','.',$valorPedido);
     }else{
     $valorPedido =  str_replace(',','.',$valorPedido);
     }; 
     
     
     $idPrd   = $_POST['idPrd']; 
     $precoProduto =  custom_get_price($idPrd);
     
     if($precoProduto>0){
      $valorPedido =  $precoProduto;
     }
     
     $simbolo =  get_current_symbol(); 
     $precoPromocao = get_option('valorFreteGratis');

            if(strlen($precoPromocao)>=6){
             $precoPromocao =  str_replace('.','',$precoPromocao);
             $precoPromocao =  str_replace(',','.',$precoPromocao );
             }else{
             $precoPromocao =  str_replace(',','.',$precoPromocao);
             };   
             
                 
 
 
 if($valorPedido > $precoPromocao &&  $precoPromocao > 0 ){
     $freteGratis = true; 
     $msgFreteGratis = "Frete Grátis para pedidos acima de  $simbolo".get_option('valorFreteGratis').". Aproveite!";   
 }
 
 
    
if($freteGratis == false){ 
 

    if($tipoFrete=='correios' && $correios=="2"){
    
          include('checkoutAJAX-correios2.php');
    
    }elseif($tipoFrete=='correios'){
    
          include('checkoutAJAX-correios.php'); 
   
     }elseif($tipoFrete=='gratis' ){
     
              $tipoFreteR = "Promoção FRETE GRÁTIS";
              $tipoFrete = "Promoção FRETE GRÁTIS"; 
              $salvar = true;   
              $msg = '1-Cadastrado com Sucesso!';
       
        
      }elseif($tipoFrete=='fixo' ){
                 $valorFreteFixo  =get_option('valorFreteFixo');
                 $tipoFreteR = "FIXO";
                 $tipoFrete = "Frete FIXO  ($moedaCorrente$valorFreteFixo)";
      
                  $salvar = true;   
                  $msg = '1-Cadastrado com Sucesso!';
        
       }elseif($tipoFrete=='pesoBase' ){
    
           $valorFrete = 0;
           
           $peso =  intval( $_SESSION['pesoCheckout']);  
        
           if( $peso  >=0 && $peso  <1 ){
                $valorFrete = get_option('valorFretePeso1'); 
           }elseif($peso  >=1 && $peso  <5 ){
                 $valorFrete = get_option('valorFretePeso2');  
           }elseif($peso  >=5 && $peso  <10 ){
                 $valorFrete = get_option('valorFretePeso3');  
           }elseif($peso  >=10 && $peso  <20 ){
                 $valorFrete = get_option('valorFretePeso4');  
           }elseif($peso  >=20 && $peso  <30 ){
                 $valorFrete = get_option('valorFretePeso5');  
           }elseif($peso  >= 30  ){
                 $valorFrete = get_option('valorFretePeso6');  
           };
                          
 
        
                    $salvar = true;
                    $msg = '1-Cadastrado com Sucesso!';
                    $tipoFreteR = "Peso BASE";
                    $tipoFrete = "Frete Peso Base ($moedaCorrente$valorFrete)";
                    
                    

      }elseif($tipoFrete=='precoBase' ){

             $valorFrete = 0;
             $preco = intval(get_subtotal());
  
               if( $preco >=0 && $preco  <=100 ){
                     $valorFrete = get_option('valorFreteValor1'); 
               }elseif($preco >100 && $preco  <=200 ){
                     $valorFrete = get_option('valorFreteValor2');  
               }elseif($preco  >200 && $preco  <=300){
                     $valorFrete = get_option('valorFreteValor3');  
               }elseif($preco  >300 && $preco  <=400 ){
                     $valorFrete = get_option('valorFreteValor4');  
               }elseif($preco  >400 && $preco  <=500 ){
                     $valorFrete = get_option('valorFreteValor5');  
               }elseif($preco  >500  ){
                     $valorFrete = get_option('valorFreteValor6');  
               };
 
     
     
                           $salvar = true;
                           $msg = '1-Cadastrado com Sucesso!';
                           $tipoFreteR = "Preço BASE";
                           $tipoFrete = "Preço BASE ($moedaCorrente$valorFrete)";

      }
      

}else{
   
      $salvar = true;
      $msg = '1-Cadastrado com Sucesso!';
      $tipoFrete = "Frete Grátis para sua região";
      
};


  $sessionValue = '';
  $blogid = intval(get_current_blog_id()); 
  if($blogid>1){   
	$sessionValue =  $_SESSION['carrinho'.$blogid];        
  }else{   
	 $sessionValue = $_SESSION['carrinho'];        
  }; 


  $fgratis = false;
  $arrOpt = array('grátis','gratis');
  
  if($tipoFrete !=''){
     if (strpos(strtolower($tipoFrete),$arrOpt) !== false) {
        $fgratis ='true';
     }
  };
  
	 if(  intval($valorFreteEnviado)== 0   &&   $fgratis ==false ){
	       $tipoFrete =  "S/FRETE";
		    $salvar =true;
	}


if($salvar==true && $sessionValue !="" ){
     include('saveOrderAjax.php');
     $idPage = get_idPaginaPagamento();
     $page  = get_permalink($idPage);
     echo "<script>window.location='$page' </script>"; 
     echo " $msgF".'****'.$page;
};



?>