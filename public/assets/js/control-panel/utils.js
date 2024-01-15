// Base Url of Website

function base_url() {
    var getUrl = window.location;
    if (getUrl.host == "localhost") {
        var baseUrl =
            getUrl.protocol +
            "//" +
            getUrl.host +
            "/" +
            getUrl.pathname.split("/")[1] +
            "/";
    } else {
        var baseUrl = getUrl.protocol + "//" + getUrl.host + "/";
    }

    return baseUrl;
}

function show_madeby() {
	const devEncoded = 'TWFkZSBCeSBBYmR1bCBCYXNpdCBSYW5h';
	console.log("%c Info: "+atob(devEncoded), "background-color: blue; color:white; font-size:14px; padding: 10px 10px");
	return true;
}

function reload_js(src) {
	$('script[src="' + src + '"]').remove();
	$('<script>').attr('src', src).appendTo('head');
}
				
function stringToHTML (str) {
    const parser = new DOMParser();
    const doc = parser.parseFromString(str, 'text/html');
    return doc;
};

// Ajax Form

function ajaxForm(form, callbackBefore, callbackAfter, callbackError, optionsObj = {}) {
	let cbBefore = $(form).data('cbBefore');
	let cbAfter = $(form).data('cbAfter');
	let options = {
		beforeSubmit: function(arr, form, options) {
			
			let inputVal = form.find('[type=submit]:not(".fv-hidden-submit")').val();
			let buttonHtml = form.find('[type=submit]:not(".fv-hidden-submit")').html();
			$(form).find('[type=submit]:not(".fv-hidden-submit")').val('Please Wait...').html('Please Wait...').prop('disabled', true).data('val', inputVal).data('text', buttonHtml);

			if (callbackBefore !== undefined && typeof callbackBefore == 'function') {
				if (callbackBefore(form) === false) {
                    let input = $(form).find('[type=submit]:not(".fv-hidden-submit")');
                    $(form).find('[type=submit]:not(".fv-hidden-submit")').val(input.data('val')).html(input.data('text')).prop('disabled', false).removeClass('disabled');
                    return false
                }
			}
			if (window[cbBefore] !== undefined && typeof window[cbBefore] == 'function') {
				window[cbBefore](form);
			}
		},
		success: function(res, status, xhr, form) {
			let input = $(form).find('[type=submit]:not(".fv-hidden-submit")');
			$(form).find('[type=submit]:not(".fv-hidden-submit")').val(input.data('val')).html(input.data('text')).prop('disabled', false).removeClass('disabled');

			if (res.status == 'success') {

				input = $(form).find('input');

				input.removeClass('is-invalid');
				input.addClass('is-valid');

			}

			if (callbackAfter !== undefined && typeof callbackAfter == 'function') {
				callbackAfter(res, form);
			}
			if (window[cbAfter] !== undefined && typeof window[cbAfter] == 'function') {
				window[cbAfter](res, form);
			}

		},
		error: function(res) {
			let input = $(form).find('[type=submit]:not(".fv-hidden-submit")');
			$(form).find('[type=submit]:not(".fv-hidden-submit")').val(input.data('val')).html(input.data('text')).prop('disabled', false);
			$(form).find('[name] .invalid-feedback').remove();

			if (res.status === 419) {
				Swal.fire("Alert", 'Please Refresh the Page and Try Again.', 'error');
			}

			if (res.status === 422) {
				Swal.fire("Alert", 'The given data was invalid.', 'error');
				const errors = res.responseJSON.errors;

				$.each(errors, function (name, error) { 
					$(form).find('[name="'+name+'"]').nextAll('.invalid-feedback').remove();
					$(form).find('[name="'+name+'"]').nextAll('span.bar').after(`
						<div id="${name}-error" class="invalid-feedback">${error}</div>
					`);
					$(form).find('[name="'+name+'"]').removeClass('is-valid');							
					$(form).find('[name="'+name+'"]').addClass('is-invalid');
				});
				return;
			}


			if (callbackAfter !== undefined && typeof callbackAfter == 'function') {
				callbackAfter(res.responseJSON, form);
			}
			if (window[cbAfter] !== undefined && typeof window[cbAfter] == 'function') {
				window[cbAfter](res.responseJSON, form);
			}
		},
		...optionsObj
	};
	
	$(form).ajaxForm(options);
}

function reload() {	
	window.location.reload();
	// $.pjax.reload({container: '.page', timeout: 0});
}

function captalize(str) {
	const excludes = ['is','field','required.'];

	const words = str.split(" ");

	let sentence = '';

	$.each(words, function (i, word) {
		if (word.length > 0 && word !== '.') {
			const w = word.toLowerCase();

			if (!excludes.includes(w)) {
				sentence += w[0].toUpperCase() + w.slice(1) + ' ';
			} else {
				sentence += w + ' ';
			}
		} else if (word !== '.') {
			sentence += word;
		}
	});

	return sentence;
}


function format_number(parent) {
	if (parent) {
		$(parent).find('.format_number').formatNumber({comma_separator});
	} else {
		$('.format_number').formatNumber({comma_separator});
	}
}

// Format DateTime from Database

function formatDate (date,slice) {
	let d = date.toString();
	let splitDate;
	if (slice === undefined) {
		splitDate = d.slice(0, 15).split(' ');
	} else {
		splitDate = d.split(' ');
	}

	let day = splitDate[2];
	let month = splitDate[1];
	let year = splitDate[3];
  	return day+'/'+month+'/'+year;
}

function round(num,pre) {
    if( !pre) pre = 0;
    var pow = Math.pow(10,pre);
    return Math.round(num*pow)/pow;
}

function getCurrentRouteName() {
	return window.location.pathname.replaceAll('/','');
}
/**
 * @params {File[]} files Array of files to add to the FileList
 * @return {FileList}
 */
function FileListItems (files) {
	var b = new ClipboardEvent("").clipboardData || new DataTransfer()
	for (var i = 0, len = files.length; i<len; i++) b.items.add(files[i])
	return b.files
}


function checkEvent(element, evntType, handler = null) {
	const elemEvents = $._data(element, "events");

	const evts = elemEvents[evntType];
	let check = false;

	if (evts) {

		for (let i = 0; i < evts.length; i++) {

			if (evts[i].handler == handler || handler === null) {
				check = true;
				break;
			}

		}


	}
	return check;

}

// List Box Remove

function removeListBox(selector) {
	$(selector).next('.lbjs').next('p').next('p').remove();
	$(selector).next('.lbjs').next('p').remove();
	$(selector).next('.lbjs').remove();
}

function calcDays(start_date, end_date, format = "DD/MMM/YYYY") {
	const start = moment(start_date, format);
	const end = moment(end_date, format);

	return moment.duration(end.diff(start)).asDays();
}

function isMobileDevice() {
    // let check = false;
    // (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
    // return check;
	return ( window.innerWidth <= 480 ) 
}

function flash(e){
  $('.flash')
   .show()  //show the hidden div
   .animate({opacity: 0.5}, 300) 
   .fadeOut(300)
   .css({'opacity': 1});
}
// http://stackoverflow.com/questions/1933969/sound-effects-in-javascript-html5
const camera = ((new Audio()).canPlayType("audio/ogg; codecs=vorbis")==="") ? base_url() + 'assets/audio/camera-click.wav' : base_url() + 'assets/audio/camera-click.ogg';
const snd = new Audio(camera); // buffers automatically when created

function snapshoot() {
  snd.play();
}


function dataURItoBlob(dataURI) {
	// convert base64/URLEncoded data component to raw binary data held in a string
	let byteString;

	if (dataURI.split(',')[0].indexOf('base64') >= 0)
	byteString = atob(dataURI.split(',')[1]);
	else
	byteString = unescape(dataURI.split(',')[1]);

	// separate out the mime component
	const mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];

	// write the bytes of the string to a typed array
	const ia = new Uint8Array(byteString.length);

	for (var i = 0; i < byteString.length; i++) {
		ia[i] = byteString.charCodeAt(i);
	}

	return new Blob([ia], {
		type: mimeString
	});
}

function getDataUri(file) {
  return new Promise((resolve, reject) => {
    const reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = () => {
      let encoded = reader.result.toString();
    //   let encoded = reader.result.toString().replace(/^data:(.*,)?/, '');
    //   if ((encoded.length % 4) > 0) {
    //     encoded += '='.repeat(4 - (encoded.length % 4));
    //   }
      resolve(encoded);
    };
    reader.onerror = error => reject(error);
  });
}

async function resizeImage(file, MAX_SIZE) {
	console.log(file);
	const img = document.createElement("img");
	const canvas = document.getElementById('canvas');
	// img.style.display = 'none';
  	await loadImage(img, file);

  	let ctx = canvas.getContext("2d");
	ctx.drawImage(img, 0, 0);

	let width = img.width;
	let height = img.height;
	console.log(width);
	console.log(height);

    if (width > height) {
        if (width > MAX_SIZE) {
            height *= MAX_SIZE / width;
            width = MAX_SIZE;
        }
    } else {
        if (height > MAX_SIZE) {
            width *= MAX_SIZE / height;
            height = MAX_SIZE;
        }
    }
	console.log(MAX_SIZE);
	console.log(width);
	console.log(height);
	canvas.width = width;
	canvas.height = height;
	console.log(img);
	console.log(img.src);
  	ctx = canvas.getContext("2d");
	ctx.drawImage(img, 0, 0, width, height);

  	const dataurl = canvas.toDataURL("image/jpeg");
	console.log(dataurl);
	return dataurl;
}

function loadImage(img, file) {
    return new Promise((resolve) => {
        const reader = new FileReader();
        reader.onload = (e) => {
            img.onload = function () {
				resolve(true);
            };
            img.onerror = function () {
				resolve(false);
            };
            img.src = e.target.result;
        }
        reader.readAsDataURL(file);
    });
}
function makeid(length) {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
}
