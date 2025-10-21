<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bot Optimizado - Quota Salud</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        :root {
            --primary-color: #1729ad;
            --secondary-color: #739e57;
            --accent-color: #25D366;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
            --gray-light: #e9ecef;
            --gray-medium: #adb5bd;
            --shadow: 0 4px 15px rgba(0, 0, 0, .1);
            --shadow-hover: 0 6px 20px rgba(0, 0, 0, .15);
            --border-radius: 15px;
            --transition: all .3s ease;
        }

        body {
            margin: 0;
            font-family: sans-serif;
            background: #f0f8ff;
        }

        .content {
            height: 2000px;
            padding: 20px;
            background: linear-gradient(to bottom, #f0f8ff, #e6f7ff);
        }

        .floating-buttons {
            position: fixed;
            bottom: 30px;
            right: 30px;
            display: flex;
            flex-direction: column;
            gap: 15px;
            z-index: 99999;
        }

        .floating-btn {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-size: 1.5rem;
            box-shadow: var(--shadow);
            transition: var(--transition);
            text-decoration: none;
        }

        .btn-top {
            background: var(--secondary-color);
            opacity: 0;
            pointer-events: none;
            transform: translateY(50px);
            order: 1;
        }

        .btn-top.show {
            opacity: 1;
            pointer-events: auto;
            transform: translateY(0);
        }

        .btn-whatsapp {
            background: var(--accent-color);
            order: 3;
        }

        .chat-bubble {
            width: 80px;
            height: 80px;
            background-color: #fff;
            box-shadow: var(--shadow);
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            animation: float 3s ease-in-out infinite;
            order: 2;
            border-radius: 50%;
            border: 2px solid var(--primary-color);
            padding: 0;
            cursor: pointer;
            position: relative;
        }

        .chat-bubble img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .notification-dot {
            position: absolute;
            top: 5px;
            right: 5px;
            width: 12px;
            height: 12px;
            background-color: #ff4757;
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        .floating-btn:hover,
        .chat-bubble:hover {
            transform: scale(1.1);
            box-shadow: var(--shadow-hover);
        }

        @keyframes float {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-5px);
            }

            100% {
                transform: translateY(0);
            }
        }

        @keyframes pulse {
            0% {
                transform: scale(0.95);
                box-shadow: 0 0 0 0 rgba(255, 71, 87, .7);
            }

            70% {
                transform: scale(1);
                box-shadow: 0 0 0 10px rgba(255, 71, 87, 0);
            }

            100% {
                transform: scale(0.95);
                box-shadow: 0 0 0 0 rgba(255, 71, 87, 0);
            }
        }

        .chat-window {
            position: fixed;
            bottom: 130px;
            right: 30px;
            width: 28vw;
            max-width: 420px;
            min-width: 320px;
            height: 70vh;
            max-height: 650px;
            min-height: 480px;
            background-color: #fff;
            border-radius: 18px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .2);
            display: none;
            flex-direction: column;
            z-index: 99998;
            overflow: hidden;
            transition: all .3s ease;
            opacity: 0;
            transform: translateY(20px) scale(0.95);
        }

        .chat-window.active {
            display: flex;
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        .chat-body {
            flex: 1;
            padding: 18px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 14px;
            background-color: #f8f9fa;
            scroll-behavior: smooth;
        }

        .chat-body::-webkit-scrollbar {
            width: 6px;
        }

        .chat-body::-webkit-scrollbar-thumb {
            background: var(--gray-medium);
            border-radius: 8px;
        }

        .chat-body::-webkit-scrollbar-thumb:hover {
            background: var(--primary-color);
        }

        @media(max-width:768px) {
            .floating-buttons {
                bottom: 20px;
                right: 20px;
            }

            .floating-btn,
            .chat-bubble {
                width: 60px;
                height: 60px;
                font-size: 1.2rem;
            }

            .chat-window {
                width: calc(100vw - 40px);
                height: 60vh;
                right: 20px;
                left: 20px;
                bottom: 110px;
            }
        }

        .chat-header {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top-left-radius: var(--border-radius);
            border-top-right-radius: var(--border-radius);
            box-shadow: 0 2px 5px rgba(0, 0, 0, .1);
        }

        .chat-header-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .chat-header h3 {
            margin: 0;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .chat-header img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid rgba(255, 255, 255, .3);
        }

        .chat-status {
            font-size: .75rem;
            opacity: .9;
            margin-top: 2px;
        }

        .close-chat {
            background: rgba(255, 255, 255, .2);
            border: none;
            color: white;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .close-chat:hover {
            background: rgba(255, 255, 255, .3);
            transform: rotate(90deg);
        }

        .chat-message {
            padding: 12px 16px;
            border-radius: 18px;
            max-width: 85%;
            font-size: .9rem;
            line-height: 1.4;
            position: relative;
            box-shadow: 0 1px 2px rgba(0, 0, 0, .1);
            animation: messageAppear .3s ease-out;
        }

        @keyframes messageAppear {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .bot-message {
            background-color: white;
            color: var(--dark-color);
            align-self: flex-start;
            border-bottom-left-radius: 5px;
            border: 1px solid var(--gray-light);
        }

        .user-message {
            background-color: var(--primary-color);
            color: white;
            align-self: flex-end;
            border-bottom-right-radius: 5px;
        }

        .message-time {
            font-size: .7rem;
            opacity: .7;
            margin-top: 5px;
            text-align: right;
        }

        .bot-message .message-time {
            text-align: left;
        }

        .chat-options {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 15px;
        }

        .option-btn {
            background-color: white;
            border: 1px solid var(--gray-light);
            border-radius: 20px;
            padding: 10px 16px;
            text-align: left;
            cursor: pointer;
            transition: var(--transition);
            font-size: .85rem;
            color: var(--dark-color);
            box-shadow: 0 1px 3px rgba(0, 0, 0, .05);
        }

        .option-btn:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 3px 8px rgba(23, 41, 173, .2);
        }

        .yes-no-buttons {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .yes-btn,
        .no-btn {
            flex: 1;
            padding: 10px 16px;
            border: none;
            border-radius: 20px;
            text-align: center;
            cursor: pointer;
            transition: var(--transition);
            font-size: .85rem;
            font-weight: 500;
        }

        .yes-btn {
            background-color: var(--secondary-color);
            color: white;
        }

        .yes-btn:hover {
            background-color: #5a8a3f;
            transform: translateY(-2px);
            box-shadow: 0 3px 8px rgba(115, 158, 87, .3);
        }

        .no-btn {
            background-color: #6c757d;
            color: white;
        }

        .no-btn:hover {
            background-color: #5a6268;
            transform: translateY(-2px);
            box-shadow: 0 3px 8px rgba(108, 117, 125, .3);
        }

        .chat-footer {
            padding: 15px 20px;
            border-top: 1px solid var(--gray-light);
            display: flex;
            gap: 10px;
            background-color: white;
        }

        .chat-input-container {
            flex: 1;
            position: relative;
        }

        .chat-input {
            width: 100%;
            padding: 12px 45px 12px 16px;
            border: 1px solid var(--gray-light);
            border-radius: 25px;
            outline: none;
            font-size: .9rem;
            transition: var(--transition);
        }

        .chat-input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(23, 41, 173, .1);
        }

        .send-btn {
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: var(--transition);
        }

        .send-btn:hover {
            background-color: var(--secondary-color);
            transform: translateY(-50%) scale(1.05);
        }

        .user-type-selector {
            display: flex;
            margin-bottom: 15px;
            border-radius: 25px;
            overflow: hidden;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, .1);
            border: 1px solid var(--gray-light);
        }

        .user-type-btn {
            flex: 1;
            padding: 10px;
            text-align: center;
            background: none;
            border: none;
            cursor: pointer;
            font-size: .85rem;
            transition: var(--transition);
            font-weight: 500;
        }

        .user-type-btn.active {
            background-color: var(--primary-color);
            color: white;
        }

        .user-type-info {
            text-align: center;
            margin-bottom: 15px;
            font-size: .8rem;
            color: var(--gray-medium);
        }

        .welcome-message {
            text-align: center;
            padding: 10px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 600;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>


    <!-- Ventana de Chat -->
    <div class="chat-window" id="chatWindow">
        <div class="chat-header">
            <div class="chat-header-info">
                <img src="img/BotQuoticoSalud.png" alt="Bot QuiticoSalud">
                <div>
                    <h3>Asistente Quota Salud</h3>
                    <div class="chat-status">En línea</div>
                </div>
            </div>
            <button class="close-chat" id="closeChat"><i class="fas fa-times"></i></button>
        </div>
        <div class="chat-body" id="chatBody"></div>

        <div class="chat-footer">
            <div class="chat-input-container">
                <input type="text" class="chat-input" id="chatInput" placeholder="Escribe tu pregunta...">
                <button class="send-btn" id="sendBtn"><i class="fas fa-paper-plane"></i></button>
            </div>
        </div>
    </div>

    <!-- Botones Flotantes -->
    <div class="floating-buttons">
        <a href="#" class="floating-btn btn-top" title="Volver al inicio" id="btn-top"><i class="fas fa-arrow-up"></i></a>
        <a href="https://wa.me/584226077838?text=Hola,%20quiero%20información" target="_blank" class="floating-btn btn-whatsapp" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
        <div class="chat-bubble" title="Chatea con nuestro Asistente" id="openChat"><img src="img/BotQuoticoSalud.png" alt="Bot QuiticoSalud">
            <div class="notification-dot"></div>
        </div>
    </div>

    <script>
        // FAQ Data
        const faqData = {
            b2c: [{
                    question: "¿Qué es Quota Salud?",
                    answer: "Quota Salud es una solución innovadora que te permite acceder a tratamientos médicos, odontológicos y exámenes complementarios a un diagnóstico, ofreciendo Facilidad de Pago en cuotas sin intereses y de forma segura. Nuestro propósito es que nunca dejes de cuidar tu salud por motivos económicos.",
                    cta: "¿Quieres continuar con otra pregunta?"
                },
                {
                    question: "¿Dónde está ubicada Quota Salud?",
                    answer: "Quota Salud está ubicada 100% en el ámbito digital. Somos una plataforma tecnológica. No somos una clínica ni un centro físico, sino la herramienta que te permite acceder y pagar en cuotas sin intereses por servicios de salud de alta calidad en cualquier centro médico u odontológico o establecimiento de la salud que esté registrado en Quota Salud, gracias a nuestra red de aliados.",
                    cta: "¿Quieres continuar con otra pregunta?"
                },
                {
                    question: "¿Cómo funciona Quota Salud?",
                    answer: "Funcionar con nosotros es un proceso rápido, digital y en tres pasos: 1. Regístrate y Conoce tu Monto Disponible. 2. Activa tu Orden de Pago en un Centro o Profesional Aliado. 3. Comienza tu Tratamiento y Paga con Facilidad.",
                    cta: "¿Quieres continuar con otra pregunta?"
                },
                {
                    question: "¿Cuáles son los planes disponibles?",
                    answer: "En QuotaSalud el plan eres tú y tus necesidades. No ofrecemos planes genéricos ni paquetes predefinidos, sino que te damos acceso a un abanico de servicios que se ajustan a lo que realmente necesitas. Nuestra propuesta se centra en la flexibilidad y personalización.",
                    cta: "¿Quieres continuar con otra pregunta?"
                },
                {
                    question: "¿Cómo accedo a un plan?",
                    answer: "Acceder a QuotaSalud es un proceso rápido y totalmente digital diseñado para llevarte directamente a tu tratamiento. Sigue estos sencillos pasos: 1. Regístrate y Descubre tu Potencial. 2. Obtén tu Monto Disponible. 3. Activa y Utiliza tu Facilidad de Pago.",
                    cta: "¿Quieres continuar con otra pregunta?"
                },
                {
                    question: "¿Qué requisitos necesito para registrarme?",
                    answer: "El proceso es sencillo, rápido y 100% digital. Solo necesitas ser Mayor de Edad y tener tu Cédula de Identidad Vigente, y proveer datos personales básicos como correo y teléfono activo.",
                    cta: "¿Quieres continuar con otra pregunta?"
                }
            ],
            b2b: [{
                    question: "¿Qué es Quota Salud?",
                    answer: "Quota Salud es una herramienta estratégica de crecimiento para tu clínica. Te ayudamos a aumentar tus ventas y a captar más pacientes. A los pacientes les damos la posibilidad de organizar sus pagos en cómodas cuotas, eliminando el riesgo de perder oportunidades por motivos económicos.",
                    cta: "¿Quieres continuar con otra pregunta?"
                },
                {
                    question: "¿Cómo funciona para mi clínica?",
                    answer: "Tu clínica se registra en nuestra plataforma. Los pacientes compran sus planes en tu clínica o de forma digital y tú recibes el pago completo de manera inmediata mientras el paciente paga cómodamente en cuotas.",
                    cta: "¿Quieres continuar con otra pregunta?"
                },
                {
                    question: "¿Qué beneficios ofrece Quota Salud?",
                    answer: "Incremento de ingresos, mayor captación de pacientes, facilidad administrativa y seguimiento completo de pagos sin riesgo de impago.",
                    cta: "¿Quieres continuar con otra pregunta?"
                },
                {
                    question: "¿Qué requisitos necesito para registrar mi clínica?",
                    answer: "Solo necesitas ser representante legal de tu clínica y proporcionar datos legales y bancarios válidos.",
                    cta: "¿Quieres continuar con otra pregunta?"
                }
            ]
        };

        // Keywords para matching
        const faqKeywords = {
            b2c: [{
                    question: "¿Qué es Quota Salud?",
                    keywords: ["qué es", "concepto", "definición", "servicio", "quota salud"]
                },
                {
                    question: "¿Dónde está ubicada Quota Salud?",
                    keywords: ["ubicación", "dónde", "dirección", "localización"]
                },
                {
                    question: "¿Cómo funciona Quota Salud?",
                    keywords: ["funciona", "uso", "cómo usar", "pasos", "operar"]
                },
                {
                    question: "¿Cuáles son los planes disponibles?",
                    keywords: ["planes", "disponibles", "opciones", "paquetes"]
                },
                {
                    question: "¿Cómo accedo a un plan?",
                    keywords: ["acceder", "obtener plan", "activar", "monto disponible"]
                },
                {
                    question: "¿Qué requisitos necesito para registrarme?",
                    keywords: ["requisitos", "registrarse", "registro", "necesito"]
                }
            ],
            b2b: [{
                    question: "¿Qué es Quota Salud?",
                    keywords: ["qué es", "concepto", "definición", "servicio", "quota salud"]
                },
                {
                    question: "¿Cómo funciona para mi clínica?",
                    keywords: ["funciona", "uso", "pasos", "activar", "clinica"]
                },
                {
                    question: "¿Qué beneficios ofrece Quota Salud?",
                    keywords: ["beneficios", "ventajas", "ganancias", "mejoras"]
                },
                {
                    question: "¿Qué requisitos necesito para registrar mi clínica?",
                    keywords: ["requisitos", "registrar", "registro", "clinica", "necesito"]
                }
            ]
        };

        let selectedType = null;
        const chatWindow = document.getElementById("chatWindow");
        const openChat = document.getElementById("openChat");
        const closeChat = document.getElementById("closeChat");
        const chatBody = document.getElementById("chatBody");
        const chatInput = document.getElementById("chatInput");
        const sendBtn = document.getElementById("sendBtn");

        // Abrir chat
        openChat.addEventListener("click", () => {
            chatWindow.classList.add("active");
            chatInput.focus();
        });

        // Cerrar chat
        closeChat.addEventListener("click", () => {
            chatWindow.classList.remove("active");
        });

        // Mostrar mensaje
        function addMessage(message, type) {
            const msg = document.createElement("div");
            msg.classList.add("chat-message", type + "-message");
            msg.innerHTML = `${message}<div class="message-time">${new Date().toLocaleTimeString([], {hour:'2-digit',minute:'2-digit'})}</div>`;
            chatBody.appendChild(msg);
            chatBody.scrollTop = chatBody.scrollHeight;
        }

        // Selector tipo usuario sin parpadeo
        function showUserTypeSelector() {
            chatBody.innerHTML = "";
            addMessage('<div class="welcome-message">Bienvenido a Quota Salud</div>', 'bot');

            const container = document.createElement("div");
            container.classList.add("user-type-selector");

            const infoBox = document.createElement("div");
            infoBox.classList.add("user-info-box");
            Object.assign(infoBox.style, {
                marginTop: "10px",
                padding: "10px",
                backgroundColor: "#f1f1f1",
                borderRadius: "8px",
                minHeight: "60px"
            });

            const infoData = {
                b2c: "<strong>Para usuarios:</strong> Somos la solución inmediata que les permite comenzar hoy mismo cualquier tratamiento de nuestra red de Aliados, utilizando monto disponible y gestionando el costo restante con nuestra facilidad de pago en cuotas sin intereses.",
                b2b: "<strong>Para aliados/clínicas:</strong> Somos un canal de crecimiento garantizado que les permite atraer más pacientes, asegurar flujo constante de ingresos por servicios y evitar preocupaciones logísticas relacionadas con el cobro."
            };

            function createButton(type, text) {
                const btn = document.createElement("button");
                btn.classList.add("user-type-btn");
                btn.innerText = text;

                btn.addEventListener("mouseenter", () => infoBox.innerHTML = infoData[type]);
                btn.onclick = () => {
                    selectedType = type;
                    container.remove();
                    infoBox.remove();
                    showFaqOptions();
                };
                return btn;
            }

            container.appendChild(createButton("b2c", "Usuario"));
            container.appendChild(createButton("b2b", "Aliado / Clínica"));
            chatBody.appendChild(container);
            chatBody.appendChild(infoBox);
        }

        // Mostrar opciones FAQ
        function showFaqOptions() {
            addMessage("Selecciona una pregunta de nuestra lista o escribe tu consulta:", 'bot');
            const container = document.createElement("div");
            container.classList.add("chat-options");
            faqData[selectedType].forEach(item => {
                const btn = document.createElement("button");
                btn.classList.add("option-btn");
                btn.innerText = item.question;
                btn.onclick = () => {
                    addMessage(item.question, 'user');
                    addMessage(item.answer, 'bot');
                    askCTA(item.cta);
                };
                container.appendChild(btn);
            });
            chatBody.appendChild(container);
        }

        // CTA (Sí/No)
        function askCTA(ctaText) {
            const container = document.createElement("div");
            container.classList.add("yes-no-buttons");
            const yesBtn = document.createElement("button");
            yesBtn.classList.add("yes-btn");
            yesBtn.innerText = "Sí";
            yesBtn.onclick = () => {
                container.remove();
                showFaqOptions();
            };
            const noBtn = document.createElement("button");
            noBtn.classList.add("no-btn");
            noBtn.innerText = "No";
            noBtn.onclick = () => {
                container.remove();
                addMessage("¡Perfecto! Si necesitas algo más, solo abre el chat nuevamente.", 'bot');
            };
            container.appendChild(yesBtn);
            container.appendChild(noBtn);
            addMessage(ctaText, 'bot');
            chatBody.appendChild(container);
        }

        // Enviar mensaje escrito con matching de keywords
        function sendMessage() {
            const msg = chatInput.value.trim();
            if (!msg || !selectedType) return;
            addMessage(msg, 'user');
            chatInput.value = "";

            const faqArray = faqData[selectedType];
            const keywordsArray = faqKeywords[selectedType];

            // Puntaje por coincidencia
            let bestMatch = null;
            let maxScore = 0;

            for (const item of keywordsArray) {
                let score = 0;
                for (const kw of item.keywords) {
                    if (msg.toLowerCase().includes(kw.toLowerCase())) score++;
                }
                if (score > maxScore) {
                    maxScore = score;
                    bestMatch = faqArray.find(f => f.question === item.question);
                }
            }

            if (bestMatch && maxScore > 0) {
                addMessage(bestMatch.answer, 'bot');
                askCTA(bestMatch.cta);
            } else {
                addMessage("Lo siento, no entendí tu pregunta. Por favor selecciona una de las opciones disponibles.", 'bot');
                showFaqOptions();
            }
        }

        sendBtn.addEventListener("click", sendMessage);
        chatInput.addEventListener("keypress", (e) => {
            if (e.key === "Enter") sendMessage();
        });

        // Inicial
        setTimeout(showUserTypeSelector, 500);
    </script>

</body>

</html>