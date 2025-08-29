<?php

include('config.php');

$mysqli = mysqli_init();
mysqli_options($mysqli,MYSQLI_OPT_CONNECT_TIMEOUT,$database['connect_timeout']);
mysqli_options($mysqli,MYSQLI_OPT_READ_TIMEOUT,$database['read_timeout']);
$mysqli = mysqli_connect($database['server'],$database['login'],$database['password'],$database['name']);
if ($mysqli) {
    mysqli_query($mysqli, "Set character set utf8");
    mysqli_query($mysqli, "Set names 'utf8'");
} else {
    header('HTTP/1.1 500 Internal Server Error'); 
    echo 'ERROR';
    exit;
}

// ��������� ��� �������� ������
$sql = <<<SQL
SELECT
code
FROM source
WHERE status>=0 AND id NOT IN (SELECT sourceid FROM session WHERE endtime IS NULL AND sessionstatusid=2)
ORDER BY 1
SQL;

$sqlRes = $mysqli->query($sql);
if (!$sqlRes) {
    header('HTTP/1.1 500 Internal Server Error'); 
    echo 'ERROR';
    exit;
}
while($result = $sqlRes->fetch_assoc()){
}
$sqlRes->close();

$mysqli->close();

echo 'OK';
