document.addEventListener('DOMContentLoaded', () => {
    const sidebar = document.getElementById('sidebar');
    const content = document.querySelector('.content');
    const toggleBtn = document.getElementById('sidebarCollapseBtn');

    toggleBtn.addEventListener('click', () => {
        if (window.innerWidth > 768) {
            // Desktop: toggle sidebar fixo
            sidebar.classList.toggle('collapsed');
            content.classList.toggle('expanded');
        } else {
            // Mobile: toggle sidebar como overlay
            sidebar.classList.toggle('show');
        }
    });
});