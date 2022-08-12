<?php

    //Load encrypted text
    $crypttext = file_get_contents("/home/ubuntu/tutorial-04/encrypted.txt");
    echo "String crypted: $crypttext <br>";
    //Load private Key
    $fp=fopen("/home/ubuntu/tutorial-04/private.pem","r");
    $priv_key=fread($fp,8192);
    fclose($fp);
    $res = openssl_get_privatekey($priv_key, 'tutorial-04');
    $newsource = "";
    //Decrypt
    openssl_private_decrypt($crypttext, $newsource,$res);
    echo "String decrypt : $newsource<br>";
