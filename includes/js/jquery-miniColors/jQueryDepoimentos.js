 
    var urlbase = ""+$('meta[name=metaurl]').attr("content");
    var sid = ""+$('meta[name=metaurlB]').attr("content");
 
    var fundo = ""+$('#fundoInicioInput').val();
  
    var fundobg = ""+$('#fundobgInput').val(); 

    
    var colorbg = ""+$('#bgcolorInput').val();
    
    var locFvA  =  ""+$('#enderecoFestaInput').val(); 
    var locCvA  =  ""+$('#enderecoCerimoniaInput').val();
    var gerC =  ""+$('#geolocCInput').val(); 
    var gerF =  ""+$('#geolocFInput').val(); 
 
    $('#inicio').css('background',''+colorbg+' url('+fundobg+') top center repeat');
    var locFvA2  =  locFvA;
    var locCvA2  =   locCvA;
    var tutorial =  parseInt($('#tutorialInput').val());




   
    function showCarregador(objectV){
             if(objectV=="carregando"){
             jQuery('#'+objectV).fadeIn();
             }else{
             jQuery(''+objectV).text('Enviando Requisição...');
             jQuery(''+objectV).fadeIn();    
             }
       };
      
      
       function hideCarregador(objectV){
                 if(objectV=="carregando"){
                 jQuery('#'+objectV).fadeOut();
                 }else{
                 jQuery(''+objectV).text('Enviando Requisição...');
                 jQuery(''+objectV).fadeOut();    
                 }
                 
          };
          
             function irPara(objectV){
                     irpara = $(''+objectV).offset().top;
                     $('html, body').animate({ scrollTop: irpara }, 1000);
              };

           





/* EDITAR  CASAL -------------------------- --------*/
 
 	$('#btEditarDepoimentos').click(function(){
	     
        editarDepoimentos();
    
    });
    
    
   
 
 
       
 

 function  editarDepoimentos(){
        $('#conteudoEdit').html('');
        $('#carregando').fadeIn();
        $('.white_content_Roll').animate({ scrollTop: 0 }, 100);	
        $('div.white_content_Menu ul li').removeClass('active');
  	    $('#btEditarDepoimentos').addClass('active');
        $('#white_content_Roll').animate({ scrollTop: 0 }, 0);	
        $.post(urlbase+"/includes/ajax/poupupformEditDepoimentos.php", { id:sid  },
             function(data) {
             $('#carregando').hide();
             $('#conteudoEdit').html(data);
             carregarEditDepoimentos();
        });
};
 
 
 var depoimentos = "";
 
 function carregarEditDepoimentos(){
     
  
  
          function msg(data){

              $('#msg').fadeIn();  
              $('#msg').html(data);   

              setTimeout( function() {
            	$('#msg').fadeOut();
            	}, 1000 );

          };
     
 
           $('.btRemoveComent').click(function(){
            idCommentV = $(this).attr('rel');
            editarDepoimento(idCommentV,"remove");
           });
           
           
    
   	           $('.btEditComent').click(function(){
                   idCommentV = $(this).attr('rel');
                   statusV = $(this).attr('rev');
             	    editarDepoimento(idCommentV,statusV);
                 });    
   	                
   	                
   	       
         
        	function editarDepoimento(idCommentV,statusV){
        	    
        	                
        	                
        	                   msg("Enviando Requisição..."); showCarregador("carregando"); 
                            
                            
              	            $.post(urlbase+"/includes/ajax/editAjaxDepoimentos.php", { idbe: sid ,idComment:idCommentV,status :statusV },
                            function(data) {
                                 if(statusV=="remove"){
                                  $('.depoimento[rel='+idCommentV+']').fadeOut().remove();
                                  $('.depoimentoEdit[rel='+idCommentV+']').fadeOut().remove();
                                 }
                                 
                                 
                                 if(statusV=="approve"){
                                  $('.depoimentoEdit[rel='+idCommentV+']').css('background','#abdc8c');
                                  
                                  depoimentoText = $('.depoimentoText[rel='+idCommentV+']').text();
                                  depoimentoAutor = $('.depoimentoAutor[rel='+idCommentV+']').text();
                                  depoimentoImg = ""+$('.depoimentoImg first').attr('src');
                                     if(depoimentoImg=="undefined"){
                                     depoimentoImg = fundobg ; 
                                     }
                                  textInsert = '<div class="depoimento"  rel="'+idCommentV+'"><p><img  class="depoimentoImg" src="'+depoimentoImg+'"  width="155"/>'+depoimentoText+'</p><div class="clear"></div><em>'+depoimentoAutor+'</em></div>';
                                  $('#contentDepoimentos').append(textInsert);
                                  rev="unapproved";
                                  revText="Tornar Pendente";
                                  $('.btEditComent[rel='+idCommentV+']').text(revText);
                                  $('.btEditComent[rel='+idCommentV+']').attr('rev',rev);
                                 }
                                 
                                 
                                 
                                 if(statusV=="unapproved"){
                                  $('.depoimento[rel='+idCommentV+']').fadeOut().remove();
                                  $('.depoimentoEdit[rel='+idCommentV+']').css('background','#ff8781');
                                  rev="approve";
                                  revText="Aprovar";
                                  $('.btEditComent[rel='+idCommentV+']').text(revText);
                                  $('.btEditComent[rel='+idCommentV+']').attr('rev',rev);
                                 }
                                 
                                 
                                 
                                  msg(data); hideCarregador("carregando");
                                 
                  
                            });
                            
           }
           
           
           
           
           
           
           $('#emailDepoimento').focusout(function(){
               
                   msg("Enviando Requisição..."); showCarregador("carregando"); 

                  emailDepoimentoV =   $('#emailDepoimento').val();  

                  $.post(urlbase+"/includes/ajax/editAjaxDepoimentoEmailAlternativo.php", { idbe:sid , emailDepoimento:emailDepoimentoV  },
                       function(data) {
                       $('#carregando').hide();
                       $('#conteudoEdit').html(data);
                       
                  });


              });
              
              
              
           
 
 }
     
  
/* FINAL  EDITAR  CASAL -------------------------- --------*/