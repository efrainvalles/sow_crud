<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Client_model extends Model
{
      
    public function getClient()
    {
        $builder = $this->db->table('client');
        $builder->select('*');
        return $builder->get();
    }
 
    public function saveClient($data){
        $query = $this->db->table('client')->insert($data);
        return $query;
    }
 
    public function updateClient($data, $id)
    {
        $query = $this->db->table('client')->update($data, array('client_id' => $id));
        return $query;
    }
 
    public function deleteClient($id)
    {
        $query = $this->db->table('client')->delete(array('client_id' => $id));
        return $query;
    } 
 
   
}