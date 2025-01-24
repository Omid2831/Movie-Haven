<?php

include('config/config.php');

$dsn = "mysql:host=$dbHost;
        dbname=$dbName;
        charset=UTF8";

$pdo = new PDO($dsn, $dbUser, $dbPass);

$sql = "SELECT AnsweredQuestions.Question
              ,AnsweredQuestions.Answer
        FROM AnsweredQuestions";

$statement = $pdo->prepare($sql);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_OBJ);

if (isset($_POST['submit'])){

include('config/config.php');

$dsn = "mysql:host=$dbHost;
        dbname=$dbName;
        charset=UTF8";

$pdo = new PDO($dsn, $dbUser, $dbPass);

$sql = "INSERT INTO UnansweredQuestions
      (
          Question
          ,IsActive
          ,Opmerking
          ,Datum
          ,EditDate
      )
      VALUES
      (
          :question
          ,1
          ,NULL
          ,SYSDATE(6)
          ,SYSDATE(6)
      )";

$statement = $pdo->prepare($sql);

$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$statement->bindValue(':question', $_POST['question'], PDO::PARAM_STR);

$statement->execute();

$display = 'flex';

header('refresh:1;url=FAQ.php');

}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/faq.css" />
    <link rel="stylesheet" href="../css/cast.css" />
  </head>
  <body>
    <!--Navbar Section-->
    <nav class="navbar Mynavbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="../index.html">
        <img
          src="/src/SRC/src/logs/logomain.png"
          alt="Logo"
          style="height: 40px; vertical-align: middle"
        />
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">ABOUT US</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/src/SRC/src/features/Cast.html"
              >Casting Studio and New Movies</a
            >
          </li>
        </ul>
        <form
          action="/src/SRC/src/features/search_result.html"
          class="d-flex me-3"
          style="margin: 20px 0"
        >
          <input
            class="form-control me-auto"
            type="search"
            placeholder="Search..."
            aria-label="Search"
          />
          <button class="btn btn-danger" type="submit">Search</button>
        </form>
        <button class="btn btn-secondary" onclick="toggledarkmode()" type="button">
          <i class="bi bi-brightness-high"></i></button>
      </div>
    </nav>

    <!-- Main container -->
    <main class="container">
      <div class="MyHeadBox">
        <h1 class="MyHeadLine">frequently asked questions</h1>
        <p class="HeadPharagraph HeadPharagraph2">
          Welcome to our Film Library! Here, you can explore a vast collection
          of movies from various genres, eras, and countries. Whether you're a
          fan of action, drama, or documentary films, our platform offers
          something for everyone. If you're looking for recommendations, how to
          navigate our website, or have other inquiries, check out our FAQ
          section for helpful answers. Enjoy discovering your next favorite
          film!
        </p>
      </div>

     <!-- Accordion FAQ section -->
<div class="accordion MyAccordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        What types of movies are available in the film library?
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        Our film library offers a diverse collection of movies from multiple genres, including action, drama, comedy, documentary, horror, and more. Whether you're looking for classic films or the latest blockbusters, there's something for everyone.
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        How can I find a specific movie?
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        You can easily find a specific movie by using the search bar located at the top of the page. Just type in the title or keywords, and our system will display relevant results.
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Can I watch movies for free?
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        Yes, you can watch many movies for free. Some movies may require a subscription or rental fee, but we have a wide selection of free movies available.
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
        How do I create an account?
      </button>
    </h2>
    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        To create an account, click the "Sign Up" button located in the top right corner of the website. Fill out the necessary information, such as your name, email, and password, and you’ll be able to start enjoying our films.
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
        How do I subscribe to premium content?
      </button>
    </h2>
    <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        To access premium content, you can subscribe to our premium plan through your account settings. This will grant you access to additional films and features not available with a free account.
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
        How can I cancel my subscription?
      </button>
    </h2>
    <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        To cancel your subscription, go to your account settings and click "Cancel Subscription." Follow the instructions to complete the cancellation process.
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
        Are subtitles available for movies?
      </button>
    </h2>
    <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        Yes, many movies in our library offer subtitles in multiple languages. You can enable subtitles during playback by clicking the subtitle icon on the player.
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
        How can I rate movies?
      </button>
    </h2>
    <div id="collapseEight" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        You can rate movies by clicking on the star rating system under each movie’s description. The ratings help other users discover great movies.
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
        Can I watch movies offline?
      </button>
    </h2>
    <div id="collapseNine" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        Currently, offline viewing is not available on our platform. However, you can stream movies as long as you have an internet connection.
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
        How can I contact customer support?
      </button>
    </h2>
    <div id="collapseTen" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        You can contact our customer support team by clicking the "Contact Us" link at the bottom of the website. We’re here to help with any issues or questions you may have.
      </div>
    </div>
  </div>
</div>
    <div class="main-content">
      

      <?php foreach($result as $x) : ?>
          <p>Q: <?= $x->Question ?></p>
          <p>A: <?= $x->Answer ?></p><br><br>
      <?php endforeach ?>

      <p>Still have an unanswered question? Ask us here!</p>
      <form action="FAQ.php" method="POST">
        <input name="question" type="text" id="question" class="form-control" placeholder="Ask us your question!">
        <button name="submit" type="submit" value="submit">Send</button>
      </form><br><br>
      <p>View unanswered questions: (admin only)</p>
      <input type="text" id="adminPassword" placeholder="Enter admin password">
      <button id="passwordSubmit">Enter</button>

    </div>

    </main>

           <!-- Footer Section -->
           <footer class="MyFooter footer">
            <div><a href="feedback_form.html">Contact us</a></div>
            <div><a href="socials.html">Follow us</a></div>
          </footer>

    <!-- Bootstrap JS (necessary for interactive components like the accordion) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/src/SRC/src/Javascript/reloadbar.js"></script>
    <script src="/src/SRC/src/Javascript/toggle_mode.js"></script>
    <script src="../Javascript/adminPassword.js"></script>

    
    



    

  </body>
</html>
