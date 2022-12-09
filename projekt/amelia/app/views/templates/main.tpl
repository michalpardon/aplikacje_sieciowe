<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>{$page_title|default:"Tytuł domyślny"}</title> 
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="{$page_description|default:"Opis domyślny"}">
		<link rel="stylesheet" href="{$conf->app_url}/assets/css/main.css" />
		<noscript><link rel="stylesheet" href="{$conf->app_url}/assets/css/noscript.css" /></noscript>
                <script src="https://kit.fontawesome.com/c8d82dd7f5.js" crossorigin="anonymous"></script>
	</head>
	<body class="is-preload">
            <div id="page-wrapper">
        <div style="width:90%; margin: 2em auto;">
            {block name=content} Domyślna treść zawartości .... {/block}
            </div>
        <!-- Footer -->
                <footer id="footer">
                        <ul class="copyright">
                                <li>&copy; {block name=footer} Domyślna treść zawartości .... {/block}. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
                        </ul>
                </footer>
                        </div>
                    <!-- Scripts -->
                            <script src="{$conf->app_url}/assets/js/jquery.min.js"></script>
                            <script src="{$conf->app_url}/assets/js/jquery.scrolly.min.js"></script>
                            <script src="{$conf->app_url}/assets/js/jquery.dropotron.min.js"></script>
                            <script src="{$conf->app_url}/assets/js/jquery.scrollex.min.js"></script>
                            <script src="{$conf->app_url}/assets/js/browser.min.js"></script>
                            <script src="{$conf->app_url}/assets/js/breakpoints.min.js"></script>
                            <script src="{$conf->app_url}/assets/js/util.js"></script>
                            <script src="{$conf->app_url}/assets/js/main.js"></script>

	</body>
</html>