<?php

namespace App\Controller;

use App\Db\Db;

class MainController
{
    public function index()
    {
        include "app/view/forma.html";
    }

    public function ajax($request)
    {
        $dbh = Db::connect();

        $name = strip_tags(trim($request["name"]));
        $email = strip_tags(trim($request["email"]));

        $result = $dbh->exec("INSERT INTO users (name, email) VALUES ('$name', '$email')");

        if ($result) {
            echo "Ваши данные были успешно записаны";
        } else {
            echo "Записать данные не удалось";
        }
    }
}