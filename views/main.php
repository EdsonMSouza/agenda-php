<?php
include 'topo.php';

if($_SESSION['mensagem'] == "") {
    $mensagem = 'Página Inicial';
} else {
    $mensagem = $_SESSION['mensagem'];
}
?>
    <main class="flex-shrink-0">
        <div class="container">
            <p><?= $mensagem; ?></p>
        </div>
    </main>

<?php
include 'footer.php'
?>