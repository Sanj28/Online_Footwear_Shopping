<?php 

function upload_image($image,$tmp_image,$folder)
{
    $filetype=pathinfo($image,PATHINFO_EXTENSION);
    $new_image="IMG_".rand().".".$filetype;
    $destination=$folder.$new_image;
    move_uploaded_file($tmp_image,$destination);
    return $new_image;
}

?>