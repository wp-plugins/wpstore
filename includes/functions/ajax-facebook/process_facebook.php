<?php 

$arrU = $_POST['arru'];
 
$arrU = json_decode($arrU);

 
require("../../../../../../wp-load.php");



if($arrU!=''){
 

$idU = $arrU->{'id'}; 
$birthday = $arrU->{'birthday'}; 
$email = $arrU->{'email'}; 
$first_name = $arrU->{'first_name'}; 
$last_name = $arrU->{'last_name'}; 
$nameU = $arrU->{'name'}; 
$verified = $arrU->{'verified'}; 

$location = $arrU->{'location'};
$regiao = $location->{'name'};
$arrRegiao = explode(',',$regiao);
$cidade = trim($arrRegiao[0]);
$estado = trim($arrRegiao[1]);
$pais = trim($arrRegiao[2]);
 
//echo "$idU || $birthday || $email || $first_name  || $last_name ||$nameU || $verified || $cidade * $estado * $pais ";


global $wpdb;


$user_ID = $wpdb->get_var( "SELECT user_id FROM $wpdb->usermeta WHERE meta_key = '_fbid' AND meta_value = '$idU'" );

if( !$user_ID ){
	
$user_email = $email;
$user_ID = $wpdb->get_var( "SELECT ID FROM $wpdb->users WHERE user_email = '$user_email'" );

if( !$user_ID ){
if ( !get_option( 'users_can_register' ))
die( json_encode( array( 'error' => 'Sistema não esta permitindo cadastro de novo usuário neste momento. Por favor volte mais tarde.' )));


$display_name = $nameU;
$user_login = $user_email;

if( empty( $verified ) || !$verified )
die( json_encode( array( 'error' => 'Your facebook account is not verified. You hae to verify your account before proceed login or registering on this site.' )));

$user_email = $email;

if ( empty( $user_email ))
die( json_encode( array( 'error' => 'Please re-connect your facebook account as we couldnt find your email address..' )));

if( empty( $nameU ))
die( json_encode( array( 'error' => 'empty_name', 'We didnt find your name. Please complete your facebook account before proceeding..' )));

if( empty( $user_login ))
$user_login = sanitize_title_with_dashes( sanitize_user( $display_name, true ));

if ( username_exists( $user_login ))
$user_login = $user_login. time();

$user_pass = wp_generate_password( 12, false );
$userdata = compact( 'user_login', 'user_email', 'user_pass', 'display_name' );

$user_ID = wp_insert_user( $userdata );

if ( is_wp_error( $user_ID ))
die( json_encode( array( 'error' => $user_ID->get_error_message())));
update_user_meta( $user_ID, '_fbid', (int) $id );
update_user_meta($user_ID,'first_name', $first_name);
update_user_meta($user_ID,'last_name',$last_name);
update_user_meta($user_ID,'display_name', $nameU);
update_user_meta($user_ID,'userNascimento', $birthday);
update_user_meta($user_ID,'userCidade', $cidade);
update_user_meta($user_ID,'userEstado', $estado);
}
else{
	
update_user_meta( $user_ID, '_fbid', (int) $idU ); update_user_meta($user_ID,'first_name', $first_name);
update_user_meta($user_ID,'last_name',$last_name);
update_user_meta($user_ID,'display_name', $nameU);
update_user_meta($user_ID,'userNascimento', $birthday);
update_user_meta($user_ID,'userCidade', $cidade);
update_user_meta($user_ID,'userEstado', $estado);

}
}

wp_set_auth_cookie( $user_ID, false, false );
 
echo "1***".get_permalink(get_idPaginaPerfil());

}; //END INF POST DADOS USER ---------------------------

?>