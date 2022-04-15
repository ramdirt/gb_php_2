<?php

class Autoload
{
    public function loadClass($className)
    {
        $fileName = str_replace('app\\', '../', $className);
        $fileName = str_replace('\\', '/', "{$fileName}.php");
        var_dump($fileName);
        if (file_exists($fileName)) {
            include $fileName;
        }
    }
}