<?php

    if ($_SESSION['rol_id'] == 1) {
        echo '<nav class="side-menu">
        <ul class="side-menu-list">
            <li class="blue-dirty">
                <a href="../Home/">
                    <span class="glyphicon glyphicon-th "></span>
                    <span class="lbl">Inicio</span>
                </a>
            </li>
            <li class="grey with-sub">
            <span>
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="lbl">Materias Áulicas</span>
            </span>
            <ul>
                <li><a href="../Consultarcb/"><span class="lbl">Ciclo Básico</span></a></li>
                <li><a href="../Consultarcsa/"><span class="lbl">C.S. Alimentación</span></a></li>
                <li><a href="../Consultarcse/"><span class="lbl">C.S. Electro</span></a></li>
                
            </ul>
        </li>

        <li class="grey with-sub">
        <span>
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="lbl">Taller</span>
        </span>
        <ul>
            <li><a href="../ConsultarTallercb/"><span class="lbl">Ciclo Básico</span></a></li>
            <li><a href="../ConsultarTallercsa/"><span class="lbl">C.S. Alimentación</span></a></li>
            <li><a href="../ConsultarTallercse/"><span class="lbl">C.S. Electro</span></a></li>
            
        </ul>
    </li>

        </ul>
    </nav>';
    }else if($_SESSION['rol_id'] == 2){
        echo '<nav class="side-menu">
        <ul class="side-menu-list">
            <li class="blue-dirty">
                <a href="../Home/">
                    <span class="glyphicon glyphicon-th "></span>
                    <span class="lbl">Inicio</span>
                </a>
            </li>
            <li class="blue-dirty">
                <a href="../MntUsuario/">
                    <span class="glyphicon glyphicon-th "></span>
                    <span class="lbl">Usuarios</span>
                </a>
            </li>
            <li class="blue-dirty">
                <a href="../Materias/">
                    <span class="glyphicon glyphicon-th "></span>
                    <span class="lbl">Carga Materias Aula</span>
                </a>
            </li>
            <li class="grey with-sub">
        <span>
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="lbl">Materias Áulicas</span>
        </span>
        <ul>
            <li><a href="../Consultarcb/"><span class="lbl">Ciclo Básico</span></a></li>
            <li><a href="../Consultarcsa/"><span class="lbl">C.S. Alimentación</span></a></li>
            <li><a href="../Consultarcse/"><span class="lbl">C.S. Electro</span></a></li>
            
        </ul>
    </li>
            <li class="blue-dirty">
            <a href="../MateriasTaller/">
                <span class="glyphicon glyphicon-th "></span>
                <span class="lbl">Carga Materias Taller</span>
            </a>
        </li>
        <li class="grey with-sub">
        <span>
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="lbl">Taller</span>
        </span>
        <ul>
            <li><a href="../ConsultarTallercb/"><span class="lbl">Ciclo Básico</span></a></li>
            <li><a href="../ConsultarTallercsa/"><span class="lbl">C.S. Alimentación</span></a></li>
            <li><a href="../ConsultarTallercse/"><span class="lbl">C.S. Electro</span></a></li>
            
        </ul>
    </li>
    <li class="blue-dirty">
            <a href="../Planificaciones/">
                <span class="glyphicon glyphicon-th "></span>
                <span class="lbl">Carga Planificaciones</span>
            </a>
        </li>
        <li class="grey with-sub">
        <span>
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="lbl">Planificaciones</span>
        </span>
        <ul>
            <li><a href="../Planificacioncb/"><span class="lbl">Ciclo Básico</span></a></li>
            <li><a href="../Planificacioncsa/"><span class="lbl">C.S. Alimentación</span></a></li>
            <li><a href="../Planificacioncse/"><span class="lbl">C.S. Electro</span></a></li>
            
        </ul>
    </li>
        </ul>
    </nav>';
    }else{
        echo '<nav class="side-menu">
        <ul class="side-menu-list">
            <li class="blue-dirty">
                <a href="../Home/">
                    <span class="glyphicon glyphicon-th "></span>
                    <span class="lbl">Inicio</span>
                </a>
            </li>


            <li class="grey with-sub">
        <span>
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="lbl">Materias Áulicas</span>
        </span>
        <ul>
            <li><a href="../Consultarcb/"><span class="lbl">Ciclo Básico</span></a></li>
            <li><a href="../Consultarcsa/"><span class="lbl">C.S. Alimentación</span></a></li>
            <li><a href="../Consultarcse/"><span class="lbl">C.S. Electro</span></a></li>
            
        </ul>
    </li>

        <li class="grey with-sub">
        <span>
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="lbl">Taller</span>
        </span>
        <ul>
            <li><a href="../ConsultarTallercb/"><span class="lbl">Ciclo Básico</span></a></li>
            <li><a href="../ConsultarTallercsa/"><span class="lbl">C.S. Alimentación</span></a></li>
            <li><a href="../ConsultarTallercse/"><span class="lbl">C.S. Electro</span></a></li>
            
        </ul>
    </li>

        <li class="grey with-sub">
        <span>
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="lbl">Planificaciones</span>
        </span>
        <ul>
            <li><a href="../Planificacioncb/"><span class="lbl">Ciclo Básico</span></a></li>
            <li><a href="../Planificacioncsa/"><span class="lbl">C.S. Alimentación</span></a></li>
            <li><a href="../Planificacioncse/"><span class="lbl">C.S. Electro</span></a></li>
            
        </ul>
    </li>
        </ul>
    </nav>';
        
    }
