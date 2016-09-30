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

## 網站結構
1. ###[首頁(總覽)](/)
```
	## 顯示今日的各情況；

	1. 文章的情況(最新文章，文章數量)
	2. 會員的情況(總會員人數，新會員，舊會員)
	3. 留言的情況(最新留言數量)
	4. 瀏覽量(工作量，總人數，瀏覽量)
```

2. ###[文章](/posts)
```
	## 分頁式顯示；每頁12篇;按創建日期近至遠排。

	* 基本結構：
		1. 標題
		2. 內容
		3. 圖片
	* 基本功能：
		1. 新增
		2. 修改
		3. 刪除
```
3. ###[會員](/members)
```
	## 分頁式顯示；每頁12篇;按創建日期近至遠排。
	## 需要加用戶位置導覽
	
	* 基本結構：
		1. 名稱
		2. 電郵
		3. 角色
		4. 密碼
		5. 重覆
	* 基本功能：
		1. 新增
		2. 修改
		3. 刪除
```
4. ###[留言](/messages)
```
	## 分頁式顯示；每頁12篇;按創建日期近至遠排。

	* 基本功能：
		1. 閱讀
		2. 刪除
		3. 電郵提示
```
5. ###[瀏量](/analytics)
```
	## 一頁式顯示，可選日期來顯示相應的數量

	* 基本功能
		1. 工作量
		2. 人流量
		3. 瀏覽量
```
6. ###[設定](/setting)
```
	## 表格式顯示，可更改個人設定

	* 基本功能
		1. 更改名稱
		2. 更改密碼
		3. 登出
```

@endmarkdown

    


</article>


@endsection