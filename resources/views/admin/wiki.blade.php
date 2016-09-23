@extends('layouts.admin')




@section('content')

@if (session('status'))
    <div class="success callout">
        {{ session('status') }}
    </div>
@endif
<figure>
<h1><b>用極簡單的方法 思考 實現</b></h1>
<p>CLOVER ADMIN 計劃表：用極簡單的方法去做，先實現功能，使用，優化，創新！堅持一點一滴去做，<br><b>不要心急賺錢。先規劃後實現！</b></p>
<p>基本功能都已實現，下一步就是逐完善各部分的權限，中英語言，Css，Js，程式碼等。</p>	
<ul class="menu simple" data-magellan>
	<li><a href="#login">登入</a></li>
	<li><a href="#posts">文章</a></li>
	<li><a href="#members">會員</a></li>
	<li><a href="#profile">個人設定</a></li>
	<li><a href="#roles">權限</a></li>
	<li><a href="#messages">訊息</a></li>
	<li><a href="#analytics">統計</a></li>
</ul>
<hr>



<div>
	<h3 id="login">登入</h3>
	<ul class="no-bullet">
		<li>受權： 未登入者</li>
		<li>功能： 登入，忘記密碼，登出，<del>註冊</del></li>
		<li>連結：
			<a href="{{url('/login')}}">Login</a> <a href="{{url('/password/forgot')}}">Forgot</a> <a href="{{url('/logout')}}">Logut</a> <del><a href="{{url('/register')}}">Register</a></del></li>
		<li>進度： 基本功能實現</li>
		
	</ul>
	<details class="subheader" open>
		<summary>描述</summary>
		<p>當登入時會觸發登入件事：會儲存用戶的角色（admin, redac, user）在session的statut裹； <br>當登出時亦會觸發事件：會清除session的statut記錄</p>	
	</details>

	<details class="subheader" open>
		<summary>事件 (App\Providers\EventServiceProvider)</summary>
		<ul>
			<li>'Illuminate\Auth\Events\Login' => ['App\Listeners\LoginSuccess'],</li>
			<li>'Illuminate\Auth\Events\Logout' => ['App\Listeners\LogoutSuccess'],</li>
		</ul>
	</details>
	<hr>
</div>



<div>
	<h3 id="posts" >文章</h3>
	<ul class="no-bullet">
		<li>受權： admin, redac</li>
		<li>功能： 新增、修改、刪除文章</li>
		<li>架構： 內容柵、圖片柵</li>	
		<li>連結： <a href="{{url('/posts')}}">列表</a> <a href="{{url('/post/create')}}">新增</a></li>
		<li>進度： 基本功能實現，待改善及開發⋯⋯</li>
	</ul>
	<details class="subheader" open>
		<summary>待開發功能</summary>
		<ol>
			<li>Js(ajax) 圖片新增及刪除</li>
			<li>Upload events & listeners</li>
		</ol>
	</details>
	<details class="subheader" open>
		<summary>優化及修改項目</summary>
		<ol>
			<li><del>受權</del></li>
			<li>中英語言</li>
			<li>介面</li>
		</ol>
	</details>
	<details class="subheader" open>
		<summary>錯誤或問題項目</summary>
	</details>
	<hr>
</div>






<div>
	<h3 id="members">會員</h3>
	<ul class="no-bullet">
		<li>列表	<a href="{{url('/members')}}">Members</a> <span>✔︎</span>
			<ul>
				<li>修改</li>
				<li>刪除</li>
			</ul></li>
		<li>新增 <a href="{{url('/member/create')}}">Create new member</a> <span>✔︎</span></li>
	</ul>
	<p class="subheader">權限： admin</p>
	<hr>
</div>

<div>
	<h3 id="profile">個人設定</h3>
	<ul class="no-bullet">
		<li>詳細	<a href="{{url('/profile')}}">Profile</a> <span>✔︎</span>
			<ul>
				<li>修改</li>
			</ul></li>
	</ul>
	<p class="subheader">權限： all</p>
	<hr>
</div>

<div>
	<h3 id="roles">權限 </h3>
	<ul class="no-bullet">
		<li>列表 <a href="{{url('/roles')}}">Roles</a> <span>✔︎</span></li>
	</ul>
	<p class="subheader">權限： admin</p>
	<hr>
</div>

<div>
	<h3 id="messages">訊息</h3>
	<ul class="no-bullet">
		<li>留言 <a href="{{url('/messages')}}">Messages</a> <span>✔︎</span></li>
		<li>信箱 <a href="{{url('/messages/inbox')}}">Inbox</a> <span>✔︎</span></li>
	</ul>
	<p class="subheader">權限： admin</p>
	<hr>
</div>

<div>
	<h3 id="analytics">統計</h3>
	<ul class="no-bullet">
		<li>總覽 (工作量，總流量，用戶量) <a href="{{url('/analytics')}}">Analytics</a> <span>✔︎</span></li>
	</ul>
	<p class="subheader">權限： admin</p>
	<hr>
</div>

<div>
	<h3 id="helper">小幫手</h3>
	<a href="https://dev.w3.org/html5/html-author/charref" target="_brand">https://dev.w3.org/html5/html-author/charref</a>
	<hr>
</div>
</figure>
<br>
<br>
<br>
<br>
@endsection


