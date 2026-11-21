<?php
require_once __DIR__ . '/../modelos/Doctor.php';

class DoctorController {
    private $doctor;

    public function __construct() {
        $this->doctor = new Doctor();
    }

    public function listar() {
        $stmt = $this->doctor->listar();
        $lista = $stmt->fetchAll();
        require_once __DIR__ . '/../vistas/doctores/tabla.php';
    }

    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $datos = [
                ':cmp'          => trim($_POST['cmp'] ?? ''),
                ':nombres'      => trim($_POST['nombres'] ?? ''),
                ':apellidos'    => trim($_POST['apellidos'] ?? ''),
                ':especialidad' => trim($_POST['especialidad'] ?? ''),
                ':telefono'     => trim($_POST['telefono'] ?? ''),
                ':email'        => trim($_POST['email'] ?? '')
            ];

            $this->doctor->registrar($datos);
            header('Location: /clinica-odonto/app/controladores/doctorcontroller.php?accion=listar');
            exit;
        }

        $modoEdicion = false;
        $doctorData = null;
        require_once __DIR__ . '/../vistas/doctores/formulario.php';
    }

    public function editar() {
        $id = (int) ($_GET['id'] ?? $_POST['id'] ?? 0);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $datos = [
                ':id'           => $id,
                ':cmp'          => trim($_POST['cmp'] ?? ''),
                ':nombres'      => trim($_POST['nombres'] ?? ''),
                ':apellidos'    => trim($_POST['apellidos'] ?? ''),
                ':especialidad' => trim($_POST['especialidad'] ?? ''),
                ':telefono'     => trim($_POST['telefono'] ?? ''),
                ':email'        => trim($_POST['email'] ?? '')
            ];

            $this->doctor->actualizar($datos);
            header('Location: /clinica-odonto/app/controladores/doctorcontroller.php?accion=listar');
            exit;
        }

        $modoEdicion = true;
        $doctorData = $this->doctor->obtener($id);
        require_once __DIR__ . '/../vistas/doctores/formulario.php';
    }

    public function eliminar() {
        $id = (int) ($_GET['id'] ?? 0);
        if ($id > 0) {
            $this->doctor->eliminar($id);
        }
        header('Location: /clinica-odonto/app/controladores/doctorcontroller.php?accion=listar');
        exit;
    }
}

$controller = new DoctorController();
$accion = $_GET['accion'] ?? 'listar';

if ($accion === 'listar') {
    $controller->listar();
} elseif ($accion === 'crear') {
    $controller->crear();
} elseif ($accion === 'editar') {
    $controller->editar();
} elseif ($accion === 'eliminar') {
    $controller->eliminar();
} else {
    $controller->listar();
}
?>