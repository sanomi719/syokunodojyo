# RAMEN TOTAL SOLUTIONS Corporate（WordPressテーマ）

## 導入
1. `rts-corporate.zip` を「外観 > テーマ > 新規追加 > テーマのアップロード」からアップロード（またはFTPで `rts-corporate` フォルダを `wp-content/themes/` に置く）→ 有効化
2. 固定ページを作成：「トップ」（本文は空でOK）、「最新情報」（スラッグ `news`・本文は空）、「お問い合わせ」（スラッグ `contact`）、「プライバシーポリシー」（スラッグ `privacy-policy`）
3. 設定 > 表示設定 で「ホームページの表示」を **固定ページ** にし、ホームページ＝トップ、投稿ページ＝最新情報 を指定
4. 投稿 > カテゴリー で `school` / `labo` / `build` / `global` のスラッグのカテゴリーを作成（最新情報のラベル色に使用）

## ファイル構成
```
rts-corporate/
├─ style.css            テーマ情報（WordPressの必須ファイル）
├─ functions.php        CSS/JS読み込み・メニュー登録・電話番号やURLの設定
├─ screenshot.png       管理画面のテーマ一覧に出るサムネイル
├─ header.php           ヘッダー（PCナビ・スマホメニュー）
├─ footer.php           お問い合わせCTA・フッター
├─ front-page.php       トップページ（各セクションを読み込み）
├─ home.php             最新情報一覧（投稿ページ）
├─ archive.php          カテゴリー別などの一覧
├─ single.php           最新情報の詳細
├─ page.php             固定ページ（お問い合わせ・プライバシーポリシー等）
├─ 404.php              ページが見つからない時
├─ index.php            フォールバック（WordPressの必須ファイル）
├─ template-parts/
│   ├─ section-hero.php / section-about.php / section-business.php / section-cycle.php
│   ├─ section-experience.php / section-philosophy.php / section-news.php
│   ├─ section-representative.php / section-company.php   トップの各セクション
│   ├─ content-news-card.php   最新情報カード1件分
│   └─ content-news-list.php   最新情報の一覧＋ページ送り
└─ assets/
    ├─ css/main.css     すべてのスタイル（スマホ用の調整も含む）
    ├─ js/main.js       スマホメニュー・フェードイン・サイクル図の拡大
    └─ images/          画像一式
```

## 画像の差し替え
すべて `assets/images/` にあります。**同じファイル名で上書き**すれば差し替え完了です。
テンプレート内にも `<!-- 【画像差し替え】… -->` のコメントを入れています。

| ファイル | 場所 | 推奨サイズ |
|---|---|---|
| logo.png | ヘッダー・フッターのロゴ（透過PNG。SVGにする場合はheader.php/footer.phpの拡張子を変更） | 54×54で表示（108×108以上推奨） |
| hero.png | ヒーロー背景（上に暗めのグラデーションが掛かります） | 2880×1960 |
| about.png | ABOUT US | 1200×1360 |
| business-school.png / business-labo.png / business-build.png / business-global.png | 4つの事業 01〜04 | 1400×840 |
| cycle_pc.png / cycle_sp.png | BUSINESS CYCLE の図（PC用 / スマホ用・767px以下） | 1280×943 / 2560×1886 |
| origin-01.png / origin-02.png | ORIGIN / PHILOSOPHY の2枚 | 900×1120 / 520×820 |
| news-01〜04.png | 最新情報（投稿が0件の時のダミー、またはアイキャッチ未設定時の代替） | 600×520 |
| representative.png | 代表写真 | 1000×1380 |

## 編集箇所
- **電話番号・住所・各専門サイトURL・お問い合わせURL**：`functions.php` の `rts_config()`
- **最新情報**：通常の「投稿」の最新4件を表示。カテゴリのスラッグを `school` / `labo` / `build` / `global` にするとラベル色がデザイン通りになります。アイキャッチ画像が一覧のサムネイルになります。
- **メニュー**：外観 > メニュー で「グローバルナビ」「フッター：SITE NAVIGATION」「フッター：OUR BUSINESSES」を設定すると差し替わります（未設定時はデザイン通りのリンクを表示）。
- **会社概要の未確定項目**（設立・資本金・事業拠点）：`template-parts/section-company.php`
- **各セクション**：`template-parts/section-*.php`、スタイルは `assets/css/main.css`

## カラー
| 変数 | 色 | 主な用途 |
|---|---|---|
| --c-cream | #f4efe6 | ABOUT枠・理念セクション背景（淡い版を事業/会社概要背景に使用） |
| --c-gold | #AF860A | 英字ラベル・ライン・LABOタグ |
| --c-ink | #191817 | 代表メッセージ背景・ヘッダー・BUILDタグ |
| --c-red | #A21D2C | ボタン・見出しアクセント・CTA背景・SCHOOLタグ |
| --c-green | #314A45 | GLOBALタグ |
| --c-black | #171716 | 本文テキスト |
| --c-navy | #0D2024 | フッター背景 |

## フォント
Google Fonts：Noto Serif JP / Noto Sans JP / Cormorant Garamond / Inter（デザインPDFからフォント名を特定できなかったため近いものを選定）
