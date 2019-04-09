<?php

include_once '../Conexao.php';

class Curso
{

    protected $id_curso;
    protected $nome;
    protected $dt_criacao;
    protected $id_professor;

    # Getters and Setters de Curso.
    /**
     * @return mixed
     */
    public function getIdCurso()
    {
        return $this->id_curso;
    }

    /**
     * @param mixed $id_curso
     */
    public function setIdCurso($id_curso)
    {
        $this->id_curso = $id_curso;
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
    public function getDtCriacao()
    {
        return $this->dt_criacao;
    }

    /**
     * @param mixed $dt_criacao
     */
    public function setDtCriacao($dt_criacao)
    {
        $this->dt_criacao = $dt_criacao;
    }

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
     * Retorna array com todos os cursos.
     */
    public function recuperarDados()
    {
        $conexao = new Conexao();
        $sql = "SELECT
                    *
                FROM tb_curso
        ";

        return $conexao->recuperarDados($sql);
    }

    /**
     * @param $id
     * Função para carregar todos os dados por ID para ser feito a alteração.
     * Update
     */
    public function carregarPorId($id)
    {
        $conexao = new Conexao();

        $sql = "SELECT
                    *
                FROM tb_curso
                WHERE
                    id_curso = '". (int)$id ."'
        ";

        $curso = $conexao->recuperarDados($sql);

        $this->id_curso       = $curso[0]['id_curso'];
        $this->nome           = $curso[0]['nome'];
        $this->dt_criacao     = $curso[0]['dt_criacao'];
        $this->id_professor   = $curso[0]['id_professor'];
    }

    /**
     * @param $curso
     * @return mixed
     * Função para criar dados novos.
     */
    public function inserir($curso)
    {
        $nome           = $curso['nome'];
        $dt_criacao     = $curso['dt_criacao'];
        $id_professor   = $curso['id_professor'];

        $conexao = new Conexao();
        $sql = "INSERT INTO tb_curso
                    (nome, dt_criacao, id_professor)
                VALUES
                    ('$nome', '$dt_criacao', '$id_professor')
        ";

        return $conexao->executar($sql);
    }

    /**
     * @param $curso
     * @return mixed
     * Função para alterar dados já existentes
     */
    public function alterar($curso)
    {
        $id            = $curso['id_curso'];
        $nome          = $curso['nome'];
        $dt_criacao    = $curso['dt_criacao'];
        $id_professor  = $curso['id_professor'];

        $conexao = new Conexao();

        $sql = "UPDATE tb_curso
                    SET nome = '$nome',
                        dt_criacao = '$dt_criacao',
                        id_professor = ".(int)$id_professor."
                WHERE
                    id_curso = '".(int)$id."'
        ";

        return $conexao->executar($sql);
    }

    /**
     * @param $id
     * @return mixed
     * Função para excluir dados.
     */
    public function excluir($id)
    {
        $conexao = new Conexao();
        $sql = "DELETE
                FROM tb_curso
                WHERE
                    id_curso = '". (int)$id."'
        ";

        return $conexao->executar($sql);
    }

}