<?php
    namespace App\Controllers;
    use App\Models\ModelMahasiswa;

    class Mahasiswa extends BaseController
    {
        public function index()
        {
            $Mahasiswas = new ModelMahasiswa();
            $pager = \Config\Services::pager();

            $data = array (
                'mahasiswas' => $Mahasiswas->paginate(10, 'mahasiswa'),
                'pager' => $Mahasiswas->pager
            );

            return view('mahasiswa', $data);
        }
        public function input()
        {
            echo view('mahasiswaInput');
        }

        public function insert()
        {
            $model = new ModelMahasiswa();
            $data = array (
                'nim'  => $this->request->getPost('nim'),
                'nama' => $this->request->getPost('nama'),
                
            );
            $model->insertMahasiswa($data);
            return redirect()->to('/mahasiswa');   
        }
        public function update($id)
        {
            $model = new ModelMahasiswa();   
            $data['mahasiswa'] = $model->getMahasiswaById($id)->getRow();
            echo view('eMahasiswa', $data);
        }

        public function edit()
        {
            $model = new ModelMahasiswa();
            $id = $this->request->getPost('id_mahasiswa');
            $data = array (
                'nim'  => $this->request->getPost('nim'),
                'nama' => $this->request->getPost('nama'),
            );
            $model->updateMahasiswa($data, $id);
            return redirect()->to('/mahasiswa');

        }

        public function delete($id)
        {
            $model = new ModelMahasiswa();
            $model->deleteMahasiswa($id);
            return redirect()->to('/mahasiswa');
        }

      

    }
    

?>