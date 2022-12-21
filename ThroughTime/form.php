<?php
    include "inc/header.php";
?>
<div class="main_container">
                <h1 class ="titlen">Upload Memory</h1>
<div class ="wrapper">
<form action ="gallery.php" method ="POST" enctype = "multipart/form-data">
    <input type = "hidden" name = "action" value ="loadfile">
    <br>Name on the Server:<input type = "text" name ="testfname" value ="" required><br>
    <br>File: <input type ="file" accept=".jpg,.png"name ="testf" ><br><br>
    <input type ="submit"  value ="Send">
</form> 
<p class ="warn"> Remember to add <b>.png</b> or <b>.jpg</b> at the end of the filename otherwise the image would not be added.</p>
</div>


<?php
    include "inc/footer.php";
?>
