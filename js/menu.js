// (function($) {          
//     $(document).ready(function(){                    
//         $(window).scroll(function(){                          
//             if ($(this).scrollTop() > 200) {
//                 $('#menu').fadeIn(500);
//             } else {
//                 $('#menu').fadeOut(500);
//             }
//         });
//     });
// })(jQuery);

window.addEventListener('DOMContentLoaded', function(e){
				document.querySelector('.nav.hamburger')
				.addEventListener('click', function(e){
				document.querySelector('.nav.menu').classList.toggle('aberto');
			}, false);
		}, false);