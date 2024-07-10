<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Customers extends BaseController
{

    protected $db, $builder;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
    }

    // public function index(): string
    // {
    //     // $users = new \Myth\Auth\Models\UserModel();
    //     // $data = [
    //     //     'users' => $users->findAll()
    //     // ];
    //     return view('admin/index');
    // }

    public function index(): string
    {
        $users = new \Myth\Auth\Models\UserModel();
        // $data = [
        //     'title' => 'Data Customers',
        //     'users' => $users->findAll()
        // ];

        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->builder->select('users.id as userid, username, email, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');

        $query = $this->builder->get();
        $data = [
            'title' => 'Data Customers',
            'users' => $query->getResult()
        ];

        return view('admin/customers/index', $data);
    }

    public function detail($id): string
    {

        $this->builder->select('users.id as userid, username, email, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id', $id);

        $query = $this->builder->get();
        $data = [
            'title' => 'Customer Detail',
            'user' => $query->getRow()
        ];

        return view('admin/detail', $data);
    }

    public function create(): string
    {
        $data = [
            'title' => 'Form tambah data customer',
        ];

        return view('admin/customers/create', $data);
    }

    public function save()
    {
        $fileSampul = $this->request->getFile('sampul');

        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.png';
        } else {
            $namaSampul = $fileSampul->getRandomName();

            $fileSampul->move('img', $namaSampul);
        }
        // $this->videosModel->save([
        //     'nama' => $this->request->getVar('nama'),
        //     'tahun' => $this->request->getVar('tahun'),
        //     'deskripsi' => $this->request->getVar('deskripsi'),
        //     'sampul' => $namaSampul,
        // ]);

        return redirect()->to('/admin/videos');
    }
}
