# directory-list.php

## Overview

Quick PHP hack to list directories and files from the directory it's in (by descending modification date).
It is secure (url and filename should be stripped, filtered the '.' and '..' directories).

![screenshot](./assets/screenshot.png)



## Installation

To make it work, you first need a HTTP server with PHP.

Then, just put the ``directory-list`` directory in the server directory you want to share
(it has to be accessible via HTTP).

The `index.php` from this new directory will then all make it work.

### Example

Let's say you want to share a directory in your server, having the path: `/some/path/www/to_share`.

You will need to copy the ``directory-list`` directory from this repository to `/some/path/www/to_share/`.
You will thus have a new directory, `/some/path/www/to_share/directory-list`.

You can then profit from this script by going to the URL directly pointing to the `index.php` of this created directory. 

You also can also easily modify the PHP file to take files from elsewhere in your server.



## TODO

The CSS could be improved, might do it in the future.



## Notes

The directory icon is a work from David Cross, from [Webhosting Media](http://webhostingmedia.net/), recuperated via [iconfinder.com](https://www.iconfinder.com/).
