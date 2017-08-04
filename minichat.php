<!DOCTYPE html>
<html lang="en">
<head>	
	<meta charset="UTF-8">
	<title>Minichat</title>
</head>
<body>
	<form action="minichat_post.php" method="post">
			
		<p>
			<label>Pseudo:</label>
				<input type="text" name="pseudo" id="pseudo">
			<label>Message:</label>
				<input type="text" name="message" id="message">

				<input type="submit" value="Send">
		</p>
	</form>
<?php 
//connection a la bdd :

try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', 'root');
}	
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
//recup des 15 dernier messages ( ils ne s'affichent pas encore bonhomme)
$resultat = $bdd->query('SELECT Pseudo, Message, Date_date FROM minichat ORDER BY ID');


while($donnee = $resultat->fetch())
{
	echo '<p>'.htmlspecialchars($donnee['Pseudo']).' : '.htmlspecialchars($donnee['Message']).' at '.$donnee['Date_date'].'</p>';
}
$resultat->closeCursor();

?>

</body>
</html>