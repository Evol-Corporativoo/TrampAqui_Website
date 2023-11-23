<?php
require_once('../model/Conexao.php');
require_once('../model/Vaga.php');
require_once('../model/Empresa.php');

class DaoVaga {

    public static function cadastrar(Vaga $vaga){

        $conexao = Conexao::conectar();

        $queryInsert = 'INSERT INTO tbvaga(nomeVaga, descVaga, cargoVaga, cargaHorariaVaga, salarioVaga, sobreVaga, idEmpresa)
                   VALUES (?,?,?,?,?,?,?)';
                   
        $prepare = $conexao->prepare($queryInsert);
        $prepare->bindValue(1, $vaga->getNome());
        $prepare->bindValue(2, $vaga->getDescricao());
        $prepare->bindValue(3, $vaga->getCargo());
        $prepare->bindValue(4, $vaga->getCargaHoraria());
        $prepare->bindValue(5, $vaga->getSalario());
        $prepare->bindValue(6, $vaga->getSobreVaga());
        $prepare->bindValue(7, $vaga->getIdEmpresa());

        $prepare->execute();

        return true;

    }

    public static function listarPorEmpresa(Empresa $empresa){
        $conexao = Conexao::conectar();
        $select = 'SELECT * from tbVaga WHERE idEmpresa = ?';
        $prepare = $conexao->prepare($select);
        $prepare->bindValue(1, $empresa->getId());
        $prepare->execute();
        $lista = $prepare->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($lista);
    }

    public static function buscar(string $query){
        $conexao = Conexao::conectar();
        $select = "SELECT * FROM tbVaga WHERE (nomeVaga LIKE ? OR descVaga LIKE ? OR sobreVaga LIKE ? OR cargoVaga LIKE ?";
        $prepare = $conexao->prepare($select);
        $prepare->bindValue(1, '%'.$query.'%');
        $prepare->bindValue(2, '%'.$query.'%');
        $prepare->bindValue(3, '%'.$query.'%');
        $prepare->bindValue(4, '%'.$query.'%');
        $prepare->execute();
        $lista = $prepare->fetchAll(PDO::FETCH_ASSOC);
        
        return json_encode($lista);
    }

}


?>