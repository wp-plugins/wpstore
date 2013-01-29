<h1>Opções Gerais de administração</h1>

<?php

$idPaginaCarrinho = 0;
$idPaginaCheckout = 0;


     if( $_POST['submit']=="Gravar" ){

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
                                                                                                                                        
                                                                                                                                                      $googleCategorias = trim($_POST['googleCategorias']); 
                                                                                                                                                                    add_option('googleCategorias',$googleCategorias,'','yes'); 
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
$parcelaMinima=  get_parcelaMinima(); 
$totalParcela = get_totalParcela();
 
 $facebookAPPID  =  get_option('facebookAPPID'); 
 $facebookSecret  =  get_option('facebookSecret'); 
        
 $googleMarca  =  get_option('googleMarca'); 
 $googleCategorias  =  get_option('googleCategorias'); 

?>



	<form action="<?php echo verifyURL(get_option( 'siteurl' )) ."/wp-admin/admin.php?page=wp_store";?>"  method="post" >




<br/><br/><br/>

 
<h2  style="background:#eee;padding:10px;cursor:pointer" >1 ) Email do Administrador  <span   class="btEditarFrete"   rel="email" style="font-size:12px"> (Editar)  </span> </h2>


<div id="email" style="display:none" class="box" >


    <p>Digite o email do administrador : <br/>
      <input type="text" id="emailAdmin" name="emailAdmin" value="<?php echo $emailAdmin; ?>"  style="width:40%"/>
      <br/>
      <span style="font-size:11px">Ex:email@seudominio.com.br</span>
    </p>

    <br/>  

     <input type="submit"  name="submit" value="Gravar"   />

</div>

<h2  style="background:#eee;padding:10px;cursor:pointer" > 2 ) Paginas de configuração  do Sistema  <span   class="btEditarFrete"   rel="paginas" style="font-size:12px"> (Editar)  </span> </h2>
<div id="paginas" style="display:none" class="box" >


<h3>Ao instalar nosso plugin , automáticamente criamos algumas paginas. Você pode querer remover estas pagina e definir abaixo uma nova estrutura de paginas  para seu sistema de vendas.</h3>

 
<h3>Pagina Carrinho :</h3>
<p>Escolha o id da pagina de PEDIDO ( CARRINHO ) :   <br/>
<input type="text" id="idPaginaCarrinho" name="idPaginaCarrinho" value="<?php echo $idPaginaCarrinho; ?>" style="width:20%"/>
<br/>
<span style="font-size:11px">Digite o ID da pagina ou deixe em branco para não adicionar automáticamente. Neste caso insira o código <strong>get_cart_Table(); </strong>  no   template de pagina que deseja usar ou a expressão <strong>[get_cart_Table] </strong> 
no content da pagina no wordpress.</span>
</p>

<br/>
<h3>Pagina Checkout :</h3>
<p>Escolha o id da pagina de CHECKOUT ( PAGAMENTO ) :   <br/>
<input type="text" id="idPaginaCheckout" name="idPaginaCheckout" value="<?php echo $idPaginaCheckout; ?>" style="width:20%"/>
<br/>
<span style="font-size:11px">Digite o ID da pagina ou deixe em branco para não adicionar automáticamente. Neste caso insira o código <strong>custom_get_checkout(); </strong>  no   template de pagina que deseja usar ou a expressão <strong>[custom_get_checkout] </strong> 
no content da pagina no wordpress.</span>
</p>

<br/>



<br/>
<h3>Pagina PAGAR:</h3>
<p>Escolha o id da pagina de PAGAMENTO ( PAGAMENTO ) :   <br/>
<input type="text" id="idPaginaPagto" name="idPaginaPagto" value="<?php echo $idPaginaPagto; ?>" style="width:20%"/>
<br/>
<span style="font-size:11px">Digite o ID da pagina ou deixe em branco para não adicionar automáticamente. Neste caso insira o código <strong>get_payment_checkout(); </strong>  no   template de pagina que deseja usar ou a expressão <strong>[get_payment_checkout] </strong> 
no content da pagina no wordpress.</span>
</p>

<br/>


 
<br/>
<h3>Pagina Meus Pedidos :</h3>
<p>Escolha o id da pagina com a listagem dos pedidos de cada usuário( MEUS PEDIDOS ) :   <br/>
<input type="text" id="idPaginaPedidos" name="idPaginaPedidos" value="<?php echo $idPaginaPedidos; ?>" style="width:20%"/>
<br/>
<span style="font-size:11px">Digite o ID da pagina ou deixe em branco para não adicionar automáticamente. Neste caso insira o código <strong> custom_get_orders_user(); </strong>  no   template de pagina que deseja usar ou a expressão <strong>[custom_get_orders_user] </strong> 
no content da pagina no wordpress.</span>
</p>


<br/>
<h3>Pagina Pedido :</h3>
<p>Escolha o id da pagina que informa os detalhes do pedido de cada usuário( PEDIDO) :   <br/>
<input type="text" id="idPaginaPedido" name="idPaginaPedido" value="<?php echo $idPaginaPedido; ?>" style="width:20%"/>
<br/>
<span style="font-size:11px">Digite o ID da pagina ou deixe em branco para não adicionar automáticamente. Neste caso insira o código <strong>custom_get_order_user(); </strong>  no   template de pagina que deseja usar ou a expressão <strong>[custom_get_order_user] </strong> 
no content da pagina no wordpress.</span>
</p>
 
<br/>
<h3>Pagina Meus Dados :</h3>
<p>Escolha o id da pagina que informa os detalhes da conta de cada usuário( MEUS DADOS) :   <br/>
<input type="text" id="idPaginaPerfil" name="idPaginaPerfil" value="<?php echo $idPaginaPerfil; ?>" style="width:20%"/>
<br/>
<span style="font-size:11px">Digite o ID da pagina ou deixe em branco para não adicionar automáticamente. Neste caso insira o código <strong>get_edit_form_perfil(); </strong>  no   template de pagina que deseja usar ou a expressão <strong>[get_edit_form_perfil] </strong> 
no content da pagina no wordpress.</span>
</p>

<br/>
<h3>Pagina LOGIN :</h3>
<p>Escolha o id da pagina que será inserido o formulário de LOGIN/CADASTRO ( LOGIN) :   <br/>
<input type="text" id="idPaginaLogin" name="idPaginaLogin" value="<?php echo $idPaginaLogin; ?>" style="width:20%"/>
<br/>
<span style="font-size:11px">Digite o ID da pagina ou deixe em branco para não adicionar automáticamente. Neste caso insira o código <strong>get_Login_form(); </strong>  no   template de pagina que deseja usar ou a expressão <strong>[get_Login_form] </strong> 
no content da pagina no wordpress.</span>
</p><br/>  


<br/>
<h3>Pagina Termos :</h3>
<p>Escolha o id da pagina que será inserido a politica de trocas, devoluções .... :   <br/>
<input type="text" id="idPaginaTermos" name="idPaginaTermos" value="<?php echo $idPaginaTermos; ?>" style="width:20%"/>
<br/>
<span style="font-size:11px">Digite o ID da pagina ou deixe em branco para não adicionar automáticamente. Neste caso insira  a expressão <strong>[custom_get_Termos] </strong> 
no content da pagina no wordpress.</span>
</p><br/>



 <input type="submit"  name="submit" value="Gravar"   />
</div>










<h2  style="background:#eee;padding:10px;cursor:pointer" > 3 ) Funções e Atalhos  <span   class="btEditarFrete"   rel="funcoes" style="font-size:12px"> (Abrir)  </span> </h2>

<div id="funcoes" style="display:none" class="box" >


 <h3>custom_get_menu_shop_top();</h3>
 <p>Exibe  o menu fixo de opções do usuário (Carrinho, Dados Gerais, Finalizar Compra , Meus pedidos ). Normalmente usado no arquivo header.php ou sidebar.php </p>
 <hr/>
 
 
 <h3> custom_get_image($post->ID,$largura,$altura,$crop,$echo )</h3>
  <p>Recupera a imagem do produto já com  link e  img . Normalmente usada na pagina Single e nas listagens de produtos.</p>
  <p>$crop : 1 => para sim , 0 => para não.</p>
  <p>$echo : true => para imprimir , false => para armazenar em variável.</p>
  <hr/>
  

   <h3>  custom_product_single(); </h3>
    <p>Exibe o box de compras disponível para um produto e o botão comprar .  Normalmente usado na pagina single. </p>
    <hr/>   
   
   
   <h3>  	custom_product_galeria(); </h3>
    <p>Exibe a galeria de imagens do produtos. </p>
    <hr/>


   
    <h3>custom_product_relation_single();   </h3>
     <p>Exibe a lista de produtos relacionados a um determinado produto de mesma categoria. </p>
     <hr/>
     
   
     
    <h3>get_current_symbol(); </h3>    

     <p>Recupera o simbolo cadastrado para a  moeda corrente da loja . Padrão é R$.</p>
     <hr/>


    <h3> custom_get_price($post->ID);  </h3>    

    <p> Preço normal do produto  </p>
     <hr/>


    <h3> custom_get_specialprice($post->ID);  </h3>    

    <p> Preço promocional         </p> 
     <hr/> 
     
     
     <h3>  verifyURL($url);   </h3>    

       <p> caso SSL esteja ativo, substitui http por https .       </p> 
      
      <hr/>
     
      
     
     
     
     
     <p>Veja mais funções no link  <a href="http://wpstore.com.br/ajuda/"><span   class="btEditarFrete"   rel="paginas" style="font-size:12px"><strong>Paginas de configuração do Sistema</strong> </span></a> </p><br/>  






</div>








<h2  style="background:#eee;padding:10px;cursor:pointer" >4 ) Opção para Ativar SSL  <span   class="btEditarFrete"   rel="ssl" style="font-size:12px"> (Editar)  </span> </h2>

<div id="ssl" style="display:none" class="box" >
<p><input type="checkbox" name="ativarssl"  <?php if($ativarssl=="sim"){ echo "CHECKED"; }; ?> /> Selecione para ativar  url SSL em seu site. Assim seu endereço será (https). Esteja garantido de possuir um certificado SSL para seu domínio.</p>
<br/> 

 <input type="submit"  name="submit" value="Gravar"   />
</div>


<h2  style="background:#eee;padding:10px;cursor:pointer" > 5 ) Simbolo Moeda Corrente  <span   class="btEditarFrete"   rel="moeda" style="font-size:12px"> (Editar)  </span> </h2>

<div id="moeda" style="display:none" class="box" >


<p>Escolha o simbolo da moeda Corrente . (ex:U$) :
<input type="text" id="moedaCorrente" name="moedaCorrente" value="<?php echo $moedaCorrente; ?>" style="width:20%"/>
</p><br/>  

 <input type="submit"  name="submit" value="Gravar"   />
</div>


 
 
 <h2  style="background:#eee;padding:10px;cursor:pointer" > 6 ) Parcelamento Mínimo <span   class="btEditarFrete"   rel="parcelamento" style="font-size:12px"> (Editar)  </span> </h2>

 <div id="parcelamento" style="display:none" class="box" >

      <h3>Parcelamento mínimo</h3>
  <p>Valor mínimo para parcelamento (Tabela Pagina produtos) . Exemplo : R$5,00 <br/>
     <input type="text" id="parcelaMinima" name="parcelaMinima" value="<?php echo $parcelaMinima; ?>" style="width:20%"/>     
     
     </p> 
     <h3>Máximo de parcelas</h3>
     <p>Total Máximo de Parcelas :
        <input type="text" id="totalParcela" name="totalParcela" value="<?php echo $totalParcela; ?>" style="width:20%"/>
        </p><br/>

  <input type="submit"  name="submit" value="Gravar"   />
 </div>






 <h2  style="background:#eee;padding:10px;cursor:pointer" > 7 ) Facebook Login <span   class="btEditarFrete"   rel="facebooklogin" style="font-size:12px"> (Editar)  </span> </h2>

 <div id="facebooklogin" style="display:none" class="box" >

      <h3>Facebook APPID</h3>
     <p>sua APPID do facebook :
     <input type="text" id="facebookAPPID" name="facebookAPPID" value="<?php echo $facebookAPPID; ?>" style="width:20%"/>
     </p> 
     <h3>Facebook API SECRET KEY</h3>
     <p>O código  API SECRET KEY de sua API: 
        <input type="text" id="facebookSecret" name="facebookSecret" value="<?php echo $facebookSecret; ?>" style="width:20%"/>
        </p><br/>

  <input type="submit"  name="submit" value="Gravar"   />
 </div>





   <h2  style="background:#eee;padding:10px;cursor:pointer" > 8 ) Google SHOP <span   class="btEditarFrete"   rel="googleShop" style="font-size:12px"> (Editar)  </span> </h2>

 <div id="googleShop" style="display:none" class="box" >

      <h3>Marca Padrão</h3>
     <p>Marca padrão escolhida quando produto não possuir marca cadastrada : </p>     
     <br/>
      <input type="text" id="googleMarca" name="googleMarca" value="<?php echo $googleMarca; ?>" style="width:20%"/> 
     </p> 
     <h3>Categorias do Google</h3>
     <p>Escolha as categorias correspondentes a seus produtos :     
      <br/> 
        <input type="text" id="googleCategorias" name="googleCategorias" value="<?php echo $googleCategorias; ?>" style="width:20%"/>
     </p>
     
     <br/>

  <input type="submit"  name="submit" value="Gravar"   />
 </div>




    




 
 
 
 
 
 


 </form>





 <script>

 jQuery('.btEditarFrete').click(function(){
     rel = jQuery(this).attr('rel');
     jQuery('.box').hide();
     jQuery('#'+rel).show();
 });

 </script>
