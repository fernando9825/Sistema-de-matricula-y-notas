<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Notas extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('crud_model');
        $this->load->database();
        $this->load->library('session');
        /* cache control */
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
    }

    function secciones(){
        $query = $this->db->query("select * from section where teacher_id = ". $this->session->userdata('teacher_id'). " and class_id= ".$_POST["id"]);
        echo ' <option value="">Selecciona una opcion</option>';
        foreach ($query->result() as $row){
            echo '<option value="'.$row->section_id.'">'.$row->name.'</option>';
        }
    }

    function materias(){
        $query = $this->db->query("select * from subject where teacher_id = ". $this->session->userdata('teacher_id'). " and class_id= ".$_POST["id"]);
        echo ' <option value="">Selecciona una opcion</option>';
        foreach ($query->result() as $row){
            echo '<option value="'.$row->subject_id.'">'.$row->name.'</option>';
        }
    }

    function alumnos(){
        $query = $this->db->query("select * from student where section_id = ". $_POST["id_s"] . " and class_id= ".$_POST["id_c"]);
        echo ' <option value="">Selecciona una opcion</option>';
        foreach ($query->result() as $row){
            echo '<option value="'.$row->student_id.'">'.$row->name.'</option>';
        }
    }

    function insertarNota(){
        $dd = array(
            'student_id' => $_POST["student_id"],
            'subject_id' => $_POST["subject_id"],
            'class_id' => $_POST["class_id"],
            'exam_id' => $_POST["exam_id"],
            'mark_obtained' => $_POST["mark_obtained"],
            'mark_total' => "10",
            'comment' => $_POST["comment"]
        );
        $this->db->insert('mark', $dd);

        echo " llego";
    }

    function getReview(){
        $query = $this->db->query("select name from student where student_id = ". $_POST["student_id"]);
        echo '<div class="title has-text-centered" style="padding: 1rem">Libreta de Notas CESC</div>';
        foreach ($query->result() as $row){
            echo '<div class="subtitle has-text-centered" style="padding: 1rem">'.$row->name.'</div>';
        }
     
        echo "<table class='table is-striped'>";
        $query = $this->db->query("select * from mark where student_id = ". $_POST["student_id"]." and exam_id=1");
        echo "<tr><th class='has-text-black'>Primer Trimestre</th><th></th></tr>";
        foreach ($query->result() as $row){
            echo "<tr>";
            $query2 = $this->db->query("select name from subject where subject_id = ".$row->subject_id);
            foreach ($query2->result() as $row2){ echo '<td style="display:block !important">'. $row2->name .'</td>';}
            echo '<td>'.$row->mark_obtained.'</td>';
            echo "</tr>";
        }

        echo "</table>";

        echo "<table class='table is-striped'>";
        $query = $this->db->query("select * from mark where student_id = ". $_POST["student_id"]." and exam_id=2");
        echo "<tr><th class='has-text-black'>Segundo Trimestre</th><th></th></tr>";
        foreach ($query->result() as $row){
            echo "<tr>";
                $query2 = $this->db->query("select name from subject where subject_id = ".$row->subject_id);
                foreach ($query2->result() as $row2){ echo '<td style="display:block !important">'. $row2->name .'</td>';}
                echo '<td>'.$row->mark_obtained.'</td>';
                echo "</tr>";
        }

        echo "</table>";

        echo "<table class='table is-striped'>";
        $query = $this->db->query("select * from mark where student_id = ". $_POST["student_id"]." and exam_id=3");
        echo "<tr><th class='has-text-black'>Tercer Trimestre</th><th></th></tr>";
        foreach ($query->result() as $row){
            echo "<tr>";
                $query2 = $this->db->query("select name from subject where subject_id = ".$row->subject_id);
                foreach ($query2->result() as $row2){ echo '<td style="display:block !important">'. $row2->name .'</td>';}
                echo '<td>'.$row->mark_obtained.'</td>';
                echo "</tr>";
        }

        echo "</table>";
    }

    function getSMaterias(){
        echo "<table class='table is-striped is-hoverable'>";
        $query = $this->db->query("select subject_id from mark where student_id = ". $_POST["student_id"]);
        echo "<tr><th class='has-text-black subtitle'>Mis Asignaturas</th></tr>";
        foreach ($query->result() as $row){
            echo "<tr>";
                $query2 = $this->db->query("select name from subject where subject_id = ".$row->subject_id);
                foreach ($query2->result() as $row2){ echo '<td style="display:block !important">'. $row2->name .'</td>';}
                echo "</tr>";
        }

        echo "</table>";

    }
}

?>
