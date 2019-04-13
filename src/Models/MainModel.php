<?php


namespace Models;


class MainModel
{
    public function getUsers()
    {
        $users = [
            ["first_name" => "Andrii", "last_name" => "But"],
            ["first_name" => "John", "last_name" => "Smith"],
        ];

        return json_encode($users);
    }
}