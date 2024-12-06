<div class="sign">
  <link rel="stylesheet" href="./assets/CSS/sign.css">
  <div class="sign-control">
    <p id="sign-error"><?=$error_msg?></p>
    <form action="" method="POST" id="f-signin">
      <h3>Masuk keTopUp Zone</h3>
      <input type="text" placeholder="Username" name="username" id="si-usn" required><br>
      <input type="password" placeholder="Password" name="password" id="si-pass" required><br>
      <input type="submit" value="Masuk" name="signIn">
      <div class="sign-choice">
        <span class="line"></span><p>atau</p><span class="line"></span>
      </div>
    </form>

    <form action="" method="POST" id="f-signup" hidden>
      <h3>Daftar keTopUp Zone</h3>
      <input type="text" name="username" placeholder="Username" id="su-usn" required><br>
      <input type="password" name="password" placeholder="Password" id="su-pass" required><br>
      <input type="password" name="cpass" placeholder="Confirm password" id="su-cpass" required><br>
      <input type="submit" value="Daftar" name="signUp">
      <div class="sign-choice">
        <span class="line"></span><p>atau</p><span class="line"></span>
      </div>
    </form>
    <button onclick="changeSignControl()" id="control-user">Belum mempunyai akun?</button>
    <p>*masuk atau daftar ke TopUp Zone untuk melihat riwayat transaksi</p>
  </div>
</div>
<script>
  let sign = document.querySelector(".sign");
  let signError = document.getElementById("sign-error");
  function changeSignControl(){
    signError.textContent="";
    if(sign.querySelector("#control-user").textContent=="Belum mempunyai akun?"){
      sign.querySelector("#si-usn").value = "";
      sign.querySelector("#si-pass").value = "";
      sign.querySelector("#f-signin").style.display = "none";
      sign.querySelector("#f-signup").style.display = "block";
      sign.querySelector("#control-user").textContent = "Sudah mempunyai akun?";
    }else{
      sign.querySelector("#su-usn").value = "";
      sign.querySelector("#su-pass").value = "";
      sign.querySelector("#su-cpass").value = "";
      sign.querySelector("#f-signin").style.display = "block";
      sign.querySelector("#f-signup").style.display = "none";
      sign.querySelector("#control-user").textContent = "Belum mempunyai akun?";
    }
  }
</script>