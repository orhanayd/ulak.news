<?php

header ("Content-Type:text/xml");
include('env.php');
if(isset($_GET['cat'])){

///// CACHE BITIS /////
    $page = strip_tags($_GET['cat']);
    switch ($page) {
        case 'gundem':
            $cat = "Gündem";
            break;        
        case 'ekonomi':
            $cat = "Ekonomi";
            break;
        case 'siyaset':
            $cat = "Siyaset";
            break;        
        case 'turkiye':
            $cat = "Türkiye";
            break;
        case 'dunya':
            $cat = "Dünya";
            break;
        case 'guncel':
            $cat = "Güncel";
            break;
        case 'sondakika':
            $cat = "sondakika";
            break;
        default:
            $cat = null;
            break;
    }
    if($cat==null){
        echo "";
        exit();
    }
    $data = file_get_contents($_ENV['local3']."/atom_". urlencode($page).".xml?to=".urlencode($cat));
    echo $data;
}
?>