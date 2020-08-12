<?php

namespace Controller;

use Model\BookModel;
use Src\AbstractController;

class ReadController extends AbstractController
{
    public function actionIndex($params = [])
    {
        $id = (int)$params['id'];
        if (!$id) {
            die('This book does not exist!');
        }
        $book = (new BookModel())->getBookData((int)$id);
        if (empty($book[0])) {
            die('This book does not exist!');
        }
        $this->show('read',
            [
                'text' => $book[0]['text'],
                'name' => $book[0]['name'],
            ]
        );
    }
}