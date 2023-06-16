<?php
$lab=$_POST['lab'];
$id=$_POST['id'];
?>
<html>
    <head>
        <link href="editstatus.css" rel="stylesheet">
        <script src="edit.js"></script>
    </head>
    <body>
        <center>
            <div class="box">
             <form action="edit.php" method="POST">
                <h2>COMPUTER STATUS- <?php echo $lab.":".$id;?></h2><br><br>
            <span>DESKTOP:</span>
            <input type="radio" value="no" name="desktop" checked="checked" style="height:15px; width:15px; vertical-align: middle; accent-color: aqua; margin-left:80px;"><label>NO</label>
             <input type="radio" value="yes" name="desktop" style="height:15px; width:15px; vertical-align: middle; accent-color: aqua;"><label>YES</label><br><br>
             <span>CPU:</span>
             <input type="radio" value="no" name="cpu" checked="checked" style="height:15px; width:15px; vertical-align: middle; accent-color: aqua;margin-left:80px;"><label>NO</label>
              <input type="radio" value="yes" name="cpu" style="height:15px; width:15px; vertical-align: middle; accent-color: aqua;"><label>YES</label><br><br>
              <span>MOUSE:</span>
              <input type="radio" value="no" name="mouse" checked="checked" style="height:15px; width:15px; vertical-align: middle; accent-color: aqua;margin-left:80px;"><label>NO</label>
               <input type="radio" value="yes" name="mouse" style="height:15px; width:15px; vertical-align: middle; accent-color: aqua;"><label>YES</label><br><br>
               <span>KEYBOARD:</span>
               <input type="radio" value="no" name="keyboard" checked="checked" style="height:15px; width:15px; vertical-align: middle; accent-color: aqua;margin-left:80px;"><label>NO</label>
                <input type="radio" value="yes" name="keyboard" style="height:15px; width:15px; vertical-align: middle; accent-color: aqua;"><label>YES</label><br><br>
                <input type="hidden" name="lab" value="<?php echo $lab;?>"></input>
                <input type="hidden" name="id" value="<?php echo $id;?>"></input>
                <button type="submit">submit</button>
            </form>
    </div>
        </center>
    </body>
</html>