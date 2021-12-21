


    <!--script type="text/javascript" src="./API/javascript/jsapi.js"></script-->
    <script type="text/javascript" src="./API/javascript/jschart.js"></script>
    <script type="text/javascript">

    google.charts.load('visualization', '1.0', {'packages':['corechart','bar']});
    //google.load('current','1.0', {'packages':['corechart','bar']});
  

    google.charts.setOnLoadCallback(OVERALL);
    
    google.charts.setOnLoadCallback(BAO);
    
    google.charts.setOnLoadCallback(bysec);
    google.charts.setOnLoadCallback(numProj);
var quarter = <?Php echo $GLOBALS['autoQuarter']; ?>;
var quarter1 = <?Php echo $GLOBALS['autoQuarter']; ?>;
var year = <?Php echo $GLOBALS['year']; ?>;
var yearBAO = <?Php echo $GLOBALS['year']; ?>;
var yearSEC = <?Php echo $GLOBALS['year']; ?>;
var yearOA = <?Php echo $GLOBALS['year']; ?>;
    
    $(document).ready(function(){
    setActive(quarter);
    setActive1(quarter1);
    $("#numProj"+year).parent().attr("class", "active");
    
        $('#yearPagination li .year').click(function(){
   
   
            $("#numProj"+year).parent().removeAttr("class");
            
          
          year  = $(this).text();
            
            $("#numProj"+year).parent().attr("class", "active");
            google.charts.setOnLoadCallback(numProj);
        });
        $('#yearnext').click(function(){
                $("#numProj"+year).parent().removeAttr("class");
            
          yearlast  =$('ul#yearPagination li:nth-last-child(2)').text();
          if(year<yearlast){
          year++;
          }
          
           
            $("#numProj"+year).parent().attr("class", "active");
            google.charts.setOnLoadCallback(numProj);
         
        });
        $('#yearprev').click(function(){
                $("#numProj"+year).parent().removeAttr("class");
            
          yearfirst  =$('ul#yearPagination li:nth-child(2)').text();
          if(year>yearfirst){
          year--;
          }
          
           
            $("#numProj"+year).parent().attr("class", "active");
            
         google.charts.setOnLoadCallback(numProj);
        }); 
        
        function removeActive(quarte){
        switch(quarte){
            case 1:
                $("#secquarter1").parent().removeAttr('class');
                break;
            case 2:
                $("#secquarter2").parent().removeAttr('class');
                break;
            case 3:
                $("#secquarter3").parent().removeAttr('class');
                break;
            case 4:
                $("#secquarter4").parent().removeAttr('class');
                break;
        }
            
            
    }
    function setActive(quarte){
             switch(quarte){
            case 1:
                $("#secquarter1").parent().attr("class", "active");
                break;
            case 2:
                $("#secquarter2").parent().attr("class", "active");
                break;
            case 3:
                $("#secquarter3").parent().attr("class", "active");
                break;
            case 4:
                $("#secquarter4").parent().attr("class", "active");
                break;
        }
    }
        function removeActive1(quarte){
        switch(quarte){
            case 1:
                $("#baoquarter1").parent().removeAttr('class');
                break;
            case 2:
                $("#baoquarter2").parent().removeAttr('class');
                break;
            case 3:
                $("#baoquarter3").parent().removeAttr('class');
                break;
            case 4:
                $("#baoquarter4").parent().removeAttr('class');
                break;
        }
            
            
    }
    function setActive1(quarte){
             switch(quarte){
            case 1:
                $("#baoquarter1").parent().attr("class", "active");
                break;
            case 2:
                $("#baoquarter2").parent().attr("class", "active");
                break;
            case 3:
                $("#baoquarter3").parent().attr("class", "active");
                break;
            case 4:
                $("#baoquarter4").parent().attr("class", "active");
                break;
        }
    }
        
        
    $("#baonext").on('click',function(){
        removeActive1(quarter1);
        if(quarter1!=4){
        quarter1 +=1;
        }
              setActive1(quarter1);
        google.charts.setOnLoadCallback(BAO);
    });
    $("#baoprev").on('click',function(){
         removeActive1(quarter1);
        if(quarter1!=1){
        quarter1 -=1;
        }
              setActive1(quarter1);
        google.charts.setOnLoadCallback(BAO);
    });
    $("#baoquarter1").on('click',function(){
         removeActive1(quarter1);
        quarter1 =1;
              setActive1(quarter1);
         google.charts.setOnLoadCallback(BAO);
    });
    $("#baoquarter2").on('click',function(){
         removeActive1(quarter1);
        quarter1 =2;
              setActive1(quarter1);
         google.charts.setOnLoadCallback(BAO);
    });
    $("#baoquarter3").on('click',function(){
         removeActive1(quarter1);
        quarter1 =3;
              setActive1(quarter1);
         google.charts.setOnLoadCallback(BAO);
    });
    $("#baoquarter4").on('click',function(){
         removeActive1(quarter1);
        quarter1 =4;
        setActive1(quarter1);
         google.charts.setOnLoadCallback(BAO);
         
    });
        
    $("#secnext").on('click',function(){
        removeActive(quarter);
        if(quarter!=4){
        
        quarter +=1;
        }
   setActive(quarter);
        google.charts.setOnLoadCallback(bysec);
    });
    $("#secprev").on('click',function(){
         removeActive(quarter);
        if(quarter!=1){
        quarter -=1;
        }
       setActive(quarter);
        google.charts.setOnLoadCallback(bysec);
    });
    $("#secquarter1").on('click',function(){
         removeActive(quarter);
        quarter =1;
  setActive(quarter);
         google.charts.setOnLoadCallback(bysec);
    });
    $("#secquarter2").on('click',function(){
         removeActive(quarter);
        quarter =2;
    setActive(quarter);
         google.charts.setOnLoadCallback(bysec);
    });
    $("#secquarter3").on('click',function(){
         removeActive(quarter);
        quarter =3;
   setActive(quarter);
         google.charts.setOnLoadCallback(bysec);
    });
    $("#secquarter4").on('click',function(){
         removeActive(quarter);
        quarter =4;
   setActive(quarter);
         google.charts.setOnLoadCallback(bysec);
         
    });
    $("#yearBAO").on('change',function(){
    
  yearBAO = $(this).val();

         google.charts.setOnLoadCallback(BAO);
         
    });
    $("#yearOA").on('change',function(){
    
  yearOA = $(this).val();

         google.charts.setOnLoadCallback(OVERALL);
         
    });
    $("#yearSEC").on('change',function(){
    
  yearSEC = $(this).val();

         google.charts.setOnLoadCallback(bysec);
         
    });
        
    });
  
   

      function OVERALL() {

        // Create the data table for OVER ALL
   var a = $.ajax({
          url: "./API/JSON/summaryGraph.php?summary=overall&year="+yearOA,
          dataType: "json",
          async: false
          }).responseText;
   
     var data = new google.visualization.DataTable(a);

 var jjj = JSON.parse(a);
 var total=0;
    $.each(jjj.rows,function(index,value){
                // if(index>0)
total += (value.c[1].v);
    });

        // Set chart options
        var options = {'title':total+ ' Total| Overall Project Status ',
                         'is3D':true,
                        //  'legend':'left',
                        'width':1000,
                       
                       'height':700};
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('OVERALL'));
        chart.draw(data, options);
      
      
      
      }
      function BAO(){
        // Create the data table for BAO.
   var b = $.ajax({
          url: "./API/JSON/summaryGraph.php?summary=BAO&quarter="+quarter1+"&year="+yearBAO,
          dataType: "json",
          async: false
          }).responseText;
   
 var jjj = JSON.parse(b);

 var total=0;
    $.each(jjj.rows,function(index,value){
                // if(index>0)
total += (value.c[1].v);
    });

      var data2 = new google.visualization.DataTable(b);

        // Set chart options
        var options2 = {'title': total+ ' Total| Overall Status of Ongoing Projects ',
                 
                         'is3D':true,
                        //  'legend':'left',
                        'width':1000,
                       
                       'height':700};
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('BAO'));
        chart.draw(data2, options2);
        
        
        
        }
        
        function bysec(){
      //for bar chart by sector
      // quarter is fixed temporary
      
         var bd = $.ajax({
          url: "./API/JSON/summaryGraph.php?summary=bysector&quarter=" +quarter +"&year="+yearSEC,
          dataType: "json",
          async: false
          }).responseText;
          
          
 bd = jQuery.parseJSON(bd);
 
    var total = 0;
    $.each(bd,function(index,value){
        if(index>0)
total += parseInt(value[1]) +parseInt(value[2])+parseInt(value[3]);

    });
    
     var data = google.visualization.arrayToDataTable(bd);

        var options = {
            height: 500,
            
            legend: { position: 'right', maxLines: 3 },
          chart: {
            title: 'Status of Ongoing Projects by Sector, Quarter '+quarter,
            subtitle: total+ ' Total of Ongoing projects'
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barChartBySector'));

        chart.draw(data, options);
     

}
        function numProj(){
      //for bar chart by sector
      // quarter is fixed temporary
      
         var bdd = $.ajax({
          url: "./API/JSON/summaryGraph.php?summary=numProj&year="+year,
          dataType: "json",
          async: false
          }).responseText;
          
          
 bdd = jQuery.parseJSON(bdd);
    var total = 0;
    $.each(bdd,function(index,value){
        if(index>0)
total += parseInt(value[1]);
    });
  

     var data = google.visualization.arrayToDataTable(bdd);

        var options = {
            height: 500,
           
        legend: { position: "none" },
          chart: {
            title: 'Number of projects enrolled by agency, CY '+year,
            subtitle: total+ " Total Number of Projects"
         
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        

          
        
    

};

        var chart = new google.charts.Bar(document.getElementById('numProj'));

        chart.draw(data, options);
     

}
    </script>
    <style>
        .separator{
            background-color:  #000;
            width: 100%;
            height: 3px;
            opacity: .8;
            box-shadow: 3px;
            position: relative;
        }
    </style>
  <div id="numProj"  >
     
 </div>
 
    
     <div style="overflow-x:scroll; "  class="hide-print"  align="center">
         
 <nav>
  <ul id="yearPagination" class="pagination">
    <li>
      <a id="yearprev" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    
    <?Php
      $current = $GLOBALS['year'];
            $yearGap =$current-2016;
            $i = 0; 
            while($i<=$yearGap){
                echo '<li><a class="year"  id="numProj'.($current-$yearGap).'">'.($current-$yearGap).'</a></li>';
        
            
            $yearGap--;
            
            }
    ?>

    <li>
      <a id="yearnext" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
        </div>
    
  
 
  
 <div id="OVERALL" align="center" class="col-sm-12"   >
     
 </div>
       
  <div  align="center" >
       <div  style="width:100px;" >
  Select Year  <select id="yearOA" class="form-control ">
  
   <?Php
      $current = $GLOBALS['year'];
            $yearGap =$current-2016;
            $i = 0; 
            while($i<=$yearGap){
                echo '<option value="'.($current-$i).'">'.($current-$i).'</option>';
        
            
            $i++;
            
            }
    ?>
  </select>
    </div>
    </div>
    <br/>
    <br/>
  
 <div id="BAO" align="center" class="col-sm-12  "  >
     
 </div>


    <div class="separator"></div>
    
      <div  align="center" >
       <div  style="width:100px;" >
  Select Year  <select id="yearBAO" class="form-control ">
  
   <?Php
      $current = $GLOBALS['year'];
            $yearGap =$current-2016;
            $i = 0; 
            while($i<=$yearGap){
                echo '<option value="'.($current-$i).'">'.($current-$i).'</option>';
        
            
            $i++;
            
            }
    ?>
  </select>
    </div>
    </div>
     <div  class="hide-print"  align="center">
         
 <nav>
  <ul class="pagination">
    <li>
      <a id="baoprev" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li><a  id="baoquarter1">1</a></li>
    <li><a  id="baoquarter2">2</a></li>
    <li><a  id="baoquarter3">3</a></li>
    <li><a  id="baoquarter4">4</a></li>

    <li>
      <a id="baonext" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
       
        </div>
     
    
    <div class="separator"></div>
    
 <div style="width:90%" id="barChartBySector" >
     
 </div>
     <div  align="center" >
       <div  style="width:100px;" >
  Select Year  <select id="yearSEC" class="form-control ">
  
   <?Php
      $current = $GLOBALS['year'];
            $yearGap =$current-2016;
            $i = 0; 
            while($i<=$yearGap){
                echo '<option value="'.($current-$i).'">'.($current-$i).'</option>';
        
            
            $i++;
            
            }
    ?>
  </select>
    </div>
    </div>
    <div class="hide-print" align="center">
 <nav>
  <ul class="pagination">
    <li>
      <a id="secprev" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li><a  id="secquarter1">1</a></li>
    <li><a  id="secquarter2">2</a></li>
    <li><a  id="secquarter3">3</a></li>
    <li><a  id="secquarter4">4</a></li>

    <li>
      <a id="secnext" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
        </div>
