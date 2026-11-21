
<?php
require_once __DIR__ . '/../modelos/Doctor.php';

class DoctorController {

    private $doctor;

    public function __construct() {
        $this->doctor = new Doctor();
    }

    public function listar() {
        $resultado = $this->doctor->listar();
        $lista = $resultado->fetchAll();

        require_once __DIR__ . '/../vistas/doctores/tabla.php';
    }

    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $datos = [
                ':cmp' => $_POST['cmp'],
                ':nombres' => $_POST['nombres'],
                ':apellidos' => $_POST['apellidos'],
                ':especialidad' => $_POST['especialidad'],
                ':telefono' => $_POST['telefono'],
                ':email' => $_POST['email']
            ];

            $this->doctor->registrar($datos);

            header('Location: /clinica-odonto/app/controladores/doctorcontroller.php?accion=listar');
            exit;
        }

        $accion = 'crear';
        $titulo = 'Registrar Doctor';
        $boton = 'Guardar Doctor';
        $doctorData = [];

        require_once __DIR__ . '/../vistas/doctores/formulario.php';
    }

    public function editar() {
        $id = $_GET['id'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $datos = [
                ':id' => $_POST['id'],
                ':cmp' => $_POST['cmp'],
                ':nombres' => $_POST['nombres'],
                ':apellidos' => $_POST['apellidos'],
                ':especialidad' => $_POST['especialidad'],
                ':telefono' => $_POST['telefono'],
                ':email' => $_POST['email']
            ];

            $this->doctor->actualizar($datos);

            header('Location: /clinica-odonto/app/controladores/doctorcontroller.php?accion=listar');
            exit;
        }

        $accion = 'editar';
        $titulo = 'Editar Doctor';
        $boton = 'Actualizar Doctor';
        $doctorData = $this->doctor->obtener($id);

        require_once __DIR__ . '/../vistas/doctores/formulario.php';
    }

    public function eliminar() {
        $id = $_GET['id'];

        $this->doctor->eliminar($id);

        header('Location: /clinica-odonto/app/controladores/doctorcontroller.php?accion=listar');
        exit;
    }
}

$controller = new DoctorController();
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
