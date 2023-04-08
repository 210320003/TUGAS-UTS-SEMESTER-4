<?php namespace App\Models;
use CodeIgniter\Model;

class ModelDosen extends Model
{
	/**
	* table name
	*/
	protected $table = "dosen";
	/**
	* allowed field
	*/ 
	protected $allowedFields = [
			'id_dosen',
			'nidn',
            'nama'
	];
	
	public function getDosen()
	{
		return $this->findAll();
	}

	public function getDosenById($id = false)
    {
        if($id === false)
        {
            return $this->findAll();
        }
        else
        {
            return $this->getWhere(['id_dosen' => $id]);
        }   
    }
	public function deleteDosen($id)
    {
        $query = $this->db->table($this->table)->delete(array('id_dosen' => $id));
        return $query;
    }

    public function insertDosen($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
	public function updateDosen($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id_dosen' => $id));
        return $query;
    }
	
	
}
?>