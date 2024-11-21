<link rel="stylesheet" href="control-game.css">
<!-- tambah -->
<div class="control-game" id="add-game">
    <div class="ctrl-blur"></div>
    <div class="ctrl-content">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="right-me">
                <button id="add-game-close">&#10006;</button>
            </div>
            <h2>Tambah Produk</h2>
            <input type="text" name="id" id="id-game" hidden>
            <table>
                <tr>
                    <td><label for="category">Barang</label></td>
                    <td>:</td>
                    <td><select name="item" required>
                        <?php
                        $qGame = mysqli_query($mysqli, "SELECT * FROM tbl_barang");
                        while($dataG = mysqli_fetch_array($qGame)){
                            $tempid = $dataG['id_game'];
                            $qGame2 = mysqli_query($mysqli, "SELECT * FROM tbl_game WHERE id_game='$tempid'");
                            $qGname;
                            while($dataGG = mysqli_fetch_array($qGame2)){ $qGname=$dataGG['nama_game']; }
                        ?>
                        <option value="<?=$dataG["id_barang"]?>"><?=$qGname.'-'.$dataG["nama_barang"]?></option>
                        <?php }?>
                    </select></td>
                </tr>
                <tr>
                    <td><label for="category">Jumlah</label></td>
                    <td>:</td>
                    <td><input type="number" name="quantity" min="1" value="10" required></td>
                </tr>
                <tr>
                    <td><label for="category">Harga</label></td>
                    <td>:</td>
                    <td><input type="number" name="price" min="1" value="1000" required></td>
                </tr>
            </table>
            <p>*tanpa titik atau koma, hanya angka</p>
            <div class="right-me">
                <input type="submit" name="add" class="btn btn-success">
            </div>
        </form>
    </div>
    <script>
        document.getElementById("id-game").value = Date.now();
        const addgame = document.getElementById("add-game");
        document.getElementById("add-item-show").onclick = (event)=>{
            addgame.style.display = "flex";
        }
        document.getElementById("add-game-close").onclick = (event)=>{
            addgame.style.display = "none";
        }
    </script>
</div>

<!-- hapus -->
<div class="control-game" id="delete-game">
    <div class="ctrl-blur"></div>
    <div class="ctrl-content">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="right-me">
                <button id="delete-game-close">&#10006;</button>
            </div>
            <input type="text" name="id" id="delete-id" hidden>
            <h3 id="delete-title">Hapus?</h3>
            <div class="right-me">
                <input type="submit" name="delete" value="Hapus" class="btn btn-danger">
            </div>
        </form>
    </div>
    <script>
        const deletegame = document.getElementById("delete-game");
        document.getElementById("delete-game-close").onclick = (event)=>{
            deletegame.style.display = "none";
        }
        function deleteItemShow(id, name){
            deletegame.style.display = "flex";
            document.querySelector("#delete-id").value = id;
            document.querySelector("#delete-title").textContent = `Hapus ${name}?`;
        }
    </script>
</div>

<!-- perbarui -->
<div class="control-game" id="update-game">
    <div class="ctrl-blur"></div>
    <div class="ctrl-content">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="right-me">
                <button id="update-game-close">&#10006;</button>
            </div>
            <h2>Perbarui Produk</h2>
            <input type="text" name="id" id="update-id" hidden>
            <table>
            <tr>
                    <td><label for="category">Barang</label></td>
                    <td>:</td>
                    <td><select name="item" id="iid" required>
                        <?php
                        $qGame = mysqli_query($mysqli, "SELECT * FROM tbl_barang");
                        while($dataG = mysqli_fetch_array($qGame)){
                            $tempid = $dataG['id_game'];
                            $qGame2 = mysqli_query($mysqli, "SELECT * FROM tbl_game WHERE id_game='$tempid'");
                            $qGname;
                            while($dataGG = mysqli_fetch_array($qGame2)){ $qGname=$dataGG['nama_game']; }
                        ?>
                        <option value="<?=$dataG["id_barang"]?>"><?=$qGname.'-'.$dataG["nama_barang"]?></option>
                        <?php }?>
                    </select></td>
                </tr>
                <tr>
                    <td><label for="category">Jumlah</label></td>
                    <td>:</td>
                    <td><input type="number" name="quantity" min="1" value="10" id="qty" required></td>
                </tr>
                <tr>
                    <td><label for="category">Harga</label></td>
                    <td>:</td>
                    <td><input type="number" name="price" min="1" value="1000" id="prc" required></td>
                </tr>
            </table>
            <p>*tanpa titik atau koma, hanya angka</p>
            <div class="right-me">
                <input type="submit" name="update" class="btn btn-warning" value="Perbarui">
            </div>
        </form>
    </div>
    <script>
        const updategame = document.getElementById("update-game");
        document.getElementById("update-game-close").onclick = (event)=>{
            updategame.style.display = "none";
        }
        function updateItemShow(id, iid, qty, prc){
            updategame.style.display = "flex";
            document.querySelector("#update-id").value = id;
            document.querySelector("#iid").value = iid;
            document.querySelector("#qty").value = qty;
            document.querySelector("#prc").value = prc;
        }
    </script>
</div>