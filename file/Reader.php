<?php

namespace File;

class Reader
{
	// Quantidades de dias para o próximo caching
    private static $CACHE_TIME = 2;
    
    private $controllersCached;

    //TODO implements cache of controllers existents, because the verification will find in this json, instead make the search every request
    public function __construct()
    {
    	$this->controllersCached = json_decode(file_get_contents(__DIR__."/../controllersrouters.json"));
        $this->updateCache();
    }
    
    public function updateCache()
    {
    	
    	$controllersCached = $this->verifiedFiles;
    	$now = time();
    	$dayslastUpdate = round(($now - strtotime($this->controllersCached->LastUpdate))/ (60 * 60 * 24));
    	
    	if($dayslastupdate > self::$CACHE_TIME) {
    	
    		$files = scandir(__DIR__."/../app/Controller/");
    		$fileNoExtension = array();
    		$files = array_slice($files, 2);
    		foreach ($files as $file)
    		{
    			array_push($fileNoExtension, explode(".", $file)[0]);
    		}
    	
    		$newItems = array_diff($fileNoExtension, $this->controllersCached->Controllers);
    		foreach ($newItems as $newItem)
    		{
    			array_push($this->controllersCached->Controllers, $newItem);
    		}
    		$this->controllersCached->LastUpdate = date('Y-m-d');
    		$this->controllersCached = json_encode($this->controllersCached);
    		file_put_contents(__DIR__."/../controllersrouters.json", $this->controllersCached);
    	
    	}
    }
    
    public function getCachedControllers()
    {
    	return $this->controllersCached->Controllers;
    }
}