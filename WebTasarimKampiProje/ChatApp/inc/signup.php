<?php
session_start();
include_once "config.php";
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
    //kullanıcı e-postasının geçerli olup olmadığını kontrol et
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) { //e-posta geçerliyse
        //e-postanın veritabanında zaten var olup olmadığını kontrol et
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
        if (mysqli_num_rows($sql) > 0) {
            echo "$email - Bu e-posta zaten var";
        } else {
            //kullanıcı dosya yüklememişse
            if (isset($_FILES['image'])) { // dosya yüklendiyse
                $img_name = $_FILES['image']['name']; // kullanıcı tarafından yüklenen resmin adı
                $img_type = $_FILES['image']['type']; // kullanıcı tarafından yüklenen resmin türü
                $tmp_name = $_FILES['image']['tmp_name']; // kullanıcı tarafından yüklenen resmin dosya yolu

                $img_explode = explode('.', $img_name); //jpg ve png gibi dosya türüün uzantısını al
                $img_ext = end($img_explode); //burada kullanıcı tarafından yüklenen bir resim dosyasının uzantısını alıyoruz

                $extensions = ["jpeg", "png", "jpg"]; //bunlar bazı geçerli img uzantıları ve bunları dizide saklıyoruz
                if (in_array($img_ext, $extensions) === true) {
                    $types = ["image/jpeg", "image/jpg", "image/png"];
                    if (in_array($img_type, $types) === true) { //eğer kullanıcı tarafından yüklenen img ext herhangi bir dizi uzantısıyla eşleşirse
                        $time = time(); //bu bize şimdiki zamanı döndürecek
                        //bu zamana ihtiyacımız var çünkü kullanıcı img'yi klasörümüze yüklediğinizde, kullanıcı dosyasını şimdiki zamanla yeniden adlandırıyoruz
                        //böylece tüm imaj dosyası benzersiz bir ada sahip olacak
                        $new_img_name = $time . $img_name; //kullanıcının yüklediği img'yi özel klasörümüze taşıyalım
                        if (move_uploaded_file($tmp_name, "images/" . $new_img_name)) { //eğer kullanıcı img yüklediyse klasörümüze başarıyla taşıyın
                            $ran_id = rand(time(), 100000000); //kullanıcı için rastgele kimlik oluşturma
                            $status = "Çevrimiçi"; //kullanıcı kaydolduktan sonra durumu şimdi aktif olacak
                            $encrypt_pass = md5($password);
                            $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                VALUES ({$ran_id}, '{$fname}','{$lname}', '{$email}', '{$encrypt_pass}', '{$new_img_name}', '{$status}')");
                            if ($insert_query) {
                                //tüm kullanıcı verilerini tablonun içine yerleştirelim
                                $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                if (mysqli_num_rows($select_sql2) > 0) {
                                    $result = mysqli_fetch_assoc($select_sql2);
                                    $_SESSION['unique_id'] = $result['unique_id'];
                                    echo "success";
                                } else {
                                    echo "Bu e-posta adresi mevcut değil";
                                }
                            } else {
                                echo "Bir şeyler yanlış gitti. Lütfen tekrar deneyin";
                            }
                        }
                    } else {
                        echo "Lütfen bir resim dosyası yükleyin - jpeg, png, jpg";
                    }
                } else {
                    echo "Lütfen bir resim dosyası yükleyin - jpeg, png, jpg";
                }
            }
        }
    } else {
        echo "$email geçerli bir e-posta değil";
    }
} else {
    echo "Tüm giriş alanları zorunludur";
}
