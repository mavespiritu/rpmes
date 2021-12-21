<?php
$badgeCount = new acknowledgementDAO();
?>
<script type="text/javascript" src="./API/javascript/jquery.quicksearch.js"></script>


   <ul class="nav nav-tabs" role="tablist">
    <li ><a href="?page=6d7f200fac43f37f5b196bdc0152d9e56541c7f3&Panel=f9f7917226ec6e9fbadd4fe52c35f233baccd628&ack=6d7f200fac43f37f5b196bdc0152d9e56541c7f3" role="tab" >
            Monitoring Plan <span class="badge"><?php echo $badgeCount->countMonitoring($GLOBALS['year']); ?></span></a> </li>
    <li ><a href="?page=6d7f200fac43f37f5b196bdc0152d9e56541c7f3&Panel=f9f7917226ec6e9fbadd4fe52c35f233baccd628&ack=b0495f6e0571f5427f7a35c8c1162944f2b496e9"  role="tab" >
            Accomplishment <span class="badge"><?php echo $badgeCount->countAccomplishment($GLOBALS['year']); ?></span> </a></li>
    <li ><a href="?page=6d7f200fac43f37f5b196bdc0152d9e56541c7f3&Panel=f9f7917226ec6e9fbadd4fe52c35f233baccd628&ack=d7fc60fa1ba1c37c5e4f2dae65e7a9a3b2c79eba"  role="tab" >
            Project Exception <span class="badge"><?php echo $badgeCount->countException($GLOBALS['year']); ?></span> </a></li>
</ul>
 <?Php //echo '<h1>Welcome '.$_SESSION['username'].', have a nice day</h1>'; ?>
  