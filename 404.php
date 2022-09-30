<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Fancy Lab
 */

get_header();
?>
<div class="content-area" style="min-height:70vh;">
	<main>
		<div class="container">
			<div class="error-404">
				<header>
					<h1><?php esc_html_e( 'Błąd! Nie znaleziono stony.', 'fancy-lab' ); ?></h1>
					<p><?php esc_html_e( 'Podany adres jest błędny lub twój dostęp do tych treści wygasł.', 'fancy-lab' ); ?></p>
				</header>
			
			</div>
		</div>
	</main>
</div>
<?php get_footer(); ?>
<script type="text/javascript">
(function(window, document, dataLayerName, id) {
window[dataLayerName]=window[dataLayerName]||[],window[dataLayerName].push({start:(new Date).getTime(),event:"stg.start"});var scripts=document.getElementsByTagName('script')[0],tags=document.createElement('script');
function stgCreateCookie(a,b,c){var d="";if(c){var e=new Date;e.setTime(e.getTime()+24*c*60*60*1e3),d="; expires="+e.toUTCString()}document.cookie=a+"="+b+d+"; path=/"}
var isStgDebug=(window.location.href.match("stg_debug")||document.cookie.match("stg_debug"))&&!window.location.href.match("stg_disable_debug");stgCreateCookie("stg_debug",isStgDebug?1:"",isStgDebug?14:-1);
var qP=[];dataLayerName!=="dataLayer"&&qP.push("data_layer_name="+dataLayerName),isStgDebug&&qP.push("stg_debug");var qPString=qP.length>0?("?"+qP.join("&")):"";
tags.async=!0,tags.src="https://talktoloop.containers.piwik.pro/"+id+".js"+qPString,scripts.parentNode.insertBefore(tags,scripts);
!function(a,n,i){a[n]=a[n]||{};for(var c=0;c<i.length;c++)!function(i){a[n][i]=a[n][i]||{},a[n][i].api=a[n][i].api||function(){var a=[].slice.call(arguments,0);"string"==typeof a[0]&&window[dataLayerName].push({event:n+"."+i+":"+a[0],parameters:[].slice.call(arguments,1)})}}(i[c])}(window,"ppms",["tm","cm"]);
})(window, document, 'dataLayer', '8357eded-8009-4bce-87a1-74a8cfe3ad2a');
</script><noscript><iframe src="https://talktoloop.containers.piwik.pro/8357eded-8009-4bce-87a1-74a8cfe3ad2a/noscript.html" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- FAQs Square Refresh -->
<script src="https://www.squarerefresh.xyz/assets/plugins/facts/js/facts.min.js"></script>
<!-- FAQs Square Refresh -->

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://assets.codepen.io/3198845/WMSplitSections9720v3.1.4.min.js"></script>
<script>
$(document).ready(function() {
	$('[data-section-id="60c0ea43ee0b2951f6f8ca78"] .section-background img').attr('alt','enter alt text here');
});
</script>
<script>
  $('#answer-example-share-button').on('click', () => {
  if (navigator.share) {
    navigator.share({
        title: 'Web Share API Draft',
        text: 'Talk to Loop PL',
        url: 'https://www.talktoloop.org/short-route/pl',
      })
      .then(() => console.log('Successful share'))
      .catch((error) => console.log('Error sharing', error));
  } else {
    console.log('Share not supported on this browser, do it the old way.');
  }
});  
   $('#answer-example-share-main').on('click', () => {
  if (navigator.share) {
    navigator.share({
        title: 'Web Share API Draft',
        text: 'Talk to Loop',
        url: 'https://www.talktoloop.org/short-route',
      })
      .then(() => console.log('Successful share'))
      .catch((error) => console.log('Error sharing', error));
  } else {
    console.log('Share not supported on this browser, do it the old way.');
  }
});  
   $('#answer-example-share-ua').on('click', () => {
  if (navigator.share) {
    navigator.share({
        title: 'Web Share API Draft',
        text: 'Talk to Loop UA',
        url: 'https://www.talktoloop.org/short-route/ua',
      })
      .then(() => console.log('Successful share'))
      .catch((error) => console.log('Error sharing', error));
  } else {
    console.log('Share not supported on this browser, do it the old way.');
  }
});  
</script>