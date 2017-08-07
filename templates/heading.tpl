<!--heading.tpl-->
<!DOCTYPE HTML>
<HTML>
<HEAD>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>
        {if isset($title) && $title != ""}
            {$title} - Matthewrbowker's tools
        {else}
            Matthewrbowker's tools
        {/if}
    </title>
    <link href="https://tools-static.wmflabs.org/cdnjs/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ=="
          crossorigin="anonymous">

    <style type="text/css">
        body {
            padding-top: 60px;
            padding-bottom: 40px;
        }

    </style>

    <script>
        <!--
        function wopen(url, name, w, h, s)
        {
            w += 32;
            h += 96;
            var win = window.open(url,
                    name,
                    'width=' + w + ', height=' + h + ', ' +
                    'location=no, menubar=no, ' +
                    'status=no, toolbar=no, scrollbars=' + s + ', resizable=no');
            win.resizeTo(w, h);
            win.focus();
        }
        // -->
    </script>
</HEAD>
<BODY>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {if (isset($dir) && ($dir != "root"))}
                <a class="navbar-brand" href="../index.php">
            {else}
                <a class="navbar-brand" href="index.php">
            {/if}
                Matthewrbowker's Tools
            </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                {if isset($dir) && $dir != "root"}
                    <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Tool Home</a></li>\
                {/if}
                <li>
                    <a href="{$abouturl} " target="popup"
                       onClick="wopen('{$abouturl}', 'popup', 400, 300, 'no'); return false;">{$abouttext}</a>
                </li>
                <li>
                    <a href="{$changelogurl} " target="popup"
                       onClick="wopen('{$changelogurl}', 'popup', 400, 300, 'yes'); return false;">Changelog</a>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container-fluid">
    <div class="col-md-1">&nbsp;</div>
    <div class="col-md-10">

        {if (isset($ts_sn_on) && $ts_sn_on && isset($ts_sitenotice) && $ts_sitenotice != "")}
            <div class="alert alert-warning" role="alert">{$ts_sitenotice}</div>
        {/if}
