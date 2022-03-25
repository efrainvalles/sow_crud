<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class EmailController extends BaseController
{
    public function sendEmail($data, $method){

        $email = \Config\Services::email();
        $email->setFrom('sow@efrainvalles.com', "SoW CRUD");
        $email->setTo('email@efrainvalles.com');

        $email->setSubject('Client '. $method );

        if ($method=="Delete"){
            print_r($data);
            $email->setMessage("This is the data was delete for record " . $data );
$email->send();            
        }else{
        $email->setMessage("This is the data \n".$data['client_firstname']
                            ."\n".$data['client_lastname']."\n".$data['client_email']."\n" );
        $email->send();
        }
    }
    
}
