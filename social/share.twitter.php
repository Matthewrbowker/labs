<?
require('../includes.php');
require('cgi-bin/vars.php');

$articlename = urldecode($_GET['article']);

$articlelink = genwplink($articlename);

$text = urlencode("\"" . $articlename . "\" from Wikipedia, the free encyclopedia");

$framesource = urlencode(/*$wpHref*/"http://en.wikipedia.org/wiki/" . $articlelink);

$donelink = urlencode("http://toolserver.org/~matthewrbowker/social/done.php?service=twitter");

header("Location:https://twitter.com/share?url=$framesource&via=toolserver&text=$text&counturl=$donelink&hashtags=wikipedia");

?>