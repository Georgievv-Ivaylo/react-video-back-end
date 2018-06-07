<?php
$data = [];
$data['header'] = [];
$data['header'] = json_decode(file_get_contents('../db/navigations.json'), 1);

echo json_encode($data);
