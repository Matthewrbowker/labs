<?php header("Content-type: text/css");

$toolcolor = $_GET['color'] or $toolcolor="000000";
$bordercolor = "888888";
$fonts = "Georgia, \"Times New Roman\", Times, serif";
$fontsize = "10pt"; ?>

body {font-family: <?=$fonts; ?>;
margin-top:0px;
font-size: <?=$fontsize; ?>;
padding: 0px;
background-color: #<?=$toolcolor; ?> }

#fullbody {width: 1000px;
background-color:#ffffff;
margin-left: auto;
margin-right:auto;
margin-top:0px;
padding-top: .5em;
padding-left: .5em;
padding-right: .5em; }

#heading { width:100%;
text-align:center; }

#navi { padding: 1px;
width:100%;
text-align: center;
padding-bottom: 2px;
border-collapse:collapse; }

#navi tr td { border: #888888 dashed 1px; }

#sitenotice { width: 100%;
text-align:center; }

#sn-content { display:inline-block;
width: 90%;
background-color:#FF5C5C;
border: #888888 dashed 1px;
padding-bottom: 2px;
text-align:center;
color:#ffffff;
font-style:italic;
margin-top: 10px;
margin-bottom: 10px; }

#footer { text-align:center;
border-top: #888888 dashed 1px;
padding: .5em;
padding-top: .5em;
margin-top: .5em; }

A:link  {
	font-size : <?=$fontsize; ?>;
	font-family : <?=$fonts; ?>;
	font-weight : normal;
	font-style : normal;
	color : blue;
}

A:visited  {
	font-size : <?=$fontsize; ?>;
	font-family : <?=$fonts; ?>;
	font-weight : normal;
	font-style : normal;
	color : #AA0000;
}

A:hover  {
	font-size : <?=$fontsize; ?>;
	font-family : <?=$fonts; ?>;
	font-weight : normal;
	font-style : normal;
	color : Navy;
}

H1 { color: #<?=$toolcolor ?>; }

.vertime { width: 100%;
font-style: italic;
font-size: 6pt;
color: #<?=$bordercolor?>;
text-align: right; }

hr {border: none;
border-bottom: #<?=$bordercolor?> dashed 1px;
width: 100%; }

.hidden { display: none; }

.unhidden { display: inline; }
.red {
	color : red;
	display : inline;
	}

.black {
	color : black;
	display : inline;
	}