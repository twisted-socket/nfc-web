/* ------------------------------------------------------------------------
 * Software: eorisis Framework
 * @author eorisis https://eorisis.com
 * @copyright Copyright (C) 2012-2016 eorisis. All Rights Reserved.
 * ------------------------------------------------------------------------ */
var jq_loaded=false;function jquery_check(){if(typeof(jQuery)==="undefined"){if(!jq_loaded){jq_loaded=true;document.write('<scr'+'ipt type="text/javascript" src="/media/eorisis-chroma/js/lib/jquery-1.12.4.min.js"></scr'+'ipt>');document.write('<scr'+'ipt type="text/javascript" src="/media/eorisis-chroma/js/lib/jquery-migrate-1.4.1.min.js"></scr'+'ipt>');document.write('<scr'+'ipt type="text/javascript">jQuery.noConflict();</scr'+'ipt>');}setTimeout("jquery_check()",50);}}jquery_check();