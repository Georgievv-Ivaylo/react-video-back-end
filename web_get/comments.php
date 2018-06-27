<?php
$data = [];

if (!empty($_GET['vid'])) {
  $videoCommentsId = $_GET['vid'];
  $data = file_get_contents('../db/video_comments/'. $videoCommentsId .'.json');
}

echo $data;
