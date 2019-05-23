<?php
    class Job{
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        //Receber todos os trabalhos
        public function getAllJobs(){
            $this->db->query("SELECT tbl_jobs.*, tbl_categories.name AS cname
                FROM tbl_jobs
                INNER JOIN tbl_categories
                ON tbl_jobs.id_categ = tbl_categories.id_categ
                ORDER BY post_date DESC"
                );

            $results = $this->db->resultSet();

            return $results;
        }

        //receber categorias
        public function getCategories(){
            $this->db->query("SELECT * FROM tbl_categories");

            $results = $this->db->resultSet();

            return $results;
        }

        //Trabalho por categoria
        public function getByCategory($category){
            $this->db->query("SELECT tbl_jobs.*, tbl_categories.name AS cname
                FROM tbl_jobs
                INNER JOIN tbl_categories
                ON tbl_jobs.id_categ = tbl_categories.id_categ
                WHERE tbl_jobs.id_categ = $category
                ORDER BY post_date DESC"
                );

            $results = $this->db->resultSet();

            return $results;
        }

        //categoria
        public function getCategory($category_id_categ){
            $this->db->query("SELECT * FROM tbl_categories
                    WHERE id_categ = :category_id_categ");

            $this->db->bind(':category_id_categ', $category_id_categ);
            
            $row = $this->db->single();

            return $row;
        }

        //trabalho
        public function getJob($id){
            $this->db->query("SELECT * FROM tbl_jobs
                    WHERE id_job = :id");

            $this->db->bind(':id', $id);
            
            $row = $this->db->single();

            return $row;
        }
    }
?>
