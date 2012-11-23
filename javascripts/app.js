jQuery(document).ready(function ($) {

  /* Use this js doc for all application specific JS */
  /* UNCOMMENT THE LINE YOU WANT BELOW IF YOU WANT IE6/7/8 SUPPORT AND ARE USING .block-grids */
   // $('.block-grid.two-up>li:nth-child(2n+1)').css({clear: 'left'});
   // $('.block-grid.three-up>li:nth-child(3n+1)').css({clear: 'left'});
   // $('.block-grid.four-up>li:nth-child(4n+1)').css({clear: 'left'});
   // $('.block-grid.five-up>li:nth-child(5n+1)').css({clear: 'left'});

   function relative_time(time_value) {
       var values = time_value.split(" ");
       time_value = values[1] + " " + values[2] + ", " + values[5] + " " + values[3];
       var parsed_date = Date.parse(time_value);
       var relative_to = (arguments.length > 1) ? arguments[1] : new Date();
       var delta = parseInt((relative_to.getTime() - parsed_date) / 1000);
       delta = delta + (relative_to.getTimezoneOffset() * 60);

       var r = '';
       if (delta < 60) {
           r = 'a minute ago';
       } else if(delta < 120) {
           r = 'couple of minutes ago';
       } else if(delta < (45*60)) {
           r = (parseInt(delta / 60)).toString() + ' minutes ago';
       } else if(delta < (90*60)) {
           r = 'an hour ago';
       } else if(delta < (24*60*60)) {
           r = '' + (parseInt(delta / 3600)).toString() + ' hours ago';
       } else if(delta < (48*60*60)) {
           r = '1 day ago';
       } else {
           r = (parseInt(delta / 86400)).toString() + ' days ago';
       }

       return r;
   };

   String.prototype.linkify = function() {
       return this.replace(/[A-Za-z]+:\/\/[A-Za-z0-9-_]+\.[A-Za-z0-9-_:%&\?\/.=]+/, function(m) {
           return m.link(m);
       });
   };
   $.getJSON('https://api.twitter.com/1/statuses/user_timeline.json?screen_name=readlocalmag&count=4&callback=?', function(data){
     $.each(data, function(index, item){
       $('#twitter-feed, #sidebar-twitter').append('<div class="tweet"><p>' + item.text.linkify() + '</p><p><span class="twitter-time"><strong>' + relative_time(item.created_at) + '</strong></span></p></div>');

     });
   });

  $('.smaller-tiles').click(function(){
    $adjustablegrid = $('ul.adjustable-grid');
    $description = $('ul.block-grid div.featured-image-description p');
    $mediatypeimg = $('ul.block-grid img.article-icon');
    
    if($adjustablegrid.hasClass('one-up')){

      $('ul.adjustable-grid > li').animate({width:'50%'}, 600);
      $adjustablegrid.removeClass('one-up two-up three-up four-up ten columns centered');
      $description.css('font-size', '15px');
      $adjustablegrid.addClass('block-grid two-up');

    }else if($adjustablegrid.hasClass('two-up')){

      $('ul.adjustable-grid > li').animate({width:'33.33%'}, 600);
      $adjustablegrid.removeClass('two-up three-up four-up');
      $adjustablegrid.addClass('three-up');
      $('ul.adjustable-grid p').css('font-size', '12px');
      $('div.hover-over-wrapper hr').css('margin-top', '7px')
                                    .css('margin-bottom', '7px');
      $('div.hover-over-wrapper h6').css('margin-top', '2px');
      $('div.hover-over-wrapper h5').css('margin-top', '5px');
    }else if ($adjustablegrid.hasClass('three-up')){
      
      $('ul.adjustable-grid > li').animate({width:'25%'}, 600);
      $adjustablegrid.removeClass('two-up three-up four-up');
      $mediatypeimg.css('display', 'none');
      $description.css('font-size', '10px');
      $adjustablegrid.addClass('four-up');
    }else if($adjustablegrid.hasClass('four-up')){
      alert('Sorry, that\'s as small as they go');
    };    
  });

  $('.larger-tiles').click(function(){
    $adjustablegrid = $('ul.adjustable-grid'); 
    $description = $('ul.block-grid div.featured-image-description p');
    $mediatypeimg = $('ul.block-grid img.article-icon');

    if($('ul.one-up').hasClass('one-up')){
      alert("Sorry, that's as big as they go");
    }else if($adjustablegrid.hasClass('two-up')){
      
      $adjustablegrid.removeClass("two-up three-up four-up");
      $('ul.adjustable-grid > li').animate({width:'83.33%'}, 600);
      $adjustablegrid.addClass('one-up ten columns centered');

    }else if($adjustablegrid.hasClass('three-up')){
      $adjustablegrid.removeClass("two-up three-up four-up");
      $description.css('font-size', '15px');
      $adjustablegrid.addClass("two-up");
      $('ul.adjustable-grid > li').animate({width:'50%'}, 600);
    }else if($adjustablegrid.hasClass('four-up')){
      $adjustablegrid.removeClass("two-up three-up four-up");
      $description.css('font-size', '12px');
      $adjustablegrid.addClass("three-up");
      $('ul.adjustable-grid > li').animate({width:'33.33%'}, 600);
    };
   });

  $('.featured-image-description img.article-icon').click(function(){
    // alert("Clicked it");
    $('.hover-over-article').animate({opacity:'1'});
  });

  
  if( $(window).width() > 767 ){
    $("#menu-main-nav").sticky({topSpacing:52});
  }
});