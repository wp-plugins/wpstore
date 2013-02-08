<?php

$idPaginaCarrinho = 0;
$idPaginaCheckout = 0;

           if( $_POST['submit']=="Gravar" ){
               
               
               $emailPagseguro = trim($_POST['emailPagseguro']);
               $tokenPagseguro = trim($_POST['tokenPagseguro']);
               $emailRedecard = trim($_POST['emailRedecard']);
               $filicaoRedecard = trim($_POST['filicaoRedecard']);
               $filicaoRedecardGateway = trim($_POST['filicaoRedecardGateway']);
           
  
               add_option( 'emailPagseguro', $emailPagseguro, '', 'yes' ); 
               update_option( 'emailPagseguro',$emailPagseguro );
               add_option( 'tokenPagseguro', $tokenPagseguro, '', 'yes' ); 
               update_option( 'tokenPagseguro', $tokenPagseguro );
               add_option( 'emailRedecard', $emailRedecard , '', 'yes' ); 
               update_option( 'emailRedecard',  $emailRedecard );
               add_option( 'filicaoRedecard', $filicaoRedecard, '', 'yes' ); 
               update_option('filicaoRedecard', $filicaoRedecard);
               
               add_option( 'filicaoRedecardGateway', $filicaoRedecardGateway, '', 'yes' ); 
               update_option('filicaoRedecardGateway', $filicaoRedecardGateway);
             
             
             
             
                      $depositoNomeCnpj = trim($_POST['depositoNomeCnpj']); 
                      
                      $depositoBanco1 = trim($_POST['depositoBanco1']); 
                      $depositoAgencia1 = trim($_POST['depositoAgencia1']);
                      $depositoConta1 = trim($_POST['depositoConta1']); 
                      
                      $depositoBanco2 = trim($_POST['depositoBanco2']); 
                      $depositoAgencia2 = trim($_POST['depositoAgencia2']); 
                      $depositoConta2 = trim($_POST['depositoConta2']); 
                      
                      $depositoMaisInfos = trim($_POST['depositoMaisInfos']);
                      
                      $enderecoRetirada = trim($_POST['enderecoRetirada']);
                      
                      $chaveCielo = trim($_POST['chaveCielo']);
                      $filiacaoCielo = trim($_POST['filiacaoCielo']);
                      
                      
                      $tipoParcelamentoCielo = trim($_POST['tipoParcelamentoCielo']);
                      $capturarAutomaticamenteCielo  = trim($_POST['capturarAutomaticamenteCielo']);
                      $indicadorAutorizacaoCielo = trim($_POST['indicadorAutorizacaoCielo']);
                      
                      
                      
                 
                             
                             
                  add_option('depositoNomeCnpj',$depositoNomeCnpj,'','yes'); 
                  update_option('depositoNomeCnpj',$depositoNomeCnpj);
                  
                  add_option('depositoBanco1',$depositoBanco1,'','yes'); 
                  update_option('depositoBanco1',$depositoBanco1);
                  
                  add_option('depositoConta1',$depositoConta1,'','yes'); 
                  update_option('depositoConta1',$depositoConta1);
         
                  add_option('depositoAgencia1',$depositoAgencia1,'','yes'); 
                  update_option('depositoAgencia1',$depositoAgencia1);
                 
                 
                  add_option('depositoBanco2',$depositoBanco2,'','yes'); 
                  update_option('depositoBanco2',$depositoBanco2);

                  add_option('depositoConta2',$depositoConta2,'','yes'); 
                  update_option('depositoConta2',$depositoConta2);

                  add_option('depositoAgencia2',$depositoAgencia2,'','yes'); 
                  update_option('depositoAgencia2',$depositoAgencia2);     
                      
                  add_option('depositoMaisInfos',$depositoMaisInfos,'','yes'); 
                  update_option('depositoMaisInfos',$depositoMaisInfos);  
                  
                  add_option('enderecoRetirada',$enderecoRetirada,'','yes'); 
                  update_option('enderecoRetirada',$enderecoRetirada);
                  
                  add_option('filiacaoCielo',$filiacaoCielo,'','yes'); 
                  update_option('filiacaoCielo',$filiacaoCielo); 
                  
                   add_option('chaveCielo',$chaveCielo,'','yes'); 
                    update_option('chaveCielo',$chaveCielo);
                  
                  add_option('tipoParcelamentoCielo',$tipoParcelamentoCielo,'','yes'); 
                    update_option('tipoParcelamentoCielo',$tipoParcelamentoCielo);
                    
                    add_option('capturarAutomaticamenteCielo',$capturarAutomaticamenteCielo,'','yes'); 
                      update_option('capturarAutomaticamenteCielo',$capturarAutomaticamenteCielo);
                      
                      add_option('indicadorAutorizacaoCielo',$indicadorAutorizacaoCielo,'','yes'); 
                        update_option('indicadorAutorizacaoCielo',$indicadorAutorizacaoCielo);
          
   
   
                           $ativaPagseguro = trim($_POST['ativaPagseguro']);
                            $ativaCielo = trim($_POST['ativaCielo']);
                            $ativaDeposito = trim($_POST['ativaDeposito']);
                            $ativaRetirada = trim($_POST['ativaRetirada']);
                            
                            $ativaPaypal = trim($_POST['ativaPaypal']); 
                            $ativaGoogleCk = trim($_POST['ativaGoogleCk']);
                            $emailPaypal = trim($_POST['emailPaypal']);
                            $currentCodePaypal  = trim($_POST['currentCodePaypal']);

                             add_option('ativaPagseguro',$ativaPagseguro,'','yes'); 
                             update_option('ativaPagseguro',$ativaPagseguro);

                             add_option('ativaCielo',$ativaCielo,'','yes'); 
                             update_option('ativaCielo',$ativaCielo);

                             add_option('ativaDeposito',$ativaDeposito,'','yes'); 
                             update_option('ativaDeposito',$ativaDeposito);

                             add_option('ativaRetirada',$ativaRetirada,'','yes'); 
                             update_option('ativaRetirada',$ativaRetirada);  
                             
                                add_option('ativaGoogleCk',$ativaGoogleCk,'','yes'); 
                                  update_option('ativaGoogleCk',$ativaGoogleCk);
                                  
                                     add_option('ativaPaypal',$ativaPaypal,'','yes'); 
                                       update_option('ativaPaypal',$ativaPaypal); 
                                       
                                        add_option('emailPaypal',$emailPaypal,'','yes'); 
                                          update_option('emailPaypal',$emailPaypal);
                                          
                                           add_option('currentCodePaypal',$currentCodePaypal,'','yes'); 
                                             update_option('currentCodePaypal',$currentCodePaypal);
                             
                             
           };
 

$emailPagseguro = get_option('emailPagseguro');
$tokenPagseguro =  get_option('tokenPagseguro');
$emailRedecard =  get_option('emailRedecard');
$filicaoRedecard =  get_option('filicaoRedecard');
$filicaoRedecardGateway =  get_option('filicaoRedecardGateway');

$filiacaoCielo=  get_option('filiacaoCielo'); 
$chaveCielo=  get_option('chaveCielo');
$tipoParcelamentoCielo =  get_option('tipoParcelamentoCielo');
$capturarAutomaticamenteCielo =  get_option('capturarAutomaticamenteCielo');
$indicadorAutorizacaoCielo =  get_option('indicadorAutorizacaoCielo');

  
            $depositoNomeCnpj =get_option('depositoNomeCnpj'); 
            
            $depositoBanco1 = get_option('depositoBanco1'); 
            $depositoAgencia1 =get_option('depositoAgencia1');
            $depositoConta1 = get_option('depositoConta1');
            
            $depositoBanco2 = get_option('depositoBanco2');
            $depositoAgencia2 = get_option('depositoAgencia2'); 
            $depositoConta2 = get_option('depositoConta2');
            
            $depositoMaisInfos = get_option('depositoMaisInfos');
            
            
            $enderecoRetirada = get_option('enderecoRetirada');
            
     
            $ativaPagseguro = get_option('ativaPagseguro');
            $ativaCielo = get_option('ativaCielo');
            $ativaDeposito = get_option('ativaDeposito ');
            $ativaRetirada= get_option('ativaRetirada');      
           
           $ativaGoogleCk= get_option('ativaGoogleCk');
           $ativaPaypal= get_option('ativaPaypal'); 
           
        

$emailPaypal = get_option('emailPaypal');        
$currentCodePaypal  = get_option('currentCodePaypal');    

?>


<h1>Opções Gerais de Pagamento</h1>

<br/><br/><br/>


    
	<form action="<?php echo verifyURL(get_option( 'siteurl' )) ."/wp-admin/admin.php?page=lista_pagamentos";?>"  method="post" >






<h2  style="background:#eee;padding:10px;cursor:pointer" >

<input type="checkbox" name="ativaPagseguro" value="ativaPagseguro"  <?php  if($ativaPagseguro=='ativaPagseguro'){ echo "CHECKED"; }; ?> />  1 ) Pagseguro  <span   class="btEditarFrete"   rel="pagseguro" style="font-size:12px"> (Editar)  </span>  </h2>



<div id="pagseguro" style="display:none" class="box" >


<p>Preencha seus dados do Pagseguro :</p>

<p>
<label for="emailPagseguro">Pagseguro Email</label>
<input type="text" id="emailPagseguro" name="emailPagseguro" value="<?php echo $emailPagseguro; ?>" />
</p>

<p>
<label for="emailPagseguro">Pagseguro TOKEN </label>
<input type="text" id="tokenPagseguro" name="tokenPagseguro" value="<?php echo $tokenPagseguro; ?>" />
</p>

<p>Lembre-se de ATIVAR a opção <strong>Integrações- >Notificações</strong> em sua conta no pagseguro e definir a url de retorno de seu site para :<?php echo get_bloginfo('url'); ?></p>

</div>

<hr/>



<?php 

/* //DESATIVADO -----------------

<h2  style="background:#eee;padding:10px;cursor:pointer"> 2 ) RedeCard (locaweb) <span   class="btEditarFrete"   rel="redecard" style="font-size:12px"> (Editar)  </span></h2>


<div id="redecard" style="display:none" class="box" >

<p>Preencha seus dados de integração REDECARD (GATEWAY LOCAWEB-REDECARD) :</p>

<p>
<labe for="emailRedecard">Email vendedor</label>
<input type="text" id="emailRedecard" name="emailRedecard" value="<?php echo $emailRedecard; ?>" />
</p>

<p>
<labe for="filicaoRedecard">Filiação</label>
<input type="text" id="filicaoRedecard" name="filicaoRedecard" value="<?php echo $filicaoRedecard; ?>" />
</p>



<p>
<labe for="filicaoRedecardGateway">Filiação Gateway de Pagamento</label>
<input type="text" id="filicaoRedecardGateway" name="filicaoRedecardGateway" value="<?php echo $filicaoRedecardGateway; ?>" />
</p>


</div>
 

<hr/>

<?php */ ?>


<h2  style="background:#eee;padding:10px;cursor:pointer"> 

<input type="checkbox" name="ativaCielo" value="ativaCielo"  <?php  if($ativaCielo=='ativaCielo'){ echo "CHECKED"; }; ?> /> 

2 ) Cielo <span   class="btEditarFrete"   rel="cielo" style="font-size:12px"> (Editar)  </span></h2>


<div id="cielo" style="display:none" class="box" >

<p>Preencha seus dados de integração com a Cielo :</p>

<p>
<labe for="emailRedecard">Numero Filiação</label>
<input type="text" id="filiacaoCielo" name="filiacaoCielo" value="<?php echo $filiacaoCielo; ?>" />
</p>

<p>
<labe for="filicaoRedecard">Chave</label>
<input type="text" id="chaveCielo" name="chaveCielo" value="<?php echo $chaveCielo; ?>" />
</p>

 


<table>
						<tbody><tr>
							<td>
								Parcelamento
							</td>
							<td><?php //echo $tipoParcelamentoCielo; ?>
								<select name="tipoParcelamentoCielo">
									<option value="2" <? if($tipoParcelamentoCielo=='2'){ echo 'selected="selected" '; }; ?> >Loja</option>
									<option value="3"  <? if($tipoParcelamentoCielo=='3'){ echo 'selected="selected" '; }; ?> >Administradora</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Capturar Automaticamente?</td>
							<td><?php //echo $capturarAutomaticamenteCielo; ?>
								<select name="capturarAutomaticamenteCielo">
									<option value="true"  <? if($capturarAutomaticamenteCielo=='true'){ echo 'selected="selected" '; }; ?> >Sim</option>
									<option value="false"  <? if($capturarAutomaticamenteCielo=='false'){ echo 'selected="selected" '; }; ?> >Não</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Autorização Automática</td>
							<td><?php //echo $indicadorAutorizacaoCielo; ?>
								<select name="indicadorAutorizacaoCielo">
									<option value="3" <? if($indicadorAutorizacaoCielo=='3'){ echo 'selected="selected" '; }; ?> >Autorizar Direto</option>
									<option value="2" <? if($indicadorAutorizacaoCielo=='2'){ echo 'selected="selected" '; }; ?> >Autorizar transação autenticada e não-autenticada</option>
									<option value="0" <? if($indicadorAutorizacaoCielo=='0'){ echo 'selected="selected" '; }; ?> >Somente autenticar a transação</option>
									<option value="1" <? if($indicadorAutorizacaoCielo=='1'){ echo 'selected="selected" '; }; ?> >Autorizar transação somente se autenticada</option>
								</select>
							</td>
						</tr>
					</tbody></table>
					
					


</div>




<hr/>




<h2  style="background:#eee;padding:10px;cursor:pointer">

<input type="checkbox" name="ativaDeposito" value="ativaDeposito"  <?php  if($ativaDeposito=='ativaDeposito'){ echo "CHECKED"; }; ?> /> 

3 ) Depósito bancário <span   class="btEditarFrete"   rel="deposito" style="font-size:12px"> (Editar)  </span></h2>

<div id="deposito" style="display:none" class="box" >

<p>Preencha seus dados bancários para depósito :</p>


<p>
<labe for="depositoNomeCnpj">Nome / CNPJ</label>
<input type="text" id="depositoNomeCnpj" name="depositoNomeCnpj" value="<?php echo $depositoNomeCnpj; ?>" />
</p>




<p>
<labe for="depositoBanco1">Opção Banco 1</label>
<input type="text" id="depositoBanco1" name="depositoBanco1" value="<?php echo $depositoBanco1; ?>" />
</p>

<p>
<labe for="depositoAgencia1">Opção Agência 1</label>
<input type="text" id="depositoAgencia1" name="depositoAgencia1" value="<?php echo $depositoAgencia1; ?>" />
</p>


<p>
<labe for="depositoConta1">Opção Conta 1</label>
<input type="text" id="depositoConta1" name="depositoConta1" value="<?php echo $depositoConta1; ?>" />
</p>

 

<p>
<labe for="depositoBanco2">Opção Banco 2</label>
<input type="text" id="depositoBanco2" name="depositoBanco2" value="<?php echo $depositoBanco2; ?>" />
</p>

<p>
<labe for="depositoAgencia2">Opção Agência 2</label>
<input type="text" id="depositoAgencia2" name="depositoAgencia2" value="<?php echo $depositoAgencia2; ?>" />
</p>


<p>
<labe for="depositoConta2">Opção Conta 2</label>
<input type="text" id="depositoConta2" name="depositoConta2" value="<?php echo $depositoConta2; ?>" />
</p>


<p>
<labe for="depositoMaisInfos">Mais Informações:</label><br/>
<textarea id="depositoMaisInfos" name="depositoMaisInfos"  style="width:50%" >
<?php echo $depositoMaisInfos; ?>
</textarea>
</p>


</div>


 
<hr/>



<h2  style="background:#eee;padding:10px;cursor:pointer"> 

<input type="checkbox" name="ativaRetirada" value="ativaRetirada"  <?php  if($ativaRetirada=='ativaRetirada'){ echo "CHECKED"; }; ?> /> 

4 ) Retirar na Loja <span   class="btEditarFrete"   rel="retirada" style="font-size:12px"> (Editar)  </span></h2>

<div id="retirada" style="display:none" class="box" >

<p>Preencha abaixo os dados e mensagem para reserva com  pagamento e  retirada de produtos na loja  :</p>
 
 
<p>
<labe for="enderecoRetirada">Endereço e infos para retirada:</label><br/>
<textarea id="enderecoRetirada" name="enderecoRetirada"  style="width:50%" >
<?php echo $enderecoRetirada; ?>
</textarea>
</p>

</div>
 
 
<hr/>      













<h2  style="background:#eee;padding:10px;cursor:pointer"> 

<input type="checkbox" name="ativaGoogleCk" value="ativaGoogleCk"  <?php  if($ativaGoogleCk =='ativaGoogleCk'){ echo "CHECKED"; }; ?> /> 

5 ) Google Checkout <span   class="btEditarFrete"   rel="google" style="font-size:12px"> (Editar)  </span></h2>


<div id="google" style="display:none" class="box" >

<p>Preencha seus dados de integração com Google Checkout :</p>


<p>
<labe for="emailPaypal">Email Cadastro Google Checkout</label>
<input type="text" id="emailGoogleCk" name="emailGoogleCk" value="<?php echo $emailPaypal; ?>" />
</p>

<p>
<labe for="chaveGoogle">Chave</label>
<input type="text" id="chaveGoogle" name="chaveGoogle" value="<?php echo $chaveGoogle; ?>" />
</p>
 

 


</div>




<hr/>







<h2  style="background:#eee;padding:10px;cursor:pointer"> 

<input type="checkbox" name="ativaPaypal" value="ativaPaypal"  <?php  if($ativaPaypal=='ativaPaypal'){ echo "CHECKED"; }; ?> /> 

6 ) Paypal <span   class="btEditarFrete"   rel="paypal" style="font-size:12px"> (Editar)  </span></h2>


<div id="paypal" style="display:none" class="box" >

<p>Preencha seus dados de integração com o paypal :</p>

<p>
<labe for="emailPaypal">Email Cadastro Paypal</label>
<input type="text" id="emailPaypal" name="emailPaypal" value="<?php echo $emailPaypal; ?>" />
</p>

<p> 

<labe for="chavePaypal">Current CODE</label>    

<select  id="currentCodePaypal" name="currentCodePaypal"> 
<option value="USD" <?php if($currentCodePaypal=="USD"){ echo "SELECTED"; }; ?> >USD - American Dollars</option>
<option value="BRL" <?php if($currentCodePaypal=="BRL"){ echo "SELECTED"; };  ?> >BRL - Real Brasileiro</option> 
</select>  

</p>
 
</div>




<hr/>








 <input type="submit"  name="submit" value="Gravar"   />


</form>



<script>

jQuery('.btEditarFrete').click(function(){
    rel = jQuery(this).attr('rel');
    jQuery('.box').hide();
    jQuery('#'+rel).show();
});

</script>



 