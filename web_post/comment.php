<?php
$data = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = json_decode(file_get_contents('php://input'), true);
  $updateData = [];
  $videoId = 0;
  $pages = [];

  // if (!empty($data['videoId'])) $pages = json_decode(file_get_contents('../db/navigations.json'), 1);
  // if (!empty($pages[$data['videoId']])) $videoListId = $data['videoId'];

  $videoId = $data['videoId'];

  $comments = '';
  $comments = file_get_contents('../db/video_comments/'. $videoId .'.json');
  $updateData = '';
  if (!empty($comments)) $updateData = json_decode($comments, 1);
  if ($data['type'] == 'comment') {
    $updateData[$data['type']][$data['videoId']][] = $data;
  } elseif ($data['type'] == 'reply') {
    $updateData[$data['type']][$data['videoId']][$data['parent']][] = $data;
  }

  file_put_contents('../db/video_comments/'. $videoId .'.json', json_encode($updateData));
}

echo json_encode($data);
