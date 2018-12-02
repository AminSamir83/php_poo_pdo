<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 27/11/2018
 * Time: 10:30
 */

class Evenement
{
private $id_event;
private $nom;
private $date_debut;
private $date_fin;
private $emplacement;
private $places_total;
private $places_rest;

    /**
     * Evenement constructor.
     * @param $id_event
     * @param $nom
     * @param $date_debut
     * @param $date_fin
     * @param $emplacement
     * @param $place_total
     */
    public function __construct($id_event, $nom, $date_debut, $date_fin, $emplacement, $places_total)
    {
        $this->id_event = $id_event;
        $this->nom = $nom;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
        $this->emplacement = $emplacement;
        $this->places_total = $places_total;
        $this->places_rest = $places_total;
    }


    /**
     * @return mixed
     */
    public function getIdEvent()
    {
        return $this->id_event;
    }

    /**
     * @param mixed $id_event
     */
    public function setIdEvent($id_event): void
    {
        $this->id_event = $id_event;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getDateDebut()
    {
        return $this->date_debut;
    }

    /**
     * @param mixed $date_debut
     */
    public function setDateDebut($date_debut): void
    {
        $this->date_debut = $date_debut;
    }

    /**
     * @return mixed
     */
    public function getDateFin()
    {
        return $this->date_fin;
    }

    /**
     * @param mixed $date_fin
     */
    public function setDateFin($date_fin): void
    {
        $this->date_fin = $date_fin;
    }

    /**
     * @return mixed
     */
    public function getEmplacement()
    {
        return $this->emplacement;
    }

    /**
     * @param mixed $emplacement
     */
    public function setEmplacement($emplacement): void
    {
        $this->emplacement = $emplacement;
    }

    /**
     * @return mixed
     */
    public function getPlacesTotal()
    {
        return $this->places_total;
    }

    /**
     * @param mixed $place_total
     */
    public function setPlacesTotal($places_total): void
    {
        $this->places_total = $places_total;
    }

    /**
     * @return mixed
     */
    public function getPlacesRest()
    {
        return $this->places_rest;
    }

    /**
     * @param mixed $places_rest
     */
    public function setPlacesRest($places_rest): void
    {
        $this->places_rest = $places_rest;
    }
    public function __destruct()
    {

    }




}