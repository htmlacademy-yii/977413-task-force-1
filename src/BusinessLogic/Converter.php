<?php

namespace HtmlAcademy\BusinessLogic;

use HtmlAcademy\Exceptions\SourceFileException;
use HtmlAcademy\Exceptions\FileFormatException;
use HtmlAcademy\BusinessLogic\Import;
use HtmlAcademy\Exceptions\ValidateDataException;
use SplFileInfo;
use SplFileObject;

class Converter
{
    /**
     * @var \HtmlAcademy\BusinessLogic\Import
     */
    private $importService;

    public function __construct(Import $import_service)
    {
        $this->importService = $import_service;
    }

    public function doConvertion(array $data_info)
    {
        if (!$this->validateData($data_info)) {
            throw new ValidateDataException();
        }

        foreach ($data_info as $key => $inf) {
            $imported_data = $this->importService->import($inf['csv'], $inf['fields']);

            $this->generateSqlFile($imported_data, $inf, $key);
        }

        return 'Convertion was done successfully';
    }

    public function generateSqlFile($imported_data, $inf, $key)
    {
        $sql = '';
        foreach ($imported_data as $data) {
            if (count($data) === count($inf['fields'])) {
                $sql = $sql .'INSERT INTO ' . $inf['table'] . ' (' . implode(',', $inf['fields']) . ' ) VALUES (\'' . implode('\',\'', $data) . '\');';
            }
        }

        $file = 'sql/' . $key . '_' . $inf['table'] . '.sql';

        $new_file = new SplFileObject($file, "w");

        return $new_file->fwrite($sql);
    }
// написать толковую валидацию для входящих данных
    public function validateData($data)
    {
        if (!is_array($data)) {
            return FALSE;
        }
        foreach ($data as $dt) {
            $csv = $dt['csv'];

            if (!isset($csv) || empty($csv) || !is_string($csv)) {
                return FALSE;
            }

            $file_info = new SplFileInfo($csv);
            $data_format = $file_info->getExtension();
            if($data_format !== 'csv') {
                return FALSE;
            }
        }
        return TRUE;
    }
}
