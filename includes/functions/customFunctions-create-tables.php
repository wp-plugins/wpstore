<?php

//CREATE TABLES ----------------------------------------------------------------
   
   global $wp_store_version;
   $wp_store_version = "1";
   
   //verify update version 
   
   function shopPlugin_update_db_check() {
       global $wp_store_version;
       if (get_option('wp_store_version') != $wp_store_version) {
 
           update_option("wp_store_version", $wp_store_version);
           
           wp_store_createTable();
       }
   }
         
   
   add_action('plugins_loaded', 'shopPlugin_update_db_check');
 
   
   function wp_store_createTable(){

        //create table ---------------------------------------------

          global $wpdb;
          global $jal_db_version;
          
          require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

   
          $table_name1 = $wpdb->prefix ."wp_store_orders"; 

          $sql = "CREATE TABLE " . $table_name1 . " (
          	  id mediumint(9) NOT NULL AUTO_INCREMENT,
          	  id_pedido VARCHAR(155) DEFAULT '' NOT NULL,
          	  id_usuario VARCHAR(155) DEFAULT '' NOT NULL,
          	  valor_total VARCHAR(155) DEFAULT '' NOT NULL,
          	  frete VARCHAR(155) DEFAULT '' NOT NULL,
          	  tipo_pagto VARCHAR(55) DEFAULT '' NOT NULL,
          	  status_pagto VARCHAR(1000) DEFAULT '' NOT NULL,
          	  comentario_cliente VARCHAR(1000) DEFAULT '' NOT NULL,
          	  comentario_admin VARCHAR(10000) DEFAULT '' NOT NULL,
          	  comentario_pagt VARCHAR(10000) DEFAULT '' NOT NULL,
          	  UNIQUE KEY id (id)
          	);";

          dbDelta($sql);
          
          
            $table_name2 = $wpdb->prefix ."wp_store_stock";
                                       
          
          
              
          	  
          	       
              $sql2 = "CREATE TABLE " . $table_name2 . " (
                  	 id mediumint(9) NOT NULL AUTO_INCREMENT,
                   	  idPost VARCHAR(155) DEFAULT '' NOT NULL,
                   	  tipoVariacao VARCHAR(155) DEFAULT '' NOT NULL,
                   	  variacaoProduto VARCHAR(155) DEFAULT '' NOT NULL,
                   	  qtdProduto VARCHAR(155) DEFAULT '' NOT NULL,
                   	  precoOperacao VARCHAR(55) DEFAULT '' NOT NULL,
                   	  showOrder VARCHAR(1000) DEFAULT '' NOT NULL,
                   	  precoAlternativo VARCHAR(1000) DEFAULT '' NOT NULL,
                   	  imgAlternativa VARCHAR(10000) DEFAULT '' NOT NULL,
                   	  UNIQUE KEY id (id)
                  	);";
                  	
                 dbDelta($sql2);
                 
                 
                 
                 
                 $table_name = $wpdb->prefix ."wp_store_orders_address"; 

                  $sql3 = "CREATE TABLE " . $table_name . " (
                  	  id mediumint(9) NOT NULL AUTO_INCREMENT,
                  	  id_pedido VARCHAR(155) DEFAULT '' NOT NULL,
                  	  id_usuario VARCHAR(155) DEFAULT '' NOT NULL,
                  	  cep VARCHAR(155) DEFAULT '' NOT NULL,
                  	  cidade VARCHAR(155) DEFAULT '' NOT NULL,
                  	  bairro VARCHAR(55) DEFAULT '' NOT NULL,
                  	  estado VARCHAR(1000) DEFAULT '' NOT NULL,
                  	  endereco VARCHAR(10000) DEFAULT '' NOT NULL,
                  	  numero VARCHAR(10000) DEFAULT '' NOT NULL,
                  	  complemento VARCHAR(10000) DEFAULT '' NOT NULL,
                  	  UNIQUE KEY id (id)
                  	);";
                 
                  dbDelta($sql3);
                  
                  
                  
                  
                  $table_name = $wpdb->prefix ."wp_store_orders_products"; 

                   $sql3 = "CREATE TABLE " . $table_name . " (
                   	  id mediumint(9) NOT NULL AUTO_INCREMENT,
                   	  id_pedido VARCHAR(155) DEFAULT '' NOT NULL,
                   	  id_usuario VARCHAR(155) DEFAULT '' NOT NULL,
                   	  id_produto VARCHAR(155) DEFAULT '' NOT NULL,
                   	  preco VARCHAR(155) DEFAULT '' NOT NULL,
                   	  variacao VARCHAR(55) DEFAULT '' NOT NULL,
                   	  qtdProd VARCHAR(55) DEFAULT '' NOT NULL,
                   	  precoAlt VARCHAR(55) DEFAULT '' NOT NULL,
                   	  precoAltSymb VARCHAR(55) DEFAULT '' NOT NULL,
                   	  UNIQUE KEY id (id)
                   	);";

                   dbDelta($sql3);
                   
                   
                   
                   
                   



                   $table_name = $wpdb->prefix  ."wp_store_orders_comments"; 

                     $sql4 = "CREATE TABLE " . $table_name . " (
                     	  id mediumint(9) NOT NULL AUTO_INCREMENT,
                     	  id_pedido VARCHAR(155) DEFAULT '' NOT NULL,
                     	  status_pagto VARCHAR(1000) DEFAULT '' NOT NULL,
                     	  comentario_cliente VARCHAR(10000) DEFAULT '' NOT NULL,
                     	  data VARCHAR(10) DEFAULT '' NOT NULL,
                     	  UNIQUE KEY id (id)
                     	);";

                     dbDelta($sql4);





 




                     $table_name = $wpdb->prefix  ."wp_store_contacts"; 

                          $sql5 = "CREATE TABLE " . $table_name . " (
                          	  id mediumint(9) NOT NULL AUTO_INCREMENT,
                          	  nomeAviso VARCHAR(155) DEFAULT '' NOT NULL,
                          	  emailAviso VARCHAR(100) DEFAULT '' NOT NULL,
                          	  postIDP mediumint(9)  NOT NULL,
                          	  variacaoCorP VARCHAR(100) DEFAULT '' NOT NULL,
                          	  variacaoTamanhoP VARCHAR(100) DEFAULT '' NOT NULL,
                          	  UNIQUE KEY id (id)
                          	);";

                          dbDelta($sql5);
                          
                          
                          
                          
                          

                          $table_name = $wpdb->prefix  ."wp_store_descontos"; 

                               $sql6 = "CREATE TABLE " . $table_name . " (
                               	  id mediumint(9) NOT NULL AUTO_INCREMENT,
                               	  numeroCupom VARCHAR(155) DEFAULT '' NOT NULL,
                               	  tipoDesconto VARCHAR(100) DEFAULT '' NOT NULL,
                               	  valorDesconto VARCHAR(100) DEFAULT '' NOT NULL,
                               	  limite mediumint(9)  NOT NULL,
                               	  qtdUsado mediumint(9)  NOT NULL,
                               	  UNIQUE KEY id (id)
                               	);";

                               dbDelta($sql6);

           
                   
                 
                 
   };
   
    

   
   //call to function
  register_activation_hook(__FILE__,'wp_store_createTable');
 
   
  
   // END CREATE TABLES -----------------------------------------------------------------
   
   ?>