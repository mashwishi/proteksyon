<?php

//Health Center
if($user_uuid == '0x926a09cc9dec481113888511b69c60f5'){
   
}
//Barangay
if($user_uuid == '0x833a5adfaa7b527480b2e02db7333e8d'){
   
}



//Health Center
if($user_uuid != '0x926a09cc9dec481113888511b69c60f5'){
    header("Location: /admin/403");
}
//Barangay
if($user_uuid != '0x833a5adfaa7b527480b2e02db7333e8d'){
    header("Location: /admin/403");
}
//Super Admin
else{}
?>