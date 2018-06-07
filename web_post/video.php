<?php
$data = ['asd' => 'qwe'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = json_decode(file_get_contents('php://input'), true);
  // print_r($data);
  // $data = $_POST;
  $updateData = [];
  $videoList = 'videos';
  if (!empty($data['vlid'])) $navigation = json_decode(file_get_contents('../db/navigations.json'), 1);
  if (!empty($navigation[$data['vlid']])) $videoList = str_replace('/', '', $navigation[$data['vlid']]['link']);
  $updateData = json_decode(file_get_contents('../db/'. $videoList .'.json'), 1);
  $updateData[] = $data;
  file_put_contents('../db/'. $videoList .'.json', json_encode($updateData));
}

echo json_encode($data);
