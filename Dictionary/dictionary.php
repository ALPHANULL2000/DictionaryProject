<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dictionary</title>
    <link rel="stylesheet" href="css_dictionary.css">
  </head>
  <body>
  <center>
    <h1>English To Finglish Dictionary</h1>
    <div id="div1">
      <form class="" action="dictionary.php" method="post">
          <input type="text" name="word" value="" placeholder="Search Word"><br>
          <input type="submit" name="search" value="Search">
          <a href="insert.php" target="_self">
          <input type="button" id="goedit"   value="Editor">
          </a>
      </form>
      <table id="table2">
        <?php
           include 'db.php';
           include 'model.php';


           if (isset($_POST['search'])) {
             $word=$_POST['word'];
             $sql1="SELECT * from dictionary where English='$word'";
             $query1=mysqli_query($conn,$sql1);
             while ($info=mysqli_fetch_array($query1)) {
               ?>
               <tr>
                   <td><?php echo $info['Word']; ?></td>
                   <td><?php echo $info['Meaning']; ?></td>
                   <td><?php echo $info['Meaning']; ?></td>
               </tr>
               <?php
             }
           }
         ?>
      </table>

      <table id="table1">
        <tr>
            <th>English</th>
            <th>Persian</th>
            <th>Type</th>
        </tr>
        <?php
          include 'db.php';

          $sql="SELECT * from dictionary";
          $query=mysqli_query($conn,$sql);
          while ($info=mysqli_fetch_array($query)) {
            ?>
              <tr>
                  <td><?php echo $info['English']; ?></td>
                  <td><?php echo $info['Persian']; ?></td>
                  <td><?php echo $info['Type']; ?></td>
              </tr>
            <?php
          }
        ?>
      </table>
    </div>
  </center>
  </body>
</html>


