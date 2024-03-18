@extends('templates/authTemplate')
@section('contenido')

    <div class="bg-white">

        <section class="mt-[10px]">
            <div class="bg-white rounded-md py-1 flex justify-between items-center mb-10 border-b-2">
                <h1 class="text-2xl font-bold font-kanit ml-6">Eventos</h1>
                {{-- buscador --}}
                <div class="w-[50%] flex justify-evenly">
                    <input placeholder="Buscador" type="search" name="d" id="" class="w-[50%] placeholder:text-green placeholder:px-3 rounded-md mb-4 border-2 border-green focus:outline-none px-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="absolute mt-1 ml-14 icon icon-tabler icon-tabler-search" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#1DAF90" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                        <path d="M21 21l-6 -6" />
                    </svg>
                    <svg width="28" height="38" viewBox="0 0 14 22" class="mt-3"  fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_641_2165)">
                        <path d="M12.6056 12.3749H1.4056C0.163097 12.3749 -0.466904 13.8573 0.416847 14.721L6.01685 20.221C6.56372 20.7581 7.45185 20.7581 7.99872 20.221L13.5987 14.721C14.4737 13.8573 13.8481 12.3749 12.6056 12.3749ZM7.0056 19.2499L1.4056 13.7499H12.6056L7.0056 19.2499ZM1.4056 9.6249H12.6056C13.8481 9.6249 14.4781 8.14248 13.5943 7.27881L7.99435 1.77881C7.44747 1.2417 6.55935 1.2417 6.01247 1.77881L0.412472 7.27881C-0.462528 8.14248 0.163097 9.6249 1.4056 9.6249ZM7.0056 2.7499L12.6056 8.2499H1.4056L7.0056 2.7499Z" fill="#02AB82"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_641_2165">
                        <rect width="14" height="22" fill="white" transform="translate(0.00585938)"/>
                        </clipPath>
                        </defs>
                        </svg>
                        <button class="bg-green text-lg p-[1.4%] rounded-md text-white mb-4" id="myBtn">Agregar nuevo evento</button>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-20 ms:grid-rows-1" id="eventsContainer">
            </div>
            
    </section>
        <div id="myModal" class="absolute hidden inset-0 h-[115%] justify-center items-center bg-black bg-opacity-50">
            <div class="w-[30%] bg-white rounded-lg p-8 absolute"> 
                <span class="absolute top-0 right-0 m-4 cursor-pointer close font-bold text-gray-600 text-2xl">×</span> 
            <form id="eventForm" class="flex flex-col items-start p-10">
                <label for="tituloEvento" class="mt-4">Titulo del evento</label>
                <input type="text" id="tituloEvento" autofocus placeholder="Titulo" class="w-full px-2 py-1 border border-gray-300 rounded-md mt-1 focus:outline-none">
                <label for="fecha" class="mt-4">Fecha</label>
                <input type="date" id="fecha"  placeholder="DD/MM/YYYY" class="w-full px-2 py-1 border border-gray-300 rounded-md mt-1 focus:outline-none">
                <label for="hora" class="mt-4">Hora</label>
                <input type="time" id="hora"  placeholder="Hora" class="w-full px-2 py-1 border border-gray-300 rounded-md mt-1 focus:outline-none">
                <input type="submit" placeholder="enviar" value="Añadir" class="bg-green text-white w-full py-2 rounded-md mt-4 cursor-pointer">
            </form>
        </div>
</div>
    
    
    
    <script>
        const events = [
            {id:1,date:"Martes 20/02/2024",cont1:"Revision de memoria",time1:"8:40 a 9:30",cont2:"Reunion con Mario Hugo",time2:"10:50 a 11:40"},
            {id:2,date:"Martes 20/02/2024",cont1:"Revision de memoria",time1:"8:40 a 9:30",cont2:"Reunion con Mario Hugo",time2:"10:50 a 11:40"},
            {id:3,date:"Martes 20/02/2024",cont1:"Revision de memoria",time1:"8:40 a 9:30",cont2:"Reunion con Mario Hugo",time2:"10:50 a 11:40"},
            {id:4,date:"Martes 20/02/2024",cont1:"Revision de memoria",time1:"8:40 a 9:30",cont2:"Reunion con Mario Hugo",time2:"10:50 a 11:40"},
            {id:5,date:"Martes 20/02/2024",cont1:"Revision de memoria",time1:"8:40 a 9:30",cont2:"Reunion con Mario Hugo",time2:"10:50 a 11:40"},
            {id:6,date:"Martes 20/02/2024",cont1:"Revision de memoria",time1:"8:40 a 9:30",cont2:"Reunion con Mario Hugo",time2:"10:50 a 11:40"},
            {id:7,date:"Martes 20/02/2024",cont1:"Revision de memoria",time1:"8:40 a 9:30",cont2:"Reunion con Mario Hugo",time2:"10:50 a 11:40"},
            {id:8,date:"Martes 20/02/2024",cont1:"Revision de memoria",time1:"8:40 a 9:30",cont2:"Reunion con Mario Hugo",time2:"10:50 a 11:40"},
            {id:9,date:"Martes 20/02/2024",cont1:"Revision de memoria",time1:"8:40 a 9:30",cont2:"Reunion con Mario Hugo",time2:"10:50 a 11:40"}
        ];

        const eventsContainer = document.getElementById('eventsContainer');

        events.forEach(event => {
            const eventHtml = `
                <div class="mb-10 ml-24">
                    <h3 class="text-darkBlue font-bold text-xl">${event.date}</h3>
                    <ol class="border-l border-dashed border-primaryColor font-roboto">
                        <li>
                            <div class="flex-start flex items-center pt-3">
                                <div class="-ml-[5px] mr-3 h-[9px] w-[9px] rounded-full bg-primaryColor"></div>
                                <h4 class="text-lg font-semibold">${event.cont1}</h4>
                            </div>
                            <div class="ml-4">
                                <time class="text-[#888] text-sm">${event.time1}</time>
                            </div>
                        </li>
                        <li>
                            <div class="flex-start flex items-center pt-3">
                                <div class="-ml-[5px] mr-3 h-[9px] w-[9px] rounded-full bg-primaryColor"></div>
                                <h4 class="text-lg font-semibold">${event.cont2}</h4>
                            </div>
                            <div class="ml-4">
                                <time class="text-[#888] text-sm">${event.time2}</time>
                            </div>
                        </li>
                    </ol>
                </div>
            `;
            eventsContainer.innerHTML += eventHtml;
        });

        // Obtén el modal
        var modal = document.getElementById("myModal");

        // Obtén el botón que abre el modal
        var btn = document.getElementById("myBtn");

        // Obtén el elemento <span> que cierra el modal
        var span = document.getElementsByClassName("close")[0];

        // Cuando el usuario haga clic en el botón, abre el modal 
        btn.onclick = function() {
          modal.style.display = "flex";
        }

        // Cuando el usuario haga clic en <span> (x), cierra el modal
        span.onclick = function() {
          modal.style.display = "none";
        }

        // Cuando el usuario haga clic en cualquier lugar fuera del modal, cierra el modal
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
        function mostrarError(input, mensaje) {
    var span = document.createElement('span');
    span.textContent = mensaje;
    span.classList.add('text-red', 'text-sm');
    input.parentNode.insertBefore(span, input.nextSibling);
}

function limpiarErrores() {
    var errores = document.querySelectorAll('text-red');
    errores.forEach(error => error.remove());
}

function validarFormulario() {
    limpiarErrores();

    var tituloEvento = document.getElementById('tituloEvento');
    var fecha = document.getElementById('fecha');
    var hora = document.getElementById('hora');

    var regex = /^[a-zA-Z0-9]+$/;

    // if (tituloEvento.value.trim() === '' || !regex.test(tituloEvento.value)) {
    //     mostrarError(tituloEvento, 'El campo "Titulo del evento" es inválido');
    //     return false;
    // }
    // if (fecha.value.trim() === '' || !regex.test(fecha.value)) {
    //     mostrarError(fecha, 'El campo "Fecha" es inválido');
    //     return false;
    // }
    // if (hora.value.trim() === '' || !regex.test(hora.value)) {
    //     mostrarError(hora, 'El campo "Hora" es inválido');
    //     return false;
    // }

    return true;
}

document.getElementById('eventForm').addEventListener('submit', function(event) {
    if (!validarFormulario()) {
        event.preventDefault();
    }
});


    </script>
@endsection
