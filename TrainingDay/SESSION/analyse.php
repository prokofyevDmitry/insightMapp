

<?php 
session_start();

if(isset($_POST['nom'])) $_SESSION['nom'] = $_POST['nom'];
if(isset($_POST['prenom'])) $_SESSION['prenom'] = $_POST['prenom'];

if(isset($_POST['age']) AND is_numeric($_SESSION['age'])) $_SESSION['age'] = $_POST['age'];

?> 


<?php include ('../inclusion.php')?>

<body>
Merci pour l'inscription
<a href="home.php">Retour vers HOME</a>
</body>
</html>