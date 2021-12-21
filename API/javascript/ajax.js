

// POST method  is the HTTP request and response of all HTTP transaction.

//$(this).serialize() is the method to convert the set of data on a form submited into array. This data will be send on MAPPING and mapping will send the data to DAO to be executed. DAO will return the result in mapping and mapping will return it pass through HTTP into client side.


$(document).ready(function(){


$('#deselect').click(function(){
    $('#maintained').attr('checked', false);
    $('#cumulative').attr('checked', false);
    
});



 trigerOnce = true;


			
if(getCookie('status')=="success"){
    

$("#alertSuccess").css("display","block");
$("#alertSuccess").html("<p>Success</p>");

setTimeout(function(){
$("#alertSuccess").css("display","none");    
},3000)

}
if(getCookie('status')=="failed"){
    

$("#alertDanger").css("display","block");
$("#alertDanger").html("<p>Failed</p>");

setTimeout(function(){
$("#alertDanger").css("display","none");    
},3000)

}


  
    function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
}
  function post(data, url, redirect){

url += "&appId=151215054510321641864";


if(trigerOnce){
    trigerOnce = false;
  
      if (window.XMLHttpRequest) {
  
    xmlhttp=new XMLHttpRequest();
  } else {  
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {

   $(".AjaxLoader").css("display","block");
    $("#loaderProgress").css("width","10%");
    $("#lab").html("10% Connecting to Server");   
   
    if (xmlhttp.readyState==1&& xmlhttp.status==200) {
   $(".AjaxLoader").css("display","block");
   $("#loaderProgress").css("width","25%");
   $("#lab").html("25% Sending Request");    
}
    if (xmlhttp.readyState==2&& xmlhttp.status==200) {
   $(".AjaxLoader").css("display","block");
   $("#loaderProgress").css("width","50%");
   $("#lab").html("50% Request Recieved");    
}
    if (xmlhttp.readyState==3&& xmlhttp.status==200) {
   $(".AjaxLoader").css("display","block");
   $("#loaderProgress").css("width","75%");
    $("#lab").html("75% Processing Request");    
}
    if (xmlhttp.readyState==4&& xmlhttp.status==200) {

   $("#loaderProgress").css("width","100%");

   $("#lab").html("100% Loading Completed");
   if(redirect!=""){
     
     
   countDown = 0;
setInterval(function(){
      
      $("#loaderProgress").html("Redirecting in  "+countDown+" sec" );
         $("#lab").html("Please Wait");
      countDown--;
},1000);
    
       
 
     setTimeout(
       
      function load(){
        $(".AjaxLoader").css("display","none");
        window.location.replace(redirect);  
        
             },1200); 
          
    }
    else{
      setTimeout( function load(){
        $(".AjaxLoader").css("display","none");
   $("#loaderProgress").css("width","0px");
   return true;
             },3000);  
}
}
}

 xmlhttp.open("POST",url  + "&http="+window.location.host,true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(data);
  }
  
return false;
}

  function email(data, url, redirect){

      if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
      
    if (xmlhttp.readyState==1) {
$(".AjaxLoader").css("display","block");
 

         
    
    }
    if (xmlhttp.readyState==4) {
  window.location.replace(redirect);  
 

         
    
    }
   

  }
  xmlhttp.open("POST",url,true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(data);

}



var isMatch;
      $("#passwordCfrm").keyup(function(){
                        var p2 = $(this).val();
                        var p1 = $("#password").val();
                        if(p2==p1){
                            isMatch=true;
                        
                       $("#ismatch").html('<h5>Password Match<span class="glyphicon glyphicon-ok"></span></h5>');
                    
              }
                   else{
                       
                     ismMatch=false;
                     
                          $("#ismatch").html('<h5>Password Mis-match<span class="glyphicon glyphicon-remove"></span></h5>');
                
                   }
                       
                       
                   });

//adding user 
  $("#addUser").on("submit",function(e){  
    e.preventDefault();
   
   
   
   
   
if(isMatch){


var values = {};
$.each($("#addUser").serializeArray(), function (i, field) {
    values[field.name] = field.value;
});

var getValue = function (valueName) {
    return values[valueName];
};






var rights= getValue("rights");

if(rights==1){
    rights="administrator";
}
else if(rights==2){
    rights="Program User";
}




 post($("#addUser").serialize(),window.location.href+"&action=adduser",window.location.href);

 email($("#addUser").serialize(),'http://donniegallocanta.com/NEDA/mapUser.php?action=sendEmail&rights='+rights,window.location.href);
 //email($("#addUser").serialize(),window.location.href+'?action=sendEmail&rights='+rights,window.location.href);
 
}
else{
     alert("Password mis-Match");
}
           });
           
           
           
           
           
           
           
     var isMatchE;
      $("#passwordCfrmE").keyup(function(){
                        var p2 = $(this).val();
                        var p1 = $("#password").val();
                        if(p2==p1){
                            isMatchE=true;
                        
                       $("#ismatch").html('<h5>Password Match<span class="glyphicon glyphicon-ok"></span></h5>');
                    
              }
                   else{
                       
                     isMatchE=false;
                     
                          $("#ismatch").html('<h5>Password Mis-match<span class="glyphicon glyphicon-remove"></span></h5>');
                
                   }
                       
                       
                   });      
           
           
           
           
           
           
           
           
           
           
           
           //edit User
  $("#frmEditUser").on("submit",function(e){  
    e.preventDefault();
   
if(isMatchE){

var valuesE = {};
$.each($("#frmEditUser").serializeArray(), function (i, field) {
    valuesE[field.name] = field.value;
});

var getValue = function (valueName) {
    return valuesE[valueName];
};






var rightsE= getValue("rightsE");

if(rightsE==1){
    rightsE="administrator";
}
else if(rightsE==2){
    rightsE="Program User";
}





 post($("#frmEditUser").serialize(),window.location.href+"&action=edituser",window.location.href);
  

email($("#frmEditUser").serialize(),'http://donniegallocanta.com/NEDA/mapUser.php?action=sendEmailUpdate&rights='+rightsE,window.location.href);
  
}
else{
     alert("Password mis-Match");
}
           });
           
           //log in
 $("#login").on("submit",function(e){
       e.preventDefault();
       
       
    var data=$(this).serialize(); 
    

 
            post(data,window.location.href+"&action=loggingIn","./");
   
 
                                      
				});
               //submit project result             
 $("#projectResultSubmission").on("submit",function(e){
     
       e.preventDefault();

    post($(this).serialize(),window.location.href+"&action=projectResultSubmission",window.location.href);
         
                     // console.log($(this).serialize());                
				});
               //update project             
 $("#updateProject").on("submit",function(e){
     
       e.preventDefault();

    post($(this).serialize(),window.location.href+"&action=updateproject",window.location.href);
         
                            
				});
               //acknowledgement  
 $("#frmacknowledgement").on("submit",function(e){
     
       e.preventDefault();

    post($("#frmacknowledgement").serialize(),window.location.href+"&action=frmacknowledge",window.location.href);
         // this is map in mapProjects
                                   
				});
 $("#frm7").on("submit",function(e){ // form 7 trigger the form on submit (ajax control)
     
       e.preventDefault();

    post($(this).serialize(),window.location.href+"&action=form7Submit",window.location.href);
         // this is map in form 7
                                   
				});
                          
                  


 
 
 $("#frm8").on("submit",function(e){
  
       e.preventDefault();


    post($(this).serialize(),window.location.href+"&action=form8Submit",window.location.href);
         // this is map in form 8
                                   
				});
 $("#frmacknowledgementexc").on("submit",function(e){
     
       e.preventDefault();

    post($("#frmacknowledgementexc").serialize(),window.location.href+"&action=frmacknowledgeexc",window.location.href);
         // this is map in mapProjects
                                   
				});
 $("#frmacknowledgementmoni").on("submit",function(e){
     
       e.preventDefault();

    post($(this).serialize(),window.location.href+"&action=frmacknowledgemoni",window.location.href);
         // this is map in mapProjects
                                   
				});

    //submitProject
 $("#approveMonPlan").on("submit",function(e){
     
       e.preventDefault();
  
     
            post($(this).serialize(),window.location.href+"&action=submitproject",window.location.href);
         
                                      
				});
    //add project

 $("#addProject").on("submit",function(e){
     $("#btnSubPro").attr("disabled",true);
      
       e.preventDefault();
       post($(this).serialize(),window.location.href+"&action=subproject",window.location.href);
      

    
     });
  




//submit accomplishment 


actSubSave = "";
$("#submitAcc").on("click",function(){
    
actSubSave = "submit";    
    
})   
$("#saveAcc").on("click",function(){
   $('input[type=number]').removeAttr('required');
actSubSave = "save";    

    
})  
 $("#projexceptionSubmission").on("submit",function(e){
 
 
       e.preventDefault();


post($(this).serialize(),window.location.href+"&action=projexceptionSubmission&subsave="+actSubSave,window.location.href);
   

    
     });
 $("#accomplishmentSubmission").on("submit",function(e){
 
 
       e.preventDefault();


post($(this).serialize(),window.location.href+"&action=submitaccomplishment&subsave="+actSubSave,window.location.href);
      

    
     });
                                
                                
                                
    //add location
 $("#addLocation").on("submit",function(e){
     
       e.preventDefault();
  
     
            post($(this).serialize(),window.location.href+"&action=addLocation",window.location.href);
         
                                      
				});
                                
    //updateLocation
 $("#editLocation").on("submit",function(e){
     
       e.preventDefault();
  
     
            post($(this).serialize(),window.location.href+"&action=editLocation",window.location.href);
         
                                      
				});
                                
                                
                                
      //edit Due Dates
  $("#updateDueDates").on("submit",function(e){
        e.preventDefault();

         post($("#updateDueDates").serialize(),window.location.href+"&action=updateDueDates",window.location.href);
         
  });
      //edit Fund Source
  $("#editFundSrc").on("submit",function(e){
        e.preventDefault();
  
         post($("#editFundSrc").serialize(),window.location.href+"&action=editFundSrc",window.location.href);
         
  });
  //add Fund Source
  $("#addFundSrc").on("submit",function(e){
        e.preventDefault();

         post($("#addFundSrc").serialize(),window.location.href+"&action=addFundSrc",window.location.href);
         
  });                            
      //edit Sub Sector
  $("#editSubSector").on("submit",function(e){
        e.preventDefault();
    //alert("it works here");
         post($("#editSubSector").serialize(),window.location.href+"&action=editSubSector",window.location.href);
         
  });
  //add Sub Sector
  $("#addSubSector").on("submit",function(e){
        e.preventDefault();

         post($("#addSubSector").serialize(),window.location.href+"&action=addSubSector",window.location.href);
         
  });                            
  //add Typhoon
  $("#addtyphoon").on("submit",function(e){
        e.preventDefault();

         post($(this).serialize(),window.location.href+"&action=addTyphoon",window.location.href);
     
  });                            
  //add Typhoon
  $("#editTyphoon").on("submit",function(e){
        e.preventDefault();

         post($(this).serialize(),window.location.href+"&action=editTyphoon",window.location.href);
     
         
  });                            
      //edit Sector
  $("#editSector").on("submit",function(e){
        e.preventDefault();
          
    //alert("it works here");
         post($("#editSector").serialize(),window.location.href+"&action=editSector",window.location.href);
         
  });
  //add Sector
  $("#addSector").on("submit",function(e){
        e.preventDefault();

         post($("#addSector").serialize(),window.location.href+"&action=addSector",window.location.href);
         
  });                            
      //edit Agency
  $("#editAgency").on("submit",function(e){
        e.preventDefault();
    //alert("it works here");
         post($("#editAgency").serialize(),window.location.href+"&action=editAgency",window.location.href);
         
  });
  //add Agency
  $("#addAgency").on("submit",function(e){
        e.preventDefault();

         post($("#addAgency").serialize(),window.location.href+"&action=addAgency",window.location.href);
         
  });                            
      //edit AgencyType
  $("#editAGTfrm").on("submit",function(e){
        e.preventDefault();
    //alert("it works here");
         post($("#editAGTfrm").serialize(),window.location.href+"&action=editAgencyType",window.location.href);
         
  });
  //add Agency Type
  $("#addAgencyType").on("submit",function(e){
        e.preventDefault();
 
         post($("#addAgencyType").serialize(),window.location.href+"&action=addAgencyType",window.location.href);
         
  });                            
                                
  //edit ProjectType
  $("#editPJTfrm").on("submit",function(e){
      
      e.preventDefault();
         post($("#editPJTfrm").serialize(),window.location.href+"&action=editProjectType",window.location.href);
         
  });
  //add Project Type
  $("#addProjectType").on("submit",function(e){
        e.preventDefault();
         post($("#addProjectType").serialize(),window.location.href+"&action=addProjectType",window.location.href);
         
  });
  //logout
  $(".logout").on("click",function(){
               e.preventDefault();     
                   window.location.replace('./');
                    
                });
 
 //delete User
	$('a.deleteUser').click(function(e) {
		  e.preventDefault();
          
                var id = $(this).attr('id');
                var name = $(this).attr('name');
              var r= confirm("do you want to permanently delete  "+name);
              if(r==true){
      if (window.XMLHttpRequest) {
 
    xmlhttp=new XMLHttpRequest();
  } else {  
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4&& xmlhttp.status==200) {

       	$("#rowUser"+id).slideUp(1000,function() {
					$(this).remove();
                                    }
                                );
                                     $(".AjaxLoader").css("display","none");
    
    
    }
    if (xmlhttp.readyState==3&& xmlhttp.status==200) {
      
           $(".AjaxLoader").css("display","block");
    }

     
    }

  

  xmlhttp.open("POST",window.location.href+"&action=deleteUser&appId=151215054510321641864&http="+window.location.host,true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send('delete=' + id);
              
        }
              
         	
               
		
	});
 //delete location
	$('a.deleteLocation').click(function(e) {
		  e.preventDefault();
          
                var id = $(this).attr('id');
                var name = $(this).attr('name');
              var r= confirm("do you want to permanently delete  "+name);
              if(r==true){
      if (window.XMLHttpRequest) {
 
    xmlhttp=new XMLHttpRequest();
  } else {  
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4&& xmlhttp.status==200) {

       	$("#rowLOC"+id).slideUp(1000,function() {
					$(this).remove();
                                    }
                                );
                                     $(".AjaxLoader").css("display","none");
    
    
    }
    if (xmlhttp.readyState==3&& xmlhttp.status==200) {
      
           $(".AjaxLoader").css("display","block");
    }

     
    }

  

  xmlhttp.open("POST",window.location.href+"&action=deleteLocation&appId=151215054510321641864&http="+window.location.host,true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send('delete=' + id);
              
        }
              
         	
               
		
	});
 //delete ProjectType
	$('a.deletePJT').click(function(e) {
		  e.preventDefault();
          
                var id = $(this).attr('id');
                var name = $(this).attr('name');
              var r= confirm("do you want to permanently delete  "+name);
              if(r==true){
      if (window.XMLHttpRequest) {
 
    xmlhttp=new XMLHttpRequest();
  } else {  
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4&& xmlhttp.status==200) {

       	$("#rowPJT"+id).slideUp(1000,function() {
					$(this).remove();
                                    }
                                );
                                     $(".AjaxLoader").css("display","none");
    
    
    }
    if (xmlhttp.readyState==3&& xmlhttp.status==200) {
      
           $(".AjaxLoader").css("display","block");
    }

     
    }

  

  xmlhttp.open("POST",window.location.href+"&action=deleteProjectType&appId=151215054510321641864&http="+window.location.host,true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send('delete=' + id);
              
        }
              
         	
               
		
	});
        
        //delete agency type
	$('a.deleteAGT').click(function(e) {
		  e.preventDefault();
          
                var id = $(this).attr('id');
                var name = $(this).attr('name');
              var r= confirm("do you want to permanently delete  "+name);
              if(r==true){
      if (window.XMLHttpRequest) {
 
    xmlhttp=new XMLHttpRequest();
  } else {  
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4&& xmlhttp.status==200) {

       	$("#rowAGT"+id).slideUp(1000,function() {
					$(this).remove();
                                    }
                                );
                                     $(".AjaxLoader").css("display","none");
    
    
    }
    if (xmlhttp.readyState==3&& xmlhttp.status==200) {
      
           $(".AjaxLoader").css("display","block");
    }

     
    }

  

  xmlhttp.open("POST",window.location.href+"&action=deleteAgencyType&appId=151215054510321641864&http="+window.location.host,true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send('delete=' + id);
              
        }
              
         	
               
		
	});
        //delete agency
	$('a.deleteAgency').click(function(e) {
		
            e.preventDefault();
                var id = $(this).attr('id');
                var name = $(this).attr('name');
              var r= confirm("do you want to permanently delete  "+name);
              if(r==true){
      if (window.XMLHttpRequest) {
 
    xmlhttp=new XMLHttpRequest();
  } else {  
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4&& xmlhttp.status==200) {

       	$("#rowAG"+id).slideUp(1000,function() {
					$(this).remove();
                                    }
                                );
                                     $(".AjaxLoader").css("display","none");
    
    
    }
    if (xmlhttp.readyState==3&& xmlhttp.status==200) {
      
           $(".AjaxLoader").css("display","block");
    }

     
    }

  

  xmlhttp.open("POST",window.location.href+"&action=deleteAgency&appId=151215054510321641864&http="+window.location.host,true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send('delete=' + id);
              
        }
              
         	
               
		
	});
        //delete sector
	$('a.deleteSector').click(function(e) {
		
            e.preventDefault();
                var id = $(this).attr('id');
                var name = $(this).attr('name');
              var r= confirm("do you want to permanently delete  "+name);
              if(r==true){
      if (window.XMLHttpRequest) {
 
    xmlhttp=new XMLHttpRequest();
  } else {  
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4&& xmlhttp.status==200) {

       	$("#rowSec"+id).slideUp(1000,function() {
					$(this).remove();
                                    }
                                );
                                     $(".AjaxLoader").css("display","none");
    
    
    }
    if (xmlhttp.readyState==3&& xmlhttp.status==200) {
      
           $(".AjaxLoader").css("display","block");
    }

     
    }

  

  xmlhttp.open("POST",window.location.href+"&action=deleteSector&appId=151215054510321641864&http="+window.location.host,true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send('delete=' + id);
              
        }
              
         	
               
		
	});
        //delete sub sector
	$('a.deleteSubSector').click(function(e) {
		
            e.preventDefault();
                var id = $(this).attr('id');
                var name = $(this).attr('name');
              var r= confirm("do you want to permanently delete  "+name);
              if(r==true){
      if (window.XMLHttpRequest) {
 
    xmlhttp=new XMLHttpRequest();
  } else {  
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4&& xmlhttp.status==200) {

       	$("#rowSubsec"+id).slideUp(1000,function() {
					$(this).remove();
                                    }
                                );
                                     $(".AjaxLoader").css("display","none");
    
    
    }
    if (xmlhttp.readyState==3&& xmlhttp.status==200) {
      
           $(".AjaxLoader").css("display","block");
    }

     
    }

  

  xmlhttp.open("POST",window.location.href+"&action=deleteSubSector&appId=151215054510321641864&http="+window.location.host,true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send('delete=' + id);
              
        }
              
         	
               
		
	});
	$('a.deleteTyphoon').click(function(e) {
		
            e.preventDefault();
                var id = $(this).attr('id');
                var name = $(this).attr('name');
              var r= confirm("do you want to permanently delete  "+name);
              if(r==true){
      if (window.XMLHttpRequest) {
 
    xmlhttp=new XMLHttpRequest();
  } else {  
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4&& xmlhttp.status==200) {

       	$("#rowTyphoon"+id).slideUp(1000,function() {
					$(this).remove();
                                    }
                                );
                                     $(".AjaxLoader").css("display","none");
    
    
    }
    if (xmlhttp.readyState==3&& xmlhttp.status==200) {
      
           $(".AjaxLoader").css("display","block");
    }

     
    }

  

  xmlhttp.open("POST",window.location.href+"&action=deleteTyphoon&appId=151215054510321641864&http="+window.location.host,true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send('delete=' + id);
              
        }
              
         	
               
		
	});
        
        //delete project
          $('#deleteProj').on('click',function(e){
          
          e.preventDefault();
    var a  = $(this).attr('data-iddd');
    
    
        
      if (window.XMLHttpRequest) {
 
    xmlhttp=new XMLHttpRequest();
  } else {  
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4&& xmlhttp.status==200) {


       	$("#rowProj"+a).slideUp(100,function() {
					$(this).remove();
                                    }
                                );
                                     $(".AjaxLoader").css("display","none");
    
    
    }
    if (xmlhttp.readyState==3&& xmlhttp.status==200) {
      
           $(".AjaxLoader").css("display","block");
    }

     
    }

  

  xmlhttp.open("POST",window.location.href+"&action=deleteproject&appId=151215054510321641864&http="+window.location.host,true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send('delete=' + a);
              
  
 
   
});
          $('#deleteProj7').on('click',function(e){
          
          e.preventDefault();
    var a  = $(this).attr('data-iddd');
    var q  = $(this).attr('data-quarter');

    
        
      if (window.XMLHttpRequest) {
 
    xmlhttp=new XMLHttpRequest();
  } else {  
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4&& xmlhttp.status==200) {

window.location.replace(window.location.href);
    
    }


     
    }

  

  xmlhttp.open("POST",window.location.href+"&action=deleteprojectFrm7&quarter="+q+"&appId=151215054510321641864&http="+window.location.host,true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send('delete=' + a );
              
  
 
   
});
          $('#deleteProj8').on('click',function(e){
          
          e.preventDefault();
    var a  = $(this).attr('data-iddd');
    var q  = $(this).attr('data-quarter');

    
        
      if (window.XMLHttpRequest) {
 
    xmlhttp=new XMLHttpRequest();
  } else {  
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4&& xmlhttp.status==200) {

window.location.replace(window.location.href);
    
    }


     
    }

  

  xmlhttp.open("POST",window.location.href+"&action=deleteprojectFrm8&quarter="+q+"&appId=151215054510321641864&http="+window.location.host,true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send('delete=' + a );
              
  
 
   
});
        
        //delete fund source
	$('a.deleteFundSource').click(function(e) {
		
            e.preventDefault();
                var id = $(this).attr('id');
                var name = $(this).attr('name');
              var r= confirm("do you want to permanently delete  "+name);
              if(r==true){
      if (window.XMLHttpRequest) {
 
    xmlhttp=new XMLHttpRequest();
  } else {  
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4&& xmlhttp.status==200) {

       	$("#rowFundSrc"+id).slideUp(1000,function() {
					$(this).remove();
                                    }
                                );
                                     $(".AjaxLoader").css("display","none");
    
    
    }
    if (xmlhttp.readyState==3&& xmlhttp.status==200) {
      
           $(".AjaxLoader").css("display","block");
    }

     
    }

  

  xmlhttp.open("POST",window.location.href+"&action=deleteFundSource&appId=151215054510321641864&http="+window.location.host,true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send('delete=' + id);
              
        }
              
         	
               
		
	});
          





});
             
