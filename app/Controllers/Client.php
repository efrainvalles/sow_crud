<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\Client_model;
use App\Controllers\EmailController;
 
class Client extends Controller
{
    public function index()
    {
        $model = new Client_model();
        $data['client']  = $model->getClient()->getResult();
        echo view('client_view', $data);
    }
 
    public function save()
    {

        $validation = \Config\Services::validation();
        $validation->setRules([
            'client_firstname' => 'required|min_length[3]|max_length[100]',
            'client_lastname' => 'required|min_length[3]|max_length[100]',
            'client_email' => 'required|valid_email|min_length[3]|max_length[100]'
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'error' => true,
                'message' => $validation->getErrors()
            ]);   
        } else {

        $model = new Client_model();
        $emailModel = new EmailController();
        $data = array(
            'client_firstname'        => $this->request->getPost('client_firstname'),
            'client_lastname'       => $this->request->getPost('client_lastname'),
            'client_email' => $this->request->getPost('client_email'),
        );
        $model->saveClient($data);
        $emailModel->sendEmail($data,"Add");
        return redirect()->to('/client');
    }
    }
 
    public function update()
    {
        $model = new Client_model();
        $emailModel = new EmailController();
        $id = $this->request->getPost('client_id');
        $data = array(
            'client_firstname'        => $this->request->getPost('client_firstname'),
            'client_lastname'       => $this->request->getPost('client_lastname'),
            'client_email' => $this->request->getPost('client_email'),
        );
        $model->updateClient($data, $id);
        $emailModel->sendEmail($data,"Edit");
        return redirect()->to('/client');
    }
 
    public function delete()
    {
        $model = new Client_model();
        $emailModel = new EmailController();
        $id = $this->request->getPost('client_id');
        $model->deleteClient($id);
        $emailModel->sendEmail($id,"Delete");
        return redirect()->to('/client');
    }
 
}