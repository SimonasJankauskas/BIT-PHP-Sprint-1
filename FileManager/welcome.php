<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to File Manager!</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
  
<?php
print('<h1>File Manager</h1>');
      $path = "./" . $_GET["path"];
      $files = array_diff(scandir($path), array('..', '.'));
      echo ("<table>
      <thead>   
          <tr><th>Name</th><th>Type</th><th>Action</th>
      </thead>");
      foreach($files as $dir_c) {       
        print("<tr><td>" . "<a href='?path=" . $_GET['path'] . "/" . $dir_c . "'>" . $dir_c . "</a><br></td>");	
        print("<td>" . (is_dir($path . $dir_c) ? "Directory" : "File") . "</td>");     
        print("<td>" . "<a title='Delete book' href='delete.php?del=$dir_c'>Delete</a><br>" . "<a href='download.php?link=$dir_c'> Download </a>" . "</td></tr>");    
        
       
      } 
      print("</tbody>");
      echo ("</table>");
   ?> 
   <!-- Creating Folder -->
   <?php
    if (isset($_POST['foldername'])) {
        if ($_POST['foldername'] != "") {
         $dirCreate = './' . $_GET['path'] . $_POST['foldername'];
            if (!is_dir($dirCreate))
                mkdir($dirCreate, 0777, true);  
                header('location:welcome.php');
        }
    }
    ?>
<h2>Create New Folder</h2>
<form method="post" action="">
<input type="text" name="foldername">
<input type="submit" name="submit" value="Create Folder">
</form><br>
  <!-- Create upload form -->
<form method="POST" action="upload.php" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" value="Upload">
</form><br>

  <!-- Logout button -->
Click here to <a href = "index.php?action=logout"> logout.

</body>
</html>
