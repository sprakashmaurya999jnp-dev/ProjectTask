<html>
<head>
  <link rel="stylesheet" href="style.css">
<body>
  <div class="container">
    <form action="store.php" method="post">
      <?php
      if (isset($_GET['errors'])) {
        $errorData = $_GET['errors'];
      }
      if (isset($_REQUEST['message'])) {
        echo '<strong class="alert">' . $_REQUEST['message'] . '</strong>';
        
      } ?>
      <div class="login_box">
        <h1>Contact </h1>
        <div class="input_box">
          <input type="text" id="name" name="name">
          <label for="name"> Full Name </label>
          <span style="color:red; float:right;"><?php echo isset($errorData['name']) ? $errorData['name'] : '' ?></span>
        </div>
        <div class="input_box">
          <input type="number" id="number" name="phone_number" min="10" max="10">
          <label for="number">Phone Number</label>
          <span style="color:red; float:right;" ><?php echo isset($errorData['phone_number']) ? $errorData['phone_number'] : '' ?></span>
        </div>
        <div class="input_box">
          <input type="email" id="email" name="email">
          <label for="">Email</label>
          <span style="color:red; float:right;"><?php echo isset($errorData['email']) ? $errorData['email'] : ''  ?></span>
        </div>
        <div class="input_box">
          <input type="text" id="subject" name="subject">
          <label for="subject">Subject</label>
          <span style="color:red; float:right;"><?php echo isset($errorData['subject']) ? $errorData['subject'] : '' ?></span>
        </div>
        <div class="input_box">
          <label for="message">Message</label> </br>
          <textarea style="background-color:transparent; padding:10px; font-size:15px; color:black; font-weight:bold;" name="message" id="main"></textarea>
          <span style="color:red; float:right;"><?php echo isset($errorData['message']) ? $errorData['message'] : ''  ?></span>
        </div>
        <div class="btn">
          <button type="submit"> Submit </button>
        </div>
      </div>
    </form>
  </div>
</body>
</head>

</html>