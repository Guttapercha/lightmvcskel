<?php

require 'TemplateSignin.php';

require 'DataStore.php';



class WebController
{
    protected $errorMes=0;
    protected $userMes="";
    protected $varSession="";
    protected $postLoginForm = true;
    protected $sessionUser = "";


    public function webAction()
    {

        $dataStore = new DataStore();
        $viewManager = new TemplateSignin();
        $dataStore->getData();
        $dataStore->loginVerification();
        $authorizationString = ($dataStore->isAuthorization()) ? 'true' : 'false';

        if($fh = fopen('yes_no.txt','w')) {
            fwrite($fh, $authorizationString, 1024);
            fclose($fh);
        }

        $this->postLoginForm=$dataStore->getPostLoginForm();
        $this->errorMes = $dataStore->getErrorMessage();
        $this->userMes = $dataStore->getUserMessage();

        $message  = $this->postLoginForm;
        echo "<script type='text/javascript'>alert('postlogin form is'.'$message');</script>";

        $viewManager->loadTemplate($this->errorMes, $this->userMes, $this->postLoginForm);
        $viewManager->render();

        setcookie("loggedin", "", 1);
        if (isset($_SESSION['LOGGEDIN']))
        {
            unset($_SESSION['LOGGEDIN']);
        }


    }

}