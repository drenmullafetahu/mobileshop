<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{ http_resources('/assets/css/bootstrap.min.css') }}"  type="text/css">

<!-- Custom CSS -->
<link rel="stylesheet" href="{{ http_resources('/assets/css/style.css') }}">

<!-- Custom Fonts -->
<link rel="stylesheet" href="{{ http_resources('/assets/font-awesome/css/font-awesome.min.css') }}"  type="text/css">

<link rel="stylesheet" href="{{ http_resources('/assets/fonts/font-slider.css') }}" type="text/css">

<!-- jQuery and Modernizr-->
<script src="{{ http_resources('/assets/js/jquery-2.1.1.js') }}"></script>


<!-- Core JavaScript Files -->
<script src="{{ http_resources('/assets/js/bootstrap.min.js') }}"></script>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>

<script src="{{ http_resources('/assets/js/html5shiv.js') }}"></script>

<script src="{{ http_resources('js/respond.min.js') }}"></script>
<![endif]-->


<link href="{{ http_resources('/assets/bootstrap-fileInput/css/fileinput.min.css') }}" media="all" rel="stylesheet" type="text/css" />

<!-- canvas-to-blob.min.js is only needed if you wish to resize images before upload.
     This must be loaded before fileinput.min.js -->

<script src="{{ http_resources('/assets/bootstrap-fileInput/js/plugins/canvas-to-blob.min.js') }}" type="text/javascript"></script>
<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
     This must be loaded before fileinput.min.js -->

<script src="{{ http_resources('/assets/bootstrap-fileInput/js/plugins/sortable.min.js') }}" type="text/javascript"></script>
<!-- purify.min.js is only needed if you wish to purify HTML content in your preview for HTML files.
     This must be loaded before fileinput.min.js -->

<script src="{{ http_resources('/assets/bootstrap-fileInput/js/plugins/purify.min.js') }}" type="text/javascript"></script>
<!-- the main fileinput plugin file -->

<script src="{{ http_resources('/assets/bootstrap-fileInput/js/fileinput.min.js') }}"></script>
<!-- bootstrap.js below is needed if you wish to zoom and view file content
     in a larger detailed modal dialog -->

<!-- optionally if you need a theme like font awesome theme you can include
    it as mentioned below -->

<script src="{{ http_resources('/assets/bootstrap-fileInput/js/fa.js') }}"></script>
<!-- optionally if you need translation for your language then include
    locale file as mentioned below -->
<script src="path/to/js/<lang>.js"></script>

<script>
    $("#input-id").fileinput({'showUpload':false, 'previewFileType':'any'});
</script>