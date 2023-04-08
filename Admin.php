<?php
    namespace App\Controllers;
    use App\Models\ModelAdmin;

    class Admin extends BaseController
    {
        public function index()
        {
            $Admins = new ModelAdmin();
            $pager = \Config\Services::pager();

            $data = array (
                'admins' => $Admins->paginate(10, 'admin'),
                'pager' => $Admins->pager
            );

            return view('admin', $data);
        }

        public function delete($id)
        {
            $model = new ModelAdmin();
            $model->deleteAdmin($id);
            return redirect()->to('/admin');
        }

        public function input()
        {
            echo view('adminInput');
        }

        public function insert()
        {
            $model = new ModelAdmin();
            $data = array (
                'nama' => $this->request->getPost('nama'),
                
            );
            $model->insertAdmin($data);
            return redirect()->to('/admin');   
        }
        public function update($id)
        {
            $model = new ModelAdmin();   
            $data['admin'] = $model->getAdminById($id)->getRow();
            echo view('eAdmin', $data);
        }

        public function edit()
        {
            $model = new ModelAdmin();
            $id = $this->request->getPost('id_admin');
            $data = array (
            
                'nama' => $this->request->getPost('nama'),
            );
            $model->updateAdmin($data, $id);
            return redirect()->to('/admin');

        }


    }
    

?>