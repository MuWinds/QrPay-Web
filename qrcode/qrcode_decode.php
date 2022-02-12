<?php
$url = $_GET['url'];
      $json_string = file_get_contents("https://cli.im/Api/Browser/deqr?data=$url");
            $data = json_decode($json_string, true);
           echo  $data['data']['RawData'];
 