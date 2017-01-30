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
foreach ($files as $i)
{
    $fileInDir = glob($i . '/*.*'); //grabs all files
    $txtFile = glob($i . '/*.txt'); //grabs some files
    $picFile = glob($i . '/*.png'); //same
    $htmlfile = glob($i . '/*.html');   //same
    ?>
    <div class="inner-div">
        <?php if (file_get_contents ($htmlfile[0],null,null,null,4) == "http")  //checks if the .html file is a link, yes i know a link in a .html file is wrong, but it works
        {
            ?>
            <a href="<?php echo file_get_contents ($htmlfile[0]);?>">   <!-- makes pic clickable with link to the site -->
                <img src="<?php echo $picFile[0];?>" class="inner-div" title="Project preview" />   <!-- sets the picture file -->
            </a>
            <?php
        }
        else{
            ?>
            <a href="<?php echo $htmlfile[0];?>">   <!-- makes pic clickable with link to the html file -->
                <img src="<?php echo $picFile[0];?>" class="inner-div" title="Project preview" />   <!-- sets the picture file -->
            </a>
            <?php
        }
        ?>
        <h1>
          <?php 
                echo basename($txtFile[0], ".txt"); //sets the h1 to .txt filename
           ?>
        </h1>
        <p> 
            <?php 
                $bla =  file_get_contents ( $txtFile[0] );  //gets the contents to a string
                echo $bla;  //prints that string to the p tag
            ?>
        </p>
    </div>
    <?php
}
?>
</div>

<!-- why is php so ugly? -->