@extends('layouts.admin')


@section('plugin')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/github-markdown-css/2.4.0/github-markdown.min.css">


@endsection


@section('content')

@push('console_content')


<article class="markdown-body box-container box">

@markdown
# 用極簡單去思考和實現
用極簡單的方法去做，先實現功能，使用，優化，創新！堅持一點一滴去做。  
**不要心急賺錢，先規劃後實現！**

## 項目開發
* message multiple send function
* message email style
* design
	* post ✔︎
	* home
	* members ✔︎
	* setting ✔︎
	* analytics ✔︎

@endmarkdown

    

<br><br>
</article>
@endpush
@include('admin.console_container')


@endsection