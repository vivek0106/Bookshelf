<?
require_once("config.php");
require_once("../connection.php");

if(isset($_GET['code'])){
    $token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['access_token']=$token;
    $oAuth = new Google_Service_Oauth2($gClient);
    $userData = $oAuth->userinfo->get();
    echo  $userdata['given_name'];
    echo $userdata['family_name'];
    echo $userdata['email'];
} 
else{
    header('Location../login.php');
    exit();
}
?>