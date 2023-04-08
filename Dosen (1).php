<?php
    namespace App\Controllers;
    use App\Models\ModelDosen;

    class Dosen extends BaseController
    {
        public function index()
        {
            $Dosens = new ModelDosen();
            $pager = \Config\Services::pager();

            $data = array (
                'dosens' => $Dosens->paginate(10, 'dosen'),
                'pager' => $Dosens->pager
            );

            return view('dosen', $data);
        }
        public function input()
        {
            echo view('dosenInput');
        }

        public function insert()
        {
            $model = new ModelDosen();
            $data = array (
                'nidn'  => $this->request->getPost('nidn'),
                'nama' => $this->request->getPost('nama'),
                
            );
            $model->insertDosen($data);
            return redirect()->to('/dosen');   
        }
        public function update($id)
        {
            $model = new ModelDosen();   
            $data['dosen'] = $model->getDosenById($id)->getRow();
            echo view('eDosen', $data);
        }

        public function edit()
        {
            $model = new ModelDosen();
            $id = $this->request->getPost('id_dosen');
            $data = array (
                'nidn'  => $this->request->getPost('nidn'),
                'nama' => $this->request->getPost('nama'),
            );
            $model->updateDosen($data, $id);
            return redirect()->to('/dosen');

        }

        public function delete($id)
        {
            $model = new ModelDosen();
            $model->deleteDosen($id);
            return redirect()->to('/dosen');
        }

 

    }
    

?>