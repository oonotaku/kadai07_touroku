<?php
$name = $_GET['name'] ?? '';

// CSVから該当データを取得
$details = null;
if (($file = fopen("data.csv", "r")) !== false) {
    while (($data = fgetcsv($file)) !== false) {
        if ($data[0] === $name) {
            $details = $data;
            break;
        }
    }
    fclose($file);
}

if ($details) {
    list($name, $email, $company, $position, $memo, $photoPath) = $details;
    ?>
    <!DOCTYPE html>
    <html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo htmlspecialchars($name); ?>の詳細</title>
    </head>
    <body>
        <h1><?php echo htmlspecialchars($name); ?>の詳細</h1>
                <nav>
            <a href="index.php">登録一覧ページへ</a>
        </nav>
        <img src="<?php echo $photoPath; ?>" alt="<?php echo htmlspecialchars($name); ?>" style="width: 200px;">
        <p>Email: <?php echo htmlspecialchars($email); ?></p>
        <p>所属会社: <?php echo htmlspecialchars($company); ?></p>
        <p>役職: <?php echo htmlspecialchars($position); ?></p>
        <p>備考: <?php echo nl2br(htmlspecialchars($memo)); ?></p>
    </body>
    </html>
    <?php
} else {
    echo "該当するデータが見つかりません。";
}
