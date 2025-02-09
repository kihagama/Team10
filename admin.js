
    function toggleMenu() {
        const menu = document.getElementById('menu');
        menu.classList.toggle('show');
    }

    // Add interactivity for form submission (optional animations)
    const form = document.querySelector('form');
    form.addEventListener('submit', (e) => {
        form.querySelector('button').textContent = 'Submitting...';
        form.querySelector('button').style.backgroundColor = '#ff9800';
    });

