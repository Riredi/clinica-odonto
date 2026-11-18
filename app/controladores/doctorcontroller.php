<?php

    require_once __DIR__ . '/../modelos/doctor.php';

    class DoctorController {
        private $doctor;

        public function __construct()
        {
            $this->doctor = new doctor();
        }

        public function listar()
        {
            $stmt = $this->doctor->listar();
            $lista = $stmt->fetchAll();

            require_once __DIR__ . '/../vistas/doctores/tabla.php';
        }

        public function crear()
        {


            if ($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                $datos =
                [
                    ':cmp'          => $_POST['cmp'],
                    ':nombres'      => $_POST['nombres'],
                    ':apellidos'    => $_POST['apellidos'],
                    ':especialidad' => $_POST['especialidad'],
                    ':telefono'     => $_POST['telefono'],
                    ':email'        => $_POST['email']
                ];

                $this->doctor->registrar($datos);

                header('Location: DoctorController.php?accion=listar');
                
                exit;

            }


            require_once __DIR__ . '/../vistas/doctores/formulario.php';
        }

        public function editar()
        {
            $id = $_GET['id'] ?? 0;
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST')
            {

                $datos =
                [
                    ':id' => $_POST['id'],
                    ':dni' => $_POST['dni'],
                    ':nombres' => $_POST['nombres'],
                    ':apellidos' => $_POST['apellidos'],
                    ':telefono' => $_POST['telefono'],
                    ':email' => $_POST['email']
                ];

                $this->doctor->actualizar($datos);

                header('Location: doctorController.php?accion=listar');

                exit;
            }
            

            $doctor = $this->doctor->obtener($id);
            require_once __DIR__ . '/../vistas/doctores/formulario.php';
        }

        public function eliminar()
        {
            $id = $_GET['id'] ?? 0;


            $this->doctor->eliminar($id);
            header('Location: doctorController.php?accion=listar');
            exit;
        }
    }



    $controller = new DoctorController();
    $accion = $_GET['accion'] ?? 'listar';




    if ($accion === 'listar'){
        $controller->listar();

    } elseif ($accion === 'crear'){
        $controller->crear();

    } elseif ($accion === 'editar'){
        $controller->editar();

    } elseif ($accion === 'eliminar') {
        $controller->eliminar();

    }
?>