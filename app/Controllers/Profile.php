<?php

namespace App\Controllers;

use App\Models\UserModel;

class Profile extends BaseController
{
    public function index()
    {
        echo view('common/header');
        echo view('profile');
    }

    public function updateProfile()
    {

        $userId = session('user')->id;

        $userModel = new UserModel();
        $userData = $userModel->find($userId);

        if (!$userData) {
            return "User not found";
        }


        $newName = $this->request->getPost('name');
        $newEmail = $this->request->getPost('email');
        $newPassword = $this->request->getPost('password');


        $userData->name = $newName;
        $userData->email = $newEmail;


        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $imageName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads', $imageName);
            $userData->image = $imageName;
        }


        if (!empty($newPassword)) {
            $userData->password = password_hash($newPassword, PASSWORD_BCRYPT);
        }


        $userModel->transStart();

        try {

            $userModel->where('id', $userId);


            $success = $userModel->update($userId, [
                'name' => $userData->name,
                'email' => $userData->email,
                'image' => $userData->image,
                'password' => $userData->password,
            ]);


            $userModel->transComplete();

            if ($success) {

                return redirect()->to(base_url('login'))->with('success', 'Profile updated successfully!');
            } else {

                return "Profile update failed. Please try again.";
            }
        } catch (\Exception $e) {

            $userModel->transRollback();

            return "Error: " . $e->getMessage();
        }
    }

}

