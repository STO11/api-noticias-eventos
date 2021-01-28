<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        News::create([
            'uuid' => Uuid::uuid4(),
            'title' => 'Concurso PRF 2021 é divulgado com 1.500 vagas de policial! Até R$10.357,88', 
            'description' => 'A corporação oferece salários de R$10.357,88, já somada com o auxílio-alimentação de R$458; Inscrições abrem no dia 25', 
            'img' => 'https://noticiasconcursos.com.br/wp-content/uploads/2020/08/noticiasconcursos.com.br-concurso-prf.png', 
            'date' => '2020-01-28 12:23:45', 
            'active' => 'yes'
        ]);

        News::create([
            'uuid' => Uuid::uuid4(),
            'title' => 'Concurso PM SP 2021 abre inscrições com 2.700 vagas! Até R$3 mil', 
            'description' => 'Edital de concurso da PM-SP é divulgado com 2.700 vagas de nível médio; provas acontecem no mês de abril.', 
            'img' => 'https://noticiasconcursos.com.br/wp-content/uploads/2020/02/pm-sp.jpg', 
            'date' => '2020-01-27 14:53:41', 
            'active' => 'yes'
        ]);

        News::create([
            'uuid' => Uuid::uuid4(),
            'title' => 'Concurso Unifesspa 2021: Saiu novo EDITAL para Professor! Até R$ 9.616,18', 
            'description' => 'Edital oferece 12 vagas na Universidade Federal do Sul e Sudeste do Pará.', 
            'img' => 'https://noticiasconcursos.com.br/wp-content/uploads/2020/12/noticiasconcursos.com.br-concurso-unifesspa-2021-saiu-novo-edital-para-professor-ate-r-9-61618-unifesspa-350x250.png', 
            'date' => '2020-01-27 14:53:41', 
            'active' => 'yes'
        ]);

        News::create([
            'uuid' => Uuid::uuid4(),
            'title' => 'Concurso SUSIPE PA 2021: Edital com 1.646 vagas tem 4 bancas na disputa', 
            'description' => 'Secretaria de Estado de Administração Penitenciária do Pará vai abrir um novo edital de concurso para mais de 1,6 mil vagas', 
            'img' => 'https://noticiasconcursos.com.br/wp-content/uploads/2016/09/agente-penitenciario-susipe.jpg', 
            'date' => '2020-01-27 14:53:41', 
            'active' => 'yes'
        ]);
    }
}
