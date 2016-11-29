<?php

namespace BlogBundle\Entity;


class User
{
    /**
     * @param $id
     * @param $username
     * @param $password
     * @return string
     */
    public function create($id, $username, $password) {
        $file = fopen(sys_get_temp_dir()."/user_$id.txt", "w");
        $hasWrite = fwrite($file, $username."\n".$password);
        if ($hasWrite) {
            $msg = "User number $id has created";
        } else $msg = "User number $id hasn't created";
        return $msg;
    }

    /**
     * @param $id
     * @param $username
     * @param $password
     * @return string
     */
    public function login($id, $username, $password) {
        $file = fopen(sys_get_temp_dir()."/user_$id.txt", "r");
        $file_username = "";
        while (!feof($file)) {
            if ($file_username == "")
                $file_username = fgets($file, 999);
            $file_password = fgets($file, 999);
        }
        if ($username == substr($file_username, 0, strlen($file_username)-1) && $password == $file_password) {
            $msg = "Welcome user $username!";
        } else $msg = "Invalid username or password";
//        $msg = $file_password;
//        $msg = substr($file_username, 0, strlen($file_username)-1);
        return $msg;
    }
}