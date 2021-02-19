# 励まし掲示板
![](画像のURL)

## URL
## 概要
* 弱音、不安な気持ち、孤独感をテーマに書き込みするサイトです。

* ネガティブな発言に対して誰かが励ます。そして、気持ちが少し軽くなる。励まされた分誰かを励ます。
そんなポジティブな場所を作りたくて制作いたしました。
## 機能一覧
* メッセージ投稿
* 投稿一覧表示
* コメント投稿(メンション機能付き)
* 投稿削除
* ページネーション
## 使用技術・開発環境
* HTML/CSS
* Bootstrap 5
* PHP 7.3.24
* ClearDB MySQL 5.5.62
* Heroku
* VScode
# 工夫した所
* バリデーションにかからず正常に投稿できた時に、トップページにリダイレクトされ表示させる。
* コメント機能に、メンション機能を付与し、コメント投稿欄に相手のIDを表示させる処理。
* コメントのバリデーション機能を考えた時に、予めIDが表示される仕様になっているので、IDの表示だけで投稿可能な状態でした。iconv関数などを使用し一定の条件に満たない場合エラーメッセージを表示させると言う処理を追加いたしました。
# 特に苦労した点
* timezoneの設定で、日本時間に上手く表示させることができませんでした。ネットで調べると、phpファイルや、使用しているPaaSの設定の変更、プログラムでデフォルトで時間を設定する方法があり試しても中々解決出来ずにいました。最終的には、質問サイトをヒントに、関連するものから考え解決することができました。
## インフラ構成図
画像を使う
## ER図
## テスト
## 制作理由
ネットの新聞記事で孤独死をテーマにした記事を読んだ事がきっかけで今回の制作にいたりました。その中の原因に、様々な理由から誰にも相談出来ずにいたのではないかという事が分かりました。私自身、離職してから一人でいる事が多くなり相談する人はいたものの強がってしまい、相談せずにいた時があり、ひと事とは思えませんでした。自分にできる事は何かないかと思いつつも、その難しい問題に対しての答えは見つかりませんでした。それでも何か力になりたくて、考え続けた結果、原因の一つである「様々な理由から誰にも相談できない」から派生して考え、先ずは自分の気持ちを発言する場所が必要だと思いました。
他のSNSではなく、弱音、不安な気持ち、孤独感をテーマにした場所を作る事で発言する敷居を下げられるのではないかと考え、この掲示板を制作する事にいたしました。
## 今後追加したい機能
* コメント内容を、プルダウンで表示させる
* 削除する際に、ポップアップを表示させて削除できるようする
* コメントで励ました人にポイントを付与し、ランキング機能を付けて一覧で表示する。(例　「沢山の人を励ました優しい人ランキング」のようなもの)
