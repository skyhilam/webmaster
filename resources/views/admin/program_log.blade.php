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


## 工作記錄 
* update setting info, edit (2016/10/15)
* Admin ui design (2016/10/5)
	* post, post types, home, messages, members, setting, analytics
* Add tabs table > p css (2016/10/5)
* remove members profile icon at members page (2016/10/5)
* remove setting profile icon at setting page (2016/10/5)
* Can't display their self at members page  (2016/10/6)
* develop messages page about send message to other user. (2016/10/7)
* develop navication config (2016/10/14)
@endmarkdown

    

<br><br>
</article>
@endpush
@include('admin.console_container')


@endsection