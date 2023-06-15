<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of muniDTO
 *
 * @author pchavez
 */
class muniDTO {
    
    public $departamento;
    public $provincia;
    public $distrito;
    public $presupuesto;
    public $ejecucion;
    public $avance;
    public $inversionMasPIM;
    public $porcentajeTransporte;
    public $porcentajeSaneamiento;
    public $porcentajeEducacion;
    public $listaCategoria;
    public $listaRubro;
    public $listaFuncion;
    public $listaProyecto;
    public $totalProyecto;
    public $totalProyectoTexto;
    public $cumplimientoCertificacion;
    public $cumplimientoContrato;
    public $cumplimientoGirado;
    
    
    function __construct() {
        
    }

    function getDepartamento() {
        return $this->departamento;
    }

    function getProvincia() {
        return $this->provincia;
    }

    function getDistrito() {
        return $this->distrito;
    }

    function getPresupuesto() {
        return $this->presupuesto;
    }

    function getEjecucion() {
        return $this->ejecucion;
    }

    function getAvance() {
        return $this->avance;
    }

    function getInversionMasPIM() {
        return $this->inversionMasPIM;
    }

    function getPorcentajeTransporte() {
        return $this->porcentajeTransporte;
    }

    function getPorcentajeSaneamiento() {
        return $this->porcentajeSaneamiento;
    }

    function getPorcentajeEducacion() {
        return $this->porcentajeEducacion;
    }

    function getListaCategoria() {
        return $this->listaCategoria;
    }

    function getListaRubro() {
        return $this->listaRubro;
    }

    function getListaFuncion() {
        return $this->listaFuncion;
    }

    function getListaProyecto() {
        return $this->listaProyecto;
    }

    function getTotalProyecto() {
        return $this->totalProyecto;
    }

    function getTotalProyectoTexto() {
        return $this->totalProyectoTexto;
    }

    function getCumplimientoCertificacion() {
        return $this->cumplimientoCertificacion;
    }

    function getCumplimientoContrato() {
        return $this->cumplimientoContrato;
    }

    function getCumplimientoGirado() {
        return $this->cumplimientoGirado;
    }

    function setDepartamento($departamento) {
        $this->departamento = $departamento;
    }

    function setProvincia($provincia) {
        $this->provincia = $provincia;
    }

    function setDistrito($distrito) {
        $this->distrito = $distrito;
    }

    function setPresupuesto($presupuesto) {
        $this->presupuesto = $presupuesto;
    }

    function setEjecucion($ejecucion) {
        $this->ejecucion = $ejecucion;
    }

    function setAvance($avance) {
        $this->avance = $avance;
    }

    function setInversionMasPIM($inversionMasPIM) {
        $this->inversionMasPIM = $inversionMasPIM;
    }

    function setPorcentajeTransporte($porcentajeTransporte) {
        $this->porcentajeTransporte = $porcentajeTransporte;
    }

    function setPorcentajeSaneamiento($porcentajeSaneamiento) {
        $this->porcentajeSaneamiento = $porcentajeSaneamiento;
    }

    function setPorcentajeEducacion($porcentajeEducacion) {
        $this->porcentajeEducacion = $porcentajeEducacion;
    }

    function setListaCategoria($listaCategoria) {
        $this->listaCategoria = $listaCategoria;
    }

    function setListaRubro($listaRubro) {
        $this->listaRubro = $listaRubro;
    }

    function setListaFuncion($listaFuncion) {
        $this->listaFuncion = $listaFuncion;
    }

    function setListaProyecto($listaProyecto) {
        $this->listaProyecto = $listaProyecto;
    }

    function setTotalProyecto($totalProyecto) {
        $this->totalProyecto = $totalProyecto;
    }

    function setTotalProyectoTexto($totalProyectoTexto) {
        $this->totalProyectoTexto = $totalProyectoTexto;
    }

    function setCumplimientoCertificacion($cumplimientoCertificacion) {
        $this->cumplimientoCertificacion = $cumplimientoCertificacion;
    }

    function setCumplimientoContrato($cumplimientoContrato) {
        $this->cumplimientoContrato = $cumplimientoContrato;
    }

    function setCumplimientoGirado($cumplimientoGirado) {
        $this->cumplimientoGirado = $cumplimientoGirado;
    }


    
    
}
