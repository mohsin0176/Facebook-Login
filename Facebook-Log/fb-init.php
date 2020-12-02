<?php

session_start();
require './vendor/autoload.php';

$fb=new Facebook\Facebook([
'app_id'=>'',
'app_secret'=>'',
'default_graph_version'=>''
]);

$helper=$fb->getRedirectLoginHelper();
$login_url=$helper->getLoginUrl("http://localhost/Web-Design-Tutorial/Facebook-Log");

try
{
$accessToken=$helper->getAccessToken();
if (isset($accessToken)) 
{
$_SESSION['access_token']=(string)$accessToken;
header("Location:index.php");
}
}

catch(Exception $exc)
{
echo $exc->getTraceAsstring();
}




if ($_SESSION['access_token']) 
{
try
{
$fb->setDefaultAccessToken($_SESSION['access_token']);
$res=$fb->get('/me?locale=en_US&fields=name,email');
$user=$res->getGraphUser();
echo 'Hello!'.$user->getField('name');	
}
catch(Exception $exc)
{
echo $exc->getTraceAsstring(); 
}
}


?>