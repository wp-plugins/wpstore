<?php
$htmlVar .="<section class='checkout'>
	<div class='block'>
    	<div class='block-head'>Etapa 1: Confirme Seus Dados Pessoais  e o Endereço para Entrega</div>
        <div class='block-content'>
 
            <!-- Your dialog markup -->
            <div class='my-dialog'>";  
            
            
             if ( is_user_logged_in() ) {

                      include('meus-dados.php');
                      
                      $htmlVar .= " <br/>
                          	        <p> <span class='btSeguir1 button'>Continuar</span></p>
                          	        <p class='msg'></p>
                          	        <br/> ";
                        
             }else{
                 
                      include('loginRegistro.php');  
             
             };
             
             
            
              $blockHead = "";
              if ( is_user_logged_in() ) {  $blockHead = "block-head";  }else{   $blockHead = "block-headl";  }; 
              $blockHead = "block-headl";
        
        
         $htmlVar .="  </div>



            <div class='clear'></div>
        </div>
    </div>
 
    <div class='block'>
    	<div class='$blockHead'>Etapa 2: Escolha o Tipo de entrega e Frete</div>
        <div class='block-content'>
            <div class='content form-inline'>
            
             <p>Por favor selecione o tipo de entrega de sua preferência para realizar esta compra.</p>";
             
           
           
           include('box-frete.php');   
           
           
           
            $htmlVar .="  <div class='clear'></div>"; 

            
            
            include('box-desconto.php'); 


           $htmlVar .="  <div class='clear'></div>"; 
            
            
            /*
                <div class="field"><label>Se desejar, adicione abaixo qualquer comentário sobre seu pedido:</label>
                <textarea style="width: 98%;" rows="8" id='addComentOrder'></textarea></div>
              */ 
              
          $htmlVar .="  
              <p> <span class='btSeguir2 button'>Continuar</span></p>
              <span class='msg2'></span>
            	                         	 
            	
            	<br/>
             
            </div>
            <div class='clear'></div>
        </div>
    </div>";  
    
       $enderecoRetirada = get_option('enderecoRetirada');
       
       $htmlVar .="   
    <div class='block'>
    	<div class='$blockHead'>Etapa 3: Selecione a  Forma de pagamento desejada </div>
        <div class='block-content'>
            <div class='content form-inline'>
                <p>Por favor selecione o   método de pagamento de sua preferência para realizar esta compra.</p>
                ";
                
                global $current_user;
                      get_currentuserinfo();
                      
                      
                      $plugin_directory = str_replace('functions/','functions/',plugin_dir_url( __FILE__ ));
 
                      
            if( $current_user->ID==1 || $current_user->ID==4849 ){
               $htmlVar .=" <hr/><br/><div class='field'><input type='radio' class='tipoPagto' name='tipoPagto' value='Cielo' checked='checked'>  <img src='".$plugin_directory."images/cielo.png' > &nbsp; CIELO  <img src='".$plugin_directory."images/mastercard.png' width='40'> <img src='".$plugin_directory."images/visa.png' width='40'> <img src='".$plugin_directory."images/diners.png' width='40'>   <img src='".$plugin_directory."images/elo.png' width='40'> <img src='".$plugin_directory."images/discovery.png' width='40'> 
               <br/><span style='font-size:10px'> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;Função Crédito e Débito* : Opção Débito disponível para VISA E MASTERCARD.</span>  </div>";
             }; 
              $htmlVar .="<hr/><br/> <div class='field'><input type='radio' class='tipoPagto' name='tipoPagto' value='Redecard' checked='checked'><img src='".$plugin_directory."images/redecard.png' >  &nbsp; Redecard  <img src='".$plugin_directory."images/mastercard.png' width='40'> <img src='".$plugin_directory."images/visa.png' width='40'>  <img src='".$plugin_directory."images/diners.png' width='40'> 
              <br/><span style='font-size:10px'>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;Função Crédito</span> 
               </div>
               
			<br/><hr/><div class='field'><input type='radio' class='tipoPagto'  name='tipoPagto' value='Pagseguro'> <img src='".$plugin_directory."images/pagseguro.png' > &nbsp; Pagseguro <img src='".$plugin_directory."images/pagseguro2.png' > 
				   <br/><span style='font-size:10px'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;Função Crédito , Débito e Boleto</span> 
				   </div>
				   
			<br/><hr/>	<div class='field'><input type='radio' class='tipoPagto'  name='tipoPagto' value='Depósito'> <img src='".$plugin_directory."images/deposito.png' > &nbsp; Deposito em conta Corrente    <img src='".$plugin_directory."images/bb.png' width='40'>  <img src='".$plugin_directory."images/itau.png' width='40'>  </div>
		
			<br/><hr/>	<div class='field'><input type='radio' class='tipoPagto'  name='tipoPagto' value='Retirar na Loja'> <img src='".$plugin_directory."images/retirada.png' > &nbsp;   	Retirada na Loja . 
			<span style='font-size:10px'>( <strong style='color:red'>ATENÇÃO </strong>: Retiradas somente no RJ,  em nossa Loja no endereço : 
				 $enderecoRetirada . )</span></div>
                
              
                 <p> <span class='btSeguir3 button'>Continuar</span></p>
                 <span class='msg2'></span>
              
              
            </div>
            <div class='clear'></div>
        </div>
    </div>
   
</section>
"; ?>