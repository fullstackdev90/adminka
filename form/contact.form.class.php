<?php

class RegistrationForm
{
    private $email;
    private $username;
    private $contact;


    /**
     * @param array $data
     */
    function __construct(Array $data)
    {
        $this->email = isset($data['email']) ? $data['email'] : null;
        $this->username = isset($data['username']) ? $data['username'] : null;
        $this->contact = isset($data['contact']) ? $data['contact'] : null;

    }

    public function validate()
    {
        return !empty($this->email) && !empty($this->username) && !empty($this->contact);
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }
    /**
     * @return mixed
     */
    //public function getContact()
    //{
     //   return $this->Contact;
   // }

    /**
     * @param mixed $username
     */
    //public function setContact($contact)
    //{
       // $this->Contact = $Contact;
    //}
}