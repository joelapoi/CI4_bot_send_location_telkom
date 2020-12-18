<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table      = 'tb_datauser';
    protected $primaryKey = 'id_user';
    protected $useTimestamps = false;
    protected $allowedFields = ['akses'];

    public function getUser($id_user = false)
    {
        if ($id_user == false) {
            return $this->findAll();
        }

        return $this->where(['id_user' => $id_user])->first();
    }

    public function search($keyword)
    {
        $builder = $this->table('tb_datauser');
        $builder->like('nama', $keyword)->orLike('id_user', $keyword);
        return $builder;
    }
}
