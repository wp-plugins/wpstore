<h1>Opções de SMTP</h1>

<?php

$idPaginaCarrinho = 0;
$idPaginaCheckout = 0;



  if( $_POST['submit']=="Gravar" ){
  
          $smtpPort = trim($_POST['smtpPort']); 
          add_option('smtpPortWPSHOP',$smtpPort,'','yes'); 
          update_option('smtpPortWPSHOP',$smtpPort);
 
 
            $smtpSecure = trim($_POST['smtpSecure']); 
            add_option('smtpSecureWPSHOP',$smtpSecure ,'','yes'); 
            update_option('smtpSecureWPSHOP',$smtpSecure );
            
            
            $smtpHost = trim($_POST['smtpHost']); 
            add_option('smtpHostWPSHOP',$smtpHost ,'','yes'); 
            update_option('smtpHostWPSHOP',$smtpHost );
            
            $smtpUser = trim($_POST['smtpUser']); 
            add_option('smtpUserWPSHOP',$smtpUser ,'','yes'); 
            update_option('smtpUserWPSHOP',$smtpUser );
            
            $smtpPass= trim($_POST['smtpPass']); 
            add_option('smtpPassWPSHOP',$smtpPass ,'','yes'); 
            update_option('smtpPassWPSHOP',$smtpPass );


            $smtpFrom = trim($_POST['smtpFrom']); 
               add_option('smtpFromWPSHOP',$smtpFrom ,'','yes'); 
               update_option('smtpFromWPSHOP',$smtpFrom );
               
   };


$smtpPort = get_option('smtpPortWPSHOP');
$smtpSecure= get_option('smtpSecureWPSHOP');
$smtpHost= get_option('smtpHostWPSHOP');
$smtpUser= get_option('smtpUserWPSHOP');
$smtpPass= get_option('smtpPassWPSHOP');
$smtpFrom= get_option('smtpFromWPSHOP');
?>
 
 
 
	<form action="<?php echo verifyURL(get_option( 'siteurl' )) ."/wp-admin/admin.php?page=lista_smtp";?>"  method="post" >




 
   <h2 style='background:#eee;padding:10px;cursor:pointer'> 1 ) PORTA SMTP</h2>
 
  <label for="valorFreteValor6">Defina a porta do servidor</label>
  <br/>
   <input type="text" id="smtpPort" name="smtpPort" value="<?php echo $smtpPort; ?>"  style="width:40%"  />
  <br/>
  <span style="font-size:10px">Ex:465,25,587</span>
  
  

  <h2 style='background:#eee;padding:10px;cursor:pointer'> 2 ) SMTP SECURE</h2>

    <label for="valorFreteValor6">Defina o SMTPSECURE </label>
     <br/>
     <input type="text" id="smtpSecure" name="smtpSecure" value="<?php echo $smtpSecure; ?>"  style="width:40%"  />
    <br/>
    <span style="font-size:10px">Ex:ssl,tls</span>
    
    

  <h2 style='background:#eee;padding:10px;cursor:pointer'> 3 ) SMTP HOST</h2>

      <label for="valorFreteValor6">Defina o SMTPHOST </label>
       <br/>
       <input type="text" id="smtpHost" name="smtpHost" value="<?php echo $smtpHost; ?>"  style="width:40%"  />
      <br/>
      <span style="font-size:10px">Ex:localhost,smtp.gmail.com</span>
      
      
        <h2 style='background:#eee;padding:10px;cursor:pointer'> 4 ) SMTP USER NAME</h2>

        <label for="valorFreteValor6">Defina o email/usuario do CMTP </label>
         <br/>
         <input type="text" id="smtpUser" name="smtpUser" value="<?php echo $smtpUser; ?>"  style="width:40%"  />
        <br/>
        <span style="font-size:10px">Ex:seuemail@seudominio.com.br</span>
      
      
          <h2 style='background:#eee;padding:10px;cursor:pointer'> 5 ) SMTP USER PASSWORD</h2>

          <label for="valorFreteValor6">Defina o email/usuario do CMTP </label>
           <br/>
           <input type="password" id="smtpPass" name="smtpPass" value="<?php echo $smtpPass; ?>"   style="width:40%" />
          <br/>
          <span style="font-size:10px">Ex:****</span>



          <h2 style='background:#eee;padding:10px;cursor:pointer'> 5 ) SMTP USER FROM</h2>

                  <label for="valorFreteValor6">Se desejar defina um email alternativo de seu domínio  para enviar a mensagem.</label>
                  <br/>
                  <input type="text" id="smtpFrom" name="smtpFrom" value="<?php echo $smtpFrom; ?>" style="width:40%" />
                  <br/>
                  <span style="font-size:10px">Ex:email@seudominio.com.br</span>
          

 <br/> <br/>

           <input type="submit"  name="submit" value="Gravar"   />


          </form>

 <br/> <br/>