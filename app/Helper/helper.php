<?php

function getAssetUrl($filename, $folder=''){
    if(str_starts_with($filename,'http')){
        return $filename;
    }else{
        return asset($folder.'/'.$filename);
    }
}
