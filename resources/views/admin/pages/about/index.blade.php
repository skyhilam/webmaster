@extends('layouts.admin.index_form', ['breadcrumb' => 'about'])


@section('form')


<div class="row">
	<div class="column">
		<table>
			<tr>
				<td>
					<div id="editor">
					  <p>Hello World!</p>
					  <p>Some initial <strong>bold</strong> text</p>
					  <p><br></p>
					</div>
				</td>
			</tr>
		</table>
	</div>
</div>




@endsection


@section('plugin')
<link href="https://cdn.quilljs.com/1.0.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.0.6/quill.min.js" type="text/javascript"></script>
@endsection


@section('js')

<script type="text/javascript">
  var quill = new Quill('#editor', {
  	
    theme: 'snow'
  });
</script>

@endsection