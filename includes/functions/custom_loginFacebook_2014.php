<?php
 //FACEID:125125670985108
 //SECRET:f6f83da47bfa5b8662682dce314f675b

 
function fb_head(){
 
    $facebookAPPID  =  get_option('facebookAPPID'); 
    $facebookSecret  =  get_option('facebookSecret');
 
 
    ########## app ID and app SECRET (Replace with yours) #############
    $appId = '684563038257878'; //Facebook App ID
    $appSecret = 'f80c1d4fc87af6173ff089aef17c0ab2'; // Facebook App Secret
    $return_url = get_bloginfo('url');  //path to script folder
    $fbPermissions = 'email'; // more permissions : https://developers.facebook.com/docs/authentication/permissions/

 
 
 

    
  if( is_user_logged_in()) return;
  ?>
  
 
  
  
<?php };
  add_action( 'wp_head', 'fb_head' );
 
 
 
  function fb_footer(){
      
 
	  $facebookAPPID  =  get_option('facebookAPPID'); 
	  $facebookSecret  =  get_option('facebookSecret');
 
 
	  ########## app ID and app SECRET (Replace with yours) #############
	  $appId = '684563038257878'; //Facebook App ID
	  $appSecret = 'f80c1d4fc87af6173ff089aef17c0ab2'; // Facebook App Secret
	  $return_url = get_bloginfo('url');  //path to script folder
	  $fbPermissions = 'email'; // more permissions : https://developers.facebook.com/docs/authentication/permissions/

 
 
 
	   
  ?>
<div id="fb-root"></div>
<script type="text/javascript">
 
 var baseUrl = jQuery('meta[name=urlShop]').attr("content");
     baseUrl = baseUrl.replace("ajax/", ""); 
 
window.fbAsyncInit = function() {
	FB.init({
		appId: '<?php echo  $appId; ?>',
		cookie: true,xfbml: true,
		channelUrl: baseUrl+'functions/ajax-facebook/channel.php',
		oauth: true
		});
	};
	
(function() {
	var e = document.createElement('script');
	e.async = true;e.src = document.location.protocol +'//connect.facebook.net/en_US/all.js';
	document.getElementById('fb-root').appendChild(e);}());

function CallAfterLogin(){
	FB.login(function(response) {		
		if (response.status === "connected") 
		{
			LodingAnimate(); //Animate login
			FB.api('/me', function(data) {
				 
			  if(data.email == null)
			  {
					//Facbeook user email is empty, you can check something like this.
					alert("You must allow us to access your email id!"); 
					ResetAnimate();

			  }else{
	
				AjaxResponse(data);
			  }
			  
		  });
		 }
	},
	{scope:'<?php echo $fbPermissions; ?>'});
}

//functions
function AjaxResponse(data)
{
	

	arr = JSON.stringify(data);
	//alert(arr);
	
    jQuery.post(baseUrl+"functions/ajax-facebook/process_facebook.php", {arru:arr } ,
                function(data) {
					arrData = data.split('***');
					if(arrData[0]=='1'){
					window.location = arrData[1];
				    }else{
				    	alert(data);
				    }
                 });
}

//Show loading Image
function LodingAnimate() 
{
	jQuery(".loginButton").hide(); //hide login button once user authorize the application
	jQuery(".msg").html('<img src="'+baseUrl+'functions/ajax-facebook/img/ajax-loader.gif" /> Please Wait Connecting...'); //show loading image while we process user
}

//Reset User button
function ResetAnimate() 
{
	jQuery(".loginButton").show(); //Show login button 
	jQuery(".msg").html(''); //reset element html
}

</script>
  <?php
  }
  add_action( 'wp_footer', 'fb_footer' );

 ?>