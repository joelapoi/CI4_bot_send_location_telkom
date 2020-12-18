<?php

namespace App\Controllers;

use App\Models\UsersModel;
use Config\Validation;

class Users extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UsersModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_users') ? $this->request->getVar('page_users') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $user = $this->userModel->search($keyword);
        } else {
            $user = $this->userModel;
        }

        $data = [
            'title' => 'Daftar Users',
            // 'user'  => $this->userModel->findAll()
            'user'  => $user->paginate(10, 'tb_datauser'),
            'pager'  => $this->userModel->pager,
            'currentPage'   => $currentPage
        ];


        return view('users/index', $data);
    }

    public function edit($id_user)
    {
        $data = [
            'title'         => 'Form Edit User',
            'validation'    => \Config\Services::validation(),
            'users'         => $this->userModel->getUser($id_user)
        ];
        return view('users/edit', $data);
    }

    public function update($id_user)
    {
        $this->userModel->save([
            'id_user'        => $id_user,
            'akses'     => $this->request->getVar('akses')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/users');
    }

    public function delete($id_user)
    {
        $this->userModel->delete($id_user);
        session()->setFlashdata('pesan', 'Data Berhasil dihapus.');
        return redirect()->to('/users');
    }
    //--------------------------------------------------------------------

}
