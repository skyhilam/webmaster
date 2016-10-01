@section('plugin')
<script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.22.0/js/medium-editor.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.22.0/css/medium-editor.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.22.0/css/themes/default.min.css">

@endsection


<script>
var buttonOptions = ['anchor', 'orderedlist', 'unorderedlist', 'h6'];
	var editor = new MediumEditor('#content', {
		autoLink: true,
		toolbar: {
            buttons: buttonOptions,
        },
        placeholder: {
	        text: ''
	    }
	});
</script>