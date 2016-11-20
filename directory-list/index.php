<html>
  <head>
    <title>Directory listing</title>
    <style>
      body {
        background-color: #efefef;
      }

      .ico {
        height: 24px;
        width: 24px;
      }

      .fmod {
        font-style: italic;
      }

      .list {
        padding: 0px;
        list-style: none;
      }

      .list li {
        font-size: 16px;
      }

      .list .lnk {
        color: #000;
        margin: 0 10px;
      }

      .list .elem:nth-child(even) {
        background-color: #f8fbff;
      }
    </style>
  </head>
  <body>
    <?php
    /**
     * Key: modification date
     * Value: file
     */
    $files = array();

    // open parent directory
    if ($handle = opendir('..')) {
      while (false !== ($file = readdir($handle))) {
        if ($file != '.' && $file != '..') {
          $files[filemtime('../'.$file)] = '../'.$file;
        }
      }
      closedir($handle);

      // reverse sort mtimes
      krsort($files);

      echo '<ul class="list">';
      foreach($files as $mtime => $file) {
        $lastModified = date('F d Y, H:i:s', $mtime);

        echo '<li class="elem">';
        if (is_dir($file)) {
          // it's a directory
          echo '<img src="./assets/directory.png" alt="directory" height="42" width="42" class="ico dir-ico"></img>'
            .'<a class="lnk dir-lnk" href="'.rawurlencode($file).'">'
            .strip_tags(basename($file))
            .'/</a>'
            .'<span class="fmod dir-fmod">'.$lastModified.'</span><br/>';

        } else {
          // it's a file
          echo '<img src="./assets/file.png" alt="directory" height="42" width="42" class="ico file-ico"></img>'
            .'<a class="lnk file-lnk" href="'.rawurlencode($file).'">'
            .strip_tags(basename($file))
            .'</a>'
            .'<span class="fmod file-fmod">'.$lastModified.'</span><br/>';
        }
        echo '</li>';
      }
      echo '</ul>';
    }
    ?>

  </body>
</html>
