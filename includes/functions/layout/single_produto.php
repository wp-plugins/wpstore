 
		 <div class="produtoDir">
        
         
 
               <?php  custom_get_select_stock_form($post->ID); ?>
	 
                
                <div class="clear"></div>
					
             			
        
            <?php 
            
            $exibirFreteSingle = get_option('exibirFreteSingle');
            
            if($exibirFreteSingle !="não"){
            
            $tabelaVar = ""; 
            
            include('box-frete.php'); 
            
            echo  $tabelaVar ;  
            
            };
            
            
            ?>
       
			<div class="clear"></div>
			
			
			<?php
			$download = get_post_meta($post->ID,'download',true);
			
		    $txtDownload = get_option('txtDownloadWPSHOP');
			if($txtDownload==""){
				$txtDownload = "Fazer Download";
			}
	 
	 
			if($download !=''){
				echo "<a class='downloadBtWPS' href='$download' target='_blank'>$txtDownload</a>";
			};
			?>
				
			
        </div><!-- .produtoDir -->
		
 
		
        <div class="clear"></div>