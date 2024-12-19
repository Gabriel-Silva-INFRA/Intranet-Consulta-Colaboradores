document.addEventListener('DOMContentLoaded', function() {
    // Captura todos os itens do submenu
    const submenuItems = document.querySelectorAll('.submenu-item');

    // Adiciona evento de clique a cada item do submenu
    submenuItems.forEach(item => {
        const submenu = item.querySelector('.submenu');

        if (submenu) {
            item.addEventListener('click', () => {
                const isSubMenuOpen = submenu.classList.contains('show');

                // Fecha todos os submenus antes de abrir ou fechar o submenu atual
                closeAllSubmenus();

                if (!isSubMenuOpen) {
                    // Mostra o submenu apenas se não estiver aberto
                    submenu.classList.add('show');
                }
            });
        }
    });

    // Função para fechar todos os submenus
    function closeAllSubmenus() {
        submenuItems.forEach(item => {
            const submenu = item.querySelector('.submenu');
            if (submenu) {
                submenu.classList.remove('show');
            }
        });
    }
});
