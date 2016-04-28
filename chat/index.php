<?php
/**
 * Copyright 2009-2015 Remigijus Kiminas
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */


session_start();
 //echo $_SERVER['REQUEST_URI'];
// echo $_SERVER['QUERY_STRING'];
//echo 'Dirname($_SERVER[PHP_SELF]: ' . dirname($_SERVER['PHP_SELF']) . '<br>';
$readonly = 'readOnly';
 
if(strpos($_SERVER['QUERY_STRING'],"="))
{
  //  $print['query'] = '';
 $print =  parse_url(  $_SERVER['QUERY_STRING'] , $component = -1 );

 if(isset($print['query']))
 {
 //echo "<br>";
  $query = $print['query'];
 $res = explode("act",$query);

 $url = explode("?index.php",$_SERVER['REQUEST_URI']);
 define("MAIN_URL", $url[0]);
 $_SESSION['main_url'] = $url[0];
         $session =  $res[1];
 $rootsession = ltrim($session,"=");
$rootsession = base64_decode($rootsession);
$rootsession = explode("chatuser",$rootsession);
$_SESSION['chatme'] = $rootsession[1];
$_SESSION['chatme'];
define("CHATME",$rootsession[1]);
$_SESSION['chatme'];
unset($_SESSION['main_url']);

 //$_SESSION['chatuser'] = $rootsession[1];
 
 //define("",$rootsession);
 }


}
else{

     $c_link = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];     
     $c_link_exp = explode("index.php",$c_link);
     
     if(isset($c_link_exp[1])=="/site_admin/user/login")
     {
        $readonly = '';
        
     }
     else{
        $readonly = 'readOnly';
     }

    $actual_link = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $get_link = explode("index.php",$actual_link);
    $get_links =  $get_link[0];
    $new_link = explode("/lhc_web", $get_links);
    $admin_link =  $new_link[0];
     $_SESSION['main_url'] = $admin_link;
     unset($_SESSION['chatme']);
   // strtolower($get_links)
    
     
    

      
  
}
 
@ini_set('error_reporting', 0);
@ini_set('display_errors', 0);
@ini_set('session.gc_maxlifetime', 200000);
@ini_set('session.cookie_lifetime', 2000000);
@ini_set('session.cookie_httponly',1);

require_once "lib/core/lhcore/password.php";
require_once "ezcomponents/Base/src/base.php"; // dependent on installation method, see below

ezcBase::addClassRepository( './','./lib/autoloads');

spl_autoload_register(array('ezcBase','autoload'), true, false);

erLhcoreClassSystem::init();

// your code here
ezcBaseInit::setCallback(
 'ezcInitDatabaseInstance',
 'erLhcoreClassLazyDatabaseConfiguration'
);

$Result = erLhcoreClassModule::moduleInit();

$tpl = erLhcoreClassTemplate::getInstance('pagelayouts/main.php');
$tpl->set('Result',$Result);
if (isset($Result['pagelayout']))
{
	$tpl->setFile('pagelayouts/'.$Result['pagelayout'].'.php');
}

echo $tpl->fetch();

flush();
session_write_close();

if ( function_exists('fastcgi_finish_request') ) {
    fastcgi_finish_request();
};

erLhcoreClassChatEventDispatcher::getInstance()->executeFinishRequest();
?>
<style>
    #side-menu li:nth-child(n+3) {
      display:none !important;
   }
   .navbar-inline{
      display:none !important; 
   }
   .sortable-column-dashboard{ display: none !important; }
   .pb10 > ul.nav.nav-pills > li {
    display: none;
}
/*   .nav-pills > li{
       display:none !important; 
   }
   .nav-pills > li:first-child{
   display: block;*/
}

</style>
<script src="jquery.js" type="text/javascript" ></script>
<script type="text/javascript">
  <?php if(isset($_SESSION['chatme'])){   ?>

    
var frm = $("#form-start-chat");
frm.attr({'name':"myForm"});
    document.myForm['Username'].value = "<?php echo $_SESSION['chatme']; ?>";
   
    document.myForm['Username'].readOnly = true;
    <?php }else{  ?>
        <?php if($readonly=="readOnly"){ ?>
            var frm = $("#form-start-chat");
frm.attr({'name':"myForm"});
    document.myForm['Username'].value = "<?php echo $_SESSION['chatme']; ?>";
   
    document.myForm['Username'].readOnly = true;
    document.myForm['StartChatAction'].style.display = "none";
    

    

        <?php } ?>
    <?php } ?>
</script>
