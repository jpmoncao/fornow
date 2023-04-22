<footer>
    <ul>
    <li <?php echo (isset($_GET['home'])) ? ' class="list active"' : 'class="list"';?> >
        <a href="?home">
            <span class="icon">
                <ion-icon name="home-outline"></ion-icon>
            </span>
            <span class="text">Home</span>
        </a>
    </li>
    <li <?php echo (isset($_GET['calendario'])) ? ' class="list active"' : 'class="list"';?> >
        <a href="?calendario">
            <span class="icon">
                <ion-icon name="calendar-outline"></ion-icon>
            </span>
            <span class="text">Calendário</span>
        </a>
    </li>
    <li <?php echo (isset($_GET['tarefas'])) ? ' class="list active"' : 'class="list"';?> >
        <a href="?tarefas">
            <span class="icon">
                <ion-icon name="checkmark-circle-outline"></ion-icon>
            </span>
            <span class="text">Tarefas</span>
        </a>
    </li>
    <li <?php echo (isset($_GET['perfil'])) ? ' class="list active"' : 'class="list"';?> >
        <a href="?perfil">
            <span class="icon">
                <ion-icon name="person-outline"></ion-icon>
            </span>
            <span class="text">Perfil</span>
        </a>
    </li>   
        <div class="indicator"></div>
    </ul>    
</footer>
<script>
    const list = document.querySelectorAll('.list');

    function activeLink() {
        list.forEach((item) => item.classList.remove('active'));
        this.classList.add('active');
    }

    list.forEach((item) => item.addEventListener('click', activeLink));
</script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>