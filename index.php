<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="client/assets/css/style.css" type="text/css">
</head>
<body>
    <h1>CONTACT US</h1>
    <div id="contact-request" class="contact-layout-request">
        <form name="frm-contact" id="frm-contact" action="server/mail.php" onsubmit="return validateForm()" method="POST">
            <span class="mandatory">[ <span class="red">*</span> Indicates mandatory fields ]</span>
            <div class="flex-wrapper mt-24">
                <div>
                    <label for="gender">Gender</label>
                    <select class="form-control" name="gender">
                        <option value="man" selected >Man</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div>
                    <label for="country">Country</label>
                    <select class="form-control" name="country">
                        <option value="AR">Argentina</option>
                        <option value="AU">Australia</option>
                        <option value="AT">Austria</option>
                        <option value="BE" selected>Belgium</option>
                        <option value="BR">Brazil</option>
                        <option value="CA">Canada</option>
                        <option value="CN">China</option>
                    </select>
                </div>
            </div>
            <div class="flex-wrapper mt-24">
                <div>
                    <label for="firstname">First Name</label><span class="red">*</span>
                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First name">
                    <span id="errFirstname" class="text-danger"></span>
                </div>
                <div>
                    <label for="lastname">Last Name</label><span class="red">*</span>
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name">
                    <span id="errLastname" class="text-danger"></span>
                </div>
            </div>
            <div>
                <label for="email">Email</label><span class="red">*</span>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                <span id="errEmail" class="text-danger"></span>
            </div>
            <div>
                <label for="subject">Subject</label>
                <select class="form-control mb-24" name="subject">
                    <option value="IT-Support" selected >IT Support</option>
                    <option value="Sales">Sales</option>
                    <option value="Exchange">Exchange</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div>
                <label for="message">Message</label><span class="red">*</span>
                <textarea id="message" name="message" placeholder="Message"></textarea>
                <span id="errMessage" class="text-danger"></span>
            </div>
            <input type="submit" id="submit" name="submit" value="Submit">
        </form>
    </div>

</body>
<script src="client/assets/js/script.js"></script>
</html>

