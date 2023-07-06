<?php

namespace App\Controllers;

use App\Models\UserModel;

class KelolaUserController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'users' => $this->userModel->findAll()
        ];

        return view('pages/kelola-user', $data);
    }

    public function edit($id)
    {
        // Code for editing a user
    }

    public function delete($id)
    {
        // Code for deleting a user
    }
}
