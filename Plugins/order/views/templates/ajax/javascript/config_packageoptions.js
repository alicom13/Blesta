	$(document).ready(function() {
		$("input[data-type='quantity']").each(function() {
			var input = $(this);
			if (input.attr("data-min") != "" && input.attr("data-max") != "") {
				var min = parseInt(input.attr("data-min"));
				var max = parseInt(input.attr("data-max"));
				var step = parseInt(input.attr("data-step") == "" ? 1 : input.attr("data-step"));
				var value = parseInt(input.val());
				if (value < min)
					value = min;
				if (value > max)
					value = max;
				
				$(input).slider({
					value: value,
					min: min,
					max: max,
					step: step,
					orientation: 'horizontal'
				}).on('slideStop', function(e) {
					fetchSummary();
				});

				// Show the text filed as a number field
				$(input).attr('type', 'number').attr('min', min).attr('max', max).attr('step', step).show();
				$(input).parent().find('label').addClass('d-block');
				$(input).on('change', function () {
					$(input).slider('setValue', $(this).val());
				});
			}
		});
	});