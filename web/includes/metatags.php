<?php 
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");    // past date 
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
                                                     // always modified 
header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false); 
header("Pragma: no-cache");                          // HTTP/1.0
header("Content-Type: text/html; charset=utf-8"); 
?>
  <meta name="Description" content="EUJob4EU - The Your First Eures Job project web based data management tool - Recruitment of young European mobile workers - Financial support for mobile workers integration" />
  <meta name="Keywords" content="cv, europe, europass, documents, portfolio, language, passport, mobility, certificate, diploma, cedefop" />
  <meta name="Author" content="Marcello Zini - Provincia di Roma" />
