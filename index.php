<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <!-- タイトル -->
    <title>経費申請</title>
</head>
<body>
    <!-- ヘッダー -->
    <header>
        <h1>経費申請</h1>
    </header>
    <!-- メイン  -->
    <main>
        <form class="row g-3 was-validated" action="write.php" method="post">
            <!-- 日付テキストボックス -->
            <div class="col-md-3" id="">
                <label for="expense_day" class="form-label">日付</label>
                <input type="date" class="form-control" id="expense_day" name="expense_day" required>
                <div class="invalid-feedback">入力してください</div>
            </div>
            <!-- 名前テキストボックス -->
            <div class="col-md-3" id="">
                <label for="price_number" class="form-label">名前</label>
                <input type="txt" class="form-control" id="name" name="name" required>
                <div class="invalid-feedback">入力してください</div>
            </div>
            <!-- 経費種別プルダウン -->
            <div class="col-md-3">
                <label for="expense_type" class="form-label">経費種別</label>
                <select id="expense_type" class="form-select" name="expense_type" required>
                    <option selected disabled value="">-- 選択してください --</option>
                    <option value="1">交通費</option>
                    <option value="2">通信費</option>
                    <option value="3">雑費</option>
                </select>
                <div class="invalid-feedback">選択してください</div>
            </div>
            <!-- 金額テキストボックス -->
            <div class="col-md-3" id="">
                <label for="price_number" class="form-label">金額</label>
                <input type="number" class="form-control" id="price_number" name="price_number" required>
                <div class="invalid-feedback">入力してください</div>
            </div>
            <!-- ボタン -->
            <div class="col-12">
                <button type="submit" class="btn btn-primary" id="application_btn">申請</button>
                <!-- <button class="btn btn-info" onclick="location.href='./index.php'">一覧表示</button> -->
            </div>
            <!-- 一覧表示 -->
            <table class="table">
                <thead class="table-primary">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">日付</th>
                    <th scope="col">名前</th>
                    <th scope="col">経費種別</th>
                    <th scope="col">金額</th>
                  </tr>
                </thead>
                <tbody id="expense_table">
                <?php
                    $filename = "./data.txt";
                    $fp = fopen($filename, "r");
                    $num = 1;
                    $total = 0;
                    while (($line = fgets($fp))) {
                        $data = explode(",", $line);
                        echo "<tr>";
                        // 番号
                        echo "<th scope='row'>". $num ."</th>";
                        // 日付
                        echo "<td>" . $data[0] . "</td>";
                        // 名前
                        echo "<td>" . $data[1] . "</td>";
                        // 経費種別
                        if ($data[2] == "1") {
                            echo "<td>交通費</td>";
                        } elseif ($data[2] == "2") {
                            echo "<td>通信費</td>";
                        } elseif ($data[2] == "3") {
                            echo "<td>雑費</td>";
                        }
                        // 金額
                        echo "<td>" . $data[3] . "円</td>";
                        echo "</tr>";
                        // 番号カウントアップ
                        $num++;
                        // 合計金額算出
                        $total += (int)$data[3];
                    }
                    // 合計金額
                    echo "<tr style='background-color: lightgray'>";
                    echo "<th scope='row'></th>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td>". $total ." 円</td>";
                    fclose($fp);
                ?>
                </tbody>
            </table>
        </form>
    </main>
    <!-- フッター -->
    <footer></footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>