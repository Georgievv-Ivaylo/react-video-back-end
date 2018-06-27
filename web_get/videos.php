<?php
$data = [];
$data = file_get_contents('../db/video_list/0.json');

if (!empty($_GET['vlid'])) {
  $pages = json_decode(file_get_contents('../db/navigations.json'), 1);
  $videoListId = $_GET['vlid']+0;
  if (!empty($pages[$videoListId])) $data = file_get_contents('../db/video_list/'. $videoListId .'.json');
}

echo $data;
