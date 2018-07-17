<?php

namespace Src\Session;

class Session
{
    public function setName($name)
    {
        session_name($name);
    }

    public function getName()
    {
        var_dump($_SESSION);
    }

    public function getId()
    {
        return session_id();
    }

    public function setId($id)
    {
        session_id($id);
    }

    public function cookieExists()
    {
        if (!empty($_COOKIE)) {
            return true;
        } else {
            return false;
        }
    }

    public function sessionExists()
    {
        if (isset($_SESSION['id'])) {
            return true;
        } else {
            return false;
        }
    }

    public function start()
    {
        return session_start();
    }

    public function destroy()
    {
        session_destroy();
    }

    public function setSavePath($path)
    {
        session_save_path($path);
    }

}