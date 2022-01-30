<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'        =>    'Gidelson Cassimiro',
            'email'       =>    'c26511255848412745877@sandbox.pagseguro.com.br',
            'password'    =>    bcrypt('gidelson1993'),
            'cpf'         =>    '54793120652',
            'street'      =>    'Rua da  Montiqueira',
            'number'      =>    '22',
            'complement'  =>    'Casa 3',
            'district'    =>    'Jardim Helena',
            'postal_code' =>    '99999999',
            'city'        =>    'Cidade Exemplo',
            'state'       =>    'SP',
            'country'     =>    'ATA',
            'phone'       =>'   99999999',
            'area_code'   =>    '55',
            'birth_date'  =>    '1988-10-17',
        ]);
    }
}
