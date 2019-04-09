<?php

include_once '../Conexao.php';

class Aluno
{
    protected $id_aluno;
    protected $nome;
    protected $dt_nascimento;
    protected $logradouro;
    protected $numero;
    protected $bairro;
    protected $cidade;
    protected $estado;
    protected $dt_criacao;
    protected $cep;
    protected $id_curso;

    # Getters and Setters da Classe de Aluno.
    /**
     * @return mixed
     */
    public function getIdAluno()
    {
        return $this->id_aluno;
    }

    /**
     * @param mixed $id_aluno
     */
    public function setIdAluno($id_aluno)
    {
        $this->id_aluno = $id_aluno;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $matricula
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
     * @param mixed $nome
     */
    public function setDtNascimento($dt_nascimento)
    {
        $this->dt_nascimento = $dt_nascimento;
    }

    /**
     * @return mixed
     */
    public function getLogradouro()
    {
        return $this->logradouro;
    }

    /**
     * @param mixed $telefone
     */
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $endereco
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * @param mixed $data_nascimento
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }

    /**
     * @return mixed
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * @param mixed $sexo
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $id_responsavel
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
    
    /**
     * @return mixed
     */
    public function getDtCriacao()
    {
        return $this->dt_criacao;
    }

    /**
     * @param mixed $DtCriacao
     */
    public function setDtCriacao($dt_criacao)
    {
        $this->dt_criacao = $dt_criacao;
    }
    
    /**
     * @param mixed $cep
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @param mixed $cep
     */
    public function setCep($cep)
    {
        $this->cep = $cep;
    }

    
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
     * Função para listagem de todos os dados existentes.
     * Read
     */
    public function recuperarDados()
    {
        $conexao = new Conexao();
        $sql = "SELECT
                    *
                FROM tb_aluno
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
                FROM tb_aluno
                WHERE
                    id_aluno = '". (int)$id."'
        ";

        $aluno = $conexao->recuperarDados($sql);

        $this->id_aluno        = $aluno[0]['id_aluno'];
        $this->nome            = $aluno[0]['nome'];
        $this->dt_nascimento   = $aluno[0]['dt_nascimento'];
        $this->logradouro      = $aluno[0]['logradouro'];
        $this->numero          = $aluno[0]['numero'];
        $this->bairro          = $aluno[0]['bairro'];
        $this->cidade          = $aluno[0]['cidade'];
        $this->estado          = $aluno[0]['estado'];
        $this->dt_criacao      = $aluno[0]['dt_criacao'];
        $this->cep             = $aluno[0]['cep'];
        $this->id_curso        = $aluno[0]['id_curso'];

    }

    /**
     * @param $aluno
     * @return mixed
     * Função para inserir dados novos.
     * Insert
     */
    public function inserir($aluno)
    {

        $nome            = $aluno['nome'];
        $dt_nascimento   = $aluno['dt_nascimento'];
        $logradouro      = $aluno['logradouro'];
        $numero          = $aluno['numero'];
        $bairro          = $aluno['bairro'];
        $cidade          = $aluno['cidade'];
        $estado          = $aluno['estado'];
        $dt_criacao      = $aluno['dt_criacao'];
        $cep             = $aluno['cep'];
        $id_curso        = $aluno['id_curso'];
        

        $conexao = new Conexao();

        $sql = "INSERT INTO tb_aluno
                    (nome, dt_nascimento, logradouro,
                    numero, bairro, cidade,
                    estado, dt_criacao, cep, id_curso)
                VALUES
                    ('$nome', '$dt_nascimento', '$logradouro',
                    '$numero', '$bairro', '$cidade',
                    '$estado', '$dt_criacao', '$cep', '$id_curso')
        ";

        return $conexao->executar($sql);
    }

    /**
     * @param $aluno
     * @return mixed
     * Função para alterar dados já existentes.
     * Update
     */
    public function alterar($aluno)
    {

        $id_aluno        = $aluno['id_aluno'];
        $nome            = $aluno['nome'];
        $dt_nascimento   = $aluno['dt_nascimento'];
        $logradouro      = $aluno['logradouro'];
        $numero          = $aluno['numero'];
        $data_nascimento = $aluno['bairro'];
        $cidade          = $aluno['cidade'];
        $estado          = $aluno['estado'];
        $dt_criacao      = $aluno['dt_criacao'];
        $cep             = $aluno['cep'];
        $id_curso        = $aluno['id_curso'];
        

        $conexao = new Conexao();

        $sql = "UPDATE tb_aluno
                SET nome = '$nome',
                    dt_nascimento = '$dt_nascimento',
                    logradouro = '$logradouro',
                    numero = '$numero',
                    bairro = '$bairro',
                    cidade = '$cidade',
                    estado = '$estado',
                    dt_criacao = '$dt_criacao',
                    cep = '$cep',
                    id_curso = ".(int)$id_curso."
                    
                WHERE
                    id_aluno = '".(int)$id_aluno."'
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

        $sql = "DELETE FROM tb_aluno
                WHERE
                    id_aluno = '".(int)$id."'
        ";

        return $conexao->executar($sql);
    }
}