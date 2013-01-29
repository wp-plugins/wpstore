<h1>Opções de Design</h1>

<?php
 
 
   if( $_POST['submit']=="Gravar" ){
         
         $logoSite = trim($_POST['logoSite']);
         add_option('logoSiteWPSHOP',$logoSite,'','yes'); 
         update_option('logoSiteWPSHOP',$logoSite);
         
         $tipoSkinShop = trim($_POST['tipoSkinShop']);
         
         add_option('tipoSkinShop',$tipoSkinShop,'','yes'); 
          update_option('tipoSkinShop',$tipoSkinShop);
          
          
           $exibirFreteSingle = trim($_POST['exibirFreteSingle']);
          add_option('exibirFreteSingle',$exibirFreteSingle,'','yes'); 
           update_option('exibirFreteSingle',$exibirFreteSingle);
           
            $exibeQtdProd = trim($_POST['exibeQtdProd']);
           add_option('exibeQtdProd',$exibeQtdProd,'','yes'); 
            update_option('exibeQtdProd',$exibeQtdProd);
           
         
         
         
         
                                                   if (isset( $_POST['exibirTabela'] )) {
                                                               $exibirTabela = "sim"; 
                                                               add_option('exibirTabelaWPSHOP',$exibirTabela,'','yes'); 
                                                               update_option('exibirTabelaWPSHOP',$exibirTabela);
                                                     }else{
                                                          $exibirTabela = "não"; 
                                                           add_option('exibirTabelaWPSHOP',$exibirTabela,'','yes'); 
                                                           update_option('exibirTabelaWPSHOP',$exibirTabela);
                                                     }



                                           $imagemTabela= trim($_POST['imagemTabela']); 
                                           add_option('imagemTabelaWPSHOP',$imagemTabela,'','yes'); 
                                           update_option('imagemTabelaWPSHOP',$imagemTabela);
                                           
                                             
           
 
    };


$logoSiteWPSHOP = get_option('logoSiteWPSHOP');
$tipoSkinShop = get_option('tipoSkinShop');

$exibirFreteSingle = get_option('exibirFreteSingle');

$exibeQtdProd = get_option('exibeQtdProd');   



$imagemTabela =  get_option('imagemTabelaWPSHOP');  
$exibirTabela =  get_option('exibirTabelaWPSHOP');

?>

<br/><br/><br/>

    
<form action="<?php echo verifyURL(get_option( 'siteurl' )) ."/wp-admin/admin.php?page=lista_design";?>"  method="post" >

 
<h2 style='background:#eee;padding:10px;cursor:pointer'  >1) LOGO  <span   class="btEditarFrete"   rel="logo" style="font-size:12px"> (Editar)  </span></h2>

 <div id="logo" style="display:none" class="box" >
 
 
<p>Insira a URL do Logo : 
<input type="text" id="logoSite" name="logoSite" value="<?php echo $logoSiteWPSHOP; ?>" />
</p>

</div>

<hr/>


 

<h2 style='background:#eee;padding:10px;cursor:pointer'  >2) SKIN  <span   class="btEditarFrete"   rel="skin" style="font-size:12px"> (Editar)  </span></h2>

 <div id="skin" style="display:none" class="box" >
 
 
<p>LIGHT : 
<input type="radio" name="tipoSkinShop" value="LIGHT"  <?php  if($tipoSkinShop=='LIGHT' ||$tipoSkinShop=='' ){ echo "CHECKED"; }; ?> />
</p>

<p>DARK: 
<input type="radio" name="tipoSkinShop" value="DARK"  <?php  if($tipoSkinShop=='DARK'){ echo "CHECKED"; }; ?> />
</p>

</div>

<hr/>





<h2 style='background:#eee;padding:10px;cursor:pointer'  >3) EXIBIR FRETE NA PAGINA DO PRODUTO  <span   class="btEditarFrete"   rel="exibeFrete" style="font-size:12px"> (Editar)  </span></h2>

 <div id="exibeFrete" style="display:none" class="box" >
 
 
<p>SIM : 
<input type="radio" name="exibirFreteSingle" value="sim"  <?php  if($exibirFreteSingle=='sim' ||$tipoSkinShop=='' ){ echo "CHECKED"; }; ?> />
</p>

<p>NÃO: 
<input type="radio" name="exibirFreteSingle" value="não"  <?php  if($exibirFreteSingle=='não'){ echo "CHECKED"; }; ?> />
</p>

</div>




<hr/>





<h2 style='background:#eee;padding:10px;cursor:pointer'  >3) EXIBIR OPCAO  QUANTIDADE DE PRODUTOS NA PAGINA DO PRODUTO <span   class="btEditarFrete"   rel="exibeQtdShow" style="font-size:12px"> (Editar)  </span></h2>

 <div id="exibeQtdShow" style="display:none" class="box" >
 
 
<p>SIM : 
<input type="radio" name="exibeQtdProd" value="sim"  <?php  if($exibeQtdProd=='sim'  ){ echo "CHECKED"; }; ?> />
</p>

<p>NÃO: 
<input type="radio" name="exibeQtdProd" value="não"  <?php  if($exibeQtdProd=='não' ||$tipoSkinShop=='' ){ echo "CHECKED"; }; ?> />
</p>

</div>

    



    <hr/>









  <h2  style="background:#eee;padding:10px;cursor:pointer" >  4 ) Tabela de Tamanho <span   class="btEditarFrete"   rel="tabelaTamanho" style="font-size:12px"> (Editar)  </span> </h2>

<div id="tabelaTamanho" style="display:none" class="box" >

     <h3>Ativar Tabela de Tamanho</h3>
     <p>Exibir tabela de tabela de tamanho no website : </p>     
     <p><input type="checkbox" name="exibirTabela"  <?php if($exibirTabela=="sim"){ echo "CHECKED"; }; ?> /> Selecione para exibir a tabela de tamanhos na pagina do produto.</p>    
    </p> 
    <h3>URL da tabela de tamanho  </h3>
    <p>Copie e cole o código de imagem com a tabela padrão de tamanho . Será exibida caso o produto não possua uma tabela própria </p>
     <br/> 
       <input type="text" id="imagemTabela" name="imagemTabela" value="<?php echo $imagemTabela; ?>" style="width:50%"/>
    </p>       
    
    <br/>

 
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
       	
 
