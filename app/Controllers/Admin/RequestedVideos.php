<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RequestVideoModel;
use App\Models\VideosModel;

class RequestedVideos extends BaseController
{
    protected $videosModel, $requestVideoModel;

    public function __construct()
    {
        $this->videosModel = new VideosModel();
        $this->requestVideoModel = new RequestVideoModel();
    }

    public function index(): string
    {
        $this->videosModel->select('request.id as requestid, nama, tahun, deskripsi, sampul, status');
        $this->videosModel->join('request', 'request.video_id = videos.id');
        $this->videosModel->where('status', 'pending');

        $data = [
            'title' => 'Daftar semua request video',
            'videos' => $this->videosModel->asObject()->findAll()
        ];

        return view('admin/requestedvideos/index', $data);
    }

    public function detail($id): string
    {
        $this->videosModel->select('videos.id, nama, tahun, deskripsi, sampul, username, fullname, request.id as requestid, request.status');
        $this->videosModel->join('request', 'request.video_id = videos.id');
        $this->videosModel->join('users', 'users.id = request.user_id');
        $this->videosModel->where('request.id', $id);

        $data = [
            'title' => 'Detail request video',
            'video' => $this->videosModel->asObject()->first()
        ];

        return view('admin/requestedvideos/detail', $data);
    }


    public function approve($id)
    {
        $updated_at = $this->requestVideoModel->find($id);

        $waktu = $this->request->getVar('waktu');

        $expiredHitung = strtotime($updated_at['updated_at']) + ($waktu * 60 * 60);

        $expired = date('Y-m-d h:m:s', $expiredHitung);

        $this->requestVideoModel->save([
            'id' => $id,
            'status' => 'Approved',
            'waktu' => $waktu,
            'expired' => $expired
        ]);

        return redirect()->to('/admin/requestvideos');
    }
}
