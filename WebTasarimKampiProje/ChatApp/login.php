<?php
session_start();
if (isset($_SESSION['unique_id'])) {
  header("location: users.php");
}
?>

<?php include_once "header.php"; ?>

<body>
  <div class="wrapper">
    <section class="form login">
      <header>Gerçek Zamanlı Sohbet Uygulaması</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Email Adresi</label>
          <input type="text" name="email" placeholder="" required>
        </div>
        <div class="field input">
          <label>Şifre</label>
          <input type="password" name="password" placeholder="" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Sohbete Devam Et">
        </div>
      </form>
      <div class="link">Üye değil misiniz? <a href="index.php">Üye Olun</a></div>
    </section>
  </div>

  <script src="js/pass-show-hide.js"></script>
  <script src="js/login.js"></script>

</body>

</html>