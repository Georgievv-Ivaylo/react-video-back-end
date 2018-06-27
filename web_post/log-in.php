<?php
$data = [];
$data['errorMsg'] = 'Unvalid username and/or password!';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $dataPostRaw = json_decode(file_get_contents('php://input'), true);
  $dataPost = cleanData($dataPostRaw);
  if (strlen($dataPost['username']) >= 5 && strlen($dataPost['password']) >= 5) {
    $users = json_decode(file_get_contents('../db/users/members.json'), 1);
    foreach ($users as $user) {
      if ($user['username'] === $dataPost['username'] && $user['password'] === $dataPost['password']) {
        $data['errorMsg'] = '';
        $data['successMsg'] = 'Welcome back '. $user['fullName'] .'!';
        $data['userData'] = [
          'id' => $user['id'],
          'fullName' => $user['fullName'],
          'avatar' => $user['avatar'],
          'username' => $user['username'],
        ];
        break;
      }
    }
  }
}

function cleanData($useData) {
  $cleanData = [];
  foreach ($useData as $dataK => $dataV) {
    $cleanData[$dataK] = htmlspecialchars($dataV);
  }
  return $cleanData;
}

echo json_encode($data);
