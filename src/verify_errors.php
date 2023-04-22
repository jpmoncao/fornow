<?php 
// Inicia a sessão
session_start();

// Verifica se há uma mensagem de erro na sessão
if (isset($_SESSION['error_message'])) {
    // Exibe o alerta
    echo ("
        <div class='toast align-items-center text-bg-danger border-0' role='alert' aria-live='assertive' aria-atomic='true'>
        <div class='d-flex'>
            <div class='toast-body'>".
            $_SESSION['error_message']
            ."
            </div>
            <button type='button' class='btn-close btn-close-white me-2 m-auto' data-bs-dismiss='toast' aria-label='Close'></button>
        </div>
        </div>
        <script>
            const toastEl = document.querySelector('.toast');
            const toast = new bootstrap.Toast(toastEl);
            toast.show();        
        </script>
    ");
    
    // Limpa a mensagem de erro da sessão
    unset($_SESSION['error_message']);
}
?>