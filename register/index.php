<?php

// $file_path = $_SERVER['DOCUMENT_ROOT'] . '/includes/db_templates.php';

// if (file_exists($file_path)) {
//     require_once($file_path);
// } else {
//     echo "Error: The file does not exist at path: $file_path";
// }

$file_path = $_SERVER['DOCUMENT_ROOT'] . '/includes/beforeIncludes.php';

if (file_exists($file_path)) {
    require_once($file_path);
} else {
    echo "Error: The file does not exist at path: $file_path";
}



?>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>Register - The Barracks</title>

	<!-- Use includes to insert snippets of code that will be reused in every page -->
	<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/headIncludes.php'; ?>
</head>

<body>
	<!-- The navbar won't change so insert it for a more consistant exprience -->
	<!-- TODO: figure out how to pass the active page to make it aria accessable -->
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/nav.php'; ?>


	<!-- Registration form -->
	<div class="container">
		<div class="row ">
			<!-- Header -->
			<div class="container-fluid">
				<div class="row">
					<h1 class="mt-3">Register</h1>
					<hr>
				</div>
			</div>
			<!-- Form elements -->
			<div class="d-flex col justify-content-center border border-end-0 p-3">

				<div class="container-fluid">
					<form class="form row g-3 needs-validation" method="POST" action="registration_processor.php"
						novalidate>
						<div id="col section1">
							<!-- Gather fullname -->
							<div class="row mb-3">
								<div class="col-sm">
									<input type="text" class="form-control" placeholder="First name"
										aria-label="First name" name="first_name" id="first_name" required>
								</div>
								<div class="col-sm">
									<input type="text" class="form-control" placeholder="Last name"
										aria-label="Last name" name="last_name" id="last_name" required>
								</div>
							</div>
							<!-- Gather Phone Number information -->
							<div class="row g-3">
								<div class="col">
									<div class="row">
										<!-- Get # -->
										<div class="col">
											<div class="input-group mb-3">
												<span class="input-group-text" id="basic-addon1">#</span>
												<input class="form-control" type="tel" placeholder="Phone Number"
													aria-label="Phone Number" id="phone_number" name="phone_number"
													required />
											</div>
										</div>
										<!-- Get Carrier -->
										<div class="col">
											<div class="input-group mb-3">
												<span class="input-group-text" id="basic-addon1">Cell Phone
													Carrier</span>
												<select id="carrier_name" class="form-select" required>
													<?php

					$carriers_list = array(
						"AT&T" => "@sms.myboostmobile.com",
						"Boost Mobile" => "@cspire1.com",
						"C-Spire" => "@mailmymobile.net",
						"Consumer Cellular" => "@txt.att.net",
						"Cricket" => "@sms.cricketwireless.net",
						"Google Fi" => "@msg.fi.google.com",
						"H20 Wireless" => "@txt.att.net",
						"MetroPCS" => "@mymetropcs.com",
						"Mint Mobile" => "@mailmymobile.net",
						"Red Pocket" => "@text.republicwireless.com",
						"Republic Wireless" => "@messaging.sprintpcs.com",
						"Page Plus" => "@vtext.com",
						"T-Mobile" => "@tmomail.net",
						"Ting" => "@message.ting.com",
						"Tracfone" => "@mmst5.tracfone.com",
						"US Cellular" => "@email.uscc.net",
						"Verizon Mobile" => "@vtext.com",
						"Visible" => "@vmobl.com",
						"Xfinity Mobile" => "@vtext.com"
					);

					foreach ($carriers_list as $carrier_name_value => $carrier_name) {
						echo "<option value='$carrier_name'>$carrier_name_value</option>";
					}

					?>
												</select>
											</div>
										</div>
										<!-- Submit this complete & parsed value -->
										<input value="" id="text_address" name="text_address" hidden />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="input-group mb-3">
									<span class="input-group-text" id="basic-addon1">@</span>
									<input class="form-control" type="text" name="username" id="username"
										placeholder="Username" aria-label="Username" required>
								</div>
							</div>
							<div class="row">
								<div class="input-group mb-3">
									<input type="file" class="form-control" id="profilepicture_upload"
										name="profile_picture" accept="image/png, image/jpeg, image/gif">
									<label class="input-group-text" for="profilepicture_upload">Upload Profile
										Picture</label>
								</div>
							</div>
							<!-- Button validates form so far and hides section1, then unhides section2 -->
							<button id="nextPage" class="btn btn-primary" type="button">
								Next Page
							</button>
							<div id="section2" hidden>
								<!-- instead of getting address use https://stackoverflow.com/questions/7905733/google-maps-api-3-get-coordinates-from-right-click ? -->
								<div class="col-md-6">
									<label for="inputPassword4" class="form-label">Password</label>
									<input type="password" class="form-control" id="inputPassword4">
								</div>
								<div class="col-12">
									<label for="inputAddress" class="form-label">Address</label>
									<input type="text" class="form-control" id="inputAddress"
										placeholder="1234 Main St">
								</div>
								<div class="col-12">
									<label for="inputAddress2" class="form-label">Address 2</label>
									<input type="text" class="form-control" id="inputAddress2"
										placeholder="Apartment, studio, or floor">
								</div>
								<div class="col-md-6">
									<label for="inputCity" class="form-label">City</label>
									<input type="text" class="form-control" id="inputCity">
								</div>
								<div class="col-md-4">
									<label for="inputState" class="form-label">State</label>
									<select id="inputState" class="form-select">
										<option selected>Choose...</option>
										<?php 

										?>
									</select>
								</div>
								<div class="col-md-2">
									<label for="inputZip" class="form-label">Zip</label>
									<input type="text" class="form-control" id="inputZip">
								</div>
								<div class="col-12">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="gridCheck">
										<label class="form-check-label" for="gridCheck">
											Check me out
										</label>
									</div>
								</div>
								<div class="valid-feedback">
									Looking good <span id="full_name"></span>
								</div>
								<div class="col-12">
									<button type="submit" class="btn btn-primary">Sign in</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>

			<!-- Preview elements (to be replaced once the appropriate values are put into the form -->
			<div class="d-flex col justify-content-center border-start-0 p-3">
				<div class="card text-center">
					<img src="https://randomuser.me/api/portraits/men/75.jpg"
						class="card-img-top rounded-circle d-flex justify-content-center" style="width: 16rem;">
					<div class="card-body">
						<h5 class="card-title" id="preview_user_name">
							John Doe
						</h5>
						<p class="card-text" id="preview_military">
							<span id="preview_user_branch">Army</span> &middot; <span class="preview_user_base">Fort
								Liberty, NC</span>
						</p>
						<h6 class="card-subtitle mb-2 text-secondary">Contact Information: </h6>
						<!-- href is the sms:+1<#> if on mobile, and if on desktop, mailto:<#>@<carrier gateway> -->
						<!-- https://developer.mozilla.org/en-US/docs/Web/API/NetworkInformation/type would be cool but not very supported -->
						<a class="card-text text-muted" id="preview_phone_number" href="">
							(123) 456-7890 &middot; AT&T
						</a>
						<h6 class="card-subtitle mb-2 text-secondary">Bio:</h6>
						<p class="card-text" id="preview_bio">
							Lorem ipsem dolor sit amet, consectetur adipiscing elit.
							Nulla vitae elit libero, a pharetra augue. Aenean
							lacinia bibendum nulla sed consectetur.
							Donec ullamcorper nulla.
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
	(() => {
		'use strict'

		// Fetch all the forms we want to apply custom Bootstrap validation styles to
		const forms = document.querySelectorAll('.needs-validation')

		// Loop over them and prevent submission
		Array.from(forms).forEach(form => {
			form.addEventListener('submit', event => {
				if (!form.checkValidity()) {
					event.preventDefault()
					event.stopPropagation()
				}

				form.classList.add('was-validated')

				// Update full name when the form is validated
				updateFullName()

				// Update the text_address field when the form is validated
				updateTextAddress()
			}, false)
		})
	})()



	// Update the full name field
	function updateFullName() {
		let name = document.getElementById("first_name").value + " " + document.getElementById("last_name").value;
		document.getElementById("full_name").innerHTML = name;
	}


	// Continuously update the text address field when either the carrier name or phone number changes
	document.getElementById("phone_number").addEventListener("change", updateTextAddress);

	function updateTextAddress() {
		let phone_number = document.getElementById("phone_number").value;
		let carrier_name = document.getElementById("carrier_name").value;
		let text_address = phone_number + carrier_name;

		document.getElementById("text_address").value = text_address;
	}


	// if it's a mobile device, user the sms protocol, otherwise use the mailto protocol

	window.mobileCheck = function() {
		let check = false;
		(function(a) {
			if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i
				.test(a) ||
				/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i
				.test(a.substr(0, 4))) check = true;
		})(navigator.userAgent || navigator.vendor || window.opera);
		return check;
	};
	</script>

</body>

</html>