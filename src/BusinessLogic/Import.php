<?php

namespace HtmlAcademy\BusinessLogic;

use HtmlAcademy\Exceptions\SourceFileException;
use HtmlAcademy\Exceptions\FileFormatException;
use SplFileInfo;
use SplFileObject;

class Import
{

    public function import(string $filename, array $columns) : array
    {
        if (!$this->validateColumns($columns)) {
            throw new FileFormatException();
        } // проверяем, что правильно указан список столбцов для импорта

        if (!file_exists($filename)) {
            throw new SourceFileException();
        } // проверка существования источника импорта - csv файла

        $fp = new SplFileObject($filename);
        $fp->openFile('r');

//        $fp = fopen($filename, 'r');

        if (!$fp) {
            throw new SourceFileException();
        }

        $header_data = $this->getHeaderData($fp);

        if ($header_data !== $columns) {
            throw new FileFormatException();
        }

        $result = [];
        while ($line = $this->getNextLine($fp)) {
            $result[] = $line;
        }

        return $result;
    }

    private function getHeaderData(SplFileObject $fp)
    {
        $fp->rewind();
        $header_data = $fp->fgetcsv();

        return $header_data;
    }

    private function getNextLine(SplFileObject $fp)
    {
        $result = FALSE;

        $csv_data = $fp->fgetcsv();
        if (!$fp->eof() && $csv_data !== NULL) {
            $result = $csv_data;
        }

        return $result;
    }

    public function validateColumns($columns)
    {
        $result = TRUE;

        if (count($columns)) {
            foreach ($columns as $column) {
                if (!is_string($column)) {
                    $result = FALSE;
                }
            }
        } else {
            $result = FALSE;
        }

        return $result;
    }
}
