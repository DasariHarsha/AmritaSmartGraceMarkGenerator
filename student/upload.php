<?php
// Get the list of files in the upload folder
$upload_dir = 'uploads/';
$files = scandir($upload_dir);
// Loop through the files and display them as links
echo "<ul>";
foreach ($files as $file) {
  // Skip the . and .. entries
  if ($file != '.' && $file != '..') {
    // Get the file path and name
    $file_path = $upload_dir . $file;
    $file_name = basename($file);
    // Display the link with the target attribute set to _blank
    echo "<li><a href='$file_path' target='_blank'>$file_name</a></li>";
  }
}
echo "</ul>";
?>