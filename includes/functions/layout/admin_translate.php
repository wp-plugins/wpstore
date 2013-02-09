<h1>Textos e Tradução </h1>  
<br/>
<br/>

<?php

$idPaginaCarrinho = 0;
$idPaginaCheckout = 0;

  if( $_POST['submit']=="Gravar" ){
  
          $txtParcelamentoJuros= trim($_POST['txtParcelamentoJuros']); 
          add_option('txtParcelamentoJurosWPSHOP',$txtParcelamentoJuros,'','yes'); 
          update_option('txtParcelamentoJurosWPSHOP',$txtParcelamentoJuros); 
          
          
            $txtEscolhaCorProduto= trim($_POST['txtEscolhaCorProduto']); 
            add_option('txtEscolhaCorProdutoWPSHOP',$txtEscolhaCorProduto,'','yes'); 
            update_option('txtEscolhaCorProdutoWPSHOP',$txtEscolhaCorProduto);  
            
            
            $txtEscolhaTamanhoProduto= trim($_POST['txtEscolhaTamanhoProduto']); 
            add_option('txtEscolhaTamanhoProdutoWPSHOP',$txtEscolhaTamanhoProduto,'','yes'); 
            update_option('txtEscolhaTamanhoProdutoWPSHOP',$txtEscolhaTamanhoProduto);  
            
            $txtComprarBtProduto= trim($_POST['txtComprarBtProduto']); 
            add_option('txtComprarBtProdutoWPSHOP',$txtComprarBtProduto,'','yes'); 
            update_option('txtComprarBtProdutoWPSHOP',$txtComprarBtProduto);
            
           
               $txtAdicionarBtProduto= trim($_POST['txtAdicionarBtProduto']); 
                add_option('txtAdicionarBtProdutoWPSHOP',$txtAdicionarBtProduto,'','yes'); 
                update_option('txtAdicionarBtProdutoWPSHOP',$txtAdicionarBtProduto);
                 
    
                $txtprodutoIndisponivel = trim($_POST['txtprodutoIndisponivel']); 
                add_option('txtprodutoIndisponivelWPSHOP',$txtprodutoIndisponivel ,'','yes'); 
                update_option('txtprodutoIndisponivelWPSHOP',$txtprodutoIndisponivel );   
                
                
                         $txtprodutoAvisarChegar= trim($_POST['txtprodutoAvisarChegar']); 
                            add_option('txtprodutoAvisarChegarWPSHOP',$txtprodutoAvisarChegar ,'','yes'); 
                            update_option('txtprodutoAvisarChegarWPSHOP',$txtprodutoAvisarChegar );
                            
   $txtprodutoEnviarFormContato = trim($_POST['txtprodutoEnviarFormContato']); 
     add_option('txtprodutoEnviarFormContatoWPSHOP',$txtprodutoEnviarFormContato ,'','yes'); 
     update_option('txtprodutoEnviarFormContatoWPSHOP',$txtprodutoEnviarFormContato );   
                            
 
     $txtprodutoNomeFormContato = trim($_POST['txtprodutoNomeFormContato']); 
       add_option('txtprodutoNomeFormContatoWPSHOP',$txtprodutoNomeFormContato ,'','yes'); 
       update_option('txtprodutoNomeFormContatoWPSHOP',$txtprodutoNomeFormContato );
       
       $txtprodutoEmailFormContato = trim($_POST['txtprodutoEmailFormContato']); 
         add_option('txtprodutoEmailFormContatoWPSHOP',$txtprodutoEmailFormContato ,'','yes'); 
         update_option('txtprodutoEmailFormContatoWPSHOP',$txtprodutoEmailFormContato );
         
         
         $txtSelecioneParcela = trim($_POST['txtSelecioneParcela']); 
           add_option('txtSelecioneParcelaWPSHOP',$txtSelecioneParcela ,'','yes'); 
           update_option('txtSelecioneParcelaWPSHOP',$txtSelecioneParcela);    
           
           
               $txtProdutosRelacionados = trim($_POST['txtProdutosRelacionados']); 
                  add_option('txtProdutosRelacionadosWPSHOP',$txtProdutosRelacionados ,'','yes'); 
                  update_option('txtProdutosRelacionadosWPSHOP',$txtProdutosRelacionados);
                  
            
                             
  };

$txtParcelamentoJuros = get_option('txtParcelamentoJurosWPSHOP'); 
$txtEscolhaCorProduto = get_option('txtEscolhaCorProdutoWPSHOP');  
$txtEscolhaTamanhoProduto = get_option('txtEscolhaTamanhoProdutoWPSHOP');   

 $txtComprarBtProduto= get_option('txtComprarBtProdutoWPSHOP');   
 $txtAdicionarBtProduto= get_option('txtAdicionarBtProdutoWPSHOP'); 
   
 $txtprodutoIndisponivel= get_option('txtprodutoIndisponivelWPSHOP');   
 $txtprodutoAvisarChegar= get_option('txtprodutoAvisarChegarWPSHOP');   
 
 $txtprodutoEnviarFormContato= get_option('txtprodutoEnviarFormContatoWPSHOP');   
 $txtprodutoNomeFormContato= get_option('txtprodutoNomeFormContatoWPSHOP');   
 $txtprodutoEMailFormContato= get_option('txtprodutoEmailFormContatoWPSHOP');  
  
 $txtSelecioneParcela= get_option('txtSelecioneParcelaWPSHOP');   
 
 $txtProdutosRelacionados   = get_option('txtProdutosRelacionadosWPSHOP');   


?>
 
 
 
	<form action="<?php echo verifyURL(get_option( 'siteurl' )) ."/wp-admin/admin.php?page=lista_translate";?>"  method="post" >

       
      
   
 <h2 style='background:#eee;padding:10px;cursor:pointer'  >PAGINA PRODUTOS <span   class="btEditarFrete"   rel="boxComprarProduto" style="font-size:12px"> (Editar)  </span></h2>
   
   
  <div id="boxComprarProduto" style="display:none" class="boxComprarProduto" >


   <h3 style='background:#eee;padding:10px;cursor:pointer'> x sem juros*   no  cartão</h3>
 
  <label for="valorFreteValor6"> </label>
     default : <strong> x sem juros*   no  cartão</strong>
    <br/>
    Substituir por : <input type="text" id="txtParcelamentoJuros" name="txtParcelamentoJuros" value="<?php echo $txtParcelamentoJuros; ?>"  style="width:40%"  />
  <br/>
  <span style="font-size:10px">x sem juros*   no  cartão</span>
 
 <br/> <br/>  
 
 
 
 
  <h3 style='background:#eee;padding:10px;cursor:pointer'>Cor do Produto :</h3>

   <label for="valorFreteValor6"> </label>
      default :  <strong> Cor do Produto :</strong>
     <br/>
     Substituir por :  <input type="text" id="txtEscolhaCorProduto" name="txtEscolhaCorProduto" value="<?php echo $txtEscolhaCorProduto; ?>"  style="width:40%"  />
   <br/>
   
  <br/> <br/>
  
   
   
   
   
   <h3 style='background:#eee;padding:10px;cursor:pointer'>Tamanho do Produto : </h3>

    <label for="valorFreteValor6"> </label>
       default :  <strong>Tamanho do Produto :</strong>
      <br/>
      Substituir por :  <input type="text" id="txtEscolhaTamanhoProduto" name="txtEscolhaTamanhoProduto" value="<?php echo $txtEscolhaTamanhoProduto; ?>"  style="width:40%"  />
    <br/>
 
   <br/> <br/>
   
   
   
 
 
 
   <h3 style='background:#eee;padding:10px;cursor:pointer'>Comprar </h3>

    <label for="valorFreteValor6"> </label>
       default :  <strong>Comprar</strong>
      <br/>
      Substituir por :  <input type="text" id="txtComprarBtProduto" name="txtComprarBtProduto" value="<?php echo $txtComprarBtProduto; ?>"  style="width:40%"  />
    <br/>
 
   <br/> <br/>
   
     
   
   
    
 
      <h3 style='background:#eee;padding:10px;cursor:pointer'>Adicionar ao Carrinho</h3>

    <label for="valorFreteValor6"> </label>
       default :  <strong>Adicionar ao Carrinho</strong>
      <br/>
      Substituir por :  <input type="text" id="txtAdicionarBtProduto" name="txtAdicionarBtProduto" value="<?php echo $txtAdicionarBtProduto; ?>"  style="width:40%"  />
    <br/>
 
   <br/> <br/>
 
           
    
   
      <h3 style='background:#eee;padding:10px;cursor:pointer'>Produto Indisponível. </h3>

    <label for="valorFreteValor6"> </label>
       default :  <strong>Produto Indisponível.</strong>
      <br/>
      Substituir por :  <input type="text" id="txtprodutoIndisponivel" name="txtprodutoIndisponivel" value="<?php echo $txtprodutoIndisponivel ; ?>"  style="width:40%"  />
    <br/>
 
   <br/> <br/>
   
      <h3 style='background:#eee;padding:10px;cursor:pointer'>Avisar quando chegar?</h3>

    <label for="valorFreteValor6"> </label>
       default :  <strong>Avisar quando chegar?</strong>
      <br/>
      Substituir por :  <input type="text" id="txtprodutoAvisarChegar" name="txtprodutoAvisarChegar" value="<?php echo $txtprodutoAvisarChegar; ?>"  style="width:40%"  />
    <br/>
 
   <br/> <br/> 
      
   
  
 
   

      <h3 style='background:#eee;padding:10px;cursor:pointer'>Enviar</h3>

    <label for="valorFreteValor6"> </label>
       default :  <strong>Enviar</strong>
      <br/>
      Substituir por :  <input type="text" id="txtprodutoEnviarFormContato" name="txtprodutoEnviarFormContato" value="<?php echo $txtprodutoEnviarFormContato ; ?>"  style="width:40%"  />
    <br/>
 
   <br/> <br/>
   
        
   
     <h3 style='background:#eee;padding:10px;cursor:pointer'>Digite seu Nome</h3>

    <label for="valorFreteValor6"> </label>
       default :  <strong>Digite seu Nome</strong>
      <br/>
      Substituir por :  <input type="text" id="txtprodutoNomeFormContato" name="txtprodutoNomeFormContato" value="<?php echo $txtprodutoNomeFormContato ; ?>"  style="width:40%"  />
    <br/>
 
   <br/> <br/>
   
   
     <h3 style='background:#eee;padding:10px;cursor:pointer'>Email para contato</h3>

    <label for="valorFreteValor6"> </label>
       default :  <strong>Email para contato</strong>
      <br/>
      Substituir por :  <input type="text" id="txtprodutoEmailFormContato" name="txtprodutoEmailFormContato" value="<?php echo $txtprodutoEmailFormContato ; ?>"  style="width:40%"  />
    <br/>
 
   <br/> <br/>
   
   
    
      <h3 style='background:#eee;padding:10px;cursor:pointer'>Selecione a quantidade de Produtos</h3>

     <label for="valorFreteValor6"> </label>
        default :  <strong>Selecione a quantidade de Produtos</strong>
       <br/>
       Substituir por :  <input type="text" id="txtSelecioneParcela" name="txtSelecioneParcela" value="<?php echo $txtSelecioneParcela ; ?>"  style="width:40%"  />
     <br/>

    <br/> <br/>     
    
    
        <h3 style='background:#eee;padding:10px;cursor:pointer'>Produtos Relacionados</h3>

     <label for="valorFreteValor6"> </label>
        default :  <strong>Produtos Relacionados</strong>
       <br/>
       Substituir por :  <input type="text" id="txtProdutosRelacionados" name="txtProdutosRelacionados" value="<?php echo $txtProdutosRelacionados  ; ?>"  style="width:40%"  />
     <br/>

    <br/> <br/>
    
    
    
    
    
    
    
      
    <input type="submit"  name="submit" value="Gravar"   />
    
     </div>

    <hr/>
    
               











          </form>

 <br/> <br/>
 
    	
       	
        <script>

        jQuery('.btEditarFrete').click(function(){
            rel = jQuery(this).attr('rel');
            jQuery('.box').hide();
            jQuery('#'+rel).show();
        });

        </script>
       	
 
 
 
 