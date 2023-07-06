<?php

		namespace App\Controllers;

		use App\Models\userModel;

		class AuthController extends BaseController
		{
		    protected $user;

		    function __construct()
		    {
		        helper('form');
		        $this->user = new userModel();
		    }

		    public function login()
{
    if ($this->request->getPost()) {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $dataUser = $this->user->where(['username' => $username, 'is_aktif' => true])->first();

        if ($dataUser) {
            if (md5($password) == $dataUser['password']) {
                session()->set([
                    'username' => $dataUser['username'],
                    'role' => $dataUser['role'],
                    'isLoggedIn' => true
                ]);

                return redirect()->to(base_url('/'));
            } else {
                session()->setFlashdata('failed', 'Username & Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('failed', 'Username Tidak Ditemukan');
            return redirect()->back();
        }
    } else {
        return view('login_view');
    }
}

		    public function logout()
		    {
		        session()->destroy();
		        return redirect()->to('login');
		    }

			public function register()
			{
				// Check if the form is submitted
				if ($this->request->getPost() === 'post') {
					// Validate form inputs
					$rules = [
						'username' => 'required|is_unique[user.username]',
						'role' => 'required',
						'password' => 'required|min_length[6]',
						// Add more validation rules as needed
					];

					if (!$this->validate($rules)) {
						// If validation fails, redirect back to the registration form with validation errors
						return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
					}

					// If validation passes, create a new user record
					$userModel = new UserModel();

					$data = [
						'username' => $this->request->getPost('username'),
						'role' => $this->request->getPost('role'),
						'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
						'is_aktif' => true,
						// Add more fields as needed
					];

					$userModel->add($data);

					// Retrieve the registered user's data
					$dataUser = $userModel->where('username', $data['username'])->first();

					// Set the user data in session
					session()->set([
						'username' => $dataUser['username'],
						'role' => $dataUser['role'],
						'isLoggedIn' => true
					]);

					// Redirect to the home page or any desired page after successful registration
					return redirect()->to('/')->with('success', 'Registration successful. Welcome to the site!');
				}

				// If the form is not submitted, load the registration view
				return view('register_view');
			}
	}
?>			