<?php


namespace Model;


use Src\AbstractModel;

class BookAuthorModel extends AbstractModel
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
            $having[] = ' book_name LIKE "%' . $book . '%"';
        }
        if (!empty($author)) {
            $author = $this->makeSafetyString($author);
            $having[] = ' author_name LIKE "%' . $author . '%"';
        }

        if (!empty($having)) {
            $query = $query . ' HAVING' . implode(' AND', $having) . ';';
        }

        return $this->getQueryResult($query);
    }

    private function getListQueryStringBegin()
    {
        return 'SELECT `books`.`id` as id, `books`.`name` as book_name, GROUP_CONCAT(`authors`.`name` SEPARATOR ", ") as author_name 
FROM `books` 
LEFT JOIN `books_authors` ON `books`.`id` = `books_authors`.`book_id` 
LEFT JOIN `authors` ON `authors`.`id` = `books_authors`.`author_id` GROUP BY `books`.`id`';
    }
}