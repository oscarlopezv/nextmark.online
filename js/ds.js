function form_submit() {
    
    error=false
    $("#error_login").html("")
    $("#error_login").css({"visibility": "invisible", "opacity": "0"});
    errores= [];
    $("#form").find(':input').each(function() {
        
        if($(this).attr('requiredds') !== undefined){
             
            if ($(this).val()=='' && error==false){
                
                error=true;
                errores.push("Llene los campos requeridos (*)");
            } 
        }
    })
    if (error==true){
        
        for (i=0; i<errores.length;i++){
              $("#error_login").html($("#error_login").html()+errores[i]+"<br>")
          }
          $("#error_login").css({"visibility": "visible", "opacity": "100", "display":"block"});
        
    } else {
         $("#form").submit()
    }
    
}
function contact_submit() {
    
    error=false
    $("#error_login").html("")
    $("#error_login").css({"visibility": "invisible", "opacity": "0"});
    errores= [];
    $("#contact_form").find(':input').each(function() {
        
        if($(this).attr('requiredds') !== undefined){
             
            if ($(this).val()=='' && error==false){
                
                error=true;
                errores.push("Llene los campos requeridos (*)");
            } 
        }
    })
    if (error==true){
        
        for (i=0; i<errores.length;i++){
              $("#error_login").html($("#error_login").html()+errores[i]+"<br>")
          }
          $("#error_login").css({"visibility": "visible", "opacity": "100", "display":"block"});
        
    } else {
         $("#contact_form").submit()
    }
    
}