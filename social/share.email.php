<?
require('../includes.php');
require('cgi-bin/vars.php');

$site = new site();

$article = ucfirst(urldecode($_GET['article']));
$articleenc = genwplink($article);

if ($_REQUEST['send'] == true) {
	var_dump($_REQUEST);
}

$site -> gen_opening();
?>

Compose your email below.
<form method="post" action="share.email.php">
<input type="hidden" name="send" value="true" />
<table width="100%">
<tr>
<td>
<label for="from">From:</label>
</td>
<td>
<input type="text" name="from" />
</td>
</tr>
<tr>
<td>
<label for="to">To:</label>
</td>
<td>
<input type="text" name="to" />
</td>
</tr>
<tr>
<td>
<label for="subject">Subject:</label>
</td>
<td>
<input type="text" name="subject" />
</td>
</tr>
<tr>
<td colspan="2">
<textarea cols="100" rows="10">Hey, I found an article you might like! "<?=$article?>" from Wikipedia, the Free Encyclopedia.

You can find it at <?=$wpHref?><?=$articleenc?>.

Thanks!</textarea>
</td>
</tr>
<tr>
<td>
<input type="submit" value="Send the email!" />
</td>
<td>
<input type="reset" value="Reset this form." />
</td>
</tr>
</table>

<?php $site -> gen_closing(); ?>