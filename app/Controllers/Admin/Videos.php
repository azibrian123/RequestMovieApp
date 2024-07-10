<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\VideosModel;

class Videos extends BaseController
{

    protected $db, $builder;
    protected $videosModel;

    public function __construct()
    {
        $this->videosModel = new VideosModel();
    }

    public function index(): string
    {

        $data = [
            'videos' => $this->videosModel->asObject()->findAll(),
            'title' => 'Data Videos'
        ];
        return view('admin/videos/index', $data);
    }

    public function customers(): string
    {
        // $users = new \Myth\Auth\Models\UserModel();

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

        return view('admin/customers', $data);
    }

    public function detail($id): string
    {
        $data = [
            'video' => $this->videosModel->asObject()->find($id),
            'title' => 'Data Videos'
        ];
        return view('admin/videos/detail', $data);
    }

    public function create(): string
    {
        $data = [
            'title' => 'Form tambah data video',
        ];

        return view('admin/videos/create', $data);
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
        $this->videosModel->save([
            'nama' => $this->request->getVar('nama'),
            'tahun' => $this->request->getVar('tahun'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'sampul' => $namaSampul,
        ]);

        return redirect()->to('/admin/videos');
    }


    public function delete($id)
    {
        $video = $this->videosModel->find($id);

        if ($video['sampul'] != 'default.png') {
            unlink('img/' . $video['sampul']);
        }

        $this->videosModel->delete($id);
        return redirect()->to('/admin/videos');
    }

    public function edit($id): string
    {
        $data = [
            'title' => 'Form ubah data video',
            'video' => $this->videosModel->asObject()->find($id)
        ];

        return view('admin/videos/edit', $data);
    }

    public function update($id)
    {

        $fileSampul = $this->request->getFile('sampul');
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            $namaSampul = $fileSampul->getRandomName();
            $fileSampul->move('img', $namaSampul);
            unlink('img/' . $this->request->getVar('sampulLama'));
        }

        $this->videosModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'tahun' => $this->request->getVar('tahun'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'sampul' => $namaSampul,
        ]);

        return redirect()->to('/admin/videos');
    }
}
