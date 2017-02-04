<?php
namespace File;

class Reader
{
    //TODO implements cache of controllers existents, because the verification will find in this json, instead make the search every request
    public function __construct()
    {
        $verifiedFiles = file_get_contents(__DIR__."/../controllersrouters.json");
        $filesAvailable = json_decode($verifiedFiles);
        $now = time();
        $lastupdate = strtotime($filesAvailable->LastUpdate);
        $dayslastUpdate = round(($now - $lastupdate)/ (60 * 60 * 24));
        
        if($dayslastupdate > $GLOBALS["CACHE_TIME"]) {
            array_diff($filesAvailable,$verifiedFiles);
            $files = scandir(__DIR__."/../app/Controller/");
            foreach ($files as $file)
            {
            
            }
        }
    }
}