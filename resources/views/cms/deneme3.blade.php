<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="{{ asset('cms/bower_components/jquery-tags-input/src/jquery.tagsinput.js') }}"></script>
</head>
<body>
    
    <input name="tags" id="tags" value="foo,bar,baz" />


    <script src="{{ asset('cms/bower_components/jquery-tags-input/src/jquery.tagsinput.js') }}"></script>
    <script>
        $('#tags').tagsInput();
    </script>
</body>
</html>