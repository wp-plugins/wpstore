	
	<?php
	
	
	 
	    //UPLOAD FORM -----------------------------------------------
		$ativaruploadForm=  get_option('ativaruploadFormWPSHOP'); 
		
		if($ativaruploadForm=='sim' ){

	     $txtEnviarUpload = get_option('txtEnviarUploadWPSHOP');
		if($txttxtEnviarUpload==""){
		$txtEnviarUpload = "Envie abaixo, os arquivos para personalização de seu produto e em seguida siga para pagamento. ";
	     };

		  $txtPrint .= "<br/><h2>$txtEnviarUpload</h2>";
		  
		  
		  
	   	$plugin_directory = str_replace('layout/','',plugin_dir_url( __FILE__ ));

	      
		   
		   $pic = $plugin_directory."images/upload.png";
		   
		   
		   
 
		   
		   
		   //FOREACH PRODUTO--------

              global $wpdb;
  
              $tabela = $wpdb->prefix."";
              $tabela .=  "wpstore_orders_products";

      
   
	      $fivesdrafts = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM  `$tabela` WHERE  `id_usuario`='$idUser'  AND `id_pedido`='$idPedido'   ORDER BY `id`  DESC "  ,1,'') );

	      if($_GET['order'] !=""){
	          $order = $_GET['order'];
	          $fivesdrafts = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM  `$tabela` WHERE  `id_pedido`='$order'  AND `id_usuario`='$idUser' ORDER BY `id`  DESC "  ,1,'') );
	      };




             // Adicionando PRODUTOS

             foreach ( $fivesdrafts as $item=>$fivesdraft ){
             	 	 	 	 	
            
                 $id_produto = $fivesdraft->id_produto;
            
		      $idped = str_replace('.','',$idPedido);
		      $id = "1$id_produto$idped";
			  
			  
                 $pic =  trim(get_user_meta($idUser,$id,true));  
                 if($pic==""){
                         $pic = $plugin_directory."layout/images/upload.png";
                 }
		
		
		
		
		
			$download = get_post_meta($id_produto,'download',true);

		    $txtDownload = get_option('txtDownloadWPSHOP');
			if($txtDownload==""){
				$txtDownload = "Fazer Download";
			}


               $downL ="";
			if($download !=''){
				     $downL .= "<small style='font-size:0.5em'><a class='downloadBtWPS' href='$download' target='_blank'>( $txtDownload )</a></small>";
			};



		
	          $txtPrint .= "
				<br/><br/>
				<h1>".get_the_title($id_produto)."  $downL</h1>";
				
				
				
				
			
 
 
 
			    $txtPrint .= "	<h3>Arquivo 1</h3>
			<div class='avatar'>
	          <img class='mypic$id' src='$pic' alt='meu arquivo' width='40' />
	          <span class='addFoto' id='upload_image_button$id'>Adicionar Arquivo</span>   
	       </div>
		   
		   
		   <br/><br/><br/><br/>
		   
		   
		   <script>
		//IMAGE UPLOAD ----------------------------------------------
                                                   
		var custom_uploader$id;


	    jQuery('#upload_image_button$id').click(function(e) {
			
			
 baseUrl =   jQuery('meta[name=urlShop]').attr('content');

	        e.preventDefault();

	        //If the uploader object has already been created, reopen the dialog
	        if (custom_uploader$id) {
	            custom_uploader$id.open();
	            return;
	        }

	        //Extend the wp.media object
	        custom_uploader$id = wp.media.frames.file_frame = wp.media({
	            title: 'Escolher Imagem',
	            button: {
	                text: 'Escolher Imagem'
	            },
	            multiple: false
	        });

	        //When a file is selected, grab the URL and set it as the text field's value
	        custom_uploader$id.on('select', function() {
	            attachment = custom_uploader$id.state().get('selection').first().toJSON();
	            jQuery('.mypic$id').attr('src',attachment.url);  

	             url= baseUrl+'setPicUser.php';  
	             jQuery.post(url, { 
					       refImg:'$id',   
	                       pic :attachment.url  
	                } , function(data) {     
	             });
  
  
	        });

	        //Open the uploader dialog
	        custom_uploader$id.open();
			
 

	    });


		//IMAGE UPLOD -----------------------------------------------  
		</script> ";
		
		
 
	   
      $id = "2$id_produto$idped";
		
           $pic =  trim(get_user_meta($idUser,$id,true));  
           if($pic==""){
                     $pic = $plugin_directory."layout/images/upload.png";
           }
		
		
        $txtPrint .= "
		
			<h3>Arquivo 2 : SOMENTE SE PRODUTO 4/4  </h3>
		<div class='avatar'>
          <img class='mypic$id' src='$pic' alt='meu arquivo' width='40' />
          <span class='addFoto' id='upload_image_button$id'>Adicionar Arquivo</span>   
       </div>
	   
	   
	   <br/><br/><br/><br/>
	   
	   
	   <script>
	//IMAGE UPLOAD ----------------------------------------------
                                                
	var custom_uploader$id;


    jQuery('#upload_image_button$id').click(function(e) {
		
		
baseUrl =   jQuery('meta[name=urlShop]').attr('content');

        e.preventDefault();

        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader$id) {
            custom_uploader$id.open();
            return;
        }

        //Extend the wp.media object
        custom_uploader$id = wp.media.frames.file_frame = wp.media({
            title: 'Escolher Imagem',
            button: {
                text: 'Escolher Imagem'
            },
            multiple: false
        });

        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader$id.on('select', function() {
            attachment = custom_uploader$id.state().get('selection').first().toJSON();
            jQuery('.mypic$id').attr('src',attachment.url);  

             url= baseUrl+'setPicUser.php';  
             jQuery.post(url, { 
				       refImg:'$id',     
                       pic :attachment.url  
                } , function(data) {     
             });


        });

        //Open the uploader dialog
        custom_uploader$id.open();


    });


	//IMAGE UPLOD -----------------------------------------------  
	</script> <hr/><br/>";
	
	
	 

	
			  }	;	//FOREACH PRODUTO			   	  
				  
	
		   $txtPrint .= "<br/><br/><br/>";
		   
	  
		   
		}

		//IF  UPLOAD FORM -----------------------------------------------				  
		?>