<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
class Migration_Database extends CI_Migration { 
    public function up() { 
            $this->dbforge->add_field(array(
            'id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
            ),
            'name' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100'
            ),
            'email' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255'
            ),
            'status' => array(
                    'type' => 'ENUM("Active","Inactive")'
                    'default' => 'Active',
                    'null' => FALSE,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users');


        /*$this->dbforge->add_field(array(
            'id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
            ),
            'sku' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100'
            ),
            'title' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255'
            ),
            'description' => array(
                    'type' => 'TEXT',
                     'null' => TRUE
            ),
            'image' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '255'
            ),
            'status' => array(
                    'type' => 'ENUM("Active","Inactive")'
                    'default' => 'Active',
                    'null' => FALSE,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('products');

        $this->dbforge->add_field(array(
            'id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
            ),
            'user_id' => array(
                    'type' => 'INT',
                    'constraint' => 11
            ),
            'product_id' => array(
                    'type' => 'INT',
                    'constraint' => 11
            ),
            'price' => array(
                    'type' => 'DECIMAL',
                    'constraint' => '10,2',
                    'null' => FALSE,
                    'default' => 0.00
            ),
            'qty' => array(
                    'type' => 'INT',
                    'constraint' => 10
            ),
            'status' => array(
                    'type' => 'ENUM("Active","Inactive")'
                    'default' => 'Active',
                    'null' => FALSE,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('user_id');
        $this->dbforge->add_key('product_id');
        $this->dbforge->create_table('user_products');

        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (user_id) REFERENCES users(id)');

        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (product_id) REFERENCES products(id)');*/
    }

    public function down()
    {
        $this->dbforge->drop_table('users');
        //$this->dbforge->drop_table('products');
        //$this->dbforge->drop_table('user_products');
    }
}


/*users
id, name, email, status, timestamp


products
id sku, title, description, image, status, timestamp


user_products
id, user_id, product_id, price, qty,  status, timestamp*/