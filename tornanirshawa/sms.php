<?php
if (isset($_POST['name'])){
        $number = $_POST['number'];
        $message = $_POST['message'];
        
        $url = "http://66.45.237.70/api.php";
        $data= array(
        'username'=>"heysaadad",
        'password'=>"63579A4M",
        'number'=>"$number",
        'message'=>"$message"
        );
        
        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);
        $p = explode("|",$smsresult);
        $sendstatus = $p[0];
        
        header("Location: https://bsrs.xyz/nac23.html");
}
?>