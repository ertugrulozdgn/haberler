<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="{{ asset('cms/bower_components/select2/dist/css/select2.css') }}" rel="stylesheet" />
    <link href="{{ asset('cms/bower_components/multiselect/dist/css/multi-select.css') }}" rel="stylesheet">
</head>
<body>
<center>
    <h1>Seç Bakalım</h1>
    <select id="name" style="width: 200px">
        <option value="">1</option>
        <option value="">2</option>
        <option value="">3</option>
    </select>
</center>


<hr>


<div class="container">
    <div class="row">
        <select multiple="multiple" id="my-select" name="my-select[]">
            <option value='elem_1'>elem 1</option>
            <option value='elem_2'>elem 2</option>
            <option value='elem_3'>elem 3</option>
            <option value='elem_4'>elem 4</option>
            ...
            <option value='elem_100'>elem 100</option>
        </select>
    </div>
</div>


<hr>


<button onclick="handleFiles();">Upload Image</button>

<script src="{{ asset('cms/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('cms/bower_components/select2/dist/js/select2.js') }}"></script>
<script src="{{ asset('cms/bower_components/multiselect/dist/js/jquery.multi-select.js') }}"></script>
<script src="//api.filepicker.io/v1/filepicker.js"></script>
<script>filepicker.setKey('AYYvglohATMmXMKgo1tNrz');</script>
<script type="text/javascript">
    $("#name").select2();
    $('#my-select').multiSelect();
</script>
<script>
    function handleFiles() {
        filepicker.pick({
                mimetypes: ['image/*'],
                //you can also define what uploading services you want to use here
            },
            function(e) { //you now have access to the file
                var link = e.url;
                //change picture
                var img = document.getElementById("image");
                img.src = link;

                const client = filestack.init(AYYvglohATMmXMKgo1tNrz);
                const options = {
                    transformations: {
                        crop: false,
                        circle: true,
                        rotate: true
                    }
                };

                client.picker(options).open();
            });
    }
</script>
<scrip>

</scrip>
</body>
</html>
