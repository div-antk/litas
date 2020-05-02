# Litas

![Litas](https://github.com/div-antk/litas/blob/master/public/img/logo_bg.png "Litas")

![php](https://img.shields.io/badge/-Php-777BB4.svg?logo=php&style=plastic "php")
![laravel](https://img.shields.io/badge/-Laravel-E74430.svg?logo=laravel&style=plastic "laravel")
![bootstrap](https://img.shields.io/badge/-Bootstrap-563D7C.svg?logo=bootstrap&style=plastic "bootstrap")
![vue](https://img.shields.io/badge/-Vue.js-4FC08D.svg?logo=vue.js&style=plastic "vue")
![docker](https://img.shields.io/badge/-Docker-1488C6.svg?logo=docker&style=plastic "docker")
![postgres](https://img.shields.io/badge/-Postgresql-336791.svg?logo=postgresql&style=plastic "postgres")
![heroku](https://img.shields.io/badge/-Heroku-430098.svg?logo=heroku&style=plastic "heroku")
![google](https://img.shields.io/badge/-Google-4285F4.svg?logo=google&style=plastic "google")

## 概要

<http://litas.herokuapp.com/>

自分のリストをつくって公開することができます。  
今日やること、毎日がんばっていること、行きたいカフェ、または好きな映画……。リストを作ったらカードを追加してリストを完成させましょう。  
誰かのユニークなリストにいいねを送ることもできます！

## 作成期間

- 2020/04/02 Laravel学習開始
- 2020/04/19 本リポジトリ作成
- 2020/05/02 各機能実装完了後、デプロイ
- バージョンアップを継続

## 仕様

- macOS Mojava 10.14.5
- PHP 7.1.23
- Laravel Framework 6.18.6
- Bootstrap 4
- Vue.js 2.6.11
- Postgresql
- Docker
- Heroku
- Google API

## おもな機能

### ユーザー

- ユーザー登録、ログイン、ログアウト
- ユーザーは同じ名前で登録できない
- Googleアカウントのメールアドレスを利用したユーザー登録、ログイン
<!-- - メールによるパスワードの再設定 -->

### リスト

- 作成、リスト名とタグの編集、削除
- タグはハッシュタグ風に表示され、3つまで付加することができる
- タグの入力時、すでに存在しているタグはフォームに自動補完される
- タグをクリックすることで、同じタグの付けられたリストを一覧で表示する
- いいね機能。一般的な仕様と同じ。自分のリストにもいいねできる
- 自分の作っていないリストは作成者名が表示される

### カード

- 作成、編集、削除
- 詳細コメントは無しでも投稿することができる
- カードをクリックすることで自分に書いた詳細を見ることができる

### レスポンシブデザイン

- スマホサイズになると、リストが1列表示に変化する
- スマホサイズになると、右上の『リストをつくる』がアイコンに変わる

### ロゴ

- 自身でデザインしてIllustratorで作成
- ナビバー、ユーザー登録、ログイン画面、本ページに実装
- faviconにもデザインしたアイコンを実装

## 今後実装したいこと

- いいねの通知
- Twitterアカウントでのログイン
- カードを並び替えすることができる
- フォロー機能

ドラッグドロップにてカードを並び替える機能を考えています。まだ学習していない内容ですが、現状では正直使いにくいため必ず実装したいと考えています。

フォロー機能は敢えて実装予定がありませんでしたが、ユーザーが増えるに従って目的の人のリストを探しにくくなることを考えると実装もすべきかもしれないと考えています。

## 変更履歴

### ver.1

- 一通りの機能を実装完了し、デプロイが完了
