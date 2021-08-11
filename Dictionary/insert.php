<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Insert Word</title>
    <link rel="stylesheet" href="css_insert.css">
  </head>
  <body>
  <center>
      <h1>Insert Word</h1>
      <section>
          <form class="" action="insert.php" method="post">

              <label for="">Word</label><br>
              <input type="text" name="word" value="" placeholder="Enter Word" required><br><br>
              <label for="">Meaning</label><br>
              <input type="text" name="meaning" value="" placeholder="Enter Meaning"><br><br>
              <label for="">WordType</label><br>
              <input type="text" name="wordtype" value="" placeholder="Enter WordType"><br><br>


              <input type="submit" name="insert" value="Insert">
              <input type="submit" name="delete" value="Remove">
              <a href="dictionary.php" target="_self">
              <input id="godict" type="button" name="godict" value="Dictionary">
              </a>
          </form>
          <table>
              <tr>
                  <th>Word</th>
                  <th>Meaning</th>
                  <th>Type</th>
              </tr>
    <?php
        include 'db.php';
        include 'model.php';

        if (isset($_POST['insert'])) {
            $newWord = new model($_POST['word'], $_POST['meaning'], $_POST['wordtype']);
            $new_eng = $newWord->getEng();
            $new_per = $newWord->getPer();
            $new_typ = $newWord->getTyp();
            $sql = "INSERT INTO dictionary(English,Persian,Type) values('$new_eng', '$new_per', '$new_typ')";
            $query = mysqli_query($conn,$sql);
        } elseif (isset($_POST['delete'])) {
            $newWord = new model($_POST['word'], $_POST['meaning'], $_POST['wordtype']);
            $new_eng = $newWord->getEng();
            $sql="DELETE FROM dictionary WHERE English='$new_eng'";
            $query=mysqli_query($conn,$sql);
        }

        $sql1="SELECT * from dictionary";
        $query1=mysqli_query($conn,$sql1);
        while ($info=mysqli_fetch_array($query1)) {
            ?>
            <tr>
              <td><?php echo $info['English']; ?></td>
              <td><?php echo $info['Persian']; ?></td>
              <td><?php echo $info['Type']   ; ?></td>
            </tr>
            <?php
        }
        ?>
      </table>
      </section>
  </center>
  </body>
</html>


