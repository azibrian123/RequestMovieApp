<?php

namespace App\Controllers\Customer;

use App\Controllers\BaseController;
use App\Models\RequestVideoModel;
use App\Models\VideosModel;

class Customers extends BaseController
{

    protected $db;
    protected $videosModel;
    protected $requestVideoModel;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        // $this->builder = $this->db->table('users');
        $this->videosModel = new VideosModel();
        $this->requestVideoModel = new RequestVideoModel();
    }

    // public function index(): string
    // {
    //     // $users = new \Myth\Auth\Models\UserModel();
    //     // $data = [
    //     //     'users' => $users->findAll()
    //     // ];
    //     return view('admin/index');
    // }

    public function allVideos()
    {
        $videos = $this->requestVideoModel->select('videos.id, nama, tahun, deskripsi, sampul, request.id, request.status');
        $videos->join('videos', 'videos.id = request.video_id', 'RIGHT');
        $videos->where('request.video_id', null);

        $data = [
            'title' => 'All Videos',
            'videos' => $videos->asObject()->findAll()
        ];

        return view('/customer/allvideos', $data);
    }

    public function makeRequest($id)
    {
        $video = $this->requestVideoModel->where('request.id', $id);
        $video_id = $video->id;

        if ($video_id == user_id()) {
            $video->save([
                'id' => $video_id,
                'user_id' => user_id(),
                'video_id' => $id,
                'status' => '2',
            ]);
        }

        $video->save([
            'user_id' => user_id(),
            'video_id' => $id,
            'status' => '2',
        ]);

        return redirect()->to('/');
    }


    public function myVideos(): string
    {

        $this->videosModel->select('request.id as requestid, nama, tahun, deskripsi, sampul, status');
        $this->videosModel->join('request', 'request.video_id = videos.id');
        $this->videosModel->where('request.status', 'Approved');
        $this->videosModel->where('request.user_id', user_id());
        $data = [
            'title' => 'Daftar video yang direquest',
            'videos' => $this->videosModel->asObject()->findAll()
        ];

        return view('/customer/myvideos', $data);
    }

    public function myRequestVideos(): string
    {
        $this->videosModel->select('request.id, nama, tahun, deskripsi, sampul, status');
        $this->videosModel->join('request', 'request.video_id = videos.id');
        $this->videosModel->where('request.status', 'Pending');
        $this->videosModel->where('request.user_id', user_id());
        $data = [
            'title' => 'Daftar video yang direquest',
            'videos' => $this->videosModel->asObject()->findAll()
        ];

        return view('/customer/myrequest', $data);
    }

    //     public function save(): string
    //     {
    //         $fileSampul = $this->request->getFile('sampul');

    //         if ($fileSampul->getError() == 4) {
    //             $namaSampul = 'default.png';
    //         } else {
    //             $namaSampul = $fileSampul->getRandomName();

    //             $fileSampul->move('img', $namaSampul);
    //         }
    // $this->cus

    //     }
}
