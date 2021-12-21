
  $(document).ready(function(){
           
$("#showALl").click(function(){
    urlShowall = window.location.href;

  if($(this).is(':checked')){
       
         
        urlShowall = removeURLParameter(urlShowall,'showAll');
      
   
         urlShowall = urlShowall + "&showAll=proj";
     
   
  } 
  else{
     
    urlShowall =  removeURLParameter(urlShowall,"showAll");
      
   
  }
   window.location.replace(urlShowall);
});
 if(get("showAll")=="proj"){
   
   $("#showALl").attr("checked","checked");
 }
 else{
   $("#showALl").removeAttr("checked");
 }
  
            $(".closeAnnouncement").click(function(e){
                e.preventDefault();
                $(".announcement").css("display","none");
            });
            
            $("#publicMonitoringPlan , #publicAccomplishment").on("click",function(){
                aa=0;  
               $("#loaderAjax").html('<span class="glyphicon glyphicon-refresh glyphicon glyphicon-refresh-animate"></span> Loading...')
            $("#progressbar").css("width","0")
            var loader =  setInterval(function(){ 
                  
            
              if(aa<=100){
                  
              
              $("#progressbar").css("width",aa+"%")
              $("#loaderAjaxLabel").html(aa+"%")
              }
              else{
                   $("#loaderAjax").html('<span class="glyphicon glyphicon-refresh glyphicon "></span> Load Completed')
           clearInterval(loader);
              }
                aa++;
      }, 100);
            });
            
            
            
            
          heigh=0;
            
                heigh = screen.height ;
    $('.scrollY').css('max-height', (heigh*.55));
       
                if (window.matchMedia) {
        var mediaQueryList = window.matchMedia('print');
        mediaQueryList.addListener(function(mql) {
            if (mql.matches) {
    

         $('.scrollY').css('max-height', '100%');
         $('.scrollY').css('max-width', '100%');
         $('.container-fluid ').css('max-height', '100%');
         $('.container-fluid ').css('max-width', '100%');
            } else{  
                    $('.scrollY').css('max-height', (heigh*.55));
            }
        });
    }

    $('#xlsfile').click(function(e){
        
    var ht = "";
    var tab_text = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">';
    tab_text = tab_text + '<head><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet>';

    tab_text = tab_text + '<x:Name>eRPMES</x:Name>';

    tab_text = tab_text + '<x:WorksheetOptions><x:Panes></x:Panes></x:WorksheetOptions></x:ExcelWorksheet>';
    tab_text = tab_text + '</x:ExcelWorksheets></x:ExcelWorkbook></xml></head><body>';

    tab_text = tab_text + "<table border='1px'>";
    tab_text = tab_text + $('.saveExcel').html();
    tab_text = tab_text + '</table></body></html>';

    var data_type = 'data:application/vnd.ms-excel';
    
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");
    
    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
        if (window.navigator.msSaveBlob) {
            var blob = new Blob([tab_text], {
                type: "application/csv;charset=utf-8;"
            });
            navigator.msSaveBlob(blob, 'eRPMES.xls');
        }
    } else {
       ht = data_type + ',' + encodeURIComponent(tab_text);
  
    }
   console.log(tab_text);
    window.open(ht);
e.preventDefault();
    })
    

                
                $('#acknowledgementModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var id = button.data('idd') 
  var title = button.data('title') 
  var quarter = button.data('quarter') 
  var year = button.data('year') 
  var ptype = button.data('ptype') 
  var modal = $(this)
  var rows ="";
  a = null;
   modal.find('.modal-title').html('Acknowledge ' + title + " for <b> Quarter " + quarter+"</b>" )

 
        $.get("projectByAgencyQuarter.php?agency="+id+"&quarter="+quarter+"&year="+year+"&ptype="+ptype, function(data, status){
    a = jQuery.parseJSON(data);



});
     

})

////////////public


 var  yearp =0
 var  agencyp =0
  var locationp= 0
  var sectorp = 0
  var quarterp =0
  var fundsrcs =0


$("#optfundsrcs").change(function(){
    fundsrcs = $(this).val();
    
    
});

$("#quarterp").change(function(){
    quarterp = $(this).val();
    
    
});
$("#ssectorp").change(function(){
    sectorp = $(this).val();
    
    
});
$("#locationp").change(function(){
    locationp = $(this).val();
    
    
});
$("#agencyp").change(function(){
    agencyp = $(this).val();
    
    
});
$("#yearp").change(function(){
    yearp = $(this).val();
    
    
});


                $('#publicMonitoringPlan').on('click', function () {



        $.get("publicMonitoring.php?fundsrc="+fundsrcs+"&yearp="+yearp+"&agencyp="+agencyp+"&locationp="+locationp+"&sectorp="+sectorp, function(data, status){
    a = (data);

$('#publicContent').html(a);

});
     

})
                $('#publicAccomplishment').on('click', function () {


     $.get("publicAccomplishtment.php?yearp="+yearp+"&agencyp="+agencyp+"&locationp="+locationp+"&sectorp="+sectorp+"&quarterp="+quarterp, function(data, status){
     
     
    a = (data);
    $('#publicContent').html(a);
    });




     

})


    
 
    
       








$('#acknowledgeOut').on('show.bs.modal', function (event) {
    
      var button = $(event.relatedTarget) 
  var id = button.data('idd') 

  var quarter = button.data('quarter') 
  var year = button.data('year') 
 

  var modal=$(this)


     
  modal.find(".modal-body").html(
'<iframe style="width:100%; height:700px; " src="reports/acknowledgeReport.php?quarter='+quarter+'&agencyid='+id+'&year='+year+'"> </iframe>'
);


    
});
$('#acknowledgeOutexc').on('show.bs.modal', function (event) {
    
      var button = $(event.relatedTarget) 
  var id = button.data('idd') 

  var quarter = button.data('quarter') 
  var year = button.data('year') 
 

  var modal=$(this)


     
  modal.find(".modal-body").html(
'<iframe style="width:100%; height:700px; " src="reports/acknowledgeReportExc.php?quarter='+quarter+'&agencyid='+id+'&year='+year+'"> </iframe>'
);


    
});
$('#acknowledgeOutmoni').on('show.bs.modal', function (event) {
    
      var button = $(event.relatedTarget) 
  var id = button.data('idd') 

  var year = button.data('year') 
 

  var modal=$(this)


     
  modal.find(".modal-body").html(
'<iframe style="width:100%; height:700px; " src="reports/acknowledgeReportMoni.php?agencyid='+id+'&year='+year+'"> </iframe>'
);


    
});
$('#individualform7').on('show.bs.modal', function (event) {
    
      var button = $(event.relatedTarget) 
  var id = button.data('idd') 

  var quarter = button.data('quarter') 

 

  var modal=$(this)


     
  modal.find(".modal-body").html(
'<iframe style="width:100%; height:700px; " src="reports/individualform7.php?quarter='+quarter+'&id='+id+'"> </iframe>'
);


    
});
$('#individualform8').on('show.bs.modal', function (event) {
    
      var button = $(event.relatedTarget) 
  var id = button.data('idd') 

  var quarter = button.data('quarter') 

 

  var modal=$(this)


     
  modal.find(".modal-body").html(
'<iframe style="width:100%; height:700px; " src="reports/individualform8.php?quarter='+quarter+'&id='+id+'"> </iframe>'
);


    
});
$('#exceptionOut').on('show.bs.modal', function (event) {
    
      var button = $(event.relatedTarget) 
  var id = button.data('idd') 

  var quarter = button.data('quarter') 
  var year = button.data('year') 
 

  var modal=$(this)


     
  modal.find(".modal-body").html(
'<iframe style="width:100%; height:700px; " src="reports/projExceptionReport.php?quarter='+quarter+'&agencyid='+id+'&year='+year+'"> </iframe>'
);


    
});

$('#acknowledge').on('show.bs.modal', function (event) {
    
      var button = $(event.relatedTarget) 
  var id = button.data('idd') 
  var title = button.data('title') 
  var quarter = button.data('quarter') 
  var year = button.data('year') 
  var findings = button.data('findings') 
  var action = button.data('action') 
  var modal=$(this)


modal.find("#agencyid").val(id)
modal.find("#agencyname").val(title)
modal.find("#findings").val(findings)
modal.find("#actiontaken").val(action)
modal.find("#quarter").val(quarter)
modal.find("#year").val(year)


    
});
$('#acknowledgeexc').on('show.bs.modal', function (event) {
    
      var button = $(event.relatedTarget) 
  var id = button.data('idd') 
  var title = button.data('title') 
  var quarter = button.data('quarter') 
  var year = button.data('year') 
  var findings = button.data('findings') 
  var action = button.data('action') 
  var modal=$(this)


modal.find("#agencyid").val(id)
modal.find("#agencyname").val(title)
modal.find("#findings").val(findings)
modal.find("#actiontaken").val(action)
modal.find("#quarter").val(quarter)
modal.find("#year").val(year)


    
});
$('#acknowledgemoni').on('show.bs.modal', function (event) {
    
      var button = $(event.relatedTarget) 
  var id = button.data('idd') 
  var title = button.data('title') 
  var findings = button.data('findings') 
  var action = button.data('action') 

  var year = button.data('year') 
  var modal=$(this)


modal.find("#agencyid").val(id)
modal.find("#agencyname").val(title)
modal.find("#findings").val(findings)
modal.find("#actiontaken").val(action)

modal.find("#year").val(year)


    
});

$('#ProjectResultModal').on('show.bs.modal', function (event) {
    
      var button = $(event.relatedTarget) 
  var id = button.data('idd') 
  var agencycode = button.data('agencycode') 
  var year = button.data('year') 
  var isadmin  = button.data('isadmin') 

  var modal=$(this)



  modal.find('.modal-title').html('Submit Project Results of ' + agencycode  )
  
  
 $.get("projectResult.php?agency="+id+"&year="+year, function(data, status){
    a = jQuery.parseJSON(data);

len =a.length

rowPR =  null;
    if(len>0){
   for (i=0;i<len;i++){
       if(a[i].observedresult==null){
           actt = 0;
       }
       else{
           actt = a[i].observedresult;
       }
       

rowPR +='<tr>'+
    '<td class="tg-yw4l">'+a[i].projname+'<input name="projid" style="display:none;" value="'+a[i].projid+'"></td>'+
    '<td class="tg-yw4l">'+a[i].projObjective+'</td>'+
    '<td class="tg-yw4l">'+a[i].indicator+'</td>'+
    '<td class="tg-yw4l"><input min=0 step="0.0001" type="number" value="'+parseInt(actt).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,')+'" name = "projectResult" placeholder="Actual Project Result"/></td>'+

  '</tr>';

   }
   }
   else
   {
       rowPR = "<tr><td colspan='4' align='center'>N/A </td></tr>";
   }
   modal.find('tbody').html(rowPR)
   
   
      });


  
  
    
});


//This lines onwards this can generat a form and auto fill the form depends in the length of data. 
                $('#submitAccomplishmentModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var id = button.data('idd') 
  var title = button.data('title') 
  var quarter = button.data('quarter') 
  var year = button.data('year') 
  var fundsrc = button.data('fundsrc') 
  var position = button.data('position') 
  var datesub = button.data('datesub') 
  var datesave = button.data('datesave') 
  var fullname = button.data('fullname') 
  var isadmin = button.data('isadmin') 
  var modal = $(this)
  var rows ="";
 //  tooltip  ="";
 //  allocation ="";
 //  placeholder ="";
 //  physicaltodate ="";
  a = null;
  
 
   modal.find('.modal-title').html('Record of ' + title + " for <b> Quarter " + quarter+"</b>" )
   modal.find('#term').html('<label><input type="checkbox"  required name="check"/>  The data I encoded had been duly approved by '+title+'\'s agency head; I am providing my name and designation in the appropriate fields as an attestation of my submission’s data integrity. </label> ' )
   modal.find('#quarter').val(quarter )
   modal.find('#name').val(fullname)
   modal.find('#desig').val(position)
 modal.find('#tableHere').html('<div align="center"><img src="./image/ajax-loader_1.gif"  width="30px" height="30px" > Gathering Data</div>');
        $.get("projectByAgencyQuarter.php?agency="+id+"&quarter="+quarter+"&year="+year+"&fundsrc="+fundsrc, function(data, status){
    a = jQuery.parseJSON(data);

len =a.length


   for (i=0;i<len;i++){
       loc=a[i].provincename;
       projnum = i+1;
       if(a[i].district!=null){
           loc+=", "+a[i].district;
       }
       if(a[i].city!=null){
           loc+=", "+a[i].city;
       }
       
       switch(quarter){
           case 1:
                  if(a[i].datatype == "default"||a[i].datatype == "Default"||a[i].datatype=="Maintained"){
    
           placeholder = "Q1 Only";    
                  }
                   else if(a[i].datatype == "Cumulative"){
           placeholder = "Q1";  
      }
           break;
           case 2:
                  if(a[i].datatype == "default"||a[i].datatype == "Default"||a[i].datatype=="Maintained"){
    
           placeholder = "Q2 Only";    
                  }
                   else if(a[i].datatype == "Cumulative"){
           placeholder = "Q1+Q2 ";  
      }
           break;
           case 3:
                  if(a[i].datatype == "default"||a[i].datatype == "Default"||a[i].datatype=="Maintained"){
    
           placeholder = "Q3 Only";    
                  }
                   else if(a[i].datatype == "Cumulative"){
           placeholder = "Q1+Q2+Q3 ";  
      }
           break;
           case 4:
                  if(a[i].datatype == "default"||a[i].datatype == "Default"||a[i].datatype=="Maintained"){
    
           placeholder = "Q4 Only";    
                  }
                   else if(a[i].datatype == "Cumulative"){
           placeholder = "Q1+Q2+Q3+Q4 ";  
      }
           break;
      
           
       }
       
    
      if(a[i].datatype == "default"||a[i].datatype == "Default"||a[i].datatype=="Maintained"){
          allocation =parseInt(a[i].Tallocation).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,')+'<br/><div class="smallFont">(For Q'+quarter+' Only)</div>';
             physicaltodate = a[i].APhysicaltodate+'<br/><div class="smallFont">(For Q'+quarter+' Only)</div>';
             
             tooltip ='For Q'+quarter+' Only';
         cumScripts = "";
 } 
      else if(a[i].datatype == "Cumulative"){
          
          allocation = parseInt(a[i].Tallocation).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,')+'<br/><div class="smallFont">(Total as of Q'+quarter+')</div>';
      
          physicaltodate = a[i].APhysicaltodate+'<br/><div class="smallFont">(Total as of Q'+quarter+')</div>';
          tooltip ='Total as of Q'+quarter;
          
          cumScripts =   
              '$(".ch'+a[i].projid+'1").blur(function(){  '
          
                   
                    +'if($(this).val()<'+a[i].ReleasesPREV+'){'
                    +'$(this)[0].setCustomValidity("Please enter greater than the previous quarter '+a[i].ReleasesPREV+'");'
                    +'}else{'
                
                    +'$(this)[0].setCustomValidity("");'
                    +'}'
                +'}); '
             + '$(".ch'+a[i].projid+'2").blur(function(){  '
                    +'if($(this).val()<'+a[i].ObligationsPREV+'){'
                    +'$(this)[0].setCustomValidity("Please enter greater than the previous quarter '+a[i].ObligationsPREV+'");'
                    +'}else{'
                
                    +'$(this)[0].setCustomValidity("");'
                    +'}'
                +'}); '
             + '$(".ch'+a[i].projid+'3").blur(function(){  '
                    +'if(($(this).val()+$(".ch'+a[i].projid+'4").val())<'+a[i].ExpenditurePREV+'){'
                    +'$(".'+a[i].projid+'catch")[0].setCustomValidity("Please enter greater than the previous quarter Expenditure '+a[i].ExpenditurePREV+'");'
                
                    +'}else{'
                
                    +'$(".'+a[i].projid+'catch")[0].setCustomValidity("");'
                    +'}'
                +'}); '
             + '$(".ch'+a[i].projid+'4").blur(function(){  '
                    +'if(($(this).val()+$(".ch'+a[i].projid+'3").val())<'+a[i].ExpenditurePREV+'){'
                    +'$(".'+a[i].projid+'catch")[0].setCustomValidity("Please enter greater than the previous quarter Expenditure '+a[i].ExpenditurePREV+'");'
                    +'}else{'
                
                    +'$(".'+a[i].projid+'catch")[0].setCustomValidity("");'
                    +'}'
                +'}); '
             + '$(".ch'+a[i].projid+'5").blur(function(){  '
                    +'if($(this).val()<'+a[i].APhysicalPREV+'){'
                    +'$(this)[0].setCustomValidity("Please enter greater than the previous quarter '+a[i].APhysicalPREV+'");'
                    +'}else{'
                    
                    +'$(this)[0].setCustomValidity("");'
                    +'}'
                +'}); '
             + '$(".ch'+a[i].projid+'6").blur(function(){  '
                    +'if($(this).val()<'+a[i].AMandaysPREV+'){'
                    +'$(this)[0].setCustomValidity("Please enter greater than the previous quarter '+a[i].AMandaysPREV+'");'
                    +'}else{'
                
                    +'$(this)[0].setCustomValidity("");'
                    +'}'
                +'}); '
;
          
          
      }
       
     
        
     if(datesave!=""){
         Releases=a[i].Releases;
         Obligations=a[i].Obligations;
          Expenditure=a[i].Expenditure;
           AccountPayable=a[i].AccountPayable;
             CashDisbursed=a[i].CashDisbursed;
          Remarks=a[i].Remarks;
      AMandays=a[i].AMandays; 
        APhysical=a[i].APhysical;
   }else if(datesub==""){
       if(a[i].Releases==0){
           Releases="";
       }
       else{
           Releases=a[i].Releases;
       }
       
       if(a[i].Obligations==0){
           Obligations="";
       }
       else{
           Obligations=a[i].Obligations;
       }
       
       
       
       if(a[i].Expenditure==0){
           Expenditure="";
       }
       else{
           Expenditure=a[i].Expenditure;
       }
       
       
       if(a[i].AccountPayable==0){
           AccountPayable="";
       }
       else{
           AccountPayable=a[i].AccountPayable;
       }
       
       
       if(a[i].CashDisbursed==0){
           CashDisbursed="";
       }
       else{
           CashDisbursed=a[i].CashDisbursed;
       }
       
       if(a[i].Remarks==null){
           Remarks="";
       }
       else{
           Remarks=a[i].Remarks;
       }
       
       
     
       if(a[i].APhysical==0){
           APhysical="";
       }
       else{
           APhysical=a[i].APhysical;
       }
       if(a[i].AMandays==0){
           AMandays="";
       }
       else{
           AMandays=a[i].AMandays;
       }
       
   }
   else{
         Releases=a[i].Releases;
         Obligations=a[i].Obligations;
          Expenditure=a[i].Expenditure;
           AccountPayable=a[i].AccountPayable;
             CashDisbursed=a[i].CashDisbursed;
          Remarks=a[i].Remarks;
      AMandays=a[i].AMandays; 
        APhysical=a[i].APhysical;
   }
           
           if(a[i].iscompleted == "completed"){
               checked = "checked";
               disabled = "readonly";
           }
           else{
               checked = "";
               disabled = "";
           }
       rows+=' <tr>'+
           '<script>      '+ 
           '    $(document).ready(function(){ '+
           '$(".ch'+a[i].projid+'1").focus(function(){  c = $(this).css("width");    '+
           '; $(this).css("width",250+"px");  '+
   '}); '+
   
           '$(".ch'+a[i].projid+'2").focus(function(){   c = $(this).css("width");     '+
           '; $(this).css("width",250+"px");   '+
   '}); '+
    '$(".ch'+a[i].projid+'3").focus(function(){    c = $(this).css("width");     '+
           '; $(this).css("width",250+"px");   '+
   '}); '+
   
    '$(".ch'+a[i].projid+'4").focus(function(){    c = $(this).css("width");     '+
           '; $(this).css("width",250+"px");   '+
   '}); '+
         
    '$(".ch'+a[i].projid+'5").focus(function(){    c = $(this).css("width");     '+
           '; $(this).css("width",250+"px");   '+
   '}); '+
         
    '$(".ch'+a[i].projid+'6").focus(function(){    c = $(this).css("width");     '+
           '; $(this).css("width",250+"px");   '+
   '}); '+
         
 
           '$(".ch'+a[i].projid+'1").blur(function(){   '+
           '; $(this).css("width",c);  '+
   '}); '+
   
           '$(".ch'+a[i].projid+'2").blur(function(){    '+
           '; $(this).css("width",c);   '+
   '}); '+
    '$(".ch'+a[i].projid+'3").blur(function(){    '+
           '; $(this).css("width",c);   '+
   '}); '+
   
    '$(".ch'+a[i].projid+'4").blur(function(){  '+
           '; $(this).css("width",c);   '+
   '}); '+
    '$(".ch'+a[i].projid+'5").blur(function(){  '+
           '; $(this).css("width",c);   '+
   '}); '+
    '$(".ch'+a[i].projid+'6").blur(function(){  '+
           '; $(this).css("width",c);   '+
   '}); '+
   //check for cumulative

  cumScripts +



   '}); '+

        
    '     </script>'+
   
 
    '<td class="tg-yw41" style="width:5px;">'+
    projnum+
    '</td>'+
    '<td class="tg-yw4l pname">'+
    '<input type="label" '+disabled+' required style="border:none;display:none;width:100px;" name="projid[]" value="'+a[i].projid+'" />'+
    '<b>(a)'+a[i].projname+' </b>'+
    '<br/><b>(b)'+a[i].datestart+' - '+a[i].dateend+' </b>'+
    '<br/><b>(c)'+loc+' </b>'+
    '<br/><b>(d)'+a[i].fundcode+' </b>'+
    
    '</td>'+
   
    '<td class="tg-yw4l ">'+a[i].unitofmeasure+'<br/>('+a[i].datatype+')</td>'+
   '<td class="tg-yw4l text-right" title="'+tooltip+'">'+allocation+
    
   '</td>'+
   
     '<td class="tg-yw4l text-right"><input required style="width:80px" onfocus="setCustomValidity("")" '+disabled+'  type="number"  step="0.001" value="'+Releases+'"  name="releases[]" title="Actual Releases for Quarter '+quarter+'" placeholder="'+placeholder+'" class="ch'+a[i].projid+' input-sm form-control ch'+a[i].projid+'1 "   /></td>'+
     '<td class="tg-yw4l text-right"><input required style="width:80px" onfocus="setCustomValidity("")" '+disabled+' type="number" step="0.001" value="'+Obligations+'"  name="obligations[]" title="Actual Obligations for Quarter '+quarter+'" placeholder="'+placeholder+'" class="ch'+a[i].projid+' input-sm form-control ch'+a[i].projid+'2" /></td>'+
     '<td class="tg-yw4l text-right"><input required style="width:80px" onfocus="setCustomValidity("")" '+disabled+' type="number" step="0.001" value="'+CashDisbursed+'"  name="cashdish[]" title="Actual Expenditures for Quarter '+quarter+'" placeholder="'+placeholder+'" class="ch'+a[i].projid+' input-sm form-control ch'+a[i].projid+'3" /><input style="width:0px;height:0px;opacity:.1;" class="'+a[i].projid+'catch"/></td>'+
     '<td class="tg-yw4l text-right"><input required style="width:80px" onfocus="setCustomValidity("")" '+disabled+' type="number" step="0.001" value="'+AccountPayable+'"  name="accpay[]" title="Actual Expenditures for Quarter '+quarter+'" placeholder="'+placeholder+'" class="ch'+a[i].projid+' input-sm form-control ch'+a[i].projid+'4" /></td>'+
     '<td class="tg-yw4l text-right">'+physicaltodate+'</td>'+
   
    '<td class="tg-yw4l text-right"><input required style="width:80px"  onfocus="setCustomValidity("")" '+disabled+' type="number" step="0.001" value="'+APhysical+'"  name="physical[]" title="'+placeholder+'"  placeholder="'+placeholder+'" class="ch'+a[i].projid+' input-sm form-control ch'+a[i].projid+'5" /></td>'+

    '<td class="tg-yw4l text-right" ><input required style="width:80px" onfocus="setCustomValidity("")" '+disabled+' type="number" step="0.001" value="'+AMandays+'"  name="mandays[]" title="Man-Days Quarter '+quarter+'" placeholder="'+placeholder+'" class="ch'+a[i].projid+' input-sm form-control ch'+a[i].projid+'6" /></td>'+
    '<td class="tg-yw4l text-right" ><textarea  onfocus="setCustomValidity("")" '+disabled+' type="number" step="0.01"  name="remarks[]" title="Remarks for the quarter" placeholder="Remarks" class="ch'+a[i].projid+' input-sm form-control" style="max-width:200px;width:100px;">'+a[i].Remarks+'</textarea></td>'+
    '<td class="tg-yw4l "><input   id="checkB'+a[i].projid+'"   type="checkbox" '+checked+'   name="check'+a[i].projid+'"   title="this indicates when project is completed if you mark as checked" />mark if this project is 100% completed </td>'+
  '<script>   '+
'$(document).ready(function(){$("#checkB'+a[i].projid+'").click(function(){ '+
' if(this.checked){ '+
'$(".ch'+a[i].projid+'").attr("readonly","readonly");'+
'}else{'+
'$(".ch'+a[i].projid+'").removeAttr("readonly");'+
'}'+
'}); });'+
'</script>'+
 '</tr>';
   }

table = 
'<div class ="scrollY">   '+
          '<table class="tg tblAccom">'+
         '<thead>'+
   '<tr>'+
    '<th class="tg-amwm" colspan="2" style="text-align:left; min-width:190px;max-width:190px;" rowspan="3">(a) Name of Project<br>(b) Project Schedule<br>(c) Location<br>(d) Funding Source</th>'+
    '<th class="tg-amwm" rowspan="3">Output Indicator</th>'+
    '<th class="tg-amwm" colspan="5">Financial Status (Actual Ammount)</th>'+
    '<th class="tg-amwm" colspan="2">Physical Status</th>'+
    '<th class="tg-amwm" rowspan="3">Employment Generated</th>'+
    '<th class="tg-amwm" rowspan="3">Remarks</th>'+
    '<th class="tg-amwm" rowspan="3">Action</th>'+
 ' </tr>'+
 ' <tr>'+
 '   <td class="tg-amwm"  rowspan="2">Allocation</td>'+
 '   <td class="tg-amwm"  rowspan="2">Releases</td>'+
 '   <td class="tg-amwm"  rowspan="2">Obligations</td>'+
 '   <td class="tg-amwm" colspan="2">Expenditures</td>'+
 '   <td class="tg-amwm"  rowspan="2">Target</td>'+
   
  '  <td class="tg-amwm"  rowspan="3" >Actual Accomplishment</td>'+
  
'  </tr>'+
 ' <tr>'+
'  <td class="tg-amwm"  >Acc. Payable</td>'+
  '  <td class="tg-amwm"  >Cash Disbursed</td>'+
  
  
'  </tr>'+
  
  
  
'</thead>'+
'  <tbody>';
table+=rows;

table+='    </tbody>'+
'</table>'+
 '</div> ';
modal.find('#tableHere').html(table);


});
     
      

 
  
  
  
})


                $('#submitExceptionModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var id = button.data('idd') 
  var title = button.data('title') 
  var quarter = button.data('quarter') 
  var year = button.data('year') 
  var fundsrc = button.data('fundsrc') 
  var position = button.data('position') 
  var fullname = button.data('fullname') 
  var modal = $(this)
  var rows ="";
  a = null;
  
 
   modal.find('#name').val(fullname)
   modal.find('#desig').val(position)
   modal.find('.modal-title').html('Record of ' + title + " for <b> Quarter " + quarter+"</b>" )
   modal.find('#term').html('<label><input type="checkbox"  required name="check"/>  The data I encoded had been duly approved by '+title+'\'s agency head; I am providing my name and designation in the appropriate fields as an attestation of my submission’s data integrity. </label> ' )
   modal.find('#quarter').val(quarter )
 
        $.get("projectExceptionByQuarter.php?agency="+id+"&quarter="+quarter+"&year="+year+"&fundsrc="+fundsrc, function(data, status){
    a = jQuery.parseJSON(data);

len =a.length



  for (i=0;i<len;i++){
    
       if(a[i].recomendation!=null){
    recomendation = a[i].recomendation;
  }
  
  else{
      recomendation= "";
  }
       if(a[i].reason!=null){
    reason = a[i].reason;
  }
  else{
      reason = "";
  }
       if(a[i].sllipage<(-15)){
       
       rows+=' <tr>'+
    '<td class="tg-yw4l" style="border:none;display:none; width:30px;"><input type="label" style="border:none;display:none; width:30px;" name="projid[]" value="'+a[i].projid+'" /></td>'+
    '<td class="tg-yw4l">'+a[i].projname+' </td>'+
    '<td class="tg-yw4l">Behind schedule with negative slippage of '+parseInt((-a[i].sllipage)).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,')+' </td>'+
    '<td class="tg-yw4l"><textarea  name="reason[]" title="Causes or Reason " placeholder="Reason/Causes....." class="col-sm-3 input-sm form-control" >'+reason+'</textarea></td>'+
    '<td class="tg-yw4l"><textarea  name="recomendation[]" title="Causes or Reason " placeholder="Recomendations...." class="col-sm-3 input-sm form-control" >'+recomendation+'</textarea></td>'+
 
 '</tr>';
  }

}

modal.find('tbody').html(rows);


});
     
      

 
  
  
  
})
                $('#editProjModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var id = button.data('idd') 
  var title = button.data('titled') 
  var modal = $(this)


   






$.get("individualProject.php?q="+id, function(data, status){

  
  var  a = jQuery.parseJSON(data);
  
  modal.find('.modal-body #ssector').val(a.secid)
  
    var str = a.secid;
  
  if (window.XMLHttpRequest) {
   
    xmlhttp=new XMLHttpRequest();
  } else {
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      
 modal.find('.modal-body #ssubsector').html(xmlhttp.responseText);
   modal.find('.modal-body #ssubsector').val(a.subsecid)

    }
  }
  xmlhttp.open("GET","./subsectorDropDown.php?q="+str,true);
  xmlhttp.send();
  
  
         modal.find('.modal-title').text('You are Editing ' + title)

  
  modal.find('.modal-body #projid').val(id)
  modal.find('.modal-body #agency').val(a.agencyid)
  modal.find('.modal-body #ordering').val(a.ordering)
  modal.find('.modal-body #fundsrc').val(a.fundid)
  modal.find('.modal-body #location').val(a.locid)
  modal.find('.modal-body #category').val(a.catid)
  


  
  modal.find('.modal-body #projectname').val(a.projname)
  modal.find('.modal-body #period').val(a.period)
  modal.find('.modal-body #unitofmeasure').val(a.unitofmeasure)
  modal.find('.modal-body #programname').val(a.programname)
  modal.find('.modal-body #programnameCB').val(a.programname)
  
  
  modal.find('.modal-body #typhoon').val(a.typhoon)
  if(a.typhoon == 0){
  modal.find('.modal-body #typhoon').attr("disabled")    
  }
  
  
  modal.find('.modal-body #expprojresult').val(a.expectedresult)
  modal.find('.modal-body #projobj').val(a.projObjective)
  modal.find('.modal-body #start').val(a.datestart)
  modal.find('.modal-body #end').val(a.dateend)
  if(a.datatype == "Maintained"){
  modal.find('.modal-body #maintained').prop("checked",true)
  }
  if(a.datatype == "Cumulative"){
  modal.find('.modal-body #cumulative').prop("checked",true)
  }
  
  modal.find('.modal-body #pq1').val(a.q1Ptarget)
  modal.find('.modal-body #fq1').val(a.q1Ftarget)
  modal.find('.modal-body #mdq1').val(a.q1Mtarget)
  modal.find('.modal-body #wdq1').val(a.q1Wtarget)
  
 
  modal.find('.modal-body #pq2').val(a.q2Ptarget)
  modal.find('.modal-body #fq2').val(a.q2Ftarget)
  modal.find('.modal-body #mdq2').val(a.q2Mtarget)
  modal.find('.modal-body #wdq2').val(a.q2Wtarget)
  
 
  modal.find('.modal-body #pq3').val(a.q3Ptarget)
  modal.find('.modal-body #fq3').val(a.q3Ftarget)
  modal.find('.modal-body #mdq3').val(a.q3Mtarget)
  modal.find('.modal-body #wdq3').val(a.q3Wtarget)
  
 
  modal.find('.modal-body #pq4').val(a.q4Ptarget)
  modal.find('.modal-body #fq4').val(a.q4Ftarget)
  modal.find('.modal-body #mdq4').val(a.q4Mtarget)
  modal.find('.modal-body #wdq4').val(a.q4Wtarget)


  
 
  
  id="";
   

});


  
  
  
})
                $('#editForm7').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var id = button.data('projid') 
  var title = button.data('titled') 
  var quarter= button.data('quarter') 
  var location= button.data('location') 
  var agencycode= button.data('agencycode') 
  var projname= button.data('projname') 
  var projcost= button.data('projcost') 
  var modal = $(this)


   






$.get("individualForm78.php?q="+id+"&form=7&quarter="+quarter, function(data, status){

  
  var  a = jQuery.parseJSON(data);


  
  
         modal.find('#quarter').val(quarter)
         modal.find('#projid').val(id)
         modal.find('.modal-title').text('You are Editing Form 7 of '+agencycode+" on Quarter "+ quarter)
         if(a.implementingAgency!=null){
         modal.find('#implementingAgency').val(a.implementingAgency)
         }
         else{
         modal.find('#implementingAgency').val(agencycode)    
         }
         if(a.nameOfProject!=null){
         modal.find('#projectname').val(a.nameOfProject)
         }
         else{
         modal.find('#projectname').val(projname)    
         }
         
         if(a.location != null){
         modal.find('#location').val(a.location)
         }
         else{
         modal.find('#location').val(location)    
         }
         if(a.projectCost != null){
          modal.find('#projectcost').val(a.projectCost)
         }
         else{
          modal.find('#projectcost').val('P '+parseInt(projcost).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,'))
         }
         
         modal.find('#actionRecommendation').text(a.actionRecommendation)
         modal.find('#dateOfProjectInspection').val(a.dateOfProjectInspection)
         modal.find('#issues').text(a.issues)
         modal.find('#physicalStatus').val(a.physicalStatus)
        


  id="";
});


  
  
  
})
                $('#editForm8').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var id = button.data('projid') 
  var title = button.data('titled') 
  var quarter= button.data('quarter') 
  var location= button.data('location') 
  var agencycode= button.data('agencycode') 
  var projname= button.data('projname') 
  var modal = $(this)


   






$.get("individualForm78.php?q="+id+"&form=8&quarter="+quarter, function(data, status){

  
  var  a = jQuery.parseJSON(data);


  
  
         modal.find('#quarter').val(quarter)
         modal.find('#projid').val(id)
         modal.find('.modal-title').text('You are Editing Form 8 of '+agencycode+" on Quarter "+ quarter)
         if(a.implementingAgency!=null){
         modal.find('#implementingAgency').val(a.implementingAgency)
         }
         else{
         modal.find('#implementingAgency').val(agencycode)    
         }
         if(a.nameOfProject!=null){
         modal.find('#projectname').val(a.nameOfProject)
         }
         else{
         modal.find('#projectname').val(projname)    
         }
         
         if(a.location != null){
         modal.find('#location').val(a.location)
         }
         else{
         modal.find('#location').val(location)    
         }
         
         modal.find('#dateOfPSS').val(a.dateOfPSS)
         modal.find('#concernedAgency').val(a.concernedAgencies)
         modal.find('#agreementsReached').text(a.agreementsReached)
         modal.find('#nexSteps').val(a.nexSteps)

 
  id="";
});


  
  
  
})
                $('#viewModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var id = button.data('idd') 
  var title = button.data('titled') 
 
  var modal = $(this)
  

$.get("individualProject.php?q="+id, function(data, status){
    a = jQuery.parseJSON(data);
   
   var location =  null;
   if(a.provincename != null){location=a.provincename;}
       if(a.district!=null){location+=" ,"+a.district;}
           if(a.city!=null){location+=" ,"+a.city;}
            
         modal.find('.modal-title').text('You are viewing ' + title)
  modal.find('.modal-body #aid').text("Agency: "+a.agencycode)
  modal.find('.modal-body #afs').text("Fund Source: "+ a.fundcode+" ("+a.funddesc+")")
  modal.find('.modal-body #aperiod').text("Period: "+a.periodname)
  modal.find('.modal-body #pname').text("Project Name: "+a.projname)
  modal.find('.modal-body #ploc').text("Locattion: "+location)
  modal.find('.modal-body #psec').text("Sector: "+a.secname)
  modal.find('.modal-body #psubsec').text("Sub-Sector: "+a.subsecname)
  
  modal.find('.modal-body #ptyphoon').text("Typhoon: "+a.typhoon)
  modal.find('.modal-body #pstart').text("date accomplishment start: "+a.datestart)
  modal.find('.modal-body #pend').text("date accomplishment end: "+a.dateend)

  modal.find('.modal-body #puom').text("Unit Of Measure: "+a.unitofmeasure)
  modal.find('.modal-body #dtmv').text("Datatype : "+a.datatype)
  
  modal.find('.modal-body #tpq1').text(a.q1Ptarget)
  modal.find('.modal-body #tfq1').text(a.q1Ftarget)
  modal.find('.modal-body #tmdq1').text(a.q1Mtarget)
  
 
  modal.find('.modal-body #tpq2').text(a.q2Ptarget)
  modal.find('.modal-body #tfq2').text(a.q2Ftarget)
  modal.find('.modal-body #tmdq2').text(a.q2Mtarget)
  
 
  modal.find('.modal-body #tpq3').text(a.q3Ptarget)
  modal.find('.modal-body #tfq3').text(a.q3Ftarget)
  modal.find('.modal-body #tmdq3').text(a.q3Mtarget)
  
 
  modal.find('.modal-body #tpq4').text(a.q4Ptarget)
  modal.find('.modal-body #tfq4').text(a.q4Ftarget)
  modal.find('.modal-body #tmdq4').text(a.q4Mtarget)
});


  
  
  
})
             
         

                $('#deleteModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var id = button.data('idd') 
  var title = button.data('titled') 
 
  var modal = $(this)



  modal.find('.modal-title').text('Do You Want to delete  ' + title + '?')

  
  modal.find('.modal-body #deleteProj').attr('data-iddd',id)
})
                $('#deleteModal7').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var id = button.data('idd') 
  var q = button.data('quarter') 

 
  var modal = $(this)



  modal.find('.modal-title').text('Delete the content of Form 7?')

  
  modal.find('.modal-body #deleteProj7').attr('data-iddd',id)
  modal.find('.modal-body #deleteProj7').attr('data-quarter',q)
})
                $('#deleteModal8').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var id = button.data('idd') 
  var q = button.data('quarter') 

 
  var modal = $(this)



  modal.find('.modal-title').text('Delete the content of Form 8?')

  
  modal.find('.modal-body #deleteProj8').attr('data-iddd',id)
  modal.find('.modal-body #deleteProj8').attr('data-quarter',q)
})
                $('#approvalModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var position = button.data('position') 
  var fullname = button.data('fullname') 
 
  var modal = $(this)

modal.find("#aprname").val(fullname);
modal.find("#aprdesg").val(position);
  

  
  
})


                $('#editLocationModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var id = button.data('id') 
  var provincename = button.data('pname') 
  var district = button.data('dname') 
  var city = button.data('cname') 
var modal = $(this)

  modal.find('.modal-title').text('Edit Information for ' + provincename + ", "+ district + ", " +city)
  modal.find('.modal-body #locidedit').val(id)
  modal.find('.modal-body #provincenameedit').val(provincename)
  modal.find('.modal-body #districtedit').val(district)
  modal.find('.modal-body #cityedit').val(city)
})
 //for User Editing
 $('#editUserModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var uid = button.data('userid') 
  var uname = button.data('name') 
  var agency = button.data('agency')
  var rights = button.data('rights') 
  var email = button.data('email') 
  var position = button.data('position') 
  var lastname = button.data('lastname') 
  var middlename = button.data('middlename') 
  var firstname = button.data('firstname') 
  var division = button.data('division') 
  var title = button.data('title') 
 
  var modal = $(this)
  
 


  modal.find('.modal-title').text('Edit Information for ' + uname)
  modal.find('.modal-body #userId').val(uid)
  modal.find('.modal-body #email').val(email)
  modal.find('.modal-body #position').val(position)
  modal.find('.modal-body #lastname').val(lastname)
  modal.find('.modal-body #middlename').val(middlename)
  modal.find('.modal-body #firstname').val(firstname)
  modal.find('.modal-body #division').val(division)
  modal.find('.modal-body #title').val(title)
  modal.find('.modal-body #agencyEdit').val(agency)
  modal.find('.modal-body #rightsEdit').val(rights)
})







     $('#editPJTModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var PJTid = button.data('ptid') 
  var PJTcode = button.data('ptcode') 
  var PJTname = button.data('ptname')

 var modalPT = $(this)


  modalPT.find('.modal-title').text('Edit ' + PJTname)
  
  modalPT.find('.modal-body #PJTidE').val(PJTid)
  modalPT.find('.modal-body #CategoryCodeE').val(PJTcode)
  modalPT.find('.modal-body #CategoryNameE').val(PJTname)
})
     $('#editAGTModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var AJTid = button.data('agtid') 
  var AJTcode = button.data('agtcode') 
  var AJTname = button.data('agtname')

 var modalPT = $(this)


  modalPT.find('.modal-title').text('Edit ' + AJTname)
  
  modalPT.find('.modal-body #AGTidE').val(AJTid)
  modalPT.find('.modal-body #AgencyCodeE').val(AJTcode)
  modalPT.find('.modal-body #AgencyNameE').val(AJTname)
})
     $('#editFUNDSRCModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  
  
 
     
    
     
      
      
  var fsid = button.data('fsid') 
  var fstype = button.data('fstype') 
  var fscode = button.data('fscode') 
  var fsdesc = button.data('fsdesc') 
  
  

 var modalPT = $(this)


  modalPT.find('.modal-title' ).text('Edit Fund Source  ' + fsdesc)
  
  modalPT.find('.modal-body #editfundid').val(fsid)
  modalPT.find('.modal-body #fndsrctypeE').val(fstype)
  modalPT.find('.modal-body #fundcodeE').val(fscode)
  modalPT.find('.modal-body #funddescE').val(fsdesc)
  
})
     $('#editTYPHOONModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  
  
      
  var typhoonid = button.data('typhoonid')
  var typhoonname = button.data('typhoonname') 
  var typhoonyear = button.data('typhoonyear') 
  
  

 var modalPT = $(this)


  modalPT.find('.modal-title' ).text('Edit Typhoon ' + typhoonname)
  
  modalPT.find('.modal-body #typhoonidE').val(typhoonid)
  modalPT.find('.modal-body #typhoonnameE').val(typhoonname)
  modalPT.find('.modal-body #optYearE').val(typhoonyear)
  
})
     $('#editAGENCYModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  
  
 
     
    
     
      
      
  var AGid = button.data('agid') 
  var AGtype = button.data('gtype') 
  var AGcode = button.data('agcode') 
  var AGhead = button.data('aghead') 
  var AGname = button.data('agname') 
  var AGloc = button.data('agloc') 
  var AGdesignation = button.data('agdesignation') 
  

 var modalPT = $(this)


  modalPT.find('.modal-title' ).text('Edit Agency  ' + AGcode)
  
  modalPT.find('.modal-body #agencyID').val(AGid)
  modalPT.find('.modal-body #agencytypemainE').val(AGtype)
  modalPT.find('.modal-body #agencycodemainE').val(AGcode)
  modalPT.find('.modal-body #agencyheadmainE').val(AGhead)
  modalPT.find('.modal-body #agencynameE').val(AGname)
  modalPT.find('.modal-body #agencylocE').val(AGloc)
  modalPT.find('.modal-body #agencydesignationmainE').val(AGdesignation)
})

                
     $('#editSECTORModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
      
  var secid  = button.data('secid') 

  var secname = button.data('secname') 
  var modalsec = $(this)


  modalsec.find('.modal-title' ).text('Edit Sector  ' + secname)
  
  modalsec.find('.modal-body #sectoridE').val(secid)
  modalsec.find('.modal-body #sectornameE').val(secname)
})
     $('#editSUBSECTORModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
      
  var subsecid  = button.data('subsecid') 
  var subsecmain = button.data('subsecmain') 
  var subsecname = button.data('subsecname') 
  var modalsubsec = $(this)


  modalsubsec.find('.modal-title' ).text('Edit Sub-Sector  ' + subsecname)
  
  modalsubsec.find('.modal-body #subsecidE').val(subsecid)
  modalsubsec.find('.modal-body #subsecmainidE').val(subsecmain)
  modalsubsec.find('.modal-body #subsectornameE').val(subsecname)
})

                
                   
                
                   $("#modalBTN").on("click",function(){
  
    $('#AlertC').css('display','none');
    
});
                
                
  
                
  
     
    
  
                
                
               var value;


            $('#catidp').change(function(){
            
    
            str =  $(this).val() ;

  if (window.XMLHttpRequest) {
   
    xmlhttp=new XMLHttpRequest();
  } else {
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        
      document.getElementById("ssectorp").innerHTML=xmlhttp.responseText;
      
    }
  }
  xmlhttp.open("GET","./specificCategory.php?q="+str,true);
  xmlhttp.send();


 }) 
            $('#fundsrc').change(function(){
               var str = $(this).val();
               console.log(str);
               if(str!=7){
                   $("#typhoon").attr("disabled", "disabled");
                   
               }else{
                     $("#typhoon").removeAttr("disabled");
                   
               }
            });
            
            $('#ssector').change(function(){
          var str = $(this).val();
  
  if (window.XMLHttpRequest) {
   
    xmlhttp=new XMLHttpRequest();
  } else {
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("ssubsector").innerHTML=xmlhttp.responseText;

    }
  }
  xmlhttp.open("GET","./subsectorDropDown.php?q="+str,true);
  xmlhttp.send();


 }) 
 function FilterFromAccReport(){
   var a = new Date();
   var optYear  = $('#optYear').val();
   var drpQuarter = $('#smryDrpDownQuarter').val();
   var vardrpAgency = $('#agencysmrtbl').val();
   var drpLocations = $('#locations').val();
   var drpSector = $('#smrySect').val();
   var drpFundSrc = $('#optfundsrc').val();
   var drpOrder = $('#smryDrpDownOrder').val();
   var drpPeriod = $('#smryDrpDownPeriod').val();
   
  if(drpPeriod==null)drpPeriod = 0;
  if(drpOrder==null)drpOrder = 0;
  
  if(optYear==null)optYear = a.getFullYear();
  if(drpQuarter==null)drpQuarter = 0;
  if(vardrpAgency==null)vardrpAgency = 0;
  if(drpLocations==null)drpLocations = 0;
  if(drpSector==null)drpSector = 0;
  if(drpFundSrc==null)drpFundSrc = 0;
 
   lnk = window.location.href;
   

        
     if(get("iPeriod")!=""){
        lnk = removeURLParameter(lnk,'iPeriod');
      
    
        lnk = lnk+"&iPeriod="+drpPeriod;
     }
     
     if(get("Order")!=""){
        lnk = removeURLParameter(lnk,'Order');
      
    
        lnk = lnk+"&Order="+drpOrder;
     }
     
     if(get("optfundsrc")!=""){
        lnk = removeURLParameter(lnk,'optfundsrc');
      
    
        lnk = lnk+"&optfundsrc="+drpFundSrc;
     }
     
     if(get("optyear")!=""){
        lnk = removeURLParameter(lnk,'optyear');
      
  
        lnk = lnk+"&optyear="+optYear;
     }
    
 
     if(get("quarter")!=""){
        lnk = removeURLParameter(lnk,'quarter');
      
   
         lnk = lnk+"&quarter="+drpQuarter;
     }
 
 
     if(get("locations")!=""){
        lnk = removeURLParameter(lnk,'locations');
     
         lnk = lnk+"&locations="+drpLocations;
     }

     if(get("smrySect")!=""){
        lnk = removeURLParameter(lnk,'smrySect');
      
   
        lnk =  lnk+ "&smrySect="+drpSector;
     }

     if(get("agencysmrtbl")!=""){
        lnk = removeURLParameter(lnk,'agencysmrtbl');
      
   
         lnk = lnk + "&agencysmrtbl=" + vardrpAgency;
     }
  
     
 

    

       window.location.replace(lnk);

   
 }
$('#loadDataACCReport').click(function(){
     var drpQuarter = $('#smryDrpDownQuarter').val();
     if(drpQuarter>0){
    FilterFromAccReport();
  }     
else{
    alert("Please Select Quarter")
}
});
$('#loadData').click(function(){
     FilterFromAccReport();
  
});
 
 
 function removeURLParameter(url, parameter) {
    
    var urlparts= url.split('?');   
    if (urlparts.length>=2) {

        var prefix= encodeURIComponent(parameter)+'=';
        var pars= urlparts[1].split(/[&;]/g);

   
        for (var i= pars.length; i-- > 0;) {    
           
            if (pars[i].lastIndexOf(prefix, 0) !== -1) {  
                pars.splice(i, 1);
            }
        }

        url= urlparts[0]+'?'+pars.join('&');
        return url;
    } else {
        return url;
    }
}
 function get(variable) {
  var query = window.location.search.substring(1);
  var vars = query.split("&");
  for (var i=0;i<vars.length;i++) {
    var pair = vars[i].split("=");
    if (pair[0] == variable) {
      return pair[1];
    }
  } 

}



 
    
    
    
   $('#smryChoiceBy').change(function(e){
 var lnk ;
 
 
 
 if(get!=""){
     if(get("ChoiceBy")!=""){
        lnk = removeURLParameter(window.location.href,'ChoiceBy');
      
     }
     else{
         lnk = window.location.href;
     }
     
 }

       window.location.replace(lnk+"&ChoiceBy="+$(this).val());
      
        
    });
  
   $('#ssector').change(function(e){
 var triger = $(this).val();
if(triger == 19613){
    $("#cumulative").attr('checked', true);
    $("#maintained").attr('disabled', true);
}else{
    
    $("#cumulative").attr('checked', false);
    $("#maintained").attr('checked', false);
    $("#maintained").attr('disabled', false);
}
 
        
    });
    
 
/*$("#projobj").keyup(function(){
    
    value = parseInt($(this).val().length);
   strlen = parseInt($(this).attr('maxlength'));
   remaining = strlen-value;
  
   $("#charnum").html(remaining + " remaining Characters")
})*/

   $('#programnameCB').change(function(e){
       value = $(this).val();
      if(value=="other"){
      $("#programname").removeAttr('disabled');
      }
      else{
      $("#programname").attr('disabled',"disabled");    
      }
   });
   /*
   $('#smryDrpDownOrder').change(function(e){
 var lnk ;
 
 
 
 if(get!=""){
     if(get("Order")!=""){
        lnk = removeURLParameter(window.location.href,'Order');
      
     }
     else{
         lnk = window.location.href;
     }
     
 }

       window.location.replace(lnk+"&Order="+$(this).val());
      
        
    });
    
    
   $('#smryDrpDownPeriod').change(function(e){
 var lnk ;
 
 
 
 if(get!=""){
     if(get("iPeriod")!=""){
        lnk = removeURLParameter(window.location.href,'iPeriod');
      
     }
     else{
         lnk = window.location.href;
     }
     
 }

       window.location.replace(lnk+"&iPeriod="+$(this).val());
      
        
    });
    
    
    
   $('#agencysmrtbl').change(function(e){
 var lnk ;
 
  

 
 if(get!=""){
     if(get("agencysmrtbl")!=""){
        lnk = removeURLParameter(window.location.href,'agencysmrtbl');
      
     }
     else{
         lnk = window.location.href;
     }
     
 }

       window.location.replace(lnk+"&agencysmrtbl="+$(this).val());
      
        
    });
   */
   $('#agencyAdd').change(function(e){
 var lnk ;
 
  

 
 if(get!=""){
     if(get("agencyAdd")!=""){
        lnk = removeURLParameter(window.location.href,'agencyAdd');
      
     }
     else{
         lnk = window.location.href;
     }
     
 }

       window.location.replace(lnk+"&agencyAdd="+$(this).val());
      
        
    });
    
    
   $('#smryDrpDownPrjType').change(function(e){
 var lnk ;
 
  

 
 if(get!=""){
     if(get("category")!=""){
        lnk = removeURLParameter(window.location.href,'category');
      
     }
     else{
         lnk = window.location.href;
     }
     
 }

       window.location.replace(lnk+"&category="+$(this).val());
      
        
    });
    /* 
   $('#optfundsrc').change(function(e){
 var lnk ;
 
  

 
 if(get!=""){
     if(get("optfundsrc")!=""){
        lnk = removeURLParameter(window.location.href,'optfundsrc');
      
     }
     else{
         lnk = window.location.href;
     }
     
 }

       window.location.replace(lnk+"&optfundsrc="+$(this).val());
      
        
    });
  $('#optYear').change(function(e){
 var lnk ;
 
  

 
 if(get!=""){
     if(get("optyear")!=""){
        lnk = removeURLParameter(window.location.href,'optyear');
      
     }
     else{
         lnk = window.location.href;
     }
     
 }

       window.location.replace(lnk+"&optyear="+$(this).val());
      
        
    });
    
       $('#smryDrpDownQuarter').change(function(e){
 var lnk ;
 
  

 
 if(get!=""){
     if(get("quarter")!=""){
        lnk = removeURLParameter(window.location.href,'quarter');
      
     }
     else{
         lnk = window.location.href;
     }
     
 }

       window.location.replace(lnk+"&quarter="+$(this).val());
      
        
    });
  
    
       $('#locations').change(function(e){
 var lnk ;
 
  

 
 if(get!=""){
     if(get("locations")!=""){
        lnk = removeURLParameter(window.location.href,'locations');
      
     }
     else{
         lnk = window.location.href;
     }
     
 }

       window.location.replace(lnk+"&locations="+$(this).val());
      
        
    });
      
    
    
       $('#smrySect').change(function(e){
 var lnk ;
 
  

 
 if(get!=""){
     if(get("smrySect")!=""){
        lnk = removeURLParameter(window.location.href,'smrySect');
      
     }
     else{
         lnk = window.location.href;
     }
     
 }

       window.location.replace(lnk+"&smrySect="+$(this).val());
      
        
    });
    */
    

if(get!=""){
       a =  get("smrySect");
       $('#smrySect').val(a);
}

if(get!=""){
       a =  get("locations");
       $('#locations').val(a);
}
if(get!=""){
       a =  get("agencysmrtbl");
       $('#agencysmrtbl').val(a);
}
if(get!=""){
       a =  get("agencyAdd");
       $('#agencyAdd').val(a);
}
if(get!=""){
       a =  get("agencyAck");
       $('#agencyAck').val(a);
}
if(get!=""){
       a =  get("optfundsrc");
       $('#optfundsrc').val(a);
}
if(get!=""){
       a =  get("quarter");
       $('#smryDrpDownQuarter').val(a);
}
if(get!=""){
       a =  get("category");
       $('#smryDrpDownPrjType').val(a);
}
if(get!=""){
       a =  get("optyear");
       $('#optYear').val(a);
}
if(get!=""){
     a =  get("iPeriod");
       $('#smryDrpDownPeriod').val(a);
}
if(get!=""){
     a =  get("Order");
       $('#smryDrpDownOrder').val(a);
}
   
if(get!=""){
     a =  get("ChoiceBy");
       $('#smryChoiceBy').val(a);
}
   

 
  var strp= "?page=485a993995bd218607c3ffe78bc387fafeaf7e5a&Panel=4ea9fa7240ef926ed7106723775a2ed1edd66fad&project=b11a44780ae1554dd88ab4d3f07b4324f1d28442";




$("#projobj").keyup(function(){
    val = $(this).val();
    if(val.length != 0){
       $("#expprojresult").attr("required","required");
    }
    else{
        $("#expprojresult").removeAttr("required");
    }
});


  
        
 
 
                
  
        
        
        });
var homeLnk = "?page=7bba1f7724a766bb8cd54a49b2c8c13ec0b4ca68&home=2736fab291f04e69b62d490c3c09361f5b82461a&maintab=home";
var homeLnk2 = "?page=7bba1f7724a766bb8cd54a49b2c8c13ec0b4ca68&home=2736fab291f04e69b62d490c3c09361f5b82461a";
var a =window.location.search;
if(a == homeLnk||a == homeLnk2){
 setInterval(function(){ myTimer() }, 1000);
}

function myTimer() {
  $(document).ready(function(){
      $.get("./getDate.php?q=mm-dd-yyyy%20hh-mm-ss",function(data,status){
    $("#timeAdapt").text("Server Time: "+data);
     
     
      })
  })
    
  //  document.getElementById("timeAdapt").innerHTML = "Today is: "+t+ " " + dd;
}


