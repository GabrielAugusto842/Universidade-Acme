<?php

require_once('controllerFacebook.php');


 $Login = $fb->getRedirectLoginHelper();

        $permissions = ['email'];
        try {
            if (isset($_SESSION['facebook_access_token'])) {
                $accessToken = $_SESSION['facebook_access_token'];
            } else {
                $accessToken = $Login->getAccessToken();
            }
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        if (isset($accessToken)) {
            if (isset($_SESSION['facebook_access_token'])) {
                $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
            } else {
                $_SESSION['facebook_access_token'] = (string) $accessToken;
                $oAuth2Client = $fb->getOAuth2Client();
                $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
                $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
                $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
            }
            if (isset($_GET['code'])) {
                header('Location: ./');
            }
            try {
                $profile_request = $fb->get('/me?fields=name,first_name,last_name,email');
                $profile = $profile_request->getGraphNode()->asArray();
            } catch (Facebook\Exceptions\FacebookResponseException $e) {
                echo 'Graph returned an error: ' . $e->getMessage();
                session_destroy();
                header("Location: ./");
                exit;
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                echo 'Facebook SDK returned an error: ' . $e->getMessage();
                exit;
            }
            var_dump($profile);
            $logoff = filter_input(INPUT_GET, 'sair', FILTER_DEFAULT);
            if (isset($logoff) && $logoff == 'true'):
                session_destroy();
                header("Location: ./");
            endif;
            echo '<a href="?sair=true">Sair</a>';
            var_dump($_SESSION);
        }else {
            $loginUrl = $Login->getLoginUrl('http://www.alcateck.tk/acme', $permissions);
            echo '<a href="' . $loginUrl . '">Entrar com facebook</a>';
            echo $accessToken;
            var_dump($_SESSION);
        }


?>