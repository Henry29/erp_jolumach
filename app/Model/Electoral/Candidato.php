<?php

namespace App\Model\Electoral;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    private $iddetpadron;
    private $numcandidato;
    private $idcargoe;
    private $nummesa;
    private $idmesa;
    private $motivo;

    function getIddetpadron() {
        return $this->iddetpadron;
    }
    function getNumcandidato() {
        return $this->numcandidato;
    }
    function getIdcargoe() {
        return $this->idcargoe;
    }
    function getNummesa() {
        return $this->nummesa;
    }
    function getIdmesa() {
        return $this->idmesa;
    }
    function getMotivo() {
        return $this->motivo;
    }
    function setIddetpadron($iddetpadron) {
        $this->iddetpadron = $iddetpadron;
    }
    function setNumcandidato($numcandidato) {
        $this->numcandidato = $numcandidato;
    }
    function setIdcargoe($idcargoe) {
        $this->idcargoe = $idcargoe;
    }
    function setNummesa($nummesa) {
        $this->nummesa = $nummesa;
    }
    function setIdmesa($idmesa) {
        $this->idmesa = $idmesa;
    }
    function setMotivo($motivo) {
        $this->motivo = $motivo;
    }
}
