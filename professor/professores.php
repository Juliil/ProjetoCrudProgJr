<?php

include_once '../Conexao.php';

class Professor
{

    protected $id_professor;
    protected $nome;
    protected $dt_nascimento;
    protected $dt_criacao;

    # Getters and Setters da classe de Responsável
    /**
     * @return mixed
     */
    public function getIdProfessor()
    {
        return $this->id_professor;
    }

    /**
     * @param mixed $id_professor
     */
    public function setIdProfessor($id_professor)
    {
        $this->id_professor = $id_professor;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getDtNascimento()
    {
        return $this->dt_nascimento;
    }

    /**
     * @param mixed $telefone
     */
    public function setDtNascimento($dt_nascimento)
    {
        $this->dt_nascimento = $dt_nascimento;
    }

    /**
     * @return mixed
     */
    public function getDtCriacao()
    {
        return $this->dt_criacao;
    }

    /**
     * @param mixed $endereco
     */
    public function setDtCriacao($dt_criacao)
    {
        $this->dt_criacao = $dt_criacao;
    }

    

    /**
     * Função para listagem de todos os dados existentes.
     * Read
     */
    public function recuperarDados()
    {
        $conexao = new Conexao();
        $sql = "SELECT * FROM tb_professor";
        return $conexao->recuperarDados($sql);
    }

    /**
     * @param $id_professor
     * Função para carregar todos os dados por ID para ser feito a alteração.
     * Update
     */
    public function carregarPorId($id_professor)
    {
        $conexao = new Conexao();

        $sql = "SELECT
                    *
                FROM tb_professor
                WHERE
                    id_professor = '".(int)$id_professor."'
        ";

        $professor = $conexao->recuperarDados($sql);

        $this->id_professor    = $professor[0]['id_professor'];
        $this->nome            = $professor[0]['nome'];
        $this->dt_nascimento   = $professor[0]['dt_nascimento'];
        $this->dt_criacao      = $professor[0]['dt_criacao'];
    }

    /**
     * @param $dados
     * @return mixed
     * Função para inserir dados novos.
     * Insert
     */
    public function inserir($professor)
    {
        $nome            = $professor['nome'];
        $dt_nascimento   = $professor['dt_nascimento'];
        $dt_criacao      = $professor['dt_criacao'];
        
        $conexao = new Conexao();

        $sql = "INSERT INTO tb_professor
                    (nome, dt_nascimento, dt_criacao)
                VALUES 
                    ('$nome', '$dt_nascimento', '$dt_criacao')
        ";

        return $conexao->executar($sql);
    }

    /**
     * @param $dados
     * @return mixed
     * Função para alterar dados já existentes.
     * Update
     */
    public function alterar($dados)
    {
        $id             = $dados['id_professor'];
        $nome           = $dados['nome'];
        $dt_nascimento  = $dados['dt_nascimento'];
        $dt_criacao     = $dados['dt_criacao'];

        $conexao = new Conexao();

        $sql = "UPDATE tb_professor
                    SET nome = '$nome',
                        dt_nascimento = '$dt_nascimento',
                        dt_criacao = '$dt_criacao'
                        
                WHERE id_professor = '".(int)$id."'
        ";

        return $conexao->executar($sql);
    }

    /**
     * @param $id
     * @return mixed
     * Função para excluir algum registro existente.
     * Delete
     */
    public function excluir($id)
    {

        $conexao = new Conexao();

        $sql = "DELETE
                FROM tb_professor
                WHERE
                    id_professor = '".(int)$id."'
        ";
        return $conexao->executar($sql);
    }

}