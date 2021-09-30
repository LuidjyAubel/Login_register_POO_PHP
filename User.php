<?php
Class User{
    private $_mail;
    private $_password;
    private $_role;

    public function get_password()
    {
        return $this->_password;
    }

    public function set_password($_password)
    {
        $this->_password = password_hash($_password, PASSWORD_DEFAULT);

        return $this;
    }

    public function get_mail()
    {
        return $this->_mail;
    }

    public function set_mail($_mail)
    {
        $this->_mail = $_mail;

        return $this;
    }

    public function get_role()
    {
        return $this->_role;
    }

    public function set_role($_role)
    {
        $this->_role = $_role;

        return $this;
    }
}
