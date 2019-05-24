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

        //Criar vaga de trabalho
        public function create($data){
            //Inserir busca
            $this->db->query("INSERT INTO tbl_jobs(job_title, company, description, 
                                location, salary, contact_user, contact_email, id_categ)
                              VALUES (:job_title, :company, :description, :location, 
                                :salary, :contact_user, :contact_email, :id_categ)");

            //Bind data
            $this->db->bind(':id_categ', $data['id_categ']);
            $this->db->bind(':job_title', $data['job_title']);
            $this->db->bind(':company', $data['company']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':location', $data['location']);
            $this->db->bind(':salary', $data['salary']);
            $this->db->bind(':contact_user', $data['contact_user']);
            $this->db->bind(':contact_email', $data['contact_email']);

            //Executar
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }

        }

        public function Delete($id){
            $this->db->query("DELETE FROM tbl_jobs WHERE id_job = $id;");
            
            //Executar
            if($this->db->execute()){
            return true;
            } else {
            return false;
            }
        }

        //Update
        public function update($id_job, $data){
            //Inserir busca
            $this->db->query("UPDATE tbl_jobs
            SET
            id_categ = :id_categ,
            job_title = :job_title,
            company = :company,
            description = :description,
            location = :location,
            salary = :salary,
            contact_user = :contact_user,
            contact_email = :contact_email
            WHERE id_job = $id_job");

            //Bind data
            $this->db->bind(':id_categ', $data['id_categ']);
            $this->db->bind(':job_title', $data['job_title']);
            $this->db->bind(':company', $data['company']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':location', $data['location']);
            $this->db->bind(':salary', $data['salary']);
            $this->db->bind(':contact_user', $data['contact_user']);
            $this->db->bind(':contact_email', $data['contact_email']);

            //Executar
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }

        }
    }
?>
