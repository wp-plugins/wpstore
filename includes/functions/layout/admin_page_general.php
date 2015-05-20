


<?php

$idPaginaCarrinho = 0;
$idPaginaCheckout = 0;


     if( $_POST['submit']=="Salvar" ){

        $emailAdmin = trim($_POST['emailAdmin']); 
        add_option('emailAdminWPSHOP',$emailAdmin,'','yes'); 
        update_option('emailAdminWPSHOP',$emailAdmin);
         

      
         
        
         $moedaCorrente = trim($_POST['moedaCorrente']); 
         add_option('moedaCorrenteWPSHOP',$moedaCorrente,'','yes'); 
         update_option('moedaCorrenteWPSHOP',$moedaCorrente);
         
         
          $idPaginaLogin  = trim($_POST['idPaginaLogin']); 
          add_option('idPaginaLoginWPSHOP',$idPaginaLogin  ,'','yes'); 
          update_option('idPaginaLoginWPSHOP',$idPaginaLogin );   



          $idPaginaTermos = trim($_POST['idPaginaTermos']); 
          add_option('idPaginaTermosWPSHOP',$idPaginaTermos  ,'','yes'); 
          update_option('idPaginaTermosWPSHOP',$idPaginaTermos);

         
         
           $idPaginaPerfil  = trim($_POST['idPaginaPerfil']); 
            add_option('idPaginaPerfilWPSHOP',$idPaginaPerfil ,'','yes'); 
            update_option('idPaginaPerfilWPSHOP',$idPaginaPerfil);
           
            $idPaginaPedido  = trim($_POST['idPaginaPedido']); 
                add_option('idPaginaPedidoWPSHOP',$idPaginaPedido,'','yes'); 
                update_option('idPaginaPedidoWPSHOP',$idPaginaPedido); 
                
           
	            $idPaginaArquivos  = trim($_POST['idPaginaArquivos']); 
	                add_option('idPaginaArquivosWPSHOP',$idPaginaArquivos,'','yes'); 
	                update_option('idPaginaArquivosWPSHOP',$idPaginaArquivos);                
				
				
					
					
					
					
                  $idPaginaPedidos = trim($_POST['idPaginaPedidos']); 
                        add_option('idPaginaPedidosWPSHOP',$idPaginaPedidos,'','yes'); 
                        update_option('idPaginaPedidosWPSHOP',$idPaginaPedidos);
                        
                          $idPaginaCheckout  = trim($_POST['idPaginaCheckout']); 
                                add_option('idPaginaCheckoutWPSHOP',$idPaginaCheckout,'','yes'); 
                                update_option('idPaginaCheckoutWPSHOP',$idPaginaCheckout);
                                
                                  $idPaginaCarrinho  = trim($_POST['idPaginaCarrinho']); 
                                        add_option('idPaginaCarrinhoWPSHOP',$idPaginaCarrinho,'','yes'); 
                                        update_option('idPaginaCarrinhoWPSHOP',$idPaginaCarrinho);
                                     
                                        $idPaginaPagto  = trim($_POST['idPaginaPagto']); 
                                                add_option('idPaginaPagtoWPSHOP',$idPaginaPagto,'','yes'); 
                                                update_option('idPaginaPagtoWPSHOP',$idPaginaPagto);
                                     
                                                        $parcelaMinima  = trim($_POST['parcelaMinima']); 
                                                                add_option('parcelaMinima',$parcelaMinima,'','yes'); 
                                                                update_option('parcelaMinima',$parcelaMinima);
                                                                
                                                                
                                                                 $totalParcela  = trim($_POST['totalParcela']); 
                                                                            add_option('totalParcela',$totalParcela,'','yes'); 
                                                                            update_option('totalParcela',$totalParcela);
                                                                              
                                       
                                                                                $facebookAPPID  = trim($_POST['facebookAPPID']); 
                                                                                            add_option('facebookAPPID',$facebookAPPID,'','yes'); 
                                                                                            update_option('facebookAPPID',$facebookAPPID);
                                                                                            
                                                                                                $facebookSecret = trim($_POST['facebookSecret']); 
                                                                                                            add_option('facebookSecret',$facebookSecret,'','yes'); 
                                                                                                            update_option('facebookSecret',$facebookSecret);
                                                                                                            
                                                                                                                          $googleMarca= trim($_POST['googleMarca']); 
                                                                                                                                        add_option('googleMarca',$googleMarca,'','yes'); 
                                                                                                                                        update_option('googleMarca',$googleMarca);
                                  
                                           
                                        $codigoAnalytics = trim($_POST['codigoAnalytics']); 
                                        add_option('codigoAnalytics',$codigoAnalytics,'','yes'); 
                                        update_option('codigoAnalytics',$codigoAnalytics);
                                                                                                                                                                
  $googleCategorias = trim($_POST['googleCategorias']); 
add_option('googleCategorias',$googleCategorias,'','yes');   

  $googleCategorias = trim($_POST['googleCategorias']); 
add_option('googleCategorias',$googleCategorias,'','yes');

$googleConversaoCheckout= trim($_POST['googleConversaoCheckout']); 
 add_option('googleConversaoCheckout',$googleConversaoCheckout,'','yes');
 
  $googleConversaoPagto= trim($_POST['googleConversaoPagto']); 
   add_option('googleConversaoPagto',$googleConversaoPagto,'','yes');

 
                                  
                                  
                                  
                                                                                                                                                                 
                                                                                                                                                                                                                                                                                                     update_option('googleCategorias',$googleCategorias);
                                                                                                                                                                                                                    
                                                              
                                          if (isset( $_POST['ativarssl'] )) {
                                                    $ativarssl = "sim"; 
                                                    add_option('ativarsslWPSHOP',$ativarssl,'','yes'); 
                                                    update_option('ativarsslWPSHOP',$ativarssl);
                                          }else{
                                              $ativarssl = "não"; 
                                              add_option('ativarsslWPSHOP',$ativarssl,'','yes'); 
                                              update_option('ativarsslWPSHOP',$ativarssl);
                                          }      
										  
										  
						
						
	 
										  
                                          if (isset( $_POST['ativarPrecoRelativo'] )) {
                                                    $ativarPrecoRelativo= "sim"; 
                                                    add_option('ativarPrecoRelativoWPSHOP',$ativarPrecoRelativo,'','yes'); 
                                                    update_option('ativarPrecoRelativoWPSHOP',$ativarPrecoRelativo);
                                          }else{
                                              $ativarPrecoRelativo= "não"; 
                                              add_option('ativarPrecoRelativoWPSHOP',$ativarPrecoRelativo,'','yes'); 
                                              update_option('ativarPrecoRelativoWPSHOP',$ativarPrecoRelativo);
                                          }      
										  
									
									
	
										 
											  
									      $ativarIdCatPrecoRelativo = trim($_POST['ativarIdCatPrecoRelativo']); 
									      add_option('ativarIdCatPrecoRelativoWPSHOP',$ativarIdCatPrecoRelativo,'','yes'); 
									      update_option('ativarIdCatPrecoRelativoWPSHOP',$ativarIdCatPrecoRelativo);    
										  
										  	  

									
										  
										  
                                          if (isset( $_POST['ativaruploadForm'] )) {
                                                    $ativaruploadForm = "sim"; 
                                                    add_option('ativaruploadFormWPSHOP',$ativaruploadForm,'','yes'); 
                                                    update_option('ativaruploadFormWPSHOP',$ativaruploadForm);
                                          }else{
                                              $ativaruploadForm= "não"; 
                                              add_option('ativaruploadFormWPSHOP',$ativaruploadForm,'','yes'); 
                                              update_option('ativaruploadFormWPSHOP',$ativaruploadForm);
                                          }      
                                          
                                           
                     
                                          
                                          
								  	    $idPaginaRetiradaLoja= trim($_POST['idPaginaRetiradaLoja']); 
								  	    $iidPaginaRetiradaLojaS  =  get_option('idPaginaRetiradaLojaWPSHOP');
										
										
								  	    if($idPaginaRetiradaLojaS !=$idPaginaRetiradaLoja){  
								  	 	 add_option('idPaginaRetiradaLojaWPSHOP',$idPaginaRetiradaLoja,'','yes'); 
								  	      update_option('idPaginaRetiradaLojaWPSHOP',$idPaginaRetiradaLoja);                   
								  	    };     
		
        
	   
 if ( isset( $_POST['idSequencialPedidos'] )) {
	
	$idSequencialPedidos = "sim"; 
	add_option('idSequencialPedidosWPSHOP',$idSequencialPedidos,'','yes'); 
	update_option('idSequencialPedidosWPSHOP',$idSequencialPedidos);
											  
 }else{
    
	$idSequencialPedidos = "não"; 
	add_option('idSequencialPedidosWPSHOP',$idSequencialPedidos,'','yes'); 
	update_option('idSequencialPedidosWPSHOP',$idSequencialPedidos);
 };    
										
										
		
		
		
 if ( isset( $_POST['graficaPers'] )) {
	
	$graficaPers = "sim"; 
	add_option('graficaPers',$graficaPers,'','yes'); 
	update_option('graficaPers',$graficaPers);
											  
 }else{
    
	$graficaPers = "não"; 
	add_option('graficaPers',$graficaPers,'','yes'); 
	update_option('graficaPers',$graficaPers);
 };    
 
 
								              
            
    };

$emailAdmin =  get_option('emailAdminWPSHOP');


$moedaCorrente  =  get_option('moedaCorrenteWPSHOP');

$idPaginaLogin  =  get_option('idPaginaLoginWPSHOP');
$idPaginaPerfil   =  get_option('idPaginaPerfilWPSHOP');
$idPaginaPedido   =  get_option('idPaginaPedidoWPSHOP');
$idPaginaTermos   =  get_option('idPaginaTermosWPSHOP');
$idPaginaPedidos  =  get_option('idPaginaPedidosWPSHOP');
$idPaginaCheckout  =  get_option('idPaginaCheckoutWPSHOP');
$idPaginaCarrinho  =  get_option('idPaginaCarrinhoWPSHOP'); 
$idPaginaPagto =  get_option('idPaginaPagtoWPSHOP'); 
$ativarssl  =  get_option('ativarsslWPSHOP'); 

$idPaginaArquivos =  get_option('idPaginaArquivosWPSHOP'); 


	
$ativarPrecoRelativo =  get_option('ativarPrecoRelativoWPSHOP'); 
$ativarIdCatPrecoRelativo =  get_option('ativarIdCatPrecoRelativoWPSHOP'); 

					
		
		
$ativaruploadForm=  get_option('ativaruploadFormWPSHOP'); 
	
$parcelaMinima=  get_parcelaMinima(); 
$totalParcela = get_totalParcela();
 
 $facebookAPPID  =  get_option('facebookAPPID'); 
 $facebookSecret  =  get_option('facebookSecret'); 
        
 $googleMarca  =  get_option('googleMarca'); 
 $googleCategorias  =  get_option('googleCategorias'); 
  $codigoAnalytics  =  get_option('codigoAnalytics'); 
  
  
    $googleConversaoCheckout=  get_option('googleConversaoCheckout');      
    $googleConversaoPagto =  get_option('googleConversaoPagto'); 
	
	
	
    $idPaginaRetiradaLoja=  get_option('idPaginaRetiradaLojaWPSHOP'); 
 
	
 
	
  $ativarPrecoRelativo =  get_option('ativarPrecoRelativoWPSHOP'); 
  $ativarIdCatPrecoRelativo=  get_option('ativarIdCatPrecoRelativoWPSHOP');		 
  					  
	    $idSequencialPedidos   =  get_option('idSequencialPedidosWPSHOP'); 
			
			
			$grafica = get_option('graficaPers');
?>    




  

<form action="<?php echo verifyURL(get_option( 'siteurl' )) ."/wp-admin/admin.php?page=wpstore";?>"  method="post" >




<div id="cabecalho">
	<ul class="abas">
		<li>
			<div class="aba gradient">
				<span>Opções Gerais</span>
			</div>
		</li>  
		
		 <?php /* 
		<li>
			<div class="aba gradient">
				<span>Homepage</span>
			</div>
		</li>
		<li>
			<div class="aba gradient">
				<span>Slide Home</span>
			</div>
		</li>
		<li>
			<div class="aba gradient">
				<span>Sidebar</span>
			</div>
		</li>                   
		
					*/ ?>      
					
		<div class="clear"></div>
	</ul>
</div><!-- #cabecalho -->       





<div id="containerAbas">  



	<div class="conteudo">
	
	
		<div class="bloco">      
			
			<h3>1. Email do administrador</h3>
			
			<span class="seta" rel='email'></span>
			<div class="texto" id='email'>
				<label for="emailAdm">Digite o email do administrador</label>
			  <input type="text" id="emailAdmin" name="emailAdmin" value="<?php echo $emailAdmin; ?>"  />                
			  
				<p>Ex:email@seudominio.com.br</p>   
				
				  <input type="submit"  name="submit" value="Salvar"   />  
				  
			</div>
		</div><!-- .bloco -->
		
		
		
		        
		
		
		<div class="bloco">
			<h3>2. Paginas de configuração  do Sistema </h3>
			
			<span class="seta" rel='paginas'></span>
			<div class="texto" id='paginas'>
			
			
			               
			               
			               
			               <p>Ao instalar nosso plugin , automáticamente criamos algumas paginas. Você pode querer remover estas pagina e definir abaixo uma nova estrutura de paginas  para seu sistema de vendas.</p>
                           
                            <br/>

                           <h4>Pagina Carrinho :</h4>
                           <p>Selecione a pagina de PEDIDO ( CARRINHO ) :   <br/>
                            <?php wp_dropdown_pages("show_option_none=---&id=idPaginaCarrinho&name=idPaginaCarrinho&selected=$idPaginaCarrinho"); ?>  
                           <br/>
                           <span style="font-size:11px">Selecione a pagina ou deixe em branco para não adicionar automáticamente. Neste caso insira o código <strong>get_cart_Table(); </strong>  no   template de pagina que deseja usar ou a expressão <strong>[get_cart_Table] </strong> 
                           no content da pagina no wordpress.</span>
                           </p>

                           <br/> <br/> 
                           
                           <h4>Pagina Checkout :</h4>
                           <p>Selecione  a pagina de CHECKOUT ( PAGAMENTO ) :   <br/>
                            <?php wp_dropdown_pages("show_option_none=---&id=idPaginaCheckout&name=idPaginaCheckout&selected=$idPaginaCheckout"); ?>  
                           <br/>
                           <span style="font-size:11px">Selecione a pagina ou deixe em branco para não adicionar automáticamente. Neste caso insira o código <strong>custom_get_checkout(); </strong>  no   template de pagina que deseja usar ou a expressão <strong>[custom_get_checkout] </strong> 
                           no content da pagina no wordpress.</span>
                           </p>

                           <br/> <br/>  
                           
                           <h4>Pagina PAGAR:</h4>
                           <p>Selecione a  pagina de PAGAMENTO ( PAGAMENTO ) :   <br/>
                            <?php wp_dropdown_pages("show_option_none=---&id=idPaginaPagto&name=idPaginaPagto&selected=$idPaginaPagto"); ?>  
                           <br/>
                           <span style="font-size:11px">Selecione a pagina ou deixe em branco para não adicionar automáticamente. Neste caso insira o código <strong>get_payment_checkout(); </strong>  no   template de pagina que deseja usar ou a expressão <strong>[get_payment_checkout] </strong> 
                           no content da pagina no wordpress.</span>
                           </p>

                           <br/>  <br/> 
                           
                           <h4>Pagina Meus Pedidos :</h4>
                           <p>Selecione a pagina com a listagem dos pedidos de cada usuário( MEUS PEDIDOS ) :   <br/>
                            <?php wp_dropdown_pages("show_option_none=---&id=idPaginaPedidos&name=idPaginaPedidos&selected=$idPaginaPedidos"); ?>  
                           <br/>
                           <span style="font-size:11px">Selecione a pagina ou deixe em branco para não adicionar automáticamente. Neste caso insira o código <strong> custom_get_orders_user(); </strong>  no   template de pagina que deseja usar ou a expressão <strong>[custom_get_orders_user] </strong> 
                           no content da pagina no wordpress.</span>
                           </p>


                           <br/> <br/> 
                           
                           <h4>Pagina Pedido :</h4>
                           <p>Selecione a  pagina que informa os detalhes do pedido de cada usuário( PEDIDO) :   <br/>
                            <?php wp_dropdown_pages("show_option_none=---&id=idPaginaPedido&name=idPaginaPedido&selected=$idPaginaPedido"); ?> 
                           <br/>
                           <span style="font-size:11px">Selecione a pagina ou deixe em branco para não adicionar automáticamente. Neste caso insira o código <strong>custom_get_order_user(); </strong>  no   template de pagina que deseja usar ou a expressão <strong>[custom_get_order_user] </strong> 
                           no content da pagina no wordpress.</span>
                           </p>

                           <br/> <br/> 
                           
                           <h4>Pagina Meus Dados :</h4>
                           <p>Selecione a  da pagina que informa os detalhes da conta de cada usuário( MEUS DADOS) :   <br/>
                           <?php wp_dropdown_pages("show_option_none=---&id=idPaginaPerfil&name=idPaginaPerfil&selected=$idPaginaPerfil"); ?>  
                           <br/>
                           <span style="font-size:11px">Selecione a pagina ou deixe em branco para não adicionar automáticamente. Neste caso insira o código <strong>get_edit_form_perfil(); </strong>  no   template de pagina que deseja usar ou a expressão <strong>[get_edit_form_perfil] </strong> 
                           no content da pagina no wordpress.</span>
                           </p>

                           <br/> <br/> 
                           
                           <h4>Pagina LOGIN :</h4>
                           <p>Selecione a pagina que será inserido o formulário de LOGIN/CADASTRO ( LOGIN) :   <br/>
                            <?php wp_dropdown_pages("show_option_none=---&id=idPaginaLogin&name=idPaginaLogin&selected=$idPaginaLogin"); ?>  
                           <br/>
                           <span style="font-size:11px">Selecione a pagina ou deixe em branco para não adicionar automáticamente. Neste caso insira o código <strong>get_Login_form(); </strong>  no   template de pagina que deseja usar ou a expressão <strong>[get_Login_form] </strong> 
                           no content da pagina no wordpress.</span>
                           </p><br/> <br/> 
                           
                           <h4>Pagina Termos :</h4>
                           <p>Selecione a pagina que será inserido a politica de trocas, devoluções .... :   <br/>
                            <?php wp_dropdown_pages("show_option_none=---&id=idPaginaTermos&name=idPaginaTermos&selected=$idPaginaTermos"); ?>  
                           <br/>
                           <span style="font-size:11px">Selecione a pagina  ou deixe em branco para não adicionar automáticamente. Neste caso insira  a expressão <strong>[custom_get_Termos] </strong> 
                           no content da pagina no wordpress.</span>
                           </p><br/>  <br/> 







                           <br/> <br/> 
                           
                           <h4>Pagina Lojas e Pontos de Retirada :</h4>
                           <p>Selecione a   pagina que informa os detalhes e localização das lojas e pontos para retirada de mercadorias :   <br/>
                           <?php wp_dropdown_pages("show_option_none=---&id=idPaginaRetiradaLoja&name=idPaginaRetiradaLoja&selected=$idPaginaRetiradaLoja"); ?>  
                           <br/>
                         
                           </p>

                           <br/> <br/> 
						   
						   
						   
						   

						                              <h4>Pagina Arquivos:</h4>
						                              <p>Selecione a pagina que será inserido o formulário de arquivos.... :   <br/>
						                               <?php wp_dropdown_pages("show_option_none=---&id=idPaginaArquivos&name=idPaginaArquivos&selected=$idPaginaArquivos"); ?>  
						                              <br/>
						                              <span style="font-size:11px">Selecione a pagina  ou deixe em branco para não adicionar automáticamente. Neste caso insira  a expressão <strong>[get_arquivos_form] </strong> 
						                              no content da pagina no wordpress.</span>
						                              </p><br/>  <br/> 





						   
						   
						   


                            <input type="submit"  name="submit" value="Salvar"   />
                            
                            
                            
				
				
				
			</div><!-- .texto -->
		</div><!-- .bloco -->
		
		
		         
		
		
		
		
		
		
		<div class="bloco">
			<h3>3. Funções e Atalhos</h3>
			
			  <span class="seta" rel='funcoes'></span>
				<div class="texto" id='funcoes'>
				
   
   
   
   
                    <h4>custom_get_menu_shop_top();</h4>
                    <p>Exibe  o menu fixo de opções do usuário (Carrinho, Dados Gerais, Finalizar Compra , Meus pedidos ). Normalmente usado no arquivo header.php ou sidebar.php </p>
                  <br/><br/>


                    <h4> custom_get_image($post->ID,$largura,$altura,$crop,$echo )</h4>
                     <p>Recupera a imagem do produto já com  link e  img . Normalmente usada na pagina Single e nas listagens de produtos.</p>
                     <p>$crop : 1 => para sim , 0 => para não.</p>
                     <p>$echo : true => para imprimir , false => para armazenar em variável.</p>
                     <br/><br/>

                      <h4>  custom_product_single(); </h4>
                       <p>Exibe o box de compras disponível para um produto e o botão comprar .  Normalmente usado na pagina single. </p>
                     <br/><br/>
                     
                      <h4>  	custom_product_galeria(); </h4>
                       <p>Exibe a galeria de imagens do produtos. </p>
                      <br/><br/>

                       <h4>custom_product_relation_single();   </h4>
                        <p>Exibe a lista de produtos relacionados a um determinado produto de mesma categoria. </p>
                      <br/><br/>

                       <h4>get_current_symbol(); </h4>    

                        <p>Recupera o simbolo cadastrado para a  moeda corrente da loja . Padrão é R$.</p>
                       <br/><br/>

                       <h4> custom_get_price($post->ID);  </h4>    

                       <p> Preço normal do produto  </p>
                      <br/><br/>

                       <h4> custom_get_specialprice($post->ID);  </h4>    

                       <p> Preço promocional         </p> 
                       <br/><br/>


                        <h4>  verifyURL($url);   </h4>    

                          <p> caso SSL esteja ativo, substitui http por https .       </p> 

                        <br/><br/>






                        <p>Veja mais funções no link  <a href="http://wpstore.com.br/ajuda/"><span   class="btAbrirCaixa"   rel="paginas" style="font-size:12px"><strong>Paginas de configuração do Sistema</strong> </span></a> </p><br/>  





			</div>
		</div><!-- .bloco -->
		
		          
		
		
		
		
		
		
		
		<div class="bloco">
			<h3>4. Opção para Ativar SSL </h3>
			
			  <span class="seta" rel='ssl'></span>
				<div class="texto" id='ssl'>
			
	  
	  
	                <p><input type="checkbox" name="ativarssl"  <?php if($ativarssl=="sim"){ echo "CHECKED"; }; ?> /> Selecione para ativar  url SSL em seu site. Assim seu endereço será (https). Esteja garantido de possuir um certificado SSL para seu domínio.</p>
                    <br/> 

                     <input type="submit"  name="submit" value="Salvar"   />
                     
                     
                     
			</div><!-- .texto -->
		</div><!-- .bloco -->
		
		
	    
		
		

		     
		
	     
		<div class="bloco">
			<h3>5. Moeda COrrente</h3>
			
		        <span class="seta" rel='moeda'></span>
				<div class="texto" id='moeda'>
	 
	
	
	
	                <p>Escolha o simbolo da moeda Corrente . (ex:U$) :
                    <input type="text" id="moedaCorrente" name="moedaCorrente" value="<?php echo $moedaCorrente; ?>" style="width:20%"/>
                    </p><br/>  

                     <input type="submit"  name="submit" value="Salvar"   />
                     
                     
                     
			</div><!-- .texto -->
		</div><!-- .bloco -->   
	 
		




			<div class="bloco">
				<h3>6. Parcelamento</h3>

			        <span class="seta" rel='parcelamento'></span>
						<div class="texto" id='parcelamento'>
				
				
				
				                <h4>Parcelamento mínimo</h4>
                            <p>Valor mínimo para parcelamento (Tabela Pagina produtos) . Exemplo : R$5,00 <br/>
                               <input type="text" id="parcelaMinima" name="parcelaMinima" value="<?php echo $parcelaMinima; ?>" style="width:20%"/>     

                               </p> <br/><br/>
                               <h4>Máximo de parcelas</h4>
                               <p>Total Máximo de Parcelas :
                                  <input type="text" id="totalParcela" name="totalParcela" value="<?php echo $totalParcela; ?>" style="width:20%"/>
                                  </p><br/><br/>

                            <input type="submit"  name="submit" value="Salvar"   />
                            
                            
                            
				</div><!-- .texto -->
			</div><!-- .bloco -->   





                 <div class="bloco">
					<h3>7. Facebook Login</h3>

				        <span class="seta" rel='facebookLogin'></span>
							<div class="texto" id='facebookLogin'>
					
					
					              <h4>Facebook APPID</h4>
                                   <p>sua APPID do facebook :
                                   <input type="text" id="facebookAPPID" name="facebookAPPID" value="<?php echo $facebookAPPID; ?>" style="width:20%"/>
                                   </p>   <br/>   <br/> 
                                   <h4>Facebook API SECRET KEY</h4>
                                   <p>O código  API SECRET KEY de sua API: 
                                      <input type="text" id="facebookSecret" name="facebookSecret" value="<?php echo $facebookSecret; ?>" style="width:20%"/>
                                      </p><br/> <br/> 

                                <input type="submit"  name="submit" value="Salvar"   />
                                
                                
                                
					</div><!-- .texto -->
				</div><!-- .bloco -->
		
		   
		
		
		
		
		               <div class="bloco">
 							<h3>8.Google Shop</h3>

 						        <span class="seta" rel='googleShop'></span>
        							<div class="texto" id='googleShop'>
 							   
 							
 							             <h4>Codigo site no analytics  </h4>
                                         <p>Ex : UA-6sgfdhs4-34tv  </p>    
                                          
                                         <br/>
                                          <input type="text" id="codigoAnalytics" name="codigoAnalytics" value="<?php echo $codigoAnalytics; ?>" style="width:20%"/> 
                                         </p>  <br/>  <br/>
 							
 							            <h4>Marca Padrão</h4>
                                         <p>Marca padrão escolhida quando produto não possuir marca cadastrada : </p>     
                                         <br/>
                                          <input type="text" id="googleMarca" name="googleMarca" value="<?php echo $googleMarca; ?>" style="width:20%"/> 
                                         </p>  <br/>  <br/> 
                                         <h4>Categorias do Google</h4>
                                         <p>Escolha as categorias correspondentes a seus produtos :     
                                          <br/>   <br/> 
                                            <input type="text" id="googleCategorias" name="googleCategorias" value="<?php echo $googleCategorias; ?>" style="width:20%"/>
                                         </p>

                                         <br/>  <br/>    
                                         
                                         
                                         
                                              <h4>CONVERSÕES - CHECKOUT</h4>
                                              <p>Insira seu código de conversões Checkout do Google :     
                                               <br/>   <br/> 
                                                 <textarea    id="googleConversaoCheckout" name="googleConversaoCheckout"  ><?php echo $googleConversaoCheckout; ?></textarea>
                                                 
                                              </p>
                                             
                                             
                                             
                                                    <h4>CONVERSÕES - PAGAMENTO</h4>
                                                    <p>Insira seu código de conversões para pagamentos do Google :      
                                                     <br/>   <br/> 
                                                     <textarea    id="googleConversaoPagto" name="googleConversaoPagto"  ><?php echo $googleConversaoPagto; ?></textarea>
                                                     </p>
                                                    
                                                     
                                              

                                      <input type="submit"  name="submit" value="Salvar"   />
                                      
                                      
                                      
 							</div><!-- .texto -->
 						</div><!-- .bloco -->
 						
 						
 						
						
						
						
						
						
		
		
 		               <div class="bloco">
  							<h3>9.Produtos Personalizaveis</h3>

  						        <span class="seta" rel='produtosPersonalizaveis'></span>
         							<div class="texto" id='produtosPersonalizaveis'>
 							   
 							 
					 	                <p><input type="checkbox" name="ativaruploadForm"  <?php if($ativaruploadForm=="sim"){ echo "CHECKED"; }; ?> /> Selecione para ativar  opção de upload para cada produto de um pedido. Perfeito para lojas que vendem produtos personalizados. </p>
					                     <br/> 
                                           <br/>  <br/>
 							
  							     
				                           <h2>Preço RELATIVO em categoria de produto </h2>      


					 	                <p><input type="checkbox" name="ativarPrecoRelativo"  <?php if($ativarPrecoRelativo=="sim"){ echo "CHECKED"; }; ?> /> Ativar Preço Relativo </p>
					                     <br/> 
										 
					 
				                            <h3>ID DA CATEGORIA</h3>  
				                           <p>Selecione a  categoria das publicações  QUE TERÃO PREÇO RELATIVO<br/>
				                              <?php wp_dropdown_categories("show_option_none=---&id=idCatSlide2&name=ativarIdCatPrecoRelativo&selected=$ativarIdCatPrecoRelativo&orderby=name&order=asc"); ?> 
				                             <br/>
				                             <span style="font-size:11px">Escolha uma categoria acima.</span>
				                           </p>  
										   
											  
											  
											  
                                       <input type="submit"  name="submit" value="Salvar"   />
                                      
                                      
                                      
  							</div><!-- .texto -->
  						</div><!-- .bloco -->
				 		
						
						
		
  	   <div class="bloco">
   				  
			 <h3>10. Opções Extra</h3>

   				 <span class="seta" rel='optExtra'></span>
				  
          		 <div class="texto" id='optExtra'>
 							   
 				 <h2>Ativar ID sequencial para pedidos :  </h2>      

      <p><input type="checkbox" name="idSequencialPedidos"  <?php if($idSequencialPedidos=="sim"){ echo "CHECKED"; }; ?> />Ativar identificação sequencial de pedidos</p>
			        
				  <br/>
					
					 
		 				 <h2>Personalização de pedidos :  </h2>      

		      <p><input type="checkbox" name="graficaPers"  <?php if($graficaPers=="sim"){ echo "CHECKED"; }; ?> />Habilitar personalização de pedidos. Enviar arquivosd para impressão de produtos exclusivos.</p>
			        
						  <br/>
							
							
											  
				  <input type="submit"  name="submit" value="Salvar"   />
                                      
               </div><!-- .texto -->
   	   </div><!-- .bloco -->
						
						
						
			 		
		     
		
	</div>  
	
	
	<?php /*
	<div class="conteudo">
		Conteúdo da aba 2
	</div>
	
	
	<div class="conteudo">
		Conteúdo da aba 3
	</div>    
	
	
	<div class="conteudo">
		Conteúdo da aba 4
	</div>     
	*/ ?>
	
	
	
	
</div><!-- .content -->

 



 
</form>





 <script>

 jQuery('.seta').click(function(){
     rel = jQuery(this).attr('rel');
     jQuery('.texto').hide();
     jQuery('#'+rel).show();
 });    
 
 
 

 </script>
