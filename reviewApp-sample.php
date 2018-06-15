<?php

// 関数の定義
function post_review($a_posts) {
  // 変数の定義
  $post = array();
  echo "ジャンルを入力してください：\n";
  $post['genre'] = trim(fgets(STDIN));
  echo "タイトルを入力してください：\n";
  $post['title'] = trim(fgets(STDIN));
  echo "感想を入力してください：\n";
  $post['review'] = trim(fgets(STDIN));
  $line = "----------------------";

  // レビューへの描画
  echo "ジャンル：{$post['genre']}\n$line\n";
  echo "タイトル：{$post['title']}\n$line\n";
  echo "感想：\n{$post['review']}\n$line\n";

  // 添字配列に追加
  $a_posts[] = $post;

  // $a_postsを関数の呼び出しもとに返す
  return $a_posts;
}

function read_reviews($a_posts) {
  // リストの表示
  $number = 0;
  foreach ($a_posts as $post) {
    echo "{$number}：{$post['title']}のレビュー\n";
    $number = $number + 1;
  }

  echo "見たいレビューの番号を入力してください：";
  $input = intval(trim(fgets(STDIN)));

  // レビューの取得
  $post = $a_posts[$input];

  // レビューの描画
  $line = "----------------------";
  echo "ジャンル：{$post['genre']}\n$line\n";
  echo "タイトル：{$post['title']}\n$line\n";
  echo "感想：\n{$post['review']}\n$line\n";
}

function end_program() {
  exit;
}

function exception() {
  echo "入力された値は無効な値です";
}

$posts = array();      // 添字配列postsの生成

while (true) {
  // メニューの表示
  echo "レビュー数：" . count($posts), PHP_EOL;
  echo "[0]レビューを書く\n";
  echo "[1]レビューを読む\n";
  echo "[2]アプリを終了する\n";
  $input = intval(trim(fgets(STDIN)));

  if ($input === 0) {
    $posts = post_review($posts);  // post_review()関数の呼び出し
  } elseif ($input === 1) {
    read_reviews($posts);  // read_reviews()関数の呼び出し
  } elseif ($input === 2) {
    end_program();  // end_program()関数の呼び出し
  } else {
    exception();  // exception()関数の呼び出し
  }
}

?>
