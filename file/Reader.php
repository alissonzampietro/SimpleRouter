<?php
namespace File;

class Reader
{
    private static $CACHE_TIME = 5;

    //TODO implements cache of controllers existents, because the verification will find in this json, instead make the search every request
    public function __construct()
    {
        $verifiedFiles = file_get_contents(__DIR__."/../controllersrouters.json");
        $filesAvailable = json_decode($verifiedFiles);
        
        $now = time();
        $lastupdate = strtotime($filesAvailable->LastUpdate);
        $dayslastUpdate = round(($now - $lastupdate)/ (60 * 60 * 24));
        
        //if($dayslastupdate > self::$CACHE_TIME) {
            
            $files = scandir(__DIR__."/../app/Controller/");
            $fileNoExtension = array();
            $files = array_slice($files, 2);
            foreach ($files as $file)
            {
                array_push($fileNoExtension, explode(".", $file)[0]);
            }
            $newItems = array_diff($fileNoExtension, $filesAvailable->Controllers);
            foreach ($newItems as $newItem)
            {
                array_push($filesAvailable->Controllers, $newItem);
            }
            $filesAvailable->LastUpdate = date('Y-m-d');
            $filesAvailable = json_encode($filesAvailable);
            file_put_contents(__DIR__."/../controllersrouters.json", $filesAvailable);
            
        //}
    }
}