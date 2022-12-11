<?php
class Profesormateria extends SessionController
{

    function __construct()
    {
        parent::__construct();
        
    }
    function render()
    {
        $detalle_profesormateria = $this->model->getAllDprofesor();
        $this->view->varTodas = $detalle_profesormateria;  
        $this->view->render('profesormateria/index');
    }

    function new()
    {
        $Ngrados = $this->model->getAllGrados();
        $this->view->varTodas = $Ngrados;
        $this->view->render('profesormateria/grados');
    }


    function saveProfesorMateria()
    {
        $datos[0]  = $_SESSION['id_grado'];
        $datos[1]  = trim($_POST['com_aulas']);
        $datos[2] = trim($_POST['com_profesor']);
        $datos[3]   = trim($_POST['com_materias']);
        $datos[4]   = trim($_POST['com_periodos']);

        if ($this->model->insertProfesorMateria([
            'id_grado' => $datos[0], 'com_aulas' => $datos[1], 'com_profesor' => $datos[2], 'com_materias' => $datos[3],
            'com_periodos' => $datos[4]
        ])) {
            error_log('saveProfesorMateria::Nuevo materias asignadas al profesor');
            $this->redirect('profesormateria', ['success' => Success::SUCCESS_ADMIN_NEW_ALUMNO]);
        } else {
            error_log('saveProfesorMateria::Error al asignadas materias al profesor');
            $this->redirect('profesormateria', ['error' => Errors::ERROR_ALTA_ALUMNO]);
        }
        //validar materia que no tenga la misma
/*         $num =$this->model->ValidarMateria($datos[3]);
        if ($num>=1) {
            $this->redirect('profesormateria', ['error' => Errors::ERROR_MATERIA_ASIGNADA]);
        echo "Esta Materia ya la tiene asignada";
        }else{
            
        }   */      
    }

    function verDetalle($param = null)
    {
        $alumnos = $this->model->getAlumnos();
        $this->view->Comboalumnos = $alumnos;
        $proceso_id = $param[0];
        $proceso = $this->model->getById($proceso_id);
        $this->view->varTodas = $proceso;
        $this->view->render('profesormateria/agregarAlumnos');
    }
    function saveAlumnoProfesor()
    {
        $datos[0]  = trim($_POST['txt_idproceso']);
        $datos[1]  = trim($_POST['com_alumnos']);
        if ($this->model->insertAlumnosProfesor([
            'txt_idproceso' => $datos[0], 'com_alumnos' => $datos[1]
        ])) {
            error_log('saveAlumnoProfesor::Nuevo AlumnoProfesor asignadas');
            $this->redirect('profesoralumnos', ['success' => Success::SUCCESS_ADMIN_NEW_ALUMNO]);
        } else {
            error_log('saveProfesorMateria::Error al asignadas materias al profesor');
            $this->redirect('profesoralumnos', ['error' => Errors::ERROR_ALTA_ALUMNO]);
        }
    }
    
    function AgregarM($param = null)
    {
        $Dgrado = $param[0];
        $_SESSION['id_grado']=  $Dgrado;
        $profesor = $this->model->getProfesor();
        $this->view->ProfesorCom = $profesor;

        $Aulas = $this->model->getAulas();
        $this->view->ComboAulas = $Aulas;
  
        $Materias = $this->model->getAgregaGrados($Dgrado);
        $this->view->ComboMaterias = $Materias;

        $Periodos = $this->model->getPeriodos();
        $this->view->ComboPeriodos = $Periodos;
      
        $this->view->render('profesormateria/nuevo');
    }


}
