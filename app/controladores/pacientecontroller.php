
<?php
require_once __DIR__ . '/../modelos/Paciente.php';

class PacienteController {

    private $paciente;

    public function __construct() {
        $this->paciente = new Paciente();
    }

    public function listar() {
        $resultado = $this->paciente->listar();
        $lista = $resultado->fetchAll();

        require_once __DIR__ . '/../vistas/pacientes/tabla.php';
    }

    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $datos = [
                ':dni' => $_POST['dni'],
                ':nombres' => $_POST['nombres'],
                ':apellidos' => $_POST['apellidos'],
                ':telefono' => $_POST['telefono'],
                ':email' => $_POST['email'],
                ':fecha_nacimiento' => $_POST['fecha_nacimiento']
            ];

            $this->paciente->registrar($datos);

            header('Location: /clinica-odonto/app/controladores/pacientecontroller.php?accion=listar');
            exit;
        }

        $accion = 'crear';
        $titulo = 'Registrar paciente';
        $boton = 'Guardar paciente';
        $pacienteData = [];

        require_once __DIR__ . '/../vistas/pacientes/formulario.php';
    }

    public function editar() {
        $id = $_GET['id'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $datos = [
                ':id' => $_POST['id'],
                ':dni' => $_POST['dni'],
                ':nombres' => $_POST['nombres'],
                ':apellidos' => $_POST['apellidos'],
                ':telefono' => $_POST['telefono'],
                ':email' => $_POST['email'],
                ':fecha_nacimiento' => $_POST['fecha_nacimiento']
            ];

            $this->paciente->actualizar($datos);

            header('Location: /clinica-odonto/app/controladores/pacientecontroller.php?accion=listar');
            exit;
        }

        $accion = 'editar';
        $titulo = 'Editar paciente';
        $boton = 'Actualizar paciente';
        $pacienteData = $this->paciente->obtener($id);

        require_once __DIR__ . '/../vistas/pacientes/formulario.php';
    }

    public function eliminar() {
        $id = $_GET['id'];

        $this->paciente->eliminar($id);

        header('Location: /clinica-odonto/app/controladores/pacientecontroller.php?accion=listar');
        exit;
    }
}

$controller = new PacienteController();
$accion = $_GET['accion'] ?? 'listar';

if ($accion == 'crear') {
    $controller->crear();
} elseif ($accion == 'editar') {
    $controller->editar();
} elseif ($accion == 'eliminar') {
    $controller->eliminar();
} else {
    $controller->listar();
}
?>
