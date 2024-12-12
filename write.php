<?php
// フォームから送信されたデータを取得
$name = $_POST['name'];
$email = $_POST['email'];
$company = $_POST['company'];
$position = $_POST['position'];
$memo = $_POST['memo'];
$photoPath = '';

// 画像がアップロードされている場合の処理
if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['photo']['tmp_name'];
    $fileNameCmps = explode(".", $_FILES['photo']['name']);
    $fileExtension = strtolower(end($fileNameCmps));
    $newFileName = md5(time() . $_FILES['photo']['name']) . '.' . $fileExtension;
    $uploadFileDir = './uploaded_photos/';
    $dest_path = $uploadFileDir . $newFileName;

    if (move_uploaded_file($fileTmpPath, $dest_path)) {
        $photoPath = $dest_path;
    }
}

// データをCSVに保存
$data = [$name, $email, $company, $position, $memo, $photoPath];
$file = fopen('data.csv', 'a');
fputcsv($file, $data);
fclose($file);

echo "登録が完了しました！";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
                    <nav>
            <a href="index.php">登録一覧ページへ</a>
        </nav>
</body>
</html>
