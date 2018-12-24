<?
include("resize.txt");  //include class
$size=300;
$mode="auto";

$thumb=new thumbnail("shiegege.jpg");    // generate shiegege.jpg

if ($_GET["size"]<50 || $_GET["size"]>500) {   // 50-500 pixels will resize
    echo "resize range 50 pixels - 500 pixels";    exit();
}

if ($_GET["mode"]=="height") {               // mode resize
    $thumb->size_height($_GET["size"]);
} elseif ($_GET["mode"]=="width") {
    $thumb->size_width($_GET["size"]);
} elseif ($_GET["mode"]=="auto" || empty($_GET["mode"])) {
    $thumb->size_auto($_GET["size"]);
}

$thumb->show();                            // show resize

if ($_GET["save"]==1)                        // if save selected
    $thumb->save("shiegege_thumb.jpg");
?> 