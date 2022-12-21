<?php
    include "inc/header.php";
?>

            <div class="main_container">
                <h1 class ="titlen">Gallery</h1>
                <?php
function sortname($a,$b){
    if($a['dir'] && !$b['dir'])
        return -1;
    else if(!$a['dir'] && $b['dir'])
        return 1;
    else
        return strcmp($a['fname'],$b['fname']);
}
function getHttpVar($pname ,$def_val ="",$vtype ="string"){
    $val =$def_val;
    if(isset($_POST[$pname]))
        $val = $_POST[$pname];
    else if(isset($_GET[$pname]))
        $val = $_GET[$pname];
    
    if($vtype != "string")
    {
        switch($vtype)
        {
            case "int":
                $val = intval($val);
                break;
            case "float":
                $val = floatval($val);
                break;
        }
    }
    return $val;
}
function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' Bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' Byte';
        }
        else
        {
            $bytes = '0 Bytes';
        }

        return $bytes;
}
$cdir = "Photos/";
$action = getHttpVar("action","");
if($action == "loadfile"){
    $testfname = getHttpVar("testfname","");
    move_uploaded_file($_FILES['testf']['tmp_name'],$cdir.$testfname);
}
$d = opendir($cdir);
$flist =Array();
while($fname = readdir($d))
{
    $flist [] = Array(
        "fname" => $fname,
        "dir"  =>  is_dir($fname),
        "fsize" => formatSizeUnits(filesize($fname)),
        "date"  => filectime($fname),
    );
}
closedir($d);
usort($flist,"sortname");
$dirname = "Photos/";
$images = glob($dirname."*.png");
echo'<div class ="pictures">';
foreach($images as $image) {
    echo '<img class ="frameimg" src="'.$image.'" / padding = 20px>';    
}
echo'</div>';
?>

<?php
    include "inc/footer.php";
?>