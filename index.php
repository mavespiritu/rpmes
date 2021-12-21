<?Php
define('domainURL',(((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS']!=='off') || $_SERVER['SERVER_PORT']==443) ? 'https://':'http://' ).$_SERVER['HTTP_HOST']);
define('homeFOLD',domainURL);
define('requestURI',$_SERVER["REQUEST_URI"]);               
define('requestURIfromHome', str_replace(homeFOLD, '',requestURI) );    
define('requestURIfromHomeWithoutParameters',parse_url(requestURIfromHome, PHP_URL_PATH));
define('currentURL',domainURL.requestURI);

date_default_timezone_set('Asia/Manila');

$now = new DateTime();

        
        $datetime = $now->format("Y-m-d H:i");
        $year = $now->format("Y");
        $date = $now->format("Y-m-d");
        $month = $now->format("m");
        $monoDate = $now->format("d");
        $autoQuarter = 0;
        $asOfQuarter="";
        $MonthWord="";
      switch($month){
            case 1; $MonthWord = "January"; break;
            case 2; $MonthWord = "February"; break;
            case 3; $MonthWord = "March"; break;
            case 4; $MonthWord = "April"; break;
            case 5; $MonthWord = "May"; break;
            case 6; $MonthWord = "June"; break;
            case 7; $MonthWord = "July"; break;
            case 8; $MonthWord = "August"; break;
            case 9; $MonthWord = "September"; break;
            case 10; $MonthWord = "October"; break;
            case 11; $MonthWord = "November"; break;
            case 12; $MonthWord = "December"; break;
        }
        $Fulldate=$MonthWord ." ".$monoDate. ", ".$year;
  
        
      if($month>=1&&$month<=3){
          $autoQuarter = 1;
      }
      if($month>=4&&$month<=6){
          $autoQuarter = 2;
      }
      if($month>=7&&$month<=9){
          $autoQuarter = 3;
      }
      if($month>=10&&$month<=12){
          $autoQuarter = 4;
      }
             if(isset($_GET['quarter'])){
            switch ($_GET['quarter']){
                case 1:$asOfQuarter = "March 31, ".$year;break;
                case 2:$asOfQuarter = "June 30, ".$year;break;
                case 3:$asOfQuarter = "September 30, ".$year;break;
                case 4:$asOfQuarter = "December 31, ".$year;break;
                    
            }
            
            
        }
        else{
              switch ($autoQuarter){
                case 1:$asOfQuarter = "March 31, ".$year;break;
                case 2:$asOfQuarter = "June 30, ".$year;break;
                case 3:$asOfQuarter = "September 30, ".$year;break;
                case 4:$asOfQuarter = "December 31, ".$year;break;
                    
            } 
        }
        ob_start();
        
   $index = new Index();
   $index->init();
   
   
   
   
   
final class Index{


const PAGE_MAPPER = 'mapping/'; 
const PAGE_DIR = 'page/'; 
const IMAGE = 'image/'; 
const DAO = 'DAO/';




function init() {
    
       error_reporting(E_ALL | E_STRICT);
        mb_internal_encoding('UTF-8');
        set_exception_handler(array($this, 'handleException'));
        spl_autoload_register(array($this, 'loadClass'));
        // session
        session_start();         
 
   $auth = new  authentication();

 include_once 'layout/template.phtml';
echo '
    <div id="alertMod" class="alertPop alrtWARNING"></div>
<div id="alertWarning" class="alertPop alrtWARNING"></div>
<div id="alertDanger" class="alertPop alrtDANGER"></div>
<div id="alertSuccess" class="alertPop alrtSUCCESS"></div>
';

?>
        



  <?Php   
  

    
        if(isset($_GET['page'])){
            
            $page  = $_GET['page'];
            switch ($page){
      
                case '485a993995bd218607c3ffe78bc387fafeaf7e5a':
                    //adminPanel
                     if($auth->is_logged_in()=="true"){
                   if($auth->is_admin()=='true'){
                              include_once self::PAGE_DIR."Panel.php";
                              include_once self::PAGE_MAPPER."mapProject.php";
                              include_once self::PAGE_MAPPER."mapAccomplishment.php";
                              include_once self::PAGE_MAPPER."mapUser.php";
                              include_once self::PAGE_MAPPER."mapAgency.php";
                              include_once self::PAGE_MAPPER."mapSector.php";
                              include_once self::PAGE_MAPPER."mapFundSrc.php";
                              include_once self::PAGE_MAPPER."mapDuedates.php";
                              include_once self::PAGE_MAPPER."mapLocation.php";
                              include_once self::PAGE_MAPPER."mapTyphoon.php";
                     }
                     else{
                              include_once self::PAGE_DIR."Panel.php";
                              
                              include_once self::PAGE_MAPPER."mapAccomplishment.php";
                              include_once self::PAGE_MAPPER."mapProject.php";
                              include_once self::PAGE_MAPPER."mapUser.php";
                     }
            }
                    else{
        header('location:index.php');  
      }
                    
                    break;
                case '55525e1b3dfd8787fd202aed45fb04494e3242d0':
                    //logout
                  if($auth->is_logged_in()=="true"){
                        
                    
                       $auth->logout();
                
                  }
                  else{
        header('location:index.php');  
      }
                    
                    break;
                case '7bba1f7724a766bb8cd54a49b2c8c13ec0b4ca68':
                    //home
                  
                    
                           
                      include_once self::PAGE_MAPPER."mapLogin.php";
                  
                      include_once self::PAGE_DIR.'home.php';
        
                       
     
                    
                    break;
                case '6d7f200fac43f37f5b196bdc0152d9e56541c7f3':
                    //acknowledgement
                  
              if($auth->is_logged_in()=="true"){
                   if($auth->is_admin()=='true'){
                            include_once self::PAGE_DIR.'Panel.php';
                         
        
                            include_once self::PAGE_MAPPER."mapProject.php";
                     }
                     else{
                           header('location:index.php');  
                     }
            }
                    else{
        header('location:index.php');  
      }
                           
                
                   
     
                    
                    break;
                    
        
        
                    
                case '514a6978ba92198b672c68362a9c84ed24e26adf':
                    //contact
                     if($auth->is_logged_in()=="true"){
                        
                    
                     include_once self::PAGE_DIR."contact.php";
                     }
                     else{
        header('location:index.php');  
      }
                    break;
                case 'f61918994eeec9e24e2b1cd8abf5770a383939be':
                    //about
                    if($auth->is_logged_in()=="true"){
                        
                    
                     include_once self::PAGE_DIR."about.php";  
                    }
                    else{
        header('location:index.php');  
      }
                    
                    break;
                case '96a26200cbb466c1dd05cb6d9c7c13f1b90a82ac':
                    //howto
                    if($auth->is_logged_in()=="true"){
                        
                    
                     include_once self::PAGE_DIR."howto.php";  
                    }
                    else{
        header('location:index.php');  
      }
                    
                    break;
                case 'f34276d0518706a22b98954f4ef2b0a19b2040f4':
                    //my profile
                     


                    if($auth->is_logged_in()=="true"){
                        
                    
                     include_once self::PAGE_DIR."myprofile.php"; 
                     include_once self::PAGE_MAPPER."mapUser.php";
                     }else{
        header('location:index.php');  
      }
                    
                    break;
                    default:
                              header('location:./?page=7bba1f7724a766bb8cd54a49b2c8c13ec0b4ca68&home=2736fab291f04e69b62d490c3c09361f5b82461a');
      
                        
                    break;
              
            }
        }
        else{
            header('location:./?page=7bba1f7724a766bb8cd54a49b2c8c13ec0b4ca68&home=2736fab291f04e69b62d490c3c09361f5b82461a');
        }
      echo '  </div>';
        
       
        
 
        
}




public function handleException(Exception $ex) {
        
        if ($ex instanceof NotFoundException) {
            header('HTTP/1.0 404 Not Found');
            $this->runPage('404');
             echo $ex->getMessage();
        } else {
            
            header('HTTP/1.1 500 Internal Server Error');
            $this->runPage('500');
            echo $ex->getMessage();
        }
    }
    
private function runPage($page) {
          $this->checkPage($page);
            require $this->getPage($page);
      
     
      
    }

private function getPage($page) {
        return self::PAGE_DIR. $page . '.php';
    }
   public function create_pdf($html,$filename,$paper,$orientation,$stream=TRUE){
        $pdf = new DOMPDF();
        $pdf->set_paper($paper,$orientation);
        $pdf->load_html($html);
        $pdf->render();
        $pdf->stream($filename."pdf");
        
    }
public function loadClass($name) {
        $classes = array(
            'Config' => getcwd().'/Config/config.php',
            'Error' => './validation/Error.php',
           
            'NotFoundException' => './exception/NotFoundException.php',
            'notificationCatcher' => './exception/notificationCatcher.php',
         
            
            
            //DAO CLASSES
            'database' => self::DAO.'database.php',
            'userDAO' => self::DAO.'userDAO.php',
            'monitoringplanDAO' => self::DAO.'monitoringplanDAO.php',
            'agencyDAO' => self::DAO.'agencyDAO.php',
            'agencytypeDAO' => self::DAO.'agencytypeDAO.php',
            'categoryDAO' => self::DAO.'categoryDAO.php',
            'fundsrcDAO' => self::DAO.'fundsrcDAO.php',
            'locationDAO' => self::DAO.'locationDAO.php',
            'sectorDAO' => self::DAO.'sectorDAO.php',
            'subsectorDAO' => self::DAO.'subsectorDAO.php',
            'projectDAO' => self::DAO.'projectDAO.php',
            'periodDAO' => self::DAO.'periodDAO.php',
            'authentication' => self::DAO.'authentication.php',
            'duedatesDAO' => self::DAO.'duedatesDAO.php',
            'accomplishmentDAO' => self::DAO.'accomplishmentDAO.php',
            'submissionDAO' => self::DAO.'submissionDAO.php',
            'hitDAO' => self::DAO.'hitDAO.php',
            'acknowledgementDAO' => self::DAO.'acknowledgementDAO.php',
            'typhoonDAO' => self::DAO.'typhoonDAO.php',
          
            
            
            //MODEL CLASSES
            'agency' => './model/agency.php',
            'agencytype' => './model/agencytype.php',
            'fundsrc' => './model/fundsrc.php',
            'fundsrctype' => './model/fundsrctype.php',
            'location' => './model/location.php',
            'projaccomplisment' => './model/projaccomplisment.php',
            'projcategory' => './model/projcategory.php',
            'projects' => './model/projects.php',
            'projsector' => './model/projsector.php',
            'projsubsector' => './model/projsubsector.php',
            'projtargets' => './model/projtargets.php',
            'duedate' => './model/duedate.php',
            'user' => './model/user.php',
            'submission' => './model/submission.php',
            'projaccomplishment' => './model/projaccomplishment.php',
            'typhoon' => './model/typhoon.php',
            'frm7' => './model/frm7.php',
            'frm8' => './model/frm8.php',
            'projexception' => './model/projexception.php'
            
          
           
            
            
        );
        if (!array_key_exists($name, $classes)) {
            die('Class "' . $name . '" not found.');
        }
        require_once $classes[$name];
    }

private function hasScript($page) {
        return file_exists($this->getScript($page));
    }
private function getScript($page) {
        return self::PAGE_DIR . $page . '.php';
    }
public function checkPage($page) {
        if (!preg_match('/^[a-z0-9-]+$/i', $page)) {
            // TODO log attempt, redirect attacker, ...
            throw new NotFoundException('Unsafe page "' . $page . '" requested');
        }
        if (!$this->hasScript($page) && !$this->hasTemplate($page)) {
            // TODO log attempt, redirect attacker, ...
            throw new NotFoundException('Page "' . $page . '" not found');
        }
        return $page;
    }

 
     


}



include_once 'layout/templatefooter.phtml';


?>