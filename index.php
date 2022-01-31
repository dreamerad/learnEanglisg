<?php
session_start();
require 'sys/db.php';
// require 'sys/functions.php';


$data = $_POST;
$errors = [];

if (isset($data['auth'])) {
    $sth = $dbh->prepare("SELECT * FROM `users` WHERE `login` = :login");
$sth->execute(
    [
        ':login' => $data['login']
    ]
);

$array = $sth->fetch(PDO::FETCH_ASSOC);
if(empty($data['login']) OR empty($data['password'])){
    $errors[] = 'Все поля обязательны для заполнения';
}
if(empty($errors)) {
	if($array['password'] == $data['password']) {
        $_SESSION['login'] = $data['login'];
        $_SESSION['password'] = $data['password'];

        header('Location: /testList.php');

    } else {
        $errors[] = 'Неверный логин или пароль';
    }

	if($array['password'] == $data['password'] AND $array['status'] == 1) {
		$_SESSION['login'] = $data['login'];
        $_SESSION['password'] = $data['password'];

		header('Location: /admin/admin.php');

	} else {
	$errors[] = 'Неверный логин или пароль';
	}
		}
			}
if(!empty($errors)){
echo ' 
<div class="modAlert" style="margin-right: 500px; margin-top:50px;">
<div class="modAlert-item modAlert-error" style="display: block; "><div class="modAlert-icon"></div>
<div class="modAlert-title">Ошибка</div><div class="modAlert-text">' .array_shift($errors). '</div></div></div>';
}

require 'head.php';
?>    




			
			<!-- start banner Area -->
			<section class="banner-area relative">

				<div class="overlay overlay-bg"></div>			
				<div class="container">
					<div class="row fullscreen align-items-center justify-content-between">
						<div class="col-lg-6 col-md-6 banner-left">
							<h1 class="text-white">Профлингвистика для всех</h1>
							<p class="text-white" style="font-size: 18pt;">
							Лингвистический тренажёр профессиональных терминов.
							</p>
						</div>
						<div class="col-lg-4 col-md-6 banner-right">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
							  <li class="nav-item">
							    <a class="nav-link active" id="flight-tab" data-toggle="tab" href="#flight" role="tab" aria-controls="flight" aria-selected="true">Авторизация</a>
							  </li>
							 
							</ul>
							<div class="tab-content" id="myTabContent">
							  <div class="tab-pane fade show active" id="flight" role="tabpanel" aria-labelledby="flight-tab">
								<form class="form-wrap" method="POST">
									<input type="text" class="form-control" name="login" placeholder="login " onfocus="this.placeholder = ''" onblur="this.placeholder = 'login'">									
									<input type="text" class="form-control" name="password" placeholder="Password " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password '">
									
									<input class="primary-btn text-uppercase" type="submit" name="auth" value="Войти">
								</form>
							  </div>
							  <div class="tab-pane fade" id="hotel" role="tabpanel" aria-labelledby="hotel-tab">
								<form class="form-wrap">
									<input type="text" class="form-control" name="name" placeholder="From " onfocus="this.placeholder = ''" onblur="this.placeholder = 'From '">									
									<input type="text" class="form-control" name="to" placeholder="To " onfocus="this.placeholder = ''" onblur="this.placeholder = 'To '">
									<input type="text" class="form-control date-picker" name="start" placeholder="Start " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Start '">
									<input type="text" class="form-control date-picker" name="return" placeholder="Return " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Return '">
									<input type="number" min="1" max="20" class="form-control" name="adults" placeholder="Adults " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Adults '">
									<input type="number" min="1" max="20" class="form-control" name="child" placeholder="Child " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Child '">						
									<a href="#" class="primary-btn text-uppercase">Search Hotels</a>									
								</form>							  	
							  </div>
							  <div class="tab-pane fade" id="holiday" role="tabpanel" aria-labelledby="holiday-tab">
								<form class="form-wrap">
									<input type="text" class="form-control" name="name" placeholder="From " onfocus="this.placeholder = ''" onblur="this.placeholder = 'From '">									
									<input type="text" class="form-control" name="to" placeholder="To " onfocus="this.placeholder = ''" onblur="this.placeholder = 'To '">
									<input type="text" class="form-control date-picker" name="start" placeholder="Start " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Start '">
									<input type="text" class="form-control date-picker" name="return" placeholder="Return " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Return '">
									<input type="number" min="1" max="20" class="form-control" name="adults" placeholder="Adults " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Adults '">
									<input type="number" min="1" max="20" class="form-control" name="child" placeholder="Child " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Child '">							
									<a href="#" class="primary-btn text-uppercase">Search Holidays</a>									
								</form>							  	
							  </div>
							</div>
						</div>
					</div>
				</div>					
			</section>

			
			</section>

<?php
require 'foot.php';
?>
