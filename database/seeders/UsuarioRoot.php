<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UsuarioRoot extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // para crear el usuario root
        //$faker = Faker::create();
        
        /*for ($i=0; $i < 2; $i++) { 
            DB::table('users')->insert(
                array(
                    'id'                    => $faker->unique()->randomNumber,
                    'name'                  => $faker->firstName('root'),
                    'username'              => $faker->lastName,
                    'cedula'                => '123456',
                    'email'                 => $faker->unique()->email(),
                    'email_verified_at'     => '2023-09-22 11:57:10',//'NULL',
                    'password'              => '123',//'1mikenaranjo1',
                    'tipo_usuario'          => '1',
                    'remember_token'        => '',//'NULL',
                    'created_at'            => '2023-09-22 11:57:10', //date('Y-m-d H:m:s'),
                    'updated_at'            => '2023-09-22 11:57:10'
                )
            );
        }*/

        DB::table('users')->insert(
            array(
                'id'                    => '1',
                'name'                  => 'Root',
                'username'              => 'root',
                'cedula'                => '123456',
                'email'                 => 'root@root',
                'email_verified_at'     => '2023-09-22 11:57:10',
                'password'              => Hash::make('1mikenaranjo1'),
                'tipo_usuario'          => '1',
                'remember_token'        => '',
                'created_at'            => date('Y-m-d H:m:s'),
                'updated_at'            => date('Y-m-d H:m:s'),
            )
        );

        DB::table('estaciones')->insert(
            array(
                'id' => '1',
                'siglas' => 'PD',
                'nombre' => 'Prueba',
                'autor' => '1',
                'ubicacion' => 'Guatire',
                'longitud'=>'123',
                'latitud'=>'344',
                'altitud'=>'567',
                'region'=>'0',
                'estado'=>'1',
                'operativa'=>'3',
                'imagen_n'=>'uploads/Prueba//HBv9CES8Ytng5jrQsL5VV38dZInlr0guMWVgklSP.png',
                'img_dir'=>'uploads/Prueba//HBv9CES8Ytng5jrQsL5VV38dZInlr0guMWVgklSP.png',
                'created_at'=>'2023-08-21 17:18:34',
                'updated_at'=>'2023-08-21 17:26:42',
            )
        );

        DB::table('details')->insert(
            array(
                'id' => '1',
                'estacion' => 'Prueba',
                'siglas' => 'PD',
                'antena_gps' => '1',
                'antena_gps_fab' => '1',
                'antena_gps_esp' => '1',
                'antena_parabolica' => '1',
                'antena_parabolica_fab' => '1',
                'antena_parabolica_esp' => '1',
                'bateria' => '1',
                'bateria_fab' => '1',
                'bateria_esp' => '1',
                'controlador_carga' => '1',
                'controlador_carga_fab' => '1',
                'controlador_carga_esp' => '1',
                'digitalizador' => '1',
                'digitalizador_fab' => '1',
                'digitalizador_esp' => '1',
                'modem_satelital' => '1',
                'modem_satelital_fab' => '1',
                'modem_satelital_esp' => '1',
                'panel_solar' => '1',
                'panel_solar_fab' => '1',
                'panel_solar_esp' => '1',
                'regulador_carga' => '1',
                'regulador_carga_fab' => '1',
                'regulador_carga_esp' => '1',
                'sismometro' => '1',
                'sismometro_fab' => '1',
                'sismometro_esp' => '1',
                'trompeta_satelital' => '1',
                'trompeta_satelital_fab' => '1',
                'trompeta_satelital_esp' => '1',
                'instalacion_satelital' => '1',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            )
        );
    }
}
