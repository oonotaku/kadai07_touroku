<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録一覧</title>
    <style>
        .card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 16px;
            margin: 16px;
            display: inline-block;
            width: 200px;
            text-align: center;
        }
        .card img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <h1>登録一覧</h1>
        <nav>
            <a href="touroku.php">登録ページへ</a>
        </nav>
    <div class="cards">
        <?php
        if (($file = fopen("data.csv", "r")) !== false) {
            while (($data = fgetcsv($file)) !== false) {
                list($name, $email, $company, $position, $memo, $photoPath) = $data;
                echo '<div class="card">';
                echo '<a href="detail.php?name=' . urlencode($name) . '">';
                echo '<img src="' . $photoPath . '" alt="' . htmlspecialchars($name) . '">';
                echo '<h3>' . htmlspecialchars($name) . '</h3>';
                echo '</a>';
                echo '</div>';
            }
            fclose($file);
        }
        ?>
    </div>
</body>
</html>
