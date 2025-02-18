// js/quiz.js
document.addEventListener('DOMContentLoaded', function() {
    const preguntas = [
        {
            id: 1,
            texto: "¿Qué es un ERP?",
            tipo: "opcion_multiple",
            opciones: [
                "Sistema de planificación de recursos empresariales", 
                "Software de gestión de relaciones con clientes", 
                "Herramienta de análisis de datos"
            ]
        },
        {
            id: 2,
            texto: "Un CRM se utiliza para la gestión de clientes. ¿Verdadero o Falso?",
            tipo: "verdadero_falso"
        }
        // Aquí puedes agregar las preguntas iniciales reales
    ];
    
    // Para este ejemplo, se duplican preguntas hasta tener 20
    while (preguntas.length < 20) {
        let newId = preguntas.length + 1;
        if(newId % 2 === 1) {
            preguntas.push({
                id: newId,
                texto: "Pregunta teórica " + newId + ": ¿Qué es la implementación en un ERP?",
                tipo: "opcion_multiple",
                opciones: ["Proceso de instalación", "Proceso de planificación", "Proceso de desarrollo"]
            });
        } else {
            preguntas.push({
                id: newId,
                texto: "Pregunta práctica " + newId + ": Un CRM mejora la relación con los clientes. ¿Verdadero o Falso?",
                tipo: "verdadero_falso"
            });
        }
    }
    
    const container = document.getElementById('preguntas');
    
    preguntas.forEach(pregunta => {
        const div = document.createElement('div');
        div.className = 'pregunta';
        const p = document.createElement('p');
        p.textContent = pregunta.id + ". " + pregunta.texto;
        div.appendChild(p);
        
        if(pregunta.tipo === 'opcion_multiple'){
            pregunta.opciones.forEach((opcion, index) => {
                const label = document.createElement('label');
                const radio = document.createElement('input');
                radio.type = 'radio';
                radio.name = 'respuestas[' + pregunta.id + ']';
                radio.value = index.toString(); // Se guarda el índice de la opción
                label.appendChild(radio);
                label.appendChild(document.createTextNode(opcion));
                div.appendChild(label);
                div.appendChild(document.createElement('br'));
            });
        } else if(pregunta.tipo === 'verdadero_falso'){
            const opcionesVF = [
                {valor: 'true', texto: 'Verdadero'},
                {valor: 'false', texto: 'Falso'}
            ];
            opcionesVF.forEach(opcion => {
                const label = document.createElement('label');
                const radio = document.createElement('input');
                radio.type = 'radio';
                radio.name = 'respuestas[' + pregunta.id + ']';
                radio.value = opcion.valor;
                label.appendChild(radio);
                label.appendChild(document.createTextNode(opcion.texto));
                div.appendChild(label);
                div.appendChild(document.createElement('br'));
            });
        }
        
        container.appendChild(div);
    });
});
