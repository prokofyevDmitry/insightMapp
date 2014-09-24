<?php 
session_start();
include ('../inclusion.php');
?>

<body>
 
<header>
<?php echo ('Bonjour  ' . $_SESSION['nom'] .' '. $_SESSION['prenom'])?>
<h1> Home</h1>
<p> Ici vous aller retrouver les photos que vous posterais</p>


</header>

</body>