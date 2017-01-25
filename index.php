<!DOCTYPE html>
<html>
<header>
    <link rel="stylesheet" type="text/css" href="MyStyle.css">
    <meta charset="UTF-8"> </meta>
</header>
<body>
<div class="outer-div">

<?php 
$files = glob('*',GLOB_ONLYDIR);    //glob grabs all elements in the folder, _ONLYDIR, it only takes folders
foreach ($files as $i){
    $fileInDir = glob($i . '/*.png');   //grabs all .png's
    foreach ($fileInDir as $temp){
        ?>
        <div class="inner-div">
            <img src="<?php echo $temp;?>" class="inner-div" title="Project preview" /> 
            <h1><?php echo basename($temp, '.png')?></h1>
            <p>An ‘extremely credible source’ has called my office and told me that Barack Obama’s placeholder text is a fraud. You have so many different things placeholder text has to be able to do, and I don't believe Lorem Ipsum has the stamina.</p>  
            <!-- Thx, Trump ipsum: http://trumpipsum.net -->
        </div>
        <?php
    }
}
?>
</div>