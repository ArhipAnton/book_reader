<?php

namespace Controller;

use Model\BookAuthorModel;
use Src\AbstractController;

class ListController extends AbstractController
{
    public function actionIndex($params = [])
    {
        $list = (new BookAuthorModel())->getListWithAuthor();
        $this->show('list',
            [
                'list' => $list,
                'book' => '',
                'author' => ''
            ]
        );
    }

    public function actionSearch($params = [])
    {
        $book = $params['book'] ?? '';
        $author = $params['author'] ?? '';
        $list = (new BookAuthorModel())->findByBookNameAndAuthorName($book, $author);
        $this->show('list',
            [
                'list' => $list,
                'book' => $book,
                'author' => $author
            ]
        );
    }

}