<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;

class UsersControl extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function singin()
    {
        return view('singin');
    }

    public function loginSubmit()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'username' => 'required',
            'password' => 'required|min_length[6]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return view('login', [
                'validation' => $validation
            ]);
        }

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $usersModel = new UsersModel();
        $user = $usersModel->where('username', md5($username))->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                // Los datos coinciden
                $response['user'] = [
                    'status' => 'success',
                    'message' => 'Datos correctos',
                    'user' => [
                        'id' => $user['id'],
                        'username' => $username
                    ]
                ];
                // Abre encriptador de texto
                return view('encrypter', $response);
            } else {
                // Contraseña incorrecta
                $this->$_SESSION->setFlashdata('error', 'Contraseña incorrecta');
                return redirect()->back()->withInput();
            }
        } else {
            // Usuario no encontrado
            $this->$_SESSION->setFlashdata('error', 'Usuario no encontrado');
            return redirect()->back()->withInput();
        }
    }

    public function singinSubmit()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'username' => 'required',
            'password' => 'required|min_length[6]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return view('singin', [
                'validation' => $validation
            ]);
        }

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $usersModel = new UsersModel();
        $user = $usersModel->where('username', md5($username))->first();

        if (!$user) {
            // Usuario disponible
            $usersModel->save([
                'username' => md5($username),
                'password' => password_hash($password, PASSWORD_BCRYPT),
                'active' => 1
            ]);

            $response = [
                'status' => 'success',
                'message' => 'Registrado correctamente',
            ];

            return $this->response->setJSON($response);
        } else {
            // Usuario existente
            $response = [
                'status' => 'error',
                'message' => 'Usuario ya registrado',
            ];
            return $this->response->setJSON($response);
        }
    }
}
