<?php namespace App\Models;

use CodeIgniter\Model;

class M_user extends Model{
    protected $table                = 'user';
	protected $primaryKey           = 'id';
	protected $allowedFields        = ['firstname','lastname','username','email','password','created_at', 'updated_at'];
	protected $useTimestamps        = true;

}
