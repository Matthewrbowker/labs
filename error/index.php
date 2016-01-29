<?php
require('../includes.php');

$site = new site();

if (isset($_GET['error'])) {
    $error = $_GET['error'];
}
else {
    $error="generic";
}

$errordata = array(
'400' => array('brief' => 'Bad Request', 'full' => 'The request could not be understood by the server due to malformed syntax.'),
'401' => array('brief' => 'Authentication Required', 'full' => 'The request requires user authentication. '),
'402' => array('brief' => 'Payment Required', 'full' => 'This code is reserved for future use. '),
'403' => array('brief' => 'Forbidden', 'full' => 'The server understood the request, but is refusing to fulfill it.'),
'404' => array('brief' => 'Not Found', 'full' => 'We could not find the document you requested.' ),
'405' => array('brief' => 'Method not allowed', 'full' => 'The method specified in the Request-Line is not allowed for the resource identified by the Request-URI. '),
'406' => array('brief' => 'Not Acceptable', 'full' => 'The resource identified by the request is only capable of generating response entities which have content characteristics not acceptable according to the accept headers sent in the request. '),
'407' => array('brief' => 'Proxy Authentication Error', 'full' => 'The client must first authenticate itself with the proxy. '),
'408' => array('brief' => 'Requrest Time Out', 'full' => 'The client did not produce a request within the time that the server was prepared to wait. '),
'409' => array('brief' => 'Conflicting Request', 'full' => 'The request could not be completed due to a conflict with the current state of the resource. '),
'410' => array('brief' => 'Gone', 'full' => 'The requested resource is no longer available at the server and no forwarding address is known. '),
'411' => array('brief' => 'Content Length Required', 'full' => 'The server refuses to accept the request without a defined Content-Length. '),
'412' => array('brief' => 'Precondition Failed', 'full' => 'The precondition given in one or more of the request-header fields evaluated to false when it was tested on the server. '),
'413' => array('brief' => 'Entity Too Long', 'full' => 'The server is refusing to process a request because the request entity is larger than the server is willing or able to process. '),
'414' => array('brief' => 'URI Too Long', 'full' => 'The server is refusing to service the request because the Request-URI is longer than the server is willing to interpret. '),
'500' => array('brief' => 'Internal Server Error', 'full' => 'The server encountered an unexpected condition which prevented it from fulfilling the request.'),
'501' => array('brief' => 'Not Implemented', 'full' => 'The server does not support the functionality required to fulfill the request. '),
'502' => array('brief' => 'Bad Gateway', 'full' => 'The server, while acting as a gateway or proxy, received an invalid response from the upstream server it accessed in attempting to fulfill the request. '),
'503' => array('brief' => 'Service Unavalable', 'full' => 'The server is currently unable to handle the request due to a temporary overloading or maintenance of the server. '),
'504' => array('brief' => 'Gateway Timeout', 'full' => 'The server, while acting as a gateway or proxy, did not receive a timely response from the upstream server specified by the URI (e.g. HTTP, FTP, LDAP), or some other auxiliary server (e.g. DNS), it need'),
'505' => array('brief' => 'HTTP Version not Supported', 'full' => 'The server does not support, or refuses to support, the HTTP protocol version that was used in the request message. '),
'generic' => array('brief' => 'Error', 'full' => 'We were unable to process your error.  Please try again later')
);

$site -> gen_opening();

$site->assign('error', $error);
$site->assign('errorData', $errordata[$error]['full']);

$site->Display("error.index");

$site -> gen_closing();
