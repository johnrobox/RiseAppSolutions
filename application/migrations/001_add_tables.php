<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_tables extends CI_Migration {

        public function up()
        {
                $this->adminUser();
                $this->adminUserLogs();
                $this->aboutUs();
                $this->team();
                $this->serviceCategory();
                $this->serviceName();
                $this->portfolio();
                $this->blog();
                $this->faq();
                $this->inquiry();
        }

        public function down()
        {
                $this->dbforge->drop_table('admin_users');
                $this->dbforge->drop_table('admin_user_logs');
                $this->dbforge->drop_table('about_us');
                $this->dbforge->drop_table('teams');
                $this->dbforge->drop_table('service_categories');
                $this->dbforge->drop_table('service_names');
                $this->dbforge->drop_table('portfolios');
                $this->dbforge->drop_table('blogs');
                $this->dbforge->drop_table('faqs');
                $this->dbforge->drop_table('inquiries');
        }

        // Table for about_us
        private function aboutUs()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
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
                                'default' => 1,
                                'comment' => '0-disable, 1-enable'
                        )
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('about_us');
        }

        // Table for teams
        private function team()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
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
                                'default' => 1,
                                'comment' => '0-disable, 1-enable'
                        )
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('teams');
        }

        // Table for service_categories
        private function serviceCategory()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
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
                                'default' => 1,
                                'comment' => '0-disable, 1-enable'
                        )
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('service_categories');
        }

        // Table for service_names
        private function serviceName()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
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
                                'default' => 1,
                                'comment' => '0-disable, 1-enable'
                        )
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('service_names');
        }

        // Table for portfolios
        private function portfolio()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
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
                                'default' => 1,
                                'comment' => '0-disable, 1-enable'
                        )
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('portfolios');
        }

        // Table for blogs
        private function blog()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
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
                                'default' => 1,
                                'comment' => '0-disable, 1-enable'
                        )
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('blogs');
        }

        // Table for faqs
        private function faq()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
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
                                'default' => 0,
                                'comment' => '0-unread, 1-read'
                        )
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('faqs');
        }

        // Table for inquiry
        private function inquiry()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
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
                                'default' => 1,
                                'comment' => '0-disable, 1-enable'
                        )
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('inquiries');
        }

        // Table for admin_users
        private function adminUser()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
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
                        )
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('admin_users');
        }

        // Table for admin_user_logs
        private function adminUserLogs() {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT', 
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ), 
                        'admin_user_id' => array(
                                'type' => 'INT'
                        ),  
                        'admin_token' => array(
                                'type' => 'VARCHAR',
                                'constraint' => 188, 
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
                        'last_login' => array(
                                'type' => 'DATETIME',
                                'null' => TRUE
                        ),
                        'last_logout' => array(
                                'type' => 'DATETIME',
                                'null' => TRUE
                        ),
                        'status' => array(
                                'type' => 'TINYINT',
                                'constraint' => 1,
                                'default' => 0,
                                'comment' => '0-disable, 1-enable'
                        )
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('admin_user_logs');
        }

}

