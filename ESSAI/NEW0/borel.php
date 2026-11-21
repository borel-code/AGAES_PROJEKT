<?php 
    // 1- constante à ne pas modifier 
      $user = 'hermannfotso0@gmail.com';
      $password = 'nexah2022';
      $url = 'https://smsvas.com/bulk/public/index.php/api/v1/sendsms';

    // 2 - variable à remplir à completer: senderid, sms, mobiles
    $senderid ="BBP";
    $mobiles = '237674494384';
    $sms = 'Merci de nous faire confiance';


    $sms_body = array(
        'user' => $user,
        'password' => $password,
        'senderid' => $senderid,
        'sms' => $sms,
        'mobiles' => $mobiles
    );

    $send_data = http_build_query($sms_body);
    $gateway_url = $url . "?" . $send_data;

    $back ="";

            $output = curl_error($ch);
            $back = "erreur_sms";
            $back = curl_error($ch);
        }
        else{
            var_dump($output);
        }
        curl_close($ch);
    }

    catch (Exception $exception){
        echo $exception->getMessage();
    }

    
?>