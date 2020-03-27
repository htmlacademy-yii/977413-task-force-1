<?php

namespace HtmlAcademy\BusinessLogic;

use HtmlAcademy\Exceptions\SourceFileException;
use HtmlAcademy\Exceptions\FileFormatException;

class Import
{
    private $filename; // имя файла
    private $columns; // заголовки датасета
    private $fp; // для открытия файла для чтения
    private $table_name; // для открытия файла для чтения

    private $result = []; // результат
    private $error = null; // ошыбки

    public function __construct(string $filename, array $columns, string $table_name)
    {
        $this->filename = $filename;
        $this->columns = $columns;
        $this->table_name = $table_name;
    }

    public function import() // основной метод, отвечающий за запуск импорта
    {
        if (!$this->validateColumns($this->columns)) {
            throw new FileFormatException("Заданы неверные заголовки столбцов");
        } // проверяем, что правильно указан список столбцов для импорта

        if (!file_exists($this->filename)) {
            echo $this->filename;
            throw new SourceFileException("Файл не существует");
        } // проверка существования источника импорта - csv файла

        $this->fp = fopen($this->filename, 'r');

        if (!$this->fp) {
            throw new SourceFileException("Не удалось открыть файл на чтение");
        }

        $header_data = $this->getHeaderData();

        if ($header_data !== $this->columns) {
            throw new FileFormatException("Исходный файл не содержит необходимых столбцов");
        }

        while ($line = $this->getNextLine()) {
            $this->result[] = $line;
        }
    }

    public function getData()
    {
        return $this->result;
    }

    private function generateSqlInsert(array $values)
    {
        return 'INSERT INTO ' . $this->table_name . ' (' . implode(',', $this->columns) . ' ) VALUES (\'' . implode('\',\'', $values) . '\');';
    }

    private function generateFullSql()
    {
        $sql = '';
        foreach ($this->result as $values) {
            $sql = $sql . $this->generateSqlInsert($values);
        }

        return $sql;
    }

    public function generateSqlFile()
    {
        $file = 'sql/' . $this->table_name . '.sql';
        $data = $this->generateFullSql();
        file_put_contents($file, $data);
    }

    private function getHeaderData()
    {
        rewind($this->fp);
        $data = fgetcsv($this->fp);

        return $data;
    }

    private function getNextLine()
    {
        $result = false;

        if (!feof($this->fp)) {
            $result = fgetcsv($this->fp);
        }

        return $result;
    }

    private function validateColumns($columns)
    {
        $result = true;

        if (count($columns)) {
            foreach ($columns as $column) {
                if (!is_string($column)) {
                    $result = false;
                }
            }
        } else {
            $result = false;
        }

        return $result;
    }
}
