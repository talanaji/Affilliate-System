/*global $, alert, console */

$(document).ready( function(){
   
    'use strict';
    
    $(".search").keyup(function () {
    var searchTerm = $(".search").val();
    var listItem = $('.results tbody').children('tr');
    var searchSplit = searchTerm.replace(/ /g, "'):containsi('")
    
  $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
        return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
    }
  });
    
  $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','false');
  });

  $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
    $(this).attr('visible','true');
  });

  var jobCount = $('.results tbody tr[visible="true"]').length;
    $('.counter').text(jobCount + ' item');

  if(jobCount == '0') {$('.no-result').show();}
    else {$('.no-result').hide();}
		  });
    
    
    // button click
    
    
    //window appearing
    
    $(".certifications").on("click", function(){
       
        $(".window").addClass("scale");
        
    });
    
    $(".window .fa-times").on("click", function(){
       
        $(".window").removeClass("scale");
        
    });
    
    
    $(".layer , footer").append("<p class='text-center'> Designed by <a href='https://khamsat.com/user/%D9%88%D8%B3%D9%8A%D9%85-%D8%AC%D9%85%D8%A7%D9%84-%D8%A7%D9%84%D8%AF%D8%B3%D9%88%D9%82%D9%89' class='distinict' target='parent'> Wasem gamal          </a>   </p>");
    
});