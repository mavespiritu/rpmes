<div align="center" class="divGlass">

        <div class=" col-sm-3 list-group">
            <h3>Tutorials</h3>
  <a href="#Overview of The System" data-src="./videos/overview.mp4" class="list-group-item">Overview Of The System</a>
  <a href="#EnrollingProject" data-src="./videos/enrolling proj.mp4" class="list-group-item">How to Enroll Different Type of Project</a>
  <a href="#SubmitAccomplishment" data-src="./videos/submission by quarter acc.mp4" class="list-group-item">How to Submit Accomplishment Report</a>
  <a href="#SubmitExceptionReport" data-src="./videos/how to submit exception.mp4" class="list-group-item">How to Submit Project Exception</a>
  <a href="#PrintingMonitoringPlan" data-src="./videos/how to print monitoring plan.mp4" class="list-group-item">How to Print Monitoring Plan</a>
  <a href="#PrintingAccomplishment" data-src="./videos/printing accomplishment.mp4" class="list-group-item">How to Print Accomplishment Report</a>
  <a href="#PrintingProjectException" data-src="./videos/printing ProjException.mp4" class="list-group-item">How to Print Project Exception Report</a>
  <a href="#AddEditDeleteViewProject" data-src="./videos/viewEditDelete.mp4" class="list-group-item">How to Edit,Delete or View Project</a>

        </div>
  

    <h3 id="title" align="center"></h3>

             <div class=" embed-responsive embed-responsive-16by9">
            <iframe id="videoplayer" class="embed-responsive-item" src="./videos/playerdef3.gif"></iframe>
          </div>

  
    </div>
 
<script>
    $(document).ready(function(){
        $(".list-group-item").click(function(e){
            e.preventDefault
            data = $(this).attr('data-src') ;
           $(".list-group-item").removeClass('active') ;
           $(this).addClass('active') ;
           $("#title").text($(this).text());
           
            $("#videoplayer").attr("src",data);
          
        });
        
    });
    
    </script>