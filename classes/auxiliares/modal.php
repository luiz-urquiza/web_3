<?php

class Modal{
    private $id;
    private $rotuloBtn;
    private $mensagem;
    private $titulo;
    private $link;


    public function __construct($id, $rotuloBtn = "Excluir"){
        $this->id = $id;
        $this->rotuloBtn = $rotuloBtn; 
        $this->titulo = "Confirmação!";
    }

    public function setMensagem($mensagem){
        $this->mensagem = $mensagem;
    }

    public function setLink($link){
        $this->link = $link;
    }

    public function gerarBotao(){
        echo "<button type='button' class='btn btn-sm btn-primary' data-bs-toggle='modal' data-bs-target='#excluir_{$this->id}'>";
        echo $this->rotuloBtn;
        echo "</button>";
    }

    public function gerarModal(){
        echo <<<HTML
        <!-- The Modal -->
        <div class="modal" id="excluir_{$this->id}">
            <div class="modal-dialog">
            <div class="modal-content">
        
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">{$this->titulo}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
        
                <!-- Modal body -->
                <div class="modal-body">
                {$this->mensagem}
                </div>
        
                <!-- Modal footer -->
                <div class="modal-footer">
                    <div class="btn-group">
                        <a class="btn btn-success" href="{$this->link}">Confirmar</a>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </div>
        
            </div>
            </div>
        </div>
        HTML;                
    }
}