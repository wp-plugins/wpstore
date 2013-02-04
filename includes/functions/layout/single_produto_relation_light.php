 
 <?php 


                 $categoriaPrincipalName = "";	
            	    $categoriaPrincipalLink =  "";
            	    $categoriaPrincipalID =  "";		

                                if($categoriaPrincipalLink==""){
                                    $catID = get_query_var('cat');
                                    $categoriaPrincipalID =  $catID;
                                    $categoriaPrincipalName = get_cat_name( $catID);	
                                    $categoriaPrincipalLink =  get_category_link(  $catID );
                                }




        foreach((get_the_category()) as $category) { 
 
                           
                         	    if(intval( $category->cat_ID) !=29 && intval( $category->cat_ID) !=31 ){
                         	        $categoriaPrincipalID = $category->cat_ID;
                             	    $categoriaPrincipalName = $category->cat_name;	
                             	    $categoriaPrincipalLink =  get_category_link(  $categoriaPrincipalID );
                             	};

 


        };        //final foreach categories
        
        
        
          if($categoriaPrincipalName !=""){ 
            $categoriaPrincipalName = $categoriaPrincipalName; 
            $categoriaPrincipalLink = $categoriaPrincipalLink;
          };
 
          
          
       ?>
       
       
       <section class="produtosRelacionados">
    

        <h3 class="subtitulo"><?php echo $txtProdutosRelacionados; ?></h3>
        
        
        <div class="listagem">
        
           <?php 
           
           wp_reset_query();       
           
           
           $totalPostListagemPRel  =  get_option('totalPostListagemPRel'); 
             if( $totalPostListagemPRel ==""){   $totalPostListagemPRel = 6;    }   
           $listagemPRelOrder    = get_option('listagemPRelOrder');   
             if($listagemPRelOrder==""){$listagemPRelOrder = "DESC"; }; 
           $listagemPRelOrderby   = get_option('listagemPRelOrderby');
             if($listagemPRelOrderby==""){$listagemPRelOrderby = "none"; };  
           
 

            query_posts(array(
            'post_type' => array(  'produtos' ),
            'cat' => ''.$categoriaPrincipalID,
            'posts_per_page' =>''.$totalPostListagemPRel ,
            'order' => ''.$listagemPRelOrder,
            'orderby'=>''.$listagemPRelOrderby
            ));
           
    
           while ( have_posts() ) : the_post(); 
           
           ?>
     
     	<?php include('listagem.php'); ?>

           <?php endwhile;  
           wp_reset_query();
           ?>

     <div class="clear"></div>
            
            
  </div><!-- .listagem --> 
        
        
    
    </section><!-- .produtosRelacionados -->