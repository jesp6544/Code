<!DOCTYPE html>
<html>
<header>
    <link rel="stylesheet" type="text/css" href="MyStyle.css">
    <meta charset="UTF-8"> </meta>
</header>
<body>
<div class="outer-div">

<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$files = glob('*',GLOB_ONLYDIR);    //glob grabs all elements in the folder, _ONLYDIR, it only takes folders
foreach ($files as $i){
    $fileInDir = glob($i . '/*.*');     //grabs all files
        $txtFile = glob($i . '/*.txt'); //grabs .txt files
        $picFile = glob($i . '/*.png'); //same
        $htmlfile = glob($i . '/*.html');   //same
        ?>
        <div class="inner-div">
            <a href="<?php echo $htmlfile[0];?>">   <!-- makes pic clickable with link to -->
            <img src="<?php echo $picFile[0];?>" class="inner-div" title="Project preview" /> 
            </a>
            <h1><?php echo basename($txtFile[0], ".txt")?></h1>
            <p> 
            <?php 
            $bla =  file_get_contents ( $txtFile[0] );
            echo $bla;
               ?></p>
        </div>
        <?php
        
}
?>
</div>