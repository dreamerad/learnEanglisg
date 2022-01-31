<?php
    session_start();

    require 'head.php';
    require 'menu.php';
    include_once  'sys/db.php';
    
    $sth = $dbh->prepare("SELECT * FROM `questions` WHERE `id_test` = :id_test AND `id_question` = :id_question");
    $sth->execute(
        [
            ':id_test' => $_GET['id_test'],
            ':id_question' => $_GET['id_question']
        ]
    );
    $array = $sth->fetchAll(PDO::FETCH_ASSOC);

    $sth = $dbh->prepare("SELECT `id_question` FROM `questions` WHERE `id_test` = :id_test");
    $sth->execute(
        [
            ':id_test' => $_GET['id_test'],
            // ':id_question' => $_GET['id_question']
        ]
    );
    $id_question = $sth->fetchAll(PDO::FETCH_COLUMN);


?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Система тестирования</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/app.css">
</head>
<body>

<section class="about-banner relative">
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Тестирование				
							</h1>	
						</div>	
					</div>
				</div>
			</section>

    <div class="container" style="margin-top: 70px; margin-bottom: 70px;">
    <?php
        // for ($i=1; $i <= $id_question; $i++) break;{ ?>
            <form action="test.php?id_test=1&id_question=<?php echo $i; ?>" method="POST">
            <?php

                foreach ($array as $val) {
                echo '
            <div class="form-check">
                  <h1> '.$val['question'].'</h1>
                  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                  <label class="form-check-label" for="exampleRadios1" name="q1">
                    '.$val['ans1'].'
                  </label><br>
                  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                  <label class="form-check-label" for="exampleRadios1" name="q2">
                    '.$val['ans2'].'
                  </label><br>
                  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                  <label class="form-check-label" for="exampleRadios1" name="q3">
                    '.$val['ans3'].'
                  </label><br>
                  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                  <label class="form-check-label" for="exampleRadios1" name="q4">
                    '.$val['ans4'].'
                  </label><br>
                ';
                } 
            // }

                ?>
                 <input type="submit" class="btn btn-primary" value="Далее">
                </div>
            </form>
    </div>
<?php
    require 'foot.php';
?>