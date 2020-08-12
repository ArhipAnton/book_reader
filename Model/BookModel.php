<?php

namespace Model;

use Src\AbstractModel;

class BookModel extends AbstractModel
{
    public function getListWIthAuthor(): array
    {
        return $this->getQueryResult($this->getListQueryStringBegin());
    }

    public function findByBookNameAndAuthorName(string $book, string $author): array
    {
        $query = $this->getListQueryStringBegin();

        if (!empty($book)) {
            $book = $this->makeSafetyString($book);
            $where[] = ' `books`.`name` LIKE "%' . $book . '%"';
        }
        if (!empty($author)) {
            $author = $this->makeSafetyString($author);
            $where[] = ' `authors`.`name` LIKE "%' . $author . '%"';
        }

        if (!empty($where)) {
            $query = $query . ' WHERE' . implode(' AND', $where) . ';';
        }

        return $this->getQueryResult($query);
    }

    public function getBookData(int $id): array
    {
        return $this->getQueryResult('SELECT `name` , `text` FROM `books` WHERE `id`= ' . $id);
    }

    private function getListQueryStringBegin()
    {
        return 'SELECT `books`.`id` as id, `books`.`name` as book_name, `authors`.`name` as author_name 
FROM `books` LEFT JOIN `authors` ON `books`.`id` = `authors`.`book_id`';
    }
}