<?php
require_once __DIR__ . '/../modelos/Paciente.php';

class PacienteController {
    private $paciente;

    public function __construct() {
        $this->paciente = new Paciente();
    }

    public function listar() {
        $stmt = $this->paciente->listar();
        $lista = $stmt->fetchAll();
        require_once __DIR__ . '/../vistas/pacientes/tabla.php';
    }

    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $datos = [
                ':dni'              => trim($_POST['dni'] ?? ''),
                ':nombres'          => trim($_POST['nombres'] ?? ''),
                ':apellidos'        => trim($_POST['apellidos'] ?? ''),
                ':telefono'         => trim($_POST['telefono'] ?? ''),
                ':email'            => trim($_POST['email'] ?? ''),
                ':fecha_nacimiento' => $_POST['fecha_nacimiento'] ?? null
            ];

            $this->paciente->registrar($datos);
            header('Location: /clinica-odonto/app/controladores/pacientecontroller.php?accion=listar');
            exit;
        }

        $modoEdicion = false;
        $pacienteData = null;
        require_once __DIR__ . '/../vistas/pacientes/formulario.php';
    }

    public function editar() {
        $id = (int) ($_GET['id'] ?? $_POST['id'] ?? 0);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $datos = [
                ':id'               => $id,
                ':dni'              => trim($_POST['dni'] ?? ''),
                ':nombres'          => trim($_POST['nombres'] ?? ''),
                ':apellidos'        => trim($_POST['apellidos'] ?? ''),
                ':telefono'         => trim($_POST['telefono'] ?? ''),
                ':email'            => trim($_POST['email'] ?? ''),
                ':fecha_nacimiento' => $_POST['fecha_nacimiento'] ?? null
            ];

            $this->paciente->actualizar($datos);
            header('Location: /clinica-odonto/app/controladores/pacientecontroller.php?accion=listar');
            exit;
        }

        $modoEdicion = true;
        $pacienteData = $this->paciente->obtener($id);
        require_once __DIR__ . '/../vistas/pacientes/formulario.php';
    }

    public function eliminar() {
        $id = (int) ($_GET['id'] ?? 0);
        if ($id > 0) {
            $this->paciente->eliminar($id);
        }
        header('Location: /clinica-odonto/app/controladores/pacientecontroller.php?accion=listar');
        exit;
    }
}

$controller = new PacienteController();
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