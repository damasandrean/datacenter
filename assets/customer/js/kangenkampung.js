function preview_detail(image){
	$('#preview-detail').attr('src', $('#'+image).attr('src'));
}


// Instantiate EasyZoom instances
		// var $easyzoom = $('.easyzoom').easyZoom();
		// var api1 = $easyzoom.data("easyZoom");

$( document ).ready(function() {
   $(".open-overlay").click(function(){
    	 $('#overlay').css('display','block');
	});
	$(".close-overlay").click(function(){
    	  $('#overlay').css('display','none');
	});
});



$( ".dropdown_product_cat" ).change(function() {
  $('#overlay').css('display','none');
  window.location.href = 'list.php';
});

$( ".logo-header" ).click(function() {
   window.history.back();
});


$( ".next-payment" ).click(function() {
	$('.step-one').hide();
	$('.step-two').show();
});

$( ".back-payment" ).click(function() {
	$('.step-one').show();
	$('.step-two').hide();
});


// Dropdown if login , if profile clicked 
// function detail_profil(id) {
// 	if(id == "1"){
// 		document.getElementById("myDropdown").classList.toggle("show");
// 		$('#overlay').css('display','block');
// 	}
  
// }

// function cart_dropdown(id) {
// 	if(id == "1"){
// 			document.getElementById("cart_dropdown").classList.toggle("show");
// 		$('#overlay').css('display','block');
// 	}
  
// }

// // Close the dropdown if the user clicks outside of it
// window.onclick = function(event) {
//   if (!event.target.matches('.dropbtn')) {
//     var dropdowns = document.getElementsByClassName("dropdown-content");
//     var i;
//     for (i = 0; i < dropdowns.length; i++) {
//       var openDropdown = dropdowns[i];
//       if (openDropdown.classList.contains('show')) {
//         openDropdown.classList.remove('show');
//         $('#overlay').css('display','none');
//       }
//     }
//   }
// }


// function category_dropdown(id) {
//   if(id == "1"){
//       document.getElementById("category_dropdown").classList.toggle("show");
//     $('#overlay').css('display','block');
//     alert("try")
//   }
  
// }

// // Close the dropdown if the user clicks outside of it
// window.onclick = function(event) {
//   if (!event.target.matches('.dropbtn')) {
//     var dropdowns = document.getElementsByClassName("dropdown-content");
//     var i;
//     for (i = 0; i < dropdowns.length; i++) {
//       var openDropdown = dropdowns[i];
//       if (openDropdown.classList.contains('show')) {
//         openDropdown.classList.remove('show');
//         $('#overlay').css('display','none');
//       }
//     }
//   }
// }


$(window).on("scroll", function () {
   if ($(this).scrollTop() > 400) {
    $('.navbar-header').hide();
    $('.appointment').hide();
   } else {
   	 $('.navbar-header').show();
   	 $('.appointment').show();
   }
});


function search(){
   $('#after_search').toggle();
}


$('#myCarousel').carousel({
 
})

$('.carousel .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));
   
});



function parseDate(str) {
    var mdy = str.split('-');
    return new Date(mdy[2], mdy[0]-1, mdy[1]);
}

function datediff(start, end) {
    // Take the difference between the dates and divide by milliseconds per day.
    // Round to nearest whole number to deal with DST.

     var startDay = new Date(start);
     var endDay = new Date(end);
     var millisecondsPerDay = 1000 * 60 * 60 * 24;

     var millisBetween = endDay.getTime() - startDay.getTime();
     var days = millisBetween / millisecondsPerDay;
     return Math.floor(days);
    // return Math.round((second-first)/(1000*60*60*24));
}






