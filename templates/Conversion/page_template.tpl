<!doctype html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>{:PAGE_TITLE:} - {:SITE_NAME:}</title>
	{:STYLES:}
    {:HEADER_SCRIPTS:}
    <script type="text/javascript">
        $(document).ready(function(){
            var $container = $('.posts');
            $container.imagesLoaded(function(){
            $container.masonry({ 
                    itemSelector: '.item',
                    columnWidth: ".item",
                    singleMode: true,
                    resizeable: true
                })
            });

            $(window).resize(function() {
                $container.masonry('reloadItems');
                $container.masonry('layout');
            });
        });
    </script>
</head>

<body>
    <div class="top-bar">
        <div id="motto">Minimalism. Atheism. Whiskey!</div>
    </div>
    
    {*HEADER*}
	{*MENU*}
   	<div>
    {:USER_MESSAGE:}
    {*CONTENT*}
    </div>
    {*FOOTER*}
    {:FOOTER_SCRIPTS:}
</body>
</html>