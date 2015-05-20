<?php
 
/*    

if(!isset($_SESSION)){
    session_start();
}; 

*/  

$simbolo = get_current_symbol();
$templateUrl = verifyURL(get_bloginfo('template_url'));
$siteUrl = verifyURL(get_bloginfo('url'));  

 

   $idPaginaCarrinho = get_idPaginaCarrinho(); 
   $idPaginaCheckout = get_idPaginaCheckout();
 
    
?>
	
<!DOCTYPE HTML>
<html   xmlns:fb="http://www.facebook.com/2008/fbml" xml:lang="en-gb" lang="en-gb"   >
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<meta name="metaurl" content="<?php echo $templateUrl; ?>">

<title><?php wp_title(); ?></title>

 <link href='http://fonts.googleapis.com/css?family=Open+Sans:700' rel='stylesheet' type='text/css' />

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/reset.css">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/flexslider.css">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/style.css">  

<?php 
$tipoSkinShopTheme   =  get_option('tipoSkinShopTheme');
if($tipoSkinShopTheme == 'Azul' || $tipoSkinShopTheme == ''  ){  
?> 
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/skins/2-azul.css"> 
<?php     };  ?>        



<?php wp_head(); ?>

     
 

 
<?php if(is_home()){ ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.flexslider-min.js"></script>
<?php }; ?>



<script  type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.validate.js"></script>


<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/colorbox/colorbox.css">  

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/colorbox/jquery.colorbox-min.js"></script>


<script  type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/custom.js"></script>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/custom.css"> 


  
  
</head>

<body <?php body_class(); ?> >


<div class="container">

<header id="header">
	
    <div class="container">
    
    
    <?php // if(!is_404()){ ?>
	
		<div class="topo">     
		
		     
		      <?php  
		      
		      
              $idPaginaPerfil = get_idPaginaPerfil();  
              $qtdStock =  custom_get_qtd_items_Cart();     

              if(! is_user_logged_in() ){ 
                  
                   $idPaginaLogin = get_idPaginaLogin();    
		      ?>
			<p>Bem vindo  faça o ( <a href="<?php echo get_permalink($idPaginaLogin); ?>">login</a> )  
 	       

</p>     
			
			<?php }else{ ?> 
			    
			    
			    
	 	          <?php  

	 	          global $current_user;

                get_currentuserinfo();

                   $idUser = $current_user->ID;    

	 	          $nome = get_current_name_user(); 

	 	            $user_info = get_userdata($idUser); 

	 	          $displayNameUser="$user_info->user_firstname $user_info->user_lastname";   

	 	          

	 	          if(trim($displayNameUser)==""){

	 	              $displayNameUser=  $nome;

	 	          }

	 	          

	 	          ?>
                
			  <p> Bem vindo   <a href="<?php echo get_permalink($idPaginaPerfil); ?>"><?php echo  $displayNameUser; ?> </a>   
			    <a href="<?php echo wp_logout_url( get_bloginfo('url') ); ?>" >(Sair)</a> 
              </p> 
			  
			<?php }; ?>
            
            
		</div>
		
	 <?php // };
	 
	 
	  $logo = custom_get_logo();     
	  if($logo==""){
	             $logo = get_bloginfo('template_url')."/images/logo.png";
	  }
	  
	   ?>
		
		  

        <div class="logo">
            <a href="<?php echo verifyURL(get_bloginfo('url')); ?>"><img src="<?php echo $logo; ?>" alt="<?php wp_title(); ?>" /></a>
        </div><!-- .logo -->
        
        <div class="topoDir hide-phone">
		       
		<?php if(get_post_meta(2,'telefone',true)!=""){ ?>
			<div class="telefone">
				<span><?php echo get_post_meta(2,'telefone',true); ?></span>

			</div>  
			
			<?php }; ?>
			
			<div class="clear"></div>
		
			<form class="search arrend hide-phone"  role="search"  method="get"  id="searchform" action="<?php echo home_url( '/' ); ?>" >
				<fieldset>
					<legend>PESQUISAR</legend>
					<input type="text" name="s" id="searchI" value="<?php if($_REQUEST['s'] !=""){echo $_REQUEST['s']; }else{ ?>Pesquisar Produto<?php }; ?>" title="Pesquisar Produto" />
					<input type="submit" value="OK" />
				</fieldset>
			</form>
            
			<div class="carrinho arrend">
				<p>CARRINHO: <span><?php echo $qtdStock; ?> <?php if($qtdStock<=1){ echo ' produto'; }else{ echo ' produtos'; }; ?></span></p>
				
				<div class="cartEscondido arrend">
					<table id="cart">  
					
					
					
					
					
					
					<?php   
					
				 
                    $arrayCarrinho = "";  
                    $blogid = intval(get_current_blog_id());  
    				if($blogid>1){$arrayCarrinho = $_SESSION['carrinho'.$blogid];}else{ $arrayCarrinho = $_SESSION['carrinho']; };
    					    
                    if($arrayCarrinho==""){
                        $arrayCarrinho = array();
                    }
                   
               
                           
                           
                    $subtotal = 0;
                    $pesoTotal = 0;


                    $infoCupom =   get_session_cupom();

                    $numeroCUpom = $infoCupom[0];
                    $tipoDesconto = $infoCupom[1];
                    $valorDesconto = $infoCupom[2];


                    foreach($arrayCarrinho as $key=>$item){ 

                        $postID = intval($item['idPost']);

                        if($postID>0){

                            $tabelaVariacao = $item['variacaoProduto'];
                            if($tabelaVariacao==""){
                                $tabelaVariacao="-";
                            }




                           $preco =  custom_get_price( $postID );
                           $specialPrice =  custom_get_specialprice( $postID );
                           $pesoTotal += get_weight_product($postID );

                           if($specialPrice >0){
                           $preco =  $specialPrice;   
                           }

                           $precoSoma = $preco;
                                    if(strlen($precoSoma)>=6){
                                     $precoSoma= str_replace('.','',$precoSoma );
                                      }
                                      $precoSoma = str_replace(',','.',$precoSoma);   


                                             $precoAdd = get_price_product_variation($postID,$tabelaVariacao);

                                             //$precoAdddArray = explode('(R$',$precoAdd);
                                             $precoAdddArray = explode('(',$precoAdd);
                                             $sinal = $precoAdddArray[0];
                                             $precoAddF= str_replace(')','',$precoAdddArray[1]);
                                        
                                                  if(strlen($precoSoma)>=6){ 
                                                       $precoAddFSoma =  str_replace('.','',$precoAddF);
                                                       $precoAddFSoma =  str_replace(',','.',$precoAddFSoma );
                                                   
                                                   }else{
                                                   $precoAddFSoma =  str_replace(',','.',$precoAddF);
                                                   };  
                                             


                             if($sinal=="-"){
                             $precoSoma = $precoSoma -  $precoAddFSoma;  
                             }elseif($sinal=="+"){
                             $precoSoma = $precoSoma +  $precoAddFSoma;    
                             };   

                           $qtd = intval($item['qtdProduto']);


                           $precoLinha =    getPriceFormat($qtd*$precoSoma) ;

                           $subtotal += $qtd*$precoSoma;
                      
                        ?>
                      
                    	
        						<tr>
        							<td class="itens"><?php echo $qtd; ?></td>
        							<td class="produtoI"><a href="#"><?php echo get_the_title($postID); ?></a><br/><?php echo $tabelaVariacao; ?> </td>
        							<td class="precoI"><?php echo "$simbolo $preco<br/>$precoAdd"; ?></td>
        							<td class="fecharI">  <span class='removeProdCart remover' ><a href='<?php echo get_permalink( $idPaginaCarrinho)."?act=remove&idp=$key"; ?>'>X</a></span>   </td>
        						</tr>
        						
        						
        						

                    	<?php }; }; ?>
                    	
                    	
                    	
                    	
                   
					</table>
					
					<div class="separa"></div>
					
			    
					
					<div class="inputI">
						<span class="lf">subTotal</span>
						<span class="lr"><strong><span>Total : <?php echo  $simbolo."".custom_get_total_price_session_order(); ?>  </strong></span>
						<div class="clear"></div>
					</div>   
					
					
					   	<div class="inputI">
        						<span class="lf">Frete</span>
        						<span class="lr"><strong><span> <a href="<?php echo get_permalink( $idPaginaCarrinho); ?>">Calcular</a> </strong></span>   </span>
        						<div class="clear"></div>
        					</div>
					

					<a href="<?php echo get_permalink( $idPaginaCarrinho); ?>" class="botao arrend">Carrinho</a>
					<a href="<?php echo get_permalink( $idPaginaCheckout); ?>" class="botao arrend">Finalizar</a>
				</div>
			</div>
            
            
            <div class="clear"></div>

            
		</div><!-- .topoDir -->
		
		<div class="clear"></div>

            
        <div class="access">
        
                                 <?php   
                                 
                                     //$excludePages               
                                     $idsPageExclude   = get_option('idsPageExclude');
                     			    
                                 ?>
               
				<nav class="hide-phone">
				<?php  wp_nav_menu( array( 'menu' => 'Menu Topo' ,'container' => 'false' ,'exclude' => "$idsPageExclude" )); ?>
                </nav>
				
				 
                
                <div class="clear"></div>
                
                
                
                
                
        	</div><!-- .container -->
            
        </div><!-- .access -->


</header><!-- #header -->