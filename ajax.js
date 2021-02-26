$(document).ready( function() {

    $('#myform').on('submit', function(event) {
      
    	$.ajax({
                type: "POST",
                url: "manage.php",
                data: $(this).serialize(),
                success: function(responce){
                	if (jQuery.trim(responce) == 'ok') {
                        toastr.error('error',{timeout:2000});

                    $('#myform').trigger('reset');
                	}
                	else{
                		toastr.error('error',{timeout:2000});
                	}
                },
                error: function() {
                  toastr.error('error',{timeout:2000});

                }
                   
            });

      return false;
    });

    
    
  });


function showUser(str) {
  // if (str=="") {
  //   document.getElementById("ajax").innerHTML="No result....";
  //   return;
  // }
  // var xmlhttp=new XMLHttpRequest();
  // xmlhttp.onreadystatechange=function() {
  //   if (this.readyState==4 && this.status==200) {
  //     document.getElementById("ajaxans").innerHTML=this.responseText;
  //   }
  // }
  // xmlhttp.open("GET","id.php?q="+str,true);
  // xmlhttp.send();
  alert('asmer');
}