<?php
/*
Plugin Name: WP STORE
Plugin URI: http://wpstore.com.br
Description:  BETA | BUT WORK -  This plugin  Add  a complete ecommerce module for  wordpress  , with global and brazilan payments  .
Version: 1.0
Author: José Morettoni
Author URI: http://remind.com.br/
License: GPL2
*/
    /*  
        Copyright 2012  WP STORE  (email : contatoremind@gmail.com)

        This program is free software; you can redistribute it and/or modify
        it under the terms of the GNU General Public License, version 2, as 
        published by the Free Software Foundation.

        This program is distributed in the hope that it will be useful,
        but WITHOUT ANY WARRANTY; without even the implied warranty of
        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
        GNU General Public License for more details.

        You should have received a copy of the GNU General Public License
        along with this program; if not, write to the Free Software
        Foundation, Inc., Ruas das Camélias 224  , Itacoatiara , Niterói,  RJ 24340000  BRAZIL
    
    */
    
    // To begginers explorers : 
    
    //HOOKS AND FILTERS : auto functions called in wordpress events
    
    // Template Tags :  create  a call method to acess specific function of theme and put in any  page of wordpress theme
    
    // GO TO THE WORK....
  
 
     //CREATE TABLES --------------------------------------------------------------------------
     include('includes/functions/customFunctions-create-tables.php'); 
     
      //GENERAL FUNCTIONS  --------------------------------------------------------------------
     include('includes/functions/custom_functions.php'); 
     
      //POST TYPES ----------------------------------------------------------------------------
      include('includes/functions/custom_post_types.php');
     
     //POST TYPES ----------------------------------------------------------------------------
     include('includes/functions/custom_admin_menus.php');
 
     //PRODUCTS FUNCTIONS ---------------------------------------------------------------------
     include('includes/functions/custom_product_functions.php');
     
     //CREATE WIDGETS ------------------------------------------------------------------------
    include('includes/functions/custom_widgets.php');


    //FILTERS FUNCTIONS ----------------------------------------------------------------------
    include('includes/functions/custom_filters.php');

 
?>