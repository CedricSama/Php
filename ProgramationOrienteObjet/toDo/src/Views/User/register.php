<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Assets/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-6 col-xs-offset-3 well">
            <h1>Bienvenue à la ToDoList !</h1>
            <h2>Merci de créer un compter</h2>
            <?php \TODO\Services\ToolBox::getFlash() ?>
            <form action="?action=User/doRegister" method="POST">
                <?= $form->input('login','votre login',['type'=>'text','css'=>'form-control','required'=>true]); ?>
                <?= $form->input('password','votre mot de passe',
                    ['type'=>'password','css'=>'form-control','required'=>true]); ?>
                <?= $form->input('nom','votre nom',['type'=>'text','css'=>'form-control','required'=>true]); ?>
                <?= $form->input('prenom','votre prénom',['type'=>'text','css'=>'form-control','required'=>true]); ?>
                <?= $form->input('email','votre email',['type'=>'email','css'=>'form-control','required'=>true]); ?>
                <?= $form->submit(['css'=>'btn btn-primary pull-right','value'=>'se connecter']); ?>
            </form>
        </div>
    </div>
</div>
</body>
</html>