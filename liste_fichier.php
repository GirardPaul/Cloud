<?php
session_start();
?>
<?php include 'sidebar.php'; ?>



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
  
 $adresse="./".$_GET['list']."/"; //Adresse du dossier sans oublier le / à la fin.
 $dossier=Opendir($adresse); //Ouverture du dossier.
 

 
echo '<div class="margin">
<form action="" method="post" enctype="multipart/form-data">
Sélectionner les fichiers à envoyer :
<input type="file" name="file[]" id="file" multiple>
<input type="submit" name="submit" value="Envoyer">
</form> 
</div>';

if(isset($_POST['submit'])){

  $countfiles = count($_FILES['file']['name']);

  var_dump($countfiles);
  
  
  for($i=0;$i<$countfiles;$i++){
  
  $filename = $_FILES['file']['name'][$i];
  move_uploaded_file($_FILES['file']['tmp_name'][$i],"$adresse./$filename");
  }
}

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
        warning-color btn_edit1' data-file='".$Fichier."' alt='' width='20' height='20' type='button' data-toggle='modal' data-target='#modal-edit1'</a> </td> <td> <a class='fas fa-file-download warning-color' href='".$adresse.$Fichier."' download='".$Fichier."'</a>  <a class='far fa-trash-alt warning-color' href='delete.php?delete=$adresse/$Fichier'</a> <span data-toggle='modal' data-target='#modal-delete' </span></td> </tr>";

       
        }
        else if ($extension == "html"){

          echo "<tr> <td class='test1'> <a href='".$adresse.$Fichier."'> <img id='img' width='150px' height='150px' src='https://zupimages.net/up/20/08/6ick.png'> </a><figcaption> ".$Fichier."  </figcaption> </td> <td> ".$result." </td> <td class='text-center'> 
          <a  class='far fa-edit 
          warning-color btn_edit1' data-file='".$Fichier."' alt='' width='20' height='20' type='button' data-toggle='modal' data-target='#modal-edit1'</a> </td> <td> <a class='fas fa-file-download warning-color' href='".$adresse.$Fichier."' download='".$Fichier."'</a>  <a class='far fa-trash-alt warning-color' href='delete.php?delete=$adresse/$Fichier'</a> <span data-toggle='modal' data-target='#modal-delete' </span></td> </tr>";
        }
        else if ($extension == "pdf"){
          echo "<tr> <td class='test1'> <a href='".$adresse.$Fichier."'> <img id='img' width='150px' height='150px' src='https://zupimages.net/up/20/08/wqcr.jpg'> </a><figcaption> ".$Fichier."  </figcaption> </td> <td> ".$result." </td> <td class='text-center'> 
          <a  class='far fa-edit 
          warning-color btn_edit1' data-file='".$Fichier."' alt='' width='20' height='20' type='button' data-toggle='modal' data-target='#modal-edit1'</a> </td> <td> <a class='fas fa-file-download warning-color' href='".$adresse.$Fichier."' download='".$Fichier."'</a>  <a class='far fa-trash-alt warning-color' href='delete.php?delete=$adresse/$Fichier'</a> <span data-toggle='modal' data-target='#modal-delete' </span></td> </tr>";

        }
        else if ($extension == "pptx"){
          echo "<tr> <td class='test1'> <a href='".$adresse.$Fichier."'> <img id='img' width='150px' height='150px' src='https://zupimages.net/up/20/08/e78s.jpg'> </a><figcaption> ".$Fichier."  </figcaption> </td> <td> ".$result." </td> <td class='text-center'> 
          <a  class='far fa-edit 
          warning-color btn_edit1' data-file='".$Fichier."' alt='' width='20' height='20' type='button' data-toggle='modal' data-target='#modal-edit1'</a> </td> <td> <a class='fas fa-file-download warning-color' href='".$adresse.$Fichier."' download='".$Fichier."'</a>  <a class='far fa-trash-alt warning-color' href='delete.php?delete=$adresse/$Fichier'</a> <span data-toggle='modal' data-target='#modal-delete' </span></td> </tr>";

        }
        else if ($extension == "zip"){
          echo "<tr> <td class='test1'> <a href='".$adresse.$Fichier."'> <img id='img' width='150px' height='150px' src='https://zupimages.net/up/20/08/rq0g.png'> </a><figcaption> ".$Fichier."  </figcaption> </td> <td> ".$result." </td> <td class='text-center'> 
          <a  class='far fa-edit 
          warning-color btn_edit1' data-file='".$Fichier."' alt='' width='20' height='20' type='button' data-toggle='modal' data-target='#modal-edit1'</a> </td> <td> <a class='fas fa-file-download warning-color' href='".$adresse.$Fichier."' download='".$Fichier."'</a>  <a class='far fa-trash-alt warning-color' href='delete.php?delete=$adresse/$Fichier'</a> <span data-toggle='modal' data-target='#modal-delete' </span></td> </tr>";

        }
        else if ($extension == "rar"){
          echo "<tr> <td class='test1'> <a href='".$adresse.$Fichier."'> <img id='img' width='150px' height='150px' src='https://zupimages.net/up/20/08/rq0g.png'> </a><figcaption> ".$Fichier."  </figcaption> </td> <td> ".$result." </td> <td class='text-center'> 
          <a  class='far fa-edit 
          warning-color btn_edit1' data-file='".$Fichier."' alt='' width='20' height='20' type='button' data-toggle='modal' data-target='#modal-edit1'</a> </td> <td> <a class='fas fa-file-download warning-color' href='".$adresse.$Fichier."' download='".$Fichier."'</a>  <a class='far fa-trash-alt warning-color' href='delete.php?delete=$adresse/$Fichier'</a> <span data-toggle='modal' data-target='#modal-delete' </span></td> </tr>";
        }
        else {
          echo "<tr> <td class='test1'> <a href='".$adresse.$Fichier."'> <img size='1000' id='img' width='150px' height='150px' src='".$adresse.$Fichier."'> </a><figcaption> ".$Fichier." </figcaption> </td> <td> ".$result." </td> <td class='text-center'>  <a  class='far fa-edit 
          warning-color btn_edit1' data-file='".$Fichier."' alt='' width='20' height='20' type='button' data-toggle='modal' data-target='#modal-edit1'</a> </td> <td> <a class='fas fa-file-download warning-color' href='".$adresse.$Fichier."' download='".$Fichier."'</a>  <a class='far fa-trash-alt warning-color' href='delete.php?delete=$adresse/$Fichier'</a> <span data-toggle='modal' data-target='#modal-delete' </span></td> </tr>";
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

  rename('C:/wamp/www/Explorateur-de-fichiers/'.$adresse.'/'.$old, $adresse.'/'.$new);

}
closedir($dossier);
?>
</body>
</html>