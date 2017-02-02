<!DOCTYPE html>
<html>
<header>
    <link rel="stylesheet" type="text/css" href="MyStyle.css">
    <meta charset="UTF-8"> </meta> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $(".inner-div").click(function(){		//my click function, calls when clicking a inner-div 
			
			//var thisId = $(this).attr("id");
            //var div = document.createElement('div');		//This is not working, but could be a good way to get content as it is asked for, might do this when/if I learn AJAX
            //div.innerHTML = '<?php 						//lots of ugly php here
            //    $folder = glob(thisId);
            //    $htmldoc = glob($folder . '/*.html');
            //    echo file_get_contents ($htmlfile[0]);?>';*/
			//$( document.getElementById(thisId) ).after( div );
			
			var tmpId = 9 + $(this).attr("id");
			document.getElementById(tmpId).style.display = "block";
        });
		$(".content-div").click(function(){		//my click function, calls when clicking a content-div 
			
			document.getElementById($(this).attr("id")).style.display = "none";
        });
    })
    </script>
</header>
<body>
<div class="outer-div">

<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$files = array_reverse(glob('*',GLOB_ONLYDIR));    //glob grabs all elements in the folder, _ONLYDIR, it only takes folders, reverse bc we want it descending (highest number = newer date)
foreach ($files as $i)
{
    $fileInDir = glob($i . '/*.*'); //grabs all files
    $txtFile = glob($i . '/*.txt'); //grabs some files
    $picFile = glob($i . '/*.png'); //same
    $htmlfile = glob($i . '/*.html');   //same
	$way = 'out';		//just a default, makes near no diffrence
    ?>
    <div class="inner-div" id = <?php echo $i ?>>
        <?php if (file_get_contents ($htmlfile[0],null,null,null,4) == "http")  //checks if the .html file is a link, yes i know a link in a .html file is wrong, but it works
        {
            ?>
            <a href="<?php echo file_get_contents ($htmlfile[0]);?>">   <!-- makes pic clickable with link to the site -->
                <img id="out" src="<?php echo $picFile[0];?>" class="inner-div" title="Project preview" />   <!-- sets the picture file -->
            </a>
            <?php
        }
        else{
            ?>
            <a href="<?php echo $htmlfile[0];?>">   <!-- makes pic clickable with link to the html file -->
                <img id="in"src="<?php echo $picFile[0];?>" class="inner-div" title="Project preview" />   <!-- sets the picture file -->
            </a>
            <?php
			$way = 'in';
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
	if ($way == 'in'){		//if it is an internal link this loads and hides the content, the click function then shows it.
		?>
			<div class="content-div" style="display:none" id=<?php echo $i + "900000000" //yes this is a really(!) hacky way to do it, but it works for the next 8000 years ?>>  
			<?php echo file_get_contents ($htmlfile[0]);?>
			</div>
		<?php
	}
}
?>
</div>

<!-- why is php so ugly? -->