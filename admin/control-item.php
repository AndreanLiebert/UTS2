<link rel="stylesheet" href="control-game.css">
<!-- tambah -->
<div class="control-game" id="add-game">
    <div class="ctrl-blur"></div>
    <div class="ctrl-content">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="right-me">
                <button id="add-game-close">&#10006;</button>
            </div>
            <h2>Tambah Barang</h2>
            <input type="text" name="id" id="id-game" hidden>
            <table>
                <tr>
                    <td><label for="name">Nama</label></td>
                    <td>:</td>
                    <td><input type="text" name="name" required></td>
                </tr>
                <tr>
                    <td><label for="category">Game</label></td>
                    <td>:</td>
                    <td><select name="game" required>
                        <?php
                        $qGame = mysqli_query($mysqli, "SELECT * FROM tbl_game");
                        while($dataG = mysqli_fetch_array($qGame)){
                        ?>
                        <option value="<?=$dataG["id_game"]?>"><?=$dataG["nama_game"]?></option>
                        <?php }?>
                    </select></td>
            </table>
            <img src="" alt="" id="preview-img"><br>
            <input type="file" name="file" id="file" accept=".png" required><br>
            <p>*pastikan ukuran foto tidak lebih dari 150x110, dan format png</p>
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
        const ipt = document.getElementById("file");
        const img = document.getElementById("preview-img");
        ipt.addEventListener('change',(event)=>{
            const file = event.target.files[0]
            if(file){
                const reader = new FileReader();
                reader.onload = (e)=>{
                    img.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        })
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
            <h2>Perbarui Game</h2>
            <input type="text" name="id" id="update-id" hidden>
            <table>
                <tr>
                    <td><label for="name">Nama</label></td>
                    <td>:</td>
                    <td><input type="text" name="name" id="update-name" required></td>
                </tr>
                <tr>
                    <td><label for="category">Game</label></td>
                    <td>:</td>
                    <td><select name="game" id="game" required>
                        <?php
                        $qGame = mysqli_query($mysqli, "SELECT * FROM tbl_game");
                        while($dataG = mysqli_fetch_array($qGame)){
                        ?>
                        <option value="<?=$dataG["id_game"]?>"><?=$dataG["nama_game"]?></option>
                        <?php }?>
                    </select></td>
                </tr>
            </table>
            <img src="" alt="" id="update-preview-img"><br>
            <input type="text" name="img-changed" id="img-changed" hidden>
            <input type="file" name="file" id="update-file" accept=".png"><br>
            <p>*pastikan ukuran foto tidak lebih dari 150x110, dan format png</p>
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
        function updateItemShow(id, nama,category, img){
            updategame.style.display = "flex";
            document.querySelector("#update-id").value = id;
            document.querySelector("#update-name").value = nama;
            document.querySelector("#img-changed").value = "";
            document.querySelector("#game").value = category;
            document.querySelector("#update-preview-img").src = `.${img}`;
        }
        const uipt = document.getElementById("update-file");
        const uimg = document.getElementById("update-preview-img");
        uipt.addEventListener('change',(event)=>{
            const file = event.target.files[0]
            if(file){
                const reader = new FileReader();
                reader.onload = (e)=>{
                    uimg.src = e.target.result;
                    document.querySelector("#img-changed").value = "true";
                }
                reader.readAsDataURL(file);
            }
        })
    </script>
</div>