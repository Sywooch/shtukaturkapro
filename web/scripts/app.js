$(document).ready(function(){$(".seo-hide").after('<span class="more">Читать полностью</span>').append('<div class="overflow"></div>').append('<span class="opened">Свернуть</span>'),$(".more").click(function(){$(".seo-hide").addClass("open"),$(this).hide(),$(".overflow").hide()}),$("span.opened").click(function(){$(".seo-hide").removeClass("open"),$(".more").show(),$(".overflow").show()})}),function(){if((!window.pluso||"function"!=typeof window.pluso.start)&&void 0==window.ifpluso){window.ifpluso=1;var o=document,e=o.createElement("script"),s="getElementsByTagName";e.type="text/javascript",e.charset="UTF-8",e.async=!0,e.src=("https:"==window.location.protocol?"https":"http")+"://share.pluso.ru/pluso-like.js";var n=o[s]("body")[0];n.appendChild(e)}}();