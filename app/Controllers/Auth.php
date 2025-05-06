<?php

namespace App\Controllers;

use App\Models\UserModel;

/**
 * Class Auth
 * Controlador para gestionar la autenticación de usuarios.
 */
class Auth extends BaseController
{
    /**
     * Muestra el formulario de login y procesa el inicio de sesión.
     *
     * @return string|\CodeIgniter\HTTP\RedirectResponse
     */
    public function login()
    {
        helper(['form']);

        if ($this->request->getMethod() === 'post') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $userModel = new UserModel();
            $user = $userModel->where('username', $username)->first();

            if ($user && password_verify($password, $user['password'])) {
                $session = session();
                $session->set([
                    'user_id'  => $user['id'],
                    'username' => $user['username'],
                    'is_admin' => $user['is_admin'],
                    'logged_in' => true
                ]);

                log_message('debug', 'Usuario encontrado: ' . print_r($user, true));

                return redirect()->to('/')->with('message', 'Inicio de sesión correcto');
            } else {
                log_message('debug', 'No se encuentra el usuario');

                return redirect()->to('/login')->with('error', 'Usuario o contraseña incorrectos');
            }
        }

        return view('auth/login', [
            'title' => 'Login',
            'titulo' => 'Iniciar Sesión',
        ]);
    }

    /**
     * Cierra la sesión del usuario.
     *
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('message', 'Has cerrado sesión correctamente');
    }
}
