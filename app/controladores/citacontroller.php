<?php
    require_once __DIR__ . '/../modelos/Cita.php';
    require_once __DIR__ . '/../modelos/Paciente.php';
    require_once __DIR__ . '/../modelos/Doctor.php';

    
    class CitaController {
    
        private $cita;
        private $paciente;
        private $doctor;

        public function __construct(){

            $this->cita = new Cita();
            $this->paciente = new Paciente();
            $this->doctor = new Doctor();
            
            }


        public function listar() {
            
            $stmt = $this->cita->listar();

            $lista = $stmt->fetchAll();
            
            require_once __DIR__ . '/../vistas/citas/tabla.php';
            }



        public function crear() {
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                    $datos = 
                    [
                        ':paciente_id' => $_POST['paciente_id'],
                        ':doctor_id' => $_POST['doctor_id'],
                        ':fecha_cita' => $_POST['fecha_cita'],
                        ':hora_cita' => $_POST['hora_cita'],
                        ':motivo' => $_POST['motivo'],
                        ':estado' => $_POST['estado']
                    ];
                    
                    $this->cita->registrar($datos);
                    
                    header('Location: CitaController.php?accion=listar');
                    
                    exit;
            }
                
                $pacientes = $this->paciente->listar()->fetchAll();
                $doctores = $this->doctor->listar()->fetchAll();
                
                require_once __DIR__ . '/../vistas/citas/formulario.php';
                
                }
    }

    $controller = new CitaController();
    $accion = $_GET['accion'] ?? 'listar';

    if ($accion === 'listar')
    {
        $controller->listar();
    
    }

    elseif ($accion === 'crear') 
    {
        $controller->crear();
    }
?>