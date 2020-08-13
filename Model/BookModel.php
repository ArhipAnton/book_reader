<?php

namespace Model;

use Src\AbstractModel;

class BookModel extends AbstractModel
{
    public function getBookData(int $id): array
    {
        return $this->getQueryResult('SELECT `name` , `pages`, `text` FROM `books` WHERE `id`= ' . $id);
    }
}