<?php
namespace File;

class Reader
{
    //TODO implements cache of controllers existents, because the verification will find in this json, instead make the search every request
    public function __construct()
    {
        $filesAvailable = json_decode(file_get_contents(__DIR__."/../controllersrouters.json"));
        $now = time();
        $dayslastUpdate = round(($now - strtotime($filesAvailable->LastUpdate))/ (60 * 60 * 24));
        
//         if($dayslastupdate > $GLOBALS["CACHE_TIME"]) {
            array_diff($filesAvailable,$verifiedFiles);
            $files = scandir(__DIR__."/../app/Controller/");
            var_dump($files);
            exit;
            foreach ($files as $file)
            {
            
            }
//         }
    }
}