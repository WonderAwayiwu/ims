const togglebtn = document.getElementById('togglebtn');
const sidebar = document.getElementById('dashboard_sidebar');
const content = document.getElementById('dashboard_content');

togglebtn.addEventListener('click', (event) => {
    event.preventDefault();
    sidebar.classList.toggle('collapsed');
    content.classList.toggle('collapsed');
});