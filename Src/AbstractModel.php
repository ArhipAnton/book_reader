<?php


namespace Src;


abstract class AbstractModel
{
    private $link;

    public function __construct()
    {
        $config = require __DIR__ . '/settings/db.php';
        $link = mysqli_connect(
            $config['host'],
            $config['user'],
            $config['password'],
            $config['dbname'],
            $config['port'],
        );
        if (!$link) {
            die('Data Base Error');
        }
        $this->link = $link;
    }

    protected function makeSafetyString(string $string): string
    {
        if (empty($this->link)) {
            die('Data Base Error');
        }
        return mysqli_real_escape_string($this->link, $string);
    }


    protected function getQueryResult(string $query): array
    {
        if ($answer = mysqli_query($this->link, $query)) {
            while ($row = mysqli_fetch_array($answer)) {
                $data[] = $row;
            }
        }
        mysqli_close($this->link);
        unset($this->link);
        return $data ?? [];
    }
}