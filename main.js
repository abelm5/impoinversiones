const grid = new Muuri('.grid', {
    layout: {
        rounding: false
    }
});
window.addEventListener("load", () => {
    grid.refreshItems().layout();
    document.getElementById('grid').classList.add('imagen-cargada');

    const enlaces = document.querySelectorAll('#categorias a');
    enlaces.forEach( (elemento) => {
        elemento.addEventListener('click', (evento) => {
            evento.preventDefault();
            enlaces.forEach((enlaces) => enlaces.classList.remove('activo'));
            evento.target.classList.add('activo');

            const categoria = evento.target.innerHTML.toLowerCase();
            categoria === 'todos' ? grid.filter('[data-categoria]') : grid.filter(`[data-categoria="${categoria}"]`);
        });      
    });
    //Overlay
    const overlay = document.getElementById('overlay');
    document.querySelectorAll('.grid .item img').forEach((elemento) => {
        elemento.addEventListener('click', () => {
            const ruta = elemento.getAttribute('src');
            const descripcion = elemento.parentNode.parentNode.dataset.descripcion;

            overlay.classList.add('act');
            document.querySelector('#overlay img').src = ruta;
            document.querySelector('#overlay .descripcion').innerHTML = descripcion;
        });
    });

    document.querySelector('#btn').addEventListener('click', () => {
        overlay.classList.remove('act');
    });

    document.querySelector('#overlay').addEventListener('click', (evento) => {
        evento.target.id === 'overlay' ? overlay.classList.remove('act') : '';
    });
   
});

