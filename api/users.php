<?php
require_once 'app.php';

use Models\User;

class Users extends Lib\Controller
{
    public function index()
    {
        $users = User::retrieve();
        $this->response->set('users', $users);
    }

    public function login()
    {
        $args = $this->request->args;
        $username = $args['username'];
        $password = $args['password'];
        // TODO: validate and shit

        $user = User::authenticate($username, $password);
        $this->response->set('user', $user);
    }

    public function retrieve()
    {
        $args = $this->request->args;
        $username = isset($args['username']) ? $args['username'] : null;
        // TODO: validate and shit

        $user = User::retrieve($username);
        $this->response->set('user', $user);
    }

    public function create()
    {
        $args = $this->request->args;
        $username = $args['username'];
        $password = $args['password'];
        $address = $args['address'];
        // TODO: validate and shit

        $user = User::create($username, $password, $address);
        $this->response->set('user', $user);
    }
}

$controller = new Users();
$controller->response->display();