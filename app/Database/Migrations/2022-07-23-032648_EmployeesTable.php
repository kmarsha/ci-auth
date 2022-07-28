<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Migration;

class EmployeesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_karyawan' => [
                'type' => 'int',
                'constraint' => 20,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_user' => [
                'type' => 'int',
                'constraint' => 20,
                'unsigned' => true,
            ],
            'nama_karyawan' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'usia' => [
                'type' => 'int',
                'constraint' => 3,
            ],
            'created_at' => [
                'type' => 'timestamp',
                'null' => true,
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updated_at' => [
                'type' => 'timestamp',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'timestamp',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id_karyawan');
        $this->forge->addForeignKey('id_user', 'users', 'user_id');

        $this->forge->createTable('employees');
    }

    public function down()
    {
        $this->forge->dropTable('employees');
    }
}
