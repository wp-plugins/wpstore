<?php
$moedaCorrente  =  get_option('moedaCorrenteWPSHOP');
if($moedaCorrente==""){
  $moedaCorrente = "R$" ; 
}

 
       if( $_POST['submit']=="Gravar" ){
            
            $cepOrigemCorreios = trim($_POST['cepOrigemCorreios']);
            add_option('cepOrigemCorreios',$cepOrigemCorreios,'','yes'); 
            update_option('cepOrigemCorreios',$cepOrigemCorreios);
               
               
             $alturaEmbalagemCorreios  = trim($_POST['alturaEmbalagemCorreios']);
             add_option('alturaEmbalagemCorreios',$alturaEmbalagemCorreios ,'','yes'); 
             update_option('alturaEmbalagemCorreios',$alturaEmbalagemCorreios );
                  
             $larguraEmbalagemCorreios = trim($_POST['larguraEmbalagemCorreios']);
             add_option('larguraEmbalagemCorreios',$larguraEmbalagemCorreios,'','yes'); 
             update_option('larguraEmbalagemCorreios',$larguraEmbalagemCorreios);
                     
             $comprimentoEmbalagemCorreios = trim($_POST['comprimentoEmbalagemCorreios']);
             add_option('comprimentoEmbalagemCorreios',$comprimentoEmbalagemCorreios,'','yes'); 
             update_option('comprimentoEmbalagemCorreios',$comprimentoEmbalagemCorreios);
             
              $tipoFrete = trim($_POST['tipoFrete']);
              add_option('tipoFrete',$tipoFrete,'','yes'); 
              update_option('tipoFrete',$tipoFrete);
              
               $valorFreteFixo  = trim($_POST['valorFreteFixo']);   
               add_option('valorFreteFixo',$valorFreteFixo,'','yes'); 
               update_option('valorFreteFixo',$valorFreteFixo);  
               
               
               
               $valorFretePeso1   = trim($_POST['valorFretePeso1']);  
                  add_option('valorFretePeso1',$valorFretePeso1,'','yes'); 
                  update_option('valorFretePeso1',$valorFretePeso1);
               $valorFretePeso2   = trim($_POST['valorFretePeso2']);  
                  add_option('valorFretePeso2',$valorFretePeso2,'','yes'); 
                  update_option('valorFretePeso2',$valorFretePeso2);
               $valorFretePeso3   = trim($_POST['valorFretePeso3']);  
                  add_option('valorFretePeso3',$valorFretePeso3,'','yes'); 
                  update_option('valorFretePeso3',$valorFretePeso3);
               $valorFretePeso4   = trim($_POST['valorFretePeso4']);  
                  add_option('valorFretePeso4',$valorFretePeso4,'','yes'); 
                  update_option('valorFretePeso4',$valorFretePeso4);
               $valorFretePeso5   = trim($_POST['valorFretePeso5']);    
                  add_option('valorFretePeso5',$valorFretePeso5,'','yes'); 
                  update_option('valorFretePeso5',$valorFretePeso5);
                  $valorFretePeso6   = trim($_POST['valorFretePeso6']);    
                        add_option('valorFretePeso6',$valorFretePeso6,'','yes'); 
                        update_option('valorFretePeso6',$valorFretePeso6); 
               
               
               $valorFreteValor1  = trim($_POST['valorFreteValor1']); 
                  add_option('valorFreteValor1',$valorFreteValor1,'','yes'); 
                  update_option('valorFreteValor1o',$valorFreteValor1);
               $valorFreteValor2  = trim($_POST['valorFreteValor2']); 
                  add_option('valorFreteValor2',$valorFreteValor2,'','yes'); 
                  update_option('valorFreteValor2',$valorFreteValor2);
               $valorFreteValor3  = trim($_POST['valorFreteValor3']);
                  add_option('valorFreteValor3',$valorFreteValor3,'','yes'); 
                  update_option('valorFreteValor3',$valorFreteValor3); 
               $valorFreteValor4  = trim($_POST['valorFreteValor4']);
                  add_option('valorFreteValor4',$valorFreteValor4,'','yes'); 
                  update_option('valorFreteValor4',$valorFreteValor4); 
               $valorFreteValor5  = trim($_POST['valorFreteValor5']);  
                  add_option('valorFreteValor5',$valorFreteValor5,'','yes'); 
                  update_option('valorFreteValor5',$valorFreteValor5); 
                
                   $valorFreteValor6  = trim($_POST['valorFreteValor6']);  
                        add_option('valorFreteValor6',$valorFreteValor6,'','yes'); 
                        update_option('valorFreteValor6',$valorFreteValor6);
                        
                          
                  $cidadesFreteGratis  = trim($_POST['cidadesFreteGratis']);  
                        add_option('cidadesFreteGratis',$cidadesFreteGratis,'','yes'); 
                        update_option('cidadesFreteGratis',$cidadesFreteGratis); 
                   
                  
                   
 
       };
 

$cepOrigemCorreios = get_option('cepOrigemCorreios');

$alturaEmbalagemCorreios  =  get_option('alturaEmbalagemCorreios');
$larguraEmbalagemCorreios = get_option('larguraEmbalagemCorreios');
$comprimentoEmbalagemCorreios =get_option('comprimentoEmbalagemCorreios');
 $valorFreteFixo  =get_option('valorFreteFixo');
 
    $valorFretePeso1 =get_option('valorFretePeso1');
       $valorFretePeso2 =get_option('valorFretePeso2');
          $valorFretePeso3 =get_option('valorFretePeso3');
             $valorFretePeso4 =get_option('valorFretePeso4');
                $valorFretePeso5 =get_option('valorFretePeso5');
                   $valorFretePeso6 =get_option('valorFretePeso6');


      $valorFreteValor1 =get_option('valorFreteValor1');
       $valorFreteValor2 =get_option('valorFreteValor2');
        $valorFreteValor3 =get_option('valorFreteValor3');
         $valorFreteValor4 =get_option('valorFreteValor4');
          $valorFreteValor5 =get_option('valorFreteValor5');
          $valorFreteValor6 =get_option('valorFreteValor6');
          
          $cidadesFreteGratis =get_option('cidadesFreteGratis');


$tipoFrete =get_option('tipoFrete');

if(intval($alturaEmbalagemCorreios)<=0){
  $alturaEmbalagemCorreios  = 9;  
}

if(intval($larguraEmbalagemCorreios)<=0){
  $larguraEmbalagemCorreios  = 9;  
}

if(intval($comprimentoEmbalagemCorreios)<=0){
  $comprimentoEmbalagemCorreios  = 9;  
}

?>


<h1>Opções De frete e entrega</h1>

<br/><br/><br/>


    
<form action="<?php echo verifyURL(get_option( 'siteurl' )) ."/wp-admin/admin.php?page=lista_frete";?>"  method="post" >



<p>Método de frete atual : <strong><?php echo $tipoFrete; ?></strong> </p>

<h2    style="background:#eee;padding:10px;cursor:pointer"> 
<input type="radio" name="tipoFrete" value="gratis" <?php  if($tipoFrete=='gratis'){ echo "CHECKED"; }; ?>  /> 1) Frete Gratis  <span   class="btEditarFrete"   rel="gratis" style="font-size:12px"> (Editar)  </span> </h2>

<div id="gratis" style="display:none" class="box" >

<p>Selecione acima para ativar promoção de frete Grátis </p>

</div>

<hr/>





<h2     style="background:#eee;padding:10px;cursor:pointer">  
<input type="radio" name="tipoFrete" value="correios"  <?php  if($tipoFrete=='correios'){ echo "CHECKED"; }; ?> /> 2 ) SEDEX / PAC  <span  class="btEditarFrete"  rel="correios" style="font-size:12px"> (Editar)  </span> </h2>

<div id="correios" style="display:none" class="box" >

<h2> 2.1 ) CEP DE ORIGEM </h2>

<p>Preencha o CEP De origem para calculo de entrega Correiors :</p>

<p>
<label for="emailPagseguro">Cep Origem : </label>
<input type="text" id="cepOrigemCorreios" name="cepOrigemCorreios" value="<?php echo $cepOrigemCorreios; ?>" />
<br/>
<span style="font-size:10px">Sem espaços ou hiffen</span>
</p>
 
 

<h2   class="tipoFrete"  style="background:#eee;padding:10px;cursor:pointer"> 2.2 ) Dimensões de Embalagem  </h2>

<p>Preencha as dimensões da Embalagem de entrega :</p>

<p>
<label for="alturaEmbalagemCorreios">Altura: </label>
<input type="text" id="alturaEmbalagemCorreios" name="alturaEmbalagemCorreios" value="<?php echo $alturaEmbalagemCorreios; ?>" />
<br/>
<span style="font-size:10px">Minimo Recomendado : 9 </span>
</p>

<p>
<label for="larguraEmbalagemCorreios">Largura: </label>
<input type="text" id="larguraEmbalagemCorreios" name="larguraEmbalagemCorreios" value="<?php echo $larguraEmbalagemCorreios; ?>" />
<br/>
<span style="font-size:10px">Minimo Recomendado : 18 </span>
</p>


<p>
<label for="comprimentoEmbalagemCorreios">Comprimento: </label>
<input type="text" id="comprimentoEmbalagemCorreios" name="comprimentoEmbalagemCorreios" value="<?php echo $comprimentoEmbalagemCorreios; ?>" />
<br/>
<span style="font-size:10px">Minimo Recomendado : 27 </span>
</p>
 

</div>

<hr/>


 


 <h2  class="tipoFrete"  style="background:#eee;padding:10px;cursor:pointer">  
 <input type="radio" name="tipoFrete" value="fixo" <?php  if($tipoFrete=='fixo'){ echo "CHECKED"; }; ?> />   3) Frete FIXO <span  class="btEditarFrete"   rel="fixo" style="font-size:12px"> (Editar)  </span>  </h2>
 
 
 <div style="display:none" class="box" id="fixo" >
           <p>Digite o valor abaixo see desejar cobrar um valor fixo de frete para cada Venda.</p>
           <label for="valorFreteFixo">Valor fixo para o frete : <?php echo $moedaCorrente; ?></label>
           <input type="text" id="valorFreteFixo" name="valorFreteFixo" value="<?php echo $valorFreteFixo; ?>" />
           <br/>
           <span style="font-size:10px">Ex:10.00</span>
  </div>
 
 <hr/>
 
 
 
 
 
 
 

  <h2   class="tipoFrete"   style="background:#eee;padding:10px;cursor:pointer" >  
  <input type="radio" name="tipoFrete" value="pesoBase"  <?php  if($tipoFrete=='pesoBase'){ echo "CHECKED"; }; ?> />   4) Peso como base de frete <span   class="btEditarFrete"   rel="pesoBase" style="font-size:12px"> (Editar)   </span> </h2>



           <div style="display:none"  id="pesoBase" class="box" >
           
           
                  <p>Digite o valor do frete de acordo com a faixa de peso.</p>

                   <br/>
                    <label for="valorFreteFixo">Peso entre 0 e 1 kg => <?php echo $moedaCorrente; ?></label>
                    <input type="text" id="valorFretePeso1" name="valorFretePeso1" value="<?php echo $valorFretePeso1; ?>" />
                     <br/>
                      <span style="font-size:10px">Ex:10.00</span>
  
  
                     <br/>
                     <label for="valorFreteFixo">Peso entre 1 e 5 kg => <?php echo $moedaCorrente; ?></label>
                     <input type="text" id="valorFretePeso2" name="valorFretePeso2" value="<?php echo $valorFretePeso2; ?>" />
                     <br/>
                      <span style="font-size:10px">Ex:10.00</span>
    
    
                      <br/>
                      <label for="valorFreteFixo">Peso entre 5 e 10 kg => <?php echo $moedaCorrente; ?></label>
                       <input type="text" id="valorFretePeso3" name="valorFretePeso3" value="<?php echo $valorFretePeso3; ?>" />
                        <br/>
                        <span style="font-size:10px">Ex:10.00</span>
       
                         <br/>
                          <label for="valorFreteFixo">Peso entre 10 a 20 kg => <?php echo $moedaCorrente; ?></label>
                          <input type="text" id="valorFretePeso4" name="valorFretePeso4" value="<?php echo $valorFretePeso4; ?>" />
                          <br/>
                          <span style="font-size:10px">Ex:10.00</span>



                         <br/>
                         <label for="valorFreteFixo">Peso entre 20 a 30 kg => <?php echo $moedaCorrente; ?></label>
                         <input type="text" id="valorFretePeso5" name="valorFretePeso5" value="<?php echo $valorFretePeso5; ?>" />
                          <br/>
                          <span style="font-size:10px">Ex:10.00</span>
                
   
   
                          <br/>
                         <label for="valorFreteFixo">Acima de 30 kg => <?php echo $moedaCorrente; ?></label>
                        <input type="text" id="valorFretePeso6" name="valorFretePeso6" value="<?php echo $valorFretePeso6; ?>" />
                         <br/>
                           <span style="font-size:10px">Ex:10.00</span>
                                         


            </div>

              <hr/>







             <h2 class="tipoFrete" style="background:#eee;padding:10px;cursor:pointer" >
               <input type="radio" name="tipoFrete"  value="precoBase"  <?php  if($tipoFrete=='precoBase'){ echo "CHECKED"; }; ?>  />    5) Preço como base de frete <span  class="btEditarFrete" rel="precoBase" style="font-size:12px"> (Editar)  </span></h2>

 
 
              <div style="display:none"   id="precoBase" class="box" >
              
                <p>Digite o valor do frete de acordo com a faixa de preço .</p>
 
                <br/>
                <label for="valorFreteValor1">Preço entre <?php echo $moedaCorrente; ?>10 e <?php echo $moedaCorrente; ?>100  => <?php echo $moedaCorrente; ?></label>
                <input type="text" id="valorFreteValor1" name="valorFreteValor1" value="<?php echo $valorFreteValor1; ?>" />
                <br/>
                <span style="font-size:10px">Ex:10.00</span>

                <br/>
                <label for="valorFreteValor2">Preço entre <?php echo $moedaCorrente; ?>100 e <?php echo $moedaCorrente; ?>200 => <?php echo $moedaCorrente; ?></label>
                <input type="text" id="valorFreteValor2" name="valorFreteValor2" value="<?php echo $valorFreteValor2; ?>" />
                <br/>
                <span style="font-size:10px">Ex:10.00</span>
              
                <br/>
                <label for="valorFreteValor3">Preço entre <?php echo $moedaCorrente; ?>200 e <?php echo $moedaCorrente; ?>300  => <?php echo $moedaCorrente; ?></label>
                <input type="text" id="valorFreteValor3" name="valorFreteValor3" value="<?php echo $valorFreteValor3; ?>" />
                <br/>
                <span style="font-size:10px">Ex:10.00</span>
              
              
                
                <br/>
                <label for="valorFreteValor34">Preço entre <?php echo $moedaCorrente; ?>300 e <?php echo $moedaCorrente; ?>400  => <?php echo $moedaCorrente; ?></label>
                <input type="text" id="valorFreteValor4" name="valorFreteValor4" value="<?php echo $valorFreteValor4; ?>" />
                <br/>
                <span style="font-size:10px">Ex:10.00</span>
                  
               
                 <br/>
                 <label for="valorFreteValor5">Preço entre <?php echo $moedaCorrente; ?>400 e <?php echo $moedaCorrente; ?>500  => <?php echo $moedaCorrente; ?></label>
                 <input type="text" id="valorFreteValor5" name="valorFreteValor5" value="<?php echo $valorFreteValor5; ?>" />
                 <br/>
                 <span style="font-size:10px">Ex:10.00</span>
                        
                        
                  <br/>
                  <label for="valorFreteValor6">Acima de <?php echo $moedaCorrente; ?>500  => <?php echo $moedaCorrente; ?></label>
                  <input type="text" id="valorFreteValor6" name="valorFreteValor6" value="<?php echo $valorFreteValor6; ?>" />
                  <br/>
                  <span style="font-size:10px">Ex:10.00</span>
                  
               </div>
      
               <hr/>
 
                <h2  class="tipoFrete"  style="background:#eee;padding:10px;cursor:pointer">  
                   6) PROMOÇÕES DE FRETE <span  class="btEditarFrete"   rel="promo" style="font-size:12px"> (Editar)  </span>  </h2>


                <div style="display:none" class="box" id="promo" >
                          <h2>Frete Grátis para Cidades:</h2>
                          <p>Digite entre Virgulas a lista de UF**CIDADES para promoção de frete grátis.</p>
                          <label for="cidadesFreteGratis"></label>
                          <textarea id="cidadesFreteGratis" name="cidadesFreteGratis"  style="width:50%" ><?php echo $cidadesFreteGratis; ?></textarea>
                          <br/>
                          <span style="font-size:10px">Ex: RJ**Niterói,RJ**São Gonçalo,RJ**Rio Bonito,RJ**Maricá,RJ**Itaboraí</span>
                 </div>

 

 <input type="submit"  name="submit" value="Gravar"   />


</form>


<script>

jQuery('.btEditarFrete').click(function(){
    rel = jQuery(this).attr('rel');
    jQuery('.box').hide();
    jQuery('#'+rel).show();
});

</script>

 