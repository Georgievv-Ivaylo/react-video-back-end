<?php
$data = [];
$data = file_get_contents('../db/videos.json');
if (!empty($_GET['vlid'])) {
  $navigation = json_decode(file_get_contents('../db/navigations.json'), 1);
  $getList = str_replace('/', '', $navigation[$_GET['vlid']]['link']);
  $data = file_get_contents('../db/'. $getList .'.json');
}

echo $data;
