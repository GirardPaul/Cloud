<?php
session_start();

$name = $_SESSION["name"];
?>
<?php include 'sidebar.php'; ?>


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
<script type="text/javascript">

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
    document.getElementById('selectfile').onchange = function(e) {

      for (i = 0; i < files.length; i++) {
        let dt = e.dataTransfer;
        let files = dt.files;
        
        fileobj = document.getElementById('selectfile').files[i];
        ajax_file_upload(fileobj);
      }
    };
  }
 
  function ajax_file_upload(file_obj) {
    if(file_obj != undefined) {
        var form_data = new FormData();                  
        form_data.append('file', file_obj);
      $.ajax({
        type: 'POST',
        url: 'files.php',
        contentType: false,
        processData: false,
        data: form_data,
        success:function(response) {
      
          $('#selectfile').val('');
        }
      });
    }
  }
</script>


<table class="table w-75">
  <thead class="bg-thead white-text">
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Taille</th>
      <th scope="col">Renommer</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>

  <?php
  
  $list_fold = $_GET['list'];
  $_SESSION['nom_dossier'] = $_GET['list'];
//  $adresse="./".$_GET['list']."/"; //Adresse du dossier sans oublier le / à la fin.
 $adresse = "$name/$list_fold/";
//  $adresse2 = "./".$_GET['list']."/";

//  var_dump($adresse);
  //Adresse du dossier sans oublier le / à la fin.

 $dossier=Opendir($adresse); //Ouverture du dossier.
 

// if(isset($_POST['submit'])){

//   $countfiles = count($_FILES['file']['name']);

  
  
//   for($i=0;$i<$countfiles;$i++){
  
//   $filename = $_FILES['file']['name'][$i];
//   move_uploaded_file($_FILES['file']['tmp_name'][$i],"$adresse./$filename");
//   }
// }

 while ($Fichier = readdir($dossier)) //On affiche les fichiers les uns après les autres.
 {
          // $file = new SplFileInfo($Fichier);
          // $extension = $file->getExtension();
          // $nom_fichier = $file->getBasename($extension);
          // $final = explode(".", $nom_fichier);
          // $filesize = filesize($adresse.$_GET['list']);
          // $result = round($filesize/1000, 1) . " Ko";

     if ($Fichier != "." && $Fichier != ".." && $Fichier != ".DS_Store") {
         $_SESSION['name_dossier'] = $_GET['list'];

         
         
         $ext = new SplFileInfo($Fichier);
         $extension = $ext->getExtension();
         $filesize = filesize($adresse.$Fichier);
         $result = round($filesize/1000, 1) . ' Ko';

        if($extension == "docx"){
        
        echo "<tr> <td class='test1'> <a href='".$adresse.$Fichier."'> <img id='img' width='150px' height='150px' src='https://zupimages.net/up/20/08/klg9.png'> </a><figcaption> ".$Fichier."  </figcaption> </td> <td> ".$result." </td> <td class='text-center'>
        <a  class='far fa-edit 
        warning-color btn_edit1' data-file='".$Fichier."' alt='' width='20' height='20' type='button' data-toggle='modal' data-target='#modal-edit1'</a> </td> <td> <a class='fas fa-file-download warning-color' href='".$adresse.$Fichier."' download='".$Fichier."'</a>  <a class='far fa-trash-alt warning-color' href='delete.php?delete=$adresse$Fichier'</a> <span data-toggle='modal' data-target='#modal-delete' </span></td> </tr>";

       
        }
        else if ($extension == "html"){

          echo "<tr> <td class='test1'> <a href='".$adresse.$Fichier."'> <img id='img' width='150px' height='150px' src='https://zupimages.net/up/20/08/6ick.png'> </a><figcaption> ".$Fichier."  </figcaption> </td> <td> ".$result." </td> <td class='text-center'> 
          <a  class='far fa-edit 
          warning-color btn_edit1' data-file='".$Fichier."' alt='' width='20' height='20' type='button' data-toggle='modal' data-target='#modal-edit1'</a> </td> <td> <a class='fas fa-file-download warning-color' href='".$adresse.$Fichier."' download='".$Fichier."'</a>  <a class='far fa-trash-alt warning-color' href='delete.php?delete=$adresse$Fichier'</a> <span data-toggle='modal' data-target='#modal-delete' </span></td> </tr>";
        }
        else if ($extension == "pdf"){
          echo "<tr> <td class='test1'> <a href='".$adresse.$Fichier."'> <img id='img' width='150px' height='150px' src='https://zupimages.net/up/20/08/wqcr.jpg'> </a><figcaption> ".$Fichier."  </figcaption> </td> <td> ".$result." </td> <td class='text-center'> 
          <a  class='far fa-edit 
          warning-color btn_edit1' data-file='".$Fichier."' alt='' width='20' height='20' type='button' data-toggle='modal' data-target='#modal-edit1'</a> </td> <td> <a class='fas fa-file-download warning-color' href='".$adresse.$Fichier."' download='".$Fichier."'</a>  <a class='far fa-trash-alt warning-color' href='delete.php?delete=$adresse$Fichier'</a> <span data-toggle='modal' data-target='#modal-delete' </span></td> </tr>";

        }
        else if ($extension == "pptx"){
          echo "<tr> <td class='test1'> <a href='".$adresse.$Fichier."'> <img id='img' width='150px' height='150px' src='https://zupimages.net/up/20/08/e78s.jpg'> </a><figcaption> ".$Fichier."  </figcaption> </td> <td> ".$result." </td> <td class='text-center'> 
          <a  class='far fa-edit 
          warning-color btn_edit1' data-file='".$Fichier."' alt='' width='20' height='20' type='button' data-toggle='modal' data-target='#modal-edit1'</a> </td> <td> <a class='fas fa-file-download warning-color' href='".$adresse.$Fichier."' download='".$Fichier."'</a>  <a class='far fa-trash-alt warning-color' href='delete.php?delete=$adresse$Fichier'</a> <span data-toggle='modal' data-target='#modal-delete' </span></td> </tr>";

        }
        else if ($extension == "zip"){
          echo "<tr> <td class='test1'> <a href='".$adresse.$Fichier."'> <img id='img' width='150px' height='150px' src='https://zupimages.net/up/20/08/rq0g.png'> </a><figcaption> ".$Fichier."  </figcaption> </td> <td> ".$result." </td> <td class='text-center'> 
          <a  class='far fa-edit 
          warning-color btn_edit1' data-file='".$Fichier."' alt='' width='20' height='20' type='button' data-toggle='modal' data-target='#modal-edit1'</a> </td> <td> <a class='fas fa-file-download warning-color' href='".$adresse.$Fichier."' download='".$Fichier."'</a>  <a class='far fa-trash-alt warning-color' href='delete.php?delete=$adresse$Fichier'</a> <span data-toggle='modal' data-target='#modal-delete' </span></td> </tr>";

        }
        else if ($extension == "rar"){
          echo "<tr> <td class='test1'> <a href='".$adresse.$Fichier."'> <img id='img' width='150px' height='150px' src='https://zupimages.net/up/20/08/rq0g.png'> </a><figcaption> ".$Fichier."  </figcaption> </td> <td> ".$result." </td> <td class='text-center'> 
          <a  class='far fa-edit 
          warning-color btn_edit1' data-file='".$Fichier."' alt='' width='20' height='20' type='button' data-toggle='modal' data-target='#modal-edit1'</a> </td> <td> <a class='fas fa-file-download warning-color' href='".$adresse.$Fichier."' download='".$Fichier."'</a>  <a class='far fa-trash-alt warning-color' href='delete.php?delete=$adresse$Fichier'</a> <span data-toggle='modal' data-target='#modal-delete' </span></td> </tr>";
        }
        else {
          echo "<tr> <td class='test1'> <a href='".$adresse.$Fichier."'> <img size='1000' id='img' width='150px' height='150px' src='".$adresse.$Fichier."'> </a><figcaption> ".$Fichier." </figcaption> </td> <td> ".$result." </td> <td class='text-center'>  <a  class='far fa-edit 
          warning-color btn_edit1' data-file='".$Fichier."' alt='' width='20' height='20' type='button' data-toggle='modal' data-target='#modal-edit1'</a> </td> <td> <a class='fas fa-file-download warning-color' href='".$adresse.$Fichier."' download='".$Fichier."'</a>  <a class='far fa-trash-alt warning-color' href='delete.php?delete=$adresse$Fichier'</a> <span data-toggle='modal' data-target='#modal-delete' </span></td> </tr>";
        }
     }
}

?>
</tbody>
</table>

<div class="modal fade" id="modal-edit1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
  <form enctype="multipart/form-data" action="" id="form3" method="post">
    <input type="text" name="edit2" id="edit_txt2">
    <input type="submit" name="send" id="btn_rename1" class="btn btn-primary" value="Renommer">
  </form>
      </div>
    </div>
  </div>
</div>
<script>

        
let test1 = document.querySelectorAll('.test1');

let form3 = document.getElementById('form3');

let btn_edit1 = document.querySelectorAll('.btn_edit1');

let edit_txt2 = document.getElementById('edit_txt2');

let btn_rename1 = document.getElementById('btn_rename1');

  let btns1=Array.from(btn_edit1);


  btns1.forEach(el1 => {
    el1.addEventListener('click', function(){

      let rr1 = this.dataset.file;
      
      // let result = rr.split('.');
    
      edit_txt2.value = rr1;

      let test1 = edit_txt2.value;

      document.cookie = "Edit="+test1;
     
    })
  }); 

  function load (){
    document.cookie = "Edit= ; expires = Thu, 01 Jan 1970 00:00:00 GMT"
  }

  </script>

<?php

if(isset($_POST['send']) AND isset($_COOKIE['Edit'])){

  $new = $_POST['edit2'];
  $old = $_COOKIE['Edit'];

  rename('/Applications/MAMP/htdocs/Explorateur-de-fichiers/'.$adresse.'/'.$old, $adresse.'/'.$new);

}
closedir($dossier);
?>
</body>
</html>