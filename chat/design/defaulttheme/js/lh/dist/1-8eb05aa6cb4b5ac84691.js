webpackJsonp([1],{3:function(a,e,l){var o={cancelcolorbox:function(){$("#myModal").foundation("reveal","close")},initializeModal:function(a){var e=void 0!=a?a:"myModal";if(0==$("#"+e).size()){var l=null;l=0==$("#widget-layout").size()?$("body"):$("#widget-layout"),l.prepend('<div id="'+e+'" style="padding-right:0px !important;" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"></div>')}},revealModal:function(a){if(o.initializeModal("myModal"),"undefined"==typeof a.iframe)jQuery.get(a.url,function(e){"undefined"!=typeof a.showcallback&&$("#myModal").on("shown.bs.modal",a.showcallback),"undefined"!=typeof a.hidecallback&&$("#myModal").on("hide.bs.modal",a.hidecallback),$("#myModal").html(e).modal("show")});else{var e="",l="";"undefined"==typeof a.hideheader?e='<div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title" id="myModalLabel"><span class="material-icons">info</span>'+("undefined"==typeof a.title?"":a.title)+"</h4></div>":l=("undefined"==typeof a.title?"":"<b>"+a.title+"</b>")+'<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';var t="undefined"==typeof a.modalbodyclass?"":" "+a.modalbodyclass;$("#myModal").html('<div class="modal-dialog modal-lg"><div class="modal-content">'+e+'<div class="modal-body'+t+'">'+l+'<iframe src="'+a.url+'" frameborder="0" style="width:100%" height="'+a.height+'" /></div></div></div>').modal("show")}}};a.exports=o}});