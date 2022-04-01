<!DOCTYPE html>
<html>

<style>
    a:link {
        color: #00de28;
        background-color: transparent;
        text-decoration: none;
    }

    a:visited {
        color: #7bab70;
        background-color: transparent;
        text-decoration: none;
    }

    a:hover {
        color: #0062a8;
        background-color: transparent;
        text-decoration: underline;
    }

    a:active {
        color: yellow;
        background-color: transparent;
        text-decoration: underline;
    }
    p {
        color: rgba(255, 255, 255, 0.77);
    }
    div {
        color: rgba(255, 255, 255, 0.62);
    }
    article {
        color: rgba(255, 255, 255, 0.62);
    }
    h1 {
        color: rgba(255, 255, 255, 0.62);
    }
    li {
        color: rgba(255, 255, 255, 0.62);
    }

</style>

<head>
    <title>{{ $title }}</title>
</head>
<body class="antialiased"; style="background-color:#031e1f">
<div><a href='/' class="underline">Home!</a></div>
{{ $content }}
<ul>
    <li><a href='/' class="underline">Home!</a></li>
    <li><a href='/contact' class="underline">Contact!</a></li>
    <li><a href='/blog' class="underline">Blog!</a></li>
    <li><a href='/posts' class="underline">Postssss!</a></li>
    <li><a href='/categories' class="underline">Categories!</a></li>
    <li><a href="javascript:history.back()" class="btn btn-default">Back</a></li>
</ul>
</div>
</div>
</div>
</body>
</html>
