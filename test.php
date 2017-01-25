    <?php
    //Path to folder which contains images
    //$dirname = "img/";
     
    //Use glob function to get the files
    //Note that we have used " * " inside this function. If you want to get only JPEG or PNG use
    //below line and commnent $images variable currently in use
    //$images = glob($dirname."*");
    $file = file_get_contents('./Udennavn.RTF', true);
     echo '<p>$file</p>'
    //Display image using foreach loop
    //foreach($images as $image){
    	
    //print the image to browser with anchor tag (Use if you want really :) )
    //echo '<a href="'.$image.'" target="_blank"><img src="'.$image.'" height="100" width="100" /></a>';
    //}
