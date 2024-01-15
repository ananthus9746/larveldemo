(function ($) {
	
	$.fn.formatNumber = function ($options) {

		var settings = $.extend({

			comma_separator : 'international' // or subcontinent
		
		}, $options);
		
	    function formatInSubContinent(num) {
            input = num;
            var n1, n2;
            num = num + '' || '';
            // works for integer and floating as well
            n1 = num.split('.');
            n2 = n1[1] || null;
            n1 = n1[0].replace(/(\d)(?=(\d\d)+\d$)/g, "$1,");
            num = n2 ? n1 + '.' + n2 : n1;
            return num;
	    }
	    function formatInInternational(num) {
            input = num;
            var n1, n2;
            num = num + '' || '';
            // works for integer and floating as well
            n1 = num.split('.');
            n2 = n1[1] || null;
            n1 = n1[0].replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");;
            num = n2 ? n1 + '.' + n2 : n1;
            return num;
	    }
		return this.each(function() {

			let number;
			let original_number;

			if ($(this).is(':input')) 
				original_number = Number($.trim($(this).val()));
			else 
				original_number = Number($.trim($(this).text()));
			
			console.log(original_number);
			
			// console.log(String(original_number).indexOf(',') !== -1);
			// console.log(String(original_number).includes(','));
			if (String(original_number).includes(',')) {
				return original_number;
			}

			if (settings.comma_separator == 'international') {
				number = formatInInternational(original_number);
			}
			if (settings.comma_separator == 'subcontinent') {
				number = formatInSubContinent(original_number);
			}

			if ($(this).is(':input')) 
				$(this).val(number);
			else 
				$(this).text(number);

		});

	}

}(jQuery));