<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:image" content="">
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>Government of Tamil Nadu - Book Procurement - Magazine Add</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/fevi.svg') }}">
    <?php
    include 'admin/plugin/plugin_css.php';
    ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body>

    <!--*******
            Preloader start
        ********-->
    <div id="preloader">
        <div class="text-center">
            <img src="images/goverment_loader.gif" alt="" width="25%">
        </div>
    </div>
    <!--*******
            Preloader end
        ********-->

    <!--************
            Main wrapper start
        *************-->
    <div id="main-wrapper">
        <!--************
                Nav header start
            *************-->
        @include ('admin.navigation')
        <!--************
                Sidebar end
            *************-->
        <!--************
                Content body start
            *************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b>Add Magazine</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href=" {{ url('admin/magazine_list') }}">
                                <i class="fa fa-angle-double-left" aria-hidden="true"></i> List of Magazine </a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="cantainer p-5 ">
                        <div class="d-flex justify-content-between">
                            <h3>Bulk CSV Upload Files</h3>
                            <!-- <a href="" download><b><small class="mt-4">SAMPLE FILE DOWNLOAD</small></b></a> -->
                        </div>
                        <!-- CHANGE THE ACTION TO THE PHP SCRIPT THAT WILL PROCESS THE FILE VIA AJAX -->
                        <form id="file-upload-form" action="/admin/magazine/import" method="POST" enctype="multipart/form-data">
                            @csrf
                        <input id="file-upload" type="file" name="file_magazine" />
                            <label for="file-upload" id="file-drag">
                                Select a file to upload
                                <br />OR
                                <br />Drag a file into this box
                                
                                <br /><br /><span id="file-upload-btn" class="button">Add a file</span>
                            </label>
                            
                            <progress id="file-progress" value="0">
                                <span>0</span>%
                            </progress>
                            
                            <output for="file-upload" id="messages"></output>
                            <div class="row">
                            <div class="col-md-12 text-end mt-5">
                                <button type="submit" class="btn me-2 btn-primary" id="submitbutton">Submit</button>
                            </div>
                        </div>
                        </form>
                        
                    </div>
                </div>
              
            </div>
        </div>
    </div>
    <!--************
                Content body end
            *************-->
    <!--************
                Footer start
            *************-->
    @include ('publisher.footer')
    <!--************
                Footer end
            *************-->

    <!--************
            Support ticket button start
            *************-->

    <!--************
            Support ticket button end
            *************-->


    </div>
    <!--************
            Main wrapper end
        *************-->
    <?php
    include 'publisher/plugin/plugin_js.php';
    ?>
    <!-- <script src="./vendor/toastr/js/toastr.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.6.1/toastify.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- <script src="./vendor/ckeditor/ckeditor.js"></script> -->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
    <script src="./js/plugins-init/select2-init.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js"></script>

<script>
    (function() {
	function Init() {
		var fileSelect = document.getElementById('file-upload'),
			fileDrag = document.getElementById('file-drag'),
			submitButton = document.getElementById('submit-button');

		fileSelect.addEventListener('change', fileSelectHandler, false);

		// Is XHR2 available?
		var xhr = new XMLHttpRequest();
		if (xhr.upload) 
		{
			// File Drop
			fileDrag.addEventListener('dragover', fileDragHover, false);
			fileDrag.addEventListener('dragleave', fileDragHover, false);
			fileDrag.addEventListener('drop', fileSelectHandler, false);
		}
	}

	function fileDragHover(e) {
		var fileDrag = document.getElementById('file-drag');

		e.stopPropagation();
		e.preventDefault();
		
		fileDrag.className = (e.type === 'dragover' ? 'hover' : 'modal-body file-upload');
	}

	function fileSelectHandler(e) {
		// Fetch FileList object
		var files = e.target.files || e.dataTransfer.files;

		// Cancel event and hover styling
		fileDragHover(e);

		// Process all File objects
		for (var i = 0, f; f = files[i]; i++) {
			parseFile(f);
			uploadFile(f);
		}
	}

	function output(msg) {
		var m = document.getElementById('messages');
		m.innerHTML = msg;
	}

	function parseFile(file) {
		output(
			'<ul>'
			+	'<li>Name: <strong>' + encodeURI(file.name) + '</strong></li>'
			+	'<li>Type: <strong>' + file.type + '</strong></li>'
			+	'<li>Size: <strong>' + (file.size / (1024 * 1024)).toFixed(2) + ' MB</strong></li>'
			+ '</ul>'
		);
	}

	function setProgressMaxValue(e) {
		var pBar = document.getElementById('file-progress');

		if (e.lengthComputable) {
			pBar.max = e.total;
		}
	}

	function updateFileProgress(e) {
		var pBar = document.getElementById('file-progress');

		if (e.lengthComputable) {
			pBar.value = e.loaded;
		}
	}

	function uploadFile(file) {

		var xhr = new XMLHttpRequest(),
			fileInput = document.getElementById('class-roster-file'),
			pBar = document.getElementById('file-progress'),
			fileSizeLimit = 1024;	// In MB
		if (xhr.upload) {
			// Check if file is less than x MB
			if (file.size <= fileSizeLimit * 1024 * 1024) {
				// Progress bar
				pBar.style.display = 'inline';
				xhr.upload.addEventListener('loadstart', setProgressMaxValue, false);
				xhr.upload.addEventListener('progress', updateFileProgress, false);

				// File received / failed
				xhr.onreadystatechange = function(e) {
					if (xhr.readyState == 4) {
						// Everything is good!
						
						// progress.className = (xhr.status == 200 ? "success" : "failure");
						// document.location.reload(true);
					}
				};

				// Start upload
				xhr.open('POST', document.getElementById('file-upload-form').action, true);
				xhr.setRequestHeader('X-File-Name', file.name);
				xhr.setRequestHeader('X-File-Size', file.size);
				xhr.setRequestHeader('Content-Type', 'multipart/form-data');
				xhr.send(file);
			} else {
				output('Please upload a smaller file (< ' + fileSizeLimit + ' MB).');
			}
		}
	}

	// Check for the various File API support.
	if (window.File && window.FileList && window.FileReader) {
		Init();
	} else {
		document.getElementById('file-drag').style.display = 'none';
	}
})();
</script>
    


</body>
@if (Session::has('successlib'))

<script>

toastr.success("{{ Session::get('successlib') }}",{timeout:15000});

</script>
@elseif (Session::has('errorlib'))
<script>

toastr.error("{{ Session::get('errorlib') }}",{timeout:15000});

</script>
@endif

<style>
  

input[type="file"] {
	display : none;
}

#file-drag {
	border        : 2px dashed #555;
	border-radius : 7px;
	color         : #555;
	cursor        : pointer;
	display       : block;
	font-weight   : bold;
	margin        : 1em 0;
	padding       : 3em;
	text-align    : center;
	transition    : background 0.3s, color 0.3s;
}

#file-drag:hover {
	background : #ddd;
}

#file-drag:hover,
#file-drag.hover {
	border-color : #3070A5;
	border-style : solid;
	box-shadow   : inset 0 3px 4px #888;
	color        : #3070A5;
}

#file-progress {
	display : none;
	margin  : 1em auto;
	width   : 100%;
}

#file-upload-btn {
	margin : auto;
}

#file-upload-btn:hover {
	background : #4499c9;
}

#file-upload-form {
	margin : auto;	
	width  : 40%;
}

progress {
	appearance    : none;
	background    : #eee;
	border        : none;
	border-radius : 3px;
	box-shadow    : 0 2px 5px rgba(0, 0, 0, 0.25) inset;
	height        : 30px;
}

progress[value]::-webkit-progress-value {
	background :
		-webkit-linear-gradient(-45deg, 
			transparent 33%,
			rgba(0, 0, 0, .2) 33%, 
			rgba(0,0, 0, .2) 66%,
			transparent 66%),
		-webkit-linear-gradient(right,
			#005f95,
			#07294d);
	background :
		linear-gradient(-45deg, 
			transparent 33%,
			rgba(0, 0, 0, .2) 33%, 
			rgba(0,0, 0, .2) 66%,
			transparent 66%),
		linear-gradient(right,
			#005f95,
			#07294d);
	background-size : 60px 30px, 100% 100%, 100% 100%;
	border-radius   : 3px;
}

progress[value]::-moz-progress-bar {
	background :
	-moz-linear-gradient(-45deg, 
		transparent 33%,
		rgba(0, 0, 0, .2) 33%, 
		rgba(0,0, 0, .2) 66%,
		transparent 66%),
	-moz-linear-gradient(right,
		#005f95,
		#07294d);
	background :
		linear-gradient(-45deg, 
			transparent 33%,
			rgba(0, 0, 0, .2) 33%, 
			rgba(0,0, 0, .2) 66%,
			transparent 66%),
		linear-gradient(right,
			#005f95,
			#07294d);
	background-size : 60px 30px, 100% 100%, 100% 100%;
	border-radius   : 3px;
}

ul {
	list-style-type : none;
	margin          : 0;
	padding         : 0;
}
</style>