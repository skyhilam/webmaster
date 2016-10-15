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
1. create package (2016/10/14)
* post package
* messages package
* members package
2. develop search bar
3. develop newsletter
4. 統一 info, edit, create form format.
@endmarkdown

    

<br><br>
</article>
@endpush
@include('admin.console_container')


@endsection