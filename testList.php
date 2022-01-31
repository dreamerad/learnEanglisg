<?php
    include_once  'sys/db.php';
    require 'head.php';
    require 'menu.php';

    session_start();
    // session_unset($_SESSION['test_score']);

    $sth = $dbh->prepare("SELECT `groups` FROM `users` WHERE `login` = :login");
    $sth->execute(
        [
            ':login' => $_SESSION['login']
        ]);
        $groups = $sth->fetch(PDO::FETCH_ASSOC);

?>

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



<div class="container" style="margin-bottom: 70px; ">

<div class="col-md-6" style="margin-top: 100px; margin:0 auto;">
    <div class="card mt-4">
        <div class="card-header">
            <h2 class="text-center" >Тренажёры</h2>
        </div>
        
        <div class="card-body">
            <ul class="list">
                <?php
                $sth = $dbh->prepare("SELECT * FROM `groups` WHERE `groups` = :groups AND `simulator1_block` = :simulator1_block");
                $sth->execute([
                    ':groups' => $groups['groups'],
                    ':simulator1_block' => 1
                ]);
                $sim1 = $sth->fetch(PDO::FETCH_ASSOC);

                $sth = $dbh->prepare("SELECT * FROM `groups` WHERE `groups` = :groups AND `simulator2_block` = :simulator2_block");
                $sth->execute([
                    ':groups' => $groups['groups'],
                    ':simulator2_block' => 1
                ]);
                $sim2 = $sth->fetch(PDO::FETCH_ASSOC);
                if ($sim1['simulator1_block'] == 1) {
                    echo '<a href="/tests/test1.php">Traffic signs</a><br>';
                }
                if ($sim2['simulator2_block'] == 1) {
                    echo '<a href="/tests/test2.php">Car interior</a>';
                }
                if ($sim1['simulator1_block'] == 0 AND $sim2['simulator2_block'] == 0) {
                    echo '<p style="margin-left: 25%;">Для вас нет доступных тренажёров</p>';
                }
                 ?>

               
            </ul>
        </div>
    </div>
</div>
</div>
<?php
    require 'foot.php';
?>