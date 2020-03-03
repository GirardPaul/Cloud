<?php
session_start();
$name = $_SESSION["name"];

if (isset($_POST['text'])) {
    $text = $_POST['text'];
    mkdir("$name/$text");
    header("location: dossiers.php");
}
?>
<?php

$chaine = $_SERVER['HTTP_REFERER'];
$lg_max = strlen($_SERVER['HTTP_HOST']);

if (strlen($chaine) > $lg_max) {
    $chaine = substr($chaine, 7, $lg_max);
}

if ($_SERVER['HTTP_HOST'] != $chaine) {
    header('Location:http://www.google.com');exit;
}
?>
<?php include 'sidebar.php';?>

<div id="drop_file_zone" ondrop="upload_file(event)" ondragover="return false">
  <div id="drag_upload_file">
    <br>
    <br>
    <p>Déplacez vos fichiers ici</p>
    <!-- <p>ou</p>
          <p><input type="button" class="btn btn-warning" value="Sélectionnez" onclick="file_explorer();"></p>
          <input type="file" name="file" id="selectfile" multiple> -->
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>


  let fileobj;

  function upload_file(e) {
    e.preventDefault();
    let dt = e.dataTransfer;
    let files = dt.files;


    for (i = 0; i < files.length; i++) {

      let count = files.length;
      fileobj = e.dataTransfer.files[i];
      ajax_file_upload(fileobj);

    }
  }

  function file_explorer() {
    document.getElementById('selectfile').click();
    document.getElementById('selectfile').onchange = function (e) {

      for (i = 0; i < files.length; i++) {
        let dt = e.dataTransfer;
        let files = dt.files;

        fileobj = document.getElementById('selectfile').files[i];
        ajax_file_upload(fileobj);
      }
    };
  }

  function ajax_file_upload(file_obj) {
    if (file_obj != undefined) {
      var form_data = new FormData();
      form_data.append('file', file_obj);
      $.ajax({
        type: 'POST',
        url: 'traitement.php',
        contentType: false,
        processData: false,
        data: form_data,
        success: function (response) {
          alert(response);
          $('#selectfile').val('');
        }
    })
  
  }
}
</script>


<table class="table w-75">
  <thead class="bg-thead white-text">
    <tr>
      <th scope="col">Nom <span class='warning-color bg-blue  ' alt='' width='20' height='20' type='button'
          data-toggle='modal' data-target='#new-folder'> <i class="fas fa-folder-plus"></i> </span> </th>
      <th scope="col">Taille</th>
      <th scope="col">Renommer</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php

$dir = "./$name";
$supp = "/$name";
$delete = $name;
//  si le dossier pointe existe
if (is_dir($dir)) {
    // si il contient quelque chose
    if ($dh = opendir($dir)) {

        // boucler tant que quelque chose est trouve
        while (($file = readdir($dh)) !== false) {

            $_SESSION['nom_fichier'] = $file;
            $fichier = new SplFileInfo($file);
            $extension = $fichier->getExtension();
            $nom_fichier = $fichier->getBasename($extension);
            $final = explode(".", $nom_fichier);
            $filesize = filesize($dir . '/' . $file);
            $result = round($filesize / 1000, 1) . " Ko";

            // fichiers
            if ($file != '.' && $file != '..' && $file != '.DS_Store' && $file != '.git' && $extension != "") {
                $pathfile = $dir . '' . $file;

                echo "<tr> <td class='test'> <img src='https://zupimages.net/up/20/08/iscc.png' alt='' width='20' height='20'/> $file</td> <td> $result</td> <td class='text-center'> <a  class='far fa-edit
                warning-color btn_edit' data-file='" . $file . "' alt='' width='20' height='20' type='button' data-toggle='modal' data-target='#modal-edit'</a> </td> <td> <a class='fas fa-file-download warning-color' href='$dir/" . $file . "' download='" . $file . "'</a>  <a class='far fa-trash-alt warning-color' href='delete.php?delete=$delete/$file'</a> <span data-toggle='modal' data-target='#modal-delete' </span></td> </tr>";

            }
            // dossiers
            else if ($file != '.' && $file != '..' && $file != '.DS_Store' && $file != '.git' && $extension == "") {
                $pathfile = $dir . '' . $file;

                echo "<tr> <td class='test'> <img src='https://zupimages.net/up/20/08/8pwy.png' alt='' width='20' height='20'/> <a href=liste_fichier.php?list=$file> $file </a></td> <td> $result</td> <td class='text-center'> <a class='far fa-edit warning-color btn_edit' data-file='" . $file . "' alt='' width='20' height='20' type='button' data-toggle='modal' data-target='#modal-edit'</a> </td> <td> <a class='warning-color' href='delete.php?delete=$file'</a> <span type='button' class='far fa-trash-alt transparent border-none' data-toggle='modal' data-target='#basicExampleModal' </span> </td> </tr>";
            }

        }
        // on ferme la connection
        closedir($dh);
    }
}
?>
  </tbody>
</table>

<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Renommer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" action="" id="form2" method="post">
          <input type="text" name="edit" id="edit_txt">
          <input type="submit" name="submit" id="btn_rename" onclick="reload()" class="btn btn-primary"
            value="Renommer">
        </form>
      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Renommer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" action="" id="form2" method="post">
          <input type="text" name="edit" id="edit_txt">
          <input type="submit" name="submit" id="btn_rename" onclick="reload()" class="btn btn-primary"
            value="Renommer">
        </form>

      </div>

    </div>
  </div>
</div>




<div class="modal fade" id="new-folder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Création d'un nouveau dossier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" action="" id="form1" method="post">
          <input type="text" name="text" id="nom">
          <input type="submit" id="btn_form" class="btn btn-primary" value="Valider">
        </form>
      </div>
    </div>

  </div>
</div>
</div>

<script>

  let test = document.querySelectorAll('.test');

  let form2 = document.getElementById('form2');

  let btn_edit = document.querySelectorAll('.btn_edit');

  let edit_txt = document.getElementById('edit_txt');

  let btn_rename = document.getElementById('btn_rename');

  let btns = Array.from(btn_edit);


  btns.forEach(el => {
    el.addEventListener('click', function () {

      let rr = this.dataset.file;

      // let result = rr.split('.');

      edit_txt.value = rr;

      let test = edit_txt.value;

      document.cookie = "Name=" + test;

    })
  });

  function load() {
    document.cookie = "Name= ; expires = Thu, 01 Jan 1970 00:00:00 GMT"
  }

</script>

<?php

if (isset($_POST['submit']) and isset($_COOKIE['Name'])) {

    $new = $_POST['edit'];
    $old = $_COOKIE['Name'];
    // var_dump($old);

    rename('/Applications/MAMP/htdocs/Explorateur-de-fichiers/' . $name . '/' . $old, $name . '/' . $new);

}
?>

</html>
</body>