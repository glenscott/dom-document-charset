dom-document-charset
====================

New character encoding option for the DOMDocument loadHTML/loadHTMLFile methods.

The DOMDocumentCharset class is a drop-in replacement for DOMDocument that provides alternative methods for loading HTML.  These methods provide two key features:

1.  Specify the character encoding when loading HTML in case a charset declaration is missing from the source.
2.  Correctly deal with HTML 5 character set declarations when using Libxml < v2.8.0.

Specify character encoding
--------------------------

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

	$dom->loadHTMLCharset( $html, 'UTF-8' );

	// DOMDocument content now UTF-8 encoded
