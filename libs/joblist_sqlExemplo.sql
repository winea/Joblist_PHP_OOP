drop TABLE tbl_categories;

CREATE TABLE tbl_categories(id_categ int(11) PRIMARY KEY AUTO_INCREMENT, name varchar(255) NOT NULL);

CREATE TABLE tbl_jobs(id_job int(11) PRIMARY KEY AUTO_INCREMENT, company varchar(255) NOT null, job_title varchar(255) NOT NULL, 
                 description varchar(255) NOT null, salary varchar(100) NOT null, location varchar(255) NOT NULL,
                  contact_user varchar(255) NOT null, contact_email varchar(255) NOT NULL, 
                  id_categ int(11) NOT NULL,
                  FOREIGN KEY(id_categ) REFERENCES tbl_categories(id_categ));

SELECT tbl_jobs.*, tbl_categories.name AS cname
            FROM tbl_jobs
            INNER JOIN tbl_categories
            ON tbl_jobs.id_categ = tbl_categories.id_categ
            ORDER BY post_date DESC"