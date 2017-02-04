<?php

namespace FileManager;

class FileReader {
    public function __construct()
    {
        var_dump(scandir(__DIR__));
        exit;
    }
}