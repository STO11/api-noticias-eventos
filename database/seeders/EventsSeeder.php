<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::create([
            'uuid' => Uuid::uuid4(),
            'title' => '1001 Questoes Vunesp', 
            'description' => 'Acompanhe a resolução de questões da banca VUNESP e treine para diversos concursos públicos. O professor Lucas Lemos conduzirá a aula de língua portuguesa a partir das 8h.',  
            'date' => '2020-01-29 12:53:41', 
            'active' => 'yes'
        ]);

        Event::create([
            'uuid' => Uuid::uuid4(),
            'title' => 'Concurso PCPR', 
            'description' => 'Acompanhe a semana de exercícios  e treine para os cargos de Investigador e Papiloscopista do concurso da Polícia Civil do estado do Paraná. O professor Márcio Flávio iniciará a aula de raciocínio lógico a partir das 9h.', 
            'date' => '2020-01-27 14:31:01', 
           'active' => 'yes'
        ]);

        Event::create([
            'uuid' => Uuid::uuid4(),
            'title' => 'Esquenta PGE RS', 
            'description' => 'Prepare-se para o concurso da Procuradoria Geral do estado do Rio Grande do Sul. Acompanhe ao aulão de direito civil com o professor Atalá Correia a partir das 9h. Não perca!', 
            'date' => '2020-01-26 04:13:41', 
           'active' => 'yes'
        ]);

        Event::create([
            'uuid' => Uuid::uuid4(),
            'title' => 'OAB 2ª fase – Principais julgados de 2020', 
            'description' => 'Entenda quais são e como podem aparecer no seu Exame! A transmissão começará a partir das 9h. Não perca!', 
            'date' => '2020-01-25 11:01:21', 
           'active' => 'yes'
        ]);
    }
}
