@extends('frontend.layouts.app')


@section('content')

<?php
$isMob  = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));

// BREADCRUMB

$breadcrumb = true;
$image_url = 'assets/img/breadcrumb/contact-us.jpg';
$title = 'Contact Us';
$home_text = "Home";
$current_page = "Contact Us";
$position = $isMob ? 'center right' : 'center';

// END

// PHP MAILER


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

if (isset($_POST['action'])) {

	if ($_POST['action'] == 'contact-us') {
		$error = false;

		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$message = $_POST['message'];

		$message = $_POST['message'];
		$bot_check = $_POST['important_field'];

		if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($phone) && !empty($message) && empty($bot_check)) {
			require './includes/PHPMailer/src/Exception.php';
			require './includes/PHPMailer/src/PHPMailer.php';
			require './includes/PHPMailer/src/SMTP.php';


			try {
				$mail = new PHPMailer(true);
				//Server settings
				// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
				$mail->isSMTP();                                                //Send using SMTP
				$mail->Host = 'mail.archistone.com';                     //Set the SMTP server to send through
				$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
				$mail->Username   = 'contact-us-page@archistone.com';                     //SMTP username
				$mail->Password   = '8pIVawL8w7Q5yh6R';                               //SMTP password
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
				$mail->Port       = 587;    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

				$mail->SMTPOptions = [
					'ssl' => [
						'verify_peer' => false,
						'verify_peer_name' => false,
						'allow_self_signed' => true
					]
				];

				//Recipients
				$mail->setFrom('contact-us-page@archistone.com', 'Contact Form');
				$mail->addReplyTo($email, $name);

				$mail->addAddress('info@archistone.com', 'Opulent Interior');     //Add a recipient

				//Content
				$mail->isHTML(true);                                  //Set email format to HTML
				$mail->Subject = 'From Opulent Interior Website Contact Us Page';
				$mail->Body    = '
                    <p><strong>Name:</strong> ' . $first_name . ' ' . $last_name . '</p>
                    <p><strong>Email:</strong> ' . $email . '</p>
                    <p><strong>Phone Number:</strong> ' . $phone . '</p>
                    <p><strong>Message:</strong> </p>
                    <p>' . $message . '</p>
                ';

				if ($mail->send()) {
					$error = false;
					$msg = 'Message has been sent';
				}
			} catch (Exception $e) {
				echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
				die;
			}
		} else {
			$error = 'Message could not be sent';
		}
	}
}


// END

?>

<?php if ($breadcrumb) : ?>
	<div class="breadcrumb breadcrumb-wrapper" style="background-image: url({{ url($image_url) }}); background-position: <?= $position ?>">
		<div class="black-bg">
			<h3 class="title"><?= $title ?></h3>
			<p class="breadcrumb_text"><a href="{{ url('/') }}"><?= $home_text ?></a> &nbsp; / &nbsp; <a href="#"> <?= $current_page ?></a> </p>
		</div>
	</div>
<?php endif ?>

<div class="bs-container">
	<div class="contact_form_section section-pt">
		<div class="top_section">
			<div class="grid md:grid-cols-12 mb-16 text-black section-mb gap-10">
				<div class="md:col-span-4 wow animate__fadeInLeft">
					<div class="flex flex-col items-center bg-white text-white rounded-lg md:h-72 h-60 border-2 border-gold justify-center p-10">
						<i class="fas fa-home text-4xl text-gold mb-4"></i>
						<h1 class="text-[20px] font-semibold text-goldDark mb-3">ADDRESS :</h1>
						<p class="text-center text-[14px] text-black font-semibold">62 22nd St - Al Quoz - Al Quoz Industrial Area 3 - Dubai, United Arab Emirate</p>
					</div>
				</div>
				<div class="md:col-span-4 wow animate__fadeInUp">
					<div class="flex flex-col items-center bg-white text-white rounded-lg md:h-72 h-60 border-2 border-gold justify-center">
						<i class="fas fa-phone-alt text-4xl text-gold mb-4"></i>
						<h1 class="text-[20px] font-semibold text-goldDark mb-3">PHONES :</h1>
						<a href="tel:+971523014846">
							<p class="text-center text-[14px] text-black font-semibold"> (+971) 52 301 4846 </p>
						</a>
					</div>
				</div>
				<div class="md:col-span-4 wow animate__fadeInRight">
					<div class="flex flex-col items-center bg-white text-white rounded-lg md:h-72 h-60 border-2 border-gold justify-center">
						<i class="far fa-envelope text-4xl text-gold mb-4"></i>
						<h1 class="text-[20px] font-semibold text-goldDark mb-3">E-MAIL :</h1>
						<a href="mailto:info@archistone.ae">
							<p class=" text-[14px] text-black font-semibold">info@archistone.ae</p>
						</a>
					</div>
				</div>
			</div>
			<h1 class="section-heading  text-black text-center mb-12 wow animate__jackInTheBox">Get In <span class="text-gradient-dark"> Touch</span></h1>
			<div class="grid md:grid-cols-12 gap-14 md:px-12 px-0 items-center">
				<div class="md:col-span-6">
					<div class="contact_us_form flex flex-col items-center">
						<!-- <form class="form w-full grid grid-cols-2 gap-6 items-center" action="contact-us.php" method="POST"> -->
						<form class="form w-full grid grid-cols-2 gap-6 items-center" action="contact-us.php">
							<div class="block contact-msg-cont">
								<?php if (isset($error)) : ?>

									<?php if ($error == false && !empty($msg)) : ?>
										<div class="contact-msg bg-green-200 rounded-lg py-5 px-6 mb-4 text-base text-gold-900 mb-3" role="alert">
											<p> <?= $msg ?> </p>
											<i class="close-btn far fa-times"></i>
										</div>
									<?php elseif ($error != false) : ?>
										<div class="contact-msg bg-red-100 rounded-lg py-5 px-6 mb-4 text-base text-red-700 mb-3" role="alert">
											<p> <?= $error ?></p>
											<i class="close-btn far fa-times"></i>
										</div>
									<?php endif; ?>

								<?php endif; ?>
							</div>
							<div class="form-control md:col-span-1 col-span-2 wow animate__fadeInUp">
								<input type="text" name="first_name" placeholder="First Name *" required id="firstName" class="form-input">
								<label for="firstName" class="form-label">First Name *</label>
							</div>
							<div class="form-control md:col-span-1 col-span-2 wow animate__fadeInUp">
								<input type="text" name="last_name" placeholder="Last Name *" required id="lastName" class="form-input">
								<label for="lastName" class="form-label">Last Name *</label>
							</div>
							<div class="form-control col-span-2 wow animate__fadeInUp">
								<input type="text" name="email" placeholder="Email *" id="email" class="form-input">
								<label for="email" class="form-label">Email *</label>
							</div>
							<div class="form-control col-span-2 wow animate__fadeInUp">
								<input type="text" name="phone" placeholder="Phone *" id="phone" class="form-input">
								<label for="phone" class="form-label">Phone *</label>
							</div>
							<div class="form-control col-span-2 w-full wow animate__fadeInUp">
								<textarea class="form-input" name="message" id="message" rows="3" placeholder="Message *"></textarea>
								<label for="message" class="form-label form-label-msg">Message *</label>
							</div>

							<input type="hidden" name="important_field" value="">
							<input type="hidden" name="action" value="contact-us">
							<div class="col-span-2 wow animate__fadeInUp">
								<button type="submit" class="website_btn_black btn_effect" title="Submit"><span>Submit</span></button>
							</div>
						</form>
					</div>
				</div>
				<div class="md:col-span-6 flex flex-col wow animate__fadeInRight">
					<img class="w-full md:h-full h-52 object-cover" src="{{ url('assets/img/contact-us/1.webp') }}">
				</div>
			</div>
		</div>
	</div>
</div>

<!-- 
<section class="section-fixed section-pb">
	<div class="fixed-bg section-py" style="background-image: url('{{ url('/') }}assets/img/fixed/1.jpg');background-position: center;">
		<div class="bs-container">
		</div>
	</div>
</section> -->


<div class="section-map section-py" id="section-map">
	<div class="bs-container">
		<h1 class="section-heading text-black text-center mb-12 wow animate__jackInTheBox">Find Us <span class="text-gradient-dark"> Here</span></h1>
		<div class="wow animate__fadeInRight">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28898.303011316464!2d55.1819897743164!3d25.125956499999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f6bdad4474add%3A0x7f2068a75244e865!2sARCHISTONE%20(L.LC)!5e0!3m2!1sen!2sus!4v1689319527133!5m2!1sen!2sus" width="100%" height="<?= $isMob ? '250' : '480' ?>" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
	</div>
</div>


@endsection