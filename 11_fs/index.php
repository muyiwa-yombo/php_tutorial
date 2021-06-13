<?php
// Magic constants
echo __DIR__.'<br>';
echo __FILE__.'<br>';
echo __LINE__.'<br>';
// Create directory
// mkdir('test');
// Rename directory
// rename('test','test2');
// Delete directory
// rmdir('test2');
// Read files and folders inside directory
$files= scandir('./');
echo '<pre>'.var_dump($files).'</pre>';
echo file_put_contents('sample.txt',"this is a dummy file".'<br>');

// file_get_contents, file_put_contents
echo file_get_contents('lorem.txt');
// file_get_contents from URL
$url=file_get_contents('https://jsonplaceholder.typicode.com/users');
$users=json_decode($url);
var_dump($users);
// https://www.php.net/manual/en/book.filesystem.php
// file_exists
// is_dir
// filemtime
// filesize
// disk_free_space
// file