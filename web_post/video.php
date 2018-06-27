<?php
$data = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = json_decode(file_get_contents('php://input'), true);
  $updateData = [];
  $videoListId = 0;
  $pages = [];

  if (!empty($data['vlid'])) $pages = json_decode(file_get_contents('../db/navigations.json'), 1);
  if (!empty($pages[$data['vlid']])) $videoListId = $data['vlid'];

  $updateData = json_decode(file_get_contents('../db/video_list/'. $videoListId .'.json'), 1);
  $updateData[] = $data;

  file_put_contents('../db/video_list/'. $videoListId .'.json', json_encode($updateData));
}

echo json_encode($data);
