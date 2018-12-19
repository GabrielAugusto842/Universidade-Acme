<?php

    session_start();
    require_once('API/Facebook/autoload.php');

    $fb = new Facebook\Facebook([
      'app_id' => '488271355027358',
      'app_secret' => 'c62aed6c4a2120e3b24fccaf887d1b4f',
      'default_graph_version' => 'v2.2',
      ]);


?>