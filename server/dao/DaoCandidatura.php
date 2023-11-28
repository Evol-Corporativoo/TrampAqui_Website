<?php

    require_once(__DIR__.'/../model/Conexao.php');

    class DaoCandidatura{

        public static function criar($idUsuario, $idVaga){

            $conexao = Conexao::conectar();
            $insert = 'INSERT INTO tbcandidatura(idUsuario, idVaga, status) VALUES(?,?,1)';
            $prepare = $conexao->prepare($insert);
            $prepare->bindValue(1, $idUsuario);
            $prepare->bindValue(2, $idVaga);

            try{
                $prepare->execute();
                return true;
            } catch(Exception $e){
                return false;
            }

        }

        public static function recusar($id){

            $conexao = Conexao::conectar();
            $insert = 'UPDATE tbcandidatura SET status = 0 WHERE idCandidatura = ?';
            $prepare = $conexao->prepare($insert);
            $prepare->bindValue(1, $id);
            try{
                $prepare->execute();
                return true;
            } catch(Exception $e){
                return false;
            }

        }

        public static function aceitar($id){

            $conexao = Conexao::conectar();
            $insert = 'UPDATE tbcandidatura SET status = 2 WHERE idCandidatura = ?';
            $prepare = $conexao->prepare($insert);
            $prepare->bindValue(1, $id);
            try{
                $prepare->execute();
                return true;
            } catch(Exception $e){
                return false;
            }

        }

        public static function listar($idVaga, $status){

            $conexao = Conexao::conectar();
            $insert = 'SELECT tbcandidatura.idCandidatura AS idCandidatura, tbcandidatura.idUsuario as idUsuario, tbcandidatura.idVaga AS idVaga, tbusuario.nomeUsuario AS nomeUsuario, tbcurriculo.idCurriculo AS idCurriculo FROM tbcandidatura
            INNER JOIN tbusuario ON tbcandidatura.idUsuario = tbusuario.idUsuario
            INNER JOIN tbcurriculo ON tbusuario.idUsuario = tbcurriculo.idUsuario
            WHERE idVaga = ? AND status = ?';
            $prepare = $conexao->prepare($insert);
            $prepare->bindValue(1, $idVaga);
            $prepare->bindValue(2, $status);
            try{
                $prepare->execute();
                $lista = $prepare->fetchAll(PDO::FETCH_ASSOC);
                return $lista;
            } catch(Exception $e){
                return false;
            }
        }

    }

?>