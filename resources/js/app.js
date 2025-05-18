import './bootstrap';

import Alpine from 'alpinejs';
import 'flowbite';

window.Alpine = Alpine;

Alpine.start();



window.setEditModalData = function (id, name) {
    console.log("Función llamada con:", id, name);
    document.getElementById('id').value = id;
    document.getElementById('na').value = name;
    document.getElementById('id2').value = id;
    document.getElementById('na2').value = name;
};

window.mostrarModal = function () {
    document.getElementById('authentication-modal2').classList.remove('hidden');
};

window.cerrarModal = function () {
    document.getElementById('authentication-modal2').classList.add('hidden');
};

window.setDeleteRoute = function (id, url) {
    const form = document.getElementById('delete-form');
    const urlTemplate = url;
    form.action = urlTemplate.replace('__id__', id);
};


window.setModalDataCalificacion = function (parcial1, parcial2, parcial3, nombre) {
    document.getElementById('parcial1').value = parcial1 ?? 0;
    document.getElementById('parcial2').value = parcial2;
    document.getElementById('parcial3').value = parcial3;
    const p1 = parseFloat(parcial1);
    const p2 = parseFloat(parcial2);
    const p3 = parseFloat(parcial3);
    document.getElementById('promedio').value = (p1 + p2 + p3) / 3;
    document.getElementById('nombremateria').textContent = nombre;

}


window.ConsultarDocumentos = function () {
    let estado = document.getElementById('estado').value;

    if (estado == '1') {
        console.log('Estado 1');
        fetch('/ConsultarDocumentosTotales')
            .then(response => response.json())
            .then(data => {
                let tableBody = document.getElementById('documentos-table-body');
                tableBody.innerHTML = '';
                data.forEach(item => {
                    let row = document.createElement('tr');
                    row.classList.add('hover:bg-gray-50');
                    row.innerHTML = `
                        <td>${item.id}</td>
                        <td>${item.nombre_hijo} ${item.apaterno_hijo} ${item.amaterno_hijo}</td>`;
                    if (item.documents.length > 0) {

                        for (let i = 0; i < item.documents.length; i++) {
                            row.innerHTML += `<td><a href="/verDocumentMaestro/${item.documents[i].ubicacion}" target="_blank">Ver Documento ${item.documents[i].tipo}</a></td>`;
                        }
                        if (item.documents[1].validado == 0) {
                            row.innerHTML += `<td><a href="/validarDocumentos/${item.id}" class="btn" style="display: inline-block; padding: 6px 12px; background-color: #22c55e; color: white; text-align: center; border-radius: 6px; text-decoration: none; font-size: 14px;">Validar</a>
                                <a class="block" href="/rechazarDocumentos/${item.id}" class="btn"  style="display: inline-block; padding: 6px 12px; background-color: #ef4444; color: white; text-align: center; border-radius: 6px; text-decoration: none; font-size: 14px;">Rechazar</a></td>`;
                        } else {
                            if (item.documents[1].validado == 1) {
                                row.innerHTML += `<td><p class="text-green-500">Validado</p></td>`;
                            } else {
                                row.innerHTML += `<td><p class="text-red-500">Rechazado</p></td>`;
                            }
                        }
                    } else {
                        row.innerHTML += `<td>No hay documento</td>`;
                    }

                    tableBody.appendChild(row);
                });
            })
            .catch(error => console.error('Error:', error));
    }

    if (estado == '2') {
        fetch('/ConsultarDocumentosValidados')
            .then(response => response.json())
            .then(data => {
                let tableBody = document.getElementById('documentos-table-body');
                tableBody.innerHTML = '';
                data.forEach(item => {
                    let row = document.createElement('tr');
                    row.classList.add('hover:bg-gray-50');
                    row.innerHTML = `
                        <td>${item.id}</td>
                        <td>${item.nombre_hijo} ${item.apaterno_hijo} ${item.amaterno_hijo}</td>`;
                    if (item.documents.length > 0) {

                        for (let i = 0; i < item.documents.length; i++) {
                            row.innerHTML += `<td><a href="/verDocumentMaestro/${item.documents[i].ubicacion}" target="_blank">Ver Documento ${item.documents[i].tipo}</a></td>`;
                        }


                        row.innerHTML += `<td><p class="text-green-500">Validado</p></td>`;

                    }
                    tableBody.appendChild(row);
                })
            });
    }

    if (estado == '3') {
        fetch('/ConsultarDocumentosRechazados')
            .then(response => response.json())
            .then(data => {
                let tableBody = document.getElementById('documentos-table-body');
                tableBody.innerHTML = '';
                data.forEach(item => {
                    let row = document.createElement('tr');
                    row.classList.add('hover:bg-gray-50');
                    row.innerHTML = `
                        <td>${item.id}</td>
                        <td>${item.nombre_hijo} ${item.apaterno_hijo} ${item.amaterno_hijo}</td>`;
                    if (item.documents) {

                        for (let i = 0; i < item.documents.length; i++) {
                            row.innerHTML += `<td><a href="/verDocumentMaestro/${item.documents[i].ubicacion}" target="_blank">Ver Documento ${item.documents[i].tipo}</a></td>`;
                        }
                        row.innerHTML += `<td><p class="text-red-500">Rechazado</p></td>`;
                    }
                    tableBody.appendChild(row);
                })
            });

    }

    if (estado == '4') {
        console.log('Estado 1');
        fetch('/ConsultarDocumentosPendientes')
            .then(response => response.json())
            .then(data => {
                let tableBody = document.getElementById('documentos-table-body');
                tableBody.innerHTML = '';
                data.forEach(item => {
                    let row = document.createElement('tr');
                    row.classList.add('hover:bg-gray-50');
                    row.innerHTML = `
                        <td>${item.id}</td>
                        <td>${item.nombre_hijo} ${item.apaterno_hijo} ${item.amaterno_hijo}</td>`;
                    if (item.documents.length > 0) {

                        for (let i = 0; i < item.documents.length; i++) {
                            row.innerHTML += `<td><a href="/verDocumentMaestro/${item.documents[i].ubicacion}" target="_blank">Ver Documento ${item.documents[i].tipo}</a></td>`;
                        }

                        row.innerHTML += `<td><a href="/validarDocumentos/${item.id}" class="btn btn-success" style="display: inline-block; padding: 6px 12px; background-color: #22c55e; color: white; text-align: center; border-radius: 6px; text-decoration: none; font-size: 14px;">Validar</a>
                                <a class="block" href="/rechazarDocumentos/${item.id}" class="btn btn-danger" style="display: inline-block; padding: 6px 12px; background-color: #ef4444; color: white; text-align: center; border-radius: 6px; text-decoration: none; font-size: 14px;">Rechazar</a></td>`;

                    } else {
                        row.innerHTML += `<td>No hay documento</td>`;
                    }

                    tableBody.appendChild(row);
                });
            })
            .catch(error => console.error('Error:', error));
    }


}

window.ConsultarDocumentosPorNombreYApellido = function () {
    let partes = document.getElementById('nombreCompleto').value.trim().split(/\s+/);
    let nombre = '';
    let apaterno = '';
    let amaterno = '';

    if (partes.length === 1) {
        nombre = partes[0];
    } else if (partes.length === 2) {
        nombre = partes[0];
        apaterno = partes[1];
    } else if (partes.length === 3) {
        nombre = partes[0];
        apaterno = partes[1];
        amaterno = partes[2];
    } else if (partes.length >= 4) {
        nombre = partes.slice(0, partes.length - 2).join(' ');
        apaterno = partes[partes.length - 2];
        amaterno = partes[partes.length - 1];
    }


    fetch('/ConsultarDocumentosPorNombreYApellido/' + nombre + '/' + apaterno + '/' + amaterno)
        .then(response => response.json())
        .then(data => {
            let tableBody = document.getElementById('documentos-table-body');
            tableBody.innerHTML = '';
            data.forEach(item => {
                let row = document.createElement('tr');
                row.classList.add('hover:bg-gray-50');
                row.innerHTML = `
                    <td>${item.id}</td>
                    <td>${item.nombre_hijo} ${item.apaterno_hijo} ${item.amaterno_hijo}</td>`;
                if (item.documents.length > 0) {

                    for (let i = 0; i < item.documents.length; i++) {
                        row.innerHTML += `<td><a href="/verDocumentMaestro/${item.documents[i].ubicacion}" target="_blank">Ver Documento ${item.documents[i].tipo}</a></td>`;
                    }
                    if (item.documents[1].validado == 0) {
                        row.innerHTML += `<td><a href="/validarDocumentos/${item.id}" class="btn" style="display: inline-block; padding: 6px 12px; background-color: #22c55e; color: white; text-align: center; border-radius: 6px; text-decoration: none; font-size: 14px;">Validar</a> "`
                            + `<a class="block" href="/rechazarDocumentos/${item.id}" class="btn"  style="display: inline-block; padding: 6px 12px; background-color: #ef4444; color: white; text-align: center; border-radius: 6px; text-decoration: none; font-size: 14px;">Rechazar</a></td>`;


                    } else {
                        if (item.documents[1].validado == 1) {
                            row.innerHTML += `<td><p class="text-green-500">Validado</p></td>`;

                        } else {
                            row.innerHTML += `<td><p class="text-red-500">Rechazado</p></td>`;
                        }
                    }
                }
                tableBody.appendChild(row);
            })

        });

}


window.ConsultarMateriales = function () {

    let nombreMaterial = document.getElementById('nombreMaterial').value.trim();
    let url = nombreMaterial === ''
        ? '/ConsultarTodosLosMateriales'
        : '/ConsultarMateriales/' + encodeURIComponent(nombreMaterial);

    fetch(url)
        .then(response => response.json())
        .then(data => {
            let contenedor = document.getElementById('materiales');
            contenedor.innerHTML = '';

            if (data.length === 0) {
                contenedor.innerHTML = `
                    <div class="p-2 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                        <p class="text-gray-500 dark:text-gray-400">No se encontraron materiales.</p>
                    </div>
                `;
                return;
            }

            let contenido = '<div class="p-2 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">';
            data.forEach(material => {
                contenido += `
                    <div class="mb-4">
                        <h3 class="font-semibold mt-10 text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            ${material.file_name}
                        </h3>
                        <a href="/verArchivo/${material.ubicacion}" target="_blank" class="text-blue-500 text-center">Ver Material</a>
                    </div>
                `;
            });
            contenido += '</div>';
            contenedor.innerHTML = contenido;
        });


}



window.ConsultarMaterialesMaestro = function () {

    let nombreMaterial = document.getElementById('nombreMaterial').value.trim();
    let url = nombreMaterial === ''
        ? '/ConsultarTodosLosMaterialesMaestro'
        : '/ConsultarMaterialesMaestro/' + encodeURIComponent(nombreMaterial);

    fetch(url)
        .then(response => response.json())
        .then(data => {
            let contenedor = document.getElementById('materiales');
            contenedor.innerHTML = '';

            if (data.length === 0) {
                contenedor.innerHTML = `
                    <div class="p-2 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                        <p class="text-gray-500 dark:text-gray-400">No se encontraron materiales.</p>
                    </div>
                `;
                return;
            }

            let contenido = `
            `;

            data.forEach(material => {
                contenido += `
                    <a href="/verArchivo/${material.ubicacion}" target="_blank" class="block p-4 bg-white rounded-lg shadow hover:bg-gray-50 transition dark:bg-gray-800 dark:hover:bg-gray-700">
                        <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200">${material.file_name}</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Presiona para verlo</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Subido el: ${new Date(material.created_at).toLocaleDateString('es-MX')}</p>
                        
                        <button 
                            type="button"
                            class="bg-blue-600 text-white text-xs px-2 py-1 rounded opacity-80 hover:opacity-100 mt-2 mb-2"
                            onclick="event.stopPropagation(); event.preventDefault(); setEditModalData('${material.id}', \`${material.file_name.replace(/`/g, '\\`')}\`); mostrarModal();">
                            Cambiar nombre
                        </button>

                        <form action="/materiales/eliminar/${material.id}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este material?'); event.stopPropagation();">
                            <input type="hidden" name="_token" value="${document.querySelector('meta[name=csrf-token]').content}">
                            <input type="hidden" name="_method" value="DELETE">
                            <button 
                                type="submit"
                                class="bg-red-600 text-white text-xs px-2 py-1 rounded opacity-80 hover:opacity-100">
                                Eliminar
                            </button>
                        </form>
                    </a>
                `;
            });

            contenido += '</div>';
            contenedor.innerHTML = contenido;
        });



}
window.ConsultarCalificaciones = function ($id) {

    const query = document.getElementById("nombreAlumno").value;
    const materiaId = $id;
    fetch(`/buscar-calificaciones/${materiaId}?query=${encodeURIComponent(query)}`)
        .then(response => response.json())
        .then(data => {
            const tbody = document.querySelector("tbody");
            tbody.innerHTML = ""; // Limpiar tabla

            if (data.length === 0) {
                tbody.innerHTML = `<tr><td colspan="5" class="text-center py-4 text-gray-500">No se encontraron resultados.</td></tr>`;
                return;
            }

            data.forEach(calificacion => {
                const alumno = calificacion.alumno;
                const promedio = (
                    (parseFloat(calificacion.parcial1) +
                        parseFloat(calificacion.parcial2) +
                        parseFloat(calificacion.parcial3)) / 3
                ).toFixed(2);

                const row = `
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                ${alumno.nombre_hijo} ${alumno.apaterno_hijo} ${alumno.amaterno_hijo}
                            </th>
                            <td class="px-6 py-4">
                                <input type="text" name="calificacions[${alumno.id}][parcial1]" value="${calificacion.parcial1}" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" />
                            </td>
                            <td class="px-6 py-4">
                                <input type="text" name="calificacions[${alumno.id}][parcial2]" value="${calificacion.parcial2}" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" />
                            </td>
                            <td class="px-6 py-4">
                                <input type="text" name="calificacions[${alumno.id}][parcial3]" value="${calificacion.parcial3}" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" />
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                ${promedio}
                            </td>
                        </tr>
                    `;

                tbody.insertAdjacentHTML('beforeend', row);
            });
        })
        .catch(error => {
            console.error("Error al buscar calificaciones:", error);
        });

}


window.ConsultarMaestros = function () {

    const query = document.getElementById("nombreMaestro").value;
        fetch(`/ConsultarMaestros?query=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(data => {
                const container = document.querySelector(".grid");

                container.innerHTML = ""; // Limpiar resultados

                if (data.length === 0) {
                    container.innerHTML = `<div class="col-span-full text-center text-gray-500">No se encontraron maestros</div>`;
                    return;
                }

                data.forEach(maestro => {
                    const user = maestro.user;
                    const ruta = `/clase/${maestro.id}`; // Asegúrate que coincida con tu route('clase', $maestro->id)
                    const titulo = `Clase de: ${user.name} ${user.apaterno} ${user.amaterno}`;

                    const card = `
                    <div>
                        <a href="${ruta}"
                            class="block max-w-xl p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 justify-items-center">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">${titulo}</h5>
                        </a>
                    </div>
                    `;

                    container.insertAdjacentHTML('beforeend', card);
                });
            })
            .catch(error => {
                console.error("Error al consultar maestros:", error);
            });


}


