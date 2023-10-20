<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to CodeIgniter 4!</title>
    <meta name="Encuesta UPN 212 Teziutlán" content="Encuesta diagnóstico institucional ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">

    <!-- STYLES -->

    <style {csp-style-nonce}>
        * {
            transition: background-color 300ms ease, color 300ms ease;
        }
        *:focus {
            background-color: rgba(0, 0, 200, .9);
            outline: none;
        }
        html, body {
            color: rgba(33, 37, 41, 1);
            font-family: "Montserrat", "Segoe UI Emoji";
            font-size: 16px;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
        }
        header {
            background-color: rgba(247, 248, 249, 1);
            padding: .4rem 0 0;
        }
        .menu {
            padding: .4rem 2rem;
        }
        header ul {
            border-bottom: 1px solid rgba(242, 242, 242, 1);
            list-style-type: none;
            margin: 0;
            overflow: hidden;
            padding: 0;
            text-align: right;
        }
        header li {
            display: inline-block;
        }
        header li a {
            border-radius: 5px;
            color: rgba(0, 0, 0, .5);
            display: block;
            height: 44px;
            text-decoration: none;
        }
        header li.menu-item a {
            border-radius: 5px;
            margin: 5px 0;
            height: 38px;
            line-height: 36px;
            padding: .4rem .65rem;
            text-align: center;
        }
        header li.menu-item a:hover,
        header li.menu-item a:focus {
            background-color: rgba(0, 0, 200, .2);
            color: rgba(0, 0, 200, .8);
        }
        header .logo {
            float: left;
            height: 44px;
            padding: .4rem .5rem;
        }
        header .menu-toggle {
            display: none;
            float: right;
            font-size: 2rem;
            font-weight: bold;
        }
        header .menu-toggle button {
            background-color: rgba(0, 0, 200, .6);
            border: none;
            border-radius: 3px;
            color: rgba(255, 255, 255, 1);
            cursor: pointer;
            font: inherit;
            font-size: 1.3rem;
            height: 36px;
            padding: 0;
            margin: 11px 0;
            overflow: visible;
            width: 40px;
        }
        header .menu-toggle button:hover,
        header .menu-toggle button:focus {
            background-color: rgba(0, 0, 200, .8);
            color: rgba(255, 255, 255, .8);
        }
        header .heroe {
            margin: 0 auto;
            max-width: 1100px;
            padding: 1rem 1.75rem 1.75rem 1.75rem;
        }
        header .heroe h1 {
            font-size: 2.5rem;
            font-weight: 500;
        }
        header .heroe h2 {
            font-size: 1.5rem;
            font-weight: 300;
        }
        section {
            margin: 0 auto;
            max-width: 1100px;
            padding: 2.5rem 1.75rem 3.5rem 1.75rem;
        }
        section h1 {
            margin-bottom: 2.5rem;
        }
        section h2 {
            font-size: 120%;
            line-height: 2.5rem;
            padding-top: 1.5rem;
        }
        section pre {
            background-color: rgba(247, 248, 249, 1);
            border: 1px solid rgba(242, 242, 242, 1);
            display: block;
            font-size: .9rem;
            margin: 2rem 0;
            padding: 1rem 1.5rem;
            white-space: pre-wrap;
            word-break: break-all;
        }
        section code {
            display: block;
        }
        section a {
            color: rgba(0, 0, 200, .8);
        }
        section svg {
            margin-bottom: -5px;
            margin-right: 5px;
            width: 25px;
        }
        .further {
            background-color: rgba(247, 248, 249, 1);
            border-bottom: 1px solid rgba(242, 242, 242, 1);
            border-top: 1px solid rgba(242, 242, 242, 1);
        }
        .further h2:first-of-type {
            padding-top: 0;
        }
        footer {
            background-color: rgba(0, 0, 200, .8);
            text-align: center;
        }
        footer .environment {
            color: rgba(255, 255, 255, 1);
            padding: 2rem 1.75rem;
        }
        footer .copyrights {
            background-color: rgba(62, 62, 62, 1);
            color: rgba(200, 200, 200, 1);
            padding: .25rem 1.75rem;
        }
        @media (max-width: 629px) {
            header ul {
                padding: 0;
            }
            header .menu-toggle {
                padding: 0 1rem;
            }
            header .menu-item {
                background-color: rgba(244, 245, 246, 1);
                border-top: 1px solid rgba(242, 242, 242, 1);
                margin: 0 15px;
                width: calc(100% - 30px);
            }
            header .menu-toggle {
                display: block;
            }
            header .hidden {
                display: none;
            }
            header li.menu-item a {
                background-color: rgba(221, 72, 20, .1);
            }
            header li.menu-item a:hover,
            header li.menu-item a:focus {
                background-color: rgba(221, 72, 20, .7);
                color: rgba(255, 255, 255, .8);
            }
        }
    </style>
</head>
<body>

<!-- HEADER: MENU + HEROE SECTION -->
<header>

    <div class="menu">
        <ul>
            <li class="logo">
                <a href="http://upn212tez.info" target="_blank">
                    UPN 212 Teziutlán
                </a>
            </li>
            <li class="menu-toggle">
                <button onclick="toggleMenu();">&#9776;</button>
            </li>
            <li class="menu-item hidden"><a href="<?= site_url('login'); ?>">Iniciar</a></li>
            
            <!-- 
            <li class="menu-item hidden"><a href="https://codeigniter4.github.io/userguide/" target="_blank">Docs</a>
            </li>
            <li class="menu-item hidden"><a href="https://forum.codeigniter.com/" target="_blank">Community</a></li>
            <li class="menu-item hidden"><a
                    href="https://github.com/codeigniter4/CodeIgniter4/blob/develop/CONTRIBUTING.md" target="_blank">Contribute</a>
            </li>
        -->
        </ul>
    </div>

    <div class="heroe">

        <h1 style="color: rgba(0, 0, 200, .8);">Encuesta diagnóstico institucional </h1>

        <h2>Universidad Pedagógica Nacional</h2>

    </div>

</header>



<section>

    <h1>Información</h1>


    <div>
        <strong>Estimado compañero (a).</strong>

        <p>
            Este cuestionario tiene como objetivo recoger las opiniones de alumnos, docentes y administrativos, que nos permitan identificar los puntos FUERTES (F), puntos DÉBILES (D), OPORTUNIDADES (O), y AMENAZAS (A) de la institución.
        </p>

        <p>
            Consta de 50 preguntas, distribuidas en las diversas áreas de la universidad, diseñadas y centradas en los 9 criterios del Modelo Europeo de Excelencia, de la European Foundation for Quality Management (EFQM), con aportaciones del Modelo de Acreditación de Titulaciones de la Agencia Nacional de Evaluación de la Calidad y Acreditación (ANECA), y ha sido adaptado de la Universidad por el Vicerrectorado de Ordenación Académica y Planificación Estratégica de la Universidad Politécnica de Madrid a la Unidad UPN 212.
        </p>

        <ol>
            <li>
                Dentro de cada criterio, se pide que se describan las principales fortalezas y debilidades del Centro y las principales oportunidades y amenazas del entorno, de la manera más sintética posible.
            </li>

            <li>
                Para orientar las respuestas sobre los aspectos propios del Centro (fortalezas y debilidades) se propone un sistema concreto de valoración con A-B-C-D.
            </li>
        </ol>

        <p>
            Si se puntúa A o B se trata de una fortaleza, si se ha optado por C o D estamos ante una debilidad o área de mejora.
        </p>

        <p>
            Al final de cada pregunta de la encuesta se agrega una pregunta abierta, para cualquier comentario que quiera agregar con respecto a la pregunta realizada.
        </p>



Instrucciones: elige la opción que corresponda de acuerdo a tu función dentro de la UPN-212.

Atentamente:

La dirección y la coordinación de investigación de la Universidad Pedagógica Nacional, Unidad 212.
Nota: Su información será confidencial y no aparecerá en ninguna publicación.
    </div>
    

</section>



<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

<footer>
    <div class="environment">

        <p></p>

        

    </div>

    <div class="copyrights">

        <p>&copy; <?= date('Y') ?> Developed by edegantea for UPN212Teziutlán.</p>

    </div>

</footer>

<!-- SCRIPTS -->

<script>
    function toggleMenu() {
        var menuItems = document.getElementsByClassName('menu-item');
        for (var i = 0; i < menuItems.length; i++) {
            var menuItem = menuItems[i];
            menuItem.classList.toggle("hidden");
        }
    }
</script>

<!-- -->

</body>
</html>
