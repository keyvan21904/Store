$(document).ready(function() {

		// $("li.tab").click(function() {
		// 	if (typeof $(this).data('tab') == 'undefined') {
		// 		return false;
		// 	}

		// 	$('li.tab').removeClass('active');
		// 	$(this).addClass('active');
		// 		$(".tab-content").addClass('display-none');
		// 	console.log($(this).data('tab'),'.tab-content[data-tab="' + $(this).data('data-tab') + '"]');
		// 	$('.tab-content[data-tab="' + $(this).data('tab') + '"]')
		// 		.removeClass('display-none');		
				
		// });
		

		//$(".terms").hide();
		$("#b1")
			.click(function() {
				
			});

			$("#b1").mouseenter(function() {
				
				$("#b1").css({'color': 'red'});
			});
			
			$("#b1").mouseleave(function() {
				/* Act on the event */
				$("#b1").css({'color': 'black'});
			});

			$("#b1").mousedown(function() {
				/* Act on the event */
				$("#b1").css({
					'background-color':'#333'
				});
			});
			$("#b1").mouseup(function() {
				/* Act on the event */
				$("#b1").css('background-color', 'white');
			});
			

			// $("input").css({
			// 	"background":'#a7a7a7';
			// 	"border-width":"1px";
			// 	"border-style":"solid";
				
			// });
			// $("input").focus(function() {
			// 	/* Act on the event */
			// 	$(this).css('background','#eee');
			// });

			// $("input").blur(function() {
			// 	/* Act on the event */
			// 	$(this).css('background', '');
			// });
			console.log('hellow');



	});