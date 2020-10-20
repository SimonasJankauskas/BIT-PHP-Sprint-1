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
    <?php
  $folder_name = $_POST['createfolder'];
  if (!file_exists($output_dir . $folder_name))
{
@mkdir($output_dir . $folder_name, 0777);        
}
  ?>
  
  <!-- Create folder form -->
    <form action="welcome.php" method="post" onsubmit="setTimeout(function () { window.location.reload(); }, 10)" >
    <h2>
        Create New Folder
    </h2>
    <input name="createfolder" type="text">
    <input id="create_btn" type="submit" value="Create Folder">    
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
