<?php

require_once 'PHPUnit/Framework/TestCase.php';
require_once 'DOMDocumentCharset.php';

class DOMDocumentCharsetTest extends PHPUnit_Framework_TestCase {
	protected $dom;

	protected function setUp() {
		$this->dom = new DOMDocumentCharset();
	}

	public function testHtml5CharsetConversion() {
		$html = <<<EOS
<!doctype html>
<head>
  <meta charset="UTF-8">
  <title>html 5 test</title>
 </head>
 <body>
 </body>
 </html>
EOS;

		$this->dom->loadHTMLCharset( $html );
		$this->assertTrue( (strpos( $this->dom->saveHTML(), 
			'<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">' ) !== false ) );
	}

	public function testLoadHtmlCharset() {
		$html = <<<EOS
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
        "http://www.w3.org/TR/html4/strict.dtd">
<HTML>
  <HEAD>
    <TITLE>The document title</TITLE>
  </HEAD>
  <BODY>
    <H1>Main heading</H1>
    <P>A paragraph.</P>
    <P>Another paragraph.</P>
    <UL>
      <LI>A list item.</LI>
      <LI>Another list item.</LI>
    </UL>
  </BODY>
</HTML>
EOS;

		$this->dom->loadHTMLCharset( $html, 'UTF-8' );
		$this->assertTrue( ( strpos( $this->dom->saveHTML(),
			'<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">' ) !== false ) );
	}
}
