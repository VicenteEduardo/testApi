<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ImportarXmlJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $caminhoArquivo;
    public function __construct($caminhoArquivo)
    {
        $this->caminhoArquivo = $caminhoArquivo;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $conteudoXml = file_get_contents($this->caminhoArquivo);
        $dados = simplexml_load_string($conteudoXml);


        // Processar e salvar os dados do XML no banco de dados
    }

}
