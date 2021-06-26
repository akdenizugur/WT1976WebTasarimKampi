<?php
session_start();
if (isset($_SESSION['unique_id'])) {
  header("location: users.php");
}
?>

<?php include_once "header.php"; ?>

<body>
  <div class="wrapper">
    <section class="form signup">
      <header>Gerçek Zamanlı Sohbet Uygulaması</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>İsim</label>
            <input type="text" name="fname" placeholder="" required>
          </div>
          <div class="field input">
            <label>Soyisim</label>
            <input type="text" name="lname" placeholder="" required>
          </div>
        </div>
        <div class="field input">
          <label>Email Adresi</label>
          <input type="text" name="email" placeholder="" required>
        </div>
        <div class="field input">
          <label>Şifre</label>
          <input type="password" name="password" placeholder="" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label>Resim seçin</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Mesajlaşmaya Başla">
        </div>
      </form>
      <div class="link">Zaten Üye misiniz? <a href="login.php">Giriş Yapın</a></div>
    </section>
  </div>

  <script src="js/pass-show-hide.js"></script>
  <script src="js/signup.js"></script>

</body>

</html>