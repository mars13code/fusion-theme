<?php

if (Core::Request("isAjax"))
{
    require_once("ajax.php");
}
else
{
    require_once("header.php");
    require_once("content.php");
    require_once("footer.php");
}
