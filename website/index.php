<?php
$pdo = new PDO("mysql:host=db;dbname=livredor", "soumia", "soumia123");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $stmt = $pdo->prepare("INSERT INTO messages (nom, message) VALUES (?, ?)");
  $stmt->execute([$_POST["nom"], $_POST["message"]]);
}
$messages = $pdo->query("SELECT * FROM messages ORDER BY id DESC");
?>
<h1>Livre d'Or 📖</h1>
<form method="post">
  <input name="nom" placeholder="Votre nom" required>
  <br>
  <textarea name="message" placeholder="Votre message" required></textarea>
  <br>
  <button type="submit">Envoyer</button>
</form>
<h2>Messages :</h2>
<ul>
  <?php foreach ($messages as $msg): ?>
    <li><strong><?= htmlspecialchars($msg['nom']) ?></strong> : <?= htmlspecialchars($msg['message']) ?></li>
  <?php endforeach; ?>
</ul>
