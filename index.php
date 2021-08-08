<?php
	include("vendor/autoload.php");
	require("client/helper/helper.php");
	require("server/form_process.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>HP - Contact</title>
    <meta name="description" content="Hackers Poulette Help Center">

    <link rel="stylesheet" href="client/assets/css/reset.css" type="text/css">
    <link rel="stylesheet" href="client/assets/css/style.css" type="text/css">

    <script type="text/javascript">
        window.history.forward();
    </script>

</head>
<body>
<main>
    <section id="banner">
    <div id="title" class="title-section">
        <img class="logo" src="client/assets/img/logo.png" alt="Hackers Poulette">
        <h1>CONTACT US</h1>
    </div>
    </section>
    <section class="frm-layout">
    <div id="contact-request" class="contact-layout-request">
        <form name="frm-contact" id="frm-contact"  action="" method="POST">
            <p class="mandatory">[ <span class="red">*</span> Indicates mandatory fields ]</p>
            <div class="flex-wrapper mt-24">
                <div>
                    <label for="gender">Gender</label>
                    <select class="form-control" name="gender">
                      <?php foreach ($genders as $key => $gender) { ?>
                          <option value="<?= $key; ?>" <?php if ($key === 'Man') echo "selected"; ?> ><?= $gender; ?></option>
                      <?php } ?>
                    </select>
                </div>
                <div>
                    <label for="country">Country</label>
                    <select class="form-control" name="country" id="country">
                      <?php foreach ($countries as $key => $country) { ?>
                          <option value="<?= $key; ?>" <?php if ($key === 'BE') echo "selected"; ?> ><?= $country; ?></option>
                      <?php } ?>
                    </select>
                </div>
            </div>
            <div class="flex-wrapper mt-16">
                <div>
                    <label for="firstname">First Name</label><span class="red">*</span>
                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First name"
                           value="<?php if(isset($_POST['firstname'])){ echo htmlentities($_POST['firstname']);}?>"
                    >
                    <p id="firstname_error" class="error"></p>
                    <p class="error"><?= $errors['firstname'] ?></p>
                </div>
                <div>
                    <label for="lastname">Last Name</label><span class="red">*</span>
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name"
                           value="<?php if(isset($_POST['lastname'])){ echo htmlentities($_POST['lastname']);}?>"
                    >
                    <p id="lastname_error" class="error"></p>
                    <p class="error"><?= $errors['lastname'] ?></p>
                </div>
            </div>
            <div>
                <label for="email">Email</label><span class="red">*</span>
                <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                       value="<?php if(isset($_POST['email'])){ echo htmlentities($_POST['email']);}?>"
                >
                <p id="email_error" class="error"></p>
                <p class="error"><?= $errors['email'] ?></p>
            </div>
            <div>
                <label for="subject">Subject</label>
                <select class="form-control mb-24" name="subject">
                  <?php foreach ($subjects as $key => $subject) { ?>
                      <option value="<?= $key; ?>" <?php if ($key === 'IT Support') echo "selected"; ?> ><?= $subject; ?></option>
                  <?php } ?>
                </select>
                </select>
            </div>
            <div>
                <label for="message">Message</label><span class="red">*</span>
                <textarea id="message" name="message" placeholder="Message"><?php if(isset($_POST['message'])){ echo htmlentities($_POST['message']);} ?></textarea>
                <p id="message_error" class="error"></p>
                <p class="error"><?= $errors['message'] ?></p>
            </div>
            <input type="submit" id="btn-submit" name="btn-submit" value="Submit">

          <!--<//?php if ($message_success !== '') { ?>-->
              <div class="success"><?= $result['success']; ?></div>
            <!--</?php } ?>-->
						<!--</?php if ($message_error !== '') { ?>-->
              <div class="failed"><?= $result['failed']; ?></div>
						<!--</?php } ?>-->
        </form>
			</div>
			</section>
	</main>
	</body>
	<script src="client/assets/js/rules.js"></script>
	<script src="client/assets/js/errors.js"></script>
	<script src="client/assets/js/main.js"></script>
	</html>

