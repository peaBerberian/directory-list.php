<html>
  <head>
    <title>Directory listing</title>
  </head>
  <body>
    <?php
    /**
     * Key: modification date
     * Value: file
     */
    $files = array();

    // open current directory
    if ($handle = opendir('.')) {
      while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {
          $files[filemtime($file)] = $file;
        }
      }
      closedir($handle);

      // reverse sort mtimes
      krsort($files);

      foreach($files as $mtime => $file) {
        $lastModified = date('F d Y, H:i:s', $mtime);

        if (is_dir($file)) {
          // it's a directory
          echo "<span class=\"dir-ind\"> DIR &gt;</span> "
            ."<a className=\"lnk dir-lnk\" href=\"".rawurlencode($file)."/\">"
            .strip_tags(basename($file))
            ."/</a> "
            ."<span class=\"fmod dir-fmod\">".$lastModified."</span><br/>";

        } else {
          // it's a file
          echo "<a className=\"lnk file-lnk\" href=\"" .rawurlencode($file)."\">"
            .strip_tags(basename($file))
            ."</a> "
            ."<span class=\"fmod file-fmod\">".$lastModified."</span><br/>";
        }
      }
    }
    ?>

  </body>
</html>
