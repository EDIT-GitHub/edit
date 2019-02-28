
jQuery(document).ready(function ( $ ) {

//   var slickSlider = jQuery('#slick-slider');
//   if(slickSlider.length>0){
//    jQuery("#slick-slider").slick({
//     dots: false,
//     infinite: true,
//     autoplay: true,
//     autoplaySpeed: 1500,
//     speed: 800,
//     slidesToShow: 1,
//     nextArrow: '<i class="fa fa-chevron-right slick-next"></i>',
//     prevArrow: '<i class="fa fa-chevron-left slick-prev"></i>',
//   });
//  }
//  var slickSlider2 = jQuery('#slick-slider2');
//  if(slickSlider2.length>0){
//    jQuery("#slick-slider2").slick({
//     dots: true,
//     infinite: true,
//     autoplay: true,
//     autoplaySpeed: 1500,
//     speed: 800,
//     slidesToShow: 1
//   });
//  }

 jQuery('.nav-profissoes .menu-item-link').on('click', function(e) {
    e.preventDefault(); // prevent hard jump, the default behavior

     var $target = jQuery(this.hash); // Set the target as variable
     var $targetOffset;
     var href = jQuery(this).attr('href');

     if (href == "#bloco4") {
      $targetOffset = $target.position().top - 150;
    } else {
     $targetOffset = $target.position().top - 100;
   }

    // if target is valid, scroll to
    if($target && $targetOffset != ''){
     jQuery('html, body').animate({
      scrollTop: $targetOffset
    }, {
     easing: 'easeInOutQuart',
     duration: 850,
     complete: function(){
     }
   });
   } 
 });

 jQuery('.nav-profissoes').attr('nav-number', function (index) {
  return index + 1;
});

 jQuery(window).scroll(function() {

  var scrollDistance = jQuery(window).scrollTop();

   // Assign active class to nav links while scolling
   jQuery('.bloco-js').each(function(i) {

     var position = jQuery(this).position().top;
     var positionTop = position - 185;

     if (positionTop <= scrollDistance) {
       jQuery(".nav-count a").html(i+1);
       jQuery('.nav-profissoes.selected').removeClass('selected');
       jQuery('.nav-profissoes').eq(i).addClass('selected');
     }
   });

 }).scroll();


 var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ? true : false;

 if(!isMobile) {

   classImage = jQuery(".block-profissoes-formacao .filters-holder .filter .multifilter-container .optgroup-container ul li");
   jQuery(classImage).prepend('<div class="image"></div>');

   jQuery(classImage).click(function() {
    jQuery('html, body').animate({
      scrollTop: jQuery(".filtered-content").offset().top - 280
    }, 500);
  });

 }


 function moveProgressBar(index) {

  var pBar = jQuery('.pbar-js');
  var progressbar = jQuery(pBar[index]).find('.progressbar'),
  getprogressvalue = jQuery(pBar[index]).find('.progressbar').attr('value'),
  progressvalue = getprogressvalue - 1,
  progressLabel = jQuery(pBar[index]).find('.progress-label'),
  addColor = jQuery(pBar[index]).find('.cor-js');


  function progress() {
    var val = progressbar.progressbar( "value" ) || 0;
    progressbar.progressbar( "value", val + 1 )

    if ( val < progressvalue ) {
      setTimeout( progress, 10 );

    }
  }

  setTimeout( progress, 10 );

  progressbar.progressbar({

   change: function() {
     var progressSoFar = progressbar.progressbar( "value" );  
     addColor.slice(0, progressSoFar ).addClass('cor-amarelo');
     progressLabel.text( progressbar.progressbar( "value" ) + "%" );
   }
 });
};


var pBar = jQuery('.pbar-js');
if(pBar.length>0){
  this.isWaypoint = new Waypoint({
    element: pBar[0],
    offset: '90%',
    handler: function(direction) {
      // set manual index 
      moveProgressBar(0);
      this.destroy();
    }
  })
}

var pBar = jQuery('.pbar-js');
if(pBar.length>1){
  this.isWaypoint = new Waypoint({
    element: pBar[1],
    offset: '90%',
    handler: function(direction) {
      moveProgressBar(1);
      this.destroy();
    }
  })
}

var pBar = jQuery('.pbar-js');
if(pBar.length>2){
  this.isWaypoint = new Waypoint({
    element: pBar[2],
    offset: '90%',
    handler: function(direction) {
      moveProgressBar(2);
      this.destroy();
    }
  })
}


var pBar = jQuery('.pbar-js');
if(pBar.length>3){
  this.isWaypoint = new Waypoint({
    element: pBar[3],
    offset: '90%',
    handler: function(direction) {
      moveProgressBar(3);
      this.destroy();
    }
  })
}

var vChart = jQuery('#vertical-chart');
if(vChart.length>0){
  this.isWaypoint = new Waypoint({
    element: vChart[0],
    offset: '50%',
    handler: function(direction) {
     jQuery(this.element).addClass('fadeIn'); 
     jQuery(this.element).find('.vertical-chart-toasted').addClass('animate'); 
     jQuery(this.element).find('.vertical-chart-toasted-top').addClass('animate'); 
     jQuery(this.element).find('.vertical-chart-toasted-top2').addClass('animate'); 
     jQuery(this.element).find('.vertical-chart-yellow').addClass('animate'); 
     jQuery(this.element).find('.vertical-chart-yellow-top').addClass('animate'); 
     jQuery(this.element).find('.vertical-chart-yellow-top2').addClass('animate'); 
     jQuery(this.element).find('.vertical-chart-black').addClass('animate'); 
     jQuery(this.element).find('.vertical-chart-black-top').addClass('animate'); 
     jQuery(this.element).find('.vertical-chart-black-top2').addClass('animate'); 
     jQuery(this.element).find('.vertical-chart-gray').addClass('animate'); 
     jQuery(this.element).find('.vertical-chart-gray-top').addClass('animate'); 
     jQuery(this.element).find('.vertical-chart-gray-top2').addClass('animate'); 
     jQuery(this.element).find('.text-js').addClass('fadeIn'); 
     this.destroy();
   }
 })
}

jQuery('.title.animated').waypoint(function() {
 jQuery(this.element).addClass('fadeIn'); 
}, { offset: '80%' });


function animateUxChart() {
  var box1 = jQuery(".pie-chart:eq(0)");
  jQuery(box1).removeClass('fade');
  clipTween1 = TweenLite.from(box1, 1, {
    clip:"rect(1000px 1000px 1000px 0px)",
    paused:false
  });
}

function animateUiChart() {
  var box1 = jQuery(".pie-chart:eq(1)");
  jQuery(box1).removeClass('fade');
  clipTween1 = TweenLite.from(box1, 1, {
    clip:"rect(1000px 1000px 1000px 0px)",
    paused:false
  });
}

var chartUX = jQuery('.graph-js');
if(chartUX.length>0){
  this.isWaypoint = new Waypoint({
    element: chartUX[0],
    offset: '70%',
    handler: function(direction) {
      animateUxChart();
      jQuery(chartUX[0]).find('.texto-js').addClass('fadeIn');
      this.destroy();
    }
  })
}

var chartUI = jQuery('.graph-js');
if(chartUI.length>0){
  this.isWaypoint = new Waypoint({
    element: chartUI[1],
    offset: '70%',
    handler: function(direction) {
      animateUiChart();
      jQuery(chartUI[1]).find('.texto-js').addClass('fadeIn');
      this.destroy();
    }
  })
}



var uxChartMobile = jQuery('.mobile-graph');
if(uxChartMobile.length>0){
  this.isWaypoint = new Waypoint({
    element: uxChartMobile[0],
    offset: '70%',
    handler: function(direction) {
      jQuery(uxChartMobile[0]).addClass('show');
      jQuery(uxChartMobile[0]).find('.texto-js2').addClass('animate');
      jQuery(uxChartMobile[0]).find('.texto-js').addClass('fadeIn');
      this.destroy();
    }
  })
}


var uiChartMobile = jQuery('.mobile-graph');
if(uiChartMobile.length>0){
  this.isWaypoint = new Waypoint({
    element: uiChartMobile[1],
    offset: '70%',
    handler: function(direction) {
     jQuery(uiChartMobile[1]).addClass('show');
     jQuery(uiChartMobile[1]).find('.texto-js').addClass('fadeIn');
     jQuery(uiChartMobile[1]).find('.texto-js2').addClass('animate');
     this.destroy();
   }
 })
}


var circleChart = jQuery('.circle-js');
if(circleChart.length>0){
  this.isWaypoint = new Waypoint({
    element: circleChart[1],
    offset: '80%',
    handler: function(direction) {
      jQuery(circleChart[1]).find('.texto').addClass('fadeInUp');
      jQuery(circleChart[1]).find('.subtitulo').addClass('fadeInUp');
      jQuery(circleChart[1]).find('.circle-chart').addClass('fadeIn');
      jQuery(circleChart[1]).find('.circulo').addClass('animate');
      jQuery(circleChart[1]).find('.circulo-pequeno-position').addClass('animate');
      jQuery(circleChart[1]).find('.circulo-pequeno').addClass('animate');
      this.destroy();
    }
  })
}


var circleChart = jQuery('.circle-js');
if(circleChart.length>0){
  this.isWaypoint = new Waypoint({
    element: circleChart[0],
    offset: '60%',
    handler: function(direction) {
      jQuery(circleChart[0]).find('.subtitulo').addClass('fadeInUp');
      jQuery(circleChart[0]).find('.texto').addClass('fadeInUp');
      jQuery(circleChart[0]).find('.circle-chart').addClass('fadeIn');
      jQuery(circleChart[0]).find('.circulo').addClass('animate');
      jQuery(circleChart[0]).find('.circulo-pequeno-position').addClass('animate');
      jQuery(circleChart[0]).find('.circulo-pequeno').addClass('animate');
      this.destroy();
    }
  })
}

var circleChart = jQuery('.circle-js');
if(circleChart.length>0){
  this.isWaypoint = new Waypoint({
    element: circleChart[2],
    offset: '60%',
    handler: function(direction) {
      jQuery(circleChart[2]).find('.subtitulo').addClass('fadeInUp');
      jQuery(circleChart[2]).find('.texto').addClass('fadeInUp');
      jQuery(circleChart[2]).find('.circle-chart').addClass('fadeIn');
      jQuery(circleChart[2]).find('.circulo').addClass('animate');
      jQuery(circleChart[2]).find('.circulo-pequeno-position').addClass('animate');
      jQuery(circleChart[2]).find('.circulo-pequeno').addClass('animate');
      this.destroy();
    }
  })
}

jQuery('.top-left').waypoint(function() {
 jQuery(this.element).addClass('fadeIn'); 
 jQuery(this.element).find('.linha').addClass('animate'); 
 jQuery(this.element).find('.texto-js').addClass('fadeInUpPiramide'); 
}, { offset: '70%' });


jQuery('.piramide-js').waypoint(function() {
 jQuery(this.element).addClass('fadeIn'); 
 jQuery(this.element).find('.linha').addClass('animate'); 
 jQuery(this.element).find('.texto-js').addClass('fadeInUpPiramide'); 
}, { offset: '50%' });

jQuery('.devices-svg').waypoint(function() { 
 jQuery(this.element).find('.line-devices-svg').addClass('animate');
 jQuery(this.element).find('.devices').addClass('animate');
 jQuery(this.element).find('#desktop').addClass('animate');
 jQuery(this.element).find('#laptop').addClass('animate');
 jQuery(this.element).find('#lapis').addClass('animate');
 jQuery(this.element).find('.line1-tablet').addClass('animate');
 jQuery(this.element).find('.line2-tablet').addClass('animate');
 jQuery(this.element).find('.line3-tablet').addClass('animate');
}, { offset: '55%' });


jQuery('.devices-svg-front-end').waypoint(function() { 
 jQuery(this.element).find('.line-devices-svg').addClass('animate');
 jQuery(this.element).find('.devices').addClass('animate');
 jQuery(this.element).find('#desktop').addClass('animate');
 jQuery(this.element).find('#laptop').addClass('animate');
}, { offset: '55%' });

jQuery('.alguns-dados-fwd-js:nth-child(even)').waypoint(function() {
 jQuery(this.element).addClass('fadeIn'); 
}, { offset: '50%' });

jQuery('.alguns-dados-fwd-js:nth-child(odd)').waypoint(function() {
 jQuery(this.element).addClass('fadeIn'); 
}, { offset: '60%' });

jQuery('.alguns-dados-js').waypoint(function() {
 jQuery(this.element).addClass('fadeInUp'); 
}, { offset: '70%' });

jQuery('.barras-fwd-js').waypoint(function() {
 jQuery(this.element).addClass('fadeIn'); 
}, { offset: '70%' });

jQuery('#front-end-barras').waypoint(function() { 
  jQuery(this.element).addClass('fadeIn'); 
  jQuery(this.element).find('#barra-fwd-amarelo').addClass('animate');
  jQuery(this.element).find('#barra-fwd-cinza').addClass('animate');
  jQuery(this.element).find('#barra-fwd-cinza2').addClass('animate');
  jQuery(this.element).find('#tubo-amarelo').addClass('animate');
  jQuery(this.element).find('#tubo-cinza').addClass('animate');
  jQuery(this.element).find('#laptop').addClass('animate');
}, { offset: '55%' });

jQuery('#front-end-barras-titles').waypoint(function() { 
  jQuery(this.element).addClass('fadeIn'); 
  jQuery(this.element).find('#designer').addClass('animate');
  jQuery(this.element).find('#front-end').addClass('animate');
  jQuery(this.element).find('#back-end').addClass('animate');
}, { offset: '55%' });

jQuery('#front-end-circles').waypoint(function() { 
  jQuery(this.element).find('.clip-path-circle-animation').addClass("remove"); 
  jQuery(this.element).find('.circle-animation').addClass('fadeIn animate'); 
  jQuery(this.element).find('.circle-animation2').addClass('fadeIn animate'); 
  jQuery(this.element).find('.clip-path-circle-animation2').addClass("remove"); 
  jQuery(this.element).find('.text-js').addClass('fadeIn'); 
  jQuery(this.element).find('.text-js2').addClass('fadeIn');
}, { offset: '55%' });

});
