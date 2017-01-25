<!DOCTYPE html>
<html>
<header>
    <link rel="stylesheet" type="text/css" href="bla.css">
    <meta charset="UTF-8">
</header>
<body>
<div class="outer-div">

<?php 
//echo '<p>Hello World</p>';
$files = glob('*',GLOB_ONLYDIR);
foreach ($files as $i){
    $fileInDir = glob($i . '/*.png');
    foreach ($fileInDir as $temp){
        //echo $i , ' has: ', $temp; //,"<br />"
        //echo $tem //bla
        ?>
        <div class="inner-div">
            <img src="<?php echo $temp;?>" width="400" height="200" title="Logo of a company" alt="Logo of a company" /> 
            <h1>An ‘extremely credible source’ has called my office and told me that Barack Obama’s placeholder text is a fraud. You have so many different things placeholder text has to be able to do, and I don't believe Lorem Ipsum has the stamina.</h1>
        </div>
        <?php
    }
}
?>
</div>