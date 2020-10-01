<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <div id="W1129"></div>


    <script src="{{ mix("assets/web/js/build.js") }}"></script>
    <script type="text/javascript" src="https://paracevirici.com/servis/widget/widget.js"></script>
    <script type="text/javascript">

        $(function(){
        typeof $.fn.paraceviriciWidget == "function" && 
        $("#W1129").paraceviriciWidget({
            widget:"boxline",
            wData:{
                category:0,
                currency:"USD-EUR"
            },
            wSize:{
                wWidth:350,
                wHeight:100
            },
            wBase: {
                rCombine: 1,
                wBg: "#f8f9fa"
            },
            wRow: {
                rL: 1
            },
            wFrame: {
                wB: 0
            },
            wContent: {
                pBuy: 1,
                pChange: 1
            },
            wCode: {
                cS: 11,
                cC: "#1d6fab"
            },
            wArrow: {
                aS: 7
            }
        });
        });
        
        </script>
</body>
</html>