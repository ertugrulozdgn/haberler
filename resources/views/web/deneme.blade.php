<!DOCTYPE html>
<html>
<head>

    <title>mmenu.js playground</title>
    <meta charset="utf-8" />

    <!-- Include mmenu files -->
    <link rel="stylesheet" href="{{ mix('assets/web/css/build.css') }}">
    <script src="{{ mix("assets/web/js/build.js") }}"></script>


    <!-- Fire the plugin -->
    <script>
        document.addEventListener(
            "DOMContentLoaded", () => {
                new Mmenu( "#my-menu" );
            }
        );
    </script>

</head>
<body>

<!-- The menu -->
<nav id="menu">
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/work">Our work</a></li>
        <li><span>About us</span>
            <ul>
                <li><a href="/about/history">History</a></li>
                <li><span>The team</span>
                    <ul>
                        <li><a href="/about/team/management">Management</a></li>
                        <li><a href="/about/team/sales">Sales</a></li>
                        <li><a href="/about/team/development">Development</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><span>Services</span>
            <ul>
                <li><a href="/services/design">Design</a></li>
                <li><a href="/services/development">Development</a></li>
                <li><a href="/services/marketing">Marketing</a></li>
            </ul>
        </li>
        <li><a href="/contact">Contact</a></li>
    </ul>
</nav>

</body>
</html>
