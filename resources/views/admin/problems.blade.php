@extends('layouts.admin')


@section('plugin')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/github-markdown-css/2.4.0/github-markdown.min.css">

<style>
	.markdown-body {
        box-sizing: border-box;
        min-width: 200px;
        max-width: 980px;
        margin: 0 auto;
        padding: 45px;
    }
</style>

@endsection


@section('content')

<article class="markdown-body">

@markdown
# 用極簡單去思考和實現
用極簡單的方法去做，先實現功能，使用，優化，創新！堅持一點一滴去做。  
**不要心急賺錢，先規劃後實現！**

## 待解決問題
* 主頁總覽
* 系統設定
* 資源整理
* 文字整理
* 介面整理
* 支援中英文語言
* 會員和個人設定在**put & patch function 缺調用 資源浪費**
* Facebook 發佈


## 已解決問題
* 個人設定修改資料及密碼 2016/09/20
* 可以在別的會員改另一會員資料 2016/09/20
* 會員url用簡單的id做識別，做成安全漏洞 2016/09/20
* 會員權限方面可以改比自己更大的權限，自己刪自己，會顯示比自己更高的權限者 2016/09/21
* 訊息的電郵通知 2016/09/21
* 分頁導覽 2016/09/23

## 應用網站

## 目標
* 每日有一百個用戶觸及
* 統一所有後台



@endmarkdown

    


</article>


@endsection