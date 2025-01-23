<?php

include('config/config.php');

$dsn = "mysql:host=$dbHost;
        dbname=$dbName;
        charset=UTF8";

$pdo = new PDO($dsn, $dbUser, $dbPass);

$sql = "SELECT UnansweredQuestions.Question
        FROM UnansweredQuestions";

$statement = $pdo->prepare($sql);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_OBJ);

if (isset($_POST['submit'])){

    include('config/config.php');
    
    $dsn = "mysql:host=$dbHost;
            dbname=$dbName;
            charset=UTF8";
    
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    
    $sql = "INSERT INTO AnsweredQuestions
          (
              Question
              ,Answer
              ,IsActive
              ,Opmerking
              ,Datum
              ,EditDate
          )
          VALUES
          (
              :question
              ,:answer
              ,1
              ,NULL
              ,SYSDATE(6)
              ,SYSDATE(6)
          );
          DELETE FROM UnansweredQuestions
          WHERE Question = :question";
    
    $statement = $pdo->prepare($sql);
    
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    $statement->bindValue(':question', $_POST['question'], PDO::PARAM_STR);
    $statement->bindValue(':answer', $_POST['answer'], PDO::PARAM_STR);
    
    $statement->execute();
    
    $display = 'flex';
    
    header('refresh:1;url=unansweredQuestions.php');
    
}
if (isset($_POST['remove'])){

    include('config/config.php');
    
    $dsn = "mysql:host=$dbHost;
            dbname=$dbName;
            charset=UTF8";
    
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    
    $sql = "DELETE FROM UnansweredQuestions
            WHERE Question = :question";
    
    $statement = $pdo->prepare($sql);
    
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    $statement->bindValue(':question', $_POST['question'], PDO::PARAM_STR);
    
    $statement->execute();
    
    header('refresh:1;url=unansweredQuestions.php');
    
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
    <link rel="stylesheet" href="../css/style.css" />
  </head>
  <body>
    <div class="navbar">
      <div class="left-menu">
        <a href="#">
          <img src="/src/SRC/src/logs/logomain.png" alt="Logo" style="height: 40px; vertical-align: middle;">
          <span style="margin-left: 5px;">
              <img src="/src/SRC/src/logs/best_3.png" alt="Website Name" style="width: 40px; height: 60px; vertical-align: middle;">
          </span>
      </a>
        <a href="#">home</a>
        <a href="#">genres</a>
        <a href="#">now</a>
        <a href="#">popular</a>
        <a href="#">my list</a>
      </div>
      <div class="right-menu">
        <form action="/src/SRC/src/features/search_result.html">
          <input class="searchbar" type="text" placeholder="search..." />
          <button class="submit" type="submit">search</button>
        </form>
        <a href="#">profile</a>
        <a href="#">profile settings</a>
      </div>
    </div>
    <div class="main-content">
        <h1>Unanswered Questions</h1>
        <?php foreach($result as $x) : ?>
            <form action="unansweredQuestions.php" method="POST">
                <label for="question">Question:</label>
                <input name="question" type="text" id="answer" class="form-control" value=<?= $x->Question ?> readonly>
                <label for="answer">Answer:</label>
                <input name="answer" type="text" id="answer" class="form-control" placeholder="Insert answer...">
                <button name="submit" type="submit" value="submit">Reply</button>
                <button name="remove" type="submit" value="remove">Remove Question</button>
            </form><br><br>
            
        <?php endforeach ?>

    </div>
    <div class="footer">
      <div><a href="#">Contact us</a></div>
      <div><a href="FAQ.html">FAQ</a></div>
      <div><a href="socials.html">Follow us</a></div>
    </div>



    
  </body>
</html>
