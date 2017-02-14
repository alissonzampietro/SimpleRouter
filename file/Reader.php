<?php

namespace File;

class Reader
{
    private $fileClasses = array();

    //TODO implements cache of controllers existents, because the verification will find in this json, instead make the search every request
    public function __construct($path)
    {
    	$files = scandir($path);
    	if($files === FALSE)
    		throw new \Exception("Directory of classes not found");
    	$fileNoExtension = array();
    	$files = array_slice($files, 2);
    	foreach ($files as $file)
    	{
    		array_push($this->fileClasses, explode(".", $file)[0]);
    	}
    }
    
    public function getFileClasses()
    {
    	return $this->fileClasses;
    }
}