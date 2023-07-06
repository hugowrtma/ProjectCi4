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

    // Controller: KelolaUser.php

public function edit($userId)
{
    // Load the necessary model
    $userModel = new UserModel();

    // Get the user data from the database
    $user = $userModel->find($userId);

    // Pass the user data to the view for editing
    return view('edit_user', ['user' => $user]);
}

    public function update($userId)
    {
        // Load the necessary model
        $userModel = new UserModel();

        // Get the updated data from the form submission
        $updatedData = [
            'username' => $this->request->getPost('username'),
            'role' => $this->request->getPost('role'),
            // Add other fields as needed
        ];

        // Update the user data in the database
        $userModel->update($userId, $updatedData);

        // Redirect to the user management page or perform any other necessary action
        return redirect()->to('/kelola-user')->with('success', 'User updated successfully.');
    }

    public function delete($userId)
    {
        // Load the necessary model
        $userModel = new UserModel();

        // Delete the user from the database
        $userModel->delete($userId);

        // Redirect to the user management page or perform any other necessary action
        return redirect()->to('/kelola-user')->with('success', 'User deleted successfully.');
    }

    public function deactivate($userId)
    {
        // Load the necessary model
        $userModel = new UserModel();

        // Update the user's is_aktif status to false
        $userModel->update($userId, ['is_aktif' => false]);

        // Redirect to the user management page or perform any other necessary action
        return redirect()->to('/kelola-user')->with('success', 'User deactivated successfully.');
    }

    public function activate($userId)
    {
        // Load the necessary model
        $userModel = new UserModel();

        // Update the user's is_aktif status to true
        $userModel->update($userId, ['is_aktif' => true]);

        // Redirect to the user management page or perform any other necessary action
        return redirect()->to('/kelola-user')->with('success', 'User activated successfully.');
    }

}