<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_blog extends CI_Migration {

        public function up()
        {
                $this->admin();
                $this->about_us();
                $this->team();
                $this->service_category();
                $this->service_name();
                $this->portfolio();
                $this->blog();
                $this->faq();
                $this->inquiry();
        }

        public function down()
        {
                $this->dbforge->drop_table('blog');
        }

        // Methods

        // Table for about_us
        private function about_us()
        {
                $this->dbforge->add_field(array(
                        'about_us_id' => array(
                                'type' => 'INT', 
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'about_us_content' => array(
                                'type' => 'TEXT',
                                'null' => TRUE
                        ),
                        'date_created' => array(
                                'type' => 'DATETIME',
                                'null' => TRUE
                        ),
                        'date_modified' => array(
                                'type' => 'DATETIME',
                                'null' => TRUE
                        ),
                        'created_by' => array(
                                'type' => 'INT', 
                                'null' => TRUE
                        ),
                        'modified_by' => array(
                                'type' => 'INT', 
                                'null' => TRUE
                        ),
                        'status' => array(
                                'type' => 'TINYINT',
                                'constraint' => 1,
                                'default' => 0
                        )
                ));
                $this->dbforge->add_key('about_us_id', TRUE);
                $this->dbforge->create_table('about_us');
        }

        // Table for team
        private function team()
        {
                $this->dbforge->add_field(array(
                        'team_id' => array(
                                'type' => 'INT', 
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'team_firstname' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 50,
                                'null' => TRUE
                        ),
                        'team_lastname' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 50,
                                'null' => TRUE
                        ),
                        'team_position' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 50,
                                'null' => TRUE
                        ),
                        'team_image' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 255,
                                'null' => TRUE
                        ),
                        'team_description' => array(
                                'type' => 'TEXT', 
                                'null' => TRUE
                        ),
                        'date_created' => array(
                                'type' => 'DATETIME',
                                'null' => TRUE
                        ),
                        'date_modified' => array(
                                'type' => 'DATETIME',
                                'null' => TRUE
                        ),
                        'created_by' => array(
                                'type' => 'INT', 
                                'null' => TRUE
                        ),
                        'modified_by' => array(
                                'type' => 'INT', 
                                'null' => TRUE
                        ),
                        'status' => array(
                                'type' => 'TINYINT',
                                'constraint' => 1,
                                'default' => 0
                        )
                ));
                $this->dbforge->add_key('team_id', TRUE);
                $this->dbforge->create_table('team');
        }

        // Table for service_category
        private function service_category()
        {
                $this->dbforge->add_field(array(
                        'service_category_id' => array(
                                'type' => 'INT', 
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'service_category_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 50,
                                'null' => TRUE
                        ),
                        'date_created' => array(
                                'type' => 'DATETIME',
                                'null' => TRUE
                        ),
                        'date_modified' => array(
                                'type' => 'DATETIME',
                                'null' => TRUE
                        ),
                        'created_by' => array(
                                'type' => 'INT', 
                                'null' => TRUE
                        ),
                        'modified_by' => array(
                                'type' => 'INT', 
                                'null' => TRUE
                        ),
                        'status' => array(
                                'type' => 'TINYINT',
                                'constraint' => 1,
                                'default' => 0
                        )
                ));
                $this->dbforge->add_key('service_category_id', TRUE);
                $this->dbforge->create_table('service_category');
        }

        // Table for service_name
        private function service_name()
        {
                $this->dbforge->add_field(array(
                        'service_name_id' => array(
                                'type' => 'INT', 
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'service_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 50,
                                'null' => TRUE
                        ),
                        'category_id' => array(
                                'type' => 'INT',
                                'null' => TRUE
                        ),
                        'date_created' => array(
                                'type' => 'DATETIME',
                                'null' => TRUE
                        ),
                        'date_modified' => array(
                                'type' => 'DATETIME',
                                'null' => TRUE
                        ),
                        'created_by' => array(
                                'type' => 'INT', 
                                'null' => TRUE
                        ),
                        'modified_by' => array(
                                'type' => 'INT', 
                                'null' => TRUE
                        ),
                        'status' => array(
                                'type' => 'TINYINT',
                                'constraint' => 1,
                                'default' => 0
                        )
                ));
                $this->dbforge->add_key('service_name_id', TRUE);
                $this->dbforge->create_table('service_name');
        }

        // Table for portfolio
        private function portfolio()
        {
                $this->dbforge->add_field(array(
                        'portfolio_id' => array(
                                'type' => 'INT', 
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'portfolio_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 50,
                                'null' => TRUE
                        ),
                        'portfolio_link' => array(
                                'type' => 'TEXT', 
                                'null' => TRUE
                        ),
                        'portfolio_image' => array(
                                'type' => 'TEXT', 
                                'null' => TRUE
                        ),
                        'category_id' => array(
                                'type' => 'INT',
                                'null' => TRUE
                        ),
                        'date_created' => array(
                                'type' => 'DATETIME',
                                'null' => TRUE
                        ),
                        'date_modified' => array(
                                'type' => 'DATETIME',
                                'null' => TRUE
                        ),
                        'created_by' => array(
                                'type' => 'INT', 
                                'null' => TRUE
                        ),
                        'modified_by' => array(
                                'type' => 'INT', 
                                'null' => TRUE
                        ),
                        'status' => array(
                                'type' => 'TINYINT',
                                'constraint' => 1,
                                'default' => 0
                        )
                ));
                $this->dbforge->add_key('portfolio_id', TRUE);
                $this->dbforge->create_table('portfolio');
        }

        // Table for blog
        private function blog()
        {
                $this->dbforge->add_field(array(
                        'blog_id' => array(
                                'type' => 'INT', 
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ), 
                        'blog_content' => array(
                                'type' => 'TEXT', 
                                'null' => TRUE
                        ), 
                        'date_created' => array(
                                'type' => 'DATETIME',
                                'null' => TRUE
                        ),
                        'date_modified' => array(
                                'type' => 'DATETIME',
                                'null' => TRUE
                        ),
                        'created_by' => array(
                                'type' => 'INT', 
                                'null' => TRUE
                        ),
                        'modified_by' => array(
                                'type' => 'INT', 
                                'null' => TRUE
                        ),
                        'status' => array(
                                'type' => 'TINYINT',
                                'constraint' => 1,
                                'default' => 0
                        )
                ));
                $this->dbforge->add_key('blog_id', TRUE);
                $this->dbforge->create_table('blog');
        }

        // Table for faq
        private function faq()
        {
                $this->dbforge->add_field(array(
                        'faq_id' => array(
                                'type' => 'INT', 
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ), 
                        'faq_question' => array(
                                'type' => 'TEXT', 
                                'null' => TRUE
                        ), 
                        'faq_answer' => array(
                                'type' => 'TEXT', 
                                'null' => TRUE
                        ), 
                        'date_created' => array(
                                'type' => 'DATETIME',
                                'null' => TRUE
                        ),
                        'date_modified' => array(
                                'type' => 'DATETIME',
                                'null' => TRUE
                        ),
                        'created_by' => array(
                                'type' => 'INT', 
                                'null' => TRUE
                        ),
                        'modified_by' => array(
                                'type' => 'INT', 
                                'null' => TRUE
                        ),
                        'status' => array(
                                'type' => 'TINYINT',
                                'constraint' => 1,
                                'default' => 0
                        )
                ));
                $this->dbforge->add_key('faq_id', TRUE);
                $this->dbforge->create_table('faq');
        }

        // Table for inquiry
        private function inquiry()
        {
                $this->dbforge->add_field(array(
                        'inquiry_id' => array(
                                'type' => 'INT', 
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ), 
                        'inquiry_firstname' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 50,
                                'null' => TRUE
                        ),  
                        'inquiry_lastname' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 50, 
                                'null' => TRUE
                        ),  
                        'inquiry_email' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 50, 
                                'null' => TRUE
                        ),  
                        'inquiry_content' => array(
                                'type' => 'TEXT', 
                                'null' => TRUE
                        ),  
                        'inquiry_date_submitted' => array(
                                'type' => 'DATETIME',
                                'null' => TRUE
                        ), 
                        'status' => array(
                                'type' => 'TINYINT',
                                'constraint' => 1,
                                'default' => 0
                        )
                ));
                $this->dbforge->add_key('inquiry_id', TRUE);
                $this->dbforge->create_table('inquiry');
        }

        // Table for admin
        private function admin()
        {
                $this->dbforge->add_field(array(
                        'admin_id' => array(
                                'type' => 'INT', 
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ), 
                        'admin_firstname' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 50, 
                                'null' => TRUE
                        ),  
                        'admin_lastname' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 50, 
                                'null' => TRUE
                        ), 
                        'admin_username' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 50, 
                                'null' => TRUE
                        ), 
                        'admin_password' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 50, 
                                'null' => TRUE
                        ),  
                        'admin_email' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 50, 
                                'null' => TRUE
                        ),  
                        'date_created' => array(
                                'type' => 'DATETIME',
                                'null' => TRUE
                        ),
                        'date_modified' => array(
                                'type' => 'DATETIME',
                                'null' => TRUE
                        ),
                        'created_by' => array(
                                'type' => 'INT', 
                                'null' => TRUE
                        ),
                        'modified_by' => array(
                                'type' => 'INT', 
                                'null' => TRUE
                        ), 
                        'status' => array(
                                'type' => 'TINYINT',
                                'constraint' => 1,
                                'default' => 0
                        )
                ));
                $this->dbforge->add_key('admin_id', TRUE);
                $this->dbforge->create_table('admin');
        }
}

